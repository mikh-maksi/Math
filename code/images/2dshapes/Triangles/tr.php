<?php
include("lib.php");

if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);


$draw = new ImagickDraw ();
$draw_mesh = new ImagickDraw ();
$x_milestones = [-10.0,-7.5,-5.0,-2.5,0.0,2.5,5.0,7.5,10.0];
$draw_mesh = coord($draw_mesh,$x_milestones);

$x0 = 320;
$y0 = 320;
$step = 30;


// print_r($t);
$x1 = $t[0][0];
$y1 = $t[0][1];


$x2 = $t[1][0];
$y2 = $t[1][1];

$x3 = $t[2][0];
$y3 = $t[2][1];

$draw->line($x0+$x1*$step, $y0 - $y1*$step, $x0+$x2*$step,$y0 -$y2*$step);
$draw->line($x0+$x2*$step, $y0 - $y2*$step, $x0+$x3*$step,$y0 -$y3*$step);
$draw->line($x0+$x3*$step, $y0 - $y3*$step, $x0+$x1*$step,$y0 -$y1*$step);


$image = new Imagick();
$image->newImage(640, 640, new ImagickPixel('white'));
$image->setImageFormat('png');


$image->drawImage($draw);
$image->drawImage($draw_mesh);

header('Content-type: image/png');
echo $image;

?>