<?php
/**
 * Created by PhpStorm.
 * User: Crazypeak
 * Date: 2017/2/17
 * Time: 11:09
 */

namespace app\admin\validate;

use think\Validate;

class Member extends Validate
{
    protected $rule = [
        'nickname'  => ['require',],
        'phone'     => ['require', 'alphaNum'],
        'sex'       => ['require', 'number'],
        'status'    => ['require', 'number'],
        'brokerage' => ['float',],
    ];

    protected $message = [
        'nickname.require' => '昵称错误',
        'phone.require'    => '电话错误',
        'phone.alphaNum'   => '电话格式错误',
        'sex.require'      => '性别错误',
        'sex.number'       => '性别错误',
        'status.require'   => '状态错误',
        'status.number'    => '状态错误',
        'brokerage.float'  => '提成必须为浮点数',
    ];
}