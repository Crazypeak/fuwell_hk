<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"D:\PHP\demo\winstart/application/admin\view\Public\login.html";i:1508839240;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <meta name="Author" content="Mather, Crazypeak" />
    <title>网站后台</title>
    <link rel="stylesheet" href="/static/dist/style.css">
    <script>
        (function(w){if(!("WebSocket"in w&&2===w.WebSocket.CLOSING)){w.location.replace("http://browsehappy.osfipin.com/");}}(window));
    </script>

</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>福维尔金属制品</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">  </p>
        <form action="">
            <div class="form-group has-feedback">
                <input type="text" class="form-control input-lg" placeholder="帐号" name="username" id="loginAccounts"
                       autocomplete=off>
                <span class="glyphicon glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control input-lg" placeholder="密码" name="password" autocomplete=off
                       id="loginPassword">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" name="verify" placeholder="验证码"
                               autocomplete=off>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="form-group" style="right: 20px; position:relative;">
                        <img src="" alt="" id="verifyImg">
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <a class="btn btn-primary btn-block btn-lg btn-flat" id="LoginBtn">登录</a>
                </div>
                <!-- /.col -->
            </div>
            <div class="row">
                <div class="col-xs-12">

                </div>
            </div>
        </form>
    </div>
    <!-- /.login-box-body -->
</div>


<!-- ./wrapper -->
<!-- jQuery 3.1.0 -->
<script src="/static/js/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/static/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<!--<script src="/static/js/jquery.slimscroll.min.js"></script>-->
<!-- FastClick -->
<!--<script src="/static/js/fastclick.js"></script>-->
<!-- icheck -->
<script src="/static/plugins/iCheck/icheck.min.js"></script>
<!-- AdminLTE App -->
<script src="/static/js/app.min.js"></script>
<!-- Sweet Alert -->
<script src="/static/js/sweetalert.min.js"></script>
<!-- HTML DOM-->
<script src="/static/js/DOM.js"></script>
<!-- Main JavaScript-->
<script src="/static/js/main.js"></script>
<!-- deployment JavaScript -->
<!--<script src="/static/js/main.min.js"></script>-->

<script>
    $(function () {

        var LoginUrl = "<?php echo url('User/login'); ?>";
        var LoginBtn = $("#LoginBtn");
        var verifyImg = $("#verifyImg");
        var verifyCode = '<?php echo captcha_src(); ?>';
        var LoginForm = $(".login-box-body form");

        $(verifyImg).attr("src", verifyCode);
        verifyImg.click(function () {
            $(this).attr("src", verifyCode);
        });

        LoginBtn.click(function () {
            formPost(LoginForm.serialize(), LoginUrl);
            $("input[name='verify']").val("");
        });

        //enter
        $("input").on('keydown', function (event) {
            if (event.keyCode == 13) {
                LoginBtn.click();
            }
        });

    });
</script>

</body>

</html>


