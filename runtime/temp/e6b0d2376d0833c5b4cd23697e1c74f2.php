<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:75:"D:\PHP\demo\winstart/application/admin\view\website\columnTemplateList.html";i:1508923054;s:60:"D:\PHP\demo\winstart/application/admin\view\Public\base.html";i:1508705602;s:67:"D:\PHP\demo\winstart/application/admin\view\Public\navBarRight.html";i:1508133402;s:62:"D:\PHP\demo\winstart/application/admin\view\Public\footer.html";i:1508705600;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="renderer" content="webkit">
    <meta content="black" name="apple-mobile-web-app-status-bar-style"/>
    <meta content="telephone=no" name="format-detection"/>
    <meta name="Author" content="Mather, Crazypeak"/>
    <title>网站后台</title>
    <link rel="stylesheet" href="/static/dist/adminStyle.css">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    

    


<style>


</style> 


</head>
<body class="skin-green-light sidebar-mini">

<!-- Reset password -->
<div class="modal" id="resetPasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">修改密码</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal resetPassword">
                    <div class="box-body">
                        <div class="form-group" style="">
                            <label class="col-sm-3 control-label">旧密码</label>
                            <div class="col-sm-4">
                                <input type="password" class="form-control " name="password" value=""
                                       placeholder="输入旧密码">
                            </div>
                        </div>
                        <div class="form-group" style="">
                            <label class="col-sm-3 control-label">新密码</label>
                            <div class="col-sm-4">
                                <input type="password" class="form-control " name="new_password" value=""
                                       placeholder="输入新密码">

                            </div>
                        </div>

                        <div class="form-group" style="">
                            <label class="col-sm-3 control-label">确认新密码</label>
                            <div class="col-sm-4">
                                <input type="password" class="form-control " name="ver_password" value=""
                                       placeholder="重复一次新密码">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close fa-fw"></i>取消
                </button>
                <button type="button" class="btn btn-success resetPasswordConfirmBtn"><i class="fa fa-check fa-fw"></i>修改
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Site wrapper -->
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo url('index/index'); ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">FW</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>网站后台</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">欢迎回来：<?php echo $nickname; ?>
                <span class="hidden-xs">&nbsp;&nbsp;<?php echo $username; ?>&nbsp;&nbsp;</span>
            </a>
            <ul class="dropdown-menu" style="width: 230px">
                <li class="user-footer">
                    <a href="#" class="btn btn-default btn-flat resetPasswordBtn">修改密码</a>
                    <p></p>
                    <a href="<?php echo url('User/backLogin'); ?>" class="btn btn-default btn-flat">退出登录</a>
                </li>
            </ul>
        </li>
    </ul>
</div>

        </nav>
    </header>

    <!-- =============================================== -->
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <?php if(is_array($menu) || $menu instanceof \think\Collection || $menu instanceof \think\Paginator): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?>
                <li class="treeview active">
                    <a href="#">
                        <i class="fa fa-newspaper-o"></i> <span><?php echo $value['name']; ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if(is_array($value['child']) || $value['child'] instanceof \think\Collection || $value['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $value['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                        <li>
                            <a href="<?php echo url($item['url']); ?>"><i class="fa fa-circle-o"></i><?php echo $item['name']; ?></a>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>


    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                <?php echo $title_all['0']['name']; ?>
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <?php if(is_array($title_all['crumbs']) || $title_all['crumbs'] instanceof \think\Collection || $title_all['crumbs'] instanceof \think\Paginator): $i = 0; $__LIST__ = $title_all['crumbs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$title): $mod = ($i % 2 );++$i;?>
                <li class="<?php if($title_all['0']['name'] == $key): ?>active<?php endif; ?>">
                    <!---->
                    <!--<a href="<?php echo url('title'); ?>"><?php echo $key; ?></a>-->
                    <!---->
                    <!--<?php echo $key; ?>-->
                    <!---->
                    <?php echo $key; ?>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ol>
        </section>

        

<!-- 新增区块代码 -->
<div class="modal" id="columnFileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">新增区块代码&nbsp;&nbsp;&nbsp;&nbsp;<span class="columnFileTypeTitle" style="color: #777"></span></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal columnFileAdd">
                    <input type="hidden" id="newtype" name="type" value="0">
                    <input type="hidden" name="pid" value="<?php echo $column['id']; ?>">
                    <div class="box-body">
                        <div class="form-group" style="">
                            <label class="col-sm-3 control-label">名称</label>
                            <div class="col-sm-6">
                                <!--区块代码名称-->
                                <input type="text" class="form-control" name="name" value=""
                                       placeholder="">
                            </div>
                        </div>
                        <div class="form-group " style="">
                            <label class="col-sm-3 control-label">状态</label>
                            <div class="col-sm-6 " style="padding-top: 7px;">
                                <!--状态-->
                                <input type="radio" name="status" value="1" id="newon" checked="checked">
                                <label for="newon">启用</label>
                                <input type="radio" name="status" value="0" id="newoff">
                                <label for="newoff">停用</label>
                            </div>
                        </div>
                        <div class="form-group" style=""><label class="col-sm-3 control-label">顺序</label>
                            <div class="col-sm-3">
                                <!--状态-->
                                <div class="input-group spinner navNoSpinner" data-trigger="spinner">
                                    <input type="text"
                                           class="form-control text-center"
                                           name="sequence"
                                           value="1"
                                           data-min="1"
                                           data-rule="quantity">
                                    <span class="input-group-addon">
                                    <a href="" class="spin-up" data-spin="up">
                                        <i class="fa fa-caret-up"></i></a>
                                    <a href="" class="spin-down" data-spin="down">
                                        <i class="fa fa-caret-down"></i></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group " style="">
                            <label class="col-sm-3 control-label">代码</label>
                            <div class="col-sm-6 " style="padding-top: 7px;">
                                <!--状态-->
                                <textarea class="form-control" name="code_text" style="resize:none;overflow: auto;height: 540px;" ></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;取消
                </button>
                <button type="button" class="btn btn-success columnFileAddConfirmBtn"><i class="fa fa-check"></i>&nbsp;新增
                </button>
            </div>
        </div>
    </div>
</div>

<!-- 编辑区块代码 -->
<div class="modal" id="columnFileInfoEditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">修改区块代码&nbsp;&nbsp;&nbsp;&nbsp;<span class="columnFileTypeTitle" style="color: #777"></span></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal columnFileInfoEdit">
                    <input type="hidden" id="edittype" name="type" value="0">
                    <input type="hidden" name="pid" value="<?php echo $column['id']; ?>">
                    <div class="box-body">

                        <div class="form-group" style="display: none;">
                            <label class="col-sm-3 control-label">id</label>
                            <div class="col-sm-6">
                                <!--用户id-->
                                <input type="text" class="form-control" name="id" value=""
                                       placeholder="">
                            </div>
                        </div>
                        <div class="form-group" style="">
                            <label class="col-sm-3 control-label">名称</label>
                            <div class="col-sm-6">
                                <!--区块代码名称-->
                                <input type="text" class="form-control" name="name" value=""
                                       placeholder="">
                            </div>
                        </div>
                        <div class="form-group " style="">
                            <label class="col-sm-3 control-label">状态</label>
                            <div class="col-sm-6 " style="padding-top: 7px;">
                                <!--状态-->
                                <input type="radio" name="status" value="1" id="editon" checked="checked">
                                <label for="newon">启用</label>
                                <input type="radio" name="status" value="0" id="editoff">
                                <label for="newoff">停用</label>
                            </div>
                        </div>
                        <div class="form-group" style=""><label class="col-sm-3 control-label">顺序</label>
                            <div class="col-sm-3">
                                <!--状态-->
                                <div class="input-group spinner navNoSpinner" data-trigger="spinner">
                                    <input type="text"
                                           class="form-control text-center"
                                           name="sequence"
                                           value="1"
                                           data-min="1"
                                           data-rule="quantity">
                                    <span class="input-group-addon">
                                    <a href="" class="spin-up" data-spin="up">
                                        <i class="fa fa-caret-up"></i></a>
                                    <a href="" class="spin-down" data-spin="down">
                                        <i class="fa fa-caret-down"></i></a>
                                    </span></div>
                            </div>
                        </div>
                        <div class="form-group " style="">
                            <label class="col-sm-3 control-label">代码</label>
                            <div class="col-sm-6 " style="padding-top: 7px;">
                                <!--状态-->
                                <textarea class="form-control" name="code_text" style="resize:none;overflow: auto;height: 540px;" ></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;取消
                </button>
                <button type="button" class="btn btn-success columnFileInfoEditConfirmBtn"><i class="fa fa-check"></i>&nbsp;修改
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-md-4 col-lg-12">
                            <h3 class="box-title">Html详情：&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#777">(当前区块代码：<?php echo $column['name']; ?>)</span></h3>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <table class="table table-bordered table-hover">
                        <tbody>
                        <tr>
                            <th style="width: 180px">名称</th>
                            <th style="width: 120px;">顺序</th>
                            <th style="width: 80px;">状态</th>
                            <th style="width: 80px;">更新时间</th>
                            <th style="width: 160px;">操作</th>
                        </tr>
                        <?php if(!(empty($list['type0']) || (($list['type0'] instanceof \think\Collection || $list['type0'] instanceof \think\Paginator ) && $list['type0']->isEmpty()))): if(is_array($list['type0']) || $list['type0'] instanceof \think\Collection || $list['type0'] instanceof \think\Paginator): $i = 0; $__LIST__ = $list['type0'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td><?php echo $vo['name']; ?></td>
                            <td><?php echo $vo['sequence']; ?></td>
                            <td>
                                <?php switch($vo['status']): case "0": ?><span class="label bg-gray">停用</span><?php break; case "1": ?><span class="label bg-green">启用</span><?php break; default: endswitch; ?>
                            </td>
                            <td><?php echo $vo['create_time']; ?></td>
                            <td>
                                <a class="columnFileInfoEditBtn" href="javascript:void(0);"
                                   data-type="0"
                                   data-id="<?php echo $vo['id']; ?>"
                                   data-name="<?php echo $vo['name']; ?>"
                                   data-status="<?php echo $vo['status']; ?>"
                                   data-sequence="<?php echo $vo['sequence']; ?>">
                                    <i class="fa fa-pencil-square-o"></i>&nbsp;编辑</a>
                                &nbsp;&nbsp;
                                <a href="javascript:void(0);" class="text-danger single columnFileDelBtn"
                                   data-id="<?php echo $vo['id']; ?>">
                                    <i class="fa fa-trash fa-fw"></i>删除</a>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>

                        </tbody>
                    </table>

                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <div class="btn-toolbar pull-right" role="toolbar" aria-label="..." style="margin-left: 20px;">
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="submit" class="columnFileAddBtn btn btn-sm	btn-success pull-right" style="" data-type="0">
                                <i class="fa fa-plus fa-fw"></i>新增区块区块代码
                            </button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-offset-1 col-md-5">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-md-4 col-lg-6">
                            <h3 class="box-title">CSS详情：<span style="color:#777">(代码优先度低)</span></h3>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <table class="table table-bordered table-hover">
                        <tbody>
                        <tr>
                            <th style="width: 160px">名称</th>
                            <th style="width: 40px;">顺序</th>
                            <th style="width: 45px;">状态</th>
                            <th style="width: 120px;">更新时间</th>
                            <th style="width: 100px;">操作</th>
                        </tr>
                        <?php if(!(empty($list['type1']) || (($list['type1'] instanceof \think\Collection || $list['type1'] instanceof \think\Paginator ) && $list['type1']->isEmpty()))): if(is_array($list['type1']) || $list['type1'] instanceof \think\Collection || $list['type1'] instanceof \think\Paginator): $i = 0; $__LIST__ = $list['type1'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td><?php echo $vo['name']; ?></td>
                            <td><?php echo $vo['sequence']; ?></td>
                            <td>
                                <?php switch($vo['status']): case "0": ?><span class="label bg-gray">停用</span><?php break; case "1": ?><span class="label bg-green">启用</span><?php break; default: endswitch; ?>
                            </td>
                            <td><?php echo $vo['create_time']; ?></td>
                            <td>
                                <a class="columnFileInfoEditBtn" href="javascript:void(0);"
                                   data-type="1"
                                   data-id="<?php echo $vo['id']; ?>"
                                   data-name="<?php echo $vo['name']; ?>"
                                   data-status="<?php echo $vo['status']; ?>"
                                   data-sequence="<?php echo $vo['sequence']; ?>">
                                    <i class="fa fa-pencil-square-o"></i>&nbsp;编辑</a>
                                &nbsp;&nbsp;
                                <a href="javascript:void(0);" class="text-danger single columnFileDelBtn"
                                   data-id="<?php echo $vo['id']; ?>">
                                    <i class="fa fa-trash fa-fw"></i>删除</a>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <div class="btn-toolbar pull-right" role="toolbar" aria-label="..." style="margin-left: 20px;">
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="submit" class="columnFileAddBtn btn btn-sm	btn-success pull-right" style="" data-type="1">
                                <i class="fa fa-plus fa-fw"></i>新增区块区块代码
                            </button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.box -->
        </div>

        <div class="col-md-offset-0 col-md-5">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-md-4 col-lg-6">
                            <h3 class="box-title">Javascript详情：<span style="color:#777">(代码优先度低)</span></h3>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <table class="table table-bordered table-hover">
                        <tbody>
                        <tr>
                            <th style="width: 160px">名称</th>
                            <th style="width: 40px;">顺序</th>
                            <th style="width: 45px;">状态</th>
                            <th style="width: 120px;">更新时间</th>
                            <th style="width: 100px;">操作</th>
                        </tr>
                        <?php if(!(empty($list['type2']) || (($list['type2'] instanceof \think\Collection || $list['type2'] instanceof \think\Paginator ) && $list['type2']->isEmpty()))): if(is_array($list['type2']) || $list['type2'] instanceof \think\Collection || $list['type2'] instanceof \think\Paginator): $i = 0; $__LIST__ = $list['type2'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td><?php echo $vo['name']; ?></td>
                            <td><?php echo $vo['sequence']; ?></td>
                            <td>
                                <?php switch($vo['status']): case "0": ?><span class="label bg-gray">停用</span><?php break; case "1": ?><span class="label bg-green">启用</span><?php break; default: endswitch; ?>
                            </td>
                            <td><?php echo $vo['create_time']; ?></td>
                            <td>
                                <a class="columnFileInfoEditBtn" href="javascript:void(0);"
                                   data-type="2"
                                   data-id="<?php echo $vo['id']; ?>"
                                   data-name="<?php echo $vo['name']; ?>"
                                   data-status="<?php echo $vo['status']; ?>"
                                   data-sequence="<?php echo $vo['sequence']; ?>">
                                    <i class="fa fa-pencil-square-o"></i>&nbsp;编辑</a>
                                &nbsp;&nbsp;
                                <a href="javascript:void(0);" class="text-danger single columnFileDelBtn"
                                   data-id="<?php echo $vo['id']; ?>">
                                    <i class="fa fa-trash fa-fw"></i>删除</a>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        </tbody>
                    </table>

                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <div class="btn-toolbar pull-right" role="toolbar" aria-label="..." style="margin-left: 20px;">
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="submit" class="columnFileAddBtn btn btn-sm btn-success pull-right" style="" data-type="2">
                                <i class="fa fa-plus fa-fw"></i>新增区块区块代码
                            </button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
<!-- /.content -->



    </div>
    <!-- /.content-wrapper -->


    <!-- main-footer -->

    <footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
    </div>
    <strong>Copyright © 2015-2017 <a href="/">FULL WELL International</a>.</strong> All
    rights
    reserved.
</footer>


    <!-- /.main-footer  -->


</div>
<!-- ./wrapper -->
<!-- jQuery 3.1.0 -->
<script src="/static/js/jquery-2.2.3.min.js"></script>
<script src="/static/js/underscore-min.js"></script>

<!-- Bootstrap 3.3.6 -->
<script src="/static/js/bootstrap.min.js"></script>
<!-- jquery.spinner -->
<script src="/static/js/jquery.spinner.min.js"></script>
<!-- SlimScroll -->
<!--<script src="/static/js/jquery.slimscroll.min.js"></script>-->
<!-- FastClick -->
<!--<script src="/static/js/fastclick.js"></script>-->
<!-- AdminLTE App -->
<script src="/static/js/app.min.js"></script>
<!-- Sweet Alert -->
<script src="/static/plugins/sweetalert/sweetalert.min.js"></script>
<!-- icheck -->
<script src="/static/plugins/iCheck/icheck.min.js"></script>
<!-- bootstrap datepicker -->
<script src="/static/plugins/datepicker/moment.js"></script>
<script src="/static/plugins/datepicker/bootstrap-datepicker.min.js"></script>
<script src="/static/plugins/datepicker/locales/bootstrap-datepicker.zh-CN.min.js"></script>
<!-- requireJS module loader -->
<!--<script data-main="/static/js/main" async src="/static/js/require.js"></script>-->
<!-- HTML DOM prototype and function-->
<script src="/static/js/DOM.js"></script>
<!-- Main JavaScript-->
<script src="/static/js/main.js"></script>
<!-- deployment JavaScript -->
<!--<script src="/static/js/main.min.js"></script>-->


<!-- AdminLTE for demo purposes -->
<!--<script src="../../dist/js/demo.js"></script>-->

<script src="/static/plugins/select2/select2.min.js"></script>
<script src="/static/plugins/select2/i18n/zh-CN.js"></script>




<script>
    var columnFileSaveUrl = "<?php echo url('website.template/columnTemplateSave'); ?>";
    var columnFileDelUrl = "<?php echo url('website.template/columnTemplateDel'); ?>";

    var columnFileInfoEditConfirmBtn = $(".columnFileInfoEditConfirmBtn");
    var columnFileInfoAddConfirmBtn = $(".columnFileInfoAddConfirmBtn");
    var columnFileInfoEditModal = $("#columnFileInfoEditModal");
    var columnFileInfoEditBtn = $(".columnFileInfoEditBtn");
    var columnFileInfoAddModal = $("#columnFileInfoAddModal");

    var columnFileDelBtn = $(".columnFileDelBtn");
    var columnFileAddBtn = $(".columnFileAddBtn");
    var columnFileAddConfirmBtn = $(".columnFileAddConfirmBtn");

    $(document).ready(function () {
        //新增区块代码
        columnFileAddBtn.click(function () {
            var type = $(this).data('type');
            var title = type == 2 ? 'Javascript' : type ? 'CSS' : 'Html';
            $('.columnFileTypeTitle').html(title);
            $('#newtype').val(type);

            $('#columnFileModal').modal({backdrop: 'static', keyboard: false});
            $('#columnFileModal').find("input").on('keydown', function (event) {
                if (event.keyCode == 13) {
                    columnFileAddConfirmBtn.click();
                }
            });
        });
        
        columnFileAddConfirmBtn.click(function () {
            formPost($(".columnFileAdd").serialize(), columnFileSaveUrl);
        });

        //编辑区块代码
        columnFileInfoEditBtn.click(function () {
            columnFileInfoEditModal.modal({backdrop: 'static'});
            formClear(columnFileInfoEditModal);
            var type = $(this).data('type');
            var title = type ==2 ? 'Javascript' : type ? 'CSS' : 'Html';
            $('.columnFileTypeTitle').html(title);console.log(title);
            $('#edittype').val(type);

            var columnFileData = $(this).data();

            $(".columnFileInfoEdit [name=id]").val(columnFileData.id);
            $(".columnFileInfoEdit [name=name]").val(columnFileData.name);
            $(".columnFileInfoEdit [name=url]").val(columnFileData.url);
            columnFileData.status ? $("#editon").iCheck("check") : $("#editoff").iCheck("check");
            $(".columnFileInfoEdit [name=sequence]").val(columnFileData.sequence);

            $.get(columnFileSaveUrl, {id: columnFileData.id}, function (data) {
                $(".columnFileInfoEdit [name=code_text]").val(data);
            });
//            var columnList = data.user_list;
//            UserListSetSelect(columnList);
        });
        //用户编辑确认
        columnFileInfoEditConfirmBtn.click(function () {
            formPost($(".columnFileInfoEdit").serialize(), columnFileSaveUrl);
        });

        columnFileDelBtn.click(function () {
            var formData = {};
            formData.id = $(this).data("id");
            AlertConfirm(AlertText.columnFile[0], AlertText.columnFile[1], "是", function () {
                formPost(formData, columnFileDelUrl, this);
            })
        });
    })
</script>



<script>

    var resetPasswordUrl = "<?php echo url('user/changePW'); ?>";

    $(document).ready(function () {
        $("dd:contains('0000-00-00 00:00:00')").text(null);
        $("td:contains('0000-00-00')").text(null);
        $("td:contains('0000-00-00 00:00:00')").text(null);
        $("h4:contains('0000-00-00 00:00:00')").text(null);

        $('.sidebar-menu').find("a[href!='#']").each(function (key, value) {
            if ($(value).attr('href') === '<?php echo url($is_url); ?>') {
                $(value).parents('li').addClass('active');
                $(value).parents('.treeview').addClass('active');
            }
        });

        $('.breadcrumb').eq(1).prepend('<i class="fa fa-dashboard"></i>');


        //enter
        resetPasswordModal.find('input').on('keydown', function (event) {
            if (event.keyCode == 13) {
                resetPasswordConfirmBtn.click();
            }
        });

        //enter
        $(".SearchKey").find('input:text').on('keydown', function (event) {
            if (event.keyCode == 13) {
                SearchBtn.click();
            }
        });

    });


</script>
</body>

</html>