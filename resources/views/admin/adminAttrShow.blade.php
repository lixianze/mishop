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
    <center><h3>属性展示</h3></center>
    <thead>
    <tr>
        <td style="text-align:center;">ID</td>
        <td style="text-align:center;">属性名</td>
        <td style="text-align:center;">操作</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach($data as $v) { ?>
    <tr>
        <td style="text-align:center;">{{$v['attr_id']}}</td>
        <td style="text-align:center;">{{$v['name']}}</td>
        <td style="text-align:center;">
            <a href="AttrDelete?attr_id={{$v['attr_id']}}">删除</a>
            <a href="AttrUpdate?attr_id={{$v['attr_id']}}&name={{$v['name']}}">修改</a>
        </td>
    </tr>
    <?php } ?>

    </tbody>
</table>


</body>
</html>
@stop