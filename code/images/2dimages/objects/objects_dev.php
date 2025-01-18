<?php
header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);


if (count($t)>=3){$back = imagecreatefromjpeg ("../../images/canvas.jpg");}
// 2
if (count($t)==2){$back = imagecreatefromjpeg ("../../images/canvas300_600.jpg");}
// 1
if (count($t)==1){$back = imagecreatefromjpeg ("../../images/canvas300.jpg");}

$paper     = imagecreatefrompng("../../images/paper.png");
$clay     = imagecreatefrompng("../../images/clay.png");
$string     = imagecreatefrompng("../../images/string.png");
$rubber     = imagecreatefrompng("../../images/rubber.png");
$scale     = imagecreatefrompng("../../images/scale.png");

$book     = imagecreatefrompng("../../images/book.png");
$smartphone     = imagecreatefrompng("../../images/smartphone.png");



$col = 2;
for($k=0;$k<count($t);$k+=1){
    $j = $k%$col;
    $i = intdiv($k,$col);
    if ($t[$k] =="paper"){imagecopyresampled($back,$paper  ,     300*$j, 300*$i ,0  , 0, 300, 300, 300, 300); }
    if ($t[$k] =="clay"){imagecopyresampled($back,$clay        , 300*$j, 300*$i  ,0, 0, 300, 300, 300, 300);}
    if ($t[$k] =="string"){imagecopyresampled($back,$string   ,  300*$j, 300*$i ,0  , 0, 300, 300, 300, 300);}
    if ($t[$k] =="rubber"){imagecopyresampled($back,$rubber    , 300*$j, 300*$i, 0, 0, 300, 300, 300, 300);}
    if ($t[$k] =="scale"){imagecopyresampled($back,$scale    , 300*$j, 300*$i, 0, 0, 300, 300, 512, 512);}
    if ($t[$k] =="book"){imagecopyresampled($back,$book    , 300*$j+22, 300*$i+22, 0, 0, 256, 256, 256, 256);}
    if ($t[$k] =="smartphone"){imagecopyresampled($back,$smartphone    , 300*$j+22, 300*$i+22, 0, 0, 256, 256, 256, 256);}
}

imageline($back,300,0,300,600, $black);
imageline($back,0,300,600,300, $black);

imagepng($back);
imagedestroy($back);

?>