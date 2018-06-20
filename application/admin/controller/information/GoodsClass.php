<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/20
 * Time: 17:28
 */

namespace app\admin\controller\information;

use app\admin\controller\Index;
use app\admin\model\GoodsModel;

class GoodsClass extends Index{
    /**
     * 前端输出，默认输出所有分类
     * @return mixed
     */
    public function classList($cid = 0)
    {
        $this->assign('cid',$cid);
        $class_list = GoodsModel::getClassList();
//        $this->assign('class_list', list_to_tree($class_list));
        $this->assign('class_list', $class_list);
        return $this->fetch('goods/goodsClassList');
    }

    /**
     * 新增编辑商品分类
     * @param null $id
     * @return array|false|\PDOStatement|string|\think\Model
     */
    public function classEdit($id = null)
    {
        if ($data = input('post.')) {
            $result = GoodsModel::saveClass($data);
            empty($result) ? $this->success('操作成功') : $this->error($result);
        } else {
            $row = $id ? GoodsModel::getClassOne($id) : '';
            return $row;
        }
    }

    public function classDel($id = null)
    {
        (!$id || !is_numeric($id)) && $this->error('参数错误');

        $result = GoodsModel::delClass($id);

        empty($result) ? $this->success('操作成功') : $this->error($result);
    }
}