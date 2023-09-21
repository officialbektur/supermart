<!-----------------------------------  Header  --Start--  ----------------------------------->
<header data-lp data-scroll-show class="header">
	<div class="header__top header-top">
		<div class="header-top__container">
			<div class="header-top__body">
				<a href="index.php" class="header-top__logo">
					<img src="/img/logo/logo.png" alt="logo">
				</a>
				<div class="header-top__search header-top-search">
					<form action="search.php" method="get" class="header-top-search__form">
						<input autocomplete="off" type="text" name="searchInput" placeholder="Искать на сайте..." <?php if(isset($_GET['searchInput'])):?>  value="<?php echo trim($_GET["searchInput"]);?>" <?php endif;?> class="header-top-search__input">
						<div class="header-top-search__clear header-top-search-clear a-hover-bgc">
							<button type="button" class="header-top-search-clear__button header-top-search-clear-button">
								<span class="header-top-search-clear-button__icon">
									<svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99h144v-144C192 62.32 206.33 48 224 48s32 14.32 32 32.01v144h144c17.7-.01 32 14.29 32 31.99z"/></svg>
								</span>
							</button>
						</div>
						<div class="header-top-search__filter header-top-search-filter">
							<button type="button" class="header-top-search-filter__button header-top-search-filter-button a-hover-bgc">
								<span class="header-top-search-filter-button__icon">
									<svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="currentColor" fill-rule="evenodd" d="M8 9.83a3.001 3.001 0 10-2 0V19a1 1 0 102 0V9.83zm9 4.34a3.001 3.001 0 11-2 0V5a1 1 0 112 0v9.17z" clip-rule="evenodd"/></svg>
								</span>
							</button>
							<div class="header-top-search-filter__menu header-top-search-filter-menu">
								<button type="button" class="header-top-search-filter-menu__close header-top-search-filter-menu-close a-hover-bgc">
									<span class="header-top-search-filter-menu-close__icon">
										<svg viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg"><path d="M310.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 210.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L114.7 256 9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 301.3l105.4 105.3c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L205.3 256l105.3-105.4z"/></svg>
									</span>
								</button>
								<div class="header-top-search-filter-menu__items">
									<div class="header-top-search-filter-menu__item">
										<div class="header-top-search-filter-menu-item__title">
											Категория
										</div>
										<div class="header-top-search-filter-menu-item__content bkt-catygory">
											<div class="bkt-catygory__button bkt-catygory-button a-hover-bgc">
												<span class="bkt-catygory-button__title">
													Выберите категорию
												</span>
												<span class="bkt-catygory-button__icon">
													<svg viewBox="0 0 384 512" xmlns="http://www.w3.org/2000/svg"><path d="M352 352c-8.188 0-16.38-3.125-22.62-9.375L192 205.3 54.6 342.7c-12.5 12.5-32.75 12.5-45.25 0s-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25-6.2 6.2-14.4 9.3-22.6 9.3z"/></svg>
												</span>
												<span class="bkt-catygory-button__clear a-hover-bgc">
													<svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99h144v-144C192 62.32 206.33 48 224 48s32 14.32 32 32.01v144h144c17.7-.01 32 14.29 32 31.99z"/></svg>
												</span>
											</div>
											<input type="hidden" name="catygory" class="bkt-catygory-product-id">
											<div class="bkt-catygory__menu bkt-catygory-menu">
												<div class="bkt-catygory-menu__header bkt-catygory-menu-header">
													<button type="button" class="bkt-catygory-menu-header__back bkt-catygory-menu-header-back a-hover-bgc">
														<span class="bkt-catygory-menu-header-back__icon">
															<svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H109.3l105.3-105.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
														</span>
														<span class="bkt-catygory-menu-header-back__text">
															Назад
														</span>
													</button>
													<button type="button" class="bkt-catygory-menu-header__close bkt-catygory-menu-header-close a-hover-bgc">
														<span class="bkt-catygory-menu-header-close__icon">
															<svg viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg"><path d="M310.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 210.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L114.7 256 9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 301.3l105.4 105.3c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L205.3 256l105.3-105.4z"/></svg>
														</span>
													</button>
												</div>
												<div class="bkt-catygory-menu__main bkt-catygory-menu-main"></div>
											</div>
										</div>
									</div>
									<div class="header-top-search-filter-menu__item header-top-search-filter-menu-item">
										<div class="header-top-search-filter-menu-item__title">
											Цена
										</div>
										<div class="header-top-search-filter-menu-item__content header-top-search-filter-menu-item__price header-top-search-filter-menu-item-price">
											<div class="header-top-search-filter-menu-item-price__input header-top-search-filter-menu-item-price-input">
												<input autocomplete="off" type="text" name="form[]" id="1" placeholder="Цена от">
											</div>
											<div class="header-top-search-filter-menu-item-price__input header-top-search-filter-menu-item-price-input">
												<input autocomplete="off" type="text" name="form[]" id="2" placeholder="Цена до">
											</div>
										</div>
									</div>
									<div class="header-top-search-filter-menu__item header-top-search-filter-menu-item">
										<div class="header-top-search-filter-menu-item__title">
											Сортировка
										</div>
										<div class="header-top-search-filter-menu-item__content header-top-search-filter-menu-item__sorting header-top-search-filter-menu-item-sorting">
											<div class="header-top-search-filter-menu-item-sorting__select header-top-search-filter-menu-item-sorting-select">
												<button type="button" class="header-top-search-filter-menu-item-sorting-select__button header-top-search-filter-menu-item-sorting-select-button a-hover-bgc">
													<span class="header-top-search-filter-menu-item-sorting-select-button__title">По умолчанию</span>
													<span class="header-top-search-filter-menu-item-sorting-select-button__icon">
														<svg viewBox="0 0 384 512" xmlns="http://www.w3.org/2000/svg"><path d="M352 352c-8.188 0-16.38-3.125-22.62-9.375L192 205.3 54.6 342.7c-12.5 12.5-32.75 12.5-45.25 0s-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25-6.2 6.2-14.4 9.3-22.6 9.3z"/></svg>
													</span>
												</button>
												<div class="header-top-search-filter-menu-item-sorting-select__menu header-top-search-filter-menu-item-sorting-select-menu">
													<div class="header-top-search-filter-menu-item-sorting-select-menu__lists">
														<button type="button" class="header-top-search-filter-menu-item-sorting-select-menu__list a-hover-bgc _active">
															По умолчанию
														</button>
														<button type="button" class="header-top-search-filter-menu-item-sorting-select-menu__list a-hover-bgc">
															Сначала по акции
														</button>
														<button type="button" class="header-top-search-filter-menu-item-sorting-select-menu__list a-hover-bgc">
															Сначала новые
														</button>
														<button type="button" class="header-top-search-filter-menu-item-sorting-select-menu__list a-hover-bgc">
															Сначала дешевле
														</button>
														<button type="button" class="header-top-search-filter-menu-item-sorting-select-menu__list a-hover-bgc">
															Сначала дороже
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="header-top-search-filter-menu__item header-top-search-filter-menu-item">
										<div class="header-top-search-filter-menu-item__innerbuttonsave">
											<button type="button" class="header-top-search-filter-menu-item__buttonsave a-hover-bgc">Сохранить</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<button type="submit" class="header-top-search__button">Поиск</button>
					</form>
					<div class="header-top-search__hint header-top-search-hint">
						<div class="header-top-search-hint__body">
							<div class="header-top-search-hint__history header-top-search-hint-history">
								<div class="header-top-search-hint__headertop header-top-search-hint-headertop">
									<div class="header-top-search-hint-headertop__title">
										История
									</div>
									<button type="button" class="header-top-search-hint-headertop__clear a-hover-bgc">Очистить</button>
								</div>
								<div class="header-top-search-hint__menu header-top-search-hint-menu"></div>
							</div>
							<div class="header-top-search-hint__footer header-top-search-hint-footer">
								<div class="header-top-search-hint__headertop">
									<div class="header-top-search-hint-headertop__title">
										Рекомендация
									</div>
								</div>
								<div class="header-top-search-hint__menu header-top-search-hint-menu"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="header-top__bar header-top-bar">
					<div class="site__language site-language a-hover-bgc">
						<button type="button" class="site-language__button site-language-button" data-site-language-menu-button>
							<span class="site-language-button__icon">
								<svg viewBox="0 0 48.625 48.625" xmlns="http://www.w3.org/2000/svg"><path d="M35.432 10.815l.047.361-.541.112-.072.769h.648l.862-.083.445-.529-.473-.184-.259-.298-.389-.63-.186-.891-.731.149-.205.314v.354l.352.241z"/><path d="M34.809 11.111l.039-.482-.429-.185-.6.139-.445.714v.463h.519zm-12.35 2.047l-.132.34h-.639v.33h.152l.022.162.392-.033.245-.152.064-.307.317-.027.125-.258-.291-.06-.255.005zm-1.647.599l-.025.323.463-.039.048-.324-.278-.219z"/><path d="M48.619 24.061a24.552 24.552 0 00-.11-2.112 24.165 24.165 0 00-1.609-6.62c-.062-.155-.119-.312-.185-.465a24.341 24.341 0 00-4.939-7.441 24.19 24.19 0 00-1.11-1.086A24.22 24.22 0 0024.312 0c-6.345 0-12.126 2.445-16.46 6.44a24.6 24.6 0 00-2.78 3.035A24.18 24.18 0 000 24.312c0 13.407 10.907 24.313 24.313 24.313 9.43 0 17.617-5.4 21.647-13.268a24.081 24.081 0 002.285-6.795c.245-1.381.379-2.801.379-4.25.001-.084-.004-.167-.005-.251zm-4.576-9.717l.141-.158c.185.359.358.724.523 1.094l-.23-.009-.434.06v-.987zm-3.513-4.242l.004-1.086c.382.405.75.822 1.102 1.254l-.438.652-1.531-.014-.096-.319.959-.487zM11.202 7.403v-.041h.487l.042-.167h.797v.348l-.229.306h-1.098l.001-.446zm.778 1.085s.487-.083.529-.083 0 .486 0 .486l-1.098.069-.209-.25.778-.222zm33.612 9.651h-1.779l-1.084-.807-1.141.111v.696h-.361l-.39-.278-1.976-.501v-1.28l-2.504.195-.776.417h-.994l-.487-.049-1.207.67v1.261l-2.467 1.78.205.76h.5l-.131.724-.352.129-.019 1.892 2.132 2.428h.928l.056-.148h1.668l.481-.445h.946l.519.52 1.41.146-.187 1.875 1.565 2.763-.824 1.575.056.742.649.647v1.784l.852 1.146v1.482h.736c-4.096 5.029-10.33 8.25-17.305 8.25C12.009 46.625 2 36.615 2 24.312c0-3.097.636-6.049 1.781-8.732v-.696l.798-.969c.277-.523.574-1.033.891-1.53l.036.405-.926 1.125a22.14 22.14 0 00-.798 1.665v1.27l.927.446v1.765l.889 1.517.723.111.093-.52-.853-1.316-.167-1.279h.5l.211 1.316 1.233 1.799-.318.581.784 1.199 1.947.482v-.315l.779.111-.074.556.612.112.945.258 1.335 1.521 1.705.129.167 1.391-1.167.816-.055 1.242-.167.76 1.688 2.113.129.724s.612.166.687.166c.074 0 1.372.983 1.372.983v3.819l.463.13-.315 1.762.779 1.039-.144 1.746 1.029 1.809 1.321 1.154 1.328.024.13-.427-.976-.822.056-.408.175-.5.037-.51-.66-.02-.333-.418.548-.527.074-.398-.612-.175.036-.37.872-.132 1.326-.637.445-.816 1.391-1.78-.316-1.392.427-.741 1.279.039.861-.682.278-2.686.955-1.213.167-.779-.871-.279-.575-.943-1.965-.02-1.558-.594-.074-1.111-.52-.909-1.409-.021-.814-1.278-.723-.353-.037.39-1.316.078-.482-.671-1.373-.279-1.131 1.307-1.78-.302-.129-2.006-1.299-.222.521-.984-.149-.565-1.707 1.141-1.074-.131-.383-.839.234-.865.592-1.091 1.363-.69 2.632-.001-.007.803.946.44-.075-1.372.682-.686 1.376-.904.094-.636 1.372-1.428 1.459-.808-.129-.106.988-.93.362.096.166.208.375-.416.092-.041-.411-.058-.417-.139v-.4l.221-.181h.487l.223.098.193.39.236-.036v-.034l.068.023.684-.105.097-.334.39.098v.362l-.362.249h.001l.053.397 1.239.382.003.015.285-.024.019-.537-.982-.447-.056-.258.815-.278.036-.78-.852-.519-.056-1.315-1.168.574h-.426l.112-1.001-1.59-.375-.658.497v1.516l-1.183.375-.474.988-.514.083v-1.264l-1.112-.154-.556-.362-.224-.819 1.989-1.164.973-.296.098.654.542-.028.042-.329.567-.081.01-.115-.244-.101-.056-.348.697-.059.421-.438.023-.032.005.002.128-.132 1.465-.185.648.55-1.699.905 2.162.51.28-.723h.945l.334-.63-.668-.167v-.797l-2.095-.928-1.446.167-.816.427.056 1.038-.853-.13-.131-.574.817-.742-1.483-.074-.426.129-.185.5.556.094-.111.556-.945.056-.148.37-1.371.038s-.038-.778-.093-.778l1.075-.019.817-.798-.446-.223-.593.576-.984-.056-.593-.816h-1.261l-1.316.983h1.206l.11.353-.313.291 1.335.037.204.482-1.503-.056-.073-.371-.945-.204-.501-.278-1.125.009A22.188 22.188 0 0124.312 2c5.642 0 10.797 2.109 14.73 5.574l-.265.474-1.029.403-.434.471.1.549.531.074.32.8.916-.369.151 1.07h-.276l-.752-.111-.834.14-.807 1.14-1.154.181-.167.988.487.115-.141.635-1.146-.23-1.051.23-.223.585.182 1.228.617.289 1.035-.006.699-.063.213-.556 1.092-1.419.719.147.708-.64.132.5 1.742 1.175-.213.286-.785-.042.302.428.483.106.566-.236-.012-.682.251-.126-.202-.214-1.162-.648-.306-.861h.966l.309.306.832.717.035.867.862.918.321-1.258.597-.326.112 1.029.583.64 1.163-.02c.225.579.427 1.168.604 1.769l-.121.112zm-32.331-7.093l.584-.278.528.126-.182.709-.57.181-.36-.738zm3.099 1.669v.459h-1.334l-.5-.139.125-.32.641-.265h.876v.265h.192zm.614.64v.445l-.334.215-.416.077v-.737h.75zm-.376-.181v-.529l.459.418-.459.111zm.209 1.07v.433l-.319.32h-.709l.111-.486.335-.029.069-.167.513-.071zm-1.766-.889h.737l-.945 1.321-.39-.209.084-.556.514-.556zm3.018.737v.432h-.709l-.194-.28v-.402h.056l.847.25zm-.655-.594l.202-.212.341.212-.273.225-.27-.225zm28.55 5.767l.07-.082c.029.126.06.252.088.38l-.158-.298z"/><path d="M3.782 14.884v.696c.243-.568.511-1.122.798-1.665l-.798.969z"/></svg>
							</span>
							<span class="site-language-button__title" data-site-language-menu-button-title>
								Рус. язык
							</span>
						</button>
						<div class="site-language__menu site-language-menu">
							<a href="#" data-site-language-menu-title class="site-language-menu__list">
								Рус. язык
							</a>
							<a href="#" data-site-language-menu-title class="site-language-menu__list">
								Кыргыз тили
							</a>
						</div>
					</div>
					<a href="favorite.php" class="header-top-bar__block header-top-bar-block a-hover-bgc">
						<span class="header-top-bar-block__info header-top-bar-block-info">
							<span class="header-top-bar-block-info__icon">
								<svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M47.6 300.4l180.7 168.7c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9l180.7-168.7c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141-45.6-7.6-92 7.3-124.6 39.9l-12 12-12-12c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg>
							</span>
							<span class="header-top-bar-block-info__number">0</span>
						</span>
						<span class="header-top-bar-block__title">Избранные</span>
					</a>
					<a href="trash.php" class="header-top-bar__block header-top-bar-block a-hover-bgc">
						<span class="header-top-bar-block__info header-top-bar-block-info">
							<span class="header-top-bar-block-info__icon">
								<svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64s14.3 32 32 32h384c17.7 0 32-14.3 32-32s-14.3-32-32-32h-96l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32l21.2 339c1.6 25.3 22.6 45 47.9 45h245.8c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
							</span>
							<span class="header-top-bar-block-info__number">0</span>
						</span>
						<span class="header-top-bar-block__title">Корзина</span>
					</a>
					<button type="button" class="header-top-bar__menu header-top-bar-menu">
						<span class="header-top-bar-menu__icon">
							<svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M0 96c0-17.7 14.3-32 32-32h384c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zm0 160c0-17.7 14.3-32 32-32h384c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zm448 160c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32h384c17.7 0 32 14.3 32 32z"/></svg>
						</span>
					</button>
				</div>
			</div>
		</div>
	</div>
	<div class="header__footer header-footer">
		<div class="header-footer__container">
			<div class="header-footer__body">
				<div class="header-footer__menu header-footer-menu">
					<button type="button" class="header-footer-menu__button header-footer-menu-button">
						<span class="header-footer-menu-button__title">Категория</span>
						<span class="header-footer-menu-button__icon">
							<svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="currentColor" fill-rule="evenodd" d="M8 9.83a3.001 3.001 0 10-2 0V19a1 1 0 102 0V9.83zm9 4.34a3.001 3.001 0 11-2 0V5a1 1 0 112 0v9.17z" clip-rule="evenodd"/></svg>
						</span>
					</button>
					<div class="header-footer-menu__body">
						<div class="header-footer-menu__content"></div>
					</div>
				</div>
				<div class="header-footer__content">
					<div class="header-footer__swiper">
						<div class="header-footer__slider header-footer-slider">
							<div class="header-footer-slider__lists swiper-wrapper">
								<a href="index.php" class="header-footer-slider__list swiper-slide a-hover-bgc">Главная</a>
								<a href="stock.php" class="header-footer-slider__list swiper-slide a-hover-bgc">Акция</a>
								<a href="oftenbuy.php" class="header-footer-slider__list swiper-slide a-hover-bgc">Вы недавно смотрели</a>
								<a href="newproducts.php" class="header-footer-slider__list swiper-slide a-hover-bgc">Новые товары</a>
								<a href="oftenbuy.php" class="header-footer-slider__list swiper-slide a-hover-bgc">Часто покупают</a>
								<a href="aboutus.php" class="header-footer-slider__list swiper-slide a-hover-bgc">О нас</a>
							</div>
							<button type="button" class="header-footer-slider__btnnext header-footer-slider-btnnext">
								<span class="header-footer-slider-btnnext__icon a-hover-bgc">
									<svg viewBox="0 0 384 512" xmlns="http://www.w3.org/2000/svg"><path d="M352 352c-8.188 0-16.38-3.125-22.62-9.375L192 205.3 54.6 342.7c-12.5 12.5-32.75 12.5-45.25 0s-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25-6.2 6.2-14.4 9.3-22.6 9.3z"/></svg>
								</span>
							</button>
							<button type="button" class="header-footer-slider__btnprev header-footer-slider-btnprev">
								<span class="header-footer-slider-btnprev__icon a-hover-bgc">
									<svg viewBox="0 0 384 512" xmlns="http://www.w3.org/2000/svg"><path d="M352 352c-8.188 0-16.38-3.125-22.62-9.375L192 205.3 54.6 342.7c-12.5 12.5-32.75 12.5-45.25 0s-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25-6.2 6.2-14.4 9.3-22.6 9.3z"/></svg>
								</span>
							</button>
						</div>
					</div>
					<a href data-popup="#map" class="header-footer__adressmap header-footer-adressmap">
						<span class="header-footer-adressmap__icon">
							<svg viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg"><path d="M408 120c0 54.6-73.1 151.9-105.2 192-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120 168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6.5-1.2 1-2.5 1.5-3.7l116-46.4c15.8-6.3 32.9 5.3 32.9 22.3v270.8c0 9.8-6 18.6-15.1 22.3L416 503V200.4zm-278.4-62.1c2.4 14.1 7.2 28.3 12.8 41.5 2.9 6.8 6.1 13.7 9.6 20.6v251.4L32.9 502.7C17.1 509 0 497.4 0 480.4V209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77v249.3l-192-54.9V255c20.5 31.3 42.3 59.6 56.2 77 20.5 25.6 59.1 25.6 79.6 0zM288 152c22.1 0 40-17.9 40-40s-17.9-40-40-40-40 17.9-40 40 17.9 40 40 40z"/></svg>
						</span>
						<span class="header-footer-adressmap__title">
							Мы находимся здесь
						</span>
					</a>
				</div>
			</div>
		</div>
	</div>
</header>
<!-----------------------------------  Header  --End--  ----------------------------------->