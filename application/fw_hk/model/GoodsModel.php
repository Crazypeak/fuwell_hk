<?php
/**
 * Created by PhpStorm.
 * User: Crazypeak
 * Date: 2017/10/22
 * Time: 22:38
 */

namespace app\fw_hk\model;

use think\Db;

class GoodsModel
{
    public static function getGoodsList($where = [], $page = 0, $limit = 20)
    {
        return Db::name('goods')
            ->where($where)
            ->order(['sequence' => 'ASC'])
            ->page($page, $limit)
            ->select();
    }

    public static function getGoodsOne($id = null)
    {
        $goods = Db::name('goods')->where(['code' => $id])->find();


        !$goods && $goods = Db::name('goods')->where(['name' => $id])->find();
//        $detail_data = Db::name('goods_detail')
//            ->field(['id','pid','key','value','type'])
//            ->where(['goods_id' => $goods['id']])
//            ->order(['pid' => 'ASC', 'sequence' => 'ASC'])
//            ->select();

//        $detail_list = [];
//        foreach ($detail_data as $item) {
//            if ($item['pid'] == 0) {
//                $detail_list[$item['id']]          = $item;
//                $detail_list[$item['id']]['child'] = [];
//            } else {
//                $detail_list[$item['pid']]['child'][] = $item;
//            }
//        }
//        $goods['detail'] = $detail_list;

        return $goods;
    }

    public static function getClassOne($class_name)
    {
        return Db::name('goods_class')
            ->where(['name' => $class_name])
            ->find();
    }

    public static function getClassList()
    {
        $sql = Db::name('goods')
            ->order(['class_id'=>'ASC','sequence'=>'ASC'])
            ->field(['class_name'=>'name','class_id'=>'id','img_url'])
            ->buildSql();

//        $sql = Db::name('goods_class')
//            ->alias('c')
//            ->where(['c.id' => 6])
//            ->join('goods g', 'c.id = g.class_id', 'INNER')
//            ->field(['c.id', 'c.name', 'g.img_url'])
//            ->order(['c.sequence' => 'ASC', 'g.sequence' => 'DESC'])
//            ->buildSql();

        return Db::table($sql.' a')
            ->group('id')
            ->select();
    }
}