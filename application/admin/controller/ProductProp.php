<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/18 0018
 * Time: 下午 16:40
 */

namespace app\admin\controller;


class ProductProp extends Base
{
    public function ajaxDelProductProp($id){
        $result = db('product_prop')->delete($id);
        if($result){
            $this->result('','1','删除成功');
        }else{
            $this->result('','0','删除失败');
        }
    }
}