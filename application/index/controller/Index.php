<?php

namespace app\index\controller;

use app\index\model\GoodsModel;
use app\index\model\InformationModel;
use app\index\model\ParameterModel;
use app\index\model\ColumnModel;
use think\Controller;
use think\Request;

class Index extends Controller
{
    public function _initialize()
    {
        $request = Request::instance();
        $url = $request->url();
        if (strlen($url)!=1 && substr($url, -1) == '/'){
            $newUrl = substr($url,0,strlen($url)-1);
            $this->redirect(url($newUrl));
        }

        $parameter = ParameterModel::getParameterList();
        $this->assign('par', $parameter);

        $footer    = ParameterModel::getFooterList();
        $this->assign('footer', $footer);
    }

    public function index($url = null)
    {
        $title = '';
        switch ($url) {
            case 'newlist':
                $assign_data = $this->article(input('id'));
                break;
            case 'information':
                $assign_data = $this->article(input('id'), 1);
                break;
            default:
                if ($id = input('id')) {
                    $url                  = 'goods';
                    $assign_data['goods'] = $this->goods($id);
                    $title                = $assign_data['goods']['name'];
                } else $assign_data = [];
                break;
        }
        $this->assign('assign_data', $assign_data);

        $column = ColumnModel::getColumnUrlOne($url);
        !$column && $this->error('404!');

        $column_list      = ColumnModel::getColumnUrlList();
        if ($column_list) foreach($column_list as $key=>$value){
            $column_list[$key]['child'] = GoodsModel::getGoodsList($value['id']);
        };
//        print_r('<pre>');print_r($column_list);die;

        $column_file_list = ColumnModel::getColumnFileList(['pid' => $column['id'], 'status' => 1]);

        $file_type_all        = ['html', 'css', 'js'];
        $column_file['type0'] = $column_file['type1'] = $column_file['type2'] = [];
        if ($column_file_list) foreach ($column_file_list as $item) {
            $column_file["type" . $item['type']][] = $column['url'] . '/' . $file_type_all[$item['type']] . '/' . $item['address'];
        }

        empty($title) && $title = $column['name'];
        $this->assign('title', $title);
        $this->assign('column', $column);
        $this->assign('column_list', $column_list);

        $this->assign('column_file_html', implode(',', $column_file['type0']));
        $this->assign('column_file_css', implode(',', $column_file['type1']));
        $this->assign('column_file_js', implode(',', $column_file['type2']));

        $goods_list = GoodsModel::getGoodsList($column['id']);
        $this->assign('goods_list', $goods_list);

        return $this->fetch('/' . $url . '/index');
    }

    private function article($id = null, $type = 0)
    {
        $where['type'] = $type;
        if (is_numeric($id)) {
            $article = InformationModel::getNewsOne(['id' => $id]);
            !$article && $this->error('404!');

            $article['article'] = $article;
            $where['id']        = ['LT', $id];
            $article['last']    = InformationModel::getNewsOne($where, ['id', 'title']);
            $where['id']        = ['GT', $id];
            $article['news']    = InformationModel::getNewsOne($where, ['id', 'title']);

            $this->assign('title', $article['article']['title']);
            $this->assign('description', $article['article']['description']);

            return ['row' => $article];
        } else {
            $article_page = InformationModel::getNewsPage($where);

            return ['list' => $article_page];
        }
    }

    private function goods($id)
    {
        return GoodsModel::getGoodsOne($id);
    }
}