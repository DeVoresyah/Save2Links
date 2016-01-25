<?php
session_start();
require_once("konek.php");
$username = $_POST['username'];
$password = $_POST['password'];
$cekuser = mysql_query("SELECT * FROM users WHERE username = '$username'");
$jumlah = mysql_num_rows($cekuser);
$hasil = mysql_fetch_array($cekuser);
if($jumlah == 0) {
header('location:login?error=username');
} else {
if($password <> $hasil['password']) {
header('location:login?error=password');
} else {
$_SESSION['username'] = $hasil['username'];
header('location:dashboard');
}
}
?>