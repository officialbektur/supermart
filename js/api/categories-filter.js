async function asyncCategoriesFilter() {
	try {
		let response = await fetch('http://supermart/api/get/categories/');
		if (response.ok) {
			let result = await response.json();
			if (document.querySelector(".bkt-catygory .bkt-catygory-menu__main")) {
				let content = document.querySelectorAll(".bkt-catygory .bkt-catygory-menu__main");
				let menuHTML = buildMenuCategoryFilterHTML(result);
				for (let index = 0; index < content.length; index++) {
					const contentItem = content[index];
					contentItem.innerHTML = '';
					contentItem.innerHTML = menuHTML;
				}
			}
		} else {
			for (let index = 0; index < document.querySelectorAll(".bkt-catygory .bkt-catygory-menu__main").length; index++) {
				const contentItem = document.querySelectorAll(".bkt-catygory .bkt-catygory-menu__main")[index];
				contentItem.innerHTML = '<div cl<div class="bkt-catygory-menu-main__null">Нету данных!</div>';
			}
		}
	} catch (error) {
		for (let index = 0; index < document.querySelectorAll(".bkt-catygory .bkt-catygory-menu__main").length; index++) {
			const contentItem = document.querySelectorAll(".bkt-catygory .bkt-catygory-menu__main")[index];
			contentItem.innerHTML = '<div class="bkt-catygory-menu-main__null">Ошибка!' + " " + error + '</div>';
		}
	}
	activeCategoriesFilterClickButton();
	catygory();
	menuSubList();
}
asyncCategoriesFilter();
function buildMenuCategoryFilterHTML(data) {
	let html = '';
	let entries = Object.entries(data);
	for (let i = 0; i < entries.length; i++) {
		const [key, value] = entries[i];
		if (value.id) {
			if (value.childs) {
				html += `<div class="bkt-catygory-menu-main__sublist bkt-catygory-menu-main-sublist">
							<button type="button" class="bkt-catygory-menu-main-sublist__button bkt-catygory-menu-main-sublist-button a-hover-bgc">
								<span class="bkt-catygory-menu-main-sublist-button__title">
									${value.name}
								</span>
								<span class="bkt-catygory-menu-main-sublist-button__icon">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
										<path d="M352 352c-8.188 0-16.38-3.125-22.62-9.375L192 205.3l-137.4 137.4c-12.5 12.5-32.75 12.5-45.25 0s-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25C368.4 348.9 360.2 352 352 352z" />
									</svg>
								</span>
							</button>
							<div class="bkt-catygory-menu-main-sublist__menulist bkt-catygory-menu-main-sublist-menulist">
								<div class="bkt-catygory-menu-main__defaultlist bkt-catygory-menu-main-defaultlist">
									<button type="button" data-id-catygory="${value.id}" class="bkt-catygory-menu-main-defaultlist__button bkt-catygory-menu-main-defaultlist-button a-hover-bgc">
										Всё в категории <span class="bkt-catygory-menu-main-defaultlist-button__categoryname">${value.name}</span>
									</button>
								</div>
								${buildMenuCategoryFilterHTML(value.childs)}
							</div>
						</div>`;
			} else {
				html += `<div class="bkt-catygory-menu-main__list bkt-catygory-menu-main-list">
								<button type="button" data-id-catygory="${value.id}" class="bkt-catygory-menu-main-list__button bkt-catygory-menu-main-list-button a-hover-bgc">
									<span class="bkt-catygory-menu-main-list-button__title">
										${value.name}
									</span>
								</button>
							</div>`;
			}
		}
	}
	return html;
}