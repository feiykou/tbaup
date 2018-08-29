<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/21
 * Time: 23:59
 */

namespace app\admin\controller;

use app\admin\validate\BrandValidate;

class Brand extends Base
{
    private $model;
    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('brand');
    }

    public function lst(){
        $brandDatas = $this->model->paginate();
        $this->assign([
            'brandDatas' => $brandDatas
        ]);
        return view();
    }

    public function add(){
        return view();
    }

    public function edit($id=0){
        if(intval($id) < 1){
            $this->error("参数不合法");
        }
        $brandData = $this->model->find(['id'=>$id]);
        $this->assign([
            'brandData' => $brandData
        ]);
        return view();
    }

    public function save(){
        if(!request()->post()){
            $this->error("请求失败");
        }
        $validate = (new BrandValidate())->goCheck('save');
        if(!$validate['type']){
            $this->result("",'0',implode(',',$validate['msg']));
        }
        // 获取请求数据
        $data = input('post.');
        $is_exist_id = empty($data['id']);

        // 判断是否存在同名
        $is_unique = $this->model->is_unique($data['brand_name'], $is_exist_id ? 0 : $data['id']);
        if($is_unique){
            $this->result('','0','存在同名品牌');
        }

        // 更新数据
        if(!$is_exist_id){
            return $update = $this->update($data);
        }

        // 添加数据
        $result = $this->model->save($data);
        if($result){
            $this->result(url('lst'),'1','添加成功');
        }else{
            $this->result('','0','添加失败');
        }
    }

    public function update($data){
        $result = $this->model->save($data,['id' => intval($data['id'])]);
        if($result){
            $this->result(url('lst'),'1','更新成功');
        }else{
            $this->result('','0','更新失败');
        }
    }

    public function del(){
        return view();
    }
}