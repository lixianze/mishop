<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopInfo extends Model
{
    //数据表
    protected $table = "shop_good";

    //清楚修改中自带的时间
    public $timestamps = false;

    public static function memberShopInfo($type_id){
        $data = self::where(['type_id'=>$type_id])->get();
        return $data;
    }

    //添加商品
    public static function GoodAdd($where){
        $data = self::insert($where);
        return $data;
    }

    //展示商品
    public static function GoodShow(){
        $data = self::where('good_status',1)->get();
        return $data;
    }

    //删除商品
    public static function GoodDelete($id,$where){
        $result = self::where('id',$id)->update($where);
        return $result;
    }

    //修改商品
    public static function GoodUpdate($id,$where){
        $result = self::where('id',$id)->update($where);
        return $result;
    }

    //查一条商品数据
    public static function shopUpdate(){
        $good_id = session()->get('good_id');
        $result = self::where('id',$good_id)->get()->toArray();
        return $result;
    }

}
