function layouts () {
  if ($('.mainBlock').length) {
  $('.drawer').width($(window).width() - $('.mainBlock').width() - $(window).width() / 100 * 1);
  } else {
  $('.drawer').width($(window).width() - $('.content').width() - $(window).width() / 100 * 1);
  }
  cPadding = parseFloat($(".content").css("padding-left"));
  fPadding = parseFloat($(".footer").css("padding-left"));
}
$(document).ready(layouts);
$(window).resize(layouts);

function openDrawer () {
  layouts()
  content = $(".content");
  var x = $('.drawer').width() + cPadding;
  var f = $('.drawer').width() + fPadding;
  $('.drawer').removeClass("closed");
  $('.content').css("padding-left", x);
  $('.footer').css("padding-left", f);
  $('.mainBlock').addClass("drawerO");
  $('.sideBlock').addClass("drawerO");
  $('.sectionNavigation').addClass("drawerO");
}

function closeDrawer () {
  $('.drawer').addClass("closed");
  $('.content').attr('style', function(i, style)
  {
      return style.replace(/padding-left[^;]+;?/g, '');
  });
  $('.footer').attr('style', function(i, style)
  {
      return style.replace(/padding-left[^;]+;?/g, '');
  });
  $('.mainBlock').removeClass("drawerO");
  $('.sideBlock').removeClass("drawerO");
  $('.sectionNavigation').removeClass("drawerO");
}
