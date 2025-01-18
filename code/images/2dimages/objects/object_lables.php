<?php
header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);

$lables = $t[1];

$back = imagecreatefromjpeg ("../../images/canvas300.jpg");
$black = imagecolorallocate($back, 0, 0, 0);

$apple     = imagecreatefrompng("../../images/apple_middle.png");
$label_right     = imagecreatefrompng("../../images/label_right.png");
$label_left     = imagecreatefrompng("../../images/label_left.png");
$box     = imagecreatefrompng("../../images/box.png");
$book     = imagecreatefrompng("../../images/book.png");



$font_file = '../../Inter.ttf';

if ($t[0] =="apple") {imagecopyresampled($back,$apple   ,  50, 100 , 0, 0, 200, 200, 200, 200);}
if ($t[0] =="box") {imagecopyresampled($back,$box   ,  50, 100 , 0, 0, 200, 200, 256, 256);}
if ($t[0] =="book") {imagecopyresampled($back,$book   ,  50, 100 , 0, 0, 200, 200, 256, 256);}

if (isset($t[1])){ $labels = $t[1];} else {$labels = [];}

$labels_img = [$label_left,$label_left,$label_right,$label_right];
$start_x = [220,220,10,10];
$start_y = [0,50,0,50];
$font_size = [12,8,10,10];
$text_x = [235,235,35,35];
$text_y = [95,45,44,94];

$lines_coords = [[90, 90, 100, 140],[90, 40, 120, 132],[220, 40, 210, 145],[220, 90, 220, 160]];
for ($i = 0;$i<count($labels);$i+=1){
    imagecopyresampled($back,$labels_img[$i] ,     $start_x[$i], $start_y[$i] , 0, 0, 80, 80, 128, 128);
    imagefttext($back, 8, 0, $text_x[$i], $text_y[$i],  $black, $font_file, $lables[$i]);
    imageline($back, $lines_coords[$i][0], $lines_coords[$i][1], $lines_coords[$i][2], $lines_coords[$i][3], $color);
}


imagepng($back);
imagedestroy($back);

?>