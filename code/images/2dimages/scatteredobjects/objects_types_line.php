<?php
header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($t);
$type = $t[0];
$n = $t[1];


if ($n<=20){
    $back = imagecreatefromjpeg ("../../images/canvas600_100.jpg");
    $x_start = 50;
    $y_start = 0;
}else{
    $back = imagecreatefromjpeg ("../../images/canvas300_600.jpg");
    $x_start = 50;
    $y_start = 20;
}

require("../lib/objects.php");


$black = imagecolorallocate($back, 0, 0, 0);




$font_file = '../../Inter.ttf';

// imagefttext($back, 48, 0, 50, 100, $black, $font_file, 'A');

    function lined_objects($type,$n,$x_start,$y_start){
        $arr = [];

        $col = 10;
        for($k=0;$k<$n;$k+=1){
            $j = $k%$col;
            $i = intdiv($k,$col);
            $obj = (object) array('x' => $x_start+50*$j,'y' => $y_start+50*$i,'type' => $type);
            array_push($arr,$obj);    
        }
        
        return $arr;
        }

    $arr = lined_objects($type,$n,$x_start,$y_start);


for ($i = 0;$i<count($arr);$i+=1){
    $type = $arr[$i]->type;
    imagecopyresampled($back,$objects[$type],$arr[$i]->x, $arr[$i]->y, 0, 0, 50, 50, 64, 64);
}

imagepng($back);
imagedestroy($back);
?>