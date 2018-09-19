<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:82:"D:\SoftDownload\wamp\www\tbaup\public/../application/admin\view\product\stock.html";i:1537272373;s:72:"D:\SoftDownload\wamp\www\tbaup\application\admin\view\common\header.html";i:1536755456;s:72:"D:\SoftDownload\wamp\www\tbaup\application\admin\view\common\footer.html";i:1535296431;}*/ ?>
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
    <form action="" method="post">
         <!-- 操作日志 -->
        <div class="layui-form news_list">
             <table class="layui-table">
                <thead>
                    <tr>
                        <?php if(is_array($radioAttrRes) || $radioAttrRes instanceof \think\Collection || $radioAttrRes instanceof \think\Paginator): $i = 0; $__LIST__ = $radioAttrRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$radioAttr): $mod = ($i % 2 );++$i;?>
                        <th><?php echo $key; ?></th>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        <th>库存量</th>
                        <th width="60">操作</th>
                    </tr>
                </thead>
                <tbody class="news_content list-box-body">
                    <?php if($stockDatas):
                        foreach($stockDatas as $k0 => $v0):
                    ?>
                    <tr>
                        <?php foreach($radioAttrRes as $k=>$v):?>
                        <td align="center" class="tc">
                            <div class="layui-inline sel-size-wrap">
                                <select name="product_prop[<?php echo $k; ?>][]">
                                    <option value="0">请选择</option>
                                    <?php foreach($v as $k1=>$v1):
                                        $arr = explode(',',$v0['product_prop']);
                                        if(in_array($v1['id'], $arr)){
                                            $select = 'selected';
                                        }else{
                                            $select = '';
                                        }
                                    ?>
                                    <option <?php echo $select;?> value="<?php echo $v1['id']?>"><?php echo $v1['prop_value'];?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </td>
                        <?php endforeach;?>
                        <td align="center" class="tc tb-sort">
                            <input type="input" name="stock_num[]" value="<?php echo $v0['stock_num']?>" autocomplete="off" class="layui-input">
                        </td>
                        <td align="center">
                            <a class="layui-btn layui-btn-mini" <?php if(count($radioAttrRes) != 0){
                                    echo 'onclick="addtr(this)"';
                                }else{
                                    echo "style='background:#ddd;'";
                                }
                                ?>">
                                <i class="fa <?php if($k0==0){
                                    echo 'fa-plus-square';
                                }else{
                                    echo 'fa-minus-square';
                                } ?> fa-fw"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; else:?>
                        <tr>
                            <?php foreach($radioAttrRes as $k=>$v):?>
                            <td align="center" class="tc">
                                <div class="layui-inline sel-size-wrap">
                                    <select name="product_prop[<?php echo $k; ?>][]">
                                        <option value="">请选择</option>
                                        <?php foreach($v as $k1=>$v1):?>
                                        <option value="<?php echo $v1['id']?>"><?php echo $v1['prop_value'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </td>
                            <?php endforeach;?>
                            <td align="center" class="tc tb-sort">
                                <input type="input" name="stock_num[]" autocomplete="off" class="layui-input">
                            </td>
                            <td align="center">
                                <a class="layui-btn layui-btn-mini" <?php if(count($radioAttrRes) != 0){
                                    echo 'onclick="addtr(this)"';
                                }else{
                                    echo "style='background:#ddd;'";
                                }
                                ?> "><i class="fa fa-plus-square fa-fw"></i></a>
                            </td>
                        </tr>
                    <?php endif;?>

                </tbody>
             </table>
            <div class="layui-form-item tr">
                <div class="layui-inline">
                    <button class="layui-btn" data-id="<?php echo $product_id; ?>"  lay-submit="" lay-filter="demo1">立即提交</button>
                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </div>
            </div>

             <div class="larry-table-page clearfix">
                  <div class="paging">
                  </div>
             </div>
        </div>
    </form>
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
        window.addtr = function(o){
            var tr=$(o).parent().parent();
            if($(o).find('i').hasClass('fa-plus-square')){
                var newtr=tr.clone();
                newtr.find('i').removeClass('fa-plus-square').addClass('fa-minus-square');
                tr.after(newtr);
            }else{
                tr.remove();
            }
            form.render('select');
        }

        //监听提交
        form.on('submit(demo1)', function(data) {

            var formDom = data.form;
            var product_id = $(data.elem).data('id');
            $.ajax({
                url: "<?php echo url('stock'); ?>",
                type: "post",
                data: $(formDom).serialize()+'&id='+product_id,
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