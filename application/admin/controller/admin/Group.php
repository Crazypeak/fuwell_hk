<?php
/**
 * Created by PhpStorm.
 * User: Crazypeak
 * Date: 2017/2/20
 * Time: 11:47
 */
namespace app\admin\controller\admin;

use app\admin\controller\Index;
use app\admin\model\AuthModel;

class Group extends Index
{
    /**
     * 员工组列表
     * @return mixed
     */
    public function userGroup()
    {
        $group = AuthModel::getRuleList();
        $this->assign('group', $group);

        return $this->fetch('admin/groupList');
    }

    public function save($id = null){
        if ($data = input('post.')) {
            $result = AuthModel::saveGroup($data);
            empty($result) ? $this->success('操作成功',url('userGroup')) : $this->error($result);
        } else {
            $group = AuthModel::getRuleOne($id);
            return $group ? $group : '';
        }
    }

    /**
     * 员工组权限选择
     */
    public function access($id = null)
    {
        if ($rule = input('post.rule/a')) {
            $result = AuthModel::saveRule($id,$rule);
            empty($result) ? $this->success('操作成功',url('userGroup')) : $this->error($result);
        } else {
            $group = AuthModel::getRuleOne($id);
            !$group && $this->error('员工组不存在');
            $this->assign('group', $group);

            $list = AuthModel::getUrlList([], ['id', 'pid', 'name']);
            $this->assign('list', list_to_tree($list, 'id', 'pid', 'operator'));

            return $this->fetch('admin/groupSet');
        }
    }

    public function del($id = null)
    {
        (!$id || !is_numeric($id)) && $this->error('参数错误');

        $result = AuthModel::delRule($id);
        empty($result) ? $this->success('操作成功') : $this->error($result);
    }
}