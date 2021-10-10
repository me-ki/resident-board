<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Information;

class InformationsController extends Controller
{
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
            $user->user_informations($last_insert_id);
        
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
            $building->building_informations($last_insert_id);
        
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
