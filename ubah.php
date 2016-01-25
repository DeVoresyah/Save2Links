<?php
include "konek.php";
$password=$_POST['password'];
$nama=$_POST['nama'];
$email=$_POST['email'];
$kelamin=$_POST['kelamin'];
$kota=$_POST['kota'];
$provinsi=$_POST['provinsi'];
$negara=$_POST['negara'];
$web=$_POST['web'];
$facebook=$_POST['facebook'];
$twitter=$_POST['twitter'];
$google=$_POST['google'];
 
 if ($password == ''){
 header("location:setting?error=password");
 $stop = 1;
 }
 
 else if ($nama == ''){
 header("location:setting?error=name");
 $stop = 1;
 }
 
 else if ($email == ''){
 header("location:setting?error=email");
 $stop = 1;
 }
 
 if ($stop!=1){
 $sql = "UPDATE users SET password = '$password', nama = '$nama', email = '$email', kelamin = '$kelamin', kota = '$kota', provinsi = '$provinsi', negara = '$negara', web = '$web', facebook = '$facebook', twitter = '$twitter', google = '$google' WHERE username = '$username'";
 if (mysql_query($sql)){
 header("location:setting?setting=success");
 }
 }
 ?>