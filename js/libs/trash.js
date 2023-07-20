function calcProductForTrash() {
	if (document.querySelector(".product-block-trash__block")) {
		let productBlockTrashBlock = document.querySelectorAll(".product-block-trash__block");
		let contentHeaderInfoColNumber = document.querySelector(".content-header-info-col__number");
		contentHeaderInfoColNumber.innerText = productBlockTrashBlock.length;
	}
}
calcProductForTrash();
function calcPriceProductForTrash() {
	if (document.querySelector(".product-block-trash__block")) {
		let productBlockTrashBlock = document.querySelectorAll(".product-block-trash__block");
		let contentHeaderInfoPriceNumber = document.querySelector(".content-header-info-price__number");
		contentHeaderInfoPriceNumber.innerText = "0";
		for (let index = 0; index < productBlockTrashBlock.length; index++) {
			const element = productBlockTrashBlock[index];
			let f = element.querySelector(".product-block-trash-price__number");
			contentHeaderInfoPriceNumber.innerText = Number(contentHeaderInfoPriceNumber.innerText) + Number(f.innerText);
		}
	}
}
calcPriceProductForTrash();