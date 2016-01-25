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
<title>Login - <?PHP echo $title; ?></title>
<meta name="description" content="<?PHP echo $description; ?>"/>
<meta name="author" content="<?PHP echo $author; ?>">
<link rel="stylesheet" href="css/style.default.css" type="text/css" />
<link rel="stylesheet" href="css/style.shinyblue.css" type="text/css" />

<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="js/modernizr.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
</head>

<body class="loginpage">

	<?PHP
	if (isset($_GET['error'])){
	if ($_GET['error']== 'username'){
    echo "<div style='position:absolute; width:300px !important;left:37%;top:23%;' class='alert alert-error'>
		<button data-dismiss='alert' class='close' type='button'>x</button>
		<strong>Error</strong> Username not registered !!!
		</div>";
    }
	if ($_GET['error']== 'password'){
	echo "<div style='position:absolute; width:300px !important;left:37%;top:23%;' class='alert alert-error'>
		<button data-dismiss='alert' class='close' type='button'>x</button>
		<strong>Error</strong> Password incorrect, please check again !!!
		</div>";
	}
	}
?>

<div class="loginpanel">
    <div class="loginpanelinner">
        <div class="logo animate0 bounceIn"><img src="images/logo.png" alt="" /></div>
        <form id="login" action="proseslogin.php" method="post">
            <div class="inputwrapper animate1 bounceIn">
                <input style="height:37px;" type="text" name="username" class="input-xlarge" placeholder="Username">
            </div>
            <div class="inputwrapper animate2 bounceIn">
                <input style="height:37px;" type="password" name="password" class="input-xlarge" placeholder="Password">
            </div>
            <div class="inputwrapper animate3 bounceIn">
                <button name="submit">Sign In</button>
            </div>
            
        </form>
    </div><!--loginpanelinner-->
</div><!--loginpanel-->

<div class="loginfooter">
    <p>&copy; 2014 - <a style="color:#fff !important;" href="/" title="<?PHP echo $description; ?>"><?PHP echo $title; ?></a> - All Rights Reserved<br/>Support By <b>NST-Corporation</b></p>
</div>

</body>
</html>