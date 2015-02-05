$(document).ready(function() {
  i = 0;
  while (i < $(".statChartHolder").length) {
          var $ppc = $('.progress-pie-chart'+i),
            percent = parseInt($ppc.data('percent')),
            deg = 360*percent/100;
          if (percent > 50) {
            $ppc.addClass('gt-50');
          }
          $('.ppc-progress-fill'+i).css('transform','rotate('+ deg +'deg)');
    i++
     
  }
});