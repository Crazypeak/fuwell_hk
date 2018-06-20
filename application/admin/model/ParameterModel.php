<?php
/**
 * Created by PhpStorm.
 * User: Crazypeak
 * Date: 2017/10/16
 * Time: 15:04
 */

namespace app\admin\model;

use think\Db;

class ParameterModel extends LogModel
{
    public static function getParameterList($where = [])
    {
        return Db::name('config')->where($where)->order(['sequence'=>'ASC'])->select();
    }

    public static function saveParameter($data = [])
    {
        foreach ($data as $key => $value) {
            Db::name('config')->where(['key' => $key])->update(['value' => $value]);
        }

        return '';
    }

    public static function getFooterList($where = [])
    {
        $footer_data = Db::name('footer')->where($where)->order(['pid' => 'ASC', 'sequence' => 'ASC'])->select();

        $footer_list = [];
        foreach ($footer_data as $item) {
            if ($item['pid'] == 0) {
                $footer_list[$item['id']]          = $item;
                $footer_list[$item['id']]['child'] = [];
            } else {
                $footer_list[$item['pid']]['child'][] = $item;
            }
        }

        return $footer_list;
    }

    public static function saveFooter($data = [])
    {
        $validate = validate('Footer');
        if (!$validate->check($data)) {
            return $validate->getError();
        }

        $id = Db::name('footer')->insertGetId($data);

        //层次，结构概念方便搜索用
        $parent = Db::name('footer')->find($data['pid']);
        $layer  = ($parent ? $parent['layer'] : '') . $id . ',';
        Db::name('footer')->where(['id' => $id])->update(['layer' => $layer]);

        return '';
    }

    public static function delFooter($id)
    {
        return Db::name('footer')->where(['layer' => ['LIKE', '%' . $id . ',%']])->delete();
    }
}