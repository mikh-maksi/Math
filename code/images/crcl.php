<?php
function deg_rad($deg){
    return $deg*pi()/180;
}


if (isset($_GET['r'])){$r = $_GET['r'];}else {$r = -1;}
if (isset($_GET['d'])){$d = $_GET['d'];}else {$d = -1;}

if (isset($_GET['r2'])){$r2 = $_GET['r2'];}else {$r2 = -1;}

if (isset($_GET['arc'])){$arc = $_GET['arc'];}else {$arc = -1;}
if (isset($_GET['len'])){$len = $_GET['len'];}else {$len = -1;}


$image = new Imagick();
$image->newImage(640, 640, new ImagickPixel('white'));
$image->setImageFormat('png');

$draw = new ImagickDraw ();

$draw->setStrokeColor('#aaaaaa');
for ($i=0;$i<=64;$i+=1){
    $draw->line($i*10, 0, $i*10,640);
    $draw->line(0, $i*10, 640, $i*10);
}
$draw->setFillColor('#FFFFFF');
$draw->setStrokeColor('#000000');

$opacity = 0.05;
$draw->setStrokeWidth(2);

$opacityColor = new \ImagickPixel("rgba(0, 0,0, $opacity)");

// $draw->setFillColor('#ffffff');
$draw->setFillColor($opacityColor);
$draw->setStrokeColor('#000000');

$draw->circle(320, 320, 320-200, 320);
$draw->circle(320, 320, 320-1, 320);


if ($arc != -1){
    $dx = sin(deg_rad($arc))*200;
    $dy = cos(deg_rad($arc))*200;
    $dx2 = sin(deg_rad($arc/2))*180;
    $dy2 = cos(deg_rad($arc/2))*180;


    $font = 'Inter.ttf';
    $size = 12;
    $draw->setFontSize($size);
    $draw->setFont($font);

    $draw->setStrokeWidth(3);
    $draw->setStrokeColor('#0000ff');
    $draw->arc(320+200,320+200,320-200, 320-200,-90,-90+$arc);
    $draw->line(320,320,320,320-200);
    $draw->line(320,320,320+$dx,320-$dy);
    $draw->setStrokeWidth(1);
    $draw->annotation(320+$dx2,320-$dy2,"{$arc}°");

    $draw->setStrokeColor('#000000');
    $draw->setStrokeWidth(1);
}


if ($r2!=-1){
    $draw->setStrokeColor('#ff00ff');
    $font = 'Inter.ttf';
    $size = 12;
    $draw->setFontSize($size);
    $draw->setFont($font);
    $draw->circle(320, 320, 320-100, 320);
    $draw->line(320,320,320,320-100);
    $draw->setStrokeWidth(1);
    $draw->annotation(320+2,320-50,"r={$r2}");
    $draw->setStrokeColor('#000000');
    $draw->setStrokeWidth(2);
}

if ($r!=-1){
    $font = 'Inter.ttf';
    $size = 12;
    $draw->setFontSize($size);
    $draw->setFont($font);
    $draw->line(320,320,320+200,320);
    $draw->setStrokeWidth(1);
    $draw->annotation(320+100,320-2,"r={$r}");
    $draw->setStrokeWidth(2);
}




if ($d!=-1){
    $font = 'Inter.ttf';
    $size = 12;
    $draw->setFontSize($size);
    $draw->setFont($font);
    $bbox_a = imagettfbbox($size, 0, $font, "d={$d}");
    $text_x = abs($bbox_a[2]);
    $text_y = abs($bbox_a[5]);


    $draw->line(320-200,320,320+200,320);
    $draw->setStrokeWidth(1);
    $draw->annotation(320-$text_x,320+$text_y,"d={$d}");
}

if ($len!=-1){
    $font = 'Inter.ttf';
    $size = 12;
    $draw->setFontSize($size);
    $draw->setFont($font);
    $draw->setTextAlignment(2);
    $bbox_a = imagettfbbox($size, 0, $font, "length={$len}");
    $text_x = abs($bbox_a[2]);
    $text_y = abs($bbox_a[5]);


    $draw->setStrokeWidth(1);
    $draw->annotation(320,320-200-$text_y,"length={$len}");
}



$image->drawImage($draw);
header('Content-type: image/png');
echo $image;


?>