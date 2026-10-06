// Header Fix
$(window).scroll(function () {
  if ($(this).scrollTop() > 50) {
    $(".headermain").addClass("header-fixed");
  } else {
    $(".headermain").removeClass("header-fixed");
  }
});

// arrow appear and scroll to top
$(window).on("scroll", function () {
  if ($(this).scrollTop() > 500) {
    $(".scroll-top-arrow").fadeIn("slow");
  } else {
    $(".scroll-top-arrow").fadeOut("slow");
  }
});
$(document).on("click", ".scroll-top-arrow", function () {
  $("html, body").animate({ scrollTop: 0 }, 800);

  return false;
});

// Toggle hide/show
$(document).ready(function () {
  $(".toggleButton").click(function () {
    $(".custom-nav").toggleClass("menu-open");
  });
});

// Our Facilities Swiper
new Swiper(".ourFacilitiesSwiper", {
  slidesPerView: 1,
  spaceBetween: 0,
  loop: true,
  // autoplay: {
  //   delay: 4000,
  //   disableOnInteraction: false,
  // },
  pagination: {
    el: ".ourFacilitiesSwiper .swiper-pagination",
    clickable: true,
  },
});

// Students Say Swiper
document.addEventListener("DOMContentLoaded", function () {
  const studentsSaySwiper = new Swiper(".studentsSaySwiper", {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    navigation: {
      nextEl: ".students-say-next",
      prevEl: ".students-say-prev",
    },
  });
});
