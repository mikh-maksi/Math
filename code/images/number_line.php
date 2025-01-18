<?php
if (isset($_GET['n'])){$n = $_GET['n'];}else{$n='';}



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
$draw->line(50,300,550,300);

$draw->line(530,290,550,300);
$draw->line(530,310,550,300);

$draw->line(300,292,300,308);

$draw->line(315,295,315,305);
$draw->annotation(315,319,"1");

$draw->annotation(300,319,"0");

$step = 15;

for($i=1;$i<=15;$i+=1){
    $draw->line(300+$i*$step,295,300+$i*$step,305);
    $draw->line(300-$i*$step,295,300-$i*$step,305);
    $draw->annotation(300+$i*$step,319,"{$i}");
    $draw->annotation(300-$i*$step,319,"-{$i}");

}



$image->drawImage($draw);
header('Content-type: image/png');
echo $image;



?>