(function ($) {
  $(document).ready(function () {
    "use strict";


    $(".photo-booth-label .close").on("click", function () {
      $(".photo-booth-label").hide();
    });
    var counting = setInterval(function () {
      var loader = document.getElementById("percentage");
      var currval = parseInt(loader.innerHTML);
      var Width = 99 - currval;
      var loadscreen = document.getElementById("loader-progress");
      loader.innerHTML = ++currval;
      if (currval === 75) {
        clearInterval(counting);
        $("body").toggleClass('page-loaded');
      }
      loadscreen.style.transition = "0.1s";
      loadscreen.style.width = Width + "%";
    }, 0);



    $('.hamburger-menu').on('click', function () {
      $(".menu .line").toggleClass('opened');
      $(".mobile-menu").toggleClass("active")
    })




    $("#contactForm").on("submit", function (event) {
      event.preventDefault();
      grecaptcha.ready(function () {
        grecaptcha.execute('6LeV8B4pAAAAAF9PXnky0usSkAiy5rHHQeEJ5425', { action: 'submit' }).then(function (token) {

          var formData = $('#contactForm').serialize();
          formData += '&recaptcha_token=' + token;
          $.ajax({
            type: 'POST',
            url: 'inc/query.php',
            data: formData,
            dataType: 'json',
            success: function (response) {

              var output = '';
              if (response.type == 'error') {
                output = '<div class="error" style="font-size:14px;">' + response.text + '</div>';
              }
              else {
                output = '<div class="success">' + response.text + '</div>';
                $("#contactForm input").val('');
                $("#contactForm textarea").val('');
                $("#contactForm").slideUp();
              }
              $("#contact-results").hide().html(output).slideDown();
            },
            error: function (xhr, status, error) {
              console.log("some error");
            }
          });
        });
      });
    });



  });

  var pageSection = $("*");
  pageSection.each(function (indx) {
    if ($(this).attr("data-background")) {
      $(this).css("background", "url(" + $(this).data("background") + ")");
    }
  });

  var pageSection = $("*");
  pageSection.each(function (indx) {
    if ($(this).attr("data-background")) {
      $(this).css("background", $(this).data("background"));
    }
  });



  if ($("#js-countdown").hasClass("countdown")) {
    const countdown = new Date("June 4, 2024 8:00");

    function getRemainingTime(endtime) {
      const milliseconds = Date.parse(endtime) - Date.parse(new Date());
      const seconds = Math.floor((milliseconds / 1000) % 60);
      const minutes = Math.floor((milliseconds / 1000 / 60) % 60);
      const hours = Math.floor((milliseconds / (1000 * 60 * 60)) % 24);
      const days = Math.floor(milliseconds / (1000 * 60 * 60 * 24));

      return {
        'total': milliseconds,
        'seconds': seconds,
        'minutes': minutes,
        'hours': hours,
        'days': days,
      };
    }

    function initClock(id, endtime) {
      const counter = document.getElementById(id);
      const daysItem = counter.querySelector('.js-countdown-days');
      const hoursItem = counter.querySelector('.js-countdown-hours');
      const minutesItem = counter.querySelector('.js-countdown-minutes');
      const secondsItem = counter.querySelector('.js-countdown-seconds');

      function updateClock() {
        const time = getRemainingTime(endtime);

        daysItem.innerHTML = time.days;
        hoursItem.innerHTML = ('0' + time.hours).slice(-2);
        minutesItem.innerHTML = ('0' + time.minutes).slice(-2);
        secondsItem.innerHTML = ('0' + time.seconds).slice(-2);

        if (time.total <= 0) {
          clearInterval(timeinterval);
        }
      }

      updateClock();
      const timeinterval = setInterval(updateClock, 1000);
    }

    initClock('js-countdown', countdown);
  }


  $(".site-menu li").on("click", function () {
    $(".mobile-menu").removeClass("active");
  })


  window.onscroll = function () { myFunction() };
  var header = document.getElementById("navbar");
  var sticky = header.offsetTop;

  function myFunction() {
    if (window.pageYOffset > sticky) {
      header.classList.add("dark");
      header.classList.add("pinned");
    }
    else {
      header.classList.remove("dark");
      header.classList.remove("pinned");
      header.classList.add("unpinned");
    }
  }

  var type = 1
  radius = '21vw',
    start = -90,
    $elements = $('ul.broadFocusList li:not(:first-child)'),
    numberOfElements = (type === 1) ? $elements.length : $elements.length - 1,
    slice = 360 * type / numberOfElements;

  $elements.each(function (i) {
    var $self = $(this),
      rotate = slice * i + start,
      rotateReverse = rotate * -1;

    $self.css({ 'transform': 'rotate(' + rotate + 'deg) translate(' + radius + ') rotate(' + rotateReverse + 'deg)' });
  });

  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  });

  $("#testimonialItems").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: true,
    autoplay: true,
    arrows: true,
    infinite: true,
    speed: 500,
    responsive: [
      {
        breakpoint: 1367,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 1171,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3
        }
      },
      {
        breakpoint: 769,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: false
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: false,
        }
      }
    ]
  });

  $('.your-class').slick({
    slidesToShow: 5,
    slidesToScroll: 5,
    dots: true,
    autoplay: true,
    arrows: true,
    infinite: true,
    speed: 300,
    responsive: [
      {
        breakpoint: 1367,
        settings: {
          slidesToShow: 5,
          slidesToScroll: 5
        }
      },
      {
        breakpoint: 1171,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 4
        }
      },
      {
        breakpoint: 769,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: false,
        }
      }
    ]
  });


  $('#slidename').on("keyup", filter);
  function filter() {
    const filter = jQuery("#slidename").val().toLowerCase();
    $('#speakercarousel').slick('slickUnfilter');
    $('#speakercarousel').slick('slickFilter', function () {
      let speakerName = jQuery(this).find(".single-speakers-box .content-box h4").text().toLowerCase();
      return (speakerName.indexOf(filter) > -1);
    });

  }

  $('#speakersFilter').on("keyup", filter2);

  function filter2() {
    alert("Hiis")
    const filter = jQuery("#speakersFilter").val().toLowerCase();
    $('#speakerMain')
    $('#speakerMain'),
      function () {
        let speakerName = jQuery(this).find(".speakersItem .content-box h4").text().toLowerCase();
        return (speakerName.indexOf(filter) > -1);
      };

  }

  $(function () {
    //Past Speakers
    $('.demo').infiniteslide({
      'direction': $(window).width() >= 768 ? 'up' : 'left',
      'speed': '50',
      'pauseonhover': true,
      'responsive': true
    });

    //Broad Focus Areas
    $('.broadfocus-items').infiniteslide({
      'direction': 'right',
      'speed': '50',
      'pauseonhover': true,
      'responsive': true
    });

    //Key Highlights
    $('.keyhighlight-items').infiniteslide({
      'direction': 'left',
      'speed': '50',
      'pauseonhover': true,
      'responsive': true
    });
  });

  if ($("#blogItems").length) {
    $("#blogItems").slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      dots: true,
      autoplay: false,
      arrows: true,
      infinite: false,
      speed: 300,
      responsive: [
        {
          breakpoint: 1367,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3
          }
        },
        {
          breakpoint: 1171,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3
          }
        },
        {
          breakpoint: 769,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
          }
        }
      ]
    });
  }


})(jQuery);
