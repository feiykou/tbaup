<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/28
 * Time: 0:07
 */

namespace app\admin\model;


use think\Model;

class Brand extends Model
{
    public function is_unique($name="",$id=0){
        $data = [
            'id'         => ['neq',$id],
            'brand_name' => $name
        ];
        $result = $this->where($data)->find();
        return $result;
    }

}