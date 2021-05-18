document.body.addEventListener("click", (e) => {
  if (e.target.getAttribute("data-tab")) {
    let id = e.target.getAttribute("data-tab");
    let allElements = document.querySelectorAll(`.tab-active`);
    allElements.forEach((item) => {
      item.classList.remove("tab-active");
    });
    document.querySelector(`#${id}`).classList.add("tab-active");
  }
});
