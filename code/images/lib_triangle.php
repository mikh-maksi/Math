<?php

function t_cos($a,$b,$c){
    $cos_a = ($b**2+$c**2-$a**2)/(2*$b*$c);
    $alfa = rad2deg((acos(($cos_a))));
    return $alfa;
}

function sides2coords($a,$b,$c,$scale){

    $alfa = t_cos($a,$b,$c);
    $beta = t_cos($b,$c,$a);
    $gamma = t_cos($c,$a,$b);
    
    $A = $a * $scale;
    $B = $b * $scale;
    $C = $c * $scale;

    $x1 = 320-$A/2;
    $y1 = 600;

    $dx = $B * cos(deg2rad($gamma));
    $dy = $B * sin(deg2rad($gamma));
    
    $x2 = $x1 + $dx;
    $y2 = $y1 - $dy;
    
    $x3 = $x1 + $A;
    $y3 = $y1;
    
    return [$x1,$y1,$x2,$y2,$x3,$y3];
}


// computing angels between 3 sides of triangle, that define by coordinates.
function vectors_angles($x1,$y1,$x2,$y2,$x3,$y3){
    $coo = [$x1,$y1,$x2,$y2,$x3,$y3];

    $dx3 = ($coo[0]-$coo[4]);
    $dy3 = ($coo[1]-$coo[5]);

    $dx1 = ($coo[2]-$coo[0]);
    $dy1 = ($coo[3]-$coo[1]);

    $dx2 = ($coo[4]-$coo[2]);
    $dy2 = ($coo[5]-$coo[3]);

    $a1 = round(acos((-$dx3*$dx1+-$dy3*$dy1)/(sqrt(($dx3)**2+$dy3**2)*sqrt($dx1**2+$dy1**2)))*180/pi(),0);
    $a2 = round(acos((-$dx1*$dx2+-$dy1*$dy2)/(sqrt($dx1**2+$dy1**2)*sqrt($dx2**2+$dy2**2)))*180/pi(),0);
    $a3 = round(acos((-$dx2*$dx3+-$dy2*$dy3)/(sqrt($dx2**2+$dy2**2)*sqrt($dx3**2+$dy3**2)))*180/pi(),0);
    $side_angle = [$a1,$a2,$a3];
    return $side_angle; 
}
// computing angels between ox and oy axis with vector, that define by coordinates.
function side_angle($x1,$y1,$x2,$y2){
    $ab_x = $x2-$x1;
    $ab_y = $y2-$y1;

    $cd_x = $x2-$x1;
    $cd_y = $y1-$y1;

    $numerator = (($ab_x*$cd_x)+($ab_y*$cd_y));
    $denominator = ((sqrt($ab_x**2+$ab_y**2)*sqrt($cd_x**2+$cd_y**2)));

    try {
        $cos_a = $numerator / $denominator;
    } catch (DivisionByZeroError $e) {
        $cos_a = 1;
    }

    $ab_x = $x2-$x1;
    $ab_y = $y2-$y1;

    $cd_x = $x1-$x1;
    $cd_y = $y2-$y1;

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

// Transfering degrees to radians.


function sign ($x){
    if ($x == 0) {
        $out = 0;
    }else{
        $out = $x/abs($x);
    }
    return $out;
}

function draw_text_n($y1,$n,$k,$r,$text,$draw){
    $draw->setStrokeWidth(1);
    $font = 'Inter.ttf';
    $size = 12;
    $draw->setFontSize($size);
    $draw->setFont($font);
    $r_out = round($k,$r);
    $draw->annotation(10+50*$n,$y1,"{$text} {$r_out}");
}
function coords_by_angles($alfa,$beta,$gamma){
    $scale = 47;
    $s = 10;
    $sa = $s*$scale;

    $sb = $sa*(sin(deg2rad($beta))/sin(deg2rad($alfa)));
    $sc = $sa*(sin(deg2rad($gamma))/sin(deg2rad($alfa)));

    $dx = $sb * cos(deg2rad($gamma));
    $dy = $sb * sin(deg2rad($gamma));

    $A = $sa;
    $B = $sb;
    $C = $sc;

    $DX = $dx;
    $DY = $dy;

    $x1 = 320-$A/2;
    $y1 = 420;
    
    $x2 = $x1 + $DX;
    $y2 = $y1 - $DY;
    
    $x3 = $x1 + $A;
    $y3 = $y1;

    $out_style = 1;
    return [$x1,$y1,$x2,$y2,$x3,$y3];
}

function coords_by_angles_2($alfa,$beta,$gamma,$n){
    $scale = 23;

    $sa = 10;
    $sb = $sa*(sin(deg2rad($beta))/sin(deg2rad($alfa)));
    $sc = $sa*(sin(deg2rad($gamma))/sin(deg2rad($alfa)));

    $dx = $sb * cos(deg2rad($gamma));
    $dy = $sb * sin(deg2rad($gamma));

    $A = $sa * $scale;
    $B = $sb * $scale;
    $C = $sc * $scale;

    $DX = $dx * $scale;
    $DY = $dy * $scale;


    if ($n==1){
        $x1 = 200-$A/2;
        $y1 = 420;
        
        $x2 = $x1 + $DX;
        $y2 = $y1 - $DY;
        
        $x3 = $x1 + $A;
        $y3 = $y1;
    }

    if ($n==2){
        $x1 = 460-$A/2;
        $y1 = 420;
        
        $x2 = $x1 + $DX;
        $y2 = $y1 - $DY;
        
        $x3 = $x1 + $A;
        $y3 = $y1;
}
        

    $out_style = 1;
    return [$x1,$y1,$x2,$y2,$x3,$y3];

}


function coords_by_h_base($h,$base){
    $scale = 47;
    $x1 = 320-$base*$scale/2;
    $y1 = 320;
    $x2 = 320;
    $y2 = 320 - $h*$scale;
    $x3 = 320+$base*$scale/2;
    $y3 = 320;
    return [$x1,$y1,$x2,$y2,$x3,$y3];
}