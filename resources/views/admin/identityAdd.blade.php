@extends('adminlte::page')
@section('content_header')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">添加角色</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="post" action="/index.php/adminstage/adminIdentity">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">角色名称</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="请输入角色名">
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
                <button type="submit" class="btn btn-primary">添加</button>
                <button class="btn btn-primary"><a href="{{url('adminstage/adminFront')}}" style="color:white">取消</a></button>
            </div>
        </form>
    </div>
@stop