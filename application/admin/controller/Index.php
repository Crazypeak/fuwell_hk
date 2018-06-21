<?php

namespace app\admin\controller;

use app\admin\model\AuthModel;
use app\index\model\Auth;
use think\Controller;

class Index extends Controller
{

    public function _initialize()
    {
//        print_r('<pre>');
//        print_r($_SERVER);die;
        if (defined('USER_ID'))
            return true;
        define('USER_ID', is_login());
        if (!USER_ID) {// 还没登录 跳转到登录页面
            $this->redirect('User/login');
        }
        define('IS_ADMIN', (is_administrator()));
        define('IS_ROOT', (IS_ADMIN || is_management()));

        //判断权限
        $action_id = verifyUrl();
        !$action_id && $this->error('你没有权限访问');

        $url    = AuthModel::getUrlOne($action_id);
        $action = $url['url'];
        while ($url['pid'] != 0) {
            $action = $url['url'];
            $url    = AuthModel::getUrlOne($url['pid']);
        }
        $this->assign('is_url', $action);

        $this->assign('title_all', AuthModel::getTitleName($action_id));
        $this->assign('menu', $this->getMenuList());
        $this->assign('nickname', session('user_auth.nickname'));
        $this->assign('username', session('user_auth.username'));

        return true;
    }

    public function index()
    {
        return $this->fetch('Public/welcome');
    }

    /**
     * 获取菜单数组
     * @return false|\PDOStatement|string|\think\Collection
     */
    private static function getMenuList()
    {
        $where = ['pid' => 0, 'status' => 1];
        $field = ['id', 'name', 'url'];
        if (!IS_ADMIN) {
            $result      = AuthModel::getUserRule(session('user_auth.group_id'));
            $where['id'] = ['IN', $result['rule']];
        }

        $menu = AuthModel::getUrlList($where, $field);
        foreach ($menu as &$item) {
            $where['pid']  = $item['id'];
            $item['child'] = AuthModel::getUrlList($where, $field);
        }

        return $menu;
    }
}
