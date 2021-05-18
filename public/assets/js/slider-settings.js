let swiper = new Swiper(".swiper-container", {
  slidesPerView: 3,
  spaceBetween: 20,
  freeMode: true,
  breakpoints: {
    0: {
      slidesPerView: 2.5,
      spaceBetween: 10,
    },

    520: {
      slidesPerView: 3.5,
      spaceBetween: 10,
    },

    700: {
      slidesPerView: 4.5,
      spaceBetween: 15,
    },

    980: {
      slidesPerView: 5.5,
      spaceBetween: 20,
    },
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
