<?php
/**
 * Created by PhpStorm.
 * User: Crazypeak
 * Date: 2017/10/16
 * Time: 15:04
 */

namespace app\index\model;

use think\Db;

class ParameterModel
{
    public static function getParameterList()
    {
        return Db::name('config')->column('value','key');
    }

    public static function getFooterList()
    {
        $footer_data = Db::name('footer')->order(['pid' => 'ASC', 'sequence' => 'ASC'])->select();

        $footer_list = [];
        foreach ($footer_data as $item) {
            if ($item['pid'] == 0) {
                $footer_list[$item['id']]          = $item;
                $footer_list[$item['id']]['child'] = [];
            } else {
                $footer_list[$item['pid']]['child'][] = $item;
            }
        }

        return $footer_list;
    }
}