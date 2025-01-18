<?php

header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);

// $back = imagecreatefrompng ("images/canvas.png");
$back = imagecreatefromjpeg ("../../images/canvas300.jpg");

$apple     = imagecreatefrompng("../../images/apple.png");
$banana     = imagecreatefrompng("../../images/banana.png");
$orange     = imagecreatefrompng("../../images/orange.png");
$tomato     = imagecreatefrompng("../../images/tomato.png");

$black = imagecolorallocate($back, 0, 0, 0);
$font_file = '../../Inter.ttf';




// $cents_array = $t[0];
$cents = $t;

$array_centes = ["cent_1.png","cent_5.png","cent_10.png","cent_25.png","cent_50.png"];
$path = '../../images/'.$array_centes[$cents];

$coin = imagecreatefrompng ($path);


$x_start = 0;
$y_start = 0;
$objects = [$apple,$banana,$orange,$tomato];
$values = [6,10,0,3];
$col = 4;

// $cents_array = [2,1,0,3];
$value = 0;
$l = 0;
$right =0;


imagecopyresampled($back,$coin,$x_start, $y_start, 0, 0, 300, 300, 220, 220);


$aloud_count =['one','two','three','four','five','six','seven','eight','nine','ten','eleven','twelve','thirteen','fourteen','fiveteen'];
$centes_names = ['1 cent. Penny.', '5 cents. Nickel.','10 cents. Dime.','25 cents. Quater.','50 cents. Half dollar.'];





imagepng($back);
imagedestroy($back);

?>