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
    <center><h3>商品展示</h3></center>
    <thead>
    <tr>
        <td style="text-align:center;">ID</td>
        <td style="text-align:center;">商品名</td>
        <td style="text-align:center;">价格</td>
        <td style="text-align:center;">图片</td>
        <td style="text-align:center;">归属类</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach($data as $v) { ?>
    <tr>
        <td style="text-align:center;">{{$v['id']}}</td>
        <td style="text-align:center;">{{$v['good_name']}}</td>
        <td style="text-align:center;">{{$v['good_price']}}</td>
        <td style="text-align:center;"><img src={{$v['good_img']}} alt="" height="40px" ></td>
        <td style="text-align:center;">{{$v['type_id']}}</td>
        <td style="text-align:center;">
            <a href="GoodDelete?id={{$v['id']}}">删除</a>
            <a href="GoodUpdate?id={{$v['id']}}">修改</a>
            <a href="GoodDistri?id={{$v['id']}}">分配</a>
        </td>
    </tr>
    <?php } ?>

    </tbody>
</table>


</body>
</html>
@stop