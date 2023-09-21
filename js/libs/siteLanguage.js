function siteLanguage() {
	if (document.querySelector("[data-site-language-menu-button]")) {
		let siteLanguageMenuButton = document.querySelector("[data-site-language-menu-button]");
		siteLanguageMenuButton.addEventListener('click', function (e) {
			siteLanguageMenuButton.parentElement.classList.toggle("_active");
		});
		document.body.addEventListener("click", function (e) {
			if (siteLanguageMenuButton.parentElement.classList.contains("_active") && !e.target.closest("[data-site-language-menu-button]") && !e.target.closest("[data-site-language-menu-title]")) {
				siteLanguageMenuButton.parentElement.classList.remove("_active");
			}
		});
	}
}
siteLanguage();