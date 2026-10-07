// Header Fix
$(window).scroll(function () {
  if ($(this).scrollTop() > 1) {
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
    $(".toggleButton").toggleClass("toggle-open");
  });

  // Mobile menu link click: only close menu for leaf links. Submenus open only via the dropdown icon.
  $(document).on("click", ".custom-nav .menu-item > a", function (e) {
    // Only apply on mobile (< 1200px)
    if ($(window).width() < 1200) {
      var $menuItem = $(this).closest(".menu-item");
      var $subMenu = $menuItem.find("> .sub-menu, .sub-menu").first();

      // If this menu item has no submenu, close the main menu after click (normal navigation)
      if ($subMenu.length === 0) {
        $(".custom-nav").removeClass("menu-open");
        $(".toggleButton").removeClass("toggle-open");
      }
      // If it has a submenu, do nothing here: submenu will be controlled by .dropdown-toggle-icon only
    }
  });

  // Click on the visual dropdown toggle icon (if present)
  $(document).on(
    "click",
    ".custom-nav .menu-item .dropdown-toggle-icon",
    function (e) {
      if ($(window).width() < 1200) {
        e.preventDefault();
        e.stopPropagation();
        var $menuItem = $(this).closest(".menu-item");

        // Close other open submenus and reset aria
        $(".custom-nav .menu-item")
          .not($menuItem)
          .removeClass("submenu-open")
          .find("> a")
          .attr("aria-expanded", "false");

        // Toggle current submenu and update aria
        $menuItem.toggleClass("submenu-open");
        var expanded = $menuItem.hasClass("submenu-open");
        $menuItem.find("> a").attr("aria-expanded", expanded);
        return false;
      }
    },
  );

  // Close submenus when clicking outside or when toggling main menu off
  $(document).on("click", function (e) {
    if (
      !$(e.target).closest(".custom-nav").length &&
      !$(e.target).closest(".toggleButton").length
    ) {
      $(".custom-nav .menu-item")
        .removeClass("submenu-open")
        .find("> a")
        .attr("aria-expanded", "false");
    }
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
