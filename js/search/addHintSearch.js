function addHintSearch() {
	if (document.querySelector(".header-top-search-hint-menu__list")) {
		let lists = document.querySelectorAll(".header-top-search-hint-menu__list");
		let input = document.querySelector(".header-top-search__input");
		for (let index = 0; index < lists.length; index++) {
			const list = lists[index];
			list.addEventListener("click", function (e) {
				input.value += this.textContent.trim();
			});
		}
	}
}
addHintSearch();