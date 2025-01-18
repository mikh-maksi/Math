<?php
header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);

$back = imagecreatefromjpeg ("../../images/canvas300_600.jpg");


$blur64 = imagecreatefrompng ("../../images/blur64.png");
require("../lib/objects.php");

$black = imagecolorallocate($back, 0, 0, 0);

imagecopyresampled($back,$objects[0],100, 100, 0, 0, 64, 64, 64, 64);
imagecopyresampled($back,$blur64,100, 100, 0, 0, 64, 64, 64, 64);


imagepng($back);
imagedestroy($back);

?>