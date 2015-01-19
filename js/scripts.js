$('.achievementCircle').mouseover (function() {
   if (!$(this).parent().hasClass('selected')) {
     $('.achievementDetails').css('animation', 'none');
     $('.achievementCircleCont').removeClass('selected')
     $(this).parent().addClass('selected')
     x = $(this).data('icon');
     icon = 'url(../assets/achievements/' + x + ')';
     title = $(this).data('name');
     desc = $(this).data('desc');
     $('.achievementDetails').css('animation', 'fadeOut 0.3s');
     window.setTimeout(function() { 
         $('.achievementTitle').text(title); 
         $('.achievementDesc').text(desc);
     }, 300);
     setTimeout(function() { 
         $('.achievementDetails').css('animation', 'fadeIn 0.3s');
     }, 300);
     $('.achievementXP Span').text($(this).data('xp'));
     $('.achievementIcon').css('background-image', icon); 
  }
});
$('.questCircle').mouseover (function() {
   if (!$(this).parent().hasClass('selected')) {
     $('.questDetails').css('animation', 'none');
     $('.questCircleCont').removeClass('selected')
     $(this).parent().addClass('selected')
     x = $(this).data('icon');
     icon = 'url(../assets/quests/' + x + ')';
     title = $(this).data('name');
     desc = $(this).data('desc');
     $('.questDetails').css('animation', 'fadeOut 0.3s');
     window.setTimeout(function() { 
         $('.questTitle').text(title); 
         $('.questDesc').text(desc);
     }, 300);
     setTimeout(function() { 
         $('.questDetails').css('animation', 'fadeIn 0.3s');
     }, 300);
     $('.questXP Span').text($(this).data('xp'));
     $('.questIcon').css('background-image', icon); 
  }
});




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

