$(function() {
	hs.graphicsDir = "../content/templates/Owl/style/highslide/graphics/";
	hs.align = "center";
	hs.transitions = ["expand", "crossfade"];
	hs.outlineType = "rounded-white";
	hs.wrapperClassName = "dark borderless floating-caption";
	hs.fadeInOut = !0;
	hs.numberPosition = "caption";
	hs.dimmingOpacity = .75;
	jQuery(function(a) {
		a("a[href$=jpg],a[href$=jpeg],a[href$=gif],a[href$=png]").addClass("highslide").each(function() {
			this.onclick = function() {
				return hs.expand(this)
			}
		})
	});
	hs.addSlideshow && hs.addSlideshow({
		interval: 5E3,
		repeat: !1,
		useControls: !0,
		fixedControls: "fit",
		overlayOptions: {
			opacity: .75,
			position: "bottom center",
			hideOnMouseOut: !0
		}
	})
});
if (!hs) {
	var hs = {
		lang: {
			cssDirection: "ltr",
			loadingText: "Loading...",
			loadingTitle: "点击取消",
			focusTitle: "点击置顶",
			fullExpandTitle: "扩展到实际尺寸",
			creditsTitle: "Go to the Highslide JS homepage",
			previousText: "向前",
			nextText: "向后",
			moveText: "移动",
			closeText: "关闭",
			closeTitle: "关闭 (esc)",
			resizeTitle: "调整大小",
			playText: "播放",
			playTitle: "播放幻灯片（空格）",
			pauseText: "暂停",
			pauseTitle: "暂停幻灯片（空格）",
			previousTitle: "向前（左箭头）",
			nextTitle: "向后（右箭头）",
			moveTitle: "移动",
			fullExpandText: "1:1",
			number: "",
			restoreTitle: "单击关闭图片，按住鼠标左键并拖动可以移动图片，方向键可查看上一张或下一张。"
		},
		graphicsDir: "highslide/graphics/",
		expandCursor: "zoomin.cur",
		restoreCursor: "zoomout.cur",
		expandDuration: 250,
		restoreDuration: 250,
		marginLeft: 15,
		marginRight: 15,
		marginTop: 15,
		marginBottom: 15,
		zIndexCounter: 1001,
		loadingOpacity: .75,
		allowMultipleInstances: !0,
		numberOfImagesToPreload: 5,
		outlineWhileAnimating: 2,
		outlineStartOffset: 3,
		padToMinWidth: !1,
		fullExpandPosition: "bottom right",
		fullExpandOpacity: 1,
		showCredits: !0,
		creditsHref: "http://highslide.com/",
		creditsTarget: "_self",
		enableKeyListener: !0,
		openerTagNames: ["a"],
		transitions: [],
		transitionDuration: 250,
		dimmingOpacity: 0,
		dimmingDuration: 50,
		anchor: "auto",
		align: "auto",
		targetX: null,
		targetY: null,
		dragByHeading: !0,
		minWidth: 200,
		minHeight: 200,
		allowSizeReduction: !0,
		outlineType: "drop-shadow",
		skin: {
			controls: '<div class="highslide-controls"><ul><li class="highslide-previous"><a href="#" title="{hs.lang.previousTitle}"><span>{hs.lang.previousText}</span></a></li><li class="highslide-play"><a href="#" title="{hs.lang.playTitle}"><span>{hs.lang.playText}</span></a></li><li class="highslide-pause"><a href="#" title="{hs.lang.pauseTitle}"><span>{hs.lang.pauseText}</span></a></li><li class="highslide-next"><a href="#" title="{hs.lang.nextTitle}"><span>{hs.lang.nextText}</span></a></li><li class="highslide-move"><a href="#" title="{hs.lang.moveTitle}"><span>{hs.lang.moveText}</span></a></li><li class="highslide-full-expand"><a href="#" title="{hs.lang.fullExpandTitle}"><span>{hs.lang.fullExpandText}</span></a></li><li class="highslide-close"><a href="#" title="{hs.lang.closeTitle}" ><span>{hs.lang.closeText}</span></a></li></ul></div>'
		},
		preloadTheseImages: [],
		continuePreloading: !0,
		expanders: [],
		overrides: "allowSizeReduction useBox anchor align targetX targetY outlineType outlineWhileAnimating captionId captionText captionEval captionOverlay headingId headingText headingEval headingOverlay creditsPosition dragByHeading autoplay numberPosition transitions dimmingOpacity width height wrapperClassName minWidth minHeight maxWidth maxHeight pageOrigin slideshowGroup easing easingClose fadeInOut src".split(" "),
		overlays: [],
		idCounter: 0,
		oPos: {
			x: ["leftpanel", "left", "center", "right", "rightpanel"],
			y: ["above", "top", "middle", "bottom", "below"]
		},
		mouse: {},
		headingOverlay: {},
		captionOverlay: {},
		timers: [],
		slideshows: [],
		pendingOutlines: {},
		clones: {},
		onReady: [],
		uaVersion: /Trident\/4\.0/.test(navigator.userAgent) ? 8 : parseFloat((navigator.userAgent.toLowerCase().match(/.+(?:rv|it|ra|ie)[\/: ]([\d.]+)/) || [0, "0"])[1]),
		ie: document.all && !window.opera,
		safari: /Safari/.test(navigator.userAgent),
		geckoMac: /Macintosh.+rv:1\.[0-8].+Gecko/.test(navigator.userAgent),
		$: function(a) {
			if (a) return document.getElementById(a)
		},
		push: function(a, b) {
			a[a.length] = b
		},
		createElement: function(a, b, c, d, e) {
			a = document.createElement(a);
			b && hs.extend(a, b);
			e && hs.setStyles(a, {
				padding: 0,
				border: "none",
				margin: 0
			});
			c && hs.setStyles(a, c);
			d && d.appendChild(a);
			return a
		},
		extend: function(a, b) {
			for (var c in b) a[c] = b[c];
			return a
		},
		setStyles: function(a, b) {
			for (var c in b) hs.ieLt9 && "opacity" == c ? .99 < b[c] ? a.style.removeAttribute("filter") : a.style.filter = "alpha(opacity=" + 100 * b[c] + ")" : a.style[c] = b[c]
		},
		animate: function(a, b, c) {
			var d, e, f;
			if ("object" != typeof c || null === c) d = arguments, c = {
				duration: d[2],
				easing: d[3],
				complete: d[4]
			};
			"number" != typeof c.duration && (c.duration = 250);
			c.easing = Math[c.easing] || Math.easeInQuad;
			c.curAnim = hs.extend({}, b);
			for (var g in b) {
				var k = new hs.fx(a, c, g);
				d = parseFloat(hs.css(a, g)) || 0;
				e = parseFloat(b[g]);
				f = "opacity" != g ? "px" : "";
				k.custom(d, e, f)
			}
		},
		css: function(a, b) {
			if (a.style[b]) return a.style[b];
			if (document.defaultView) return document.defaultView.getComputedStyle(a, null).getPropertyValue(b);
			"opacity" == b && (b = "filter");
			var c = a.currentStyle[b.replace(/\-(\w)/g, function(a, b) {
				return b.toUpperCase()
			})];
			"filter" == b && (c = c.replace(/alpha\(opacity=([0-9]+)\)/, function(a, b) {
				return b / 100
			}));
			return "" === c ? 1 : c
		},
		getPageSize: function() {
			var a = document,
				b = a.compatMode && "BackCompat" != a.compatMode ? a.documentElement : a.body,
				c = hs.ie && (9 > hs.uaVersion || "undefined" == typeof pageXOffset);
			hs.page = {
				width: c ? b.clientWidth : a.documentElement.clientWidth || self.innerWidth,
				height: c ? b.clientHeight : self.innerHeight,
				scrollLeft: c ? b.scrollLeft : pageXOffset,
				scrollTop: c ? b.scrollTop : pageYOffset
			};
			return hs.page
		},
		getPosition: function(a) {
			for (var b = {
				x: a.offsetLeft,
				y: a.offsetTop
			}; a.offsetParent;) a = a.offsetParent, b.x += a.offsetLeft, b.y += a.offsetTop, a != document.body && a != document.documentElement && (b.x -= a.scrollLeft, b.y -= a.scrollTop);
			return b
		},
		expand: function(a, b, c, d) {
			a || (a = hs.createElement("a", null, {
				display: "none"
			}, hs.container));
			if ("function" == typeof a.getParams) return b;
			try {
				return new hs.Expander(a, b, c), !1
			} catch (e) {
				return !0
			}
		},
		getElementByClass: function(a, b, c) {
			a = a.getElementsByTagName(b);
			for (b = 0; b < a.length; b++) if ((new RegExp(c)).test(a[b].className)) return a[b];
			return null
		},
		replaceLang: function(a) {
			a = a.replace(/\s/g, " ");
			var b = /{hs\.lang\.([^}]+)\}/g,
				c = a.match(b),
				d;
			if (c) for (var e = 0; e < c.length; e++) d = c[e].replace(b, "$1"), "undefined" != typeof hs.lang[d] && (a = a.replace(c[e], hs.lang[d]));
			return a
		},
		focusTopmost: function() {
			for (var a = 0, b = -1, c = hs.expanders, d, e = 0; e < c.length; e++)(d = c[e]) && (d = d.wrapper.style.zIndex) && d > a && (a = d, b = e); - 1 == b ? hs.focusKey = -1 : c[b].focus()
		},
		getParam: function(a, b) {
			a.getParams = a.onclick;
			var c = a.getParams ? a.getParams() : null;
			a.getParams = null;
			return c && "undefined" != typeof c[b] ? c[b] : "undefined" != typeof hs[b] ? hs[b] : null
		},
		getSrc: function(a) {
			var b = hs.getParam(a, "src");
			return b ? b : a.href
		},
		getNode: function(a) {
			var b = hs.$(a),
				c = hs.clones[a];
			if (!b && !c) return null;
			if (c) return c.cloneNode(!0);
			c = b.cloneNode(!0);
			c.id = "";
			hs.clones[a] = c;
			return b
		},
		discardElement: function(a) {
			a && hs.garbageBin.appendChild(a);
			hs.garbageBin.innerHTML = ""
		},
		dim: function(a) {
			if (!hs.dimmer && (b = !0, hs.dimmer = hs.createElement("div", {
				className: "highslide-dimming highslide-viewport-size",
				owner: "",
				onclick: function() {
					hs.close()
				}
			}, {
				visibility: "visible",
				opacity: 0
			}, hs.container, !0), /(Android|iPad|iPhone|iPod)/.test(navigator.userAgent))) {
				var b = function() {
						hs.setStyles(hs.dimmer, {
							width: c.scrollWidth + "px",
							height: c.scrollHeight + "px"
						})
					},
					c = document.body;
				b();
				hs.addEventListener(window, "resize", b)
			}
			hs.dimmer.style.display = "";
			b = "" == hs.dimmer.owner;
			hs.dimmer.owner += "|" + a.key;
			b && (hs.geckoMac && hs.dimmingGeckoFix ? hs.setStyles(hs.dimmer, {
				background: "url(" + hs.graphicsDir + "geckodimmer.png)",
				opacity: 1
			}) : hs.animate(hs.dimmer, {
				opacity: a.dimmingOpacity
			}, hs.dimmingDuration))
		},
		undim: function(a) {
			hs.dimmer && ("undefined" != typeof a && (hs.dimmer.owner = hs.dimmer.owner.replace("|" + a, "")), "undefined" != typeof a && "" != hs.dimmer.owner || hs.upcoming && hs.getParam(hs.upcoming, "dimmingOpacity") || (hs.geckoMac && hs.dimmingGeckoFix ? hs.dimmer.style.display = "none" : hs.animate(hs.dimmer, {
				opacity: 0
			}, hs.dimmingDuration, null, function() {
				hs.dimmer.style.display = "none"
			})))
		},
		transit: function(a, b) {
			var c = b || hs.getExpander();
			b = c;
			if (hs.upcoming) return !1;
			hs.last = c;
			hs.removeEventListener(document, window.opera ? "keypress" : "keydown", hs.keyHandler);
			try {
				hs.upcoming = a, a.onclick()
			} catch (d) {
				hs.last = hs.upcoming = null
			}
			try {
				a && "crossfade" == b.transitions[1] || b.close()
			} catch (e) {}
			return !1
		},
		previousOrNext: function(a, b) {
			var c = hs.getExpander(a);
			return c ? hs.transit(c.getAdjacentAnchor(b), c) : !1
		},
		previous: function(a) {
			return hs.previousOrNext(a, -1)
		},
		next: function(a) {
			return hs.previousOrNext(a, 1)
		},
		keyHandler: function(a) {
			a || (a = window.event);
			a.target || (a.target = a.srcElement);
			if ("undefined" != typeof a.target.form) return !0;
			var b = hs.getExpander(),
				c = null;
			switch (a.keyCode) {
			case 70:
				return b && b.doFullExpand(), !0;
			case 32:
				c = 2;
				break;
			case 34:
			case 39:
			case 40:
				c = 1;
				break;
			case 8:
			case 33:
			case 37:
			case 38:
				c = -1;
				break;
			case 27:
			case 13:
				c = 0
			}
			if (null !== c) {
				2 != c && hs.removeEventListener(document, window.opera ? "keypress" : "keydown", hs.keyHandler);
				if (!hs.enableKeyListener) return !0;
				a.preventDefault ? a.preventDefault() : a.returnValue = !1;
				if (b) return 0 == c ? b.close() : 2 == c ? b.slideshow && b.slideshow.hitSpace() : (b.slideshow && b.slideshow.pause(), hs.previousOrNext(b.key, c)), !1
			}
			return !0
		},
		registerOverlay: function(a) {
			hs.push(hs.overlays, hs.extend(a, {
				hsId: "hsId" + hs.idCounter++
			}))
		},
		addSlideshow: function(a) {
			var b = a.slideshowGroup;
			if ("object" == typeof b) for (var c = 0; c < b.length; c++) {
				var d = {},
					e;
				for (e in a) d[e] = a[e];
				d.slideshowGroup = b[c];
				hs.push(hs.slideshows, d)
			} else hs.push(hs.slideshows, a)
		},
		getWrapperKey: function(a, b) {
			var c, d = /^highslide-wrapper-([0-9]+)$/;
			for (c = a; c.parentNode;) {
				if (void 0 !== c.hsKey) return c.hsKey;
				if (c.id && d.test(c.id)) return c.id.replace(d, "$1");
				c = c.parentNode
			}
			if (!b) for (c = a; c.parentNode;) {
				if (c.tagName && hs.isHsAnchor(c)) for (d = 0; d < hs.expanders.length; d++) {
					var e = hs.expanders[d];
					if (e && e.a == c) return d
				}
				c = c.parentNode
			}
			return null
		},
		getExpander: function(a, b) {
			if ("undefined" == typeof a) return hs.expanders[hs.focusKey] || null;
			if ("number" == typeof a) return hs.expanders[a] || null;
			"string" == typeof a && (a = hs.$(a));
			return hs.expanders[hs.getWrapperKey(a, b)] || null
		},
		isHsAnchor: function(a) {
			return a.onclick && a.onclick.toString().replace(/\s/g, " ").match(/hs.(htmlE|e)xpand/)
		},
		reOrder: function() {
			for (var a = 0; a < hs.expanders.length; a++) hs.expanders[a] && hs.expanders[a].isExpanded && hs.focusTopmost()
		},
		mouseClickHandler: function(a) {
			a || (a = window.event);
			if (1 < a.button) return !0;
			a.target || (a.target = a.srcElement);
			for (var b = a.target; b.parentNode && !/highslide-(image|move|html|resize)/.test(b.className);) b = b.parentNode;
			var c = hs.getExpander(b);
			if (c && (c.isClosing || !c.isExpanded)) return !0;
			if (c && "mousedown" == a.type) {
				if (a.target.form) return !0;
				if (b = b.className.match(/highslide-(image|move|resize)/)) hs.dragArgs = {
					exp: c,
					type: b[1],
					left: c.x.pos,
					width: c.x.size,
					top: c.y.pos,
					height: c.y.size,
					clickX: a.clientX,
					clickY: a.clientY
				}, hs.addEventListener(document, "mousemove", hs.dragHandler), a.preventDefault && a.preventDefault(), /highslide-(image|html)-blur/.test(c.content.className) && (c.focus(), hs.hasFocused = !0)
			} else "mouseup" == a.type && (hs.removeEventListener(document, "mousemove", hs.dragHandler), hs.dragArgs ? (hs.styleRestoreCursor && "image" == hs.dragArgs.type && (hs.dragArgs.exp.content.style.cursor = hs.styleRestoreCursor), (a = hs.dragArgs.hasDragged) || hs.hasFocused || /(move|resize)/.test(hs.dragArgs.type) ? (a || !a && hs.hasHtmlExpanders) && hs.dragArgs.exp.doShowHide("hidden") : c.close(), hs.hasFocused = !1, hs.dragArgs = null) : /highslide-image-blur/.test(b.className) && (b.style.cursor = hs.styleRestoreCursor));
			return !1
		},
		dragHandler: function(a) {
			if (!hs.dragArgs) return !0;
			a || (a = window.event);
			var b = hs.dragArgs,
				c = b.exp;
			b.dX = a.clientX - b.clickX;
			b.dY = a.clientY - b.clickY;
			var d = Math.sqrt(Math.pow(b.dX, 2) + Math.pow(b.dY, 2));
			b.hasDragged || (b.hasDragged = "image" != b.type && 0 < d || d > (hs.dragSensitivity || 5));
			b.hasDragged && 5 < a.clientX && 5 < a.clientY && ("resize" == b.type ? c.resize(b) : (c.moveTo(b.left + b.dX, b.top + b.dY), "image" == b.type && (c.content.style.cursor = "move")));
			return !1
		},
		wrapperMouseHandler: function(a) {
			try {
				a || (a = window.event);
				var b = /mouseover/i.test(a.type);
				a.target || (a.target = a.srcElement);
				a.relatedTarget || (a.relatedTarget = b ? a.fromElement : a.toElement);
				var c = hs.getExpander(a.target);
				if (c.isExpanded && c && a.relatedTarget && hs.getExpander(a.relatedTarget, !0) != c && !hs.dragArgs) for (a = 0; a < c.overlays.length; a++) {
					var d = hs.$("hsId" + c.overlays[a]);
					d && d.hideOnMouseOut && (b && hs.setStyles(d, {
						visibility: "visible",
						display: ""
					}), hs.animate(d, {
						opacity: b ? d.opacity : 0
					}, d.dur))
				}
			} catch (e) {}
		},
		addEventListener: function(a, b, c) {
			a == document && "ready" == b && hs.push(hs.onReady, c);
			try {
				a.addEventListener(b, c, !1)
			} catch (d) {
				try {
					a.detachEvent("on" + b, c), a.attachEvent("on" + b, c)
				} catch (e) {
					a["on" + b] = c
				}
			}
		},
		removeEventListener: function(a, b, c) {
			try {
				a.removeEventListener(b, c, !1)
			} catch (d) {
				try {
					a.detachEvent("on" + b, c)
				} catch (e) {
					a["on" + b] = null
				}
			}
		},
		preloadFullImage: function(a) {
			if (hs.continuePreloading && hs.preloadTheseImages[a] && "undefined" != hs.preloadTheseImages[a]) {
				var b = document.createElement("img");
				b.onload = function() {
					b = null;
					hs.preloadFullImage(a + 1)
				};
				b.src = hs.preloadTheseImages[a]
			}
		},
		preloadImages: function(a) {
			a && "object" != typeof a && (hs.numberOfImagesToPreload = a);
			a = hs.getAnchors();
			for (var b = 0; b < a.images.length && b < hs.numberOfImagesToPreload; b++) hs.push(hs.preloadTheseImages, hs.getSrc(a.images[b]));
			hs.outlineType ? new hs.Outline(hs.outlineType, function() {
				hs.preloadFullImage(0)
			}) : hs.preloadFullImage(0);
			hs.restoreCursor && hs.createElement("img", {
				src: hs.graphicsDir + hs.restoreCursor
			})
		},
		init: function() {
			if (!hs.container) {
				hs.ieLt7 = hs.ie && 7 > hs.uaVersion;
				hs.ieLt9 = hs.ie && 9 > hs.uaVersion;
				hs.getPageSize();
				for (var a in hs.langDefaults)"undefined" != typeof hs[a] ? hs.lang[a] = hs[a] : "undefined" == typeof hs.lang[a] && "undefined" != typeof hs.langDefaults[a] && (hs.lang[a] = hs.langDefaults[a]);
				hs.container = hs.createElement("div", {
					className: "highslide-container"
				}, {
					position: "absolute",
					left: 0,
					top: 0,
					width: "100%",
					zIndex: hs.zIndexCounter,
					direction: "ltr"
				}, document.body, !0);
				hs.loading = hs.createElement("a", {
					className: "highslide-loading",
					title: hs.lang.loadingTitle,
					innerHTML: hs.lang.loadingText,
					href: "javascript:;"
				}, {
					position: "absolute",
					top: "-9999px",
					opacity: hs.loadingOpacity,
					zIndex: 1
				}, hs.container);
				hs.garbageBin = hs.createElement("div", null, {
					display: "none"
				}, hs.container);
				hs.viewport = hs.createElement("div", {
					className: "highslide-viewport highslide-viewport-size"
				}, {
					visibility: hs.safari && 525 > hs.uaVersion ? "visible" : "hidden"
				}, hs.container, 1);
				Math.linearTween = function(a, c, d, e) {
					return d * a / e + c
				};
				Math.easeInQuad = function(a, c, d, e) {
					return d * (a /= e) * a + c
				};
				Math.easeOutQuad = function(a, c, d, e) {
					return -d * (a /= e) * (a - 2) + c
				};
				hs.hideSelects = hs.ieLt7;
				hs.hideIframes = window.opera && 9 > hs.uaVersion || "KDE" == navigator.vendor || hs.ieLt7 && 5.5 > hs.uaVersion
			}
		},
		ready: function() {
			if (!hs.isReady) {
				hs.isReady = !0;
				for (var a = 0; a < hs.onReady.length; a++) hs.onReady[a]()
			}
		},
		updateAnchors: function() {
			for (var a, b, c = [], d = [], e = {}, f, g = 0; g < hs.openerTagNames.length; g++) {
				b = document.getElementsByTagName(hs.openerTagNames[g]);
				for (var k = 0; k < b.length; k++) if (a = b[k], f = hs.isHsAnchor(a)) hs.push(c, a), "hs.expand" == f[0] && hs.push(d, a), f = hs.getParam(a, "slideshowGroup") || "none", e[f] || (e[f] = []), hs.push(e[f], a)
			}
			hs.anchors = {
				all: c,
				groups: e,
				images: d
			};
			return hs.anchors
		},
		getAnchors: function() {
			return hs.anchors || hs.updateAnchors()
		},
		close: function(a) {
			(a = hs.getExpander(a)) && a.close();
			return !1
		},
		fx: function(a, b, c) {
			this.options = b;
			this.elem = a;
			this.prop = c;
			b.orig || (b.orig = {})
		}
	};
	hs.fx.prototype = {
		update: function() {
			(hs.fx.step[this.prop] || hs.fx.step._default)(this);
			this.options.step && this.options.step.call(this.elem, this.now, this)
		},
		custom: function(a, b, c) {
			function d(a) {
				return e.step(a)
			}
			this.startTime = (new Date).getTime();
			this.start = a;
			this.end = b;
			this.unit = c;
			this.now = this.start;
			this.pos = this.state = 0;
			var e = this;
			d.elem = this.elem;
			d() && 1 == hs.timers.push(d) && (hs.timerId = setInterval(function() {
				for (var a = hs.timers, b = 0; b < a.length; b++) a[b]() || a.splice(b--, 1);
				a.length || clearInterval(hs.timerId)
			}, 13))
		},
		step: function(a) {
			var b = (new Date).getTime();
			if (a || b >= this.options.duration + this.startTime) {
				this.now = this.end;
				this.pos = this.state = 1;
				this.update();
				a = this.options.curAnim[this.prop] = !0;
				for (var c in this.options.curAnim)!0 !== this.options.curAnim[c] && (a = !1);
				a && this.options.complete && this.options.complete.call(this.elem);
				return !1
			}
			c = b - this.startTime;
			this.state = c / this.options.duration;
			this.pos = this.options.easing(c, 0, 1, this.options.duration);
			this.now = this.start + (this.end - this.start) * this.pos;
			this.update();
			return !0
		}
	};
	hs.extend(hs.fx, {
		step: {
			opacity: function(a) {
				hs.setStyles(a.elem, {
					opacity: a.now
				})
			},
			_default: function(a) {
				try {
					a.elem.style && null != a.elem.style[a.prop] ? a.elem.style[a.prop] = a.now + a.unit : a.elem[a.prop] = a.now
				} catch (b) {}
			}
		}
	});
	hs.Outline = function(a, b) {
		this.onLoad = b;
		this.outlineType = a;
		var c;
		this.hasAlphaImageLoader = hs.ie && 7 > hs.uaVersion;
		if (a) {
			hs.init();
			this.table = hs.createElement("table", {
				cellSpacing: 0
			}, {
				visibility: "hidden",
				position: "absolute",
				borderCollapse: "collapse",
				width: 0
			}, hs.container, !0);
			var d = hs.createElement("tbody", null, null, this.table, 1);
			this.td = [];
			for (var e = 0; 8 >= e; e++) 0 == e % 3 && (c = hs.createElement("tr", null, {
				height: "auto"
			}, d, !0)), this.td[e] = hs.createElement("td", null, null, c, !0), hs.setStyles(this.td[e], 4 != e ? {
				lineHeight: 0,
				fontSize: 0
			} : {
				position: "relative"
			});
			this.td[4].className = a + " highslide-outline";
			this.preloadGraphic()
		} else b && b()
	};
	hs.Outline.prototype = {
		preloadGraphic: function() {
			var a = hs.graphicsDir + (hs.outlinesDir || "outlines/") + this.outlineType + ".png";
			this.graphic = hs.createElement("img", null, {
				position: "absolute",
				top: "-9999px"
			}, hs.safari && 525 > hs.uaVersion ? hs.container : null, !0);
			var b = this;
			this.graphic.onload = function() {
				b.onGraphicLoad()
			};
			this.graphic.src = a
		},
		onGraphicLoad: function() {
			for (var a = this.offset = this.graphic.width / 4, b = [
				[0, 0],
				[0, -4],
				[-2, 0],
				[0, -8], 0, [-2, -8],
				[0, -2],
				[0, -6],
				[-2, -2]
			], c = {
				height: 2 * a + "px",
				width: 2 * a + "px"
			}, d = 0; 8 >= d; d++) if (b[d]) {
				if (this.hasAlphaImageLoader) {
					var e = 1 == d || 7 == d ? "100%" : this.graphic.width + "px",
						f = hs.createElement("div", null, {
							width: "100%",
							height: "100%",
							position: "relative",
							overflow: "hidden"
						}, this.td[d], !0);
					hs.createElement("div", null, {
						filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale, src='" + this.graphic.src + "')",
						position: "absolute",
						width: e,
						height: this.graphic.height + "px",
						left: b[d][0] * a + "px",
						top: b[d][1] * a + "px"
					}, f, !0)
				} else hs.setStyles(this.td[d], {
					background: "url(" + this.graphic.src + ") " + b[d][0] * a + "px " + b[d][1] * a + "px"
				});
				!window.opera || 3 != d && 5 != d || hs.createElement("div", null, c, this.td[d], !0);
				hs.setStyles(this.td[d], c)
			}
			this.graphic = null;
			hs.pendingOutlines[this.outlineType] && hs.pendingOutlines[this.outlineType].destroy();
			hs.pendingOutlines[this.outlineType] = this;
			if (this.onLoad) this.onLoad()
		},
		setPosition: function(a, b, c, d, e) {
			d = this.exp;
			b = b || 0;
			a = a || {
				x: d.x.pos + b,
				y: d.y.pos + b,
				w: d.x.get("wsize") - 2 * b,
				h: d.y.get("wsize") - 2 * b
			};
			c && (this.table.style.visibility = a.h >= 4 * this.offset ? "visible" : "hidden");
			hs.setStyles(this.table, {
				left: a.x - this.offset + "px",
				top: a.y - this.offset + "px",
				width: a.w + 2 * this.offset + "px"
			});
			a.w -= 2 * this.offset;
			a.h -= 2 * this.offset;
			hs.setStyles(this.td[4], {
				width: 0 <= a.w ? a.w + "px" : 0,
				height: 0 <= a.h ? a.h + "px" : 0
			});
			this.hasAlphaImageLoader && (this.td[3].style.height = this.td[5].style.height = this.td[4].style.height)
		},
		destroy: function(a) {
			a ? this.table.style.visibility = "hidden" : hs.discardElement(this.table)
		}
	};
	hs.Dimension = function(a, b) {
		this.exp = a;
		this.dim = b;
		this.ucwh = "x" == b ? "Width" : "Height";
		this.wh = this.ucwh.toLowerCase();
		this.uclt = "x" == b ? "Left" : "Top";
		this.lt = this.uclt.toLowerCase();
		this.ucrb = "x" == b ? "Right" : "Bottom";
		this.rb = this.ucrb.toLowerCase();
		this.p1 = this.p2 = 0
	};
	hs.Dimension.prototype = {
		get: function(a) {
			switch (a) {
			case "loadingPos":
				return this.tpos + this.tb + (this.t - hs.loading["offset" + this.ucwh]) / 2;
			case "loadingPosXfade":
				return this.pos + this.cb + this.p1 + (this.size - hs.loading["offset" + this.ucwh]) / 2;
			case "wsize":
				return this.size + 2 * this.cb + this.p1 + this.p2;
			case "fitsize":
				return this.clientSize - this.marginMin - this.marginMax;
			case "maxsize":
				return this.get("fitsize") - 2 * this.cb - this.p1 - this.p2;
			case "opos":
				return this.pos - (this.exp.outline ? this.exp.outline.offset : 0);
			case "osize":
				return this.get("wsize") + (this.exp.outline ? 2 * this.exp.outline.offset : 0);
			case "imgPad":
				return this.imgSize ? Math.round((this.size - this.imgSize) / 2) : 0
			}
		},
		calcBorders: function() {
			this.cb = (this.exp.content["offset" + this.ucwh] - this.t) / 2;
			this.marginMax = hs["margin" + this.ucrb]
		},
		calcThumb: function() {
			this.t = this.exp.el[this.wh] ? parseInt(this.exp.el[this.wh]) : this.exp.el["offset" + this.ucwh];
			this.tpos = this.exp.tpos[this.dim];
			this.tb = (this.exp.el["offset" + this.ucwh] - this.t) / 2;
			if (0 == this.tpos || -1 == this.tpos) this.tpos = hs.page[this.wh] / 2 + hs.page["scroll" + this.uclt]
		},
		calcExpanded: function() {
			var a = this.exp;
			this.justify = "auto";
			"center" == a.align ? this.justify = "center" : (new RegExp(this.lt)).test(a.anchor) ? this.justify = null : (new RegExp(this.rb)).test(a.anchor) && (this.justify = "max");
			this.pos = this.tpos - this.cb + this.tb;
			this.maxHeight && "x" == this.dim && (a.maxWidth = Math.min(a.maxWidth || this.full, a.maxHeight * this.full / a.y.full));
			this.size = Math.min(this.full, a["max" + this.ucwh] || this.full);
			this.minSize = a.allowSizeReduction ? Math.min(a["min" + this.ucwh], this.full) : this.full;
			a.isImage && a.useBox && (this.size = a[this.wh], this.imgSize = this.full);
			"x" == this.dim && hs.padToMinWidth && (this.minSize = a.minWidth);
			this.target = a["target" + this.dim.toUpperCase()];
			this.marginMin = hs["margin" + this.uclt];
			this.scroll = hs.page["scroll" + this.uclt];
			this.clientSize = hs.page[this.wh]
		},
		setSize: function(a) {
			var b = this.exp;
			b.isImage && (b.useBox || hs.padToMinWidth) ? (this.imgSize = a, this.size = Math.max(this.size, this.imgSize), b.content.style[this.lt] = this.get("imgPad") + "px") : this.size = a;
			b.content.style[this.wh] = a + "px";
			b.wrapper.style[this.wh] = this.get("wsize") + "px";
			b.outline && b.outline.setPosition();
			"x" == this.dim && b.overlayBox && b.sizeOverlayBox(!0);
			"x" == this.dim && b.slideshow && b.isImage && (a == this.full ? b.slideshow.disable("full-expand") : b.slideshow.enable("full-expand"))
		},
		setPos: function(a) {
			this.pos = a;
			this.exp.wrapper.style[this.lt] = a + "px";
			this.exp.outline && this.exp.outline.setPosition()
		}
	};
	hs.Expander = function(a, b, c, d) {
		if (document.readyState && hs.ie && !hs.isReady) hs.addEventListener(document, "ready", function() {
			new hs.Expander(a, b, c, d)
		});
		else {
			this.a = a;
			this.custom = c;
			this.contentType = d || "image";
			this.isImage = !this.isHtml;
			hs.continuePreloading = !1;
			this.overlays = [];
			this.last = hs.last;
			hs.last = null;
			hs.init();
			for (var e = this.key = hs.expanders.length, f = 0; f < hs.overrides.length; f++) {
				var g = hs.overrides[f];
				this[g] = b && "undefined" != typeof b[g] ? b[g] : hs[g]
			}
			this.src || (this.src = a.href);
			g = b && b.thumbnailId ? hs.$(b.thumbnailId) : a;
			g = this.thumb = g.getElementsByTagName("img")[0] || g;
			this.thumbsUserSetId = g.id || a.id;
			for (f = 0; f < hs.expanders.length; f++) if (hs.expanders[f] && hs.expanders[f].a == a && (!this.last || "crossfade" != this.transitions[1])) return hs.expanders[f].focus(), !1;
			if (!hs.allowSimultaneousLoading) for (f = 0; f < hs.expanders.length; f++) hs.expanders[f] && hs.expanders[f].thumb != g && !hs.expanders[f].onLoadStarted && hs.expanders[f].cancelLoading();
			hs.expanders[e] = this;
			hs.allowMultipleInstances || hs.upcoming || (hs.expanders[e - 1] && hs.expanders[e - 1].close(), "undefined" != typeof hs.focusKey && hs.expanders[hs.focusKey] && hs.expanders[hs.focusKey].close());
			this.el = g;
			this.tpos = this.pageOrigin || hs.getPosition(g);
			hs.getPageSize();
			(this.x = new hs.Dimension(this, "x")).calcThumb();
			(this.y = new hs.Dimension(this, "y")).calcThumb();
			this.wrapper = hs.createElement("div", {
				id: "highslide-wrapper-" + this.key,
				className: "highslide-wrapper " + this.wrapperClassName
			}, {
				visibility: "hidden",
				position: "absolute",
				zIndex: hs.zIndexCounter += 2
			}, null, !0);
			this.wrapper.onmouseover = this.wrapper.onmouseout = hs.wrapperMouseHandler;
			"image" == this.contentType && 2 == this.outlineWhileAnimating && (this.outlineWhileAnimating = 0);
			if (!this.outlineType || this.last && this.isImage && "crossfade" == this.transitions[1]) this[this.contentType + "Create"]();
			else if (hs.pendingOutlines[this.outlineType]) this.connectOutline(), this[this.contentType + "Create"]();
			else {
				this.showLoading();
				var k = this;
				new hs.Outline(this.outlineType, function() {
					k.connectOutline();
					k[k.contentType + "Create"]()
				})
			}
			return !0
		}
	};
	hs.Expander.prototype = {
		error: function(a) {
			hs.debug ? alert("Line " + a.lineNumber + ": " + a.message) : window.location.href = this.src
		},
		connectOutline: function() {
			var a = this.outline = hs.pendingOutlines[this.outlineType];
			a.exp = this;
			a.table.style.zIndex = this.wrapper.style.zIndex - 1;
			hs.pendingOutlines[this.outlineType] = null
		},
		showLoading: function() {
			if (!this.onLoadStarted && !this.loading) {
				this.loading = hs.loading;
				var a = this;
				this.loading.onclick = function() {
					a.cancelLoading()
				};
				var a = this,
					b = this.x.get("loadingPos") + "px",
					c = this.y.get("loadingPos") + "px";
				if (!d && this.last && "crossfade" == this.transitions[1]) var d = this.last;
				d && (b = d.x.get("loadingPosXfade") + "px", c = d.y.get("loadingPosXfade") + "px", this.loading.style.zIndex = hs.zIndexCounter++);
				setTimeout(function() {
					a.loading && hs.setStyles(a.loading, {
						left: b,
						top: c,
						zIndex: hs.zIndexCounter++
					})
				}, 100)
			}
		},
		imageCreate: function() {
			var a = this,
				b = document.createElement("img");
			this.content = b;
			b.onload = function() {
				hs.expanders[a.key] && a.contentLoaded()
			};
			hs.blockRightClick && (b.oncontextmenu = function() {
				return !1
			});
			b.className = "highslide-image";
			hs.setStyles(b, {
				visibility: "hidden",
				display: "block",
				position: "absolute",
				maxWidth: "9999px",
				zIndex: 3
			});
			b.title = hs.lang.restoreTitle;
			hs.safari && 525 > hs.uaVersion && hs.container.appendChild(b);
			hs.ie && hs.flushImgSize && (b.src = null);
			b.src = this.src;
			this.showLoading()
		},
		contentLoaded: function() {
			try {
				if (this.content && (this.content.onload = null, !this.onLoadStarted)) {
					this.onLoadStarted = !0;
					var a = this.x,
						b = this.y;
					this.loading && (hs.setStyles(this.loading, {
						top: "-9999px"
					}), this.loading = null);
					a.full = this.content.width;
					b.full = this.content.height;
					hs.setStyles(this.content, {
						width: a.t + "px",
						height: b.t + "px"
					});
					this.wrapper.appendChild(this.content);
					hs.container.appendChild(this.wrapper);
					a.calcBorders();
					b.calcBorders();
					hs.setStyles(this.wrapper, {
						left: a.tpos + a.tb - a.cb + "px",
						top: b.tpos + a.tb - b.cb + "px"
					});
					this.initSlideshow();
					this.getOverlays();
					var c = a.full / b.full;
					a.calcExpanded();
					this.justify(a);
					b.calcExpanded();
					this.justify(b);
					this.overlayBox && this.sizeOverlayBox(0, 1);
					if (this.allowSizeReduction) {
						this.correctRatio(c);
						var d = this.slideshow;
						if (d && this.last && d.controls && d.fixedControls) {
							var e = d.overlayOptions.position || "",
								f, g;
							for (g in hs.oPos) for (a = 0; 5 > a; a++) f = this[g], e.match(hs.oPos[g][a]) && (f.pos = this.last[g].pos + (this.last[g].p1 - f.p1) + (this.last[g].size - f.size) * [0, 0, .5, 1, 1][a], "fit" == d.fixedControls && (f.pos + f.size + f.p1 + f.p2 > f.scroll + f.clientSize - f.marginMax && (f.pos = f.scroll + f.clientSize - f.size - f.marginMin - f.marginMax - f.p1 - f.p2), f.pos < f.scroll + f.marginMin && (f.pos = f.scroll + f.marginMin)))
						}
						this.isImage && this.x.full > (this.x.imgSize || this.x.size) && (this.createFullExpand(), 1 == this.overlays.length && this.sizeOverlayBox())
					}
					this.show()
				}
			} catch (k) {
				this.error(k)
			}
		},
		justify: function(a, b) {
			var c, d = a.target,
				e = a == this.x ? "x" : "y";
			d && d.match(/ /) && (c = d.split(" "), d = c[0]);
			if (d && hs.$(d)) a.pos = hs.getPosition(hs.$(d))[e], c && c[1] && c[1].match(/^[-]?[0-9]+px$/) && (a.pos += parseInt(c[1])), a.size < a.minSize && (a.size = a.minSize);
			else if ("auto" == a.justify || "center" == a.justify) {
				c = !1;
				var f = a.exp.allowSizeReduction;
				a.pos = "center" == a.justify ? Math.round(a.scroll + (a.clientSize + a.marginMin - a.marginMax - a.get("wsize")) / 2) : Math.round(a.pos - (a.get("wsize") - a.t) / 2);
				a.pos < a.scroll + a.marginMin && (a.pos = a.scroll + a.marginMin, c = !0);
				!b && a.size < a.minSize && (a.size = a.minSize, f = !1);
				a.pos + a.get("wsize") > a.scroll + a.clientSize - a.marginMax && (!b && c && f ? a.size = Math.min(a.size, a.get("y" == e ? "fitsize" : "maxsize")) : a.get("wsize") < a.get("fitsize") ? a.pos = a.scroll + a.clientSize - a.marginMax - a.get("wsize") : (a.pos = a.scroll + a.marginMin, !b && f && (a.size = a.get("y" == e ? "fitsize" : "maxsize"))));
				!b && a.size < a.minSize && (a.size = a.minSize, f = !1)
			} else "max" == a.justify && (a.pos = Math.floor(a.pos - a.size + a.t));
			a.pos < a.marginMin && (e = a.pos, a.pos = a.marginMin, f && !b && (a.size -= a.pos - e))
		},
		correctRatio: function(a) {
			var b = this.x,
				c = this.y,
				d = !1,
				e = Math.min(b.full, b.size),
				f = Math.min(c.full, c.size),
				g = this.useBox || hs.padToMinWidth;
			e / f > a ? (e = f * a, e < b.minSize && (e = b.minSize, f = e / a), d = !0) : e / f < a && (f = e / a, d = !0);
			hs.padToMinWidth && b.full < b.minSize ? (b.imgSize = b.full, c.size = c.imgSize = c.full) : this.useBox ? (b.imgSize = e, c.imgSize = f) : (b.size = e, c.size = f);
			d = this.fitOverlayBox(this.useBox ? null : a, d);
			g && c.size < c.imgSize && (c.imgSize = c.size, b.imgSize = c.size * a);
			if (d || g) b.pos = b.tpos - b.cb + b.tb, b.minSize = b.size, this.justify(b, !0), c.pos = c.tpos - c.cb + c.tb, c.minSize = c.size, this.justify(c, !0), this.overlayBox && this.sizeOverlayBox()
		},
		fitOverlayBox: function(a, b) {
			var c = this.x,
				d = this.y;
			if (this.overlayBox) for (; d.size > this.minHeight && c.size > this.minWidth && d.get("wsize") > d.get("fitsize");) d.size -= 10, a && (c.size = d.size * a), this.sizeOverlayBox(0, 1), b = !0;
			return b
		},
		show: function() {
			var a = this.x,
				b = this.y;
			this.doShowHide("hidden");
			this.slideshow && this.slideshow.thumbstrip && this.slideshow.thumbstrip.selectThumb();
			this.changeSize(1, {
				wrapper: {
					width: a.get("wsize"),
					height: b.get("wsize"),
					left: a.pos,
					top: b.pos
				},
				content: {
					left: a.p1 + a.get("imgPad"),
					top: b.p1 + b.get("imgPad"),
					width: a.imgSize || a.size,
					height: b.imgSize || b.size
				}
			}, hs.expandDuration)
		},
		changeSize: function(a, b, c) {
			var d = this.transitions,
				e = a ? this.last ? this.last.a : null : hs.upcoming,
				d = d[1] && e && hs.getParam(e, "transitions")[1] == d[1] ? d[1] : d[0];
			if (this[d] && "expand" != d) this[d](a, b);
			else {
				this.outline && !this.outlineWhileAnimating && (a ? this.outline.setPosition() : this.outline.destroy());
				a || this.destroyOverlays();
				var f = this,
					g = f.x,
					k = f.y,
					d = this.easing;
				a || (d = this.easingClose || d);
				e = a ?
				function() {
					f.outline && (f.outline.table.style.visibility = "visible");
					setTimeout(function() {
						f.afterExpand()
					}, 50)
				} : function() {
					f.afterClose()
				};
				a && hs.setStyles(this.wrapper, {
					width: g.t + "px",
					height: k.t + "px"
				});
				this.fadeInOut && (hs.setStyles(this.wrapper, {
					opacity: a ? 0 : 1
				}), hs.extend(b.wrapper, {
					opacity: a
				}));
				hs.animate(this.wrapper, b.wrapper, {
					duration: c,
					easing: d,
					step: function(b, c) {
						if (f.outline && f.outlineWhileAnimating && "top" == c.prop) {
							var d = a ? c.pos : 1 - c.pos,
								d = {
									w: g.t + (g.get("wsize") - g.t) * d,
									h: k.t + (k.get("wsize") - k.t) * d,
									x: g.tpos + (g.pos - g.tpos) * d,
									y: k.tpos + (k.pos - k.tpos) * d
								};
							f.outline.setPosition(d, 0, 1)
						}
					}
				});
				hs.animate(this.content, b.content, c, d, e);
				a && (this.wrapper.style.visibility = "visible", this.content.style.visibility = "visible", this.a.className += " highslide-active-anchor")
			}
		},
		fade: function(a, b) {
			this.outlineWhileAnimating = !1;
			var c = this,
				d = a ? hs.expandDuration : 0;
			a && (hs.animate(this.wrapper, b.wrapper, 0), hs.setStyles(this.wrapper, {
				opacity: 0,
				visibility: "visible"
			}), hs.animate(this.content, b.content, 0), this.content.style.visibility = "visible", hs.animate(this.wrapper, {
				opacity: 1
			}, d, null, function() {
				c.afterExpand()
			}));
			if (this.outline) {
				this.outline.table.style.zIndex = this.wrapper.style.zIndex;
				for (var e = a || -1, f = this.outline.offset, g = a ? 3 : f, k = a ? f : 3, l = g; e * l <= e * k; l += e, d += 25)(function() {
					var b = a ? k - l : g - l;
					setTimeout(function() {
						c.outline.setPosition(0, b, 1)
					}, d)
				})()
			}
			a || setTimeout(function() {
				c.outline && c.outline.destroy(c.preserveContent);
				c.destroyOverlays();
				hs.animate(c.wrapper, {
					opacity: 0
				}, hs.restoreDuration, null, function() {
					c.afterClose()
				})
			}, d)
		},
		crossfade: function(a, b, c) {
			if (a) {
				var d = this,
					e = this.last,
					f = this.x,
					g = this.y,
					k = e.x,
					l = e.y,
					p = this.wrapper,
					n = this.content,
					r = this.overlayBox;
				hs.removeEventListener(document, "mousemove", hs.dragHandler);
				hs.setStyles(n, {
					width: (f.imgSize || f.size) + "px",
					height: (g.imgSize || g.size) + "px"
				});
				r && (r.style.overflow = "visible");
				if (this.outline = e.outline) this.outline.exp = d;
				e.outline = null;
				var s = hs.createElement("div", {
					className: "highslide-" + this.contentType
				}, {
					position: "absolute",
					zIndex: 4,
					overflow: "hidden",
					display: "none"
				});
				a = {
					oldImg: e,
					newImg: this
				};
				for (var t in a) this[t] = a[t].content.cloneNode(1), hs.setStyles(this[t], {
					position: "absolute",
					border: 0,
					visibility: "visible"
				}), s.appendChild(this[t]);
				p.appendChild(s);
				r && (r.className = "", p.appendChild(r));
				s.style.display = "";
				e.content.style.display = "none";
				hs.safari && 525 > hs.uaVersion && (this.wrapper.style.visibility = "visible");
				hs.animate(p, {
					width: f.size
				}, {
					duration: hs.transitionDuration,
					step: function(a, b) {
						var c = b.pos,
							m = 1 - c,
							u, h = {},
							B = ["pos", "size", "p1", "p2"],
							C;
						for (C in B) u = B[C], h["x" + u] = Math.round(m * k[u] + c * f[u]), h["y" + u] = Math.round(m * l[u] + c * g[u]), h.ximgSize = Math.round(m * (k.imgSize || k.size) + c * (f.imgSize || f.size)), h.ximgPad = Math.round(m * k.get("imgPad") + c * f.get("imgPad")), h.yimgSize = Math.round(m * (l.imgSize || l.size) + c * (g.imgSize || g.size)), h.yimgPad = Math.round(m * l.get("imgPad") + c * g.get("imgPad"));
						d.outline && d.outline.setPosition({
							x: h.xpos,
							y: h.ypos,
							w: h.xsize + h.xp1 + h.xp2 + 2 * f.cb,
							h: h.ysize + h.yp1 + h.yp2 + 2 * g.cb
						});
						e.wrapper.style.clip = "rect(" + (h.ypos - l.pos) + "px, " + (h.xsize + h.xp1 + h.xp2 + h.xpos + 2 * k.cb - k.pos) + "px, " + (h.ysize + h.yp1 + h.yp2 + h.ypos + 2 * l.cb - l.pos) + "px, " + (h.xpos - k.pos) + "px)";
						hs.setStyles(n, {
							top: h.yp1 + g.get("imgPad") + "px",
							left: h.xp1 + f.get("imgPad") + "px",
							marginTop: g.pos - h.ypos + "px",
							marginLeft: f.pos - h.xpos + "px"
						});
						hs.setStyles(p, {
							top: h.ypos + "px",
							left: h.xpos + "px",
							width: h.xp1 + h.xp2 + h.xsize + 2 * f.cb + "px",
							height: h.yp1 + h.yp2 + h.ysize + 2 * g.cb + "px"
						});
						hs.setStyles(s, {
							width: (h.ximgSize || h.xsize) + "px",
							height: (h.yimgSize || h.ysize) + "px",
							left: h.xp1 + h.ximgPad + "px",
							top: h.yp1 + h.yimgPad + "px",
							visibility: "visible"
						});
						hs.setStyles(d.oldImg, {
							top: l.pos - h.ypos + l.p1 - h.yp1 + l.get("imgPad") - h.yimgPad + "px",
							left: k.pos - h.xpos + k.p1 - h.xp1 + k.get("imgPad") - h.ximgPad + "px"
						});
						hs.setStyles(d.newImg, {
							opacity: c,
							top: g.pos - h.ypos + g.p1 - h.yp1 + g.get("imgPad") - h.yimgPad + "px",
							left: f.pos - h.xpos + f.p1 - h.xp1 + f.get("imgPad") - h.ximgPad + "px"
						});
						r && hs.setStyles(r, {
							width: h.xsize + "px",
							height: h.ysize + "px",
							left: h.xp1 + f.cb + "px",
							top: h.yp1 + g.cb + "px"
						})
					},
					complete: function() {
						p.style.visibility = n.style.visibility = "visible";
						n.style.display = "block";
						hs.discardElement(s);
						d.afterExpand();
						e.afterClose();
						d.last = null
					}
				})
			}
		},
		reuseOverlay: function(a, b) {
			if (!this.last) return !1;
			for (var c = 0; c < this.last.overlays.length; c++) {
				var d = hs.$("hsId" + this.last.overlays[c]);
				if (d && d.hsId == a.hsId) return this.genOverlayBox(), d.reuse = this.key, hs.push(this.overlays, this.last.overlays[c]), !0
			}
			return !1
		},
		afterExpand: function() {
			this.isExpanded = !0;
			this.focus();
			this.dimmingOpacity && hs.dim(this);
			hs.upcoming && hs.upcoming == this.a && (hs.upcoming = null);
			this.prepareNextOutline();
			var a = hs.page,
				b = hs.mouse.x + a.scrollLeft,
				a = hs.mouse.y + a.scrollTop;
			this.mouseIsOver = this.x.pos < b && b < this.x.pos + this.x.get("wsize") && this.y.pos < a && a < this.y.pos + this.y.get("wsize");
			this.overlayBox && this.showOverlays()
		},
		prepareNextOutline: function() {
			var a = this.key;
			new hs.Outline(this.outlineType, function() {
				try {
					hs.expanders[a].preloadNext()
				} catch (b) {}
			})
		},
		preloadNext: function() {
			var a = this.getAdjacentAnchor(1);
			a && a.onclick.toString().match(/hs\.expand/) && hs.createElement("img", {
				src: hs.getSrc(a)
			})
		},
		getAdjacentAnchor: function(a) {
			var b = this.getAnchorIndex(),
				c = hs.anchors.groups[this.slideshowGroup || "none"];
			if (c && !c[b + a] && this.slideshow && this.slideshow.repeat) {
				if (1 == a) return c[0];
				if (-1 == a) return c[c.length - 1]
			}
			return c && c[b + a] || null
		},
		getAnchorIndex: function() {
			var a = hs.getAnchors().groups[this.slideshowGroup || "none"];
			if (a) for (var b = 0; b < a.length; b++) if (a[b] == this.a) return b;
			return null
		},
		getNumber: function() {
			if (this[this.numberPosition]) {
				var a = hs.anchors.groups[this.slideshowGroup || "none"];
				a && (a = hs.lang.number.replace("%1", this.getAnchorIndex() + 1).replace("%2", a.length), this[this.numberPosition].innerHTML = '<div class="highslide-number">' + a + "</div>" + this[this.numberPosition].innerHTML)
			}
		},
		initSlideshow: function() {
			if (this.last) this.slideshow = this.last.slideshow;
			else for (var a = 0; a < hs.slideshows.length; a++) {
				var b = hs.slideshows[a],
					c = b.slideshowGroup;
				if ("undefined" == typeof c || null === c || c === this.slideshowGroup) this.slideshow = new hs.Slideshow(this.key, b)
			}
			if (b = this.slideshow) {
				var d = b.expKey = this.key;
				b.checkFirstAndLast();
				b.disable("full-expand");
				b.controls && this.createOverlay(hs.extend(b.overlayOptions || {}, {
					overlayId: b.controls,
					hsId: "controls",
					zIndex: 5
				}));
				b.thumbstrip && b.thumbstrip.add(this);
				!this.last && this.autoplay && b.play(!0);
				b.autoplay && (b.autoplay = setTimeout(function() {
					hs.next(d)
				}, b.interval || 500))
			}
		},
		cancelLoading: function() {
			hs.discardElement(this.wrapper);
			hs.expanders[this.key] = null;
			hs.upcoming == this.a && (hs.upcoming = null);
			hs.undim(this.key);
			this.loading && (hs.loading.style.left = "-9999px")
		},
		writeCredits: function() {
			this.credits || (this.credits = hs.createElement("a", {
				href: hs.creditsHref,
				target: hs.creditsTarget,
				className: "highslide-credits",
				title: hs.lang.creditsTitle
			}), this.createOverlay({
				overlayId: this.credits,
				position: this.creditsPosition || "top left",
				hsId: "credits"
			}))
		},
		getInline: function(a, b) {
			for (var c = 0; c < a.length; c++) {
				var d = a[c],
					e = null;
				!this[d + "Id"] && this.thumbsUserSetId && (this[d + "Id"] = d + "-for-" + this.thumbsUserSetId);
				this[d + "Id"] && (this[d] = hs.getNode(this[d + "Id"]));
				if (!this[d] && !this[d + "Text"] && this[d + "Eval"]) try {
					e = eval(this[d + "Eval"])
				} catch (f) {}!this[d] && this[d + "Text"] && (e = this[d + "Text"]);
				if (!this[d] && !e && (this[d] = hs.getNode(this.a["_" + d + "Id"]), !this[d])) for (var g = this.a.nextSibling; g && !hs.isHsAnchor(g);) {
					if ((new RegExp("highslide-" + d)).test(g.className || null)) {
						g.id || (this.a["_" + d + "Id"] = g.id = "hsId" + hs.idCounter++);
						this[d] = hs.getNode(g.id);
						break
					}
					g = g.nextSibling
				}
				this[d] || e || this.numberPosition != d || (e = "\n");
				!this[d] && e && (this[d] = hs.createElement("div", {
					className: "highslide-" + d,
					innerHTML: e
				}));
				if (b && this[d]) {
					var e = {
						position: "heading" == d ? "above" : "below"
					},
						k;
					for (k in this[d + "Overlay"]) e[k] = this[d + "Overlay"][k];
					e.overlayId = this[d];
					this.createOverlay(e)
				}
			}
		},
		doShowHide: function(a) {
			hs.hideSelects && this.showHideElements("SELECT", a);
			hs.hideIframes && this.showHideElements("IFRAME", a);
			hs.geckoMac && this.showHideElements("*", a)
		},
		showHideElements: function(a, b) {
			for (var c = document.getElementsByTagName(a), d = "*" == a ? "overflow" : "visibility", e = 0; e < c.length; e++) if ("visibility" == d || "auto" == document.defaultView.getComputedStyle(c[e], "").getPropertyValue("overflow") || null != c[e].getAttribute("hidden-by")) {
				var f = c[e].getAttribute("hidden-by");
				if ("visible" == b && f) f = f.replace("[" + this.key + "]", ""), c[e].setAttribute("hidden-by", f), f || (c[e].style[d] = c[e].origProp);
				else if ("hidden" == b) {
					var g = hs.getPosition(c[e]);
					g.w = c[e].offsetWidth;
					g.h = c[e].offsetHeight;
					if (!this.dimmingOpacity) var k = g.x + g.w < this.x.get("opos") || g.x > this.x.get("opos") + this.x.get("osize"),
						l = g.y + g.h < this.y.get("opos") || g.y > this.y.get("opos") + this.y.get("osize");
					g = hs.getWrapperKey(c[e]);
					k || l || g == this.key ? f != "[" + this.key + "]" && hs.focusKey != g || g == this.key ? f && -1 < f.indexOf("[" + this.key + "]") && c[e].setAttribute("hidden-by", f.replace("[" + this.key + "]", "")) : (c[e].setAttribute("hidden-by", ""), c[e].style[d] = c[e].origProp || "") : f ? -1 == f.indexOf("[" + this.key + "]") && c[e].setAttribute("hidden-by", f + "[" + this.key + "]") : (c[e].setAttribute("hidden-by", "[" + this.key + "]"), c[e].origProp = c[e].style[d], c[e].style[d] = "hidden")
				}
			}
		},
		focus: function() {
			this.wrapper.style.zIndex = hs.zIndexCounter += 2;
			for (var a = 0; a < hs.expanders.length; a++) if (hs.expanders[a] && a == hs.focusKey) {
				var b = hs.expanders[a];
				b.content.className += " highslide-" + b.contentType + "-blur";
				b.content.style.cursor = hs.ieLt7 ? "hand" : "pointer";
				b.content.title = hs.lang.focusTitle
			}
			this.outline && (this.outline.table.style.zIndex = this.wrapper.style.zIndex - 1);
			this.content.className = "highslide-" + this.contentType;
			this.content.title = hs.lang.restoreTitle;
			hs.restoreCursor && (hs.styleRestoreCursor = window.opera ? "pointer" : "url(" + hs.graphicsDir + hs.restoreCursor + "), pointer", hs.ieLt7 && 6 > hs.uaVersion && (hs.styleRestoreCursor = "hand"), this.content.style.cursor = hs.styleRestoreCursor);
			hs.focusKey = this.key;
			hs.addEventListener(document, window.opera ? "keypress" : "keydown", hs.keyHandler)
		},
		moveTo: function(a, b) {
			this.x.setPos(a);
			this.y.setPos(b)
		},
		resize: function(a) {
			var b, c = a.width / a.height;
			a = Math.max(a.width + a.dX, Math.min(this.minWidth, this.x.full));
			this.isImage && 12 > Math.abs(a - this.x.full) && (a = this.x.full);
			b = a / c;
			b < Math.min(this.minHeight, this.y.full) && (b = Math.min(this.minHeight, this.y.full), this.isImage && (a = b * c));
			this.resizeTo(a, b)
		},
		resizeTo: function(a, b) {
			this.y.setSize(b);
			this.x.setSize(a);
			this.wrapper.style.height = this.y.get("wsize") + "px"
		},
		close: function() {
			if (!this.isClosing && this.isExpanded) {
				"crossfade" == this.transitions[1] && hs.upcoming && (hs.getExpander(hs.upcoming).cancelLoading(), hs.upcoming = null);
				this.isClosing = !0;
				this.slideshow && !hs.upcoming && this.slideshow.pause();
				hs.removeEventListener(document, window.opera ? "keypress" : "keydown", hs.keyHandler);
				try {
					this.content.style.cursor = "default", this.changeSize(0, {
						wrapper: {
							width: this.x.t,
							height: this.y.t,
							left: this.x.tpos - this.x.cb + this.x.tb,
							top: this.y.tpos - this.y.cb + this.y.tb
						},
						content: {
							left: 0,
							top: 0,
							width: this.x.t,
							height: this.y.t
						}
					}, hs.restoreDuration)
				} catch (a) {
					this.afterClose()
				}
			}
		},
		createOverlay: function(a) {
			var b = a.overlayId,
				c = "viewport" == a.relativeTo && !/panel$/.test(a.position);
			"string" == typeof b && (b = hs.getNode(b));
			a.html && (b = hs.createElement("div", {
				innerHTML: a.html
			}));
			if (b && "string" != typeof b && (b.style.display = "block", a.hsId = a.hsId || a.overlayId, "crossfade" != this.transitions[1] || !this.reuseOverlay(a, b))) {
				this.genOverlayBox();
				var d = a.width && /^[0-9]+(px|%)$/.test(a.width) ? a.width : "auto";
				/^(left|right)panel$/.test(a.position) && !/^[0-9]+px$/.test(a.width) && (d = "200px");
				d = hs.createElement("div", {
					id: "hsId" + hs.idCounter++,
					hsId: a.hsId
				}, {
					position: "absolute",
					visibility: "hidden",
					width: d,
					direction: hs.lang.cssDirection || "",
					opacity: 0
				}, c ? hs.viewport : this.overlayBox, !0);
				c && (d.hsKey = this.key);
				d.appendChild(b);
				hs.extend(d, {
					opacity: 1,
					offsetX: 0,
					offsetY: 0,
					dur: 0 === a.fade || !1 === a.fade || 2 == a.fade && hs.ie ? 0 : 250
				});
				hs.extend(d, a);
				this.gotOverlays && (this.positionOverlay(d), d.hideOnMouseOut && !this.mouseIsOver || hs.animate(d, {
					opacity: d.opacity
				}, d.dur));
				hs.push(this.overlays, hs.idCounter - 1)
			}
		},
		positionOverlay: function(a) {
			var b = a.position || "middle center",
				c = "viewport" == a.relativeTo,
				d = a.offsetX,
				e = a.offsetY;
			c ? (hs.viewport.style.display = "block", a.hsKey = this.key, a.offsetWidth > a.parentNode.offsetWidth && (a.style.width = "100%")) : a.parentNode != this.overlayBox && this.overlayBox.appendChild(a);
			/left$/.test(b) && (a.style.left = d + "px");
			/center$/.test(b) && hs.setStyles(a, {
				left: "50%",
				marginLeft: d - Math.round(a.offsetWidth / 2) + "px"
			});
			/right$/.test(b) && (a.style.right = -d + "px");
			/^leftpanel$/.test(b) ? (hs.setStyles(a, {
				right: "100%",
				marginRight: this.x.cb + "px",
				top: -this.y.cb + "px",
				bottom: -this.y.cb + "px",
				overflow: "auto"
			}), this.x.p1 = a.offsetWidth) : /^rightpanel$/.test(b) && (hs.setStyles(a, {
				left: "100%",
				marginLeft: this.x.cb + "px",
				top: -this.y.cb + "px",
				bottom: -this.y.cb + "px",
				overflow: "auto"
			}), this.x.p2 = a.offsetWidth);
			d = a.parentNode.offsetHeight;
			a.style.height = "auto";
			c && a.offsetHeight > d && (a.style.height = hs.ieLt7 ? d + "px" : "100%");
			/^top/.test(b) && (a.style.top = e + "px");
			/^middle/.test(b) && hs.setStyles(a, {
				top: "50%",
				marginTop: e - Math.round(a.offsetHeight / 2) + "px"
			});
			/^bottom/.test(b) && (a.style.bottom = -e + "px");
			/^above$/.test(b) ? (hs.setStyles(a, {
				left: -this.x.p1 - this.x.cb + "px",
				right: -this.x.p2 - this.x.cb + "px",
				bottom: "100%",
				marginBottom: this.y.cb + "px",
				width: "auto"
			}), this.y.p1 = a.offsetHeight) : /^below$/.test(b) && (hs.setStyles(a, {
				position: "relative",
				left: -this.x.p1 - this.x.cb + "px",
				right: -this.x.p2 - this.x.cb + "px",
				top: "100%",
				marginTop: this.y.cb + "px",
				width: "auto"
			}), this.y.p2 = a.offsetHeight, a.style.position = "absolute")
		},
		getOverlays: function() {
			this.getInline(["heading", "caption"], !0);
			this.getNumber();
			this.heading && this.dragByHeading && (this.heading.className += " highslide-move");
			hs.showCredits && this.writeCredits();
			for (var a = 0; a < hs.overlays.length; a++) {
				var b = hs.overlays[a],
					c = b.thumbnailId,
					d = b.slideshowGroup;
				(!c && !d || c && c == this.thumbsUserSetId || d && d === this.slideshowGroup) && this.createOverlay(b)
			}
			c = [];
			for (a = 0; a < this.overlays.length; a++) b = hs.$("hsId" + this.overlays[a]), /panel$/.test(b.position) ? this.positionOverlay(b) : hs.push(c, b);
			for (a = 0; a < c.length; a++) this.positionOverlay(c[a]);
			this.gotOverlays = !0
		},
		genOverlayBox: function() {
			this.overlayBox || (this.overlayBox = hs.createElement("div", {
				className: this.wrapperClassName
			}, {
				position: "absolute",
				width: (this.x.size || (this.useBox ? this.width : null) || this.x.full) + "px",
				height: (this.y.size || this.y.full) + "px",
				visibility: "hidden",
				overflow: "hidden",
				zIndex: hs.ie ? 4 : "auto"
			}, hs.container, !0))
		},
		sizeOverlayBox: function(a, b) {
			var c = this.overlayBox,
				d = this.x,
				e = this.y;
			hs.setStyles(c, {
				width: d.size + "px",
				height: e.size + "px"
			});
			if (a || b) for (var f = 0; f < this.overlays.length; f++) {
				var g = hs.$("hsId" + this.overlays[f]),
					k = hs.ieLt7 || "BackCompat" == document.compatMode;
				g && /^(above|below)$/.test(g.position) && (k && (g.style.width = c.offsetWidth + 2 * d.cb + d.p1 + d.p2 + "px"), e["above" == g.position ? "p1" : "p2"] = g.offsetHeight);
				g && k && /^(left|right)panel$/.test(g.position) && (g.style.height = c.offsetHeight + 2 * e.cb + "px")
			}
			a && (hs.setStyles(this.content, {
				top: e.p1 + "px"
			}), hs.setStyles(c, {
				top: e.p1 + e.cb + "px"
			}))
		},
		showOverlays: function() {
			var a = this.overlayBox;
			a.className = "";
			hs.setStyles(a, {
				top: this.y.p1 + this.y.cb + "px",
				left: this.x.p1 + this.x.cb + "px",
				overflow: "visible"
			});
			hs.safari && (a.style.visibility = "visible");
			this.wrapper.appendChild(a);
			for (a = 0; a < this.overlays.length; a++) {
				var b = hs.$("hsId" + this.overlays[a]);
				b.style.zIndex = b.zIndex || 4;
				if (!b.hideOnMouseOut || this.mouseIsOver) b.style.visibility = "visible", hs.setStyles(b, {
					visibility: "visible",
					display: ""
				}), hs.animate(b, {
					opacity: b.opacity
				}, b.dur)
			}
		},
		destroyOverlays: function() {
			if (this.overlays.length) {
				if (this.slideshow) {
					var a = this.slideshow.controls;
					a && hs.getExpander(a) == this && a.parentNode.removeChild(a)
				}
				for (a = 0; a < this.overlays.length; a++) {
					var b = hs.$("hsId" + this.overlays[a]);
					b && b.parentNode == hs.viewport && hs.getExpander(b) == this && hs.discardElement(b)
				}
				hs.discardElement(this.overlayBox)
			}
		},
		createFullExpand: function() {
			this.slideshow && this.slideshow.controls ? this.slideshow.enable("full-expand") : (this.fullExpandLabel = hs.createElement("a", {
				href: "javascript:hs.expanders[" + this.key + "].doFullExpand();",
				title: hs.lang.fullExpandTitle,
				className: "highslide-full-expand"
			}), this.createOverlay({
				overlayId: this.fullExpandLabel,
				position: hs.fullExpandPosition,
				hideOnMouseOut: !0,
				opacity: hs.fullExpandOpacity
			}))
		},
		doFullExpand: function() {
			try {
				this.fullExpandLabel && hs.discardElement(this.fullExpandLabel);
				this.focus();
				var a = this.x.size,
					b = this.y.size;
				this.resizeTo(this.x.full, this.y.full);
				var c = this.x.pos - (this.x.size - a) / 2;
				c < hs.marginLeft && (c = hs.marginLeft);
				var d = this.y.pos - (this.y.size - b) / 2;
				d < hs.marginTop && (d = hs.marginTop);
				this.moveTo(c, d);
				this.doShowHide("hidden")
			} catch (e) {
				this.error(e)
			}
		},
		afterClose: function() {
			this.a.className = this.a.className.replace("highslide-active-anchor", "");
			this.doShowHide("visible");
			this.outline && this.outlineWhileAnimating && this.outline.destroy();
			hs.discardElement(this.wrapper);
			this.destroyOverlays();
			hs.viewport.childNodes.length || (hs.viewport.style.display = "none");
			this.dimmingOpacity && hs.undim(this.key);
			hs.expanders[this.key] = null;
			hs.reOrder()
		}
	};
	hs.Slideshow = function(a, b) {
		!1 !== hs.dynamicallyUpdateAnchors && hs.updateAnchors();
		this.expKey = a;
		for (var c in b) this[c] = b[c];
		this.useControls && this.getControls();
		this.thumbstrip && (this.thumbstrip = hs.Thumbstrip(this))
	};
	hs.Slideshow.prototype = {
		getControls: function() {
			this.controls = hs.createElement("div", {
				innerHTML: hs.replaceLang(hs.skin.controls)
			}, null, hs.container);
			var a = "play pause previous next move full-expand close".split(" ");
			this.btn = {};
			for (var b = 0; b < a.length; b++) this.btn[a[b]] = hs.getElementByClass(this.controls, "li", "highslide-" + a[b]), this.enable(a[b]);
			this.btn.pause.style.display = "none"
		},
		checkFirstAndLast: function() {
			if (!this.repeat && this.controls) {
				var a = hs.expanders[this.expKey],
					b = a.getAnchorIndex(),
					c = /disabled$/;
				0 == b ? this.disable("previous") : c.test(this.btn.previous.getElementsByTagName("a")[0].className) && this.enable("previous");
				b + 1 == hs.anchors.groups[a.slideshowGroup || "none"].length ? (this.disable("next"), this.disable("play")) : c.test(this.btn.next.getElementsByTagName("a")[0].className) && (this.enable("next"), this.enable("play"))
			}
		},
		enable: function(a) {
			if (this.btn) {
				var b = this,
					c = this.btn[a].getElementsByTagName("a")[0],
					d = /disabled$/;
				c.onclick = function() {
					b[a]();
					return !1
				};
				d.test(c.className) && (c.className = c.className.replace(d, ""))
			}
		},
		disable: function(a) {
			this.btn && (a = this.btn[a].getElementsByTagName("a")[0], a.onclick = function() {
				return !1
			}, /disabled$/.test(a.className) || (a.className += " disabled"))
		},
		hitSpace: function() {
			this.autoplay ? this.pause() : this.play()
		},
		play: function(a) {
			this.btn && (this.btn.play.style.display = "none", this.btn.pause.style.display = "");
			this.autoplay = !0;
			a || hs.next(this.expKey)
		},
		pause: function() {
			this.btn && (this.btn.pause.style.display = "none", this.btn.play.style.display = "");
			clearTimeout(this.autoplay);
			this.autoplay = null
		},
		previous: function() {
			this.pause();
			hs.previous(this.btn.previous)
		},
		next: function() {
			this.pause();
			hs.next(this.btn.next)
		},
		move: function() {},
		"full-expand": function() {
			hs.getExpander().doFullExpand()
		},
		close: function() {
			hs.close(this.btn.close)
		}
	};
	hs.Thumbstrip = function(a) {
		function b(a) {
			c(void 0, Math.round(a * p[l ? "offsetWidth" : "offsetHeight"] * .7))
		}
		function c(b, c) {
			if (void 0 === b) for (var e = 0; e < d.length; e++) if (d[e] == hs.expanders[a.expKey].a) {
				b = e;
				break
			}
			if (void 0 !== b) {
				var f = p.getElementsByTagName("a"),
					g = f[b],
					k = g.parentNode,
					n = "offset" + (l ? "Left" : "Top"),
					m = "offset" + (l ? "Width" : "Height"),
					y = r.parentNode.parentNode[m],
					v = y - x[m],
					w = parseInt(x.style[l ? "left" : "top"]) || 0,
					q = w;
				if (void 0 !== c) q = w - c, 0 < v && (v = 0), 0 < q && (q = 0), q < v && (q = v);
				else {
					for (e = 0; e < f.length; e++) f[e].className = "";
					g.className = "highslide-active-anchor";
					e = 0 < b ? f[b - 1].parentNode[n] : k[n];
					f = k[n] + k[m] + (f[b + 1] ? f[b + 1].parentNode[m] : 0);
					f > y - w ? q = y - f : e < -w && (q = -e)
				}
				k = k[n] + (k[m] - z[m]) / 2 + q;
				hs.animate(x, l ? {
					left: q
				} : {
					top: q
				}, null, "easeOutQuad");
				hs.animate(z, l ? {
					left: k
				} : {
					top: k
				}, null, "easeOutQuad");
				s.style.display = 0 > q ? "block" : "none";
				t.style.display = q > v ? "block" : "none"
			}
		}
		for (var d = hs.anchors.groups[hs.expanders[a.expKey].slideshowGroup || "none"], e = a.thumbstrip, f = e.mode || "horizontal", g = "float" == f, k = g ? ["div", "ul", "li", "span"] : ["table", "tbody", "tr", "td"], l = "horizontal" == f, p = hs.createElement("div", {
			className: "highslide-thumbstrip highslide-thumbstrip-" + f,
			innerHTML: '<div class="highslide-thumbstrip-inner"><' + k[0] + "><" + k[1] + "></" + k[1] + "></" + k[0] + '></div><div class="highslide-scroll-up"><div></div></div><div class="highslide-scroll-down"><div></div></div><div class="highslide-marker"><div></div></div>'
		}, {
			display: "none"
		}, hs.container), n = p.childNodes, r = n[0], s = n[1], t = n[2], z = n[3], x = r.firstChild, n = p.getElementsByTagName(k[1])[0], A, m = 0; m < d.length; m++) 0 != m && l || (A = hs.createElement(k[2], null, null, n)), function() {
			var a = d[m],
				b = hs.createElement(k[3], null, null, A);
			hs.createElement("a", {
				href: a.href,
				title: a.title,
				onclick: function() {
					if (/highslide-active-anchor/.test(this.className)) return !1;
					hs.getExpander(this).focus();
					return hs.transit(a)
				},
				innerHTML: hs.stripItemFormatter ? hs.stripItemFormatter(a) : a.innerHTML
			}, null, b)
		}();
		g || (s.onclick = function() {
			b(-1)
		}, t.onclick = function() {
			b(1)
		}, hs.addEventListener(n, void 0 !== document.onmousewheel ? "mousewheel" : "DOMMouseScroll", function(a) {
			var c = 0;
			a = a || window.event;
			a.wheelDelta ? (c = a.wheelDelta / 120, hs.opera && (c = -c)) : a.detail && (c = -a.detail / 3);
			c && b(.2 * -c);
			a.preventDefault && a.preventDefault();
			a.returnValue = !1
		}));
		return {
			add: function(a) {
				hs.extend(e || {}, {
					overlayId: p,
					hsId: "thumbstrip",
					className: "highslide-thumbstrip-" + f + "-overlay " + (e.className || "")
				});
				hs.ieLt7 && (e.fade = 0);
				a.createOverlay(e);
				hs.setStyles(p.parentNode, {
					overflow: "hidden"
				})
			},
			selectThumb: c
		}
	};
	hs.langDefaults = hs.lang;
	var HsExpander = hs.Expander;
	hs.ie && window == window.top &&
	function() {
		try {
			document.documentElement.doScroll("left")
		} catch (a) {
			setTimeout(arguments.callee, 50);
			return
		}
		hs.ready()
	}();
	hs.addEventListener(document, "DOMContentLoaded", hs.ready);
	hs.addEventListener(window, "load", hs.ready);
	hs.addEventListener(document, "ready", function() {
		if (hs.expandCursor || hs.dimmingOpacity) {
			var a = function(a) {
					return "expression( ( ( ignoreMe = document.documentElement." + a + " ? document.documentElement." + a + " : document.body." + a + " ) ) + 'px' );"
				},
				b = function(a, b) {
					if (hs.ie && (9 > hs.uaVersion || d)) {
						var g = document.styleSheets[document.styleSheets.length - 1];
						"object" == typeof g.addRule && g.addRule(a, b)
					} else c.appendChild(document.createTextNode(a + " {" + b + "}"))
				},
				c = hs.createElement("style", {
					type: "text/css"
				}, null, document.getElementsByTagName("HEAD")[0]),
				d = "BackCompat" == document.compatMode;
			hs.expandCursor && b(".highslide img", "cursor: url(" + hs.graphicsDir + hs.expandCursor + "), pointer !important;");
			b(".highslide-viewport-size", hs.ie && (7 > hs.uaVersion || d) ? "position: absolute; left:" + a("scrollLeft") + "top:" + a("scrollTop") + "width:" + a("clientWidth") + "height:" + a("clientHeight") : "position: fixed; width: 100%; height: 100%; left: 0; top: 0")
		}
	});
	hs.addEventListener(window, "resize", function() {
		hs.getPageSize();
		if (hs.viewport) for (var a = 0; a < hs.viewport.childNodes.length; a++) {
			var b = hs.viewport.childNodes[a],
				c = hs.getExpander(b);
			c.positionOverlay(b);
			"thumbstrip" == b.hsId && c.slideshow.thumbstrip.selectThumb()
		}
	});
	hs.addEventListener(document, "mousemove", function(a) {
		hs.mouse = {
			x: a.clientX,
			y: a.clientY
		}
	});
	hs.addEventListener(document, "mousedown", hs.mouseClickHandler);
	hs.addEventListener(document, "mouseup", hs.mouseClickHandler);
	hs.addEventListener(document, "ready", hs.getAnchors);
	hs.addEventListener(window, "load", hs.preloadImages)
};
