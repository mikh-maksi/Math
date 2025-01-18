<?php
header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);


$arr2= ['+','-','*','/'];
$n2 = $t[1];
$el1 = $t[0];




$el2 = $arr2[$n2];
$el3 = $t[2];
$el4 = $t[3];


$back = imagecreatefromjpeg ('images/canvas600_100.jpg');
$black = imagecolorallocate($back, 0, 0, 0);

$font_file = 'Inter.ttf';

$text = $el1.$el2.$el3.'='.$el4;


imagefttext($back, 48, 0, 20, 75, $black, $font_file, $text);


imagepng($back);
imagedestroy($back);





?>