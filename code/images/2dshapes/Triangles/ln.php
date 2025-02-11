<?php
include("lib.php");

if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);


$draw1 = new ImagickDraw ();
$draw = new ImagickDraw ();
$draw_mesh = new ImagickDraw ();

$x_milestones = [-10.0,-7.5,-5.0,-2.5,0.0,2.5,5.0,7.5,10.0];
$draw_mesh = coord($draw_mesh,$x_milestones);

$draw->setStrokeColor('rgb(0, 0, 0)');
$draw->setFillColor('rgba(255, 255, 255, 0)');
$draw->setStrokeWidth(1);
$draw->setStrokeDashArray([4, 2]);

// print_r($t);
$x1 = $t[0][0];
$y1 = $t[0][1];


$x2 = $t[1][0];
$y2 = $t[1][1];

$x3 = max($x1,$x2);
$y3 = min($y1,$y2);



function  ln($draw,$x1,$y1,$x2,$y2){
    $x0 = 320;
    $y0 = 320;
    $step = 30;
    $draw->line($x0+$x1*$step, $y0 - $y1*$step, $x0+$x2*$step,$y0 -$y2*$step);
    return $draw;
}

//$draw->setStrokeDashArray([4, 0]);
$draw1 = ln($draw1,$x1,$y1,$x2,$y2);
$draw->setStrokeDashArray([4, 2]);
$draw = ln($draw,$x2,$y2,$x3,$y3);
$draw = ln($draw,$x1,$y1,$x3,$y3);

// $draw->line($x0+$x2*$step, $y0 - $y2*$step, $x0+$x3*$step,$y0 -$y3*$step);
// $draw->line($x0+$x3*$step, $y0 - $y3*$step, $x0+$x1*$step,$y0 -$y1*$step);


$image = new Imagick();
$image->newImage(640, 640, new ImagickPixel('white'));
$image->setImageFormat('png');


$image->drawImage($draw);
$image->drawImage($draw1);
$image->drawImage($draw_mesh);


header('Content-type: image/png');
echo $image;

?>