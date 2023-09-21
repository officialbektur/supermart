function popupLogin(popupShow = 0, message = '', status = 1, time = 0, redirect = '') {
	let popups = document.querySelector(".popup");
	let contentTitle = popups.querySelector(".popup-content__title");
	let contentClose = popups.querySelector(".popup-content__close");

	let timer = time;

	if (time > 0 || time != '') {
		timer = time;
	} else if (popups.querySelector('[data-timer-secund]')) {
		timer = popups.querySelector('[data-timer-secund]').getAttribute('data-timer-secund');
		timer = timer * 1000;
	} else {
		timer = 12000;
	}

	let mintimer = 2000;

	let SclearTimeout = '';


	if (popupShow == 1) {
		popups.classList.add('_show');
	} else if (popupShow == -1) {
		popups.classList.remove('_show');
	} else if (popupShow == 2 && message.length > 0) {
		setTimeout(() => {
			popups.classList.remove('_show');
			popups.classList.add('_showContent');

			timerButton.start(timer / 1000);

			let templateText = '';
			message.forEach(text => {
				if (status == 0) {
					templateText += '<div class="error">' + text + '</div>';
				} else {
					templateText += '<div>' + text + '</div>';
				}
			});

			contentTitle.innerHTML = '';
			contentTitle.innerHTML += templateText;

			SclearTimeout = setTimeout(() => {
				popups.classList.remove('_showContent');
			}, timer);
		}, mintimer);
	} else if (popupShow == -2) {
		popups.classList.remove('_show');
		popups.classList.remove('_showContent');
	} else if (popupShow == 3) {
		popups.classList.add('_exit');
	} else if (popupShow == -3) {
		popups.classList.remove('_exit');
	} else if (popupShow == 4 && message.length > 0 && redirect.length > 0) {
		setTimeout(() => {
			popups.classList.remove('_show');
			popups.classList.add('_showContent');

			timerButton.start(timer / 1000);

			let templateText = '';
			message.forEach(text => {
				if (status == 0) {
					templateText += '<div class="error">' + text + '</div>';
				} else {
					templateText += '<div>' + text + '</div>';
				}
			});

			contentTitle.innerHTML = '';
			contentTitle.innerHTML += templateText;

			SclearTimeout = setTimeout(() => {
				window.location.href = redirect;
			}, timer);
		}, 0);
	} else if (popupShow == -4) {
		popups.classList.remove('_show');
		popups.classList.remove('_showContent');
	} else if (popupShow == 5 && message.length > 0 && redirect.length > 0) {
		setTimeout(() => {
			popups.classList.remove('_show');
			popups.classList.add('_showContent');

			timerButton.start(timer / 1000);

			let templateText = '';
			message.forEach(text => {
				if (status == 0) {
					templateText += '<div class="error">' + text + '</div>';
				} else {
					templateText += '<div>' + text + '</div>';
				}
			});

			contentTitle.innerHTML = '';
			contentTitle.innerHTML += templateText;

			SclearTimeout = setTimeout(() => {
				window.location.href = redirect;
			}, timer);
		}, mintimer);
	} else if (popupShow == -5) {
		popups.classList.remove('_show');
		popups.classList.remove('_showContent');
	}
	const timerButton = {
		id: null,
		number: popups.querySelector(".popup-content-close__time"),
		params: 0,
		start(params) {
			this.params = params;
			this.countDown();
		},
		countDown() {
			if (this.params > 0) {
				this.number.innerText = this.params--;
				this.id = setTimeout(() => this.countDown(), 1000);
			} else {
				this.number.innerText = "0";
			}
		},
		stop() {
			clearTimeout(this.id);
		},
		reset() {
			this.stop();
			this.params = 0;
			this.number.innerText = "0";
		}
	};

	contentClose.addEventListener("click", function () {
		if (popupShow == 4) {
			clearTimeout(SclearTimeout);
			timerButton.reset();
			window.location.href = redirect;
			return;
		}
		if (popupShow == 5) {
			clearCacheAuth();
		}
		popupLogin('-' + popupShow);
		clearTimeout(SclearTimeout);
		timerButton.reset();
	});
}

function functionLoginInput() {
	if (!document.querySelector(".mrb-admin-login-form-users__button")) {
		return;
	}

	let loginUsersButton = document.querySelector(".mrb-admin-login-form-users__button");
	let loginUsersClear= document.querySelector(".mrb-admin-login-form-users-button__clear");
	let loginLists = document.querySelectorAll(".mrb-admin-login-form-users-menu-main__button");
	let loginInput = document.querySelector(".mrb-admin-login-form-users-button__input");
	let usersMenu = document.querySelector(".mrb-admin-login-form-users__menu");

	usersMenu.addEventListener("click", function (e) {
		if (e.target.closest(".mrb-admin-login-form-users-menu-header__back") || e.target.closest(".mrb-admin-login-form-users-menu-header-close")) {
			usersAddActive();
		}
		if (!e.target.closest(".mrb-admin-login-form-users-menu-main__button") && !e.target.closest(".mrb-admin-login-form-users-menu-main__null") && !e.target.closest(".mrb-admin-login-form-users-menu__header")) {
			usersAddActive();
		}
	});

	loginUsersButton.addEventListener("click", function (e) {
		if (!e.target.closest(".mrb-admin-login-form-users-button__clear")) {
			usersAddActive();
		}
	});

	function usersAddActive() {
		if (document.querySelector(".mrb-admin-login-form-users._active")) {
			document.querySelector(".mrb-admin-login-form-users").classList.remove("_active");
			bodyUnlock();
		} else {
			document.querySelector(".mrb-admin-login-form-users").classList.add("_active");
			bodyLock();
		}
	}

	for (let index = 0; index < loginLists.length; index++) {
		const loginList = loginLists[index];
		loginList.addEventListener("click", function () {
			removeClassActive();
			this.classList.add("_active");
			loginInput.value = this.innerText;
			changeInputLog();
			usersAddActive();
		});
	}

	loginInput.addEventListener("input", changeInputLog);

	function changeInputLog() {
		if (loginInput.value.length > 0) {
			loginUsersButton.classList.add("_active");
		} else {
			loginUsersButton.classList.remove("_active");
		}
	}

	loginUsersClear.addEventListener("click", function () {
		loginInput.value = "";
		removeClassActive();
		changeInputLog();
	});

	function removeClassActive() {
		for (let index = 0; index < document.querySelectorAll(".mrb-admin-login-form-users-menu-main__button._active").length; index++) {
			const item = document.querySelectorAll(".mrb-admin-login-form-users-menu-main__button._active")[index];
			item.classList.remove("_active");
		}
	}
}
functionLoginInput();

function functionPasswordPreview() {
	if (!document.querySelector(".mrb-admin-login-form-password__input")) {
		return;
	}
	let passwordInput = document.querySelector(".mrb-admin-login-form-password__input");
	let passwordButtonPreview = document.querySelector(".mrb-admin-login-form-password__preview");
	passwordButtonPreview.addEventListener("click", function () {
		if (passwordInput.type == "password") {
			passwordInput.type = "text";
			passwordButtonPreview.classList.add("_show");
		} else {
			passwordInput.type = "password";
			passwordButtonPreview.classList.remove("_show");
		}
	});
}
functionPasswordPreview();
function formAuth() {
	if (!document.querySelector('.mrb-admin-login__form')) {
		return;
	}
	let form = document.querySelector(".mrb-admin-login__form");

	let login = form.querySelector(".mrb-admin-login-form-users-button__input");
	let password = form.querySelector(".mrb-admin-login-form-password__input");

	form.addEventListener("submit", formSend);

	async function formSend(e) {
		e.preventDefault();

		toggleClassErrorParent(login, 0);
		toggleClassErrorParent(password, 0);

		if (!login.value.length > 0 || !password.value.length > 0) {
			if (!login.value.length > 0) {
				toggleClassErrorParent(login);
			}
			if (!password.value.length > 0) {
				toggleClassErrorParent(password);
			}
			return;
		}

		popupLogin(1);

		try {
			let formData = new FormData();

			formData.append("login", login.value);
			formData.append("password", password.value);
			let response = await fetch('../vendor/auth.php', {
				method: "POST",
				body: formData
			});

			if (response.ok) {
				let result = await response.json();
				if (result.status == true) {
					popupLogin(5, ["Добро пожаловать!"], 1, 0, '/feedback.php');
				} else {
					popupLogin(2, ["Введен неверный пароль"], 0);
				}
			} else {
				popupLogin(2, ["Ошибка!"], 0);
			}
		} catch (error) {
			popupLogin(2, [`Ошибка!`], 0);
		}
	}
	function toggleClassErrorParent(element, comand = 1) {
		let calcElementUp = 0;
		let maxlementUp = 10;
		while (element) {
			if (element.classList.contains("mrb-admin-login-form__block")) {
				if (comand == 1) {
					element.classList.add("_error");
				} else {
					element.classList.remove("_error");
				}
				break;
			}
			if (calcElementUp >= maxlementUp) {
				break;
			}
			element = element.parentElement;
			++calcElementUp;
		}
	}
}
formAuth();

function buttonExit() {
	if (!document.querySelector(".button-back")) {
		return;
	}
	let buttonBack = document.querySelector(".button-back");
	let buttonExitYes = document.querySelector(".popupLogin-exit__button-yes");
	let buttonExitNo = document.querySelector(".popupLogin-exit__button-no");
	buttonBack.addEventListener("click", function () {
		popupLogin(3);
	});
	buttonExitNo.addEventListener("click", function () {
		popupLogin(-3);
	});
	buttonExitYes.addEventListener("click", async function () {
		clearCacheAuth();
		popupLogin(4, ["Спасибо за посещение! Желаем вам хорошего дня. До свидания!"], 0, 3000, '/');
	});
}
buttonExit();
async function clearCacheAuth() {
	let formData = new FormData();
	formData.append("exit", 'Yes');

	let response = await fetch('../vendor/exit.php', {
		method: "POST",
		body: formData
	});
}