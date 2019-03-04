<?php

if (!defined('EMLOG_ROOT')) {

    exit('error!');

}

?>

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

    <a href="#top" class="post-top"></a>

</div>

</div>
<div class="covers"></div>
<footer id="footer" role="contentinfo">

  <address>

      文章中出现的商标及图像版权属于其合法持有人，只供传递信息之用，非商务用途。互动交流时请遵守理性，宽容，换位思考的原则<div style="height:12px;"><br></div>

      <i class="fa fa-html5"></i> Copyright&nbsp;©&nbsp;<?php echo _g('webyear');?>-<?php echo date('Y',time())?>&nbsp;<div class="copyright">&nbsp;|&nbsp;勉强运行：<?php echo floor((time()-strtotime(""._g('webyear')."-"._g('webtime').""))/86400); ?>天&nbsp;|&nbsp;主题：<a href="https://www.biego.cn" title="污桐博客" target="_blank">OWL-Colorful 1.0</a>&nbsp;|&nbsp;<a rel="nofollow" href="http://www.emlog.net" title="Emlog <?php echo Option::EMLOG_VERSION;?>" target="_blank"><img src="<?php echo TEMPLATE_URL; ?>images/em.png" class="footer-icon">&nbsp;<?php echo Option::EMLOG_VERSION;?></a>&nbsp;驱动&nbsp;|&nbsp;<a href="https://tongji.baidu.com/web/welcome/ico?s=5e35be4e6240c876d1ad98cab0d58d8b" target="_blank">网站统计</a>&nbsp;|&nbsp;<?php echo "在线：".$users_online."人";?><?php if(_g('cnzz')==1):?><script src="https://s<?php echo rand(1, 100); ?>.cnzz.com/stat.php?id=<?php echo _g('cnzzid');?>&web_id=<?php echo _g('cnzzid');?>" language="JavaScript"></script><?php endif;?>&nbsp;|&nbsp;<?php doAction('index_footer'); ?>&nbsp &nbsp;&nbsp;<?php echo $footer_info; ?></div> <div style="height:8px;"><?php if(_g('ycsy')==1):?><br></div>



  网站部署于&nbsp;<a target="_blank" rel="nofollow" href="<?php echo _g('fwsdz');?>"><img style="top:1px;width:67px!important;height:21px!important;vertical-align:middle;margin:-4px 0 0 0" src="<?php echo _g('fwslogo'); ?>"/> </a> &nbsp;&nbsp;<a rel="nofollow" href="http://www.miibeian.gov.cn" target="_blank"><img src="<?php echo TEMPLATE_URL; ?>/images/icp.png"  class="footer-icon"/> <?php echo _g('icpba');?></a>&nbsp;&nbsp;<a target="_blank" rel="nofollow" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=<?php echo _g('gabanum');?>"><img src="<?php echo TEMPLATE_URL; ?>images/ga.png"  class="footer-icon"/> <?php echo _g('gaba');?></a><a id="_pinganTrust" target="_blank" href="http://c.trustutn.org/show?type=1&sn=201702161004522127"></a><?php endif;?>

  </address>
	<div id="cc-myssl-id" style="position: absolute;right: -15px;bottom: -29px;width: 65px;height: 65px;z-index: 99;">
      <a rel="nofollow" target="_blank" href="https://myssl.com/www.biego.cn?from=mysslid">
    	  <img src="https://static.myssl.com/res/images/myssl-id.png" alt="" style="width:55%;height:55%;border-bottom-right-radius:5px;">
      </a>
    </div>
</footer>

<script><?php if(_g('eqi')==1):?>eqi="ul:first";<?php else: ?>eqi="ul:first<?php for($i = 1; $i <= _g('eqi'); $i++) {echo ",ul:eq(".$i.")";}?>";<?php endif;?><?php if(_g('clsqkg')==1):?>blog="<?php echo _g('clsq');?>";<?php else: ?>blog="<?php echo $site_title; ?>";<?php endif;?>function pjaxfooter(){<?php echo _g('pjaxdm');?>}<?php if(_g('cnzz')==1):?>_czc.push(["_trackPageview",window.location.pathname,document.location.href]);<?php endif;?></script>



<div id="totop" class="totop"><i class="fa">&#61610;</i></div>

<?php if(_g('loading')==1):?>

<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/pace.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_URL; ?>style/pace.css" />

<div class="colorful_loading_frame"></div>

<?php elseif(_g('loading')==2): ?>

<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_URL; ?>style/load.css" />

<div class="colorful_loading_frame">

  <div class="colorful_loading"><i class="rect1"></i><i class="rect2"></i><i class="rect3"></i><i class="rect4"></i><i class="rect5"></i></div>

</div>
<?php else: ?>
<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_URL; ?>style/load2.css" />
	<div class="colorful_loading_frame">
	<div class="colorful_loading">
		<div class="loader_overlay">
		</div>
		<div class="loader_cogs">
			<div class="loader_cogs__top">
				<div class="top_part">
				</div>
				<div class="top_part">
				</div>
				<div class="top_part">
				</div>
				<div class="top_hole">
				</div>
			</div>
			<div class="loader_cogs__left">
				<div class="left_part">
				</div>
				<div class="left_part">
				</div>
				<div class="left_part">
				</div>
				<div class="left_hole">
				</div>
			</div>
			<div class="loader_cogs__bottom">
				<div class="bottom_part">
				</div>
				<div class="bottom_part">
				</div>
				<div class="bottom_part">
				</div>
				<div class="bottom_hole">
					<!--lol-->
				</div>
			</div>
			<p>
				loading
			</p>
		</div>
	</div>
</div>
<?php endif;?>
<?php if(_g('pgytx')==1):?>
<div class="dandelion">

    <span class="smalldan"></span>

    <span class="bigdan"></span>

</div>
<?php endif;?>
<div class="cd-user-modal login-modal m_hide">

    <a href="#" class="cd-close-form"></a>

    <div class="cd-user-modal-container">

        <div class="login-img" style="background-image: url('<?php echo TEMPLATE_URL; ?>images/slider01-2.jpg');"></div>

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

                <p class="login-submit">

                    <input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="登录">

                    <input type="hidden" name="redirect_to" value="/">

                </p>
                <p style="margin:20px 150px -10px"><?php doAction('qq_login_ext'); ?></p>
            </form>

        </div>

    </div>

</div>

<?php empty($_COOKIE['myhk_bg']) ? $bgimgsrc = TEMPLATE_URL . 'images/yj.jpg?v=new' : $bgimgsrc = TEMPLATE_URL . 'images/bg/' . $_COOKIE["myhk_bg"] . '.jpg' ;?>

<img class="bg-image" src="<?php echo $bgimgsrc; ?>" alt="污桐博客" /><div class="bg-image-pattern"></div>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/input.js"></script>

<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/realgravatar.js"></script>

<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>style/highslide/highslide.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_URL; ?>style/highslide/highslide.css?v=20141026" />

<?php if(_g('pjax')==1):?>

<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/pjax.min.js"></script>

<?php if(_g('index_hdp')==1):?>

<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/global-slider.js"></script>

<?php endif;?>

<?php else: ?>

<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/global.js"></script>

<?php endif;?>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?5e35be4e6240c876d1ad98cab0d58d8b";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<?php doAction('myhk_player'); ?>

<?php doAction('index_bodys'); ?>

<?php if(isset($_GET["music"])):?>

<script>setTimeout(function() {play(<?php echo $_GET["music"]; ?>);}, 5000)</script>

<?php endif;?>

</body></html>

<?php

if(_g('compress_html')=='open'){

    $html=ob_get_contents();

    ob_get_clean();

    echo em_compress_html_main($html);

}

?>