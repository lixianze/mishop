<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/10/8
 * Time: 18:35
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class UserInfo extends Model
    {
//        protected $table='user_add';
          protected $table='user_info';
          public $timestamps = false;

        //查询用户信息
        public static function memberLogin()
        {
              $userInfo=self::get();
//              dump($userInfo);die;
        }

        //添加用户信息
        public static function memberUserAdd($userMessage)
        {

              $userAdd = self::insert($userMessage);
              return $userAdd;
              //var_dump($userAdd);die;
        }

        //登陆单条查找
        public static function memberUserFind($where)
        {
            $userFind = self::where($where)->first();
            return $userFind;
        }




    }