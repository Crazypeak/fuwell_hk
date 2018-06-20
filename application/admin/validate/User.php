<?php
/**
 * Created by PhpStorm.
 * User: Crazypeak
 * Date: 2017/2/20
 * Time: 9:11
 */

namespace app\admin\validate;

use think\Validate;

class User extends Validate
{
    protected $rule = [
        'nickname' => ['require'],
        'username' => ['require', 'alphaNum'],
        'password' => ['require',],
        'status'   => ['require', 'number'],
        'group_id' => ['require', 'number'],
    ];

    protected $message = [
        'nickname.require'  => '昵称名称不能为空',
        'username.require'  => '账号不能为空',
        'username.alphaNum' => '账号错误',
        'password.require'  => '密码',
        'status.require'    => '状态错误',
        'status.number'     => '状态错误',
        'group_id.require'  => '员工组错误',
        'group_id.number'   => '员工组错误',
    ];

    protected $scene = [
        'user_add'  => ['nickname', 'username', 'password', 'status', 'group_id'],
        'user_edit' => ['nickname', 'status', 'group_id'],
    ];
}