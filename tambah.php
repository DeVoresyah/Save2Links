<?php
include "konek.php";
$namafile=$_POST['namafile'];
$ukuran=$_POST['ukuran'];
$gdrive=$_POST['gdrive'];
$idws=$_POST['idws'];
$sharebeast=$_POST['sharebeast'];
$mediafire=$_POST['mediafire'];
$solidfiles=$_POST['solidfiles'];
$tusfiles=$_POST['tusfiles'];
$shared=$_POST['4shared'];
$gett=$_POST['gett'];
$uppit=$_POST['uppit'];
$tanggal=$_POST['tanggal'];
$pemilik=$_POST['pemilik'];
 
 if ($namafile == ''){
 header("location:create?error=1");
 $stop = 1;
 }
 
 else if ($ukuran == ''){
 header("location:create?error=2");
 $stop = 1;
 }
 
 if ($stop!=1){
 $sql = "INSERT INTO posting (namafile, ukuran, gdrive, idws, sharebeast, mediafire, solidfiles, tusfiles, 4shared, gett, uppit, tanggal, pemilik) values('$namafile', '$ukuran', '$gdrive', '$idws', '$sharebeast', '$mediafire', '$solidfiles', '$tusfiles', '$shared', '$gett', '$uppit', '$tanggal', '$pemilik')";
 if (mysql_query($sql)){
 header("location:create?success=1");
 }
 }
 ?>