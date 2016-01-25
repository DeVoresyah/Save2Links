<?php
require_once("konek.php");
include ("cek-login.php");

$name_file = $_GET['file'];

$sql = mysql_query("SELECT * FROM users WHERE username = '$username'");
$hasil = mysql_fetch_array($sql);
$username=$hasil['username'];

$check = mysql_query("select * from posting where namafile = '$name_file'");
$owner = $check['pemilik'];
if($check['pemilik'] == "$username") {
 $delete = mysql_query("delete from posting where namafile = '$name_file'");
 if ($delete){
 header("location:dashboard?success=delete");
 } else{
 header("location:dashboard?error=delete");
 }
} else{
header("location:dashboard?access=denied");
}
 ?>