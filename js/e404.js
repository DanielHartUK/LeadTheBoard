function space1() {
	$('.space1').css('background-image', 'url(../assets/404/space_1.svg)');
	setTimeout(function() {
		$('.space1').css('background-image', 'url(../assets/404/space_2.svg)');
	}, 1000);
};

function space2() {
	$('.space2').css('background-image', 'url(../assets/404/space_3.svg)');
	setTimeout(function() {
		$('.space2').css('background-image', 'url(../assets/404/space_4.svg)');
	}, 1000);
};

function space3() {
	$('.space3').css('background-image', 'url(../assets/404/space_5.svg)');
	setTimeout(function() {
		$('.space3').css('background-image', 'url(../assets/404/space_6.svg)');
	}, 1000);
};

function flutter() {
	$('.player').css('background-image', 'url(../assets/404/space_9.svg)');
	setTimeout(function() {
		$('.player').css('background-image', 'url(../assets/404/space_10.svg)');
	}, 100);
};

space1();
space2();
space3();
setInterval( space1 , 2000);
setInterval( space2 , 2000);
setInterval( space3 , 2000);

function fireR() {
	var position = $('#murderer').position();
	$('.missiles').css('top', position.top + $('#murderer').outerHeight() ).css('left', position.left + 15);
		console.log(position.top);
	$('.missiles').addClass('ready');
};
function fire() {
	var position = $('#murderer').position();
	$('.missiles').css('top', position.top + $('#murderer').outerHeight() )
	$('.missiles').addClass('ready');
	setTimeout(function() {
		var positionp = $('.players').position();
		$('.missiles').css('top', positionp.top);
	}, 100)
	setTimeout(function() {
		$('.missiles').css('display', 'none');
		$('.player').addClass('dead');
		flutter();
		setInterval( flutter , 200);
		$('p.message').addClass('visible');
	}, 2000)
}
$(document).ready(fireR);
$(document).ready(fire);
