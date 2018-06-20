<?php
/**
 * Created by PhpStorm.
 * User: Crazypeak
 * Date: 2017/10/16
 * Time: 15:04
 */

namespace app\admin\model;

use think\Db;

class ColumnModel extends LogModel
{
    public static function getColumnUrlList()
    {
        return Db::name('column_url')->order(['sequence' => 'ACE'])->select();
    }

    public static function getColumnUrlName($where = [])
    {
        return Db::name('column_url')->where($where)->field(['name','id'])->select();
    }

    public static function getColumnUrlOne($id,$filed=true)
    {
        return Db::name('column_url')->field($filed)->find($id);
    }

    public static function saveColumnUrl($data = [])
    {
        $validate = validate('Column');
        if (!$validate->scene('column_url')->check($data)) {
            return $validate->getError();
        }

        $column_url['name']     = trim($data['name']);
        $column_url['url']      = $data['url'];
        $column_url['status']   = $data['status'];
        $column_url['sequence'] = $data['sequence'];

        if (isset($data['id']) && is_numeric($data['id'])) {
            Db::name('column_url')->where(['id' => $data['id']])->update($column_url);
        } else {
            $column_url['create_time'] = time();
            Db::name('column_url')->insert($column_url);
        }

        $file_dir = APP_PATH . config('default_module').'/view/' . $column_url['url'] . '/';
        if (!file_exists($file_dir)) {
            $result = mkdir($file_dir);
            if (!$result) return '文件夹创建错误';
        }

        $file_path = APP_PATH . config('default_module').'/view/main.html';
        if (file_exists($file_path) && filesize($file_path)) {
            $file_data        = fopen($file_path, "r");
            $file = fread($file_data, filesize($file_path));
            fclose($file_data);

            $file_data = fopen($file_dir . 'index.html', "w") or die("Unable to open file!");
            fwrite($file_data, $file);
            fclose($file_data);
        };

        return '';
    }

    public static function delColumnUrl($id)
    {
        $column = self::getColumnUrlOne($id);
        if (!$column) return false;

        $column_path = APP_PATH . config('default_module').'/view/' . $column['url'];
        file_exists($column_path) && delDirAndFile($column_path,true);

        return Db::name('column_url')->where(['id' => $id])->delete();
    }

    public static function getColumnFileList($where = [])
    {
        $list = Db::name('column_file')->where($where)->order(['sequence' => 'ASC'])->select();
        $data = [];
        if ($list) foreach ($list as $item) {
            $data["type" . $item['type']][] = $item;
        }

        return $data;
    }

    public static function getColumnFileOne($id)
    {
        return Db::name('column_file')->alias('f')->join('column_url u', 'f.pid = u.id')->field(['f.*', 'u.url'])->find($id);
    }

    public static function saveColumnFile($data = [], $dir = '', $time = 0)
    {
        $validate = validate('Column');
        if (!$validate->scene('column')->check($data)) {
            return $validate->getError();
        }

        $column_file['name']        = trim($data['name']);
        $column_file['pid']         = $data['pid'];
        $column_file['type']        = $data['type'];
        $column_file['status']      = $data['status'];
        $column_file['address']     = $data['address'];
        $column_file['sequence']    = $data['sequence'];
        $column_file['create_time'] = date('Y-m-d H:i:s', $time);

        if (isset($data['id']) && is_numeric($data['id'])) {
            $address = $dir . self::getColumnFileOne($data['id'])['address'].'.html';
            file_exists($address) && @unlink($address);
            Db::name('column_file')->where(['id' => $data['id']])->update($column_file);
        } else {
            Db::name('column_file')->insert($column_file);
        }

        Db::name('column_url')->where(['id' => $data['pid']])->update(['create_time' => $column_file['create_time']]);

        return '';
    }

    public static function delColumnFile($id = null)
    {
        $column_file = self::getColumnFileOne($id);
        if (!$column_file) return false;

        $type_all  = ['html', 'css', 'js'];
        $file_type = $type_all[$column_file['type']];
        $file_path = APP_PATH . config('default_module').'/view/' . $column_file['url'] . '/' . $file_type . '/' . $column_file['address'].'.html';
        file_exists($file_path) && @unlink($file_path);

        $file_path = APP_PATH . config('default_module').'/view/' . $column_file['url'] . '/index.html';
        touch($file_path);

        return Db::name('column_file')->where(['id' => $id])->delete();
    }
}