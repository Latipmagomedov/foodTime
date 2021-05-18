const menuProducts = document.querySelector(".menu__products");
const popupOrder = document.querySelector(".popup-order");

menuProducts.addEventListener("click", (e) => {
    if (e.target.getAttribute("data-popup")) {
        const product = e.target.closest(".menu__product");
        const productImage = product.querySelector(".menu__product-image");
        const productTitle = product.querySelector(".menu__products-title");
        const productCost = product.querySelector(".product-cost");

        popupOrder.querySelector(".popup-order__image").src = productImage.src;
        popupOrder.querySelector(".popup-order__cost").textContent =
            productCost.textContent;
        popupOrder.querySelector(".popup-order__name").textContent =
            productTitle.textContent;
    }
});

let orderForm = document.querySelector(".order-form");

orderForm.addEventListener("submit", orderSend);

function orderSend(e) {
    e.preventDefault();

    let self = e.currentTarget;
    let name = self.querySelector('[name="username"]').value;
    let tel = self.querySelector('[name="tel"]').value;
    let address = self.querySelector('[name="address"]').value;

    let productTitle = document.querySelector(".popup-order__name");
    let productCost = document.querySelector(".popup-order__cost");

    (async () => {
        let response = await fetch("http://food.molitva-time.com/api/application-post", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                name: name,
                tel: tel,
                address: address,
                products: JSON.stringify([`${productTitle.textContent}. Количество: 1`]),
                fullcost: productCost.textContent,
            }),
        });

        if (response.ok) {
            console.log("Отправлено");
            document
                .querySelector(`.popup-active`)
                .classList.remove("popup-active");
            document.body.style.overflow = "visible";

            document.querySelector(".popup-good").classList.add("popup-active");
            document.body.style.overflow = "hidden";
        } else {
            console.log("Ошибка");
            document
                .querySelector(`.popup-active`)
                .classList.remove("popup-active");
            document.body.style.overflow = "visible";

            document.querySelector(".popup-err").classList.add("popup-active");
            document.body.style.overflow = "hidden";
        }
    })();
}
