<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"D:\SoftDownload\wamp\www\tbaup\public/../application/admin\view\brand\lst.html";i:1535466005;s:72:"D:\SoftDownload\wamp\www\tbaup\application\admin\view\common\header.html";i:1535288783;s:72:"D:\SoftDownload\wamp\www\tbaup\application\admin\view\common\footer.html";i:1535296431;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" type="text/css" href="/static/admin/css/global.css" media="all">
<link rel="stylesheet" href="/static/admin/plugins/layui/css/layui.css" media="all">

	<title>个人信息</title>
	<link rel="stylesheet" type="text/css" href="/static/admin/css/personal.css" media="all">
</head>
<body>
<section class="layui-larry-box">
	<div class="larry-personal">
	    <div class="layui-tab">
            <blockquote class="layui-elem-quote news_search">
		
		<div class="layui-inline">
		    <div class="layui-input-inline">
		    	<input value="" placeholder="请输入关键字" class="layui-input search_input" type="text">
		    </div>
		    <a class="layui-btn search_btn">查询</a>
		</div><div class="layui-inline" onclick="add('添加品牌','<?php echo url('add'); ?>')">
			<a class="layui-btn layui-btn-normal newsAdd_btn">添加品牌</a>
		</div>
		<div class="layui-inline">
			<a class="layui-btn recommend" style="background-color:#5FB878">推荐文章</a>
		</div>
		<div class="layui-inline">
			<a class="layui-btn audit_btn">审核文章</a>
		</div>
		<div class="layui-inline">
			<a class="layui-btn layui-btn-danger batchDel">批量删除</a>
		</div>
		<div class="layui-inline">
			<div class="layui-form-mid layui-word-aux">本页面刷新后除新添加的文章外所有操作无效，关闭页面所有数据重置</div>
		</div>
	</blockquote>
            
		         <!-- 操作日志 -->
                <div class="layui-form news_list">
                     <table class="layui-table">
                        <colgroup>
                            <col width="10">
                            <col width="25%">
                            <col width="25%">
                            <col width="15%">
                            <col width="15%">
                            <col width="6%">
                            <col width="10%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th style="text-align: center;"><input name="" lay-skin="primary" lay-filter="allChoose" id="allChoose" type="checkbox">
                                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary"><i class="layui-icon"></i></div>
                                </th>
                                <th>品牌名称</th>
                                <th>品牌地址</th>
                                <th style="text-align: center;">品牌logo</th>
                                <th>品牌描述</th>
                                <th style="text-align: center;">品牌状态</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody class="news_content">
                            <?php if(is_array($brandDatas) || $brandDatas instanceof \think\Collection || $brandDatas instanceof \think\Paginator): $i = 0; $__LIST__ = $brandDatas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$brand): $mod = ($i % 2 );++$i;?>
                            <tr>
                                <td align="center"><input name="checked" lay-skin="primary" lay-filter="choose" type="checkbox">
                                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary"><i class="layui-icon"></i></div>
                                </td>
                                <td><?php echo $brand['brand_name']; ?></td>
                                <td>
                                    <a href="<?php echo $brand['brand_url']; ?>" target="_blank"><?php echo $brand['brand_url']; ?></a>
                                </td>
                                <td align="center">
                                    <?php if($brand['brand_img'] != ''): ?>
                                        <img src="<?php echo $brand['brand_img']; ?>" height="60" alt="">
                                    <?php else: ?>
                                        <span class="noCon-btn">暂无图片</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $brand['brand_description']; ?></td>
                                <td align="center"><input name="status" data-url="<?php echo url('status',['id'=>$brand->id]); ?>" lay-skin="switch" lay-text="" lay-filter="isShow" type="checkbox" <?php if($brand['status'] == 1): ?>checked<?php endif; ?>>
                                    <div class="layui-unselect layui-form-switch" lay-skin="_switch"><em></em><i></i></div>
                                </td>
                                <td>
                                    <a class="layui-btn layui-btn-mini tb_edit"><i class="fa fa-pencil fa-fw"></i> 编辑</a>
                                    <a class="layui-btn layui-btn-danger layui-btn-mini tb_del" data-id="1"><i class="layui-icon"></i> 删除</a>
                                </td>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                     </table>
                     <div class="larry-table-page clearfix">
                          <div class="paging">
                              <?php echo $brandDatas->render(); ?>
                          </div>
                     </div>
			    </div>

		    </div>
		</div>
	
</section>

<script type="text/javascript" src="/static/admin/plugins/layui/layui.js"></script>
<script type="text/javascript" src="/static/admin/js/jquery.js"></script>
<script src="/static/admin/js/common.js"></script>

<script type="text/javascript">
    layui.config({
        base: '/static/admin/js/'
    }).use(['form','layer','element','laypage'],function(){
        window.layer = layui.layer;
        var element = layui.element,
        form = layui.form;
        form.on('switch(filter)', function(data){
            console.log(data.elem); //得到checkbox原始DOM对象
            console.log(data.elem.checked); //开关是否开启，true或者false
            console.log(data.value); //开关value值，也可以通过data.elem.value得到
            console.log(data.othis); //得到美化后的DOM对象
        });
    });
</script>
</body>
</html>