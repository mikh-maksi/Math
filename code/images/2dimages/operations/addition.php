<?php
header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);

$back = imagecreatefromjpeg ("../../images/canvas300.jpg");

$font_file = '../../Inter.ttf';

$black = imagecolorallocate($back, 0, 0, 0);


$col = 2;
$obj = 0;


   
$str = $t[0]."+".$t[1]."= ?";
        imagefttext($back, 60, 0, $j*300+20, $i*300+150,  $black, $font_file, $str);



// $w = 40;





// $str = $t[0][0].sign($t[0][2]).$t[0][1]."=".$t[0][3];
// imagefttext($back, 60, 0, 320, 100+50,  $black, $font_file, $str);


imageline($back,300,0,300,600,$black );
imageline($back,0,300,600,300,$black );

function sign($n){
    if ($n==0) $out = "+";
    if ($n==1) $out = "-";
    if ($n==2) $out = "*";
    if ($n==3) $out = "/";
    return $out;
}


imagepng($back);
imagedestroy($back);

?>