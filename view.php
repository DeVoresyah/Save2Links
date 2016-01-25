<?php
require_once("konek.php");

$name_file = $_GET['name'];
$research = mysql_query("SELECT * FROM posting WHERE namafile = '$name_file'");
$data = mysql_fetch_array($research);
$filename = $data['namafile'];
$size = $data['ukuran'];
$googledrive = $data['gdrive'];
$indowebster = $data['idws'];
$sharebeast = $data['sharebeast'];
$mediafire = $data['mediafire'];
$solidfiles = $data['solidfiles'];
$tusfiles = $data['tusfiles'];
$shared = $data['4shared'];
$gett = $data['gett'];
$uppit = $data['uppit'];
$date = $data['tanggal'];
$owner = $data['pemilik'];
$views = $data['views'];
$update_views = $views + 1;
$sql_update = mysql_query("update posting set views='$update_views' where namafile = '$filename'");

$sql = mysql_query("SELECT * FROM users WHERE username = '$owner'");
$hasil = mysql_fetch_array($sql);
$id_user = $hasil['id'];
$user_name = $hasil['username'];
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
<title>Download File <?PHP echo $filename; ?></title>
<meta name="description" content="<?PHP echo $description; ?>"/>
<meta name="author" content="<?PHP echo $author; ?>">
<link rel="stylesheet" href="../css/style.default.css" type="text/css" />
<link rel="stylesheet" href="../css/button.css" type="text/css" />
<link rel="stylesheet" href="../style.css" type="text/css" />
<link rel="stylesheet" href="../css/colorbox.css" type="text/css" />
<link rel="stylesheet" href="../prettify/prettify.css" type="text/css" />


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
.maincontentinner{
padding:0 !important;
}
.row-fluid{
width:980px !important;
float: center;
margin: auto;
}
.span8{
width:100% !important;
}
.span4-kiri{
margin-top:20px;
margin-left:0 !important;
width: 500px !important;
}
.span4-kanan{
margin-top:20px;
margin-left: 20px !important;
width: 460px !important;
}
.btn-success {
border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
}
.btn-success {
color: #ffffff;
text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
background-color: #5bb75b;
background-image: -moz-linear-gradient(top, #62c462, #51a351);
background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#62c462), to(#51a351));
background-image: -webkit-linear-gradient(top, #62c462, #51a351);
background-image: -o-linear-gradient(top, #62c462, #51a351);
background-image: linear-gradient(to bottom, #62c462, #51a351);
background-repeat: repeat-x;
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff62c462', endColorstr='#ff51a351', GradientType=0);
border-color: #51a351 #51a351 #387038;
border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
}
</style>

<div class="header">
    <div class="header-inner">
        <div class="logo">
            <img src="../images/logo.png" alt="" />
        </div>
        
		<?PHP
		session_start();
		if(!isset($_SESSION['username'])) {
		?>
        <ul class="head-menu">
            <li><a href="../">Home</a></li>
            <li><a href="../login">Login</a></li>
			<li><a href="../register">Register</a></li>
        </ul>
		<?PHP
		}
		else {
		$my_sesi = $_SESSION['username'];
		?>
        <ul class="head-menu">
			<li><a href="../dashboard">Dashboard</a></li>
            <li><a href="../all">All Links</a></li>
			<li><a href="../create">Create</a></li>
			<li><a href="../setting">Setting</a></li>
			<li><a href="../logout">Logout</a></li>
        </ul>
		<?PHP } ?>

    </div><!--header-inner-->
</div><!--header-->
<br/>
<div id="about" class="banner">
<div class="maincontentinner">
	<div class="row-fluid">
		<div class="span8">
				<div class="widgetbox">
                <h4 class="widgettitle"><center>Links Download <?PHP echo $filename; ?></center></h4>
				<div style="height:650px;" class="widgetcontent">
					<div class="span8">
					<table style="width:500px;" class="table table-bordered responsive">
                    <colgroup>
                        <col class="con0">
                        <col class="con1">
                        <col class="con0">
                        <col class="con1">
                        <col class="con0">
                    </colgroup>
                    <thead>
                    </thead>
					<tbody>
						<tr>
							<td width="20%"><b>Filename</b></td>
							<td><?PHP echo $filename; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Size</b></td>
							<td><?PHP echo $size; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Owner</b></td>
							<td><a href="../view/u-<?PHP echo $id_user; ?>"><?PHP echo $owner; ?></a></td>
						</tr>
						<tr>
							<td width="20%"><b>Date</b></td>
							<td><?PHP echo $date; ?></td>
						</tr>
					</tbody>
					</table>

					<table class="table table-bordered responsive">
                    <colgroup>
                        <col class="con1">
                        <col class="con0">
                        <col class="con1">
                        <col class="con0">
                        <col class="con1">
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="centeralign" width="40%">Server</th>
                            <th class="centeralign" width="30%">Status</th>
                            <th class="centeralign" width="30%">Link Download</th>
                        </tr>
                    </thead>
					<tbody>
						<tr>
							<td class="centeralign"><h4 style='margin-top:5px;'><b>Google Drive</b></h4></td>
							<td class="centeralign">
							<?PHP
							if (!empty($googledrive)){
							echo "<h3 style='margin-top:5px;' class='text-success'><b>Available</b></h4>";
							}
							else{
							echo "<h3 style='margin-top:5px;' class='text-error'><b>Unavailable</b></h4>";
							}
							?></td>
							<td class="centeralign">
							<?PHP
							if (!empty($googledrive)){
							echo "<a href='$googledrive' class='btn btn-success' rel='nofollow'>Click Here</a>";
							}
							else{
							echo "<a class='btn btn-error'>Not Found</a>";
							}
							?></td>
						</tr>
						
						<tr>
							<td class="centeralign"><h4 style='margin-top:5px;'><b>Indowebster</b></h4></td>
							<td class="centeralign">
							<?PHP
							if (!empty($indowebster)){
							echo "<h3 style='margin-top:5px;' class='text-success'><b>Available</b></h4>";
							}
							else{
							echo "<h3 style='margin-top:5px;' class='text-error'><b>Unavailable</b></h4>";
							}
							?></td>
							<td class="centeralign">
							<?PHP
							if (!empty($indowebster)){
							echo "<a href='$indowebster' class='btn btn-success' rel='nofollow'>Click Here</a>";
							}
							else{
							echo "<a class='btn btn-danger'>Not Found</a>";
							}
							?></td>
						</tr>
						
						<tr>
							<td class="centeralign"><h4 style='margin-top:5px;'><b>Sharebeast</b></h4></td>
							<td class="centeralign">
							<?PHP
							if (!empty($sharebeast)){
							echo "<h3 style='margin-top:5px;' class='text-success'><b>Available</b></h4>";
							}
							else{
							echo "<h3 style='margin-top:5px;' class='text-error'><b>Unavailable</b></h4>";
							}
							?></td>
							<td class="centeralign">
							<?PHP
							if (!empty($sharebeast)){
							echo "<a href='$sharebeast' class='btn btn-success' rel='nofollow'>Click Here</a>";
							}
							else{
							echo "<a class='btn btn-danger'>Not Found</a>";
							}
							?></td>
						</tr>
						
						<tr>
							<td class="centeralign"><h4 style='margin-top:5px;'><b>Mediafire</b></h4></td>
							<td class="centeralign">
							<?PHP
							if (!empty($mediafire)){
							echo "<h3 style='margin-top:5px;' class='text-success'><b>Available</b></h4>";
							}
							else{
							echo "<h3 style='margin-top:5px;' class='text-error'><b>Unavailable</b></h4>";
							}
							?></td>
							<td class="centeralign">
							<?PHP
							if (!empty($mediafire)){
							echo "<a href='$mediafire' class='btn btn-success' rel='nofollow'>Click Here</a>";
							}
							else{
							echo "<a class='btn btn-danger'>Not Found</a>";
							}
							?></td>
						</tr>
						
						<tr>
							<td class="centeralign"><h4 style='margin-top:5px;'><b>Solidfiles</b></h4></td>
							<td class="centeralign">
							<?PHP
							if (!empty($solidfiles)){
							echo "<h3 style='margin-top:5px;' class='text-success'><b>Available</b></h4>";
							}
							else{
							echo "<h3 style='margin-top:5px;' class='text-error'><b>Unavailable</b></h4>";
							}
							?></td>
							<td class="centeralign">
							<?PHP
							if (!empty($solidfiles)){
							echo "<a href='$solidfiles' class='btn btn-success' rel='nofollow'>Click Here</a>";
							}
							else{
							echo "<a class='btn btn-danger'>Not Found</a>";
							}
							?></td>
						</tr>
						
						<tr>
							<td class="centeralign"><h4 style='margin-top:5px;'><b>Tusfiles</b></h4></td>
							<td class="centeralign">
							<?PHP
							if (!empty($tusfiles)){
							echo "<h3 style='margin-top:5px;' class='text-success'><b>Available</b></h4>";
							}
							else{
							echo "<h3 style='margin-top:5px;' class='text-error'><b>Unavailable</b></h4>";
							}
							?></td>
							<td class="centeralign">
							<?PHP
							if (!empty($tusfiles)){
							echo "<a href='$tusfiles' class='btn btn-success' rel='nofollow'>Click Here</a>";
							}
							else{
							echo "<a class='btn btn-danger'>Not Found</a>";
							}
							?></td>
						</tr>
						
						<tr>
							<td class="centeralign"><h4 style='margin-top:5px;'><b>4Shared</b></h4></td>
							<td class="centeralign">
							<?PHP
							if (!empty($shared)){
							echo "<h3 style='margin-top:5px;' class='text-success'><b>Available</b></h4>";
							}
							else{
							echo "<h3 style='margin-top:5px;' class='text-error'><b>Unavailable</b></h4>";
							}
							?></td>
							<td class="centeralign">
							<?PHP
							if (!empty($shared)){
							echo "<a href='$shared' class='btn btn-success' rel='nofollow'>Click Here</a>";
							}
							else{
							echo "<a class='btn btn-danger'>Not Found</a>";
							}
							?></td>
						</tr>
						
						<tr>
							<td class="centeralign"><h4 style='margin-top:5px;'><b>GE.TT</b></h4></td>
							<td class="centeralign">
							<?PHP
							if (!empty($gett)){
							echo "<h3 style='margin-top:5px;' class='text-success'><b>Available</b></h4>";
							}
							else{
							echo "<h3 style='margin-top:5px;' class='text-error'><b>Unavailable</b></h4>";
							}
							?></td>
							<td class="centeralign">
							<?PHP
							if (!empty($gett)){
							echo "<a href='$gett' class='btn btn-success' rel='nofollow'>Click Here</a>";
							}
							else{
							echo "<a class='btn btn-danger'>Not Found</a>";
							}
							?></td>
						</tr>
						
						<tr>
							<td class="centeralign"><h4 style='margin-top:5px;'><b>UppIT</b></h4></td>
							<td class="centeralign">
							<?PHP
							if (!empty($uppit)){
							echo "<h3 style='margin-top:5px;' class='text-success'><b>Available</b></h4>";
							}
							else{
							echo "<h3 style='margin-top:5px;' class='text-error'><b>Unavailable</b></h4>";
							}
							?></td>
							<td class="centeralign">
							<?PHP
							if (!empty($uppit)){
							echo "<a href='$uppit' class='btn btn-success' rel='nofollow'>Click Here</a>";
							}
							else{
							echo "<a class='btn btn-danger'>Not Found</a>";
							}
							?></td>
						</tr>
					</tbody>
					</table>
					</div>
				</div>
				</div>
				
				<div class="span4-kiri">
				<div class="widgetbox box-warning">
				<h4 class="widgettitle">Share Code</h4>
                <div class="widgetcontent">
				URL :<br/>
				<input type="text" style="width:100%;" onclick="select()" value="http://localhost/views/<?PHP echo $filename; ?>" readonly><br/>
				HTML Code :<br/>
				<input type="text" style="width:100%;" onclick="select()" value="&lt;a href=&#039;http://localhost/views/<?PHP echo $filename; ?>&#039; title=&#039;Download File <?PHP echo $filename; ?> (<?PHP echo $size; ?>)&#039;&gt;<?PHP echo $filename; ?>&lt;/a&gt;" readonly><br/>
				Forum Code :<br/>
				<input type="text" style="width:100%;" onclick="select()" value="[url=http://localhost/views/<?PHP echo $filename; ?>]<?PHP echo $filename; ?>[/url]" readonly>
                </div>
                </div>
				</div>
				
				<div class="span4-kanan">
				<div class="widgetbox box-inverse">
                <h4 class="widgettitle">Share To</h4>
                <div class="widgetcontent">
<center>
<div class='sharebutton'>
<a class='fbshare' href='http://www.facebook.com/sharer.php?u=http://localhost/views/<?PHP echo $filename; ?>' rel='nofollow' target='_blank'>Facebook</a>
<a class='twshare' href='http://twitter.com/share?url=http://localhost/views/<?PHP echo $filename; ?>' rel='nofollow' target='_blank'>Twitter</a>
<a class='plshare' href='https://plus.google.com/share?url=http://localhost/views/<?PHP echo $filename; ?>' rel='nofollow' target='_blank'>Google+</a>
<a class='lkshare' href='http://www.linkedin.com/cws/share?url=http://localhost/views/<?PHP echo $filename; ?>' rel='nofollow' target='_blank'>Linkedin</a>
<a class='tcshare' href='http://technorati.com/faves?sub=addfavbtn&amp;add=http://localhost/views/<?PHP echo $filename; ?>' rel='nofollow' target='_blank'>Technorati</a>
<a class='dgshare' href='http://digg.com/submit?url=http://localhost/views/<?PHP echo $filename; ?>' rel='nofollow' target='_blank'>Digg</a>
</div>
</center>		
                </div>
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