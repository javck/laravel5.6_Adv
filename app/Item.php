<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cgy;

class Item extends Model
{
    protected $fillable = ['name', 'desc', 'pic', 'price', 'cgy_id'];

    //該商品所屬分類
    // public function cgy()
    // {
    //     return $this->belongsTo('App\Cgy');
    // }

    //取得該商品所屬的分類們
    public function cgys()
    {
        if (strlen($this->cgy_id) > 0) {
            //find方法支援傳入id陣列找尋多筆資料，另外使用explode()將字串用逗號隔開轉為陣列
            return Cgy::findOrFail(explode(',', $this->cgy_id));
        } else {
            return null;
        }
    }
    //取得該商品所屬的分類們的id陣列
    public function cgy_ids()
    {
        if (strlen($this->cgy_id) > 0) {
            return Cgy::findOrFail($this->cgy_id)->pluck('id');
        } else {
            return null;
        }
    }

    public function getCgysName()
    {
        if (isset($this->cgy_id)) {
            $cgys = Cgy::findOrFail($this->cgy_id)->pluck('name');
            return implode(',', $cgys->toArray());
        } else {
            return '';
        }

    }

    //該商品屬於哪些訂單
    public function orders()
    {
        return $this->belongsToMany('App\Order')->withTimestamps();
    }

    //Mutator，用來於取出屬性時先進行處理
    public function getCgyIdAttribute($value)
    {
        return explode(',', $value);
    }
}
