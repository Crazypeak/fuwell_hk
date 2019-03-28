<?php
/**
 * Created by PhpStorm.
 * User: Crazypeak
 * Date: 2017/10/16
 * Time: 14:37
 */

namespace app\admin\controller\website;

use app\admin\controller\Index;
use think\Db;

class Comments extends Index
{
    public function index()
    {
        $list = Db::name('comments')->order(['create_time'=>'DESC'])->paginate(500);
        $this->assign('list',$list);
        return $this->fetch('website/commentsList');
    }

}