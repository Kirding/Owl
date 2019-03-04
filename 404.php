<?php 

if(!defined('EMLOG_ROOT')) {exit('error!');} 

?>

<?php

/*

Template Name:OWL-Colorful

Version:1.0

Author:污桐

Author Url:http://www.biego.cn

Sidebar Amount:1

ForEmlog:5.3.1

*/

if(!defined('EMLOG_ROOT')) {exit('error!');}

require_once View::getView('module');

?>

<!DOCTYPE html>

<html lang="zh-CN">

<head>

<meta charset="UTF-8" />

<title>404</title>

<meta name="keywords" content="<?php echo $site_key; ?>" />

<meta name="description" content="<?php echo $site_description; ?>" />

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<link rel="apple-touch-icon" href="<?php echo TEMPLATE_URL; ?>images/icon.png" />

<link rel="shortcut icon" href="<?php echo TEMPLATE_URL; ?>images/favicon.ico" type="image/x-icon" />

<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo BLOG_URL; ?>wlwmanifest.xml" />

<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo BLOG_URL; ?>xmlrpc.php?rsd" />

<link rel="alternate" type="application/rss+xml" title="RSS"  href="<?php echo BLOG_URL; ?>rss.php" />

<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_URL; ?>style.css?v=20170205-12"/>

<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_URL; ?>font-awesome.min.css?v=4.5.0">

<link rel="stylesheet" type="text/css" href="//lib.baomitu.com/font-awesome/4.7.0/css/font-awesome.min.css">

<script type="text/javascript" src="//lib.baomitu.com/jquery/3.1.1/jquery.min.js"></script>

<script>!window.jQuery && document.write('<script src="<?php echo TEMPLATE_URL; ?>js/jquery.min.js"><\/script >');</script>

<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/jquery.min.js?v=20150225"></script>

<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/prettify.js?v=20170205"></script>

<script type="text/javascript" src="<?php echo BLOG_URL; ?>include/lib/js/common_tpl.js"></script>

<?php echo gf_url($logid);?>

<?php doAction('index_head'); ?>

<!--[if lt IE 9]> 

<script src="<?php echo TEMPLATE_URL; ?>js/html5.js"></script>

<style type="text/css">#wenkmPlayer{display:none}</style>

<![endif]-->

<?php if(_g('cnzz')==1):?>

<script>

var _czc = _czc || [];

_czc.push(["_setAccount", "<?php echo _g('cnzzid');?>"]);

</script>

<?php endif;?>

</head>

<body>

<div id="head-nav">

  <div class="header-logo">

     <div class="logo">  

     <img src="<?php echo TEMPLATE_URL; ?>images/logo12.png">

     </div>

    </div>

  <div class="head-nav-wrap clearfix" id="nav">

  <div id="load"></div>

    <ul id="menu-index" class="nav">

      <?php blog_navi();?>

    </ul>

    <ul class="m-search">

      <div class="search">

      <form>

       <input type="text" value="输入关键字自动全文搜索..." onkeydown="if(event.keyCode==13){event.returnValue=false;}" required="required" />

       <div class="result"><h2>搜索“<span></span>”的结果</h2><div></div></div>

        <button type="reset"></button>

         <span class="searchicon"><i class="fa fa-search"></i></span>

      </form>

      </div>

      <div class="clear"></div>

    </ul>

    <ul class="m-nav" >

      <li>

       <a href="#" onclick="return false;" class="navbar-btn">登陆 <i class="fa fa-user-circle fa-fw"></i></a>

      </li>

      <li><a id="showbox" title="设置网站背景图片">皮肤 <i class="fa fa-toggle-on fa-fw" aria-hidden="true"></i></a></li>

    </ul>

  </div>

</div>

<header id="header1">

  <div class="open-nav"><i class="fa fa-list-ul"></i></div>

  <div class="logo1">

    <h1><a rel="index" title="网站首页" href="<?php echo BLOG_URL; ?>"><img src="<?php echo _g('logo1'); ?>" alt="<?php echo $blogname; ?>" /></a></h1>

  </div>

</header>



<?php if(_g('dhkg')==1):?>

<?php if(_g('bjkg')==1): ?>

<div id="bg-images_tanchu">

   <div id="changebg" class="changebg">

    <div class="tiphead"><i class="fa fa-cogs"></i> 设置背景图片<a id="kaiguan" href="javascript:;" title="关闭"></a></div>

    <div class="tipbody">

  <ul id="imgul">

  <li onclick="javascript:loadbg(1);"><?php if($_COOKIE['myhk_bg']=='1'):?><i class="fa fa-check-circle fa-2x checkit"></i><?php endif;?><i></i></li>

  <li onclick="javascript:loadbg(2);"><?php if($_COOKIE['myhk_bg']=='2'):?><i class="fa fa-check-circle fa-2x checkit"></i><?php endif;?><i></i></li>

  <li onclick="javascript:loadbg(3);"><?php if($_COOKIE['myhk_bg']=='3'):?><i class="fa fa-check-circle fa-2x checkit"></i><?php endif;?><i></i></li>

  <li onclick="javascript:loadbg(4);"><?php if($_COOKIE['myhk_bg']=='4'):?><i class="fa fa-check-circle fa-2x checkit"></i><?php endif;?><i></i></li>

  <li onclick="javascript:loadbg(5);"><?php if($_COOKIE['myhk_bg']=='5'):?><i class="fa fa-check-circle fa-2x checkit"></i><?php endif;?><i></i></li>

  <li onclick="javascript:loadbg(6);"><?php if($_COOKIE['myhk_bg']=='6'):?><i class="fa fa-check-circle fa-2x checkit"></i><?php endif;?><i></i></li>

  <li onclick="javascript:loadbg(7);"><?php if($_COOKIE['myhk_bg']=='7'):?><i class="fa fa-check-circle fa-2x checkit"></i><?php endif;?><i></i></li>

  <li onclick="javascript:loadbg(8);"><?php if($_COOKIE['myhk_bg']=='8'):?><i class="fa fa-check-circle fa-2x checkit"></i><?php endif;?><i></i></li>

  <li onclick="javascript:loadbg(9);"><?php if($_COOKIE['myhk_bg']=='9'):?><i class="fa fa-check-circle fa-2x checkit"></i><?php endif;?><i></i></li>

  <li onclick="javascript:loadbg(10);"><?php if($_COOKIE['myhk_bg']=='10'):?><i class="fa fa-check-circle fa-2x checkit"></i><?php endif;?><i></i></li>

    </ul>

  </div>

   </div>

</div>

<?php endif;?>

<?php endif;?>

<div id="lmhblog">

    <header id="header">

        <div class="box">

            <div class="text">

                <ul>

                    <?php global $CACHE;$newtws_cache = $CACHE->readCache('newtw');?><?php foreach($newtws_cache as $value): ?>

                        <li><a title="查看更多微言碎语" href="<?php echo BLOG_URL . 't/'; ?>"><i class="fa fa-twitter"></i> <?php echo date('Y年n月j日 - ',$value['date']);echo preg_replace('/\[F(([1-4]?[0-9])|50)\]/','',$value['t']);?></li></a>

                    <?php endforeach; ?>

                </ul>

            </div>

        </div>

    </header>

  <div id="wrapper">

  <div class="main_header">

    <div class="me_img">

        <div class="me_avatar">

        <?php if(_g('zhbi')==1):?><div class="header-v" title="官网认证,金V成员."></div><?php endif;?>

        </div>

        <ul class="me_name">

            <li>

            <p class="me_num"><?php echo count_log_all();?></p>

            <p class="me_title">文章</p>

            </li>

            <li>

            <p class="me_num"><?php echo count_com_all();?></p>

            <p class="me_title">评论</p>

            </li>

            <li>

            <p class="me_num"><?php echo count_link_all();?></p>

            <p class="me_title">邻居</p>

            </li>

            </ul>  

    </div>

</div>

    <div id="container">

      <div id="anitOut"></div>

      <div class="page">

        <header>

          <h2 class="post-name"><i class="fa fa-minus-circle"></i> 404</h2>

        </header>

        <address class="entry-meta">

        <i class="fa fa-home"></i><a href="<?php echo BLOG_URL;?>" title="返回首页">首页</a> &raquo; <i class="fa fa-file-text-o"></i>404 &raquo; <i class="fa fa-clock-o"></i>1944年4月4日 下午 04:44

        </address>

        <div id="errorBox">

          <h1><span>请允许我做一个悲伤的表情</span><img src="<?php echo TEMPLATE_URL; ?>images/404.gif" alt="请允悲" width="288" height="160" style="display:block"/></h1>

          <div id="errorSummary">

            <p>您访问的页面不小心被系统酱玩(bù)丢(cún)了(zài)！<br />

              The requested URL was not found on the server.</p>

            <p>如果您是手动输入，请检查您的输入是否正确，然后再F5一次！<br />

              If you entered the URL manually please check your spelling and try again.</p>

          </div>

          <div id="errorDetails"><strong>错误 404</strong> (url::<?php echo strtoupper(wcs_error_currentPageURL()); ?>)：就是找不到鸟你来咬我啊</div>

        </div>

      </div>

    </div>

    <div class="clear"></div>

    <div class="blackground"></div>

    <div title="返回顶部(或任意位置双击左键)" class="backtop"></div>

    <nav id="mmenu" role="navigation">

      <ul>

        <li>

          <div class="msearch">

            <form name="keyform" method="get" action="<?php echo BLOG_URL; ?>index.php">

              <input type="text" name="keyword" placeholder="搜搜更健康" />

              <input type="submit" name="submit" value="搜索" />

            </form>

          </div>

        </li>

        <?php blog_navi();?>

      </ul>

    </nav>

  </div>

<footer id="footer" role="contentinfo">

  <address>

      文章中出现的商标及图像版权属于其合法持有人，只供传递信息之用，非商务用途。互动交流时请遵守理性，宽容，换位思考的原则<div style="height:12px;"><br></div>

      <i class="fa fa-html5"></i> Copyright&nbsp;©&nbsp;<?php echo _g('webyear');?>-<?php echo date('Y',time())?>&nbsp;<div class="copyright">&nbsp;|&nbsp;勉强运行：<?php echo floor((time()-strtotime(""._g('webyear')."-"._g('webtime').""))/86400); ?>天&nbsp;|&nbsp;主题：<a href="https://www.biego.cn" title="污桐客栈" target="_blank">OWL-Colorful 2.0</a>&nbsp;|&nbsp;<a rel="nofollow" href="http://www.emlog.net" title="Emlog <?php echo Option::EMLOG_VERSION;?>" target="_blank"><img src="<?php echo TEMPLATE_URL; ?>images/em.png" class="footer-icon">&nbsp;<?php echo Option::EMLOG_VERSION;?></a>&nbsp;驱动&nbsp;|&nbsp;<?php if(_g('cnzz')==1):?><script src="https://s<?php echo rand(1, 100); ?>.cnzz.com/stat.php?id=<?php echo _g('cnzzid');?>&web_id=<?php echo _g('cnzzid');?>" language="JavaScript"></script><?php endif;?>&nbsp;|&nbsp;<?php doAction('index_footer'); ?>&nbsp &nbsp;&nbsp;<?php echo $footer_info; ?></div> <div style="height:8px;"><?php if(_g('ycsy')==1):?><br></div>



  网站部署于&nbsp;<a target="_blank" rel="nofollow" href="<?php echo _g('fwsdz');?>"><img style="top:1px;width:67px!important;height:21px!important;vertical-align:middle;margin:-4px 0 0 0" src="<?php echo _g('fwslogo'); ?>"/> </a> &nbsp;&nbsp;<a rel="nofollow" href="http://www.miibeian.gov.cn" target="_blank"><img src="<?php echo TEMPLATE_URL; ?>/images/icp.png"  class="footer-icon"/> <?php echo _g('icpba');?></a>&nbsp;&nbsp;<a target="_blank" rel="nofollow" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=<?php echo _g('gabanum');?>"><img src="<?php echo TEMPLATE_URL; ?>images/ga.png"  class="footer-icon"/> <?php echo _g('gaba');?></a><a id="_pinganTrust" target="_blank" href="http://c.trustutn.org/show?type=1&sn=201702161004522127"></a><?php endif;?>

  </address>

</footer>

<script><?php if(_g('eqi')==1):?>eqi="ul:first";<?php else: ?>eqi="ul:first<?php for($i = 1; $i <= _g('eqi'); $i++) {echo ",ul:eq(".$i.")";}?>";<?php endif;?><?php if(_g('clsqkg')==1):?>blog="<?php echo _g('clsq');?>";<?php else: ?>blog="<?php echo $site_title; ?>";<?php endif;?>function pjaxfooter(){<?php echo _g('pjaxdm');?>}<?php if(_g('cnzz')==1):?>_czc.push(["_trackPageview",window.location.pathname,document.location.href]);<?php endif;?></script>



<div id="totop" class="totop"><i class="fa">&#61610;</i></div>

<?php if(_g('loading')==1):?>

<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/pace.min.js?v=20160704"></script>

<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_URL; ?>style/pace.css?v=20160731" />

<div class="colorful_loading_frame"></div>

<?php else: ?>

<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_URL; ?>style/load.css?v=20160731" />

<div class="colorful_loading_frame">

  <div class="colorful_loading"><i class="rect1"></i><i class="rect2"></i><i class="rect3"></i><i class="rect4"></i><i class="rect5"></i></div>

</div>

<?php endif;?>

<div class="dandelion">

    <span class="smalldan"></span>

    <span class="bigdan"></span>

</div>



<div class="cd-user-modal login-modal m_hide">

    <a href="#" class="cd-close-form"></a>

    <div class="cd-user-modal-container">

        <div class="login-img" style="background-image: url('<?php echo TEMPLATE_URL; ?>images/slider01-1.png');"></div>

        <div class="login-form">

            <form name="login-form" id="login-form" action="<?php echo BLOG_URL; ?>admin/index.php?action=login" method="post">

                <p class="login-username">

                    <label for="user">用户名</label>

                    <input type="text" name="user" id="user_login" class="input" value="" size="20">

                </p>

                <p class="login-password">

                    <label for="pass">密码</label>

                    <input type="password" name="pw" id="user_pass" class="input" value="" size="20">

                </p>

                <p class="login-code">

                    <span><?php echo $ckcode; ?></span>

                    <input name="imgcode" id="imgcode" type="text">

                    <img src="<?php echo BLOG_URL; ?>include/lib/checkcode.php" align="absmiddle">

                </p>

                <p class="login-submit">

                    <input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="登录">

                    <input type="hidden" name="redirect_to" value="/">

                </p>

            </form>

            <p class="login-links clearfix">

        <span class="fl">

          <a href="http://wiki.emlog.net/doku.php?id=chpwd">忘记密码</a>

        </span>

            </p>

        </div>

    </div>

</div>

<?php empty($_COOKIE['myhk_bg']) ? $bgimgsrc = TEMPLATE_URL . 'images/yj.png?v=new' : $bgimgsrc = TEMPLATE_URL . 'images/bg/' . $_COOKIE["myhk_bg"] . '.jpg' ;?>

<img class="bg-image" src="<?php echo $bgimgsrc; ?>" /><div class="bg-image-pattern"></div>

<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>style/highslide/highslide.js?v=20150310"></script>

<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_URL; ?>style/highslide/highslide.css?v=20141026" />

<?php if(_g('pjax')==1):?>

<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/pjax.min.js?v=20170203"></script>

<?php if(_g('index_hdp')==1):?>

<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/global-slider.js?v=20170216"></script>

<?php endif;?>

<?php else: ?>

<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/global.js?v=20150912"></script>

<?php endif;?>

<script>blog="草榴社區";</script>

</body>

</html>

<?php

if(_g('compress_html')=='open'){

    $html=ob_get_contents();

    ob_get_clean();

    echo em_compress_html_main($html);

}

?>