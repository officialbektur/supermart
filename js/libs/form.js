if (document.querySelector('.mrb-admin__form')) {
	let form = document.querySelector(".mrb-admin__form");
	let formBtn = document.querySelector(".mrb-admin-form__button");
	form.addEventListener("submit", formSend);
	async function formSend(e) {
		e.preventDefault();
		let formData = new FormData();
		formData.append("title", document.querySelector(".bkt-addcatygory .bkt-addcatygory-addform__input").value);
		let response = await fetch('/api/create/tovar', {
			method: "POST",
			body: formData
		});

		if (response.ok) {
			let result = await response.json();
			document.querySelector(".bkt-addcatygory__title span").innerText = result.message;
		} else {
			document.querySelector(".bkt-addcatygory__title span").innerText = "Не смогли добавитьлено!";
		}
		formBtn.classList.add("_loading");
		setTimeout(function () {
			formBtn.classList.remove("_loading");
			formBtn.classList.add("_sending");
			formBtn.classList.add("_error");
			setTimeout(function () {
				formBtn.classList.remove("_sending");
				formBtn.classList.remove("_error");
			}, 2220);
		}, 2220);
	}
}