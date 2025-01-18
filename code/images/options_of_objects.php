<?php
header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);  


//big,small,light,heavy

$back = imagecreatefromjpeg ("images/canvas300.jpg");
$ball     = imagecreatefrompng("images/ball.png");
$short_pencil     = imagecreatefrompng("images/short_pencil.png");
$long_pencil    = imagecreatefrompng("images/long_pencil.png");
$short_pencil24     = imagecreatefrompng("images/short_pencil24.png");
$long_pencil24    = imagecreatefrompng("images/long_pencil24.png");
$orange     = imagecreatefrompng("images/orange.png");


$house     = imagecreatefrompng("images/house.png");
$building     = imagecreatefrompng("images/building.png");

$feather     = imagecreatefrompng("images/feather.png");
$weight     = imagecreatefrompng("images/weight.png");


$big = [];
$small = [];
$heavy = [];
$light = [];
$short = [];
$long = [];

array_push($big,$building);
array_push($small,$house);

array_push($heavy,$weight);
array_push($light,$feather);

array_push($short,$short_pencil);
array_push($long,$long_pencil);


$black = imagecolorallocate($back, 0, 0, 0);

$font_file = 'Inter.ttf';

imagefttext($back, 48, 0, 50, 295, $black, $font_file, 'C');
imagefttext($back, 48, 0, 215, 295, $black, $font_file, 'D');
imagefttext($back, 48, 0, 50, 160, $black, $font_file, 'A');
imagefttext($back, 48, 0, 215, 160, $black, $font_file, 'B');


$x_coords = [20,180,20,180];
$y_coords = [0,0,145,145];

for($i=0;$i<4;$i+=1){
    if ($t[$i] == "small"){
        imagecopyresampled($back,$small[0] ,  $x_coords[$i], $y_coords[$i], 0, 0, 110, 110, 128, 128);
    }
    if ($t[$i] == "big"){
        imagecopyresampled($back,$big[0] ,  $x_coords[$i], $y_coords[$i], 0, 0, 110, 110, 128, 128);
    }
    if ($t[$i] == "light"){
        imagecopyresampled($back,$light[0] ,  $x_coords[$i], $y_coords[$i], 0, 0, 110, 110, 128, 128);
    }
    if ($t[$i] == "heavy"){
        imagecopyresampled($back,$heavy[0] ,  $x_coords[$i], $y_coords[$i], 0, 0, 110, 110, 128, 128);
    }
}
// imagecopyresampled($back,$small[0] ,  20, 0, 0, 0, 110, 110, 128, 128);
// imagecopyresampled($back,$big[0]  ,  180, 0, 0, 0, 110, 110, 128, 128);

// imagecopyresampled($back,$light[0] ,  20, 145, 0, 0, 110, 110, 128, 128);
// imagecopyresampled($back,$heavy[0]  ,180, 145, 0, 0, 110, 110, 128, 128);


imagepng($back);
imagedestroy($back);
?>