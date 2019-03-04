<?php
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<?php if($_COOKIE['myhk_sidebar']=='no'):?>
<style type="text/css">
#content {
	width: 98.2%;
	border-right: 0px
}
#sidebar {
	display: none
}
</style>
<?php endif;?>
<style type="text/css">
    #container {width: 100%;padding:0;}
</style>
<div id="content" role="main">
  <div class="page">
    <article role="article">
        <?php if(_g('rlys')==1):?>
            <div class="date-card">
                <span class="month"><?php echo date('m月',$value['date']); ?></span>
                <span class="day"><?php echo date('d',$value['date']); ?></span>
                <span class="week"><?php $weekarray=array("日","一","二","三","四","五","六");echo" 星期".$weekarray[gmdate('w', $value['date'])];?></span>
            </div>
        <?php else: ?>
            <div class="post-tool m_hide">
                <div class="post-date">
                    <span class="date-month"><?php echo date('m月',$value['date']); ?></span>
                    <span class="date-day"><?php echo date('d',$value['date']); ?></span>
                    <span class="date-year"><?php echo date('Y',$value['date']); ?></span>
                </div>
            </div>
        <?php endif;?>
      <header class="post-header">
        <h2><?php echo subString(strip_tags($log_title),0,50); ?></h2>
      </header>
      <address class="post-metaa">
      <i class="fa fa-home"></i><a href="<?php echo BLOG_URL;?>" title="返回首页"> 首页</a> &raquo; <i class="fa fa-folder-open-o"></i>
      <?php getBlogSort($logid);?>
      &raquo;
      <?php if($author == 1): ?>
      <?php else: ?>
      <?php endif; ?>
      <i class="fa fa-clock-o"></i>
          <?php mydate($date) ?> <?php editflg($logid,$author); ?> &raquo;
          <i class="fa fa-font"></i> 字数:<?php echo mb_strlen(strip_tags(str_replace("<br>","",$log_content)), 'UTF-8'); ?>个 &raquo; <?php echo logurl($logid);?>
	  <?php if(_g('tools')==1):?>
      <ul class="tools">
        <?php if(_g('tools1')==1):?><li title="发表吐槽" class="go-comment"><i class="fa fa-comment"></i></li><?php endif; ?>
        <?php if(_g('tools2')==1):?><a class="go-qrcode">
        <li title="用手机扫描二维码访问"><i class="fa fa-qrcode"></i></li>
        </a><?php endif; ?>
        <?php if(_g('tools3')==1):?>
		<?php share(); ?>
		<?php endif; ?>
        <?php if(_g('tools4')==1):?><li title="字号" class="size" onclick="size(this)">A</li><?php endif; ?>
        <?php if(_g('tools5')==1):?><li title="打开/关闭侧边栏" class="fullscreen">
          <?php if($_COOKIE['myhk_sidebar']=="no"){ echo '<i class="fa fa-reply"></i>'; }else{ echo  '<i class="fa fa-share"></i>'; } ?>
        </li><?php endif; ?>
		<div class="logbox">
        <ul>
        <p class="closebox"><span class="boxtitle"></span><a href="javascript:;" title="关闭"></a></p>
        <span class="boxpic"></span>
		<span class="wxpic"><img src="<?php echo _g('dswx');?>" style="width:300px;height:280px;margin-top:-10px"></span>
		<span class="qqpic"><img src="<?php echo _g('dsqq');?>" style="width:300px;height:280px;margin-top:-10px"></span>
		<span class="zfbpic"><img src="<?php echo _g('dszfb');?>" style="width:300px;height:280px;margin-top:-10px"></span>
        </ul>
        </div>
      </ul>
	  <?php endif; ?>
      </address>
	  <?php dashang(); ?>
      <div class="post-context">
        <?php if($top=='y'){echo "<div class='pgood'></div>";}else if(($value['comnum']>=1000)&&($value['views']>=50)){echo "<div class='pretie'></div>";};?>
        <?php echo article_index($log_content,$logid);?>
        <?php doAction('down_log',$logid); ?>
		<?php doAction('log_related', $logData); ?>
		<?php if(_g('dashang')==1):?>
		<div class="sy_shang"><a class="fenxiang" title="分享文章到各大社区">分享文章</a><a class="dashang" title="打赏作者，支持一下">打赏支持</a><span class="slzanpd" data-slzanpd="<?php echo $logData['logid'];?>"><i class="fa fa-heart-o"></i> <span class="myhk_zan_txt" title="喜欢这篇文章就赞一个吧！">求点赞</span><span class="myhk_zan_num"><?php echo(isset($logData['slzan'])?$logData['slzan']:getnum($logData['logid']));?></span></span></div>
		<?php endif; ?>
        <div class="post-lisence">
		  <div class="post-tags"><i class="fa fa-tags"></i> 本文标签：<?php blog_tag($logid);?></div>
          <i class="fa fa-bullhorn"></i> 版权声明：若无特殊注明，本文皆为《
          <?php blog_author($author); ?>
          》原创，转载请保留文章出处。</br>
          <i class="fa fa-share-alt-square"></i> 本文链接：<?php echo $log_title; ?> <?php echo Url::log($logid); ?></br>
          <i class="fa  fa-refresh"></i> 本作品采用<a rel="license" target="_blank" href="https://creativecommons.org/licenses/by/4.0/"><font color="#1E90FF"> 知识共享署名 4.0 国际许可协议 </font></a>进行许可。
      </div>
		<div class="cutline"><span>正文到此结束</span></div>
          <!-- 统计访客停留时间 -->
          <div id="tingliu"><span class="tingliu2 hint--top hint--bounce" data-hint="希望这篇文章能给你带来收获，去发表评论吧！？">
<img src="<?php echo TEMPLATE_URL; ?>images/tingliu.gif" class="tingliu5"></span> &nbsp;
              <span class="tingliu2">您阅读这篇文章共花了：</span>&nbsp;
              <span class="tingliu3" id="stime"></span></div>
          <script language="JavaScript">var ss=0,mm=0,hh=0;function TimeGo(){ss++;if(ss>=60){mm+=1;ss=0}if(mm>=60){hh+=1;mm=0}ss_str=(ss<10?"0"+ss:ss);mm_str=(mm<10?"0"+mm:mm);tMsg=""+hh+"小时"+mm_str+"分"+ss_str+"秒";document.getElementById("stime").innerHTML=tMsg;setTimeout("TimeGo()",1000)}TimeGo();</script>
          <!-- 统计访客停留时间结束 -->
        <div class="post-navigation">
          <?php neighbor_log($neighborLog); ?>
        </div>
      </div>
    </article>
	<?php if(_g('rmtj')==1):?>
    <?php $CACHE = Cache::getInstance();$sta_cache = $CACHE->readCache('sta');if($sta_cache['lognum']>=6):?>
    <div class="post-related">
      <h3><i class="fa fa-fire"></i> 热门推荐</h3>
      <ul>
        <?php $date = time() - 3600 * 24 * 360;$Log_Model = new Log_Model();$viewslogs = $Log_Model->getLogsForHome("AND date > {$date} ORDER BY views DESC,date DESC", 1, 6);?>
        <?php foreach($viewslogs as $value): ?>
        <li>
          <div class="thumb"><a href="<?php echo $value['log_url']; ?>" title="查看文章：<?php echo $value['log_title']; ?>">
            <?php
 $thum_src = getThumbnail($value['logid']);
 $imgFileArray = TEMPLATE_URL.'images/random/tb'.rand(1,40).'.jpg';
 if(!empty($thum_src)){ ?>
            <img src="<?php echo $thum_src; ?>" alt="<?php echo $value['log_title']; ?>" title="查看文章：<?php echo $value['log_title'] ?>" />
            <?php
 }else{
 ?>
            <img src="<?php echo $imgFileArray; ?>" alt="<?php echo $value['log_title']; ?>" title="查看文章：<?php echo $value['log_title'] ?>" />
            <?php
 }
 ?>
            </a></div>
          <div class="title"><a href="<?php echo $value['log_url']; ?>" title="查看文章：<?php echo $value['log_title']; ?>"><?php echo $value['log_title']; ?></a></div>
          <div class="modified">热门指数：
            <?php if($value['comnum']>70){ echo '<span class="five-star"></span>'; }else if($value['comnum']>50){ echo '<span class="four-star"></span>'; }else if($value['comnum']>30){ echo '<span class="three-star"></span>'; }else if($value['comnum']>10){ echo '<span class="two-star"></span>'; }else{ echo '<span class="one-star"></span>'; }; ?>
          </div>
        </li>
        <?php endforeach; ?>
      </ul>
      <div class="clear"></div>
      <div class="cutline"></div>
    </div>
	<?php endif;?>
    <?php else: ?>
    <?php endif;?>
    <div id="comments">
      <?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
	  <?php if($allow_remark=='n'){echo "<h3><i class='fa fa-frown-o'></i> 管理员已关闭本篇文章评论！</h3>";}else if(empty($comnum)){ echo "<br/><span class='nop'><i class='fa fa-pencil'></i> 既然没有吐槽，那就赶紧抢沙发吧！</span>";}else{echo"<h3><i class='fa fa-comments-o'></i> 已有";echo $comnum;echo"条吐槽</h3>";};?>
      <?php blog_comments($comments,$params); ?>
    </div>
  </div>
</div>
<?php
 include View::getView('side');
 include View::getView('footer');
?>
