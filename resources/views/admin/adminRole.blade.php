@extends('adminlte::page')
@section('content_header')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">分配角色</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="post" action="/index.php/adminstage/adminRole">
            @csrf
            <div class="form-group">
                <label for="exampleInputPassword1">选择角色</label>
                <?php foreach($data as $v) { ?>
                <input type="checkbox" name="role[]" value={{$v['role_id']}}>{{$v['name']}}
                <?php } ?>
            </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">分配</button>
                <button class="btn btn-primary"><a href="{{url('adminstage/adminFront')}}" style="color:white">取消</a></button>
            </div>
        </form>
    </div>
@stop
