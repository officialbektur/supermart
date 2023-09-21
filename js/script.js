"use strict";
function minWindowScreen() {
	if (!document.getElementById("metaViewport")) { return false; }
	let screenWidth = screen.width;
	let numberDefault = Number(window.getComputedStyle(document.documentElement).getPropertyValue("font-size").match(/\d+/)[0]);
	let emSreenWidth = screenWidth / numberDefault;
	let metaViewport = document.getElementById("metaViewport");
	if (300 / 16 >= emSreenWidth) {
		document.body.classList.add("_minWindowScreen");
		metaViewport.setAttribute("content", "width=1200");
	} else {
		document.body.classList.remove("_minWindowScreen");
		metaViewport.setAttribute("content", "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no");
	}
}
minWindowScreen();
let isMobile = {
	Android: function () {
		return navigator.userAgent.match(/Android/i);
	},
	BlackBerry: function () {
		return navigator.userAgent.match(/BlackBerry/i);
	},
	iOS: function () {
		return navigator.userAgent.match(/iPhone|iPad|iPod/i);
	},
	Opera: function () {
		return navigator.userAgent.match(/Opera Mini/i);
	},
	Windows: function () {
		return navigator.userAgent.match(/IEMobile/i);
	},
	any: function () {
		return isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows();
	}
};
function addTouchClass() {
	if (isMobile.any()) {
		if (document.documentElement.classList.contains("_pc")) document.documentElement.classList.remove("_pc");
		document.documentElement.classList.add("_touch");
	} else {
		if (document.documentElement.classList.contains("_touch")) document.documentElement.classList.remove("_touch");
		document.documentElement.classList.add("_pc");
	}
}
addTouchClass();
function polyfillSupportClosest() {
	if (!Element.prototype.matches) Element.prototype.matches = Element.prototype.msMatchesSelector || Element.prototype.webkitMatchesSelector;
	if (!Element.prototype.closest) Element.prototype.closest = function (s) {
		var el = this;
		do {
			if (Element.prototype.matches.call(el, s)) return el;
			el = el.parentElement || el.parentNode;
		} while (null !== el && 1 === el.nodeType);
		return null;
	};
}
polyfillSupportClosest();
function spollers() {
	const spollersArray = document.querySelectorAll("[data-spollers]");
	if (spollersArray.length > 0) {
		const spollersRegular = Array.from(spollersArray).filter((function (item, index, self) {
			return !item.dataset.spollers.split(",")[0];
		}));
		if (spollersRegular.length) initSpollers(spollersRegular);
		let mdQueriesArray = dataMediaQueries(spollersArray, "spollers");
		if (mdQueriesArray && mdQueriesArray.length) mdQueriesArray.forEach((function (mdQueriesItem) {
			mdQueriesItem.matchMedia.addEventListener("change", (function () {
				initSpollers(mdQueriesItem.itemsArray, mdQueriesItem.matchMedia);
			}));
			initSpollers(mdQueriesItem.itemsArray, mdQueriesItem.matchMedia);
		}));
		function initSpollers(spollersArray, matchMedia = false) {
			spollersArray.forEach((function (spollersBlock) {
				spollersBlock = matchMedia ? spollersBlock.item : spollersBlock;
				if (matchMedia.matches || !matchMedia) {
					spollersBlock.classList.add("_spoller-init");
					initSpollerBody(spollersBlock);
					spollersBlock.addEventListener("click", setSpollerAction);
				} else {
					spollersBlock.classList.remove("_spoller-init");
					initSpollerBody(spollersBlock, false);
					spollersBlock.removeEventListener("click", setSpollerAction);
				}
			}));
		}
		function initSpollerBody(spollersBlock, hideSpollerBody = true) {
			let spollerTitles = spollersBlock.querySelectorAll("[data-spoller]");
			if (spollerTitles.length) {
				spollerTitles = Array.from(spollerTitles).filter((function (item) {
					if (item.closest("[data-spollers]") === spollersBlock) return item;
				}));
				spollerTitles.forEach((function (spollerTitle) {
					if (hideSpollerBody) {
						spollerTitle.removeAttribute("tabindex");
						if (!spollerTitle.classList.contains("_spoller-active")) spollerTitle.nextElementSibling.hidden = true;
					} else {
						spollerTitle.setAttribute("tabindex", "-1");
						spollerTitle.nextElementSibling.hidden = false;
					}
				}));
			}
		}
		function setSpollerAction(e) {
			const el = e.target;
			if (el.closest("[data-spoller]")) {
				const spollerTitle = el.closest("[data-spoller]");
				const spollersBlock = spollerTitle.closest("[data-spollers]");
				const oneSpoller = spollersBlock.hasAttribute("data-one-spoller");
				const spollerSpeed = spollersBlock.dataset.spollersSpeed ? parseInt(spollersBlock.dataset.spollersSpeed) : 500;
				if (!spollersBlock.querySelectorAll("._slide").length) {
					if (oneSpoller && !spollerTitle.classList.contains("_spoller-active")) hideSpollersBody(spollersBlock);
					spollerTitle.classList.toggle("_spoller-active");
					_slideToggle(spollerTitle.nextElementSibling, spollerSpeed);
				}
				e.preventDefault();
			}
		}
		function hideSpollersBody(spollersBlock) {
			const spollerActiveTitle = spollersBlock.querySelector("[data-spoller]._spoller-active");
			const spollerSpeed = spollersBlock.dataset.spollersSpeed ? parseInt(spollersBlock.dataset.spollersSpeed) : 500;
			if (spollerActiveTitle && !spollersBlock.querySelectorAll("._slide").length) {
				spollerActiveTitle.classList.remove("_spoller-active");
				_slideUp(spollerActiveTitle.nextElementSibling, spollerSpeed);
			}
		}
	}
}
spollers();
function menuInit() {
	if (document.querySelector(".header-top-bar__menu")) {
		let iconMenu = document.querySelector(".header-top-bar__menu");
		let menuBody = document.querySelector(".header-footer-menu__body");
		iconMenu.addEventListener("click", (function (e) {
			if (bodyLockStatus && e.target.closest(".header-top-bar__menu")) {
				bodyLockToggle();
				document.documentElement.classList.toggle("menu-open");
			}
		}));
		menuBody.addEventListener("click", (function (e) {
			if (document.documentElement.classList.contains("menu-open") && !e.target.closest(".header-footer-menu__content")) {
				bodyLockToggle();
				document.documentElement.classList.toggle("menu-open");
			}
		}));
	}
}
menuInit();
function menuClose() {
	bodyUnlock();
	document.documentElement.classList.remove("menu-open");
}
class Popup {
	constructor(options) {
		let config = {
			logging: true,
			init: true,
			attributeOpenButton: "data-popup",
			attributeCloseButton: "data-close",
			fixElementSelector: "[data-lp]",
			youtubeAttribute: "data-youtube",
			youtubePlaceAttribute: "data-youtube-place",
			setAutoplayYoutube: true,
			classes: {
				popup: "popup",
				popupContent: "popup__content",
				popupActive: "popup_show",
				bodyActive: "popup-show"
			},
			focusCatch: true,
			closeEsc: true,
			bodyLock: true,
			bodyLockDelay: 500,
			hashSettings: {
				location: true,
				goHash: true
			},
			on: {
				beforeOpen: function () { },
				afterOpen: function () { },
				beforeClose: function () { },
				afterClose: function () { }
			}
		};
		this.isOpen = false;
		this.targetOpen = {
			selector: false,
			element: false
		};
		this.previousOpen = {
			selector: false,
			element: false
		};
		this.lastClosed = {
			selector: false,
			element: false
		};
		this._dataValue = false;
		this.hash = false;
		this._reopen = false;
		this._selectorOpen = false;
		this.lastFocusEl = false;
		this._focusEl = ["a[href]", 'input:not([disabled]):not([type="hidden"]):not([aria-hidden])', "button:not([disabled]):not([aria-hidden])", "select:not([disabled]):not([aria-hidden])", "textarea:not([disabled]):not([aria-hidden])", "area[href]", "iframe", "object", "embed", "[contenteditable]", '[tabindex]:not([tabindex^="-"])'];
		this.options = {
			...config,
			...options,
			classes: {
				...config.classes,
				...options?.classes
			},
			hashSettings: {
				...config.hashSettings,
				...options?.hashSettings
			},
			on: {
				...config.on,
				...options?.on
			}
		};
		this.options.init ? this.initPopups() : null;
	}
	initPopups() {
		this.eventsPopup();
	}
	eventsPopup() {
		document.addEventListener("click", function (e) {
			const buttonOpen = e.target.closest(`[${this.options.attributeOpenButton}]`);
			if (buttonOpen) {
				e.preventDefault();
				this._dataValue = buttonOpen.getAttribute(this.options.attributeOpenButton) ? buttonOpen.getAttribute(this.options.attributeOpenButton) : "error";
				if ("error" !== this._dataValue) {
					if (!this.isOpen) this.lastFocusEl = buttonOpen;
					this.targetOpen.selector = `${this._dataValue}`;
					this._selectorOpen = true;
					this.open();
					return;
				}
				return;
			}
			const buttonClose = e.target.closest(`[${this.options.attributeCloseButton}]`);
			if (buttonClose || !e.target.closest(`.${this.options.classes.popupContent}`) && this.isOpen) {
				e.preventDefault();
				this.close();
				return;
			}
		}.bind(this));
		document.addEventListener("keydown", function (e) {
			if (this.options.closeEsc && 27 == e.which && "Escape" === e.code && this.isOpen) {
				e.preventDefault();
				this.close();
				return;
			}
			if (this.options.focusCatch && 9 == e.which && this.isOpen) {
				this._focusCatch(e);
				return;
			}
		}.bind(this));
		if (this.options.hashSettings.goHash) {
			window.addEventListener("hashchange", function () {
				if (window.location.hash) this._openToHash(); else this.close(this.targetOpen.selector);
			}.bind(this));
			window.addEventListener("load", function () {
				if (window.location.hash) this._openToHash();
			}.bind(this));
		}
	}
	open(selectorValue) {
		if (selectorValue && "string" === typeof selectorValue && "" !== selectorValue.trim()) {
			this.targetOpen.selector = selectorValue;
			this._selectorOpen = true;
		}
		if (this.isOpen) {
			this._reopen = true;
			this.close();
		}
		if (!this._selectorOpen) this.targetOpen.selector = this.lastClosed.selector;
		if (!this._reopen) this.previousActiveElement = document.activeElement;
		this.targetOpen.element = document.querySelector(this.targetOpen.selector);
		if (this.targetOpen.element) {
			if (this.targetOpen.element.hasAttribute(this.options.youtubeAttribute)) {
				const codeVideo = this.targetOpen.element.getAttribute(this.options.youtubeAttribute);
				const urlVideo = `https://www.youtube.com/embed/${codeVideo}?rel=0&showinfo=0&autoplay=1`;
				const iframe = document.createElement("iframe");
				iframe.setAttribute("allowfullscreen", "");
				const autoplay = this.options.setAutoplayYoutube ? "autoplay;" : "";
				iframe.setAttribute("allow", `${autoplay}; encrypted-media`);
				iframe.setAttribute("src", urlVideo);
				if (this.targetOpen.element.querySelector(`[${this.options.youtubePlaceAttribute}]`)) this.targetOpen.element.querySelector(`[${this.options.youtubePlaceAttribute}]`).appendChild(iframe);
			}
			if (this.options.hashSettings.location) {
				this._getHash();
				this._setHash();
			}
			this.options.on.beforeOpen(this);
			this.targetOpen.element.classList.add(this.options.classes.popupActive);
			document.body.classList.add(this.options.classes.bodyActive);
			if (!this._reopen) bodyLockToggle(); else this._reopen = false;
			this.targetOpen.element.setAttribute("aria-hidden", "false");
			this.previousOpen.selector = this.targetOpen.selector;
			this.previousOpen.element = this.targetOpen.element;
			this._selectorOpen = false;
			this.isOpen = true;
			setTimeout((function () {
				this._focusTrap();
			}), 50);
			document.dispatchEvent(new CustomEvent("afterPopupOpen", {
				detail: {
					popup: this
				}
			}));
		}
	}
	close(selectorValue) {
		if (selectorValue && "string" === typeof selectorValue && "" !== selectorValue.trim()) this.previousOpen.selector = selectorValue;
		if (!this.isOpen || !bodyLockStatus) return;
		this.options.on.beforeClose(this);
		if (this.targetOpen.element.hasAttribute(this.options.youtubeAttribute)) if (this.targetOpen.element.querySelector(`[${this.options.youtubePlaceAttribute}]`)) this.targetOpen.element.querySelector(`[${this.options.youtubePlaceAttribute}]`).innerHTML = "";
		this.previousOpen.element.classList.remove(this.options.classes.popupActive);
		this.previousOpen.element.setAttribute("aria-hidden", "true");
		if (!this._reopen) {
			document.body.classList.remove(this.options.classes.bodyActive);
			bodyLockToggle();
			this.isOpen = false;
		}
		this._removeHash();
		if (this._selectorOpen) {
			this.lastClosed.selector = this.previousOpen.selector;
			this.lastClosed.element = this.previousOpen.element;
		}
		this.options.on.afterClose(this);
		setTimeout((function () {
			this._focusTrap();
		}), 50);
	}
	_getHash() {
		if (this.options.hashSettings.location) this.hash = this.targetOpen.selector.includes("#") ? this.targetOpen.selector : this.targetOpen.selector.replace(".", "#");
	}
	_openToHash() {
		let classInHash = document.querySelector(`.${window.location.hash.replace("#", "")}`) ? `.${window.location.hash.replace("#", "")}` : document.querySelector(`${window.location.hash}`) ? `${window.location.hash}` : null;
		const buttons = document.querySelector(`[${this.options.attributeOpenButton}="${classInHash}"]`);
		if (buttons) if (classInHash) this.open(classInHash);
	}
	_setHash() {
		history.pushState("", "", this.hash);
	}
	_removeHash() {
		history.pushState("", "", window.location.href.split("#")[0]);
	}
	_focusCatch(e) {
		const focusable = this.targetOpen.element.querySelectorAll(this._focusEl);
		const focusArray = Array.prototype.slice.call(focusable);
		const focusedIndex = focusArray.indexOf(document.activeElement);
		if (e.shiftKey && 0 === focusedIndex) {
			focusArray[focusArray.length - 1].focus();
			e.preventDefault();
		}
		if (!e.shiftKey && focusedIndex === focusArray.length - 1) {
			focusArray[0].focus();
			e.preventDefault();
		}
	}
	_focusTrap() {
		const focusable = this.previousOpen.element.querySelectorAll(this._focusEl);
		if (!this.isOpen && this.lastFocusEl) this.lastFocusEl.focus(); else focusable[0].focus();
	}
}
let popup = new Popup({});
function initSliders() {
	if (document.querySelector(".header-footer__slider")) new Swiper(".header-footer__slider", {
		slidesPerView: "auto",
		speed: 400,
		mousewheel: true,
		freeMode: true,
		navigation: {
			nextEl: ".header-footer-slider__btnnext",
			prevEl: ".header-footer-slider__btnprev"
		},
		on: {}
	});
	if (document.querySelector(".moreinfo-tovar-info-image__pagination")) {
		var swiper = new Swiper(".moreinfo-tovar-info-image__pagination", {
			slidesPerView: "auto",
			spaceBetween: 3,
			speed: 400,
			mousewheel: true,
			freeMode: true,
			watchSlidesProgress: true,
			navigation: {
				nextEl: ".moreinfo-tovar-info-image-pagination__prev",
				prevEl: ".moreinfo-tovar-info-image-pagination__next"
			}
		});
		if (document.querySelector(".moreinfo-tovar-info-image__sliderbig")) new Swiper(".moreinfo-tovar-info-image__sliderbig", {
			spaceBetween: 0,
			speed: 400,
			navigation: {
				nextEl: ".moreinfo-tovar-info-image-sliderbig-pagination__prev",
				prevEl: ".moreinfo-tovar-info-image-sliderbig-pagination__next"
			},
			thumbs: {
				swiper
			}
		});
	}
	if (document.querySelector(".moreinfo-tovar__alsorecommend .product-block-slids")) new Swiper(".moreinfo-tovar__alsorecommend .product-block-slids", {
		slidesPerView: "auto",
		spaceBetween: 0,
		speed: 400,
		freeMode: true,
		navigation: {
			nextEl: ".moreinfo-tovar__alsorecommend .product-block-slids-pagination__prev",
			prevEl: ".moreinfo-tovar__alsorecommend .product-block-slids-pagination__next"
		}
	});
	if (document.querySelector(".moreinfo-tovar__history .product-block-slids")) new Swiper(".moreinfo-tovar__history .product-block-slids", {
		slidesPerView: "auto",
		spaceBetween: 0,
		speed: 400,
		freeMode: true,
		navigation: {
			nextEl: ".moreinfo-tovar__history .product-block-slids-pagination__prev",
			prevEl: ".moreinfo-tovar__history .product-block-slids-pagination__next"
		}
	});
}
initSliders();
let gotoBlock = function (targetBlock, noHeader = false, speed = 500, offsetTop = 0) {
	const targetBlockElement = document.querySelector(targetBlock);
	if (targetBlockElement) {
		let headerItem = "";
		let headerItemHeight = 0;
		if (noHeader) {
			headerItem = "header.header";
			headerItemHeight = document.querySelector(headerItem).offsetHeight;
		}
		let options = {
			speedAsDuration: true,
			speed,
			header: headerItem,
			offset: offsetTop,
			easing: "easeOutQuad"
		};
		document.documentElement.classList.contains("menu-open") ? menuClose() : null;
		if ("undefined" !== typeof SmoothScroll) (new SmoothScroll).animateScroll(targetBlockElement, "", options); else {
			let targetBlockElementPosition = targetBlockElement.getBoundingClientRect().top + scrollY;
			targetBlockElementPosition = headerItemHeight ? targetBlockElementPosition - headerItemHeight : targetBlockElementPosition;
			targetBlockElementPosition = offsetTop ? targetBlockElementPosition - offsetTop : targetBlockElementPosition;
			window.scrollTo({
				top: targetBlockElementPosition,
				behavior: "smooth"
			});
		}
	}
};
let addWindowScrollEvent = false;
function pageNavigation() {
	document.addEventListener("click", pageNavigationAction);
	document.addEventListener("watcherCallback", pageNavigationAction);
	function pageNavigationAction(e) {
		if ("click" === e.type) {
			const targetElement = e.target;
			if (targetElement.closest("[data-goto]")) {
				const gotoLink = targetElement.closest("[data-goto]");
				const gotoLinkSelector = gotoLink.dataset.goto ? gotoLink.dataset.goto : "";
				const noHeader = gotoLink.hasAttribute("data-goto-header") ? true : false;
				const gotoSpeed = gotoLink.dataset.gotoSpeed ? gotoLink.dataset.gotoSpeed : 500;
				const offsetTop = gotoLink.dataset.gotoTop ? parseInt(gotoLink.dataset.gotoTop) : 0;
				gotoBlock(gotoLinkSelector, noHeader, gotoSpeed, offsetTop);
				e.preventDefault();
			}
		} else if ("watcherCallback" === e.type && e.detail) {
			const entry = e.detail.entry;
			const targetElement = entry.target;
			if ("navigator" === targetElement.dataset.watch) {
				document.querySelector(`[data-goto]._navigator-active`);
				let navigatorCurrentItem;
				if (targetElement.id && document.querySelector(`[data-goto="#${targetElement.id}"]`)) navigatorCurrentItem = document.querySelector(`[data-goto="#${targetElement.id}"]`); else if (targetElement.classList.length) for (let index = 0; index < targetElement.classList.length; index++) {
					const element = targetElement.classList[index];
					if (document.querySelector(`[data-goto=".${element}"]`)) {
						navigatorCurrentItem = document.querySelector(`[data-goto=".${element}"]`);
						break;
					}
				}
				if (entry.isIntersecting) navigatorCurrentItem ? navigatorCurrentItem.classList.add("_navigator-active") : null; else navigatorCurrentItem ? navigatorCurrentItem.classList.remove("_navigator-active") : null;
			}
		}
	}
	if (getHash()) {
		let goToHash;
		if (document.querySelector(`#${getHash()}`)) goToHash = `#${getHash()}`; else if (document.querySelector(`.${getHash()}`)) goToHash = `.${getHash()}`;
		goToHash ? gotoBlock(goToHash, true, 500, 20) : null;
	}
}
pageNavigation();
setTimeout((function () {
	if (addWindowScrollEvent) {
		let windowScroll = new Event("windowScroll");
		window.addEventListener("scroll", (function (e) {
			document.dispatchEvent(windowScroll);
		}));
	}
}), 0);
function windowOnScroll() {
	if (document.querySelector("[data-active-scroll]")) {
		let activeWhenScroll = document.querySelector("[data-active-scroll]");
		let activeWhenScrollGet = activeWhenScroll.getAttribute("data-active-scroll");
		window.onscroll = function () {
			if (window.pageYOffset > activeWhenScrollGet) activeWhenScroll.classList.add("_active"); else activeWhenScroll.classList.remove("_active");
		};
	}
}
windowOnScroll();
if (document.querySelector("[data-gallery]")) {
	const galleries = document.querySelector("[data-gallery]");
	lightGallery(galleries, {
		plugins: [lgZoom, lgAutoplay, lgFullscreen, lgRotate, lgThumbnail, lgVideo],
		speed: 500,
		download: false,
		zoom: true,
		autoplay: true,
		fullscreen: true,
		rotate: true,
		thumbnail: true,
		video: true
	});
}
function windowsSize() {
	if (document.querySelector(".windows-size__width")) {
		let fz = document.querySelector(".windows-size__fz");
		let ww = document.querySelector(".windows-size__width");
		let hh = document.querySelector(".windows-size__height");
		let fs = Number(window.getComputedStyle(document.documentElement).getPropertyValue("font-size").match(/\d+/)[0]);
		let ws = document.documentElement.offsetWidth;
		let hs = window.innerHeight;
		fz.innerText = fs + " - Шрифт";
		ww.innerText = ws + " - Шир";
		hh.innerText = hs + " - Выс";
	}
}
windowsSize();
window.addEventListener("resize", (function () {
	addTouchClass();
	minWindowScreen();
	windowsSize();
}));