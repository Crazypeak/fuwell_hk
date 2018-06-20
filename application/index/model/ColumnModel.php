<?php
/**
 * Created by PhpStorm.
 * User: Crazypeak
 * Date: 2017/10/22
 * Time: 14:55
 */

namespace app\index\model;

use think\Db;

class ColumnModel
{

    public static function getColumnUrlList()
    {
        return Db::name('column_url')->where(['status' => 1])->order(['sequence' => 'ACE'])->select();
    }

    public static function getColumnUrlOne($url = '')
    {
        return Db::name('column_url')->where(['url' => $url])->find();
    }

    public static function getColumnFileList($where = [])
    {
        $list = Db::name('column_file')
            ->field(['address', 'type', 'sequence'])
            ->order(['sequence' => 'ASC'])
            ->where($where)
            ->select();

        return $list;
    }
}