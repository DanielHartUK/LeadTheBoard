// jQuery rotation - http://stackoverflow.com/a/17348698
  var rotation = 0;
  jQuery.fn.rotate = function(degrees) {
      $(this).css({'-webkit-transform' : 'rotate('+ degrees +'deg)',
                   '-moz-transform' : 'rotate('+ degrees +'deg)',
                   '-ms-transform' : 'rotate('+ degrees +'deg)',
                   'transform' : 'rotate('+ degrees +'deg)'});
      return $(this);
  };
function navFlexSize() {
  $('.notificationIcon').width($('.user').width());
}
$(document).ready(navFlexSize);
$(window).resize(navFlexSize);
// Showing/Hiding login containers
  var login = false
  function loginClick() {
    if (login) {
      hideLogin()
      $(".loginContainers").toggleClass("visible");
    } else {
      $(".loginContainers").toggleClass("visible");
      showLogin()
    }
  }
  function showLogin() {
    login = true
    $("contentContainer").toggleClass("noScroll");
    $("#login").addClass("visible");
    $(".loginEmail").focus();
  }
  function hideLogin() {
    login = false
    $("contentContainer").toggleClass("noScroll");
  }

  function registerClick() {
    $("#login").removeClass("visible");
    $("#register").addClass("visible");
    $(".registerFirstName").focus();
  }
  function forgotClick() {
    $("#login").removeClass("visible");
    $("#forgot").addClass("visible");
    $(".forgotEmail").focus();
  }
  function registerLoginClick() {
    $("#forgot").removeClass("visible");
    $("#register").removeClass("visible");
    $("#login").addClass("visible");  
    $(".loginEmail").focus();
  }
  function closeEntry () {
    login = false
    $(".loginContainers").removeClass("visible");
    $("#register").removeClass("visible");
    $("#login").removeClass("visible");
  }

// Floating table head - http://mkoryak.github.io/floatThead/
var pageTop = $('.nav').height();
$('table').floatThead({
    scrollingTop: pageTop,
    useAbsolutePositioning: true //the default value
});


// Cheet
  cheet('g o a t', function () {
    rotation += 36360;
    $('img').css('transition', '10s');
    $('img').rotate(rotation);

  });
  cheet('↑ → ↓ ←', function () {
    rotation += 45;
    $('body').rotate(rotation);
  });
  cheet('↑ ← ↓ →', function () {
    rotation -= 45;
    $('body').rotate(rotation);
  });

// Smooth Scrolling - http://css-tricks.com/snippets/jquery/smooth-scrolling/
  $(function() {
    $('a[href*=#]:not([href=#])').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html,body').animate({
            scrollTop: target.offset().top
          }, 1000);
          return false;
        }
      }
    });
  });

