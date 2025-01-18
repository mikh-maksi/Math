<?php
header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);


$n1 = $t[0];
$n2 = $t[1];

$back = imagecreatefromjpeg ('../../images/canvas180_100.jpg');
$black = imagecolorallocate($back, 0, 0, 0);

$font_file = '../../Inter.ttf';
$size = 50;
$angle = 0;

$text = $n1.'  '.$n2;


$bbox = imageftbbox($size, $angle, $font_file , $text);

// $text = 'X1=  '.$bbox[0].'  Y1='.$bbox[1].'  X2= '.$bbox[2].'  Y2= '.$bbox[3].'  X3= '.$bbox[4].'  Y3= '.$bbox[5].'  X4='.$bbox[6].'  Y4='.$bbox[7];


$width = $bbox[2] - $bbox[0];
$height = $bbox[1] - $bbox[5];
// $text = 'width = '.$width. ' height = '.$height;

// $text = $width;
imagefttext($back, 48, 0,  (180-$width)/2 , 50+$height/2-5, $black, $font_file, $text);


imagepng($back);
imagedestroy($back);


?>