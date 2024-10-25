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

  /* Parallax Start */
  var images = document.querySelectorAll("img.parallax");
  new simpleParallax(images);
  /* Parallax End */

  /* Scroll Effect Start */
  const fadeVideo = document.getElementById("myVideoLg");
  const fadeMessage = document.getElementById("keyMessage");
  const fadeImage = document.getElementById("pageHeadImg");

  window.addEventListener("scroll", () => {
    const scrollPosition = window.scrollY;
    const newOpacity = 1.2 - scrollPosition / 800;
    const newOpacity2 = 1 - scrollPosition / 600;

    if (fadeVideo) {
      fadeVideo.style.opacity = newOpacity;
    }

    if (fadeMessage) {
      fadeMessage.style.opacity = newOpacity2;
    }

    if (fadeImage) {
      if (scrollPosition > 0) {
        fadeImage.style.opacity = 0;
        fadeImage.style.transform = "translateY(-50px)";
        fadeImage.style.transition =
          "opacity 0.5s ease-out, transform 0.5s ease-out";
      } else {
        fadeImage.style.opacity = 1;
        fadeImage.style.transform = "translateY(0)";
        fadeImage.style.transition =
          "opacity 0.5s ease-in, transform 0.5s ease-in";
      }
    }
  });
  /* Scroll Effect End */

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

  /* animate logos*/
  const logos = [];
  const pageHeight = document.body.scrollHeight;

  function addLogos() {
    const numberOfLogos = Math.max(3, Math.floor(pageHeight / 1000)); // Adjust based on desired density

    for (let i = 0; i < numberOfLogos; i++) {
      const logo = document.createElement("img");
      logo.setAttribute(
        "src",
        "http://localhost:8888/KingsArms_2/wp-content/themes/KingsArms_2/assets/logos/logo-icon.svg"
      );
      logo.classList.add("logo-background");

      // Adjust size
      logo.style.maxWidth = `${Math.random() * 40 + 10}%`; // Now up to twice as large

      // Adjust initial position
      logo.style.position = "absolute";
      logo.style.top = `${Math.random() * (pageHeight - 100) + 50}px`;
      logo.style.left = `${
        Math.random() > 0.5 ? Math.random() * 25 : 75 + Math.random() * 25
      }%`;

      document.body.appendChild(logo);
      logos.push({ element: logo, speed: Math.random() * 4 - 2 }); // Speed and direction
    }
  }

  function rotateLogosOnScroll() {
    const scrollPercentage = window.scrollY / (pageHeight - window.innerHeight);
    logos.forEach((logo) => {
      const rotationDegree = scrollPercentage * 360 * logo.speed;
      logo.element.style.transform = `rotate(${rotationDegree}deg)`;
    });
  }

  window.addEventListener("scroll", rotateLogosOnScroll);

  addLogos();

  /* animate logos End*/
});
