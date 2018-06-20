<?php
/**
 * Created by PhpStorm.
 * User: Crazypeak
 * Date: 2017/2/17
 * Time: 11:09
 */
namespace app\admin\validate;

use think\Validate;

class Auth extends Validate
{
    protected $rule = [
        'name'     => ['require',],
        'pid'      => ['require', 'number'],
        'status'   => ['require', 'number'],
        'sequence' => ['require', 'number'],
    ];

    protected $message = [
        'name.require'     => '名称不能为空',
        'pid.require'      => '上级菜单不能为空',
        'pid.number'       => '上级菜单错误',
        'status.require'   => '显示状态不能为空',
        'status.number'    => '显示状态错误',
        'sequence.require' => '排序不能为空',
        'sequence.number'  => '排序错误',
    ];

    protected $scene = [
        'auth_url'  => ['name', 'pid', 'status', 'sort'],
        'auth_rule' => ['name',],
    ];
}