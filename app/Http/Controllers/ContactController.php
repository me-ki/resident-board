<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\CotactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * 入力画面
     */
    public function input()
    {
        // Bladeで使う変数
        $hash = array(
            'title' => 'お問い合わせ',
            'subtitle' => '入力画面',
        );
        return view('contact.input')->with($hash);
    }

    /**
     * 確認画面
     */
    public function confirm(Request $request)
    {
        // Bladeで使う変数
        $hash = array(
            'request' => $request,
            'title' => 'お問い合わせ',
            'subtitle' => '確認画面',
        );
        return view('contact.confirm')->with($hash);
    }

    /**
     * 完了画面
     */
    public function finish(Request $request)
    {
        // 全入力データをcontact変数に代入
        // 配列として受け取りたい場合は $contact = $request->all();
        $contact = $request;

        // 引数にリクエストデータを渡す
        // Mailファサードを使ってメールを送信
        Mail::to($contact->email)->send(new \App\Mail\ContactMail($contact));
        Mail::to(env('MAIL_USERNAME'))->send(new \App\Mail\ContactMail($contact));

        // Bladeで使う変数
        $hash = array(
            'title' => 'お問い合わせ',
            'subtitle' => '完了画面',
        );
        
        // 二重送信対策
        $request->session()->regenerateToken();

        return view('contact.finish')->with($hash);
    }
}
