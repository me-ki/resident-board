<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Information;

class InformationsController extends Controller
{   
    public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            
            if($user->category == '1') {
                // ユーザ宛てのお知らせ一覧を作成日時の降順で取得
                $user_informations = $user->user_informations()->orderBy('created_at', 'desc')->paginate(5, ["*"], 'user_info');
                
                //ユーザの入居中のresidenceを取得するための条件設定
                $matchThese = ['user_id' => $user->id, 'status' => '1'];
                
                // 契約中の居住マンション情報とそれに紐づくインフォを取得
                $residences = \App\Residence::where($matchThese)->get();
                
                $building_informationIds_all = []; 
                
                //居住マンションごとのインフォメーションIDを取得して配列に追加
                foreach($residences as $residence) {
                    $building_informationIds = $residence->building_informations()->pluck('informations.id')->toArray();
                    $building_informationIds_all = array_merge($building_informationIds, $building_informationIds_all);
                }
                
                //全棟（全入居者）宛のインフォメーションIDを取得
                $informationIds_to_all = Information::where('to_all', '=', '1')->pluck('informations.id')->toArray();
                $building_informationIds_all = array_merge($building_informationIds_all, $informationIds_to_all);
                //重複インフォの削除
                $building_informationIds_all = array_unique($building_informationIds_all);
                
                $building_informations = Information::whereIn('id',  $building_informationIds_all)
                ->with(['buildings' => function ($query) {
                $query->orderBy('id', 'desc'); // 作成日時の降順
                }])->orderBy('created_at', 'desc')->paginate(5, ["*"], 'building_info');
                
                $data = [
                    'user' => $user,
                    'user_informations' => $user_informations,
                    'residences' => $residences,
                    'building_informations' => $building_informations
                ];
                
            } elseif($user->category == '2') {
                $data = [
                    'user' => $user
                ];
            }
        }
        // Welcomeビューでそれらを表示
        return view('welcome', $data);
    }
    
     public function show($id)
    {
        // idの値でインフォメーションを検索して取得
        $information = Information::findOrFail($id);
        
        // ユーザ詳細ビューでそれらを表示
        return view('informations.show', [
           'information' => $information
        ]);
    }
    
    // getでinformations/createにアクセスされた場合の「新規登録画面表示処理」
    public function create(Request $request)
    {
        $value1 = $request->input('user_id');
        $value2 = $request->input('building_id');
        
        //入居者への投稿
        if($value1) {
        
            $information = new Information;
            $kinds = 'resident';
    
            //インフォメーション投稿ビューを表示
            return view('informations.create', [
                'information' => $information,
                'kinds' => $kinds,
                'postTo_id' => $value1
            ]);
        
        //建物への投稿    
        } elseif($value2) {
            
            $information = new Information;
            $kinds = 'building';
    
            //インフォメーション投稿ビューを表示
            return view('informations.create', [
                'information' => $information,
                'kinds' => $kinds,
                'postTo_id' => $value2
            ]);
        
        //全員（全棟）への投稿    
        } else {
            $information = new Information;
            $kinds = 'all';
    
            //インフォメーション投稿ビューを表示
            return view('informations.create', [
                'information' => $information,
                'kinds' => $kinds,
                'postTo_id' => 'all'
            ]);
        }
    }
    
    public function store(Request $request)
    {
        //バリデーション
        $request->validate([
            'title' => 'required|max:255', 
            'content' => 'required|max:255',
        ]);
        
        $information = new Information;
        $to_all_0 = 0;
        $to_all_1 = 1;
        
        if($request->kinds == 'resident') {
            
            $information->title = $request->title;
            $information->content = $request->content;
            $information->to_all = $to_all_0;
            $information->created_userId = $request->user()->id;
            $information->updated_userId = $request->user()->id;
            $information->save();
            
            //作成したインフォメーションのidを取得
            $last_insert_id = $information->id;
            
            //インフォメーションにユーザを紐づける
            $user = \App\User::find($request->postTo_id);
            $user->inform($last_insert_id);
        
        } elseif ($request->kinds == 'building') {
            
            $information->title = $request->title;
            $information->content = $request->content;
            $information->to_all = $to_all_0;
            $information->created_userId = $request->user()->id;
            $information->updated_userId = $request->user()->id;
            $information->save();
            
            //作成したインフォメーションのidを取得
            $last_insert_id = $information->id;
            
            //インフォメーションに建物を紐づける
            $building = \App\Building::find($request->postTo_id);
            $building->inform($last_insert_id);
        
        } else {
            
            $information->title = $request->title;
            $information->content = $request->content;
            $information->to_all = $to_all_1;
            $information->created_userId = $request->user()->id;
            $information->updated_userId = $request->user()->id;
            $information->save();
        }
        //登録が終わったらtopに戻る
        return redirect('/');
    }
}