<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Residence extends Model
{
    protected $fillable = ['room_num', 'status'];
    
    /**
     * この居住情報が属するユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * この居住情報が属する建物。（ Buildingモデルとの関係を定義）
     */
    public function building()
    {
        return $this->belongsTo(Building::class);
    }
    
    /**
     * 紐づけられた建物に対して送られた投稿。（Informationモデルとの関係を定義）
     */
    public function building_informations()
    {
        return $this->belongsToMany(Information::class, 'building_informations', 'building_id', 'information_id')->withTimestamps();
    }
    
    /**
     * 全建物と紐づけられた建物に対して送られた投稿。（Informationモデルとの関係を定義）
     */
    public function all_informations()
    {
        $informationIds = $this->building_informations()->pluck('information_id')->toArray();
        $informationIds[] = Information::where('to_all', '=', '1');
        return $this->Information::whereIn('information_id', $informationIds);
    }
    
}
