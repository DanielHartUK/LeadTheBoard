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

var pageTop = $('.nav').height();
$('table').floatThead({
    scrollingTop: pageTop,
    useAbsolutePositioning: true //the default value
});

$( document ).ready( function() {
  $( ".questThumb" ).imageMask( "../assets/hexmask.jpg" );
} );

function layouts () {
  $('.drawer').width($('.box').width());
  cPadding = parseFloat($(".content").css("padding-left"));
}
$(document).ready(layouts);
$(window).resize(layouts);

function openDrawer () {
  content = $(".content");
  var x = $('.drawer').width() + cPadding;
  $('.drawer').removeClass("closed");
  $('.content').css("padding-left", x);
  $('.mainBlock').addClass("drawerO");
  $('.sideBlock').addClass("drawerO");
  $('.sectionNavigation').addClass("drawerO");
}

function closeDrawer () {
  var x = cPadding;
  $('.drawer').addClass("closed");
  $('.content').css("padding-left", x);
  $('.mainBlock').removeClass("drawerO");
  $('.sideBlock').removeClass("drawerO");
  $('.sectionNavigation').removeClass("drawerO");
}

// Smooth Scrolling 

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

