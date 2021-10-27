<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        ResetPassword::toMailUsing(function ($notifiable, $token) {
            return (new MailMessage)
              ->subject('パスワード再設定')
              ->greeting('パスワード再設定の要求を受け付けました。')
              ->line('下のボタンをクリックしてパスワードを再設定してください。')
              ->action(\Lang::get('Reset Password'), url(config('app.url').route('password.reset', ['token' => $token, 'login_id' => $notifiable->login_id], false)))
              ->line('もし心当たりがない場合は、本メッセージは破棄してください。');
        });
    }
}
