<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:88:"D:\feiy_soft\PHPTutorial\WWW\tbaup\public/../application/admin\view\banner_item\add.html";i:1538447970;s:76:"D:\feiy_soft\PHPTutorial\WWW\tbaup\application\admin\view\common\header.html";i:1537854431;s:76:"D:\feiy_soft\PHPTutorial\WWW\tbaup\application\admin\view\common\footer.html";i:1537854431;}*/ ?>
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
                <label class="layui-form-label">轮播图位置</label>
                <div class="layui-inline">
                    <select name="banner_id" lay-verify="required">
                        <option value="0">请选择</option>
                        <?php if(is_array($bannerBit) || $bannerBit instanceof \think\Collection || $bannerBit instanceof \think\Paginator): $i = 0; $__LIST__ = $bannerBit;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$resData): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $resData['id']; ?>"><?php echo $resData['name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">轮播图标题</label>
                <div class="layui-col-md2">
                    <input type="text" name="name" lay-verify="name" autocomplete="off" placeholder="请输入轮播图标题" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">上传轮播图</label>
                <div class="layui-input-block upload-img-wrap">
                                <div id="uploader" class="uploader-item">
                <div class="uploader_btns">
                    <div class="filePicker"></div><div class="uploadBtn">上传轮播图</div>
                </div>
                <!--用来存放item-->
                <div class="queueList"></div>
            </div>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">轮播图类型</label>
                <div class="layui-input-block">
                    <input type="radio" name="url_type" value="1" title="图片" checked="">
                    <input type="radio" name="url_type" value="0" title="视频">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">上传视频</label>
                <div class="layui-input-block">
                    <!--<button type="button" class="layui-btn" id="test1">-->
                        <!--<i class="layui-icon">&#xe67c;</i>上传视频-->
                    <!--</button>-->
                    <div class="layui-upload-drag" id="test1">
                        <i class="layui-icon"></i>
                        <p>点击上传，或将文件拖拽到此处</p>
                    </div>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">跳转类型</label>
                <div class="layui-input-block">
                    <?php if(is_array($typeArr) || $typeArr instanceof \think\Collection || $typeArr instanceof \think\Paginator): $i = 0; $__LIST__ = $typeArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?>
                    <input type="radio" <?php if($key == 0): ?>checked<?php endif; ?> name="show_cate" value="<?php echo $key; ?>" title="<?php echo $type; ?>">
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">跳转id</label>
                <div class="layui-col-md1">
                    <input type="text" name="key_word" lay-verify="key_word" autocomplete="off" placeholder="请输入跳转id" class="layui-input">
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
            "upload_server": "<?php echo url('uploadImg'); ?>",
            'video_upload_server': "<?php echo url('uploadVideo'); ?>"
        };

        feiy_upload.init({
            server: config.upload_server,
            fileNumLimit: 1
        });
    </script>
    <script>

        layui.use(['form', 'layedit', 'laydate','upload'], function() {
            var form = layui.form,
                layer = layui.layer,
                upload = layui.upload;

            upload.render({
                elem: '#test1'
                ,url: "<?php echo url('uploadVideo'); ?>"
                ,method: 'post'
                ,size: 10000000
                ,done: function(res,index,upload){
                    console.log(res);
                }
                ,accept: 'file'
//                ,acceptMime: 'video/*'
            });
            //执行实例
//            var uploadInst = upload.render({
//                elem: '#test1' //绑定元素
//                ,url: "<?php echo url('uploadVideo'); ?>" //上传接口
//                ,done: function(res){
//                    //上传完毕回调
//                    console.log(res);
//                }
//                ,error: function(){
//                    //请求异常回调
//                }
//                ,accept: 'video'
//                ,acceptMime: 'video/*'
//                ,field: 'video'
//                ,drag: true
//            });
            //自定义验证规则
            form.verify({
                cate_name: function(value) {
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
                var cate_img_lists = $("#uploader .filelist > li");
                var cate_img_url = setUpdateUrl(cate_img_lists);
                var params = "&cate_img="+cate_img_url;
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