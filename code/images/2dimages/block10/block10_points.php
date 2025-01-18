<?php
header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);

$num = $t[0];

$back = imagecreatefromjpeg ('../../images/canvas300_600.jpg');
$black = imagecolorallocate($back, 0, 0, 0);

$font_file = '../../Inter.ttf';

$n = 10;
$start_x = 100;
$start_y = 50;


// imagefilledellipse($back,10,10,10,10, $black);
$k = 0;
for($j=0;$j<10;$j+=1){
    for($i=0;$i<10;$i+=1){
        imageline($back,$start_x+$j*40,$start_y+$i*20,$start_x+20+$j*40,$start_y+$i*20, $black);
        if ($k<$num){
        imagefilledellipse($back,$start_x+$j*40+10,$start_y+$i*20+10,10,10, $black);
        $k+=1;
        }
    }
    $i = 10;

    imageline($back,$start_x+$j*40,$start_y+$i*20,$start_x+20+$j*40,$start_y+$i*20, $black);
    imageline($back,$start_x+$j*40,$start_y+0,$start_x+$j*40,$start_y+$n*20, $black);
    imageline($back,$start_x+$j*40+20,$start_y+0,$start_x+$j*40+20,$start_y+$n*20, $black);
}
// imageline($back,0,0,0,$n*20, $black);
// imageline($back,20,0,20,$n*20, $black);
// imageline($back,0,0,40,0, $black);
// imageline($back,0,20,40,20, $black);
// imageline($back,0,40,40,40, $black);
// imageline($back,0,60,40,60, $black);


// imageline($back,0,0,0,100, $black);
// imageline($back,20,0,20,100, $black);
// imageline($back,40,0,40,100, $black);
// imageline($back,0,0,0,100, $black);


// imageline($back,300,300,300,270, $black);
// imagefilledellipse($back,300,270,10,10, $black);


imagepng($back);
imagedestroy($back);

?>