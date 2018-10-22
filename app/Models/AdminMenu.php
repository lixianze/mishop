<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminMenu extends Model
{
    protected $table = 'admin_menu';

    //清楚修改中自带的时间
    public $timestamps = false;

    //查询所有菜单
    public static function memberAdminMenuAll($menubar)
    {
            return self::memberAdminMenu($menubar);
    }

    //进行分类
    public static function memberAdminMenu($menubar,$name = 'submenu',$p_id = 0){
        $menushow = array();
        foreach($menubar as $v){
            if($v['menu_id'] == $p_id){
                $v['submenu'] = self::memberAdminMenu($menubar,$name,$v['id']);
                $menushow[] = array_filter($v);
            }
        }
        return $menushow;
    }

    //根据菜单id查询菜单名
    public static function MenuMenu($menu){
        $menu = self::whereIn('id',$menu)->get()->toArray();
        return $menu;
    }

    //添加权限
    public static function MissiomAdd($where){
        $result = self::insert($where);
        return $result;
    }

    //展示权限
    public static function MissiomShow(){
        $data = self::get();
        return $data;
    }

    //删除权限
    public static function MissiomDelete($where){
        $result = self::where($where)->delete();
        return $result;
    }

    //修改权限
    public static function MissiomUpdate($id,$where){
        $result = self::where('id',$id)->update($where);
        return $result;
    }

}
