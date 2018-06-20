<?php
/**
 * Created by PhpStorm.
 * User: Crazypeak
 * Date: 2017/10/16
 * Time: 15:04
 */

namespace app\admin\model;

use think\Db;

class UploadModel extends LogModel
{
    public static function getFileList($type = 0){
        return Db::name('file')->order(['sequence'=>'ACE'])->where(['type'=>$type])->order(['create_time'=>'DESC'])->select();
    }
}