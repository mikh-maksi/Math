<?php
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);


$k = $t[0];
$n_start = $t[1][0];
$n_finish = $t[1][1];

$arrow_start = $t[0][0];
$arrow_finish = $t[0][1];



$n = $n_finish-$n_start;

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



$step = 540/($n);
$start = 20;


$draw->line($start ,50,595,50);



$color = "rgb(0, 0, 0)";
// $draw->setStrokeColor($color);

for($i=0;$i<=$n;$i+=1){
    $m = $n_start+$i;
    $bbox_a = imagettfbbox($size, 0, $font, "{$m}");
    $text_x = abs($bbox_a[2]);
    $text_y = abs($bbox_a[5]);
    $draw->line($start+$i*$step,45,$start+$i*$step,55);
    if (!in_array($m,$k)){
        $draw->setStrokeWidth(0);
        $draw->setFontWeight(100);
        $draw->setFont($font);
        $draw->annotation($start+$i*$step,55+$text_y,"{$m}");
        $draw->setFontWeight(100);
    }else{
        $draw->setStrokeWidth(0);
        $draw->setFont($font_b);
        $draw->annotation($start+$i*$step,55+$text_y,"{$m}");
    }
}
$draw->setStrokeWidth(2);
// $color = "rgb(200, 200, 32)";
$draw->setStrokeColor($color);
$draw->line($start+$arrow_start*$step,30,$start+$arrow_finish*$step,30);

if ($arrow_start<$arrow_finish){
    $draw->line($start+$arrow_finish*$step,30,$start+$arrow_finish*$step-10,30-5);
    $draw->line($start+$arrow_finish*$step,30,$start+$arrow_finish*$step-10,30+5);
} else{
    $draw->line($start+$arrow_finish*$step,30,$start+$arrow_finish*$step+10,30-5);
    $draw->line($start+$arrow_finish*$step,30,$start+$arrow_finish*$step+10,30+5);
}

$image->drawImage($draw);
header('Content-type: image/png');
echo $image;



?>