async function asyncCategoriesMenu() {
	try {
		let response = await fetch('http://supermart/api/get/categories/');
		if (response.ok) {
			let result = await response.json();
			if (document.querySelector(".header-footer-menu__content")) {
				let content = document.querySelectorAll(".header-footer-menu__content");
				let menuHTML = buildMenuCategoryHTML(result);
				for (let index = 0; index < content.length; index++) {
					const contentItem = content[index];
					contentItem.innerHTML = '';
					contentItem.innerHTML = menuHTML;
				}
			}
		} else {
			for (let index = 0; index < document.querySelectorAll(".header-footer-menu__content").length; index++) {
				const contentItem = document.querySelectorAll(".header-footer-menu__content")[index];
				contentItem.innerHTML = '<div class="header-footer-menu__list">Нету данных!</div>';
			}
		}
	} catch (error) {
		for (let index = 0; index < document.querySelectorAll(".header-footer-menu__content").length; index++) {
			const contentItem = document.querySelectorAll(".header-footer-menu__content")[index];
			contentItem.innerHTML = '<div class="header-footer-menu__list">Ошибка!' + " " + error + '</div>';
		}
	}
	activeCategoriesFilterClickButton();
	catygory();
	menuSubList();
}
asyncCategoriesMenu();
function buildMenuCategoryHTML(data) {
	let html = '';
	let entries = Object.entries(data);
	for (let i = 0; i < entries.length; i++) {
		const [key, value] = entries[i];
		if (value.id) {
			if (value.childs) {
				html += `
							<div class="header-footer-menu__sublist header-footer-menu-sublist">
								<div class="header-footer-menu-sublist__button header-footer-menu-sublist-button a-hover-bgc">
									<a href="categories.php?category=${value.id}" class="header-footer-menu-sublist-button__title">
										${value.name}
									</a>
									<span class="header-footer-menu-sublist-button__icon">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
											<path d="M352 352c-8.188 0-16.38-3.125-22.62-9.375L192 205.3l-137.4 137.4c-12.5 12.5-32.75 12.5-45.25 0s-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25C368.4 348.9 360.2 352 352 352z" />
										</svg>
									</span>
								</div>
								<div class="header-footer-menu-sublist__menulist header-footer-menu-sublist-menulist">
									<div class="header-footer-menu-sublist-menulist__content">
										${buildMenuCategoryHTML(value.childs)}
									</div>
								</div>
							</div>
						`;
			} else {
				html += `
							<a href = "categories.php?category=${value.id}" class="header-footer-menu__list a-hover-bgc" > ${value.name}</a>
						`;
			}
		}
	}
	return html;
}