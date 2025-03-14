// Main JavaScript file for AISS 2025

(function ($) {
    "use strict";

    // Preloader
    $(window).on('load', function () {
        // Simulate loading progress
        let counter = 0;
        const interval = setInterval(function () {
            counter += 2; // Increase by 2 for faster loading
            if (counter >= 100) {
                clearInterval(interval);
                counter = 100;

                // Update final percentage
                $('#percentage').text(counter + '%');
                $('#loader-progress').css('width', counter + '%');

                // Apply loaded state after slight delay for transition to complete
                setTimeout(function () {
                    $('body').addClass('page-loaded');
                    $('.preloader').fadeOut(500);
                }, 300);
            } else {
                // Update the percentage display
                $('#percentage').text(counter + '%');

                // Update progress bar width
                $('#loader-progress').css('width', counter + '%');
            }
        }, 20);
    });

    // Mobile Menu Toggle
    $('.hamburger-menu .menu').on('click', function () {
        $('.mobile-menu').toggleClass('active');
        if ($('.mobile-menu').hasClass('active')) {
            $('.mobile-menu .inner').css({
                'opacity': '1',
                'transform': 'translateX(0)'
            });
        } else {
            $('.mobile-menu .inner').css({
                'opacity': '0',
                'transform': 'translateX(-50px)'
            });
        }
    });

    // Dropdown functionality
    $('.dropdown .dropbtn').on('mouseover', function () {
        $('#myDropdown').addClass('show');
    });

    $('.dropdown').on('mouseleave', function () {
        $('#myDropdown').removeClass('show');
    });

    // Pin navbar on scroll
    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 100) {
            $('.header').addClass('pinned');
        } else {
            $('.header').removeClass('pinned');
        }
    });

    // Smooth scrolling for anchor links
    $('a[href^="#"]').on('click', function (e) {
        e.preventDefault();

        if (this.hash !== '') {
            const hash = this.hash;

            $('html, body').animate({
                scrollTop: $(hash).offset().top - 70
            }, 800);

            // Close mobile menu if open
            $('.mobile-menu').removeClass('active');
        }
    });

    // Initialize slick carousel for speakers
    if ($('.speakers-slider').length) {
        $('.speakers-slider').slick({
            dots: true,
            infinite: true,
            speed: 500,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            cssEase: 'linear',
            pauseOnHover: true,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }

    // Filter functionality for speakers
    $('#slidename').on('keyup', function () {
        const value = $(this).val().toLowerCase();
        $('.speaker-item').filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });

})(jQuery);
