<?php

/*@support tpl_options*/
!defined('EMLOG_ROOT') && exit('access deined!');
$options = array(
		//主题公告
		'myhk' => array(
		'type' => 'radio',
		'name' => '主题公告',
		'description' => 'OWL-Colorful定制版2.0，有问题请联系：',
		'values' => array(
			'1' => 'QQ：1595778703',
		),
		'default' => '1',
		),
		'pjax' => array(
		'type' => 'radio',
		'name' => '全站Pjax无刷新',
		'description' => '关闭Pjax可有效解决部分JS冲突',
		'values' => array(
			'1' => '开启',
			'2' => '关闭',
		),
		'default' => '1',
		),
		'logo' => array(
        'type' => 'image',
        'name' => '导航圆形头像',
        'values' => array(
            TEMPLATE_URL . 'images/icon.png',
        ),
		'description' => '站点左侧头像，建议png格式，大小正方形。不能上传请手动ftp',
	),
	// 'logo1' => array(
 //        'type' => 'image',
 //        'name' => '响应式头像',
 //        'values' => array(
 //            TEMPLATE_URL . 'images/logor.png',
 //        ),
	// 	'description' => '站点响应式顶部头像，建议png格式，大小长方形。不能上传请手动ftp',
	// ),
	'zhbi' => array(
	    'type' => 'radio',
		'name' => '首页官网认证',
		'values' => array(
			'1' => '打开',
			'2' => '关闭',
		),
		'default' => '1',
	),
	'zbjs' => array(
	    'type' => 'text',
		'name' => '认证图标鼠标提示',
		'default' => '官网认证,金V成员.',
	),
	'sqbc' => array(
	    'type' => 'radio',
		'name' => '导航手气不错',
		'values' => array(
			'1' => '打开',
			'2' => '关闭',
		),
		'default' => '1',
	),
	'pgytx' => array(
	    'type' => 'radio',
		'name' => '蒲公英特效',
		'values' => array(
			'1' => '打开',
			'2' => '关闭',
		),
		'default' => '2',
	),
	'weixin' => array(
	    'type' => 'image',
        'name' => '微信二维码',
        'values' => array(
            TEMPLATE_URL . 'images/weixin.png',
        ),
		'description' => '站点导航右侧微信二维码图片',
	),
	'weiboid' => array(
	    'type' => 'text',
		'name' => '新浪微博ID',
		'description' => '新浪微博昵称',
		'default' => 'Dev-明月浩空',
	),
    'weibodz' => array(
	    'type' => 'text',
		'name' => '新浪微博地址',
		'description' => '新浪微博访问地址',
		'default' => 'http://weibo.com/u/3496187780',
	),
    'github' => array(
        'type' => 'text',
        'name' => 'Github',
        'default' => 'https://github.com/Kirding',
    ),
    'qqhao' => array(
        'type' => 'text',
        'name' => '站长qq',
        'default' => '1595778703',
    ),
    'grjj' => array(
        'type' => 'text',
        'name' => '个人简介',
        'multi' => true,
        'description' => '填写个人简介，前提开启侧边栏个人资料',
        'default' => 'Hi，老赵其实不老，只是个九零后文艺青年，也是一名手游UI设计师，也是手机App设计师，也是Web前端设计师，爱互联网，爱美术，爱游戏，爱电影，爱音乐，爱萝莉，爱御姐...',
    ),
    'gggb' => array(
        'type' => 'radio',
        'name' => '站点公告样式',
        'values' => array(
            '1' => '顶部滚动样式',
            '2' => '中心窗口样式',
        ),
        'default' => '1',
    ),
    'notice_img' => array(
	    'type' => 'image',
        'name' => '公告缩略图',
        'values' => array(
            TEMPLATE_URL . 'images/gonggao.jpg',
        ),
		'description' => '公告缩略图',
	),
    'notice_title' => array(
        'type' => 'text',
        'name' => '公告标题',
        'default' => '污桐小舍',
    ),
    'notice_text' => array(
        'type' => 'text',
        'name' => '公告主题',
        'default' => 'ようこそ陋屋',
    ),
    'notice_link' => array(
        'type' => 'text',
        'name' => '公告文章链接',
        'default' => 'https://www.biego.cn',
    ),
    'zdgg' => array(
        'type' => 'text',
        'name' => '站点公告',
        'multi' => true,
        'description' => '填写公告内容',
        'default' => '<span style="color:#1F9267;">温馨提示：</span>本站完整地址：<span style="color:#1F9267;"><a href="http://mdou.pw">Mdou.Pw</a></span> | 本站大量使用HTML5+CSS3 | 建议使用：<span style="color:#1F9267;">火狐&gt;谷歌&gt;百度&gt;360</span>等最新版浏览器！ | 如果你喜欢本站，记得分享给你朋友哦！',
    ),
    'sortid' => array(
        'type' => 'text',
        'name' => '文章样式条件',
        'multi' => false,
        'description' => '填写分类ID',
        'default' => '12',
    ),
	'yqlj' => array(
		'type' => 'radio',
		'name' => '友情链接网站图标本地缓存',
		'description' => '侧栏友情链接网站图标本地缓存',
		'values' => array(
			'1' => '开启',
			'2' => '关闭',
		),
		'default' => '1',
	),
    'rlys' => array(
        'type' => 'radio',
        'name' => '文章右侧日历样式',
        'values' => array(
            '1' => '现代式',
            '2' => '古典式',
        ),
        'default' => '1',
    ),
    'pfxt' => array(
		'type' => 'radio',
		'name' => '皮肤系统样式',
		'values' => array(
			'1' => '新版',
			'2' => '旧版（limh主题样式）',
		),
		'default' => '1',
	),
	'loading' => array(
		'type' => 'radio',
		'name' => 'Pjax加载样式',
		'description' => 'Pjax加载时的loading样式',
		'values' => array(
			'1' => '进度条',
			'2' => '老样式',
			'3' => '新样式'
		),
		'default' => '1',
	),
	'tools' => array(
		'type' => 'radio',
		'name' => '文章页标题右侧组件',
		'values' => array(
			'1' => '开启',
			'2' => '关闭',
		),
		'default' => '1',
	),
	'tools1' => array(
		'type' => 'radio',
		'name' => '文章页标题右侧发表吐槽',
		'values' => array(
			'1' => '开启',
			'2' => '关闭',
		),
		'default' => '1',
	),
	'tools2' => array(
		'type' => 'radio',
		'name' => '文章页二维码',
		'values' => array(
			'1' => '开启',
			'2' => '关闭',
		),
		'default' => '1',
	),
	'tools3' => array(
		'type' => 'radio',
		'name' => '文章页标题右侧分享',
		'values' => array(
			'1' => '开启',
			'2' => '关闭',
		),
		'default' => '1',
	),
	'tools4' => array(
		'type' => 'radio',
		'name' => '文章页标题右侧字体调节',
		'values' => array(
			'1' => '开启',
			'2' => '关闭',
		),
		'default' => '1',
	),
	'tools5' => array(
		'type' => 'radio',
		'name' => '文章页标题右侧侧边栏开关',
		'values' => array(
			'1' => '开启',
			'2' => '关闭',
		),
		'default' => '1',
	),
	'dashang' => array(
		'type' => 'radio',
		'name' => '文章页结束分享+打赏',
		'values' => array(
			'1' => '开启',
			'2' => '关闭',
		),
		'default' => '1',
	),
	'dszfb' => array(
	    'type' => 'image',
        'name' => '支付宝收款二维码',
        'values' => array(
            TEMPLATE_URL . 'images/zfb.jpg',
        ),
		'description' => '文章页打赏功能支付宝收款二维码图片',
	),
	'dswx' => array(
	    'type' => 'image',
        'name' => '微信收款二维码',
        'values' => array(
            TEMPLATE_URL . 'images/wx.jpg',
        ),
		'description' => '文章页打赏功能微信收款二维码图片',
	),
	'dsqq' => array(
	    'type' => 'image',
        'name' => 'QQ钱包收款二维码',
        'values' => array(
            TEMPLATE_URL . 'images/qq.png',
        ),
		'description' => '文章页打赏功能Q钱包收款二维码图片',
	),
	'ipkg' => array(
		'type' => 'radio',
		'name' => '评论列表IP地址显示',
		'values' => array(
			'1' => '开启',
			'2' => '关闭',
		),
		'default' => '1',
	),
	'uakg' => array(
		'type' => 'radio',
		'name' => '评论列表操作系统和浏览器显示',
		'values' => array(
			'1' => '开启',
			'2' => '关闭',
		),
		'default' => '1',
	),
	'cnzz' => array(
		'type' => 'radio',
		'name' => 'Pjax网站统计',
		'description' => 'Pjax开启后Cnzz网站统计的解决方案',
		'values' => array(
			'1' => '开启',
			'2' => '关闭',
		),
		'default' => '1',
	),
	'cnzzid' => array(
	    'type' => 'text',
		'name' => 'Cnzz网站ID',
		'description' => '比如：http://s96.cnzz.com/stat.php?id=<b>2796448</b>，ID就是<b>2796448</b>',
		'default' => '2796448',
	),
	'webyear' => array(
		'type' => 'text',
		'name' => '建站年份',
		'description' => '格式：xxxx，比如：2017',
		'default' => '2017',
	),
	'webtime' => array(
		'type' => 'text',
		'name' => '建站日期',
		'description' => '格式：xx-xx，比如：04-30',
		'default' => '04-30',
	),
	'jqgx' => array(
		'type' => 'text',
		'name' => '近期更新天数',
		'description' => '文章列表页提示近期更新的最近天数',
		'default' => '15',
	),
	'rm' => array(
		'type' => 'text',
		'name' => '热门天数',
		'description' => '文章列表页提示热门的文章评论数',
		'default' => '30',
	),
	'comnumkg' => array(
		'type' => 'radio',
		'name' => '文章列表页右侧评论图标',
		'values' => array(
			'1' => '开启',
			'2' => '关闭',
		),
		'default' => '1',
	),
	'comnum' => array(
		'type' => 'text',
		'name' => '文章列表页右侧评论图标',
		'description' => '文章大于多少评论数显示图标',
		'default' => '1',
	),
	'clsqkg' => array(
		'type' => 'radio',
		'name' => '浏览器标签页切换标题',
		'values' => array(
			'1' => '开启',
			'2' => '关闭',
		),
		'default' => '1',
	),
	'clsq' => array(
		'type' => 'text',
		'name' => '浏览器标签页切换标题',
		'default' => '草榴社區',
	),
	'dhfj' => array(
		'type' => 'radio',
		'name' => '导航附加功能下拉菜单',
		'values' => array(
			'1' => '开启',
			'2' => '关闭',
		),
		'default' => '1',
	),
	'fujia' => array(
		'type' => 'text',
		'name' => '导航附加功能',
		'multi' => true,
		'description' => '请根据li格式添加导航附加菜单',
		'default' => '<li class="dropdown"> <a class="catbtn">二级导航</a>
    <ul class="sub-menu" style="display: none;">
        <li><a href="#">三级导航</a></li>
    </ul>
</li>
<li><a href="../t">微言碎语</a></li>
<li class="m"><a href="../links.html">友情链接</a></li>',
	),
	'dhfl' => array(
		'type' => 'radio',
		'name' => '导航分类列表下拉菜单',
		'values' => array(
			'1' => '开启',
			'2' => '关闭',
		),
		'default' => '1',
	),
    'zzb' => array(
        'type' => 'radio',
        'name' => '导航赞助榜下拉菜单',
        'values' => array(
            '1' => '开启',
            '2' => '关闭',
        ),
        'default' => '1',
    ),
    'zanzhu' => array(
        'type' => 'text',
        'name' => '导航赞助榜',
        'multi' => true,
        'description' => '请根据li格式添加导航赞助榜',
        'default' => '<li class="dropdown"> <a class="catbtns" href="javascript:">赞助<i class="arrow"></i></a>
  <ul class="sub-menu" style="display: none;">
    <li><a target="_blank" href="https://pjax.cn">Finally</a></li>
  </ul>
</li>',
    ),
	'dis_num' => array(
		'type' => 'text',
		'name' => '首页自动摘要字符数',
		'description' => '请根据需要输入整数以控制首页摘要的字符数量',
		'default' => '180',
	),
	'syimg' => array(
		'type' => 'radio',
		'name' => '首页文章列表左侧缩略图',
		'values' => array(
			'1' => '开启',
			'2' => '关闭',
		),
		'default' => '1',
	),
	'rmtj' => array(
		'type' => 'radio',
		'name' => '文章内页6个热门推荐',
		'values' => array(
			'1' => '开启',
			'2' => '关闭',
		),
		'default' => '1',
	),
	'pjaxdm' => array(
		'type' => 'text',
		'name' => 'PjaxFooter特殊代码',
		'multi' => true,
		'description' => '本功能如不了解可忽略',
		'default' => '',
	),
    'compress_html' => array(
        'type' => 'radio',
        'name' => '网站源码压缩',
        'description' => '',
        'values' => array('open' => '压缩','close' => '关闭'),
        'default' => 'open'
    ),
	'eqi' => array(
		'type' => 'text',
		'name' => '文章归档默认展开几个月',
		'description' => '请根据需要输入整数以控制文章归档默认展开几个月，不能小于1',
		'default' => '5',
	),
    'ycsy' => array(
        'type' => 'radio',
        'name' => '隐藏ICP与公网安备号、服务商logo',
        'values' => array(
            '1' => '开启',
            '2' => '关闭',
        ),
        'default' => '1',
    ),
    'fwslogo' => array(
        'type' => 'image',
        'name' => '网站服务商LOGO',
        'values' => array(
            TEMPLATE_URL . 'images/ja.png',
        ),
        'description' => '底部部署于后的logo，建议png格式，不能上传请手动ftp',
    ),
    'fwsdz' => array(
        'type' => 'text',
        'name' => '服务商网站地址',
        'default' => 'https://www.zzidc.com/',
    ),
    'icpba' => array(
        'type' => 'text',
        'name' => 'ICP备案号',
        'default' => '苏ICP备16038356号',
    ),
    'gaba' => array(
        'type' => 'text',
        'name' => '公网安备案号',
        'default' => '苏公网安备32061202001020号',
    ),
    'gabanum' => array(
        'type' => 'text',
        'name' => '公网安备案号码',
        'description' => '只填数字',
        'default' => '32061202001020',
    ),
	'index_hdp' => array(
		'type' => 'radio',
		'name' => '首页顶部幻灯片',
		'values' => array(
			'1' => '开启',
			'2' => '关闭',
		),
		'default' => '1',
	),
	'index_slide' => array(
		'type' => 'radio',
		'name' => '幻灯片内容',
		'values' => array(
			'1' => '30天最高点击文章',
			'2' => '最新文章',
			'3' => '置顶文章',
			'4' => '自定义',
		),
		'default' => '1',
	),
	'custom1img' =>array(
		'type' => 'image',
		'name' => '自定义1-幻灯片图片',
		'values' => array(
			TEMPLATE_URL . 'images/banner.jpg',
		),
	),
	'custom1url_blank' => array(
		'type' => 'radio',
		'name' => '新窗口打开',
		'description' => '外链必须开启新窗口打开[否则Pjax无法加载外链]',
		'values' => array(
			'1' => '开启',
			'2' => '关闭',
		),
		'default' => '1',
	),
	'custom1url' => array(
		'type' => 'text',
		'name' => '自定义1-幻灯片链接',
		'values' => array(
			'https://www.biego.cn',
		),
	),
	'custom1name' => array(
		'type' => 'text',
		'name' => '自定义1-幻灯片名称',
		'values' => array(
			'Coloful主题，Pjax全站，响应式，时间轴。',
		),
	),
	'custom2img' =>array(
		'type' => 'image',
		'name' => '自定义2-幻灯片图片',
		'values' => array(
			TEMPLATE_URL . 'images/banner.jpg',
		),
	),
	'custom2url_blank' => array(
		'type' => 'radio',
		'name' => '新窗口打开',
		'description' => '外链必须开启新窗口打开[否则Pjax无法加载外链]',
		'values' => array(
			'1' => '开启',
			'2' => '关闭',
		),
		'default' => '1',
	),
	'custom2url' => array(
		'type' => 'text',
		'name' => '自定义2-幻灯片链接',
		'values' => array(
			'https://www.biego.cn',
		),
	),
	'custom2name' => array(
		'type' => 'text',
		'name' => '自定义2-幻灯片名称',
		'values' => array(
			'Coloful主题，Pjax全站，响应式，时间轴。',
		),
	),
	'custom3img' =>array(
		'type' => 'image',
		'name' => '自定义3-幻灯片图片',
		'values' => array(
			TEMPLATE_URL . 'images/banner.jpg',
		),
	),
	'custom3url_blank' => array(
		'type' => 'radio',
		'name' => '新窗口打开',
		'description' => '外链必须开启新窗口打开[否则Pjax无法加载外链]',
		'values' => array(
			'1' => '开启',
			'2' => '关闭',
		),
		'default' => '1',
	),
	'custom3url' => array(
		'type' => 'text',
		'name' => '自定义3-幻灯片链接',
		'values' => array(
			'https://www.biego.cn',
		),
	),
	'custom3name' => array(
		'type' => 'text',
		'name' => '自定义3-幻灯片名称',
		'values' => array(
			'Coloful主题，Pjax全站，响应式，时间轴。',
		),
	),
	'custom4img' =>array(
		'type' => 'image',
		'name' => '自定义4-幻灯片图片',
		'values' => array(
			TEMPLATE_URL . 'images/banner.jpg',
		),
	),
	'custom4url_blank' => array(
		'type' => 'radio',
		'name' => '新窗口打开',
		'description' => '外链必须开启新窗口打开[否则Pjax无法加载外链]',
		'values' => array(
			'1' => '开启',
			'2' => '关闭',
		),
		'default' => '1',
	),
	'custom4url' => array(
		'type' => 'text',
		'name' => '自定义4-幻灯片链接',
		'values' => array(
			'https://www.biego.cn',
		),
	),
	'custom4name' => array(
		'type' => 'text',
		'name' => '自定义4-幻灯片名称',
		'values' => array(
			'Coloful主题，Pjax全站，响应式，时间轴。',
		),
	),
	'custom5img' =>array(
		'type' => 'image',
		'name' => '自定义5-幻灯片图片',
		'values' => array(
			TEMPLATE_URL . 'images/banner.jpg',
		),
	),
	'custom5url_blank' => array(
		'type' => 'radio',
		'name' => '新窗口打开',
		'description' => '外链必须开启新窗口打开[否则Pjax无法加载外链]',
		'values' => array(
			'1' => '开启',
			'2' => '关闭',
		),
		'default' => '1',
	),
	'custom5url' => array(
		'type' => 'text',
		'name' => '自定义5-幻灯片链接',
		'values' => array(
			'https://www.biego.cn',
		),
	),
	'custom5name' => array(
		'type' => 'text',
		'name' => '自定义5-幻灯片名称',
		'values' => array(
			'Coloful主题，Pjax全站，响应式，时间轴。',
		),
	),
);