<?php
/**
 * Created by Fengfeng.
 * User: Fengfeng
 * Date: 2017/4/18
 * Time: 14:51
 */

/**
 * 数据签名认证
 * @param  array $data 被认证的数据
 * @return string       签名
 */
function data_auth_sign($data)
{
    //数据类型检测
    if (!is_array($data)) {
        $data = (array)$data;
    }
    ksort($data); //排序
    $code = http_build_query($data); //url编码并生成query字符串
    $sign = sha1($code); //生成签名
    return $sign;
}

/**
 * 把返回的数据集转换成Tree
 * @param array $list 要转换的数据集
 * @param string $pid parent标记字段
 * @param string $level level标记字段
 * @return array
 */
function list_to_tree($list=[], $pk = 'id', $pid = 'pid', $child = '_child', $root = 0)
{
    // 创建Tree
    $tree = [];
    if (is_array($list)) {
        // 创建基于主键的数组引用
        $refer = [];
        foreach ($list as $key => $data) {
            $refer[$data[$pk]] =& $list[$key];
        }
        foreach ($list as $key => $data) {
            // 判断是否存在parent
            $parentId = $data[$pid];
            if ($root == $parentId) {
                $tree[] =& $list[$key];
            } else {
                if (isset($refer[$parentId])) {
                    $parent           =& $refer[$parentId];
                    $parent[$child][] =& $list[$key];
                }
            }
        }
    }

    return $tree;
}

/**
 * 检测当前员工是否为管理员
 * @return boolean true-管理员，false-非管理员
 */
function is_administrator($uid = null)
{
    $uid = is_null($uid) ? is_login() : $uid;

    return $uid && (intval($uid) === config('USER_ADMINISTRATOR'));
}

/**
 * 检测当前员工是否为管理组
 * @return boolean true-管理员，false-非管理员
 */
function is_management()
{
    return (intval(session('user_auth.group_id')) === config('USER_MANAGEMENT'));
}

/**
 * 检测当前员工是否为订单操作员
 * @return boolean true-管理员，false-非管理员
 */
function is_order_group()
{
    return (intval(session('user_auth.group_id')) === config('USER_ORDER_GROUP'));
}

/**
 * 检测员工是否登录
 * @return integer 0-未登录，大于0-当前登录员工ID
 */
function is_login()
{
    $user = session('user_auth');
    if (empty($user)) {
        return 0;
    } else {
        return session('user_auth_sign') == data_auth_sign($user) ? $user['uid'] : 0;
    }
}

/**
 * 权限判定
 * @return bool
 * 模板标签
 *          {if condition="verifyUrl(url(''))"}
 *          {/if}
 */
function verifyUrl($url = '')
{
    if (!$url){
        $request = \think\Request::instance();
//        $module     = $request->module();
        $controller = $request->controller();
        $action     = $request->action();
        $url        = url(strtolower($controller . '/' . $action));
    }

    $AuthModel = new \app\admin\model\AuthModel();

    if (!IS_ADMIN) {
        $result = $AuthModel->getUserRule(session('user_auth.group_id'));

        if (!$result)
            return false;

        $where = ['id' => ['IN', $result['rule']],'url'=>['NEQ','']];
        $menu  = $AuthModel->getUserUrl($where);
    } else {
        $menu = $AuthModel->getUrlList(['url'=>['NEQ','']]);
    };

    //默认初始第一页面
    $menu[] = ['id' => 'index', 'url' => 'index/index'];
    foreach ($menu as $item) {
        if (url($item['url']) === $url) {
            return $item['id'];
        }
    }

    return false;
}

/**
 * 删除目录及目录下所有文件或删除指定文件
 * @param str $path   待删除目录路径
 * @param int $delDir 是否删除目录，1或true删除目录，0或false则只删除文件保留目录（包含子目录）
 * @return bool 返回删除状态
 */
function delDirAndFile($path, $delDir = FALSE) {
    $handle = opendir($path);
    if ($handle) {
        while (false !== ( $item = readdir($handle) )) {
            if ($item != "." && $item != "..")
                is_dir("$path/$item") ? delDirAndFile("$path/$item", $delDir) : unlink("$path/$item");
        }
        closedir($handle);
        if ($delDir)
            return rmdir($path);
    }else {
        if (file_exists($path)) {
            return unlink($path);
        } else {
            return FALSE;
        }
    }
}
