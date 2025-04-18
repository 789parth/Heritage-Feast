var swiper = new Swiper('.reviews-slider', {
    grabCursor: true,
    loop: true,
    spaceBetween: 20,
    slidesPerView: 'auto',
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    breakpoints: {
        768: {
            slidesPerView: 1,
        },
        1024: {
            slidesPerView: 2,
        },
        1366: {
            slidesPerView: 3,
        },
        1920: {
            slidesPerView: 4,
        }
    },
});
