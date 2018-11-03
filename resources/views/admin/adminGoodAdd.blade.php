<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('adminlte::page')
@section('content_header')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">添加商品</h3>
        </div>
        <script type="text/javascript" src="/js/wangEditor.js"></script>
        <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

        <!-- /.box-header -->
        <!-- form start -->
        <form method="post" action="/index.php/adminstage/GoodAdd" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">商品名称</label>
                    <input type="text" class="form-control" name="good_name" id="exampleInputEmail1" placeholder="请输入商品名">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">商品价格</label>
                    <input type="number" class="form-control" name="good_price" id="exampleInputEmail1" placeholder="请输入商品价格">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">商品详情</label>
                    <div id="editor">

                    </div>
                    <textarea name="description" id="text1" style="width:100%; height:200px;"></textarea>
                </div>


                <div class="form-group">
                    <label for="exampleInputEmail1">上传图片信息</label>
                    <input type="file"  name="good_img" id="exampleInputEmail1" placeholder="请输入商品价格">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">商品类型</label>

                    <select name="type_id" id="typeSelect">
                        <option value="0" >请选择类型</option>
                        <?php foreach($data as $v) { ?>
                        <option value={{$v['type_id']}}>{{$v['shop_name']}}</option>
                            <?php foreach($v['name'] as $c) { ?>
                                <option value={{$c['type_id']}}>------|{{$c['shop_name']}}</option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group" hidden id="attrs">
                    <label for="exampleInputEmail1">商品属性</label>
                    <select id="selectAttr" class="form-control select2" multiple="multiple" data-placeholder="请选择商品属性" style="width: 100%;">
                    </select>
                </div>
                <div class="form-group" hidden id="attrValueDiv">
                    <label>属性值</label>
                    <table id="attrValue">

                    </table>
                </div>
                <div class="form-group" hidden id="attrShop"><input id="addShop" type="button" value="添加货品" class="btn btn-primary"></div>
                <div class="form-group" hidden id="attrShopValue">
                    <label for="exampleInputEmail1">货品组合</label>
                    <table class="table table-striped" border="1">
                    <thead>
                    <tr>
                        <td style="text-align:center;">组合类型</td>
                        <td style="text-align:center;">货品编号</td>
                        <td style="text-align:center;">价格</td>
                        <td style="text-align:center;">库存</td>
                        <td style="text-align:center;">操作</td>
                    </tr></thead>
                    <tbody class="valueList">

                    </tbody>
                    </table>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">添加</button>
                    <button class="btn btn-primary"><a href="{{url('adminstage/adminFront')}}" style="color:white">取消</a></button>
                </div>
            </div>

        </form>
    </div>
    <script type="text/javascript">
        $(function(){
            $('.select2').select2();
        });

        $(function(){
            $(".select2").change(function() {
                $('#attrShop').show();
            });
            $("#addShop").click(function(){
                $('#attrShopValue').show();
                    var name = [];
                    var value = [];
                    $('.tr_attr_val').each(function () {
                        var name_son = [];
                        var value_son = [];
                        $(this).find('.attr_values').each(function () {
                            if ($(this).is(":checked")) {
                                name_son.push($(this).val());
                                value_son.push($(this).parent().text());
                            }
                        });
                        name.push(name_son);
                        value.push(value_son);
                    });


                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: "post",
                    url: "/adminstage/shopAdd",
                    data: {value:value,name:name},
                    success: function(msg){
//                        console.log(msg);return;
                        var value = "";
                        for (var i in msg[0]){
                            value += "<tr><td><input type='hidden' name='attr_value_id[]' value='"+msg[1][i]+"' /><input type='text' style=' border-width:0'  name='sku_str[]' value='"+msg[0][i]+"' /><td>"+"<input name='sku_no[]' style=' border-width:0' value='"+msg[1][i].replace(/,/g,'')+Date.parse(new Date())+"'/>"+"</td>"+"<td>"+"<input name='price[]'>"+"</td>"+"<td>"+"<input name='invoutory[]'>"+"</td>"+"<td>"+"<button>删除<tton>"+"</td>"+"</tr>";
                        }
                        $(".valueList").html(value);
                    }
                });
            });
        });



        $(function(){
            $('.select2').select2();
            $(".select2").change(function(){
                var attr_id = $(this).val();
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: "post",
                    url: "/index.php/adminstage/getAttrsValue",
                    data: "attr_id="+attr_id,
                    success: function(msg){
//                        console.log(msg);
                        var selectAttr = "";
                        var selectAttr1 = "";
                        var selectAttr2= "";
                        for(var i in msg){
                            if(msg[i]['attr_id'] == 1){
                                selectAttr +=  "<td>"+'<input type="checkbox"  class="attr_values" value="'+msg[i]['attr_value_id']+'">'+msg[i]['name']+''+'';
                            }
                            if(msg[i]['attr_id'] == 2){
                                selectAttr1 +=  "<td>"+'<input type="checkbox"  class="attr_values" value="'+msg[i]['attr_value_id']+'">'+msg[i]['name']+''+'';
                            }
                            if(msg[i]['attr_id'] == 3){
                                selectAttr2 +=  "<td>"+'<input type="checkbox"  class="attr_values" value="'+msg[i]['attr_value_id']+'">'+msg[i]['name']+''+'';
                            }
                        }
                        $("#attrValue").html("<tr class='tr_attr_val'>"+selectAttr+"</td></tr>"+"<tr class='tr_attr_val'>"+selectAttr1+"</td></tr>"+"<tr class='tr_attr_val'>"+selectAttr2+"</td></tr>");
                        $('#attrValueDiv').show();
                        // console.log(msg);
                    }
                });
            })
        });

        $("#typeSelect").change(function(){
            var type_id = $(this).val();
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "post",
                url: "/index.php/adminstage/getAttrs",
                data: "type_id="+type_id,
                success: function(msg){
//                    console.log(msg);
                    var selectAttr = "";
                    for(var i in msg){
                        selectAttr += "<option name='attr_id[]' value='"+msg[i]["attr_id"]+"'>"+msg[i]["name"]+"</option>";
                    }
                    $("#selectAttr").html(selectAttr);
                    $('#attrs').show();
                }
            });
        });

        var E = window.wangEditor
        var editor = new E('#editor')
        var $text1 = $('#text1')
        // 或者 var editor = new E( document.getElementById('editor') )
//        editor.create();
        editor.customConfig.onchange = function (html) {
            // 监控变化，同步更新到 textarea
            $text1.val(html)
        }
        editor.create()
        // 初始化 textarea 的值
        $text1.val(editor.txt.html())


    </script>
@stop
