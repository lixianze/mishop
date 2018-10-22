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
    <center><h3>角色列表展示</h3></center>
    <thead>
    <tr>
        <td style="text-align:center;">ID</td>
        <td style="text-align:center;">角色名</td>
        <td style="text-align:center;">操作</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach($data as $v) { ?>
    <tr>
        <td style="text-align:center;">{{$v['role_id']}}</td>
        <td style="text-align:center;">{{$v['name']}}</td>
        <td style="text-align:center;">
            <a href="IdentityDelete?role_id={{$v['role_id']}}">删除</a>
            <a href="IdentityUpdate?role_id={{$v['role_id']}}">修改</a>
            <a href="RoleIdentity?role_id={{$v['role_id']}}">分配</a>
        </td>
    </tr>
    <?php } ?>

    </tbody>
</table>


</body>
</html>
@stop