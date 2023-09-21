
function activeCategoriesFilterClickButton() {
	if (!document.querySelector(".bkt-catygory-menu-main-sublist__menulist")) {
		return false;
	}
	let lockTime = true;
	let subListMenu = document.querySelectorAll(".bkt-catygory-menu-main-sublist__menulist");
	let subListMenuList = document.querySelectorAll(".bkt-catygory-menu-main-sublist__button");
	for (let index = 0; index < subListMenu.length; index++) {
		const element = subListMenu[index];
		_slideUp(element);
	}
	for (let index = 0; index < subListMenuList.length; index++) {
		const element = subListMenuList[index];
		element.addEventListener('click', function (e) {
			if (lockTime) {
				lockTime = false;
				_slideToggle(element.nextElementSibling);
				element.classList.toggle("_active");
				setTimeout(() => {
					lockTime = true;
				}, 500);
			}
		});
	}
}
activeCategoriesFilterClickButton();