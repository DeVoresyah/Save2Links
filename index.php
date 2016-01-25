<?php
session_start();
if(isset($_SESSION['username'])) {
header('location:dashboard'); }
require_once("konek.php");
$sql = mysql_query("SELECT * FROM users");
$hasil = mysql_fetch_array($sql);
$username = $hasil['username'];
$nama = $hasil['nama'];
$email = $hasil['email'];
$status = $hasil['status'];

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
<title><?PHP echo $title; ?> - <?PHP echo $description; ?></title>
<meta name="description" content="<?PHP echo $description; ?>"/>
<meta name="author" content="<?PHP echo $author; ?>">
<link rel="stylesheet" href="css/style.default.css" type="text/css" />
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="../css/colorbox.css" type="text/css" />
<link rel="stylesheet" href="prettify/prettify.css" type="text/css" />


<script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="../js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="../js/modernizr.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/jquery.colorbox-min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        
        jQuery('.head-menu a').bind('click',function(event){
            var anchor = jQuery(this);
     
            jQuery('html, body').stop().animate({
                scrollTop: jQuery(anchor.attr('href')).offset().top - 75
            }, 1500,'easeInOutExpo');
            event.preventDefault();
        });
    });
</script>
</head>

<body>

<style type='text/css'>
.header{
height:80px !important;
}
.header .logo{
padding-top:0 !important;
}
.header-inner{
padding: 10px !important;
}
.banner {
margin-top: 80px !important;
height:auto;
}
.footer {
margin-top:0 !important;
}
.features h4{
background: url(images/border.gif) repeat-x scroll center bottom rgba(0, 0, 0, 0);
margin-bottom: 5px;
padding-bottom: 5px;
}
</style>

<div class="header">
    <div class="header-inner">
        <div class="logo">
            <img src="../images/logo.png" alt="" />
        </div>
        
        <ul class="head-menu">
            <li><a href="/">Home</a></li>
            <li><a href="login">Login</a></li>
			<li><a href="register">Register</a></li>
        </ul>
    </div><!--header-inner-->
</div><!--header-->
<br/>
<div id="about" class="banner">
<div class="maincontentinner">
	<div class="row-fluid">
		<div class="span8">
				<div class="widgetbox">
                <h4 class="widgettitle">Latest Files</h4>
<div id="dyntable_wrapper" class="dataTables_wrapper" role="grid">
<table class="table table-bordered responsive">
                    <colgroup>
                        <col class="con0">
                        <col class="con1">
                        <col class="con0">
                        <col class="con1">
                        <col class="con0">
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="centeralign" width="35%">Filename</th>
                            <th class="centeralign" width="20%">Size</th>
                            <th class="centeralign" width="20%">Date</th>
							<th class="centeralign">Views</th>
                            <th class="centeralign" width="13%">Owner</th>
                        </tr>
                    </thead>
					<tbody>
							<?PHP
							$perpage = 10;
							if(isset($_GET["page"])){
							$page = abs((int)$_GET["page"]);
							$no = 1 + $perpage * $page - $perpage;
							}
							else{
							$page = 1;
							$no = 1;
							}
							$calc = $perpage * $page;
							$start = $calc - $perpage;
							$qCheck = mysql_query("SELECT * FROM posting ORDER BY id DESC Limit 15");
							while ($rCheck = mysql_fetch_array($qCheck)) {
							$id_file=$rCheck['id'];
							$name_file=$rCheck['namafile'];
							$size_file=$rCheck['ukuran'];
							$user_file=$rCheck['pemilik'];
							$date_file=$rCheck['tanggal'];
							$views=$rCheck['views'];
							$users = mysql_query("SELECT * FROM users WHERE username='$user_file'");
							$owner = mysql_fetch_array($users);
							$id_owner = $owner['id'];
							?>
							<tr>
                            <td width="35%"><a href="views/<?PHP echo $name_file; ?>"><?PHP echo $name_file; ?></a></td>
                            <td class="centeralign" width="20%"><?PHP echo $size_file; ?></td>
                            <td class="centeralign" width="20%"><?PHP echo $date_file; ?></td>
							<td class="centeralign"><?PHP echo $views; ?></td>
                            <td class="center" width="13%"><a href="view/u-<?PHP echo $id_owner; ?>"><?PHP echo $user_file; ?></a></td>
							</tr>
							<?PHP
							$no++;
							}
							?>
					</tbody>
                </table>
				<div class="dataTables_info" id="dyntable_info">
				<?PHP
				$wew = mysql_query("select Count(*) As Total from posting where pemilik='$user_file'");
				$lel = mysql_num_rows($wew);
				if($lel){
					$lol = mysql_fetch_array($wew);
					$jumlah_file = $lol["Total"];
					}
				$total_pages = ceil($jumlah_file / $perpage);
				echo "Total Page : $total_pages";
				?>
				</div>
				<div class="dataTables_paginate paging_full_numbers" id="dyntable_paginate">
				<?PHP
					if(isset($page)){
					$result = mysql_query("select Count(*) As Total from posting where pemilik='$user_file'");
					$rows = mysql_num_rows($result);
					if($rows){
					$rs = mysql_fetch_array($result);
					$total = $rs["Total"];
					}
					$totalPages = ceil($total / $perpage);
					if($page <=1 ){
					echo "<a class='first paginate_active paginate_button_disabled' id='dyntable_first'>First</a>";
					}
					else{
					$j = $page - 1;
					echo "<a class='previous paginate_button' id='dyntable_previous' href='/dashboard?page=$j'>Prev</a>";
					}
					for($i=1; $i <= $totalPages; $i++){
					if($i<>$page){
					echo "<a class='paginate_button' href='/dashboard?page=$i'>$i</a>";
					}
					else{
					echo "<a class='paginate_active'>$i</a>";
					}
					}
					if($page == $totalPages ){
					echo "<a class='last paginate_button paginate_button_disabled' id='dyntable_last'>Last</a>";
					}
					else{
					$j = $page + 1;
					echo "<a class='next paginate_button' id='dyntable_next' href='/dashboard?page=$j'>Next</a>";
					}
					}
				?>
				</div>
</div>
                </div>
		</div>
		<div class="span4">
				<div class="widgetbox box-inverse">
                <h4 class="widgettitle">Top 5 Links</h4>
                <div class="widgetcontent">
                <table style="width:100%;" border="0">
							<?PHP
							$vPost = mysql_query("SELECT * FROM posting ORDER BY views DESC Limit 5");
							while ($tPost = mysql_fetch_array($vPost)) {
							$file_name = $tPost['namafile'];
							$file_date = $tPost['tanggal'];
							$file_owner = $tPost['pemilik'];
							$file_views = $tPost['views'];
							
							$kUser = mysql_query("SELECT * FROM users WHERE username = '$file_owner'");
							$mUser = mysql_fetch_array($kUser);
							$ID_User = $mUser['id'];
							?>
							<tr>
							<td width="80%"><b><a href='views/<?PHP echo $file_name; ?>' title='Download File <?PHP echo $file_name; ?>'><?PHP echo $file_name; ?></a></b></td>
							<td rowspan="2"><?PHP echo $file_views; ?> Views</td>
							</tr>
							<tr>
							<td colspan="2"><span style="font-size:12px;"><b><i>By</i> <a href="view/u-<?PHP echo $ID_User; ?>" title="View Profile - <?PHP echo $file_owner; ?>"><?PHP echo $file_owner; ?></a></b></span></td>
							</tr>
							<?PHP
							}
							?>
				</table>
                </div>
                </div>
				
				<div class="widgetbox box-success">
				<h4 class="widgettitle">Latest User</h4>
                <div class="widgetcontent">
                <table border="0">
							<?PHP
							$car = mysql_query("SELECT * FROM users WHERE status = 'Member' ORDER BY id DESC Limit 15");
							while ($cUser = mysql_fetch_array($car)) {
							$id_user = $cUser['id'];
							$username = $cUser['username'];
							$date_register = $cUser['tanggal'];
							?>
							<tr>
							<td><b><a href="view/u-<?PHP echo $id_user; ?>" title="View Profile - <?PHP echo $username; ?>"><?PHP echo $username; ?></a></b></td>
							<td>&nbsp;- <i><?PHP echo $date_register; ?></td>
							</tr>
							<?PHP
							}
							?>
				</table>
                </div>
                </div>
		</div>
	</div>
</div>
</div><!--banner-->


<div id="features" class="features">
    <div class="features-inner">
<div class="row-fluid">
            <div class="span2">
                <h4>Partner</h4>
                <a href="http://www.dicari.in">Dicari In</a><br/>
				<a href="http://www.kampoeng.co.id">Kampoeng</a><br/>
				<a href="http://www.lokersoft.com">LokerSoft</a><br/>
				<a href="http://www.koran-artikel.com">Koran Artikel</a>
            </div>
            <div class="span3">
                <h4>Find Us</h4>
				<table border="0">
				<tr>
                <td><i style="color:#fff;" class="iconfa-facebook"></i></td>
				<td>&nbsp;<a href="http://www.facebook.com/Rully.DarkArd">Official Facebook Page</a></td>
				</tr>
				<tr>
                <td><i style="color:#fff;" class="iconfa-twitter"></i></td>
				<td>&nbsp;<a href="https://www.twitter.com/KiritoTechSAO">Official Twitter Account</a></td>
				</tr>
				<tr>
                <td><i style="color:#fff;" class="iconfa-google-plus"></i></td>
				<td>&nbsp;<a href="https://plus.google.com/+RullyArdiansyah">Official Google+</a></td>
				</tr>
                </table>
            </div>
            <div class="span7">
                <h4>Disclaimer</h4>
                <b>Links2Save</b> - Save Your Download Links. All links, images, and all of them belong to the user id. We do not hold the copyright content here, we only owner of this website and organize the links that are here. If there is a user id that stores the download link that is illegal, then the link will be deleted and the user will be given a penalty.
            </div>
        </div><!--row-fluid-->
        
        
    </div><!--features-inner-->
</div><!--features-->

<div class="footer">
    &copy; 2014 - <a href="/" title="<?PHP echo $description; ?>"><?PHP echo $title; ?></a> - All Right Reserved<br/>
	<center>Support By NST-Corporation</center>
</div>
</body>
</html>