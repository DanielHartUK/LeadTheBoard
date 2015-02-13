$("#userSetup input").blur(function() {
	if(!$(this).val()) {
		$(this).addClass("valFail");
	} else {
		$(this).removeClass("valFail");
	}
});
$("#userSetup input").keyup(function() {
    var empty = $(this).parent().find("input").filter(function() {
            return this.value === "";
        });	
        if((empty.length == 0 ) & $("#confirmPass").val() === $("#password").val()) {
        	$("#submit").removeClass("red").addClass("blue").removeAttr('disabled');
        } else {
        	$("#submit").addClass("red").attr('disabled','disabled');
        }			
});
function IsEmail(email) {
	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	$('#email').addClass("valFaile"); 
	if (!$('#email').val()) {
		$('#email').prev().text("Email address"); 
	} else if (!regex.test(email)) {
		$('#email').prev().text("Email address - Invalid email"); 
	}
};



$(window).load(function() {
  $("body").removeClass("preload");
});
$(window).resize(function() {
    $("body").addClass("preload");
  setTimeout(function() {
    $("body").removeClass("preload");
  }, 1);
});








