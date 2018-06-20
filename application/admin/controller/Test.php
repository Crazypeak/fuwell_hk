<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/17
 * Time: 14:45
 */

namespace app\admin\controller;

use app\admin\model\AuthModel;
use app\admin\model\LogModel;
use service\ApiModel;
use service\DataHandle;
use think\Controller;

class Test extends Controller
{
    /**
     * 模糊搜索平台货号组
     * @param code string 平台货号
     */
    public static function index()
    {

        $list = AuthModel::getUrlList();
        foreach ($list as $item) {
            echo '<a href="' . url($item['url']) . '">' . $item['name'] . '</a></br>';
        }
    }

    public static function testDate()
    {
        $date = '2017-05';

        $sta_date = date('Y-m-d H:i:s', strtotime($date));
        $end_date = date('Y-m-d H:i:s', strtotime('Next Month -1 Seconds', strtotime($date)));

        print_r($sta_date);
        print_r($end_date);
    }

    public static function lookLog()
    {
        print_r('<pre>');
        print_r(LogModel::getLogPage([], 'DESC')->toArray()['data']);
    }

    public static function test()
    {

        $url        = "http://test.jiushouguoji.com/api";
        $dataHandle = new DataHandle($url);

        $data = [
            'action' => 'bindMember',
            'phone'  => 'testtesttest',
        ];

        $data = $dataHandle->postHandle($data);
        echo $data;
    }

    public static function unbUndLingMember($phone){
        $result = ApiModel::unbUndLingMember($phone);
        print_r($result);
    }

}