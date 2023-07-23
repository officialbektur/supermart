async function asyncSearchHint() {
	if (!document.querySelector(".header-top-search-hint__footer .header-top-search-hint__menu")) {
		return false;
	}
	try {
		let response = await fetch('/api/get/searchhint/');
		if (response.ok) {
			let result = await response.json();
			if (document.querySelector(".header-top-search-hint__footer .header-top-search-hint__menu")) {
				let content = document.querySelector(".header-top-search-hint__footer .header-top-search-hint__menu");
				let menuHTML = buildSearchHintHTML(result);
				content.innerHTML = '';
				content.innerHTML = menuHTML;
			}
		} else {
			let content = document.querySelector(".header-top-search-hint__footer .header-top-search-hint__menu");
			content.innerHTML = '';
			content.innerHTML = `<div class="header-top-search-hint-menu__notlist">История пусто</div>`;
		}
	} catch (error) {
		let content = document.querySelector(".header-top-search-hint__footer .header-top-search-hint__menu");
		content.innerHTML = '';
		content.innerHTML = '<div class="header-top-search-hint-menu__notlist">Ошибка!</div>';
	}
	addHintSearch();
}
asyncSearchHint();
function buildSearchHintHTML(data) {
	let html = '';
	let entries = Object.entries(data);
	for (let index = 0; index < entries.length; index++) {
		const [key, value] = entries[index];
		html += `
				<div class="header-top-search-hint-menu__list a-hover-bgc">
					${value.title}
				</div>
				`;
	}
	return html;
}