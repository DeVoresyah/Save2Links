<?PHP
require_once ("konek.php");
include ("cek-login.php");

$name_file = $_GET['name'];
$q = mysql_query("select * from posting where namafile='$name_file'");
$postlinks = mysql_fetch_array($q);
$id=$postlinks['id'];
$filename=$postlinks['namafile'];
$size=$postlinks['ukuran'];
$googledrive=$postlinks['gdrive'];
$indowebster=$postlinks['idws'];
$sharebeast=$postlinks['sharebeast'];
$mediafire=$postlinks['mediafire'];
$solidfiles=$postlinks['solidfiles'];
$tusfiles=$postlinks['tusfiles'];
$shared=$postlinks['4shared'];
$gett=$postlinks['gett'];
$uppit=$postlinks['uppit'];
$tanggal=$postlinks['tanggal'];
$pemilik=$postlinks['pemilik'];

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
<title>Edit A Link - <?PHP echo $title; ?></title>
<link rel='stylesheet' href='../css/style.default.css' type='text/css' />

<link rel='stylesheet' href='../css/responsive-tables.css'>
<script type='text/javascript' src='../js/jquery-1.9.1.min.js'></script>
<script type='text/javascript' src='../js/jquery-migrate-1.1.1.min.js'></script>
<script type='text/javascript' src='../js/jquery-ui-1.9.2.min.js'></script>
<script type='text/javascript' src='../prettify/prettify.js'></script>
<script type='text/javascript' src='../js/modernizr.min.js'></script>
<script type='text/javascript' src='../js/bootstrap.min.js'></script>
<script type='text/javascript' src='../js/jquery.cookie.js'></script>
<script type='text/javascript' src='../js/jquery.jgrowl.js'></script>
<script type='text/javascript' src='../js/jquery.alerts.js'></script>
<script type='text/javascript' src='../js/jquery.uniform.min.js'></script>
<script type='text/javascript' src='../js/flot/jquery.flot.min.js'></script>
<script type='text/javascript' src='../js/flot/jquery.flot.resize.min.js'></script>
<script type='text/javascript' src='../js/responsive-tables.js'></script>
<script type='text/javascript' src='../js/custom.js'></script>
<script type='text/javascript' src='../js/elements.js'></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="../js/excanvas.min.js"></script><![endif]-->
</head>

<body>

<div class="mainwrapper">
    
    <div class="header">
        <div class="logo">
            <a href="/dashboard"><img src="../images/logo.png" alt="" /></a>
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
                                <li><a href="../setting">Account Settings</a></li>
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
                <li><a href="/all"><span class="iconfa-th-list"></span> All Links</a></li>
            </ul>
        </div><!--leftmenu-->
        
    </div><!-- leftpanel -->
    
    <div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="/dashboard"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li>Edit</li>
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
<?php if($postlinks['pemilik'] == "$username") { ?>
<h4 class='widgettitle'>Edit A Link</h4>
	<div style='height:400px;' class='widgetcontent'>
		<form action='../update.php' method='post'>
		<div class='span3'>
		<input style='display:none;' type='text' name='id' class='input-medium' value='<?PHP echo $id; ?>'>
			<table border='0'>
			<tr>
			<td>Filename </td>
			<td>&nbsp;: <input style='height:27px;' type='text' name='namafile' class='input-medium' value='<?PHP echo $filename; ?>'></td>
			</tr>
		
			<tr>
			<td>Size </td>
			<td>&nbsp;: <input style='height:27px;' type='text' name='ukuran' class='input-medium' value='<?PHP echo $size; ?>'></td>
			</tr>
			</table>
		</div>
		
		<div class='span5'>
			<table border='0'>
			<tr>
			<td>Google Drive </td>
			<td>&nbsp;: <input style='height:27px;' type='text' name='gdrive' class='input-xlarge' value='<?PHP echo $googledrive; ?>'></td>
			</tr>
		
			<tr>
			<td>Indowebster </td>
			<td>&nbsp;: <input style='height:27px;' type='text' name='idws' class='input-xlarge' value='<?PHP echo $indowebster; ?>'></td>
			</tr>
		
			<tr>
			<td>Sharebeast </td>
			<td>&nbsp;: <input style='height:27px;' type='text' name='sharebeast' class='input-xlarge' value='<?PHP echo $sharebeast; ?>'></td>
			</tr>
			
			<tr>
			<td>Mediafire </td>
			<td>&nbsp;: <input style='height:27px;' type='text' name='mediafire' class='input-xlarge' value='<?PHP echo $mediafire; ?>'></td>
			</tr>
			
			<tr>
			<td>Solidfiles </td>
			<td>&nbsp;: <input style='height:27px;' type='text' name='solidfiles' class='input-xlarge' value='<?PHP echo $solidfiles; ?>'></td>
			</tr>
			
			<tr>
			<td>Tusfiles </td>
			<td>&nbsp;: <input style='height:27px;' type='text' name='tusfiles' class='input-xlarge' value='<?PHP echo $tusfiles; ?>'></td>
			</tr>
			
			<tr>
			<td>4Shared </td>
			<td>&nbsp;: <input style='height:27px;' type='text' name='4shared' class='input-xlarge' value='<?PHP echo $shared; ?>'></td>
			</tr>
			
			<tr>
			<td>GE.TT </td>
			<td>&nbsp;: <input style='height:27px;' type='text' name='gett' class='input-xlarge' value='<?PHP echo $gett; ?>'></td>
			</tr>
			
			<tr>
			<td>UppIT </td>
			<td>&nbsp;: <input style='height:27px;' type='text' name='uppit' class='input-xlarge' value='<?PHP echo $uppit; ?>'></td>
			</tr>
			</table>
		</div>
		<button type='submit' class='btn btn-primary'>Save Setting</button><br/>
		<a href='/dashboard' class='btn btn-primary'>Cancel</a>
		</form>
	</div>
<?php } else { ?>
<div class='alert alert-error'>
<strong>Error</strong> You do not have permission to edit this link !!!
</div><?php }
?>
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