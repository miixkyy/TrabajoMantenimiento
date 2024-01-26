<script src="Public/js/main.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    var mySwiper = new Swiper(".swiper-container", {
      loop: true,
      spaceBetween: 10,
      slidesPerView: 1,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      autoplay: {
        delay: 3000,      
      },
    });
  });

  document.addEventListener("DOMContentLoaded", function () {
    var mySwiper = new Swiper(".slider-container", {
      loop: true,
      spaceBetween: 10,
      slidesPerView: 1,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      autoplay: {
        delay: 3000,      
      },
    });
  });
</script>