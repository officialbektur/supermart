<?php
	$title="Корзина";
	require $_SERVER['DOCUMENT_ROOT'] . "/layouts/app-start.php";
?>
<section class="content">
	<div class="content__container">
		<div class="content__header content-header">
			<h2 class="content-header__title _title">
				<?php print $title;?>
			</h2>
			<div class="content-header__info content-header-info">
				<div class="content-header-info__title">
					Итого:
				</div>
				<div class="content-header-info__content">
					<span class="content-header-info__col content-header-info-col"><span class="content-header-info-col__number">100</span><span class="content-header-info-col__text">шт</span></span>
					/
					<span class="content-header-info__price content-header-info-price"><span class="content-header-info-price__number">1110</span><span class="content-header-info-price__text">сом</span></span>
				</div>
			</div>
		</div>
		<table class="product-block__trash product-block-trash">
			<thead class="product-block-trash__header product-block-trash-header">
				<tr>
					<th class="product-block-trash-header__list product-block-trash-header__title">
						Название
					</th>
					<th class="product-block-trash-header__list product-block-trash-header__delete">
						Удалить
					</th>
					<th class="product-block-trash-header__list product-block-trash-header__quantity">
						Количество
					</th>
					<th class="product-block-trash-header__list product-block-trash-header__price">
						Сумма
					</th>
				</tr>
			</thead>
			<tbody class="product-block-trash__body">
				<tr class="product-block-trash__block">
					<td class="product-block-trash__columntitle">
						<div class="product-block-trash__title product-block-trash-title">
							<a href="#" class="product-block-trash-title__image product-block-trash-title-image">
								<div class="product-block-trash-title-image__img">
									<img src="img/product-blocks/1.png" alt="img">
								</div>
							</a>
							<div class="product-block-trash-title__infotext product-block-trash-titleinfotext">
								<a href="#" class="product-block-trash-title-infotext__category">Категория>Спорт пит</a>
								<a href="#" class="product-block-trash-title-infotext__title">КРЕАТИН KULT MASS 300гр</a>
								<div class="product-block-trash-title-infotext__price product-block-trash-title-infotext-price">
									<span class="product-block-trash-title-infotext-price__number">250</span><span class="product-block-trash-title-infotext-price__text">сом</span>
								</div>
							</div>
						</div>
					</td>
					<td class="product-block-trash__columndelete">
						<div class="product-block-trash__delete product-block-trash-delete">
							<button class="product-block-trash-delete__button product-block-trash-delete-button">
								<span class="product-block-trash-delete-button__icon">
									<svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64s14.3 32 32 32h384c17.7 0 32-14.3 32-32s-14.3-32-32-32h-96l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32l21.2 339c1.6 25.3 22.6 45 47.9 45h245.8c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
								</span>
							</button>
						</div>
					</td>
					<td class="product-block-trash__columnquantity">
						<div class="product-block-trash__quantity product-block-trash-quantity">
							<div data-quantity class="quantity">
								<button data-quantity-plus type="button" class="quantity__button quantity__button-plus"></button>
								<div class="quantity__input">
									<input data-quantity-value data-quantity-max="1000" data-quantity-min="0" type="text" value="1">
								</div>
								<button data-quantity-minus type="button" class="quantity__button quantity__button-minus"></button>
							</div>
						</div>
					</td>
					<td class="product-block-trash__columnprice product-block-trash-price">
						<div class="product-block-trash__price product-block-trash-price">
							<div class="product-block-trash-price__content">
								<span class="product-block-trash-price__number">250</span><span class="product-block-trash-price__text">сом</span>
							</div>
						</div>
					</td>
				</tr>
				<tr class="product-block-trash__block">
					<td class="product-block-trash__columntitle">
						<div class="product-block-trash__title product-block-trash-title">
							<a href="#" class="product-block-trash-title__image product-block-trash-title-image">
								<div class="product-block-trash-title-image__img">
									<img src="img/product-blocks/1.png" alt="img">
								</div>
							</a>
							<div class="product-block-trash-title__infotext product-block-trash-titleinfotext">
								<a href="#" class="product-block-trash-title-infotext__category">Категория>Спорт пит</a>
								<a href="#" class="product-block-trash-title-infotext__title">КРЕАТИН KULT MASS 300гр</a>
								<div class="product-block-trash-title-infotext__price product-block-trash-title-infotext-price">
									<span class="product-block-trash-title-infotext-price__number">250</span><span class="product-block-trash-title-infotext-price__text">сом</span>
								</div>
							</div>
						</div>
					</td>
					<td class="product-block-trash__columndelete">
						<div class="product-block-trash__delete product-block-trash-delete">
							<button class="product-block-trash-delete__button product-block-trash-delete-button">
								<span class="product-block-trash-delete-button__icon">
									<svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64s14.3 32 32 32h384c17.7 0 32-14.3 32-32s-14.3-32-32-32h-96l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32l21.2 339c1.6 25.3 22.6 45 47.9 45h245.8c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
								</span>
							</button>
						</div>
					</td>
					<td class="product-block-trash__columnquantity">
						<div class="product-block-trash__quantity product-block-trash-quantity">
							<div data-quantity class="quantity">
								<button data-quantity-plus type="button" class="quantity__button quantity__button-plus"></button>
								<div class="quantity__input">
									<input data-quantity-value data-quantity-max="1000" data-quantity-min="0" type="text" value="1">
								</div>
								<button data-quantity-minus type="button" class="quantity__button quantity__button-minus"></button>
							</div>
						</div>
					</td>
					<td class="product-block-trash__columnprice product-block-trash-price">
						<div class="product-block-trash__price product-block-trash-price">
							<div class="product-block-trash-price__content">
								<span class="product-block-trash-price__number">250</span><span class="product-block-trash-price__text">сом</span>
							</div>
						</div>
					</td>
				</tr>
				<tr class="product-block-trash__block">
					<td class="product-block-trash__columntitle">
						<div class="product-block-trash__title product-block-trash-title">
							<a href="#" class="product-block-trash-title__image product-block-trash-title-image">
								<div class="product-block-trash-title-image__img">
									<img src="img/product-blocks/1.png" alt="img">
								</div>
							</a>
							<div class="product-block-trash-title__infotext product-block-trash-titleinfotext">
								<a href="#" class="product-block-trash-title-infotext__category">Категория>Спорт пит</a>
								<a href="#" class="product-block-trash-title-infotext__title">КРЕАТИН KULT MASS 300гр</a>
								<div class="product-block-trash-title-infotext__price product-block-trash-title-infotext-price">
									<span class="product-block-trash-title-infotext-price__number">250</span><span class="product-block-trash-title-infotext-price__text">сом</span>
								</div>
							</div>
						</div>
					</td>
					<td class="product-block-trash__columndelete">
						<div class="product-block-trash__delete product-block-trash-delete">
							<button class="product-block-trash-delete__button product-block-trash-delete-button">
								<span class="product-block-trash-delete-button__icon">
									<svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64s14.3 32 32 32h384c17.7 0 32-14.3 32-32s-14.3-32-32-32h-96l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32l21.2 339c1.6 25.3 22.6 45 47.9 45h245.8c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
								</span>
							</button>
						</div>
					</td>
					<td class="product-block-trash__columnquantity">
						<div class="product-block-trash__quantity product-block-trash-quantity">
							<div data-quantity class="quantity">
								<button data-quantity-plus type="button" class="quantity__button quantity__button-plus"></button>
								<div class="quantity__input">
									<input data-quantity-value data-quantity-max="1000" data-quantity-min="0" type="text" value="1">
								</div>
								<button data-quantity-minus type="button" class="quantity__button quantity__button-minus"></button>
							</div>
						</div>
					</td>
					<td class="product-block-trash__columnprice product-block-trash-price">
						<div class="product-block-trash__price product-block-trash-price">
							<div class="product-block-trash-price__content">
								<span class="product-block-trash-price__number">250</span><span class="product-block-trash-price__text">сом</span>
							</div>
						</div>
					</td>
				</tr>
				<tr class="product-block-trash__block">
					<td class="product-block-trash__columntitle">
						<div class="product-block-trash__title product-block-trash-title">
							<a href="#" class="product-block-trash-title__image product-block-trash-title-image">
								<div class="product-block-trash-title-image__img">
									<img src="img/product-blocks/1.png" alt="img">
								</div>
							</a>
							<div class="product-block-trash-title__infotext product-block-trash-titleinfotext">
								<a href="#" class="product-block-trash-title-infotext__category">Категория>Спорт пит</a>
								<a href="#" class="product-block-trash-title-infotext__title">КРЕАТИН KULT MASS 300гр</a>
								<div class="product-block-trash-title-infotext__price product-block-trash-title-infotext-price">
									<span class="product-block-trash-title-infotext-price__number">250</span><span class="product-block-trash-title-infotext-price__text">сом</span>
								</div>
							</div>
						</div>
					</td>
					<td class="product-block-trash__columndelete">
						<div class="product-block-trash__delete product-block-trash-delete">
							<button class="product-block-trash-delete__button product-block-trash-delete-button">
								<span class="product-block-trash-delete-button__icon">
									<svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64s14.3 32 32 32h384c17.7 0 32-14.3 32-32s-14.3-32-32-32h-96l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32l21.2 339c1.6 25.3 22.6 45 47.9 45h245.8c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
								</span>
							</button>
						</div>
					</td>
					<td class="product-block-trash__columnquantity">
						<div class="product-block-trash__quantity product-block-trash-quantity">
							<div data-quantity class="quantity">
								<button data-quantity-plus type="button" class="quantity__button quantity__button-plus"></button>
								<div class="quantity__input">
									<input data-quantity-value data-quantity-max="1000" data-quantity-min="0" type="text" value="1">
								</div>
								<button data-quantity-minus type="button" class="quantity__button quantity__button-minus"></button>
							</div>
						</div>
					</td>
					<td class="product-block-trash__columnprice product-block-trash-price">
						<div class="product-block-trash__price product-block-trash-price">
							<div class="product-block-trash-price__content">
								<span class="product-block-trash-price__number">250</span><span class="product-block-trash-price__text">сом</span>
							</div>
						</div>
					</td>
				</tr>
				<tr class="product-block-trash__block">
					<td class="product-block-trash__columntitle">
						<div class="product-block-trash__title product-block-trash-title">
							<a href="#" class="product-block-trash-title__image product-block-trash-title-image">
								<div class="product-block-trash-title-image__img">
									<img src="img/product-blocks/1.png" alt="img">
								</div>
							</a>
							<div class="product-block-trash-title__infotext product-block-trash-titleinfotext">
								<a href="#" class="product-block-trash-title-infotext__category">Категория>Спорт пит</a>
								<a href="#" class="product-block-trash-title-infotext__title">КРЕАТИН KULT MASS 300гр</a>
								<div class="product-block-trash-title-infotext__price product-block-trash-title-infotext-price">
									<span class="product-block-trash-title-infotext-price__number">250</span><span class="product-block-trash-title-infotext-price__text">сом</span>
								</div>
							</div>
						</div>
					</td>
					<td class="product-block-trash__columndelete">
						<div class="product-block-trash__delete product-block-trash-delete">
							<button class="product-block-trash-delete__button product-block-trash-delete-button">
								<span class="product-block-trash-delete-button__icon">
									<svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64s14.3 32 32 32h384c17.7 0 32-14.3 32-32s-14.3-32-32-32h-96l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32l21.2 339c1.6 25.3 22.6 45 47.9 45h245.8c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
								</span>
							</button>
						</div>
					</td>
					<td class="product-block-trash__columnquantity">
						<div class="product-block-trash__quantity product-block-trash-quantity">
							<div data-quantity class="quantity">
								<button data-quantity-plus type="button" class="quantity__button quantity__button-plus"></button>
								<div class="quantity__input">
									<input data-quantity-value data-quantity-max="1000" data-quantity-min="0" type="text" value="1">
								</div>
								<button data-quantity-minus type="button" class="quantity__button quantity__button-minus"></button>
							</div>
						</div>
					</td>
					<td class="product-block-trash__columnprice product-block-trash-price">
						<div class="product-block-trash__price product-block-trash-price">
							<div class="product-block-trash-price__content">
								<span class="product-block-trash-price__number">250</span><span class="product-block-trash-price__text">сом</span>
							</div>
						</div>
					</td>
				</tr>
				<tr class="product-block-trash__block">
					<td class="product-block-trash__columntitle">
						<div class="product-block-trash__title product-block-trash-title">
							<a href="#" class="product-block-trash-title__image product-block-trash-title-image">
								<div class="product-block-trash-title-image__img">
									<img src="img/product-blocks/1.png" alt="img">
								</div>
							</a>
							<div class="product-block-trash-title__infotext product-block-trash-titleinfotext">
								<a href="#" class="product-block-trash-title-infotext__category">Категория>Спорт пит</a>
								<a href="#" class="product-block-trash-title-infotext__title">КРЕАТИН KULT MASS 300гр</a>
								<div class="product-block-trash-title-infotext__price product-block-trash-title-infotext-price">
									<span class="product-block-trash-title-infotext-price__number">250</span><span class="product-block-trash-title-infotext-price__text">сом</span>
								</div>
							</div>
						</div>
					</td>
					<td class="product-block-trash__columndelete">
						<div class="product-block-trash__delete product-block-trash-delete">
							<button class="product-block-trash-delete__button product-block-trash-delete-button">
								<span class="product-block-trash-delete-button__icon">
									<svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64s14.3 32 32 32h384c17.7 0 32-14.3 32-32s-14.3-32-32-32h-96l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32l21.2 339c1.6 25.3 22.6 45 47.9 45h245.8c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
								</span>
							</button>
						</div>
					</td>
					<td class="product-block-trash__columnquantity">
						<div class="product-block-trash__quantity product-block-trash-quantity">
							<div data-quantity class="quantity">
								<button data-quantity-plus type="button" class="quantity__button quantity__button-plus"></button>
								<div class="quantity__input">
									<input data-quantity-value data-quantity-max="1000" data-quantity-min="0" type="text" value="1">
								</div>
								<button data-quantity-minus type="button" class="quantity__button quantity__button-minus"></button>
							</div>
						</div>
					</td>
					<td class="product-block-trash__columnprice product-block-trash-price">
						<div class="product-block-trash__price product-block-trash-price">
							<div class="product-block-trash-price__content">
								<span class="product-block-trash-price__number">250</span><span class="product-block-trash-price__text">сом</span>
							</div>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</section>
<?php
	require $_SERVER['DOCUMENT_ROOT'] . "/layouts/app-end.php";
?>