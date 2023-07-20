/*!
 * lightgallery | 2.7.1 | January 11th 2023
 * http://www.lightgalleryjs.com/
 * Copyright (c) 2020 Sachin Neravath;
 * @license GPLv3
 */
!function(t,e){"object"==typeof exports&&"undefined"!=typeof module?module.exports=e():"function"==typeof define&&define.amd?define(e):(t="undefined"!=typeof globalThis?globalThis:t||self).lgHash=e()}(this,(function(){"use strict";
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
    ***************************************************************************** */var t=function(){return t=Object.assign||function(t){for(var e,i=1,o=arguments.length;i<o;i++)for(var s in e=arguments[i])Object.prototype.hasOwnProperty.call(e,s)&&(t[s]=e[s]);return t},t.apply(this,arguments)},e="lgAfterSlide",i="lgAfterClose",o={hash:!0,galleryId:"1",customSlideName:!1};return function(){function s(e,i){return this.core=e,this.$LG=i,this.settings=t(t({},o),this.core.settings),this}return s.prototype.init=function(){var t=this;this.settings.hash&&(this.oldHash=window.location.hash,setTimeout((function(){t.buildFromHash()}),100),this.core.LGel.on(e+".hash",this.onAfterSlide.bind(this)),this.core.LGel.on(i+".hash",this.onCloseAfter.bind(this)),this.$LG(window).on("hashchange.lg.hash.global"+this.core.lgId,this.onHashchange.bind(this)))},s.prototype.onAfterSlide=function(t){var e=this.core.galleryItems[t.detail.index].slideName;e=this.settings.customSlideName&&e||t.detail.index,history.replaceState?history.replaceState(null,"",window.location.pathname+window.location.search+"#lg="+this.settings.galleryId+"&slide="+e):window.location.hash="lg="+this.settings.galleryId+"&slide="+e},s.prototype.getIndexFromUrl=function(t){void 0===t&&(t=window.location.hash);var e=t.split("&slide=")[1],i=0;if(this.settings.customSlideName)for(var o=0;o<this.core.galleryItems.length;o++){if(this.core.galleryItems[o].slideName===e){i=o;break}}else i=parseInt(e,10);return isNaN(i)?0:i},s.prototype.buildFromHash=function(){var t=window.location.hash;if(t.indexOf("lg="+this.settings.galleryId)>0){this.$LG(document.body).addClass("lg-from-hash");var e=this.getIndexFromUrl(t);return this.core.openGallery(e),!0}},s.prototype.onCloseAfter=function(){this.oldHash&&this.oldHash.indexOf("lg="+this.settings.galleryId)<0?history.replaceState?history.replaceState(null,"",this.oldHash):window.location.hash=this.oldHash:history.replaceState?history.replaceState(null,document.title,window.location.pathname+window.location.search):window.location.hash=""},s.prototype.onHashchange=function(){if(this.core.lgOpened){var t=window.location.hash,e=this.getIndexFromUrl(t);t.indexOf("lg="+this.settings.galleryId)>-1?this.core.slide(e,!1,!1):this.core.lGalleryOn&&this.core.closeGallery()}},s.prototype.closeGallery=function(){this.settings.hash&&this.$LG(document.body).removeClass("lg-from-hash")},s.prototype.destroy=function(){this.core.LGel.off(".lg.hash"),this.core.LGel.off(".hash"),this.$LG(window).off("hashchange.lg.hash.global"+this.core.lgId)},s}()}));