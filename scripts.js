// Keeping the footer at the bottom of the page
function keepFooterInPlace() {
	x = $(".footer").height();
	$(".wrapper").css("padding-bottom", x);
}
$(document).ready(keepFooterInPlace);
$(window).resize(keepFooterInPlace);

// Show Nav Menu
function toggleMenu() {
    $(".menu").toggleClass("visible");
    if ($(".menu").hasClass("visible")) {
        $("#toggleMenu").text("Close Menu");
    } else {
        $("#toggleMenu").text("Menu");
    }
    $(".mNav li").toggleClass("open");
}

// Slider
var scrollAmount = 0 
var scrollCount = 1
var scrollWait = 5000 // Duration of slider

function scrollSlider() {
	if (scrollCount < slidesNo) {
		scrollAmount =  100 * scrollCount 
    scrollCount = scrollCount + 1
    videoPause()
		$(".slider").css("right", scrollAmount + "%" );
	} else {
		scrollAmount = 0
		scrollCount = 1
    videoPause()
		$(".slider").css("right", "0%")
	}
}
  var htmlPlayer = document.getElementsByTagName('video');

function pausePlayer() {
  for(var i = 0; i < htmlPlayer.length; i++){
    if ($(htmlPlayer[i]).hasClass("slideVideo")) {
      htmlPlayer[i].pause();
    }
  }
}
function videoPause() {
  pausePlayer()
  currentSlide = "slide" + scrollCount
  if ($("#"+currentSlide).has("video").length > 0) {  
    videoCount = scrollCount
    document.getElementById("video" + videoCount).play()

  } else {
    document.getElementById("video" + videoCount).pause()
  }
}
function sliderPause() {
	clearInterval(timer);
}
function sliderResume() {
	timer = window.setInterval(scrollSlider, scrollWait);
}
function slider() {
	slidesNo = $(".slide").length;
	$(".slider").width( 100 * slidesNo + "%" );
	$(".slide").width( 100 / slidesNo + "%" );
	slideWidth = $(".slide").width();
}
$(document).ready(slider);
$(window).resize(slider);
$(document).ready(function() {
 	timer = window.setInterval(scrollSlider, scrollWait);
});

 		



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

