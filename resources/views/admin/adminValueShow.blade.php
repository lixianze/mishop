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
    <center><h3>商品属性展示</h3></center>
    <thead>
    <tr>
        <td style="text-align:center;">ID</td>
        <td style="text-align:center;">属性名</td>
        <td style="text-align:center;">属性值</td>
        <td style="text-align:center;">操作</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach($data as $v) { ?>


    <tr>
        <td style="text-align:center;">{{$v['attr_value_id']}}</td>

        <td style="text-align:center;">{{$v['attr']['name']}}</td>

        <td style="text-align:center;">{{$v['name']}}</td>
        <td style="text-align:center;">
            <a href="valueDelete?attr_value_id={{$v['attr_value_id']}}">删除</a>
            <a href="valueUpdate?attr_value_id={{$v['attr_value_id']}}&attr_name={{$v['attr']['name']}}&name={{$v['name']}}">修改</a>
        </td>

    </tr>

    <?php } ?>

    </tbody>
</table>


</body>
</html>
@stop