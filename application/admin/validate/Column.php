<?php
/**
 * Created by PhpStorm.
 * User: Crazypeak
 * Date: 2017/10/16
 * Time: 18:18
 */

namespace app\admin\validate;

use think\Validate;

class Column extends Validate
{
    protected $rule = [
        'name'     => ['require',],
        'pid'      => ['require', 'number'],
        'type'     => ['require', 'number'],
        'status'   => ['require', 'number'],
        'sequence' => ['require', 'number'],
    ];

    protected $message = [
        'name.require'     => '名称不能为空',
        'pid.require'      => '参数错误',
        'pid.number'       => '参数错误',
        'type.require'     => '类别错误',
        'type.number'      => '类别错误',
        'status.require'   => '状态错误',
        'status.number'    => '状态错误',
        'sequence.require' => '排序错误',
        'sequence.number'  => '排序错误',
    ];

    protected $scene = [
        'column_url'  => ['name', 'status', 'sequence'],
        'column_file' => ['name', 'pid', 'type', 'status', 'sequence'],
    ];
}