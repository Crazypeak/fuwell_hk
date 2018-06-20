<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:72:"D:\PHP\demo\winstart/application/admin\view\information\articleSave.html";i:1529486107;s:60:"D:\PHP\demo\winstart/application/admin\view\Public\base.html";i:1508705602;s:67:"D:\PHP\demo\winstart/application/admin\view\Public\navBarRight.html";i:1508133402;s:62:"D:\PHP\demo\winstart/application/admin\view\Public\footer.html";i:1508705600;}*/ ?>
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

        
<!-- Main content -->
<section class="content">
    <form id="newInfo">
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <!--订单信息-->
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">文章信息</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-sm-10 form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-1 control-label">发布者</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" disabled value="<?php echo session('user_auth.nickname'); ?>">
                                </div>

                                <label class="col-sm-1 control-label"><span class="text-danger">&nbsp;*</span>状态</label>
                                <div class="col-sm-3">
                                    <select name="status" id="status" class="form-control">
                                        <option class="op0" value="0">草稿(待发)</option>
                                        <option class="op1" value="1" selected>正常</option>
                                    </select>
                                </div>

                                <?php if(is_HK()): ?>
                                <input type="hidden" name="type" id="type" value="0"/>
                                <?php else: ?>
                                <label class="col-sm-1 control-label"><span class="text-danger">&nbsp;*</span>类别</label>
                                <div class="col-sm-3">
                                    <select name="type" id="type" class="form-control">
                                        <option class="op0" value="0" selected>公司新闻</option>
                                        <option class="op1" value="1">行业资讯</option>
                                    </select>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label"><span class="text-danger">&nbsp;*</span>标题</label>
                                <div class="col-sm-11">
                                    <input type="text" class="form-control" id="title" name="title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label">描述</label>
                                <div class="col-sm-11">
                                    <textarea id="description" style="resize: vertical" class="form-control" name="description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-horizontal">
                            <div class="col-sm-2">
                                <a href="javascript:void(0)" id="articleImgBtn">
                                    <input type="file" class="form-control" style="display: none" id="imgFile" name="articleImage">
                                    <img id="articleImg" width="160" height="150" src="/images/notimg.png">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <!-- /.box-footer -->
                </div>
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">文章内容</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-md-offset-1 col-sm-10">
                                <script type="text/javascript" charset="utf-8" src="/static/ueditor/ueditor.config.js"></script>
                                <script type="text/javascript" charset="utf-8" src="/static/ueditor/ueditor.all.min.js"></script>
                                <!-- 实例化编辑器 -->
                                <script type="text/javascript">
                                    var ue = UE.getEditor('contents');
                                </script>
                                <script id="contents" type="text/plain"></script>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="btn-toolbar pull-right" role="toolbar" aria-label="..." style="margin-left: 20px;">
                            <div class="btn-group" role="group" aria-label="...">
                                <a class="btn btn-default btn-sm" href="<?php echo url('index'); ?>"><i
                                        class="fa fa-long-arrow-left fa-fw"></i>返回列表
                                </a>
                            </div>
                            <div class="btn-group" role="group" aria-label="...">
                                <a class="btn btn-success btn-sm " id="newsSavePostBtn"><i
                                        class="fa fa-check fa-fw"></i>确定文章
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
    var newsSaveData = new FormData();
    var newsSaveUrl = "<?php echo url(''); ?>";
    var id = "<?php echo !empty($id)?$id : ''; ?>";
    if (id) $.get(newsSaveUrl, {id: id}, function (data) {
        newsSaveData.append('id', id);
        newsSaveData.append('img_url', data.img_url);

        $('#articleImg').attr('src', data.img_url);

        $("#title").val(data.title);
        $("#description").val(data.description);
        ue.ready(function() {   //编辑器初始化完成再赋值
            ue.setContent(data.content);  //赋值给UEditor
        });

        //读取员工状态
        if(data.type == 1){
            $('#status .op1').select('select')
        }else{
            $('#status .op0').select('select');
        }
        if(data.status == 1){
            $('status .op1').select('select')
        }else{
            $('status .op0').select('select');
        }
    });


    var imgFile = $('#imgFile');
    var articleImg = $('#articleImg');

    $(document).ready(function () {
        imgFile.change(function () {
            var filePath = $(this).val();
            var fileNameArray = filePath.split('.');
            var fileExtension = fileNameArray[fileNameArray.length - 1];
            if ((fileExtension !== "jpg") &&
                (fileExtension !== "png") &&
                (fileExtension !== "JPG")) {
                AlertWarn("无效的文件", "选择文件的格式不正确");
                $('#articleImg').attr('src', filePath);
            } else {
                readURL(this);
            }
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#articleImg').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        articleImg.click(function () {
            imgFile.click();
        });

        $('#newsSavePostBtn').click(function () {
            if (!id){
                if(imgFile[0].files[0] === undefined) {
                    AlertWarn("错误", "未上传封面图片");
                    $(this).prop("disabled", false);
                    return false;
                }else{
                    newsSaveData.append('img', imgFile[0].files[0]);
                }
            }else{
                if(imgFile[0].files[0] !== undefined) {
                    newsSaveData.append('img', imgFile[0].files[0]);
                }
            }
//            console.log(imgFile);
//            $('#newInfo').submit();
            newsSaveData.append('type', $("#type").val());
            newsSaveData.append('title', $("#title").val());
            newsSaveData.append('status', $("#status").val());
            newsSaveData.append('content', $("[name='editorValue']").val());
            newsSaveData.append('description', $("#description").val());
            originFormPost(newsSaveData, newsSaveUrl, this);
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