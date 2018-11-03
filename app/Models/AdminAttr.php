<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminAttr extends Model
{
    protected $table = 'admin_attr';

    public $timestamps = false;

    //添加属性
    public static function AttrAdd($where){
        $result = self::insert($where);
        return $result;
    }

    //展示属性
    public static function AttrShow(){
        $data = self::where('attr_status',1)->get();
        return $data;
    }

    //修改属性
    public static function AttrUpdate($where){
        $attr_id = session()->get('attr_id');
        $result = self::where('attr_id',$attr_id)->update($where);
        return $result;
    }

    //根据attr_id查询到整条数据
    public static function AttrSearch($request){
        $attr_id = $request['attr_id'];
        $data = self::where('attr_id',$attr_id)->first();
        return $data;
    }

    //属性假删除
    public static function AttrDelete($where,$attr_id){
        $result = self::where('attr_id',$attr_id)->update($where);
        return $result;
    }

    //attr_id查询属性
    public static function AttrSelect($data){
        $data = self::whereIn('attr_id',$data)->get();
        return $data;
    }




}
