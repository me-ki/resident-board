<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $table = 'informations';
    
    protected $fillable = ['title', 'content', 'to_all', 'created_userName', 'updated_userName'];

    /**
     * この投稿を知らせたユーザー。（Userモデルとの関係を定義）
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_informations', 'information_id', 'user_id')->withTimestamps();
    }
    
    /**
     * この投稿を知らせた建物。（Buildingモデルとの関係を定義）
     */
    public function buildings()
    {
        return $this->belongsToMany(Building::class, 'building_informations', 'information_id', 'building_id')->withTimestamps();
    }
    
}
