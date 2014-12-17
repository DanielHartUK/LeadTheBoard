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
function registerLoginClick() {
  $("#login").addClass("visible");
  $("#register").removeClass("visible");
  $(".loginEmail").focus();
}
function closeEntry () {
  login = false
  $(".loginContainers").removeClass("visible");
  $("#register").removeClass("visible");
  $("#login").removeClass("visible");

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

