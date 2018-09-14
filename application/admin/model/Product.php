<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/13 0013
 * Time: 下午 12:22
 */

namespace app\admin\model;


use think\Model;

class Product extends Model
{

    protected $field = true;
    protected static function init(){
        Product::beforeInsert(function($products){
            $products->product_code = Product::makeProductNo();
        });

        Product::afterInsert(function ($products){

            // 接收表单数据
            $productData = input('post.');

            $mpriceArr = $products->mp;
            $productsId = $products->id;


            // 处理会员价格
            if($mpriceArr){
                foreach ($mpriceArr as $k => $v){

                    if(!trim($v)){
                       continue;
                    }else{
                        db('member_price')->insert([
                            'mlevel_id' => $k,
                            'mprice' => $v,
                            'product_id' =>$productsId
                        ]);
                    }
                }
            }
            // 处理产品图片
            $img_url_arr = explode(';',$products->product_img_url);
            foreach ($img_url_arr as $k=>$v){
                $data[$k]['img_url'] = $v;
                $data[$k]['product_id'] = $productsId;
            }
            db('product_image')->insertAll($data);
            // 处理产品属性
            $prop_i = 0;
            if(isset($productData['product_prop'])){
                foreach ($productData['product_prop'] as $k => $v){
                    if(is_array($v)){
                        if(!empty($v)){
                            foreach ($v as $k1 => $v1){
                                if(!empty($v)){
                                    $prop_i++;
                                    continue;
                                }
                                db('product_prop')->insert([
                                    'prop_id' => $k,
                                    'prop_value' => $v1,
                                    'product_id' => $productsId,
                                    'prop_price' => $productData['prop_price'][$prop_i]
                                ]);
                                $prop_i++;
                            }
                        }
                    }else{
                        if(!empty($v)) {
                            db('product_prop')->insert([
                                'prop_id' => $k,
                                'prop_value' => $v,
                                'product_id' => $productsId
                            ]);
                        }
                    }
                }
            }


        });
    }


    // 生成商品号
    public static function makeProductNo()
    {
        $yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
        $productSn =
            $yCode[intval(date('Y')) - 2017] . time() .rand(11111,99999);
        return $productSn;
    }
}