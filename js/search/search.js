function historySearch() {
	if (document.querySelector(".header-top-search__input")) {
		let input = document.querySelector(".header-top-search__input");
		let menu = document.querySelector(".header-top-search__hint");
		input.addEventListener('focus', function (e) {
			menu.classList.add("_active");
		});
		document.addEventListener("click", function (e) {
			if (menu.classList.contains("_active") && !e.target.closest(".header-top-search__hint") && !e.target.closest(".header-top-search__input")) {
				menu.classList.remove("_active");
			}
		});
	}
}
historySearch();
function serachHistory() {
	if (!document.querySelector(".header-top-search-hint__history")) {
		return false;
	}
	let content = document.querySelector(".header-top-search-hint__history > .header-top-search-hint__menu");
	let buttonClear = document.querySelector(".header-top-search-hint__history .header-top-search-hint-headertop__clear");
	if (typeof localStorage.searchHistory != undefined && localStorage.searchHistory != "") {
		let localStorageserachHistory = localStorage.searchHistory;
		let block = `<div class="header-top-search-hint-menu__list a-hover-bgc">
						${String(localStorageserachHistory)}
					</div>`;
		content.innerHTML = block;
	} else {
		let block = `<div class="header-top-search-hint-menu__notlist">История пусто</div>`;
		content.innerHTML = block;
	}
	buttonClear.addEventListener("click", function () {
		if (typeof localStorage.searchHistory != undefined && localStorage.searchHistory != "") {
			localStorage.searchHistory = "";
			serachHistory();
		}
	});

}
serachHistory();



function hiddenHeaderTopSearch() {
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
hiddenHeaderTopSearch();

