@extends('adminlte::page')
@section('content_header')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">修改商品</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="post" action="/index.php/adminstage/Update" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">商品名称</label>
                    <input type="text" class="form-control" name="good_name" id="exampleInputEmail1" placeholder="请输入商品名" value={{$result[0]['good_name']}}>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">商品价格</label>
                    <input type="number" class="form-control" name="good_price" id="exampleInputEmail1" placeholder="请输入商品价格" value={{$result[0]['good_price']}}>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">上传图片信息</label>
                    <input type="file"  name="good_img" >
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">归属类型</label>

                    <select name="type_id" id="">
                        {{--<option value={{$result[0]['type_id']}} selected="selected">{{$result[0]['shop_name']}}</option>--}}
                        <?php foreach($data as $v) { ?>
                        <option value={{$v['type_id']}}>{{$v['shop_name']}}</option>
                        <?php foreach($v['name'] as $c) { ?>
                        <option value={{$c['type_id']}}>------|{{$c['shop_name']}}</option>
                        <?php } ?>
                        <?php } ?>
                    </select>

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