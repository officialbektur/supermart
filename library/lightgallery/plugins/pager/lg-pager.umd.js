/*!
 * lightgallery | 2.7.1 | January 11th 2023
 * http://www.lightgalleryjs.com/
 * Copyright (c) 2020 Sachin Neravath;
 * @license GPLv3
 */
!function(e,t){"object"==typeof exports&&"undefined"!=typeof module?module.exports=t():"function"==typeof define&&define.amd?define(t):(e="undefined"!=typeof globalThis?globalThis:e||self).lgPager=t()}(this,(function(){"use strict";
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
    ***************************************************************************** */var e=function(){return e=Object.assign||function(e){for(var t,r=1,o=arguments.length;r<o;r++)for(var i in t=arguments[r])Object.prototype.hasOwnProperty.call(t,i)&&(e[i]=t[i]);return e},e.apply(this,arguments)},t="lgUpdateSlides",r="lgBeforeSlide",o={pager:!0};return function(){function i(t,r){return this.core=t,this.$LG=r,this.settings=e(e({},o),this.core.settings),this}return i.prototype.getPagerHtml=function(e){for(var t="",r=0;r<e.length;r++)t+='<span  data-lg-item-id="'+r+'" class="lg-pager-cont"> \n                    <span data-lg-item-id="'+r+'" class="lg-pager"></span>\n                    <div class="lg-pager-thumb-cont"><span class="lg-caret"></span> <img src="'+e[r].thumb+'" /></div>\n                    </span>';return t},i.prototype.init=function(){var e=this;if(this.settings.pager){var o;this.core.$lgComponents.prepend('<div class="lg-pager-outer"></div>');var i=this.core.outer.find(".lg-pager-outer");i.html(this.getPagerHtml(this.core.galleryItems)),i.first().on("click.lg touchend.lg",(function(t){var r=e.$LG(t.target);if(r.hasAttribute("data-lg-item-id")){var o=parseInt(r.attr("data-lg-item-id"));e.core.slide(o,!1,!0,!1)}})),i.first().on("mouseover.lg",(function(){clearTimeout(o),i.addClass("lg-pager-hover")})),i.first().on("mouseout.lg",(function(){o=setTimeout((function(){i.removeClass("lg-pager-hover")}))})),this.core.LGel.on(r+".pager",(function(t){var r=t.detail.index;e.manageActiveClass.call(e,r)})),this.core.LGel.on(t+".pager",(function(){i.empty(),i.html(e.getPagerHtml(e.core.galleryItems)),e.manageActiveClass(e.core.index)}))}},i.prototype.manageActiveClass=function(e){var t=this.core.outer.find(".lg-pager-cont");t.removeClass("lg-pager-active"),t.eq(e).addClass("lg-pager-active")},i.prototype.destroy=function(){this.core.outer.find(".lg-pager-outer").remove(),this.core.LGel.off(".lg.pager"),this.core.LGel.off(".pager")},i}()}));