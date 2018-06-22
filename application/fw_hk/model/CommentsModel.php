<?php
/**
 * Created by PhpStorm.
 * User: Crazypeak
 * Date: 2017/10/22
 * Time: 14:55
 */

namespace app\fw_hk\model;

use think\Db;

class CommentsModel
{

    public static function addComments($data = []){
        return Db::name('comments')->insert($data);
    }
}