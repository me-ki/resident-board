<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $table = 'informations';
    
    protected $fillable = ['title', 'content', 'to_all', 'created_userId', 'updated_userId'];

    /**
     * この投稿を知らせたユーザー。（Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * この投稿を知らせた建物。（Buildingモデルとの関係を定義）
     */
    public function buildings()
    {
        return $this->belongsToMany(Building::class, 'building_informations', 'information_id', 'building_id')->withTimestamps();
    }
    
}
