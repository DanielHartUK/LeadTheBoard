function adminLayouts () {
  var x = $(window).width() - $('.drawer').width();
  $('.admin').css('width', x);
}
$(document).ready(adminLayouts);
$(window).resize(adminLayouts);
