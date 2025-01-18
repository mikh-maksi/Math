<?php
header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);

$line = $t[0];

$back = imagecreatefromjpeg ("../../images/canvas300_600.jpg");
$black = imagecolorallocate($back, 0, 0, 0);
$font_file = '../../Inter.ttf';
$size = 12;
$angle = 0;
imageline($back,20,200,580,200, $black);
imageline($back,20,200,20,100, $black);
imageline($back,20,100,580,100, $black);
imageline($back,580,200,580,100, $black);
$text = 'cm';
imagefttext($back, 12, 0, 22, 198,  $black, $font_file,$text);


$text = 'm';
imagefttext($back, 12, 0, 22, 112,  $black, $font_file,$text);
$l = 500;
for($i=0;$i<=500;$i+=1){
    if ($i%10==0){
        imageline($back,50+$i,200,50+$i,190, $black);
    }
    if ($i%50==0){
        imageline($back,50+$i,200,50+$i,180, $black);
    }
    if ($i%100==0){
        imageline($back,50+$i,200,50+$i,175, $black);
        $text = $i;
        $bbox = imageftbbox($size, $angle, $font_file , $text);
        $width = $bbox[2] - $bbox[0];
        $height = $bbox[1] - $bbox[5];

        imagefttext($back, 12, 0, 50+$i- $width/2, 170,  $black, $font_file,$text);
    }
}


for($i=0;$i<=500;$i+=1){
    // if ($i%10==0){
    //     imageline($back,50+$i,200,50+$i,190, $black);
    // }
    // if ($i%50==0){
    //     imageline($back,50+$i,200,50+$i,180, $black);
    // }
    if ($i == $line){
        imagesetthickness($back, 3);
        imageline($back,50+$i,80,50+$i,220, $black);
        $text = $i;
        $bbox = imageftbbox($size, $angle, $font_file , $text);
        $width = $bbox[2] - $bbox[0];
        $height = $bbox[1] - $bbox[5];
        imagesetthickness($back, 1);
        imagefttext($back, 12, 0, 50+$i-$width/2,235,  $black, $font_file,$i);
        imagefttext($back, 12, 0, 50+$i+$width/2,235,  $black, $font_file,"cm");

    }
    if ($i%100==0){
        imageline($back,50+$i,100,50+$i,125, $black);
        $text = $i/100;
        $bbox = imageftbbox($size, $angle, $font_file , $text);
        $width = $bbox[2] - $bbox[0];
        $height = $bbox[1] - $bbox[5];

        imagefttext($back, 12, 0, 50+$i- $width/2, 142,  $black, $font_file,$text);
    }
}
imagepng($back);
imagedestroy($back);

?>