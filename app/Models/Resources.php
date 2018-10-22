<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{
    protected $table = "resources";

    public static function RoleShow($data){
        $data = self::whereIn('role_id',$data)->get(['is_menu_button'])->toArray();
        return $data;
    }

    //删除有的
    public static function IdentityDel($where){
        $result = self::where($where)->delete();
        return $result;
    }

    //分配
    public static function IdentityAdd($arr){
        $result = self::insert($arr);
        return $result;
    }
}
