<?php
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
?>
<style type="text/css">
#content {
  border-left: 0px;
  padding-right:0;
}
</style>
<div id="content">
  <div class="page">
    <article role="article">
      <header>
        <h2 class="post-name"><i class="fa fa-users"></i> <?php echo $log_title; ?></h2>
      </header>
      <address class="entry-meta">
      <i class="fa fa-home"></i><a href="<?php echo BLOG_URL;?>" title="返回首页">首页</a> &raquo; <i class="fa fa-file-text-o"></i><?php echo $log_title; ?> &raquo; <i class="fa fa-clock-o"></i>
      <?php mydate($date) ?>
      </address>
      <div class="post-context">

<div class="link-box">
<a href="https://movie.douban.com/subject/26634179/" target="_blank">
   <div class="thumb">
      <img src="<?php echo TEMPLATE_URL; ?>/images/movies/4.webp" alt="刀剑神域：序列之争">
   </div>
   <div class="content">
    <div class="title">
      <h3>刀剑神域：序列之争</h3>
    </div>
   </div>
</a>
<a href="https://movie.douban.com/subject/26670584/" target="_blank">
   <div class="thumb">
      <img src="<?php echo TEMPLATE_URL; ?>/images/movies/3.webp" alt="BLAME!">
   </div>
   <div class="content">
    <div class="title">
      <h3>BLAME!</h3>
    </div>
   </div>
</a>
<a href="https://movie.douban.com/subject/26826398/" target="_blank">
   <div class="thumb">
      <img src="<?php echo TEMPLATE_URL; ?>/images/movies/2.webp" alt="杀破狼 贪狼">
   </div>
   <div class="content">
    <div class="title">
      <h3>杀破狼 贪狼</h3>
    </div>
   </div>
</a>
<a href="https://movie.douban.com/subject/26363254/" target="_blank">
   <div class="thumb">
      <img src="<?php echo TEMPLATE_URL; ?>/images/movies/1.webp" alt="战狼2">
   </div>
   <div class="content">
    <div class="title">
      <h3>战狼2</h3>
    </div>
   </div>
</a>
<a href="https://movie.douban.com/subject/26718838/" target="_blank">
<div class="thumb">
<img src="<?php echo TEMPLATE_URL; ?>/images/movies/2.jpg" alt="异星觉醒">
</div>
<div class="content">
<div class="title">
<h3>异星觉醒</h3>
</div>
</div>
</a>
<a href="https://movie.douban.com/subject/26387939/" target="_blank">
<div class="thumb">
<img src="<?php echo TEMPLATE_URL; ?>/images/movies/3.jpg" alt="摔跤吧！爸爸">
</div>
<div class="content">
<div class="title">
<h3>摔跤吧！爸爸</h3>
</div>
</div>
</a>
<a href="https://movie.douban.com/subject/26412618/" target="_blank">
<div class="thumb">
<img src="<?php echo TEMPLATE_URL; ?>/images/movies/4.jpg" alt="六人晚餐">
</div>
<div class="content">
<div class="title">
<h3>六人晚餐</h3>
</div>
</div>
</a>
<a href="https://movie.douban.com/subject/25825412/" target="_blank">
<div class="thumb">
<img src="<?php echo TEMPLATE_URL; ?>/images/movies/5.jpg" alt="机械师2：复活">
</div>
<div class="content">
<div class="title">
<h3>机械师2：复活</h3>
</div>
</div>
</a>
<a href="https://movie.douban.com/subject/25726614/" target="_blank">
<div class="thumb">
<img src="<?php echo TEMPLATE_URL; ?>/images/movies/6.jpg" alt="神奇动物在哪里">
</div>
<div class="content">
<div class="title">
<h3>神奇动物在哪里</h3>
</div>
</div>
</a>
<a href="https://movie.douban.com/subject/26683290/" target="_blank">
<div class="thumb">
<img src="<?php echo TEMPLATE_URL; ?>/images/movies/7.jpg" alt="你的名字"></div>
<div class="content">
<div class="title">
<h3>你的名字</h3>
</div>
</div>
</a>
<a href="https://movie.douban.com/subject/3230115/" target="_blank">
<div class="thumb">
<img src="<?php echo TEMPLATE_URL; ?>/images/movies/8.jpg" alt="极限特工3：终极回归">
</div>
<div class="content">
<div class="title">
<h3>极限特工3：终极回归</h3>
</div>
</div>
</a>
<a href="https://movie.douban.com/subject/6873143/" target="_blank">
<div class="thumb">
<img src="<?php echo TEMPLATE_URL; ?>/images/movies/9.jpg" alt="一条狗的使命">
</div>
<div class="content">
<div class="title">
<h3>一条狗的使命</h3>
</div>
</div>
</a>
<a href="https://movie.douban.com/subject/25818101/" target="_blank">
<div class="thumb">
<img src="<?php echo TEMPLATE_URL; ?>/images/movies/1.jpg" alt="攻壳机动队">
</div>
<div class="content">
<div class="title">
<h3>攻壳机动队</h3>
</div>
</div>
</a>

</div>
          
      </div>
    </article>
    <div id="comments">
      <?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
      <?php if(empty($comnum)){ echo "";}else{echo"<h3><i class='fa fa-comments-o'></i>已有";echo $comnum;echo"条吐槽</h3>";} ?>
      <?php blog_comments($comments,$params); ?>
    </div>
  </div>
</div>
<?php 
include View::getView('side');
include View::getView('footer'); 
?>
