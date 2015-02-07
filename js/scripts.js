$(window).load(function() {
  $("body").removeClass("preload");
});
$(window).resize(function() {
    $("body").addClass("preload");
  setTimeout(function() {
    $("body").removeClass("preload");
  }, 1);
});
// jQuery rotation - http://stackoverflow.com/a/17348698
  var rotation = 0;
  jQuery.fn.rotate = function(degrees) {
      $(this).css({'-webkit-transform' : 'rotate('+ degrees +'deg)',
                   '-moz-transform' : 'rotate('+ degrees +'deg)',
                   '-ms-transform' : 'rotate('+ degrees +'deg)',
                   'transform' : 'rotate('+ degrees +'deg)'});
      return $(this);
  };

// Set width of notifications div to match that of the 'User' div in the nav bar so that the logo is centred
function navFlexSize() {
  $('.notificationIcon').width($('.user').width());
}
$(document).ready(navFlexSize);
$(window).resize(navFlexSize);

function highlightUnlockableLoad() {
  if(window.location.hash) {
    highlightUnlockable();
  }
}
gclickCount = 0;
// Goat gallop
$('.gallop').click(function() {
  if (gclickCount >= 5) {
    $(this).css('transition', '4s');
    $(this).css('left', $(this).width() + 50 + $(window).width());
    setTimeout(function() {
      $('.gallop').css('left', 0);
      $('.gallop').css('transform', 'scale(1)');
      gclickCount = 0;
    }, 4000);
  } else {
    $(this).css('transition', '0.5s');
  }
  gclickCount ++;

  var scale = gclickCount * 1.25;
  $(this).css('transform', 'scale('+scale+')');

});

function highlightUnlockable() {
  var url = window.location.href;
  var id = '#' + url.substr(url.indexOf("#") + 1);
  $('.unlockableListCont').removeClass('selected');
  setTimeout(function() {
    $(id).next().addClass('selected');
  }, 1);
}

// Showing/Hiding login containers
//  var login = false
//  function loginClick() {
//    if (login) {
//      hideLogin()
//      $(".loginContainers").toggleClass("visible");
//    } else {
//      $(".loginContainers").toggleClass("visible");
//      showLogin()
//    }
//  }
//  function showLogin() {
//    login = true
//    $("contentContainer").toggleClass("noScroll");
//    $("#login").addClass("visible");
//    $(".loginEmail").focus();
//  }
//  function hideLogin() {
//    login = false
//    $("contentContainer").toggleClass("noScroll");
//  }
//
//  function registerClick() {
//    $("#login").removeClass("visible");
//    $("#register").addClass("visible");
//    $(".registerFirstName").focus();
//  }
//  function forgotClick() {
//    $("#login").removeClass("visible");
//    $("#forgot").addClass("visible");
//    $(".forgotEmail").focus();
//  }
//  function registerLoginClick() {
//    $("#forgot").removeClass("visible");
//    $("#register").removeClass("visible");
//    $("#login").addClass("visible");  
//    $(".loginEmail").focus();
//  }
//  function closeEntry () {
//    login = false
//    $(".loginContainers").removeClass("visible");
//    $("#register").removeClass("visible");
//    $("#login").removeClass("visible");
//  }

// Floating table head - http://mkoryak.github.io/floatThead/
//var pageTop = $('.nav').height();
//$('table').floatThead({
//    scrollingTop: pageTop,
//    useAbsolutePositioning: true //the default value
//});
//

// Cheet
  cheet('s p i n', function () {
    rotation += 36360;
    $('img').css('transition', '10s');
    $('img').rotate(rotation);
    $('.gallop').css('transition', '10s');
    $('.gallop').rotate(rotation);
    

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
// $(function() {
//   $('a[href*=#]:not([href=#])').click(function() {
//     if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
//       var target = $(this.hash);
//       target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
//       if (target.length) {
//         $('html,body').animate({
//           scrollTop: target.offset().top
//         }, 1000);
//         return false;
//       }
//     }
//   });
// });

