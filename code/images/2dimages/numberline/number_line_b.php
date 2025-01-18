<?php
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);

$image = new Imagick();
$image->newImage(600, 100, new ImagickPixel('white'));
$image->setImageFormat('png');

$draw = new ImagickDraw ();
// $n = 10;


$font = '../../Inter.ttf';
$font_b = '../../Inter-Bold.ttf';
$size = 20;

$draw->setFontSize($size);
$draw->setFont($font);


$draw->setTextAlignment(\Imagick::ALIGN_CENTER);

// $draw->annotation(300,$text_y ,"{$n}");


$draw->line(575,40,595,50);
$draw->line(575,60,595,50);


// $draw->annotation(315,319,"1");



$step = 27;
$start = 20;

$draw->line($start ,50,595,50);

for($i=0;$i<=20;$i+=1){
    $bbox_a = imagettfbbox($size, 0, $font, "{$i}");
    $text_x = abs($bbox_a[2]);
    $text_y = abs($bbox_a[5]);
    $draw->line($start+$i*$step,45,$start+$i*$step,55);
    if (!in_array((string)$i,$t)){
        $draw->setStrokeWidth(5);
        $draw->setFontWeight(100);
        $draw->setFont($font);
        $draw->annotation($start+$i*$step,55+$text_y,"{$i}");
        $draw->setFontWeight(100);
    }else{
        $draw->setFont($font_b);
        $draw->annotation($start+$i*$step,55+$text_y,"{$i}");
    }
}



$image->drawImage($draw);
header('Content-type: image/png');
echo $image;



?>