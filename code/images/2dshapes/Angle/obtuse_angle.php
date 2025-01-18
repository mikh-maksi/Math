<?php
function deg_rad($deg){
    return $deg*pi()/180;
}

if (isset($_GET['t'])){$t = $_GET['t'];}else{$t=90;}



// $alfa = rand(90, 179);
// $beta = rand(0, 360);

$alfa = 180-$t;

$beta = 180;



$x1 = 300;
$x2 = 300;
$x2 = 400;
$y2 = 220;
$x3 = 430;
$y3 = 350;


function line_azimuth($alfa = 20, $l = 200,$x = 230, $y=250){
$dx = cos(deg_rad($alfa))*$l;
$dy = sin(deg_rad($alfa))*$l;

$dx_text = cos(deg_rad($alfa))*($l+100);
$dy_text = sin(deg_rad($alfa))*($l+100);


$dx_bisectrix = cos(deg_rad($alfa))*($l+10);
$dy_bisectrix = sin(deg_rad($alfa))*($l+10);

$x1 = $x - $dx;
$y1 = $y - $dy;




$coord_out = [$x,$y,$x1,$y1];
return $coord_out;
}

$c = line_azimuth($alfa);


$image = new Imagick();
$image->newImage(460, 300, new ImagickPixel('white'));
$image->setImageFormat('png');

$draw = new ImagickDraw ();

$font = '../../Inter.ttf';
$size = 12;

$draw->setFontSize($size);
$draw->setFont($font);
$draw->setStrokeColor('#000000');
$draw->setStrokeWidth(2);
$r_out = round($k,$r);


    $c = line_azimuth($alfa);

    $size = 24;
    $letter = 'A';
    $draw->setFontSize($size);
    $bbox_a = imagettfbbox($size, 0, $font, $letter);
    $text_x = abs($bbox_a[2])-10;    $text_y = abs($bbox_a[5])-10;

    if ($cos_alfa>0){    $dx = -$text_x*$cos_alfa;    $dx = 0;
    }else{        $dx = 0;    }
    $dy=0;    
    $dx_l = $dx_text+$text_x-3;    $dy_l = $dy_text-$text_y+3;
    // $draw->circle($c[2]+$dx_l,$c[3]+$dy_l ,$c[2]+$dx_l,$c[3]+$dy_l+1);
    $draw->setStrokeWidth(0);

    $c1 = line_azimuth($alfa,215);
    $draw->annotation($c1[2]-$dx_l,$c1[3]-$dy_l ,$letter);

    $draw->setStrokeWidth(2);
    $draw->line($c[0],$c[1],$c[2],$c[3]);

    $c = line_azimuth($beta);

    $size = 24;
    $draw->setFontSize($size);
    $bbox_a = imagettfbbox($size, 0, $font, $beta);
    $text_x = abs($bbox_a[2]);    $text_y = abs($bbox_a[5]);

    if ($cos_alfa>0){    $dx = -$text_x*$cos_alfa;    $dx = 0;
    }else{        $dx = 0;    }
    $dy=0;    $dx_l = $dx+$text_x/2-3;    $dy_l = $dy-$text_y/2+3;
    $dx_l = -5;   
    // $draw->circle($c[2]+$dx_l,$c[3]+$dy_l ,$c[2]+$dx_l,$c[3]+$dy_l+1);
    $draw->setStrokeWidth(0);
    $draw->setFont($font);
    $draw->annotation($c[2]-$dx_l,$c[3]-$dy_l ,'B');
    
    
    $draw->setStrokeWidth(2);
    $draw->line($c[0],$c[1],$c[2],$c[3]);

    $d = max($alfa,$beta) - min($alfa,$beta);

    // $draw->annotation(100,100 ,$d);

    if ($d<180){$bisectrix = ($alfa + $beta)/2;}
    else{$bisectrix = ($alfa + $beta)/2-180; }

    // $draw->annotation(100,120 ,$bisectrix);
    $c = line_azimuth($bisectrix,170);
    $draw->setStrokeColor('#333333');
    $draw->setStrokeWidth(1);
    // $draw->line($c[0],$c[1],$c[2],$c[3]);

    $letter = 'C';
    $c = line_azimuth($bisectrix,200);
    $bbox_a = imagettfbbox($size, 0, $font, $letter);
    $text_x = abs($bbox_a[2]);    $text_y = abs($bbox_a[5]);
    $dx_bisectrix = cos(deg_rad($alfa/2))*($l+10);
    $dy_bisectrix = sin(deg_rad($alfa/2))*($l+10);

    $dx_l = $dx_bisectrix+$text_x;    $dy_l = $dy_bisectrix-$text_y;
    // $draw->annotation($c[2]-$dx_l,$c[3]-$dy_l ,$letter);

    $letter = 'O';
    $bbox_a = imagettfbbox($size, 0, $font, $letter);
    $text_x = abs($bbox_a[2]);    $text_y = abs($bbox_a[5]);
    $draw->annotation($c[0]-$text_x/2,$c[1]+$text_y,$letter);

$image->drawImage($draw);
header('Content-type: image/png');
echo $image;




?>