<?php
header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);

$v = $t[0];



$back = imagecreatefromjpeg ("../../images/canvas600_300.jpg");
$black = imagecolorallocate($back, 0, 0, 0);
$gray_alfa = imagecolorallocatealpha($back,0,0,0,99);

$font_file = '../../Inter.ttf';
$size = 12;
$volume = $t[0];
imagesetthickness($back,3);
imageline($back,20,550,280,550, $black);
imageline($back,20,550,280,550, $black);
imageline($back,20,550,20,30, $black);
imageline($back,280,550,280,30, $black);
imagesetthickness($back,1);

imagefilledrectangle($back, 20, 550-$v/10, 280, 550, $gray_alfa);

for($i=1;$i<=500;$i+=1){
    if ($i%10 ==0){
        imageline($back,20,550-$i,30,550-$i, $black);
    }
    if ($i%50 ==0){
        imageline($back,20,550-$i,40,550-$i, $black);
        $text = ($i*10)." ml";
        $bbox = imageftbbox($size, $angle, $font_file , $text);
        $width = $bbox[2] - $bbox[0];
        $height = $bbox[1] - $bbox[5];
        imagesetthickness($back, 1);
        imagefttext($back, 12, 0, 45,550-$i+$height/2,  $black, $font_file,$text);
        // imagefttext($back, 12, 0, 90, 550-$i,  $black, $font_file,"mm");
    }

    if ($i%100 ==0){
        imageline($back,20,550-$i,35,550-$i, $black);
        imageline($back,280,550-$i,260,550-$i, $black);

        $text = ($i/100)." l";
        $bbox = imageftbbox($size, $angle, $font_file , $text);
        $width = $bbox[2] - $bbox[0];
        $height = $bbox[1] - $bbox[5];

        imagefttext($back, 12, 0,240,550-$i+$height/2,  $black, $font_file,$text);
    }
}


imagepng($back);
imagedestroy($back);

?>