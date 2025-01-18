<?php
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);

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


$quantity = count($t)+2;

$step = 27*(20/$quantity);
$start = 20;

$draw->line($start ,50,595,50);

$start_n = $t[0];
$finish_n = $t[0]+5;
$n = 1;

for($i=0 ;$i<=count($t);$i+=1){
    if ($i == count($t)){
        $out = '?';
    } else{
        $out = $t[$i];
    }
    $bbox_a = imagettfbbox($size, 0, $font, "{$out}");
    $text_x = abs($bbox_a[2]);
    $text_y = abs($bbox_a[5]);
    $draw->line($start+$n*$step,45,$start+$n *$step,55);

    $draw->setStrokeWidth(5);
    $draw->setFontWeight(100);
    $draw->setFont($font);
    $draw->annotation($start+$n*$step,55+$text_y,"{$out}");
    $draw->setFontWeight(100);

    $n+=1;
}



$image->drawImage($draw);
header('Content-type: image/png');
echo $image;



?>