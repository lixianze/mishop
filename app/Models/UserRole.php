<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = "user_role";

    //根据user_id进行角色查询
    public static function memberAdminShow($where){
        $data = self::where($where)->get(['role_id'])->toArray();
        return $data;
    }

    //删除用户身份
    public static function RoleDelete($where){
        $result = self::where($where)->delete();
        return $result;
    }

    //添加新的身份
    public static function RoleAdd($arr)
    {

        $result = self::insert($arr);
        return $result;
    }


}
