<?php
/**
 * Created by PhpStorm.
 * User: Crazypeak
 * Date: 2017/10/22
 * Time: 18:00
 */

namespace app\admin\controller\website;

use app\admin\controller\Index;
use app\admin\model\ColumnModel;
use app\admin\model\ParameterModel;

class Parameter extends Index
{
    public function index()
    {
        $parameter_list = ParameterModel::getParameterList();
        $this->assign('parameter_list', $parameter_list);

        $footer_list = ParameterModel::getFooterList();
        $this->assign('footer_list', $footer_list);

        return $this->fetch('website/parameter');
    }

    /*
     * 网站参数保存接口
     */
    public function parameterSave(){
        if ($data = input('post.')) {
            $result = ParameterModel::saveParameter($data);
            empty($result) ? $this->success('操作成功') : $this->error($result);
        }
    }

    /*
     * 页脚导航管理接口
     */
    public function footerSave(){
        if ($data = input('post.')) {
            $result = ParameterModel::saveFooter($data);
            empty($result) ? $this->success('操作成功') : $this->error($result);
        }
    }

    public function footerDel($id = null){
        (!$id || !is_numeric($id)) && $this->error('参数错误');
        $result = ParameterModel::delFooter($id);
        $result ? $this->success('操作成功') : $this->error($result);
    }
}