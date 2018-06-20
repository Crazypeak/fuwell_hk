<?php
/**
 * Created by PhpStorm.
 * User: Crazypeak
 * Date: 2017/2/11
 * Time: 14:33
 */

namespace app\admin\model;

use think\Db;

class UserModel extends LogModel
{
    public static function getUserList($where){
        return Db::name('user')->where($where)->column('id,name');
    }

    public static function getUserPage($where = [])
    {
        return Db::name('user')
            ->alias('u')
            ->join('auth_rule g','u.group_id = g.id')
            ->whereOr($where)
            ->field(['u.id', 'nickname','username', 'u.status', 'g.name'=>'group_name'])
            ->order(['u.status' => 'DESC', 'u.create_time' => 'DESC'])
            ->paginate(20);
    }

    public static function getUserOne($where = [])
    {
        return Db::name('user')->where($where)->find();
    }

    public static function encrypt($password = '')
    {
        return md5(sha1($password) . 'JS');
    }

    public static function addUser($data)
    {
        $validate = validate('User');
        if ($validate->scene('user_add')->check($data)) {
            $user['nickname']    = trim($data['nickname']);
            $user['username']    = trim($data['username']);
            $user['password']    = $data['password'];
            $user['status']      = $data['status'];
            $user['group_id']    = $data['group_id'];
            $user['create_time'] = time();

            //新增员工
            $id = Db::name('user')->insertGetId($user);

            //记录操作日志
            LogModel::addLog(0, $id, '新增员工');

            return '';
        }

        return $validate->getError();
    }

    public static function saveUser($data = [],$id = 0)
    {
        $validate = validate('User');
        if ($validate->scene('user_edit')->check($data)) {
            $user['nickname'] = trim($data['nickname']);
            $user['status']   = $data['status'];
            $user['group_id'] = $data['group_id'];

            $result = Db::name('user')->where(['id' => $id])->update($user);

            //记录操作日志
            $result && LogModel::addLog(0, $id, '员工信息修改');

            return '';
        }

        return $validate->getError();
    }

    public static function delUser($id)
    {
        if ($id == 1)
            return '超级管理员不能删除';

        $result = Db::name('user')->where(['id' => $id])->delete();
        $result && LogModel::addLog(1, $id, '删除员工');

        return '';
    }

    public static function changePassword($uid = null, $password = null, $new_password)
    {
        $where  = ['id' => $uid, 'password' => $password];
        $result = Db::name('user')->where($where)->update(['password' => UserModel::encrypt($new_password)]);

        //记录操作日志
        $result && LogModel::addLog(0, $uid, '修改密码');

        return $result;
    }
}