<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\PasswordResetNotification;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'login_id','email', 'password','category'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * このユーザの居住マンション情報すべて。（ Residenceモデルとの関係を定義）
     */
    public function residences()
    {
        return $this->hasMany(Residence::class);
    }
    
    /**
     * このユーザに送られた投稿。（Informationモデルとの関係を定義）
     */
    public function user_informations()
    {
        return $this->belongsToMany(Information::class, 'user_informations', 'user_id', 'information_id')->withTimestamps();
    }
    
    /**
     * このユーザに関係するモデルの件数をロードする。
     */
    public function loadRelationshipCounts()
    {
        $this->loadCount('user_informations');
    }
    
    /**
     * $informationIdで指定されたお知らせをユーザに紐づける
     * @param int $informationId
     */
    public function inform($informationId)
    {
        $this->user_informations()->attach($informationId);
    }
    
}
