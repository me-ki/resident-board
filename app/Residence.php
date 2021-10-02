<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Residence extends Model
{
    protected $fillable = ['room_num', 'status'];
    
    /**
     * この属性を所有するユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * この属性が属する建物。（ Buildingモデルとの関係を定義）
     */
    public function building()
    {
        return $this->belongsTo(Building::class);
    }
}
