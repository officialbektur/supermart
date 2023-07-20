<?
	if (!$category['childs']):
?>
	<a href="categories.php?category=<?=$category['id'];?>" class="header-footer-menu__list a-hover-bgc"><?=$category['name'];?></a>
<?
	endif;
?>
<?
	if ($category['childs']):
?>
<div class="header-footer-menu__sublist header-footer-menu-sublist">
	<div class="header-footer-menu-sublist__button header-footer-menu-sublist-button a-hover-bgc">
		<a href="categories.php?category=<?=$category['id'];?>" class="header-footer-menu-sublist-button__title">
			<?php echo $category['name'];?>
		</a>
		<span class="header-footer-menu-sublist-button__icon">
			<svg viewBox="0 0 384 512" xmlns="http://www.w3.org/2000/svg"><path d="M352 352c-8.188 0-16.38-3.125-22.62-9.375L192 205.3 54.6 342.7c-12.5 12.5-32.75 12.5-45.25 0s-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25-6.2 6.2-14.4 9.3-22.6 9.3z"/></svg>
		</span>
	</div>
	<div class="header-footer-menu-sublist__menulist header-footer-menu-sublist-menulist">
		<div class="header-footer-menu-sublist-menulist__content">
			<?php echo categories_to_string($category['childs']);?>
		</div>
	</div>
</div>
<?
	endif;
?>