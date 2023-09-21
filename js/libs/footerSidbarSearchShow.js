function footerSidbarSearchShow() {
	if (document.querySelector(".mb-footer-sidbar__search")) {
		let mbFooterSidbarBlock = document.querySelectorAll(".mb-footer-sidbar__block");
		let searchButton = document.querySelector(".mb-footer-sidbar__search");
		let searchInput = document.querySelector(".header-top__search");
		searchButton.addEventListener("click", function (e) {
			searchInput.classList.toggle("_show");
			document.documentElement.classList.toggle("lock");
		});
		for (var i = mbFooterSidbarBlock.length - 1; i >= 0; i--) {
			mbFooterSidbarBlock[i].addEventListener("click", function (e) {
				if (!this.classList.contains("mb-footer-sidbar__search") && searchInput.classList.contains("_show")) {
					e.preventDefault();
					searchInput.classList.remove("_show");
					document.documentElement.classList.remove("lock");
				}
			});
		}
	}
}
footerSidbarSearchShow();