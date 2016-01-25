<?php
  session_start();
  if(isset($_SESSION['username'])) {
  header('location:dashboard'); }
  require_once("konek.php");
  $username = $_POST['username'];
  $password = $_POST['password'];
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $kelamin = $_POST['kelamin'];
  $kota = $_POST['kota'];
  $provinsi = $_POST['provinsi'];
  $negara = $_POST['negara'];
  $tanggal = $_POST['tanggal'];
  $status = $_POST['status'];
  $web = $_POST['web'];
  $facebook = $_POST['facebook'];
  $twitter = $_POST['twitter'];
  $google = $_POST['google'];
  
  $cekuser = mysql_query("SELECT * FROM users WHERE username = '$username'");  
  if(mysql_num_rows($cekuser) <> 0) {
 echo "<script>window.location = 'register?error=username'</script>";
  } else {
 if(!$username || !$password || !$nama || !$email || !$kelamin || !$kota || !$provinsi || !$negara || !$tanggal || !$status) {
  echo "<script>window.location = 'register?error=empty'</script>";
 } else { 
 $simpan = mysql_query("INSERT INTO users VALUES('', '$username','$password','$nama','$email','$kelamin','$kota','$provinsi','$negara','$tanggal','$status','$web','$facebook','$twitter','$google')");
 if($simpan) {
  echo "<script>window.location = 'register?success=registered'</script>";

   } else {
     echo "Proses Gagal!";
   }
 }
  }  
?>