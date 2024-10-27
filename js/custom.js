document.addEventListener("DOMContentLoaded", function () {
  /* Animated Off Canvas Nav Start */
  var openMenuButton = document.getElementById("checkbox1");
  var offCanvasMenu = document.querySelector(".off-canvas-menu");

  function closeMenu() {
    offCanvasMenu.classList.remove("open");
  }

  openMenuButton.checked = false;

  openMenuButton.addEventListener("click", function () {
    offCanvasMenu.classList.toggle("open");
  });

  closeMenu();
  // Select all links within the off-canvas menu
  const menuLinks = offCanvasMenu.querySelectorAll("a");

  // Add event listener to each link to close the menu on click
  menuLinks.forEach(function (link) {
    link.addEventListener("click", function () {
      closeMenu();
      openMenuButton.checked = false; // Uncheck the checkbox to keep the menu closed
    });
  });

  const checkbox = document.getElementById("checkbox1");

  checkbox.addEventListener("change", function () {
    if (checkbox.checked) {
      // document.body.style.overflow = "hidden";
    } else {
      document.body.style.overflow = "auto";
    }
  });
  /* Animated Off Canvas Nav End */

  /* Highlight Button on Load Start */
  const bookBtn = document.querySelector("#bookBtn");

  setTimeout(function () {
    bookBtn.classList.add("highlight-on-load");
  }, 1000);
  /* Highlight Button on Load End */

  /* Appear Navigation and Food & Drink Menus Start */
  const items = document.querySelectorAll(".appear2");

  function active(entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        entry.target.classList.add("inview2");
      } else {
        entry.target.classList.remove("inview2");
      }
    });
  }

  const io2 = new IntersectionObserver(active);

  items.forEach(function (item) {
    io2.observe(item);
  });
  /* Appear Navigation and Food & Drink Menus End */

  /* Parallax Start */
  var images = document.querySelectorAll("img.parallax");
  new simpleParallax(images);
  /* Parallax End */

  /* Menu Items Animation Reset Start */
  function resetMenuAnimation() {
    const items = document.querySelectorAll(".menu-item");
    items.forEach(function (item) {
      item.classList.remove("inview2");
    });
  }

  document.querySelector("#open-menu").addEventListener("click", function () {
    resetMenuAnimation();
  });
  /* Menu Items Animation Reset End */

  /* animate logos End*/
});

// ===========================================================================
// Close event listener
// ===========================================================================

/* Events Loop Side Scroll */
$(document).ready(function () {
  $("#responsive").lightSlider({
    item: 3,
    loop: true,
    slideMove: 1,
    easing: "cubic-bezier(0.25, 0, 0.25, 1)",
    speed: 1000,
    auto: true,
    enableTouch: true,
    pauseOnHover: true,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          item: 2,
          slideMove: 1,
          slideMargin: 6,
        },
      },
      {
        breakpoint: 768,
        settings: {
          item: 1,
          slideMove: 1,
        },
      },
    ],
  });
});
/* Events Loop Side Scroll END */
