<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"D:\SoftDownload\wamp\www\tbaup\public/../application/admin\view\theme\add.html";i:1540364818;s:72:"D:\SoftDownload\wamp\www\tbaup\application\admin\view\common\header.html";i:1536755456;s:72:"D:\SoftDownload\wamp\www\tbaup\application\admin\view\common\footer.html";i:1535296431;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" type="text/css" href="/static/admin/css/global.css" media="all">
<link rel="stylesheet" href="/static/admin/plugins/layui/css/layui.css" media="all">
<link rel="stylesheet" href="/static/admin/css/style.css" media="all">
    <title>layui</title>
    <!--引入webuploaderCss-->
    <link href="/static/admin/plugins/webuploader/webuploader.css" rel="stylesheet">
    <link rel="stylesheet" href="/static/admin/css/formSelects-v4.css">
    <style>
        .form-container{ padding: 30px 60px;}
        .product-add-content{ margin-top: 30px;}
        .btn-add-reduce{ display: inline-block; width: 20px; text-align: center;}
    </style>
</head>

<body>
    <div class="form-container">
        <form class="layui-form" action="">
        <div class="layui-tab layui-form">
            <ul class="layui-tab-title">
                <li class="layui-this">基本信息</li>
                <li>主题内容</li>
                <li>关联商品</li>
            </ul>
            <div class="layui-tab-content product-add-content">

                <div class="layui-tab-item layui-show">
                    <div class="layui-form-item">
                        <label class="layui-form-label">主题名称</label>
                        <div class="layui-col-md2">
                            <input type="text" name="name" lay-verify="name" autocomplete="off" placeholder="请输入主题名称" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">主题描述</label>
                        <div class="layui-col-md4">
                            <textarea placeholder="请输入描述内容" name="description" class="layui-textarea"></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">上传封面图</label>
                        <div class="layui-input-block upload-img-wrap">
                                        <div id="uploader" class="uploader-item">
                <div class="uploader_btns">
                    <div class="filePicker"></div><div class="uploadBtn">上传封面图</div>
                </div>
                <!--用来存放item-->
                <div class="queueList"></div>
            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">上传头图</label>
                        <div class="layui-input-block upload-img-wrap">
                                        <div id="headImg" class="uploader-item">
                <div class="uploader_btns">
                    <div class="filePicker"></div><div class="uploadBtn">上传头图</div>
                </div>
                <!--用来存放item-->
                <div class="queueList"></div>
            </div>
                        </div>
                    </div>
                    <?php if(!empty($recposRes)): ?>
                    <div class="layui-form-item">
                        <label class="layui-form-label">推荐位</label>
                        <div class="layui-input-block">
                            <?php if(is_array($recposRes) || $recposRes instanceof \think\Collection || $recposRes instanceof \think\Paginator): $i = 0; $__LIST__ = $recposRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$recpos): $mod = ($i % 2 );++$i;?>
                            <input type="checkbox" name="recpos[]" value="<?php echo $recpos['id']; ?>" lay-skin="primary" title="<?php echo $recpos['name']; ?>"><div class="layui-unselect layui-form-checkbox layui-form-checked" lay-skin="primary"><span><?php echo $recpos['name']; ?></span><i class="layui-icon"></i></div>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="layui-form-item">
                        <label class="layui-form-label">上架</label>
                        <div class="layui-input-block">
                            <input type="radio" name="on_sale" value="1" title="上架">
                            <input type="radio" name="on_sale" value="0" title="下架" checked="">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                </div>
                <div class="layui-tab-item">
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">主题内容</label>
                        <div class="layui-input-block">
                            <textarea class="layui-textarea layui-hide" name="content" lay-verify="content" id="LAY_demo_editor"></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                </div>

                <div class="layui-tab-item">
                    <div class="layui-form layui-form-pane">
                        <div class="layui-form-item">
                            <div>
                            <label class="layui-form-label" style="height: 38px;">选择商品</label>
                            </div>
                            <div class="layui-input-block">
                                <select name="" xm-select="product-sel">
                                    <?php if(is_array($productDatas) || $productDatas instanceof \think\Collection || $productDatas instanceof \think\Paginator): $i = 0; $__LIST__ = $productDatas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
                                    <option value="id:<?php echo $data['id']; ?>;name:<?php echo $data['name']; ?>;main_img_url:201810242498a12186cc8aa381ebe30a3a3d5506;price:<?php echo $data['price']; ?>"><?php echo $data['name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <form action="" method="post">
                        <div class="layui-form news_list">
                            <table class="layui-table">
                                <thead>
                                <tr>
                                    <th width="30">ID</th>
                                    <th>产品名</th>
                                    <th>封面图</th>
                                    <th>描述</th>
                                    <th width="80">价格</th>
                                    <th width="50">排序</th>
                                    <th width="100">位置</th>
                                </tr>
                                </thead>
                                <tbody id="product-body-id" class="news_content list-box-body">
                                    <!--<tr>-->
                                        <!--<td align="center">1</td>-->
                                        <!--<td align="center">1</td>-->
                                        <!--<td align="center">1</td>-->
                                        <!--<td align="center">1</td>-->
                                        <!--<td align="center">1</td>-->
                                        <!--<td align="center"><input type="input" name="sort[1]" value="50" autocomplete="off" class="layui-input"></td>-->
                                        <!--<td align="center"><input type="input" name="position" value="" autocomplete="off" class="layui-input"></td>-->
                                    <!--</tr>-->
                                    <!--<tr class="sort-tr-wrap">-->
                                        <!--<td colspan="4" style="border:0;"></td>-->
                                        <!--<td align="center"><input type="input" name="price" value="" autocomplete="off" class="layui-input"></td>-->
                                        <!--<td colspan="2" style="border:0;"></td>-->
                                    <!--</tr>-->
                                </tbody>
                            </table>
                            <div class="larry-table-page clearfix">
                                <div class="paging">
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        </form>
    </div>

    <script type="text/javascript" src="/static/admin/plugins/layui/layui.js"></script>
<script type="text/javascript" src="/static/admin/js/jquery.js"></script>
<script src="/static/admin/js/common.js"></script>
    <!--引入webuploaderJS-->
    <script type="text/javascript" src="/static/admin/plugins/webuploader/webuploader.js"></script><script type="text/javascript" src="/static/admin/plugins/webuploader/feiy_upload.js"></script>
    <script src="/static/admin/js/formSelects-v4.min.js"></script>
    <script>
        var config = {
            "upload_server": "<?php echo url('uploadImg'); ?>"
        };

        feiy_upload.init({
            server: config.upload_server,
            fileNumLimit: 1
        });
        feiy_upload.init({
            wrap: $("#headImg"),
            filePicker: $("#headImg").find(".filePicker"),
            uploadId: "#headImg",
            server: config.upload_server,
            fileNumLimit: 1
        });


    </script>
    <script>
        // 删除上传图片
        cancelImg();
        
        function insertProduct($obj) {
            if(!$obj){
                return false;
            }
            var html = "<tr>"+
            "   <td align='center'>"+$obj.id+"</td>"+
            "    <td align='center'>"+$obj.name+"</td>"+
            "    <td align='center'>"+$obj.main_img_url+"</td>"+
            "    <td align='center'>不错哦</td>"+
            "    <td align='center'>"+$obj.price+"</td>"+
            "    <td align='center'><input type='input' name='sort[1]' value='50' autocomplete='off' style='padding: 0;' class='layui-input tc'></td>"+
            "    <td align='center'><input type='input' name='position' value='' autocomplete='off' class='layui-input'></td>"+
            "    </tr>";
            $("#product-body-id").append(html);
        }


        var formSelects = layui.formSelects;
        console.log(formSelects.value('product-sel'));
        formSelects.on('product-sel',function (id, vals, val, isAdd, isDisabled) {
//            console.log(isAdd);
//            $("#product-body-id").html('');
//            vals.forEach(function (val) {
//                var str = val.value.replace(/'/g,'\"').replace(/\\/g,'\/');
//                var valueJson = JSON.parse(str);
//                insertProduct(valueJson);
//            });

        },true);





        layui.use(['form', 'layedit', 'element', 'laydate', 'jquery'], function() {
            var form = layui.form,
                layer = layui.layer,
                layedit = layui.layedit,
                element = layui.element,
                $ = layui.jquery;

            $(".downpanel").on("click",".layui-select-title",function(e){
                var $select=$(this).parents(".layui-form-select");
                $(".layui-form-select").not($select).removeClass("layui-form-selected");
                $select.addClass("layui-form-selected");
                e.stopPropagation();
            }).on("click",".layui-form-checkbox",function(e){
                e.stopPropagation();
            });


            layedit.set({
                uploadImage: {
                    url: "<?php echo url('edituploadImg'); ?>", //接口url
                    type: 'post'
                },
                height: 560
            });
            //创建一个编辑器
            var editIndex = layedit.build('LAY_demo_editor');

            window.addrow = function(o){
                var div=$(o).parent();
                if($(o).html() == '[+]'){
                    var newdiv=div.clone();
                    newdiv.find('a').html('[-]');
                    div.after(newdiv);
                }else{
                    div.remove();
                }
                form.render('select');
            }

            //自定义验证规则
            form.verify({
                name: function(value) {
                   if (value.length < 2) {
                       return '标题至少得2个字符啊';
                   }
               },
                content: function(value) {

                }
            });

            form.on('select(type_id)',function (data) {
                var type_id = $(data.elem).val();
                $.ajax({
                    type:"POST",
                    url:"<?php echo url('property/ajaxGetAttr'); ?>",
                    data:{type_id:type_id},
                    dataType:"json",
                    success:function(res){
                        var html = '';
                        console.log(res);
                        res.forEach(function(data){
                            if(data.type == 1){
                                html+='<div class="layui-form-item">';
                                html+='<label class="layui-form-label">'+data.name+'</label>';
                                html+='<div class="layui-col-md6">';
                                html+='<div>';
                                var attrValuesArr = data.values.split(',');
                                html+='<a href="#" class="btn-add-reduce" onclick="addrow(this);">[+]</a>';

                                html+='<div class="layui-inline" style="width: 160px; margin-left: 6px;">';
                                html+='<select name="product_prop['+data.id+'][]" lay-filter="ss">';
                                html+='<option value="">请选择</option>';
                                for(var i=0; i<attrValuesArr.length; i++){
                                    html+="<option value='"+attrValuesArr[i]+"'>"+attrValuesArr[i]+"</option>";
                                }
                                html+='</select>';
                                html+='</div>';
                                html+='<div class="layui-inline">';
                                html+='<input type="text" name="prop_price[]" autocomplete="off" placeholder="请输入自定义价格" class="layui-input">';
                                html+='</div>';
                                html+='</div>';
                                html+='</div>';
                                html+='</div>';
                            }else{
                                if(data.values != ''){
                                    html+='<div class="layui-form-item">';
                                    html+='<label class="layui-form-label">'+data.name+'</label>';
                                    var attrValuesArr = data.values.split(',');
                                    html+='<div class="layui-inline" style="width: 160px; margin-left: 6px;">';
                                    html+='<select name="product_prop['+data.id+']" lay-filter="ss">';
                                    html+='<option value="">请选择</option>';
                                    for(var i=0; i<attrValuesArr.length; i++){
                                        html+="<option value='"+attrValuesArr[i]+"'>"+attrValuesArr[i]+"</option>";
                                    }
                                    html+='</select>';
                                    html+='</div>';
                                    html+='</div>';
                                }else{
                                    html+='<div class="layui-form-item">';
                                    html+='<label class="layui-form-label">'+data.name+'</label>';
                                    html+='<div class="layui-col-md2">';
                                    html+='<input type="text" name="product_prop['+data.id+']"  autocomplete="off" placeholder="请输入自定义属性值" class="layui-input">';
                                    html+='</div>';
                                    html+='</div>';
                                }
                            }



                        });
                        $("#prop_list").html(html);
                        form.render('select');
                    }
                });
            });



            //监听提交
            form.on('submit(demo1)', function(data) {
                layedit.sync(editIndex);
                var formDom = data.form;
                var main_img_lists = $("#uploader .filelist > li");
                var product_img_lists = $("#productImgs .filelist > li");
                var main_img_url = setUpdateUrl(main_img_lists);
                var product_img_url = setUpdateUrl(product_img_lists);
                var params = "&main_img_url="+main_img_url+'&product_img_url='+product_img_url;
                $.ajax({
                    url: "<?php echo url('save'); ?>",
                    type: "post",
                    data: $(formDom).serialize()+params,
                    success: function(res){
                        var msgParams = {
                            iconNum: 6,
                            anim: 0
                        };
                        if(res.code == 0){
                            msgParams.iconNum = 5;
                            msgParams.anim = 6;
                        }
                        layer.msg(res.msg, {icon: msgParams.iconNum,time:1000,anim:msgParams.anim});
                        setTimeout(function(){
                            if(res.data){
                                parent.window.location = res.data;
                            }
                        },1000);
                    }
                });


                return false;
            });


        });
    </script>

</body>

</html>