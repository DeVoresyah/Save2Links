<?php
session_start();
if(!isset($_SESSION['username'])) {
header('location:login'); }
else { $username = $_SESSION['username']; }
require_once("konek.php");
$query = mysql_query("SELECT * FROM users WHERE username = '$username'");
$hasil = mysql_fetch_array($query);
?>