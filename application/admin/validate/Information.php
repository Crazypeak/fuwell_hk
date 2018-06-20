<?php
/**
 * Created by PhpStorm.
 * User: Crazypeak
 * Date: 2017/10/16
 * Time: 18:18
 */

namespace app\admin\validate;

use think\Validate;

class Information extends Validate
{
    protected $rule = [
        'title'     => ['require',],
        'type'      => ['require', 'number'],
    ];

    protected $message = [
        'title.require'     => '名称不能为空',
        'type.require'      => '参数错误',
        'type.number'       => '参数错误',
    ];

//    protected $scene = [
//        'column_url'  => ['name', 'status', 'sequence'],
//        'column_file' => ['name', 'pid', 'type', 'status', 'sequence'],
//    ];
}