@extends('adminlte::page')
@section('content_header')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">修改管理员信息</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="post" action="/index.php/adminstage/adminInfoUpdate">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">管理员名称</label>
                    <input type="text" class="form-control"  name="admin_name" id="exampleInputEmail1" placeholder="请输入管理员用户名">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">邮箱地址</label>
                    <input type="email" class="form-control" name="admin_email" id="exampleInputEmail1" placeholder="请输入有效的邮箱地址">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">密码</label>
                    <input type="password" class="form-control" name="admin_pwd" id="exampleInputPassword1" placeholder="请输入密码">
                </div>
                {{--<div class="form-group">--}}
                {{--<label for="exampleInputFile">File input</label>--}}
                {{--<input type="file" id="exampleInputFile">--}}

                {{--<p class="help-block">Example block-level help text here.</p>--}}
                {{--</div>--}}
                {{--<div class="checkbox">--}}
                {{--<label>--}}
                {{--<input type="checkbox"> Check me out--}}
                {{--</label>--}}
                {{--</div>--}}
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">修改</button>
                <button class="btn btn-primary"><a href="{{url('adminstage/adminFront')}}" style="color:white">取消</a></button>
            </div>
        </form>
    </div>
@stop