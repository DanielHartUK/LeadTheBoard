// Set the size of the drawer to equal that of the user div. NOTE: This will only have a visual effect if the browser window width exceeds a certain point, as the drawer has a minimum width
function layouts () {
$('.drawer').width($('.user').outerWidth());
$('.drawer.closed').css('left', -$('.drawer').outerWidth());
$('.adminCont').width($(window).width() - $('.drawer').outerWidth());

}
$(document).ready(layouts);
$(window).resize(layouts);

// Open the drawer
function openDrawer () {
$('.drawer').removeClass('closed');
$('.drawer').css('left', '0');
$('.sideBlock').addClass('drawerO');
c = $('.drawerMove').css('padding-left');
$('.drawerMove').css('padding-left', $('.drawer').outerWidth() + parseInt(c));
$('.sectionNavigation').css('width', '100%');
$('.mainBlock').css('width', '100%');

}

// Close the drawer
function closeDrawer () {
$('.drawer').addClass('closed');
$('.drawer.closed').css('left', -$('.drawer').outerWidth());
$('.sideBlock').removeClass('drawerO');
$('.drawerMove').css('padding-left', $('.drawer').outerWidth() + parseInt(c));
$('.drawerMove').attr('style', function(i, style) { return style.replace(/padding-left[^;]+;?/g, '');}); // Remove the inline styles added by opening the drawer
$('.sectionNavigation').attr('style', function(i, style) { return style.replace(/width[^;]+;?/g, '');}); // Remove the inline styles added by opening the drawer
$('.mainBlock').attr('style', function(i, style) { return style.replace(/width[^;]+;?/g, '');}); // Remove the inline styles added by opening the drawer
}
