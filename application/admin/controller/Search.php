<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/25
 * Time: 17:52
 */

namespace app\admin\controller;

use service\ApiModel;
use think\Controller;

class Search extends Controller
{
    public function _initialize()
    {
        if (!is_login()) {// 还没登录 跳转到登录页面
            $this->error('还没登录', url('User/login'));
        }
    }

    /**
     * 获取绑定商品
     * @param string $key 商品完整的商品货号
     * @return mixed
     */
    public function seaBindGoods($key = '')
    {
        $result = ApiModel::getGoods($key);

        if (isset($result['err_code'])) {
            $this->error($result['message']);
        }

        $goods['product_code'] = $result['pcode'];
        $goods['name']         = $result['goods_name'];
        $goods['bar_code']     = $result['goods_code'];
        $goods['spec']         = $result['spec_value'];

        $this->success($goods);
    }

    /**
     * 获取绑定商品
     * @param string $key 电话
     * @return mixed
     */
    public function seaBindMember($key = '')
    {
        $result = ApiModel::getMember($key);

        if (isset($result['err_code'])) {
            $this->error($result['message']);
        }

        $member['username'] = $result['username'];
        $member['nickname'] = $result['nickname'];
        $member['phone']    = $result['phone'];
        $member['email']    = $result['email'];
        $member['logo']     = $result['logo'];
        $member['sex']      = $result['sex'];          //性别 0=未设定 1=男 2=女
        $member['birthday'] = $result['birthday'];

        $this->success($member);
    }

}