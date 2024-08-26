jQuery(function($) {

    /* -----------------------------------------
    Preloader
    ----------------------------------------- */
    $('#preloader').delay(1000).fadeOut();
    $('#loader').delay(1000).fadeOut("slow");

    /* -----------------------------------------
    Navigation
    ----------------------------------------- */
    $('.menu-toggle').click(function() {
        $(this).toggleClass('open');
    });

    /* -----------------------------------------
    Keyboard Navigation
    ----------------------------------------- */
    $(window).on('load resize', testing)

    function testing(event) {
        if ($(window).width() < 1200) {
            $('.main-navigation').find("li").last().bind('keydown', function(e) {
                if (e.shiftKey && e.which === 9) {
                    if ($(this).hasClass('focus')) {
                    }

                } else if (e.which === 9) {
                    e.preventDefault();
                    $('#masthead').find('.menu-toggle').focus();
                }                
            })
        } else {
            $('.main-navigation').find("li").unbind('keydown')
        }
    }

    testing()

    var primary_menu_toggle = $('#masthead .menu-toggle');
    primary_menu_toggle.on('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        var shiftKey = e.shiftKey;

        if (primary_menu_toggle.hasClass('open')) {
            if (shiftKey && tabKey) {
                e.preventDefault();
                const $the_last_li = $('.main-navigation').find("li").last()
                $the_last_li.find('a').focus()
                if (!$the_last_li.hasClass('focus')) {

                    const $is_parent_on_top = true
                    let $the_parent_ul = $the_last_li.closest('ul.sub-menu')

                    let count = 0

                    while (!!$the_parent_ul.length) {
                        ++count

                        const $the_parent_li = $the_parent_ul.closest('li')

                        if (!!$the_parent_li.length) {
                            $the_parent_li.addClass('focus')
                            $the_parent_ul = $the_parent_li.closest('ul.sub-menu')

                            // Blur the cross
                            $(this).blur()
                            $the_last_li.addClass('focus')
                        }

                        if (!$the_parent_ul.length) {
                            break;
                        }
                    }

                }

            };
        }
    })

    /* -----------------------------------------
    Main Slider
    ----------------------------------------- */
    $('.banner-slider').slick({
        autoplaySpeed: 3000,
        dots: false,
        arrows: true,
        nextArrow: '<button class="fas fa-angle-right slick-next"></button>',
        prevArrow: '<button class="fas fa-angle-left slick-prev"></button>',
        responsive: [{
            
            breakpoint: 1025,
            settings: {
                dots: true,
                arrows: false,
            }
        },
        {
            breakpoint: 480,
            settings: {
                dots: true,
                arrows: false,
            }
        }]
    });

    /* -----------------------------------------
    Scroll Top
    ----------------------------------------- */
    var scrollToTopBtn = $('.gamers-studio-scroll-to-top');

    $(window).scroll(function() {
        if ($(window).scrollTop() > 400) {
            scrollToTopBtn.addClass('show');
        } else {
            scrollToTopBtn.removeClass('show');
        }
    });

    scrollToTopBtn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, '300');
    });

    $(".input").focus(function() {
      $(".form").addClass("move");
    });
    $(".input").focusout(function() {
      $(".form").removeClass("move");
      $(".input").val("");
    });

    $(".fa-search").click(function() {
      $(".input").toggleClass("active");
      $(".form").toggleClass("active");
    });

    jQuery(".banner-section.banner-style-1 .banner-single .banner-caption .banner-catption-wrapper .banner-caption-title a").html(function(){
     var text2= jQuery(this).text().trim().split(" ");
     var las2 = text2[(text2.length-1)];
     
     if(text2.length > 1 ){
        text2.splice((text2.length-1),1)
       var updatedTex2 = `<span class='banner-text'>${las2}</span>`
       text2.splice((text2.length), 0, updatedTex2)
       return text2.join(" ");
     } else if(text2.length == 1 ) {
        var updatedTex2 = `<span class='banner-text'>${text2}</span>`
        // text2.splice((text2.length), 0, updatedTex2)
        return updatedTex2;
     }else{
       return text2.join(" ");
     }
   });
        
});
function show_loading_box() {
  jQuery(".spinner-loading-box").css("display", "none");
  clearInterval(interval);
}

jQuery(document).ready(function() {
  interval = setInterval(show_loading_box, 1000);

  function flashCountdown($timer, targetDate) {
    var countDownDate = new Date(targetDate).getTime();

    var countdownInterval = setInterval(function() {
      var now = new Date().getTime();
      var distance = countDownDate - now;

      var hours = Math.floor(distance / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      var countdownHtml = `
        <div class='timmer-main'><span class='timer-date'>${hours}</span><span class='timer-box'>hrs${hours !== 1 ? '' : ''}</span></div>
        <div class='timmer-main'><span class='timer-date'>${minutes}</span><span class='timer-box'>min${minutes !== 1 ? '' : ''}</span></div>
        <div class='timmer-main'><span class='timer-date'>${seconds}</span><span class='timer-box'>sec${seconds !== 1 ? '' : ''}</span></div>
      `;

      $timer.html(countdownHtml);

      if (distance < 0) {
        clearInterval(countdownInterval);
        $timer.html("TIMER UP - EVENT EXPIRED");
      }
    }, 1000);
  }

  var targetDate = jQuery('.timmer').val();
  jQuery(".timmercount").each(function() {
    flashCountdown(jQuery(this), targetDate);
  });
});
