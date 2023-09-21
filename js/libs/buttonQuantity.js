function buttonQuantity() {
	if (document.querySelector(".product-block-trash__block")) {
		let productBlockTrashBlock = document.querySelectorAll(".product-block-trash__block");
		for (let index = 0; index < productBlockTrashBlock.length; index++) {
			let element = productBlockTrashBlock[index];
			let fixePriceNumber = element.querySelector(".product-block-trash-title-infotext-price__number");
			let priceNumber = element.querySelector(".product-block-trash-price__number");
			let valueInput = element.querySelector("[data-quantity-value]");
			let buttonPlus = element.querySelector("[data-quantity-plus]");
			let buttonMinus = element.querySelector("[data-quantity-minus]");
			valueInput.addEventListener("input", function (e) {
				if (element.querySelector("[data-quantity-max]")) {
					let valueInputMax = Number(element.querySelector("[data-quantity-max]").getAttribute("data-quantity-max"));
					if (valueInput.value > valueInputMax) {
						valueInput.value = valueInputMax;
					}
				}
				if (element.querySelector("[data-quantity-min]")) {
					let valueInputMin = Number(element.querySelector("[data-quantity-min]").getAttribute("data-quantity-min"));
					if (valueInput.value < valueInputMin) {
						valueInput.value = valueInputMin;
					}
				}
				function inputNumber(text) {
					return text.replace(/[^0-9]/ig, '');
				}
				let cleanValue = inputNumber(e.target.value);
				e.target.value = cleanValue;
				priceNumber.innerText = Number(fixePriceNumber.innerText) * valueInput.value;
				name2();
			});
			buttonPlus.addEventListener("click", function (e) {
				valueInput.value++;
				if (element.querySelector("[data-quantity-max]")) {
					let valueInputMax = Number(element.querySelector("[data-quantity-max]").getAttribute("data-quantity-max"));
					if (valueInput.value > valueInputMax) {
						valueInput.value = valueInputMax;
					}
				}
				priceNumber.innerText = Number(fixePriceNumber.innerText) * valueInput.value;
				name2();
			});
			buttonMinus.addEventListener("click", function (e) {
				--valueInput.value;
				if (element.querySelector("[data-quantity-min]")) {
					let valueInputMin = Number(element.querySelector("[data-quantity-min]").getAttribute("data-quantity-min"));
					if (valueInputMin >=0) {
						if (valueInput.value < valueInputMin) {
							valueInput.value = valueInputMin;
						}
					}
				} else if (valueInput.value <= 0) {
					valueInput.value = 0;
				}
				priceNumber.innerText = Number(fixePriceNumber.innerText) * valueInput.value;
				name2();
			});
		}
	}
}
buttonQuantity()