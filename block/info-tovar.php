<section class="content moreinfo-tovar">
	<div class="content__container">
		<h2 class="_title">
			<?php print $title; ?> о <?php echo mysqli_fetch_assoc(get_product_tovar())['title']; ?>
		</h2>
		<div class="moreinfo-tovar__body">
			<div class="moreinfo-tovar__info moreinfo-tovar-info">
				<div class="moreinfo-tovar-info__image moreinfo-tovar-info-image">
					<div class="moreinfo-tovar-info-image__sliderbig moreinfo-tovar-info-image-sliderbig">
						<?php
							if (mysqli_fetch_assoc(get_product_tovar())["discount"] == "yes" or mysqli_fetch_assoc(get_product_tovar())["hit"] == "yes") {
								echo '<div class="moreinfo-tovar-info-image-sliderbig__sticker moreinfo-tovar-info-image-sliderbig-sticker">
									<div class="moreinfo-tovar-info-image-sliderbig-sticker__content">';
								if (mysqli_fetch_assoc(get_product_tovar())["discount"] == "yes") {
									echo '<div class="moreinfo-tovar-info-image-sliderbig-sticker__discount">
												Скидка
											</div>';
								}
								if (mysqli_fetch_assoc(get_product_tovar())["hit"] == "yes") {
									echo '<div class="moreinfo-tovar-info-image-sliderbig-sticker__hit">
											Хит
										</div>';
								}
								echo '</div></div>';
							}
						?>
						<div data-gallery class="swiper-wrapper">
							<?php
								$allProductsImages = get_product_images($_GET["id"]);
								if (get_product_images_lagth($_GET["id"]) > 0) {
									foreach ($allProductsImages as $allProductsImage) {
										if ($allProductsImage["type"] == "video") {
											echo '<a data-video=\'{"source": [{"src":"img/product-blocks/' . $allProductsImage["src-video"] . '", "type":"video/mp4"}], "attributes": {"preload": false, "controls": true}}\' class="swiper-slide moreinfo-tovar-info-image-sliderbig__slide moreinfo-tovar-info-image-sliderbig-slide">
												<span class="moreinfo-tovar-info-image-sliderbig-slide__image">
													<video class="myVideo" src="img/product-blocks/' . $allProductsImage["src-video"] . '" controls played muted loop></video>
												</span>
												<span class="moreinfo-tovar-info-image-sliderbig-slide__background">
													<img src="img/shortcuticons/icon.png" alt="' . mysqli_fetch_assoc(get_product_tovar())['title'] . '" />
												</span>
											</a>';
										} else {
											echo '<a data-src="img/product-blocks/' . $allProductsImage["src-max"] . '" class="swiper-slide moreinfo-tovar-info-image-sliderbig__slide moreinfo-tovar-info-image-sliderbig-slide">
												<span class="moreinfo-tovar-info-image-sliderbig-slide__image">
													<img src="img/product-blocks/' . $allProductsImage["src-max"] . '" alt="' . mysqli_fetch_assoc(get_product_tovar())['title'] . '" />
												</span>
												<span class="moreinfo-tovar-info-image-sliderbig-slide__background">
													<img src="img/product-blocks/' . $allProductsImage["src-max"] . '" alt="' . mysqli_fetch_assoc(get_product_tovar())['title'] . '" />
												</span>
											</a>';
										}
									}
								} else {
									echo '<a data-src="img/shortcuticons/' . mysqli_fetch_assoc(get_product_images(0))["src-max"] . '" class="swiper-slide moreinfo-tovar-info-image-sliderbig__slide moreinfo-tovar-info-image-sliderbig-slide">
										<span class="moreinfo-tovar-info-image-sliderbig-slide__image">
											<img src="img/shortcuticons/' . mysqli_fetch_assoc(get_product_images(0))["src-max"] . '" alt="' . mysqli_fetch_assoc(get_product_tovar())['title'] . '" />
										</span>
										<span class="moreinfo-tovar-info-image-sliderbig-slide__background">
											<img src="img/shortcuticons/' . mysqli_fetch_assoc(get_product_images(0))["src-max"] . '" alt="' . mysqli_fetch_assoc(get_product_tovar())['title'] . '" />
										</span>
									</a>';
								}
							?>
						</div>
						<button type="button" class="moreinfo-tovar-info-image-sliderbig-pagination__next moreinfo-tovar-info-image-sliderbig-pagination-next">
							<span class="moreinfo-tovar-info-image-sliderbig-pagination-next__icon">
								<svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H109.3l105.3-105.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
							</span>
						</button>
						<button type="button" class="moreinfo-tovar-info-image-sliderbig-pagination__prev">
							<span class="moreinfo-tovar-info-image-sliderbig-pagination-prev__icon">
								<svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H109.3l105.3-105.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
							</span>
						</button>
					</div>
					<div class="moreinfo-tovar-info-image__pagination moreinfo-tovar-info-image-pagination">
						<div class="swiper-wrapper">
							<?php
								$allProductsImages = get_product_images($_GET["id"]);
								if (get_product_images_lagth($_GET["id"]) > 0) {
									foreach ($allProductsImages as $allProductsImage) {
										if ($allProductsImage["type"] == "video") {
											echo '<div class="swiper-slide">
													<video src="img/product-blocks/' . $allProductsImage["src-video"] . '"></video>
												</div>';
										} else {
											echo '<div class="swiper-slide">
													<img src="img/product-blocks/' . $allProductsImage["src-min"] . '" alt="' . mysqli_fetch_assoc(get_product_tovar())['title'] . '" />
												</div>';
										}
									}
								} else {
									echo '<div class="swiper-slide">
											<img src="img/shortcuticons/'  . mysqli_fetch_assoc(get_product_images(0))["src-min"] . '" alt="' . mysqli_fetch_assoc(get_product_tovar())['title'] . '" />
										</div>';
								}
							?>
						</div>
						<button type="button" class="moreinfo-tovar-info-image-pagination__next moreinfo-tovar-info-image-pagination-next">
							<span class="moreinfo-tovar-info-image-pagination-next__icon">
								<svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H109.3l105.3-105.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
							</span>
						</button>
						<button type="button" class="moreinfo-tovar-info-image-pagination__prev">
							<span class="moreinfo-tovar-info-image-pagination-prev__icon">
								<svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H109.3l105.3-105.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
							</span>
						</button>
					</div>
				</div>
				<div class="moreinfo-tovar-info__textinfo moreinfo-tovar-info-textinfo">
					<div class="moreinfo-tovar-info-textinfo__category"><a href="categories.php">Категория /</a> <?php echo breadcrumb(mysqli_fetch_assoc(get_product_tovar())['category']); ?></div>
					<div class="moreinfo-tovar-info-textinfo__title"><?php echo mysqli_fetch_assoc(get_product_tovar())['title']; ?></div>
					<div class="moreinfo-tovar-info-textinfo__price moreinfo-tovar-info-textinfo-price">
						<?php
							if (getbrosocrat(mysqli_fetch_assoc(get_product_tovar())['priceOld']) > 0) {
								echo '<div class="moreinfo-tovar-info-textinfo-price__old moreinfo-tovar-info-textinfo-price-old">
										<span class="moreinfo-tovar-info-textinfo-price-old__number">
											'. getbrosocrat(mysqli_fetch_assoc(get_product_tovar())['priceOld']) .'
										</span>
										<span class="moreinfo-tovar-info-textinfo-price-old__currency">сом</span>
									</div>';
							}
						?>
						<div class="moreinfo-tovar-info-textinfo-price__new moreinfo-tovar-info-textinfo-price-new">
							<span class="moreinfo-tovar-info-textinfo-price-new__number"><?php echo getbrosocrat(mysqli_fetch_assoc(get_product_tovar())['priceNow']); ?></span>
							<span class="moreinfo-tovar-info-textinfo-price-new__currency">сом</span>
						</div>
					</div>
					<div class="moreinfo-tovar-info-textinfo__ratinginfo moreinfo-tovar-info-textinfo-ratinginfo">
						<a href data-goto-header data-goto=".moreinfo-tovar__content" class="moreinfo-tovar-info-textinfo-ratinginfo__column moreinfo-tovar-info-textinfo-ratinginfo__rating moreinfo-tovar-info-textinfo-ratinginfo-rating">
							<span class="moreinfo-tovar-info-textinfo-ratinginfo-rating__icon">
								<svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M47.6 300.4l180.7 168.7c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9l180.7-168.7c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141-45.6-7.6-92 7.3-124.6 39.9l-12 12-12-12c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg>
							</span>
							<span class="moreinfo-tovar-info-textinfo-ratinginfo-rating__number">
								<?php echo get_product_rating($_GET["id"]); ?>
							</span>
						</a>
						<a href data-goto-header data-goto=".moreinfo-tovar-body-reviews__form" class="moreinfo-tovar-info-textinfo-ratinginfo__column moreinfo-tovar-info-textinfo-ratinginfo__viewreviews moreinfo-tovar-info-textinfo-ratinginfo-viewreviews">
							<span class="moreinfo-tovar-info-textinfo-ratinginfo-viewreviews__icon">
								<svg class="icon" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><defs><style/></defs><path d="M573 421c-23.1 0-41 17.9-41 40s17.9 40 41 40c21.1 0 39-17.9 39-40s-17.9-40-39-40zm-280 0c-23.1 0-41 17.9-41 40s17.9 40 41 40c21.1 0 39-17.9 39-40s-17.9-40-39-40z"/><path d="M894 345c-48.1-66-115.3-110.1-189-130v.1c-17.1-19-36.4-36.5-58-52.1-163.7-119-393.5-82.7-513 81-96.3 133-92.2 311.9 6 439l.8 132.6c0 3.2.5 6.4 1.5 9.4 5.3 16.9 23.3 26.2 40.1 20.9L309 806c33.5 11.9 68.1 18.7 102.5 20.6l-.5.4c89.1 64.9 205.9 84.4 313 49l127.1 41.4c3.2 1 6.5 1.6 9.9 1.6 17.7 0 32-14.3 32-32V753c88.1-119.6 90.4-284.9 1-408zM323 735l-12-5-99 31-1-104-8-9c-84.6-103.2-90.2-251.9-11-361 96.4-132.2 281.2-161.4 413-66 132.2 96.1 161.5 280.6 66 412-80.1 109.9-223.5 150.5-348 102zm505-17l-8 10 1 104-98-33-12 5c-56 20.8-115.7 22.5-171 7l-.2-.1C613.7 788.2 680.7 742.2 729 676c76.4-105.3 88.8-237.6 44.4-350.4l.6.4c23 16.5 44.1 37.1 62 62 72.6 99.6 68.5 235.2-8 330z"/><path d="M433 421c-23.1 0-41 17.9-41 40s17.9 40 41 40c21.1 0 39-17.9 39-40s-17.9-40-39-40z"/></svg>
							</span>
							<span class="moreinfo-tovar-info-textinfo-ratinginfo-viewreviews__content moreinfo-tovar-info-textinfo-ratinginfo-viewreviews-content">
								<span class="moreinfo-tovar-info-textinfo-ratinginfo-viewreviews-content__text">
									Отзывы:
								</span>
								<span class="moreinfo-tovar-info-textinfo-ratinginfo-viewreviews-content__number">
									<?php echo getbrosocrat(get_product_comments_lagth($_GET["id"])); ?>
								</span>
							</span>
						</a>
						<a href data-goto-header data-goto=".moreinfo-tovar-body-reviews__comentary" class="moreinfo-tovar-info-textinfo-ratinginfo__column moreinfo-tovar-info-textinfo-ratinginfo__writereview moreinfo-tovar-info-textinfo-ratinginfo-writereview">
							<span class="moreinfo-tovar-info-textinfo-ratinginfo-writereview__icon">
								<svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32v144H48c-17.7 0-32 14.3-32 32s14.3 32 32 32h144v144c0 17.7 14.3 32 32 32s32-14.3 32-32V288h144c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
							</span>
							<span class="moreinfo-tovar-info-textinfo-ratinginfo-writereview__text">
								Написать отзыв
							</span>
						</a>
					</div>
					<div class="moreinfo-tovar-info-textinfo__buttons">
						<div class="moreinfo-tovar-info-textinfo__btnfavorite moreinfo-tovar-info-textinfo-btnfavorite">
							<button type="button" class="moreinfo-tovar-info-textinfo-btnfavorite__button moreinfo-tovar-info-textinfo-btnfavorite-button">
								<span class="moreinfo-tovar-info-textinfo-btnfavorite-button__icon">
									<svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M47.6 300.4l180.7 168.7c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9l180.7-168.7c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141-45.6-7.6-92 7.3-124.6 39.9l-12 12-12-12c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg>
								</span>
								<span class="moreinfo-tovar-info-textinfo-btnfavorite-button__title">
									В избрранные
								</span>
							</button>
						</div>
						<div class="moreinfo-tovar-info-textinfo__btnbasket moreinfo-tovar-info-textinfo-btnbasket">
							<button type="button" class="moreinfo-tovar-info-textinfo-btnbasket__button moreinfo-tovar-info-textinfo-btnbasket-button">
								<span class="moreinfo-tovar-info-textinfo-btnbasket-button__icon">
									<svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64s14.3 32 32 32h384c17.7 0 32-14.3 32-32s-14.3-32-32-32h-96l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32l21.2 339c1.6 25.3 22.6 45 47.9 45h245.8c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
								</span>
								<span class="moreinfo-tovar-info-textinfo-btnbasket-button__title">
									В корзину
								</span>
							</button>
						</div>
					</div>
					<div class="moreinfo-tovar-info-textinfo__buy moreinfo-tovar-info-textinfo-buy">
						<a href="#" class="moreinfo-tovar-info-textinfo-buy__link moreinfo-tovar-info-textinfo-buy-link">
							<span class="moreinfo-tovar-info-textinfo-buy-link__icon">
								<svg viewBox="0 0 90 90" xmlns="http://www.w3.org/2000/svg"><path d="M90 43.841c0 24.213-19.779 43.841-44.182 43.841a44.256 44.256 0 01-21.357-5.455L0 90l7.975-23.522a43.38 43.38 0 01-6.34-22.637C1.635 19.628 21.416 0 45.818 0 70.223 0 90 19.628 90 43.841zM45.818 6.982c-20.484 0-37.146 16.535-37.146 36.859 0 8.065 2.629 15.534 7.076 21.61L11.107 79.14l14.275-4.537A37.122 37.122 0 0045.819 80.7c20.481 0 37.146-16.533 37.146-36.857S66.301 6.982 45.818 6.982zm22.311 46.956c-.273-.447-.994-.717-2.076-1.254-1.084-.537-6.41-3.138-7.4-3.495-.993-.358-1.717-.538-2.438.537-.721 1.076-2.797 3.495-3.43 4.212-.632.719-1.263.809-2.347.271-1.082-.537-4.571-1.673-8.708-5.333-3.219-2.848-5.393-6.364-6.025-7.441-.631-1.075-.066-1.656.475-2.191.488-.482 1.084-1.255 1.625-1.882.543-.628.723-1.075 1.082-1.793.363-.717.182-1.344-.09-1.883-.27-.537-2.438-5.825-3.34-7.977-.902-2.15-1.803-1.792-2.436-1.792-.631 0-1.354-.09-2.076-.09s-1.896.269-2.889 1.344c-.992 1.076-3.789 3.676-3.789 8.963 0 5.288 3.879 10.397 4.422 11.113.541.716 7.49 11.92 18.5 16.223C58.2 65.771 58.2 64.336 60.186 64.156c1.984-.179 6.406-2.599 7.312-5.107.9-2.512.9-4.663.631-5.111z"/></svg>
							</span>
							<span class="moreinfo-tovar-info-textinfo-buy-link__title">
								Купить через WhatsApp
							</span>
						</a>
					</div>
					<div class="moreinfo-tovar-info-textinfo__meta">
						<?php if (productMetaInfo($_GET["id"])) echo "<b>Мета:</b>" . productMetaInfo($_GET["id"]); ?>
					</div>
					<div class="moreinfo-tovar-info-textinfo__share moreinfo-tovar-info-textinfo-share">
						<div class="moreinfo-tovar-info-textinfo-share__title">
							Поделиться
						</div>
						<div class="moreinfo-tovar-info-textinfo-share__content">
							<a href="#" class="moreinfo-tovar-info-textinfo-share__link moreinfo-tovar-info-textinfo-share-link facebook">
								<span class="moreinfo-tovar-info-textinfo-share-link__icon">
									<svg viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg"><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/></svg>
								</span>
								<span class="moreinfo-tovar-info-textinfo-share-link__title">
									Поделиться в Facebook
								</span>
							</a>
							<a href="#" class="moreinfo-tovar-info-textinfo-share__link moreinfo-tovar-info-textinfo-share-link twitter">
								<span class="moreinfo-tovar-info-textinfo-share-link__icon">
									<svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/></svg>
								</span>
								<span class="moreinfo-tovar-info-textinfo-share-link__title">
									Поделиться в Twitter
								</span>
							</a>
							<a href="#" class="moreinfo-tovar-info-textinfo-share__link moreinfo-tovar-info-textinfo-share-link instagram">
								<span class="moreinfo-tovar-info-textinfo-share-link__icon">
									<svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M505 257c0 34.8-.7 69.7.2 104.5 1.5 61.6-37.2 109.2-86.5 130.4-19.8 8.5-40.6 13-62.1 13-67.3.1-134.7 1-202-.3-50.7-1-92.4-22.2-122.3-64-15.7-22-23.2-47-23.2-74.1v-215c0-58.5 28.5-99.4 79.1-126C110.2 14 134.1 9.1 159 9c65.3 0 130.7-.4 196 .2 50.7.4 93 19.8 124.2 60.6 17.4 22.8 25.8 49 25.8 77.8V257zm-459 0v110c0 16.4 3.8 31.8 12.3 45.7 22.3 36.5 56 54.3 97.8 55 67.1 1 134.3.4 201.5.2 16.5 0 32.5-3.4 47.4-10.5 40.6-19.4 63.3-50.3 63.1-96.7-.4-71-.1-142-.1-213 0-20.1-5.7-38.5-17.6-54.7-23-31.1-54.8-46.4-92.8-46.8-67-.8-134-.3-201-.2-14.3 0-28.1 2.9-41.5 7.9-36.8 13.7-71 48.4-69.4 99.5 1.2 34.6.3 69.1.3 103.6z"/><path d="M257.6 363c-64.5 0-116.5-51.4-116.6-115.4-.1-63 52.3-114.6 116.4-114.6 64.3-.1 116.5 51.4 116.6 114.9 0 63.4-52.1 115-116.4 115.1zm0-37c43.9 0 79.5-35.1 79.4-78.3-.1-42.8-35.7-77.8-79.4-77.8-43.9 0-79.7 34.9-79.7 78 .1 43.2 35.8 78.2 79.7 78.1zM387.5 98c13.5 0 24.5 11.5 24.5 25.6-.1 14.1-11.2 25.5-24.7 25.4-13.3-.1-24.2-11.5-24.2-25.3C363 109.6 374 98 387.5 98z"/></svg>
								</span>
								<span class="moreinfo-tovar-info-textinfo-share-link__title">
									Поделиться в Instagram
								</span>
							</a>
							<a href="#" class="moreinfo-tovar-info-textinfo-share__link moreinfo-tovar-info-textinfo-share-link whatsapp">
								<span class="moreinfo-tovar-info-textinfo-share-link__icon">
									<svg viewBox="0 0 90 90" xmlns="http://www.w3.org/2000/svg"><path d="M90 43.841c0 24.213-19.779 43.841-44.182 43.841a44.256 44.256 0 01-21.357-5.455L0 90l7.975-23.522a43.38 43.38 0 01-6.34-22.637C1.635 19.628 21.416 0 45.818 0 70.223 0 90 19.628 90 43.841zM45.818 6.982c-20.484 0-37.146 16.535-37.146 36.859 0 8.065 2.629 15.534 7.076 21.61L11.107 79.14l14.275-4.537A37.122 37.122 0 0045.819 80.7c20.481 0 37.146-16.533 37.146-36.857S66.301 6.982 45.818 6.982zm22.311 46.956c-.273-.447-.994-.717-2.076-1.254-1.084-.537-6.41-3.138-7.4-3.495-.993-.358-1.717-.538-2.438.537-.721 1.076-2.797 3.495-3.43 4.212-.632.719-1.263.809-2.347.271-1.082-.537-4.571-1.673-8.708-5.333-3.219-2.848-5.393-6.364-6.025-7.441-.631-1.075-.066-1.656.475-2.191.488-.482 1.084-1.255 1.625-1.882.543-.628.723-1.075 1.082-1.793.363-.717.182-1.344-.09-1.883-.27-.537-2.438-5.825-3.34-7.977-.902-2.15-1.803-1.792-2.436-1.792-.631 0-1.354-.09-2.076-.09s-1.896.269-2.889 1.344c-.992 1.076-3.789 3.676-3.789 8.963 0 5.288 3.879 10.397 4.422 11.113.541.716 7.49 11.92 18.5 16.223C58.2 65.771 58.2 64.336 60.186 64.156c1.984-.179 6.406-2.599 7.312-5.107.9-2.512.9-4.663.631-5.111z"/></svg>
								</span>
								<span class="moreinfo-tovar-info-textinfo-share-link__title">
									Поделиться в Whatsapp
								</span>
							</a>
							<a href="#" class="moreinfo-tovar-info-textinfo-share__link moreinfo-tovar-info-textinfo-share-link telegram">
								<span class="moreinfo-tovar-info-textinfo-share-link__icon">
									<svg viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg"><path d="M470.435 45.423L16.827 221.249c-18.254 8.188-24.428 24.585-4.412 33.484l116.37 37.173 281.368-174.79c15.363-10.973 31.091-8.047 17.557 4.024L186.053 341.075l-7.591 93.076c7.031 14.371 19.905 14.438 28.117 7.295l66.858-63.589 114.505 86.187c26.595 15.826 41.066 5.613 46.788-23.394l75.105-357.47c7.798-35.705-5.5-51.437-39.4-37.757z"/></svg>
								</span>
								<span class="moreinfo-tovar-info-textinfo-share-link__title">
									Поделиться в Telegram
								</span>
							</a>
							<a href="#" class="moreinfo-tovar-info-textinfo-share__link moreinfo-tovar-info-textinfo-share-link vkontakte">
								<span class="moreinfo-tovar-info-textinfo-share-link__icon">
									<svg viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg"><path d="M545 117.7c3.7-12.5 0-21.7-17.8-21.7h-58.9c-15 0-21.9 7.9-25.6 16.7 0 0-30 73.1-72.4 120.5-13.7 13.7-20 18.1-27.5 18.1-3.7 0-9.4-4.4-9.4-16.9V117.7c0-15-4.2-21.7-16.6-21.7h-92.6c-9.4 0-15 7-15 13.5 0 14.2 21.2 17.5 23.4 57.5v86.8c0 19-3.4 22.5-10.9 22.5-20 0-68.6-73.4-97.4-157.4-5.8-16.3-11.5-22.9-26.6-22.9H38.8c-16.8 0-20.2 7.9-20.2 16.7 0 15.6 20 93.1 93.1 195.5C160.4 378.1 229 416 291.4 416c37.5 0 42.1-8.4 42.1-22.9 0-66.8-3.4-73.1 15.4-73.1 8.7 0 23.7 4.4 58.7 38.1 40 40 46.6 57.9 69 57.9h58.9c16.8 0 25.3-8.4 20.4-25-11.2-34.9-86.9-106.7-90.3-111.5-8.7-11.2-6.2-16.2 0-26.2.1-.1 72-101.3 79.4-135.6z"/></svg>
								</span>
								<span class="moreinfo-tovar-info-textinfo-share-link__title">
									Поделиться в Vkontakte
								</span>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="moreinfo-tovar__content">
				<nav class="moreinfo-tovar__header moreinfo-tovar-navigation">
					<button type="button" data-goto-header data-goto=".moreinfo-tovar-body__description" class="moreinfo-tovar-navigation__link">Описание</button>
					<button type="button" data-goto-header data-goto=".moreinfo-tovar-body-reviews__form" href class="moreinfo-tovar-navigation__link">Написать отзыв</button>
					<button type="button" data-goto-header data-goto=".moreinfo-tovar-body-reviews__comentary" href class="moreinfo-tovar-navigation__link">Отзывы</button>
				</nav>
				<div class="moreinfo-tovar-body">
					<div class="moreinfo-tovar-body__description moreinfo-tovar-body-description">
						<?php
							echo descPrint($_GET["id"]);
						?>
					</div>
					<div class="moreinfo-tovar-body__reviews moreinfo-tovar-body-reviews">
						<div class="moreinfo-tovar-body__reviews moreinfo-tovar-body-reviews__content">
							<form method="POST" data-sendsrc="send.php" class="moreinfo-tovar-body-reviews__form moreinfo-tovar-body-reviews-form">
								<div class="moreinfo-tovar-body-reviews-form__title">
									Написать отзыв
								</div>
								<div class="moreinfo-tovar-body-reviews-form__rating moreinfo-tovar-body-reviews-form-rating">
									<label for="moreinfoTovarBodyReviewsFormRatingFife" class="moreinfo-tovar-body-reviews-form-rating__label">Оценить товар<span>*</span>:</label>
									<div class="moreinfo-tovar-body-reviews-form-rating__body">
										<div class="moreinfo-tovar-body-reviews-form-rating__content">
											<div class="moreinfo-tovar-body-reviews-form-rating__active"></div>
											<div class="moreinfo-tovar-body-reviews-form-rating__items">
												<input type="radio" class="moreinfo-tovar-body-reviews-form-rating__item" value="1" name="rating">
												<input type="radio" class="moreinfo-tovar-body-reviews-form-rating__item" value="2" name="rating">
												<input type="radio" class="moreinfo-tovar-body-reviews-form-rating__item" value="3" name="rating">
												<input type="radio" class="moreinfo-tovar-body-reviews-form-rating__item" value="4" name="rating">
												<input type="radio" id="moreinfoTovarBodyReviewsFormRatingFife" class="moreinfo-tovar-body-reviews-form-rating__item" value="5" name="rating">
											</div>
										</div>
										<div class="moreinfo-tovar-body-reviews-form-rating__value">0</div>
									</div>
								</div>
								<div class="moreinfo-tovar-body-reviews-form__username moreinfo-tovar-body-reviews-form-username">
									<label for="moreinfoTovarBodyReviewsFormUsernameInput" class="moreinfo-tovar-body-reviews-form-username__label">ФИО<span>*</span>:</label>
									<input autocomplete="off" type="text" name="username" placeholder="ФИО" id="moreinfoTovarBodyReviewsFormUsernameInput" class="moreinfo-tovar-body-reviews-form-username__input">
								</div>
								<div class="moreinfo-tovar-body-reviews-form__message moreinfo-tovar-body-reviews-form-message">
									<label for="moreinfoTovarBodyReviewsFormMessageTextarea" class="moreinfo-tovar-body-reviews-form-message__label">Сообщение<span>*</span>:</label>
									<textarea autocomplete="off" name="message" placeholder="Сообщение..." id="moreinfoTovarBodyReviewsFormMessageTextarea" class="moreinfo-tovar-body-reviews-form-message__textarea"></textarea>
								</div>
								<div class="moreinfo-tovar-body-reviews-form__checkbox moreinfo-tovar-body-reviews-form-checkbox">
									<input id="formAgreement" checked type="checkbox" name="agreement" class="moreinfo-tovar-body-reviews-form-checkbox__input">
									<label for="formAgreement" class="moreinfo-tovar-body-reviews-form-checkbox__label moreinfo-tovar-body-reviews-form-checkbox-label">
										<span class="moreinfo-tovar-body-reviews-form-checkbox-label__inputcheckbox"></span>
										<span class="moreinfo-tovar-body-reviews-form-checkbox-label__text">
											Сохранить моё имя и адрес сайта в этом браузере для последующих моих комментариев.
										</span>
									</label>
								</div>
								<div class="moreinfo-tovar-body-reviews-form__innerbutton">
									<button type="submit" class="moreinfo-tovar-body-reviews-form__button moreinfo-tovar-body-reviews-form-button">
										<span class="moreinfo-tovar-body-reviews-form-button__title">Отправить</span>
										<span class="moreinfo-tovar-body-reviews-form-button__result">Ошибка</span>
									</button>
								</div>
							</form>
							<div class="moreinfo-tovar-body-reviews__comentary moreinfo-tovar-body-reviews-comentary">
								<div class="moreinfo-tovar-body-reviews-comentary__title">Отзывы: <span><?php echo get_product_comments_lagth($_GET["id"]); ?></span></div>
								<div class="moreinfo-tovar-body-reviews-comentary__body">
									<?php
									if (get_product_comments_lagth($_GET["id"]) > 0) {
										if (0 > 1) {
											echo '<div class="moreinfo-tovar-body-reviews-comentary__block moreinfo-tovar-body-reviews-comentary-block">
													<div class="moreinfo-tovar-body-reviews-comentary-block__user moreinfo-tovar-body-reviews-comentary-block-user">
														<div class="moreinfo-tovar-body-reviews-comentary-block-user__avatar">А</div>
														<div class="moreinfo-tovar-body-reviews-comentary-block-user__info">
															<div class="moreinfo-tovar-body-reviews-comentary-block-user__name _avtor"><span>(Вы)</span> Акылбек уулу Бектур</div>
															<div class="moreinfo-tovar-body-reviews-comentary-block-user__ratinganddate">
																<div class="moreinfo-tovar-body-reviews-comentary-block-user__rating moreinfo-tovar-body-reviews-comentary-block-user-rating">
																	<span class="moreinfo-tovar-body-reviews-comentary-block-user-rating__icon _active"></span>
																	<span class="moreinfo-tovar-body-reviews-comentary-block-user-rating__icon _active"></span>
																	<span class="moreinfo-tovar-body-reviews-comentary-block-user-rating__icon _active"></span>
																	<span class="moreinfo-tovar-body-reviews-comentary-block-user-rating__icon"></span>
																	<span class="moreinfo-tovar-body-reviews-comentary-block-user-rating__icon"></span>
																</div>
																<div class="moreinfo-tovar-body-reviews-comentary-block-user__data">12.02.2031г</div>
															</div>
														</div>
													</div>
													<div class="moreinfo-tovar-body-reviews-comentary-block__massege">
														Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet animi aut nesciunt provident voluptates, velit quas quaerat quia quod eius exercitationem cumque voluptatem vitae sed voluptate, ipsam laborum accusantium adipisci officiis ab, itaque vero rerum magnam autem! Distinctio dolores quis suscipit consectetur laboriosam amet, laudantium veritatis reprehenderit consequatur, iste quisquam laborum esse ab adipisci sint numquam porro in saepe illo minus? Cumque sed nesciunt laboriosam labore quidem quo ex, exercitationem, laborum natus error tenetur facere dolore vero nisi suscipit dolores repudiandae? Excepturi quidem ad obcaecati ipsam quibusdam suscipit at praesentium aliquid! Iste quidem aperiam blanditiis nesciunt veniam, sequi dicta accusamus ut, ipsum neque quaerat asperiores illo alias, ab est libero itaque odit porro dolore atque culpa cum vel beatae vitae?
													</div>
													<div class="moreinfo-tovar-body-reviews-comentary-block__likes moreinfo-tovar-body-reviews-comentary-block-likes">
														<div class="moreinfo-tovar-body-reviews-comentary-block-likes__infotext">Был ли этот отзыв полезен?</div>
														<div class="moreinfo-tovar-body-reviews-comentary-block-likes__buttons">
															<button type="button" class="moreinfo-tovar-body-reviews-comentary-block-likes__button moreinfo-tovar-body-reviews-comentary-block-likes-button a-hover-bgc _like">
																<span class="moreinfo-tovar-body-reviews-comentary-block-likes-button__icon">
																	<svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc.--><path d="M323.8 34.8c-38.2-10.9-78.1 11.2-89 49.4l-5.7 20c-3.7 13-10.4 25-19.5 35l-51.3 56.4c-8.9 9.8-8.2 25 1.6 33.9s25 8.2 33.9-1.6l51.3-56.4c14.1-15.5 24.4-34 30.1-54.1l5.7-20c3.6-12.7 16.9-20.1 29.7-16.5s20.1 16.9 16.5 29.7l-5.7 20c-5.7 19.9-14.7 38.7-26.6 55.5-5.2 7.3-5.8 16.9-1.7 24.9s12.3 13 21.3 13H448c8.8 0 16 7.2 16 16 0 6.8-4.3 12.7-10.4 15-7.4 2.8-13 9-14.9 16.7s.1 15.8 5.3 21.7c2.5 2.8 4 6.5 4 10.6 0 7.8-5.6 14.3-13 15.7-8.2 1.6-15.1 7.3-18 15.2s-1.6 16.7 3.6 23.3c2.1 2.7 3.4 6.1 3.4 9.9 0 6.7-4.2 12.6-10.2 14.9-11.5 4.5-17.7 16.9-14.4 28.8.4 1.3.6 2.8.6 4.3 0 8.8-7.2 16-16 16h-97.5c-12.6 0-25-3.7-35.5-10.7l-61.7-41.1c-11-7.4-25.9-4.4-33.3 6.7s-4.4 25.9 6.7 33.3l61.7 41.1c18.4 12.3 40 18.8 62.1 18.8H384c34.7 0 62.9-27.6 64-62 14.6-11.7 24-29.7 24-50 0-4.5-.5-8.8-1.3-13 15.4-11.7 25.3-30.2 25.3-51 0-6.5-1-12.8-2.8-18.7 11.6-11.8 18.8-27.8 18.8-45.5 0-35.3-28.6-64-64-64h-92.3c4.7-10.4 8.7-21.2 11.8-32.2l5.7-20c10.9-38.2-11.2-78.1-49.4-89zM32 192c-17.7 0-32 14.3-32 32v224c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32H32z"/></svg>
																</span>
																<span class="moreinfo-tovar-body-reviews-comentary-block-likes-button__number">
																	945,0b
																</span>
															</button>
															<button type="button" class="moreinfo-tovar-body-reviews-comentary-block-likes__button moreinfo-tovar-body-reviews-comentary-block-likes-button a-hover-bgc">
																<span class="moreinfo-tovar-body-reviews-comentary-block-likes-button__icon">
																	<svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc.--><path d="M323.8 34.8c-38.2-10.9-78.1 11.2-89 49.4l-5.7 20c-3.7 13-10.4 25-19.5 35l-51.3 56.4c-8.9 9.8-8.2 25 1.6 33.9s25 8.2 33.9-1.6l51.3-56.4c14.1-15.5 24.4-34 30.1-54.1l5.7-20c3.6-12.7 16.9-20.1 29.7-16.5s20.1 16.9 16.5 29.7l-5.7 20c-5.7 19.9-14.7 38.7-26.6 55.5-5.2 7.3-5.8 16.9-1.7 24.9s12.3 13 21.3 13H448c8.8 0 16 7.2 16 16 0 6.8-4.3 12.7-10.4 15-7.4 2.8-13 9-14.9 16.7s.1 15.8 5.3 21.7c2.5 2.8 4 6.5 4 10.6 0 7.8-5.6 14.3-13 15.7-8.2 1.6-15.1 7.3-18 15.2s-1.6 16.7 3.6 23.3c2.1 2.7 3.4 6.1 3.4 9.9 0 6.7-4.2 12.6-10.2 14.9-11.5 4.5-17.7 16.9-14.4 28.8.4 1.3.6 2.8.6 4.3 0 8.8-7.2 16-16 16h-97.5c-12.6 0-25-3.7-35.5-10.7l-61.7-41.1c-11-7.4-25.9-4.4-33.3 6.7s-4.4 25.9 6.7 33.3l61.7 41.1c18.4 12.3 40 18.8 62.1 18.8H384c34.7 0 62.9-27.6 64-62 14.6-11.7 24-29.7 24-50 0-4.5-.5-8.8-1.3-13 15.4-11.7 25.3-30.2 25.3-51 0-6.5-1-12.8-2.8-18.7 11.6-11.8 18.8-27.8 18.8-45.5 0-35.3-28.6-64-64-64h-92.3c4.7-10.4 8.7-21.2 11.8-32.2l5.7-20c10.9-38.2-11.2-78.1-49.4-89zM32 192c-17.7 0-32 14.3-32 32v224c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32H32z"/></svg>
																</span>
																<span class="moreinfo-tovar-body-reviews-comentary-block-likes-button__number">
																	32,6b
																</span>
															</button>
														</div>
													</div>
												</div>';
										} else {
											$allProducts = get_product_comments($_GET["id"]);
											foreach ($allProducts as $allComment) {
												echo '<div class="moreinfo-tovar-body-reviews-comentary__block moreinfo-tovar-body-reviews-comentary-block">
													<div class="moreinfo-tovar-body-reviews-comentary-block__user moreinfo-tovar-body-reviews-comentary-block-user">
														<div class="moreinfo-tovar-body-reviews-comentary-block-user__avatar">' . mb_substr($allComment["name"], 0, 1) . '</div>
														<div class="moreinfo-tovar-body-reviews-comentary-block-user__info">
															<div class="moreinfo-tovar-body-reviews-comentary-block-user__name">' . $allComment["name"] . '</div>
															<div class="moreinfo-tovar-body-reviews-comentary-block-user__ratinganddate">
																<div class="moreinfo-tovar-body-reviews-comentary-block-user__rating moreinfo-tovar-body-reviews-comentary-block-user-rating">';
																	for ($i=0; $i < 5; $i++) {
																		if ($i < $allComment["rating"]) {
																			echo '<span class="moreinfo-tovar-body-reviews-comentary-block-user-rating__icon _active"></span>';
																		} else {
																			echo '<span class="moreinfo-tovar-body-reviews-comentary-block-user-rating__icon"></span>';
																		}
																	}
																echo '</div>
																<div class="moreinfo-tovar-body-reviews-comentary-block-user__data">' . date("d.m.Y г", strtotime($allComment["date"])) . '</div>
															</div>
														</div>
													</div>
													<div class="moreinfo-tovar-body-reviews-comentary-block__massege">
													' . $allComment["massege"] . '
													</div>
													<div class="moreinfo-tovar-body-reviews-comentary-block__likes moreinfo-tovar-body-reviews-comentary-block-likes">
														<div class="moreinfo-tovar-body-reviews-comentary-block-likes__infotext">Был ли этот отзыв полезен?</div>
														<div class="moreinfo-tovar-body-reviews-comentary-block-likes__buttons">
															<button type="button" class="moreinfo-tovar-body-reviews-comentary-block-likes__button moreinfo-tovar-body-reviews-comentary-block-likes-button a-hover-bgc">
																<span class="moreinfo-tovar-body-reviews-comentary-block-likes-button__icon">
																	<svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc.--><path d="M323.8 34.8c-38.2-10.9-78.1 11.2-89 49.4l-5.7 20c-3.7 13-10.4 25-19.5 35l-51.3 56.4c-8.9 9.8-8.2 25 1.6 33.9s25 8.2 33.9-1.6l51.3-56.4c14.1-15.5 24.4-34 30.1-54.1l5.7-20c3.6-12.7 16.9-20.1 29.7-16.5s20.1 16.9 16.5 29.7l-5.7 20c-5.7 19.9-14.7 38.7-26.6 55.5-5.2 7.3-5.8 16.9-1.7 24.9s12.3 13 21.3 13H448c8.8 0 16 7.2 16 16 0 6.8-4.3 12.7-10.4 15-7.4 2.8-13 9-14.9 16.7s.1 15.8 5.3 21.7c2.5 2.8 4 6.5 4 10.6 0 7.8-5.6 14.3-13 15.7-8.2 1.6-15.1 7.3-18 15.2s-1.6 16.7 3.6 23.3c2.1 2.7 3.4 6.1 3.4 9.9 0 6.7-4.2 12.6-10.2 14.9-11.5 4.5-17.7 16.9-14.4 28.8.4 1.3.6 2.8.6 4.3 0 8.8-7.2 16-16 16h-97.5c-12.6 0-25-3.7-35.5-10.7l-61.7-41.1c-11-7.4-25.9-4.4-33.3 6.7s-4.4 25.9 6.7 33.3l61.7 41.1c18.4 12.3 40 18.8 62.1 18.8H384c34.7 0 62.9-27.6 64-62 14.6-11.7 24-29.7 24-50 0-4.5-.5-8.8-1.3-13 15.4-11.7 25.3-30.2 25.3-51 0-6.5-1-12.8-2.8-18.7 11.6-11.8 18.8-27.8 18.8-45.5 0-35.3-28.6-64-64-64h-92.3c4.7-10.4 8.7-21.2 11.8-32.2l5.7-20c10.9-38.2-11.2-78.1-49.4-89zM32 192c-17.7 0-32 14.3-32 32v224c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32H32z"/></svg>
																</span>
																<span class="moreinfo-tovar-body-reviews-comentary-block-likes-button__number">
																	' . getbrosocrat($allComment["likes"]) . '
																</span>
															</button>
															<button type="button" class="moreinfo-tovar-body-reviews-comentary-block-likes__button moreinfo-tovar-body-reviews-comentary-block-likes-button a-hover-bgc">
																<span class="moreinfo-tovar-body-reviews-comentary-block-likes-button__icon">
																	<svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc.--><path d="M323.8 34.8c-38.2-10.9-78.1 11.2-89 49.4l-5.7 20c-3.7 13-10.4 25-19.5 35l-51.3 56.4c-8.9 9.8-8.2 25 1.6 33.9s25 8.2 33.9-1.6l51.3-56.4c14.1-15.5 24.4-34 30.1-54.1l5.7-20c3.6-12.7 16.9-20.1 29.7-16.5s20.1 16.9 16.5 29.7l-5.7 20c-5.7 19.9-14.7 38.7-26.6 55.5-5.2 7.3-5.8 16.9-1.7 24.9s12.3 13 21.3 13H448c8.8 0 16 7.2 16 16 0 6.8-4.3 12.7-10.4 15-7.4 2.8-13 9-14.9 16.7s.1 15.8 5.3 21.7c2.5 2.8 4 6.5 4 10.6 0 7.8-5.6 14.3-13 15.7-8.2 1.6-15.1 7.3-18 15.2s-1.6 16.7 3.6 23.3c2.1 2.7 3.4 6.1 3.4 9.9 0 6.7-4.2 12.6-10.2 14.9-11.5 4.5-17.7 16.9-14.4 28.8.4 1.3.6 2.8.6 4.3 0 8.8-7.2 16-16 16h-97.5c-12.6 0-25-3.7-35.5-10.7l-61.7-41.1c-11-7.4-25.9-4.4-33.3 6.7s-4.4 25.9 6.7 33.3l61.7 41.1c18.4 12.3 40 18.8 62.1 18.8H384c34.7 0 62.9-27.6 64-62 14.6-11.7 24-29.7 24-50 0-4.5-.5-8.8-1.3-13 15.4-11.7 25.3-30.2 25.3-51 0-6.5-1-12.8-2.8-18.7 11.6-11.8 18.8-27.8 18.8-45.5 0-35.3-28.6-64-64-64h-92.3c4.7-10.4 8.7-21.2 11.8-32.2l5.7-20c10.9-38.2-11.2-78.1-49.4-89zM32 192c-17.7 0-32 14.3-32 32v224c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32H32z"/></svg>
																</span>
																<span class="moreinfo-tovar-body-reviews-comentary-block-likes-button__number">
																	' . getbrosocrat($allComment["dislikes"]) . '
																</span>
															</button>
														</div>
													</div>
												</div>';
											}
										}
									} else {
										echo '<div class="moreinfo-tovar-body-reviews-comentary__nocomentary moreinfo-tovar-body-reviews-comentary-nocomentary">
												<div class="moreinfo-tovar-body-reviews-comentary-nocomentary__image">
													<img src="img/111.gif" alt="img" />
												</div>
												<div class="moreinfo-tovar-body-reviews-comentary-nocomentary__text">
													«Отзывов пока нет»
												</div>
											</div>';
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
			require $_SERVER['DOCUMENT_ROOT'] . "/rec.php";
		?>
		<?php
			require $_SERVER['DOCUMENT_ROOT'] . "/his.php";
		?>
	</div>
</section>