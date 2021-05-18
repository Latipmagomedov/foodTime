let orderWrapper = document.querySelector(".orders__content");
let orders;

const realTimeResponse = () => {
    fetch("http://food.molitva-time.com/api/application-get")
        .then((response) => response.json())
        .then((res) => {
            orders = "";
            orders = res;
        })
        .then(addOrders);

    function addOrders() {
        if (orders) {
            orderWrapper.innerHTML = "";
            orders.orders.forEach((item, index) => {
                orderWrapper.innerHTML += `
                    <div class="orders__order">
                        <div class="orders__header">
                            <div class="orders__left">
                                ${item.name} - <a href="tel:+${item.tel}">${item.tel}</a>
                            </div>
                            <div class="orders__right">
                                <p class="orders__date">${item.created_at}</p>
                                <div class="orders__cost">Итоговая сумма: <span>${item.fullcost}</span></div>
                                <a href="/admin-order-remove/${item.id}" class="orders__btn">Звершить</a>
                            </div>
                        </div>
                        <div class="orders__address">Адрес: <span>${item.address}</span></div>
                        <ul class="orders__footer"></ul>
                    </div>
                `;
                let orderProductsWrapper =
                    document.querySelectorAll(".orders__footer");

                JSON.parse(item.products).forEach((item) => {
                    orderProductsWrapper[index].innerHTML += `
                      <li>
                          <p>${item}</p>
                      </li>
                    `;
                });
            });
        }
    }
};
realTimeResponse();
setInterval(() => {
    realTimeResponse();
}, 7000);
