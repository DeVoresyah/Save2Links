<?PHP
include("konek.php");

$name_file = $_GET['name'];
$q = mysql_query("select * from posting where namafile='$name_file'");
?>
<html>
<head>
	<title>pehapecode</title>
</head>
<body>
	<table border="1" width="30%">
		<tr>
			<th>Nama File</th>
			<th>Ukuran</th>
			<th>Google Drive</th>
			<th>Indowebster</th>
			<th>Sharebeast</th>
			<th>Mediafire</th>
			<th>Solidfiles</th>
			<th>Tusfiles</th>
			<th>4Shared</th>
			<th>GE.TT</th>
			<th>UppIT</th>
			<th>Tanggal</th>
			<th>Pemilik</th>
		</tr>
		<?PHP
		while ($data = mysql_fetch_array($q)){
		$filename=$data['namafile'];
		$size=$data['ukuran'];
		$googledrive=$data['gdrive'];
		$indowebster=$data['idws'];
		$sharebeast=$data['sharebeast'];
		$mediafire=$data['mediafire'];
		$solidfiles=$data['solidfiles'];
		$tusfiles=$data['tusfiles'];
		$shared=$data['4shared'];
		$gett=$data['gett'];
		$uppit=$data['uppit'];
		$date=$data['tanggal'];
		$owner=$data['pemilik'];
		?>
		<tr>
			<td><?PHP echo $filename; ?></td>
			<td><?PHP echo $size; ?></td>
			<td><?PHP
			if (!empty($googledrive)){
			echo "Available";
			}
			else{
			echo "Unavailable";
			}
			?></td>
			<td><?PHP echo $indowebster; ?></td>
			<td><?PHP echo $sharebeast; ?></td>
			<td><?PHP echo $mediafire; ?></td>
			<td><?PHP echo $solidfiles; ?></td>
			<td><?PHP echo $tusfiles; ?></td>
			<td><?PHP echo $shared; ?></td>
			<td><?PHP echo $gett; ?></td>
			<td><?PHP echo $uppit; ?></td>
			<td><?PHP echo $date; ?></td>
			<td><?PHP echo $owner; ?></td>
		</tr>
		<?PHP
		}
		?>
	</table>
</body>
</html>