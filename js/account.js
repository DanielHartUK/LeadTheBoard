$(".colourOption").click(function() {
	var classes = this.classList;
	var x = String(classes).replace('colourOption ','');
	$("#colour" + x).prop("checked", true)
	$(".colourOption").removeClass("selected");
	$(this).addClass("selected");
});
$('.clanSelect').click(function() {  
  $('.boxButton').show();
  setTimeout(function() {
  $('.clanList').css('padding-bottom', $('.boxButton').height() * 1.5);

  }, 1)
});

$(".clanSelect").click(function() {
	var x = $(this).attr("id")
	/*var classes = this.classList;
	var x = String(classes).replace('clanSelect clanID-','');*/
	$("#clan-" + x).prop("checked", true);
	$(".clanSelect").removeClass("selected");
	$(this).addClass("selected");
});

$(".clanSelect.existing").click(function() {
	$("#createNew").addClass("hidden");
	$("#joinClan").removeClass("hidden");
	$("#joinClan").val("Join " + $(this).data("name"));
});
$(".clanSelect.new").click(function() {
	$("#createNew").removeClass("hidden");
	$("#joinClan").addClass("hidden");
});
$( "#newClanName" ).keyup(function() {
    var value = $( this ).val();
    $("#createNew").val("Create " + value );
});
$(".editStudent").click(function() {
	if(!$(this).find(".inputCheck").prop("checked")) {
		$(this).find(".inputCheck").prop("checked", true);
	} else {
		$(this).find(".inputCheck").prop("checked", false);
	}
});

