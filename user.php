<?php
require_once("konek.php");

$user_id = $_GET['id'];
$sql = mysql_query("SELECT * FROM users WHERE id = '$user_id'");
$hasil = mysql_fetch_array($sql);
$username=$hasil['username'];
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
<title>User Profile - <?PHP echo $username; ?></title>
<meta name="description" content="<?PHP echo $description; ?>"/>
<meta name="author" content="<?PHP echo $author; ?>">
<link rel="stylesheet" href="../css/style.default.css" type="text/css" />
<link rel="stylesheet" href="../css/button.css" type="text/css" />
<link rel="stylesheet" href="../style.css" type="text/css" />
<link rel="stylesheet" href="../css/colorbox.css" type="text/css" />
<link rel="stylesheet" href="../prettify/prettify.css" type="text/css" />


<script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="../js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="../js/modernizr.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/jquery.colorbox-min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        
        jQuery('.head-menu a').bind('click',function(event){
            var anchor = jQuery(this);
     
            jQuery('html, body').stop().animate({
                scrollTop: jQuery(anchor.attr('href')).offset().top - 75
            }, 1500,'easeInOutExpo');
            event.preventDefault();
        });
    });
</script>
</head>

<body>

<style type='text/css'>
.header{
height:80px !important;
}
.header .logo{
padding-top:0 !important;
}
.header-inner{
padding: 10px !important;
}
.banner {
margin-top: 60px !important;
height:auto;
}
.footer {
margin-top:0 !important;
}
.features h4{
background: url(images/border.gif) repeat-x scroll center bottom rgba(0, 0, 0, 0);
margin-bottom: 5px;
padding-bottom: 5px;
}
.maincontentinner{
padding:0 !important;
}
.row-fluid{
width:600px !important;
float: center;
margin: auto;
}
.span8{
width:100% !important;
}
.btn-success {
border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
}
.btn-success {
color: #ffffff;
text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
background-color: #5bb75b;
background-image: -moz-linear-gradient(top, #62c462, #51a351);
background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#62c462), to(#51a351));
background-image: -webkit-linear-gradient(top, #62c462, #51a351);
background-image: -o-linear-gradient(top, #62c462, #51a351);
background-image: linear-gradient(to bottom, #62c462, #51a351);
background-repeat: repeat-x;
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff62c462', endColorstr='#ff51a351', GradientType=0);
border-color: #51a351 #51a351 #387038;
border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
}
</style>

<div class="header">
    <div class="header-inner">
        <div class="logo">
            <img src="../images/logo.png" alt="" />
        </div>
        
		<?PHP
		session_start();
		if(!isset($_SESSION['username'])) {
		?>
        <ul class="head-menu">
            <li><a href="../">Home</a></li>
            <li><a href="../login">Login</a></li>
			<li><a href="../register">Register</a></li>
        </ul>
		<?PHP
		}
		else {
		$my_sesi = $_SESSION['username'];
		?>
        <ul class="head-menu">
			<li><a href="../dashboard">Dashboard</a></li>
            <li><a href="../all">All Links</a></li>
			<li><a href="../create">Create</a></li>
			<li><a href="../logout">Logout</a></li>
        </ul>
		<?PHP } ?>

    </div><!--header-inner-->
</div><!--header-->
<br/>
<div id="about" class="banner">
<div class="maincontentinner">
	<div class="row-fluid">
		<div class="span8">
				<div class="widgetbox">
                <h4 class="widgettitle"><center>User Profile : <?PHP echo $username; ?></center></h4>
				<div style="height:460px;" class="widgetcontent">
					<div class="span8">
					<table style="width:100%;" class="table table-bordered responsive">
                    <colgroup>
                        <col class="con0">
                        <col class="con1">
                        <col class="con0">
                        <col class="con1">
                        <col class="con0">
                    </colgroup>
                    <thead>
                    </thead>
					<tbody>
						<tr>
							<td width="30%"><b>Name</b></td>
							<td><?PHP echo $name; ?></td>
						</tr>
						<tr>
							<td width="30%"><b>Email</b></td>
							<td><?PHP echo $email; ?></td>
						</tr>
						<tr>
							<td width="30%"><b>Gender</b></td>
							<td><?PHP echo $gender; ?></td>
						</tr>
						<tr>
							<td width="30%"><b>City</b></td>
							<td><?PHP echo $city; ?></td>
						</tr>
						<tr>
							<td width="30%"><b>State</b></td>
							<td><?PHP echo $state; ?></td>
						</tr>
						<tr>
							<td width="30%"><b>Country</b></td>
							<td><?PHP echo $country; ?></td>
						</tr>
						<tr>
							<td width="30%"><b>Status</b></td>
							<td><?PHP echo $status; ?></td>
						</tr>
						<tr>
							<td width="30%"><b>Gender</b></td>
							<td><?PHP echo $gender; ?></td>
						</tr>
						<tr>
							<td width="30%"><b>Web</b></td>
							<td><a href="<?PHP echo $webs; ?>" rel="nofollow">Click Here</a></td>
						</tr>
						<tr>
							<td width="30%"><b>Facebook</b></td>
							<td><a href="http://www.facebook.com/<?PHP echo $facebook; ?>" rel="nofollow">Click Here</a></td>
						</tr>
						<tr>
							<td width="30%"><b>Twitter</b></td>
							<td><a href="https://twitter.com/<?PHP echo $twitter; ?>" rel="nofollow">Click Here</a></td>
						</tr>
						<tr>
							<td width="30%"><b>Google+</b></td>
							<td><a href="https://plus.google.com/<?PHP echo $google; ?>" rel="nofollow">Click Here</a></td>
						</tr>
					</tbody>
					</table>

					</div>
				</div>
				</div>
				
		</div>
	
	</div>

</div>
</div><!--banner-->


<div id="features" class="features">
    <div class="features-inner">
<div class="row-fluid">
            <div class="span2">
                <h4>Partner</h4>
                <a href="http://www.dicari.in">Dicari In</a><br/>
				<a href="http://www.kampoeng.co.id">Kampoeng</a><br/>
				<a href="http://www.lokersoft.com">LokerSoft</a><br/>
				<a href="http://www.koran-artikel.com">Koran Artikel</a>
            </div>
            <div class="span3">
                <h4>Find Us</h4>
				<table border="0">
				<tr>
                <td><i style="color:#fff;" class="iconfa-facebook"></i></td>
				<td>&nbsp;<a href="http://www.facebook.com/Rully.DarkArd">Official Facebook Page</a></td>
				</tr>
				<tr>
                <td><i style="color:#fff;" class="iconfa-twitter"></i></td>
				<td>&nbsp;<a href="https://www.twitter.com/KiritoTechSAO">Official Twitter Account</a></td>
				</tr>
				<tr>
                <td><i style="color:#fff;" class="iconfa-google-plus"></i></td>
				<td>&nbsp;<a href="https://plus.google.com/+RullyArdiansyah">Official Google+</a></td>
				</tr>
                </table>
            </div>
            <div class="span7">
                <h4>Disclaimer</h4>
                <b>Links2Save</b> - Save Your Download Links. All links, images, and all of them belong to the user id. We do not hold the copyright content here, we only owner of this website and organize the links that are here. If there is a user id that stores the download link that is illegal, then the link will be deleted and the user will be given a penalty.
            </div>
        </div><!--row-fluid-->
        
        
    </div><!--features-inner-->
</div><!--features-->

<div class="footer">
    &copy; 2014 - <a href="/" title="<?PHP echo $description; ?>"><?PHP echo $title; ?></a> - All Right Reserved<br/>
	<center>Support By NST-Corporation</center>
</div>
</body>
</html>