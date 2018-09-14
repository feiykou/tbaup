<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/21
 * Time: 23:59
 */

namespace app\admin\controller;

use app\admin\validate\CategoryValidate;
use app\admin\validate\ProductValidate;
use app\admin\validate\ShopTypeAttr;
use catetree\Catetree;

class Product extends Base
{
    private $model;
    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('product');
    }

    public function lst(){

        $join = [
            ['category c','p.category_id=c.id','LEFT'],
            ['type t', 'p.type_id=t.id','LEFT']
        ];
        $productRes = db('product')->alias('p')
            ->field('p.*,c.cate_name,t.name as type_name')
            ->join($join)
            ->order('p.id DESC')
            ->paginate(6);

        $this->assign([
            'productRes'=>$productRes,
        ]);
        return view('list');
    }

    public function add(){
        // 会员级别数据
        $mlRes = db('member_level')->field('id,name')->select();
        // 获取类型
        $typeRes=db('type')->select();
        // 商品分类
        $Category=new Catetree();
        $CategoryObj=db('Category');
        $CategoryRes=$CategoryObj->order('sort DESC')->select();
        $CategoryRes=$Category->Catetree($CategoryRes);
        $this->assign([
            'mlRes' => $mlRes,
            'typeRes'=>$typeRes,
            'CategoryRes'=>$CategoryRes,
        ]);
        return view();
    }

    public function edit($id=0){
        if(intval($id) < 1){
            $this->error("参数不合法");
        }
        $categoryRes = db('type')->select();
        $editData = $this->model->find(intval($id));
        $this->assign([
            'editData' => $editData,
            'categoryRes' => $categoryRes
        ]);
        return view();
    }

    public function save(){
        if(!request()->post()){
            $this->error("请求失败");
        }
        $validate = (new ProductValidate())->goCheck();

        if(!$validate['type']){
            $msg = '';
            if(is_array($validate['msg'])){
                foreach ($validate['msg'] as $key=>$value){
                    $msg.=$value;
                }
            }else{
                $msg = $validate['msg'];
            }

            $this->result("",'0',$msg);
        }

        // 获取请求数据
        $data = input('post.');
        $is_exist_id = empty($data['id']);
        // 判断是否存在同名
        $is_unique = $this->is_unique($data['name'], $is_exist_id ? 0 : $data['id'],'name');
        if($is_unique){
            $this->result('','0','存在同名产品名');
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
            $this->result(url('lst'),'0','无更新');
        }
    }

    public function del($id){
//        $result = model('product')->where('id','=',$id)->delete();

        $result = model('product')->destroy($id);
        // 返回状态码
//        if($result){
//            $this->result($_SERVER['HTTP_REFERER'], 1, '删除完成');
//        }else{
//            $this->result($_SERVER['HTTP_REFERER'], 0, '删除失败');
//        }
    }

    public function edituploadImg(){
        if($_FILES['file']['tmp_name']){
            $file = request()->file('file');
            $info = $file->move('upload');
            if($info){
                $img_url = DS . 'upload' . DS . $info->getSaveName();
            }
        }
        if(!empty($img_url)){
            $json = [
                "code"=> 0, //0表示成功，其它失败
                "msg" => "上传成功", //提示信息 //一般上传失败后返回
                "data" =>[
                   "src"=>$img_url,
                    "title" => '图片'
                ]
            ];
            return $json;
        }else{
            $json = [
                "code"=> 1, //0表示成功，其它失败
                "msg" => "上传失败", //提示信息 //一般上传失败后返回
                "data" =>[
                    "src"=> ''
                ]
            ];
            return $json;
        }
    }
//
//
//    //删除
//    public function del($id=-1){
//        if(request()->isPost()){
//            $id = request()->post()['idsArr'];
//            if($id == []){
//                $this->error("无选中的数据！");
//            }
//        }else{
//            if(intval($id)<1){
//                $this->error("参数不合法");
//            }
//        }
//
//        if(!is_array($id)){
//            $id = [$id];
//        }
//        $result = db('brand')->delete($id);
//        // 返回状态码
//        if($result){
//            $this->result($_SERVER['HTTP_REFERER'], 1, '删除完成');
//        }else{
//            $this->result($_SERVER['HTTP_REFERER'], 0, '删除失败');
//        }
//    }
}