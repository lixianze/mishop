<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminInfo extends Model
{
    protected $table = "admin_info";

    public $timestamps = false;
    //管理员登陆验证
    public static function memberAdminLogin($where){
        $reslut = self::where($where)->first();
        return $reslut;
    }

    //超级管理员添加管理员
    public static function SuperAdd($where){
        $reslut = self::insert($where);
        return $reslut;
    }

    //查看当前管理员
    public static function adminInfo(){
        $data = self::get()->toArray();
        return $data;
    }

    //根据user_id删除管理员
    public static function adminInfoDel($where){
        $reslut = self::where($where)->delete();
//        $reslut = $reslut->delete();
//        dd($reslut);
        return $reslut;
    }

    //根据user_id修改管理员信息
    public static function adminInfoUpdate($user_id,$data){
//        dd($user_id);
        $reslut = self::where('user_id',$user_id)->update($data);

        return $reslut;
    }
}
