const swiper = new Swiper(".swiper", {
    lazy: true,
    direction: "horizontal",
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
  
  const swiperRank = new Swiper(".swiperRank", {
    direction: "horizontal",
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next-rank",
      prevEl: ".swiper-button-prev-rank",
    },
  });
  