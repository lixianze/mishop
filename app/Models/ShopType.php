<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopType extends Model
{
    protected $table = "shop_type";

    //查询所有商品
    public static function memberShopShow(){
        $shopMessage = self::get()->toArray();
//        var_dump($shopMessage);die;
        return self::memberShopGenre($shopMessage);
    }

    //进行分类
    public static function memberShopGenre($shopMessage,$name = 'child',$p_id = 0){
        $shop = array();
        foreach($shopMessage as $v){
            if($v['p_id'] == $p_id){
                $v['name'] = self::memberShopGenre($shopMessage,$name,$v['type_id']);
                $shop[] = $v;
            }
        }
        return $shop;
    }
}
