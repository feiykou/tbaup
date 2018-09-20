<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:79:"D:\SoftDownload\wamp\www\tbaup\public/../application/admin\view\recpos\add.html";i:1537369367;s:72:"D:\SoftDownload\wamp\www\tbaup\application\admin\view\common\header.html";i:1536755456;s:72:"D:\SoftDownload\wamp\www\tbaup\application\admin\view\common\footer.html";i:1535296431;}*/ ?>
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
        .form-container{ padding-top: 30px;}
    </style>
</head>

<body>
    <div class="form-container">
        <form class="layui-form" action="">
            <div class="layui-form-item">
                <label class="layui-form-label">推荐位名称</label>
                <div class="layui-col-md2">
                    <input type="text" name="name" lay-verify="name" autocomplete="off" placeholder="请输入推荐位名称" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">推荐位类型</label>
                <div class="layui-input-block">
                    <input type="radio" name="type" value="1" title="商品" checked>
                    <input type="radio" name="type" value="2" title="类型">
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript" src="/static/admin/plugins/layui/layui.js"></script>
<script type="text/javascript" src="/static/admin/js/jquery.js"></script>
<script src="/static/admin/js/common.js"></script>

    <script>
        layui.use(['form', 'layedit', 'laydate'], function() {
            var form = layui.form,
                layer = layui.layer;

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

            //监听提交
            form.on('submit(demo1)', function(data) {
                var formDom = data.form;
                $.ajax({
                    url: "<?php echo url('save'); ?>",
                    type: "post",
                    data: $(formDom).serialize(),
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