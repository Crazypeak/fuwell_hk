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
    public static function getGoodsList($where = [],$page=0,$limit = 20)
    {
        return Db::name('goods')
            ->where($where)
            ->order(['sequence' => 'ASC'])
            ->page($page,$limit)
            ->select();
    }

    public static function getGoodsOne($id = null)
    {
        $goods       = Db::name('goods')->where(['code'=>$id])->find();
        $detail_data = Db::name('goods_detail')
            ->field(['id','pid','key','value','type'])
            ->where(['goods_id' => $goods['id']])
            ->order(['pid' => 'ASC', 'sequence' => 'ASC'])
            ->select();

        $detail_list = [];
        foreach ($detail_data as $item) {
            if ($item['pid'] == 0) {
                $detail_list[$item['id']]          = $item;
                $detail_list[$item['id']]['child'] = [];
            } else {
                $detail_list[$item['pid']]['child'][] = $item;
            }
        }
        $goods['detail'] = $detail_list;

        return $goods;
    }

    public static function getClassOne($class_name){
        return Db::name('goods_class')
            ->where(['name'=>$class_name])
            ->find();
    }

    public static function getClassList(){
        return Db::name('goods_class')
            ->alias('c')
            ->join('goods g','c.id = g.class_id','LEFT')
            ->field(['c.id', 'c.name', 'g.img_url'])
            ->order(['c.sequence' => 'ASC'])
            ->group('c.id')
            ->select();
    }
}