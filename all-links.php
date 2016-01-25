<?php
include ("cek-login.php");

require_once("konek.php");
$sql = mysql_query("SELECT * FROM users WHERE username = '$username'");
$hasil = mysql_fetch_array($sql);
$username=$hasil['username'];
$nama=$hasil['nama'];
$email=$hasil['email'];
$status=$hasil['status'];

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
<title>All Links - <?PHP echo $title; ?></title>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />

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
                <li><a href="/dashboard"><span class="iconfa-laptop"></span> Dashboard</a></li>
                <li><a href="/create"><span class="iconfa-pencil"></span> Create</a></li>
                <li class="active"><a href="/all"><span class="iconfa-th-list"></span> All Links</a></li>
            </ul>
        </div><!--leftmenu-->
        
    </div><!-- leftpanel -->
    
    <div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="/dashboard"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li>All Links</li>
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
<div id="dashboard-left">
<h4 class="widgettitle">All Links</h4>
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
							<th class="centeralign" width="10%">Views</th>
                            <th class="centeralign">Owner</th>
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
							$qCheck = mysql_query("SELECT * FROM posting ORDER BY id DESC Limit 20");
							while ($rCheck = mysql_fetch_array($qCheck)) {
							$id_file=$rCheck['id'];
							$name_file=$rCheck['namafile'];
							$size_file=$rCheck['ukuran'];
							$user_file=$rCheck['pemilik'];
							$date_file=$rCheck['tanggal'];
							$views_file=$rCheck['views'];
							
							$jCheck = mysql_query("SELECT * FROM users WHERE username='$user_file'");
							$owner = mysql_fetch_array($jCheck);
							$id_owner = $owner['id'];
							?>
							<tr>
							<td class="centeralign"><div class="checker" id="uniform-undefined"><span><input type="checkbox" style="opacity: 0;"></span></div></td>
                            <td width="30%"><a href="views/<?PHP echo $name_file; ?>" title="Download File <?PHP echo $name_file; ?>"><?PHP echo $name_file; ?></a></td>
                            <td class="centeralign" width="20%"><?PHP echo $size_file; ?></td>
                            <td class="centeralign" width="25%"><?PHP echo $date_file; ?></td>
							<td class="centeralign" width="10%"><?PHP echo $views_file; ?></td>
                            <td class="center"><b><a href="view/u-<?PHP echo $id_owner; ?>"><?PHP echo $user_file; ?></a></b></td>
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
