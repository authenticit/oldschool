$(document).ready(function () {


    $('.carousel').carousel();

    $('.img_slide').slick({
        infinite: true,
        slidesToShow: 10,
        slidesToScroll: 1,
        arrows: false,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 8,
                    slidesToScroll: 1,
                }
      },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 6,
                    slidesToScroll: 1
                }
      },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1
                }
      }
    ]
    });

    $('.banner_slide').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        autoplay: true,
    });

    $('.artist_slide').slick({
        infinite: true,
        slidesToShow: 6,
        slidesToScroll: 2,
        arrows: false,
        dots: true,
        autoplay: true,
        responsive: [
            {
                breakpoint: 1080,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 1,
                }
      },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1
                }
      }
    ]
    });

    $('.venobox').venobox();


    // left sidebar;

    $('.mobile_btn').click(function () {
        $(".mobile-sidebar").css({
            'left': 0,
            'opacity': 1,
            'visibility': 'visible',
        });

        $('.sidebar_overlay').fadeIn(150);

        return false;
    });

    $('.login-btn').on('click', function() {
        $('.account_submenu').fadeToggle();

        return false;
    })

    $('.sidebar_overlay').click(function () {
        $(".mobile-sidebar").css({
            'left': '-400px',
            'opacity': 0,
            'visibility': 'hidden',
        });

        $('.sidebar_overlay').fadeOut(150);
    });


    //profile page script
    $('.images').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        autoplay: true,
    });




})