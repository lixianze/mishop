<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminGoodAttr extends Model
{
    protected $table = 'admin_good_attr';

    //分配属性前删除有的
    public static function distriDelete(){
        $good_id = session()->get('good_id');
        $result = self::where('good_id',$good_id)->delete();
        return $result;
    }

    //添加进去
    public static function distriInsert($arr){
        $last = self::insert($arr);
        return $last;
    }
}
