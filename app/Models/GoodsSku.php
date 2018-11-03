<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodsSku extends Model
{
    protected $table = 'goods_sku';

    //添加货品入库
    public static function GoodsAdd($arr){
//        dd($arr);
//        $count = count($arr['attr_value_id']);
//        for($i=0;$i<=$count;$i++) {
            $result = self::insert($arr);
//        }
        return $result;
    }
}
