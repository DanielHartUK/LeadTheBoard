// Set the size of the drawer to equal that of the user div. NOTE: This will only have a visual effect if the browser window width exceeds a certain point, as the drawer has a minimum width
function layouts () {
$('.drawer').width($('.user').outerWidth());
}
$(document).ready(layouts);
$(window).resize(layouts);

// Open the drawer
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

// Close the drawer
function closeDrawer () {
$('.drawer').addClass('closed');
$('.sideBlock').removeClass('drawerO');
$('.content').css('padding-left', $('.drawer').outerWidth() + parseInt(c));
$('.footer').css('padding-left', $('.drawer').outerWidth() + parseInt(f));
$('.sectionNavigation').css('width', '100%');
$('.mainBlock').css('width', '100%');
$('.content').attr('style', function(i, style) { return style.replace(/padding-left[^;]+;?/g, '');}); // Remove the inline styles added by opening the drawer
$('.footer').attr('style', function(i, style) { return style.replace(/padding-left[^;]+;?/g, '');}); // Remove the inline styles added by opening the drawer
$('.sectionNavigation').attr('style', function(i, style) { return style.replace(/width[^;]+;?/g, '');}); // Remove the inline styles added by opening the drawer
$('.mainBlock').attr('style', function(i, style) { return style.replace(/width[^;]+;?/g, '');}); // Remove the inline styles added by opening the drawer
}
