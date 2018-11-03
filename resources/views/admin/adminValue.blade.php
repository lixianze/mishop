@extends('adminlte::page')
@section('content_header')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">添加商品分类</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="post" action="/index.php/adminstage/adminValueAdd">
            @csrf
            <div class="box-body">
                <select name="attr_id" id="">
                    <?php foreach($data as $v) { ?>
                    <option value={{$v['attr_id']}}>{{$v['name']}}</option>
                    <?php } ?>
                </select>
                <div class="form-group">
                    <label for="exampleInputEmail1">属性值名称</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="请输入属性值">
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">添加</button>
                <button class="btn btn-primary"><a href="{{url('adminstage/adminFront')}}" style="color:white">取消</a></button>
            </div>
        </form>
    </div>
@stop