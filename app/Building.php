<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $fillable = ['name', 'address', 'units'];
    
    protected $casts = [
        'units' => 'integer'
    ];
    
    /**
     * この建物が紐づけられている居住者情報。（Residenceモデルとの関係を定義）
     */
    public function residences()
    {
        return $this->hasMany(Residence::class);
    }
    
    /**
     * この建物に対して送られた投稿。（Informationモデルとの関係を定義）
     */
    public function building_informations()
    {
        return $this->belongsToMany(Information::class, 'building_informations', 'building_id', 'information_id')->withTimestamps();
    }
    
    /**
     * この建物に関係するモデルの件数をロードする。
     */
    public function loadRelationshipCounts()
    {
        $this->loadCount('residences', 'building_informations');
    }
    
    /**
     * $informationIdで指定された投稿を建物に紐づける。
     *
     * @param  int  $informationId
     * @return bool
     */
    public function inform($informationId)
    {
        $this->building_informations()->attach($informationId);
    } 
}
