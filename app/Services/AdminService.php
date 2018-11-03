<?php
namespace App\Services;

use App\Models\AdminIdentity;
use App\Models\AdminInfo;
use App\Models\AdminMenu;
use App\Models\GoodsSku;
use App\Models\Identity;
use App\Models\Resources;
use App\Models\ShopInfo;
use App\Models\ShopType;
use Illuminate\Support\Facades\Session;
use App\Models\UserRole;


class AdminService{

    //后台登录
    public static function EmailLogin($loginMessage){
//        dd($loginMessage);
        if(is_array($loginMessage)) {
            $admin_email = $loginMessage['admin_email'];
            $admin_pwd = $loginMessage['admin_pwd'];
            $where = [
                'admin_email' => $admin_email,
                'admin_pwd' => $admin_pwd,
            ];
            $reslut = AdminInfo::memberAdminLogin($where);
            $admin_name = $reslut['admin_name'];
            session()->put('loginMessage', $loginMessage);
            session()->put('admin_name', $admin_name);
            return $reslut;
        }
    }

    //后台菜单查询
    public static function adminMenu($menubar){
        $reslut = AdminMenu::memberAdminMenuAll($menubar);
        return $reslut;
    }

    //rbac根据根据user_id查询role_id
    public static function LoginAdmin($reslut){
        $user_id = $reslut['user_id'];
        $where = [
            'user_id' => $user_id,
        ];
        $data = UserRole::memberAdminShow($where);
        return $data;
    }

    //根据role_id查询菜单
    public function RoleMenu($data){
        $data = Resources::RoleShow($data);
        return $data;
    }

    //根据菜单id查询菜单名
    public function MenuId($role){
        $menu = AdminMenu::MenuMenu($role);
        return $menu;
    }

    //添加管理员
    public function AddAdmin($adminMessage)
    {
        if ($adminMessage['admin_add_name'] == '' or $adminMessage['admin_add_email'] == '' or $adminMessage['admin_add_pwd'] == '') {
            return redirect('adminstage/adminIndex');
        } else {
            $create_time = date('Y-m-d H:i:s');
            $create_name = session()->get('admin_name');
            $where = [
                'admin_name' => $adminMessage['admin_add_name'],
                'admin_email' => $adminMessage['admin_add_email'],
                'admin_pwd' => $adminMessage['admin_add_pwd'],
                'create_time' => $create_time,
                'create_name' => $create_name,
            ];

            $reslut = AdminInfo::SuperAdd($where);
        }
    }

    //查询管理员表数据
    public function AdminInfo(){
        $data = AdminInfo::adminInfo();
        return $data;
    }

    //删除管理员
    public function AdminInfoDel($user_id){
//        dump($user_id);die;
        $where = [
            'user_id'=>$user_id,
        ];
        $reslut = AdminInfo::adminInfoDel($where);
        return $reslut;
    }

    //修改信息
    public function adminInfoUpdate($request){
        $user_id = session()->get('user_id');
        $user_name = $request['admin_name'];
        $user_pwd = $request['admin_pwd'];
        $user_email = $request['admin_email'];
        $data = [
            'admin_name'=>$user_name,
            'admin_email'=>$user_email,
            'admin_pwd'=>$user_pwd,
        ];
//        dd($where);
        $reslut = AdminInfo::adminInfoUpdate($user_id,$data);
        return $reslut;
    }

    //添加角色
    public function IdentityAdd($request){
        $identity = $request['name'];
        if($identity == ''){
            return redirect('adminstage/adminFront');
        }else{
            $where = [
                'name'=>$identity,
            ];
            $reslut = Identity::IdentityAdd($where);
            return $reslut;
        }

    }

    //展示角色
    public static function IdentityShow(){
        $data = Identity::IdentityShow();
        return $data;
    }

    //删除角色
    public function IdentityDelete($role_id){
        $where = [
            'role_id'=>$role_id,
        ];
        $result = Identity::IdentityDelete($where);
        return $result;
    }

    //修改角色
    public static function IdentitySave($reqest){

        $role_id = session()->get('role_id');
        $name = $reqest['name'];

        $where = [
            'name'=>$name,
        ];
        $result = Identity::IdentityUpdate($role_id,$where);
        return $result;
    }

    //添加权限
    public static function MissiomAdd($request){
        $text = $request['text'];
        $icon = $request['icon'];
        $url = $request['url'];
        $menu_id = $request['menu_id'];
        $path = $request['path'];
        $where = [
            'text'=> $text,
            'icon'=> $icon,
            'url'=> $url,
            'menu_id'=> $menu_id,
            'path'=> $path,
        ];
        $result = AdminMenu::MissiomAdd($where);
        return $result;
    }

    //展示权限
    public static function MissiomShow(){
        $data = AdminMenu::MissiomShow();
        return $data;
    }

    //删除权限
    public static function MissiomDelete($id){
        $where = [
            'id'=>$id,
        ];
//        dd($where);
        $result = AdminMenu::MissiomDelete($where);
        return $result;
    }

    //修改权限
    public static function MissiomUpdateInfo($request){
        $id = session()->get('id');
        $where = [
            'text'=>$request['text'],
            'icon'=>$request['icon'],
            'url'=>$request['url'],
            'menu_id'=>$request['menu_id'],
            'path'=>$request['path'],
        ];
        $result = AdminMenu::MissiomUpdate($id,$where);
        return $result;
    }

    //分配角色
    public static function AdminRole($request){
        //先删除用户的角色
        $user_id = session()->get('user_id');
        $where = [
            'user_id'=>$user_id,
        ];
        $delete = UserRole::RoleDelete($where);

        //然后添加角色
//        dd($request['role']);
        $role_id = $request['role'];
//        dd($role_id);
        $num = count($role_id);
//        dd($num);
        $arr = [];
        for($i = 0;$i<$num;$i++){
            $arr['user_id'] = $user_id;
            $arr['role_id'] = $role_id[$i];
//            dd($arr);
        $result = UserRole::RoleAdd($arr);
        }
        return $result;
    }

    //给角色分配权限,删除有的
    public static function RoleIdentity($role_id){
        $data = AdminMenu::MissiomShow();
        session()->put('identity_role_id',$role_id);
        $where = [
            'role_id'=>$role_id,
        ];
        $result = Resources::IdentityDel($where);
        return $data;
    }

    //分配权限
    public static function RoleIdentityAdd($is_menu_button){
        $role_id = session()->get('identity_role_id');
        $num = count($is_menu_button);
        $arr = [];
        for($i = 0;$i < $num;$i++){
            $arr['role_id'] = $role_id;
            $arr['is_menu_button'] = $is_menu_button[$i];
            $result = Resources::IdentityAdd($arr);
        }
        return $result;
    }

    //查询分类表中分类
    public static function TypeSelect(){
        $data = ShopType::TypeSelect();
        return $data;
    }

    //添加商品入库
    public static function GoodAdd($request){
        $good_img = '/storage/'.$request->file('good_img')->store('test');
        $where = [
            'good_name'=>$request['good_name'],
            'description'=>$request['description'],
            'good_price'=>$request['good_price'],
            'good_img'=>$good_img,
            'type_id'=>$request['type_id'],
        ];
        $num = count($request['attr_value_id']);
        $arr = [];
//        dd($request);
        for($i=0;$i<$num;$i++){
            $arr['attr_value_id'] = $request['attr_value_id'][$i];
            $arr['goods_group'] = $request['sku_str'][$i];
            $arr['goods_number'] = $request['sku_no'][$i];
            $arr['goods_price'] = $request['price'][$i];
            $arr['goods_stock'] = $request['invoutory'][$i];
            $result = GoodsSku::GoodsAdd($arr);
        }
//        $term = [
//            'attr_value_id'=>$request['attr_value_id'],
//            'goods_group'=>$request['sku_str'],
//            'goods_number'=>$request['sku_no'],
//            'goods_price'=>$request['price'],
//            'goods_stock'=>$request['invoutory'],
//        ];
//        dd($term);
//        dd($arr);
        $data = ShopInfo::GoodAdd($where);


        return $data;
    }

    //添加货品
    public static function GoodsAdd($request){

        $where = [
            'attr_value_id'=>$request['attr_value_id'],
            'goods_group'=>$request['sku_str'],
            'goods_number'=>$request['sku_no'],
            'goods_price'=>$request['price'],
            'goods_stock'=>$request['invoutory'],
        ];

//        return $result;
    }

    //查询商品
    public static function GoodShow(){
        $data = ShopInfo::GoodShow();
        return $data;
    }

    //删除商品
    public static function GoodDelete($id){
        $where = [
            'good_status' => 0,
        ];
        $result = ShopInfo::GoodDelete($id,$where);
        return $result;
    }



}


?>
