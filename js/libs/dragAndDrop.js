/* ===================================  dragAndDrop  --Start--  =================================== */
function dragAndDrop() {
	if (!document.querySelector("[data-draganandgrop]")) {
		return false;
	}
	const draganandgrop = document.querySelector("[data-draganandgrop]");
	const cards = draganandgrop.querySelectorAll("[data-draganandgrop-card]");
	const cells = draganandgrop.querySelectorAll("[data-draganandgrop-cell]");


	let lockdragStart = false;



	if (document.querySelector("[data-draganandgrop-idnodrop]")) {
		let idNodrop = document.querySelector("[data-draganandgrop-idnodrop]").getAttribute("data-draganandgrop-idnodrop");
		for (let index = 0; index < cards.length; index++) {
			const element = cards[index];
			if (index == Number(idNodrop)) {
				element.setAttribute("data-draganandgrop-nodrop", "");
			}
		}
	}


	let card = [];
	function dragStart() {
		if (document.documentElement.classList.contains("_pc")) {
			lockdragStart = true;
			card = this;
			this.parentElement.classList.add("_show");
			setTimeout(function () {
				card.classList.add("_hidden");
			}, 0);
		}
	}

	function dragEnd() {
		if (document.documentElement.classList.contains("_pc")) {
			if (card.parentElement.classList.contains("_show")) {
				card.parentElement.classList.remove("_show");
			}
			this.classList.remove("_hidden");
			lockdragStart = false;
		}
	}

	function dragOver(event) {
		event.preventDefault();
	}

	function dragEnter(event) {
		event.preventDefault();
		if (document.documentElement.classList.contains("_pc") && lockdragStart) {
			if (!this.querySelector("[data-draganandgrop-nodrop]")) {
				this.classList.add("_hovered");
			}
		}
	}

	function dragLeave(event) {
		event.preventDefault();
		if (document.documentElement.classList.contains("_pc") && lockdragStart) {
			this.classList.remove("_hovered");
		}
	}

	function dragDrop(event) {
		event.preventDefault();
		if (document.documentElement.classList.contains("_pc") && lockdragStart) {
			if (!this.querySelector("[data-draganandgrop-nodrop]")) {
				if (document.querySelector("[data-draganandgrop-style]").getAttribute("data-draganandgrop-style") == "0") {
					if (!this.querySelector("[data-draganandgrop-card]")) {
						this.append(card);
					} else {
						lockdragStart = false;
						let cell = this;

						cell.classList.add("_errornull");
						for (let index = 0; index < cards.length; index++) {
							const element = cards[index];
							element.removeAttribute("draggable");
						}
						setTimeout(function () {
							cell.classList.remove("_errornull");

							lockdragStart = true;
							for (let index = 0; index < cards.length; index++) {
								const element = cards[index];
								element.setAttribute("draggable", "true");
							}
						}, 920);
					}
				} else {
					if (!this.querySelector("[data-draganandgrop-card]")) {
						if (card.parentElement) {
							this.append(card);
							if (card.parentElement.classList.contains("_show")) {
								card.parentElement.classList.remove("_show");
							}
						}
					} else {
						if (card.parentElement) {
							if (card.parentElement.classList.contains("_show")) {
								card.parentElement.classList.remove("_show");
							}

							card.parentElement.append(this.querySelector("[data-draganandgrop-card]"));
							this.append(card.parentElement.querySelector("[data-draganandgrop-card]"));
						}
					}
				}
			}
			this.classList.remove("_hovered");
		}
	}
	for (let index = 0; index < cells.length; index++) {
		const element = cells[index];

		element.addEventListener("dragover", dragOver);
		element.addEventListener("dragenter", dragEnter);
		element.addEventListener("dragleave", dragLeave);
		element.addEventListener("drop", dragDrop);
	}

	for (let index = 0; index < cards.length; index++) {
		const element = cards[index];

		if (element.hasAttribute("data-draganandgrop-nodrop")) {
			element.removeAttribute("data-draganandgrop-card");
			element.parentElement.removeAttribute("data-draganandgrop-cell");

			element.removeAttribute("draggable");
		}

		element.addEventListener("dragstart", dragStart);
		element.addEventListener("dragend", dragEnd);
	}
}
dragAndDrop();
/* ===================================  dragAndDrop  --End--  =================================== */