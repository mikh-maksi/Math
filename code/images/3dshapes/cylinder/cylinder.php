<?php

header("Content-Type: image/png");
$draw = new ImagickDraw ();
$imagick = new Imagick(new ImagickPixel('rgba(0, 0, 0, 1)'));
$imagick->newImage(300,350, new ImagickPixel('white')); //max (x)+10, max(y)+10
$imagick->setImageFormat("png");

if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($t);

$d = $t[0];
$h = $t[1];

$x_start = 120;
$y_start = 250;

$scale = 10;
$angle = 0;

$draw->setStrokeColor('rgb(0, 0, 0)');

$draw->setFillColor('rgb(255, 255, 255)');
$font = '../../Inter.ttf';


$size = 16;
$draw->setFontSize($size);
$draw->setFont($font);



$draw->ellipse($x_start, $y_start-$h*$scale,  $d*$scale/2,  $d*$scale/8, 0, 360);
$draw->line($x_start-$d*$scale/2,$y_start,$x_start-$d*$scale/2,$y_start-$h*$scale);
$draw->line($x_start+$d*$scale/2,$y_start,$x_start+$d*$scale/2,$y_start-$h*$scale);
$draw->ellipse($x_start, $y_start, $d*$scale/2,  $d*$scale/8, 0, 180);


$draw->line($x_start-$d*$scale/2,300,$x_start-20,300);


$draw->line($x_start-$d*$scale/2,300,$x_start-$d*$scale/2+10,300+5);
$draw->line($x_start-$d*$scale/2,300,$x_start-$d*$scale/2+10,300-5);

$draw->line($x_start+20,300,$x_start+$d*$scale/2,300);
$draw->line($x_start+$d*$scale/2,300,$x_start+$d*$scale/2-10,300+5);
$draw->line($x_start+$d*$scale/2,300,$x_start+$d*$scale/2-10,300-5);


$draw->line($x_start+$d*$scale/2+30,$y_start,$x_start+$d*$scale/2+30,$y_start-$h*$scale/2+10);

$draw->line($x_start+$d*$scale/2+30,$y_start,$x_start+$d*$scale/2+30+5,$y_start-10);
$draw->line($x_start+$d*$scale/2+30,$y_start,$x_start+$d*$scale/2+30-5,$y_start-10);


$draw->line($x_start+$d*$scale/2+30,$y_start-$h*$scale/2-10,$x_start+$d*$scale/2+30,$y_start-$h*$scale);

$draw->line($x_start+$d*$scale/2+30,$y_start-$h*$scale,$x_start+$d*$scale/2+30+5,$y_start-$h*$scale+10);
$draw->line($x_start+$d*$scale/2+30,$y_start-$h*$scale,$x_start+$d*$scale/2+30-5,$y_start-$h*$scale+10);








$draw->setStrokeDashArray([10, 10]);
$draw->ellipse($x_start, $y_start, $d*$scale/2,  $d*$scale/8, 180, 360);

$text = $d;

$bbox = imageftbbox($size, $angle, $font , $text);
$width = $bbox[2] - $bbox[0];
$height = $bbox[1] - $bbox[5];

// $draw->setStrokeWidth(1);   
$draw->setFillColor('rgb(0, 0, 0)');
$draw->annotation($x_start-$width/2,300+$height/2-2,$d);


$text = $h;

$bbox = imageftbbox($size, $angle, $font , $text);
$width = $bbox[2] - $bbox[0];
$height = $bbox[1] - $bbox[5];
$draw->annotation($x_start+$d*$scale/2+30-$width/2+2,$y_start-$h*$scale/2+$height/2-2,$h);

$imagick->drawImage($draw);
echo $imagick->getImageBlob();