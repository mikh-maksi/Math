<?php

header("Content-type: image/png");

if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);


$back = imagecreatefromjpeg ("../../images/canvas.jpg");

require("../lib/objects.php");


$black = imagecolorallocate($back, 0, 0, 0);


$font_file = '../../Inter.ttf';

imageline($back,300,0,300,600,$black );
imageline($back,0,300,600,300,$black );






$x_start = 10;
$y_start = 5;

$values = [6,12,0,3];
$col = 4;

    // $value = $t[0];

    // $object = $objects[$t[1]];

    for($m=0;$m<count($t);$m+=1){
    $jj = $m%2;
    $ii = intdiv($m,2);
    $value = $t[$m][0];
    $object = $objects[$t[$m][1]];
    for ($k=0;$k<$value;$k+=1){
            $j = $k%$col;
            $i = intdiv($k,$col);
            imagecopyresampled($back , $object,$x_start+70*$j+300*$jj, $y_start+90*$i+300*$ii, 0, 0, 70, 70, 64, 64);
    }

 
    }
    imagefttext($back, 48, 0, 150-24, 300-1, $black, $font_file, 'A');
    imagefttext($back, 48, 0, 450-24, 300-1, $black, $font_file, 'B');
    imagefttext($back, 48, 0, 150-24, 600-1, $black, $font_file, 'C');
    imagefttext($back, 48, 0, 450-24, 600-1, $black, $font_file, 'D');
    

imagepng($back);
imagedestroy($back);

?>