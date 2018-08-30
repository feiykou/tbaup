<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:79:"D:\SoftDownload\wamp\www\tbaup\public/../application/admin\view\brand\edit.html";i:1535558856;s:72:"D:\SoftDownload\wamp\www\tbaup\application\admin\view\common\header.html";i:1535288783;s:72:"D:\SoftDownload\wamp\www\tbaup\application\admin\view\common\footer.html";i:1535296431;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" type="text/css" href="/static/admin/css/global.css" media="all">
<link rel="stylesheet" href="/static/admin/plugins/layui/css/layui.css" media="all">

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
            <input type="hidden" value="<?php echo $brandData['id']; ?>" name="id">
            <div class="layui-form-item">
                <label class="layui-form-label">品牌名称</label>
                <div class="layui-input-block">
                    <input type="text" value="<?php echo $brandData['brand_name']; ?>" name="brand_name" lay-verify="brand_name" autocomplete="off" placeholder="请输入标题" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">品牌网址</label>
                <div class="layui-input-block">
                    <input type="text" value="<?php echo $brandData['brand_url']; ?>" name="brand_url" lay-verify="required|brand_url" placeholder="请输入" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">品牌LOGO</label>
                <div class="layui-input-block upload-img-wrap">
                                <div id="uploader" class="uploader-item">
                <div class="uploader_btns">
                    <div class="filePicker"></div><div class="uploadBtn">上传LOGO</div>
                </div>
                <!--用来存放item-->
                <div class="queueList">
                    <?php if($brandData['brand_img'] != ''): ?>
                    <ul class="filelist filelist-exist clearfix">
                        <li class="state-complete" data-src="<?php echo $brandData['brand_img']; ?>">
                            <p class="imgWrap"><img src="<?php echo $brandData['brand_img']; ?>" width="110" height="110"></p>
                            <div class="file-panel"><span class="cancel">删除</span></div>
                            <span class="success"></span>
                        </li>
                    </ul>
                    <?php endif; ?>
                    </div>
            </div>
                </div>
            </div>

            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">品牌描述</label>
                <div class="layui-input-block">
                    <textarea placeholder="请输入内容" name="brand_description" class="layui-textarea"><?php echo $brandData['brand_description']; ?></textarea>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">品牌状态</label>
                <div class="layui-input-block">
                    <input type="radio" name="status" value="1" title="显示" <?php if($brandData['status'] == 1): ?>checked<?php endif; ?>>
                    <input type="radio" name="status" value="0" title="隐藏" <?php if($brandData['status'] == 0): ?>checked<?php endif; ?>>
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

        // 检查图片数量是否超过设置值，超出则禁止
        $(function () {
            checkUpload();
        });

        function checkUpload(){
            var logo_img = $("#uploader .filelist > li");

            setTimeout(function(){
                setNoDrop(logo_img,1);
            },500);
        }

        function setNoDrop($dom,num){
            var num = num?num:1;
            var length = $dom.length;
            console.log(length,num);
            if(length >=num){
                $dom.parents(".queueList").prev().find(".webuploader-pick").css({
                    'position': 'relative',
                    'zIndex': 1,
                    'background': '#f0f0f0',
                    'cursor': 'no-drop'
                });
            }
        }


        // 图片编辑
        $(".filelist-exist").parents(".queueList").css({
            'display': 'block',
            'opacity': 1
        });
        $(".filelist-exist").find("li").hover(function(){
            $(this).find(".file-panel").stop(true).animate({height:"30px"},300);
        },function(){
            $(this).find(".file-panel").stop(true).animate({height:0},300);
        });

        $(".filelist-exist").on("click","span.cancel",function(){
            $btnDom = $(this).parents(".queueList").prev().find(".webuploader-pick");
            $btnDom.css({
                'background': "none",
                'cursor': 'pointer',
                'z-index': 0});
            $li = $(this).parents("li");
            $parents = $li.parents('.filelist-exist');
            $li.remove();
            if($parents.find("li").length == 0){
                $parents.remove();
            }
        });
    </script>
    <script>
        layui.use(['form', 'layedit', 'laydate'], function() {
            var form = layui.form,
                layer = layui.layer;

            //自定义验证规则
            form.verify({
//                brand_name: function(value) {
//                    if (value.length < 2) {
//                        return '标题至少得2个字符啊';
//                    }
//                },
//                brand_url: [/(^#)|(^http(s*):\/\/[^\s]+\.[^\s]+)/,"链接格式不正确"],
                content: function(value) {

                }
            });

            //监听提交
            form.on('submit(demo1)', function(data) {
                var formDom = data.form;
                var logo_img = $("#uploader .filelist > li");
                var logo_img_url = setUpdateUrl(logo_img);
                var params = "&brand_img="+logo_img_url;
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