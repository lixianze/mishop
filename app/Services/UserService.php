<?php
namespace App\Services;

use App\Models\ShopType;
use Illuminate\Support\Facades\Session;
use App\Models\UserInfo;
use App\Models\LoginLog;
use Mail;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Jobs\sendEmail;
use App\Models\ShopInfo;

class UserService{
    use DispatchesJobs;
    //开启全局session
    protected $middleware = [ \Illuminate\Session\Middleware\StartSession::class, ];

    //注册
    public function mobileAdd($userMessage){
        unset($userMessage['user_repwd']);
        $user_name = $userMessage['user_name'];
        $userMessage['user_pwd'] = md5($userMessage['user_pwd']);
        $result = UserInfo::memberUserAdd($userMessage);
        session()->put('user_name',$user_name);
        if(!empty($userMessage['user_email'])){
            //$email = $userMessage['user_email'];
            //return redirect('job/'.$email);
            $email = $userMessage['user_email'];
            $this -> dispatch(new sendEmail($email));
        }
            return $result;
    }

    //手机号登陆
    public function mobileFind($loginMessage){
        $user_tel = $loginMessage['user_tel'];
        $user_pwd = md5($loginMessage['user_pwd']);
        $where = [
            'user_tel' => $user_tel,
            'user_pwd' => $user_pwd,
        ];
        $result = UserInfo::memberUserFind($where);
        $user_name=$result['user_name'];
        session()->put('user_name',$user_name);
        return $result;
    }

    //邮箱登录
    public function emailFind($loginMessage){
        $user_email = $loginMessage['user_email'];
        $user_pwd = md5($loginMessage['user_pwd']);
        $where = [
            'user_email' => $user_email,
            'user_pwd' => $user_pwd,
        ];
        $result = UserInfo::memberUserFind($where);
        $user_name = $result['user_name'];
        session()->put('user_name',$user_name);
        return $result;
    }

    //手机号登陆日志
    public function mobileLog($loginMessage)
    {
        $time=date('Y-m-d H:i:s');
        $ip_json = @file_get_contents("http://ip.taobao.com/service/getIpInfo.php?ip=myip");
        $ip_arr=json_decode(stripslashes($ip_json),1);
        $where = [
            'user_tel' => $loginMessage['user_tel'],
            'login_time' => $time,
            'login_ip' => $ip_arr['data']['ip'],
            'login_address' => $ip_arr['data']['city'],
        ];
        $fruit = LoginLog::memberLoginLog($where);
        return $fruit;
    }

    //邮箱登陆日志
    public static function emailLog($loginMessage)
    {
        $time=date('Y-m-d H:i:s');
        $ip_json = @file_get_contents("http://ip.taobao.com/service/getIpInfo.php?ip=myip");
        $ip_arr=json_decode(stripslashes($ip_json),1);
        $where = [
            'user_email' => $loginMessage['user_email'],
            'login_time' => $time,
            'login_ip' => $ip_arr['data']['ip'],
            'login_address' => $ip_arr['data']['city'],
        ];
        $fruit = LoginLog::memberLoginLog($where);
        return $fruit;
    }

    //商品展示
    public function shopType(){
        $result = ShopType::memberShopShow();
        return $result;
    }

    //列表展示
    public function shopList($type_id)
    {
        $data = ShopInfo::memberShopInfo($type_id);
        return $data;
    }

}

?>