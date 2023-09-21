function getHash() {
	if (location.hash) return location.hash.replace("#", "");
}
let _slideUp = function (target, duration = 500, showmore = 0) {
	if (!target.classList.contains("_slide")) {
		target.classList.add("_slide");
		target.style.transitionProperty = "height, margin, padding";
		target.style.transitionDuration = duration + "ms";
		target.style.height = `${target.offsetHeight}px`;
		target.offsetHeight;
		target.style.overflow = "hidden";
		target.style.height = showmore ? `${showmore}px` : `0px`;
		target.style.paddingTop = 0;
		target.style.paddingBottom = 0;
		target.style.marginTop = 0;
		target.style.marginBottom = 0;
		window.setTimeout((function () {
			target.hidden = !showmore ? true : false;
			!showmore ? target.style.removeProperty("height") : null;
			target.style.removeProperty("padding-top");
			target.style.removeProperty("padding-bottom");
			target.style.removeProperty("margin-top");
			target.style.removeProperty("margin-bottom");
			!showmore ? target.style.removeProperty("overflow") : null;
			target.style.removeProperty("transition-duration");
			target.style.removeProperty("transition-property");
			target.classList.remove("_slide");
			document.dispatchEvent(new CustomEvent("slideUpDone", {
				detail: {
					target
				}
			}));
		}), duration);
	}
};
let _slideDown = function (target, duration = 500, showmore = 0) {
	if (!target.classList.contains("_slide")) {
		target.classList.add("_slide");
		target.hidden = target.hidden ? false : null;
		showmore ? target.style.removeProperty("height") : null;
		let height = target.offsetHeight;
		target.style.overflow = "hidden";
		target.style.height = showmore ? `${showmore}px` : `0px`;
		target.style.paddingTop = 0;
		target.style.paddingBottom = 0;
		target.style.marginTop = 0;
		target.style.marginBottom = 0;
		target.offsetHeight;
		target.style.transitionProperty = "height, margin, padding";
		target.style.transitionDuration = duration + "ms";
		target.style.height = height + "px";
		target.style.removeProperty("padding-top");
		target.style.removeProperty("padding-bottom");
		target.style.removeProperty("margin-top");
		target.style.removeProperty("margin-bottom");
		window.setTimeout((function () {
			target.style.removeProperty("height");
			target.style.removeProperty("overflow");
			target.style.removeProperty("transition-duration");
			target.style.removeProperty("transition-property");
			target.classList.remove("_slide");
			document.dispatchEvent(new CustomEvent("slideDownDone", {
				detail: {
					target
				}
			}));
		}), duration);
	}
};
let _slideToggle = function (target, duration = 500) {
	if (target.hidden) return _slideDown(target, duration); else return _slideUp(target, duration);
};
let bodyLockStatus = true;
let bodyLockToggle = function () {
	let delay = 500;
	if (document.documentElement.classList.contains("lock")) bodyUnlock(delay); else bodyLock(delay);
};
let bodyUnlock = function () {
	let delay = 500;
	let body = document.querySelector("body");
	if (bodyLockStatus) {
		let lock_padding = document.querySelectorAll("[data-lp]");
		setTimeout((function () {
			for (let index = 0; index < lock_padding.length; index++) {
				const el = lock_padding[index];
				el.style.paddingRight = "0px";
			}
			body.style.paddingRight = "0px";
			document.documentElement.classList.remove("lock");
		}), delay);
		bodyLockStatus = false;
		setTimeout((function () {
			bodyLockStatus = true;
		}), delay);
	}
};
let bodyLock = function () {
	let delay = 500;
	let body = document.querySelector("body");
	if (bodyLockStatus) {
		let lock_padding = document.querySelectorAll("[data-lp]");
		for (let index = 0; index < lock_padding.length; index++) {
			const el = lock_padding[index];
			el.style.paddingRight = window.innerWidth - document.querySelector(".wrapper").offsetWidth + "px";
		}
		body.style.paddingRight = window.innerWidth - document.querySelector(".wrapper").offsetWidth + "px";
		document.documentElement.classList.add("lock");
		bodyLockStatus = false;
		setTimeout((function () {
			bodyLockStatus = true;
		}), delay);
	}
};
function uniqArray(array) {
	return array.filter((function (item, index, self) {
		return self.indexOf(item) === index;
	}));
}
function dataMediaQueries(array, dataSetValue) {
	const media = Array.from(array).filter((function (item, index, self) {
		if (item.dataset[dataSetValue]) return item.dataset[dataSetValue].split(",")[0];
	}));
	if (media.length) {
		const breakpointsArray = [];
		media.forEach((function (item) {
			const params = item.dataset[dataSetValue];
			const breakpoint = {};
			const paramsArray = params.split(",");
			breakpoint.value = paramsArray[0];
			breakpoint.type = paramsArray[1] ? paramsArray[1].trim() : "max";
			breakpoint.item = item;
			breakpointsArray.push(breakpoint);
		}));
		let mdQueries = breakpointsArray.map((function (item) {
			return "(" + item.type + "-width: " + item.value / 16 + "em)," + item.value + "," + item.type;
		}));
		mdQueries = uniqArray(mdQueries);
		const mdQueriesArray = [];
		if (mdQueries.length) {
			mdQueries.forEach((function (breakpoint) {
				const paramsArray = breakpoint.split(",");
				const mediaBreakpoint = paramsArray[1];
				const mediaType = paramsArray[2];
				const matchMedia = window.matchMedia(paramsArray[0]);
				const itemsArray = breakpointsArray.filter((function (item) {
					if (item.value === mediaBreakpoint && item.type === mediaType) return true;
				}));
				mdQueriesArray.push({
					itemsArray,
					matchMedia
				});
			}));
			return mdQueriesArray;
		}
	}
}
function emSreenWidth(sreenWidth = 767.98) {
	let numberDefault = Number(window.getComputedStyle(document.documentElement).getPropertyValue('font-size').match(/\d+/)[0]);
	let emSreenWidth = (window.innerWidth / numberDefault);
	if (sreenWidth != 767.98) {
		return (sreenWidth / 16) <= emSreenWidth;
	} else {
		return (sreenWidth / 16) <= emSreenWidth;
	}
}
function isScreenWidthInRange(screenWidth = 767.98) {
	// Получаем текущее значение размера шрифта в пикселях
	const fontSizeInPixels = parseFloat(window.getComputedStyle(document.documentElement).getPropertyValue('font-size'));

	// Вычисляем значение ширины экрана в em, делением текущей ширины на размер шрифта
	const emScreenWidth = window.innerWidth / fontSizeInPixels;

	// Проверяем, попадает ли em-значение ширины экрана в заданный диапазон
	return (screenWidth / fontSizeInPixels) <= emScreenWidth;
}
