<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:66:"D:\PHP\demo\winstart/application/admin\view\website\parameter.html";i:1508916528;s:60:"D:\PHP\demo\winstart/application/admin\view\Public\base.html";i:1508705602;s:67:"D:\PHP\demo\winstart/application/admin\view\Public\navBarRight.html";i:1508133402;s:62:"D:\PHP\demo\winstart/application/admin\view\Public\footer.html";i:1508705600;}*/ ?>
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
    /*
    20171023
    */

    .act-tr-level-1 td:first-child {
        padding-left: 20px !important;
    }

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

        
<!-- Main content -->
<!-- 新增 -->
<div class="modal" id="footerAddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">新增底部导航</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal footerAdd">
                    <div class="box-body">
                        <input type="text" class="form-control" name="pid" value="0"
                               placeholder="" style="display: none;">
                        <div class="form-group" style="">
                            <label class="col-sm-3 control-label">名称</label>
                            <div class="col-sm-6">
                                <!--栏目名称-->
                                <input type="text" class="form-control" name="name" value=""
                                       placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">地址</label>
                            <div class="col-sm-6">
                                <!--栏目链接-->
                                <input type="text" class="form-control" name="url" value=""
                                       placeholder="">
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
                    </div>
                    <!-- /.box-body -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;取消
                </button>
                <button type="button" class="btn btn-success footerAddConfirmBtn"><i class="fa fa-check"></i>&nbsp;新增
                </button>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="row">
        <div class="col-md-offset-1 col-md-5">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-md-4 col-lg-6">
                            <h3 class="box-title">网站参数</h3>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-hover collaptable">
                        <tbody>
                        <tr>
                            <th style="width: 120px">名称</th>
                            <th style="width: 120px">变量名</th>
                            <th style="">参数值</th>
                        </tr>

                        <form class="form-horizontal parameterInfo">
                        <?php if(is_array($parameter_list) || $parameter_list instanceof \think\Collection || $parameter_list instanceof \think\Paginator): $i = 0; $__LIST__ = $parameter_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr data-id="<?php echo $vo['id']; ?>" data-parent="">
                            <td title="<?php echo $vo['name']; ?>"><?php echo $vo['name']; ?></td>
                            <td title="<?php echo $vo['key']; ?>"><?php echo $vo['key']; ?></td>
                            <td style="padding: 0;"><input name="<?php echo $vo['key']; ?>" style="border: 0;width: 100%;height: 36px" value="<?php echo $vo['value']; ?>"/></td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>

                        </form>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <div class="btn-toolbar pull-right" role="toolbar" aria-label="..." style="margin-left: 20px;">
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="submit" class="btn btn-sm	btn-success pull-right"
                                    id="parameterSaveBtn" style="">
                                <i class="fa fa-check fa-fw"></i>保存网站参数
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
                            <h3 class="box-title">底部导航</h3>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-hover collaptable">
                        <tbody>
                        <tr>
                            <th style="">名称</th>
                            <th style="">地址</th>
                            <th style="width: 60px;">顺序</th>
                            <th style="width: 120px;">操作</th>
                        </tr>

                        <?php if(is_array($footer_list) || $footer_list instanceof \think\Collection || $footer_list instanceof \think\Paginator): $i = 0; $__LIST__ = $footer_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr data-id="<?php echo $vo['id']; ?>" data-parent="">
                            <td><?php echo $vo['name']; ?></td>
                            <td>'顶部'</td>
                            <td><?php echo $vo['sequence']; ?></td>
                            <td>
                                <a class="text-info footerChildAddBtn"
                                   href="javascript:void(0);" data-pid="<?php echo $vo['id']; ?>">
                                    <i class="fa fa-plus fa-fw"></i>新增</a>
                                <a href="javascript:void(0);" class="text-danger single footerUrlDelBtn"
                                   data-id="<?php echo $vo['id']; ?>">
                                    <i class="fa fa-trash fa-fw"></i>删除</a>
                            </td>
                        </tr>
                        <?php if(is_array($vo['child']) || $vo['child'] instanceof \think\Collection || $vo['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child_item): $mod = ($i % 2 );++$i;?>
                        <tr data-id="<?php echo $child_item['id']; ?>" data-parent="<?php echo $child_item['pid']; ?>">
                            <td>|—&nbsp;&nbsp;&nbsp;<?php echo $child_item['name']; ?></td>
                            <td><?php echo $child_item['url']; ?></td>
                            <td><?php echo $vo['sequence']; ?>.<?php echo $child_item['sequence']; ?></td>
                            <td>
                                <a href="javascript:void(0);" class="text-danger single footerUrlDelBtn"
                                   data-id="<?php echo $child_item['id']; ?>">
                                    <i class="fa fa-trash fa-fw"></i>删除</a>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>

                        </tbody>
                    </table>

                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <div class="btn-toolbar pull-right" role="toolbar" aria-label="..." style="margin-left: 20px;">
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="submit" class="btn btn-sm	btn-success pull-right"
                                    id="footerAddBtn" style="">
                                <i class="fa fa-plus fa-fw"></i>新增父级底部导航
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
<script src="/static/js/jquery.aCollapTable.min.js"></script>





<script>
    var footerSave = "<?php echo url('website.parameter/footerSave'); ?>";
    var footerDel = "<?php echo url('website.parameter/footerDel'); ?>";
    var parameterSaveUrl = "<?php echo url('website.parameter/parameterSave'); ?>";

    var footerUrlDelBtn = $(".footerUrlDelBtn");
    var footerAddBtn = $("#footerAddBtn");
    var footerAddConfirmBtn = $(".footerAddConfirmBtn");

    var parameterSaveBtn = $("#parameterSaveBtn");

    $(document).ready(function () {

        $('.collaptable').aCollapTable({
            startCollapsed: true,
            addColumn: false,
            plusButton: '<i class="fa fa-plus-circle fa-fw" aria-hidden="true"></i>',
            minusButton: '<i class="fa fa-minus-circle fa-fw" aria-hidden="true"></i>'
        });
        //新增底部导航
        footerAddBtn.click(function () {
            $('#footerAddModal').modal({backdrop: 'static', keyboard: false});
            $('#footerAddModal').find("[name=pid]").attr("value", 0);
            $('#footerAddModal').find("input").on('keydown', function (event) {
                if (event.keyCode == 13) {
                    footerUrlAddConfirmBtn.click();
                }
            });
        });
        //子级新增
        $(".footerChildAddBtn").click(function () {
            $('#footerAddModal').modal({backdrop: 'static', keyboard: false});
            $('#footerAddModal').find("[name=pid]").attr("value", $(this).data("pid"));
        })

        footerAddConfirmBtn.click(function () {
            formPost($(".footerAdd").serialize(), footerSave);
        });

        footerUrlDelBtn.click(function () {
            var formData = {};
            formData.id = $(this).data("id");
            AlertConfirm("删除", "删除", "是", function () {
                formPost(formData, footerDel, this);
            })
        });

        //网站参数确定
        parameterSaveBtn.click(function () {
            formPost($(".parameterInfo").serialize(), parameterSaveUrl);
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