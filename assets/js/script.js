jQuery(document).ready(function(){

    var homepage = (jQuery('header.color').length > 0 ? false : true);
    var menu = document.getElementById('masthead');

    jQuery('#toggleMenu').click(function() {
        jQuery(menu).toggleClass('show');
    });
    jQuery('.nav-item a').click(function(){
        jQuery(menu).removeClass('show');
    });

    jQuery('.open-booking, #booking .overlay').click(function(){
        jQuery('body').toggleClass('booking');
    });
    jQuery('.close-form').click(function(){
        jQuery('body').removeClass('booking');
    });
    jQuery(document).on('keyup', function(e) {
        if (e.key == "Escape") jQuery('body').removeClass('booking');
    });

    // Make Menu Sticky
    function checkMenu(){
        if(window.scrollY < 10){
            var top = true;
        } else {
            var top = false;
        }
        var menu = document.getElementById('masthead');

        if(!menu.classList.contains('fi')){
            if(!top && !window.scrollY==0){
                menu.classList.add('color');
                top = false;
                return false;
            } else if (top){
                menu.classList.remove('color');
                return true;
            }
        }
        return false;
    }
    /*
    if(jQuery('.feedback-swiper').length){
        feedbackSwiper = new Swiper(".feedback-swiper", {
            spaceBetween: 10,
            slidesPerView: 1,
            grabCursor: true, 
            effect: "fade",
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
            },
        });
    }
    */

    jQuery(window).scroll(function() {
        if(homepage) checkMenu();
    });


});