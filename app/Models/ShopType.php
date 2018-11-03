<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopType extends Model
{
    protected $table = "shop_type";

    public $timestamps = false;

    //查询所有商品
    public static function memberShopShow(){
        $shopMessage = self::where('shop_status',1)->get();
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

    //查询部分分类
    public static function TypeSelect(){
        $data = self::get()->toArray();
        return $data;
    }

    //添加分类
    public static function classAdd($where){
        $result = self::insert($where);
        return $result;
    }

    //删除分类
    public static function classDelete($type_id,$where){
        $result = self::where('type_id',$type_id)->update($where);
        return $result;
    }

    //修改分类
    public static function classUpdate($where){
        $type_id = session()->get('type_id');
        $result = self::where('type_id',$type_id)->update($where);
        return $result;
    }

}
