function loadbg(n) {
	var i = new Image();
	i.src ="../content/templates/Owl/images/bg/"+n+".jpg";
	$(".colorful_loading_frame,.colorful_loading").css("display", "none");
    if (typeof(wenkmMedia) != "undefined") {wenkmTips.show("第"+n+"张背景 - 加载中...")};
	i.onload = function() {
		jQuery(".bg-image").attr("src", i.src);
		RootCookies.SetCookie("myhk_bg",n, 30);
		bgid=n;
	};
}
function t() {
		var t = {};
		t.action = "getZan", $(".myhk_zan_dynamic").each(function(n) {
			t[n] = $(this).attr("id").substring(8)
		});
		var n = "";
		$.post(n, t, function(t) {
			$.each(t, function(n) {
				$("#" + n).find(".myhk_zan_num").text(t[n]), $(".myhk_zan_static").find(".myhk_zan_num").text(t[n]), "" == $.getCookie(n) ? $("#" + n).find(".myhk_zan_txt").text("求点赞") : ($("#" + n).find("i").removeClass("fa-heart-o").addClass("fa-heart"), $("#" + n).find(".myhk_zan_txt").text("取消赞"))
			})
		}, "json")
	}
function grin(a) {
	var b;
	a = " " + a + " ";
	if (document.getElementById("comment") && "textarea" == document.getElementById("comment").type) b = document.getElementById("comment");
	else return !1;
	if (document.selection) b.focus(), sel = document.selection.createRange(), sel.text = a, b.focus();
	else if (b.selectionStart || "0" == b.selectionStart) {
		var c = b.selectionEnd,
			d = c;
		b.value = b.value.substring(0, b.selectionStart) + a + b.value.substring(c, b.value.length);
		d += a.length;
		b.focus();
		b.selectionStart = d;
		b.selectionEnd = d
	} else b.value += a, b.focus()
}

function isNum(a) {
	return /^[0-9]+$/.test(a)
}
jQuery(document).ready(function() {
	pjaxdone()
});
function get_emailinfo() {
	if ("" != jQuery("#email").val()) if (-1 != jQuery("#email").val().indexOf("qq.com")) {
		var a = jQuery("#email").val().replace("@qq.com", "");
		isNum(a) ? ($("#email .emailavatar,#qq i").hide(), $("#email i,#qq .emailavatar").show(), $("#nickqq").val(a), jQuery("#qq .emailavatar").attr("src", "../content/templates/Mion/images/pjax_loading.gif"), setTimeout(function() {
			jQuery("#qq .emailavatar").attr("src", "https://q1.qlogo.cn/g?b=qq&nk=" + a + "&s=40")
		}, 1E3)) : ($("#nickqq").val(""), $("#qq .emailavatar,#email i").hide(), $("#qq i,#email .emailavatar").show(), jQuery("#email .emailavatar").attr("src", "../content/templates/Mion/images/pjax_loading.gif"), setTimeout(function() {
			jQuery("#email .emailavatar").attr("src", "https://secure.gravatar.com/avatar.php?gravatar_id=" + hex_md5(jQuery("#email").val())) + "&size=32&d=monsterid&r=G&default=https://www.biego.cn/content/templates/Owl/gravatar/default.jpg"
		}, 1E3))
	} else "" != jQuery("#email").val() && ($("#nickqq").val(""), $("#qq .emailavatar,#email i").hide(), $("#qq i,#email .emailavatar").show(), jQuery("#email .emailavatar").attr("src", "../content/templates/Owl/images/pjax_loading.gif"), setTimeout(function() {
		jQuery("#email .emailavatar").attr("src", "https://secure.gravatar.com/avatar.php?gravatar_id=" + hex_md5(jQuery("#email").val())) + "&size=32&d=identicon&r=G&default=https://www.biego.cn/content/templates/Owl/gravatar/default.jpg"
	}, 1E3));
	else $("#email i").show(), $("#email .emailavatar").hide()
}

function get_qqinfo() {
	if ("" != jQuery("#nickqq").val()) {
		var a = jQuery("#nickqq").val();
		isNum(a) ? ($("#qq i,#email .emailavatar").hide(), $("#qq .emailavatar,#email i").show(), jQuery("#qq .emailavatar").attr("src", "../content/templates/Mion/images/pjax_loading.gif"), $("#usb").attr("disabled", "disabled"), $("#nickname").val("\u6635\u79f0\u83b7\u53d6\u4e2d..."), $.ajax({
			type: "get",
			url: "/getqq_info.php?a=getqqnickname&qq=" + a,
			dataType: "jsonp",
			jsonp: "callback",
			jsonpCallback: "portraitCallBack",
			success: function(b) {
				"" != b ? $("#nickname").val(b[a][6]) : $("#nickname").val("\u533f\u540d");
				$("#usb").removeAttr("disabled")
			},
			error: function() {
				$("#nickname").val("\u6635\u79f0\u83b7\u53d6\u5931\u8d25");
				$("#usb").removeAttr("disabled")
			}
		}), setTimeout(function() {
			jQuery("#qq .emailavatar").attr("src", "https://q1.qlogo.cn/g?b=qq&nk=" + a + "&s=40")
		}, 1E3), $("#email").val(a + "@qq.com"), $("#comurl").val("https://user.qzone.qq.com/" + a)) : ($("#email .emailavatar,#qq .emailavatar").hide(), $("#email i,#qq .i").show(), $("#nickqq").val(""))
	} else $("#qq i").show(), $("#qq .emailavatar").hide()
}
jQuery.fn.navFixed = function() {
	function a() {
		c >= d ? (b.css("position", "fixed"), b.css("top", "0"), b.css("border-radius", "0"), b.css("width", "100%")) : (b.css("position", "relative"), b.css("width", "1100px"), b.css("border-radius", "5px"))
	}
	var b = $(this);
	parseInt(b.prev().css("margin-bottom").substring(0, b.prev().css("margin-bottom").length - 2));
	parseInt(b.next().css("margin-top").substring(0, b.next().css("margin-top").length - 2));
	var c = $(document).scrollTop(),
		d = b.prev().outerHeight(!0);
	a();
	$(document).scroll(function() {
		c = $(document).scrollTop();
		a()
	});
	$(window).resize(function() {
		d = b.prev().outerHeight(!0);
		a()
	})
};

function AutoScroll(a) {
	$(a).find("ul:first").animate({
		marginTop: "-10px"
	}, 300, function() {
		$(this).css({
			marginTop: "0px"
		}).find("li:first").appendTo(this)
	})
}
$(function() {
	$t = setInterval('AutoScroll(".bulletin_list")', 3E3);
	$(".bulletin_list").hover(function() {
		clearInterval($t)
	}, function() {
		$t = setInterval('AutoScroll(".bulletin_list")', 5E3)
	})
});

function tooltip() {
	$("a,div,li,h3,h4,img,i").each(function() {
		$("#tooltip").remove();
		if (this.title) {
			var a = this.title;
			$(this).mouseover(function(b) {
				this.title = "";
				$("body").append('<div id="tooltip">' + a + "</div>");
				$("#tooltip").css({
					left: b.pageX - 15 + "px",
					top: b.pageY + 30 + "px",
					opacity: "0.8"
				}).fadeIn(250)
			}).mouseout(function() {
				this.title = a;
				$("#tooltip").remove()
			}).mousemove(function(b) {
				$("#tooltip").css({
					left: b.pageX - 15 + "px",
					top: b.pageY + 30 + "px"
				})
			})
		}
	})
}(function(a) {
	a.fn.WIT_SetTab = function(b) {
		function c(a) {
			b.Field.filter(":visible").fadeOut(b.OutTime, function() {
				b.Field.eq(a).fadeIn(b.InTime).siblings().hide()
			});
			b.Nav.eq(a).addClass(b.CurCls).siblings().removeClass(b.CurCls)
		}
		b = a.extend({
			Nav: null,
			Field: null,
			K: 0,
			CurCls: "cur",
			Auto: !1,
			AutoTime: 5E3,
			OutTime: 100,
			InTime: 150,
			CrossTime: 60
		}, b || {});
		var d = null,
			f = !1,
			h = null;
		c(b.K);
		b.Nav.hover(function() {
			b.K = b.Nav.index(this);
			b.Auto && clearInterval(h);
			f = a(this).hasClass(b.CurCls);
			d = setTimeout(function() {
				f || c(b.K)
			}, b.CrossTime)
		}, function() {
			clearTimeout(d);
			b.Ajax && b.AjaxFun();
			b.Auto && (h = setInterval(function() {
				b.K++;
				c(b.K);
				b.K == b.Field.size() && (c(0), b.K = 0)
			}, b.AutoTime))
		}).eq(0).trigger("mouseleave")
	}
})(jQuery);
$(function() {
	$(document).WIT_SetTab({
		Nav: $("#J_setTabANav>ul>li"),
		Field: $("#J_setTabABox>div>ul"),
		CurCls: "hover"
	});
	$(document).WIT_SetTab({
		Nav: $("#J_setTabBNav>ul>li"),
		Field: $("#J_setTabBBox>div>ul"),
		Auto: !0,
		CurCls: "hover"
	})
});

function size(a) {
	a.innerHTML = "A" == a.innerHTML ? "A+" : "A+" == a.innerHTML ? "A-" : "A"
}
function embedImage() {
	var a = prompt("请输入图片的 URL 地址（包含http://）:", "http://");
	a && (document.getElementById("comment").value = document.getElementById("comment").value + "[img]" + a + "[/img]")
}
function strong() {
	var a = prompt("请输入需要加粗的文字:");
	a && (document.getElementById("comment").value = document.getElementById("comment").value + "[strong]" + a + "[/strong]")
}
function em() {
	var a = prompt("请输入需要斜体的文字:");
	a && (document.getElementById("comment").value = document.getElementById("comment").value + "[em]" + a + "[/em]")
}
function del() {
	var a = prompt("请输入需要删除线的文字:");
	a && (document.getElementById("comment").value = document.getElementById("comment").value + "[del]" + a + "[/del]")
}
function url1() {
	var a = prompt("请输入链接的 URL 地址（包含http://）:", "http://");
	a && (document.getElementById("comment").value = document.getElementById("comment").value + "[url]" + a + "[/url]")
}
function underline() {
	var a = prompt("请输入需要下划线的文字:");
	a && (document.getElementById("comment").value = document.getElementById("comment").value + "[u]" + a + "[/u]")
}
function code() {
	var a = prompt("请粘贴代码:");
	a && (document.getElementById("comment").value = document.getElementById("comment").value + "[code]" + a + "[/code]")
}
function quote() {
	var a = prompt("请粘贴引用内容:");
	a && (document.getElementById("comment").value = document.getElementById("comment").value + "[blockquote]" + a + "[/blockquote]")
}
function qq() {
	var a = prompt("请输入QQ号:");
	a && (document.getElementById("comment").value = document.getElementById("comment").value + "[qq]" + a + "[/qq]")
}
function embedSmiley() {
	"none" == $(".smilebg").css("display") ? $(".smilebg").slideDown(200) : $(".smilebg").slideUp(200)
}
function checkLength(a) {
	if (250 < a.value.length) return alert("您填写的评论内容已经超出250个字！"), a.value = a.value.substring(0, 250), !1;
	a = 250 - a.value.length;
	document.getElementById("num").innerHTML = a.toString();
	return !0
}
function showreply() {
	$(".form").slideToggle(500, "easeOutExpo")
}
function commentReply(a, b) {
	var c = document.getElementById("comment-post");
	b.style.display = "none";
	document.getElementById("cancel-reply").style.display = "";
	document.getElementById("comment-pid").value = a;
	b.parentNode.parentNode.appendChild(c)
}
function cancelReply() {
	var a = document.getElementById("comment-place"),
		b = document.getElementById("comment-post");
	document.getElementById("comment-pid").value = 0;
	$(".reply a").css({
		display: ""
	});
	document.getElementById("cancel-reply").style.display = "none";
	a.appendChild(b)
}
function b2top(a, b, c) {
	if (10 >= b && 0 <= b) {
		var d = 100 * b;
		$(a).css({
			backgroundPosition: "0 -" + d + "px"
		});
		setTimeout("b2top('" + a + "'," + (c ? b + 1 : b - 1) + "," + c + ")", 50)
	}
}
$(document).ready(function(a) {
	a(function() {
		a("body").dblclick(function() {
			var b = a(window),
				c = b.scrollTop(),
				d = (c - 0) / 5,
				f = c,
				h = setInterval(function() {
					0 >= (f - 0) * (c - 0) ? (clearInterval(h), c = f = 0, b.scrollTop(0)) : (f = c, b.scrollTop(c -= d))
				}, 20),
				e = a("#top").children(":first");
			e.stop().show().animate({}, function() {
				a(this).css({})
			});
			e.parent().append(e)
		});
		a("#top").dblclick(function(a) {
			a.stopPropagation()
		})
	})
});
function checkReg() {
	var a = $("input[name=username]").val().replace(/(^\s*)|(\s*$)/g, ""),
		b = $("input[name=password]").val().replace(/(^\s*)|(\s*$)/g, ""),
		c = $("input[name=password2]").val().replace(/(^\s*)|(\s*$)/g, "");
	$("input[name=imgcode]").val().replace(/(^\s*)|(\s*$)/g, "");
	if (a.match(/\s/) || b.match(/\s/)) return alert("用户名和密码中不能有空格"), !1;
	if (4 > a.length || 4 > b.length) return alert("用户名和密码都不能小于4位！"), !1;
	if (b != c) return alert("两次输入密码不相等！"), !1
}
function hidebox() {
	$("#dashang,.Share").animate({
		opacity: "hide",
		marginTop: "-300px"
	}, "slow")
}
function pjaxdone() {
	function d() {
		document.title = document[b] ? blog : a
	}
	var b, c, a = document.title;
	"undefined" != typeof document.hidden ? (b = "hidden", c = "visibilitychange") : "undefined" != typeof document.mozHidden ? (b = "mozHidden", c = "mozvisibilitychange") : "undefined" != typeof document.webkitHidden && (b = "webkitHidden", c = "webkitvisibilitychange"), ("undefined" != typeof document.addEventListener || "undefined" != typeof document[b]) && document.addEventListener(c, d, !1);
	window.RootCookies = {};
	window.RootCookies.SetCookie = function(a, b, c) {
		var d = new Date;
		d.setTime(d.getTime() + 864E5 * c);
		document.cookie = a + "=" + escape(b) + (null == c ? "" : ";expires=" + d.toGMTString()) + ";path=/"
	};
	$("a[target!=_blank]").unbind("click");
	$(document).on('click', '.slzanpd',
     function() {
	var a = $(this),
	id = a.data('slzanpd');
	if (slzanpd_check(id)) {
		alert('您已赞过本文！');
	} else {
		$.post('', {
			plugin: 'slzanpd',
			action: 'slzan',
			id: id
		},
		function(b) {
			a.find('u').html(b);
			slzanpd_(a);
		});
	}
    });
     function slzanpd_check(id) {
	 return new RegExp('slzanpd_' + id + '=true').test(document.cookie);
    }
    $('[data-slzanpd]').each(function() {
	var a = $(this),
	id = a.data('slzanpd');
	if (slzanpd_check(id)) {
		slzanpd_(a);
	} else {
		a.attr('title', '给舍力来点动力吧！')
	}
    });
    function slzanpd_(a) {
	  a.css('cursor', 'not-allowed').attr('title', '您已赞过本文！');
    }
	$(function() {
			$("pre").addClass("prettyprint linenums").attr("style", "overflow:auto"), window.prettyPrint && prettyPrint()
		}), $("#slider").carousel({
			interval: 5e3
		})
	$(function() {
		jQuery(function() {
			var a = 13;
			$(".size").click(function() {
				13 == a ? (a += 3, $(".post-context,.post-context pre").css("font-size", a + "px"), $(".size").css({
					"box-shadow": "inset 0px 0px 10px #cccccc",
					"border": "0px #0c0 solid",
					"font-weight": "bold"
				})) : 16 == a ? (a -= 4, $(".post-context,.post-context pre").css("font-size", a + "px"), $(".size").css({
					"box-shadow": "inset 0px 0px 10px #cccccc",
					"border": "0px #0c0 solid",
					"font-weight": "bold"
				})) : (a = 13, $(".post-context,.post-context pre").css("font-size", a + "px"), $(".size").css({
					"box-shadow": "none",
					"border": "none",
					"font-weight": "normal"
				}))
			})
		})
	});

	$(".layouts_width").click(function() {
		$("body").removeClass("layouts-box");
		$(this).addClass("selected").siblings().removeClass("selected");
		return !1
	});
	$(".layouts_box").click(function() {
		$("body").addClass("layouts-box");
		$(this).addClass("selected").siblings().removeClass("selected");
		return !1
	});
	//通知Modal样式1
	$(".clo-tools").click(function() {
		$(".tools").hide();
		setCookie("tools","close");
	});
	//通知Modal样式2
    $(".notice-close").click(function() {
        $(".notice").hide();
        sessionStorage.setItem("notice", "hide");
    });
    //登录
    $(function() {
          jQuery(function(a) {
	         var b = a(".cd-user-modal");
	         a(".cd-user-modal").on("click", function(c) {
		     if (a(c.target).is(b) || a(c.target).is(".cd-close-form")) return b.removeClass("is-visible"), !1
	     });
	         a(document).keyup(function(a) {
		     "27" == a.which && b.removeClass("is-visible")
	     });
	         var c = a(".login-modal");
	         a(".navbar-btn").click(function() {
		      c.toggleClass("is-visible")
	     });
       });
    });
    //微语滚动
    var b_i = 0,
	    b_span_arr = 0;
        laodao_span_num = 0;
    function bulletin() {
	if(b_span_arr==0){
		b_span_arr = jQuery(".bulletin_list").children("li");
		b_span_num = b_span_arr.length - 1;
	}
	if (b_i > b_span_num) {b_i = 0;}
	jQuery('.bulletin_list li:eq('+b_i+')').fadeIn(1500);
	setTimeout(function() {jQuery('.bulletin_list li:eq('+b_i+')').fadeOut(1500);b_i++;},4500);
    };
    //打字特效
    POWERMODE.colorful = true; // make power mode colorful
    POWERMODE.shake = false; // turn off shake
    document.body.addEventListener('input', POWERMODE);
    //自定义皮肤
	$(".skin-btn,.col_skin").click(function() {
		ss = $(".skin_switcher");
		sh = ss.height();
		if(ss.hasClass("opens")){
			ss.animate({bottom: -sh + "px"}).removeClass("opens");
		}else{
			ss.animate({bottom:"0"}).addClass("opens");
		}
	});

	$(".menu-toggle").click(function() {
		$(".header-menu,.menu-toggle").toggleClass("open-nav");
	});
	$("#showbox").click(function() {
		$("#imgul li").css("border", "solid #fff 3px");
		$("#bg-images_tanchu").addClass("bg-images_tanchu");
		$("#changebg").addClass("kaiguan");
		$("#changebg").addClass("flipInX animated");
		setTimeout(function() {
			$("#changebg").removeClass("flipInX")
		}, 800)
	});
	$("#kaiguan").click(function() {
		$("#imgul li").css("border", "solid #fff 3px");
		$("#changebg").addClass("flipOutX animated");
		setTimeout(function() {
			$("#changebg").removeClass("flipOutX");
			$("#bg-images_tanchu").removeClass("bg-images_tanchu");
			$("#changebg").removeClass("kaiguan")
		}, 800)
	});
	$("#imgul>li").hover(function() {
		$("#imgul li").css("border", "solid #fff 3px");
		$(this).css("border", "solid #0c0 3px")
	});
	$("#imgul>li").click(function() {
		$("#imgul li").css("border", "solid #fff 3px");
		$("#imgul li").find("i").removeClass("fa fa-check-circle fa-2x checkit");
		$(this).find("i").addClass("fa fa-check-circle fa-2x checkit");
		$("#changebg").addClass("flipOutX animated");
		setTimeout(function() {
			$("#changebg").removeClass("flipOutX");
			$("#bg-images_tanchu").removeClass("bg-images_tanchu");
			$("#changebg").removeClass("kaiguan");
			$(".colorful_loading_frame,.colorful_loading").css("display", "none");
			try {
				if ("undefined" != typeof wenkmMedia) return wenkmTips.show("第" + bgid + "张背景 - 保存成功"), !0
			} catch (a) {}
			return !1
		}, 500)
	});
	$("#content").find(".toggler").click(function() {
		"展开归档" == jQuery(this).text() ? ($(".archives").find("ul").show(), jQuery(this).text("折叠归档")) : ($(".archives").find("ul").hide(), jQuery(this).text("展开归档"));
		return !1
	});
	$(function () {
    console.log("%c%c博客名称%c污桐客栈", "line-height:28px;", "line-height:28px;padding:4px;background:#222;color:#fff;font-size:16px;margin-right:15px", "color:#3fa9f5;line-height:28px;font-size:16px;");
	console.log("%c%c网站地址%chttps://www.biego.cn", "line-height:28px;", "line-height:28px;padding:4px;background:#222;color:#fff;font-size:16px;margin-right:15px", "color:#ff9900;line-height:28px;font-size:16px;");
	console.log("%c%c企鹅号码%c1595778703", "line-height:28px;", "line-height:28px;padding:4px;background:#222;color:#fff;font-size:16px;margin-right:15px", "color:#008000;line-height:28px;font-size:16px;");
	console.log("%c%c个人签名 ：迷失在虚无中的矛盾者", "line-height:28px;", "line-height:28px;padding:4px 0px;color:#fff;font-size:16px;background-image:-webkit-gradient(linear,left top,right top,color-stop(0,#ff22ff),color-stop(1,#5500ff));color:transparent;-webkit-background-clip:text;");
    });
	$(function() {
		jQuery(function() {
			var a = encodeURIComponent(location.href),
				b = encodeURIComponent(document.title);
			$(".Share li a.share1").click(function() {
				window.open("http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=" + a + "&title=" + b, "newwindow", "width=650,height=500")
				$(".blackground").fadeOut(100);
				hidebox()
			});
			$(".Share li a.share2").click(function() {
				window.open("http://v.t.sina.com.cn/share/share.php?url=" + a + "&title=" + b + "&source=bookmark&appkey=1903104813", "newwindow", "width=650,height=500")
				$(".blackground").fadeOut(100);
				hidebox()
			});
			$(".Share li a.share33").click(function() {
				window.open("https://pan.baidu.com/share/qrcode?w=150&h=150&url=" + a + ".jpg", "newwindow", "width=370,height=370")
			});
			$(".go-qrcode,.Share li a.share3").click(function() {
				$(".wxpic,.qqpic,.zfbpic").hide()
				$(".boxtitle").html('<i class="fa fa-qrcode"></i> 扫一扫二维码分享')
				$(".logbox,.boxpic").animate({
					opacity: "show",
					marginTop: "-100px"
				}, "slow")
				hidebox()
				$(".boxpic").html('<img src="../content/templates/Owl/images/pjax_loading.gif" style="width:30px;height:30px;margin:125px">')
				var wx = new Image();
				wx.src ='https://pan.baidu.com/share/qrcode?w=150&h=150&url=' + a + '.jpg';
				wx.onload = function() {
					setTimeout(function() {
						$(".boxpic").html('<img src="'+wx.src+'" style="width:300px;height:280px;margin-top:-10px">')
						}, 1000)
				};
			});
			$("#dashang ul li a.wx").click(function() {
				$(".boxpic,.qqpic,.zfbpic").hide()
				$(".boxtitle").html('<i class="fa fa-wechat"></i> <span style="color:#f00">微信</span> 扫一扫打赏')
				$(".logbox,.wxpic").animate({
					opacity: "show",
					marginTop: "-100px"
				}, "slow")
				hidebox()
			});
			$("#dashang ul li a.qq").click(function() {
				$(".boxpic,.wxpic,.zfbpic").hide()
				$(".boxtitle").html('<i class="fa fa-qq"></i> <span style="color:#f00">QQ</span> 扫一扫打赏')
				$(".logbox,.qqpic").animate({
					opacity: "show",
					marginTop: "-100px"
				}, "slow")
				hidebox()
			});
			$("#dashang ul li a.zfb").click(function() {
				$(".boxpic,.wxpic,.qqpic").hide()
				$(".boxtitle").html('<i class="fa fa-barcode"></i> <span style="color:#f00">支付宝</span> 扫一扫打赏')
				$(".logbox,.zfbpic").animate({
					opacity: "show",
					marginTop: "-100px"
				}, "slow")
				hidebox()
			});
			$(".Share li a.share4").click(function() {
				window.open("http://connect.qq.com/widget/shareqq/index.html?url=" + a + "&showcount=0&desc=" + b + "&title=" + b + "&site=" + a + "&pics=", "newwindow", "width=800,height=600")
				$(".blackground").fadeOut(100);
				hidebox()
			});
			$(".Share li a.share5").click(function() {
				window.open("http://v.t.qq.com/share/share.php?title=" + b + "&url=" + a + "&site=&appkey=801328941", "newwindow", "width=650,height=500")
				$(".blackground").fadeOut(100);
				hidebox()
			});
			$(".Share li a.share6").click(function() {
				window.open("http://www.kaixin001.com/repaste/share.php?rtitle=" + b + "&rurl=" + a, "newwindow", "width=650,height=500")
				$(".blackground").fadeOut(100);
				hidebox()
			});
			$(".open,.fenxiang").click(function() {
				$(".blackground").fadeIn(100);
				$(".Share").animate({
					opacity: "show",
					marginTop: "-100px"
				}, "slow")
			});
			$(".dashang").click(function() {
				$(".blackground").fadeIn(100);
				$("#dashang").animate({
					opacity: "show",
					marginTop: "-100px"
				}, "slow")
			});
			$(".close a").click(function() {
				$(".boxtitle,.boxpic").html('')
				$(".blackground").fadeOut(100);
				hidebox()
			})
			$(".closebox a").click(function() {
				$(".blackground").fadeOut(100);
				$(".logbox,#dashang").animate({
					opacity: "hide",
					marginTop: "-300px"
				}, "slow")
			})
		})
	});
	$(function(a) {
		a("#head-nav").navFixed()
	});
	$(document).WIT_SetTab({
		Nav: $("#J_setTabANav>ul>li"),
		Field: $("#J_setTabABox>div>ul"),
		CurCls: "hover"
	});
	$(document).WIT_SetTab({
		Nav: $("#J_setTabBNav>ul>li"),
		Field: $("#J_setTabBBox>div>ul"),
		Auto: !0,
		CurCls: "hover"
	});
	$(".fullscreen").click(function() {
		$(".fullscreen i").hasClass("fa fa-share") ? (RootCookies.SetCookie("myhk_sidebar", "no", 30), $("#sidebar").css("display", "none"), $("#content").css("border-left", "0px dashed #ccc"), $("#content").css("border-right", "0px dashed #ccc"), $("#content").animate({
			width: "98.2%"
		}, "slow"), $(".fullscreen i").removeClass("fa fa-share"), $(".fullscreen i").addClass("fa fa-reply")) : (RootCookies.SetCookie("myhk_sidebar", "no", -1), $("#sidebar").css("display", "block"), $("#content").css("border-left", "1px dashed #ccc"), $("#content").css("border-right", "0px dashed #ccc"), $("#content").animate({
			width: "828px"
		}, "slow"), $(".fullscreen i").removeClass("fa fa-reply"), $(".fullscreen i").addClass("fa fa-share"))
	});
	$(".go-comment").click(function() {
		$body.animate({
			scrollTop: $("#comment-post").offset().top - 200
		}, 1002);
		return !1
	});
	$(".link-back2top").click(function() {
		$body.animate({
			scrollTop: $("#header").offset().top - 200
		}, 1E3);
		return !1
	});
	$(".open2").click(function() {
		$(".blackground").fadeIn(100)
		$(".tijiao").slideDown(300)
	});
	$(".close2 a").click(function() {
		$(".blackground").fadeOut(100);
		$(".tijiao").slideUp(300)
	});
	$(".post-title a").hover(function() {
		$(this).stop().animate({
			marginLeft: "4px"
		}, "fast")
	}, function() {
		$(this).stop().animate({
			marginLeft: "0px"
		}, "fast")
	});
	$(".dropdown").hover(function() {
		$(this).children(".sub-menu").show(200)
	}, function() {
		$(this).children(".sub-menu").hide(200)
	});
	$(function() {
		jQuery(function() {
			function a(a, b, c) {
				if (document.selection) a.focus(), sel = document.selection.createRange(), c ? sel.text = b + sel.text + c : sel.text = b, a.focus();
				else if (a.selectionStart || "0" == a.selectionStart) {
					var e = a.selectionStart,
						k = a.selectionEnd,
						g = k;
					c ? a.value = a.value.substring(0, e) + b + a.value.substring(e, k) + c + a.value.substring(k, a.value.length) : a.value = a.value.substring(0, e) + b + a.value.substring(k, a.value.length);
					c ? g += b.length + c.length : g += b.length - k + e;
					e == k && c && (g -= c.length);
					a.focus();
					a.selectionStart = g;
					a.selectionEnd = g
				} else a.value += b + c, a.focus()
			}
			var b = (new Date).toLocaleTimeString(),
				c = document.getElementById("comment") || 0;
			window.SIMPALED = {};
			window.SIMPALED.Editor = {
				qiandao: function() {
					a(c, "[blockquote]签到成功！签到时间：" + b, "，每日打卡，生活更精彩哦~[/blockquote]")
				},
				good: function() {
					a(c, "[blockquote][F1] 好羞射，文章真的好赞啊，顶博主！[/blockquote]")
				},
				bad: function() {
					a(c, "[blockquote][F14] 有点看不懂哦，希望下次写的简单易懂一点！[/blockquote]")
				}
			}
		})
	});
	$body = window.opera ? "CSS1Compat" == document.compatMode ? $("html") : $("body") : $("html,body");
	$("a[href*=#comment]").click(function() {
		if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
			var a = $(this.hash),
				a = a.length && a || $("[name=" + this.hash.slice(1) + "]");
			if (a.length) return a = a.offset().top, $("html,body").animate({
				scrollTop: a
			}), !1
		}
	});
	$(window).scroll(function() {
		200 < $(this).scrollTop() ? $(".backtop").fadeIn() : $(".backtop").fadeOut()
	});
	$(".backtop").hover(function() {
		b2top(".backtop", 0, !0)
	}, function() {
		b2top(".backtop", 3)
	}).click(function() {
		$("body,html").animate({
			scrollTop: 0
		}, 600, function() {});
		b2top(".backtop", 3)
	});
	$(".archives").find("ul").hide();
	$(".archives").find(eqi).show();
	$(".archives h4").click(function() {
		$(this).next("ul").slideToggle("fast")
	});
	$("#newlog li a,#randlog li a,#hotlog li a,#record li a,#blogsort li a,.tab_box li a,#link li a").hover(function() {
		$(this).stop().animate({
			marginLeft: "4px"
		}, "fast")
	}, function() {
		$(this).stop().animate({
			marginLeft: "0px"
		}, "fast")
	});
	$(".open-nav,.close-nav").click(function() {
		$("#mmenu").hasClass("has-opened") ? $("#mmenu").removeClass("has-opened") : $("#mmenu").addClass("has-opened")
	});
	$("#mmenu .catbtn ul").hide();
	$("#mmenu .catbtnx").click(function() {
		$(this).next("ul").slideToggle("fast")
	});
	$("#reset").click(function() {
		$(".num").text("250");
		$(".zujian").show()
	});
	$(function() {
		jQuery(function(a) {
			a("a[href$=jpg],a[href$=gif],a[href$=png],a[href$=jpeg],a[href$=bmp]").addClass("highslide").each(function() {
				this.onclick = function() {
					return hs.expand(this)
				}
			})
		})
	});
	$(function() {
		jQuery(function(a) {
			a.fn.WIT_SetTab = function(b) {
				function c(a) {
					b.Field.filter(":visible").fadeOut(b.OutTime, function() {
						b.Field.eq(a).fadeIn(b.InTime).siblings().hide()
					});
					b.Nav.eq(a).addClass(b.CurCls).siblings().removeClass(b.CurCls)
				}
				b = a.extend({
					Nav: null,
					Field: null,
					K: 0,
					CurCls: "cur",
					Auto: !1,
					AutoTime: 5E3,
					OutTime: 100,
					InTime: 150,
					CrossTime: 60
				}, b || {});
				var d = null,
					f = !1,
					h = null;
				c(b.K);
				b.Nav.hover(function() {
					b.K = b.Nav.index(this);
					b.Auto && clearInterval(h);
					f = a(this).hasClass(b.CurCls);
					d = setTimeout(function() {
						f || c(b.K)
					}, b.CrossTime)
				}, function() {
					clearTimeout(d);
					b.Ajax && b.AjaxFun();
					b.Auto && (h = setInterval(function() {
						b.K++;
						c(b.K);
						b.K == b.Field.size() && (c(0), b.K = 0)
					}, b.AutoTime))
				}).eq(0).trigger("mouseleave")
			}
		})
	});
	$(".smile").click(function() {
		$(".smilebg").slideUp(200)
	});
	$("#commentform").submit(function() {
		var a = $("#commentform").serialize();
		$("#comment,#comment-post .tex").attr("disabled", "disabled");
		$(".ajaxloading").show();
		$("#usb,.nop").hide();
		$.post($("#commentform").attr("action"), a, function(a) {
			var c = /<div class=\"main\">[\r\n]*<p>(.*?)<\/p>/i;
			c.test(a) ? ($(".error").html(a.match(c)[1]).show().fadeOut(4E3), $(".ajaxloading").hide(),$(".blackground").fadeOut(100), $("#usb,.nop").show()) : (c = $("input[name=pid]").val(), cancelReply(), $("[name=comment]").val(""), $(".commentlist").html($(a).find(".commentlist").html()), 0 != c ? (a = window.opera ? "CSS1Compat" == document.compatMode ? $("html") : $("body") : $("html,body"), a.animate({
				scrollTop: $("#comment-" + c).offset().top - 20
			}, "normal", function() {
				$(".ajaxloading").hide();
				$(".blackground").fadeOut(100);
				$("#usb").show();
				$(".tijiao").slideUp(300)
			})) : (a = window.opera ? "CSS1Compat" == document.compatMode ? $("html") : $("body") : $("html,body"), a.animate({
				scrollTop: $(".commentlist").offset().top - 20
			}, "normal", function() {
				$(".ajaxloading").hide();
				$(".blackground").fadeOut(100);
				$("#usb").show();
				$(".tijiao").slideUp(300)
			})));
			$("a[href*=#comment]").click(function() {
				if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
					var a = $(this.hash),
						a = a.length && a || $("[name=" + this.hash.slice(1) + "]");
					if (a.length) return a = a.offset().top, $("html,body").animate({
						scrollTop: a
					}), !1
				}
			});
			tooltip();
			$("#comment,#comment-post .tex").attr("disabled", !1)
		});
		return !1
	});
	$(function() {
		jQuery(function() {
			var a = $(".search input"),
				b = $(".search button"),
				c = $(".search .result"),
				d = $(".search .result div");
			a.focus(function() {
				"输入关键字自动全文搜索..." == a.val() && a.val("")
			});
			a.blur(function() {
				"" == a.val() && (a.val("输入关键字自动全文搜索..."), b.stop().fadeOut())
			});
			a.keydown(function() {
				clearTimeout("t")
			}).keypress(function() {
				clearTimeout("t")
			});
			a.keyup(function() {
				0 < a.val().length ? (b.fadeIn(), 1 < a.val().length && (b.addClass("load"), t = setTimeout(function() {
					d.load("/pjaxsearch.php?k=" + a.val(), function() {
						c.fadeIn();
						c.find("h2 span").html(a.val());
						b.removeClass("load")
					})
				}, 1E3))) : (b.stop().fadeOut(), c.stop().fadeOut())
			});
			b.click(function() {
				b.stop().fadeOut();
				c.stop().fadeOut()
			});
			c.click(function() {
				c.stop().fadeOut();
				a.val("输入关键字自动全文搜索...");
				b.stop().fadeOut()
			})
		})
	});
	$(function() {
		jQuery(function() {
			jQuery("#email").blur(function() {
				get_emailinfo()
			})
		})
	});
	pause();
	tooltip();
	pjaxfooter();
	$(".colorful_loading_frame,.colorful_loading").css("display", "none")
}
navigator.userAgent.match(/(iPhone|iPod|Android|ios)/i) || $(function() {
	pjaxstart()
});

function pjaxstart() {
	$(document).pjax("a[target!=_blank]", "#lmhblog", {
		fragment: "#lmhblog",
		timeout: 1E4
	});
	$(document).on("submit", "form", "button", function(a) {
		$.pjax.submit(a, "#lmhblog", {
			fragment: "#lmhblog",
			timeout: 1E4
		})
	});
	$(document).on("pjax:send", function() {
		$(".colorful_loading_frame,.colorful_loading").css("display", "block")
	});
	$(document).on("pjax:complete", function() {
		window.location.hash ? $("html,body").stop().animate({
			scrollTop: $(window.location.hash).offset().top - 130
		}, 500) : $("html,body").stop().animate({
			scrollTop: 0
		}, 0);
		pjaxdone();
		$(".colorful_loading_frame,.colorful_loading").css("display", "none");
		$("#tooltip").hide();
		$("#tooltip").remove();
		try {
			if ("undefined" != typeof wenkmMedia) return wenkmTips.show(document.title + " - 加载完成"), !0
		} catch (a) {}
		return !1
	})
}
function play(a, b) {
	try {
		if ("undefined" != typeof wenkmMedia && -1 == document.cookie.indexOf("myhk_player=") && songId + 1 != b) return music(a, b), !0
	} catch (c) {}
	return !1
};
function pause(){
	 try {
        if (typeof(wenkmMedia) == "undefined") {
            //alert("value is undefined"); 
            return false;
        } else {
			if($(".post-context .video,.dplayer").length){
				$("#sidebar").css("display", "none");
				$("#content").css("border-right", "0px dashed #ccc");
				$("#content").animate({width: "100%"}, "slow");
				audio.pause();
				}else{
		//audio.play();
		}
	  }
	} catch(e) {}
}
$(function() {
	function a() {
		document_height = $(document).height();
		scroll_so_far = $(window).scrollTop();
		window_height = $(window).height();
		max_scroll = document_height - window_height;
		scroll_percentage = scroll_so_far / (max_scroll / 100);
		$("#load").width(scroll_percentage + "%")
	}
	$(window).scroll(function() {
		a()
	});
	$(window).resize(function() {
		a()
	})
});
//显示遮罩
function cover(brightness) {
    if (typeof(div) == 'undefined') {
        div = document.createElement('div');
        div.setAttribute('style', 'position:fixed;top:0;left:0;outline:5000px solid;z-index:99999;');
        document.body.appendChild(div);
    } else {
        div.style.display = '';
    }
    div.style.outlineColor = 'rgba(0,0,0,' + brightness + ')';
}
//事件监听
window.addEventListener('keydown', function(e) {
    if (e.ctrlKey && e.keyCode == 90) { //Alt+Z:打开夜间模式
        cover(brightness = 0.3);
    }
    if (e.ctrlKey && e.keyCode == 88) { //ctrl+X:关闭
        cover(brightness = 0);
    }
    if (e.ctrlKey && e.keyCode == 39) { //Alt+→:增加亮度
        if (brightness - 0.05 > 0.05) cover(brightness -= 0.05);
    }
    if (e.ctrlKey && e.keyCode == 37) { //Alt+←:降低亮度
        if (brightness + 0.05 < 0.95) cover(brightness += 0.05);
    }
}, false);
	$(".skin_list li").click(function() {
		$(this).addClass('current').siblings().removeClass('current');
		$("#header,.header-mask").css('background',skinBanner);
		$("body").css('background',skinBody);

		if(skinmenu == 'i_glass_b'){
			$("#header").addClass('glass_b').removeClass('glass_w');

		}else{
			$("#header").addClass('glass_w').removeClass('glass_b');
		}
	});
    $(".skin_fx").click( function () {
		var date = $(this).attr("date-fx");
		var toggle = $(this).find(".fa");
		var body = $('body');
		switch (date){
			case 'layout':
				if(body.hasClass("layout_one")){
					body.removeClass('layout_one');
				}else{
					body.addClass('layout_one');
				};
				break;
			case 'glass':
				if(body.hasClass("glass_nav")){
					body.removeClass('glass_nav');
				}else{
					body.addClass('glass_nav');
				};
				break;
			case 'light':
				if(body.hasClass("light_off")){
					body.removeClass('light_off');
				}else{
					body.addClass('light_off');
				};
				break;
		};
		if(toggle.hasClass("fa-toggle-on")){
			toggle.removeClass('fa-toggle-on').addClass('fa-toggle-off');
		}else{
			toggle.addClass('fa-toggle-on').removeClass('fa-toggle-off');
		};
	});

function toggle(targetid) {
	if (document.getElementById) {
		target = document.getElementById(targetid);
		if (target.style.display == "block") {
			target.style.display = "none";
		} else {
			target.style.display = "block";
		}
	}
}