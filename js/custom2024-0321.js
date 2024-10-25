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
  /* Menu Tabs */

  /* Menu Tabs End*/
});

// ===========================================================================
// Close event listener
// ===========================================================================
