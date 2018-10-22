@extends('adminlte::page')
@section('content_header')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">修改权限信息</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="post" action="/index.php/adminstage/MissiomUpdateInfo">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">权限名称</label>
                    <input type="text" class="form-control"  name="text" id="exampleInputEmail1" placeholder="请输入权限名">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">icon</label>
                    <input type="text" class="form-control"  name="icon" id="exampleInputEmail1" placeholder="请输入icon">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">url</label>
                    <input type="text" class="form-control"  name="url" id="exampleInputEmail1" placeholder="请输入url">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">父级id</label>
                    <input type="text" class="form-control"  name="menu_id" id="exampleInputEmail1" placeholder="请输入父级id">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">path</label>
                    <input type="text" class="form-control"  name="path" id="exampleInputEmail1" placeholder="请输入path">
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">修改</button>
                <button class="btn btn-primary"><a href="{{url('adminstage/adminFront')}}" style="color:white">取消</a></button>
            </div>
        </form>
    </div>
@stop