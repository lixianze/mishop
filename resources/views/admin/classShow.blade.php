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
    <center><h3>商品分类展示</h3></center>
    <thead>
    <tr>
        <td style="text-align:center;">ID</td>
        <td style="text-align:center;">分类名</td>
        <td style="text-align:center;">分类url</td>
        <td style="text-align:center;">分类p_id</td>
        <td style="text-align:center;">分类p_img</td>
        <td style="text-align:center;">操作</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach($data as $v) { ?>
    <tr>
        <td style="text-align:center;">{{$v['type_id']}}</td>
        <td style="text-align:center;">{{$v['shop_name']}}</td>
        <td style="text-align:center;">{{$v['shop_url']}}</td>
        <td style="text-align:center;">{{$v['p_id']}}</td>
        <td style="text-align:center;">{{$v['shop_img']}}</td>
        <td style="text-align:center;">
            <a href="classDelete?type_id={{$v['type_id']}}">删除</a>
            <a href="classUpdate?type_id={{$v['type_id']}}">修改</a>
        </td>
    </tr>

        <?php foreach($v['name'] as $k) { ?>
            <tr>
                <td style="text-align:center;">{{$k['type_id']}}</td>
                <td style="text-align:center;">--|--|{{$k['shop_name']}}</td>
                <td style="text-align:center;">{{$k['shop_url']}}</td>
                <td style="text-align:center;">{{$k['p_id']}}</td>
                <td style="text-align:center;">{{$k['shop_img']}}</td>
                <td style="text-align:center;">
                    <a href="classDelete?type_id={{$k['type_id']}}">删除</a>
                    <a href="classUpdate?type_id={{$k['type_id']}}">修改</a>
                    {{--<a href="classDistri?type_id={{$k['type_id']}}">分配</a>--}}
                </td>
            </tr>
        <?php } ?>

    <?php } ?>

    </tbody>
</table>


</body>
</html>
@stop