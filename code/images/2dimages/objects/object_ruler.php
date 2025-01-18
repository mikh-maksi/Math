<?php
header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);


$back = imagecreatefromjpeg ("../../images/canvas300.jpg");
$black = imagecolorallocate($back, 0, 0, 0);

$apple     = imagecreatefrompng("../../images/apple_middle.png");
$ruler     = imagecreatefrompng("../../images/ruler.png");

$font_file = '../../Inter.ttf';

if ($t[0] =="apple") {imagecopyresampled($back,$apple   ,  50, 50 , 0, 0, 200, 200, 200, 200);}

imagecopyresampled($back,$ruler   ,  90, 200 , 0, 0, 128, 128, 128, 128);



imagepng($back);
imagedestroy($back);

?>