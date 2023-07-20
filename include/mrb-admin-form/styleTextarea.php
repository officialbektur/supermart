<label class="mrb-admin-form__label">

</label>
<div class="mrb-admin-form__labelinner">
	<label class="mrb-admin-form__label">
		Подробная информация:
	</label>
	<label for="twoblock" class="mrb-admin-form__label mrb-admin-form__label_dp">
		выбрать другую форму
	</label>
</div>
<input type="checkbox" id="twoblock" name="twoblock" hidden>
<div class="mrb-admin-form__firstblock">
	<textarea name="messageDec" id="textareapart1" hidden placeholder="Описание"></textarea>
	<div class="container">
		<div class="options">
			<button type="button" id="bold" class="option-button format">
				<?php include "../icons/bold.php" ?>
			</button>
			<button type="button" id="italic" class="option-button format">
				<?php include "../icons/italic.php" ?>
			</button>
			<button type="button" id="underline" class="option-button format">
				<?php include "../icons/underline.php" ?>
			</button>
			<button type="button" id="strikethrough" class="option-button format">
				<?php include "../icons/strikethrough.php" ?>
			</button>
			<button type="button" id="superscript" class="option-button script">
				<?php include "../icons/superscript.php" ?>
			</button>
			<button type="button" id="subscript" class="option-button script">
				<?php include "../icons/subscript.php" ?>
			</button>
			<button type="button" id="insertOrderedList" class="option-button">
				<?php include "../icons/listol.php" ?>
			</button>
			<button type="button" id="insertUnorderedList" class="option-button">
				<?php include "../icons/listul.php" ?>
			</button>
			<button type="button" id="undo" class="option-button">
				<?php include "../icons/undo.php" ?>
			</button>
			<button type="button" id="redo" class="option-button">
				<?php include "../icons/redo.php" ?>
			</button>
			<button type="button" id="createLink" class="adv-option-button">
				<?php include "../icons/createLink.php" ?>
			</button>
			<button type="button" id="unlink" class="option-button">
				<?php include "../icons/unlink.php" ?>
			</button>
			<button type="button" id="justifyLeft" class="option-button align">
				<?php include "../icons/left.php" ?>
			</button>
			<button type="button" id="justifyCenter" class="option-button align">
				<i class="fa-solid fa-align-center"></i>
				<?php include "../icons/center.php" ?>
			</button>
			<button type="button" id="justifyRight" class="option-button align">
				<i class="fa-solid fa-align-right"></i>
				<?php include "../icons/right.php" ?>
			</button>
			<button type="button" id="justifyFull" class="option-button align">
				<?php include "../icons/justify.php" ?>
			</button>
			<button type="button" id="indent" class="option-button spacing">
				<?php include "../icons/indent.php" ?>
			</button>
			<button type="button" id="outdent" class="option-button spacing">
				<?php include "../icons/outdent.php" ?>
			</button>
			<select id="formatBlock" class="adv-option-button">
				<option value="H1">H1</option>
				<option value="H2">H2</option>
				<option value="H3">H3</option>
				<option value="H4">H4</option>
				<option value="H5">H5</option>
				<option value="H6">H6</option>
			</select>
			<select id="fontName" class="adv-option-button"></select>
			<select id="fontSize" class="adv-option-button"></select>
			<div class="input-wrapper">
				<input type="color" id="foreColor" class="adv-option-button" />
				<label style="color: black;" for="foreColor">Font Color</label>
			</div>
			<div class="input-wrapper">
				<input type="color" id="backColor" class="adv-option-button" />
				<label style="color: black;" for="backColor">Highlight Color</label>
			</div>
		</div>
		<div id="text-input" contenteditable="true"></div>
	</div>
</div>
<div class="mrb-admin-form__twoblock">
	<div class="mrb-admin-form-price__warning">
		«<span>Внимание!</span> Если вы закроете данную вкладку, то введеные вами данные не будут добавлены в базу данных!»
	</div>
	<textarea name="messageDec" id="textareapart2" hidden></textarea>
</div>