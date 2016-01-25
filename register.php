<?php
session_start();
if(isset($_SESSION['username'])) {
header('location:dashboard'); }
require_once("konek.php");

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
<title>Register - <?PHP echo $title; ?></title>
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
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="../js/jquery.cookie.js"></script>
<script type="text/javascript" src="../js/modernizr.min.js"></script>
<script type="text/javascript" src="../js/jquery.jgrowl.js"></script>
<script type="text/javascript" src="../js/cek-username.js"></script>
<script type="text/javascript" src="../js/cek-password.js"></script>
<script type="text/javascript" src="../js/cek-email.js"></script>
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
margin-top: 80px !important;
margin-bottom: 30px !important;
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
width:980px !important;
float: center;
margin: auto;
}
.span8{
width:100% !important;
}
</style>

<div class="header">
    <div class="header-inner">
        <div class="logo">
            <img src="../images/logo.png" alt="" />
        </div>
        
        <ul class="head-menu">
            <li><a href="/">Home</a></li>
            <li><a href="login">Login</a></li>
			<li><a href="register">Register</a></li>
        </ul>

    </div><!--header-inner-->
</div><!--header-->
<br/>
<div id="about" class="banner">
<div class="maincontentinner">
	<div class="row-fluid">
		<div class="span8">
		<?PHP
	if (isset($_GET['error'])){
	if ($_GET['error']== 'username'){
    echo "<div class='alert alert-error'>
		<button data-dismiss='alert' class='close' type='button'>x</button>
		<strong>Error</strong> Username already in use !!!
		</div>";
    }
	if ($_GET['error']== 'empty'){
	echo "<div class='alert alert-error'>
		<button data-dismiss='alert' class='close' type='button'>x</button>
		<strong>Error</strong> There are still empty data !!!
		</div>";
	}
	if ($_GET['error']== 'failed'){
	echo "<div class='alert alert-error'>
		<button data-dismiss='alert' class='close' type='button'>x</button>
		<strong>Error</strong> Register Failed !!!
		</div>";
	}
	}

	if (isset($_GET['success'])){
	if ($_GET['success'] == 'registered'){
	echo "<div class='alert alert-success'>
       <button data-dismiss='alert' class='close' type='button'>x</button>
       <strong>Success</strong> Successfully registration, please log in to your account !!!
       </div>";
	}
	}
?>
				<div class="widgetbox">
                <h4 class="widgettitle"><center>Register New User</center></h4>
				<div style="height:928px;" class="widgetcontent nopadding">
				<form action="prosesdaftar.php" method="post" class="stdform stdform2">
					<p>
					<label>Username <font class="text-error">*</font></label>
					<span class="field"><input style="height:25px;" id="uname" type="text" name="username" class="input-xlarge" required><span id="status"></span></span>
					</p>
					
					<p>
					<label>Password <font class="text-error">*</font></label>
					<span class="field"><input style="height:25px;" id="pswd" type="password" name="password" class="input-xlarge" required></span>
					</p>
					
					<p>
					<label>Re-type Password <font class="text-error">*</font></label>
					<span class="field"><input style="height:25px;" id="pswd2" type="password" name="password2" class="input-xlarge" required><span id="status2"></span></span>
					</p>
					
					<p>
					<label>Name <font class="text-error">*</font></label>
					<span class="field"><input style="height:25px;" type="text" name="nama" class="input-xlarge" required></span>
					</p>
					
					<p>
					<label>Email <font class="text-error">*</font></label>
					<span class="field"><input style="height:25px;" id="email" type="email" name="email" class="input-xlarge" required><span id="status3"></span></span>
					</p>
					
					<p>
					<label>Gender <font class="text-error">*</font></label>
					<span class="field"><select name="kelamin" class="uniformselect">
                            	<option value="Male">Male</option>
                                <option value="Female">Female</option>
                        </select>
					</span>
					</p>
					
					<p>
					<label>City <font class="text-error">*</font></label>
					<span class="field"><input style="height:25px;" type="text" name="kota" class="input-xlarge" required></span>
					</p>
					
					<p>
					<label>State <font class="text-error">*</font></label>
					<span class="field"><input style="height:25px;" type="text" name="provinsi" class="input-xlarge" required></span>
					</p>
					
					<p>
					<label>Country <font class="text-error">*</font></label>
					<span class="field"><input style="height:25px;" type="text" name="negara" class="input-xlarge" required></span>
					</p>
					
					<input type="hidden" name="tanggal" class="input-xlarge" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('d/m/Y');?>">
					
					<input type="hidden" name="status" class="input-xlarge" value="Member">
					
					<p>
					<label>Web URL</label>
					<span class="field"><input style="height:25px;" type="text" name="web" class="input-xlarge"></span>
					</p>
					
					<p>
					<label>Facebook</label>
					<span class="field"><input style="height:25px;" type="text" name="facebook" class="input-xlarge"></span>
					</p>
					
					<p>
					<label>Twitter</label>
					<span class="field"><input style="height:25px;" type="text" name="twitter" class="input-xlarge"></span>
					</p>
					
					<p>
					<label>Google+</label>
					<span class="field"><input style="height:25px;" type="text" name="google" class="input-xlarge"></span>
					</p>
					
					<p><div style="margin-top:25px;margin-bottom:40px;"><center>
					<button type="submit" class="btn btn-primary">Register</button>&nbsp;<a href="login" class="btn btn-primary">Login</a>
					</center></div></p>
				</form>
				</div>
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