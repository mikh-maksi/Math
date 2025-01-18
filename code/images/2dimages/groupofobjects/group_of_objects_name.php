<?php

header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);


$back = imagecreatefromjpeg ("../../images/canvas300.jpg");

require("../lib/objects.php");


$black = imagecolorallocate($back, 0, 0, 0);


$font_file = '../../Inter.ttf';


$x_start = 10;
$y_start = 25;

$values = [6,12,0,3];
$col = 4;

    $value = $t[0];
    $object = $objects_name[$t[1]];

    for ($k=0;$k<$value;$k+=1){
            $j = $k%$col;
            $i = intdiv($k,$col);
            imagecopyresampled($back , $object,$x_start+70*$j, $y_start+90*$i, 0, 0, 70, 70, 64, 64);
    }



imagepng($back);
imagedestroy($back);

?>