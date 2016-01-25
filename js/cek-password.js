$(document).ready(function(){

$("#pswd2").change(function() { 
var pass1 = $("#pswd").val();
var pass2 = $("#pswd2").val();

if(pass1.length >= 5){
$("#status2").html('<font class="text-info">Loading...</font>');
$.ajax({ 
type: "POST", 
url: "proses/cekpassword.php", 
data: "pswd="+pass1+"&pswd2="+pass2,
success: function(msg){ 
			$("#status2").ajaxComplete(function(event, request, settings){ 
			if(msg == 'OK'){ 
							$("#pswd2").removeClass('object_error'); // if necessary
							$("#pswd2").addClass("object_ok");
							$(this).html(' <font class="text-success">Password Is True</font> ');
							} 
			else { 
				$("#pswd2").removeClass('object_ok'); // if necessary
				$("#pswd2").addClass("object_error");
				$(this).html(msg);
				}
			});
			}
});
} else{
$("#status2").html('The username should have at least 5 characters.');
$("#pswd2").removeClass('object_ok'); // if necessary
$("#pswd2").addClass("object_error");
}
});
});