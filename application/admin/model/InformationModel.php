<?php
/**
 * Created by PhpStorm.
 * User: Crazypeak
 * Date: 2017/10/22
 * Time: 22:38
 */

namespace app\admin\model;

use think\Db;

class InformationModel extends LogModel
{
    public static function getNewsPage($where = [], $page = 30)
    {
        return Db::name('article')->where($where)->paginate($page);
    }

    public static function getNewsOne($id = null)
    {
        return Db::name('article')->find($id);
    }

    public static function saveNews($data = [])
    {
        $validate = validate('Information');
        if (!$validate->check($data)) {
            return $validate->getError();
        }

        $article['user_id']      = USER_ID;
        $article['author']      = session('user_auth.nickname');
        $article['title']       = trim($data['title']);
        $article['description'] = trim($data['description']);
        $article['type']        = $data['type'];
        $article['status']      = $data['status'];
        $article['content']     = $data['content'];
        $article['img_url']     = $data['img_url'];

        if (isset($data['id']) && is_numeric($data['id'])) {
            Db::name('article')->where(['id' => $data['id']])->update($article);
        } else {
            $article['id']          = time();
            $article['create_time'] = date('Y-m-d H:i:s');
            Db::name('article')->insert($article);
        }

        return '';
    }

    public static function delNews($id)
    {
        return Db::name('article')->where(['id' => $id])->delete();
    }
}