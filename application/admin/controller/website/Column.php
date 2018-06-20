<?php
/**
 * Created by PhpStorm.
 * User: Crazypeak
 * Date: 2017/10/16
 * Time: 14:37
 */

namespace app\admin\controller\website;

use app\admin\controller\Index;
use app\admin\model\ColumnModel;

class Column extends Index
{
    public function columnList()
    {
        $list = ColumnModel::getColumnUrlList();
        $this->assign('list', $list);

        $file_type = '.html';
        $file_dir  = APP_PATH . config('default_module').'/view/';

        $code_all  = ['baseScript', 'baseHead'];
        $code_text = [];
        foreach ($code_all as $item) {
            $file_name = $item . $file_type;
            $file_path = $file_dir . $file_name;

            /*
             * 文件读取
             */
            if (file_exists($file_path) && filesize($file_path)) {
                $file_data        = fopen($file_path, "r");
                $code_text[$item] = fread($file_data, filesize($file_path));
                fclose($file_data);
            } else   $code_text[$item] = '';
        }

        $this->assign('code_text', $code_text);

        return $this->fetch('website/columnList');
    }

    public function columnSave()
    {
        if ($data = input('post.')) {
            $result = ColumnModel::saveColumnURL($data);
            empty($result) ? $this->success('操作成功') : $this->error($result);
        }
    }

    public function columnDel($id = null)
    {
        (!$id || !is_numeric($id)) && $this->error('参数错误');
        $result = ColumnModel::delColumnUrl($id);
        $result ? $this->success('操作成功') : $this->error($result);
    }

    public function codeSave()
    {
        if ($data = input('post.')) {
            $file_type = '.html';
            $file_dir  = APP_PATH . config('default_module').'/view/';

            if (!file_exists($file_dir)) {
                $result = mkdir($file_dir);
                !$result && $this->error('文件夹创建错误');
            }

            /*
             * 文件保存
             */
            $file_name = ($data['type'] ? 'baseScript' : 'baseHead') . $file_type;
            $file_data = fopen($file_dir . $file_name, "w") or die("Unable to open file!");

            // 样式打包管理
            if (!strpos('gt-jm.com',$_SERVER['SERVER_NAME'])) {
                $data['code_text'] = str_replace("'css/", "'fw_hk/css/", $data['code_text']);
                $data['code_text'] = str_replace("'js/", "'fw_hk/js/", $data['code_text']);
                $data['code_text'] = str_replace("'images/", "'fw_hk/images/", $data['code_text']);

                $data['code_text'] = str_replace('"css/', '"fw_hk/css/', $data['code_text']);
                $data['code_text'] = str_replace('"js/', '"fw_hk/js/', $data['code_text']);
                $data['code_text'] = str_replace('"images/', '"fw_hk/images/', $data['code_text']);
            }

            fwrite($file_data, $data['code_text']);
            fclose($file_data);

            $this->success('操作成功');
        }
    }
}