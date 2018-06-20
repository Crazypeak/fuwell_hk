<?php
/**
 * Created by PhpStorm.
 * User: Crazypeak
 * Date: 2017/10/16
 * Time: 18:18
 */

namespace app\admin\validate;

use think\Validate;

class Footer extends Validate
{
    protected $rule = [
        'name'     => ['require',],
        'pid'      => ['require', 'number'],
        'sequence' => ['require', 'number'],
    ];

    protected $message = [
        'name.require'     => '名称不能为空',
        'pid.require'      => '参数错误',
        'pid.number'       => '参数错误',
        'sequence.require' => '排序错误',
        'sequence.number'  => '排序错误',
    ];

//    protected $scene = [
//        'column_url'  => ['name', 'status', 'sequence'],
//        'column_file' => ['name', 'pid', 'type', 'status', 'sequence'],
//    ];
}