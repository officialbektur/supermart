function catygory() {
	if (document.querySelector(".bkt-catygory")) {
		let bktCatygors = document.querySelectorAll(".bkt-catygory");
		for (let bktCatygorIndex = 0; bktCatygorIndex < bktCatygors.length; bktCatygorIndex++) {
			const bktCatygor = bktCatygors[bktCatygorIndex];
			let siteLanguageMenuButton = bktCatygor.querySelector(".bkt-catygory__button");
			let bktСatygoryButtonClear = bktCatygor.querySelector(".bkt-catygory-button__clear");
			let bktCatygoryProductId = bktCatygor.querySelector(".bkt-catygory-product-id");
			let bktCatygoryMenuMainList = bktCatygor.querySelectorAll("[data-id-catygory]");
			siteLanguageMenuButton.setAttribute("data-default-catygory-title", siteLanguageMenuButton.querySelector(".bkt-catygory-button__title").textContent.trim());
			if (bktCatygor.querySelector(".bkt-catygory-menu-main-defaultlist__button")) {
				let defaultlistButton = bktCatygor.querySelector(".bkt-catygory-menu-main-defaultlist__button");
				defaultlistButton.addEventListener("click", function () {
					bktCatygoryProductId.value = "0";
					defaultlistButton.classList.add("_catygoryActive");
					siteLanguageMenuButton.classList.add("_active");
					bktCatygor.classList.remove("_active");
					siteLanguageMenuButton.querySelector(".bkt-catygory-button__title").innerText = defaultlistButton.innerText;
					if (!document.querySelector(".index")) {
						bodyUnlock();
					}
				});
			}
			siteLanguageMenuButton.addEventListener('click', function (e) {
				if (!e.target.closest(".bkt-catygory-button__clear")) {
					if (!document.querySelector(".index")) {
						bodyLock();
					}
					bktCatygor.classList.add("_active");
				}
			});
			bktСatygoryButtonClear.addEventListener('click', function (e) {
				if (siteLanguageMenuButton.classList.contains("_active")) {
					siteLanguageMenuButton.classList.remove("_active");
					siteLanguageMenuButton.querySelector(".bkt-catygory-button__title").innerText = siteLanguageMenuButton.getAttribute("data-default-catygory-title");
					bktCatygor.querySelectorAll(".bkt-catygory-menu-main-sublist__button._catygoryActive").forEach(element => {
						element.classList.remove("_catygoryActive");
					});
					bktCatygor.querySelectorAll(".bkt-catygory-menu-main-list__button._catygoryActive").forEach(element => {
						element.classList.remove("_catygoryActive");
					});
					let subListMenuList = document.querySelectorAll(".bkt-catygory-menu-main-sublist__button");
					for (let index = 0; index < subListMenuList.length; index++) {
						const element = subListMenuList[index];
						_slideUp(element.nextElementSibling);
						element.classList.remove("_active");
					}
					if (bktCatygor.querySelector(".bkt-catygory-menu-main-defaultlist__button._catygoryActive")) {
						bktCatygor.querySelector(".bkt-catygory-menu-main-defaultlist__button._catygoryActive").classList.remove("_catygoryActive");
					}
				}
				bktCatygoryProductId.value = "";
			});
			bktCatygor.querySelector(".bkt-catygory-menu-header__close").addEventListener('click', function (e) {
				bktCatygor.classList.remove("_active");
				if (!document.querySelector(".index")) {
					bodyUnlock();
				}
			});
			bktCatygor.querySelector(".bkt-catygory-menu-header__back").addEventListener('click', function (e) {
				bktCatygor.classList.remove("_active");
				if (!document.querySelector(".index")) {
					bodyUnlock();
				}
			});
			document.body.addEventListener("click", function (e) {
				// if (bktCatygor.classList.contains("_active") && !e.target.closest(".bkt-catygory__button") && !e.target.closest(".bkt-catygory__menu")) {
				// 	bktCatygor.classList.remove("_active");
				//if (!document.querySelector(".index")) {
				// 	bodyUnlock();
				// }
				// }
			});
			for (let index = 0; index < bktCatygoryMenuMainList.length; index++) {
				const elemente = bktCatygoryMenuMainList[index];
				elemente.addEventListener('click', function (e) {
					bktCatygoryProductId.value = this.getAttribute("data-id-catygory");
					siteLanguageMenuButton.classList.add("_active");
					bktCatygor.classList.remove("_active");
					if (!document.querySelector(".index")) {
						bodyUnlock();
					}
					bktCatygor.querySelectorAll(".bkt-catygory-menu-main-sublist__button._catygoryActive").forEach(element => {
						element.classList.remove("_catygoryActive");
					});
					bktCatygor.querySelectorAll(".bkt-catygory-menu-main-list__button._catygoryActive").forEach(element => {
						element.classList.remove("_catygoryActive");
					});
					let names = ""
					delimiter = " / ";
					function name22(params, delimiter) {
						if (params.classList.contains("bkt-catygory-menu-main-defaultlist__button")) {
							if (params.parentElement.parentElement.parentElement.parentElement.classList.contains("bkt-catygory-menu-main-sublist__menulist")) {
								let datas = params.parentElement.parentElement.parentElement.parentElement.querySelector(".bkt-catygory-menu-main__defaultlist > .bkt-catygory-menu-main-defaultlist__button");
								params.parentElement.parentElement.parentElement.querySelector(".bkt-catygory-menu-main-sublist__button").classList.add("_catygoryActive");
								names += params.querySelector(".bkt-catygory-menu-main-defaultlist-button__categoryname").textContent.trim() + delimiter.trim();
								name22(datas, delimiter);
							} else {
								params.parentElement.parentElement.parentElement.querySelector(".bkt-catygory-menu-main-sublist__button").classList.add("_catygoryActive");
								names += params.querySelector(".bkt-catygory-menu-main-defaultlist-button__categoryname").textContent.trim();
							}
						} else {
							if (params.parentElement.parentElement.parentElement.parentElement.classList.contains("bkt-catygory-menu-main-sublist__menulist")) {
								let datas = params.parentElement.parentElement.parentElement.querySelector(".bkt-catygory-menu-main__defaultlist > .bkt-catygory-menu-main-defaultlist__button");
								names += params.querySelector(".bkt-catygory-menu-main-list-button__title").textContent.trim() + delimiter.trim();
								params.classList.add("_catygoryActive");
								name22(datas, delimiter);
							} else {
								names += params.querySelector(".bkt-catygory-menu-main-list-button__title").textContent.trim();
								params.classList.add("_catygoryActive");
							}
						}
						return names;
					}
					function name222(params, delimiter) {
						let nameArray = params.split(delimiter).reverse();
						let dnames = nameArray.join(delimiter);
						return dnames;
					}
					siteLanguageMenuButton.querySelector(".bkt-catygory-button__title").innerText = name222(name22(this, delimiter), delimiter);
				});
			}
		}
	}
}
catygory();