function layouts () {
$('.drawer').width($('.user').outerWidth());

}
$(document).ready(layouts);
$(window).resize(layouts);

function openDrawer () {
$('.drawer').removeClass('closed');
$('.sideBlock').addClass('drawerO');
c = $('.content').css('padding-left');
f = $('.footer').css('padding-left');
$('.content').css('padding-left', $('.drawer').outerWidth() + parseInt(c));
$('.footer').css('padding-left', $('.drawer').outerWidth() + parseInt(f));
$('.sectionNavigation').css('width', '100%');
$('.mainBlock').css('width', '100%');
}

function closeDrawer () {
$('.drawer').addClass('closed');
$('.sideBlock').removeClass('drawerO');
$('.content').css('padding-left', $('.drawer').outerWidth() + parseInt(c));
$('.footer').css('padding-left', $('.drawer').outerWidth() + parseInt(f));
$('.sectionNavigation').css('width', '100%');
$('.mainBlock').css('width', '100%');
$('.content').attr('style', function(i, style) { return style.replace(/padding-left[^;]+;?/g, '');});
$('.footer').attr('style', function(i, style) { return style.replace(/padding-left[^;]+;?/g, '');}); 
$('.sectionNavigation').attr('style', function(i, style) { return style.replace(/width[^;]+;?/g, '');});
$('.mainBlock').attr('style', function(i, style) { return style.replace(/width[^;]+;?/g, '');}); 
}
