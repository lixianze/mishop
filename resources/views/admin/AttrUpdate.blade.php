@extends('adminlte::page')
@section('content_header')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">修改属性</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="post" action="/index.php/adminstage/adminAttrUpdate">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">属性名称</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="请输入属性名" value={{$name}}>
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