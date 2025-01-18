<?php


// Эквивалентно запуску команды
// convert src1.png src2.png -compose mathematics -define compose:args="1,0,-0.5,0.5" -composite output.png

$src1 = new \Imagick("images/free-nature-images.jpg");
$src2 = new \Imagick("images/apple.png");

$src1->setImageVirtualPixelMethod(Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
$src1->setImageArtifact('compose:args', "1,0,-0.5,0.5");
// $src1->compositeImage($src2, Imagick::COMPOSITE_MATHEMATICS, 100, 100);
$src1->compositeImage($src2, Imagick::COMPOSITE_DEFAULT , 100, 100);
$src1->compositeImage($src2, Imagick::COMPOSITE_DEFAULT , 150, 100);
$src1->writeImage("./output.png");
header('Content-type: image/png');
echo ($src1);
?>