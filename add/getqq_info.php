<?php
header("content-Type: text/html; charset=Utf-8");
$a = @$_GET['a'] ? $_GET['a'] : '';
if(empty($a)){
	header("Location: ../");
	exit;
}
if($a == "getqqnickname"){
	$qq = isset($_GET['qq']) ? addslashes(trim($_GET['qq'])) : '';
	if(!empty($qq) && is_numeric($qq) && strlen($qq) > 4 && strlen($qq) < 13){
		$qqnickname = file_get_contents('https://users.qzone.qq.com/fcg-bin/cgi_get_portrait.fcg?uins='.$qq);
		if($qqnickname){
			$qqnickname = mb_convert_encoding($qqnickname, "UTF-8", "GBK");
			echo $qqnickname;
		}
	}
}
?>