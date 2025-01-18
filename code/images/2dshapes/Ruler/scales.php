<?php
header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);

$line = $t[0]/10;


$start_x = 100;
$start_y = 260;
$width_offset = 30;
$width_x = 5 * 66 + 60 ;

$back = imagecreatefromjpeg ("../../images/canvas300_600.jpg");
$black = imagecolorallocate($back, 0, 0, 0);
$font_file = '../../Inter.ttf';
$size = 12;
$angle = 0;
imageline($back,$start_x,$start_y,$start_x+$width_x,$start_y, $black);
imageline($back,$start_x,$start_y,$start_x,$start_y-100, $black);
imageline($back,$start_x,$start_y-100,$start_x+$width_x,$start_y-100, $black);
imageline($back,$start_x+$width_x,$start_y,$start_x+$width_x,$start_y-100, $black);

imagesetthickness($back, 3);
// scale rectangle
imageline($back,$start_x-20,$start_y+20,$start_x+$width_x+20,$start_y+20, $black);
imageline($back,$start_x-20,$start_y+20,$start_x-20,$start_y+20-140, $black);
imageline($back,$start_x+$width_x+20,$start_y+20,$start_x+$width_x+20,$start_y+20-140, $black);
imageline($back,$start_x-20,$start_y+20-140,$start_x+$width_x+20,$start_y+20-140, $black);

// scale legs
imageline($back,$start_x-20+100,$start_y+20,$start_x-20+100,$start_y+20+20, $black);
imageline($back,$start_x+$width_x+20-100,$start_y+20,$start_x+$width_x+20-100,$start_y+20+20, $black);

imageline($back,$start_x+$width_x/2,$start_y+20-140,$start_x+$width_x/2,$start_y+20-160, $black);

imageline($back,$start_x+$width_x/4,$start_y+20-160,$start_x+$width_x*3/4,$start_y+20-160, $black);


imageline($back,$start_x+$width_x/4,$start_y+20-160,$start_x+$width_x/4-80,$start_y+20-160-80, $black);
imageline($back,$start_x+$width_x*3/4,$start_y+20-160,$start_x+$width_x*3/4+80,$start_y+20-160-80, $black);


imagefilledrectangle($back,$start_x+$width_x/4+40,$start_y+20-160-4,$start_x+$width_x*3/4-40,$start_y+20-160-80,$black);

imagesetthickness($back, 1);

$text = 'g';
imagefttext($back, 12, 0,$start_x+2, $start_y-2,  $black, $font_file,$text);


$text = 'kg';
imagefttext($back, 12, 0, $start_x+2, $start_y-88,  $black, $font_file,$text);
$l = 500;
for($i=0;$i<=500;$i+=1){
    if ($i%10==0){
        imageline($back,$start_x+$width_offset +$i/1.5,$start_y,$start_x+$width_offset +$i/1.5,$start_y-10, $black);
    }
    if ($i%50==0){
        imageline($back,$start_x+$width_offset +$i/1.5,$start_y,$start_x+$width_offset +$i/1.5,$start_y-20, $black);
    }
    if ($i%100==0){
        imageline($back,$start_x+$width_offset +$i/1.5,$start_y,$start_x+$width_offset +$i/1.5,$start_y-25, $black);
        $text = $i*10;
        $bbox = imageftbbox($size, $angle, $font_file , $text);
        $width = $bbox[2] - $bbox[0];
        $height = $bbox[1] - $bbox[5];

        imagefttext($back, 12, 0, $start_x+$width_offset +$i/1.5- $width/2, $start_y-30,  $black, $font_file,$text);
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
        imageline($back,$start_x+$width_offset+$i/1.5,$start_y-105,$start_x+$width_offset+$i/1.5,$start_y+5, $black);
        $text = $i;
        $bbox = imageftbbox($size, $angle, $font_file , $text);
        $width = $bbox[2] - $bbox[0];
        $height = $bbox[1] - $bbox[5];
        imagesetthickness($back, 1);
        // imagefttext($back, 12, 0, 50+$i-$width/1.5,235,  $black, $font_file,$i);
        // imagefttext($back, 12, 0, 50+$i+$width/1.5,235,  $black, $font_file,"cm");
    }
    if ($i%100==0){
        imageline($back, $start_x+$width_offset+$i/1.5   ,$start_y-100,   $start_x+$width_offset+$i/1.5,$start_y-75, $black);
        $text = $i/100;
        $bbox = imageftbbox($size, $angle, $font_file , $text);
        $width = $bbox[2] - $bbox[0];
        $height = $bbox[1] - $bbox[5];

        imagefttext($back, 12, 0, $start_x+$width_offset-$width/2+$i/1.5, $start_y-58,  $black, $font_file,$text);
    }
}
imagepng($back);
imagedestroy($back);

?>