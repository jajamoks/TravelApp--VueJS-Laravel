var jQuery = (window.jQuery = require('jquery'));
require('bootstrap-sass/assets/javascripts/bootstrap');
require('jquery.easing');
require('jquery-backstretch');
require('./vendor/jquery.tabslideout');
require('slick-carousel');
require('./vendor/jquery.youtubebackground');
require('sticky-kit/dist/sticky-kit');
require('featherlight');
require('featherlight/src/featherlight.gallery');
require('hammerjs');
const Cookie = require('js-cookie');
const bookingWidget = require('./components/booking-widget');
var Vue = require('vue');

$(
  (function($) {
    function setSubMenu() {
      $('.sub-menu').each(function() {
        const width = window.outerWidth;
        $(this).css({
          width: `${width}px`,
          position: 'fixed',
          left: 0,
          top: $('.navbar-collapse').height() - 7
        });
      });
    }
    $(window).resize(setSubMenu);
    setSubMenu();
    $('.lightbox').each(function() {
      $(this).magnificPopup({
        delegate: 'a.open-gallery', // the selector for gallery item
        type: 'image',
        gallery: {
          enabled: true
        }
      });
    });
    if ($('.home-hero').length) {
      $('.slider').slick({
        dots: false,
        prevArrow: false,
        nextArrow: false,
        autoplay: true,
        infinite: true,
        speed: 900,
        fade: true,
        autoplaySpeed: 4000,
        slidesToShow: 1,
        slidesToScroll: 1,
        pauseOnHover: false,
        cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)'
      });
      $('#instagram-feed').slick({
        dots: false,
        prevArrow: false,
        nextArrow: false,
        autoplay: true,
        infinite: true,
        speed: 2000,
        autoplaySpeed: 2000,
        slidesToShow: 4,
        slidesToScroll: 1,
        centerMode: true,
        centerPadding: '100px',
        pauseOnHover: true,
        cssEase: 'linear',
        responsive: [
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: 4
            }
          },
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1
            }
          }
        ]
      });
    }
    if ($('#booking-widget').length) {
      var Widget = new Vue({
        el: '#booking-widget',
        data: {
          availableSingleRooms: window.singleRooms,
          availableSharedRooms: window.sharedRooms,
          singleRate: window.singleRate,
          sharedRate: window.sharedRate,
          deposit: window.deposit,
          selectedRoom: '',
          selectedGuests: 0
        },
        computed: {
          secondGuestAllowed() {
            return this.selectedRoom === 'shared'
              ? this.availableSharedRooms > 1
              : true;
          },
          rate() {
            if (this.selectedRoom === 'shared') {
              return this.sharedRate;
            } else if (this.selectedRoom === 'private') {
              if (+this.selectedGuests === 2) {
                return this.sharedRate;
              } else {
                return this.singleRate;
              }
            } else {
              return 0;
            }
          },
          showPrivateAsShared() {
            return this.availableSingleRooms > 0 && +this.selectedGuests === 2;
          }
        },
        methods: {
          roomChange(e) {
            const { value } = e.target;
            this.selectedRoom = value;
          },
          guestChange(e) {
            const { value } = e.target;
            this.selectedGuests = value;
          }
        }
      });

      var stickySidebar = function() {
        if (window.matchMedia('(min-width: 992px)').matches) {
          $('.escape-sticky-sidebar').stick_in_parent({
            offset_top: 121
          });
          $('.escape-sticky-sidebar')
            .on('sticky_kit:bottom', function(e) {
              $(this)
                .parent()
                .css('position', 'static');
            })
            .on('sticky_kit:unbottom', function(e) {
              $(this)
                .parent()
                .css('position', 'relative');
            });
        } else {
          $('.escape-sticky-sidebar').trigger('sticky_kit:detach');
        }
      };
      $(window).resize(stickySidebar);
    }
    if ($('.escape-page').length) {
      $('#escape-slider').slick({
        dots: false,
        prevArrow: false,
        nextArrow: false,
        autoplay: true,
        infinite: true,
        speed: 4000,
        fade: true,
        pauseOnHover: true,
        autoplaySpeed: 4000
      });
      $('a.gallery-item').featherlightGallery({
        previousIcon: '&#xf104',
        nextIcon: '&#xf105',
        galleryFadeIn: 300,
        openSpeed: 300
      });
    }
    if ($('.e2s-side-menu').length) {
      $('.side-slide').each(function() {
        const height = $('.side-slide-label', $(this)).width();
        $('.side-slide-label-container', $(this)).height(height + 20);
        const previousSiblingsHeight = $(this)
          .prevAll()
          .toArray()
          .reduce((acc, curr) => {
            return acc + $(curr).height() + 5;
          }, 0);
        $(this).height(height + 20);
        if ($(this).hasClass('side-slide-single')) {
          $(this).css({ top: '50vh' });
        } else {
          $(this).css({ top: `calc(35vh + ${previousSiblingsHeight}px)` });
        }
      });
    }

    if ($('.blog.block.post-content-area img').length) {
      $('.blog.block.post-content-area img').each((index, el) => {
        const width = $(el).attr('width');
        const height = $(el).attr('height');
        if (height) {
          $(el).css('max-height', `${height}px`);
        }
        if (width) {
          $(el).css('max-height', `${width}px`);
        }
      });
    }
  })(jQuery)
);

(function($) {
  window.onload = function() {
    if ($('#video-background').length) {
      const loopVideo = (res, count = 0) => {
        var id = count % 3;
        var latest = res.items[id];
        if (latest.guid) {
          var videoId = latest.guid.split(':').pop();
          $('#video-background').YTPlayer({
            videoId: videoId,
            events: {
              onStateChange: state => {
                if (state.data === 0) {
                  $('#video-background')
                    .data('ytPlayer')
                    .destroy();
                  loopVideo(res, count + 1);
                }
              }
            }
          });
          $('#youtube-videolink').attr('href', latest.link);
        }
      };
      $.get(
        'https://api.rss2json.com/v1/api.json?rss_url=https%3A%2F%2Fwww.youtube.com%2Ffeeds%2Fvideos.xml%3Fchannel_id%3D' +
          'UCY_sDKoS1T3mbxtJ26owAcw',
        res => {
          loopVideo(res);
        }
      );
    }
    $('.home-slide').each(function() {
      if ($(this).data('image-src')) {
        $(this).css({
          'background-image': `url(${$(this).data('image-src')})`
        });
      }
    });
    var hideSignUp = function() {
      $('#e2s-newsletter-popup i').on('click', function() {
        $('#e2s-newsletter-popup').removeClass('fadeInUp');
        $('#e2s-newsletter-popup').addClass('fadeOutDown');
        Cookie.set('newsletter_dismissed', 'true', { expires: 7 });
        $(this).off();
      });
    };
    var showSignUp = function() {
      const cookie = Cookie.get('newsletter_dismissed');
      const consentShowing = $('.cookie-consent').is(':visible');
      if (!cookie) {
        if (!consentShowing) {
          $('#e2s-newsletter-popup').slideDown();
          hideSignUp();
        } else {
          setTimeout(showSignUp, 5000);
        }
      }
    };
    setTimeout(showSignUp, 5000);
  };
})(jQuery);
