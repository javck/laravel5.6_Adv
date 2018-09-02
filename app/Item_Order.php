<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item_Order extends Model
{
    protected $table = 'item_order';
    protected $fillable = ['order_id','item_id','qty'];
}
