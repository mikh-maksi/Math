<?php
header("Content-type: image/png");
$string = $_GET['text'];
// Take source form button1.png
$im     = imagecreatefrompng("images/circle_violet.png");
// 
// $orange = imagecolorallocate($im, 220, 210, 60);
// imagesx - given size of object
$px     = (imagesx($im) - 7.5 * strlen($string)) / 2;

$color = imagecolorallocate($im, 220, 255, 255);

imagestring($im, 6, $px, 9, $string, $color);

imagepng($im);
imagedestroy($im);

?>