// Основная функция
function initRatings() {
	const ratings = document.querySelectorAll('.moreinfo-tovar-body-reviews-form__rating');
	let ratingActive, ratingValue;
	// "Бегаем" по всем рейтингам на странице
	for (let index = 0; index < ratings.length; index++) {
		const rating = ratings[index];
		initRating(rating);
	}

	// Инициализируем конкретный рейтинг
	function initRating(rating) {
		initRatingVars(rating);

		setRatingActiveWidth();
		setRating(rating);
	}

	// Инициализайция переменных
	function initRatingVars(rating) {
		ratingActive = rating.querySelector('.moreinfo-tovar-body-reviews-form-rating__active');
		ratingValue = rating.querySelector('.moreinfo-tovar-body-reviews-form-rating__value');
	}
	// Изменяем ширину активных звезд
	function setRatingActiveWidth(index = ratingValue.innerHTML) {
		const ratingActiveWidth = index / 0.05;
		ratingActive.style.width = `${ratingActiveWidth}%`;
	}
	// Возможность указать оценку 
	function setRating(rating) {
		const ratingItems = rating.querySelectorAll('.moreinfo-tovar-body-reviews-form-rating__item');
		for (let index = 0; index < ratingItems.length; index++) {
			const ratingItem = ratingItems[index];
			ratingItem.addEventListener("mouseenter", function (e) {
				// Обновление переменных
				initRatingVars(rating);
				// Обновление активных звезд
				setRatingActiveWidth(ratingItem.value);
			});
			ratingItem.addEventListener("mouseleave", function (e) {
				// Обновление активных звезд
				setRatingActiveWidth();
			});
			ratingItem.addEventListener("click", function (e) {
				// Обновление переменных
				initRatingVars(rating);
				// Отобразить указанную оценку
				ratingValue.innerHTML = index + 1;
				setRatingActiveWidth();
			});
		}
	}
}
if (document.querySelectorAll('.moreinfo-tovar-body-reviews-form__rating')) {
	initRatings();
}