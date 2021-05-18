// Menu
const openMenu = document.querySelector(".menu-icon");
const menu = document.querySelector(".header__nav");

openMenu.addEventListener("click", () => {
  openMenu.classList.toggle("menu-icon-active");
  menu.classList.toggle("header__nav_active");
});

// preloader
const preloader = document.querySelector(".preloader");
document.body.style.overflow = "hidden";

window.onload = () => {
  setTimeout(() => {
    preloader.style.display = "none";
    document.body.style.overflow = "visible";
  }, 1000);
};
