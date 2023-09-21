function menuCategory() {
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
menuCategory();