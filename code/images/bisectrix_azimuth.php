<?php
function deg_rad($deg){
    return $deg*pi()/180;
}

$alfa = rand(0, 360);
$beta = rand(0, 360);


function line_azimuth($alfa = 20, $l = 200,$x = 300, $y=300){
$dx = cos(deg_rad($alfa))*$l;
$dy = sin(deg_rad($alfa))*$l;

$x1 = $x - $dx;
$y1 = $y - $dy;

$coord_out = [$x,$y,$x1,$y1];
return $coord_out;
}
$alfa =rand(0, 360);
$c = line_azimuth($alfa);


$image = new Imagick();
$image->newImage(800, 600, new ImagickPixel('white'));
$image->setImageFormat('png');

$draw = new ImagickDraw ();

$font = 'Inter.ttf';
$size = 12;

$draw->setFontSize($size);
$draw->setFont($font);
$r_out = round($k,$r);


    $c = line_azimuth($alfa);

    $bbox_a = imagettfbbox($size, 0, $font, $alfa);
    $text_x = abs($bbox_a[2]);    $text_y = abs($bbox_a[5]);

    if ($cos_alfa>0){    $dx = -$text_x*$cos_alfa;    $dx = 0;
    }else{        $dx = 0;    }
    $dy=0;    $dx_l = $dx+$text_x/2-3;    $dy_l = $dy-$text_y/2+1;
    $draw->circle($c[2]+$dx_l,$c[3]+$dy_l ,$c[2]+$dx_l,$c[3]+$dy_l+1);
    $draw->annotation($c[2]-$dx_l,$c[3]-$dy_l ,$alfa);

    $draw->line($c[0],$c[1],$c[2],$c[3]);

    $c = line_azimuth($beta);

    $bbox_a = imagettfbbox($size, 0, $font, $beta);
    $text_x = abs($bbox_a[2]);    $text_y = abs($bbox_a[5]);

    if ($cos_alfa>0){    $dx = -$text_x*$cos_alfa;    $dx = 0;
    }else{        $dx = 0;    }
    $dy=0;    $dx_l = $dx+$text_x/2-3;    $dy_l = $dy-$text_y/2+1;
    $draw->circle($c[2]+$dx_l,$c[3]+$dy_l ,$c[2]+$dx_l,$c[3]+$dy_l+1);
    $draw->annotation($c[2]-$dx_l,$c[3]-$dy_l ,$beta);

    $draw->line($c[0],$c[1],$c[2],$c[3]);

    $d = max($alfa,$beta) - min($alfa,$beta);

    $draw->annotation(100,100 ,$d);

    if ($d<180){$bisectrix = ($alfa + $beta)/2;}
    else{$bisectrix = ($alfa + $beta)/2-180; }

    $draw->annotation(100,120 ,$bisectrix);
    $c = line_azimuth($bisectrix);
    $draw->setStrokeColor('#00ff00');

    $draw->line($c[0],$c[1],$c[2],$c[3]);


$image->drawImage($draw);
header('Content-type: image/png');
echo $image;




?>