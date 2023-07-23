
function addCategoryShow() {
	if (!document.querySelector(".mrb-admin-form__label_dp_addcategory")) {
		return false;
	}
	let addCategory = document.querySelector(".mrb-admin-form__label_dp_addcategory");
	let addCategoryClose = document.querySelector(".bkt-addcatygory__close");
	addCategory.addEventListener("click", function () {
		let bktAddCatygory = document.querySelector(".bkt-addcatygory");
		bktAddCatygory.classList.add("_show");
		bodyLock();
	});

	addCategoryClose.addEventListener("click", function () {
		let bktAddCatygory = document.querySelector(".bkt-addcatygory");
		bktAddCatygory.classList.remove("_show");
		bodyUnlock();
	});
	document.querySelector(".bkt-addcatygory").addEventListener("click", function (e) {
		if (!e.target.closest(".bkt-addcatygory__body")) {
			let bktAddCatygory = document.querySelector(".bkt-addcatygory");
			bodyUnlock();
			bktAddCatygory.classList.remove("_show");
		}
	});
}
addCategoryShow();
function addCategory() {
	if (document.querySelector('.bkt-addcatygory-addform__form')) {
		let block = document.querySelectorAll(".bkt-addcatygory__block");
		let headerBlock = document.querySelectorAll(".bkt-addcatygory-header__block");
		let preloader = document.querySelector(".bkt-addcatygory-header__preloader span");
		let input = document.querySelector(".bkt-addcatygory-addform__input");
		let next = document.querySelectorAll(".bkt-addcatygory__next");
		let prev = document.querySelectorAll(".bkt-addcatygory__prev");
		let index = 0;
		let indexs = 1;
		for (let i = 0; i < next.length; i++) {
			const element = next[i];
			element.addEventListener("click", function () {
				if ((block.length - 1) == index) {
					bodyUnlock();
					document.querySelector(".bkt-addcatygory").classList.remove("_show");
					block[index].classList.remove("_show");
					block[0].classList.add("_show");
					index = 0;
					indexs = 1;
					preloader.style.width = "0%";
					input.value = null;
					for (let i = 1; i < headerBlock.length; i++) {
						const element = headerBlock[i];
						element.classList.remove("_active");
					}
					const bktCatygor = document.querySelector(".bkt-addcatygory .bkt-catygory");
					setTimeout(() => {
						let siteLanguageMenuButton = bktCatygor.querySelector(".bkt-catygory__button");
						let bktCatygoryProductId = bktCatygor.querySelector(".bkt-catygory-product-id");
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
						bktCatygoryProductId.value = "";
					}, 800);
				} else {
					if (0 == index && input.value.length > 0) {
						block[index].classList.remove("_show");
						index++;
						indexs++;
						block[index].classList.add("_show");
						preloader.style.width = (((index) / (block.length - 1)) * 100) + "%";
					}
					if (1 == index && document.querySelector(".bkt-addcatygory .bkt-catygory-product-id").value.length) {
						block[index].classList.remove("_show");
						index++;
						indexs++;
						block[index].classList.add("_show");
						preloader.style.width = (((index) / (block.length - 1)) * 100) + "%";
						async function sendNowCategory() {
							let formData = new FormData();
							formData.append("name", document.querySelector(".bkt-addcatygory .bkt-addcatygory-addform__input").value);
							formData.append("parent", document.querySelector(".bkt-addcatygory .bkt-catygory-product-id").value);
							let response = await fetch('/api/create/category', {
								method: "POST",
								body: formData
							});

							if (response.ok) {
								let result = await response.json();
								document.querySelector(".bkt-addcatygory__title span").innerText = result.message;
							} else {
								document.querySelector(".bkt-addcatygory__title span").innerText = "Не смогли добавитьлено!";
							}
						}
						sendNowCategory();
						asyncCategoriesFilter();
					}
					headerBlock[index].classList.add("_active");
				}
			});
		}
		for (let i = 0; i < prev.length; i++) {
			const element = prev[i];
			element.addEventListener("click", function () {
				headerBlock[index].classList.remove("_active");
				block[index].classList.remove("_show");
				index--;
				indexs--;
				block[index].classList.add("_show");
				preloader.style.width = (((index) / (block.length - 1)) * 100) + "%";
			});
		}
	}
}
addCategory();