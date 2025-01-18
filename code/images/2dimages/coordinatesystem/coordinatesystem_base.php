<?php
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);


$point_x = $t[0];
$point_y = $t[1];



$image = new Imagick();
$image->newImage(600, 600, new ImagickPixel('white'));
$image->setImageFormat('png');

$draw = new ImagickDraw ();
// $n = 10;


$font = '../../Inter.ttf';
$size = 20;

$draw->setFontSize($size);
$draw->setFont($font);


$draw->setTextAlignment(\Imagick::ALIGN_RIGHT);


$x_min = 0;
$x_max = 600;
$y_min = 0;
$y_max = 600;
$x_center = 300;
$y_center = 300;


$draw->line($x_min,$y_center ,$x_max,$y_center );
$draw->line($x_max-20,$y_center-10 ,$x_max,$y_center );
$draw->line($x_max-20,$y_center+10 ,$x_max,$y_center );


$draw->line($x_center,$y_min ,$x_center,$y_max );
$draw->line($x_center-10,$y_min+20 ,$x_center,$y_min);
$draw->line($x_center+10,$y_min+20 ,$x_center,$y_min );

$step = 50;
// x+
for ($x = 0;$x<=5;$x+=1){
    $draw->line($x_center+$x*$step,$y_center-5,$x_center+$x*$step,$y_center+5);
    $out = $x;
    $bbox_a = imagettfbbox($size, 0, $font, "{$out}");
    $text_x = abs($bbox_a[2]);
    if ($x!=0){$draw->annotation($x_center+$x*$step+$text_x/2-1,$y_center+25,"{$out}");}
}

// x-
for ($x = 0;$x>=-5;$x-=1){
    $draw->line($x_center+$x*$step,$y_center-5,$x_center+$x*$step,$y_center+5);
    $out = $x;
    $print_out = abs($out);
    $bbox_a = imagettfbbox($size, 0, $font, "{$print_out}");
    $text_x = abs($bbox_a[2]);
    if ($x!=0){$draw->annotation($x_center+$x*$step+$text_x/2,$y_center+25,"{$out}");}
}


// y+
for ($y = 0;$y<=5;$y+=1){
    $draw->line($x_center-5,$y_center-$y*$step,$x_center+5,$y_center-$y*$step);
    $out = $y;
    $bbox_a = imagettfbbox($size, 0, $font, "{$out}");
    $text_y = abs($bbox_a[5]);
    if ($y!=0){$draw->annotation($x_center-10,$y_center-$y*$step+$text_y/2-2,"{$out}");}
}

// y-
for ($y = 0;$y>=-5;$y-=1){
    $draw->line($x_center-5,$y_center-$y*$step,$x_center+5,$y_center-$y*$step);

    $out = $y;
    $bbox_a = imagettfbbox($size, 0, $font, "{$out}");
    $text_y = abs($bbox_a[5]);
    if ($y!=0){$draw->annotation($x_center-10,$y_center-$y*$step+$text_y/2-2,"{$out}");}
}

$draw->annotation($x_center-5,$y_center+20,"0");

$strokeColor = "#000000";
$fillColor = "#FFFFFF";
$draw->setStrokeColor($strokeColor);
$draw->setFillColor($fillColor);

$circle_x = $x_center+$point_x*$step;
$circle_y = $y_center-$point_y*$step;
$r = 3;


// $draw->annotation(100,100,"{$circle_x} {$circle_y}");
$draw->circle($circle_x ,$circle_y ,$circle_x+$r,$circle_y );




$image->drawImage($draw);
header('Content-type: image/png');
echo $image;



?>