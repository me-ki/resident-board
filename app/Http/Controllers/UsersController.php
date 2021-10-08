<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function index()
    {
        // ユーザ一覧（会員情報一覧）をidの降順で取得
        $users = User::orderBy('id', 'desc')->paginate(10);

        // ユーザ一覧ビューでそれを表示
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    public function show($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);
        
        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();
        
        // ユーザの住居情報一覧（residences)を作成日時の降順で取得
        $residences = $user->residences()->orderBy('created_at', 'desc')->get();
        
        // ユーザ詳細ビューでそれらを表示
        return view('users.show', [
           'user' => $user,
           'residences' => $residences
        ]);
    }
    
    // 会員基本情報の更新画面表示処理
    public function edit($userId)
    {
        // ユーザidの値で編集したいユーザを検索して取得
        $user = User::findOrFail($userId);
        
        // ユーザ編集画面を開く
        return view('users.edit', [
           'user' => $user,
        ]);
    }
    
    //会員基本情報の更新処理
    public function update(Request $request, $userId)
    {
        //バリデーション
        $request->validate([
            'name' => 'required|max:255',
            'login_id' => 'required|max:255',
            'email' => 'required|max:255',
            'category' => 'required|max:8',
        ]);
        
        // userIdの値で会員情報を検索して取得
        $user = User::findOrFail($userId);
        // 会員情報を更新
        $user->name = $request->name;
        $user->login_id = $request->login_id;
        $user->email = $request->email;
        $user->category = $request->category;
        $user->save();
        
        // ユーザの属性一覧を作成日時の降順で取得
        $residences = $user->residences()->orderBy('created_at', 'desc')->get();
        
        // 前のURLへリダイレクトさせる
         return view('users.show', [
           'user' => $user,
           'residences' => $residences
        ]);
    }
    
    public function destroy($id)
    {
        // idの値でユーザーを検索して取得
        $user = User::findOrFail($id);
        
        $user->delete();
        
        // ユーザ一覧（会員情報一覧）をidの降順で取得
        $users = User::orderBy('id', 'desc')->paginate(10);

        // ユーザ一覧ビューでそれを表示
        return view('users.index', [
            'users' => $users,
        ]);
    }
}
