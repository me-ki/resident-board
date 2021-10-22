<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    // 引数で受け取ったデータ用の変数
    protected $contact;

    public function __construct($contact)
    {
        // 引数で受け取ったデータを疑似変数にセット
        // クラス定義内部であればアクセスできる
        $this->contact = $contact;
    }

    /**
     * メッセージの生成
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('お問合せ有難うございます')         // メールのタイトル
             ->from('walk.beaute@gmail.com')             // 送信元
             ->text('contact.mail')                 // テンプレートの呼び出し(平文テキスト)
             ->with(['contact' => $this->contact]); // withオプションでセットしたデータをテンプレートへ受け渡す
    }

}
