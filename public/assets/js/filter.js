(() => {
  const menuNav = document.querySelector(".swiper-wrapper");

  menuNav.addEventListener("click", (e) => {
    const target = e.target;
    if (target.getAttribute("data-filter")) {
      let filterBtn = document.querySelector(
        `[data-filter="${target.getAttribute("data-filter")}"]`
      );
      let filterAllBtn = document.querySelectorAll(`[data-filter]`);

      filterAllBtn.forEach((item) => {
        item.classList.remove("menu__category_active");
      });
      filterBtn.classList.add("menu__category_active");

      let products = document.querySelectorAll("[data-category]");
      let productsCategory = document.querySelectorAll(
        `[data-category="${target.getAttribute("data-filter")}"]`
      );

      products.forEach((item) => {
        item.style.display = "none";
      });

      productsCategory.forEach((item) => {
        item.style.display = "block";
      });

      if (target.getAttribute("data-filter") == "all") {
        products.forEach((item) => {
          item.style.display = "block";
        });
      }
    }
  });
})();
