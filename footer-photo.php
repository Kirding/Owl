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
</div>
<footer id="footer" role="contentinfo">
  <address>
  文章中出现的商标及图像版权属于其合法持有人，只供传递信息之用，非商务用途。互动交流时请遵守理性，宽容，换位思考的原则。</br></br>
  <i class="fa fa-html5"></i> Copyright&nbsp;©&nbsp;2012-<?php echo date('Y',time())?>&nbsp;<?php echo $blogname; ?>
  <div class="copyright">&nbsp;|&nbsp;勉强运行：<?php echo floor((time()-strtotime(""._g('webtime').""))/86400); ?>天&nbsp;|&nbsp;<a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $icp; ?></a>&nbsp;|&nbsp;<?php echo $footer_info; ?>
    <?php doAction('index_footer'); ?>
    &nbsp;|&nbsp;自豪的采用 <a href="http://www.emlog.net" title="Emlog <?php echo Option::EMLOG_VERSION;?>" target="_blank">Emlog <?php echo Option::EMLOG_VERSION;?></a>&nbsp;驱动&nbsp;|&nbsp;<?php echo strtoupper(runtime_display()); ?>&nbsp;|&nbsp;主题：<a href="http://www.biego.cn" title="污桐客栈" target="_blank">Owl-Colorful</a></div>
  </address>
</footer>
</div>
<div class="colorful_loading_frame"></div><?php empty($_COOKIE['myhk_bg']) ? $bgimgsrc = TEMPLATE_URL . 'images/bg/' . rand(1, 8) . '.jpg' : $bgimgsrc = TEMPLATE_URL . 'images/bg/' . $_COOKIE["myhk_bg"] . '.jpg' ;?>
<img class="bg-image" src="<?php echo $bgimgsrc; ?>" /><div class="bg-image-pattern"></div>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/realgravatar.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>style/highslide/highslide.js?v=20150310"></script>
<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_URL; ?>style/highslide/highslide.css?v=20141026" />
</body></html>