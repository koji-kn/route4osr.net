'use strict';{
    const hamburger = document.querySelector('.js-hamburger');
    const mediaQueryList = window.matchMedia('(min-width: 1199px)');
    const gmenu = document.querySelector(".p-gmenu");
    const mask = document.querySelector(".mask");


    //ハンバーガーボタン＆メニュースライド
    $(function() {
        $(hamburger).on('click', function() {
            $(this).toggleClass("is-open");
            $(gmenu).toggleClass("is-open");
            $(mask).toggleClass("is-open");
            // $(gmenu).slideToggle(200);
        });
        $(mask).on('click', function() {
            $(this).removeClass("is-open");
            $(gmenu).removeClass("is-open");
            $(hamburger).removeClass("is-open");
            // $(gmenu).slideToggle(200);
        });
    });

    //メインヴィジュアルカルーセル
    const swiper = new Swiper('.swiper-container', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true,
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: true
        },
    });


}