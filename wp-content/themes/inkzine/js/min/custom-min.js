!function(e){e.fn.marquee=function(a){return this.each(function(){function t(e){var a=[];for(var t in e)e.hasOwnProperty(t)&&a.push(t+":"+e[t]);return a.push(),"{"+a.join(",")+"}"}function r(){return f&&n.allowCss3Support?o.css(c,"paused"):void(e.fn.pause&&(o.pause(),s.trigger("paused")))}function i(){return f&&n.allowCss3Support?o.css(c,"running"):void(e.fn.resume&&(o.resume(),s.trigger("resumed")))}var n=e.extend({},e.fn.marquee.defaults,a),s=e(this),o,d,u,p,l,c="animation-play-state",f=!1;"undefined"!=typeof s.data().delaybeforestart&&(s.data().delayBeforeStart=s.data().delaybeforestart,delete s.data().delaybeforestart),"undefined"!=typeof s.data().pauseonhover&&(s.data().pauseOnHover=s.data().pauseonhover,delete s.data().pauseonhover),"undefined"!=typeof s.data().pauseoncycle&&(s.data().pauseOnCycle=s.data().pauseoncycle,delete s.data().pauseoncycle),"undefined"!=typeof s.data().allowcss3support&&(s.data().allowCss3Support=s.data().allowcss3support,delete s.data().allowcss3support),n=e.extend({},n,s.data()),n.duration=n.speed||n.duration,p="up"==n.direction||"down"==n.direction,n.gap=n.duplicated?n.gap:0,s.wrapInner('<div class="js-marquee"></div>');var m=s.find(".js-marquee").css({"margin-right":n.gap,"float":"left"});if(n.duplicated&&m.clone().appendTo(s),s.wrapInner('<div style="width:100000px" class="js-marquee-wrapper"></div>'),o=s.find(".js-marquee-wrapper"),p){var y=s.height();o.removeAttr("style"),s.height(y),s.find(".js-marquee").css({"float":"none","margin-bottom":n.gap,"margin-right":0}),n.duplicated&&s.find(".js-marquee:last").css({"margin-bottom":0});var h=s.find(".js-marquee:first").height()+n.gap;n.duration=(parseInt(h,10)+parseInt(y,10))/parseInt(y,10)*n.duration}else l=s.find(".js-marquee:first").width()+n.gap,d=s.width(),n.duration=(parseInt(l,10)+parseInt(d,10))/parseInt(d,10)*n.duration;if(n.duplicated&&(n.duration=n.duration/2),n.allowCss3Support){var g=document.createElement("div"),x="animation",j="marqueeAnimation-"+Math.floor(1e7*Math.random()),v="Webkit Moz O ms Khtml".split(" "),w="",Q="",b=e("style"),S="";if(g.style.animationCssStr&&(f=!0),f===!1)for(var q=0;q<v.length;q++)if(void 0!==g.style[v[q]+"AnimationName"]){var C="-"+v[q].toLowerCase()+"-";w=C+"animation",c=C+c,S="@"+C+"keyframes "+j+" ",f=!0;break}f&&(Q=j+" "+n.duration/1e3+"s "+n.delayBeforeStart/1e3+"s infinite "+n.css3easing)}var O=function(){if(p?n.duplicated?(o.css("margin-top","up"==n.direction?0:"-"+h+"px"),u={"margin-top":"up"==n.direction?"-"+h+"px":0}):(o.css("margin-top","up"==n.direction?y+"px":"-"+h+"px"),u={"margin-top":"up"==n.direction?"-"+o.height()+"px":y+"px"}):n.duplicated?(o.css("margin-left","left"==n.direction?0:"-"+l+"px"),u={"margin-left":"left"==n.direction?"-"+l+"px":0}):(o.css("margin-left","left"==n.direction?d+"px":"-"+l+"px"),u={"margin-left":"left"==n.direction?"-"+l+"px":d+"px"}),s.trigger("beforeStarting"),f){o.css(w,Q);var a=S+" { 100%  "+t(u)+"}";0!=b.length?b.last().append(a):e("head").append("<style>"+a+"</style>")}else o.animate(u,n.duration,n.easing,function(){s.trigger("finished"),n.pauseOnCycle?setTimeout(O,n.delayBeforeStart):O()})};s.bind("pause",r),s.bind("resume",i),n.pauseOnHover&&s.hover(r,i),f&&n.allowCss3Support?O():setTimeout(O,n.delayBeforeStart)})},e.fn.marquee.defaults={allowCss3Support:!0,css3easing:"linear",easing:"linear",delayBeforeStart:0,direction:"left",duplicated:!1,duration:5e3,gap:20,pauseOnCycle:!1,pauseOnHover:!1}}(jQuery),jQuery(document).ready(function(){jQuery(".bxtickr").marquee({duration:5e4,gap:50,delayBeforeStart:500,direction:"left",duplicated:!0,pauseOnHover:!0}),jQuery(".bxslider li").hover(function(){jQuery(this).find(".bx-caption").animate({marginBottom:10},300)},function(){jQuery(this).find(".bx-caption").animate({marginBottom:-80},300)}),jQuery("a.meta-link-img").nivoLightbox();var e=jQuery("#masonry");e.imagesLoaded(function(){e.masonry({itemSelector:".homepage-article",gutter:20})}),jQuery("#fixed-search span.show-fake").click(function(){jQuery("#fixed-search span.show-fake").hide(),jQuery("#fixed-search input[type=text]").css("width","0px").show().animate({width:"200px"},500),jQuery("#fixed-search").css("bottom","-48px"),jQuery.browser.mozilla&&jQuery("#fixed-search").css("bottom","-44px"),jQuery("#fixed-search input[type=text]").focus()}),jQuery("#fixed-search input[type=text]").focusout(function(){jQuery("#fixed-search input[type=text]").hide(),jQuery("#fixed-search").css("bottom","-40px"),jQuery("#fixed-search span.show-fake").show(),jQuery.browser.mozilla&&jQuery("#fixed-search").css("bottom","-42px")}),jQuery.browser.mozilla&&(jQuery("#fixed-search").css("bottom","-42px"),jQuery("#fixed-search").css("box-shadow","0px 3px 2px #8a8a8a")),jQuery(function(){jQuery.stellar({horizontalScrolling:!1,verticalOffset:40})})});