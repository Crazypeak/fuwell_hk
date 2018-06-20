<?php
/**
 * Created by PhpStorm.
 * User: Crazypeak
 * Date: 2017/10/22
 * Time: 22:21
 */

namespace app\admin\controller\information;


use app\admin\controller\Index;
use app\admin\model\InformationModel;

class Article extends Index
{
    public function index($type = null)
    {
        $where = [];
        is_numeric($type) && $where['type'] = $type;
        $news_page = InformationModel::getNewsPage($where);
        $this->assign('list', $news_page);

        return $this->fetch('information/articleList');
    }

    public function save($id=null)
    {
        is_numeric($id) && $this->assign('id',$id);

        if ($data = input('post.')) {
            if ($file = request()->file('img')) {
                $file_name = $file->validate(['ext' => 'jpg,png'])->rule('uniqid')->move(ROOT_PATH .  'upload' . DS . 'article')->getBasename();
                $data['img_url']   = '/upload/article/' . $file_name;
            }

            $result = InformationModel::saveNews($data);
            empty($result) ? $this->success('操作成功', url('index')) : $this->error($result);
        } else if ($id = input('get.id')) {
            $news = InformationModel::getNewsOne($id);
            return $news;
        } else return $this->fetch('information/articleSave');
    }

    public function del($id = null)
    {
        (!$id || !is_numeric($id)) && $this->error('参数错误');
        $result = InformationModel::delNews($id);
        $result ? $this->success('操作成功') : $this->error($result);
    }
}
