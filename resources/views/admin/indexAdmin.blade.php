@extends('adminlte::page')
@section('content_header')
        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<table class="table table-striped">
    <center><h3>管理员展示</h3></center>
    <thead>
    <tr>
        <td style="text-align:center;">ID</td>
        <td style="text-align:center;">管理员名称</td>
        <td style="text-align:center;">邮箱地址</td>
        <td style="text-align:center;">管理员状态</td>
        <td style="text-align:center;">是否超级管理员</td>
        <td style="text-align:center;">创建时间</td>
        <td style="text-align:center;">创建者</td>
        <td style="text-align:center;">操作</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach($data as $v) { ?>
    <tr>
        <td style="text-align:center;">{{$v['user_id']}}</td>
        <td style="text-align:center;">{{$v['admin_name']}}</td>
        <td style="text-align:center;">{{$v['admin_email']}}</td>
        <td style="text-align:center;">
            <?php
            if($v['admin_status']==1){
                echo "正常";
            }elseif($v['admin_status']==0)
            {
                echo "冻结";
            }
            ?>
        </td>
        <td style="text-align:center;"><?php
            if($v['is_super'] == 1){
                echo "是";
            }else{
                echo "否";
            }
            ?>
        </td>
        <td style="text-align:center;">{{$v['create_time']}}</td>
        <td style="text-align:center;">{{$v['create_name']}}</td>
        <td style="text-align:center;">
            <a href="adminDelete?user_id={{$v['user_id']}}">删除</a>
            <a href="adminUpdate?user_id={{$v['user_id']}}">修改</a>
            <a href="adminAl?user_id={{$v['user_id']}}">分配</a>
        </td>
    </tr>
    <?php } ?>

    </tbody>
</table>


</body>
</html>
@stop