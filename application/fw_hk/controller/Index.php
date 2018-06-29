<?php

namespace app\fw_hk\controller;

use app\fw_hk\model\CommentsModel;
use app\fw_hk\model\GoodsModel;
use app\fw_hk\model\InformationModel;
use app\fw_hk\model\ParameterModel;
use app\fw_hk\model\ColumnModel;
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

//        $footer    = ParameterModel::getFooterList();
//        $this->assign('footer', $footer);
    }

    public function index($url = 'index')
    {
//        $title = 'FullWell';
        switch ($url) {
            case 'index':
                $assign_data['news'] = InformationModel::getNewsPage([],3);
                break;
            case 'News':
                $assign_data = $this->article(input('id'));
                break;
            //产品模块前台输出是
            case 'Products':
                if ($class_name = input('class')) {
                    $assign_data['class'] = GoodsModel::getClassOne($class_name);
                    $assign_data['list'] = GoodsModel::getGoodsList(['class_id'=>$assign_data['class']['id']]);
//                    $title                = $assign_data['goods']['name'];
                }else if ($id = input('id')){
                    $assign_data['goods'] = GoodsModel::getGoodsOne($id);
                }else $assign_data['class_status'] = true;
                break;
            default:
                $assign_data = [];
                break;
        }
//
//        print_r('<pre>');
//        var_dump($url);
//        var_dump($assign_data);
        $this->assign('assign_data', $assign_data);

        $column = ColumnModel::getColumnUrlOne($url);
        !$column && $this->error('404!');

        $column_list      = ColumnModel::getColumnUrlList();
//        if ($column_list) foreach($column_list as $key=>$value){
//            $column_list[$key]['child'] = GoodsModel::getGoodsList($value['id']);
//        };
//        print_r('<pre>');print_r($column_list);die;

        $column_file_list = ColumnModel::getColumnFileList(['pid' => $column['id'], 'status' => 1]);

        $file_type_all        = ['html', 'css', 'js'];
        $column_file['type0'] = $column_file['type1'] = $column_file['type2'] = [];
        if ($column_file_list) foreach ($column_file_list as $item) {
            $column_file["type" . $item['type']][] = $column['url'] . '/' . $file_type_all[$item['type']] . '/' . $item['address'];
        }

        $title = $column['name'];
        $this->assign('title', $title);
        $this->assign('column', $column);
        $this->assign('column_list', $column_list);
        $this->assign('class_list', $column_list);

        $this->assign('column_file_html', implode(',', $column_file['type0']));
        $this->assign('column_file_css', implode(',', $column_file['type1']));
        $this->assign('column_file_js', implode(',', $column_file['type2']));

        $class_list = GoodsModel::getClassList();;
        $this->assign('class', $class_list);

        return $this->fetch('/' . $url . '/index');
    }

    private function article($id = null, $type = 0)
    {
        $where['type'] = $type;
        if (is_numeric($id)) {
            $article = InformationModel::getNewsOne(['id' => $id]);
            !$article && $this->error('404!');

            $article['keywords'] = explode('|',$article['keywords']);

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

    public function apiPostContact(){
        if ($data = input('post.')){
            $comments['name'] = $data['name'];
            $comments['phone'] = $data['phone'];
            $comments['email'] = $data['email'];
            $comments['message'] = $data['message'];

            $comments['create_time'] = time();
            CommentsModel::addComments($comments);

//            $this->success('Thank you for your valuable comments',url('/'));
        }
        $this->redirect('/success');
    }

    public function apiGetGoodsList($class_id,$page=1){
        $result = GoodsModel::getGoodsList(['class_id'=>$class_id],$page);
        $result ? $this->success($result) : $this->result('',2,'全部加载完毕');
    }

    public function apiGetSearch($key = ''){
        $data = [];

        $goods_list = GoodsModel::getGoodsList(['name'=>['LIKE','%'.$key.'%']],0,4);
        foreach ($goods_list as $goods){
            $time = strtotime($goods['create_time']);
            $data[$time]['status'] = 'Products';
            $data[$time]['id'] = $goods['code'];
            $data[$time]['name'] = $goods['name'];
            $data[$time]['img_url'] = $goods['img_url'];
        }

        $news_list  = InformationModel::getNewsPage(['title'=>['LIKE','%'.$key.'%']],4);
        foreach ($news_list as $news){
            $time = strtotime($news['create_time']);
            $data[$time]['status'] = 'News';
            $data[$time]['id'] = $news['id'];
            $data[$time]['name'] = $news['title'];
            $data[$time]['img_url'] = $news['img_url'];
        }

        array_multisort($data,SORT_DESC);
        $this->success($data,SORT_DESC );
    }
}