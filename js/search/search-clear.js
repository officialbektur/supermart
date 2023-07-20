function buttonClearInputSearch() {
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
buttonClearInputSearch();