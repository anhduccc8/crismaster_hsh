jQuery(document).ready(function($) {
    if ($('.owl-carousel.shs-nav-blog-releated-1').length > 0 ){
         $('.owl-carousel.shs-nav-blog-releated-1').owlCarousel({
             startPosition: 0,
            nav: true,
             loop: true,
             margin: 10,
             navText: ["<i class='fa-solid fa-chevron-left'></i>","<i class='fa-solid fa-chevron-right'></i>"],
             responsiveClass: true,
             responsive: {
                 0: {
                     items: 2,
                     nav: true,
                     // center: true,
                 },
                 768: {
                     items: 4,
                     nav: true,
                     // center: true,
                 }
             },
        });
        $('.owl-carousel.shs-nav-blog-releated-1 .owl-nav').removeClass('disabled');
    }


});