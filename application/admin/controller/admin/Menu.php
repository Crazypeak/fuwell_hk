<?php
/**
 * Created by PhpStorm.
 * User: Crazypeak
 * Date: 2017/2/8
 * Time: 14:54
 */

namespace app\admin\controller\admin;

use app\admin\controller\Index;
use app\admin\model\AuthModel;

class Menu extends Index
{

    /**
     * 菜单管理
     * @param int $pid
     * @return mixed
     */
    public function menuAll()
    {
        $list = AuthModel::getUrlList([], ['id', 'pid', 'name']);

        return list_to_tree($list, 'id', 'pid', 'operator');
    }

    public function menuList($pid = 0, $type = 0)
    {
        $result = AuthModel::getUrlOne($pid);
        $this->assign('title_name', $result['name']);

        $where = ['pid' => $pid];
        $list  = AuthModel::getUrlList($where,true, $type);

        $this->assign('list', $list);

        $pid_all = AuthModel::getUrlList([], ['id', 'pid', 'name']);
        $this->assign('pid_all', json_encode(list_to_tree($pid_all, 'id', 'pid', 'operator')));

        return $this->fetch('admin/navList');
    }

    public function menuSave($id = null)
    {
        if ($data = input('post.')) {
            $result = AuthModel::saveUrl($data);
            empty($result) ? $this->success('操作成功') : $this->error($result);
        }
//        else {
//            $menu = AuthModel->getUrlOne($id);
//            $this->assign('menu', $menu);
//
//            $list = AuthModel->getUrlList([],['id','pid','name']);
//            $this->assign('pid_list', list_to_tree($list, 'id', 'pid', 'operator'));
//
//            return $this->fetch('auth/menuEdit');
//        }
    }

    public function menuDel($id = null)
    {
        (!$id || !is_numeric($id)) && $this->error('参数错误');

        $result = AuthModel::delUrlOne($id);
        $result ? $this->success('操作成功') : $this->error('操作失败');
    }
}