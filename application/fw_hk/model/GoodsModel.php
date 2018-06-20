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
    public static function getGoodsList($class_id = null)
    {
        return Db::name('goods')->field(['id', 'name', 'img_url'])->where(['class_id' => $class_id])->order(['sequence' => 'ASC'])->select();
    }

    public static function getGoodsOne($id = null)
    {
        $goods       = Db::name('goods')->find($id);
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
}