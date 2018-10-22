<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//添加路由


Route::get('/', function () {
    return view('welcome');
});

//Route::get('jobs/{data?}',function($data){
//    dispatch(new App\Jobs\sendEmail($data));
//});
Route::get('new/index','NewController@index');
Route::get('new/add','NewController@add');
Route::post('add','NewController@add');

//首页
Route::get('homepage/homePage','HomePageController@homePage');

//列表页
Route::get('homepage/homeList','HomePageController@homeList');

//登陆
Route::get('homepage/mobileLogin','HomePageController@mobileLogin');
Route::post('mobileLogin','HomePageController@mobileLogin');
Route::get('homepage/emailLogin','HomePageController@emailLogin');
Route::post('emailLogin','HomePageController@emailLogin');

//手机号登陆
Route::get('homepage/mobileLoginUser','HomePageController@mobileLoginUser');
Route::post('mobileLoginUser','HomePageController@mobileLoginUser');

//邮箱登录
Route::get('homepage/emailLoginUser','HomePageController@emailLoginUser');
Route::post('emailLoginUser','HomePageController@emailLoginUser');


//注册
Route::get('homepage/mobileAdd','HomePageController@mobileAdd');
Route::post('mobileAdd','HomePageController@mobileAdd');

//手机号注册
Route::get('homepage/mobileRegister','HomePageController@mobileRegister');
Route::post('mobileRegister','HomePageController@mobileRegister');

Route::get('homepage/mi_choose','HomePageController@mi_choose');
Route::get('homepage/mi_shopcar','HomePageController@mi_shopcar');
Route::get('homepage/mi_detail','HomePageController@mi_detail');

//邮箱
Route::get('homepage/sendEmail','HomePageController@sendEmail');


//邮箱注册
Route::get('homepage/emailAdd','HomePageController@emailAdd');
Route::post('emailAdd','HomePageController@emailAdd');
Route::post('emailRegister','HomePageController@emailRegister');

//退出登录
Route::get('homepage/LoginOut','HomePageController@LoginOut');
Route::get('LoginOut','HomePageController@LoginOut');

//后台登录
Route::post('adminstage/adminLogin','AdminStageController@adminLogin');
Route::get('adminstage/adminPage','AdminStageController@adminPage');
Route::post('adminLogin','AdminStageController@adminLogin');

//后台管理首页


//后台退出登录
Route::post('adminstage/adminLoginOut','AdminStageController@adminLoginOut');


//rbac中间件
Route::group(['middleware' => ['adminlogin']], function () {

    //后台首页
    Route::get('adminstage/adminFront','AdminStageController@adminFront');

    //添加管理员模块
    Route::get('adminstage/adminIndex','AdminStageController@adminIndex');
    Route::post('adminstage/adminIndexAdd','AdminStageController@adminIndexAdd');

    //展示管理员
    Route::get('adminstage/showAdmin','AdminStageController@showAdmin');

    //删除管理员
    Route::get('adminstage/adminDelete','AdminStageController@adminDelete');

    //修改管理员信息
    Route::get('adminstage/adminUpdate','AdminStageController@adminUpdate');
    Route::post('adminstage/adminInfoUpdate','AdminStageController@adminInfoUpdate');

    //添加角色
    Route::get('adminstage/identityAdd','AdminStageController@identityAdd');
    Route::post('adminstage/adminIdentity','AdminStageController@adminIdentity');

    //展示角色
    Route::get('adminstage/adminIdentityShow','AdminStageController@adminIdentityShow');

    //删除角色
    Route::get('adminstage/IdentityDelete','AdminStageController@IdentityDelete');

    //修改角色
    Route::get('adminstage/IdentityUpdate','AdminStageController@IdentityUpdate');
    Route::post('adminstage/IdentitySave','AdminStageController@IdentitySave');

    //添加权限
    Route::get('adminstage/AdminMissiom','AdminStageController@AdminMissiom');
    Route::post('adminstage/MissiomAdd','AdminStageController@MissiomAdd');

    //权限展示
    Route::get('adminstage/MissiomShow','AdminStageController@MissiomShow');

    //权限删除
    Route::get('adminstage/MissiomDelete','AdminStageController@MissiomDelete');

    //权限修改
    Route::get('adminstage/MissiomUpdate','AdminStageController@MissiomUpdate');
    Route::post('adminstage/MissiomUpdateInfo','AdminStageController@MissiomUpdateInfo');

    //用户分配角色
    Route::get('adminstage/adminAl','AdminStageController@adminAl');
    Route::post('adminstage/adminRole','AdminStageController@adminRole');

    //角色分配权限
    Route::get('adminstage/RoleIdentity','AdminStageController@RoleIdentity');
    Route::post('adminstage/RoleIdentityAdd','AdminStageController@RoleIdentityAdd');
});





