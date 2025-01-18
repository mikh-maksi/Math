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

function l($alfa){
    $font = 'Inter.ttf';
    $size = 12;
    $bbox_a = imagettfbbox($size, 0, $font, "{$alfa}");
    $text_x = abs($bbox_a[2]);
    $text_y = abs($bbox_a[5]);
    $text_diagonal = sqrt($text_x**2+$text_y**2);
    // ----------size of text----------------

    // $tan_alfa_d_2 = tan(deg_rad($alfa/2));
    $tan_alfa_d_2 = sin(deg_rad($alfa/2));
    // ---------------length----------------
    $l = $text_diagonal/(2*$tan_alfa_d_2);
    return $l;
}

function vectors_angle($x1,$y1,$x2,$y2,$x3,$y3){
    $c = [$x1,$y1,$x2,$y2,$x3,$y3];

    $dx3 = ($c[0]-$c[4]);
    $dy3 = ($c[1]-$c[5]);

    $dx1 = ($c[2]-$c[0]);
    $dy1 = ($c[3]-$c[1]);

    $dx2 = ($c[4]-$c[2]);
    $dy2 = ($c[5]-$c[3]);

    $a1 = round(acos((-$dx3*$dx1+-$dy3*$dy1)/(sqrt(($dx3)**2+$dy3**2)*sqrt($dx1**2+$dy1**2)))*180/pi(),0);
   
    return $a1; 
}


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

function angle_position($x1,$y1,$azimuth,$vect_angle){
    // $v1 = azimuth($x1,$y1,$x2,$y2);
    // $v2 = azimuth($x1,$y1,$x3,$y3);
    // $bisectrix = bisectrix($v1,$v2);
    $bisectrix = $azimuth;
    // $vect_angle = vectors_angle($x1,$y1,$x2,$y2,$x3,$y3);
    $l = l($vect_angle)+0; // Depends value - add a few pixels.

    $font = 'Inter.ttf';
    $size = 12;
    $bbox_a = imagettfbbox($size, 0, $font, $vect_angle);
    $text_x = abs($bbox_a[2]);
    $text_y = abs($bbox_a[5]);

    $dx = 0;
    $dy=0;
    $dx_l = $dx+$text_x/2-3;
    $dy_l = $dy-$text_y/2+1;

    $coord_angle = [$c[2]-$dx_l,$c[3]-$dy_l];
    return $coord_angle;

}


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


    $vect_angle = vectors_angle($x1,$y1,$x2,$y2,$x3,$y3);
    $l = l($vect_angle)+3; // Depends value - add a few pixels.
    $c = line_azimuth($bisectrix,$l,$x1,$y1);


    $font = 'Inter.ttf';
    $size = 12;
    $bbox_a = imagettfbbox($size, 0, $font, $vect_angle);
    $text_x = abs($bbox_a[2]);
    $text_y = abs($bbox_a[5]);

    $dx = 0;
    $dy=0;
    $dx_l = $dx+$text_x/2-3;
    $dy_l = $dy-$text_y/2+1;


    $coord_angle = [$c[2]-$dx_l,$c[3]-$dy_l];
    // $coord_angle = angle_position($x1,$y1,$bisectrix,$vect_angle);

    $draw->annotation($coord_angle[0],$coord_angle[1] ,$vect_angle);
    $draw->circle($c[2]-$dx_l,$c[3]-$dy_l,$c[2]-$dx_l,$c[3]-$dy_l+1);



    // $draw->annotation($x1,$y1+20,$l);

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