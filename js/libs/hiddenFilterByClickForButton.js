function hiddenFilterByClickForButton() {
	if (document.querySelector(".header-top-search-filter-menu__close")) {
		let button = document.querySelector(".header-top-search-filter-menu__close");
		button.addEventListener('click', function (e) {
			button.parentElement.parentElement.classList.remove("_active");
		});
	}
}
hiddenFilterByClickForButton();