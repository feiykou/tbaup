<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:72:"F:\phpStudy\WWW\tbaup\public/../application/admin\view\product\list.html";i:1537161881;s:63:"F:\phpStudy\WWW\tbaup\application\admin\view\common\header.html";i:1536800929;s:63:"F:\phpStudy\WWW\tbaup\application\admin\view\common\footer.html";i:1536715219;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" type="text/css" href="/static/admin/css/global.css" media="all">
<link rel="stylesheet" href="/static/admin/plugins/layui/css/layui.css" media="all">
<link rel="stylesheet" href="/static/admin/css/style.css" media="all">
	<title>个人信息</title>
	<link rel="stylesheet" type="text/css" href="/static/admin/css/personal.css" media="all">
</head>
<body>
<section class="layui-larry-box">
	<div class="larry-personal">
	    <div class="layui-tab">
            <blockquote class="layui-elem-quote news_search">
		
		<div class="layui-inline" onclick="add('添加商品','<?php echo url('add'); ?>')">
			<a class="layui-btn layui-btn-normal newsAdd_btn">添加商品</a>
		</div>
		<div class="layui-inline">
			<div class="layui-form-mid layui-word-aux">本页面刷新后除新添加的文章外所有操作无效，关闭页面所有数据重置</div>
		</div>
	</blockquote>
            <form action="" method="post">
		         <!-- 操作日志 -->
                <div class="layui-form news_list">
                     <table class="layui-table">
                        <thead>
                            <tr>
                                <th width="30">ID</th>
                                <th>产品名称</th>
                                <th>编号</th>
                                <th>缩略图</th>
                                <th>市场价</th>
                                <th>本店价</th>
                                <th>上架</th>
                                <th>分类</th>
                                <th>主题</th>
                                <th>类型</th>
                                <th>重量</th>
                                <th>单位</th>
                                <th>库存</th>
                                <th width="240">操作</th>
                            </tr>
                        </thead>
                        <tbody class="news_content list-box-body">
                            <?php if(is_array($productRes) || $productRes instanceof \think\Collection || $productRes instanceof \think\Paginator): $i = 0; $__LIST__ = $productRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
                            <tr>
                                <td align="center"><?php echo $data['id']; ?></td>
                                <td align="center"><?php echo $data['name']; ?></td>
                                <td align="center"><?php echo $data['product_code']; ?></td>
                                <td align="center"><?php if($data['main_img_url'] != ''): ?><a target="_blank" href="<?php echo $data['main_img_url']; ?>"><img src="<?php echo $data['main_img_url']; ?>" height="30"></a><?php else: ?>暂无主图<?php endif; ?></td>
                                <td align="center"><?php echo $data['market_price']; ?></td>
                                <td align="center"><?php echo $data['price']; ?></td>
                                <td align="center"><?php if($data['on_sale'] == 1): ?>已上架<?php else: ?>未上架<?php endif; ?></td>
                                <td align="center"><?php if($data['cate_name']): ?><?php echo $data['cate_name']; else: ?>未设置<?php endif; ?></td>
                                <td align="center"><?php if($data['theme_id']): ?><?php echo $data['theme_id']; else: ?>未设置<?php endif; ?></td>
                                <td align="center"><?php if($data['type_name']): ?><?php echo $data['type_name']; else: ?>未设置<?php endif; ?></td>
                                <td align="center"><?php echo $data['weight']; ?></td>
                                <td align="center"><?php echo $data['unit']; ?></td>
                                <td align="center"><?php if($data['gn']): ?><?php echo $data['gn']; else: ?>0<?php endif; ?></td>
                                <td align="center">
                                    <a class="layui-btn layui-btn-mini tb_edit" onclick="edit('库存','<?php echo url('stock',['id'=>$data['id']]); ?>','800px','463px')"><i class="fa fa-id-card-o fa-fw"></i> 库存</a>
                                    <a class="layui-btn layui-btn-mini tb_edit" onclick="editFull('编辑产品','<?php echo url('edit',['id'=>$data['id']]); ?>')"><i class="fa fa-pencil fa-fw"></i> 编辑</a>
                                    <a class="layui-btn layui-btn-danger layui-btn-mini tb_del" onclick="product_del(this,<?php echo $data['id']; ?>)"><i class="layui-icon"></i> 删除</a>
                                </td>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                     </table>

                     <div class="larry-table-page clearfix">
                          <div class="paging">
                          </div>
                     </div>
			    </div>
            </form>
		    </div>
		</div>
	
</section>

<script type="text/javascript" src="/static/admin/plugins/layui/layui.js"></script>
<script type="text/javascript" src="/static/admin/js/jquery.js"></script>
<script src="/static/admin/js/common.js"></script>

<script type="text/javascript">

    $(function(){
        if($(".list-box-body tr").length <= 1){
            $(".sort-tr-wrap").hide();
        }else{
            $(".sort-tr-wrap").show();
        }
    });


    /*产品-删除*/
    function product_del(obj,id){
        var url = "<?php echo url('del'); ?>?id="+id;
        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                type: 'get',
                url: url,
                success: function(data){
                    console.log(data);
                    if(data.code == 1){
                        layer.close(index);
                        layer.msg('已删除!',{icon:1,time:1000});
                        window.location = "<?php echo url('lst'); ?>";
                    }
                },
                error:function(data) {
                    console.log(data.msg);
                },
            });
        });
    }


    function delMore() {
        var idsArr = getCheckedId().idsArr;
        var $checkDoms = getCheckedId().checkDoms;
        reqChangeStutas({
            idsArr: idsArr,
            url:"<?php echo url('del'); ?>",
            msgTip:'请先选择要删除的产品!',
            confirmTip:'确认要删除吗？',
            sCallback: function(data){
                $checkDoms.each(function(index,item){
                    $(item).parents('tr').remove();
                });
                layer.msg('已删除!',{icon:1,time:1000});
            }
        });
    }

    function getCheckedId() {
        var $checkDoms = $('.list-box-body').find('input[type="checkbox"][name="checked"]:checked');
        var idsArr = [];
        $checkDoms.each(function (index,item) {
            idsArr.push($(item).data('id'));
        });
        return {
            idsArr:idsArr,
            checkDoms:$checkDoms
        };
    }
    
    function reqChangeStutas(opts) {
        var idsArr = opts.idsArr || [];
        if(idsArr.length == 0){
            layer.msg(opts.msgTip||'请先选择',{icon:1,time:1500});
            return false;
        }
        layer.confirm(opts.confirmTip||'确认吗？',function(index){
            console.log(index);
            $.ajax({
                url: opts.url,
                type: opts.method || "POST",
                data: {idsArr:idsArr},
                success: function(data){
                    opts.sCallback && opts.sCallback(data);
                },
                error:function(data) {
                    opts.eCallback && opts.eCallback(data);
                }
            });
        });
    }
    
    layui.config({
        base: '/static/admin/js/'
    }).use(['form','layer','element','laypage'],function(){
        window.layer = layui.layer;
        var element = layui.element,
        form = layui.form;


    });
</script>
</body>
</html>