/*!
 * lightgallery | 2.7.1 | January 11th 2023
 * http://www.lightgalleryjs.com/
 * Copyright (c) 2020 Sachin Neravath;
 * @license GPLv3
 */
!function(t,e){"object"==typeof exports&&"undefined"!=typeof module?module.exports=e():"function"==typeof define&&define.amd?define(e):(t="undefined"!=typeof globalThis?globalThis:t||self).lgVimeoThumbnail=e()}(this,(function(){"use strict";
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
    ***************************************************************************** */var t=function(){return t=Object.assign||function(t){for(var e,n=1,o=arguments.length;n<o;n++)for(var i in e=arguments[n])Object.prototype.hasOwnProperty.call(e,i)&&(t[i]=e[i]);return t},t.apply(this,arguments)};function e(t,e,n,o){return new(n||(n=Promise))((function(i,r){function u(t){try{a(o.next(t))}catch(t){r(t)}}function l(t){try{a(o.throw(t))}catch(t){r(t)}}function a(t){var e;t.done?i(t.value):(e=t.value,e instanceof n?e:new n((function(t){t(e)}))).then(u,l)}a((o=o.apply(t,e||[])).next())}))}function n(t,e){var n,o,i,r,u={label:0,sent:function(){if(1&i[0])throw i[1];return i[1]},trys:[],ops:[]};return r={next:l(0),throw:l(1),return:l(2)},"function"==typeof Symbol&&(r[Symbol.iterator]=function(){return this}),r;function l(r){return function(l){return function(r){if(n)throw new TypeError("Generator is already executing.");for(;u;)try{if(n=1,o&&(i=2&r[0]?o.return:r[0]?o.throw||((i=o.return)&&i.call(o),0):o.next)&&!(i=i.call(o,r[1])).done)return i;switch(o=0,i&&(r=[2&r[0],i.value]),r[0]){case 0:case 1:i=r;break;case 4:return u.label++,{value:r[1],done:!1};case 5:u.label++,o=r[1],r=[0];continue;case 7:r=u.ops.pop(),u.trys.pop();continue;default:if(!(i=u.trys,(i=i.length>0&&i[i.length-1])||6!==r[0]&&2!==r[0])){u=0;continue}if(3===r[0]&&(!i||r[1]>i[0]&&r[1]<i[3])){u.label=r[1];break}if(6===r[0]&&u.label<i[1]){u.label=i[1],i=r;break}if(i&&u.label<i[2]){u.label=i[2],u.ops.push(r);break}i[2]&&u.ops.pop(),u.trys.pop();continue}r=e.call(t,u)}catch(t){r=[6,t],o=0}finally{n=i=0}if(5&r[0])throw r[1];return{value:r[0]?r[1]:void 0,done:!0}}([r,l])}}}var o="lgInit",i={showVimeoThumbnails:!0,showThumbnailWithPlayButton:!1};return function(){function r(e){return this.core=e,this.settings=t(t({},i),this.core.settings),this}return r.prototype.init=function(){var t=this;this.settings.showVimeoThumbnails&&this.core.LGel.on(o+".vimeothumbnails",(function(e){var n=e.detail.instance;n.$container.find(".lg-thumb-outer").get()&&t.setVimeoThumbnails(n)}))},r.prototype.setVimeoThumbnails=function(t){return e(this,void 0,void 0,(function(){var e,o,i;return n(this,(function(n){switch(n.label){case 0:e=0,n.label=1;case 1:return e<t.galleryItems.length?(o=t.galleryItems[e],(o.__slideVideoInfo||{}).vimeo?[4,fetch("https://vimeo.com/api/oembed.json?url="+encodeURIComponent(o.src))]:[3,4]):[3,5];case 2:return[4,n.sent().json()];case 3:i=n.sent(),t.$container.find(".lg-thumb-item").eq(e).find("img").attr("src",this.settings.showThumbnailWithPlayButton?i.thumbnail_url_with_play_button:i.thumbnail_url),n.label=4;case 4:return e++,[3,1];case 5:return[2]}}))}))},r.prototype.destroy=function(){this.core.LGel.off(".lg.vimeothumbnails"),this.core.LGel.off(".vimeothumbnails")},r}()}));