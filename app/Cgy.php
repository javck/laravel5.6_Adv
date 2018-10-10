<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cgy extends Model
{
    protected $fillable = ['name', 'pic', 'url', 'enabled'];

    public function items()
    {
        return $this->hasMany('App\Item');
    }

}
