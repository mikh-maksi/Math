<?php
header("Content-Type: image/png");
$draw = new ImagickDraw ();
$imagick = new Imagick(new ImagickPixel('rgba(0, 0, 0, 1)'));

if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($t);
$x = $t[0][0];
$y = $t[0][1];
$z = $t[0][2];

if ($x>3){$width_x = 150+$x*40;
}else{$width_x = 300;}

$imagick->newImage($width_x,300, new ImagickPixel('white')); //max (x)+10, max(y)+10
$imagick->setImageFormat("png");



$x_x = $t[1][0];
$x_y = $t[1][1];
$x_z = $t[1][2];
$x_v = $t[1][3];

// $draw->rectangle(100, 50, 225, 175);

// $draw->setStrokeDashArray([20, 5, 20, 5, 5, 5,]);
// $draw->rectangle(275, 50, 400, 175);

// $draw->setFillRule(\Imagick::FILLRULE_EVENODD);



$strokeColor = 'rgba(0, 0, 0, 1)';
$fillColor = 'rgba(255, 255, 255, 1)';

$font = '../../Inter.ttf';
$font_bold = '../../Inter-Bold.ttf';
$size = 16;

$draw->setStrokeColor($strokeColor);
$draw->setFillColor($fillColor);
$draw->setStrokeWidth(1);

$x_start = 50;
$y_start = 120;

// $x = 10;
// $y = 10;
// $x = 10;

$scale = 40;


for($i=1;$i<=$x;$i+=1){
    for($j=1;$j<=$y;$j+=1){
        $draw->line($x_start,$y_start,$x_start+$i*$scale,$y_start);
        $draw->line($x_start+$i*$scale,$y_start,$x_start+$i*$scale,$y_start+$j*$scale);
        $draw->line($x_start+$i*$scale,$y_start+$j*$scale,$x_start,$y_start+$j*$scale);
        $draw->line($x_start,$y_start,$x_start,$y_start+$j*$scale);
    }
}

// $x_start

for($i=1;$i<=$x;$i+=1){
for($j=1;$j<=$y;$j+=1){
for($k=1;$k<=$z;$k+=1){


    $draw->line($x_start,$y_start,$x_start+$k*$scale/2,$y_start-$k*$scale/2);
    $draw->line($x_start+$i*$scale,$y_start,$x_start+$i*$scale+$k*$scale/2,$y_start-$k*$scale/2);
    $draw->line($x_start+$k*$scale/2,$y_start-$k*$scale/2,$x_start+$i*$scale+$k*$scale/2,$y_start-$k*$scale/2);

    $draw->line($x_start+$i*$scale,$y_start+$j*$scale,$x_start+$i*$scale+$k*$scale/2,$y_start+$j*$scale-$k*$scale/2);
    $draw->line($x_start+$i*$scale+$k*$scale/2,$y_start+$j*$scale-$k*$scale/2,$x_start+$i*$scale+$k*$scale/2,$y_start-$k*$scale/2);

}}}


$draw->setStrokeDashArray([10, 10]);

for($i=1;$i<=$x;$i+=1){
for($j=1;$j<=$y;$j+=1){
for($k=1;$k<=$z;$k+=1){
    $draw->line($x_start,$y_start+$j*$scale,$x_start+$k*$scale/2,$y_start+$j*$scale-$k*$scale/2);
    $draw->line($x_start+$k*$scale/2,$y_start+$j*$scale-$k*$scale/2,$x_start+$k*$scale/2,$y_start-$k*$scale/2);
    $draw->line($x_start+$k*$scale/2,$y_start+$j*$scale-$k*$scale/2,$x_start+$i*$scale+$z*$scale/2,$y_start+$j*$scale-$k*$scale/2);
}}}

$draw1 = new ImagickDraw ();
$lx = 30;
$ly = 30;
$draw1->line($x_start,$y_start+$y*$scale+$ly,$x_start+$x*$scale/2-10,$y_start+$y*$scale+$ly);
$draw1->line($x_start+$x*$scale/2+10,$y_start+$y*$scale+$ly,$x_start+$x*$scale,$y_start+$y*$scale+$ly);

$draw1->line($x_start,$y_start+$y*$scale+$ly,$x_start+10,$y_start+$y*$scale+$ly+5);
$draw1->line($x_start,$y_start+$y*$scale+$ly,$x_start+10,$y_start+$y*$scale+$ly-5);

$draw1->line($x_start+$x*$scale,$y_start+$y*$scale+$ly,$x_start+$x*$scale-10,$y_start+$y*$scale+$ly+5);
$draw1->line($x_start+$x*$scale,$y_start+$y*$scale+$ly,$x_start+$x*$scale-10,$y_start+$y*$scale+$ly-5);


$draw1->setTextAlignment(\Imagick::ALIGN_CENTER);


$draw1->setFontSize($size);
$draw1->setFont($font);

if($x_x){$x_out = $x;}
else {$x_out = '?';}
$draw1->annotation($x_start+$x*$scale/2,$y_start+$y*$scale+$ly+5,$x_out);

// y-line
$draw2 = new ImagickDraw ();

$draw2->line($x_start-$lx,$y_start,$x_start-$lx,$y_start+$y*$scale/2-10);
$draw2->line($x_start-$lx,$y_start+$y*$scale/2+10,$x_start-30,$y_start+$y*$scale);
// $draw2->line(160,230,200,230);

$draw2->line($x_start-$lx,$y_start,$x_start-$lx+5,$y_start+10);
$draw2->line($x_start-$lx,$y_start,$x_start-$lx-5,$y_start+10);

$draw2->line($x_start-$lx,$y_start+$y*$scale,$x_start-$lx+5,$y_start+$y*$scale-10);
$draw2->line($x_start-$lx,$y_start+$y*$scale,$x_start-$lx-5,$y_start+$y*$scale-10);

$draw2->setFontSize($size);
$draw2->setFont($font);
$draw2->setTextAlignment(\Imagick::ALIGN_CENTER);

if($x_y){$y_out = $y;}
else {$y_out = '?';}

$draw2->annotation($x_start-30,$y_start+$y*$scale/2+10-4,$y_out);



$draw3 = new ImagickDraw ();
// x = dx(0.5)*l;
// y = dy(0.5)*l;
$dx = 0.5;
$dy = -0.5;


$l1 = $z*$scale/2-15;
$l2 = $z*$scale/2+15;

$l = $z*$scale;

$x_l1_start = $x_start+$x*$scale+$lx;
$y_l1_start = $y_start+$y*$scale;

$draw3->line($x_l1_start,$y_l1_start , $x_l1_start+$dx*$l1 ,$y_l1_start  + $dy*$l1);
$draw3->line($x_l1_start+$dx*$l2 ,$y_l1_start+ $dy*$l2,$x_l1_start+$dx*$l ,$y_l1_start  + $dy*$l);

$draw3->line($x_l1_start,$y_l1_start ,$x_l1_start,$y_l1_start-10);
$draw3->line($x_l1_start,$y_l1_start,$x_l1_start+20,$y_l1_start-10);

$draw3->line($x_l1_start+$dx*$l ,$y_l1_start  + $dy*$l,$x_l1_start+$dx*$l-20 ,$y_l1_start  + $dy*$l+10);
$draw3->line($x_l1_start+$dx*$l ,$y_l1_start  + $dy*$l,$x_l1_start+$dx*$l ,$y_l1_start  + $dy*$l+10);

$size = 16;
$draw3->setFontSize($size);
$draw3->setFont($font);

if($x_z){$z_out = $z;}
else {$z_out = '?';}

$draw3->annotation($x_l1_start+$dx*$l1+5 ,$y_l1_start+0  + $dy*$l1,$z_out );
// $draw3->annotation(248,183,$z);
// $draw1->setTextAlignment(\Imagick::ALIGN_LEFT);


$volume = $x * $y * $z;

$draw4 = new ImagickDraw ();
$size = 35;
$draw4->setTextAlignment(\Imagick::ALIGN_CENTER);
$draw4->setFontSize($size);
$draw4->setFont($font_bold);


if($x_v){$v_out = $volume;}
else {$v_out = '?';}

$draw4->annotation($x_start+$x*$scale/2 ,$y_start+$y*$scale/2+12,$v_out);

$arr = [null];
// $draw->setStrokeDashArray( [null] );


$draw->setFillRule(\Imagick::FILLRULE_EVENODD);
// $draw->line(100,230,200,230)->setStrokeDashArray( [null] );

// $car = new Imagick("../../images/img256/car.png");
// $imagick->addImage($car);
$imagick->drawImage($draw);
$imagick->drawImage($draw1);
$imagick->drawImage($draw2);
$imagick->drawImage($draw3);
$imagick->drawImage($draw4);
// $imagick->addImage($car);
echo $imagick->getImageBlob();
?>