<?php
include ("cek-login.php");
include ("browser.php");
include ("os.php");
include ("location.php");
$my_ip = $_SERVER['REMOTE_ADDR'];

require_once("konek.php");
$sql = mysql_query("SELECT * FROM users WHERE username = '$username'");
$hasil = mysql_fetch_array($sql);
$username=$hasil['username'];
$nama=$hasil['nama'];
$email=$hasil['email'];
$gender=$hasil['kelamin'];
$city=$hasil['kota'];
$state=$hasil['provinsi'];
$country=$hasil['negara'];
$status=$hasil['status'];
$webs=$hasil['web'];
$facebook=$hasil['facebook'];
$twitter=$hasil['twitter'];
$google=$hasil['google'];

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
<title>Dashboard - Links2Save</title>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="css/responsive-tables.css">
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="prettify/prettify.js"></script>
<script type="text/javascript" src="js/modernizr.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/jquery.jgrowl.js"></script>
<script type="text/javascript" src="js/jquery.alerts.js"></script>
<script type="text/javascript" src="js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="js/flot/jquery.flot.min.js"></script>
<script type="text/javascript" src="js/flot/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="js/responsive-tables.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/elements.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->

<script language="javascript">
function konfirmasi(filename){
ask = confirm('Are You Sure Want To Delete '+filename+' ?');
if (ask == true) return true;
else return false;
}
</script>
</head>

<body>

<div class="mainwrapper">
    
    <div class="header">
        <div class="logo">
            <a href="/dashboard"><img src="images/logo.png" alt="" /></a>
        </div>
        <div class="headerinner">
            <ul class="headmenu">
                <li class="odd"></li>
                <li class="right">
                    <div class="userloggedinfo">
                        <div class="userinfo">
                            <h5><?php echo $username; ?> <small>- <?php echo $email; ?></small></h5>
                            <ul>
                                <li><a href="#">Status : <?php echo $status; ?></a></li>
                                <li><a href="setting">Account Settings</a></li>
                                <li><a href="logout">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul><!--headmenu-->
        </div>
    </div>
    
    <div class="leftpanel">
        
        <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
            	<li class="nav-header">Navigation</li>
                <li class="active"><a href="/dashboard"><span class="iconfa-laptop"></span> Dashboard</a></li>
                <li><a href="/create"><span class="iconfa-pencil"></span> Create</a></li>
                <li><a href="/all"><span class="iconfa-th-list"></span> All Links</a></li>
				<?PHP if($hasil['status'] == "Admin") { ?>
				<li class="nav-header">Admin Menu</li>
				<li><a href=""><span class="fa fa-users"></span> Manage Member</a></li>
				<li><a href=""><span class="fa fa-link"></span> Manage Links</a></li>
				<li><a href=""><span class="fa fa-cog"></span> Setting</a></li>
				<?PHP } ?>
            </ul>
        </div><!--leftmenu-->
        
    </div><!-- leftpanel -->
    
    <div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="/dashboard"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li>Dashboard</li>
            <li class="right">
                    <a href="" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-tint"></i> Color Skins</a>
                    <ul class="dropdown-menu pull-right skin-color">
                        <li><a href="default">Default</a></li>
                        <li><a href="navyblue">Navy Blue</a></li>
                        <li><a href="palegreen">Pale Green</a></li>
                        <li><a href="red">Red</a></li>
                        <li><a href="green">Green</a></li>
                        <li><a href="brown">Brown</a></li>
                    </ul>
            </li>
        </ul>
        
        <div class="maincontent">
            <div class="maincontentinner">
			<div class="row-fluid">
<div id="dashboard-left" class="span8">
<?PHP
	if (isset($_GET['error'])){
	if ($_GET['error']==1){
    echo "<div class='alert alert-error'>
		<button data-dismiss='alert' class='close' type='button'>×</button>
		<strong>Error</strong> Please Enter The File Name !!!
		</div>";
    }
	if ($_GET['error']==2){
	echo "<div class='alert alert-error'>
		<button data-dismiss='alert' class='close' type='button'>×</button>
		<strong>Error</strong> Please Enter The Size Name !!!
		</div>";
	}
	if ($_GET['error']== 'delete'){
	echo "<div class='alert alert-error'>
		<button data-dismiss='alert' class='close' type='button'>×</button>
		<strong>Error</strong> Failed To Delete Your Link !!!
		</div>";
	}
	}
	
	if (isset($_GET['access'])){
	if ($_GET['access']== 'denied'){
    echo "<div class='alert alert-error'>
		<button data-dismiss='alert' class='close' type='button'>×</button>
		<strong>Access Denied</strong> You Don't Have Permission To Remove This Link !!!
		</div>";
    }
	}

	if (isset($_GET['success'])){
	if ($_GET['success']==1){
	echo "<div class='alert alert-success'>
       <button data-dismiss='alert' class='close' type='button'>×</button>
       <strong>Success</strong> Successfully Saved You're Data Links !!!
       </div>";
	}
	if ($_GET['success']== 'delete'){
	echo "<div class='alert alert-success'>
       <button data-dismiss='alert' class='close' type='button'>×</button>
       <strong>Success</strong> Successfully Deleted You're Data Links !!!
       </div>";
	}
	}
?>
<h4 class="widgettitle">Your Links</h4>
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
							<th class="centeralign"><div class="checker" id="uniform-undefined"><span><input type="checkbox" class="checkall" style="opacity: 0;"></span></div></th>
                            <th class="centeralign" width="30%">Filename</th>
                            <th class="centeralign" width="20%">Size</th>
                            <th class="centeralign" width="25%">Date</th>
                            <th class="centeralign">Action</th>
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
							$qCheck = mysql_query("SELECT * FROM posting WHERE pemilik = '$username' ORDER BY id DESC Limit 10");
							while ($rCheck = mysql_fetch_array($qCheck)) {
							$ID_File=$rCheck['id'];
							$name_file=$rCheck['namafile'];
							$size_file=$rCheck['ukuran'];
							$user_file=$rCheck['pemilik'];
							$date_file=$rCheck['tanggal'];
							$views_file=$rCheck['views'];
							?>
							<tr>
							<td class="centeralign"><div class="checker" id="uniform-undefined"><span><input type="checkbox" style="opacity: 0;"></span></div></td>
                            <td width="30%"><?PHP if (!empty($name_file)){
							echo $name_file;
							} else {
							echo "-";
							} ?></td>
                            <td class="centeralign" width="20%"><?PHP if (!empty($size_file)){
							echo $size_file;
							} else {
							echo "-";
							} ?></td>
                            <td class="centeralign" width="25%"><?PHP if (!empty($date_file)){
							echo $date_file;
							} else {
							echo "-";
							} ?></td>
                            <td class="center"><a href="views/<?PHP echo $name_file; ?>">View</a> | <a href="edit/<?PHP echo $name_file; ?>">Edit</a> | <a href="delete?file=<?PHP echo $name_file; ?>" onClick="return konfirmasi('<?PHP echo $name_file; ?>')">Delete</a></td>
							</tr>
							<?PHP
							$no++;
							}
							?>
					</tbody>
                </table>
				<div class="dataTables_info" id="dyntable_info">
				<?PHP
				if (!empty($user_file)){
					$wew = mysql_query("select Count(*) As Total from posting where pemilik = '$user_file'");
					$lel = mysql_num_rows($wew);
					if($lel){
						$lol = mysql_fetch_array($wew);
						$jumlah_file = $lol["Total"];
					}
					$total_pages = ceil($jumlah_file / $perpage);
					echo "Total Page : $total_pages";
				} else {
					echo "Total Page : 0";
				}
				?>
				</div>
				<div class="dataTables_paginate paging_full_numbers" id="dyntable_paginate">
				<?PHP
if (!empty($user_file)){
					if(isset($page)){
					$result = mysql_query("select Count(*) As Total from posting where pemilik = '$user_file'");
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
} else {
echo "No Data Available";
}
				?>
				</div>
</div>
<br/>
<div class="tabbedwidget tab-primary ui-tabs ui-widget ui-widget-content ui-corner-all">
                            <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
                                <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="links" aria-labelledby="ui-id-4" aria-selected="true"><a href="#links" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-4">Latest Links</a></li>
                                <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="users" aria-labelledby="ui-id-5" aria-selected="false"><a href="#users" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-5">Latest Users</a></li>
								<li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="top" aria-labelledby="ui-id-6" aria-selected="false"><a href="#top" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-6">Top Views</a></li>
                            </ul>
                            <div id="links" aria-labelledby="ui-id-4" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="true" aria-hidden="false">
							<table border="0">
							<?PHP
							$post = mysql_query("SELECT * FROM posting ORDER BY id DESC Limit 10");
							while ($cPost = mysql_fetch_array($post)) {
							$id_file = $cPost['id'];
							$filename = $cPost['namafile'];
							$date_post = $cPost['tanggal'];
							$files_owner = $cPost['pemilik'];
							$users = mysql_query("SELECT * FROM users WHERE username='$files_owner'");
							$owner = mysql_fetch_array($users);
							$id_owner = $owner['id'];
							?>
							<tr>
							<td><b><a href="views/<?PHP echo $filename; ?>" title="Download File <?PHP echo $filename; ?>"><?PHP echo $filename; ?></a></b></td>
							<td>&nbsp;By <b><u><a href="view/u-<?PHP echo $id_owner; ?>"><?PHP echo $files_owner; ?></a></u></b></td>
							<td>&nbsp;- <i><?PHP echo $date_post; ?></i></td>
							</tr>
							<?PHP
							}
							?>
							</table>
							</div>
                            <div id="users" aria-labelledby="ui-id-5" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
                            <table border="0">
							<?PHP
							$car = mysql_query("SELECT * FROM users WHERE status = 'Member' ORDER BY id DESC Limit 10");
							while ($cUser = mysql_fetch_array($car)) {
							$id_user = $cUser['id'];
							$username = $cUser['username'];
							$date_register = $cUser['tanggal'];
							?>
							<tr>
							<td><b><a href="view/u-<?PHP echo $id_user; ?>"><?PHP echo $username; ?></a></b></td>
							<td>&nbsp;- <i><?PHP echo $date_register; ?></td>
							</tr>
							<?PHP
							}
							?>
							</table>
                            </div>
							<div id="top" aria-labelledby="ui-id-6" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
							<table border="0">
							<?PHP
							$vPost = mysql_query("SELECT * FROM posting ORDER BY views DESC Limit 5");
							while ($tPost = mysql_fetch_array($vPost)) {
							$file_name = $tPost['namafile'];
							$file_date = $tPost['tanggal'];
							$file_owner = $tPost['pemilik'];
							$file_views = $tPost['views'];
							
							$nUser = mysql_query("SELECT * FROM users where username = '$file_owner' ORDER BY id DESC Limit 10");
							$xUser = mysql_fetch_array($nUser);
							$User_ID = $xUser['id'];
							?>
							<tr>
							<td><b><a href='views/<?PHP echo $file_name; ?>' title='Download File <?PHP echo $file_name; ?>'><?PHP echo $file_name; ?></a></b></td>
							<td>&nbsp; <b><i>By</i> <a href="view/u-<?PHP echo $User_ID; ?>"><?PHP echo $file_owner; ?></a></b></td>
							<td>&nbsp;(<?PHP echo $file_views; ?> Views)</td>
							</tr>
							<?PHP
							}
							?>
							</table>
							</div>
                        </div>
</div>

<div id="dashboard-right" class="span4">
<h4 class="widgettitle">Your Info</h4>
		<div class="widgetcontent">
			<table border="0">
			<tr>
			<td><b>Name</b></td>
			<td>&nbsp;: <?PHP echo $nama; ?></td>
			</tr>
			
			<tr>
			<td><b>Email</b></td>
			<td>&nbsp;: <?PHP echo $email; ?></td>
			</tr>
			
			<tr>
			<td><b>Gender</b></td>
			<td>&nbsp;: <?PHP echo $gender; ?></td>
			</tr>
			
			<tr>
			<td><b>City</b></td>
			<td>&nbsp;: <?PHP echo $city; ?></td>
			</tr>
			
			<tr>
			<td><b>State</b></td>
			<td>&nbsp;: <?PHP echo $state; ?></td>
			</tr>
			
			<tr>
			<td><b>Country</b></td>
			<td>&nbsp;: <?PHP echo $country; ?></td>
			</tr>
			</table>
			<hr/>
			<table border="0">
			<tr>
			<td><b>IP</b></td>
			<td>&nbsp;: <?PHP echo $my_ip; ?></td>
			</tr>
			
			<tr>
			<td><b>Browser</b></td>
			<td>&nbsp;: <?PHP echo $my_browser; ?></td>
			</tr>
			
			<tr>
			<td><b>OS</b></td>
			<td>&nbsp;: <?PHP echo $my_os; ?></td>
			</tr>
			
			<tr>
			<td><b>Total Links</b></td>
			<td>&nbsp;: <?PHP echo $total; ?></td>
			</tr>
			</table>
			<hr/>
			<table border="0">
			<tr>
			<td colspan="2"><b><a href="<?PHP echo $webs; ?>" rel="nofollow">Webs</a></b></td>
			</tr>
			
			<tr>
			<td colspan="2"><b><a href="http://facebook.com/<?PHP echo $facebook; ?>" rel="nofollow">Facebook</a></b></td>
			</tr>
			
			<tr>
			<td colspan="2"><b><a href="https://twitter.com/<?PHP echo $twitter; ?>" rel="nofollow">Twitter</a></b></td>
			</tr>
			
			<tr>
			<td colspan="2"><b><a href="https://plus.google.com/<?PHP echo $google; ?>" rel="nofollow">Google+</a></b></td>
			</tr>
			</table>
		</div>
</div>
            </div>
				
                <div class="footer">
                    <div class="footer-left">
                        <span>&copy; 2014 - <a href="/" title="<?PHP echo $description; ?>"><?PHP echo $title; ?></a> - All Rights Reserved.</span>
                    </div>
                    <div class="footer-right">
                        <span>Powered by: <strong>NST-Corporation</strong></span>
                    </div>
                </div><!--footer-->
                
            </div><!--maincontentinner-->
        </div><!--maincontent-->
        
    </div><!--rightpanel-->
    
</div><!--mainwrapper-->

<script type="text/javascript">
    jQuery(document).ready(function() {
        
      // simple chart
		var flash = [[0, 11], [1, 9], [2,12], [3, 8], [4, 7], [5, 3], [6, 1]];
		var html5 = [[0, 5], [1, 4], [2,4], [3, 1], [4, 9], [5, 10], [6, 13]];
      var css3 = [[0, 6], [1, 1], [2,9], [3, 12], [4, 10], [5, 12], [6, 11]];
			
		function showTooltip(x, y, contents) {
			jQuery('<div id="tooltip" class="tooltipflot">' + contents + '</div>').css( {
				position: 'absolute',
				display: 'none',
				top: y + 5,
				left: x + 5
			}).appendTo("body").fadeIn(200);
		}
	
			
		var plot = jQuery.plot(jQuery("#chartplace"),
			   [ { data: flash, label: "Flash(x)", color: "#6fad04"},
              { data: html5, label: "HTML5(x)", color: "#06c"},
              { data: css3, label: "CSS3", color: "#666"} ], {
				   series: {
					   lines: { show: true, fill: true, fillColor: { colors: [ { opacity: 0.05 }, { opacity: 0.15 } ] } },
					   points: { show: true }
				   },
				   legend: { position: 'nw'},
				   grid: { hoverable: true, clickable: true, borderColor: '#666', borderWidth: 2, labelMargin: 10 },
				   yaxis: { min: 0, max: 15 }
				 });
		
		var previousPoint = null;
		jQuery("#chartplace").bind("plothover", function (event, pos, item) {
			jQuery("#x").text(pos.x.toFixed(2));
			jQuery("#y").text(pos.y.toFixed(2));
			
			if(item) {
				if (previousPoint != item.dataIndex) {
					previousPoint = item.dataIndex;
						
					jQuery("#tooltip").remove();
					var x = item.datapoint[0].toFixed(2),
					y = item.datapoint[1].toFixed(2);
						
					showTooltip(item.pageX, item.pageY,
									item.series.label + " of " + x + " = " + y);
				}
			
			} else {
			   jQuery("#tooltip").remove();
			   previousPoint = null;            
			}
		
		});
		
		jQuery("#chartplace").bind("plotclick", function (event, pos, item) {
			if (item) {
				jQuery("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
				plot.highlight(item.series, item.datapoint);
			}
		});
    
        
        //datepicker
        jQuery('#datepicker').datepicker();
        
        // tabbed widget
        jQuery('.tabbedwidget').tabs();
        
        
    
    });
</script>
</body>
</html>