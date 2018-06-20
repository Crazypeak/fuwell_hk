<?php
/**
 * Created by PhpStorm.
 * User: Crazypeak
 * Date: 2017/10/17
 * Time: 4:50
 */

namespace app\admin\controller\website;

use app\admin\controller\Index;
use app\admin\model\ColumnModel;

class Template extends Index
{
    public function columnTemplateList($id)
    {
        (!$id || !is_numeric($id)) && $this->error('参数错误');
        $column  = ColumnModel::getColumnUrlOne($id);
        $tp_list = ColumnModel::getColumnFileList(['pid' => $id]);
        $this->assign('column', $column);
        $this->assign('list', $tp_list);

        return $this->fetch('website/columnTemplateList');
    }

    public function columnTemplateSave($id = null)
    {
        if ($data = input('post.')) {

            $validate = validate('Column');
            if (!$validate->scene('column')->check($data)) {
                $this->error($validate->getError());
            }
            $time   = time();
            $column = ColumnModel::getColumnUrlOne($data['pid']);

            $type_all  = ['html', 'css', 'js'];
            $file_type = $type_all[$data['type']];
            $file_name = date('YmdHis', $time) . '.html';
            $file_dir  = APP_PATH . config('default_module').'/view/' . $column['url'] . '/' . $file_type . '/';

            if (!file_exists($file_dir)) {
                $result = mkdir($file_dir);
                !$result && $this->error('文件夹创建错误');
            }

            /*
             * 文件保存
             */
            $file_data = fopen($file_dir . $file_name, "w") or die("Unable to open file!");

            // 样式打包管理
            if (is_HK()) {
                $data['code_text'] = str_replace("'css/", "'fw_hk/css/", $data['code_text']);
                $data['code_text'] = str_replace("'js/", "'fw_hk/js/", $data['code_text']);
                $data['code_text'] = str_replace("'images/", "'fw_hk/images/", $data['code_text']);

                $data['code_text'] = str_replace('"css/', '"fw_hk/css/', $data['code_text']);
                $data['code_text'] = str_replace('"js/', '"fw_hk/js/', $data['code_text']);
                $data['code_text'] = str_replace('"images/', '"fw_hk/images/', $data['code_text']);
            }

            fwrite($file_data, $data['code_text']);
            fclose($file_data);

            $file_path = APP_PATH . config('default_module').'/view/' . $column['url'] . '/index.html';
            touch($file_path);

            $data['address'] = date('YmdHis', $time);
            $result          = ColumnModel::saveColumnFile($data, $file_dir, $time);
            empty($result) ? $this->success('操作成功') : $this->error($result);
        } else {
            $column_file = ColumnModel::getColumnFileOne($id);

            $type_all  = ['html', 'css', 'js'];
            $file_type = $type_all[$column_file['type']];
            $file_dir  = APP_PATH . config('default_module').'/view/' . $column_file['url'] . '/' . $file_type . '/';
            $file_name = $column_file['address'] . '.html';
            $file_path = $file_dir . $file_name;

            /*
             * 文件读取
             */
            if (file_exists($file_path)) {
                $file_data = fopen($file_path, "r");
                $code_text = fread($file_data, filesize($file_path));
                fclose($file_data);
            } else   $code_text = '';

            print_r($code_text);
        }
    }

    public function columnTemplateDel($id)
    {
        (!$id || !is_numeric($id)) && $this->error('参数错误');
        $result = ColumnModel::delColumnFile($id);
        $result ? $this->success('操作成功') : $this->error('操作失败');
    }
}