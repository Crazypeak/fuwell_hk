<?php
/**
 * Created by PhpStorm.
 * User: Crazypeak
 * Date: 2017/10/22
 * Time: 22:38
 */

namespace app\fw_hk\model;

use think\Db;

class InformationModel
{
    public static function getNewsPage($where = [],$limit = 5)
    {
        $where['status'] = 1;
        return Db::name('article')->where($where)->field(['id','title','create_time','description','img_url'])->order(['create_time'=>'DESC'])->paginate($limit);
    }

    public static function getNewsOne($where = [],$file=true)
    {
        $where['status'] = 1;
        return Db::name('article')->field($file)->where($where)->order(['create_time'=>'ASC'])->find();
    }
}