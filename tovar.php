<?php
	$title="Информация";
	require $_SERVER['DOCUMENT_ROOT'] . "/layouts/app-start.php";
?>
<section class="content moreinfo-tovar">
	<div class="content__container">
		<h2 class="_title">
			<?php print $title; ?> о-3333333--2222222 <?php echo mysqli_fetch_assoc(get_product_tovar())['title']; ?>
		</h2>
		<div class="moreinfo-tovar__body">
			<div class="moreinfo-tovar__info moreinfo-tovar-info">
				<div class="moreinfo-tovar-info__image moreinfo-tovar-info-image">
					<div class="moreinfo-tovar-info-image__sliderbig moreinfo-tovar-info-image-sliderbig"></div>
					<div class="moreinfo-tovar-info-image__pagination moreinfo-tovar-info-image-pagination"></div>
				</div>
				<div class="moreinfo-tovar-info__textinfo moreinfo-tovar-info-textinfo"></div>
			</div>
			<div class="moreinfo-tovar__content">
				<nav class="moreinfo-tovar__header moreinfo-tovar-navigation">
					<button type="button" data-goto-header data-goto=".moreinfo-tovar-body__description" class="moreinfo-tovar-navigation__link">Описание</button>
					<button type="button" data-goto-header data-goto=".moreinfo-tovar-body-reviews__form" href class="moreinfo-tovar-navigation__link">Написать отзыв</button>
					<button type="button" data-goto-header data-goto=".moreinfo-tovar-body-reviews__comentary" href class="moreinfo-tovar-navigation__link">Отзывы</button>
				</nav>
				<div class="moreinfo-tovar-body">
					<div class="moreinfo-tovar-body__description moreinfo-tovar-body-description"></div>
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
			require $_SERVER['DOCUMENT_ROOT'] . "/include/section/rec.php";
		?>
		<?php
			// require $_SERVER['DOCUMENT_ROOT'] . "/include/section/his.php";
		?>
	</div>
</section>
<?php
	require $_SERVER['DOCUMENT_ROOT'] . "/layouts/app-end.php";
?>