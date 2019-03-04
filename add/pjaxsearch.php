<?php require_once("config.php");echo "<script type=text/javascript>pjaxstart();tooltip()</script>";?>
<?php
	header('Content-type: text/html; charset=UTF-8');
	if(empty($_GET['k'])||$_GET['k']==''){
		die("你啥都没写，咋搜？");
	}
	$k=$_GET['k'];
    $myconn=mysql_connect(constant("DB_HOST"),constant("DB_USER"),constant("DB_PASSWD"));
    mysql_query("set names 'utf8'");
    mysql_select_db(constant("DB_NAME"),$myconn);
    $sql="select * from ".constant("DB_PREFIX")."blog where title Like '%$k%' Or content Like '%$k%' Order by gid DESC limit 0,8"; 
	$result=mysql_query($sql,$myconn); 
	$zs=mysql_num_rows($result);
	if($zs==0){
		echo("<p>我去，啥都没搜到~</p>");
	}else{
		while($row=mysql_fetch_array($result)){
			echo("<a pjax href=\"../?post=".$row["gid"]."\" title=\"".$row["title"]."\">".str_replace($k,"<span>".$k."</span>",$row["title"])."</a>");
		}
	}
	if($zs>1){
		echo("<a pjax href=\"../index.php?keyword=".$k."\" class=\"more\"><i class='fa fa-search'></i> 按文章标题搜索...</a>");
	}
?>