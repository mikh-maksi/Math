<?php
header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);


$back = imagecreatefromjpeg ("../../images/canvas.jpg");


$paper     = imagecreatefrompng("../../images/paper.png");
$clay     = imagecreatefrompng("../../images/clay.png");
$string     = imagecreatefrompng("../../images/string.png");
$rubber     = imagecreatefrompng("../../images/rubber.png");
$scale     = imagecreatefrompng("../../images/scale.png");

$col = 2;
for($k=0;$k<count($t);$k+=1){
    $j = $k%$col;
    $i = intdiv($k,$col);
    if ($t[$k] =="paper"){imagecopyresampled($back,$paper  ,     300*$j, 300*$i ,0  , 0, 300, 300, 300, 300); }
    if ($t[$k] =="clay"){imagecopyresampled($back,$clay        , 300*$j, 300*$i  ,0, 0, 300, 300, 300, 300);}
    if ($t[$k] =="string"){imagecopyresampled($back,$string   ,  300*$j, 300*$i ,0  , 0, 300, 300, 300, 300);}
    if ($t[$k] =="rubber"){imagecopyresampled($back,$rubber    , 300*$j, 300*$i, 0, 0, 300, 300, 300, 300);}
    if ($t[$k] =="scale"){imagecopyresampled($back,$scale    , 300*$j, 300*$i, 0, 0, 300, 300, 512, 512);}
}

imageline($back,300,0,300,600, $black);
imageline($back,0,300,600,300, $black);

imagepng($back);
imagedestroy($back);

?>