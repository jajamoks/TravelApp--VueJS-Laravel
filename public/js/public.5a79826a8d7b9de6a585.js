webpackJsonp([3],{

/***/ 228:
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function($) {var jQuery = window.jQuery = __webpack_require__(4);
__webpack_require__(158);
__webpack_require__(213);
__webpack_require__(212);
__webpack_require__(340);
__webpack_require__(214);
__webpack_require__(210);
__webpack_require__(410);
__webpack_require__(403);
__webpack_require__(404);
__webpack_require__(211);
var Cookie = __webpack_require__(405);
var bookingWidget = __webpack_require__(336);
var Vue = __webpack_require__(17);

$(function ($) {
  function setSubMenu() {
    $('.sub-menu').each(function () {
      var width = window.outerWidth;
      $(this).css({
        width: width + 'px',
        position: 'fixed',
        left: 0,
        top: $('.navbar-collapse').height() - 7
      });
    });
  }
  $(window).resize(setSubMenu);
  setSubMenu();
  $('.lightbox').each(function () {
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
      responsive: [{
        breakpoint: 1200,
        settings: {
          slidesToShow: 4
        }
      }, {
        breakpoint: 992,
        settings: {
          slidesToShow: 2
        }
      }, {
        breakpoint: 480,
        settings: {
          slidesToShow: 1
        }
      }]
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
        secondGuestAllowed: function secondGuestAllowed() {
          return this.selectedRoom === 'shared' ? this.availableSharedRooms > 1 : true;
        },
        rate: function rate() {
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
        showPrivateAsShared: function showPrivateAsShared() {
          return this.availableSingleRooms > 0 && +this.selectedGuests === 2;
        }
      },
      methods: {
        roomChange: function roomChange(e) {
          var value = e.target.value;

          this.selectedRoom = value;
        },
        guestChange: function guestChange(e) {
          var value = e.target.value;

          this.selectedGuests = value;
        }
      }
    });

    var stickySidebar = function stickySidebar() {
      if (window.matchMedia('(min-width: 992px)').matches) {
        $('.escape-sticky-sidebar').stick_in_parent({
          offset_top: 121
        });
        $('.escape-sticky-sidebar').on('sticky_kit:bottom', function (e) {
          $(this).parent().css('position', 'static');
        }).on('sticky_kit:unbottom', function (e) {
          $(this).parent().css('position', 'relative');
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
    $('.side-slide').each(function () {
      var height = $('.side-slide-label', $(this)).width();
      $('.side-slide-label-container', $(this)).height(height + 20);
      var previousSiblingsHeight = $(this).prevAll().toArray().reduce(function (acc, curr) {
        return acc + $(curr).height() + 5;
      }, 0);
      $(this).height(height + 20);
      if ($(this).hasClass('side-slide-single')) {
        $(this).css({ top: '50vh' });
      } else {
        $(this).css({ top: 'calc(35vh + ' + previousSiblingsHeight + 'px)' });
      }
    });
  }

  if ($('.blog.block.post-content-area img').length) {
    $('.blog.block.post-content-area img').each(function (index, el) {
      var width = $(el).attr('width');
      var height = $(el).attr('height');
      if (height) {
        $(el).css('max-height', height + 'px');
      }
      if (width) {
        $(el).css('max-height', width + 'px');
      }
    });
  }
}(jQuery));

(function ($) {
  window.onload = function () {
    if ($('#video-background').length) {
      var loopVideo = function loopVideo(res) {
        var count = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;

        var id = count % 3;
        var latest = res.items[id];
        if (latest.guid) {
          var videoId = latest.guid.split(':').pop();
          $('#video-background').YTPlayer({
            videoId: videoId,
            events: {
              onStateChange: function onStateChange(state) {
                if (state.data === 0) {
                  $('#video-background').data('ytPlayer').destroy();
                  loopVideo(res, count + 1);
                }
              }
            }
          });
          $('#youtube-videolink').attr('href', latest.link);
        }
      };
      $.get('https://api.rss2json.com/v1/api.json?rss_url=https%3A%2F%2Fwww.youtube.com%2Ffeeds%2Fvideos.xml%3Fchannel_id%3D' + 'UCY_sDKoS1T3mbxtJ26owAcw', function (res) {
        loopVideo(res);
      });
    }
    $('.home-slide').each(function () {
      if ($(this).data('image-src')) {
        $(this).css({
          'background-image': 'url(' + $(this).data('image-src') + ')'
        });
      }
    });
    var hideSignUp = function hideSignUp() {
      $('#e2s-newsletter-popup i').on('click', function () {
        $('#e2s-newsletter-popup').removeClass('fadeInUp');
        $('#e2s-newsletter-popup').addClass('fadeOutDown');
        Cookie.set('newsletter_dismissed', 'true', { expires: 7 });
        $(this).off();
      });
    };
    var showSignUp = function showSignUp() {
      var cookie = Cookie.get('newsletter_dismissed');
      var consentShowing = $('.cookie-consent').is(':visible');
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
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(4)))

/***/ }),

/***/ 230:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 231:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 232:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 336:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'booking-widget',
  data: {
    availableSingleRooms: window.singleRooms,
    availableSharedRooms: window.sharedRooms,
    singleRate: window.singleRate,
    sharedRate: window.sharedRate,
    deposit: window.deposit
  }
});

/***/ }),

/***/ 340:
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery) {/*
    tabSlideOUt v2.2

    By William Paoli: http://wpaoli.building58.com
    Contributions by:
        Michael Fielding / www.hawkip.com
    License: GPL v2.0
    Original location: http://code.google.com/p/tab-slide-out

    To use you must have a div, a, img, span etc. for the handle, inside a div which
    will be the panel. By default the selector for handles is .handle

    example:

        $('#slide-out-div').tabSlideOut({
                tabHandle: '.handle', //selector for the tab
        });

    You can leave out most options and set the properties using css.

    There is an optional setting bottomPos which, when set, fixes the gap between the window
    bottom edge and the panel bottom - the panel is resized with the window. This only
    really makes sense if positioning: 'fixed', and only works if tabLocation is
    left or right.

    You can use some methods too:

        $('#slide-out-div').tabSlideOut('isOpen'); // return true or false
        $('#slide-out-div').tabSlideOut('open'); // opens it
        $('#slide-out-div').tabSlideOut('close'); // closes it
        $('#slide-out-div').tabSlideOut('toggle'); // toggles it
        $('#slide-out-div').tabSlideOut('bounce'); // bounces the tab

    Three events are defined, respond to one or more of them as follows:

        $(document).on('slideouttabopen slideouttabclose slideouttabbounce',function(event){
            var $panel = $(event.target);
            var eventType = event.type;
            // your code here
        });

    Add the class ui-slideouttab-handle-rounded to handles to give them
    rounded outer corners.
*/
(function ($) {
  $.fn.tabSlideOut = function (callerSettings) {
    /*
         * Get the width of the given border, in pixels.
         *
         * @param node element
         * @param string edge
         * @returns int
         */
    function borderWidth(element, edge) {
      return parseInt(element.css('border-' + edge + '-width'), 10);
    }

    /**
         * True if the tab is open.
         *
         * @returns boolean
         */
    function isOpen() {
      return panel.hasClass('ui-slideouttab-open');
    }

    /**
         * Return the desired height of the panel to maintain both offsets.
         */
    function calculatePanelSize() {
      var available = $(window).height();
      if (edge === 'top' || edge === 'bottom') {
        available = $(window).width();
      }
      return available - parseInt(settings.otherOffset) - parseInt(settings.offset);
    }

    var panel = this;

    if (typeof callerSettings == 'string') {
      // param is a string, use command mode
      switch (callerSettings) {
        case 'open':
          if (!isOpen()) this.children('.ui-slideouttab-handle').click();
          break;
        case 'close':
          if (isOpen()) this.children('.ui-slideouttab-handle').click();
          break;
        case 'isOpen':
          return isOpen();
          break;
        case 'toggle':
          this.children('.ui-slideouttab-handle').click();
          break;
        case 'bounce':
          this.children('.ui-slideouttab-handle').trigger('bounce');
          break;
        default:
          throw 'Invalid tabSlideOut command';
      }
    } else {
      // param is an object, it's initialisation mode
      var settings = $.extend({
        tabLocation: 'left', // left, right, top or bottom
        tabHandle: '.handle', // JQuery selector for the tab, can use #
        speed: 300, // time to animate
        action: 'click', // action which will open the panel, e.g. 'hover'
        offset: '200px', // panel dist from top or left (bottom or right if offsetReverse is true)
        offsetReverse: false, // if true, panel is aligned with right or bottom of window
        otherOffset: null, // if set, panel size is set to maintain this dist from bottom or right (top or left if offsetReverse)
        handleOffset: null, // e.g. '10px'. If null, detects panel border to align handle nicely
        handleOffsetReverse: false, // if true, handle aligned with right or bottom of panel
        bounceDistance: '50px', // how far bounce event will move everything
        bounceTimes: 4, // how many bounces when 'bounce' is called
        positioning: 'fixed', // can also use absolute, so tabs move when window scrolls
        tabImage: null, // optional image to show in the tab
        tabImageHeight: null, // optional IE8 and lower only, else autodetected size
        tabImageWidth: null, // optional IE8 and lower only, else autodetected size
        onLoadSlideOut: false, // slide out after DOM load
        clickScreenToClose: true, // close tab when rest of screen clicked
        toggleButton: '.tab-opener', // not often used
        onOpen: function onOpen() {}, // handler called after opening
        onClose: function onClose() {} // handler called after closing
      }, callerSettings || {});

      var edge = settings.tabLocation;
      var handle = settings.tabHandle = $(settings.tabHandle, panel);
      panel.addClass('ui-slideouttab-panel');
      panel.addClass('ui-slideouttab-' + edge);
      if (settings.offsetReverse) panel.addClass('ui-slideouttab-panel-reverse');
      handle.addClass('ui-slideouttab-handle'); // need this to find it later
      if (settings.handleOffsetReverse) handle.addClass('ui-slideouttab-handle-reverse');
      settings.toggleButton = $(settings.toggleButton);

      //ie6 doesn't do well with the fixed option
      if (document.all && !window.opera && !window.XMLHttpRequest) {
        settings.positioning = 'absolute';
      }

      // apply an image if one is defined
      if (settings.tabImage !== null) {
        var imageHeight = 0;
        var imageWidth = 0;
        if (settings.tabImageHeight !== null && settings.tabImageWidth !== null) {
          imageHeight = settings.tabImageHeight;
          imageWidth = settings.tabImageWidth;
        } else {
          var img = new Image();
          img.src = settings.tabImage;
          imageHeight = img.naturalHeight;
          imageWidth = img.naturalWidth;
        }

        handle.addClass('ui-slideouttab-handle-image');
        handle.css({
          background: 'url(' + settings.tabImage + ') no-repeat',
          width: imageWidth,
          height: imageHeight
        });
      }

      handle.css({
        display: 'block',
        position: 'absolute'
      });

      panel.css({
        position: settings.positioning
      });

      // set up alignment information based on settings
      if (edge === 'top' || edge === 'bottom') {
        settings.panelOffsetFrom = settings.offsetReverse ? 'right' : 'left';
        settings.handleOffsetFrom = settings.handleOffsetReverse ? 'right' : 'left';
      } else {
        settings.panelOffsetFrom = settings.offsetReverse ? 'bottom' : 'top';
        settings.handleOffsetFrom = settings.handleOffsetReverse ? 'bottom' : 'top';
      }

      /* autodetect the correct offset for the handle using appropriate panel border*/
      if (settings.handleOffset === null) {
        settings.handleOffset = '-' + borderWidth(panel, settings.handleOffsetFrom) + 'px';
      }

      var sizes = {
        panelWidth: parseInt(panel.outerWidth() + 1, 10) + 'px',
        panelHeight: parseInt(panel.outerHeight() + 1, 10) + 'px',
        handleWidth: parseInt(handle.outerWidth(), 10) + 'px',
        handleHeight: parseInt(handle.outerHeight() + 1, 10) + 'px'
      };

      //
      if (edge === 'top' || edge === 'bottom') {
        /* set left or right edges */
        panel.css(settings.panelOffsetFrom, settings.offset);
        handle.css(settings.handleOffsetFrom, settings.handleOffset);

        // possibly drive the panel size
        if (settings.otherOffset !== null) {
          panel.css('width', calculatePanelSize() + 'px');
          // install resize handler
          $(window).resize(function () {
            panel.css('width', calculatePanelSize() + 'px');
          });
        }

        if (edge === 'top') {
          panel.css({ top: '-' + sizes.panelHeight });
          handle.css({ bottom: '-' + sizes.handleHeight });
        } else {
          panel.css({ bottom: '-' + sizes.panelHeight, position: 'fixed' });
          handle.css({ top: '-' + sizes.handleHeight });
        }
      }

      if (edge === 'left' || edge === 'right') {
        /* set top or bottom edge */
        panel.css(settings.panelOffsetFrom, settings.offset);
        handle.css(settings.handleOffsetFrom, settings.handleOffset);

        // possibly drive the panel size
        if (settings.otherOffset !== null) {
          panel.css('height', calculatePanelSize() + 'px');
          // install resize handler
          $(window).resize(function () {
            panel.css('height', calculatePanelSize() + 'px');
          });
        }

        if (edge === 'left') {
          panel.css({ left: '-' + sizes.panelWidth });
          handle.css({ right: '0' });
        } else {
          panel.css({ right: '-' + sizes.panelWidth });
          handle.css({ left: '0' });

          $('html').css('overflow-x', 'hidden');
        }
      }

      handle.click(function (event) {
        event.preventDefault();
      });
      settings.toggleButton.click(function (event) {
        event.preventDefault();
      });

      var slideIn = function slideIn() {
        var size;
        switch (edge) {
          case 'top':
          case 'bottom':
            size = sizes.panelHeight;
            break;
          case 'left':
          case 'right':
            size = sizes.panelWidth;
        }

        var param = [];
        param[edge] = '-' + size;
        panel.removeClass('ui-slideouttab-open').animate(param, settings.speed, function () {
          panel.trigger('slideouttabclose');
          settings.onClose();
        });
      };

      var slideOut = function slideOut() {
        var param = [];
        // show everything except the border along the edge we're on
        param[edge] = '-' + borderWidth(panel, edge) + 'px';
        panel.animate(param, settings.speed, function () {
          panel.addClass('ui-slideouttab-open').trigger('slideouttabopen');
          settings.onOpen();
        });
      };

      // animate the tab in and out
      var moveIn = [];
      moveIn[edge] = '-=' + settings.bounceDistance;
      var moveOut = [];
      moveOut[edge] = '+=' + settings.bounceDistance;

      var bounceIn = function bounceIn() {
        var temp = panel;
        for (var i = 0; i < settings.bounceTimes; i++) {
          temp = temp.animate(moveIn, settings.speed).animate(moveOut, settings.speed);
        }
        panel.trigger('slideouttabbounce');
      };

      var bounceOut = function bounceOut() {
        var temp = panel;
        for (var i = 0; i < settings.bounceTimes; i++) {
          temp = temp.animate(moveOut, settings.speed).animate(moveIn, settings.speed);
        }
        panel.trigger('slideouttabbounce');
      };

      // handle clicks in rest of document to close tabs if they're open
      var clickScreenToClose = function clickScreenToClose() {
        panel.click(function (event) {
          event.stopPropagation();
        });

        settings.toggleButton.click(function (event) {
          event.stopPropagation();
        });

        $(document).click(function () {
          if (isOpen()) {
            slideIn();
          }
        });
      };

      var clickAction = function clickAction() {
        handle.click(function (event) {
          if (isOpen()) {
            slideIn();
          } else {
            slideOut();
          }
        });
        settings.toggleButton.click(function (event) {
          if (isOpen()) {
            slideIn();
          } else {
            slideOut();
          }
        });
        if (settings.clickScreenToClose) clickScreenToClose();
      };

      var hoverAction = function hoverAction() {
        panel.hover(function () {
          if (!isOpen()) {
            slideOut();
          }
        }, function () {
          if (isOpen()) {
            setTimeout(slideIn, 1000);
          }
        });

        handle.click(function (event) {
          if (isOpen()) {
            slideIn();
          }
        });

        settings.toggleButton.click(function (event) {
          if (isOpen()) {
            slideIn();
          } else {
            slideOut();
          }
        });

        if (settings.clickScreenToClose) clickScreenToClose();
      };

      var slideOutOnLoad = function slideOutOnLoad() {
        slideIn();
        setTimeout(slideOut, 500);
      };

      //choose which type of action to bind
      if (settings.action === 'click') {
        clickAction();
      }

      if (settings.action === 'hover') {
        hoverAction();
      }

      if (settings.onLoadSlideOut) {
        slideOutOnLoad();
      }

      handle.on('bounce', function (event) {
        if (isOpen()) {
          bounceIn();
        } else {
          bounceOut();
        }
      });
    }
    return this;
  };
})(jQuery);
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(4)))

/***/ }),

/***/ 403:
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery) {/**
 * Featherlight - ultra slim jQuery lightbox
 * Version 1.7.12 - http://noelboss.github.io/featherlight/
 *
 * Copyright 2017, Noël Raoul Bossart (http://www.noelboss.com)
 * MIT Licensed.
**/
!function(a){"use strict";function b(a,c){if(!(this instanceof b)){var d=new b(a,c);return d.open(),d}this.id=b.id++,this.setup(a,c),this.chainCallbacks(b._callbackChain)}function c(a,b){var c={};for(var d in a)d in b&&(c[d]=a[d],delete a[d]);return c}function d(a,b){var c={},d=new RegExp("^"+b+"([A-Z])(.*)");for(var e in a){var f=e.match(d);if(f){var g=(f[1]+f[2].replace(/([A-Z])/g,"-$1")).toLowerCase();c[g]=a[e]}}return c}if("undefined"==typeof a)return void("console"in window&&window.console.info("Too much lightness, Featherlight needs jQuery."));if(a.fn.jquery.match(/-ajax/))return void("console"in window&&window.console.info("Featherlight needs regular jQuery, not the slim version."));var e=[],f=function(b){return e=a.grep(e,function(a){return a!==b&&a.$instance.closest("body").length>0})},g={allowfullscreen:1,frameborder:1,height:1,longdesc:1,marginheight:1,marginwidth:1,name:1,referrerpolicy:1,scrolling:1,sandbox:1,src:1,srcdoc:1,width:1},h={keyup:"onKeyUp",resize:"onResize"},i=function(c){a.each(b.opened().reverse(),function(){return c.isDefaultPrevented()||!1!==this[h[c.type]](c)?void 0:(c.preventDefault(),c.stopPropagation(),!1)})},j=function(c){if(c!==b._globalHandlerInstalled){b._globalHandlerInstalled=c;var d=a.map(h,function(a,c){return c+"."+b.prototype.namespace}).join(" ");a(window)[c?"on":"off"](d,i)}};b.prototype={constructor:b,namespace:"featherlight",targetAttr:"data-featherlight",variant:null,resetCss:!1,background:null,openTrigger:"click",closeTrigger:"click",filter:null,root:"body",openSpeed:250,closeSpeed:250,closeOnClick:"background",closeOnEsc:!0,closeIcon:"&#10005;",loading:"",persist:!1,otherClose:null,beforeOpen:a.noop,beforeContent:a.noop,beforeClose:a.noop,afterOpen:a.noop,afterContent:a.noop,afterClose:a.noop,onKeyUp:a.noop,onResize:a.noop,type:null,contentFilters:["jquery","image","html","ajax","iframe","text"],setup:function(b,c){"object"!=typeof b||b instanceof a!=!1||c||(c=b,b=void 0);var d=a.extend(this,c,{target:b}),e=d.resetCss?d.namespace+"-reset":d.namespace,f=a(d.background||['<div class="'+e+"-loading "+e+'">','<div class="'+e+'-content">','<button class="'+e+"-close-icon "+d.namespace+'-close" aria-label="Close">',d.closeIcon,"</button>",'<div class="'+d.namespace+'-inner">'+d.loading+"</div>","</div>","</div>"].join("")),g="."+d.namespace+"-close"+(d.otherClose?","+d.otherClose:"");return d.$instance=f.clone().addClass(d.variant),d.$instance.on(d.closeTrigger+"."+d.namespace,function(b){if(!b.isDefaultPrevented()){var c=a(b.target);("background"===d.closeOnClick&&c.is("."+d.namespace)||"anywhere"===d.closeOnClick||c.closest(g).length)&&(d.close(b),b.preventDefault())}}),this},getContent:function(){if(this.persist!==!1&&this.$content)return this.$content;var b=this,c=this.constructor.contentFilters,d=function(a){return b.$currentTarget&&b.$currentTarget.attr(a)},e=d(b.targetAttr),f=b.target||e||"",g=c[b.type];if(!g&&f in c&&(g=c[f],f=b.target&&e),f=f||d("href")||"",!g)for(var h in c)b[h]&&(g=c[h],f=b[h]);if(!g){var i=f;if(f=null,a.each(b.contentFilters,function(){return g=c[this],g.test&&(f=g.test(i)),!f&&g.regex&&i.match&&i.match(g.regex)&&(f=i),!f}),!f)return"console"in window&&window.console.error("Featherlight: no content filter found "+(i?' for "'+i+'"':" (no target specified)")),!1}return g.process.call(b,f)},setContent:function(b){return this.$instance.removeClass(this.namespace+"-loading"),this.$instance.toggleClass(this.namespace+"-iframe",b.is("iframe")),this.$instance.find("."+this.namespace+"-inner").not(b).slice(1).remove().end().replaceWith(a.contains(this.$instance[0],b[0])?"":b),this.$content=b.addClass(this.namespace+"-inner"),this},open:function(b){var c=this;if(c.$instance.hide().appendTo(c.root),!(b&&b.isDefaultPrevented()||c.beforeOpen(b)===!1)){b&&b.preventDefault();var d=c.getContent();if(d)return e.push(c),j(!0),c.$instance.fadeIn(c.openSpeed),c.beforeContent(b),a.when(d).always(function(a){c.setContent(a),c.afterContent(b)}).then(c.$instance.promise()).done(function(){c.afterOpen(b)})}return c.$instance.detach(),a.Deferred().reject().promise()},close:function(b){var c=this,d=a.Deferred();return c.beforeClose(b)===!1?d.reject():(0===f(c).length&&j(!1),c.$instance.fadeOut(c.closeSpeed,function(){c.$instance.detach(),c.afterClose(b),d.resolve()})),d.promise()},resize:function(a,b){if(a&&b){this.$content.css("width","").css("height","");var c=Math.max(a/(this.$content.parent().width()-1),b/(this.$content.parent().height()-1));c>1&&(c=b/Math.floor(b/c),this.$content.css("width",""+a/c+"px").css("height",""+b/c+"px"))}},chainCallbacks:function(b){for(var c in b)this[c]=a.proxy(b[c],this,a.proxy(this[c],this))}},a.extend(b,{id:0,autoBind:"[data-featherlight]",defaults:b.prototype,contentFilters:{jquery:{regex:/^[#.]\w/,test:function(b){return b instanceof a&&b},process:function(b){return this.persist!==!1?a(b):a(b).clone(!0)}},image:{regex:/\.(png|jpg|jpeg|gif|tiff?|bmp|svg)(\?\S*)?$/i,process:function(b){var c=this,d=a.Deferred(),e=new Image,f=a('<img src="'+b+'" alt="" class="'+c.namespace+'-image" />');return e.onload=function(){f.naturalWidth=e.width,f.naturalHeight=e.height,d.resolve(f)},e.onerror=function(){d.reject(f)},e.src=b,d.promise()}},html:{regex:/^\s*<[\w!][^<]*>/,process:function(b){return a(b)}},ajax:{regex:/./,process:function(b){var c=a.Deferred(),d=a("<div></div>").load(b,function(a,b){"error"!==b&&c.resolve(d.contents()),c.fail()});return c.promise()}},iframe:{process:function(b){var e=new a.Deferred,f=a("<iframe/>"),h=d(this,"iframe"),i=c(h,g);return f.hide().attr("src",b).attr(i).css(h).on("load",function(){e.resolve(f.show())}).appendTo(this.$instance.find("."+this.namespace+"-content")),e.promise()}},text:{process:function(b){return a("<div>",{text:b})}}},functionAttributes:["beforeOpen","afterOpen","beforeContent","afterContent","beforeClose","afterClose"],readElementConfig:function(b,c){var d=this,e=new RegExp("^data-"+c+"-(.*)"),f={};return b&&b.attributes&&a.each(b.attributes,function(){var b=this.name.match(e);if(b){var c=this.value,g=a.camelCase(b[1]);if(a.inArray(g,d.functionAttributes)>=0)c=new Function(c);else try{c=JSON.parse(c)}catch(h){}f[g]=c}}),f},extend:function(b,c){var d=function(){this.constructor=b};return d.prototype=this.prototype,b.prototype=new d,b.__super__=this.prototype,a.extend(b,this,c),b.defaults=b.prototype,b},attach:function(b,c,d){var e=this;"object"!=typeof c||c instanceof a!=!1||d||(d=c,c=void 0),d=a.extend({},d);var f,g=d.namespace||e.defaults.namespace,h=a.extend({},e.defaults,e.readElementConfig(b[0],g),d),i=function(g){var i=a(g.currentTarget),j=a.extend({$source:b,$currentTarget:i},e.readElementConfig(b[0],h.namespace),e.readElementConfig(g.currentTarget,h.namespace),d),k=f||i.data("featherlight-persisted")||new e(c,j);"shared"===k.persist?f=k:k.persist!==!1&&i.data("featherlight-persisted",k),j.$currentTarget.blur&&j.$currentTarget.blur(),k.open(g)};return b.on(h.openTrigger+"."+h.namespace,h.filter,i),i},current:function(){var a=this.opened();return a[a.length-1]||null},opened:function(){var b=this;return f(),a.grep(e,function(a){return a instanceof b})},close:function(a){var b=this.current();return b?b.close(a):void 0},_onReady:function(){var b=this;b.autoBind&&(a(b.autoBind).each(function(){b.attach(a(this))}),a(document).on("click",b.autoBind,function(c){if(!c.isDefaultPrevented()){var d=b.attach(a(c.currentTarget));d(c)}}))},_callbackChain:{onKeyUp:function(b,c){return 27===c.keyCode?(this.closeOnEsc&&a.featherlight.close(c),!1):b(c)},beforeOpen:function(b,c){return a(document.documentElement).addClass("with-featherlight"),this._previouslyActive=document.activeElement,this._$previouslyTabbable=a("a, input, select, textarea, iframe, button, iframe, [contentEditable=true]").not("[tabindex]").not(this.$instance.find("button")),this._$previouslyWithTabIndex=a("[tabindex]").not('[tabindex="-1"]'),this._previousWithTabIndices=this._$previouslyWithTabIndex.map(function(b,c){return a(c).attr("tabindex")}),this._$previouslyWithTabIndex.add(this._$previouslyTabbable).attr("tabindex",-1),document.activeElement.blur&&document.activeElement.blur(),b(c)},afterClose:function(c,d){var e=c(d),f=this;return this._$previouslyTabbable.removeAttr("tabindex"),this._$previouslyWithTabIndex.each(function(b,c){a(c).attr("tabindex",f._previousWithTabIndices[b])}),this._previouslyActive.focus(),0===b.opened().length&&a(document.documentElement).removeClass("with-featherlight"),e},onResize:function(a,b){return this.resize(this.$content.naturalWidth,this.$content.naturalHeight),a(b)},afterContent:function(a,b){var c=a(b);return this.$instance.find("[autofocus]:not([disabled])").focus(),this.onResize(b),c}}}),a.featherlight=b,a.fn.featherlight=function(a,c){return b.attach(this,a,c),this},a(document).ready(function(){b._onReady()})}(jQuery);
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(4)))

/***/ }),

/***/ 404:
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery) {/**
 * Featherlight Gallery – an extension for the ultra slim jQuery lightbox
 * Version 1.7.12 - http://noelboss.github.io/featherlight/
 *
 * Copyright 2017, Noël Raoul Bossart (http://www.noelboss.com)
 * MIT Licensed.
**/
(function($) {
	"use strict";

	var warn = function(m) {
		if(window.console && window.console.warn) {
			window.console.warn('FeatherlightGallery: ' + m);
		}
	};

	if('undefined' === typeof $) {
		return warn('Too much lightness, Featherlight needs jQuery.');
	} else if(!$.featherlight) {
		return warn('Load the featherlight plugin before the gallery plugin');
	}

	var isTouchAware = ('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch,
		jQueryConstructor = $.event && $.event.special.swipeleft && $,
		hammerConstructor = window.Hammer && function($el){
			var mc = new window.Hammer.Manager($el[0]);
			mc.add(new window.Hammer.Swipe());
			return mc;
		},
		swipeAwareConstructor = isTouchAware && (jQueryConstructor || hammerConstructor);
	if(isTouchAware && !swipeAwareConstructor) {
		warn('No compatible swipe library detected; one must be included before featherlightGallery for swipe motions to navigate the galleries.');
	}

	var callbackChain = {
			afterClose: function(_super, event) {
					var self = this;
					self.$instance.off('next.'+self.namespace+' previous.'+self.namespace);
					if (self._swiper) {
						self._swiper
							.off('swipeleft', self._swipeleft) /* See http://stackoverflow.com/questions/17367198/hammer-js-cant-remove-event-listener */
							.off('swiperight', self._swiperight);
						self._swiper = null;
					}
					return _super(event);
			},
			beforeOpen: function(_super, event){
					var self = this;

					self.$instance.on('next.'+self.namespace+' previous.'+self.namespace, function(event){
						var offset = event.type === 'next' ? +1 : -1;
						self.navigateTo(self.currentNavigation() + offset);
					});

					if (swipeAwareConstructor) {
						self._swiper = swipeAwareConstructor(self.$instance)
							.on('swipeleft', self._swipeleft = function()  { self.$instance.trigger('next'); })
							.on('swiperight', self._swiperight = function() { self.$instance.trigger('previous'); });

						self.$instance
							.addClass(this.namespace+'-swipe-aware', swipeAwareConstructor);
					}

					self.$instance.find('.'+self.namespace+'-content')
						.append(self.createNavigation('previous'))
						.append(self.createNavigation('next'));

					return _super(event);
			},
			beforeContent: function(_super, event) {
				var index = this.currentNavigation();
				var len = this.slides().length;
				this.$instance
					.toggleClass(this.namespace+'-first-slide', index === 0)
					.toggleClass(this.namespace+'-last-slide', index === len - 1);
				return _super(event);
			},
			onKeyUp: function(_super, event){
				var dir = {
					37: 'previous', /* Left arrow */
					39: 'next'			/* Rigth arrow */
				}[event.keyCode];
				if(dir) {
					this.$instance.trigger(dir);
					return false;
				} else {
					return _super(event);
				}
			}
		};

	function FeatherlightGallery($source, config) {
		if(this instanceof FeatherlightGallery) {  /* called with new */
			$.featherlight.apply(this, arguments);
			this.chainCallbacks(callbackChain);
		} else {
			var flg = new FeatherlightGallery($.extend({$source: $source, $currentTarget: $source.first()}, config));
			flg.open();
			return flg;
		}
	}

	$.featherlight.extend(FeatherlightGallery, {
		autoBind: '[data-featherlight-gallery]'
	});

	$.extend(FeatherlightGallery.prototype, {
		/** Additional settings for Gallery **/
		previousIcon: '&#9664;',     /* Code that is used as previous icon */
		nextIcon: '&#9654;',         /* Code that is used as next icon */
		galleryFadeIn: 100,          /* fadeIn speed when image is loaded */
		galleryFadeOut: 300,         /* fadeOut speed before image is loaded */

		slides: function() {
			if (this.filter) {
				return this.$source.find(this.filter);
			}
			return this.$source;
		},

		images: function() {
			warn('images is deprecated, please use slides instead');
			return this.slides();
		},

		currentNavigation: function() {
			return this.slides().index(this.$currentTarget);
		},

		navigateTo: function(index) {
			var self = this,
				source = self.slides(),
				len = source.length,
				$inner = self.$instance.find('.' + self.namespace + '-inner');
			index = ((index % len) + len) % len; /* pin index to [0, len[ */

			self.$currentTarget = source.eq(index);
			self.beforeContent();
			return $.when(
				self.getContent(),
				$inner.fadeTo(self.galleryFadeOut,0.2)
			).always(function($newContent) {
					self.setContent($newContent);
					self.afterContent();
					$newContent.fadeTo(self.galleryFadeIn,1);
			});
		},

		createNavigation: function(target) {
			var self = this;
			return $('<span title="'+target+'" class="'+this.namespace+'-'+target+'"><span>'+this[target+'Icon']+'</span></span>').click(function(evt){
				$(this).trigger(target+'.'+self.namespace);
				evt.preventDefault();
			});
		}
	});

	$.featherlightGallery = FeatherlightGallery;

	/* extend jQuery with selector featherlight method $(elm).featherlight(config, elm); */
	$.fn.featherlightGallery = function(config) {
		FeatherlightGallery.attach(this, config);
		return this;
	};

	/* bind featherlight on ready if config autoBind is set */
	$(document).ready(function(){ FeatherlightGallery._onReady(); });

}(jQuery));

/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(4)))

/***/ }),

/***/ 405:
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_RESULT__;/*!
 * JavaScript Cookie v2.2.0
 * https://github.com/js-cookie/js-cookie
 *
 * Copyright 2006, 2015 Klaus Hartl & Fagner Brack
 * Released under the MIT license
 */
;(function (factory) {
	var registeredInModuleLoader = false;
	if (true) {
		!(__WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
				__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
				(__WEBPACK_AMD_DEFINE_FACTORY__.call(exports, __webpack_require__, exports, module)) :
				__WEBPACK_AMD_DEFINE_FACTORY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
		registeredInModuleLoader = true;
	}
	if (true) {
		module.exports = factory();
		registeredInModuleLoader = true;
	}
	if (!registeredInModuleLoader) {
		var OldCookies = window.Cookies;
		var api = window.Cookies = factory();
		api.noConflict = function () {
			window.Cookies = OldCookies;
			return api;
		};
	}
}(function () {
	function extend () {
		var i = 0;
		var result = {};
		for (; i < arguments.length; i++) {
			var attributes = arguments[ i ];
			for (var key in attributes) {
				result[key] = attributes[key];
			}
		}
		return result;
	}

	function init (converter) {
		function api (key, value, attributes) {
			var result;
			if (typeof document === 'undefined') {
				return;
			}

			// Write

			if (arguments.length > 1) {
				attributes = extend({
					path: '/'
				}, api.defaults, attributes);

				if (typeof attributes.expires === 'number') {
					var expires = new Date();
					expires.setMilliseconds(expires.getMilliseconds() + attributes.expires * 864e+5);
					attributes.expires = expires;
				}

				// We're using "expires" because "max-age" is not supported by IE
				attributes.expires = attributes.expires ? attributes.expires.toUTCString() : '';

				try {
					result = JSON.stringify(value);
					if (/^[\{\[]/.test(result)) {
						value = result;
					}
				} catch (e) {}

				if (!converter.write) {
					value = encodeURIComponent(String(value))
						.replace(/%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g, decodeURIComponent);
				} else {
					value = converter.write(value, key);
				}

				key = encodeURIComponent(String(key));
				key = key.replace(/%(23|24|26|2B|5E|60|7C)/g, decodeURIComponent);
				key = key.replace(/[\(\)]/g, escape);

				var stringifiedAttributes = '';

				for (var attributeName in attributes) {
					if (!attributes[attributeName]) {
						continue;
					}
					stringifiedAttributes += '; ' + attributeName;
					if (attributes[attributeName] === true) {
						continue;
					}
					stringifiedAttributes += '=' + attributes[attributeName];
				}
				return (document.cookie = key + '=' + value + stringifiedAttributes);
			}

			// Read

			if (!key) {
				result = {};
			}

			// To prevent the for loop in the first place assign an empty array
			// in case there are no cookies at all. Also prevents odd result when
			// calling "get()"
			var cookies = document.cookie ? document.cookie.split('; ') : [];
			var rdecode = /(%[0-9A-Z]{2})+/g;
			var i = 0;

			for (; i < cookies.length; i++) {
				var parts = cookies[i].split('=');
				var cookie = parts.slice(1).join('=');

				if (!this.json && cookie.charAt(0) === '"') {
					cookie = cookie.slice(1, -1);
				}

				try {
					var name = parts[0].replace(rdecode, decodeURIComponent);
					cookie = converter.read ?
						converter.read(cookie, name) : converter(cookie, name) ||
						cookie.replace(rdecode, decodeURIComponent);

					if (this.json) {
						try {
							cookie = JSON.parse(cookie);
						} catch (e) {}
					}

					if (key === name) {
						result = cookie;
						break;
					}

					if (!key) {
						result[name] = cookie;
					}
				} catch (e) {}
			}

			return result;
		}

		api.set = api;
		api.get = function (key) {
			return api.call(api, key);
		};
		api.getJSON = function () {
			return api.apply({
				json: true
			}, [].slice.call(arguments));
		};
		api.defaults = {};

		api.remove = function (key, attributes) {
			api(key, '', extend(attributes, {
				expires: -1
			}));
		};

		api.withConverter = init;

		return api;
	}

	return init(function () {});
}));


/***/ }),

/***/ 410:
/***/ (function(module, exports) {

// Generated by CoffeeScript 1.6.2
/**
@license Sticky-kit v1.1.3 | WTFPL | Leaf Corcoran 2015 | http://leafo.net
*/


(function() {
  var $, win;

  $ = this.jQuery || window.jQuery;

  win = $(window);

  $.fn.stick_in_parent = function(opts) {
    var doc, elm, enable_bottoming, inner_scrolling, manual_spacer, offset_top, outer_width, parent_selector, recalc_every, sticky_class, _fn, _i, _len;

    if (opts == null) {
      opts = {};
    }
    sticky_class = opts.sticky_class, inner_scrolling = opts.inner_scrolling, recalc_every = opts.recalc_every, parent_selector = opts.parent, offset_top = opts.offset_top, manual_spacer = opts.spacer, enable_bottoming = opts.bottoming;
    if (offset_top == null) {
      offset_top = 0;
    }
    if (parent_selector == null) {
      parent_selector = void 0;
    }
    if (inner_scrolling == null) {
      inner_scrolling = true;
    }
    if (sticky_class == null) {
      sticky_class = "is_stuck";
    }
    doc = $(document);
    if (enable_bottoming == null) {
      enable_bottoming = true;
    }
    outer_width = function(el) {
      var computed, w, _el;

      if (window.getComputedStyle) {
        _el = el[0];
        computed = window.getComputedStyle(el[0]);
        w = parseFloat(computed.getPropertyValue("width")) + parseFloat(computed.getPropertyValue("margin-left")) + parseFloat(computed.getPropertyValue("margin-right"));
        if (computed.getPropertyValue("box-sizing") !== "border-box") {
          w += parseFloat(computed.getPropertyValue("border-left-width")) + parseFloat(computed.getPropertyValue("border-right-width")) + parseFloat(computed.getPropertyValue("padding-left")) + parseFloat(computed.getPropertyValue("padding-right"));
        }
        return w;
      } else {
        return el.outerWidth(true);
      }
    };
    _fn = function(elm, padding_bottom, parent_top, parent_height, top, height, el_float, detached) {
      var bottomed, detach, fixed, last_pos, last_scroll_height, offset, parent, recalc, recalc_and_tick, recalc_counter, spacer, tick;

      if (elm.data("sticky_kit")) {
        return;
      }
      elm.data("sticky_kit", true);
      last_scroll_height = doc.height();
      parent = elm.parent();
      if (parent_selector != null) {
        parent = parent.closest(parent_selector);
      }
      if (!parent.length) {
        throw "failed to find stick parent";
      }
      fixed = false;
      bottomed = false;
      spacer = manual_spacer != null ? manual_spacer && elm.closest(manual_spacer) : $("<div />");
      if (spacer) {
        spacer.css('position', elm.css('position'));
      }
      recalc = function() {
        var border_top, padding_top, restore;

        if (detached) {
          return;
        }
        last_scroll_height = doc.height();
        border_top = parseInt(parent.css("border-top-width"), 10);
        padding_top = parseInt(parent.css("padding-top"), 10);
        padding_bottom = parseInt(parent.css("padding-bottom"), 10);
        parent_top = parent.offset().top + border_top + padding_top;
        parent_height = parent.height();
        if (fixed) {
          fixed = false;
          bottomed = false;
          if (manual_spacer == null) {
            elm.insertAfter(spacer);
            spacer.detach();
          }
          elm.css({
            position: "",
            top: "",
            width: "",
            bottom: ""
          }).removeClass(sticky_class);
          restore = true;
        }
        top = elm.offset().top - (parseInt(elm.css("margin-top"), 10) || 0) - offset_top;
        height = elm.outerHeight(true);
        el_float = elm.css("float");
        if (spacer) {
          spacer.css({
            width: outer_width(elm),
            height: height,
            display: elm.css("display"),
            "vertical-align": elm.css("vertical-align"),
            "float": el_float
          });
        }
        if (restore) {
          return tick();
        }
      };
      recalc();
      if (height === parent_height) {
        return;
      }
      last_pos = void 0;
      offset = offset_top;
      recalc_counter = recalc_every;
      tick = function() {
        var css, delta, recalced, scroll, will_bottom, win_height;

        if (detached) {
          return;
        }
        recalced = false;
        if (recalc_counter != null) {
          recalc_counter -= 1;
          if (recalc_counter <= 0) {
            recalc_counter = recalc_every;
            recalc();
            recalced = true;
          }
        }
        if (!recalced && doc.height() !== last_scroll_height) {
          recalc();
          recalced = true;
        }
        scroll = win.scrollTop();
        if (last_pos != null) {
          delta = scroll - last_pos;
        }
        last_pos = scroll;
        if (fixed) {
          if (enable_bottoming) {
            will_bottom = scroll + height + offset > parent_height + parent_top;
            if (bottomed && !will_bottom) {
              bottomed = false;
              elm.css({
                position: "fixed",
                bottom: "",
                top: offset
              }).trigger("sticky_kit:unbottom");
            }
          }
          if (scroll < top) {
            fixed = false;
            offset = offset_top;
            if (manual_spacer == null) {
              if (el_float === "left" || el_float === "right") {
                elm.insertAfter(spacer);
              }
              spacer.detach();
            }
            css = {
              position: "",
              width: "",
              top: ""
            };
            elm.css(css).removeClass(sticky_class).trigger("sticky_kit:unstick");
          }
          if (inner_scrolling) {
            win_height = win.height();
            if (height + offset_top > win_height) {
              if (!bottomed) {
                offset -= delta;
                offset = Math.max(win_height - height, offset);
                offset = Math.min(offset_top, offset);
                if (fixed) {
                  elm.css({
                    top: offset + "px"
                  });
                }
              }
            }
          }
        } else {
          if (scroll > top) {
            fixed = true;
            css = {
              position: "fixed",
              top: offset
            };
            css.width = elm.css("box-sizing") === "border-box" ? elm.outerWidth() + "px" : elm.width() + "px";
            elm.css(css).addClass(sticky_class);
            if (manual_spacer == null) {
              elm.after(spacer);
              if (el_float === "left" || el_float === "right") {
                spacer.append(elm);
              }
            }
            elm.trigger("sticky_kit:stick");
          }
        }
        if (fixed && enable_bottoming) {
          if (will_bottom == null) {
            will_bottom = scroll + height + offset > parent_height + parent_top;
          }
          if (!bottomed && will_bottom) {
            bottomed = true;
            if (parent.css("position") === "static") {
              parent.css({
                position: "relative"
              });
            }
            return elm.css({
              position: "absolute",
              bottom: padding_bottom,
              top: "auto"
            }).trigger("sticky_kit:bottom");
          }
        }
      };
      recalc_and_tick = function() {
        recalc();
        return tick();
      };
      detach = function() {
        detached = true;
        win.off("touchmove", tick);
        win.off("scroll", tick);
        win.off("resize", recalc_and_tick);
        $(document.body).off("sticky_kit:recalc", recalc_and_tick);
        elm.off("sticky_kit:detach", detach);
        elm.removeData("sticky_kit");
        elm.css({
          position: "",
          bottom: "",
          top: "",
          width: ""
        });
        parent.position("position", "");
        if (fixed) {
          if (manual_spacer == null) {
            if (el_float === "left" || el_float === "right") {
              elm.insertAfter(spacer);
            }
            spacer.remove();
          }
          return elm.removeClass(sticky_class);
        }
      };
      win.on("touchmove", tick);
      win.on("scroll", tick);
      win.on("resize", recalc_and_tick);
      $(document.body).on("sticky_kit:recalc", recalc_and_tick);
      elm.on("sticky_kit:detach", detach);
      return setTimeout(tick, 0);
    };
    for (_i = 0, _len = this.length; _i < _len; _i++) {
      elm = this[_i];
      _fn($(elm));
    }
    return this;
  };

}).call(this);


/***/ }),

/***/ 635:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(228);
__webpack_require__(231);
__webpack_require__(232);
module.exports = __webpack_require__(230);


/***/ })

},[635]);