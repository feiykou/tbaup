<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:80:"D:\SoftDownload\wamp\www\tbaup\public/../application/admin\view\product\add.html";i:1537272373;s:72:"D:\SoftDownload\wamp\www\tbaup\application\admin\view\common\header.html";i:1536755456;s:72:"D:\SoftDownload\wamp\www\tbaup\application\admin\view\common\footer.html";i:1535296431;}*/ ?>
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
                <li>描述信息</li>
                <li>会员价格</li>
                <li>商品属性</li>
            </ul>
            <div class="layui-tab-content product-add-content">

                <div class="layui-tab-item layui-show">
                    <div class="layui-form-item">
                        <label class="layui-form-label">商品名称</label>
                        <div class="layui-col-md2">
                            <input type="text" name="name" lay-verify="name" autocomplete="off" placeholder="请输入商品名称" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">上传主图</label>
                        <div class="layui-input-block upload-img-wrap">
                                        <div id="uploader" class="uploader-item">
                <div class="uploader_btns">
                    <div class="filePicker"></div><div class="uploadBtn">上传图片</div>
                </div>
                <!--用来存放item-->
                <div class="queueList"></div>
            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">上传产品图（多图）</label>
                        <div class="layui-input-block upload-img-wrap">
                                        <div id="productImgs" class="uploader-item">
                <div class="uploader_btns">
                    <div class="filePicker"></div><div class="uploadBtn">上传产品图</div>
                </div>
                <!--用来存放item-->
                <div class="queueList"></div>
            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">上架</label>
                        <div class="layui-input-block">
                            <input type="radio" name="on_sale" value="1" title="上架">
                            <input type="radio" name="on_sale" value="0" title="下架" checked="">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">所属栏目</label>
                        <div class="layui-inline">
                            <select name="category_id">
                                <option value="0">顶级分类</option>
                                <?php if(is_array($CategoryRes) || $CategoryRes instanceof \think\Collection || $CategoryRes instanceof \think\Paginator): $i = 0; $__LIST__ = $CategoryRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$resData): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo $resData['id']; ?>"><?php if($resData['pid'] != 0): ?>┞<?php endif; ?><?php echo str_repeat('┄',$resData['level']*2); ?><?php echo $resData['cate_name']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">所属主题</label>
                        <div class="layui-inline">
                            <select name="theme_id">
                                <option value="0">顶级分类</option>
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">市场价</label>
                        <div class="layui-col-md2">
                            <input type="text" name="market_price" lay-verify="market_price" autocomplete="off" placeholder="请输入市场价" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">本店价</label>
                        <div class="layui-col-md2">
                            <input type="text" name="price" lay-verify="price" autocomplete="off" placeholder="请输入本店价" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">重量</label>
                        <div class="layui-col-md1">
                            <input type="text" name="weight" lay-verify="weight" autocomplete="off" placeholder="请输入重量" class="layui-input">
                        </div>
                        <div class="layui-inline" style="width: 50px; margin-left: 6px; text-align: center;">
                            <input type="text" name="unit" lay-verify="unit" autocomplete="off" class="layui-input" value="kg">
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
                        <label class="layui-form-label">编辑器</label>
                        <div class="layui-input-block">
                            <textarea class="layui-textarea layui-hide" name="description" lay-verify="description" id="LAY_demo_editor"></textarea>
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
                    <?php if(is_array($mlRes) || $mlRes instanceof \think\Collection || $mlRes instanceof \think\Paginator): $i = 0; $__LIST__ = $mlRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mlData): $mod = ($i % 2 );++$i;?>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo $mlData['name']; ?></label>
                        <div class="layui-col-md2">
                            <input type="text" name="mp[<?php echo $mlData['id']; ?>]" autocomplete="off" placeholder="级别价格" class="layui-input">
                        </div>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                </div>

                <div class="layui-tab-item">
                    <div class="layui-form-item">
                        <label class="layui-form-label">商品类型</label>
                        <div class="layui-inline">
                            <select name="type_id" lay-filter="type_id">
                                <option value="0">请选择</option>
                                <?php if(is_array($typeRes) || $typeRes instanceof \think\Collection || $typeRes instanceof \think\Paginator): $i = 0; $__LIST__ = $typeRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$resData): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo $resData['id']; ?>"><?php echo $resData['name']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                    <div id="prop_list"></div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                    <!--<div class="layui-form-item">-->
                        <!--<div class="layui-input-block">-->
                            <!--<button class="layui-btn" lay-submit="" lay-filter="demo2">立即提交</button>-->
                            <!--<button type="reset" class="layui-btn layui-btn-primary">重置</button>-->
                        <!--</div>-->
                    <!--</div>-->
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
    <script>
        var config = {
            "upload_server": "<?php echo url('uploadImg'); ?>"
        };

        feiy_upload.init({
            server: config.upload_server,
            fileNumLimit: 1
        });
        feiy_upload.init({
            wrap: $("#productImgs"),
            filePicker: $("#productImgs").find(".filePicker"),
            uploadId: "#productImgs",
            server: config.upload_server,
            fileNumLimit: 5
        });


    </script>
    <script>
        // 删除上传图片
        cancelImg();

        layui.use(['form', 'layedit', 'element', 'laydate', 'jquery'], function() {
            var form = layui.form,
                layer = layui.layer,
                layedit = layui.layedit,
                element = layui.element,
                $ = layui.jquery;
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