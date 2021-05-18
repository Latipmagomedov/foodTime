const addCartBtn = document.querySelectorAll(".menu__product-add-cart");
const cartProductsWrapper = document.querySelector(".cart__products");
const cartPrice = document.querySelector(".cart__price span");
const messageTitle = document.querySelector(".cart__message-title");
const cartBtn = document.querySelector(".cart__btn");
const cartForm = document.querySelector(".cart-form");

let cartProducts;
let productsObject = {
    name: [],
    fullCost: 0,
};

let fullCost = 0;

cartBtn.addEventListener("click", () => {
    productsObject.name = [];
    productsObject.fullCost = 0;
    

    cartProducts.forEach((item) => {
        let productInfo = `${item.title}. Количество: ${item.length}`;
        productsObject.name.push(productInfo);
    });
    productsObject.fullCost = fullCost;

    console.log(productsObject);
});

cartForm.addEventListener("submit", formSend);

function formSend(e) {
    e.preventDefault();

    let self = e.currentTarget;
    let name = self.querySelector('[name="username"]').value;
    let tel = self.querySelector('[name="tel"]').value;
    let address = self.querySelector('[name="address"]').value;

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
                products: JSON.stringify(productsObject.name),
                fullcost: JSON.stringify(productsObject.fullCost),
            }),
        });

        if (response.ok) {
            document
                .querySelector(`.popup-active`)
                .classList.remove("popup-active");
            document.body.style.overflow = "visible";

            document.querySelector(".popup-good").classList.add("popup-active");
            document.body.style.overflow = "hidden";
        } else {
            document
                .querySelector(`.popup-active`)
                .classList.remove("popup-active");
            document.body.style.overflow = "visible";

            document.querySelector(".popup-err").classList.add("popup-active");
            document.body.style.overflow = "hidden";
        }

        productsObject.name = [];
        productsObject.fullCost = 0;
        console.log(productsObject);
    })();
}

const calculator = () => {
    fullCost = 0;
    cartProducts.forEach((item, index) => {
        fullCost += item.cost * item.length;
    });
    cartPrice.textContent = fullCost;
};

const ifMessage = () => {
    if (!cartProducts.length) {
        messageTitle.classList.add("cart__message-title_active");
    } else {
        messageTitle.classList.remove("cart__message-title_active");
    }
};

const removeCartProduct = (index) => {
    cartProducts.splice(index, 1);
    addHtmlTemplate();
    addLocalStorage();
    ifMessage();
    calculator();
};

let incProductI = 1;

const incProduct = (index) => {
    incProductI = cartProducts[index].length;
    incProductI++;
    document.querySelectorAll(".cart__product-add-length")[index].textContent =
        incProductI;
    cartProducts[index].length = incProductI;
    calculator();
    addLocalStorage();
};

const decProduct = (index) => {
    incProductI = cartProducts[index].length;
    incProductI--;
    if (incProductI < 1) {
        incProductI = 1;
    }
    document.querySelectorAll(".cart__product-add-length")[index].textContent =
        incProductI;
    cartProducts[index].length = incProductI;
    calculator();
    addLocalStorage();
};

const addHtmlTemplate = () => {
    cartProductsWrapper.innerHTML = "";
    cartProducts.forEach((item, index) => {
        cartProductsWrapper.innerHTML += `
      <div class="cart__product">
        <div class="cart__product-left">
          <img
            class="cart__product-image"
            src="${item.image}"
            alt="Food time"
          />
          <div class="cart__product-left-info">
            <div class="cart__product-title">${item.title}</div>
            <div class="cart__product-price"><span>${item.cost}</span> ₽</div>
          </div>
        </div>

        <div class="cart__product-right">
          <div class="cart__product-add">
            <div class="cart__product-add-length">${item.length}</div>
            <div class="cart__product-add-btns">
              <button class="cart__product-add-dec" onclick="decProduct(${index})">-</button>
              <button class="cart__product-add-inc" onclick="incProduct(${index})">+</button>
            </div>
            <button class="cart__product-remove" onclick="removeCartProduct(${index})">+</button>
          </div>
        </div>
      </div>
    `;
    });
};

const addLocalStorage = () => {
    localStorage.setItem("products", JSON.stringify(cartProducts));
};

if (!localStorage.products) {
    cartProducts = [];
    ifMessage();
} else {
    cartProducts = JSON.parse(localStorage.getItem("products"));
    addHtmlTemplate();
    ifMessage();
    calculator();
}

addCartBtn.forEach((item) => {
    item.addEventListener("click", () => {
        let product = item.closest(".menu__product");
        let title = product.querySelector(".menu__products-title");
        let image = product.querySelector(".menu__product-image");
        let cost = product.querySelector(".menu__product-cost span");

        let cartProduct = {
            title: title.textContent,
            image: image.src,
            cost: Number(cost.textContent),
            length: 1,
        };

        cartProducts.push(cartProduct);
        addHtmlTemplate();
        addLocalStorage();
        ifMessage();
        calculator();
    });
});
