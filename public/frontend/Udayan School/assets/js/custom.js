

// scroll effect of Navbar
// --------------------------------------
window.addEventListener("scroll", function(){
    var navigation = document.querySelector(".navigation");
    navigation.classList.toggle("sticky", window.scrollY > 0);
})


// not working 
window.addEventListener("scroll", function(){
    var arrow_up_sticky = document.querySelector(".arrow_up_sticky");
    arrow_up_sticky.classList.toggle("arrow_up_sticky", window.scrollY > 120);
})
 



$(document).ready(function(){

    // BANNER OWL-CAROUSEL HERE 
    $('.banner').owlCarousel({
        items: 1,
        loop: true,
        nav: true,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        autoplay: true,
        autoplayTimeout: 7000
    });

    // ACADEMICS OWL-CAROUSEL HERE 
    $('.academics_carousel').owlCarousel({
        items: 4,
        loop: true,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        autoplay: true,
        autoplayTimeout: 4000,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            992:{
                items: 3
            },
            1000:{
                items:4
            }
        }
    });

    // TEACHERS IMAGE OWL-CAROUSEL HERE 
    $('.teachers_carousel').owlCarousel({
        items: 4,
        loop: true,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        autoplay: true,
        autoplayTimeout: 4000,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            992:{
                items: 3
            },
            1000:{
                items:4
            }
        }
    });

    // VIDEO SECTION OWL-CAROUSEL HERE 
    $('.video_carousel').owlCarousel({
        items: 4,
        loop: true,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        autoplay: true,
        autoplayTimeout: 5000,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            992:{
                items: 3
            },
            1000:{
                items:4
            }
        }
    });
    

    // RECENT NEWS OWL-CAROUSEL HERE 
    $('.recent_news').owlCarousel({
        items: 3,
        loop: true,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        autoplay: true,
        autoplayTimeout: 5000,
        responsive:{
            0:{
                items:1
            },
            700:{
                items:2
            },
            992:{
                items: 3
            }
        }
    });



    // IMPORTANT DOCUMENTS SHOW HIDE HERE ++++++++++++
    $('#download_link').click(function(){
        $('#download_content').fadeIn();
        $('#notice_content').hide();
        $('#result_content').hide();
        $('#admit_content').hide();
        $('#routine_content').hide();
    })

    $('#notice_link').click(function(){
        $('#notice_content').fadeIn();
        $('#download_content').hide();
        $('#result_content').hide();
        $('#admit_content').hide();
        $('#routine_content').hide();
    })

    $('#result_link').click(function(){
        $('#result_content').fadeIn();
        $('#notice_content').hide();
        $('#download_content').hide();
        $('#admit_content').hide();
        $('#routine_content').hide();
    })

    $('#admit_link').click(function(){
        $('#admit_content').fadeIn();
        $('#result_content').hide();
        $('#notice_content').hide();
        $('#download_content').hide();
        $('#routine_content').hide();
    })

    $('#routine_link').click(function(){
        $('#routine_content').fadeIn();
        $('#admit_content').hide();
        $('#result_content').hide();
        $('#notice_content').hide();
        $('#download_content').hide();
    })


    // STUDENT LIST SHOW HIDE HERE ++++++++++++
    $('#six').click(function(){
        $('#six_list').fadeIn();
        $('#seven_list').hide();
        $('#eight_list').hide();
        $('#nine_list').hide();
        $('#ten_list').hide();
    })

    $('#seven').click(function(){
        $('#seven_list').fadeIn();
        $('#six_list').hide();
        $('#eight_list').hide();
        $('#nine_list').hide();
        $('#ten_list').hide();
    })

    $('#eight').click(function(){
        $('#eight_list').fadeIn();
        $('#seven_list').hide();
        $('#six_list').hide();
        $('#nine_list').hide();
        $('#ten_list').hide();
    })

    $('#nine').click(function(){
        $('#nine_list').fadeIn();
        $('#six_list').hide();
        $('#seven_list').hide();
        $('#eight_list').hide();
        $('#ten_list').hide();
    })

    $('#ten').click(function(){
        $('#ten_list').fadeIn();
        $('#six_list').hide();
        $('#seven_list').hide();
        $('#eight_list').hide();
        $('#nine_list').hide();
    })

})

