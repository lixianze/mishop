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
    <center><h3>权限列表展示</h3></center>
    <thead>
    <tr>
        <td style="text-align:center;">ID</td>
        <td style="text-align:center;">权限</td>
        <td style="text-align:center;">icon</td>
        <td style="text-align:center;">url</td>
        <td style="text-align:center;">menu_id</td>
        <td style="text-align:center;">path</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach($data as $v) { ?>
    <tr>
        <td style="text-align:center;">{{$v['id']}}</td>
        <td style="text-align:center;">{{$v['text']}}</td>
        <td style="text-align:center;">{{$v['icon']}}</td>
        <td style="text-align:center;">{{$v['url']}}</td>
        <td style="text-align:center;">{{$v['menu_id']}}</td>
        <td style="text-align:center;">{{$v['path']}}</td>
        <td style="text-align:center;">
            <a href="MissiomDelete?id={{$v['id']}}">删除</a>
            <a href="MissiomUpdate?id={{$v['id']}}">修改</a>
        </td>
    </tr>
    <?php } ?>

    </tbody>
</table>


</body>
</html>
@stop