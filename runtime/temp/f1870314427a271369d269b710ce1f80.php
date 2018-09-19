<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:80:"D:\SoftDownload\wamp\www\tbaup\public/../application/admin\view\index\index.html";i:1535288840;s:72:"D:\SoftDownload\wamp\www\tbaup\application\admin\view\common\header.html";i:1536755456;s:70:"D:\SoftDownload\wamp\www\tbaup\application\admin\view\common\left.html";i:1537365868;s:72:"D:\SoftDownload\wamp\www\tbaup\application\admin\view\common\footer.html";i:1535296431;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" type="text/css" href="/static/admin/css/global.css" media="all">
<link rel="stylesheet" href="/static/admin/plugins/layui/css/layui.css" media="all">
<link rel="stylesheet" href="/static/admin/css/style.css" media="all">
    <title>KIT ADMIN</title>
    <link rel="stylesheet" href="/static/admin/css/app.css" media="all">
</head>

<body>
    <div class="layui-layout layui-layout-admin kit-layout-admin">
        <div class="layui-header">
            <div class="layui-logo">KIT ADMIN</div>
            <div class="layui-logo kit-logo-mobile">K</div>
            <ul class="layui-nav layui-layout-left kit-nav">
                <li class="layui-nav-item"><a href="javascript:;">控制台</a></li>
                <li class="layui-nav-item"><a href="javascript:;">商品管理</a></li>
                <li class="layui-nav-item"><a href="javascript:;" id="pay"><i class="fa fa-gratipay" aria-hidden="true"></i> 捐赠我</a></li>
                <li class="layui-nav-item">
                    <a href="javascript:;">其它系统</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">邮件管理</a></dd>
                        <dd><a href="javascript:;">消息管理</a></dd>
                        <dd><a href="javascript:;">授权管理</a></dd>
                    </dl>
                </li>
            </ul>
            <ul class="layui-nav layui-layout-right kit-nav">
                <li class="layui-nav-item">
                    <a href="javascript:;">
                        <img src="http://m.zhengjinfan.cn/images/0.jpg" class="layui-nav-img"> Van
                    </a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">基本资料</a></dd>
                        <dd><a href="javascript:;">安全设置</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item"><a href="javascript:;"><i class="fa fa-sign-out" aria-hidden="true"></i> 注销</a></li>
            </ul>
        </div>

        <div class="layui-side layui-bg-black kit-side">
    <div class="layui-side-scroll">
        <div class="kit-side-fold"><i class="fa fa-navicon" aria-hidden="true"></i></div>
        <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
        <ul class="layui-nav layui-nav-tree" kit-navbar>
            <li class="layui-nav-item">
                <a class="" href="javascript:;"><i class="fa fa-plug" aria-hidden="true"></i><span> 品牌</span></a>
                <dl class="layui-nav-child">
                    <dd>
                        <a href="javascript:;" data-url="<?php echo url('brand/lst'); ?>" data-icon="&#xe6c6;" data-title="品牌分类" data-id="50" kit-target><i class="layui-icon">&#xe6c6;</i><span>品牌分类</span></a>
                    </dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;"><i class="fa fa-plug" aria-hidden="true"></i><span> 商品</span></a>
                <dl class="layui-nav-child">
                    <dd><a href="javascript:;" kit-target  data-url="<?php echo url('category/lst'); ?>"  data-icon="&#xe658;" data-title="商品分类" data-id="51"><i class="layui-icon">&#xe658;</i><span> 商品分类</span></a></dd>
                    <dd><a href="javascript:;" kit-target  data-url="<?php echo url('type/lst'); ?>"  data-icon="&#xe658;" data-title="商品类型" data-id="52"><i class="layui-icon">&#xe658;</i><span> 商品类型</span></a></dd>
                    <dd><a href="javascript:;" kit-target  data-url="<?php echo url('property/lst'); ?>"  data-icon="&#xe658;" data-title="商品属性" data-id="53"><i class="layui-icon">&#xe658;</i><span> 商品属性</span></a></dd>
                    <dd><a href="javascript:;" kit-target data-url="<?php echo url('product/lst'); ?>"  data-icon="&#xe658;" data-title="商品" data-id="54"><i class="layui-icon">&#xe658;</i><span> 商品</span></a></dd>
                    <dd><a href="javascript:;" kit-target data-options="<?php echo url("","",true,false);?>"><i class="layui-icon">&#xe658;</i><span> app.js主入口</span></a></dd>
                </dl>
            </li>
            <li class="layui-nav-item layui-nav-itemed">
                <a href="javascript:;"><i class="fa fa-plug" aria-hidden="true"></i><span> 会员管理</span></a>
                <dl class="layui-nav-child">
                    <dd><a href="javascript:;" kit-target  data-url="<?php echo url('category/lst'); ?>"  data-icon="&#xe658;" data-title="会员列表" data-id="61"><i class="layui-icon">&#xe658;</i><span> 会员列表</span></a></dd>
                    <dd><a href="javascript:;" kit-target  data-url="<?php echo url('MemberLevel/lst'); ?>"  data-icon="&#xe658;" data-title="会员级别" data-id="62"><i class="layui-icon">&#xe658;</i><span> 会员级别</span></a></dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;" data-url="<?php echo url('recpos/lst'); ?>" data-name="table"  data-icon="&#xe658;" data-title="推荐位" data-id="81" kit-target><i class="fa fa-plug" aria-hidden="true"></i><span> 推荐位</span></a>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;" data-url="/views/form.html" data-name="form" kit-loader><i class="fa fa-plug" aria-hidden="true"></i><span> 表单(page)</span></a>
            </li>
        </ul>
    </div>
</div>
        <div class="layui-body" id="container">
            <!-- 内容主体区域 -->
            <div style="padding: 15px;">主体内容加载中,请稍等...</div>
        </div>

        <div class="layui-footer">
            <!-- 底部固定区域 -->
            2017 &copy;
            <a href="http://kit.zhengjinfan.cn/">kit.zhengjinfan.cn/</a> MIT license

        </div>
    </div>

    <script type="text/javascript" src="/static/admin/plugins/layui/layui.js"></script>
<script type="text/javascript" src="/static/admin/js/jquery.js"></script>
<script src="/static/admin/js/common.js"></script>
    <script>
        var message;
        layui.config({
            base: '/static/admin/js/'
        }).use(['app', 'message'], function() {
            var app = layui.app,
                $ = layui.jquery,
                layer = layui.layer;
            //将message设置为全局以便子页面调用
            message = layui.message;
            //主入口
            app.set({
                type: 'iframe'
            }).init();
            $('#pay').on('click', function() {
                layer.open({
                    title: false,
                    type: 1,
                    content: '<img src="/static/admin/images/pay.png" />',
                    area: ['500px', '250px'],
                    shadeClose: true
                });
            });
        });
    </script>
</body>

</html>