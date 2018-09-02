<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name','desc','pic','price'];

    //該商品所屬分類
    public function cgy(){
        return $this->belongsTo('App\Cgy');
    }

    //該商品屬於哪些訂單
    public function orders(){
        return $this->belongsToMany('App\Order')->withTimestamps();
    }
}
