<?php
header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);  

$n = $t[1];

$back = imagecreatefromjpeg ("images/canvas300.jpg");
$ball     = imagecreatefrompng("images/ball.png");
$short_pencil     = imagecreatefrompng("images/short_pencil14.png");
$long_pencil    = imagecreatefrompng("images/long_pencil128.png");

$short_ruler     = imagecreatefrompng("images/ruler_short.png");
$long_ruler    = imagecreatefrompng("images/ruler_long.png");

$short_pencil24     = imagecreatefrompng("images/short_pencil24.png");
$long_pencil24    = imagecreatefrompng("images/long_pencil24.png");
$orange     = imagecreatefrompng("images/orange.png");
$house     = imagecreatefrompng("images/house.png");
$building     = imagecreatefrompng("images/building.png");

$feather     = imagecreatefrompng("images/feather.png");
$weight     = imagecreatefrompng("images/weight.png");


$black = imagecolorallocate($back, 0, 0, 0);

$short = [];
$long = [];

array_push($short,$short_pencil);
array_push($short,$short_ruler);

array_push($long,$long_pencil);
array_push($long,$long_ruler);


$font_file = 'Inter.ttf';

imagefttext($back, 48, 0, 50, 295, $black, $font_file, 'A');
imagefttext($back, 48, 0, 215, 295, $black, $font_file, 'B');



if ($t[0]==0){
    imagecopyresampled($back,$short[$n]  ,10, 65, 0, 0, 128, 128, 128, 128);
    imagecopyresampled($back,$long[$n]  ,170, 65, 0, 0, 128, 128, 128, 128);
}else{
    imagecopyresampled($back,$long[$n]  ,10, 65, 0, 0, 128, 128, 128, 128);
    imagecopyresampled($back,$short[$n]  ,170, 65, 0, 0, 128, 128, 128, 128);
}


imagepng($back);
imagedestroy($back);
?>