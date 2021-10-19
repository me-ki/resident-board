<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;
use App\Information;

class InformationsController extends Controller
{   
    public function index(Request $request)
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            
            //ログインユーザーが入居者の場合
            if($user->category == '10') {
                // ユーザ宛てのお知らせ一覧を作成日時の降順で取得
                $user_informations = $user->user_informations()->orderBy('created_at', 'desc')->paginate(5, ["*"], 'user_info');
                
                //ユーザの入居中のresidenceを取得するための条件設定
                $matchThese = ['user_id' => $user->id, 'status' => '1'];
                
                //居住中のbuilding_idを取得
                $buildingIds = \App\Residence::where($matchThese)->pluck('building_id')->toArray();
                //重複するbuilding_idを削除
                $unique_buildingIds = array_unique($buildingIds);
                
                //居住マンションの建物情報を取得
                $buildings = \App\Building::whereIn('id', $unique_buildingIds)->orderBy('created_at', 'desc')->get();
                
                //マンション宛てのインフォメーションを取得
                $building_informations = array();
                foreach($buildings as $building){
                    $informations = $building->building_informations()->get();
                    foreach($informations as $information){
                        $building_informations[] = $information;
                    }
                }
                
                //全棟（全入居者）宛のインフォメーションを取得
                $to_all_informations = Information::where('to_whom', '=', '0')->get();
                foreach($to_all_informations as $to_all_information){
                    $building_informations[] = $to_all_information;
                }
                
                $ids = array_column($building_informations, 'created_at');
                
                //created_atの降順（SORT_DESC）に並び替える.
                array_multisort($ids, SORT_DESC, $building_informations);
                
                //配列をコレクションに変換
                $building_informations = collect($building_informations);
                //ページネーションの作成
                $building_informations = new LengthAwarePaginator(
                    $building_informations->forPage($request->page, 5),
                    count($building_informations),
                    5,
                    $request->page,
                    array('path' => $request->url())
                );
    
                $data = [
                    'user' => $user,
                    'user_informations' => $user_informations,
                    'building_informations' => $building_informations
                ];
           
            //ログインユーザーがスタッフの場合     
            } elseif($user->category == '5') {
                
                //すべてのインフォを取得
                $informations = Information::orderBy('created_at', 'desc')->paginate(20);
    
                $data = [
                    'informations' => $informations
                ];
            }
        }
        // Welcomeビューでそれらを表示
        return view('welcome', $data);
    }
    
     public function show($informationId)
    {
        // idの値でインフォメーションを検索して取得
        $information = Information::findOrFail($informationId);
        $user = \Auth::user();
        $residents = array();
        $buildings = array();
        
        //入居者だったら
        if($user->category == '10') {
            
            return view('informations.show', [
               'user' => $user,
               'information' => $information
            ]);
        
        //スタッフだったら    
        } elseif($user->category == '5') {
            //入居者宛てインフォなら入居者情報を取得
            if($information->to_whom == 1) {
                $residents = $information->users()->get();
            //建物宛てなら建物を情報を取得    
            } elseif($information->to_whom == 2) {
                $buildings = $information->buildings()->get();
            }
            return view('informations.show', [
               'residents' => $residents,
               'buildings' => $buildings,
               'information' => $information
            ]);
            
        }
        
    }
    
    // getでinformations/createにアクセスされた場合の「新規登録画面表示処理」
    public function create(Request $request)
    {   
        // 認証済みユーザを取得
        $user = \Auth::user();
        if ($user->category == 5) { // 社員の場合
            
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
        } else { //社員以外だったら
            return redirect('/');
        }
    }
    
    public function store(Request $request)
    {   
        // 認証済みユーザを取得
        $user = \Auth::user();
        if ($user->category == 5) { // 社員の場合
        
            //バリデーション
            $request->validate([
                'title' => 'required|max:255', 
                'content' => 'required|max:255',
            ]);
            
            $information = new Information;
            $to_whom_0 = 0;
            $to_whom_1 = 1;
            $to_whom_2 = 2;
            
            if($request->kinds == 'resident') {
                
                $information->title = $request->title;
                $information->content = $request->content;
                $information->to_whom = $to_whom_1;
                $information->created_userName = $request->user()->name;
                $information->updated_userName = $request->user()->name;
                $information->save();
                
                //作成したインフォメーションのidを取得
                $last_insert_id = $information->id;
                
                //インフォメーションにユーザを紐づける
                $user = \App\User::find($request->postTo_id);
                $user->inform($last_insert_id);
            
            } elseif ($request->kinds == 'building') {
                
                $information->title = $request->title;
                $information->content = $request->content;
                $information->to_whom = $to_whom_2;
                $information->created_userName = $request->user()->name;
                $information->updated_userName = $request->user()->name;
                $information->save();
                
                //作成したインフォメーションのidを取得
                $last_insert_id = $information->id;
                
                //インフォメーションに建物を紐づける
                $building = \App\Building::find($request->postTo_id);
                $building->inform($last_insert_id);
            
            } else {
                
                $information->title = $request->title;
                $information->content = $request->content;
                $information->to_whom = $to_whom_0;
                $information->created_userName = $request->user()->name;
                $information->updated_userName = $request->user()->name;
                $information->save();
            }
        } 
        //topに戻る
        return redirect('/');
    }
    
    //インフォメーションの編集画面表示
    public function edit($informationId)
    {
        // 認証済みユーザを取得
        $user = \Auth::user();
        if ($user->category == 5) { // 社員の場合
        
            // idの値でインフォメーションを検索して取得
            $information = Information::findOrFail($informationId);
            $user = \Auth::user();
            $residents = array();
            $buildings = array();
            
            //入居者宛てインフォなら入居者情報を取得
            if($information->to_whom == 1) {
                $residents = $information->users()->get();
            //建物宛てなら建物を情報を取得    
            } elseif($information->to_whom == 2) {
                $buildings = $information->buildings()->get();
            }
            return view('informations.edit', [
               'residents' => $residents,
               'buildings' => $buildings,
               'information' => $information
            ]);
        } else {
            return redirect ('/');
        }
    }
    
    // インフォメーションの更新処理
    public function update(Request $request, $informationId)
    {
        // 認証済みユーザを取得
        $user = \Auth::user();
        if ($user->category == 5) { // 社員の場合
        
            //バリデーション
            $request->validate([
                'title' => 'required|max:255', 
                'content' => 'required|max:255'
            ]);
            
            // informationIdの値で居住マンション情報を検索して取得
            $information = Information::findOrFail($informationId);
            // 居住マンション情報を更新
            $information->title = $request->title;
            $information->content = $request->content;
            $information->updated_userName = $request->user()->name;
            $information->save();
            
            $information = Information::findOrFail($informationId);
            $residents = array();
            $buildings = array();
            
            //入居者宛てインフォなら入居者情報を取得
            if($information->to_whom == 1) {
                $residents = $information->users()->get();
                //建物宛てなら建物を情報を取得    
                } elseif($information->to_whom == 2) {
                    $buildings = $information->buildings()->get();
            }
            return view('informations.show', [
               'residents' => $residents,
               'buildings' => $buildings,
               'information' => $information
            ]);
            
        } else { //社員以外だったら
            return redirect ('/');
        }
    }
    
    // インフォメーションの削除
    public function destroy($id)
    {   
        // 認証済みユーザを取得
        $user = \Auth::user();
        if ($user->category == 5) { // 社員の場合
        
            // idの値でインフォメーション情報を検索して取得
            $information = Information::findOrFail($id);
            
            $information->delete();
        }
        
        //topに戻る
        return redirect('/');
    }
}