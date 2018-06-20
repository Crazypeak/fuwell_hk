<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:63:"D:\PHP\demo\winstart/application/admin\view\admin\userList.html";i:1508705600;s:60:"D:\PHP\demo\winstart/application/admin\view\Public\base.html";i:1508705602;s:67:"D:\PHP\demo\winstart/application/admin\view\Public\navBarRight.html";i:1508133402;s:62:"D:\PHP\demo\winstart/application/admin\view\Public\footer.html";i:1508705600;}*/ ?>
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

        

<!-- 新增员工 -->
<div class="modal" id="userInfoAddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="">新增员工</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal userAdd">
                    <div class="box-body">
                        <div class="form-group" style="">
                            <label class="col-sm-4 control-label">账号</label>
                            <div class="col-sm-6">
                                <!--员工id-->
                                <input type="text" class="form-control userInfoid" name="username" value=""
                                       placeholder="">
                            </div>
                        </div>
                        <div class="form-group" style="">
                            <label class="col-sm-4 control-label">密码</label>
                            <div class="col-sm-6">
                                <!--员工id-->
                                <input type="password" class="form-control userInfoid" name="password" value=""
                                       placeholder="">
                            </div>
                        </div>
                        <div class="form-group" style="">
                            <label class="col-sm-4 control-label">确认密码</label>
                            <div class="col-sm-6">
                                <!--员工id-->
                                <input type="password" class="form-control userInfoid" name="verify_pw" value=""
                                       placeholder="再输入一次密码">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="box-body">
                        <div class="form-group" style="">
                            <label class="col-sm-4 control-label">员工名称</label>
                            <div class="col-sm-6">
                                <!--名称-->
                                <input type="text" class="form-control userInfoName" name="nickname" value=""
                                       placeholder="">
                            </div>
                        </div>

                        <div class="form-group" style="">
                            <label class="col-sm-4 control-label">所属组别</label>
                            <div class="col-sm-6">
                                <!--所属组别-->
                                <select class="form-control menuSelect" name="group_id">
                                    <?php if(is_array($group) || $group instanceof \think\Collection || $group instanceof \think\Paginator): $i = 0; $__LIST__ = $group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group " style="">
                            <label class="col-sm-4 control-label">员工状态</label>
                            <div class="col-sm-6 " style="padding-top: 7px;">
                                <!--员工组名称-->
                                <!--状态-->
                                <input type="radio" name="status" value="1" id="newon" checked="checked">
                                <label for="newon">启用</label>
                                <input type="radio" name="status" value="0" id="newoff">
                                <label for="newoff">禁用</label>
                            </div>
                        </div>


                    </div>
                    <!-- /.box-body -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close fa-fw"></i>取消
                </button>
                <button type="button" class="btn btn-success userInfoAddConfirmBtn"><i class="fa fa-check fa-fw"></i>新增
                </button>
            </div>
        </div>
    </div>
</div>

<!-- 编辑修改员工信息 -->
<div class="modal" id="userInfoEditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">修改员工信息</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal userInfoEdit">
                    <div class="box-body">

                        <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">id</label>
                            <div class="col-sm-6">
                                <!--员工id-->
                                <input type="text" class="form-control userInfoid" name="id" value=""
                                       placeholder="">
                            </div>
                        </div>
                        <div class="form-group" style="">
                            <label class="col-sm-4 control-label">员工名称</label>
                            <div class="col-sm-6">
                                <!--名称-->
                                <input type="text" class="form-control userInfoName" name="nickname" value=""
                                       placeholder="">
                            </div>
                        </div>

                        <div class="form-group" style="">
                            <label class="col-sm-4 control-label">所属组别</label>
                            <div class="col-sm-6">
                                <!--所属组别-->
                                <select class="form-control menuSelect" name="group_id">
                                    <?php if(is_array($group) || $group instanceof \think\Collection || $group instanceof \think\Paginator): $i = 0; $__LIST__ = $group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group " style="">
                            <label class="col-sm-4 control-label">员工状态</label>
                            <div class="col-sm-6 " style="padding-top: 7px;">
                                <!--员工组名称-->
                                <!--状态-->
                                <input type="radio" name="status" value="1" id="on">
                                <label for="on">启用</label>
                                <input type="radio" name="status" value="0" id="off">
                                <label for="off">停用</label>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;取消
                </button>
                <button type="button" class="btn btn-success userInfoEditConfirmBtn"><i class="fa fa-check"></i>&nbsp;修改
                </button>
            </div>
        </div>
    </div>
</div>

<!-- 重置某个员工密码 -->
<div class="modal" id="resetUserPasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">设置员工密码</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="box-body">

                        <div class="form-group" style="display: none">
                            <label class="col-sm-6 control-label">为员工 <span id="UserNameSpan"></span> 设置一个新密码</label>
                        </div>


                        <div class="form-group" style="">
                            <label class="col-sm-4 control-label">新密码</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control " name="new_password" value=""
                                       placeholder="输入新密码">

                            </div>
                        </div>

                        <div class="form-group" style="">
                            <label class="col-sm-4 control-label">确认新密码</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control " name="ver_password" value=""
                                       placeholder="重复一次新密码">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;取消
                </button>
                <button type="button" class="btn btn-success resetUserPasswordConfirmBtn"><i class="fa fa-check"></i>&nbsp;修改
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
                            <h3 class="box-title">员工信息管理</h3>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <table class="table table-bordered table-hover">
                        <tbody>
                        <tr>
                            <th style="">账号</th>
                            <th style="">员工名称</th>
                            <th style="">所属组别</th>
                            <th style="">状态</th>
                            <th style="width: 360px">操作</th>
                        </tr>
                        <form action="">
                            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$id): $mod = ($i % 2 );++$i;?>
                            <tr>
                                <td><?php echo $id['username']; ?></td>
                                <td><?php echo $id['nickname']; ?></td>
                                <td><?php echo $id['group_name']; ?></td>
                                <td>
                                    <?php switch($id['status']): case "0": ?><span class="label bg-gray">停用</span><?php break; case "1": ?><span class="label bg-green">启用</span><?php break; default: endswitch; ?>
                                </td>

                                <td>
                                    <a class="userResetPwBtn" href="javascript:void(0);"
                                       data-id="<?php echo $id['id']; ?>"><i class="fa fa-undo"></i>重置密码</a>

                                    &nbsp;&nbsp;
                                    <a class="userInfoEditBtn" href="javascript:void(0);"
                                       data-id="<?php echo $id['id']; ?>"
                                       data-nickname="<?php echo $id['nickname']; ?>"><i class="fa fa-pencil-square-o"></i>编辑</a>

                                    &nbsp;&nbsp;
                                    <a class="userDelBtn text-danger" href="javascript:void(0);"
                                       data-id="<?php echo $id['id']; ?>"><i class="fa fa-trash-o"></i>删除</a>
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
                            <button type="submit" class="btn btn-sm	btn-success pull-right"
                                    id="userAddBtn">
                                <i class="fa fa-plus fa-fw"></i>新增员工
                            </button>
                        </div>
                    </div>
                    <?php echo $list->render(); ?>
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
    var userAddBtn = $("#userAddBtn");
    var userInfoEditConfirmBtn = $(".userInfoEditConfirmBtn");
    var userInfoAddConfirmBtn = $(".userInfoAddConfirmBtn");
    var userDelConfirmBtn = $(".userDelBtn");

    var userInfoEditModal = $("#userInfoEditModal");
    var userInfoEditBtn = $(".userInfoEditBtn");
    var userInfoAddModal = $("#userInfoAddModal");
    var userResetPwBtn = $(".userResetPwBtn");


    var resetUserPasswordModal = $("#resetUserPasswordModal");
    var resetUserPasswordConfirmBtn = $(".resetUserPasswordConfirmBtn");


    var userInfoEditUrl = "<?php echo url('admin.user/userEdit'); ?>";
    var userResetPwUrl = "<?php echo url('admin.user/resetPassword'); ?>";
    var userAddUrl = "<?php echo url('admin.user/userAdd'); ?>";
    var userDelUrl = "<?php echo url('admin.user/userDel'); ?>";

    var allDepotID = [];


    $(document).ready(function () {


        $('input[type="radio"], input[type="checkbox"]').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
            radioClass: 'icheckbox_flat-blue',
            increaseArea: '20%' // optional,
        });
        var alluesrDepotCheckbox = $(".userInfoEdit").find(".uesrDepot input[type='checkbox']");
        //所有栏目识别id 的数组
        alluesrDepotCheckbox.each(function (i, e) {
            allDepotID.push(Number($(e).val()));
        });

        console.log(allDepotID);


        //编辑员工信息
        userInfoEditBtn.click(function () {
            userInfoEditModal.modal({backdrop: 'static'});
            userInfoEditModal.find('input').on('keydown', function (event) {
                if (event.keyCode === 13) {
                    userInfoEditConfirmBtn.click();
                }
            });


            var id = $(this).data("id");
            //获取员工数据
            $.get(userInfoEditUrl, {id: id}, function (data) {
                //console.log(data);
                $(".userInfoEdit .userInfoid").val(data.id);
                $(".userInfoEdit .userInfoName").val(data.nickname);
                $(".userInfoEdit .menuSelect option").each(function (i, e) {
                    if ($(e).val() == data.group_id) {
                        $(e).prop("selected", true);
                    }
                });

                //读取员工状态
                if (data.status == 1) {
                    $('.userInfoEdit #on').iCheck('check');
                } else {
                    $('.userInfoEdit #off').iCheck('check');
                }
            });


        });

        //员工编辑确认
        userInfoEditConfirmBtn.click(function () {
            AlertConfirm(AlertText.userInfoEdit[0], AlertText.userInfoEdit[1], "是", function () {
                var formData = $(".userInfoEdit").serialize();
                console.log(formData);
                formPost(formData, userInfoEditUrl, userInfoEditConfirmBtn);
            })
        });

        function resetUserPassword(event) {
            var a = resetUserPasswordModal.find("input[name='new_password']").val();
            var b = resetUserPasswordModal.find("input[name='ver_password']").val();
            if (a === "") {
                AlertWarn("错误", "输入的密码不能为空");
                return false;
            }

            if (a !== b) {
                AlertWarn("错误", "两次输入的密码不一样");
                return false;
            } else {
                var formData = new IsSelect();
                formData.id = event.data.id;
                formData.password = a.trim().toString();
                formPost(jQuery.param(formData), userResetPwUrl, resetUserPasswordConfirmBtn);
            }
        }

        //员工重置密码
        userResetPwBtn.click(function () {
            resetUserPasswordModal.modal({backdrop: 'static'});
            var nickname = $(this).data("nickname");
            var id = $(this).data("id");
            $("#UserNameSpan").text(nickname);
            resetUserPasswordConfirmBtn.bind('click', {id: id}, resetUserPassword);
        });


        //新增员工
        userAddBtn.click(function () {
            userInfoAddModal.modal({backdrop: 'static'});
            userInfoAddModal.find('input').on('keydown', function (event) {
                if (event.keyCode == 13) {
                    userInfoAddConfirmBtn.click();
                }
            });
        });

        userInfoAddConfirmBtn.click(function () {
            var formData = $("form.userAdd").serialize();
            formPost(formData, userAddUrl, this);
        });

        userDelConfirmBtn.click(function () {
            var formData = {};
            formData.id = $(this).data("id");
            AlertConfirm(AlertText.userDel[0], AlertText.userDel[1], "是", function () {
                formPost(formData, userDelUrl, this);
            })
        });

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