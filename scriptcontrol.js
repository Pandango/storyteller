
$(document).ready(function()
{
	/////////////////Index/////////////////////
	$("#helpBlock2").hide();
	$(".camera-start").hide();

	$("#name").blur(function(){
		if(!$("#name").val()){
			$(".checkName").addClass("has-error");
			$("#helpBlock2").show();
		}
		else{
			$(".checkName").removeClass("has-error");
			$("#helpBlock2").hide('slow/400/fast');
		}
	});

	$("#bloodType").blur(function() {
		if($("#bloodType option:selected").text() == "Select"){
			$(".checkBlood").addClass('has-error');
		}
		else{
			$(".checkBlood").removeClass("has-error");
		}
	});
		
	$("#major").blur(function() {
		if($("#major option:selected").text() == "Select"){
			$(".checkMajor").addClass('has-error');
		}
		else{
			$(".checkMajor").removeClass("has-error");
		}
	});
		
	



	//////////////////End Index//////////////////


});
