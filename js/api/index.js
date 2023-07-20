let page = 0;
let loading = 0;
let loadingTime = true;

function colTovarsShow() {
	if (!emSreenWidth(479.98)) {
		if (page%6 == 0) {
			return 6;
		}
		return page%6;
	} else if (!emSreenWidth(767.98)) {
		if (page%6 == 0) {
			return 6;
		}
		return page%6;
	} else if (!emSreenWidth(991.98)) {
		if (page%8 == 0) {
			return 8;
		}
		return page%8;
	} else {
		if (page%10 == 0) {
			return 10;
		}
		return page%10;
	}
}

async function asyncProductsLength() {
	try {
		let response = await fetch(`http://supermart/api/get/products/length`);
		if (response.ok) {
			let result = await response.json();
			if (result > 0) {
				asyncProducts(result);
				loadingTime = false;
			} else {
				deleteBlockTovarLoading();
				animElements(1, 1);
				loading = 1;
			}
		} else {
			deleteBlockTovarLoading();
			animElements(1, 1);
			loading = 1;
		}
	} catch (error) {
		deleteBlockTovarLoading();
		animElements(1, 1);
		loading = 1;
	}
}
asyncProductsLength();

async function asyncProducts(productsLength) {
	if (!document.querySelector(".index .content__body")) {
		return false;
	}

	let col = colTovarsShow();

	if (productsLength - page < col) {
		col = productsLength - page;
	}

	if (col == 0) {
		animElements(1, 1);
		loading = 1;
		return false;
	}

	let response = await fetch(`http://supermart/api/get/products/page/${page}/col/${col}`);

	if (response.ok) {
		let result = await response.json();
		let content = document.querySelector(".index .content__body");
		let menuHTML = blockProduct(result);

		deleteBlockTovarLoading();

		content.innerHTML += menuHTML;

		loadingTime = false;

		addHintSearch();
		if (productsLength > page) {

			page += col;

			creatBlockTovarLoading(col);
		}
	} else {
		deleteBlockTovarLoading();
	}
}

function blockProduct(data) {
	let html = '';
	let entries = Object.entries(data);
	for (let index = 0; index < entries.length; index++) {
		const [key, value] = entries[index];
		html += `
				<div class="product__block product-block">
					<a href="tovar.php?id=${value.id}" class="product-block__image product-block-image">
					<div class="product-block-image__content">
				`;
		if (value.discount == "yes" || value.hit == "yes") {
			html += `
							<div class="product-block-image__sticker product-block-image-sticker">
								<div class="product-block-image-sticker__content">
							`;
			if (value.discount == "yes") {
				html += `
								<div class="product-block-image-sticker__discount">
									Скидка
								</div>
								`;
			}
			if (value.hit == "yes") {
				html += `
								<div class="product-block-image-sticker__hit">
									Хит
								</div>
								`;
			}
			html += `
								</div>
							</div>
							`;
		}
		html += `<div class="product-block-image__items">`;
		let imageLength = value.imageLength;
		if (imageLength > 4) {
			imageLength = 4;
		} else if (imageLength == 0) {
			imageLength = 1;
		}
		let mediaLength = value.mediaLength;
		for (let index = 0; index < imageLength; index++) {
			const imageItem = value.image[index];
			html += `
					<div class="product-block-image__item product-block-image-item">
						<div class="product-block-image-item__img">
							<img src="img/product/image/${imageItem}" alt="${imageItem}">
						</div>
					`;
			if ((mediaLength > 4 || (mediaLength - imageLength) > 0) && imageLength == index) {
				html += `
					<div class="product-block-image-item__infoimagetext product-block-image-item-infoimagetext">
						<div class="product-block-image-item-infoimagetext__icon">
							<svg viewBox="0 0 315 315"><path d="M307.5 53.5H81V41a7.5 7.5 0 00-7.5-7.5h-36A7.5 7.5 0 0030 41v12.5H7.5A7.5 7.5 0 000 61v213a7.5 7.5 0 007.5 7.5h300a7.5 7.5 0 007.5-7.5V61a7.5 7.5 0 00-7.5-7.5zM45 48.5h21v5H45v-5zm255 218H15v-198h285v198z"/><path d="M157.5 228.5c36.117 0 65.5-29.383 65.5-65.5s-29.383-65.5-65.5-65.5S92 126.883 92 163s29.383 65.5 65.5 65.5zm0-116c27.846 0 50.5 22.654 50.5 50.5s-22.654 50.5-50.5 50.5S107 190.846 107 163s22.654-50.5 50.5-50.5z"/><path d="M157.5 203.5c22.332 0 40.5-18.169 40.5-40.5s-18.168-40.5-40.5-40.5S117 140.669 117 163s18.168 40.5 40.5 40.5zm0-66c14.061 0 25.5 11.439 25.5 25.5s-11.439 25.5-25.5 25.5S132 177.061 132 163s11.439-25.5 25.5-25.5zM245.5 130.5h32a7.5 7.5 0 007.5-7.5V91a7.5 7.5 0 00-7.5-7.5h-32A7.5 7.5 0 00238 91v32a7.5 7.5 0 007.5 7.5zm7.5-32h17v17h-17v-17zM38.5 230.5h29A7.5 7.5 0 0075 223a7.5 7.5 0 00-7.5-7.5h-29A7.5 7.5 0 0031 223a7.5 7.5 0 007.5 7.5zM38.5 251.5h29A7.5 7.5 0 0075 244a7.5 7.5 0 00-7.5-7.5h-29A7.5 7.5 0 0031 244a7.5 7.5 0 007.5 7.5z"/></svg>
						</div>
						<div class="product-block-image-item-infoimagetext__content">
							Ещё <span class="product-block-image-item-infoimagetext__number">${value.imageLength - index}</span> фото
						</div>
					</div>
					`;
			}
			html += `
						<div class="product-block-image-item__pagination"></div>
					</div>
					`;
		}
		html += `
				</div >
				<div class="product-block-image__numberofimages product-block-image-numberofimages">
					<div class="product-block-image-numberofimages__number">
						${value.mediaLength}
					</div>
				</div>
			</div>
		</a>`;
		html += `<div class="product-block__info product-block-info">
					<a href="categories.php?category=${value.categoryId}" class="product-block-info__catigory"> Категория`;
		let entriesCategory = Object.entries(value.category);
		if (entriesCategory.length > 0) {
			for (let i = 0; i < entriesCategory.length; i++) {
				html += `${entriesCategory[i][1]}`;
				if ((i + 1) < entriesCategory.length) {
					html += ` - `;
				}
			}
		}
		html += `
					</a>
				<a href="tovar.php?id=${value.id}" class="product-block-info__title">
					${value.title}
				</a>
			<div class="product-block-info__price product-block-info-price">
					`;
		if (value.priceOld > 0) {
			html += `
									<div class="product-block-info-price__old product-block-info-price-old">
										<span class="product-block-info-price-old__number">
											${value.priceOld}
										</span>
										<span class="product-block-info-price-old__currency">
											сом
										</span>
									</div>`;
		}
		html += `
					<div class="product-block-info-price__now product-block-info-price-now">
						<span class="product-block-info-price-now__number">
							${value.priceNow}
						</span>
						<span class="product-block-info-price-now__currency">
							сом
						</span>
					</div>
				</div>
				<div class="product-block-info__ratinginfo product-block-info-ratinginfo">
					<a href="tovar.php?id=${value.id}/.moreinfo-tovar__content" class="product-block-info-ratinginfo__column product-block-info-ratinginfo__rating product-block-info-ratinginfo-rating">
						<span class="product-block-info-ratinginfo-rating__icon">
							<svg viewBox="0 0 512 512"><path d="M47.6 300.4l180.7 168.7c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9l180.7-168.7c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141-45.6-7.6-92 7.3-124.6 39.9l-12 12-12-12c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg>
						</span>
						<span class="product-block-info-ratinginfo-rating__number">
							${value.rating}
						</span>
					</a>
					<a href="tovar.php?id=${value.id}/.moreinfo-tovar-body-reviews__comentary" class="product-block-info-ratinginfo__column product-block-info-ratinginfo__viewreviews product-block-info-ratinginfo-viewreviews">
						<span class="product-block-info-ratinginfo-viewreviews__icon">
							<svg class="icon" viewBox="0 0 1024 1024"><defs><style/></defs><path d="M573 421c-23.1 0-41 17.9-41 40s17.9 40 41 40c21.1 0 39-17.9 39-40s-17.9-40-39-40zm-280 0c-23.1 0-41 17.9-41 40s17.9 40 41 40c21.1 0 39-17.9 39-40s-17.9-40-39-40z"/><path d="M894 345c-48.1-66-115.3-110.1-189-130v.1c-17.1-19-36.4-36.5-58-52.1-163.7-119-393.5-82.7-513 81-96.3 133-92.2 311.9 6 439l.8 132.6c0 3.2.5 6.4 1.5 9.4 5.3 16.9 23.3 26.2 40.1 20.9L309 806c33.5 11.9 68.1 18.7 102.5 20.6l-.5.4c89.1 64.9 205.9 84.4 313 49l127.1 41.4c3.2 1 6.5 1.6 9.9 1.6 17.7 0 32-14.3 32-32V753c88.1-119.6 90.4-284.9 1-408zM323 735l-12-5-99 31-1-104-8-9c-84.6-103.2-90.2-251.9-11-361 96.4-132.2 281.2-161.4 413-66 132.2 96.1 161.5 280.6 66 412-80.1 109.9-223.5 150.5-348 102zm505-17l-8 10 1 104-98-33-12 5c-56 20.8-115.7 22.5-171 7l-.2-.1C613.7 788.2 680.7 742.2 729 676c76.4-105.3 88.8-237.6 44.4-350.4l.6.4c23 16.5 44.1 37.1 62 62 72.6 99.6 68.5 235.2-8 330z"/><path d="M433 421c-23.1 0-41 17.9-41 40s17.9 40 41 40c21.1 0 39-17.9 39-40s-17.9-40-39-40z"/></svg>
						</span>
						<span class="product-block-info-ratinginfo-viewreviews__content product-block-info-ratinginfo-viewreviews-content">
							<span class="product-block-info-ratinginfo-viewreviews-content__text">
								Отзывы:
							</span>
							<span class="product-block-info-ratinginfo-viewreviews-content__number">
								${value.commentsLength}
							</span>
						</span>
					</a>
					<a href="tovar.php?id=${value.id}/.moreinfo-tovar-body-reviews__form" class="product-block-info-ratinginfo__column product-block-info-ratinginfo__writereview product-block-info-ratinginfo-writereview">
						<span class="product-block-info-ratinginfo-writereview__icon">
							<svg viewBox="0 0 448 512"><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32v144H48c-17.7 0-32 14.3-32 32s14.3 32 32 32h144v144c0 17.7 14.3 32 32 32s32-14.3 32-32V288h144c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
						</span>
						<span class="product-block-info-ratinginfo-writereview__text">
							Написать отзыв
						</span>
					</a>
				</div>
				<div class="product-block-info__buttons product-block-info-buttons">
					<button type="button" class="product-block-info-buttons__btn product-block-info-buttons__favorite product-block-info-buttons-favorite">
						<span class="product-block-info-buttons-favorite__icon">
							<svg viewBox="0 0 512 512"><path d="M47.6 300.4l180.7 168.7c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9l180.7-168.7c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141-45.6-7.6-92 7.3-124.6 39.9l-12 12-12-12c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg>
						</span>
						<span class="product-block-info-buttons-favorite__title">
							В избранные
						</span>
					</button>
					<button type="button" class="product-block-info-buttons__btn product-block-info-buttons__basket  product-block-info-buttons-basket">
						<span class="product-block-info-buttons-basket__icon">
							<svg viewBox="0 0 448 512"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64s14.3 32 32 32h384c17.7 0 32-14.3 32-32s-14.3-32-32-32h-96l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32l21.2 339c1.6 25.3 22.6 45 47.9 45h245.8c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
						</span>
						<span class="product-block-info-buttons-basket__title">
							В корзину
						</span>
					</button>
				</div>
				<div class="product-block-info__buy">
					<a href="#" class="product-block-info-buy__link product-block-info-buy__link  product-block-info-buy-link">
						<span class="product-block-info-buy-link__icon">
							<svg viewBox="0 0 90 90"><path d="M90 43.841c0 24.213-19.779 43.841-44.182 43.841a44.256 44.256 0 01-21.357-5.455L0 90l7.975-23.522a43.38 43.38 0 01-6.34-22.637C1.635 19.628 21.416 0 45.818 0 70.223 0 90 19.628 90 43.841zM45.818 6.982c-20.484 0-37.146 16.535-37.146 36.859 0 8.065 2.629 15.534 7.076 21.61L11.107 79.14l14.275-4.537A37.122 37.122 0 0045.819 80.7c20.481 0 37.146-16.533 37.146-36.857S66.301 6.982 45.818 6.982zm22.311 46.956c-.273-.447-.994-.717-2.076-1.254-1.084-.537-6.41-3.138-7.4-3.495-.993-.358-1.717-.538-2.438.537-.721 1.076-2.797 3.495-3.43 4.212-.632.719-1.263.809-2.347.271-1.082-.537-4.571-1.673-8.708-5.333-3.219-2.848-5.393-6.364-6.025-7.441-.631-1.075-.066-1.656.475-2.191.488-.482 1.084-1.255 1.625-1.882.543-.628.723-1.075 1.082-1.793.363-.717.182-1.344-.09-1.883-.27-.537-2.438-5.825-3.34-7.977-.902-2.15-1.803-1.792-2.436-1.792-.631 0-1.354-.09-2.076-.09s-1.896.269-2.889 1.344c-.992 1.076-3.789 3.676-3.789 8.963 0 5.288 3.879 10.397 4.422 11.113.541.716 7.49 11.92 18.5 16.223C58.2 65.771 58.2 64.336 60.186 64.156c1.984-.179 6.406-2.599 7.312-5.107.9-2.512.9-4.663.631-5.111z"/></svg>
						</span>
						<span class="product-block-info-buy-link__title">
							Купить через WhatsApp
						</span>
					</a>
				</div>
			</div>
				</div >
			`;
	}
	return html;
}

function deleteBlockTovarLoading() {
	let block = document.querySelectorAll(".product__block.product-block._show-loading");
	block.forEach(element => {
		element.remove();
	});
}

function creatBlockTovarLoading(params) {
	let content = document.querySelector(".index .content__body");
	let block = `
				<div class="product__block product-block _show-loading">
					<div class="product-block__image product-block-image">
						<div class="product-block-image__content"></div>
					</div>
					<div class="product-block__info product-block-info">
						<div class="product-block-info__catigory"></div>
						<div class="product-block-info__title"></div>
						<div class="product-block-info__buttons"></div>
					</div>
				</div>`;
	for (let index = 0; index < params; index++) {
		content.innerHTML += block;
	}
}

/* ===================================  Anim  --Start--  =================================== */
function animElements(add = 0, def = 0) {

	const moreLoading = document.querySelector('.more__loading');


	if (add == 1) {
		moreLoading.classList.remove('_show');
		return false;
	}

	if (def == 1) {
		moreLoading.classList.remove('_show');
		return false;
	}

	window.addEventListener('scroll', animOnScroll);

	function animOnScroll() {
		if (!loadingTime) {
			return false;
		}
		const moreLoadingHeight = moreLoading.offsetHeight;

		const rect = moreLoading.getBoundingClientRect();
		const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
		const moreLoadingOffset = rect.top + scrollTop;

		const animStart = 5;

		let moreLoadingPoint = window.innerHeight - moreLoadingHeight / animStart;

		if (moreLoadingHeight > window.innerHeight) {
			moreLoadingPoint = window.innerHeight - window.innerHeight / animStart;
		}

		if ((pageYOffset > moreLoadingOffset - moreLoadingPoint) && pageYOffset < (moreLoadingOffset + moreLoadingHeight)) {
			if (loading == 0) {
				moreLoading.classList.add('_show');
				asyncProductsLength();
			}
		}
	}
	animOnScroll();
}
animElements();
/* ===================================  Anim  --End--  =================================== */