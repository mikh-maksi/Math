<?php
include("lib.php");
include("rotate_lib.php");

if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);

$triangle = $t[0];
$center = $t[1];
$angle = $t[2];

$t_rotate = rotateTriangle($triangle, $center, $angle);

// print_r($t_rotate);

$draw = new ImagickDraw ();
$draw_rotate = new ImagickDraw ();
$draw_mesh = new ImagickDraw ();
$x_milestones = [-5,-4,-3,-2,-1,0,1,2,3,4,5];
$draw_mesh = coord1($draw_mesh,$x_milestones);

function triangle($draw,$t,$n){
    $x0 = 320;
    $y0 = 320;
    $step =56;
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

    $draw->circle($x0+$x2*$step,$y0-$y2*$step,$x0+$x2*$step,$y0-$y2*$step+4);
    $points_center = getTriangleCentroid($t);
    $x_center = $points_center[0];
    $y_center = $points_center[1];
    // echo "{ $x_center}; {$y_center}";
    $font = 'Inter.ttf';
    $size = 20;
    $draw->setFontSize($size);
    $draw->setFont($font);
    $draw->annotation($x0+$x_center*$step,$y0-$y_center*$step,$n);
    $draw->annotation($x0+$x1*$step,$y0-$y1*$step,"A");
    $draw->annotation($x0+$x2*$step,$y0-$y2*$step,"B");
    $draw->annotation($x0+$x3*$step,$y0-$y3*$step,"C");
    // $draw->circle($x0+$x_center*$step,$y0-$y_center*$step,$x0+$x_center*$step,$y0-$y_center*$step+4);

    return $draw;
    } 


$strokeColor = "rgb(200, 32, 32)";
$strokeColor1 = "rgb(0, 0, 0)";
$fillColor= "rgb(200, 32, 32)";
$draw_rotate->setStrokeDashArray([4, 2]);
$draw_rotate->setStrokeColor($strokeColor);
$draw_rotate->setFillColor($fillColor);

$draw_rotate->setStrokeWidth(2);
$draw->setStrokeColor($strokeColor1);
$draw->setStrokeWidth(2);
$draw = triangle($draw,$triangle,1);

$draw_rotate = triangle($draw_rotate,$t_rotate,2);

$image = new Imagick();
$image->newImage(640, 640, new ImagickPixel('white'));
$image->setImageFormat('png');


$image->drawImage($draw);
$image->drawImage($draw_mesh);
$image->drawImage($draw_rotate);

header('Content-type: image/png');
echo $image;

?>