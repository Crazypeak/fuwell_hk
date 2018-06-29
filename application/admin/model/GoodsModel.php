<?php
/**
 * Created by PhpStorm.
 * User: Crazypeak
 * Date: 2017/10/22
 * Time: 22:38
 */

namespace app\admin\model;

use think\Db;

class GoodsModel extends LogModel
{
    public static function getGoodsPage($where = [], $page = 30)
    {
        return Db::name('goods')->where($where)->order(['class_id' => 'ASC', 'sequence' => 'ASC'])->paginate($page);
    }

    public static function getGoodsOne($id = null)
    {
        return Db::name('goods')->find($id);
    }

    public static function addGoods($data = [])
    {
        $validate = validate('Goods');
        if (!$validate->scene('goods')->check($data)) {
            return $validate->getError();
        }

        $class_name = Db::name('column_url')->where(['id' => $data['class_id']])->value('name');
        $goods = self::dataGoods($data,$data['status'],$data['sequence'],$data['class_id'],$class_name);

        if (is_HK()){
            $goods['material'] = $data['material'];
        }

        if (isset($data['id']) && is_numeric($data['id'])) {
            Db::name('goods')->where(['id' => $data['id']])->update($goods);
            $id = $data['id'];
        } else {
            $article['id'] = time();
            $id = Db::name('goods')->insertGetId($goods);
        }

        return $id;
    }

    public static function addGoodsArray($data = [],$class_id = 0){
        $class_name = Db::name('goods_class')->where(['id' => $class_id])->value('name');
        $sequence = Db::name('goods')->where(['class_id'=>$class_id])->order(['sequence'=>'DESC'])->find()['sequence'];

        $goods_array_data = [];
        foreach ($data as $item){
            $sequence += 1;
            $goods = ['name'=>0,'img_url'=>$item];
            $goods_array_data[] = self::dataGoods($goods,1,$sequence,$class_id,$class_name);
        }

        if ($goods_array_data && Db::name('goods')->insertAll($goods_array_data)){
            return '';
        }return '数据库错误';
    }

    protected static function dataGoods($data,$status = 1,$sequence = 1,$class_id = 0,$class_name = ''){
        $goods['class_name'] = $class_name;
        $goods['code'] = $data['code'] ? $data['code'] : "P" . $class_id . date('Ymd').rand(1000,9999);
        $goods['name'] = $data['name'] ? trim($data['name']) : $goods['code'];
        $goods['class_id'] = $class_id;
        $goods['status'] = $status;
        $goods['sequence'] = $sequence;
        $goods['img_url'] = $data['img_url'];
        $goods['create_time'] = date('Y-m-d H:i:s');

        return $goods;
    }

    public static function delGoods($id)
    {
        return Db::name('goods')->where(['id' => $id])->delete();
    }

    public static function getGoodsDetailList($goods_id)
    {
        $detail_data = Db::name('goods_detail')->where(['goods_id' => $goods_id])->order(['pid' => 'ASC', 'sequence' => 'ASC'])->select();

        $detail_list = [];
        foreach ($detail_data as $item) {
            if ($item['pid'] == 0) {
                $detail_list[$item['id']] = $item;
                $detail_list[$item['id']]['child'] = [];
            } else {
                $detail_list[$item['pid']]['child'][] = $item;
            }
        }

        return $detail_list;
    }

    public static function saveGoodsDetail($data = [])
    {
        $validate = validate('Goods');
        if (!$validate->scene('goods_detail')->check($data)) {
            return $validate->getError();
        }

        if ($data['pid'] != 0 && $data['type'] == 1) {
            if (!isset($data['img_url'])) {
                return '图片未上传';
            } else {
                $data['text'] = $data['img_url'];
            }
        };

        $detail['goods_id'] = $data['goods_id'];
        $detail['pid'] = $data['pid'];
        $detail['key'] = $data['name'];
        $detail['value'] = $data['text'];
        $detail['type'] = $data['type'];
        $detail['sequence'] = $data['sequence'];
        $detail['create_time'] = date('Y-m-d H:i:s');

        $id = Db::name('goods_detail')->insertGetId($detail);

        //层次，结构概念方便搜索用
        $parent = Db::name('goods_detail')->find($data['pid']);
        $layer = ($parent ? $parent['layer'] : '') . $id . ',';
        Db::name('goods_detail')->where(['id' => $id])->update(['layer' => $layer]);

        return '';
    }

    public static function delGoodsDetail($id)
    {
        return Db::name('goods_detail')->where(['layer' => ['LIKE', '%' . $id . ',%']])->delete();
    }

    /**
     * ----------------------------
     * 获取商品分类组
     * @param int $pid 上级分类id
     * @return false|\PDOStatement|string|\think\Collection
     * ----------------------------
     */
    public static function getClassList($where = [])
    {
        return Db::name('goods_class')->where($where)->order(['sequence' => 'ASC'])->select();
    }

    public static function getClassOne($id = 0)
    {
        return Db::name('goods_class')->where(['id' => $id])->find();
    }

    public static function saveClass($data)
    {
        $validate = validate('Goods');
        if ($validate->scene('goods_class')->check($data)) {
            $data['name'] = trim($data['name']);
//            $row['pid']  = $data['pid'];
//
            if (isset($data['id']) && is_numeric($data['id'])) {
                Db::name('goods_class')->where(['id' => $data['id']])->update($data);
                LogModel::addLog(3, $data['id'], '编辑商品分类');
            } else {
                $data['create_time'] = time();

                $id = Db::name('goods_class')->insertGetId($data);
                LogModel::addLog(3, $id, '新增商品分类');
            }
//
//            //层次，结构概念方便搜索用
//            $parent = self::getClassOne($data['pid']);
//            $layer  = ($parent ? $parent['layer'] : '') . $id . ',';
//            Db::name('goods_class')->where(['id' => $id])->update(['layer' => $layer]);

            return '';
        } else return $validate->getError();
    }

    /**
     * 商品分类删除，单条删除
     * 循环删除当前分类下级分类，并循环到删除再下级
     * @param $id
     */
    public static function delClass($id = 0)
    {
//        $result = Db::name('goods_class')->where(['pid' => $id])->find();
//        if ($result)
//            return '商品分类存在子级分类';

        $result = Db::name('goods')->where(['class_id' => $id])->find();
        if ($result)
            return '商品分类存在商品';

        Db::name('goods_class')->where(['id' => $id])->delete();
        LogModel::addLog(3, $id, '删除商品分类');

        return '';
    }
}