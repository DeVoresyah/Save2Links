<?PHP
$today = date_default_timezone_set("Asia/Jakarta");
$today = date("d/m/Y");
?>
<html>
<head>
<title>Buat Posting</title>
</head>
<body>
<form action="tambah.php" method="post">
<table border="0">
<tr>
<td>Nama File : </td>
<td><input name="judul" type="text"></td>
</tr>
<tr>
<td>Size : </td>
<td><input name="ukuran" type="text"></td>
</tr>
<tr>
<td>Google Drive : </td>
<td><input name="konten" type="text"></td>
</tr>
<tr>
<td><input name="tanggal" type="text" value="<?php echo $today ?>" hidden ></td>
<td><input name="submit" type="submit" value="Buat"></td>
</tr>
</table>
</form>
</body>
</html>