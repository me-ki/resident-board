<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
     * このユーザの最新の居住マンション情報。（ Residenceモデルとの関係を定義）
     */
    public function residence()
    {
        return $this->hasMany(Residence::class)->orderBy('updated_at', 'desc')->first();
    }
    
    /**
     * このユーザの住んでいる建物に送られた投稿。（Informationモデルとの関係を定義）
     */
    public function building_informations()
    {
        return $this->belongsToMany(Information::class, 'building_informations', 'building_id', 'information_id')->withTimestamps();
    }
    
    /**
     * このユーザに関係するモデルの件数をロードする。
     */
    public function loadRelationshipCounts()
    {
        $this->loadCount('residences');
    }
     
}
