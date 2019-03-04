<?php 
/**
* 侧边栏组件、页面模块
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
if (!function_exists('_g')) {
  emMsg('请先安装<a href="http://www.emlog.net/plugin/144" target="_blank">模板设置插件</a>', BLOG_URL . 'admin/plugins.php');
}
global $CACHE;$user_cache = $CACHE->readCache('user');$mail = $user_cache[1]['mail'];
  $DB = MySql::getInstance();
  $adminEmail = '"'.$user_cache[1]['mail'].'"';
  $adminEmail1 = '""';
  if($adminEmail==$adminEmail1){
	emMsg('请先设置<a href="../admin/blogger.php" target="_blank">管理员邮箱，用于Colorful模板评论识别管理员身份</a>', BLOG_URL . 'admin/blogger.php');
  }
?>
<?php
//试试手气代码
function rand_log() {
    $db = MySql::getInstance();
    $sql =         "SELECT gid,title,content FROM ".DB_PREFIX."blog WHERE type='blog' ORDER BY rand() LIMIT 0,1";
    $list = $db->query($sql);
    while($row = $db->fetch_array($list)){
        echo Url::log($row['gid']);
    }
}
?>
<?php //判断是否是首页
function blog_tool_ishome(){if (str_replace("?_pjax=%23lmhblog","",BLOG_URL . trim(Dispatcher::setPath(), '/')) == BLOG_URL){  return true; } else { return FALSE;}}?>
<?php
//首页幻灯片
function index_slide($type){
    $db = MySql::getInstance();
	$i=0;
	$show = '';
	$show .= '<div id="slider" class="carousel slide" data-ride="carousel"><ol class="carousel-indicators"><li data-target="#slider" data-slide-to="0" class="active"></li><li data-target="#slider" data-slide-to="1" class=""></li><li data-target="#slider" data-slide-to="2" class=""></li><li data-target="#slider" data-slide-to="3" class=""></li><li data-target="#slider" data-slide-to="4" class=""></li></ol><div class="carousel-inner">';
	//获取300天按点击率排行文章
	if($type==1){
		$time = time();
		$list = $db->query("SELECT gid,title,content FROM ".DB_PREFIX."blog WHERE type='blog' AND date > $time - 300*24*60*60 ORDER BY `views` DESC LIMIT 0,5");
		while($row = $db->fetch_array($list)){
			$i++;
			if($i==1){
				$s=' active';
			}else{
				$s='';
			}
			if(pic_thumb($row['content'])){
				$imgsrc = pic_thumb($row['content']);
			}else{
				$imgsrc = TEMPLATE_URL.'images/slide/slide-'.rand(1,5).'.jpg';
			}
			$show .= '<div class="item'.$s.'"><a href="'.Url::log($row['gid']).'"><img src="'.$imgsrc.'"><span class="carousel-caption">'. $row['title'].'</span><span class="carousel-bg"></span></a></div>';
		}
	}else
		//获取最新文章
		if($type==2){
			$list = $db->query("SELECT * FROM ".DB_PREFIX."blog WHERE hide='n' AND type='blog' AND top='n' order by date DESC limit 0,5");
			while($row = $db->fetch_array($list)){
				$i++;
				if($i==1){
					$s=' active';
				}else{
					$s='';
				}
				if(pic_thumb($row['content'])){
					$imgsrc = pic_thumb($row['content']);
				}else{
					$imgsrc = TEMPLATE_URL.'images/slide/slide-'.rand(1,5).'.jpg';
				}
				$show .= '<div class="item'.$s.'"><a href="'.Url::log($row['gid']).'"><img src="'.$imgsrc.'"><span class="carousel-caption">'. $row['title'].'</span><span class="carousel-bg"></span></a></div>';
			}
	}else
		//获取置顶文章
		if($type==3){
			$list = $db->query("SELECT gid,title,content,date FROM ".DB_PREFIX."blog WHERE type='blog' and top='y' ORDER BY `top` DESC ,`date` DESC LIMIT 0,5");
			while($row = $db->fetch_array($list)){
				$i++;
				if($i==1){
					$s=' active';
				}else{
					$s='';
				}
				if(pic_thumb($row['content'])){
					$imgsrc = pic_thumb($row['content']);
				}else{
					$imgsrc = TEMPLATE_URL.'images/slide/slide-'.rand(1,5).'.jpg';
				}
				$show .= '<div class="item'.$s.'"><a href="'.Url::log($row['gid']).'"><img src="'.$imgsrc.'"><span class="carousel-caption">'. $row['title'].'</span><span class="carousel-bg"></span></a></div>';
			}
	}else
		if($type==4){
		//模板后台自定义站内Pjax
		if(_g('custom1url_blank')==1){
			$custom1url_blank='target="_blank"';
		};
		if(_g('custom2url_blank')==1){
			$custom2url_blank='target="_blank"';
		};
		if(_g('custom3url_blank')==1){
			$custom3url_blank='target="_blank"';
		};
		if(_g('custom4url_blank')==1){
			$custom4url_blank='target="_blank"';
		};
		if(_g('custom5url_blank')==1){
			$custom5url_blank='target="_blank"';
		};
		$show .= '<div class="item active"><a '.$custom1url_blank.' href="'._g('custom1url').'"><img src="'._g('custom1img').'"><span class="carousel-caption">'._g('custom1name').'</span><span class="carousel-bg"></span></a></div>';
		$show .= '<div class="item"><a '.$custom2url_blank.' href="'._g('custom2url').'"><img src="'._g('custom2img').'"><span class="carousel-caption">'._g('custom2name').'</span><span class="carousel-bg"></span></a></div>';
		$show .= '<div class="item"><a '.$custom3url_blank.'  href="'._g('custom3url').'"><img src="'._g('custom3img').'"><span class="carousel-caption">'._g('custom3name').'</span><span class="carousel-bg"></span></a></div>';
		$show .= '<div class="item"><a '.$custom4url_blank.'  href="'._g('custom4url').'"><img src="'._g('custom4img').'"><span class="carousel-caption">'._g('custom4name').'</span><span class="carousel-bg"></span></a></div>';
		$show .= '<div class="item"><a '.$custom5url_blank.'  href="'._g('custom5url').'"><img src="'._g('custom5img').'"><span class="carousel-caption">'._g('custom5name').'</span><span class="carousel-bg"></span></a></div>';
	}
	$show .='</div><a class="left carousel-control" href="#slider" role="button" data-slide="prev"><span class="fa fa-angle-left" aria-hidden="true"></span></a><a class="right carousel-control" href="#slider" role="button" data-slide="next"><span class="fa fa-angle-right" aria-hidden="true"></span></a></div>';
	return $show;
}
?>
<?php
//获取评论用户操作系统、浏览器等信息
function useragent($info){
	require_once 'useragent.class.php';
	$useragent = UserAgentFactory::analyze($info);
?>

<img src='<?php echo TEMPLATE_URL.$useragent->platform['image']?>'>&nbsp;<?php echo $useragent->platform['title']; ?>&nbsp; <img src='<?php echo TEMPLATE_URL.$useragent->browser['image']?>'>&nbsp;<?php echo $useragent->browser['title']; ?>
<?php
}
?>
<?php 
if (!isset($_SERVER['REQUEST_TIME_FLOAT'])) {
	$_SERVER['REQUEST_TIME_FLOAT'] = microtime(TRUE);
}
function runtime_display() {
	echo '页面加载：'.str_replace('ms','毫秒',sprintf('%.2fms', (microtime(TRUE) - $_SERVER["REQUEST_TIME_FLOAT"]) * 1000));
}
?>
<?php
//404页面
function wcs_error_currentPageURL()
{
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80")
	{
		$pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
	}
	else
	{
		$pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
	}
	return $pageURL;
} ?>
<?php
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<?php
//获取IP地理地址
$data = '254.254.254.254';
class IpLocation {
     var $fp;
     var $firstip;
     var $lastip;
     var $totalip;
         
     function getlong() {
        $result = unpack('Vlong', fread($this->fp, 4));
        return $result['long'];
     }

    function getlong3() {
        $result = unpack('Vlong', fread($this->fp, 3).chr(0));
        return $result['long'];
     }

     function packip($ip) {
        return pack('N', intval(ip2long($ip)));
     }
         
     function getstring($data = "") {
        $char = fread($this->fp, 1);
        while (ord($char) > 0) {
            $data .= $char;
            $char = fread($this->fp, 1);
        }
        return $data;
     }
         
     function getarea() {
        $byte = fread($this->fp, 1);
        switch (ord($byte)) {
            case 0:
               $area = "";
               break;
            case 1:
            case 2:
               fseek($this->fp, $this->getlong3());
               $area = $this->getstring();
               break;
            default: 
               $area = $this->getstring($byte);
               break;
        }
        return $area;
        }
         
     function getlocation($ip) {
        
        if (!$this->fp) return null;
        $location['ip'] = gethostbyname($ip); 
        $ip = $this->packip($location['ip']);
        $l = 0; 
        $u = $this->totalip;
        $findip = $this->lastip;
        while ($l <= $u) { 
            $i = floor(($l + $u) / 2); 
            fseek($this->fp, $this->firstip + $i * 7);
            $beginip = strrev(fread($this->fp, 4));
            if ($ip < $beginip) {
               $u = $i - 1;
            }
            else {
               fseek($this->fp, $this->getlong3());
               $endip = strrev(fread($this->fp, 4));
               if ($ip > $endip) {
                   $l = $i + 1; 
               }
               else {
                   $findip = $this->firstip + $i * 7;
                   break;
               }
            }
        }
        fseek($this->fp, $findip);
        $location['beginip'] = long2ip($this->getlong()); 
        $offset = $this->getlong3();
        fseek($this->fp, $offset);
        $location['endip'] = long2ip($this->getlong());
        $byte = fread($this->fp, 1); 
        switch (ord($byte)) {
            case 1: 
               $countryOffset = $this->getlong3();
               fseek($this->fp, $countryOffset);
               $byte = fread($this->fp, 1);
               switch (ord($byte)) {
                   case 2: 
                      fseek($this->fp, $this->getlong3());
                      $location['country'] = $this->getstring();
                      fseek($this->fp, $countryOffset + 4);
                      $location['area'] = $this->getarea();
                      break;
                   default: 
                      $location['country'] = $this->getstring($byte);
                      $location['area'] = $this->getarea();
                      break;
               }
               break;
            case 2:
               fseek($this->fp, $this->getlong3());
               $location['country'] = $this->getstring();
               fseek($this->fp, $offset + 8);
               $location['area'] = $this->getarea();
               break;
            default: 
               $location['country'] = $this->getstring($byte);
               $location['area'] = $this->getarea();
               break;
        }
        if ($location['country'] == " CZNET") { 
            $location['country'] = "未知";
        }
        if ($location['area'] == " CZNET") {
            $location['area'] = "";
        }
        return $location;
     }
         
     function IpLocation($filename = "./content/templates/Owl/ip/qqwry.dat") {
        $this->fp = 0;
        if (($this->fp = @fopen($filename, 'rb')) !== false) {
            $this->firstip = $this->getlong();
            $this->lastip = $this->getlong();
            $this->totalip = ($this->lastip - $this->firstip) / 7;
            register_shutdown_function(array(&$this, '_IpLocation'));
        }
     }
         
     function _IpLocation() {
        if ($this->fp) {
            fclose($this->fp);
        }
        $this->fp = 0;
     }
}

function getaddress($myip){
$ipOrDomain=$myip;
$iplocation = new IpLocation();
$location = $iplocation->getlocation($ipOrDomain);
$address=mb_convert_encoding($location['country'].$location['area'], "utf-8", "gbk");
return $address;
}
?>
<?php
 //Custom: 获取附件第一张图片
function getThumbnail($blogid){
 $db = MySql::getInstance();
 $sql = "SELECT * FROM ".DB_PREFIX."attachment WHERE blogid=".$blogid." AND (`filepath` LIKE '%thum%') ORDER BY `aid` ASC LIMIT 0,1";
 //die($sql);
 $imgs = $db->query($sql);
 $img_path = "";
 while($row = $db->fetch_array($imgs)){
 $img_path .= BLOG_URL.substr($row['filepath'],3,strlen($row['filepath']));
 }
 return $img_path;
 }
 ?>
<?php
//时间
function mydate($date){
    if(gmdate('G', $date)>19)
		{echo gmdate('Y年n月j日晚上', $date);}
	elseif(gmdate('G', $date)>12)
		{echo gmdate('Y年n月j日下午', $date);}
	elseif(gmdate('G', $date)>10)
		{echo gmdate('Y年n月j日中午', $date);}
	elseif(gmdate('G', $date)>6)
		{echo gmdate('Y年n月j日上午', $date);}
	else{
		echo gmdate('Y年n月j日凌晨', $date);}
}
?>
<?php
//按分类获取列表
function index_tablist($sortid, $by, $num="8", $long="360") {
	$date = time() - 3600 * 24 * $long;
	$sort_sql = 'and sortid='.$sortid;
	if($sortid == '')$sort_sql = '';
    if($by=="new"){
        $order = 'ORDER BY date DESC, date DESC';
    }elseif($by=="hot"){
        $order = 'AND date > '.$date.' ORDER BY comnum DESC, date DESC';
    }elseif($by=='view'){
    	$order = 'AND date > '.$date.' ORDER BY views DESC, date DESC';
    }elseif($by=='rand'){
    	$order = 'ORDER BY rand()';
    }else{
        $order = 'AND top=\'y\' ORDER BY  date DESC';
    }
    $db=MySql::getInstance();
    $logs = $db->query("SELECT gid ,title FROM " . DB_PREFIX . "blog WHERE hide='n' and type='blog' $sort_sql $order LIMIT 0, $num");
    while ($row = $db->fetch_array($logs)){
        $row['title'] = htmlspecialchars($row['title']);
		$i;{
     ?>
<li>
  <?php if($i==0){?>
  <em class="hotone"><?php echo ++$i;?></em>
  <?php }else if($i==2){ ?>
  <em class="hottwo"><?php echo $i;?></em>
  <?php }else if($i==3){ ?>
  <em class="hotthree"><?php echo $i;?></em>
  <?php }else{ ?>
  <em class="hotSoSo"><?php echo $i;?></em>
  <?php }?>
  <a title="<?php echo $row['title']; ?>" href="<?php echo Url::log($row['gid']); ?>"> <?php echo $row['title']; ?></a> </li>
<?php $i++;
     }  ?>
<?php } ?>
<?php }?>
<?php
//文章内容
function content($log_content,$logid) {
	$log_content = preg_replace("/\[F(([1-4]?[0-9])|50)\]/",'<img class="face" alt="face" src="'.TEMPLATE_URL.'images/face/$1.png"  />',$log_content);
	$pluginurl = "images/player.swf";
	$log_content = preg_replace("|\[mp3\]|i",'<object type="application/x-shockwave-flash" data="'.TEMPLATE_URL.''.$pluginurl.'?mp3=',$log_content);
	$log_content = preg_replace("|\[\/mp3\]|i",'&autoplay=0&autoreplay=0" width="240" height="21"></object>',$log_content);
	$log_content = preg_replace("|\[audio\]|i",' <audio src="',$log_content);
	$log_content = preg_replace("|\[\/audio\]|i",'" controls="controls"></audio>',$log_content);
	$log_content = preg_replace("|\[video\]|i",' <video src="',$log_content);
	$log_content = preg_replace("|\[\/video\]|i",'"></video>',$log_content);
	$log_content = preg_replace("|\[red\]|i",' <div class="red">',$log_content);
	$log_content = preg_replace("|\[\/red\]|i",'</div>',$log_content);
	$log_content = preg_replace("|\[blue\]|i",' <div class="blue">',$log_content);
	$log_content = preg_replace("|\[\/blue\]|i",'</div>',$log_content);
	$log_content = preg_replace("|\[green\]|i",' <div class="green">',$log_content);
	$log_content = preg_replace("|\[\/green\]|i",'</div>',$log_content);
	$log_content = preg_replace("|\[yellow\]|i",' <div class="yellow">',$log_content);
	$log_content = preg_replace("|\[\/yellow\]|i",'</div>',$log_content);
	$log_content = preg_replace("|\[button\]|i",' <div class="button">',$log_content);
	$log_content = preg_replace("|\[\/button\]|i",'</div>',$log_content);
	$log_content = preg_replace("|\[gray\]|i",' <div class="gray">',$log_content);
	$log_content = preg_replace("|\[\/gray\]|i",'</div>',$log_content);
	$log_content = preg_replace("|\[liebiao\]|i",' <div class="liebiao">',$log_content);
	$log_content = preg_replace("|\[\/liebiao\]|i",'</div>',$log_content);
	$log_content = preg_replace("|\[quote\]|i",' <blockquote>',$log_content);
	$log_content = preg_replace("|\[\/quote\]|i",'</blockquote>',$log_content);
	$log_content = preg_replace("|\[pre\]|i",' <pre>',$log_content);
	$log_content = preg_replace("|\[\/pre\]|i",'</pre>',$log_content);
	$log_content = preg_replace("|\[code\]|i",' <code>',$log_content);
	$log_content = preg_replace("|\[\/code\]|i",'</code>',$log_content);
	$log_content = preg_replace("|\[h4\]|i",' <h4>',$log_content);
	$log_content = preg_replace("|\[\/h4\]|i",'</h4>',$log_content);
	$log_content = preg_replace('/(<meta name="description" content=")(.*)(<embed.*<\/embed>)(.*)(" \/>)/', '\1\2\4\5\6', $log_content);
	//if($_COOKIE["myhkhide".$logid]=="yes" || ROLE == "admin"){
		//$log_content = preg_replace("/\[hide\](.*)\[\/hide\]/Uims", '<div class="hidecss">\1</div>', $log_content);
	//}else{
		//$log_content = preg_replace("/\[hide\](.*)\[\/hide\]/Uims", '<div class="hidecss">此处内容已隐藏，<a //href="#comment-post">吐槽一下</a>才能查看！</div>', $log_content);
	//}
	echo $log_content;
}
?>
<?php
//图片链接
function pic_thumb($content){
    preg_match_all("|<img[^>]+src=\"([^>\"]+)\"?[^>]*>|is", $content, $img);
    $imgsrc = !empty($img[1]) ? $img[1][0] : '';
	if($imgsrc):
		return $imgsrc;
	endif;
}
?>
<?php
//LOGO头像调用QQ缓存
function myhk_qq($qq) {
	$a = TEMPLATE_URL.'qqlogo/'.$qq.'.jpg';
	$e = EMLOG_ROOT.'/content/templates/Owl/qqlogo/'.$qq.'.jpg';
	$t = 1296000;
	if (empty($qq)) $a = TEMPLATE_URL.'qqlogo/default.jpg';
	if (!is_file($e) || (time() - filemtime($e)) > $t ) {
	$g = 'https://q1.qlogo.cn/g?b=qq&nk='.$qq.'&s=100';
	copy($g,$e); $a=$g;
    }
	return $a;
}?>
<?php
//avatar缓存
function BYSB_getGravatar($email, $s = 44, $d = 'wavatar', $r = 'g') {

    if (empty($email)) {
        return TEMPLATE_URL.'gravatar/default.jpg';
    }
    $f = md5($email);
    $emailArr = explode("@",$email);
    $n = $emailArr[0];
    if(preg_match("/^\d*$/",$n)){
        $t = 1296000;
        if (!empty($n)|| (time() - filemtime($e)) > $t ) {
            $m = TEMPLATE_URL.'gravatar/qq/'.$n.'.jpg';
            $p = EMLOG_ROOT.'/content/templates/Owl/gravatar/qq/'.$n.'.jpg';
            if (!is_file($p)) {
                $q = "https://q1.qlogo.cn/g?b=qq&nk=".$n."&s=100";
                copy($q,$p);$m = $q;
            }
            return $m;
        }
    }else{
        $a = TEMPLATE_URL.'gravatar/'.$f.'.jpg';
        $e = EMLOG_ROOT.'/content/templates/Owl/gravatar/'.$f.'.jpg';
        $t = 1296000;
        if (empty($email)) $a = TEMPLATE_URL.'gravatar/default.jpg';
        if (!is_file($e) || (time() - filemtime($e)) > $t ) {
            $g = sprintf("http://secure.gravatar.com",
                    (hexdec($f{0})%2)).'/avatar/'.$f.'?s='.$s.'&d='.$d.'&r='.$r;
            copy($g,$e); $a=$g;
        }
        if (filesize($e) < 500) copy($d,$e);
        return $a;
    }
}?>
<?php
//获取分类名
function getBlogSort($blogid){
	global $CACHE; 
	$log_cache_sort = $CACHE->readCache('logsort');
	?>
<?php if(!empty($log_cache_sort[$blogid])): ?>
<a href="<?php echo Url::sort($log_cache_sort[$blogid]['id']); ?>" title="查看分类“<?php echo $log_cache_sort[$blogid]['name']; ?>”下的内容"><?php echo $log_cache_sort[$blogid]['name']; ?></a>
<?php else: ?>
<?php echo "未分类"; ?>
<?php endif;?>
<?php }?>
<?php
//文章分类
function topsorts(){global $CACHE;$sort_cache = $CACHE->readCache('sort'); ?>
<ul class="sub-menu" style="left:8px">
  <?php foreach($sort_cache as $value):if ($value['pid'] != 0) continue;?>
  <?php if (empty($value['children'])): ?>
  <li><a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?></a></li>
  <?php else: ?>
  <li class="dropdown"> <a class="catbtn" href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?></a>
    <ul class="sub-menu" style="display: none;">
      <?php $children = $value['children'];foreach ($children as $key):$value = $sort_cache[$key];?>
      <li><a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?></a></li>
      <?php endforeach; ?>
    </ul>
  </li>
  <?php endif; ?>
  <?php endforeach; ?>
</ul>
<?php }?>
<?php
//comment：输出等级
function echo_levels($comment_author_email){
global $CACHE;$user_cache = $CACHE->readCache('user');$mail = $user_cache[1]['mail'];
  $DB = MySql::getInstance();
  $adminEmail = '"'.$user_cache[1]['mail'].'"';
  $adminEmail1 = '""';
  if($adminEmail==$adminEmail1){
	emMsg('请先设置<a href="../admin/blogger.php" target="_blank">管理员邮箱</a>', BLOG_URL . 'admin/blogger.php');
  }
  if($comment_author_email==$adminEmail)
  { echo '<a class="admin" title="博客管理员"><img src="../content/templates/Owl/images/admin.png"></a>';}
  $sql = "SELECT cid as author_count FROM ".DB_PREFIX."comment WHERE mail = ".$comment_author_email;
  $res = $DB->query($sql);
  $author_count = mysql_num_rows($res);
  if($author_count>=1 && $author_count<10 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv1" title="访客等级 LV.1"></a>';
  else if($author_count>=10 && $author_count<20 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv2" title="访客等级 LV.2"></a>';
  else if($author_count>=20 && $author_count<30 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv3" title="访客等级 LV.3"></a>';
  else if($author_count>=30 && $author_count<40 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv4" title="访客等级 LV.4"></a>';
  else if($author_count>=40 && $author_count<50 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv5" title="访客等级 LV.5"></a>';
  else if($author_count>=50 && $author_count<60 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv6" title="访客等级 LV.6"></a>';
  else if($author_count>=60 && $author_count<70 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv7" title="访客等级 LV.7"></a>';
  else if($author_count>=70 && $author_count<80 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv8" title="访客等级 LV.8"></a>';
  else if($author_count>=80 && $author_count<90 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv9" title="访客等级 LV.9"></a>';
  else if($author_count>=90 && $author_count<100 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv10" title="访客等级 LV.10"></a>';
  else if($author_count>=100 && $author_count<125 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv11" title="访客等级 LV.11"></a>';
  else if($author_count>=125 && $author_count<150 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv12" title="访客等级 LV.12"></a>';
  else if($author_count>=150 && $author_count<175 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv13" title="访客等级 LV.13"></a>';
  else if($author_count>=175 && $author_count<200 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv14" title="访客等级 LV.14"></a>';
  else if($author_count>=200 && $author_count<225 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv15" title="访客等级 LV.15"></a>';
  else if($author_count>=225 && $author_count<250 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv16" title="访客等级 LV.16"></a>';
  else if($author_count>=250 && $author_count<275 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv17" title="访客等级 LV.17"></a>';
  else if($author_count>=275 && $author_count<300 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv18" title="访客等级 LV.18"></a>';
  else if($author_count>=200 && $author_count<250 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv19" title="访客等级 LV.19"></a>';
  else if($author_count>=250 && $author_count<88888 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv20" title="访客等级 LV.20"></a>';
  else if($comment_author_email==$adminEmail1)
    echo '<div class="lvnull" title="访客等级 LV.1"><i class="fa fa-user"></i></div>';
}
?>
<?php
//文章分享
function share() {
	echo '
<li title="分享文章" class="open"><i class="fa fa-share-alt"></i></li>
<div class="Share">
	<ul>
		<p class="close"><i class="fa fa-share-alt-square"></i> 分享到各大社区<a href="javascript:;" title="关闭"></a></p>
		<li title="分享到QQ空间"><a class="share1"></a></li>
		<li title="分享到新浪微博"><a class="share2"></a></li>
		<li title="打开微信，点击底部的“发现”，使用“扫一扫”即可将网页分享至朋友圈"><a class="share3"></a></li>
		<li title="分享到QQ"><a class="share4"></a></li>
		<li title="分享到腾讯微博"><a class="share5"></a></li>
		<li title="分享到开心网"><a class="share6"></a></li>
	</ul>
</div>
';
} ?>
<?php
//文章分享
function dashang() {
	echo '
<div id="dashang">
	<ul>
		<p class="close"><i class="fa fa-yen"></i> 选择打赏方式<a href="javascript:;" title="关闭"></a></p>
		<li title="打开微信，点击右上角“加号”，使用“扫一扫”打赏"><a class="wx"></a></li>
		<li title="打开QQ，点击右上角“加号”，使用“扫一扫”打赏"><a class="qq"></a></li>
		<li title="打开支付宝，点击右上角“加号”，使用“扫一扫”打赏""><a class="zfb"></a></li>
	</ul>
</div>
';
} ?>
<?php
//widget：读书墙
function widget_search($title){global $CACHE;$user_cache = $CACHE->readCache('user');$name = $user_cache[1]['name'];?>
<div class="widget">
    <span><h5>
    <?php if($title=="个人资料") {echo '吐槽水军';}else {echo $title;} ?>
  </h5></span>
  <ul id="readerwall">
    <li>
      <?php
	$DB = MySql :: getInstance();
	$sql = "SELECT count(*) AS comment_nums,poster,mail,url FROM ".DB_PREFIX."comment where date >0 and poster !='". $name ."' and  poster !='' and hide ='n' group by poster order by comment_nums DESC limit 0,20";
	$log_content = $content[1];
	if(strpos($log_content, '[READERWALL-WEEK]') > -1) {
		$cur_time_span = strtotime('last Year',strtotime('Sunday'));
		}
	$result = $DB -> query( $sql );
	while( $row = $DB -> fetch_array( $result ) )
	{
	 $img = "<a rel=\"external nofollow\" target=\"_blank\" href=\"" . $row[ 'url' ] . "\" title=\"" . $row[ 'poster' ] ."(吐槽" . $row[ 'comment_nums' ] . "次)<br>" . $row[ 'url' ] . "\"><img  alt=\"\"  src=\"" . BYSB_getGravatar($row['mail'],40) . "\" class=\"avatar\"></a>";
	 if( $row[ 'url' ] )
	{$tmp = "<a rel=\"external nofollow\" target=\"_blank\" href=\"" . $row[ 'url' ] . "\" title=\"" . $row[ 'poster' ] ."(吐槽" . $row[ 'comment_nums' ] . "次)<br>" . $row[ 'url' ] . "\"><img  alt=\"\"  src=\"" . BYSB_getGravatar($row['mail'],40) . "\" class=\"avatar\"></a>";
	}
	else
	{$tmp = $img;}
	$output .= $tmp;
	}
     $output = ' '. $output .' ';
	 echo $output ;
	 ?>
    </li>
  </ul>
</div>
<?php }?>
<?php
//widget：侧边搜索
function widget_s($title){ ?>
<div class="widget"> <span class="searchicon"><i class="fa fa-search"></i></span>
  <div class="search">
    <form>
      <input type="text" value="输入关键字自动全文搜索..." onkeydown="if(event.keyCode==13){event.returnValue=false;}" required="required" />
      <div class="result">
        <h2>搜索“<span></span>”的结果</h2>
        <div></div>
      </div>
      <button type="reset"></button>
    </form>
  </div>
  <div class="clear"></div>
</div>
<?php } ?>
<?php
//widget：个人介绍
function widget_blogger($title){ ?>
<div class="widget">
    <p class="me_content"><?php echo _g('grjj');?></p>
    <div class="social_link">
        <ul>
            <li><a rel="nofollow" title="新浪微博：@<?php echo _g('weiboid');?>" href="<?php echo _g('weibodz');?>" target="_blank"><i class="fa fa-weibo"></i></a></li>
            <li> <a rel="nofollow" title="QQ：<?php echo _g('qqhao');?>"><i class="fa fa-qq"></i></a></li>
            <li><a class="wechat" rel="nofollow" title="点击查看微信二维码" href="<?php echo _g('weixin');?>" target="_blank"><i class="fa fa-wechat"></i></a></li>
            <li><a rel="nofollow" title="Github" href="<?php echo _g('github');?>" target="_blank"><i class="fa fa-github"></i></a></li>
            <li class="m-sch"> <a class="rss" rel="nofollow" title="RSS订阅" href="<?php echo BLOG_URL; ?>rss.php" target="_blank"><i class="fa fa-rss"></i></a> </li>
        </ul>
    </div>
</div>
<?php } ?>
<?php
//widget：侧边日历
function widget_calendar($title){ ?>
<div class="widget">
    <span><h5><?php echo $title; ?></h5></span>
  <ul id="calendar">
  </ul>
  <script>sendinfo('<?php echo BLOG_URL; ?>?action=cal','calendar');</script>
</div>
<?php }?>
<?php
//widget：彩色标签
function widget_tag($title){global $CACHE;$tag_cache = $CACHE->readCache('tags');?>
<div class="widget">
    <span><h5><?php echo $title; ?></h5></span>
  <ul id="blogtags">
    <li>
      <?php shuffle ($tag_cache);
		$tag_cache = array_slice($tag_cache,0,28);foreach($tag_cache as $value):?>
      <a href="<?php echo Url::tag($value['tagurl']); ?>" title="<?php echo $value['usenum']; ?>篇文章">
      <?php if(empty($value['tagname'])){ echo "无标签";}else{echo $value['tagname'];}?>
      </a>
      <?php endforeach; ?>
    </li>
  </ul>
</div>
<?php }?>
<?php
//widget：分类
function widget_sort($title){global $CACHE;$sort_cache = $CACHE->readCache('sort'); ?>
<div class="widget">
    <span><h5><?php echo $title; ?></h5></span>
  <ul id="blogsort">
    <?php foreach($sort_cache as $value):if ($value['pid'] != 0) continue;?>
    <li> <i class="icon-aperture"></i><a title="<?php if(empty($value['lognum'])){ echo "还没写文章";}else{echo $value['lognum']."篇文章";}?>" href="<?php echo Url::sort($value['sid']); ?>" href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?></a>
      <?php if (!empty($value['children'])): ?>
      (
      <?php $children = $value['children'];foreach ($children as $key):$value = $sort_cache[$key];?>
      <div> <a title="<?php if(empty($value['lognum'])){ echo "还没写文章";}else{echo $value['lognum']."篇文章";}?>" href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?></a> </div>
      <?php endforeach; ?>
      )
      <?php endif; ?>
    </li>
    <?php endforeach; ?>
  </ul>
</div>
<?php }?>
<?php
//widget：归档
function widget_archive($title){global $CACHE; $record_cache = $CACHE->readCache('record');?>
<div class="widget">
    <span><h5><?php echo $title; ?></h5></span>
  <ul id="record">
    <?php foreach($record_cache as $value): ?>
    <li> <i class="fa fa-clock-o"></i><a href="<?php echo Url::record($value['date']); ?>"><?php echo $value['record']; ?>(<?php echo $value['lognum']; ?>)</a> </li>
    <?php endforeach; ?>
  </ul>
</div>
<?php } ?>
<?php
function httpcode($url){
$ch = curl_init();
$timeout = 3;
curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
curl_setopt($ch,CURLOPT_URL,$url);
curl_exec($ch);
return $httpcode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
curl_close($ch);
}?>
<?php
function favicon_file($site_url){
$diy_fav = $site_url."/favicon.ico";
$diy_fav1 = $site_url."/content/templates/Owl/images/favicon.ico";
$diy_fav2 = $site_url."/images/favicon.ico";
$site_md5 = md5($site_url);
$fav_url = TEMPLATE_URL.'favicon/';
$fav_path = TEMPLATE_PATH.'favicon/';
$t = 2592000;
if(is_file($fav_path.$site_md5.'.png') == false  || (time() - filemtime($fav_path.$site_md5.'.png')) > $t) {
   if(httpcode($diy_fav) == 200){copy($diy_fav,$fav_path.$site_md5.'.png');}else if(httpcode($diy_fav1) == 200){copy($diy_fav1,$fav_path.$site_md5.'.png');}else if(httpcode($diy_fav2) == 200){copy($diy_fav2,$fav_path.$site_md5.'.png');}else{
    copy($fav_path.'default.png',$fav_path.$site_md5.'.png');
    }
}else{$endurl = $fav_url.$site_md5.'.png';}
return $endurl;
}?>
<?php
//widget：友情链接
function widget_link($title){global $CACHE; $link_cache = $CACHE->readCache('link');?>
<div class="widget">
    <span><h5><?php echo $title; ?></h5></span>
  <ul id="link">
    <?php foreach($link_cache as $value): ?>
    <li><?php if(_g('yqlj')==1):?><img src="<?php echo favicon_file($value['url']); ?>"  class="link-icon"/><?php else: ?><i class="fa fa-link"></i><?php endif;?><a rel="friend" href="<?php echo $value['url']; ?>" title="<?php if(empty($value['des'])){ echo $value['link'];}else{echo $value['des'];} ?>" target="_blank"><?php echo $value['link']; ?></a> </li>
    <?php endforeach; ?>
  </ul>
</div>
<?php }?>
<?php
//评论天使
function starer(){
global $CACHE;$user_cache = $CACHE->readCache('user');$name = $user_cache[1]['name'];$DB = MySql :: getInstance();$time_side = strtotime('this month',strtotime(date('m/01/y')));$sql = "SELECT count(*) AS comment_nums,poster,mail,url FROM ".DB_PREFIX."comment where date > $time_side and poster != '".$name."' and hide ='n' group by mail order by comment_nums DESC limit 0,1";$result = $DB -> query( $sql );while( $row = $DB -> fetch_array( $result ) ){$img="<a rel=\"external nofollow\" target=\"_blank\" href=\"" . $row[ 'url' ] . "\" title=\"评论天使赐教" . $row[ 'comment_nums' ] . "次\">".$row[ 'poster' ]."</a>";if( $row[ 'url' ] ){$tmp="<a rel=\"external nofollow\" target=\"_blank\" href=\"" . $row[ 'url' ] . "\" title=\"评论天使赐教" . $row[ 'comment_nums' ] . "次\">".$row[ 'poster' ]."</a>";}else{$tmp = $img;}$output .= $tmp;}$output = ''. $output .'';echo $output ;
}
?>
<?php
//widget：站点统计
function widget_twitter($title){global $CACHE;$user_cache = $CACHE->readCache('user');$name = $user_cache[1]['name'];$sta_cache = Cache::getInstance()->readCache('sta');?>
<div class="widget">
    <span><h5>
    <?php if($title=="最新微语") {echo '站点统计';}else {echo $title;} ?>
  </h5></span>
  <ul id="statistics">
    <li><i class="icon-radio-checked"></i>文章数量：<?php echo $sta_cache['lognum'];?>篇</li>
    <li><i class="icon-radio-checked"></i>吐槽数量：<?php echo $sta_cache['comnum_all'];?>次</li>
    <li><i class="icon-radio-checked"></i>诞生日期：2012年5月18号</li>
    <li><i class="icon-radio-checked"></i>勉强存活：<?php echo floor((time()-strtotime("2012-5-18"))/86400); ?>天</li>
    <li><i class="icon-radio-checked"></i>评论天使：<i class="icon-star"></i>
      <?php starer();?>
    </li>
  </ul>
</div>
<?php }?>
<?php
//widget：最新评论
function widget_newcomm($title){global $CACHE;$user_cache = $CACHE->readCache('user');$name = $user_cache[1]['name'];$com_cache = $CACHE->readCache('comment');
$patterns = array ("/\[url\](.*?)\[\/url\]/","/\[qq\]([0-9]+)\[\/qq\]/","/\[img=?\]*(.*?)(\[\/img)?\]/e","/\[strong\](.*?)\[\/strong\]/","/\[em\](.*?)\[\/em\]/","/\[del\](.*?)\[\/del\]/","/\[blockquote\](.*?)\[\/blockquote\]/","/\[u\](.*?)\[\/u\]/","/\[code\](.*?)\[\/code\]/","/\[F(([1-4]?[0-9])|50)\]/"); 
$replace = array ('$1 ','<img src="http://wpa.qq.com/pa?p=1:$1:52" alt="点击这里给我发消息" />','"<img class=\"comment-img\" src=\"$1\" alt=\"" . basename("$1") . "\" />"','<b>$1</b>','$1','<del>$1</del>','$1','<u>$1</u>','<code>$1</code>','<img alt="face" class="face1" src="'.TEMPLATE_URL.'images/face/$1.png"  />'); 
?>
<div class="widget">
    <span><h5><?php echo $title; ?></h5></span>
  <ul id="newcomment">
    <?php foreach($com_cache as $value):$url = Url::comment($value['gid'], $value['page'], $value['cid']);?>
    <?php if($value['name']!=$name):?>
    <li> <img alt="avatar" class="avatar" src="<?php echo BYSB_getGravatar($value['mail'],40)?>"/>
      <p class="name"><?php echo $value['name']; ?></p>
      <p class="time"><i class="fa fa-clock-o"></i> <?php echo date('Y年m月d日',$value['date']); ?></p>
      <p class="content"><a title="查看来自《<?php com_tt($value['gid']);?>》的评论" href="<?php echo $url; ?>"><?php echo preg_replace($patterns, $replace,$value['content']); ?></a>
        <myhk></myhk>
      </p>
    </li>
    <?php else: ?>
    <?php endif;?>
    <?php endforeach; ?>
  </ul>
</div>
<?php }?>
<?php
//widget：最新文章、热门文章、手气不错
function widget_newlog($title){global $CACHE; $newLogs_cache = $CACHE->readCache('newlog');?>
<div class="widget">
  <div class="tab_nav" id="J_setTabBNav">
    <ul>
      <li><i class="fa fa-paint-brush"></i>最新</li>
      <li><i class="fa fa-fire"></i>热门推荐</li>
      <li style="border-right:0"><i class="fa fa-angellist"></i>手气不错</li>
    </ul>
    <div class="clear"></div>
  </div>
  <div class="tab_box" id="J_setTabBBox">
    <div>
      <ul>
        <?php index_tablist('', 'new', $num="8");  ?>
      </ul>
      <!--最新文章--></div>
    <div>
      <ul>
        <?php index_tablist('', 'view', $num="8"); ?>
      </ul>
      <!--热门文章--></div>
    <div>
      <ul>
        <?php index_tablist('', 'rand', $num="8"); ?>
      </ul>
      <!--手气不错--></div>
  </div>
</div>
<?php }?>
<?php
//widget：热门文章
function widget_hotlog($title){$index_hotlognum = Option::get('index_hotlognum');$Log_Model = new Log_Model();$randLogs = $Log_Model->getHotLog($index_hotlognum);?>
<div class="widget">
    <span><h5><?php echo $title; ?></h5></span>
  <ul id="hotlog">
    <?php $i=1;foreach($randLogs as $value){?>
    <li>
      <?php if($i==1){?>
      <em class="hotone"><?php echo $i;?></em>
      <?php }else if($i==2){ ?>
      <em class="hottwo"><?php echo $i;?></em>
      <?php }else if($i==3){ ?>
      <em class="hotthree"><?php echo $i;?></em>
      <?php }else{ ?>
      <em class="hotSoSo"><?php echo $i;?></em>
      <?php }?>
      <a title="<?php echo $value['title']; ?>" href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a> </li>
    <?php $i++; } ?>
  </ul>
</div>
<?php }?>
<?php
//widget：随机文章
function widget_random_log($title){$index_randlognum = Option::get('index_randlognum');$Log_Model = new Log_Model();$randLogs = $Log_Model->getRandLog($index_randlognum);?>
<div class="widget">
    <span><h5><?php echo $title; ?></h5></span>
  <ul id="randlog">
    <?php $i=1;foreach($randLogs as $value){?>
    <li>
      <?php if($i==1){?>
      <em class="hotone"><?php echo $i;?></em>
      <?php }else if($i==2){ ?>
      <em class="hottwo"><?php echo $i;?></em>
      <?php }else if($i==3){ ?>
      <em class="hotthree"><?php echo $i;?></em>
      <?php }else{ ?>
      <em class="hotSoSo"><?php echo $i;?></em>
      <?php }?>
      <a title="<?php echo $value['title']; ?>" href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a> </li>
    <?php $i++; } ?>
  </ul>
</div>
<?php }?>
<?php
//widget：自定义
function widget_custom_text($title, $content){ ?>
<div class="widget">
    <span><h5><?php echo $title; ?></h5></span>
  <ul>
    <?php echo $content; ?>
  </ul>
</div>
<?php } ?>
<?php
//blog：导航
function blog_navi(){
	global $CACHE;
	$navi_cache = $CACHE->readCache('navi');$i=0;
	?>
<?php foreach($navi_cache as $value):$i++;if($i>=5)break;if($value['url'] == ROLE_ADMIN && (ROLE == ROLE_ADMIN || ROLE == ROLE_WRITER)):?>
<?php continue;endif;$newtab = $value['newtab'] == 'y' ? 'target="_blank"' : ''; $value['url'] = $value['isdefault'] == 'y' ? BLOG_URL . $value['url'] : trim($value['url'], '/');$current_tab = str_replace("?_pjax=%23lmhblog","",BLOG_URL . trim(Dispatcher::setPath(), '/')) == $value['url'] ? 'current' : 'common';?>
<?php if (!empty($value['children'])) :?>
<li class="dropdown"> <a class="catbtns" href="javascript:" <?php echo $newtab;?>><?php echo $value['naviname']; ?><i class="arrow"></i></a>
  <ul class="sub-menu" style="display: none;">
    <ul class="sub-menu">
    <?php foreach($value['children'] as $row){echo '<li><a href="'.Url::sort($row['sid']).'">'.$row['sortname'].'</a></li>';}?>
    </ul>
  </ul>
</li>
<?php else: ?>
<li class="<?php echo $current_tab;?>"> <a pjax="<?php list($a,$b) = split('#',$value['naviname']); if(empty($b)) {echo $a;}else {echo "".$a."";} ?>" href="<?php echo $value['url']; ?>" <?php echo $newtab;?>><?php list($a,$b) = split('#',$value['naviname']); if(empty($b)) {echo $a;}else {echo "<i class='".$b."'></i>".$a."";} ?></a></li>
<?php endif;?>
<?php endforeach; ?>
<?php if(_g('sqbc')==1):?>
<li><a href="<?php echo rand_log(); ?>" title="今日手气好，没事乱翻书。"><i class="fa fa-eye"></i>看看</a></li>
<?php endif;?>
<!--菜单开始-->
<?php if(_g('dhfj')==1):?>
<li class="dropdown"> <a class="catbtns" href="javascript:"><i class="fa fa-gears"></i>附加<i class="arrow"></i></a>
  <ul class="sub-menu" style="display: none;">
    <ul class="sub-menu" style="left: 8px">
	<?php echo _g('fujia');?>
    </ul>
  </ul>
</li>
<?php endif;?>
<?php if(_g('dhfl')==1):?>
<li class="dropdown"> <a class="catbtns" href="javascript:"><i class="fa fa-th-large"></i>分类<i class="arrow"></i></a>
  <ul class="sub-menu" style="display: none;">
    <?php topsorts();?>
  </ul>
</li>
<?php endif;?>
<?php if(_g('zzb')==1):?>
     <li class="dropdown"> <a class="catbtns" href="javascript:"><i class="fa fa-cny"></i>赞助<i class="arrow"></i></a>
       <ul class="sub-menu" style="display: none;">
          <ul class="sub-menu" style="left:7px">
            <?php echo _g('zanzhu');?>
          </ul>
       </ul>
     </li>
<?php endif;?>
<!--菜单结束-->
<?php }?>
<?php
//blog：置顶
function topflg($istop){
    $topflg = $istop == 'y' ? "<span class=\"good-label\">置顶</span><i class=\"good-arrow\"></i><div class=\"zhiding\"></div>" : '';
	echo $topflg;
}
?>
<?php
//blog：编辑
function editflg($logid,$author){
	$editflg = ROLE == 'admin' || $author == UID ? '<a target="_blank" href="'.BLOG_URL.'admin/write_log.php?action=edit&gid='.$logid.'">编辑</a>' : '';
	echo $editflg;
}
?>
<?php
//blog：分类
function blog_sort($blogid){
	global $CACHE; 
	$log_cache_sort = $CACHE->readCache('logsort');
	?>
<?php if(!empty($log_cache_sort[$blogid])): ?>
<a href="<?php echo Url::sort($log_cache_sort[$blogid]['id']); ?>" title="查看<?php echo $log_cache_sort[$blogid]['name']; ?>下的全部文章"><?php echo $log_cache_sort[$blogid]['name']; ?></a>
<?php else: ?>
<?php echo "未分类"; ?>
<?php endif;?>
<?php }?>
<?php
//blog：日志标签
function blog_tag($blogid){
	global $CACHE;
	$log_cache_tags = $CACHE->readCache('logtags');
	if (!empty($log_cache_tags[$blogid])){
		$tag = '';
		foreach ($log_cache_tags[$blogid] as $value){
			$tag .= "<a rel=\"tag\" href=\"".Url::tag($value['tagurl'])."\">".$value['tagname'].'</a>';
		}
		echo $tag; }
	else {$tag = '这篇文章木有标签';
		echo $tag;}
}
?>
<?php
//blog：日志作者
function blog_author($uid){
	global $CACHE;
	$user_cache = Cache::getInstance()->readCache('user');
	$author = $user_cache[$uid]['name'];
	$mail = $user_cache[$uid]['mail'];
	$des = $user_cache[$uid]['des'];
	if($mail!==($user_cache[1]['mail'])){ $title = !empty($mail) || !empty($des) ? "title=\"特邀作者\"" : '';}else{$title = !empty($mail) || !empty($des) ? "title=\"博客管理员\"" : '';}
	echo '<a href="'.Url::author($uid)."\" $title>$author</a>";
}
?>
<?php
//blog：相邻日志
function neighbor_log($neighborLog){extract($neighborLog);?>
<?php if($prevLog):?>
<a rel="prev" href="<?php echo Url::log($prevLog['gid']) ?>" class="prev"><span class="icon-wrap"></span>
<h3><?php echo $prevLog['title'];?></h3>
</a>
<?php else:?>
<?php endif;?>
<?php if($nextLog && $prevLog):?>
<?php endif;?>
<?php if($nextLog):?>
<a rel="next" href="<?php echo Url::log($nextLog['gid']) ?>"class="next"><span class="icon-wrap"></span>
<h3><?php echo $nextLog['title'];?></h3>
</a>
<?php else:?>
<?php endif;?>
<?php }?>
<?php
//blog：评论列表
function blog_comments($comments,$params){
    extract($comments);$comnum = count($comments);
    if($commentStacks): ?>
<a id="comments"></a>
<?php endif; ?>
<div class="commentlist">
  <?php if(empty($comments)){;}else{echo '
	<div class="timeline_container">
    <div class="timeline">
    <div class="plus"></div>
    <div class="plus2"></div>
    </div>
	</div>';} ?>
  <?php
    $count_comments = count($comments);
    $count_floors = $count_comments;
    foreach($comments as $value){
        if($value['pid'] != 0){ $count_floors--; }
    }
    $page = isset($params[5])?intval($params[5]):1;
    $i= $count_floors - ($page - 1)*Option::get('comment_pnum');
	$isGravatar = Option::get('isgravatar');
	foreach($commentStacks as $cid):
    $comment = $comments[$cid];
	global $CACHE;$user_cache = $CACHE->readCache('user');$name = $user_cache[1]['name'];
    $comment['poster'] = $comment['url'] ? '<a title="点击访问：'.$comment['url'].'" href="/go.php?url='.$comment['url'].'" target="_blank" rel="nofollow">'.$comment['poster'].'</a>' : $comment['poster'];
	$patterns = array ("/\[url\](.*?)\[\/url\]/","/\[qq\]([0-9]+)\[\/qq\]/","/\[img=?\]*(.*?)(\[\/img)?\]/e","/\[strong\](.*?)\[\/strong\]/","/\[em\](.*?)\[\/em\]/","/\[del\](.*?)\[\/del\]/","/\[blockquote\](.*?)\[\/blockquote\]/","/\[u\](.*?)\[\/u\]/","/\[code\](.*?)\[\/code\]/"); 
	$replace = array ('<a rel="external nofollow" target="_blank" href="$1">$1 </a>','<a title="点击这里给我发消息" rel="external nofollow" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=$1&site=qq&menu=yes"><img src="http://wpa.qq.com/pa?p=1:$1:52" alt="点击这里给我发消息" /></a>','"<a target=\"_blank\" href=\"$1\"><img class=\"comment-img\" src=\"$1\" alt=\"" . basename("$1") . "\" /></a>"','<b>$1</b>','<em>$1</em>','<del>$1</del>','<blockquote>$1</blockquote>','<u>$1</u>','<code>$1</code>'); 
	$comment['content']=preg_replace($patterns, $replace, $comment['content']);
	?>
  <p id="<?php echo $comment['cid']; ?>">
  <div class="comment" id="comment-<?php echo $comment['cid']; ?>">
    <div class="comment-body">
      <h4>
        <?php $mail_str="\"".strip_tags($comment['mail'])."\"";echo_levels($mail_str,"\"".$comment['url']."\""); ?>
        <?php if(subString(strip_tags($comment['poster']),0,30)==$name){echo "<span class='myhkname'>".$comment['poster']."</span>";}else{echo "<span class='name'>".$comment['poster']."</span>";} ?>
      </h4>
      <div class="timer"><i class="fa fa-clock-o"></i> <?php echo $comment['date']; ?> <?php if(_g('ipkg')==1):?><span class="sign1"><i class='fa fa-map-marker'></i> <?php echo getaddress($comment['ip']);?></span><?php endif; ?></div>
      <div class="reply"> <a href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)"><i class="fa fa-reply"></i>回复</a> </div>
      <div class="content"><?php echo preg_replace("/\[F(([1-4]?[0-9])|50)\]/",'<img class="face1" alt="face" src="'.TEMPLATE_URL.'images/face/$1.png"  />',$comment['content']); ?>
        <?php if(_g('uakg')==1):?><div class="sign2"><?php echo useragent($comment['useragent']); ?></div><?php endif; ?>
      </div>
      <?php if($isGravatar == 'y'): ?>
      <img src="<?php echo BYSB_getGravatar($comment['mail'],35);?>" class="avatar1" />
      <?php endif; ?>
      <myhk></myhk>
      <em1></em1>
    </div>
    <?php blog_comments_children($comments, $comment['children']); $ii=0;?>
  </div>
  </p>
  <?php $i--;endforeach; ?>
</div>
<div class="pagenavi"> <?php echo $commentPageUrl;?>
  <?php if($commentPageUrl): ?>
  <?php endif; ?>
</div>
<?php }?>
<?php
//blog：子评论列表
function blog_comments_children($comments, $children){
	$isGravatar = Option::get('isgravatar');
	foreach($children as $child):
	$comment = $comments[$child];
	global $CACHE;$user_cache = $CACHE->readCache('user');$name = $user_cache[1]['name'];
    $comment['poster'] = $comment['url'] ? '<a href="/go.php?url='.$comment['url'].'" target="_blank" title="点击访问：'.$comment['url'].'" rel="nofollow">'.$comment['poster'].'</a>' : $comment['poster'];
	$patterns = array ("/\[url\](.*?)\[\/url\]/","/\[qq\]([0-9]+)\[\/qq\]/","/\[img=?\]*(.*?)(\[\/img)?\]/e","/\[strong\](.*?)\[\/strong\]/","/\[em\](.*?)\[\/em\]/","/\[del\](.*?)\[\/del\]/","/\[blockquote\](.*?)\[\/blockquote\]/","/\[u\](.*?)\[\/u\]/","/\[code\](.*?)\[\/code\]/"); 
	$replace = array ('<a rel="external nofollow" target="_blank" href="$1">$1 </a>','<a title="点击这里给我发消息" rel="external nofollow" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=$1&site=qq&menu=yes"><img src="http://wpa.qq.com/pa?p=1:$1:52" alt="点击这里给我发消息" /></a>','"<a target=\"_blank\" href=\"$1\"><img class=\"comment-img\" src=\"$1\" alt=\"" . basename("$1") . "\" /></a>"','<b>$1</b>','<em>$1</em>','<del>$1</del>','<blockquote>$1</blockquote>','<u>$1</u>','<code>$1</code>'); 
	$comment['content']=preg_replace($patterns, $replace, $comment['content']);
	?>
<p id="<?php echo $comment['cid']; ?>">
<div class="comment comment-children<?php if($ii==0):?> first<?php $ii++; endif; ?>" id="comment-<?php echo $comment['cid']; ?>">
  <?php if(subString(strip_tags($comment['poster']),0,30)==$name){echo "<div class='comment-body1'>";}else{echo "<div class='comment-body'>";} ?>
  <?php if($isGravatar == 'y'): ?>
  <img src="<?php echo BYSB_getGravatar($comment['mail'],35);?>" class="<?php if(subString(strip_tags($comment['poster']),0,30)==$name){echo "avatar";}else{echo "avatar1";} ?>" />
  <?php endif; ?>
  <h4>
    <?php $mail_str="\"".strip_tags($comment['mail'])."\"";echo_levels($mail_str,"\"".$comment['url']."\""); ?>
    <?php if(subString(strip_tags($comment['poster']),0,30)==$name){echo "<span class='myhkname'>".$comment['poster']."</span>";}else{echo "<span class='name'>".$comment['poster']."</span>";} ?>
  </h4>
  <div class="timer"><i class="fa fa-clock-o"></i> <?php echo $comment['date']; ?> <?php if(_g('ipkg')==1):?><span class="sign1"><i class='fa fa-map-marker'></i> <?php echo getaddress($comment['ip']);?></span><?php endif; ?></div>
  <div class="reply"><a href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)"><i class="fa fa-reply"></i>回复</a> </div>
  <div class="content"><?php echo preg_replace("/\[F(([1-4]?[0-9])|50)\]/",'<img class="face1" alt="face" src="'.TEMPLATE_URL.'images/face/$1.png"  />',$comment['content']); ?>
    <?php if(_g('uakg')==1):?><div class="sign2"><?php echo useragent($comment['useragent']); ?></div><?php endif; ?>
  </div>
  <myhk></myhk>
  <em1></em1>
</div>
<?php blog_comments_children($comments, $comment['children']); $ii++;?>
</div>
</p>
<?php endforeach; ?>
<?php }?>
<?php
//blog：发表评论表单
function blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark){
	if($allow_remark == 'y'): ?>
<div id="comment-place">
  <div class="comment-post" id="comment-post">
    <h3><i class="fa fa-pencil"></i> 发表吐槽</h3>
    <div class="cancel-reply" id="cancel-reply" style="display:none"><a href="javascript:void(0);" onclick="cancelReply()"><i class="fa fa-share"></i>取消回复</a></div>
    <h1>
      <?php if(empty($ckname)){ echo "你肿么看？";}else if($ckname=='匿名'){ echo "匿名评论&nbsp;请叫我雷锋~";}else{echo $ckname;echo "欢迎回来...";} ?>
      <a name="respond"></a></h1>
    <form method="post" name="commentform" action="<?php echo BLOG_URL; ?>index.php?action=addcom" id="commentform">
      <input type="hidden" name="gid" value="<?php echo $logid; ?>" />
      <?php if(ROLE == 'visitor'): ?>
      <?php endif; ?>
      <p class="num1">你还可以输入 <i id="num" class="num">250 </i> / 250 个字</p>
      <p>
        <textarea onkeyup="checkLength(this);" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};" name="comment" id="comment" class="post-area" rows="10" tabindex="99" placeholder="让评论变得如此简单。"></textarea>
      <div class="smilebg">
        <div class="smile">
          <div class="arrow"></div>
          <?php include View::getView('smiley');?>
        </div>
      </div>
      <div class="sbsb">
        <div title="插入表情" onclick="embedSmiley()" class="face"><i class="fa fa-smile-o"></i></div>
        <div title="插入粗体文字" onclick="strong()" class="zujian"><i class="fa fa-bold"></i></div>
        <div title="插入斜体文字" onclick="em()" class="zujian"><i class="fa fa-italic"></i></div>
        <div title="插入删除线文字" onclick="del()" class="zujian"><i class="fa fa-strikethrough"></i></div>
        <div title="插入下划线文字" onclick="underline()" class="zujian"><i class="fa fa-text-width"></i></div>
        <div title="插入图片" onclick="embedImage()" class="zujian"><i class="fa fa-image"></i></div>
        <div title="插入链接" onclick="url1()" class="zujian"><i class="fa fa-link"></i></div>
        <div title="签到" onclick="javascript:SIMPALED.Editor.qiandao();this.style.display='none'" class="zujian"><i class="fa fa-pencil"></i></div>
        <div title="赞一个" onclick="javascript:SIMPALED.Editor.good();this.style.display='none'" class="zujian"><i class="fa fa-thumbs-o-up"></i></div>
        <div title="踩一个" onclick="javascript:SIMPALED.Editor.bad();this.style.display='none'" class="zujian"><i class="fa fa-thumbs-o-down"></i></div>
        <?php echo $verifyCode; ?>
        <button class="open2" type="button" id="submit" tabindex="6"><i class="fa fa-check"></i> 提交评论</button>
        <button type="reset"  id="reset" name="reset" tabindex="7"><i class="fa fa-trash-o"></i> 清除</button>
      </div>
      </p>
      <div class="tijiao">
        <p class="close2">评论信息框<a href="javascript:;" title="关闭"></a></p>
          <span><i class="fa fa-question-circle"></i> 可使用QQ号实时获取昵称+头像</span>
        <?php if(ROLE == 'admin' || ROLE == 'writer'):?>
        账户已登录，可直接发表评论！
        <?php else:?>
            <p>
                <input onkeydown="if(event.keyCode==13){event.returnValue=false;}" class="tex" type="text" id="nickqq" name="comqq" maxlength="49" onblur="get_qqinfo()" value="" size="22" tabindex="1" placeholder="选填">
                <label id="qq" for="author">
                    <img class="emailavatar">
                    <i class="fa fa-qq" style="font-size:13px"></i> QQ:</label>
            </p>
            <p>
                <input onkeydown="if(event.keyCode==13){event.returnValue=false;}" class="tex" type="text" id="nickname" name="comname" maxlength="49" value="<?php if(empty($ckname)){ echo "匿名";}else{echo $ckname;} ?>" size="22" tabindex="2" placeholder="必填">
                <label for="author"><i class="fa fa-user"></i> 昵称:</label>
            </p>
            <p>
                <input onkeydown="if(event.keyCode==13){event.returnValue=false;}" class="tex" type="email" name="commail" id="email" maxlength="128"  value="<?php echo $ckmail; ?>" size="22" tabindex="3" placeholder="必填">
                <label id="email" for="email"><i class="fa fa-envelope" style="font-size:12px"></i> 邮箱:</label>
            </p>
            <p>
                <input onkeydown="if(event.keyCode==13){event.returnValue=false;}" class="tex" type="text" id="comurl" name="comurl" maxlength="128" class="respondtext" value="<?php echo $ckurl; ?>" size="22" tabindex="4" placeholder="选填" pattern="((http|https)://|)+([\w-]+\.)+[\w-]+(/[\w- ./?%&=]*)?"/>
                <label for="url"><i class="fa fa-globe"></i> 网址:</label>
            </p>
        <?php endif;?>
          <p>
          <div class="ajaxloading">吃奶的力气提交吐槽中...</div>
          <div class="error"></div>
          </p>
          <button type="submit" id="usb" tabindex="5">发表评论</button><input style="margin-left:20px" type="checkbox" required="required" autocomplete="on" required title="发表评论确认框：请勾选我再发表评论！"><font color="black"> 请勾选我再发表评论！</font>
          </p>
          <input type="hidden" name="pid" id="comment-pid" value="0" size="22" tabindex="1"/>
      </div>
    </form>
  </div>
</div>
<?php endif; ?>
<?php }?>
<?php function comments_list($comm_num,$log_id){//获取日志对应的评论
    $db = MySql::getInstance();
    $sql = "SELECT * FROM ".DB_PREFIX."comment WHERE hide='n' AND gid = '".$log_id."' AND mail!='1595778703@qq.com' ORDER BY `date` DESC LIMIT 0,$comm_num";
    $result = $db->query($sql);
    while($row = $db->fetch_array($result)){
        $author = $row['poster'];
        $date = date("Y-m-d H:i:s",$row['date']);
        $url = $row['url'];
        echo '<div class="min_comments m_hide"><ul><li>'.$content.'<a target="_blank" rel="nofollow" href="/go.php?url='.$url.'" title="'.$date.'"><figure class="avatar avatar-box"><img data-avatar-id class="avatar avatar-120" height="120" width="120" src="'.BYSB_getGravatar($row['mail'],40).'"></figure><span class="comment_box">'.$author.'：'.$row['comment'].'</span></a></li></ul></div>';
    }
}
?>

<?php
//文章访问路径标准化
function gf_url($id){
    if ($id){echo '<link rel="canonical" href="'.Url::log($id)."\" />";}
}?>

<?php //判断内容页是否百度收录及百度自动推送代码
function baidu($url){
    $url='http://www.baidu.com/s?wd='.$url;
    $curl=curl_init();curl_setopt($curl,CURLOPT_URL,$url);curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);$rs=curl_exec($curl);curl_close($curl);if(!strpos($rs,'没有找到')){return 1;}else{return 0;}}
function logurl($id){$url=Url::log($id);
    if(baidu($url)==1){echo "<a rel=\"external nofollow\" title=\"本文已被百度收录\" target=\"_blank\" href=\"http://www.baidu.com/s?wd=$url\">本文已被百度收录！</a>";
    }else{echo "<a>本文已提交百度！</a><script>
(function(){
    var bp = document.createElement('script');
    var curProtocol = window.location.protocol.split(':')[0];
    if (curProtocol === 'https') {
        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';        
    }
    else {
        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
    }
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(bp, s);
})();
</script>";}}
?>
<?php
//统计文章总数
function count_log_all(){
    $db = MySql::getInstance();
    $data = $db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "blog WHERE type = 'blog'");
    return $data['total'];
}

//统计评论总数
function count_com_all(){
    $db = MySql::getInstance();
    $data = $db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "comment");
    return $data['total'];
}

//统计友链总数
function count_link_all(){
    $db = MySql::getInstance();
    $data = $db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "link");
    return $data['total'];
}
?>

<?php
function em_compress_html_main($buffer){
    $initial=strlen($buffer);
    $buffer=explode("<!--em-compress-html-->", $buffer);
    $count=count ($buffer);
    for ($i = 0; $i <= $count; $i++){
        if (stristr($buffer[$i], '<!--em-compress-html no compression-->')){
            $buffer[$i]=(str_replace("<!--em-compress-html no compression-->", " ", $buffer[$i]));
        }else{
            $buffer[$i]=(str_replace("\t", " ", $buffer[$i]));
            $buffer[$i]=(str_replace("\n\n", "\n", $buffer[$i]));
            $buffer[$i]=(str_replace("\n", "", $buffer[$i]));
            $buffer[$i]=(str_replace("\r", "", $buffer[$i]));
            while (stristr($buffer[$i], '  '))
            {
                $buffer[$i]=(str_replace("  ", " ", $buffer[$i]));
            }
        }
        $buffer_out.=$buffer[$i];
    }
    $final=strlen($buffer_out);
    $savings=($initial-$final)/$initial*100;
    $savings=round($savings, 2);
    $buffer_out.="\n<!--压缩前的大小: $initial bytes; 压缩后的大小: $final bytes; 节约：$savings% -->";
    return $buffer_out;
}
?>

<?php
//最新评论自动显示出文章标题
function com_tt($gid){
    $db = MySql::getInstance();
    $sql = "SELECT * FROM ".DB_PREFIX."blog WHERE hide='n' and gid in ($gid) ORDER BY `date` DESC LIMIT 0,1";
    $list = $db->query($sql);while($row = $db->fetch_array($list)){echo $row['title'];}}
?>

<?php  
function article_index($content , $domain) {  
            global $CACHE;  
            $tag_cache = $CACHE->readCache('tags');  
            $matches = array();  
            $ul_li = '';  
            $r = "/<h3>([^<]+)<\/h3>/im";  
    if(preg_match_all($r,$content,$matches)) {  
           foreach($matches[1] as $num => $title) {  
           $content = str_replace($matches[0][$num], '<h3 id="title-'.$num.'">'.$title.'</h3>', $content);  
           $ul_li .= '<li><a href="#title-'.$num.'" title="'.$title.'">'.$title."</a></li>\n";  
             }  
 $content = "\n<div id=\"article-index\"> 
 <b>[文章目录]<span style=\"float:right\" onclick=\"toggle('index-ul')\">显示/隐藏</span></b> 
 <ul id=\"index-ul\">\n" . $ul_li . "</ul> 
 </div>\n" . $content;  
 }  
 foreach($tag_cache as $value){  
                $tag_url = Url::tag($value['tagurl']);  
                $keyword = $value['tagname'];  
                $cleankeyword = stripslashes($keyword);  
                $url = "<a href=\"{$tag_url}\" title=\"浏览关于“{$cleankeyword}”的文章\" target=\"_blank\" >{$cleankeyword}</a>";  
                $regEx = '\'(?!((<.*?)|(<a.*?)))('. $cleankeyword . ')(?!(([^<>]*?)>)|([^>]*?</a>))\'s';  
                $content = preg_replace($regEx,$url,$content);          
}  
preg_match_all('/href="(.*?)"/', $log_content, $matches);  
    if ($matches) {  
        foreach ($matches[1] as $val) {  
            if (strpos($val, $domain) === false) {  
                $log_content = str_replace('href="' . $val . '"', 'href="' . $val . '" rel="external nofollow" ', $log_content);  
            }  
        }  
    }  
preg_match_all('/src="(.*?)"/', $log_content, $matches);  
    if ($matches) {  
        foreach ($matches[1] as $val) {  
            if (strpos($val, $domain) === false) {  
                $log_content = str_replace('src="' . $val . '"', 'src="' . $val . '" rel="external nofollow" ', $log_content);  
            }  
        }  
    }  
return $content;  
}  
?>  
<?php
//首先你要有读写文件的权限
//本程序可以直接运行,第一次报错,以缶涂梢?
$online_log = "count.dat"; //保存人数的文件,
$timeout = 30;//30秒内没动作者,认为掉线
$entries = file($online_log);
$temp = array();
for ($i=0;$i<count($entries);$i++) {
 $entry = explode(",",trim($entries[$i]));
 if (($entry[0] != getenv('REMOTE_ADDR')) && ($entry[1] > time())) {
  array_push($temp,$entry[0].",".$entry[1]."\n"); //取出其他浏览者的信息,并去掉超时者,保存进$temp
 }
}
array_push($temp,getenv('REMOTE_ADDR').",".(time() + ($timeout))."\n"); //更新浏览者的时间
$users_online = count($temp); //计算在线人数
$entries = implode("",$temp);
//写入文件
$fp = fopen($online_log,"w");
flock($fp,LOCK_EX); //flock() 不能在NFS以及其他的一些网络文件系统中正常工作
fputs($fp,$entries);
flock($fp,LOCK_UN);
fclose($fp);
?>
<?php //点赞
function syzan(){
$DB = MySql::getInstance();
if($DB->num_rows($DB->query("show columns from ".DB_PREFIX."blog like 'slzan'")) == 0){
$sql = "ALTER TABLE ".DB_PREFIX."blog ADD slzan int unsigned NOT NULL DEFAULT '0'";
$DB->query($sql);}}syzan();
function update($logid){
$logid = intval($_POST['id']);
$DB = Database::getInstance();
$DB->query("UPDATE " . DB_PREFIX . "blog SET slzan=slzan+1 WHERE gid=$logid");
setcookie('slzanpd_'. $logid, 'true', time() + 31536000);}
function lemoninit() {if( @$_POST['plugin'] == 'slzanpd' &&@$_POST['action'] == 'slzan' &&isset($_POST['id'])){
$id = intval($_POST['id']);
header("Access-Control-Allow-Origin: *");
update($id);echo getnum($id);die;}}lemoninit();
function getnum($id){
static $arr = array();
$DB = Database::getInstance();
if(isset($arr[$logid])) return $arr[$logid];
$sql = "SELECT slzan FROM " . DB_PREFIX . "blog WHERE gid=$id";
$res = $DB->query($sql);
$row = $DB->fetch_array($res);
$arr[$id] = intval($row['slzan']);
return $arr[$id];}
?>

<?php
/*
 * 图片七牛云缓存
 */
addAction('attach_upload', 'qiniu');
function qiniu( $uploads ) {
  $upload_path = '';
  $upload_url_path = 'https://res.biego.cn/content';

  if ( empty( $upload_path ) || 'content/uploadfile' == $upload_path ) {
    $uploads['basedir']  = BLOG_URL . 'content/uploadfile';
  } elseif ( 0 !== strpos( $upload_path, ABSPATH ) ) {
    $uploads['basedir'] = path_join( ABSPATH, $upload_path );
  } else {
    $uploads['basedir'] = $upload_path;
  }

  $uploads['path'] = $uploads['basedir'].$uploads['subdir'];

  if ( $upload_url_path ) {
    $uploads['baseurl'] = $upload_url_path;
    $uploads['url'] = $uploads['baseurl'].$uploads['subdir'];
  }
  return $uploads;
}
?>