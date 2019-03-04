<?php
/*
Template Name:Owl-Colorful
Version:1.0
Author:污桐
Author Url:https://www.biego.cn
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
<title><?php echo $site_title; ?><?php $p=$_GET["p"];if($p>0){echo ' -第'.($p+1).'页';}?></title>
<meta name="Baiduspider" content="noarchive">
<meta name="renderer" content="webkit" />
<meta name="keywords" content="<?php echo $site_key; ?>" />
<meta name="description" content="<?php echo $site_description; ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="baidu_union_verify" content="53be946890efc87a6917adf02d24fad7">
<link rel="apple-touch-icon" href="<?php echo TEMPLATE_URL; ?>images/icon.png" />
<link rel="shortcut icon" href="<?php echo TEMPLATE_URL; ?>images/favicon.ico" type="image/x-icon" />
<link rel="icon" href="<?php echo TEMPLATE_URL; ?>images/icon.png" sizes="32x32"/>
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo BLOG_URL; ?>wlwmanifest.xml" />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo BLOG_URL; ?>xmlrpc.php?rsd" />
<link rel="alternate" type="application/rss+xml" title="RSS"  href="<?php echo BLOG_URL; ?>rss.php" />
<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_URL; ?>style.css"/>
<link rel="stylesheet" type="text/css" href="//lib.baomitu.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="//lib.baomitu.com/jquery/1.9.1/jquery.min.js"></script>
<script>!window.jQuery && document.write('<script src="<?php echo TEMPLATE_URL; ?>js/jquery.min.js"><\/script >');</script>
<?php if(_g('index_hdp')==1):?>
<script type="text/javascript" src="//lib.baomitu.com/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php endif;?>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/prettify.js"></script>
<script type="text/javascript" src="<?php echo BLOG_URL; ?>include/lib/js/common_tpl.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/jq.js"></script>
<?php echo gf_url($logid);?>
<?php if (!isset($_COOKIE["commentposter"])) {setcookie('commentposter','匿名',time() + 31536000);}?>
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
<?php if(_g('gggb')==1):?>
    <div class="tools" style="display: block;">
        <marquee direction="left" onmouseover="stop()" onmouseout="start()" style="width: 100%;">
            <?php echo _g('zdgg');?></marquee>
        <a href="javascript:" class="clo-tools"><i class="fa fa-times"></i></a>
    </div>
    <?php else: ?>
    <div class="notice clearfix">
            <div class="notice-img fl">
                <img src="<?php echo _g('notice_img'); ?>" alt="" class="">
            </div>
            <div class="notice-txt fl">
                <h5 class="ofh notice-title ofh">
                    <?php echo _g('notice_title'); ?>
                </h5>
                <div class="notice-content wb">
                    <?php echo _g('notice_text'); ?>
                </div>
                <div class="notice-btn">
                    <a target="_blank" href="<?php echo _g('notice_link'); ?>">阅读更多</a>
                    <a href="javascript:void(0)" class="notice-close">关闭</a>
                </div>
            </div>
        </div>
<?php endif;?>
<div id="head-nav">
    <div class="header-logo">
        <div class="logo">
            <img src="<?php echo TEMPLATE_URL; ?>images/logor.svg" alt="<?php echo $blogname; ?>" />
        </div>
    </div>
    <div class="head-nav-wrap clearfix" id="nav">
        <div id="load"></div>
        <ul id="menu-index" class="nav">
            <?php blog_navi();?>
        </ul>
        <ul class="m-nav" >
            <li class="dropdown">
            <?php if(ROLE == ROLE_VISITOR): ?>
                <a href="#" onclick="return false;" class="navbar-btn"><i class="fa fa-user-circle fa-fw"></i></a>              
            <?php else: ?>
                <a class="catbtns" href="javascript:"><?php doAction('qq_login_info');?></a>
                <ul class="sub-menu" style="display: none">
                                <li class="name">
                                    <a target="_blank" href="<?php echo BLOG_URL; ?>admin"><i class="fa fa-tachometer"></i> 管理</a>
                                </li>
                                <li class="edit-post">
                                    <a target="_blank" href="<?php echo BLOG_URL; ?>admin/write_log.php"><i class="fa fa-edit"></i> 写作</a>
                                </li>
                                <li class="log-out">
                                    <a href="<?php echo BLOG_URL; ?>admin/?action=logout" class="tooltip"><i class="fa fa-sign-out"></i> 登出</a>
                                </li>
                            </ul>
            <?php endif;?>
            </li>
            <li><?php if(_g('pfxt')==1):?><a href="javascript:void(0)" class="skin-btn"><i class="fa fa-windows fa-fw" aria-hidden="true"></i></a><?php else: ?><a id="showbox" title="设置网站背景图片">皮肤 <i class="fa fa-windows fa-fw" aria-hidden="true"></i></a><?php endif;?></li>
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
    </div>
</div>
<header id="header1">
  <div class="open-nav"><i class="fa fa-list-ul"></i></div>
  <div class="logo1">
    <a rel="index" title="网站首页" href="<?php echo BLOG_URL; ?>" alt="<?php echo $blogname; ?>" /><?php echo $blogname; ?></a>
  </div>
</header>
<?php if(_g('pfxt')==1):?>
<div class="skin_switcher m_hide">
            <div class="skin_header clearfix">
                <div class="containers clearfix">
                    <span class="fl">自定义皮肤</span>
                    <span class="skin_fx hand fl" date-fx="layout"><i class="fa fa-toggle-off" aria-hidden="true"></i>单栏布局</span>
                    <span class="skin_fx hand fl" date-fx="glass"><i class="fa fa-toggle-off" aria-hidden="true"></i>玻璃菜单</span>
                    <span class="skin_fx hand fl" date-fx="light"><i class="fa fa-toggle-off" aria-hidden="true"></i>夜间模式</span>
                    <a href="javascript:void(0)" style="color:#eaeaea" class="col_skin hand fr"><i class="fa fa-times"></i></a>
                    <span style="margin-left:55px;color: rgb(218, 40, 40);"><i style="margin-right:5px" class="fa fa-warning" aria-hidden="true"></i>目前开关不起作用，待开发。。。</span>
                </div>
            </div>
            <div class="containers skin_list">
                <ul class="clearfix">
                  <li onclick="javascript:loadbg(1);"><?php if($_COOKIE['myhk_bg']=='1'):?><i class="fa fa-check-circle fa-2x checkit"></i><?php endif;?><i></i><img src="<?php echo TEMPLATE_URL; ?>images/bg/omp/1.jpg"><span class="text-ellipsis">祈祷</span></li>
                  <li onclick="javascript:loadbg(2);"><?php if($_COOKIE['myhk_bg']=='2'):?><i class="fa fa-check-circle fa-2x checkit"></i><?php endif;?><i></i><img src="<?php echo TEMPLATE_URL; ?>images/bg/omp/2.jpg"><span class="text-ellipsis">歌颂</span></li>
                  <li onclick="javascript:loadbg(3);"><?php if($_COOKIE['myhk_bg']=='3'):?><i class="fa fa-check-circle fa-2x checkit"></i><?php endif;?><i></i><img src="<?php echo TEMPLATE_URL; ?>images/bg/omp/3.jpg"><span class="text-ellipsis">枫叶</span></li>
                  <li onclick="javascript:loadbg(4);"><?php if($_COOKIE['myhk_bg']=='4'):?><i class="fa fa-check-circle fa-2x checkit"></i><?php endif;?><i></i><img src="<?php echo TEMPLATE_URL; ?>images/bg/omp/4.jpg"><span class="text-ellipsis">诱惑</span></li>
                  <li onclick="javascript:loadbg(5);"><?php if($_COOKIE['myhk_bg']=='5'):?><i class="fa fa-check-circle fa-2x checkit"></i><?php endif;?><i></i><img src="<?php echo TEMPLATE_URL; ?>images/bg/omp/5.jpg"><span class="text-ellipsis">双档</span></li>
                  <li onclick="javascript:loadbg(6);"><?php if($_COOKIE['myhk_bg']=='6'):?><i class="fa fa-check-circle fa-2x checkit"></i><?php endif;?><i></i><img src="<?php echo TEMPLATE_URL; ?>images/bg/omp/6.jpg"><span class="text-ellipsis">古屋</span></li>
                  <li onclick="javascript:loadbg(7);"><?php if($_COOKIE['myhk_bg']=='7'):?><i class="fa fa-check-circle fa-2x checkit"></i><?php endif;?><i></i><img src="<?php echo TEMPLATE_URL; ?>images/bg/omp/7.jpg"><span class="text-ellipsis">冰境</span></li>
                  <li onclick="javascript:loadbg(8);"><?php if($_COOKIE['myhk_bg']=='8'):?><i class="fa fa-check-circle fa-2x checkit"></i><?php endif;?><i></i><img src="<?php echo TEMPLATE_URL; ?>images/bg/omp/8.jpg"><span class="text-ellipsis">电玩</span></li>
                  <li onclick="javascript:loadbg(9);"><?php if($_COOKIE['myhk_bg']=='9'):?><i class="fa fa-check-circle fa-2x checkit"></i><?php endif;?><i></i><img src="<?php echo TEMPLATE_URL; ?>images/bg/omp/9.jpg"><span class="text-ellipsis">伊人</span></li>
                  <li onclick="javascript:loadbg(10);"><?php if($_COOKIE['myhk_bg']=='10'):?><i class="fa fa-check-circle fa-2x checkit"></i><?php endif;?><i></i><img src="<?php echo TEMPLATE_URL; ?>images/bg/omp/10.jpg"><span class="text-ellipsis">雪情</span></li>
          </li>
              
                </ul>
            </div>
        </div>
<?php else: ?>
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
<div id="lmhblog">
    <header id="header">
<!--         <div class="box">
            <div class="text">
                <ul>
                    <?php global $CACHE;$newtws_cache = $CACHE->readCache('newtw');?><?php foreach($newtws_cache as $value): ?>
                        <li><a title="查看更多微言碎语" href="<?php echo BLOG_URL . 't/'; ?>"><i class="fa fa-twitter"></i> <?php echo date('Y年n月j日 - ',$value['date']);echo preg_replace('/\[F(([1-4]?[0-9])|50)\]/','',$value['t']);?></li></a>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div> -->
    </header>
<div id="wrapper">
    <div class="main_header">
        <div class="me_img">
            <div class="me_avatar">
                <?php if(_g('zhbi')==1):?><div class="header-v" title="<?php echo _g('zbjs');?>"></div><?php endif;?>
                <div class="overlay">
                    <a href="#" class="expand navbar-btn" onclick="return false;">Login</a>
                </div>
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
        <div class="bulletin">
            <div class="bulletin_list">
            <ul>
              <?php global $CACHE;$newtws_cache = $CACHE->readCache('newtw');?><?php foreach($newtws_cache as $value): ?>
                        <li><a style="color:#fff" title="查看更多微言碎语" href="<?php echo BLOG_URL . 't/'; ?>"><i class="fa fa-twitter"></i> <?php echo date('Y年n月j日 - ',$value['date']);echo preg_replace('/\[F(([1-4]?[0-9])|50)\]/','',$value['t']);?></li></a>
               <?php endforeach; ?>
            </ul>
        </div>
        </div>
        <div class="actions-menu">
            <a style="display:inline-block;margin-right:10px" class="layouts_width selected" href="#">
                <span></span>
                <span></span>
            </a>
            <a style="display:inline-block;margin-right:10px" class="layouts_box" href="#">
                <span style="margin-right:2px"></span>
                <span></span>
                <span style="margin-right:2px"></span>
                <span></span>
            </a>
        </div>
    </div>
<div id="container">
<div id="anitOut"></div>