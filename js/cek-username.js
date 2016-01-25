$(document).ready(function(){

$("#uname").change(function() { 
var uname = $("#uname").val();

if(uname.length >= 3){
$("#status").html('<font class="text-info">Checking Username...</a>');
$.ajax({ 
type: "POST", 
url: "proses/ceknama2.php", 
data: "uname="+ uname, 
success: function(msg){ 
			$("#status").ajaxComplete(function(event, request, settings){ 
			if(msg == 'OK'){ 
							$("#uname").removeClass('object_error'); // if necessary
							$("#uname").addClass("object_ok");
							$(this).html(' <font class="text-success">Username Available</font> ');
							} 
			else { 
				$("#uname").removeClass('object_ok'); // if necessary
				$("#uname").addClass("object_error");
				$(this).html(msg);
				}
			});
			}
});
} else{
$("#status").html('The username should have at least 3 characters.');
$("#uname").removeClass('object_ok'); // if necessary
$("#uname").addClass("object_error");
}
});
});