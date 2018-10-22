<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopInfo extends Model
{
    protected $table = "shop_good";
    public static function memberShopInfo($type_id){
        $data = self::where(['type_id'=>$type_id])->get();
        return $data;
    }

}
