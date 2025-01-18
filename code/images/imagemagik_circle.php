<?php
$draw = new ImagickDraw ();
//given that $x and $y are the coordinates of the centre, and $r the radius:
// $draw->setStrokeColor(new ImagickPixel(243, 247, 249));
$draw->setStrokeColor(new ImagickPixel('rgba(216, 227, 232, 1)'));

$draw->setFillColor(new ImagickPixel('white'));
$draw->setStrokeWidth(8);
$draw->circle (100, 100, 150, 120);
$draw->roundRectangle(10, 10, 660, 664, 15, 15);


$draw->setStrokeColor(new ImagickPixel('rgba(216, 227, 232, 1)'));
$draw->setStrokeWidth(1);
$draw->setFillColor(new ImagickPixel('rgba(243, 247, 249, 1)'));
$draw->circle(200,200,140,140);
$draw->line(125, 70, 100, 50);




$imagick = new Imagick(new ImagickPixel('rgba(243, 247, 249, 1)'));
$imagick->newImage(670, 674, new ImagickPixel('white'));


$imagick->setImageFormat("png");

$font = 'Inter-Bold.ttf';
$imagick->drawImage($draw);
$draw->setFont($font);
$draw->setStrokeColor(new ImagickPixel('transparent'));
$draw->setFillColor('black');
$draw->setFontSize(36);
$imagick->annotateImage($draw, 100, 45, 0, 'The quick brown fox jumps over the lazy dog');
header("Content-Type: image/png");
echo $imagick->getImageBlob();

?>