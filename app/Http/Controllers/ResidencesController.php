<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Residence;

class ResidencesController extends Controller
{
    // getでresidences/createにアクセスされた場合の「新規登録画面表示処理」
    public function create(Request $request)
    {
        // 建物名一覧をBuildingクラスから取得
        $buildings = \App\Building::all()->pluck('name', 'id');
        $value = $request->input('user_id');
        
        $residence = new Residence;

        //居住マンション登録ビューを表示
        return view('residences.create', compact('buildings'), [
            'residence' => $residence,
        ])->with('userId', $value);
    }
    
    public function store(Request $request)
    {
        //バリデーション
        $request->validate([
            'room_num' => 'required|max:255', 
            'status' => 'required|max:8'
        ]);
        
        $residence = new Residence;
        $residence->user_id = $request->user_id;
        $residence->building_id = $request->building_id;
        $residence->room_num = $request->room_num;
        $residence->status = $request->status;
        $residence->save();
        
        // residenceに紐づくユーザー情報を取得
        $user = $residence->user;
        
        // ユーザの住居情報一覧（residences)を作成日時の降順で取得
        $residences = $user->residences()->orderBy('created_at', 'desc')->get();
        
        // ユーザー詳細画面へ戻る
         return view('users.show', [
           'user' => $user,
           'residences' => $residences
        ]);
    }
    
    // 居住マンション情報の更新画面表示処理
    public function edit($residenceId)
    {
        // residence_idの値で編集したいresidenceを検索して取得
        $residence = Residence::findOrFail($residenceId);
        
        // 建物名一覧をBuildingクラスから取得
        $buildings = \App\Building::all()->pluck('name', 'id');
        
        // 居住マンション情報編集画面を開く
        return view('residences.edit', compact('buildings'), [
           'residence' => $residence,
        ]);
    }
    
    // 居住マンション情報の更新処理
    public function update(Request $request, $residenceId)
    {
        //バリデーション
        $request->validate([
            'room_num' => 'required|max:255',
            'status' => 'required|max:8'
        ]);
        
        // residenceIdの値で居住マンション情報を検索して取得
        $residence = Residence::findOrFail($residenceId);
        // 居住マンション情報を更新
        $residence->room_num = $request->room_num;
        $residence->status = $request->status;
        $residence->save();
        
        // residenceに紐づくユーザー情報を取得
        $user = $residence->user;
        
        // ユーザの住居情報一覧（residences)を作成日時の降順で取得
        $residences = $user->residences()->orderBy('created_at', 'desc')->get();
        
        // ユーザー詳細画面へ戻る
         return view('users.show', [
           'user' => $user,
           'residences' => $residences
        ]);
    }
    
    // 居住マンション情報の削除
    public function destroy($id)
    {
        // idの値で居住マンション情報を検索して取得
        $residence = \App\Residence::findOrFail($id);
        
        // residenceに紐づくユーザー情報を取得
        $user = $residence->user;
        
        $residence->delete();
        
        // ユーザの住居情報一覧（residences)を作成日時の降順で取得
        $residences = $user->residences()->orderBy('created_at', 'desc')->get();
        
        // ユーザー詳細画面へ戻る
         return view('users.show', [
           'user' => $user,
           'residences' => $residences
        ]);
    }
}