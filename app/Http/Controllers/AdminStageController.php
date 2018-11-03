<?php

namespace App\Http\Controllers;

use frontend\models\User;
use Illuminate\Support\Facades\Session;
use App\Services\AdminService;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdminInfo;
use App\Models\AdminMenu;
use Illuminate\Support\Facades\Validator;

class AdminStageController extends Controller
{
    //登陆模板
    public function adminPage(){
        return view('admin/adminLogin');
    }

    //后台登录
    public function adminLogin(Request $request)
    {
        $loginMessage = $request->input();
//        dd($loginMessage);
        $adminService = new AdminService();
        //$reslut是登陆查询出来的用户信息
        $reslut = $adminService->EmailLogin($loginMessage);
        //$data是根据登陆用户id查找对应角色
//        $data = $adminService -> LoginAdmin($reslut);
//        dd($data);
//        $role = $adminService -> RoleMenu($data);
//        dd($role);
//        $menu = $adminService -> MenuId($role);
//        dd($menu);
        if($reslut){

            return redirect('adminstage/adminFront');
        }else{
            return redirect('adminstage/adminPage');
        }
    }

    //后台首页模板
    public function adminFront(){
        return view('admin/adminPage');
    }

    //后台管理退出登录
    public function adminLoginOut()
    {
        Session::forget('admin_name');
        return redirect('adminstage/adminPage');
    }

    //管理员管理模块
    public function adminIndex(){
        return view('admin/adminIndex');
    }

    //添加管理员
    public function adminIndexAdd(Request $request){
        $adminMessage = $request->input();
        $relus = [
            //规则
            'admin_add_name' => 'required',
            'admin_add_email' => 'required',
            'admin_add_pwd' => 'required',
        ];
        $message = [
            'admin_add_name.required' => '管理员名不能空!!',
            'admin_add_email.required' => '邮箱不能空!!',
            'admin_add_pwd.required' => '管理员密码不能空!!',
        ];
        $vail = Validator::make($adminMessage,$relus,$message);
        if($vail -> passes()){
            $adminService = new AdminService();
            $reslut = $adminService->AddAdmin($adminMessage);
            if($reslut){
                return redirect('adminstage/showAdmin');
            }else{
                return redirect('adminstage/showAdmin');
            }
        }else{
            //这里传入变量
            return back()->withErrors($vail);
        }

    }

    //展示管理员
    public function showAdmin(){
        $adminService = new AdminService();
        $data = $adminService->AdminInfo();
        return view('admin/indexAdmin')->with('data',$data);
    }

    //删除管理员
    public function adminDelete(Request $user_id){
        $user_id = $user_id ->get('user_id');
//        dd($user_id);
        $adminService = new AdminService();
        $result = $adminService->AdminInfoDel($user_id);
        if($result){
            return redirect('adminstage/showAdmin');
        }else{
            return redirect('adminstage/showAdmin');
        }
    }

    //修改管理员信息
    public function adminUpdate(Request $request){
        $user_id = $request['user_id'];
        session()->put('user_id',$user_id);
        return view('admin/adminUpdate');
    }

    //修改
    public function adminInfoUpdate(Request $request){
        $adminService = new AdminService();
        $reslut = $adminService->adminInfoUpdate($request);
        if($reslut){
            return redirect('adminstage/showAdmin');
        }else{
            return redirect('adminstage/showAdmin');
        }
    }

    //添加角色渲染模板
    public function identityAdd(){
        return view('admin/identityAdd');
    }

    //添加角色
    public function adminIdentity(Request $request){
        $adminService = new AdminService();
        $reslut = $adminService ->IdentityAdd($request);
        if($reslut){
            return redirect('adminstage/adminIdentityShow');
        }else{
            return redirect('adminstage/adminIdentityShow');
        }
    }

    //展示角色信息
    public function adminIdentityShow(){
        $adminService = new AdminService();
        $data = $adminService ->IdentityShow();
        return view('admin/IdentityShow')->with('data',$data);
    }

    //删除角色
    public function IdentityDelete(Request $request){
        $role_id = $request['role_id'];
        $adminService = new AdminService();
        $result = $adminService -> IdentityDelete($role_id);
        if($result){
            return redirect('adminstage/adminIdentityShow');
        }else{
            return redirect('adminstage/adminIdentityShow');
        }
    }

    //修改角色
    public function IdentityUpdate(Request $request){
        $role_id = $request['role_id'];
        session()->put('role_id',$role_id);
        return view('admin/IdentityUpdateInfo');
    }

    public function IdentitySave(Request $request){
        $adminService = new AdminService();
        $result = $adminService::IdentitySave($request);
        if($result){
            return redirect('adminstage/adminIdentityShow');
        }else{
            return redirect('adminstage/adminIdentityShow');
        }
    }

    //添加权限
    public function AdminMissiom(){
        return view('admin/MissiomAdd');
    }

    public function MissiomAdd(Request $request){
        $adminService = new AdminService();
        $result = $adminService::MissiomAdd($request);
        if($request){
            return redirect('adminstage/MissiomShow');
        }
    }

    //展示权限
    public function MissiomShow(){
        $adminService = new AdminService();
        $data = $adminService::MissiomShow();
        return view('admin/MissiomShow')->with('data',$data);
    }

    //删除权限
    public function MissiomDelete(Request $request){
        $id = $request['id'];
//        dd($id);
        $adminService = new AdminService();
        $result = $adminService::MissiomDelete($id);
        if($result){
            return redirect('adminstage/MissiomShow');
        }else{
            return redirect('adminstage/MissiomShow');
        }
    }

    //修改权限
    public function MissiomUpdate(Request $request){
        $id = $request['id'];
        session()->put('id',$id);
        return view('admin/MissiomUpdate');
    }

    //修改
    public function MissiomUpdateInfo(Request $request){
        $adminService = new AdminService();
        $data = $adminService::MissiomUpdateInfo($request);
        if($data){
            return redirect('adminstage/MissiomShow');
        }else{
            return redirect('adminstage/MissiomShow');
        }
    }

    //分配权限
    public function adminAl(Request $request){
        $user_id = $request['user_id'];
        session()->put('user_id',$user_id);
        $adminService = new AdminService();
        $data = $adminService::IdentityShow();
//        dd($data);
        return view('admin/adminRole')->with('data',$data);
    }

    //删除现有角色并添加
    public function adminRole(Request $request){
        $adminService = new AdminService();
        $result = $adminService::AdminRole($request);
        if($result){
            return redirect('adminstage/showAdmin');
        }else{
            return redirect('adminstage/showAdmin');
        }
    }

    //给角色分配权限
    public function RoleIdentity(Request $request){
        $role_id = $request['role_id'];
        $adminService = new AdminService();
        $data = $adminService::RoleIdentity($role_id);
        return view('admin/RoleIdentity')->with('data',$data);
    }

    //分配
    public function RoleIdentityAdd(Request $request){
        $is_menu_button = $request['role'];
        $adminService = new AdminService();
        $result = $adminService::RoleIdentityAdd($is_menu_button);
        if($result){
            return redirect('adminstage/adminIdentityShow');
        }else{
            return redirect('adminstage/adminIdentityShow');
        }
    }

    //添加商品
    public function Good(){
          $userService = new UserService();
          $data = $userService -> shopType();
//        dd($data);
          $result = $userService->AttrShow();
          $attr_vaule = $userService->adminValueShow();
        return view('admin/adminGoodAdd',['data'=>$data,'result'=>$result]);
    }

    //二级联动属性
    public function getAttrs(Request $request){
//        dd($request['type_id']);
        $userService = new UserService();
        $data = $userService->shopAttr($request);
        $result = $userService->shopAttrs($data);
        return $result;
//        return $request->post('type_id');
    }

    //三级联动属性值
    public function getAttrsValue(Request $request){
        $request = $request->post('attr_id');
        $data = explode(',',$request);

        $userService = new UserService();
        $result = $userService->attrValue($data);
        return $result;
//        return $request->post();
    }

    //添加货品
    public function shopAdd(Request $request){
        $input = $request->input();
//        return $input;
        $userService = new UserService();
        foreach ($input as $value){
            $data[] = $userService->processing($value);
        }
        return $data;
    }

    //笛卡尔乘积
    public function shopAddd(){


    }

    public function GoodAdd(Request $request)
    {
//        $request = $request->input();
//        $res = $request->file();
//        dd($res);
        $adminService = new AdminService();
        $data = $adminService->GoodAdd($request);
//        $result = $adminService->GoodsAdd($request);
        if($data){
            return redirect('adminstage/GoodShow');
        }else{
            return redirect('adminstage/GoodShow');
        }
    }

    //展示商品
    public function GoodShow()
    {
        $adminService = new AdminService();
        $data = $adminService->GoodShow();
        return view('admin/adminGood')->with('data',$data);
    }

    //假删除商品
    public function GoodDelete(Request $request)
    {
        $id = $request['id'];
        $adminService = new AdminService();
        $result = $adminService::GoodDelete($id);
        if($result){
            return redirect('adminstage/GoodShow');
        }else{
            return redirect('adminstage/GoodShow');
        }
    }

    //修改商品
    public function GoodUpdate(Request $request){
        $id = $request['id'];
        session()->put('shop_id',$id);
        $userService = new UserService();
        $data = $userService -> shopType();
        $result = $userService->goodUpdate();
        return view('admin/adminGoodUpdate',['data'=>$data,'result'=>$result]);
    }

    public function Update(Request $request){
        $userService = new UserService();
        $result = $userService->shopUpdate($request);
        if($result){
            return redirect('adminstage/GoodShow');
        }else{
            return redirect('adminstage/GoodShow');
        }
    }

    //添加商品分类
    public function classAdd(){
        return view('admin/classAdd');
    }

    public function adminClassAdd(Request $request){
        $request = $request->input();
        unset($request['_token']);
//        dd($request);
        $userService = new UserService();
        $result = $userService->classAdd($request);
        if($result){
            return redirect('adminstage/classShow');
        }else{
            return redirect('adminstage/classShow');
        }
    }

    //分类展示
    public function classShow(){
        $userService = new UserService();
        $data = $userService->classShow();
        return view('admin/classShow')->with('data',$data);
    }

    //分类假删除
    public function classDelete(Request $request){
        $userService = new UserService();
        $result = $userService->classDelete($request);
        if($result){
            return redirect('adminstage/classShow');
        }else{
            return redirect('adminstage/classShow');
        }
    }

    //分类修改
    public function classUpdate(Request $request){
        $type_id = $request['type_id'];
        session()->put('type_id',$type_id);
        return view('admin/classUpdate');
    }

    public function adminClassUpdate(Request $request){
        $request = $request->input();
        unset($request['_token']);
        $userService = new UserService();
        $result = $userService->classUpdate($request);
        if($result){
            return redirect('adminstage/classShow');
        }else{
            return redirect('adminstage/classShow');
        }
    }

    //属性添加
    public function adminAttr(){
        return view('admin/adminAttr');
    }

    public function adminAttrAdd(Request $request){
        $userService = new UserService();
        $result = $userService->AttrAdd($request);
        if($result){
            return redirect('adminstage/adminAttrShow');
        }else{
            return redirect('adminstage/adminAttrShow');
        }
    }

    //属性展示
    public function adminAttrShow(){
        $userService = new UserService();
        $data = $userService->AttrShow();
        return view('admin/adminAttrShow')->with('data',$data);
    }

    //属性假删除
    public function AttrDelete(Request $request){
        $userService = new UserService();

        $result = $userService->AttrDelete($request);
        if($result){
            return redirect('adminstage/adminAttrShow');
        }else{
            return redirect('adminstage/adminAttrShow');
        }
    }

    //属性修改
    public function AttrUpdate(Request $request){
        $attr_id = $request['attr_id'];
        session()->put('attr_id',$attr_id);
        $name = $request['name'];
        return view('admin/AttrUpdate')->with('name',$name);
    }

    public function adminAttrUpdate(Request $request){
        $userService = new UserService();
        $result = $userService->AttrUpdate($request);
        if($result){
            return redirect('adminstage/adminAttrShow');
        }else{
            return redirect('adminstage/adminAttrShow');
        }
    }

    //添加属性值
    public function adminValue(){
        $userService = new UserService();
        $data = $userService->AttrShow();
//        dd($data);
        return view('admin/adminValue')->with('data',$data);
    }

    public function adminValueAdd(Request $request){
        $userService = new UserService();
        $result = $userService->adminValueAdd($request);
        if($result){
            return redirect('adminstage/adminValueShow');
        }else{
            return redirect('adminstage/adminValueShow');
        }
    }

    //展示属性值
    public function adminValueShow(){
        $userService = new UserService();
        $data = $userService->adminValueShow();
//        dd($data);
        return view('admin/adminValueShow')->with('data',$data);
    }

    //属性值假删除
    public function valueDelete(Request $request){
        $userService = new UserService();
        $result = $userService->valueDelete($request);
        if($result){
            return redirect('adminstage/adminValueShow');
        }else{
            return redirect('adminstage/adminValueShow');
        }
    }

    //商品属性值修改
    public function valueUpdate(Request $request){
        session()->put('attr_value_id',$request['attr_value_id']);
        $data = [
            'attr_name'=>$request['attr_name'],
            'name'=>$request['name'],
        ];
        return view('admin/adminValueUpdate')->with('data',$data);
    }

    public function adminValueUpdate(Request $request){
        $userService = new UserService();
        $result = $userService->adminValueUpdate($request);
        if($result){
            return redirect('adminstage/adminValueShow');
        }else{
            return redirect('adminstage/adminValueShow');
        }
    }

    //给商品分配属性
    public function GoodDistri(Request $request){
        $good_id = $request['id'];
        session()->put('good_id',$good_id);
        $userService = new UserService();
        $data = $userService->AttrShow();
//        dd($data);
        return view('admin/adminGoodDistri')->with('data',$data);
    }

    public function adminGoodDistri(Request $request){
        $distri = $request['attr'];
        $userService = new UserService();
        $result = $userService->distriDelete();
        $last = $userService->distriInsert($distri);
        if($last){
            return redirect('adminstage/GoodShow');
        }else{
            return redirect('adminstage/GoodShow');
        }

    }




}
