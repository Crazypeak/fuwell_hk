<?php
/**
 * Created by PhpStorm.
 * User: Crazypeak
 * Date: 2017/2/8
 * Time: 12:00
 */

namespace app\admin\model;

use think\Db;

class AuthModel extends LogModel
{
    public static function getTitleName($id = 0)
    {
        $child            = Db::name('auth_url')->where(['id' => $id])->find();
        $result['crumbs'] = Db::name('auth_url')->where(['id' => ['IN', $child['layer']]])->order(['layer'=>'ASC'])->column('name,url');
        $result[0]        = $child;
        return $result;
    }

    /**
     * 新增，更新功能接口表
     * @param array $data
     * @return int|string
     */
    public static function saveUrl($data = [])
    {
        $validate = validate('Auth');
        if (!$validate->scene('auth_url')->check($data)) {
            return $validate->getError();
        }

        $url['name']     = trim($data['name']);
        $url['pid']      = $data['pid'];
        $url['status']   = $data['status'];
        $url['sequence'] = $data['sequence'];
        $url['url']      = $data['url'];

        if (isset($data['id']) && is_numeric($data['id'])) {
            Db::name('auth_url')->where(['id' => $data['id']])->update($url);
            $id = $data['id'];
            LogModel::addLog(1, $id, '编辑菜单导航');
        } else {
            $url['create_time'] = time();
            $id                 = Db::name('auth_url')->insertGetId($url);
            LogModel::addLog(1, $id, '新增菜单导航');
        }

        //层次，结构概念方便搜索用
        $parent = self::getUrlOne($data['pid']);
        $layer  = ($parent ? $parent['layer'] : '') . $id . ',';
        Db::name('auth_url')->where(['id' => $id])->update(['layer' => $layer]);

        return '';
    }

    public static function getUserRule($id)
    {
        return Db::name('auth_rule')->where(['id' => $id])->value('rule');
    }

    public static function getUserUrl($where = [])
    {
        return Db::name('auth_url')->where($where)->order(['sequence' => 'ASC'])->select();
    }

    /**
     * 获取菜单表
     * @param array $where
     * @param bool $field
     * @return false|\PDOStatement|string|\think\Collection
     */
    public static function getUrlList($where = [], $field = true,$type=0)
    {
//        $where['type'] = $type;
        return Db::name('auth_url')->where($where)->field($field)->order(['sequence' => 'ASC', 'id' => 'ASC'])->select();
    }

    public static function getUrlOne($id = null)
    {
        return Db::name('auth_url')->where(['id' => $id])->find();
    }

    public static function delUrlOne($id = null)
    {
        $result = Db::name('auth_url')->where(['id' => $id])->delete();
        $result && LogModel::addLog(1, $id, '删除菜单导航');
        while ($result) {
            $map = ['pid' => ['IN', $id]];
            $id  = Db::name('auth_url')->where($map)->column('id');
            if (empty($id)) {
                break;
            } else {
                Db::name('auth_url')->where($map)->delete();
            }
        }

        return $result;
    }

    /**
     * 获取规则
     * @return false|\PDOStatement|string|\think\Collection
     */
    public static function getRuleList($field = true)
    {
        return Db::name('auth_rule')->field($field)->select();
    }

    public static function getRuleOne($id = null)
    {
        return Db::name('auth_rule')->where(['id' => $id])->find();
    }

    public static function saveGroup($data)
    {
        $validate = validate('Auth');
        if ($validate->scene('auth_rule')->check($data)) {
            $group_data['name']     = $data['name'];
            $group_data['status']   = $data['status'];
            $group_data['sequence'] = $data['sequence'];
            $group_data['remark']   = isset($data['remark']) ? $data['remark'] : '';

            if (isset($data['id']) && is_numeric($data['id'])) {
                Db::name('auth_rule')->where(['id' => $data['id']])->update($group_data);
                LogModel::addLog(1, $data['id'], '编辑员工组');
            } else {
                $rule['create_time'] = time();
                $id                  = Db::name('auth_rule')->insertGetId($group_data);
                LogModel::addLog(1, $id, '新增员工组');
            }

            return '';
        } else {
            return $validate->getError();
        }
    }

    public static function saveRule($group_id = 0, $rule = [])
    {
        if ($data = self::getRuleOne($group_id)) {
            $data['rule'] = !empty($data) ? implode(',', $rule) : '';
            Db::name('auth_rule')->where(['id' => $group_id])->update($data);
            LogModel::addLog(1, $data['id'], '员工组权限修改');
            return '';
        } else {
            return '员工组不存在';
        }
    }

    public static function delRule($id)
    {
        $row = Db::name('user')->where(['group_id' => $id])->find();
        if ($row)
            return '该员工组存在员工，不能删除';

        $result = Db::name('auth_rule')->where(['id' => $id])->delete();
        $result && LogModel::addLog(1, $id, '删除员工组权限');

        return '';
    }
}