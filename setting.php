<?php
include "cek-login.php";

$today = date_default_timezone_set("Asia/Jakarta");
$today = date("d/m/Y");

require_once("konek.php");
$query = mysql_query("SELECT * FROM users WHERE username = '$username'");
$hasil = mysql_fetch_array($query);
$id=$hasil['id'];
$username=$hasil['username'];
$password=$hasil['password'];
$name=$hasil['nama'];
$email=$hasil['email'];
$gender=$hasil['kelamin'];
$city=$hasil['kota'];
$state=$hasil['provinsi'];
$country=$hasil['negara'];
$status=$hasil['status'];
$webs=$hasil['web'];
$facebook=$hasil['facebook'];
$twitter=$hasil['twitter'];
$google=$hasil['google'];

$set = mysql_query("SELECT * FROM setting");
$wSet = mysql_fetch_array($set);
$title = $wSet['judul'];
$description = $wSet['deskripsi'];
$author = $wSet['pemilik'];
$url = $wSet['alamat'];
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Setting - Links2Save</title>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />

<link rel="stylesheet" href="css/responsive-tables.css">
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="prettify/prettify.js"></script>
<script type="text/javascript" src="js/modernizr.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/jquery.jgrowl.js"></script>
<script type="text/javascript" src="js/jquery.alerts.js"></script>
<script type="text/javascript" src="js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="js/flot/jquery.flot.min.js"></script>
<script type="text/javascript" src="js/flot/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="js/responsive-tables.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/elements.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
</head>

<body>

<style type="text/css">
.finish {
margin-top:10px !important;
}
</style>

<div class="mainwrapper">
    
    <div class="header">
        <div class="logo">
            <a href="/dashboard"><img src="images/logo.png" alt="" /></a>
        </div>
        <div class="headerinner">
            <ul class="headmenu">
                <li class="odd"></li>
                <li class="right">
                    <div class="userloggedinfo">
                        <div class="userinfo">
                            <h5><?php echo $username; ?> <small>- <?php echo $email; ?></small></h5>
                            <ul>
                                <li><a href="#">Status : <?php echo $status; ?></a></li>
                                <li><a href="setting">Account Settings</a></li>
                                <li><a href="logout">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul><!--headmenu-->
        </div>
    </div>
    
    <div class="leftpanel">
        
        <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
            	<li class="nav-header">Navigation</li>
                <li><a href="/dashboard"><span class="iconfa-laptop"></span> Dashboard</a></li>
                <li><a href="/create"><span class="iconfa-pencil"></span> Create</a></li>
                <li><a href="/all"><span class="iconfa-th-list"></span> All Links</a></li>
            </ul>
        </div><!--leftmenu-->
        
    </div><!-- leftpanel -->
    
    <div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="/dashboard"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li>Setting</li>
            <li class="right">
                    <a href="" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-tint"></i> Color Skins</a>
                    <ul class="dropdown-menu pull-right skin-color">
                        <li><a href="default">Default</a></li>
                        <li><a href="navyblue">Navy Blue</a></li>
                        <li><a href="palegreen">Pale Green</a></li>
                        <li><a href="red">Red</a></li>
                        <li><a href="green">Green</a></li>
                        <li><a href="brown">Brown</a></li>
                    </ul>
            </li>
        </ul>
        
        <div class="maincontent">
            <div class="maincontentinner">
			<div class="row-fluid">
<?PHP
	if (isset($_GET['error'])){
	if ($_GET['error']== 'password'){
    echo "<div class='alert alert-error'>
		<button data-dismiss='alert' class='close' type='button'>×</button>
		<strong>Error</strong> Password Can Not Be Empty !!!
		</div>";
    }
	if ($_GET['error']== 'name'){
	echo "<div class='alert alert-error'>
		<button data-dismiss='alert' class='close' type='button'>×</button>
		<strong>Error</strong> Name Can Not Be Empty !!!
		</div>";
	}
	if ($_GET['error']== 'email'){
	echo "<div class='alert alert-error'>
		<button data-dismiss='alert' class='close' type='button'>×</button>
		<strong>Error</strong> Email Can Not Be Empty !!!
		</div>";
	}
	}

	if (isset($_GET['setting'])){
	if ($_GET['setting'] == 'success'){
	echo "<div class='alert alert-success'>
       <button data-dismiss='alert' class='close' type='button'>×</button>
       <strong>Success</strong> You're Account Setting Successfully Saved !!!
       </div>";
	}
	}
?>
<h4 class='widgettitle'>Setting Account</h4>
	<div style='height:350px;' class='widgetcontent'>
		<form action='ubah.php' method='post'>
		<div class='span5'>
			<table style="width:100%;" border='0'>
			<tr>
			<td>Email</td>
			<td>&nbsp;: <input style='height:27px;' type='text' name='email' class='input-xlarge' value='<?PHP echo $email; ?>'></td>
			</tr>
		
			<tr>
			<td>Password</td>
			<td>&nbsp;: <input style='height:27px;' type='password' name='password' class='input-xlarge' value='<?PHP echo $password; ?>'></td>
			</tr>
			
			<tr>
			<td>Name</td>
			<td>&nbsp;: <input style='height:27px;' type='text' name='nama' class='input-xlarge' value='<?PHP echo $name; ?>'></td>
			</tr>
			
			<tr>
			<td>Gender</td>
			<td>&nbsp;: <select name="kelamin" class="uniformselect">
			<?PHP if($hasil['kelamin'] == "Male") { ?>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
			<?PHP } else { ?>
			        <option value="Female">Female</option>
                    <option value="Male">Male</option>
			<?PHP } ?>
                </select>
			</td>
			</tr>
		
			<tr>
			<td>City</td>
			<td>&nbsp;: <input style='height:27px;' type='text' name='kota' class='input-xlarge' value='<?PHP echo $city; ?>'></td>
			</tr>
			
			<tr>
			<td>State</td>
			<td>&nbsp;: <input style='height:27px;' type='text' name='provinsi' class='input-xlarge' value='<?PHP echo $state; ?>'></td>
			</tr>
			
			<tr>
			<td>Country</td>
			<td>&nbsp;: <input style='height:27px;' type='text' name='negara' class='input-xlarge' value='<?PHP echo $country; ?>'></td>
			</tr>
			</table>
		</div>
		
		<div class='span6'>
			<table style="width:100%;" border='0'>
			<tr>
			<td>Web</td>
			<td><input style='height:27px;' type='text' name='web' class='input-xlarge' value='<?PHP echo $webs; ?>'><br/><small class="desc">ex: <font class="text-error"><b>http://www.dicari.in</b></font></small></td>
			</tr>
			
			<tr>
			<td>Facebook</td>
			<td><input style='height:27px;' type='text' name='facebook' class='input-xlarge' value='<?PHP echo $facebook; ?>'><br/><small class="desc">www.facebook.com/<font class="text-error"><b>Username</b></font></small></td>
			</tr>
			
			<tr>
			<td>Twitter</td>
			<td><input style='height:27px;' type='text' name='twitter' class='input-xlarge' value='<?PHP echo $twitter; ?>'><br/><small class="desc">twitter.com/<font class="text-error"><b>Username</b></font></small></td>
			</tr>
			
			<tr>
			<td>Google+</td>
			<td><input style='height:27px;' type='text' name='google' class='input-xlarge' value='<?PHP echo $google; ?>'><br/><small class="desc">plus.google.com/<font class="text-error"><b>+Username</b></font></small></td>
			</tr>
			</table>
		</div>
		<div class="span8" style="width:80% !important;margin-top:40px !important;"><center>
		<button type='submit' class='btn btn-primary'>Save Change</button>&nbsp;
		<a href='/dashboard' class='btn btn-primary'>Cancel</a>
		</center></div>
		</form>
	</div>
            </div>
				
                <div class="footer">
                    <div class="footer-left">
                        <span>&copy; 2014 - <a href="/" title="<?PHP echo $description; ?>"><?PHP echo $title; ?></a> - All Rights Reserved.</span>
                    </div>
                    <div class="footer-right">
                        <span>Powered by: <strong>NST-Corporation</strong></span>
                    </div>
                </div><!--footer-->
                
            </div><!--maincontentinner-->
        </div><!--maincontent-->
        
    </div><!--rightpanel-->
    
</div><!--mainwrapper-->

<script type="text/javascript">
    jQuery(document).ready(function() {
        
      // simple chart
		var flash = [[0, 11], [1, 9], [2,12], [3, 8], [4, 7], [5, 3], [6, 1]];
		var html5 = [[0, 5], [1, 4], [2,4], [3, 1], [4, 9], [5, 10], [6, 13]];
      var css3 = [[0, 6], [1, 1], [2,9], [3, 12], [4, 10], [5, 12], [6, 11]];
			
		function showTooltip(x, y, contents) {
			jQuery('<div id="tooltip" class="tooltipflot">' + contents + '</div>').css( {
				position: 'absolute',
				display: 'none',
				top: y + 5,
				left: x + 5
			}).appendTo("body").fadeIn(200);
		}
	
			
		var plot = jQuery.plot(jQuery("#chartplace"),
			   [ { data: flash, label: "Flash(x)", color: "#6fad04"},
              { data: html5, label: "HTML5(x)", color: "#06c"},
              { data: css3, label: "CSS3", color: "#666"} ], {
				   series: {
					   lines: { show: true, fill: true, fillColor: { colors: [ { opacity: 0.05 }, { opacity: 0.15 } ] } },
					   points: { show: true }
				   },
				   legend: { position: 'nw'},
				   grid: { hoverable: true, clickable: true, borderColor: '#666', borderWidth: 2, labelMargin: 10 },
				   yaxis: { min: 0, max: 15 }
				 });
		
		var previousPoint = null;
		jQuery("#chartplace").bind("plothover", function (event, pos, item) {
			jQuery("#x").text(pos.x.toFixed(2));
			jQuery("#y").text(pos.y.toFixed(2));
			
			if(item) {
				if (previousPoint != item.dataIndex) {
					previousPoint = item.dataIndex;
						
					jQuery("#tooltip").remove();
					var x = item.datapoint[0].toFixed(2),
					y = item.datapoint[1].toFixed(2);
						
					showTooltip(item.pageX, item.pageY,
									item.series.label + " of " + x + " = " + y);
				}
			
			} else {
			   jQuery("#tooltip").remove();
			   previousPoint = null;            
			}
		
		});
		
		jQuery("#chartplace").bind("plotclick", function (event, pos, item) {
			if (item) {
				jQuery("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
				plot.highlight(item.series, item.datapoint);
			}
		});
    
        
        //datepicker
        jQuery('#datepicker').datepicker();
        
        // tabbed widget
        jQuery('.tabbedwidget').tabs();
        
        
    
    });
</script>
</body>
</html>
