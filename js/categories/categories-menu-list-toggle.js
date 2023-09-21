function menuSubList() {
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
menuSubList();