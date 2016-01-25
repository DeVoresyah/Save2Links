<?php
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
<title>404 Not Found</title>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />

<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="js/modernizr.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
</head>

<body class="errorpage">

<div class="mainwrapper">
    
    <div class="errortitle">
        <h4 class="animate0 fadeInUp">The page you are looking for has not been found.</h4>
        <span class="animate1 bounceIn">4</span>
        <span class="animate2 bounceIn">0</span>
        <span class="animate3 bounceIn">4</span>
        <div class="errorbtns animate4 fadeInUp">
            <a onclick="history.back()" class="btn btn-primary btn-large">Go to Previous Page</a>
            <a href="/" class="btn btn-large">Go to Home</a>
        </div>
    </div>
    
</div><!--mainwrapper-->

</body>
</html>
