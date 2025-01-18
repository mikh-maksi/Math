<?php
header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);


$text = $t;

$back = imagecreatefromjpeg ('../../images/canvas300_600.jpg');
$black = imagecolorallocate($back, 0, 0, 0);

$font_file = '../../Inter.ttf';
$size = 50;
$angle = 0;


$count =['null','one','two','three','four','five','six','seven','eight','nine','ten','eleven','twelve','thirteen','fourteen','fiveteen','sixteen','seventeen','eightteen','nineteen','twenty'];

// $text = $count[$n];


for ($i=0;$i<count($text);$i+=1){
    $bbox = imageftbbox($size, $angle, $font_file , $text[$i]);

    $width = $bbox[2] - $bbox[0];
    $height = $bbox[1] - $bbox[5];
    imagefttext($back, 48, 0, 300 - $width/2+10 , 60+75*$i, $black, $font_file, $text[$i]);
}


// imageline($back, 300, 0, 300, 100, $black);

imagepng($back);
imagedestroy($back);


?>