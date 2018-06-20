<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:64:"D:\PHP\demo\winstart/application/admin\view\admin\groupList.html";i:1508705600;s:60:"D:\PHP\demo\winstart/application/admin\view\Public\base.html";i:1508705602;s:67:"D:\PHP\demo\winstart/application/admin\view\Public\navBarRight.html";i:1508133402;s:62:"D:\PHP\demo\winstart/application/admin\view\Public\footer.html";i:1508705600;}*/ ?>
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

        
<!-- 新增员工组 -->
<div class="modal" id="userGroupAddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">新增员工组</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal userGroupAdd">
                    <div class="box-body">


                        <div class="form-group">
                            <label class="col-sm-3 control-label">员工组名</label>
                            <div class="col-sm-3">
                                <!--员工组名称-->
                                <input type="text" class="form-control userGroupName" name="name" value=""
                                       placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">顺序</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control " name="sequence" value=""
                                       placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">状态</label>
                            <div class="col-sm-3 fix-checkbox">
                                <input type="radio" class="navHideTrue" name="status" value="1" id="status[2]"
                                       checked="checked">
                                <label for="status[2]">启用</label>
                                <input type="radio" class="navHideFalse" name="status" value="0" id="status[3]">
                                <label for="status[3]">禁用</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">备注</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control " name="remark" value=""
                                       placeholder="">
                            </div>
                        </div>

                    </div>
                </form>

            </div>
            <!-- /.box-body -->

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close fa-fw"></i>取消
                </button>
                <button type="button" class="btn btn-success userGroupAddConfirmBtn"><i class="fa fa-check fa-fw"></i>新增
                </button>
            </div>

        </div>
    </div>
</div>

<!-- 编辑员工组 -->
<div class="modal" id="userGroupEditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="">编辑员工组</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal userGroupEdit">
                    <div class="box-body">

                        <div class="form-group" style="display: none;">
                            <label class="col-sm-3 control-label">id</label>
                            <div class="col-sm-3">
                                <!--员工组名称-->
                                <input type="text" class="form-control" name="id" value=""
                                       placeholder="">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label">员工组名</label>
                            <div class="col-sm-3">
                                <!--员工组名称-->
                                <input type="text" class="form-control" name="name" value=""
                                       placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">顺序</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control " name="sequence" value=""
                                       placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">状态</label>
                            <div class="col-sm-3 fix-checkbox">
                                <input type="radio" class="on" name="status" value="1" id="status[4]">
                                <label for="status[4]">启用</label>
                                <input type="radio" class="off" name="status" value="0" id="status[5]">
                                <label for="status[5]">禁用</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">备注</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control " name="remark" value=""
                                       placeholder="">
                            </div>
                        </div>

                    </div>
                </form>

            </div>
            <!-- /.box-body -->

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close fa-fw"></i>取消
                </button>
                <button type="button" class="btn btn-success userGroupEditConfirmBtn"><i class="fa fa-check fa-fw"></i>修改
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
                            <h3 class="box-title">员工组别管理</h3>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <tbody>
                        <tr>
                            <th style="width: 15%">员工组名</th>
                            <th>备注</th>
                            <th width="75px">排序</th>
                            <th width="75px">状态</th>
                            <th width="360px">操作</th>
                        </tr>
                        <?php if(is_array($group) || $group instanceof \think\Collection || $group instanceof \think\Paginator): $i = 0; $__LIST__ = $group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td><?php echo $vo['name']; ?></td>
                            <td><?php echo $vo['remark']; ?></td>
                            <td><?php echo $vo['sequence']; ?></td>
                            <td>
                                <?php switch($vo['status']): case "0": ?><span class="label label-default">禁用</span><?php break; case "1": ?><span class="label label-success">启用</span><?php break; default: endswitch; ?>
                            </td>
                            <td>
                                <a href="<?php echo url('admin.group/access', ['id'=>$vo['id']]); ?>">
                                    <i class="fa fa-pencil-square-o"></i>&nbsp;编辑权限</a>
                                &nbsp;&nbsp;
                                <a href="javascript:void(0);"
                                   class="userGroupEditBtn" data-id="<?php echo $vo['id']; ?>">
                                    <i class="fa fa-pencil-square-o"></i>&nbsp;编辑</a>
                                &nbsp;&nbsp;
                                <?php if($vo['id'] != '1'): ?><a href="javascript:void(0);"
                                class="userGroupDelBtn text-danger" data-id="<?php echo $vo['id']; ?>"><i class="fa fa-trash-o"></i>删除</a><?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <div class="btn-toolbar pull-right" role="toolbar" aria-label="..." style="margin-left: 20px;">
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="submit" class="btn btn-sm btn-success pull-right" id="userGroupAddBtn"
                                    style="">
                                <i class="fa fa-plus fa-fw"></i>新增组别
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
    var userGroupDelUrl = "<?php echo url('admin.group/del'); ?>";
    var userGroupAddUrl = "<?php echo url('admin.group/save'); ?>";

    var userGroupAddModal = $('#userGroupAddModal');
    var userGroupEditModal = $('#userGroupEditModal');

    var userGroupDelBtn = $(".userGroupDelBtn");
    var userGroupEditBtn = $(".userGroupEditBtn");
    var userGroupAddBtn = $("#userGroupAddBtn");
    var userGroupAddConfirmBtn = $(".userGroupAddConfirmBtn");
    var userGroupEditConfirmBtn = $(".userGroupEditConfirmBtn");


    $(document).ready(function () {
        $('input[type="radio"]').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
            radioClass: 'icheckbox_flat-blue',
            increaseArea: '20%' // optional,
        });


        userGroupEditBtn.click(function () {
            userGroupEditModal.modal({backdrop: 'static', keyboard: false});

            //clear radio check
//            userGroupEditModal.find("input[type='radio']").each(function (i, e) {
//                $(e).iCheck('uncheck');
//            });

            var id = $(this).data("id");
            var form = $("form.userGroupEdit");

            formClear(form);

            //查询员工组
            $.get(userGroupAddUrl, {id: id}, function (data) {
                console.log(data);
                form.find("input[name='id']").val(data.id);
                form.find("input[name='name']").val(data.name);
                form.find("input[name='sequence']").val(data.sequence);
                form.find("input[name='remark']").val(data.remark);
                (data.status == 1) ? form.find(".on").iCheck('check') : form.find(".off").iCheck('check');

//                if (data.status == 1) {
//                    form.find(".on").iCheck('check');
//                } else {
//                    form.find(".off").iCheck('check');
//                }
            });

        });


        userGroupAddBtn.click(function () {
            userGroupAddModal.modal({backdrop: 'static', keyboard: false});
        });
        //userGroupAdd
        userGroupAddConfirmBtn.click(function () {
            var form = $("form.userGroupAdd");
            //console.log(form.serialize());
            formPost(form.serialize(), userGroupAddUrl, this);
        });
        //userGroupEdit
        userGroupEditConfirmBtn.click(function () {
            var form = $("form.userGroupEdit");
            //console.log(form.serialize());
            formPost(form.serialize(), userGroupAddUrl, this);
        });
        //userGroupDel
        userGroupDelBtn.click(function () {
            var id = $(this).data("id");
            AlertConfirm("删除员工组", "你确定要删除员工组吗？", "删除", function () {
                formPost({id: id}, userGroupDelUrl, userGroupDelBtn);
            });
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