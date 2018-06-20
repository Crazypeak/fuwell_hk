<?php if (!defined('THINK_PATH')) exit(); /*a:10:{s:60:"D:\PHP\demo\winstart/application/fw_hk\view\index\index.html";i:1529483974;s:53:"D:\PHP\demo\winstart/application/fw_hk\view\base.html";i:1529488627;s:57:"D:\PHP\demo\winstart/application/fw_hk\view\baseHead.html";i:1529483273;s:74:"D:\PHP\demo\winstart/application/fw_hk\view\index\html\20180620163934.html";i:1529483974;s:74:"D:\PHP\demo\winstart/application/fw_hk\view\index\html\20180620154224.html";i:1529480544;s:74:"D:\PHP\demo\winstart/application/fw_hk\view\index\html\20180620154230.html";i:1529480550;s:74:"D:\PHP\demo\winstart/application/fw_hk\view\index\html\20180620154235.html";i:1529480555;s:74:"D:\PHP\demo\winstart/application/fw_hk\view\index\html\20180620154241.html";i:1529480561;s:74:"D:\PHP\demo\winstart/application/fw_hk\view\index\html\20180620154247.html";i:1529480567;s:59:"D:\PHP\demo\winstart/application/fw_hk\view\baseScript.html";i:1529480496;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.ico">
    <title>Home</title>
        <!-- core CSS -->
    <link href="fw_hk/css/bootstrap.min.css" rel="stylesheet">
    <link href="fw_hk/css/main.css" rel="stylesheet">
    <link href="fw_hk/css/font-awesome.min.css" rel="stylesheet">
    <link href="fw_hk/css/animate.min.css" rel="stylesheet">
    <link href="fw_hk/css/responsive.css" rel="stylesheet">

    


</head>

<body>
<!--头部 开始-->
<header id="header">
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-4">
                    <div class="top-number"><p><i class="fa fa-phone-square"></i> (+86) 750
                        3555655&nbsp;&nbsp;&nbsp;<span class="ihonetel">(+86) 750 3559881</span></p></div>
                </div>
                <div class="col-sm-6 col-xs-8">
                    <div class="social">
                        <ul class="social-share">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li onmouseover="this.className = 'weixin on';" onmouseout="this.className = 'weixin';"><a
                                    href="javascript:;"><i class="fa fa-weixin"></i></a>
                                <div class="weixin_nr">
                                    <div class="arrow"></div>
                                </div>
                            </li>
                        </ul>
                        <div class="search">
                            <form role="form">
                                <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                                <i class="fa fa-search"></i>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--头部 end-->

<!--导航 开始-->
<nav class="navbar navbar-inverse" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo"></a>
        </div>
        <div class="collapse navbar-collapse navbar-right">
            <ul class="nav navbar-nav">
                <?php if(is_array($column_list) || $column_list instanceof \think\Collection || $column_list instanceof \think\Paginator): $i = 0; $__LIST__ = $column_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo $item['url']; ?>"><?php echo $item['name']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <!--<li class="active"><a href="index.html">Home</a></li>-->
                <!--<li><a href="about us.html">About Us</a></li>-->
                <!--<li class="dropdown">-->
                    <!--<a href="productslist.html" class="dropdown-toggle">Products <i class="fa fa-angle-down"></i></a>-->
                    <!--<ul class="dropdown-menu">-->
                        <!--<li><a href="Security.html">Security</a></li>-->
                        <!--<li><a href="Lever handle.html">Lever handle</a></li>-->
                        <!--<li><a href="Window handle.html">Window handle</a></li>-->
                        <!--<li><a href="Pull handle.html">Pull handle</a></li>-->
                        <!--<li><a href="Glass door.html">Glass door</a></li>-->
                        <!--<li><a href="Accessories.html">Accessories</a></li>-->
                    <!--</ul>-->
                <!--</li>-->
                <!--<li><a href="services.html">Services</a></li>-->
                <!--<li><a href="newlist.html">News</a></li>-->
                <!--<li><a href="contact.html">Contact</a></li>-->
            </ul>
        </div>
    </div>
</nav>
<!--导航 end-->
<!--主体 开始-->

<!-- 主要内容 -->

<!--slider 开始-->
<div class="slider_bg">
    <div class="slider">
        <div class="callbacks_container">
            <ul class="rslides" id="slider">
                <li>
                    <h3>Providing high<p> level anti-theft security products</p><span>Fashionable and durable safety door locks, safety locks have<br/>gained many patents in China.</span>
                    </h3>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--slider end--><!--ABOUT US 开始-->
<section id="about-us">
    <div class="container">
        <div class="center">
            <h2>ABOUT US</h2>
        </div>
        <div class="col-md-5 about-top">
            <h2>Our Exhibition Hall</h2>
            <p>FULL WELL International Management Limited. was established in October 2010, covers area as about 2500
                squares meters. We locate in the center of Jiangmen City, the west of most developed Pearl River Delta
                in China.</p>
            <p class="sub">We mainly produce various of anti-theft locks ( Digital Fingerprint locks and mechanical
                anti-theft locks),anti-fire door locks , all kinds of lock-sets
                for doors or windows and different locking systems,as well as various types of decorative hardware
                accessories.</p>
            <p class="sub"> In addition, we also provide various professional services:
                1) Searching high quality suppliers for oversea buyers.
                2) Providing production and quality status tracking for various orders.
                3) Quality testing services for various types of hardware products. 4) Following and implementing import
                and export business.
            </p>
            <a href="#" class="hvr-outline-out">Read More</a>
        </div>
        <div class="col-md-7 about-img">
            <a href="#"><img src="fw_hk/images/aboutimg01.jpg" alt="about us"/></a>
        </div>
    </div>
</section>
<!--ABOUT US end--><!--SERVICES 开始-->
<section id="feature SERVICES">
    <div class="container">
        <div class="center">
            <h2>SERVICES</h2>
        </div>
        <div class="col-md-6 fields-left">
            <span class="home"></span>
            <h4>OEM/ODM</h4>
            <p>Could make the products according to customer’s requirements, with exquisite workmanship and quality
                assurance.</p>
        </div>
        <div class="col-md-6 fields-left">
            <span class="pen"></span>
            <h4>Professional Services</h4>
            <p>1）Searching high quality suppliers for oversea buyers.
                2）Providing production and quality status tracking for various orders.
                3）Quality testing services for various types of hardware products.
                4) Following and implementing import and export business.
            </p>
        </div>
        <div class="clearfix"></div>
    </div>
</section>
<!--SERVICES end--><!--LATEST PRODUCT 开始-->
<section id="latest-product">
    <div class="container">
        <div class="center">
            <h2>LATEST PRODUCT</h2>
        </div>
        <div class="span_of_3">
            <div class="span1_of_3"><a class="popup-with-zoom-anim" href="#"><img src="fw_hk/images/latest-productimg01.jpg"
                                                                                  alt="Fingerprint lock"/></a> <a
                    class="popup-with-zoom-anim" href="#">
                <h3>Fingerprint Lock</h3>
            </a>
                <h4 class="divider"></h4>
                <p>Not only qualify anti-theft capabilities, intelligent Lock also with the biggest advantages as its
                    security and convenience.</p>
            </div>
            <div class="span1_of_3"><a class="popup-with-zoom-anim" href="#"><img src="fw_hk/images/latest-productimg02.jpg"
                                                                                  alt="Fingerprint lock"/></a> <a
                    class="popup-with-zoom-anim" href="#">
                <h3>Mechanical anti-theft lock</h3>
            </a>
                <h4 class="divider"></h4>
                <p>The lock-sets have obtained a number of utility model patent certificates. The ultra-hard door plate
                    meets European EN standards and could pass the related tests.</p>
            </div>
            <div class="span1_of_3"><a class="popup-with-zoom-anim" href="#"><img src="fw_hk/images/latest-productimg03.jpg"
                                                                                  alt="Fingerprint lock"/></a> <a
                    class="popup-with-zoom-anim" href="#">
                <h3>Interior door lock</h3>
            </a>
                <h4 class="divider"></h4>
                <p>Can meet the requirements of all interior doors, simple and quick installation is its biggest
                    feature.</p>
            </div>
        </div>
    </div>
</section>
<!--LATEST PRODUCT end--><!--NEWS 开始-->
<section id="news">
    <div class="container">
        <div class="center">
            <h2>NEWS</h2>
        </div>
        <div class="span_of_3">
            <div class="events-grid">
                <a href="#"><img src="fw_hk/images/newimg01.jpg" alt=" " class="img-responsive"/></a>
                <div class="event-grid-bottom">
                    <div class="col-xs-2 event-grid-bottom-left">
                        <h4>12th <span>August</span></h4>
                    </div>
                    <div class="col-xs-6 event-grid-bottom-right">
                        <h4><a href="#">High end stainless steel window handle</a></h4>
                        <p>Stainless steel material, exquisite appearance design, small installation space, simple and
                            quick assembly, and improved assembly efficiency.</p>
                    </div>
                </div>
            </div>
            <div class="events-grid">
                <a href="#"><img src="fw_hk/images/newimg02.jpg" alt=" " class="img-responsive"/></a>
                <div class="event-grid-bottom">
                    <div class="col-xs-2 event-grid-bottom-left">
                        <h4>05th <span>October</span></h4>
                    </div>
                    <div class="col-xs-6 event-grid-bottom-right">
                        <h4><a href="#">Home intelligent door lock</a></h4>
                        <p>The minimalist design style and three kinds of unlocking methods not only satisfy the
                            burglary but also provide convenience.</p>
                    </div>
                </div>
            </div>
            <div class="events-grid">
                <a href="#"><img src="fw_hk/images/newimg03.jpg" alt=" " class="img-responsive"/></a>
                <div class="event-grid-bottom">
                    <div class="col-xs-2 event-grid-bottom-left">
                        <h4>15th <span>May</span></h4>
                    </div>
                    <div class="col-xs-6 event-grid-bottom-right">
                        <h4><a href="#">Using a new type of patent certificate</a></h4>
                        <p>Many products have been granted new patent certificates in China, and all designs are
                            protected by national intellectual property rights.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--NEWS end--><!--contact 开始-->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="widget">
                    <h3>Address</h3>
                    <ul>
                        <li>No. 16, Zilai Road, Pengjiang District, Jiangmen, Guangdong, China</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="widget">
                    <h3>Phone</h3>
                    <ul>
                        <li>(+86) 750 3555655</li>
                        <li>(+86) 750 3559881</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="widget">
                    <h3>Email</h3>
                    <ul>
                        <li>felix@fullwell-hk.com</li>
                        <li>cindy@fullwell-hk.com</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="widget">
                    <h3>WeChat</h3>
                    <ul>
                        <li><img src="fw_hk/images/WeChat.jpg"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--contact end-->

<!--主体 end-->

<!--footer 开始-->
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                CopyRight@Jiangmen Gao te Hardware Electrical Appliance Manufacturing Co., Ltd.. All Right Reserved
            </div>
            <div class="col-sm-4">
                <ul class="pull-right">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Products</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--footer end-->
<a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity:1;"></span></a>

</body>
    <!--[if lt IE 9]>
    <script src="fw_hk/js/html5shiv.js"></script>
    <script src="fw_hk/js/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="fw_hk/js/jquery.min.js"></script>
    <script type="text/javascript" src="fw_hk/js/move-top.js"></script>
    <script src="fw_hk/js/bootstrap.min.js"></script>
    <!-- scroll -->
    <script type="text/javascript">
        $(document).ready(function () {

            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear'
            };


            $().UItoTop({easingType: 'easeOutQuart'});

        });
    </script>
    <!-- //scroll -->




</html>
