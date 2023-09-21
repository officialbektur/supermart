function filterMenuSortingSelect() {
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
filterMenuSortingSelect();