<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Identity extends Model
{
    protected $table = "admin_identity";

    public $timestamps = false;
    //添加角色
    public static function IdentityAdd($where){
        $reslut = self::insert($where);
        return $reslut;
    }

    //展示角色
    public static function IdentityShow(){
        $data = self::get();
        return $data;
    }

    //删除角色
    public static function IdentityDelete($where){
        $result = self::where($where)->delete();
        return $result;
    }

    //修改角色
    public static function IdentityUpdate($role_id,$where){
        $result = self::where('role_id',$role_id)->update($where);
        return $result;
    }
}
