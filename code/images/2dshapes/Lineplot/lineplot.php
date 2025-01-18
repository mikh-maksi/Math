<?php
header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);

$line = $t[0];

$back = imagecreatefromjpeg ("../../images/canvas300_600.jpg");
$black = imagecolorallocate($back, 0, 0, 0);
$font_file = '../../Inter.ttf';
$size = 12;
$angle = 0;

$start_x = 50;
$start_y = 250;
$width_x = 300;
$height_y = 200;

imagesetthickness($back, 3);
imageline($back,$start_x,$start_y,$start_x + $width_x,$start_y, $black);
imageline($back,$start_x,$start_y,$start_x ,$start_y-$height_y, $black);


imagepng($back);
imagedestroy($back);
?>