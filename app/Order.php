<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'status', 'comment'];

    //該訂單擁有哪些商品
    public function items()
    {
        return $this->belongsToMany('App\Item')->withPivot(['qty', 'created_at'])->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
