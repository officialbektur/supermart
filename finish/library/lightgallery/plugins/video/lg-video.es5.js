/*!
 * lightgallery | 2.7.1 | January 11th 2023
 * http://www.lightgalleryjs.com/
 * Copyright (c) 2020 Sachin Neravath;
 * @license GPLv3
 */
/*! *****************************************************************************
Copyright (c) Microsoft Corporation.

Permission to use, copy, modify, and/or distribute this software for any
purpose with or without fee is hereby granted.

THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES WITH
REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF MERCHANTABILITY
AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY SPECIAL, DIRECT,
INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES WHATSOEVER RESULTING FROM
LOSS OF USE, DATA OR PROFITS, WHETHER IN AN ACTION OF CONTRACT, NEGLIGENCE OR
OTHER TORTIOUS ACTION, ARISING OUT OF OR IN CONNECTION WITH THE USE OR
PERFORMANCE OF THIS SOFTWARE.
***************************************************************************** */
var __assign=function(){return __assign=Object.assign||function(e){for(var o,t=1,i=arguments.length;t<i;t++)for(var s in o=arguments[t])Object.prototype.hasOwnProperty.call(o,s)&&(e[s]=o[s]);return e},__assign.apply(this,arguments)},videoSettings={autoplayFirstVideo:!0,youTubePlayerParams:!1,vimeoPlayerParams:!1,wistiaPlayerParams:!1,gotoNextSlideOnVideoEnd:!0,autoplayVideoOnSlide:!1,videojs:!1,videojsTheme:"",videojsOptions:{}},lGEvents={afterAppendSlide:"lgAfterAppendSlide",init:"lgInit",hasVideo:"lgHasVideo",containerResize:"lgContainerResize",updateSlides:"lgUpdateSlides",afterAppendSubHtml:"lgAfterAppendSubHtml",beforeOpen:"lgBeforeOpen",afterOpen:"lgAfterOpen",slideItemLoad:"lgSlideItemLoad",beforeSlide:"lgBeforeSlide",afterSlide:"lgAfterSlide",posterClick:"lgPosterClick",dragStart:"lgDragStart",dragMove:"lgDragMove",dragEnd:"lgDragEnd",beforeNextSlide:"lgBeforeNextSlide",beforePrevSlide:"lgBeforePrevSlide",beforeClose:"lgBeforeClose",afterClose:"lgAfterClose",rotateLeft:"lgRotateLeft",rotateRight:"lgRotateRight",flipHorizontal:"lgFlipHorizontal",flipVertical:"lgFlipVertical",autoplay:"lgAutoplay",autoplayStart:"lgAutoplayStart",autoplayStop:"lgAutoplayStop"},param=function(e){return Object.keys(e).map((function(o){return encodeURIComponent(o)+"="+encodeURIComponent(e[o])})).join("&")},paramsToObject=function(e){return e.slice(1).split("&").map((function(e){return e.split("=")})).reduce((function(e,o){var t=o.map(decodeURIComponent),i=t[0],s=t[1];return e[i]=s,e}),{})},getYouTubeParams=function(e,o){if(!e.youtube)return"";var t=e.youtube[2]?paramsToObject(e.youtube[2]):"",i=o||{},s=__assign(__assign(__assign({},{wmode:"opaque",autoplay:0,mute:1,enablejsapi:1}),i),t);return"?"+param(s)},isYouTubeNoCookie=function(e){return e.includes("youtube-nocookie.com")},getVimeoURLParams=function(e,o){if(!o||!o.vimeo)return"";var t=o.vimeo[2]||"",i=e&&0!==Object.keys(e).length?"&"+param(e):"",s=((o.vimeo[0].split("/").pop()||"").split("?")[0]||"").split("#")[0],l=o.vimeo[1]!==s;return l&&(t=t.replace("/"+s,"")),"?autoplay=0&muted=1"+(l?"&h="+s:"")+i+(t="?"==t[0]?"&"+t.slice(1):t||"")},Video=function(){function e(e){return this.core=e,this.settings=__assign(__assign({},videoSettings),this.core.settings),this}return e.prototype.init=function(){var e=this;this.core.LGel.on(lGEvents.hasVideo+".video",this.onHasVideo.bind(this)),this.core.LGel.on(lGEvents.posterClick+".video",(function(){var o=e.core.getSlideItem(e.core.index);e.loadVideoOnPosterClick(o)})),this.core.LGel.on(lGEvents.slideItemLoad+".video",this.onSlideItemLoad.bind(this)),this.core.LGel.on(lGEvents.beforeSlide+".video",this.onBeforeSlide.bind(this)),this.core.LGel.on(lGEvents.afterSlide+".video",this.onAfterSlide.bind(this))},e.prototype.onSlideItemLoad=function(e){var o=this,t=e.detail,i=t.isFirstSlide,s=t.index;this.settings.autoplayFirstVideo&&i&&s===this.core.index&&setTimeout((function(){o.loadAndPlayVideo(s)}),200),!i&&this.settings.autoplayVideoOnSlide&&s===this.core.index&&this.loadAndPlayVideo(s)},e.prototype.onHasVideo=function(e){var o=e.detail,t=o.index,i=o.src,s=o.html5Video;o.hasPoster||(this.appendVideos(this.core.getSlideItem(t),{src:i,addClass:"lg-object",index:t,html5Video:s}),this.gotoNextSlideOnVideoEnd(i,t))},e.prototype.onBeforeSlide=function(e){if(this.core.lGalleryOn){var o=e.detail.prevIndex;this.pauseVideo(o)}},e.prototype.onAfterSlide=function(e){var o=this,t=e.detail,i=t.index,s=t.prevIndex,l=this.core.getSlideItem(i);this.settings.autoplayVideoOnSlide&&i!==s&&l.hasClass("lg-complete")&&setTimeout((function(){o.loadAndPlayVideo(i)}),100)},e.prototype.loadAndPlayVideo=function(e){var o=this.core.getSlideItem(e);this.core.galleryItems[e].poster?this.loadVideoOnPosterClick(o,!0):this.playVideo(e)},e.prototype.playVideo=function(e){this.controlVideo(e,"play")},e.prototype.pauseVideo=function(e){this.controlVideo(e,"pause")},e.prototype.getVideoHtml=function(e,o,t,i){var s="",l=this.core.galleryItems[t].__slideVideoInfo||{},r=this.core.galleryItems[t],n=r.title||r.alt;n=n?'title="'+n+'"':"";var a='allowtransparency="true"\n            frameborder="0"\n            scrolling="no"\n            allowfullscreen\n            mozallowfullscreen\n            webkitallowfullscreen\n            oallowfullscreen\n            msallowfullscreen';if(l.youtube){var d="lg-youtube"+t,c=getYouTubeParams(l,this.settings.youTubePlayerParams);s='<iframe allow="autoplay" id='+d+' class="lg-video-object lg-youtube '+o+'" '+n+' src="'+(isYouTubeNoCookie(e)?"//www.youtube-nocookie.com/":"//www.youtube.com/")+"embed/"+(l.youtube[1]+c)+'" '+a+"></iframe>"}else if(l.vimeo){d="lg-vimeo"+t;var u=getVimeoURLParams(this.settings.vimeoPlayerParams,l);s='<iframe allow="autoplay" id='+d+' class="lg-video-object lg-vimeo '+o+'" '+n+' src="//player.vimeo.com/video/'+(l.vimeo[1]+u)+'" '+a+"></iframe>"}else if(l.wistia){var g="lg-wistia"+t;u=(u=param(this.settings.wistiaPlayerParams))?"?"+u:"",s='<iframe allow="autoplay" id="'+g+'" src="//fast.wistia.net/embed/iframe/'+(l.wistia[4]+u)+'" '+n+' class="wistia_embed lg-video-object lg-wistia '+o+'" name="wistia_embed" '+a+"></iframe>"}else if(l.html5){for(var f="",p=0;p<i.source.length;p++)f+='<source src="'+i.source[p].src+'" type="'+i.source[p].type+'">';if(i.tracks){var h=function(e){var o="",t=i.tracks[e];Object.keys(t||{}).forEach((function(e){o+=e+'="'+t[e]+'" '})),f+="<track "+o+">"};for(p=0;p<i.tracks.length;p++)h(p)}var v="",m=i.attributes||{};Object.keys(m||{}).forEach((function(e){v+=e+'="'+m[e]+'" '})),s='<video class="lg-video-object lg-html5 '+(this.settings.videojs&&this.settings.videojsTheme?this.settings.videojsTheme+" ":"")+" "+(this.settings.videojs?" video-js":"")+'" '+v+">\n                "+f+"\n                Your browser does not support HTML5 video.\n            </video>"}return s},e.prototype.appendVideos=function(e,o){var t,i=this.getVideoHtml(o.src,o.addClass,o.index,o.html5Video);e.find(".lg-video-cont").append(i);var s=e.find(".lg-video-object").first();if(o.html5Video&&s.on("mousedown.lg.video",(function(e){e.stopPropagation()})),this.settings.videojs&&(null===(t=this.core.galleryItems[o.index].__slideVideoInfo)||void 0===t?void 0:t.html5))try{return videojs(s.get(),this.settings.videojsOptions)}catch(e){console.error("lightGallery:- Make sure you have included videojs")}},e.prototype.gotoNextSlideOnVideoEnd=function(e,o){var t=this,i=this.core.getSlideItem(o).find(".lg-video-object").first(),s=this.core.galleryItems[o].__slideVideoInfo||{};if(this.settings.gotoNextSlideOnVideoEnd)if(s.html5)i.on("ended",(function(){t.core.goToNextSlide()}));else if(s.vimeo)try{new Vimeo.Player(i.get()).on("ended",(function(){t.core.goToNextSlide()}))}catch(e){console.error("lightGallery:- Make sure you have included //github.com/vimeo/player.js")}else if(s.wistia)try{window._wq=window._wq||[],window._wq.push({id:i.attr("id"),onReady:function(e){e.bind("end",(function(){t.core.goToNextSlide()}))}})}catch(e){console.error("lightGallery:- Make sure you have included //fast.wistia.com/assets/external/E-v1.js")}},e.prototype.controlVideo=function(e,o){var t=this.core.getSlideItem(e).find(".lg-video-object").first(),i=this.core.galleryItems[e].__slideVideoInfo||{};if(t.get())if(i.youtube)try{t.get().contentWindow.postMessage('{"event":"command","func":"'+o+'Video","args":""}',"*")}catch(e){console.error("lightGallery:- "+e)}else if(i.vimeo)try{new Vimeo.Player(t.get())[o]()}catch(e){console.error("lightGallery:- Make sure you have included //github.com/vimeo/player.js")}else if(i.html5)if(this.settings.videojs)try{videojs(t.get())[o]()}catch(e){console.error("lightGallery:- Make sure you have included videojs")}else t.get()[o]();else if(i.wistia)try{window._wq=window._wq||[],window._wq.push({id:t.attr("id"),onReady:function(e){e[o]()}})}catch(e){console.error("lightGallery:- Make sure you have included //fast.wistia.com/assets/external/E-v1.js")}},e.prototype.loadVideoOnPosterClick=function(e,o){var t=this;if(e.hasClass("lg-video-loaded"))o&&this.playVideo(this.core.index);else if(e.hasClass("lg-has-video"))this.playVideo(this.core.index);else{e.addClass("lg-has-video");var i=void 0,s=this.core.galleryItems[this.core.index].src,l=this.core.galleryItems[this.core.index].video;l&&(i="string"==typeof l?JSON.parse(l):l);var r=this.appendVideos(e,{src:s,addClass:"",index:this.core.index,html5Video:i});this.gotoNextSlideOnVideoEnd(s,this.core.index);var n=e.find(".lg-object").first().get();e.find(".lg-video-cont").first().append(n),e.addClass("lg-video-loading"),r&&r.ready((function(){r.on("loadedmetadata",(function(){t.onVideoLoadAfterPosterClick(e,t.core.index)}))})),e.find(".lg-video-object").first().on("load.lg error.lg loadedmetadata.lg",(function(){setTimeout((function(){t.onVideoLoadAfterPosterClick(e,t.core.index)}),50)}))}},e.prototype.onVideoLoadAfterPosterClick=function(e,o){e.addClass("lg-video-loaded"),this.playVideo(o)},e.prototype.destroy=function(){this.core.LGel.off(".lg.video"),this.core.LGel.off(".video")},e}();export default Video;