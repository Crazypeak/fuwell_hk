<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:62:"D:\PHP\demo\winstart/application/admin\view\admin\navList.html";i:1508705600;s:60:"D:\PHP\demo\winstart/application/admin\view\Public\base.html";i:1508705602;s:67:"D:\PHP\demo\winstart/application/admin\view\Public\navBarRight.html";i:1508133402;s:62:"D:\PHP\demo\winstart/application/admin\view\Public\footer.html";i:1508705600;}*/ ?>
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
    

    
<style></style>


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

        
<!-- 新增导航信息 -->
<div class="modal" id="navAddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">新增导航信息</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal navAdd">
                    <div class="box-body">
                        <div class="form-group" style=""><label class="col-sm-3 control-label">名称</label>
                            <div class="col-sm-6">
                                <!--导航名称--><input type="text" class="form-control" name="name"></div>
                        </div>
                        <div class="form-group" style=""><label class="col-sm-3 control-label">父级</label>
                            <div class="col-sm-5">
                                <!--上级菜单--><select class="form-control menuSelect" name="pid">
                            </select></div>
                        </div>
                        <div class="form-group" style=""><label class="col-sm-3 control-label">地址</label>
                            <div class="col-sm-6">
                                <!--地址-->
                                <p class="text-info"><input type="text" class="form-control navUrl" name="url"></p>
                            </div>
                        </div>
                        <div class="form-group" style=""><label class="col-sm-3 control-label">状态</label>
                            <div class="col-sm-6">
                                <!--状态-->
                                <input type="radio" name="status" value="1" id="status[0]" checked="checked">
                                <label for="status[1]">显示</label>
                                <input type="radio" name="status" value="0" id="status[1]">
                                <label for="status[0]">隐藏</label>
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
                <button type="submit" class="btn btn-success single orderNextBtn navAdd" style="margin-left: 20px;">
                    <i class="fa fa-plus"></i>&nbsp;&nbsp;新增导航
                </button>
            </div>
        </div>
    </div>
</div>
<!-- 修改导航信息 -->
<div class="modal" id="navEditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">修改当前导航信息</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal navEdit">
                    <div class="box-body">
                        <div class="form-group" style="display: none;"><label class="col-sm-3 control-label">nav
                            id</label>
                            <div class="col-sm-6">
                                <!--订单id--><input type="text" class="form-control navId" name="id" value=""
                                                  placeholder=""></div>
                        </div>
                        <div class="form-group" style=""><label class="col-sm-3 control-label">名称</label>
                            <div class="col-sm-6">
                                <!--订单id--><input type="text" class="form-control navName" name="name" value=""
                                                  placeholder=""></div>
                        </div>
                        <div class="form-group" style=""><label class="col-sm-3 control-label">导航位置</label>
                            <div class="col-sm-6"><select class="form-control menuSelect" name="pid">
                            </select></div>
                        </div>
                        <div class="form-group" style=""><label class="col-sm-3 control-label">地址</label>
                            <div class="col-sm-6">
                                <!--订单id--><input type="text" class="form-control navUrl" name="url" value=""
                                                  placeholder=""></div>
                        </div>
                        <div class="form-group" style="">
                            <label class="col-sm-3 control-label">状态</label>
                            <div class="col-sm-3 fix-checkbox">
                                <input type="radio" class="navHideTrue" name="status"
                                       value="1" id="status[2]"> <label for="status[1]">显示</label>
                                <input type="radio" class="navHideFalse" name="status" value="0" id="status[3]"> <label
                                    for="status[0]">隐藏</label>
                            </div>
                        </div>
                        <div class="form-group" style=""><label class="col-sm-3 control-label">顺序</label>
                            <div class="col-sm-3">
                                <div class="input-group spinner navNoSpinner" data-trigger="spinner">
                                    <input type="text"
                                           class="form-control text-center navSequence"
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
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close fa-fw"></i>取消
                </button>
                <button type="button" class="btn btn-success navEditConfirmBtn"><i class="fa fa-check fa-fw"></i>修改
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
                        <div class="col-md-4 col-lg-6">
                            <h3 class="box-title">菜单导航管理<?php if(!(empty($title_name) || (($title_name instanceof \think\Collection || $title_name instanceof \think\Paginator ) && $title_name->isEmpty()))): ?>&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #777">(父级：<?php echo $title_name; ?>)</span><?php endif; ?></h3>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <tbody>
                        <tr>
                            <th>名称</th>
                            <th>位置</th>
                            <th>路径</th>
                            <th width="65px;">顺序</th>
                            <th width="65px;">状态</th>
                            <th width="220px;">操作</th>
                        </tr>
                        <form action="" class=""> <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$id): $mod = ($i % 2 );++$i;?>
                            <tr>
                                <td><?php echo $id['name']; ?></td>
                                <td><?php echo !empty($id['pid'])?'子级':'顶级'; ?></td>
                                <td><?php echo $id['url']; ?></td>
                                <td><?php echo $id['sequence']; ?></td>
                                <td><span class="label <?php echo !empty($id['status'])?'label-success':'label-default'; ?>"><?php echo !empty($id['status'])?'显示':'隐藏'; ?></span>
                                </td>
                                <td><a class="" href="<?php echo url('?pid='.$id['id']); ?>"><i
                                        class="fa fa-arrow-down"></i>&nbsp;进入</a> &nbsp;&nbsp;
                                    <!--singleOrderDelBtn-->
                                    <a class="navEditBtn" href="javascript:void(0)" data-id="<?php echo $id['id']; ?>"
                                       data-pid="<?php echo $id['pid']; ?>"
                                       data-name="<?php echo $id['name']; ?>" data-url="<?php echo $id['url']; ?>" data-status="<?php echo $id['status']; ?>"
                                       data-sequence="<?php echo $id['sequence']; ?>"><i class="fa fa-pencil-square-o"></i>&nbsp;编辑</a>
                                    &nbsp;&nbsp;
                                    <a class="text-danger orderPrevBtn single navDel"
                                       href="javascript:void(0)" data-orderId="<?php echo $id['id']; ?>" data-id="<?php echo $id['id']; ?>"
                                       data-pid="<?php echo $id['pid']; ?>"><i class="fa fa-trash-o"></i>&nbsp;删除</a>
                                </td>
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
                            <button type="submit" class="btn btn-sm	btn-success pull-right" id="navAddBtn" style="">
                                <i class="fa fa-plus fa-fw"></i>新增导航
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
 



<script>
    var navAddUrl = "<?php echo url('admin.menu/menuSave'); ?>";
    var navDelUrl = "<?php echo url('admin.menu/menuDel'); ?>";
    var navEditBtn = $(".navEditBtn");
    var menuSelect = $(".menuSelect");
    var readOnlyNavUrl = $(".nav input.navUrl");
    var navEditConfirmBtn = $(".navEditConfirmBtn");
    var navAddBtn = $("#navAddBtn");

    var navParent = function () {
    };
    navParent.prototype = {
        parent: null,
        son: null
    };


    $(document).ready(function () {

        navEditConfirmBtn.click(function () {
            console.log($("form.navEdit").serialize());
            formPost($("form.navEdit").serialize(), navAddUrl, this);
        });

        //新建导航弹窗
        navAddBtn.click(function () {
            $("#navAddModal").modal({backdrop: 'static'});


            $("#navAddModal .menuSelect option").each(function (i, e) {
                if ($("body a.navEditBtn")) {

                    if ($("body a.navEditBtn").data("pid") == $(e).val()) {
                        $(e).prop("selected", true);
                    }
                }
            })


            if ($("#navAddModal .menuSelect").val() == 0) {
                $("#navAddModal .navUrl").attr("readonly", true);
            } else {
                $("#navAddModal .navUrl").attr("readonly", false);
            }


        });

        //下拉选择禁用Url输入
        menuSelect.change(function () {
            if (menuSelect.val() == 0) {
                readOnlyNavUrl.attr("readonly", true);
            } else {
                readOnlyNavUrl.attr("readonly", false);
            }
        });
        //新增状态 下拉选择禁用Url输入
        $("#navAddModal .menuSelect").change(function () {
            if ($("#navAddModal .menuSelect").val() == 0) {
                $("#navAddModal .navUrl").attr("readonly", true);
            } else {
                $("#navAddModal .navUrl").attr("readonly", false);
            }
        });
        //编辑状态 下拉选择禁用Url输入
        $("form.navEdit .menuSelect").change(function () {
            if ($("form.navEdit .menuSelect").val() == 0) {
                $("form.navEdit .navUrl").attr("readonly", true);
            } else {
                $("form.navEdit .navUrl").attr("readonly", false);
            }
        });
        //数字选择
        var navNoSpinner = $(".navNoSpinner").spinner('changing', function (e, newVal, oldVal) {
        });
        //
        $('input[type="radio"]').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
            radioClass: 'icheckbox_flat-blue',
            increaseArea: '20%' // optional,
        });


        //修改导航信息
        navEditBtn.click(function () {
            $('#navEditModal').modal({backdrop: 'static'});
            var navModalData = new navData();
            navModalData.id = $(this).data("id");
            navModalData.pid = $(this).data("pid");
            navModalData.name = $(this).data("name");
            navModalData.url = $(this).data("url");
            navModalData.status = $(this).data("status");
            navModalData.sequence = $(this).data("sequence");
            //console.log(navModalData);

            $("form.navEdit .navId").val(navModalData.id);
            $("form.navEdit .navName").val(navModalData.name);
            $("form.navEdit .navUrl").val(navModalData.url);
            navModalData.status ? $("form.navEdit .navHideTrue").iCheck("check") : $("form.navEdit .navHideFalse").iCheck("check");
            $("form.navEdit .navSequence").trigger("focus").val(navModalData.sequence);
            $("form.navEdit .navName").trigger("focus");

            $("form.navEdit .menuSelect option").each(function (i, e) {
                if (navModalData.pid == $(e).val()) {
                    $(e).prop("selected", true);
                }
            })

            if ($("form.navEdit .menuSelect").val() == 0) {
                $("form.navEdit .navUrl").attr("readonly", true);
            } else {
                $("form.navEdit .navUrl").attr("readonly", false);
            }

        });

        var pid_all = <?php echo $pid_all; ?>;
        menuSelect.append(new Option(
            "顶级导航",
            0
        ));
        for (var i in pid_all) {
            //console.table(data[i].operator);
            if (pid_all[i].name === '') continue;
            menuSelect.append(new Option(
                "　|--" + pid_all[i].name,
                pid_all[i].id
            ));
            for (var j in pid_all[i].operator) {
                if (pid_all[i].operator[j].name === '') continue;
                //console.table(data[i].operator);
                menuSelect.append(new Option(
                    "　　|--" + pid_all[i].operator[j].name,
                    pid_all[i].operator[j].id
                ));
            }
        }
    });


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