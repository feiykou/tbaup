<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/27
 * Time: 23:56
 */

namespace app\admin\validate;


class CommonValidate extends BaseValidate
{

    protected $rule = [
        ['name','require|max:30','名称必须填写|名称不能超过30个字']
    ];

    protected $scene = [
        'name' => ['name']
    ];
}