<?php
function deg_rad($deg){
    return $deg*pi()/180;
}
if (isset($_GET['h'])){$h = $_GET['h'];}else {$h = 2;}
if (isset($_GET['m'])){$m = $_GET['m'];}else {$m = 15;}



$image = new Imagick();
$image->newImage(640, 640, new ImagickPixel('white'));
$image->setImageFormat('png');

$draw = new ImagickDraw ();


$opacityColor = new \ImagickPixel("rgba(255, 255,255, 1)");

// $draw->setFillColor('#ffffff');
$draw->setFillColor($opacityColor);


$draw->setStrokeColor('#ff00ff');
$font = 'Inter.ttf';
$size = 12;
$draw->setFontSize($size);
$draw->setFont($font);
$draw->circle(320, 320, 320-100, 320);

$draw->setStrokeWidth(2);

$l = 100;
$angle = $m*6;

$dx = $l*sin(deg_rad($angle));
$dy = $l*cos(deg_rad($angle));

$draw->line(320,320,320+$dx,320-$dy);

$draw->setStrokeWidth(3);


$l = 50;
$angle = $h*30+$m*0.5;

$dx = $l*sin(deg_rad($angle));
$dy = $l*cos(deg_rad($angle));

$draw->line(320,320,320+$dx,320-$dy);




$image->drawImage($draw);
header('Content-type: image/png');
echo $image;


?>