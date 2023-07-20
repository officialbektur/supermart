function showFilterByClickForButton() {
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
showFilterByClickForButton();