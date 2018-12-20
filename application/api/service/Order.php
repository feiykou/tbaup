<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/4
 * Time: 20:59
 */

namespace app\api\service;


/*
 * 订单类
 *
 * 思考：
 *  创建订单时检测库存量，但并不会预扣库存量，因为这需要队列支持
 *  未支付的订单再次支付时可能会出现库存不足的情况
 *
 * 项目采用3次检测：
 *  1：创建订单时检测库存
 *  2：支付前检测库存
 *  3：支付成功后检测库存
 */
use app\api\model\Product;

class Order
{

    protected $oProducts;
    protected $products;
    protected $uid;

    function __construct()
    {
    }

    public function place($uid,$oProducts){
        $this->uid = $uid;
        $this->oProducts = $oProducts;
        $this->products = $this->getProductsByOrder($oProducts);
    }

    private function getProductsByOrder($oProducts){
        $oPIDs = [];
        foreach ($oProducts as $item){
            array_push($oPIDs,$item['product_id']);
        }
        $prducts = Product::getProductOrProprop($oPIDs);
        return $prducts;
    }
}