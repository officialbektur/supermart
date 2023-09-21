// if (document.querySelector(".product__block")) {
// 	let product__block = document.querySelectorAll(".product__block");
// 	for (let index = 0; index < product__block.length; index++) {
// 		const element = product__block[index];
// 		let elementeLement = element.querySelectorAll(".product-block-image-block__item").length;
// 		if (elementeLement > 1) {
// 			element.querySelector(".product-block-image__block").innerHTML += '<div class="product-block-image-block__pagination product-block-image-block-pagination"><span class="product-block-image-block-pagination__btn _active" data-product-block-image-block-pagination="0"></span></div>';
// 			let elementSpanNumber = 0;
// 			if (element.querySelector(".product-block-image-block__pagination")) for (let index = 1; index < elementeLement; index++) if (index < 4) {
// 				let elementSpanStart = '<span class="product-block-image-block-pagination__btn" data-product-block-image-block-pagination="';
// 				let elementSpanEnd = '"></span>';
// 				elementSpanNumber++;
// 				element.querySelector(".product-block-image-block__pagination").insertAdjacentHTML("beforeEnd", elementSpanStart + elementSpanNumber + elementSpanEnd);
// 			}
// 		}
// 	}
// }
// document.addEventListener("DOMContentLoaded", (function() {
// 	let one = document.querySelectorAll(".product-block-image-block-pagination__btn");
// 	for (let index = 0; index < one.length; index++) {
// 		let element = one[index];
// 		element.addEventListener("mousemove", (function(e) {
// 			let one = this.parentElement.querySelectorAll(".product-block-image-block-pagination__btn");
// 			for (let index = 0; index < one.length; index++) {
// 				const element = one[index];
// 				element.classList.remove("_active");
// 			}
// 			let two = this.parentElement.parentElement.querySelectorAll(".product-block-image-block__item");
// 			for (let index = 0; index < two.length; index++) {
// 				const element = two[index];
// 				element.classList.remove("_active");
// 			}
// 			this.parentElement.parentElement.querySelectorAll(".product-block-image-block__item")[this.getAttribute("data-product-block-image-block-pagination")].classList.add("_active");
// 			this.classList.add("_active");
// 		}));
// 		element.addEventListener("mouseout", (function(e) {
// 			let one = this.parentElement.querySelectorAll(".product-block-image-block-pagination__btn");
// 			for (let index = 0; index < one.length; index++) {
// 				const element = one[index];
// 				element.classList.remove("_active");
// 			}
// 			let two = this.parentElement.parentElement.querySelectorAll(".product-block-image-block__item");
// 			for (let index = 0; index < two.length; index++) {
// 				const element = two[index];
// 				element.classList.remove("_active");
// 			}
// 			this.parentElement.parentElement.querySelector(".product-block-image-block__item").classList.add("_active");
// 			this.parentElement.querySelector(".product-block-image-block-pagination__btn").classList.add("_active");
// 		}));
// 	}
// }));
document.addEventListener("DOMContentLoaded", (function() {
	function siteLanguage() {
		if (document.querySelector("[data-site-language-menu-button]")) {
			let siteLanguageMenuButton = document.querySelector("[data-site-language-menu-button]");
			siteLanguageMenuButton.addEventListener('click', function (e) {
				siteLanguageMenuButton.parentElement.classList.toggle("_active");
			});
			document.body.addEventListener("click", function (e) {
				if (siteLanguageMenuButton.parentElement.classList.contains("_active") && !e.target.closest("[data-site-language-menu-button]") && !e.target.closest("[data-site-language-menu-title]")) {
					siteLanguageMenuButton.parentElement.classList.remove("_active");
				}
			});
		}
	}
	siteLanguage();
	function siteLanguage4() {
		if (document.querySelector(".header-top-search__input")) {
			let input = document.querySelector(".header-top-search__input");
			let button = document.querySelector(".header-top-search__clear");
			input.addEventListener('input', function (e) {
				if (input.value.length > 0) {
					button.classList.add("_active");
				} else {
					button.classList.remove("_active");
				}
			});
			button.addEventListener('click', function (e) {
				input.value = "";
				button.classList.remove("_active");
			});
		}
	}
	siteLanguage4();
	function siteLanguage5() {
		if (document.querySelector(".header-top-search__input")) {
			let input = document.querySelector(".header-top-search__input");
			let menu = document.querySelector(".header-top-search__hint");
			input.addEventListener('focus', function (e) {
				menu.classList.add("_active");
			});
			input.addEventListener('blur', function (e) {
				menu.classList.remove("_active");
			});
		}
	}
	siteLanguage5();
	function siteLanguage6() {
		if (document.querySelector(".bkt-catygory__button")) {
			let siteLanguageMenuButton = document.querySelector(".bkt-catygory__button");
			siteLanguageMenuButton.addEventListener('click', function (e) {
				siteLanguageMenuButton.parentElement.classList.toggle("_active");
			});
			document.querySelector(".bkt-catygory-menu-header__close").addEventListener('click', function (e) {
				siteLanguageMenuButton.parentElement.classList.remove("_active");
			});
			document.querySelector(".bkt-catygory-menu-header__back").addEventListener('click', function (e) {
				siteLanguageMenuButton.parentElement.classList.remove("_active");
			});
			document.body.addEventListener("click", function (e) {
				if (siteLanguageMenuButton.parentElement.classList.contains("_active") && !e.target.closest(".bkt-catygory__button") && !e.target.closest(".bkt-catygory__menu")) {
					siteLanguageMenuButton.parentElement.classList.remove("_active");
				}
			});
		}
	}
	siteLanguage6();
	function siteLanguage3() {
		if (document.querySelector(".header-top-search-filter__button")) {
			let button = document.querySelector(".header-top-search-filter__button");
			button.addEventListener('click', function (e) {
				button.parentElement.classList.toggle("_active");
			});
			document.body.addEventListener("click", function (e) {
				if (button.parentElement.classList.contains("_active") && !e.target.closest(".header-top-search-filter__menu") && !e.target.closest(".header-top-search-filter__button")) {
					button.parentElement.classList.remove("_active");
				}
			});
		}
	}
	siteLanguage3();
	function siteLanguage8() {
		if (document.querySelector(".header-top-search-filter-menu__close")) {
			let button = document.querySelector(".header-top-search-filter-menu__close");
			button.addEventListener('click', function (e) {
				button.parentElement.parentElement.classList.remove("_active");
			});
		}
	}
	siteLanguage8();
	function siteLanguage2() {
		if (document.querySelector(".header-top-search-filter-menu-item-sorting-select__button")) {
			let button = document.querySelector(".header-top-search-filter-menu-item-sorting-select__button");
			_slideUp(button.nextElementSibling);
			button.addEventListener('click', function (e) {
				_slideToggle(document.querySelector(".header-top-search-filter-menu-item-sorting-select__menu"));
				button.classList.toggle("_active");
			});
			let menulist = document.querySelectorAll(".header-top-search-filter-menu-item-sorting-select-menu__list");
			for (let index = 0; index < menulist.length; index++) {
				let element = menulist[index];
				element.addEventListener("click", function (e) {
					for (let index = 0; index < menulist.length; index++) {
						let indexs = menulist[index];
						indexs.classList.remove("_active");
					}
					this.classList.add("_active");
					button.querySelector(".header-top-search-filter-menu-item-sorting-select-button__title").innerText = this.innerText;
					_slideUp(button.nextElementSibling);
					button.classList.toggle("_active");
				});
			}
		}
	}
	let _slideUp = function(target, duration = 500) {
			target.style.transitionProperty = 'height, margin, padding';
			target.style.transitionDuration = duration + 'ms';
			target.style.height = target.offsetHeight + 'px';
			target.offsetHeight;
			target.style.overflow = 'hidden';
			target.style.height = 0;
			target.style.paddingTop = 0;
			target.style.paddingBottom = 0;
			target.style.marginTop = 0;
			target.style.marginBottom = 0;
			window.setTimeout(function() {
				target.hidden = true;
				target.style.removeProperty('height');
				target.style.removeProperty('padding-top');
				target.style.removeProperty('padding-bottom');
				target.style.removeProperty('margin-top');
				target.style.removeProperty('margin-bottom');
				target.style.removeProperty('overflow');
				target.style.removeProperty('transition-duration');
				target.style.removeProperty('transition-property');
			}, duration);
	}
	let _slideDown = function(target, duration = 500) {
		if (target.hidden) {
			target.hidden = false;
		}
		let height = target.offsetHeight;
		target.style.overflow = 'hidden';
		target.style.height = 0;
		target.style.paddingTop = 0;
		target.style.paddingBottom = 0;
		target.style.marginTop = 0;
		target.style.marginBottom = 0;
		target.offsetHeight;
		target.style.transitionProperty = "height, margin, padding";
		target.style.transitionDuration = duration + 'ms';
		target.style.height = height + 'px';
		target.style.removeProperty('padding-top');
		target.style.removeProperty('padding-bottom');
		target.style.removeProperty('margin-top');
		target.style.removeProperty('margin-bottom');
		window.setTimeout(function() {
			target.style.removeProperty('height');
			target.style.removeProperty('overflow');
			target.style.removeProperty('transition-duration');
			target.style.removeProperty('transition-property');
		}, duration);
	}
	let _slideToggle = function(target, duration = 500) {
		if (target.hidden) {
			return _slideDown(target, duration);
		} else {
			return _slideUp(target, duration);
		}
	}
	siteLanguage2();
	function siteLanguage7() {
		if (document.querySelector(".bkt-catygory-menu-main-sublist__menulist")) {
			let subListMenu = document.querySelectorAll(".bkt-catygory-menu-main-sublist__menulist");
			let subListMenuList = document.querySelectorAll(".bkt-catygory-menu-main-sublist__button");
			for (let index = 0; index < subListMenu.length; index++) {
				const element = subListMenu[index];
				_slideUp(element);
			}
			for (let index = 0; index < subListMenuList.length; index++) {
				const element = subListMenuList[index];
				element.addEventListener('click', function (e) {
					_slideToggle(element.nextElementSibling);
					element.classList.toggle("_active");
				});
			}
		}
	}
	siteLanguage7();
	function siteLanguage9() {
		if (document.querySelector(".header-footer-menu__button")) {
			let button = document.querySelector(".header-footer-menu__button");
			button.addEventListener('click', function (e) {
				button.nextElementSibling.classList.toggle("_active");
			});
			document.body.addEventListener("click", function (e) {
				if (button.nextElementSibling.classList.contains("_active") && !e.target.closest(".header-footer__menu")) {
					button.nextElementSibling.classList.remove("_active");
				}
			});
		}
	}
	siteLanguage9();
	function siteLanguage10() {
		if (document.querySelector(".header-footer-menu-sublist__menulist")) {
			let subListMenu = document.querySelectorAll(".header-footer-menu-sublist__menulist");
			let subListMenuButtonIcon = document.querySelectorAll(".header-footer-menu-sublist-button__icon");
			for (let index = 0; index < subListMenu.length; index++) {
				const element = subListMenu[index];
				_slideUp(element);
			}
			for (let index = 0; index < subListMenuButtonIcon.length; index++) {
				const element = subListMenuButtonIcon[index];
				element.addEventListener('click', function (e) {
					_slideToggle(element.parentElement.nextElementSibling);
					element.parentElement.parentElement.classList.toggle("_active");
				});
			}
		}
	}
	siteLanguage10();
	function siteLanguage12() {
		if (document.querySelector(".mb-footer-sidbar__search")) {
			let mbFooterSidbarBlock = document.querySelectorAll(".mb-footer-sidbar__block");
			let searchButton = document.querySelector(".mb-footer-sidbar__search");
			let searchInput = document.querySelector(".header-top__search");
			searchButton.addEventListener("click", function (e) {
				searchInput.classList.toggle("_show");
				document.documentElement.classList.toggle("lock");
			});
			for (var i = mbFooterSidbarBlock.length - 1; i >= 0; i--) {
				mbFooterSidbarBlock[i].addEventListener("click", function (e) {
					if (!this.classList.contains("mb-footer-sidbar__search") && searchInput.classList.contains("_show")) {
						e.preventDefault();
						searchInput.classList.remove("_show");
						document.documentElement.classList.remove("lock");
					}
				});
			}
		}
	}
	siteLanguage12();
	function siteLanguage13() {
		if (document.querySelector(".header-top__search")) {
			let searchBody = document.querySelector(".header-top__search");
			let searchInput = document.querySelector(".header-top__search");
			let searchForm = document.querySelector(".header-top-search__form");
			let searchHint = document.querySelector(".header-top-search__hint");
			searchBody.addEventListener("click", function (e) {
				if (searchBody.classList.contains("_show") && !e.target.closest(".header-top-search__form") && !e.target.closest(".header-top-search__hint")) {
					searchInput.classList.remove("_show");
					document.documentElement.classList.remove("lock");
				}
			});
		}
	}
	siteLanguage13();
}));
function name1() {
	if (document.querySelector(".product-block-trash__block")) {
		let productBlockTrashBlock = document.querySelectorAll(".product-block-trash__block");
		let contentHeaderInfoColNumber = document.querySelector(".content-header-info-col__number");
		contentHeaderInfoColNumber.innerText = productBlockTrashBlock.length;
	}
}
name1();
function name2() {
	if (document.querySelector(".product-block-trash__block")) {
		let productBlockTrashBlock = document.querySelectorAll(".product-block-trash__block");
		let contentHeaderInfoPriceNumber = document.querySelector(".content-header-info-price__number");
		contentHeaderInfoPriceNumber.innerText = "0";
		for (let index = 0; index < productBlockTrashBlock.length; index++) {
			const element = productBlockTrashBlock[index];
			let f = element.querySelector(".product-block-trash-price__number");
			contentHeaderInfoPriceNumber.innerText = Number(contentHeaderInfoPriceNumber.innerText) + Number(f.innerText);
		}
	}
}
name2();
function formQuantity() {
	if (document.querySelector(".product-block-trash__block")) {
		let productBlockTrashBlock = document.querySelectorAll(".product-block-trash__block");
		for (let index = 0; index < productBlockTrashBlock.length; index++) {
			let element = productBlockTrashBlock[index];
			let fixePriceNumber = element.querySelector(".product-block-trash-title-infotext-price__number");
			let priceNumber = element.querySelector(".product-block-trash-price__number");
			let valueInput = element.querySelector("[data-quantity-value]");
			let buttonPlus = element.querySelector("[data-quantity-plus]");
			let buttonMinus = element.querySelector("[data-quantity-minus]");
			valueInput.addEventListener("input", function (e) {
				if (element.querySelector("[data-quantity-max]")) {
					let valueInputMax = Number(element.querySelector("[data-quantity-max]").getAttribute("data-quantity-max"));
					if (valueInput.value > valueInputMax) {
						valueInput.value = valueInputMax;
					}
				}
				if (element.querySelector("[data-quantity-min]")) {
					let valueInputMin = Number(element.querySelector("[data-quantity-min]").getAttribute("data-quantity-min"));
					if (valueInput.value < valueInputMin) {
						valueInput.value = valueInputMin;
					}
				}
				function inputNumber(text) {
					return text.replace(/[^0-9]/ig, '');
				}
				let cleanValue = inputNumber(e.target.value);
				e.target.value = cleanValue;
				priceNumber.innerText = Number(fixePriceNumber.innerText) * valueInput.value;
				name2();
			});
			buttonPlus.addEventListener("click", function (e) {
				valueInput.value++;
				if (element.querySelector("[data-quantity-max]")) {
					let valueInputMax = Number(element.querySelector("[data-quantity-max]").getAttribute("data-quantity-max"));
					if (valueInput.value > valueInputMax) {
						valueInput.value = valueInputMax;
					}
				}
				priceNumber.innerText = Number(fixePriceNumber.innerText) * valueInput.value;
				name2();
			});
			buttonMinus.addEventListener("click", function (e) {
				--valueInput.value;
				if (element.querySelector("[data-quantity-min]")) {
					let valueInputMin = Number(element.querySelector("[data-quantity-min]").getAttribute("data-quantity-min"));
					if (valueInputMin >=0) {
						if (valueInput.value < valueInputMin) {
							valueInput.value = valueInputMin;
						}
					}
				} else if (valueInput.value <= 0) {
					valueInput.value = 0;
				}
				priceNumber.innerText = Number(fixePriceNumber.innerText) * valueInput.value;
				name2();
			});
		}
	}
}
formQuantity()




// Основная функция
function initRatings() {
	const ratings = document.querySelectorAll('.moreinfo-tovar-body-reviews-form__rating');
	let ratingActive, ratingValue;
	// "Бегаем" по всем рейтингам на странице
	for (let index = 0; index < ratings.length; index++) {
		const rating = ratings[index];
		initRating(rating);
	}

	// Инициализируем конкретный рейтинг
	function initRating(rating) {
		initRatingVars(rating);

		setRatingActiveWidth();
		setRating(rating);
	}

	// Инициализайция переменных
	function initRatingVars(rating) {
		ratingActive = rating.querySelector('.moreinfo-tovar-body-reviews-form-rating__active');
		ratingValue = rating.querySelector('.moreinfo-tovar-body-reviews-form-rating__value');
	}
	// Изменяем ширину активных звезд
	function setRatingActiveWidth(index = ratingValue.innerHTML) {
		const ratingActiveWidth = index / 0.05;
		ratingActive.style.width = `${ratingActiveWidth}%`;
	}
	// Возможность указать оценку 
	function setRating(rating) {
		const ratingItems = rating.querySelectorAll('.moreinfo-tovar-body-reviews-form-rating__item');
		for (let index = 0; index < ratingItems.length; index++) {
			const ratingItem = ratingItems[index];
			ratingItem.addEventListener("mouseenter", function (e) {
				// Обновление переменных
				initRatingVars(rating);
				// Обновление активных звезд
				setRatingActiveWidth(ratingItem.value);
			});
			ratingItem.addEventListener("mouseleave", function (e) {
				// Обновление активных звезд
				setRatingActiveWidth();
			});
			ratingItem.addEventListener("click", function (e) {
				// Обновление переменных
				initRatingVars(rating);
				// Отобразить указанную оценку
				ratingValue.innerHTML = index + 1;
				setRatingActiveWidth();
			});
		}
	}
}
if (document.querySelectorAll('.moreinfo-tovar-body-reviews-form__rating')) {
	initRatings();
}

if (document.querySelector('.moreinfo-tovar-body-reviews__form')) {
	let form = document.querySelector(".moreinfo-tovar-body-reviews__form");
	form.addEventListener("submit", formSend);
	async function formSend(e) {
		e.preventDefault();
		let formBtn = document.querySelector(".moreinfo-tovar-body-reviews-form__button");
		formBtn.classList.add("_loading");
		setTimeout(function() {
			formBtn.classList.remove("_loading");
			formBtn.classList.add("_sending");
			formBtn.classList.add("_error");
			setTimeout(function() {
				formBtn.classList.remove("_sending");
				formBtn.classList.remove("_error");
			}, 2220);
		}, 2220);
	}
}
function magnify(zoom) {
    if (document.querySelector(".moreinfo-tovar-info-image-sliderbig-slide__image>img")) {
        let imgs = document.querySelectorAll(".moreinfo-tovar-info-image-sliderbig-slide__image>img");
        for (var i = 0; i <= imgs.length; i++) {
            let img = imgs[i];
            let glass = document.createElement("DIV");
            glass.setAttribute("class", "img-magnifier-glass");
            img.parentElement.insertBefore(glass, img);
            glass.style.backgroundImage = "url('" + img.src + "')";
            glass.style.backgroundRepeat = "no-repeat";
            glass.style.backgroundSize = img.width * zoom + "px " + img.height * zoom + "px";
            let bw = 3;
            let w = glass.offsetWidth / 2;
            let h = glass.offsetHeight / 2;
            glass.addEventListener("mousemove", moveMagnifier);
            img.addEventListener("mousemove", moveMagnifier);
            glass.addEventListener("mouseout", mouseOutImg);
            function moveMagnifier(e) {
                var pos, x, y;
                e.preventDefault();
                pos = getCursorPos(e);
                x = pos.x;
                y = pos.y;
                if (x > img.width - w / zoom) x = img.width - w / zoom;
                if (x < w / zoom) x = w / zoom;
                if (y > img.height - h / zoom) y = img.height - h / zoom;
                if (y < h / zoom) y = h / zoom;
                glass.classList.add("_cursor");
                glass.style.left = x - w + "px";
                glass.style.top = y - h + "px";
                glass.style.backgroundPosition = "-" + (x * zoom - w + bw) + "px -" + (y * zoom - h + bw) + "px";
            }
            function getCursorPos(e) {
                var a, x = 0, y = 0;
                e = e || window.event;
                a = img.getBoundingClientRect();
                x = e.pageX - a.left;
                y = e.pageY - a.top;
                x -= window.pageXOffset;
                y -= window.pageYOffset;
                return { x, y };
            }
            function mouseOutImg() {
                glass.classList.remove("_cursor");
            }
        }
    }
}
magnify(1.3);

/*
// Полифилл для IntersectionObserver
(function() {
	var polyfill = function() {
	    var rAF = window.requestAnimationFrame || function(callback) { setTimeout(callback, 1000 / 60); };
	    var listeners = [];
	    function loop() {
	      listeners.forEach(function(item) {
	        var rootBounds = item.root.getBoundingClientRect();
	        var boundingClientRect = item.el.getBoundingClientRect();
	        var ratio = item.ratio;

	        if (boundingClientRect.bottom >= rootBounds.top &&
	          boundingClientRect.right >= rootBounds.left &&
	          boundingClientRect.top <= rootBounds.bottom &&
	          boundingClientRect.left <= rootBounds.right) {

	          if (typeof item.cb === 'function') {
	            item.cb({
	              boundingClientRect: boundingClientRect,
	              intersectionRatio: ratio,
	              intersectionRect: getIntersectionRect(rootBounds, boundingClientRect)
	            });
	          }

	        }
	      });
	      rAF(loop);
	    }

	    function getIntersectionRect(rootBounds, boundingClientRect) {
	      	var top = Math.max(rootBounds.top, boundingClientRect.top);
	     	var left = Math.max(rootBounds.left, boundingClientRect.left);
	      	var right = Math.min(rootBounds.right, boundingClientRect.right);
	      	var bottom = Math.min(rootBounds.bottom, boundingClientRect.bottom);
	      	return {
		        top: top,
		        left: left,
		        bottom: bottom,
		        right: right,
		        width: right - left,
		        height: bottom - top
	      	};
	    }

	    function getBoundingClientRect(el) {
		    var rect = el.getBoundingClientRect();
		    return {
		        top: rect.top,
		        left: rect.left,
		        bottom: rect.bottom,
		        right: rect.right,
		        width: rect.width || rect.right - rect.left,
		        height: rect.height || rect.bottom - rect.top
		    };
	    }

	    function indexOf(el) {
	     	var index = -1;
	      	listeners.some(function(item, i) {
		        if (item.el === el) {
		          	index = i;
		          	return true;
		        }
	      	});
	      	return index;
	    }

	    function IntersectionObserver(cb, options) {
	      	this.cb = cb;
	      	this.options = options;
	      	this.root = options.root || null;
	     	this.rootMargin = options.rootMargin || '0px';
	      	this.thresholds = options.threshold || [0];
	    }

	    IntersectionObserver.prototype.observe = function(el) {
		    var index = indexOf(el);
		    if (index !== -1) { return; }

		    listeners.push({
		        el: el,
		        cb: this.cb,
		        root: this.root,
		        rootMargin: this.rootMargin,
		        thresholds: this.thresholds,
		        ratio: null
		    });

		    if (!listeners.length || listeners.length === 1) {
		        rAF(loop);
		    }
	    };

	    IntersectionObserver.prototype.disconnect = function() {
	      	listeners = [];
	    };
	    window.IntersectionObserver = IntersectionObserver;
	};
	if (typeof window.IntersectionObserver === 'undefined') {
	    polyfill();
	}
})();
// Получаем все элементы video на странице
var videos = document.querySelectorAll('.myVideo');

// Создаем новый объект IntersectionObserver и передаем ему функцию обратного вызова
var observer = new IntersectionObserver(function(entries) {
  	// Перебираем все элементы, на которые установлено наблюдение
  	entries.forEach(function(entry) {
    // Получаем элемент video, для которого произош
        var video = entry.target;
	    // Если элемент находится в области видимости
	    if (entry.intersectionRatio > 0) {
	      	// Воспроизводим видео
	      	video.play();
	    } else {
	      	// Иначе останавливаем воспроизведение
	      	video.pause();
	    }
  	});
});

// Наблюдаем за каждым элементом video на странице
videos.forEach(function(video) {
  	observer.observe(video);
});
*/