<?php
        header("Content-Type: image/png");
$draw = new ImagickDraw ();
$imagick = new Imagick(new ImagickPixel('rgba(0, 0, 0, 1)'));
$imagick->newImage(600,600, new ImagickPixel('white')); //max (x)+10, max(y)+10
$imagick->setImageFormat("png");


$draw->line(100,100,200,100);
$draw->line(200,100,200,200);
$draw->line(200,200,100,200);
$draw->line(100,100,100,200);

$draw->line(100,100,150,50);
$draw->line(200,100,250,50);
$draw->line(150,50,250,50);


// $draw->rectangle(100, 50, 225, 175);

// $draw->setStrokeDashArray([20, 5, 20, 5, 5, 5,]);
// $draw->rectangle(275, 50, 400, 175);

// $draw->setFillRule(\Imagick::FILLRULE_EVENODD);
$draw->line(200,200,250,150);
$draw->line(250,150,250,50);


$strokeColor = 'rgba(0, 0, 0, 1)';
$fillColor = 'rgba(255, 255, 255, 1)';

$draw->setStrokeColor($strokeColor);
$draw->setFillColor($fillColor);
$draw->setStrokeWidth(1);

$draw->setStrokeDashArray([10, 10]);

$draw->line(100,200,150,150);
$draw->line(150,150,150,150);
$draw->line(150,150,150,50);
$draw->line(150,150,250,150);


$draw1 = new ImagickDraw ();
// $draw1->line(100,230,200,230);
$draw1->line(100,230,140,230);
$draw1->line(160,230,200,230);

$font = '../../Inter.ttf';
$size = 32;

$draw1->setFontSize($size);
$draw1->setFont($font);
$draw1->annotation(150,230,'x');


$arr = [null];
// $draw->setStrokeDashArray( [null] );


$draw->setFillRule(\Imagick::FILLRULE_EVENODD);
// $draw->line(100,230,200,230)->setStrokeDashArray( [null] );

$imagick->drawImage($draw);
$imagick->drawImage($draw1);
echo $imagick->getImageBlob();
?>