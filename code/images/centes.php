<?php
header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);

$path = 'images/canvas220_220.jpg';

$back = imagecreatefromjpeg ($path);


$array_centes = ["cent_1.png","cent_5.png","cent_10.png","cent_25.png","cent_50.png"];
$path = 'images/'.$array_centes[$t];

$coin = imagecreatefrompng ($path);


imagecopyresampled($back,$coin,0, 0, 0, 0, 220, 220, 220, 220);







imagepng($back);
imagedestroy($back);
?>