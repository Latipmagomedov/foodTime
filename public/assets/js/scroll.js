// scroll btn
const topScrollBtn = document.querySelector(".top-btn");
const openCartBtn = document.querySelector(".open-cart");

window.addEventListener("scroll", () => {
  if (pageYOffset > 600) {
    topScrollBtn.classList.add("top-btn-active");
    openCartBtn.classList.add("open-cart-active");
  } else {
    topScrollBtn.classList.remove("top-btn-active");
    openCartBtn.classList.remove("open-cart-active");
  }
});

if (window.location.pathname == "/menu") {
  window.addEventListener("scroll", () => {
    if (pageYOffset > 100) {
      topScrollBtn.classList.add("top-btn-active");
      openCartBtn.classList.add("open-cart-active");
    } else {
      topScrollBtn.classList.remove("top-btn-active");
      openCartBtn.classList.remove("open-cart-active");
    }
  });
}
