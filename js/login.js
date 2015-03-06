function checkEmpty() {
    var empty = $('#register').find("input").filter(function() {
        return this.value === "";
    });
    if(empty.length) {
        $(".submit").addClass("red").attr('disabled','disabled');
    } else {
    	$(".submit").removeClass("red").addClass("blue").removeAttr('disabled');
    }
};

$(".login.register input").keyup(function() {
	$(".loginEmail, .loginConfirm").blur(function() {
		if ($('.loginEmail').val().length != 0 & $('.loginConfirm').val().length != 0) {
		    if($(".loginEmail").val() == $(".loginConfirm").val()) {
		    	$(".loginEmail").removeClass("valFaile"); 
		    	$(".loginConfirm").removeClass("valFaile");
		    	$(".loginEmail").prev().css('display', 'none'); 
				validEmail()

		    } else {
		    	$(".submit").addClass("red").attr('disabled','disabled');
		    	$(".loginEmail").addClass("valFaile"); 
		    	$(".loginConfirm").addClass("valFaile"); 
		    	$(".loginEmail").prev().text("Emails don't match"); 
		    	$(".loginEmail").prev().css('display', 'block'); 
		    }		
		}
	});
});

function validEmail() {
	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{1,30})+$/;
	if (!regex.test($(".login.register .loginEmail").val())) {
		$('loginEmail').addClass("valFaile"); 
		$(".loginEmail").prev().text("Email isn't valid");
		$(".loginEmail").prev().css('display', 'block'); 
	} else {
		$('loginEmail').removeClass("valFaile");
		$(".loginEmail").prev().css('display', 'none'); 
		checkEmpty() 
	}
};

$(".login.register .loginPassword").blur(function() {
	$(this).addClass("valFaile"); 
	var pass = $('.loginPassword').val();
	var regex = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;
	if( !regex.test(pass)) {
		$('.loginPassword').prev().css('color', 'red');
		$('.loginPassword').addClass("valFaile"); 
	} else {
		$('.loginPassword').prev().attr('style', function(i, style) { return style.replace(/color[^;]+;?/g, '');});
		$('.loginPassword').removeClass("valFaile"); 
	}


});


