function adminPreviewImage() {
	let adminFormMedia = document.querySelector(".mrb-admin-form__media");
	let htmlFormMediaBlock = `<div data-draganandgrop-cell class="mrb-admin-form-media__block mrb-admin-form-media-block">
								<div data-draganandgrop-card draggable="true" class="mrb-admin-form-media__content">
									<input accept=".jpg, .png, .jpeg, .webp, .mp4" type="file" name="images[]" multiple class="mrb-admin-form-media-block__input">
									<div class="mrb-admin-form-media-block__preview"></div>
									<div class="mrb-admin-form-media-block__close">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
											<path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" />
										</svg>
									</div>
									<div class="mrb-admin-form-media-block__hello mrb-admin-form-media-block-hello">
										<div class="mrb-admin-form-media-block-hello__icon">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"><path fill-rule="evenodd" d="M30 6l3.66 4H40c2.2 0 4 1.8 4 4v24c0 2.2-1.8 4-4 4H8c-2.2 0-4-1.8-4-4V14c0-2.2 1.8-4 4-4h6.34L18 6h12zm-6 13.6a6.4 6.4 0 1 0 0 12.8 6.4 6.4 0 0 0 0-12.8zM24 36c-5.52 0-10-4.48-10-10s4.48-10 10-10 10 4.48 10 10-4.48 10-10 10z"></path></svg>
										</div>
										<div class="mrb-admin-form-media-block-hello__title">
											Добавьте фото
										</div>
									</div>
									<div class="mrb-admin-form-media-block__buttonlvl">
										Сделать Главным
									</div>
								</div>
							</div>`;

	function createFormPreviewBlock() {
		if (document.querySelectorAll(".mrb-admin-form-media__block").length <= 20) {
			for (let index = 1; index <= 10; index++) {
				adminFormMedia.insertAdjacentHTML("beforeend", htmlFormMediaBlock);
			}
		}
		createFormPreviewBlockBossTitle();
	}

	function createFormPreviewBlockBossTitle() {
		if (!document.querySelectorAll(".mrb-admin-form-media__block .mrb-admin-form-media-block__bosstitle")[0]) {
			document.querySelector(".mrb-admin-form-media__block").insertAdjacentHTML("beforeend", `
				<div class="mrb-admin-form-media-block__bosstitle">Главная</div>
			`);
		}
	}


	function addPreviewImage() {
		for (let blockItem = 0; blockItem < document.querySelectorAll(".mrb-admin-form-media__block").length; blockItem++) {
			const element = document.querySelectorAll(".mrb-admin-form-media__block")[blockItem];
			const formImageInput = element.querySelector(".mrb-admin-form-media-block__input");
			const formImagePreview = element.querySelector(".mrb-admin-form-media-block__preview");
			const formPreviewClose = element.querySelector(".mrb-admin-form-media-block__close");
			formImageInput.addEventListener("change", function () {
				if (!formImageInput.files.length) {
					return false;
				}
				addPreviewImage();
				if (formImageInput.files.length > 1) {
					addimageinput(formImageInput);
				} else {
					uploadFile(formImageInput);
				}
				addPreviewImage();
			});
			formPreviewClose.addEventListener("click", function () {
				formImageInput.value = "";
				formImagePreview.innerHTML = "";
				formImageInput.parentElement.classList.remove("_active");
				clearInputNull();
				if (this.parentElement.parentElement.querySelector(".mrb-admin-form-media-block__bosstitle")) {
					this.parentElement.parentElement.querySelector(".mrb-admin-form-media-block__bosstitle").classList.remove("_active");
				}
			});
		}
	}
	addPreviewImage();

	function addimageinput(valueInput) {
		addPreviewImage();
		if (valueInput.files.length >= inputValueNull() && document.querySelectorAll(".mrb-admin-form-media__block").length < 20) {
			createFormPreviewBlock();
		}
		const inputElement = valueInput;
		const files = valueInput.files;
		const newFiles = [];
		for (let i = 0; i < files.length; i++) {
			newFiles.push(files[i]);
		}
		if (newFiles.length > 0) {
			inputElement.value = "";
			const inputElementValue = document.querySelectorAll(".mrb-admin-form-media-block__input");
			const inputElementValueNull = [];
			for (let item = 0; item < inputElementValue.length; item++) {
				const element = inputElementValue[item];
				if (element.value == "") {
					inputElementValueNull.push(inputElementValue[item]);
				}
			}
			let newFilesLength = newFiles.length;
			if (newFiles.length >= inputElementValueNull.length) {
				newFilesLength = inputElementValueNull.length;
			}
			for (let i = 0; i < newFilesLength; i++) {
				const newFileList = new ClipboardEvent("").clipboardData || new DataTransfer();
				if (newFiles[i]) {
					newFileList.items.add(newFiles[i]);
					inputElementValueNull[i].files = newFileList.files;
					uploadFile(inputElementValueNull[i]);
				}
			}
		} else {
			inputElement.value = null;
		}
		dragAndDrop();
		addPreviewImage();
		addBossBlock();
	}

	function uploadFile(file) {
		if (!file) {
			return false;
		}
		addPreviewImage();
		if (file.files.length >= inputValueNull() && document.querySelectorAll(".mrb-admin-form-media__block").length < 20) {
			createFormPreviewBlock();
		}
		if (!["image/jpeg", "image/png", "image/webp", "video/mp4"].includes(file.files[0].type)) {
			alert("Разрешены толко изображения.");
			file.value = "";
			return false;
		}
		// Проверим размер файла (< 2 mb)
		if (file.files[0].size > 2 * 1024 * 1024) {
			alert("Файл должен быть менее 2 mb, а ваш файл состовляет: " + Math.ceil(file.files[0].size / 1024 / 1024) + "mb");
			file.value = "";
			return false;
		}
		let reader = new FileReader();
		reader.onload = function (e) {
			file.parentElement.querySelector(".mrb-admin-form-media-block__preview").innerHTML = "";
			if (file.files[0].type == "video/mp4") {
				file.parentElement.querySelector(".mrb-admin-form-media-block__preview").innerHTML += `<video autoplay muted src="${e.target.result}"></video>`;
			} else {
				file.parentElement.querySelector(".mrb-admin-form-media-block__preview").innerHTML += `<img src="${e.target.result}" alt="img">`;
			}
			if (file.parentElement.parentElement.querySelector(".mrb-admin-form-media-block__bosstitle")) {
				file.parentElement.parentElement.querySelector(".mrb-admin-form-media-block__bosstitle").classList.add("_active");
			}
			file.parentElement.classList.add("_active");

		};
		reader.readAsDataURL(file.files[0]);
		addPreviewImage();
	}

	function clearInputNull() {
		let arrayFormImageInputNull = [];
		if (document.querySelectorAll(".mrb-admin-form-media__block").length == 20 && inputValueNull() == 11) {
			for (let i = 0; i < document.querySelectorAll(".mrb-admin-form-media-block__input").length; i++) {
				const element = document.querySelectorAll(".mrb-admin-form-media-block__input")[i];
				if (element.value == "") {
					arrayFormImageInputNull.push(element);
				}
			}
		}
		if (arrayFormImageInputNull.length == 11) {
			for (let index = 1; index < arrayFormImageInputNull.length; index++) {
				arrayFormImageInputNull[index].parentElement.parentElement.remove();
			}
		}
	}

	function resetButton() {
		if (document.querySelector("[data-admin-image-button-reset]")) {
			let button = document.querySelector("[data-admin-image-button-reset]");
			button.addEventListener("click", function (e) {
				document.querySelector(".mrb-admin-form__media").innerHTML = "";
				createFormPreviewBlock();
				dragAndDrop();
				addPreviewImage();
				addBossBlock();
			});
		}
	}
	resetButton();

	function inputValueNull() {
		let result = 0;
		for (let index = 0; index < document.querySelectorAll(".mrb-admin-form-media-block__input").length; index++) {
			const element = document.querySelectorAll(".mrb-admin-form-media-block__input")[index];
			if (element.value == "") {
				result++;
			}
		}
		return result;
	}
	function addBossBlock() {
		let buttonlvls = document.querySelectorAll(".mrb-admin-form-media-block__buttonlvl");
		for (let index = 0; index < buttonlvls.length; index++) {
			const buttonlvl = buttonlvls[index];
			buttonlvl.addEventListener("click", function () {
				this.parentElement.parentElement.append(document.querySelector("[data-draganandgrop-cell] [data-draganandgrop-card]"));
				document.querySelector("[data-draganandgrop-cell]").append(this.parentElement);
				if (!document.querySelector("[data-draganandgrop-cell] .mrb-admin-form-media-block__bosstitle._active")) {
					document.querySelector("[data-draganandgrop-cell] .mrb-admin-form-media-block__bosstitle").classList.add("_active");
				}
			});
		}
	}
	addBossBlock();
	let body = document.querySelector('body');

	body.addEventListener('dragenter', (e) => {
		e.preventDefault();
	})
	body.addEventListener('dragleave', (e) => {
		e.preventDefault();
	})
	body.addEventListener('dragover', (e) => {
		e.preventDefault();
	})

	body.addEventListener('drop', (e) => {
		e.preventDefault();
		addimageinput(e.dataTransfer);
	})
}
adminPreviewImage();