<?php
/**
 * Created by PhpStorm.
 * User: Crazypeak
 * Date: 2017/2/17
 * Time: 16:59
 */

namespace app\admin\controller\admin;

use app\admin\controller\Index;
use app\admin\model\UserModel;
use app\admin\model\AuthModel;

class User extends Index
{
    /**
     * 员工列表
     * @param string $key 搜索功能关键字，可搜索昵称和账号
     * @return mixed
     */
    public function userList($key = '')
    {
        $where = [];
//        if (!empty($key)) {
//            $where['a.nickname'] = ['LIKE', '%' . $key . '%'];
//            $where['a.username'] = ['LIKE', '%' . $key . '%'];
//        }

        $list = UserModel::getUserPage($where);

        $this->assign('list', $list);

        $group = AuthModel::getRuleList(['id', 'name']);
        $this->assign('group', $group);

        return $this->fetch('admin/userList');
    }

    /**
     * @param string $nickname 昵称
     * @param string $username 账号
     * @param string $password 密码
     * @param string $verify_pw 二次密码
     */
    public function userAdd()
    {
        $data = input('post.');
        ($data['password'] === $data['verify_pw']) && $data['password'] = UserModel::encrypt($data['password']);
        $result = UserModel::addUser($data);
        empty($result) ? $this->success('操作成功', url('admin.user/userList')) : $this->error($result);
    }

    /**
     * 编辑员工信息
     * @param null $id
     * @param string $nickname 昵称
     * @param string $group_id 员工组id
     * @param string $status 状态 0允许登录，1不允许登录
     */
    public function userEdit($id = null)
    {
        $row = UserModel::getUserOne(['id' => $id]);
        !$row && $this->error('员工不存在');

        if ($data = input('post.')) {
            $result = UserModel::saveUser($data, $id);
            empty($result) ? $this->success('操作成功', url('admin.user/userList')) : $this->error($result);
        } else {
            //修改数据，三个
            $user['id']       = $row['id'];
            $user['nickname'] = $row['nickname'];
            $user['group_id'] = $row['group_id'];
            $user['status']   = $row['status'];

            return $user;
        }
    }

    public function userDel($id = null)
    {
        (!$id || !is_numeric($id)) && $this->error('参数错误');

        $result = UserModel::delUser($id);
        empty($result) ? $this->success('操作成功') : $this->error($result);
    }

    /**
     * 重置密码，默认密码：jiushouguoji
     * @param null $id
     * @param string $password
     */
    public function resetPassword($id = null, $password = 'jiushouguoji')
    {
        $user = UserModel::getUserOne(['id' => $id]);
        $user && UserModel::changePassword($user['id'], $user['password'], $password);
        $this->success('操作成功');
    }
}