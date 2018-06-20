<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:60:"D:\PHP\demo\winstart/application/index\view\index\index.html";i:1529475609;s:53:"D:\PHP\demo\winstart/application/index\view\base.html";i:1510803710;s:57:"D:\PHP\demo\winstart/application/index\view\baseHead.html";i:1510166498;s:59:"D:\PHP\demo\winstart/application/index\view\baseScript.html";i:1509433666;s:54:"D:\PHP\demo\winstart/application/index\view\right.html";i:1523861515;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8"/>
    <title><?php echo $title; ?><?php echo $column['url']!='index'?'-'.$par['con_title'] : ''; ?></title>
    <meta name="keywords" content="<?php echo $par['seo_keywords']; ?>"/>
    <meta name="description" content="<?php echo !empty($description)?$description:$par['seo_description']; ?>">
    <meta name="baidu-site-verification" content="<?php echo $par['baidu_verification']; ?>"/>
    <meta name="Author" content="Mather, Crazypeak"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<link rel="icon" href="/images/favicon.ico" type="image/x-icon"/>

<link rel="stylesheet" href="/css/base.css" type="text/css"/>
<link rel="stylesheet" href="/css/inside.css"/>
<link rel="stylesheet" href="/css/index.css" type="text/css"/>
<link rel="stylesheet" href="/css/animate.css">


<script src="/js/jquery-2.min.js"></script>
<script src="/js/jquery.SuperSlide.2.1.2.js"></script>
<!--<script type="text/javascript">-->
    <!--window.onscroll = function () {-->
        <!--var topScroll = document.body.scrollTop;    //滚动的距离,距离顶部的距离-->
        <!--var bignav = document.getElementById("bignav"); //获取到导航栏id-->
        <!--if (topScroll > 1) {  //当滚动距离大于250px时执行下面的东西-->
            <!--bignav.style.position = 'fixed';-->
            <!--bignav.style.top = '0';-->
            <!--bignav.style.zIndex = '99';-->
        <!--} else {    //当滚动距离小于250的时候执行下面的内容，也就是让导航栏恢复原状-->
            <!--bignav.style.position = 'static';-->
        <!--}-->
    <!--}-->
<!--</script>-->
<!--[if IE]>
<script src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>
<![endif]-->
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?002a0c82e9ffb63bf36f70ab80552a74";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>



    


</head>

<body>
<!--头部 开始-->
<div class="nav" id="bignav" style="z-index: 9999;position: fixed;">
    <div class="auto-container cf pdnav">
        <a href="/" class="left"><img src="/images/logo.png" class="logo"/></a>
        <div class="nav-right right">
            <ul class="cf">
                <?php if(is_array($column_list) || $column_list instanceof \think\Collection || $column_list instanceof \think\Paginator): $i = 0; $__LIST__ = $column_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                <li><a href="/<?php echo $item['url']; ?>"><?php echo $item['name']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <li><span><img src="/images/tel.png">400-0982-168</span>
                </li>
            </ul>
        </div>
        <!-- 手机导航 appnav-->
        <div class="appnav right">
            <a class="btn-appmenu"><img src="/images/nav-menu.png"/></a>
            <ul class="appnavs">
                <?php if(is_array($column_list) || $column_list instanceof \think\Collection || $column_list instanceof \think\Paginator): $i = 0; $__LIST__ = $column_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                <li>
                    <?php if(!(empty($item['child']) || (($item['child'] instanceof \think\Collection || $item['child'] instanceof \think\Paginator ) && $item['child']->isEmpty()))): ?>
                    <span style="float: left;padding-left:5%;font-size: 160%"><a class="childBtn" style="width: 5%;height: 100%">+</a></span>
                    <?php endif; ?>
                    <a href="/<?php echo $item['url']; ?>"><?php echo $item['name']; ?></a>
                    <ul class="child" style="display: none">
                        <?php if(is_array($item['child']) || $item['child'] instanceof \think\Collection || $item['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $item['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods): $mod = ($i % 2 );++$i;?>
                        <li style="background-color:#666"><a href="/<?php echo $item['url']; ?>/<?php echo $goods['id']; ?>">|—&nbsp<?php echo $goods['name']; ?></a></li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <li><a href="https://shop144132623.taobao.com/" target="_blank">淘宝店铺</a></li>
            </ul>
            <script type="text/javascript">
                $('.childBtn').click(function () {
                    var child = $(this).parent().siblings('.child');
                    if(child.css('display') === 'none'){
                        $(this).html('||');
                    }else{
                        $(this).html('+');
                    }
                    child.slideToggle();
                });
            </script>
        </div>
    </div>
    <?php if(!(empty($goods_list) || (($goods_list instanceof \think\Collection || $goods_list instanceof \think\Paginator ) && $goods_list->isEmpty()))): ?>
    <!--二级菜单 开始-->
    <div class="Productbar">
        <div class="product">
            <ul class="productbrowser-items">
                <?php if(is_array($goods_list) || $goods_list instanceof \think\Collection || $goods_list instanceof \think\Paginator): $i = 0; $__LIST__ = $goods_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods): $mod = ($i % 2 );++$i;?>
                <li>
                    <a href="/<?php echo $column['url']; ?>/<?php echo $goods['id']; ?>">
                        <img src="<?php echo $goods['img_url']; ?>"/>
                    </a>
                    <a href="/<?php echo $column['url']; ?>/<?php echo $goods['id']; ?>">
                        <span class="productbrowser-label"><?php echo $goods['name']; ?></span>
                    </a>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <!--二级菜单 end-->
    <?php endif; ?>
</div>
<!--头部 end-->
<div style="width: 100%;height:50px;"></div>
<!--主体 开始-->

<!-- 主要内容 -->


<!--主体 end-->

<!--底部 开始-->
<div class="footer">
    <div class="auto-container cf">
        <div class="footer-top cf">
            <?php if(is_array($footer) || $footer instanceof \think\Collection || $footer instanceof \think\Paginator): $i = 0; $__LIST__ = $footer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
            <div class="footer-item">
                <ul>
                    <li><p><?php echo $item['name']; ?></p></li>
                    <?php if(is_array($item['child']) || $item['child'] instanceof \think\Collection || $item['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $item['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($i % 2 );++$i;?>
                    <li><a href="<?php echo $child['url']; ?>"><?php echo $child['name']; ?></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <div class="footer-item footer-item-weixin">
                <img src="/images/weixin.jpg"/>
                <p>福维尔微信公众号</p>
            </div>
            <div class="footer-item footer-item-hotline">
                <p class="hot24">全国免费服务热线</p>
                <h3><?php echo $par['con_phone']; ?></h3>
            </div>
        </div>
        <div class="footer-bottom cf">
            <div class="footer-bottom-left left">
                <p>CopyRight© <?php echo $par['con_company']; ?> . All Right Reserved <?php echo $par['con_number']; ?>
                    <br/>地址：<?php echo $par['con_address']; ?></p>
            </div>
        </div>
    </div>
</div>
<!--底部 end-->

<script src="/js/main.js"></script>
<script src="/js/wow.min.js"></script>
<script>
    $(function () {
        if (!(/msie [6|7|8|9]/i.test(navigator.userAgent))) {
            new WOW().init();
        }
        ;
    })
</script>




<!-- 右客服侧悬浮代码 开始 -->
<div class="go-top dn" id="go-top">
    <a href="javascript:;" class="uc-2vm"></a>
	<div class="uc-2vm-pop dn">
		<h2 class="title-2wm">用微信扫一扫 关注公众号</h2>
		<div class="logo-2wm-box">
			<img src="/images/saoweixin.jpg" alt="微信公众号" >
		</div>
	</div>
    <a href="<?php echo $par['tencent_qq_url']; ?>"  target="_blank" class="feedback"></a>
    <a href="javascript:;" class="go"></a>
</div>
<script>
$(function(){
	$(window).on('scroll',function(){
		var st = $(document).scrollTop();
		if( st>0 ){
			if( $('#main-container').length != 0  ){
				var w = $(window).width(),mw = $('#main-container').width();
				if( (w-mw)/2 > 70 )
					$('#go-top').css({'left':(w-mw)/2+mw+20});
				else{
					$('#go-top').css({'left':'auto'});
				}
			}
			$('#go-top').fadeIn(function(){
				$(this).removeClass('dn');
			});
		}else{
			$('#go-top').fadeOut(function(){
				$(this).addClass('dn');
			});
		}	
	});
	$('#go-top .go').on('click',function(){
		$('html,body').animate({'scrollTop':0},500);
	});

	$('#go-top .uc-2vm').hover(function(){
		$('#go-top .uc-2vm-pop').removeClass('dn');
	},function(){
		$('#go-top .uc-2vm-pop').addClass('dn');
	});
});
</script>
<!-- 右客服侧悬浮代码 end -->
</body>
</html>