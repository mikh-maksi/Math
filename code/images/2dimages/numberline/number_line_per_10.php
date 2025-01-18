<?php
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[-1]';}
$t = json_decode($t);

$image = new Imagick();
$image->newImage(600, 100, new ImagickPixel('white'));
$image->setImageFormat('png');

$draw = new ImagickDraw ();
// $n = 10;


$font = '../../Inter.ttf';
$size = 20;

$draw->setFontSize($size);
$draw->setFont($font);


$draw->setTextAlignment(\Imagick::ALIGN_CENTER);

// $draw->annotation(300,$text_y ,"{$n}");


$draw->line(575,40,595,50);
$draw->line(575,60,595,50);


// $draw->annotation(315,319,"1");



$step = 27*2;
$start = 20;
$interval = 10;
$last_n = 100;
$first_n = 0;

$draw->line($start ,50,595,50);


$n = 0;
for($i=$first_n;$i<=$last_n;$i+=$interval ){
    $bbox_a = imagettfbbox($size, 0, $font, "{$i}");
    $text_x = abs($bbox_a[2]);
    $text_y = abs($bbox_a[5]);
    $draw->line($start+$n*$step,45,$start+$n*$step,55);
    if (!in_array((string)$i,$t))
        $draw->annotation($start+$n*$step,55+$text_y,"{$i}");
    $n+=1;
}



$image->drawImage($draw);
header('Content-type: image/png');
echo $image;



?>