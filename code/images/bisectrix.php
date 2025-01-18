<?php
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

function deg_rad($deg){
    return $deg*pi()/180;
}

// computing angels between ox and oy axis with vector, that define by coordinates.
function side_angle($x1,$y1,$x2,$y2){
    $ab_x = $x2-$x1;
    $ab_y = $y2-$y1;

    $cd_x = -1;
    $cd_y = 0;

    $numerator = (($ab_x*$cd_x)+($ab_y*$cd_y));
    $denominator = ((sqrt($ab_x**2+$ab_y**2)*sqrt($cd_x**2+$cd_y**2)));
    $cos_a = $numerator / $denominator;
    $ox = round(acos($cos_a)/pi()*180);

    $ab_x = $x2-$x1;
    $ab_y = $y2-$y1;

    $cd_x = 0;
    $cd_y = -1;

    $numerator = (($ab_x*$cd_x)+($ab_y*$cd_y));
    $denominator = ((sqrt($ab_x**2+$ab_y**2)*sqrt($cd_x**2+$cd_y**2)));
    try {
        $cos_a = $numerator / $denominator;
    } catch (DivisionByZeroError $e) {
        $cos_a = 1;
    }

    $oy = round(acos($cos_a)/pi()*180);
    $angle_out = [$ox,$oy];
    return $angle_out;
}



$image = new Imagick();
$image->newImage(300, 300, new ImagickPixel('white'));
$image->setImageFormat('png');

$draw = new ImagickDraw ();

$x1 = 60;
$y1 = 100;
$x2 = 10;
$y2 = 150;
$x3 = 100;
$y3 = 40;

$draw->line($x1,$y1, $x2,$y2);
$draw->line($x1,$y1, $x3,$y3);

$a = vectors_angle($x1,$y1,$x2,$y2,$x3,$y3);

$draw->annotation($x1,$y1,$a);

$l = side_angle($x1,$y1,$x2,$y2);
$l2 = side_angle($x1,$y1,$x3,$y3);


$draw->annotation($x1,$y1+20,"ox = ".$l[0]." oy = ".$l[1]);
$draw->annotation($x1,$y1+40,"ox = ".$l2[0]." oy = ".$l2[1]);
$draw->annotation($x1,$y1+80,"dy2= ".gmp_sign($y1-$y2)." dy3 = ".gmp_sign($y1-$y3));


if ((gmp_sign($y1-$y2) == 1)&& (gmp_sign($y1-$y3)==1)){
    $bisectrix = ($l[0]+$l2[0])/2;
} elseif ((gmp_sign($y1-$y2) == -1)&& (gmp_sign($y1-$y3)==1)){
    $bisectrix = (max($l[0],$l2[0]) - min ($l[0],$l2[0]))/2;
}else

{
    $bisectrix = (max($l[0],$l2[0]) - min ($l[0],$l2[0]))/2;
}

$draw->annotation($x1,$y1+60,"bisecrix = ".$bisectrix);

// $draw->annotation($x1,$y1+40,);

$dx = 2;
if ($bisectrix<90){
$dy = $dx * tan(deg_rad($bisectrix));
} elseif ($bisectrix>90){
    $dy = $dx * -tan(deg_rad($bisectrix));
} else { $dy = 1;}

$draw->line($x1,$y1, $x1-$dx,$y1-$dy);



$image->drawImage($draw);
header('Content-type: image/png');
echo $image;

?>