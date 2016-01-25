<?php
include "konek.php";
$id_file=$_POST['id'];
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
 
 if ($namafile == ''){
 header("location:dashboard?error=1");
 $stop = 1;
 }
 
 else if ($ukuran == ''){
 header("location:dashboard?error=2");
 $stop = 1;
 }
 
 if ($stop!=1){
 $sql = "UPDATE posting SET namafile = '$namafile', ukuran = '$ukuran', gdrive = '$gdrive', idws = '$idws', sharebeast = '$sharebeast', mediafire = '$mediafire', solidfiles = '$solidfiles', tusfiles = '$tusfiles', 4shared = '$shared', gett = '$gett', uppit = '$uppit' WHERE id = '$id_file'";
 if (mysql_query($sql)){
 header("location:dashboard?success=1");
 }
 }
 ?>