<?php
function deg_rad($deg){
    return $deg*pi()/180;
}

$alfa = rand(0, 360);
$beta = rand(0, 360);

$x1 = 300;
$y1 = 300;
$x2 = rand(10, 600);
$y2 = rand(10, 600);
$x3 = rand(10, 600);
$y3 = rand(10, 600);


function bisectrix($a1,$a2){
    $d = max($a1,$a2) - min($a1,$a2);
    if ($d<180){$bisectrix = ($a1 + $a2)/2;}
    else{$bisectrix = ($a1 + $a2)/2-180; }
    return $bisectrix;
}

function azimuth($x1,$y1,$x2,$y2){
    $ab_x = $x2-$x1;
    $ab_y = $y2-$y1;

    // $cd_x = $x2-$x1;
    $cd_x = -1;
    $cd_y = 0;

    $numerator = (($ab_x*$cd_x)+($ab_y*$cd_y));
    $denominator = ((sqrt($ab_x**2+$ab_y**2)*sqrt($cd_x**2+$cd_y**2)));
    $cos_a = $numerator / $denominator;
    $ox = (acos($cos_a)/pi()*180);

    $ab_x = $x2-$x1;
    $ab_y = $y2-$y1;

    if ($y2>$y1){$ox=360-$ox;}
    
    return $ox;
}



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

function angle_azimuth($draw,$x1,$y1,$x2,$y2,$x3,$y3){
    $v1 = azimuth($x1,$y1,$x2,$y2);
    $v2 = azimuth($x1,$y1,$x3,$y3);
    $c = line_azimuth($v1,150,$x1,$y1);
    $draw->line($c[0],$c[1],$c[2],$c[3]);
    $c = line_azimuth($v2,150,$x1,$y1);
    $draw->line($c[0],$c[1],$c[2],$c[3]);
    $bisectrix = bisectrix($v1,$v2);
    $c = line_azimuth($bisectrix,200,$x1,$y1);
    $draw->setStrokeColor('#00ff00');
    $draw->line($c[0],$c[1],$c[2],$c[3]);
    $draw->setStrokeColor('#000000');
    return $draw;
}
$draw = angle_azimuth($draw,$x1,$y1,$x2,$y2,$x3,$y3);
$draw = angle_azimuth($draw,$x2,$y2,$x1,$y1,$x3,$y3);
$draw = angle_azimuth($draw,$x3,$y3,$x2,$y2,$x1,$y1);

    // $draw->circle($x2,$y2,$x2+1,$y2);
    // $draw->circle($x3,$y3,$x3+1,$y3);
    // $draw->annotation(100,140 ,$v1." ".$v2);
    // $draw->setStrokeColor('#0000ff');


 

    // $draw->annotation(100,120 ,$bisectrix);

    // $draw->setStrokeColor('#000000');



$image->drawImage($draw);
header('Content-type: image/png');
echo $image;




?>