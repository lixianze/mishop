<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginLog extends Model
{

    protected $table='login_log';

    //添加登陆日志
    public static function memberLoginLog($where){
        $fruit = self::insert($where);
        return $fruit;
    }
}