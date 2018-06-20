<?php
/**
 * Created by PhpStorm.
 * User: Crazypeak
 * Date: 2017-01-16
 * Time: 16:30
 */

namespace app\admin\controller;

use think\Controller;
use app\admin\model\UserModel;
use app\admin\model\LogModel;

class User extends Controller
{

    public function backLogin()
    {
        session('user_auth', null);
        $this->redirect('User/login');
    }

    /**
     * @param null $username 账号
     * @param null $password 密码
     * @param null $verify 验证码
     * @return mixed
     */
    public function login($username = null, $password = null, $verify = null)
    {
        if (input('?post.username')) {
            if (captcha_check($verify)) {
                $UserModel = new UserModel();
                $member = $UserModel->getUserOne(['username' => $username, 'status' => 1]);

                if (!$member || $member['password'] != $UserModel->encrypt($password)) $this->error('账号或密码错误');

                $user['uid']      = $member['id'];
                $user['group_id'] = $member['group_id'];
                $user['username'] = $member['username'];
                $user['nickname'] = $member['nickname'];
                $user['status']   = $member['status'];
                session('user_auth', $user);
                session('user_auth_sign', data_auth_sign($user));

                LogModel::addLog(0, $member['id'], '员工登录');

                $this->success('登录成功', url('index/index'));
            } else {
                $this->error('验证码错误');
            }
        } else {
            return $this->fetch('Public/login');
        }
    }

    /**
     * 修改密码
     * @param null $password 原密码
     * @param null $new_password 新密码
     * @param null $ver_password 再次新密码
     * @return mixed
     */
    public function changePW($password = null, $new_password = null, $ver_password = null)
    {
        $uid = is_login();
        if (!$uid) {// 还没登录 跳转到登录页面
            $this->error('还没登录', url('User/login'));
        }

        if (input('?post.password')) {
            $new_password !== $ver_password && $this->error('二次密码不相同');
            $new_password === $password && $this->error('新旧密码相同');

            $UserModel = new UserModel();
            $result = $UserModel->changePassword($uid, UserModel::encrypt($password), $new_password);
            $result ? $this->success('登录成功') : $this->error('操作失败');
        } else return $this->fetch();
    }

}