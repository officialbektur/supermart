<?php
	$title="Добавить товар";
	require $_SERVER['DOCUMENT_ROOT'] . "/layouts/app-start.php";
?>
<section class="mrb-admin__body">
	<div class="mrb-admin__maxcontainer">
		<div class="mrb-admin__content">
			<h2 class="mrb-admin__title">
				Добавить Товар
			</h2>
			<?php require $_SERVER['DOCUMENT_ROOT'] . "/include/mrb-admin-form/addcategory.php"; ?>
			<form method="post" action="func.php" method="post" class="mrb-admin__form mrb-admin-form" enctype="multipart/form-data">
				<div class="mrb-admin-form__item">
					<?php require $_SERVER['DOCUMENT_ROOT'] . "/include/mrb-admin-form/image.php"; ?>
				</div>
				<div class="mrb-admin-form__item">
					<?php require $_SERVER['DOCUMENT_ROOT'] . "/include/mrb-admin-form/name.php"; ?>
				</div>
				<div class="mrb-admin-form__item">
					<?php require $_SERVER['DOCUMENT_ROOT'] . "/include/mrb-admin-form/category.php"; ?>
				</div>
				<div class="mrb-admin-form__item">
					<?php require $_SERVER['DOCUMENT_ROOT'] . "/include/mrb-admin-form/price.php"; ?>
				</div>
				<div class="mrb-admin-form__item">
					<?php require $_SERVER['DOCUMENT_ROOT'] . "/include/mrb-admin-form/proithvoditely.php"; ?>
				</div>
				<div class="mrb-admin-form__item">
					<?php require $_SERVER['DOCUMENT_ROOT'] . "/include/mrb-admin-form/discount.php"; ?>
				</div>
				<div class="mrb-admin-form__item">
					<?php require $_SERVER['DOCUMENT_ROOT'] . "/include/mrb-admin-form/hit.php"; ?>
				</div>
				<div class="mrb-admin-form__item">
					<?php require $_SERVER['DOCUMENT_ROOT'] . "/include/mrb-admin-form/rec.php"; ?>
				</div>
				<div class="mrb-admin-form__item">
					<?php require $_SERVER['DOCUMENT_ROOT'] . "/include/mrb-admin-form/status.php"; ?>
				</div>
				<div class="mrb-admin-form__item">
					<?php require $_SERVER['DOCUMENT_ROOT'] . "/include/mrb-admin-form/styleTextarea.php"; ?>
				</div>
				<div class="mrb-admin-form__innerbutton">
					<button type="submit" class="mrb-admin-form__button mrb-admin-form-button">
						<span class="mrb-admin-form-button__title">Отправить</span>
						<span class="mrb-admin-form-button__result"></span>
					</button>
				</div>
			</form>
		</div>
	</div>
</section>
<?php
	require $_SERVER['DOCUMENT_ROOT'] . "/layouts/app-end.php";
?>