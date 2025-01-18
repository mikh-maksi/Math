<?php
$image = new Imagick();
$image->newImage(600, 600, new ImagickPixel('white'));
$image->setImageFormat('png');

$draw = new ImagickDraw ();
// $n = 10;


$font = 'Inter.ttf';
$size = 12;

$draw->setFontSize($size);
$draw->setFont($font);
$bbox_a = imagettfbbox($size, 0, $font, "{$n}");
$text_x = abs($bbox_a[2]);
$text_y = abs($bbox_a[5]);

$draw->setTextAlignment(\Imagick::ALIGN_CENTER);

// $draw->annotation(300,$text_y ,"{$n}");
$draw->line(300,50,300,350);

$draw->annotation(250,50,"Key");

$draw->annotation(310,50,"Value");



$image->drawImage($draw);
header('Content-type: image/png');
echo $image;


?>