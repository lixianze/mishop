<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class AdminAttrValue extends Model
{
    protected $table = 'admin_attr_value';

    public $timestamps = false;

    //添加属性值
    public static function ValueAdd($where){
        $result = self::insert($where);
        return $result;
    }

    //展示属性值
    public static function adminValueShow(){
        $data  = self::with('attr')->where('value_status',1)->get()->toArray();
        return $data;
    }
    //模型关联
    public function attr(){
        return $this->hasOne('App\Models\AdminAttr','attr_id','attr_id');
    }

    public static function valueDelete($where,$request){
        $attr_value_id = $request['attr_value_id'];
        $result = self::where('attr_value_id',$attr_value_id)->update($where);
        return $result;
    }

    //修改属性值
    public static function valueUpdate($where){
        $attr_value_id = session()->get('attr_value_id');
        $result = self::where('attr_value_id',$attr_value_id)->update($where);
        return $result;
    }

    //根据attr_id查找属性值
    public static function attrValue($data){
        $data = self::whereIn('attr_id',$data)->get()->toArray();
        return $data;
    }

    //根据属性值id查找属性值id
    public static function valueSelect($where){
        $data = self::whereIn($where)->get()->toArray();
        return $data;
    }
}
