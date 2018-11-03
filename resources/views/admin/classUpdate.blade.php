@extends('adminlte::page')
@section('content_header')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">添加商品分类</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="post" action="/index.php/adminstage/adminClassUpdate">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">分类名称</label>
                    <input type="text" class="form-control" name="shop_name" id="exampleInputEmail1" placeholder="请输入分类名">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">分类url</label>
                    <input type="text" class="form-control" name="shop_url" id="exampleInputEmail1" placeholder="请输入分类url">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">分类图片</label>
                    <input type="file" name="shop_img">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">p_id</label>
                    <input type="text" class="form-control" name="p_id" id="exampleInputEmail1" placeholder="请输入分类p_id">
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">修改</button>
                <button class="btn btn-primary"><a href="{{url('adminstage/adminFront')}}" style="color:white">取消</a></button>
            </div>
        </form>
    </div>
@stop