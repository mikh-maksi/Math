<?php
header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);

$back = imagecreatefromjpeg ("../../images/road6.jpg");

$finish     = imagecreatefrompng("../../images/finish.png");

$car1     = imagecreatefrompng("../../images/car1.png");
$car2     = imagecreatefrompng("../../images/car2.png");
$car3     = imagecreatefrompng("../../images/car3.png");
$car4     = imagecreatefrompng("../../images/car4.png");



imagecopyresampled($back,$finish,550, 21, 0, 0, 50, 50, 128, 128);

imagecopyresampled($back,$car1,20+140*$t[0], 30, 0, 0, 100, 100, 128, 128);
imagecopyresampled($back,$car2,20+140*$t[1], 30, 0, 0, 100, 100, 128, 128);
imagecopyresampled($back,$car3,20+140*$t[2], 30, 0, 0, 100, 100, 128, 128);
imagecopyresampled($back,$car4,20+140*$t[3], 30, 0, 0, 100, 100, 128, 128);



imagepng($back);
imagedestroy($back);
?>