<?php
header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);


$back = imagecreatefromjpeg ("../../images/canvas300.jpg");


$paper     = imagecreatefrompng("../../images/paper.png");
$clay     = imagecreatefrompng("../../images/clay.png");
$string     = imagecreatefrompng("../../images/string.png");
$rubber     = imagecreatefrompng("../../images/rubber.png");
$scale     = imagecreatefrompng("../../images/scale.png");


    if ($t[0] =="paper") {imagecopyresampled($back,$paper   ,  0, 0 , 0, 0, 300, 300, 300, 300);}
    if ($t[0] =="clay")  {imagecopyresampled($back,$clay    ,  0, 0 , 0, 0, 300, 300, 300, 300);}
    if ($t[0] =="string"){imagecopyresampled($back,$string  ,  0, 0 , 0, 0, 300, 300, 300, 300);}
    if ($t[0] =="rubber"){imagecopyresampled($back,$rubber  ,  0, 0 , 0, 0, 300, 300, 300, 300);}
    if ($t[0] =="scale") {imagecopyresampled($back,$scale   ,  0, 0 , 0, 0, 300, 300, 512, 512);}

// imageline($back,300,0,300,600, $black);
// imageline($back,0,300,600,300, $black);

imagepng($back);
imagedestroy($back);

?>