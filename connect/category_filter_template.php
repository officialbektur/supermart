<?
	if (!$category['childs'] && $category['id']):
?>
	<div class="bkt-catygory-menu-main__list bkt-catygory-menu-main-list">
		<button type="button" data-id-catygory="<?php echo $category['id']; ?>" class="bkt-catygory-menu-main-list__button bkt-catygory-menu-main-list-button a-hover-bgc">
			<span class="bkt-catygory-menu-main-list-button__title">
				<?php echo $category['name']; ?>
			</span>
		</button>
	</div>
<?
	endif;
?>
<?
	if ($category['childs'] && $category['id']):
?>
<div class="bkt-catygory-menu-main__sublist bkt-catygory-menu-main-sublist">
	<button type="button" class="bkt-catygory-menu-main-sublist__button bkt-catygory-menu-main-sublist-button a-hover-bgc">
		<span class="bkt-catygory-menu-main-sublist-button__title">
			<?php echo $category['name']; ?>
		</span>
		<span class="bkt-catygory-menu-main-sublist-button__icon">
			<svg viewBox="0 0 384 512" xmlns="http://www.w3.org/2000/svg"><path d="M352 352c-8.188 0-16.38-3.125-22.62-9.375L192 205.3 54.6 342.7c-12.5 12.5-32.75 12.5-45.25 0s-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25-6.2 6.2-14.4 9.3-22.6 9.3z"/></svg>
		</span>
	</button>
	<div class="bkt-catygory-menu-main-sublist__menulist bkt-catygory-menu-main-sublist-menulist">
		<div class="bkt-catygory-menu-main__defaultlist bkt-catygory-menu-main-defaultlist">
			<button type="button" data-id-catygory="<?php echo $category['id']; ?>" class="bkt-catygory-menu-main-defaultlist__button bkt-catygory-menu-main-defaultlist-button a-hover-bgc">
				Всё в категории <span class="bkt-catygory-menu-main-defaultlist-button__categoryname"><?php echo $category['name']; ?></span>
			</button>
		</div>
		<?php echo categories_filter__to_string($category['childs']); ?>
	</div>
</div>
<?
	endif;
?>