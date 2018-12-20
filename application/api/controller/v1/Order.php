<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/4
 * Time: 10:55
 */

namespace app\admin\controller;


use app\api\controller\BaseController;
use app\api\service\Token as TokenService;
use app\api\service\Order as OrderService;
use app\api\validate\OrderPlace;

class Order extends BaseController
{
    public function placeOrder(){
        return 11;
        (new OrderPlace())->goCheck();
        $oProducts = input('post.products/a');
        $uid = TokenService::getCurrentUid();
        $order = new OrderService();
        $status = $order->place($uid,$oProducts);
        return $status;
    }
}