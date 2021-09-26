<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $fillable = ['room_num', 'status'];
    
    /**
     * この建物が紐づけられている属性。（Attributeモデルとの関係を定義）
     */
    public function residents()
    {
        return $this->hasMany(Attribute::class);
    }
    
    /**
     * この建物に対して送られた投稿。（Informationモデルとの関係を定義）
     */
    public function informations()
    {
        return $this->belongsToMany(Information::class, 'building_informations', 'building_id', 'information_id')->withTimestamps();
    }
    
    /**
     * この建物に関係するモデルの件数をロードする。
     */
    public function loadRelationshipCounts()
    {
        $this->loadCount('residents', 'informations');
    }
}
