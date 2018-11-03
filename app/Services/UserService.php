<?php
namespace App\Services;

use App\Models\AdminAttr;
use App\Models\ShopType;
use App\Models\TypeAttr;
use Illuminate\Support\Facades\Session;
use App\Models\UserInfo;
use App\Models\LoginLog;
use Mail;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Jobs\sendEmail;
use App\Models\ShopInfo;
use App\Models\AdminAttrValue;
use App\Models\AdminGoodAttr;
use PHPUnit\Util\Type;


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

    //修改商品信息
    public function shopUpdate($request){
        $good_img = '/storage/'.$request->file('good_img')->store('test');
        $id = session()->get('shop_id');
        $where = [
            'good_name'=>$request['good_name'],
            'good_price'=>$request['good_price'],
            'good_img'=>$good_img,
            'type_id'=>$request['type_id'],
        ];

        $result = ShopInfo::GoodUpdate($id,$where);
        return $result;
    }

    //添加分类
    public function classAdd($request){
//        dd($request['shop_name']);
//        unset($request['_token']);
        $where = [
            'shop_name'=>$request['shop_name'],
            'shop_url'=>$request['shop_url'],
            'p_id'=>$request['p_id'],
        ];
        $result = ShopType::classAdd($where);
        return $result;
    }

    //展示分类
    public function classShow(){
        $data = ShopType::memberShopShow();
        return $data;
    }

    //假删除分类
    public function classDelete($request){
        $type_id = $request['type_id'];
//        dd($type_id);
        $where = [
            'shop_status'=>0,
        ];
        $result = ShopType::classDelete($type_id,$where);
        return $result;
    }

    //修改分类
    public function classUpdate($request){
        $where = [
            'shop_name'=>$request['shop_name'],
            'shop_url'=>$request['shop_url'],
            'shop_img'=>$request['shop_img'],
            'p_id'=>$request['p_id'],
        ];
        $result = ShopType::classUpdate($where);
        return $request;
    }

    //添加属性
    public static function AttrAdd($request){
        $where = [
            'name'=>$request['name'],
        ];
        $result = AdminAttr::AttrAdd($where);
        return $result;
    }

    //展示属性
    public static function AttrShow(){
        $data = AdminAttr::AttrShow();
        return $data;
    }

    //通过类型id查找属性id
    public static function shopAttr($request){
        $where = [
            'type_id'=>$request['type_id'],
        ];
        $data = TypeAttr::AttrFind($where);
        return $data;
    }

    //根据属性id查找属性
    public static function shopAttrs($data){

        $data = AdminAttr::AttrSelect($data);
        return $data;
    }

    //根据属性id查找属性值
    public static function attrValue($data){
        $data = AdminAttrValue::attrValue($data);
        return $data;
    }

    //修改属性
    public static function AttrUpdate($request){
        $where = [
            'name'=>$request['name'],
        ];
        $result = AdminAttr::AttrUpdate($where);
        return $result;
    }

    //根据id查一条信息
    public static function AttrSearch($request){
        $data = AdminAttr::AttrSearch($request);
        return $data;
    }

    //商品属性假删除
    public static function AttrDelete($request){
        $attr_id = $request['attr_id'];
        $where = [
            'attr_status'=>0,
        ];
        $result = AdminAttr::AttrDelete($where,$attr_id);
        return $result;
    }

    //添加属性值
    public static function adminValueAdd($request){
        $where = [
            'attr_id'=>$request['attr_id'],
            'name'=>$request['name'],
        ];
        $result = AdminAttrValue::ValueAdd($where);
        return $result;
    }

    //展示属性值
    public static function adminValueShow(){
        $data = AdminAttrValue::adminValueShow();
//        dd($data);
        return $data;
    }

    //商品属性假删除
    public static function valueDelete($request){
        $where = [
            'value_status'=>0,
        ];
        $result = AdminAttrValue::valueDelete($where,$request);
        return $result;
    }

    //商品属性修改
    public static function adminValueUpdate($request){
        $where = [
            'name'=>$request['name'],
        ];
        $result = AdminAttrValue::valueUpdate($where);
        return $result;
    }

    //商品分配属性
    public static function distriDelete(){
        $result = AdminGoodAttr::distriDelete();
        return $result;
    }

    //分配属性
    public static function distriInsert($distri){
//        dd($distri);
        $good_id = session()->get('good_id');
        $num = count($distri);
        $arr = [];
        for($i = 0;$i<$num;$i++){
            $arr['good_id'] = $good_id;
            $arr['attr_id'] = $distri[$i];
            $last = AdminGoodAttr::distriInsert($arr);
        }
        return $last;
    }

    //查一条商品数据
    public static function goodUpdate(){
        $result = ShopInfo::shopUpdate();
        return $result;
    }

    //根据属性值id查找属性值
    public static function attrValueSelect($request){
        $where = [
            'attr_value_id'=>$request['name']
        ];
        $data = AdminAttrValue::valueSelect($where);
        return $data;
    }

    public static function processing($data){
        // 保存结果
        $result = array();

        // 循环遍历集合数据
        for($i=0,$count=count($data); $i<$count-1; $i++){

            // 初始化
            if($i==0){
                $result = $data[$i];
            }

            // 保存临时数据
            $tmp = array();
            // 结果与下一个集合计算笛卡尔积
            if(is_array($result)){
                foreach($result as $res){
                    foreach($data[$i+1] as $set){
                        $tmp[] = $res.','.$set;
                    }
                }
            }


            // 将笛卡尔积写入结果
            $result = $tmp;

        }

        return $result;

    }







}

?>