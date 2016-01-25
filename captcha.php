<?PHP
date_default_timezone_set("Asia/Jakarta");
$captchaTextSize = 5;
do {
    $md5Hash = md5(microtime() * mktime());
    preg_replace('([1aeilou0])', "", $md5Hash);
} while(strlen($md5Hash) < $captchaTextSize);
$key = substr($md5Hash, 0, $captchaTextSize);
setcookie("captcha_code", md5($key), time()+60*10, '/');
$captchaImage = imagecreatefrompng("/images/capcay.png");
$textColor = imagecolorallocate($captchaImage, 31, 118, 92);
$lineColor = imagecolorallocate($captchaImage, 15, 103, 103);
$imageInfo = getimagesize("/images/capcay.png");
$linesToDraw = 30;
for($i = 0; $i < $linesToDraw; $i++) {
    $xStart = mt_rand(0, $imageInfo[ 0 ]);
    $xEnd = mt_rand(0, $imageInfo[ 0 ]);
    imageline($captchaImage, $xStart, 0, $xEnd, $imageInfo[1], $lineColor);
}
imagettftext($captchaImage, 20, 0, 35, 35, $textColor, "/font/VeraBd.ttf", $key);
header ("Content-type: image/png");
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Fri, 19 Jan 1994 05:00:00 GMT");
header("Pragma: no-cache");
imagepng($captchaImage);
?>