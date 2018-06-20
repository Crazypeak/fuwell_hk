<?php
/**
 * Created by PhpStorm.
 * User: Crazypeak
 * Date: 2017/2/22
 * Time: 11:15
 */

namespace app\admin\validate;

use think\Validate;

class Goods extends Validate
{
    protected $rule = [
        'name'     => ['require',],
        'class_id' => ['require', 'number'],
        'type'     => ['require', 'number'],
        'status'   => ['require', 'number'],
        'sequence' => ['require', 'number'],
    ];

    protected $message = [
        'name.require'     => '名称不能为空',
        'class_id.require' => '分类错误',
        'class_id.number'  => '分类错误',
        'type.require'     => '类型错误',
        'type.number'      => '类型错误',
        'status.require'   => '状态错误',
        'status.number'    => '状态错误',
        'sequence.require' => '排序错误',
        'sequence.number'  => '排序错误',
    ];

    protected $scene = [
        'goods'        => ['name', 'class_id', 'status', 'sequence'],
        'goods_detail' => ['name', 'type', 'sequence'],
    ];
}