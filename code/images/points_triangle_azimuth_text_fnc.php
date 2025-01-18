<?php

require("lib_azimuth.php");

$alfa = rand(0, 360);
$beta = rand(0, 360);

$x1 = 300;
$y1 = 300;
$x2 = rand(10, 600);
$y2 = rand(10, 600);
$x3 = rand(10, 600);
$y3 = rand(10, 600);




$draw = angle_value($draw,$x1,$y1,$x2,$y2,$x3,$y3);
// $draw = angle_draw($draw,$x1,$y1,$x2,$y2,$x3,$y3);

$draw = angle_value($draw,$x2,$y2,$x1,$y1,$x3,$y3);
// $draw = angle_draw($draw,$x2,$y2,$x1,$y1,$x3,$y3);

$draw = angle_value($draw,$x3,$y3,$x2,$y2,$x1,$y1);
// $draw = angle_draw($draw,$x3,$y3,$x2,$y2,$x1,$y1);

$draw->line($x1,$y1,$x2,$y2);
// drawing of top line
$draw->line($x1,$y1,$x3,$y3);
$draw->line( $x3,$y3,$x2,$y2);

$image->drawImage($draw);
header('Content-type: image/png');
echo $image;




?>