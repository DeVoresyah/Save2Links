<?php
function get_location(){
$my_ip = $_SERVER['REMOTE_ADDR'];
if ($my_ip == "127.0.0.1"){
return "Only Localhost";
exit();
}
include('ip2locationlite.class.php');
$ipLite = new ip2location_lite;
$ipLite->setKey('342200b4507822659cc0459457382e732e0783b7ba5e01a084be0580797c45d0');
$locations = $ipLite->getCity($my_ip);

$country = $locations['countryName'];
$region = $locations['regionName'];
$city = $locations['cityName'];
return "$city, $region, $country";
}
$location = get_location();
?>