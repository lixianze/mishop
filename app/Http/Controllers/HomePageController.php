<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\sendEmail;
use App\Models\LoginLog;
use App\Models\UserInfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Mail;
use App\Services\UserService;
use Illuminate\Support\Facades\Session;

class HomePageController extends Controller
{
    public function homePage()
    {
        $userService = new UserService();
        $result = $userService -> shopType();
//        dd($result);
        return view('good/homePage')->with('data',$result);
    }

    //列表页
    public function homeList(Request $quest)
    {
//        echo $type_id;die;
//        return $type_id;
       $type_id = $quest->get('type_id');

        $userService = new UserService();
        $data = $userService -> shopList($type_id);
//        dd($data);
    	return view('good/shopList')->with('data',$data);
    }

    //手机号登陆
    public function mobileLogin()
    {
    	return view('good/mobileLoginUser');
    }

    //邮箱登录
    public function emailLogin()
    {
        return view('good/emailLoginUser');
    }

    //手机号注册
    public function mobileAdd()
    {
    	return view('good/mobileAddUser');
    }

    // 邮箱注册
    public function emailAdd()
    {
        return view('good/emailAddUser');
    }

    public function mi_choose()
    {
    	return view('good/mi_choose');
    }

    public function mi_shopcar()
    {
    	return view('good/mi_shopcar');
    }

    public function mi_detail()
    {
    	return view('good/mi_detail');
    }

    //手机号注册
    public function mobileRegister(Request $request){
       
        $userMessage = $request -> input();
//        echo "<pre>";
//        var_dump($userMessage);die;
        if($userMessage) {
            unset($userMessage['_token']);
            $relus = [
                //规则
                'user_name' => 'required|unique:user_info',
                'user_pwd' => 'required',
                'user_repwd' => 'required|same:user_pwd',
                'user_tel' => 'required|max:11|unique:user_info',
            ];
            $message = [
                //错误信息
                'user_name.required' => '用户名不能为空',
                'user_name.unique' => '用户名被占用',
                'user_pwd.required' => '密码不能为空',
                'user_repwd.required' => '确认密码不能为空',
                'user_repwd.same' => '密码与确认密码必须一致',
                'user_tel.required' => '不能为空',
                'user_tel.max' => '手机号最大11位',
                'user_tel.unique' => '手机号被占用',
            ];
            //这里参数必须按照顺序(验证的内容,规则,错误信息)
            $vail = Validator::make($userMessage,$relus,$message);
            if($vail -> passes()){
                $userService = new UserService();
                $result = $userService -> mobileAdd($userMessage);
                if($result){
                    return redirect('homepage/homePage');
                }
            }else{
                //这里传入变量
                return back()->withErrors($vail);
            }
        }
    }

    //邮箱注册
    public function emailRegister(Request $request)
    {
        $userMessage = $request->input();
        if($userMessage){
            unset($userMessage['_token']);
            $relus = [
                'user_name' => 'required|unique:user_info',
                'user_pwd' => 'required',
                'user_repwd' => 'required|same:user_pwd',
                'user_email' => 'required|unique:user_info',
            ];
            $message = [
                'user_name.required' => '用户名不能空',
                'user_name.unique' => '用户名被占用',
                'user_pwd.required' => '密码不能空',
                'user_repwd.required' => '确认密码不能空',
                'user_email.required' => '邮箱不能空',
                'user_email.unique' => '邮箱被占用',
                'user_repwd.same' => '密码必须与确认密码一致',
            ];
            $vail = Validator::make($userMessage,$relus,$message);
            if($vail -> passes()) {
                $userService = new UserService();
                $result = $userService -> mobileAdd($userMessage);
//                dd($result);
                if($result){
                    return redirect('homepage/homePage');
                }

            }else{
            return back()->withErrors($vail);
        }
        }
    }

    //手机号登陆
    public function mobileLoginUser(Request $request)
    {
        $loginMessage = $request->input();
//        dd($loginMessage);
            $relus=[
            'user_tel' => 'required|max:11',
            'user_pwd' => 'required',
            ];
            $message=[
            'user_tel.required' =>'不能空',
            'user_tel.max' =>'11位!',
            'user_pwd.required' => '不能空',
            ];
            $vail = Validator::make($loginMessage,$relus,$message);
            if($vail->passes()){
                $userService = new UserService();
                $result = $userService -> mobileFind($loginMessage);
                if($result){
                    $loginlog = $userService->mobileLog($loginMessage);
                    return redirect('homepage/homePage');
                }else{
                    return redirect('homepage/mobileLogin');
                }
            }else{
                return back()->withErrors($vail);
            }
        }


    //邮箱登录
    public function emailLoginUser(Request $request)
    {
        $loginMessage = $request->input();
        $relus=[
            'user_email' => 'required',
            'user_pwd' => 'required',
        ];
        $message=[
            'user_email.required' => '不能空',
            'user_pwd.required' => '不能空',
        ];
        $vail = Validator::make($loginMessage,$relus,$message);
        if($vail->passes()){
            $userService = new UserService();
            $result = $userService -> emailFind($loginMessage);
            if($result){
                $loginlog = UserService::emailLog($loginMessage);
                return redirect('homepage/homePage');
            }else{
                return redirect('homepage/emailLogin');
            }
        }else{
            return back()->withErrors($vail);
        }
    }

    public function LoginOut()
    {
        Session::forget('user_name');
        return redirect('homepage/homePage');
    }





}

?>