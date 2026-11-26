
// Animation

document.addEventListener("DOMContentLoaded", function () {

    const elements = document.querySelectorAll(".curtainLeft");

    if (!elements.length) return;

    const observer = new IntersectionObserver(
        function (entries) {

            entries.forEach(function (entry) {

                if (entry.isIntersecting) {

                    entry.target.classList.add("in-view");

                    // Run only once
                    observer.unobserve(entry.target);
                }

            });

        },
        {
            threshold: 0.1
        }
    );

    elements.forEach(function (element) {
        observer.observe(element);
    });

});

document.addEventListener("DOMContentLoaded", function () {

    const elements = document.querySelectorAll(".curtainLeft");

    if (!elements.length) return;

    elements.forEach(function (element) {

        // Small delay so browser can render initial state
        setTimeout(function () {
            element.classList.add("in-view");
        }, 200);

    });

});

document.addEventListener("DOMContentLoaded", function () {

    const elements = document.querySelectorAll(
        ".reveal-up, .reveal-down, .reveal-left, .reveal-right, .reveal-scale, .curtainLeft"
    );

    function checkAnimation() {

        elements.forEach(function (element) {

            const rect = element.getBoundingClientRect();

            const windowHeight =
                window.innerHeight ||
                document.documentElement.clientHeight;

            if (rect.top < windowHeight * 0.85 && rect.bottom > 0) {
                element.classList.add("is-visible");
            }

        });

    }

    window.addEventListener("scroll", checkAnimation);
    window.addEventListener("resize", checkAnimation);

    // Check on page load
    checkAnimation();

});
document.addEventListener("DOMContentLoaded", function () {

    const cards = document.querySelectorAll(".founder-card.reveal-up");

    const observer = new IntersectionObserver(
        (entries, observer) => {

            entries.forEach((entry) => {

                if (entry.isIntersecting) {

                    entry.target.classList.add("active");

                    observer.unobserve(entry.target);
                }

            });

        },
        {
            threshold: 0.15
        }
    );

    cards.forEach((card) => {
        observer.observe(card);
    });

});
// Animation
// sticky-header
document.addEventListener("DOMContentLoaded", function () {

    const header = document.querySelector(".site-header");

    function handleScroll() {
        if (window.scrollY > 50) {
            header.classList.add("scrolled");
        } else {
            header.classList.remove("scrolled");
        }
    }

    window.addEventListener("scroll", handleScroll);

    handleScroll();

});

document.addEventListener("DOMContentLoaded", function () {

    /* =====================================================
       ELEMENTS
    ===================================================== */

    const header = document.querySelector(".site-header");

    const menuToggle = document.querySelector(".side-menu-toggle");

    const menuClose = document.querySelector(".side-menu-close");

    const menuOverlay = document.querySelector(".side-menu-overlay");

    const menuLinks = document.querySelectorAll(".side-menu-link");


    /* =====================================================
       CHECK ELEMENTS
    ===================================================== */

    if (!header || !menuToggle) {
        return;
    }


    /* =====================================================
       OPEN SIDE MENU
    ===================================================== */

    function openSideMenu() {

        header.classList.add("side-menu-open");

        menuToggle.setAttribute(
            "aria-expanded",
            "true"
        );

        document.body.style.overflow = "hidden";

    }


    /* =====================================================
       CLOSE SIDE MENU
    ===================================================== */

    function closeSideMenu() {

        header.classList.remove("side-menu-open");

        menuToggle.setAttribute(
            "aria-expanded",
            "false"
        );

        document.body.style.overflow = "";

    }


    /* =====================================================
       TOGGLE SIDE MENU
    ===================================================== */

    menuToggle.addEventListener("click", function () {

        const isOpen =
            header.classList.contains("side-menu-open");

        if (isOpen) {

            closeSideMenu();

        } else {

            openSideMenu();

        }

    });


    /* =====================================================
       CLOSE BUTTON
    ===================================================== */

    if (menuClose) {

        menuClose.addEventListener(
            "click",
            function () {

                closeSideMenu();

            }
        );

    }


    /* =====================================================
       OVERLAY CLICK
    ===================================================== */

    if (menuOverlay) {

        menuOverlay.addEventListener(
            "click",
            function () {

                closeSideMenu();

            }
        );

    }


    /* =====================================================
       SIDE MENU LINKS
    ===================================================== */

    menuLinks.forEach(function (link) {

        link.addEventListener(
            "click",
            function () {

                closeSideMenu();

            }
        );

    });


    /* =====================================================
       ESC KEY
    ===================================================== */

    document.addEventListener(
        "keydown",
        function (event) {

            if (
                event.key === "Escape" &&
                header.classList.contains("side-menu-open")
            ) {

                closeSideMenu();

            }

        }
    );


    /* =====================================================
       RESIZE
       Close menu when moving back to desktop
    ===================================================== */

    window.addEventListener(
        "resize",
        function () {

            if (
                window.innerWidth > 991 &&
                header.classList.contains("side-menu-open")
            ) {

                closeSideMenu();

            }

        }
    );


    /* =====================================================
       PREVENT SIDEBAR CLICK FROM CLOSING
    ===================================================== */

    const sideMenu =
        document.querySelector(".side-menu");

    if (sideMenu) {

        sideMenu.addEventListener(
            "click",
            function (event) {

                event.stopPropagation();

            }
        );

    }


});
// Counter
document.addEventListener("DOMContentLoaded", () => {
  const counters = document.querySelectorAll(".counter");

  const animateCounter = (counter) => {
    const target = parseInt(counter.dataset.target);
    const suffix = counter.dataset.suffix || "";
    const duration = 1800;

    let startTime = null;

    const easeOut = (t) => {
      return 1 - Math.pow(1 - t, 3);
    };

    const updateCounter = (currentTime) => {
      if (!startTime) startTime = currentTime;

      const progress = Math.min(
        (currentTime - startTime) / duration,
        1
      );

      const value = Math.floor(easeOut(progress) * target);

      counter.textContent = value + suffix;

      if (progress < 1) {
        requestAnimationFrame(updateCounter);
      } else {
        counter.textContent = target + suffix;
      }
    };

    requestAnimationFrame(updateCounter);
  };

  const observer = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          animateCounter(entry.target);
          observer.unobserve(entry.target);
        }
      });
    },
    {
      threshold: 0.4
    }
  );

  counters.forEach((counter) => observer.observe(counter));
});

/* =========================================================
   EXPERIENCE CARDS SLIDER
========================================================= */

document.addEventListener("DOMContentLoaded", function () {

    const slider = document.querySelector(".experience-slider");

    if (!slider) return;

    const slides = slider.querySelectorAll(".swiper-slide");
    const totalSlides = slides.length;

    new Swiper(slider, {
        spaceBetween: 20,

        centeredSlides: false,

        speed: 800,

        loop: true,

        grabCursor: true,

        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true
        },

        breakpoints: {

            0: {
                slidesPerView: 1,
                spaceBetween: 20
            },

            768: {
                slidesPerView: 3,
                spaceBetween: 30
            },

            1680: {
                slidesPerView: 3.5,
                spaceBetween: 30
            }

        }

    });

});
/* =========================================================
   TESTIMONIAL SLIDER
========================================================= */
document.addEventListener("DOMContentLoaded", function () {

    const travelTextSlider = document.querySelector(".travel-text-slider");

    if (!travelTextSlider) return;

    new Swiper(travelTextSlider, {

        slidesPerView: 1,

        speed: 800,

        loop: true,

        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
            pauseOnMouseEnter: false
        },

        navigation: {
            nextEl: ".travel-arrow-next",
            prevEl: ".travel-arrow-prev"
        }

    });

});
document.addEventListener("DOMContentLoaded", function () {

    const testimonialSlider = document.querySelector(".testimonial-slider");

    if (!testimonialSlider) return;

    new Swiper(".testimonial-slider", {

        slidesPerView: 1,

        spaceBetween: 30,

        speed: 800,

        loop: true,

        grabCursor: true,

        autoplay: {
            delay: 1500,
            disableOnInteraction: false,
            pauseOnMouseEnter: true
        },

        navigation: {
            nextEl: ".testimonial-next",
            prevEl: ".testimonial-prev"
        },

        pagination: {
            el: ".testimonial-pagination",
            clickable: true
        },

        breakpoints: {

            768: {
                slidesPerView: 2,
                spaceBetween: 25
            },

            1200: {
                slidesPerView: 3,
                spaceBetween: 30
            }

        }

    });

});

// gallery
document.addEventListener("DOMContentLoaded", function () {

    const items = document.querySelectorAll(".affiliation-item");
    const lightbox = document.getElementById("affiliationLightbox");
    const lightboxImage = document.getElementById("lightboxImage");
    const closeBtn = document.getElementById("lightboxClose");
    const prevBtn = document.getElementById("lightboxPrev");
    const nextBtn = document.getElementById("lightboxNext");
    const counter = document.getElementById("lightboxCounter");

    let currentIndex = 0;

    const images = Array.from(items).map(item => {
        return item.querySelector("img").src;
    });


    /* OPEN */

    function openLightbox(index) {

        currentIndex = index;

        lightboxImage.src = images[currentIndex];

        counter.textContent =
            `${currentIndex + 1} / ${images.length}`;

        lightbox.classList.add("active");

        document.body.style.overflow = "hidden";
    }


    /* CLOSE */

    function closeLightbox() {

        lightbox.classList.remove("active");

        document.body.style.overflow = "";
    }


    /* NEXT */

    function nextImage() {

        currentIndex =
            (currentIndex + 1) % images.length;

        lightboxImage.style.opacity = "0";

        setTimeout(() => {

            lightboxImage.src = images[currentIndex];

            counter.textContent =
                `${currentIndex + 1} / ${images.length}`;

            lightboxImage.style.opacity = "1";

        }, 150);
    }


    /* PREVIOUS */

    function previousImage() {

        currentIndex =
            (currentIndex - 1 + images.length) % images.length;

        lightboxImage.style.opacity = "0";

        setTimeout(() => {

            lightboxImage.src = images[currentIndex];

            counter.textContent =
                `${currentIndex + 1} / ${images.length}`;

            lightboxImage.style.opacity = "1";

        }, 150);
    }


    /* CLICK IMAGE */

    items.forEach((item, index) => {

        item.addEventListener("click", () => {
            openLightbox(index);
        });

    });


    /* BUTTONS */

    closeBtn.addEventListener("click", closeLightbox);

    nextBtn.addEventListener("click", nextImage);

    prevBtn.addEventListener("click", previousImage);


    /* CLICK BACKGROUND */

    lightbox.addEventListener("click", function (e) {

        if (e.target === lightbox) {
            closeLightbox();
        }

    });


    /* KEYBOARD */

    document.addEventListener("keydown", function (e) {

        if (!lightbox.classList.contains("active")) return;

        if (e.key === "Escape") {
            closeLightbox();
        }

        if (e.key === "ArrowRight") {
            nextImage();
        }

        if (e.key === "ArrowLeft") {
            previousImage();
        }

    });

});
