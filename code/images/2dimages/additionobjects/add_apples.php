<?php
header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);

$diff = $t[0];
$sub = $t[1];
$obj = "apple";

$back = imagecreatefromjpeg ("../../images/canvas600_100.jpg");
$black = imagecolorallocate($back, 0, 0, 0);

$n = ($diff + $sub + 1)*45;


$plus     = imagecreatefrompng("../../images/plus.png");

require("../lib/objects.php");


$start_x = $n / 2;

if (($sub+$diff+1)<13){
    $w = 45;
} else{
    $w = 600/($sub+$diff+1);
}
$start_x = 300 - ($sub+$diff+1)*$w/2 ;
for($i = 0; $i<=$sub+$diff;$i+=1){
    if ($i==$diff){
        imagecopyresampled($back,$plus,$start_x+$w*$i, 25, 0, 0, $w, $w, 64, 64);
        $i+=1;
    }
    $object = $objects_name[$obj];
    imagecopyresampled($back,$object,$start_x+$w*$i, 25, 0, 0, $w, $w, 64, 64);
}


imagepng($back);
imagedestroy($back);
?>