$(document).ready(function(){

$("#email").change(function() { 
var email = $("#email").val();

if(email.length >= 0){
$("#status3").html('<font class="text-info">Checking Email...</a>');
$.ajax({ 
type: "POST", 
url: "proses/cekemail.php", 
data: "email="+ email, 
success: function(msg){ 
			$("#status3").ajaxComplete(function(event, request, settings){ 
			if(msg == 'OK'){ 
							$("#email").removeClass('object_error'); // if necessary
							$("#email").addClass("object_ok");
							$(this).html(' <font class="text-success">Email Available</font> ');
							} 
			else { 
				$("#email").removeClass('object_ok'); // if necessary
				$("#email").addClass("object_error");
				$(this).html(msg);
				}
			});
			}
});
} else{
$("#status3").html('Please Enter The Valid Email.');
$("#email").removeClass('object_ok'); // if necessary
$("#email").addClass("object_error");
}
});
});