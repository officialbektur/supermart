<div class="mrb-admin-form__labelinner">
	<label for="price" class="mrb-admin-form__label">
		Цена:
	</label>
	<label for="pricedp" class="mrb-admin-form__label mrb-admin-form__label_dp">
		(+) Добавить прежнюю цену
	</label>
</div>
<input type="checkbox" id="pricedp" name="pricedp" hidden>
<div class="mrb-admin-form__input">
	<input autocomplete="off" type="text" name="price" id="price" placeholder="Цена...">
</div>
<div class="mrb-admin-form__price mrb-admin-form-price">
	<div class="mrb-admin-form-price__warning">
		«<span>Внимание!</span> Если вы закроете данную вкладку, то введеные вами данные не будут добавлены в базу данных!»
	</div>
	<div class="mrb-admin-form-price__old mrb-admin-form-price-old">
		<label for="priceold" class="mrb-admin-form-price-old__label">Прощлая цена:</label>
		<div class="mrb-admin-form-price-old__input">
			<input autocomplete="off" type="text" name="price" id="priceold" placeholder="Прощлая цена...">
		</div>
	</div>
	<div class="mrb-admin-form-price__now mrb-admin-form-price-now">
		<label for="pricenow" class="mrb-admin-form-price-now__label">Новая цена:</label>
		<div class="mrb-admin-form-price-now__input">
			<input autocomplete="off" type="text" name="price" id="pricenow" placeholder="Новая цена...">
		</div>
	</div>
</div>