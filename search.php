<?php
	$title="Поиск";
	require $_SERVER['DOCUMENT_ROOT'] . "/layouts/app-start.php";
?>
<section class="content">
	<div class="content__container">
		<h2 class="_title">
			<?php
				die(print_r(search()));
			?>
			<?php echo $title . ": " . trim($_GET["searchInput"]) . "<sup>" . mysqli_num_rows(search()) . "</sup>"?>
		</h2>
		<div class="content__body">
			<?php
				$allProducts = search();
				foreach ($allProducts as $allProduct) {
			?>
			<div class="product__block product-block">
				<a href="tovar.php?id=<?php echo $allProduct["id"]; ?>" class="product-block__image product-block-image">
					<div class="product-block-image__content">
						<?php
							if ($allProduct["discount"] == "yes" or $allProduct["hit"] == "yes") {
								echo '<div class="product-block-image__sticker product-block-image-sticker">
									<div class="product-block-image-sticker__content">';
								if ($allProduct["discount"] == "yes") {
									echo '<div class="product-block-image-sticker__discount">
												Скидка
											</div>';
								}
								if ($allProduct["hit"] == "yes") {
									echo '<div class="product-block-image-sticker__hit">
											Хит
										</div>';
								}
								echo '</div></div>';
							}
						?>
						<div class="product-block-image__items">
							<?php
								$allProductsImages = get_product_images_limit($allProduct["id"]);
								if (get_product_images_lagth($allProduct["id"]) > 4) {
									$allProductsImagesLength = 4;
								} else {
									$allProductsImagesLength = get_product_images_lagth($allProduct["id"]);
								}
								if ($allProductsImagesLength > 1) {
									for ($i = 0; $i < $allProductsImagesLength; $i++) {
										$allProductsImage =  mysqli_fetch_assoc($allProductsImages);
										echo '<div class="product-block-image__item product-block-image-item">
											<div class="product-block-image-item__img">
												<img src="img/product-blocks/'. $allProductsImage["src-average"] . '" alt="img">';
										if ($i == 3 and (get_product_images_lagth($allProduct["id"]) - 4) > 0) {
											echo '
												<div class="product-block-image-item__infoimagetext product-block-image-item-infoimagetext">
													<div class="product-block-image-item-infoimagetext__icon">
														<svg viewBox="0 0 90 90" xmlns="http://www.w3.org/2000/svg"><path d="M90 43.841c0 24.213-19.779 43.841-44.182 43.841a44.256 44.256 0 01-21.357-5.455L0 90l7.975-23.522a43.38 43.38 0 01-6.34-22.637C1.635 19.628 21.416 0 45.818 0 70.223 0 90 19.628 90 43.841zM45.818 6.982c-20.484 0-37.146 16.535-37.146 36.859 0 8.065 2.629 15.534 7.076 21.61L11.107 79.14l14.275-4.537A37.122 37.122 0 0045.819 80.7c20.481 0 37.146-16.533 37.146-36.857S66.301 6.982 45.818 6.982zm22.311 46.956c-.273-.447-.994-.717-2.076-1.254-1.084-.537-6.41-3.138-7.4-3.495-.993-.358-1.717-.538-2.438.537-.721 1.076-2.797 3.495-3.43 4.212-.632.719-1.263.809-2.347.271-1.082-.537-4.571-1.673-8.708-5.333-3.219-2.848-5.393-6.364-6.025-7.441-.631-1.075-.066-1.656.475-2.191.488-.482 1.084-1.255 1.625-1.882.543-.628.723-1.075 1.082-1.793.363-.717.182-1.344-.09-1.883-.27-.537-2.438-5.825-3.34-7.977-.902-2.15-1.803-1.792-2.436-1.792-.631 0-1.354-.09-2.076-.09s-1.896.269-2.889 1.344c-.992 1.076-3.789 3.676-3.789 8.963 0 5.288 3.879 10.397 4.422 11.113.541.716 7.49 11.92 18.5 16.223C58.2 65.771 58.2 64.336 60.186 64.156c1.984-.179 6.406-2.599 7.312-5.107.9-2.512.9-4.663.631-5.111z"/></svg>
													</div>
													<div class="product-block-image-item-infoimagetext__content">
														Ещё <span class="product-block-image-item-infoimagetext__number">' . (get_product_media_lagth($allProduct["id"]) - 4) . '</span> фото
													</div>
												</div>';
										}
										echo '</div>
											<div class="product-block-image-item__pagination"></div>
										</div>';
									}
								} elseif ($allProductsImagesLength > 0) {
									for ($i = 0; $i < $allProductsImagesLength; $i++) {
										$allProductsImage =  mysqli_fetch_assoc($allProductsImages);
										echo '<div class="product-block-image__item product-block-image-item">
											<div class="product-block-image-item__img">
												<img src="img/product-blocks/' . $allProductsImage["src-average"] . '" alt="img">
											</div>
										</div>';
									}
								} else {
									echo '<div class="product-block-image__item product-block-image-item">
											<div class="product-block-image-item__img">
												<img src="img/shortcuticons/' . mysqli_fetch_assoc(get_product_images_limit($allProduct["0"]))["src-average"] . '" alt="img">
											</div>
											</div>';
								}
							?>
						</div>
						<div class="product-block-image__numberofimages product-block-image-numberofimages">
							<div class="product-block-image-numberofimages__number">
								<?php echo get_product_media_lagth($allProduct["id"]); ?>
							</div>
						</div>
					</div>
				</a>
				<div class="product-block__info product-block-info">
					<a href="tovar.php?id=<?php echo $allProduct["id"]; ?>" class="product-block-info__catigory">
						Категория-<?php echo breadcrumbs($allProduct["category"]); ?>
					</a>
					<a href="tovar.php?id=<?php echo $allProduct["id"]; ?>" class="product-block-info__title">
						<?php echo $allProduct["title"]; ?>
					</a>
					<div class="product-block-info__price product-block-info-price">
						<?php
							if (getbrosocrat($allProduct["price-old"]) > 0) {
								echo '<div class="product-block-info-price__old product-block-info-price-old">
									<span class="product-block-info-price-old__number">
										'. getbrosocrat($allProduct["price-old"]) . '
									</span>
									<span class="product-block-info-price-old__currency">
										сом
									</span>
								</div>';
							}
						?>
						<div class="product-block-info-price__now product-block-info-price-now">
							<span class="product-block-info-price-now__number">
								<?php echo getbrosocrat($allProduct["price-now"]); ?>
							</span>
							<span class="product-block-info-price-now__currency">
								сом
							</span>
						</div>
					</div>
					<div class="product-block-info__ratinginfo product-block-info-ratinginfo">
						<a href="tovar.php?id=<?php echo $allProduct["id"]; ?>/#moreinfo-tovar__content" class="product-block-info-ratinginfo__column product-block-info-ratinginfo__rating product-block-info-ratinginfo-rating">
							<span class="product-block-info-ratinginfo-rating__icon">
								<svg viewBox="0 0 90 90" xmlns="http://www.w3.org/2000/svg"><path d="M90 43.841c0 24.213-19.779 43.841-44.182 43.841a44.256 44.256 0 01-21.357-5.455L0 90l7.975-23.522a43.38 43.38 0 01-6.34-22.637C1.635 19.628 21.416 0 45.818 0 70.223 0 90 19.628 90 43.841zM45.818 6.982c-20.484 0-37.146 16.535-37.146 36.859 0 8.065 2.629 15.534 7.076 21.61L11.107 79.14l14.275-4.537A37.122 37.122 0 0045.819 80.7c20.481 0 37.146-16.533 37.146-36.857S66.301 6.982 45.818 6.982zm22.311 46.956c-.273-.447-.994-.717-2.076-1.254-1.084-.537-6.41-3.138-7.4-3.495-.993-.358-1.717-.538-2.438.537-.721 1.076-2.797 3.495-3.43 4.212-.632.719-1.263.809-2.347.271-1.082-.537-4.571-1.673-8.708-5.333-3.219-2.848-5.393-6.364-6.025-7.441-.631-1.075-.066-1.656.475-2.191.488-.482 1.084-1.255 1.625-1.882.543-.628.723-1.075 1.082-1.793.363-.717.182-1.344-.09-1.883-.27-.537-2.438-5.825-3.34-7.977-.902-2.15-1.803-1.792-2.436-1.792-.631 0-1.354-.09-2.076-.09s-1.896.269-2.889 1.344c-.992 1.076-3.789 3.676-3.789 8.963 0 5.288 3.879 10.397 4.422 11.113.541.716 7.49 11.92 18.5 16.223C58.2 65.771 58.2 64.336 60.186 64.156c1.984-.179 6.406-2.599 7.312-5.107.9-2.512.9-4.663.631-5.111z"/></svg>
							</span>
							<span class="product-block-info-ratinginfo-rating__number">
								<?php echo get_product_rating($allProduct["id"]); ?>
							</span>
						</a>
						<a href="tovar.php?id=<?php echo $allProduct["id"]; ?>/#moreinfo-tovar-body-reviews__comentary" class="product-block-info-ratinginfo__column product-block-info-ratinginfo__viewreviews product-block-info-ratinginfo-viewreviews">
							<span class="product-block-info-ratinginfo-viewreviews__icon">
								<svg viewBox="0 0 90 90" xmlns="http://www.w3.org/2000/svg"><path d="M90 43.841c0 24.213-19.779 43.841-44.182 43.841a44.256 44.256 0 01-21.357-5.455L0 90l7.975-23.522a43.38 43.38 0 01-6.34-22.637C1.635 19.628 21.416 0 45.818 0 70.223 0 90 19.628 90 43.841zM45.818 6.982c-20.484 0-37.146 16.535-37.146 36.859 0 8.065 2.629 15.534 7.076 21.61L11.107 79.14l14.275-4.537A37.122 37.122 0 0045.819 80.7c20.481 0 37.146-16.533 37.146-36.857S66.301 6.982 45.818 6.982zm22.311 46.956c-.273-.447-.994-.717-2.076-1.254-1.084-.537-6.41-3.138-7.4-3.495-.993-.358-1.717-.538-2.438.537-.721 1.076-2.797 3.495-3.43 4.212-.632.719-1.263.809-2.347.271-1.082-.537-4.571-1.673-8.708-5.333-3.219-2.848-5.393-6.364-6.025-7.441-.631-1.075-.066-1.656.475-2.191.488-.482 1.084-1.255 1.625-1.882.543-.628.723-1.075 1.082-1.793.363-.717.182-1.344-.09-1.883-.27-.537-2.438-5.825-3.34-7.977-.902-2.15-1.803-1.792-2.436-1.792-.631 0-1.354-.09-2.076-.09s-1.896.269-2.889 1.344c-.992 1.076-3.789 3.676-3.789 8.963 0 5.288 3.879 10.397 4.422 11.113.541.716 7.49 11.92 18.5 16.223C58.2 65.771 58.2 64.336 60.186 64.156c1.984-.179 6.406-2.599 7.312-5.107.9-2.512.9-4.663.631-5.111z"/></svg>
							</span>
							<span class="product-block-info-ratinginfo-viewreviews__content product-block-info-ratinginfo-viewreviews-content">
								<span class="product-block-info-ratinginfo-viewreviews-content__text">
									Отзывы:
								</span>
								<span class="product-block-info-ratinginfo-viewreviews-content__number">
									<?php echo get_product_comments_lagth($allProduct["id"]); ?>
								</span>
							</span>
						</a>
						<a href="tovar.php?id=<?php echo $allProduct["id"]; ?>/#moreinfo-tovar-body-reviews__form" class="product-block-info-ratinginfo__column product-block-info-ratinginfo__writereview product-block-info-ratinginfo-writereview">
							<span class="product-block-info-ratinginfo-writereview__icon">
								<svg viewBox="0 0 90 90" xmlns="http://www.w3.org/2000/svg"><path d="M90 43.841c0 24.213-19.779 43.841-44.182 43.841a44.256 44.256 0 01-21.357-5.455L0 90l7.975-23.522a43.38 43.38 0 01-6.34-22.637C1.635 19.628 21.416 0 45.818 0 70.223 0 90 19.628 90 43.841zM45.818 6.982c-20.484 0-37.146 16.535-37.146 36.859 0 8.065 2.629 15.534 7.076 21.61L11.107 79.14l14.275-4.537A37.122 37.122 0 0045.819 80.7c20.481 0 37.146-16.533 37.146-36.857S66.301 6.982 45.818 6.982zm22.311 46.956c-.273-.447-.994-.717-2.076-1.254-1.084-.537-6.41-3.138-7.4-3.495-.993-.358-1.717-.538-2.438.537-.721 1.076-2.797 3.495-3.43 4.212-.632.719-1.263.809-2.347.271-1.082-.537-4.571-1.673-8.708-5.333-3.219-2.848-5.393-6.364-6.025-7.441-.631-1.075-.066-1.656.475-2.191.488-.482 1.084-1.255 1.625-1.882.543-.628.723-1.075 1.082-1.793.363-.717.182-1.344-.09-1.883-.27-.537-2.438-5.825-3.34-7.977-.902-2.15-1.803-1.792-2.436-1.792-.631 0-1.354-.09-2.076-.09s-1.896.269-2.889 1.344c-.992 1.076-3.789 3.676-3.789 8.963 0 5.288 3.879 10.397 4.422 11.113.541.716 7.49 11.92 18.5 16.223C58.2 65.771 58.2 64.336 60.186 64.156c1.984-.179 6.406-2.599 7.312-5.107.9-2.512.9-4.663.631-5.111z"/></svg>
							</span>
							<span class="product-block-info-ratinginfo-writereview__text">
								Написать отзыв
							</span>
						</a>
					</div>
					<div class="product-block-info__buttons product-block-info-buttons">
						<button type="button" class="product-block-info-buttons__btn product-block-info-buttons__favorite product-block-info-buttons-favorite">
							<span class="product-block-info-buttons-favorite__icon">
								<svg viewBox="0 0 90 90" xmlns="http://www.w3.org/2000/svg"><path d="M90 43.841c0 24.213-19.779 43.841-44.182 43.841a44.256 44.256 0 01-21.357-5.455L0 90l7.975-23.522a43.38 43.38 0 01-6.34-22.637C1.635 19.628 21.416 0 45.818 0 70.223 0 90 19.628 90 43.841zM45.818 6.982c-20.484 0-37.146 16.535-37.146 36.859 0 8.065 2.629 15.534 7.076 21.61L11.107 79.14l14.275-4.537A37.122 37.122 0 0045.819 80.7c20.481 0 37.146-16.533 37.146-36.857S66.301 6.982 45.818 6.982zm22.311 46.956c-.273-.447-.994-.717-2.076-1.254-1.084-.537-6.41-3.138-7.4-3.495-.993-.358-1.717-.538-2.438.537-.721 1.076-2.797 3.495-3.43 4.212-.632.719-1.263.809-2.347.271-1.082-.537-4.571-1.673-8.708-5.333-3.219-2.848-5.393-6.364-6.025-7.441-.631-1.075-.066-1.656.475-2.191.488-.482 1.084-1.255 1.625-1.882.543-.628.723-1.075 1.082-1.793.363-.717.182-1.344-.09-1.883-.27-.537-2.438-5.825-3.34-7.977-.902-2.15-1.803-1.792-2.436-1.792-.631 0-1.354-.09-2.076-.09s-1.896.269-2.889 1.344c-.992 1.076-3.789 3.676-3.789 8.963 0 5.288 3.879 10.397 4.422 11.113.541.716 7.49 11.92 18.5 16.223C58.2 65.771 58.2 64.336 60.186 64.156c1.984-.179 6.406-2.599 7.312-5.107.9-2.512.9-4.663.631-5.111z"/></svg>
							</span>
							<span class="product-block-info-buttons-favorite__title">
								В избранные
							</span>
						</button>
						<button type="button" class="product-block-info-buttons__btn product-block-info-buttons__basket  product-block-info-buttons-basket">
							<span class="product-block-info-buttons-basket__icon">
								<svg viewBox="0 0 90 90" xmlns="http://www.w3.org/2000/svg"><path d="M90 43.841c0 24.213-19.779 43.841-44.182 43.841a44.256 44.256 0 01-21.357-5.455L0 90l7.975-23.522a43.38 43.38 0 01-6.34-22.637C1.635 19.628 21.416 0 45.818 0 70.223 0 90 19.628 90 43.841zM45.818 6.982c-20.484 0-37.146 16.535-37.146 36.859 0 8.065 2.629 15.534 7.076 21.61L11.107 79.14l14.275-4.537A37.122 37.122 0 0045.819 80.7c20.481 0 37.146-16.533 37.146-36.857S66.301 6.982 45.818 6.982zm22.311 46.956c-.273-.447-.994-.717-2.076-1.254-1.084-.537-6.41-3.138-7.4-3.495-.993-.358-1.717-.538-2.438.537-.721 1.076-2.797 3.495-3.43 4.212-.632.719-1.263.809-2.347.271-1.082-.537-4.571-1.673-8.708-5.333-3.219-2.848-5.393-6.364-6.025-7.441-.631-1.075-.066-1.656.475-2.191.488-.482 1.084-1.255 1.625-1.882.543-.628.723-1.075 1.082-1.793.363-.717.182-1.344-.09-1.883-.27-.537-2.438-5.825-3.34-7.977-.902-2.15-1.803-1.792-2.436-1.792-.631 0-1.354-.09-2.076-.09s-1.896.269-2.889 1.344c-.992 1.076-3.789 3.676-3.789 8.963 0 5.288 3.879 10.397 4.422 11.113.541.716 7.49 11.92 18.5 16.223C58.2 65.771 58.2 64.336 60.186 64.156c1.984-.179 6.406-2.599 7.312-5.107.9-2.512.9-4.663.631-5.111z"/></svg>
							</span>
							<span class="product-block-info-buttons-basket__title">
								В корзину
							</span>
						</button>
					</div>
					<div class="product-block-info__buy">
						<a href="#" class="product-block-info-buy__link product-block-info-buy__link  product-block-info-buy-link">
							<span class="product-block-info-buy-link__icon">
								<svg viewBox="0 0 90 90" xmlns="http://www.w3.org/2000/svg"><path d="M90 43.841c0 24.213-19.779 43.841-44.182 43.841a44.256 44.256 0 01-21.357-5.455L0 90l7.975-23.522a43.38 43.38 0 01-6.34-22.637C1.635 19.628 21.416 0 45.818 0 70.223 0 90 19.628 90 43.841zM45.818 6.982c-20.484 0-37.146 16.535-37.146 36.859 0 8.065 2.629 15.534 7.076 21.61L11.107 79.14l14.275-4.537A37.122 37.122 0 0045.819 80.7c20.481 0 37.146-16.533 37.146-36.857S66.301 6.982 45.818 6.982zm22.311 46.956c-.273-.447-.994-.717-2.076-1.254-1.084-.537-6.41-3.138-7.4-3.495-.993-.358-1.717-.538-2.438.537-.721 1.076-2.797 3.495-3.43 4.212-.632.719-1.263.809-2.347.271-1.082-.537-4.571-1.673-8.708-5.333-3.219-2.848-5.393-6.364-6.025-7.441-.631-1.075-.066-1.656.475-2.191.488-.482 1.084-1.255 1.625-1.882.543-.628.723-1.075 1.082-1.793.363-.717.182-1.344-.09-1.883-.27-.537-2.438-5.825-3.34-7.977-.902-2.15-1.803-1.792-2.436-1.792-.631 0-1.354-.09-2.076-.09s-1.896.269-2.889 1.344c-.992 1.076-3.789 3.676-3.789 8.963 0 5.288 3.879 10.397 4.422 11.113.541.716 7.49 11.92 18.5 16.223C58.2 65.771 58.2 64.336 60.186 64.156c1.984-.179 6.406-2.599 7.312-5.107.9-2.512.9-4.663.631-5.111z"/></svg>
							</span>
							<span class="product-block-info-buy-link__title">
								Купить через WhatsApp
							</span>
						</a>
					</div>
				</div>
			</div>
			<?php
				}
			?>
		</div>
	</div>
</section>
<?php
	require $_SERVER['DOCUMENT_ROOT'] . "/layouts/app-end.php";
?>