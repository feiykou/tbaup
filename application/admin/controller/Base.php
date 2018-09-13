<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/26
 * Time: 22:23
 */

namespace app\admin\controller;


use think\Controller;
use think\Request;

class Base extends Controller
{
    public function status(){
        // 获取值
        $data = input('param.');
        $status = 'status';
        if(isset($data['attr'])){
            $status =$data['attr'];
        }

        // 利用tp5 validate 去做严格检验
        if(empty($data['id'])){
            $this->error("id不合法");
        }
        if(!is_numeric($data[$status])){
            $this->error($status."不合法");
        }

        // 获取控制器
        $model = request()->controller();
        $result = model($model)->save([
            $status => $data[$status]
        ],['id'=>$data['id']]);


        if($result){
            $this->result('','1','更新成功');
        }else{
            $this->result('','0','更新失败');
        }
    }


    public function is_unique($name="",$id=0,$nameAttr='name'){
        $data = [
            'id'         => ['neq',$id],
            $nameAttr => $name
        ];
        $model = request()->controller();
        $result = model($model)->where($data)->find();
        return $result;
    }

    public function uploadImg(){
//        var_dump($file = Request::instance()->file('file'));die;
        if($_FILES['file']['tmp_name']){
            $file = request()->file('file');
            $info = $file->move('upload');
            if($info){
                $img_url = DS . 'upload' . DS . $info->getSaveName();
            }
        }
        if(!empty($img_url)){
            return $this->result($img_url,'1','上传成功','json');
        }else{
            return $this->result('','2','上传失败','json');
        }
    }
}