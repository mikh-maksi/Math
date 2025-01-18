<?php
header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);

$line = $t[0];

require("../lib/objects.php");

$back = imagecreatefromjpeg ("../../images/canvas300_600.jpg");
$black = imagecolorallocate($back, 0, 0, 0);
$font_file = '../../Inter.ttf';

$size = 12;
$angle = 0;

$start_x = 50;
$start_y = 250;
$width_x = 400;
$height_y = 240;
$w=30;

imagesetthickness($back, 3);
imageline($back,$start_x,$start_y,$start_x + $width_x,$start_y, $black);
imageline($back,$start_x + $width_x,$start_y,$start_x + $width_x-20,$start_y-10, $black);
imageline($back,$start_x + $width_x,$start_y,$start_x + $width_x-20,$start_y+10, $black);

imageline($back,$start_x,$start_y,$start_x ,$start_y-$height_y, $black);
imageline($back,$start_x ,$start_y-$height_y,$start_x+10 ,$start_y-$height_y+20, $black);
imageline($back,$start_x ,$start_y-$height_y,$start_x-10 ,$start_y-$height_y+20, $black);


$size = 20;
$text = "X";
$bbox = imageftbbox($size, $angle, $font_file , $text);
$width = $bbox[2] - $bbox[0];
$height = $bbox[1] - $bbox[5];


for($i=0;$i<count($t);$i+=1){
    for($j=0;$j<$t[$i][1];$j+=1){
        imagefttext($back, $size, 0, $start_x+70*($i+1)-$width/2,$start_y-10-25*$j,  $black, $font_file,$text);
    }
    $size_frac = 15;
    $text_frac = $t[$i][0];
    $bbox = imageftbbox($size_frac, $angle, $font_file , $text_frac);
    $width_text = $bbox[2] - $bbox[0];
    $height_text = $bbox[1] - $bbox[5];

    imagefttext($back, $size_frac, 0, $start_x+70*($i+1)-$width_text/2, $start_y+25,  $black, $font_file,$text_frac);
    // imagefttext($back, $size_frac, 0, $start_x+70*($i+1)-$width_text/2, $start_y+40,  $black, $font_file,$width_text);

}

// imagefttext($back, $size, 0, $start_x+50+$width/2,$start_y-10,  $black, $font_file,$text);
// imagefttext($back, $size, 0, $start_x+50+$width/2,$start_y-10-25,  $black, $font_file,$text);
// imagefttext($back, $size, 0, $start_x+50+$width/2,$start_y-10-25*2,  $black, $font_file,$text);

imagepng($back);
imagedestroy($back);
?>