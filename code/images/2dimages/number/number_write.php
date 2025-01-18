<?php
header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);


$n = $t[0];

$back = imagecreatefromjpeg ('../../images/canvas600_100.jpg');
$black = imagecolorallocate($back, 0, 0, 0);

$font_file = '../../Inter.ttf';
$size = 50;
$angle = 0;


$count =['null','one','two','three','four','five','six','seven','eight','nine','ten','eleven','twelve','thirteen','fourteen','fiveteen','sixteen','seventeen','eightteen','nineteen','twenty'];

$text = $count[$n];
$bbox = imageftbbox($size, $angle, $font_file , $text);
// imagefttext($back, 48, 0, 20, 75, $black, $font_file, $text);

$text = 'X1=  '.$bbox[0].'  Y1='.$bbox[1].'  X2= '.$bbox[2].'  Y2= '.$bbox[3].'  X3= '.$bbox[4].'  Y3= '.$bbox[5].'  X4='.$bbox[6].'  Y4='.$bbox[7];

// imagefttext($back, 12, 0, 100, 75, $black, $font_file, $text);

$width = $bbox[2] - $bbox[0];
$height = $bbox[1] - $bbox[5];
$text = 'width = '.$width. ' height = '.$height;

// imagefttext($back, 12, 0, 100, 98, $black, $font_file, $text);


// $bbox = imageftbbox($size, $angle, $font_file , $n);
$text = $count[$n];
imagefttext($back, 48, 0, 300 - $width/2+10 , 50+$height/2-5, $black, $font_file, $text);


// imageline($back, 300, 0, 300, 100, $black);

imagepng($back);
imagedestroy($back);


?>