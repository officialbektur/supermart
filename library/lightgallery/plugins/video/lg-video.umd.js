/*!
 * lightgallery | 2.7.1 | January 11th 2023
 * http://www.lightgalleryjs.com/
 * Copyright (c) 2020 Sachin Neravath;
 * @license GPLv3
 */
!function(e,o){"object"==typeof exports&&"undefined"!=typeof module?module.exports=o():"function"==typeof define&&define.amd?define(o):(e="undefined"!=typeof globalThis?globalThis:e||self).lgVideo=o()}(this,(function(){"use strict";
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
    ***************************************************************************** */var e=function(){return e=Object.assign||function(e){for(var o,i=1,t=arguments.length;i<t;i++)for(var s in o=arguments[i])Object.prototype.hasOwnProperty.call(o,s)&&(e[s]=o[s]);return e},e.apply(this,arguments)},o={autoplayFirstVideo:!0,youTubePlayerParams:!1,vimeoPlayerParams:!1,wistiaPlayerParams:!1,gotoNextSlideOnVideoEnd:!0,autoplayVideoOnSlide:!1,videojs:!1,videojsTheme:"",videojsOptions:{}},i="lgHasVideo",t="lgSlideItemLoad",s="lgBeforeSlide",n="lgAfterSlide",l="lgPosterClick",r=function(e){return Object.keys(e).map((function(o){return encodeURIComponent(o)+"="+encodeURIComponent(e[o])})).join("&")},d=function(o,i){if(!o.youtube)return"";var t=o.youtube[2]?o.youtube[2].slice(1).split("&").map((function(e){return e.split("=")})).reduce((function(e,o){var i=o.map(decodeURIComponent),t=i[0],s=i[1];return e[t]=s,e}),{}):"",s=i||{},n=e(e(e({},{wmode:"opaque",autoplay:0,mute:1,enablejsapi:1}),s),t);return"?"+r(n)};return function(){function a(i){return this.core=i,this.settings=e(e({},o),this.core.settings),this}return a.prototype.init=function(){var e=this;this.core.LGel.on(i+".video",this.onHasVideo.bind(this)),this.core.LGel.on(l+".video",(function(){var o=e.core.getSlideItem(e.core.index);e.loadVideoOnPosterClick(o)})),this.core.LGel.on(t+".video",this.onSlideItemLoad.bind(this)),this.core.LGel.on(s+".video",this.onBeforeSlide.bind(this)),this.core.LGel.on(n+".video",this.onAfterSlide.bind(this))},a.prototype.onSlideItemLoad=function(e){var o=this,i=e.detail,t=i.isFirstSlide,s=i.index;this.settings.autoplayFirstVideo&&t&&s===this.core.index&&setTimeout((function(){o.loadAndPlayVideo(s)}),200),!t&&this.settings.autoplayVideoOnSlide&&s===this.core.index&&this.loadAndPlayVideo(s)},a.prototype.onHasVideo=function(e){var o=e.detail,i=o.index,t=o.src,s=o.html5Video;o.hasPoster||(this.appendVideos(this.core.getSlideItem(i),{src:t,addClass:"lg-object",index:i,html5Video:s}),this.gotoNextSlideOnVideoEnd(t,i))},a.prototype.onBeforeSlide=function(e){if(this.core.lGalleryOn){var o=e.detail.prevIndex;this.pauseVideo(o)}},a.prototype.onAfterSlide=function(e){var o=this,i=e.detail,t=i.index,s=i.prevIndex,n=this.core.getSlideItem(t);this.settings.autoplayVideoOnSlide&&t!==s&&n.hasClass("lg-complete")&&setTimeout((function(){o.loadAndPlayVideo(t)}),100)},a.prototype.loadAndPlayVideo=function(e){var o=this.core.getSlideItem(e);this.core.galleryItems[e].poster?this.loadVideoOnPosterClick(o,!0):this.playVideo(e)},a.prototype.playVideo=function(e){this.controlVideo(e,"play")},a.prototype.pauseVideo=function(e){this.controlVideo(e,"pause")},a.prototype.getVideoHtml=function(e,o,i,t){var s="",n=this.core.galleryItems[i].__slideVideoInfo||{},l=this.core.galleryItems[i],a=l.title||l.alt;a=a?'title="'+a+'"':"";var c='allowtransparency="true"\n            frameborder="0"\n            scrolling="no"\n            allowfullscreen\n            mozallowfullscreen\n            webkitallowfullscreen\n            oallowfullscreen\n            msallowfullscreen';if(n.youtube){var u="lg-youtube"+i,f=d(n,this.settings.youTubePlayerParams);s='<iframe allow="autoplay" id='+u+' class="lg-video-object lg-youtube '+o+'" '+a+' src="'+(e.includes("youtube-nocookie.com")?"//www.youtube-nocookie.com/":"//www.youtube.com/")+"embed/"+(n.youtube[1]+f)+'" '+c+"></iframe>"}else if(n.vimeo){u="lg-vimeo"+i;var h=function(e,o){if(!o||!o.vimeo)return"";var i=o.vimeo[2]||"",t=e&&0!==Object.keys(e).length?"&"+r(e):"",s=((o.vimeo[0].split("/").pop()||"").split("?")[0]||"").split("#")[0],n=o.vimeo[1]!==s;return n&&(i=i.replace("/"+s,"")),"?autoplay=0&muted=1"+(n?"&h="+s:"")+t+("?"==i[0]?"&"+i.slice(1):i||"")}(this.settings.vimeoPlayerParams,n);s='<iframe allow="autoplay" id='+u+' class="lg-video-object lg-vimeo '+o+'" '+a+' src="//player.vimeo.com/video/'+(n.vimeo[1]+h)+'" '+c+"></iframe>"}else if(n.wistia){var p="lg-wistia"+i;h=(h=r(this.settings.wistiaPlayerParams))?"?"+h:"",s='<iframe allow="autoplay" id="'+p+'" src="//fast.wistia.net/embed/iframe/'+(n.wistia[4]+h)+'" '+a+' class="wistia_embed lg-video-object lg-wistia '+o+'" name="wistia_embed" '+c+"></iframe>"}else if(n.html5){for(var y="",g=0;g<t.source.length;g++)y+='<source src="'+t.source[g].src+'" type="'+t.source[g].type+'">';if(t.tracks){var v=function(e){var o="",i=t.tracks[e];Object.keys(i||{}).forEach((function(e){o+=e+'="'+i[e]+'" '})),y+="<track "+o+">"};for(g=0;g<t.tracks.length;g++)v(g)}var m="",w=t.attributes||{};Object.keys(w||{}).forEach((function(e){m+=e+'="'+w[e]+'" '})),s='<video class="lg-video-object lg-html5 '+(this.settings.videojs&&this.settings.videojsTheme?this.settings.videojsTheme+" ":"")+" "+(this.settings.videojs?" video-js":"")+'" '+m+">\n                "+y+"\n                Your browser does not support HTML5 video.\n            </video>"}return s},a.prototype.appendVideos=function(e,o){var i,t=this.getVideoHtml(o.src,o.addClass,o.index,o.html5Video);e.find(".lg-video-cont").append(t);var s=e.find(".lg-video-object").first();if(o.html5Video&&s.on("mousedown.lg.video",(function(e){e.stopPropagation()})),this.settings.videojs&&(null===(i=this.core.galleryItems[o.index].__slideVideoInfo)||void 0===i?void 0:i.html5))try{return videojs(s.get(),this.settings.videojsOptions)}catch(e){console.error("lightGallery:- Make sure you have included videojs")}},a.prototype.gotoNextSlideOnVideoEnd=function(e,o){var i=this,t=this.core.getSlideItem(o).find(".lg-video-object").first(),s=this.core.galleryItems[o].__slideVideoInfo||{};if(this.settings.gotoNextSlideOnVideoEnd)if(s.html5)t.on("ended",(function(){i.core.goToNextSlide()}));else if(s.vimeo)try{new Vimeo.Player(t.get()).on("ended",(function(){i.core.goToNextSlide()}))}catch(e){console.error("lightGallery:- Make sure you have included //github.com/vimeo/player.js")}else if(s.wistia)try{window._wq=window._wq||[],window._wq.push({id:t.attr("id"),onReady:function(e){e.bind("end",(function(){i.core.goToNextSlide()}))}})}catch(e){console.error("lightGallery:- Make sure you have included //fast.wistia.com/assets/external/E-v1.js")}},a.prototype.controlVideo=function(e,o){var i=this.core.getSlideItem(e).find(".lg-video-object").first(),t=this.core.galleryItems[e].__slideVideoInfo||{};if(i.get())if(t.youtube)try{i.get().contentWindow.postMessage('{"event":"command","func":"'+o+'Video","args":""}',"*")}catch(e){console.error("lightGallery:- "+e)}else if(t.vimeo)try{new Vimeo.Player(i.get())[o]()}catch(e){console.error("lightGallery:- Make sure you have included //github.com/vimeo/player.js")}else if(t.html5)if(this.settings.videojs)try{videojs(i.get())[o]()}catch(e){console.error("lightGallery:- Make sure you have included videojs")}else i.get()[o]();else if(t.wistia)try{window._wq=window._wq||[],window._wq.push({id:i.attr("id"),onReady:function(e){e[o]()}})}catch(e){console.error("lightGallery:- Make sure you have included //fast.wistia.com/assets/external/E-v1.js")}},a.prototype.loadVideoOnPosterClick=function(e,o){var i=this;if(e.hasClass("lg-video-loaded"))o&&this.playVideo(this.core.index);else if(e.hasClass("lg-has-video"))this.playVideo(this.core.index);else{e.addClass("lg-has-video");var t=void 0,s=this.core.galleryItems[this.core.index].src,n=this.core.galleryItems[this.core.index].video;n&&(t="string"==typeof n?JSON.parse(n):n);var l=this.appendVideos(e,{src:s,addClass:"",index:this.core.index,html5Video:t});this.gotoNextSlideOnVideoEnd(s,this.core.index);var r=e.find(".lg-object").first().get();e.find(".lg-video-cont").first().append(r),e.addClass("lg-video-loading"),l&&l.ready((function(){l.on("loadedmetadata",(function(){i.onVideoLoadAfterPosterClick(e,i.core.index)}))})),e.find(".lg-video-object").first().on("load.lg error.lg loadedmetadata.lg",(function(){setTimeout((function(){i.onVideoLoadAfterPosterClick(e,i.core.index)}),50)}))}},a.prototype.onVideoLoadAfterPosterClick=function(e,o){e.addClass("lg-video-loaded"),this.playVideo(o)},a.prototype.destroy=function(){this.core.LGel.off(".lg.video"),this.core.LGel.off(".video")},a}()}));