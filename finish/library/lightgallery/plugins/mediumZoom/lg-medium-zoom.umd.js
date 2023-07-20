/*!
 * lightgallery | 2.7.1 | January 11th 2023
 * http://www.lightgalleryjs.com/
 * Copyright (c) 2020 Sachin Neravath;
 * @license GPLv3
 */
!function(o,t){"object"==typeof exports&&"undefined"!=typeof module?module.exports=t():"function"==typeof define&&define.amd?define(t):(o="undefined"!=typeof globalThis?globalThis:o||self).lgMediumZoom=t()}(this,(function(){"use strict";
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
    ***************************************************************************** */var o=function(){return o=Object.assign||function(o){for(var t,e=1,i=arguments.length;e<i;e++)for(var n in t=arguments[e])Object.prototype.hasOwnProperty.call(t,n)&&(o[n]=t[n]);return o},o.apply(this,arguments)},t="lgBeforeOpen",e={margin:40,mediumZoom:!0,backgroundColor:"#000"};return function(){function i(t,i){var n=this;this.core=t,this.$LG=i,this.core.getMediaContainerPosition=function(){return{top:n.settings.margin,bottom:n.settings.margin}};var s={controls:!1,download:!1,counter:!1,showCloseIcon:!1,extraProps:["lgBackgroundColor"],closeOnTap:!1,enableSwipe:!1,enableDrag:!1,swipeToClose:!1,addClass:this.core.settings.addClass+" lg-medium-zoom"};return this.core.settings=o(o({},this.core.settings),s),this.settings=o(o(o({},e),this.core.settings),s),this}return i.prototype.toggleItemClass=function(){for(var o=0;o<this.core.items.length;o++){this.$LG(this.core.items[o]).toggleClass("lg-medium-zoom-item")}},i.prototype.init=function(){var o=this;this.settings.mediumZoom&&(this.core.LGel.on(t+".medium",(function(){o.core.$backdrop.css("background-color",o.core.galleryItems[o.core.index].lgBackgroundColor||o.settings.backgroundColor)})),this.toggleItemClass(),this.core.outer.on("click.lg.medium",(function(){o.core.closeGallery()})))},i.prototype.destroy=function(){this.toggleItemClass()},i}()}));