<?php
header("Content-type: image/png");
// $string = $_GET['text'];
// Take source form button1.png
$im     = imagecreatefrompng("images/circle.png");

$image = imagecreatetruecolor(400, 300);
$bg = imagecolorallocate($image, 235, 235, 255);
imagefill($image, 0, 0, $bg);
// 
// $orange = imagecolorallocate($im, 220, 210, 60);
// imagesx - given size of object
// $px     = (imagesx($im) - 7.5 * strlen($string)) / 2;

$color = imagecolorallocate($im, 220, 0, 0);

// imagestring($im, 6, $px, 9, $string, $color);

imagepng($im);
// imagedestroy($im);

?>