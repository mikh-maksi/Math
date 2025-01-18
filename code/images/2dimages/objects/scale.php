<?php
header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);

$back = imagecreatefromjpeg ("../../images/canvas300_600.jpg");






$part1 = $t[1][0];
$part2 = $t[1][1];
$object_name1 =  $t[0][0];
$object_name2 =  $t[0][1];
$str1 = "../../images/img256/".$object_name1.".png";
$str2 = "../../images/img256/".$object_name2.".png";

// echo ($str1);

$object1     = imagecreatefrompng($str1);
$object2     = imagecreatefrompng($str2);
// $object2     = imagecreatefrompng("../../images/".$object_name2.".png");

// $object1     = imagecreatefrompng("../../images/smartphone.png");
// $object2     = imagecreatefrompng("../../images/book.png");


$scales_y = [0,30,60];
$images_y = [15,30,45];

imageline($back,300,300,300,270, $black);
imagefilledellipse($back,300,270,10,10, $black);




imagecopyresampled($back,$object1    , 300*$j+22, 300*$i+$images_y[$part1], 0, 0, 240, 240, 256, 256);
$j = 1;
imagecopyresampled($back,$object2    , 300*$j+22, 300*$i+$images_y[$part2], 0, 0, 240, 240, 256, 256);


if ($part1 > $part2){imageline($back,0,300,600,240, $black);}
if ($part1 == $part2){imageline($back,0,270,600,270, $black);}
if ($part1 < $part2){imageline($back,0,240,600,300, $black);}

imagepng($back);
imagedestroy($back);
?>