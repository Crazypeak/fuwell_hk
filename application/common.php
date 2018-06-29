<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
function is_HK(){
    if ($_SERVER['SERVER_NAME']==='www.fullwell-hk.com'){
        return true;
    }else return false;
}

if (is_HK()){
    \think\Config::set('database.prefix','fw_hk_');
    \think\Config::set('default_module','fw_hk');
    \think\Config::set('dispatch_error_tmpl',APP_PATH.'fw_hk/view/404.html');
    \think\Config::set('exception_tmpl',APP_PATH.'fw_hk/view/404.html');

    $column = \think\Db::name('goods_class')->column('name');
    foreach ($column as $item){
        \think\Route::rule($item.'/[:id]',\think\Config::get('default_module').'/Index/index?url=Products&class='.$item);
    }
};

// 应用公共文件
\think\Route::domain('admin','admin');

$column = \think\Db::name('column_url')->column('url');
foreach ($column as $item){
    \think\Route::rule($item.'/[:id]/[:goods]',\think\Config::get('default_module').'/Index/index?url='.$item);
}