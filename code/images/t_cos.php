<?php
    $a = 5;
    $b = 6;
    $c = 7;

    $scale = 20;

function t_cos($a,$b,$c){
    $cos_a = ($b**2+$c**2-$a**2)/(2*$b*$c);
    $alfa = rad2deg((acos(($cos_a))));
    return $alfa;
}

function sides2coords($a,$b,$c,$scale){
    $x1 = 0;
    $y1 = 0;

    $alfa = t_cos($a,$b,$c);
    $beta = t_cos($b,$c,$a);
    $gamma = t_cos($c,$a,$b);
    
    $A = $a * $scale;
    $B = $b * $scale;
    $C = $c * $scale;
    
    $dx = $B / cos($gamma);
    $dy = $B / sin($gamma);
    
    $x2 = $x1 + $dx;
    $y2 = $y1 - $dy;
    
    $x3 = $x1 + $A;
    $y3 = $y1;

    $sin_gamma = sin(deg2rad($gamma));
    echo ("alfa = {$alfa} beta = {$beta} gamma = {$gamma} <br>");
    echo ("sin(gamma) = {$sin_gamma} <br>");
    return [$x1,$y1,$x2,$y2,$x3,$y3];
}
$arr_out = sides2coords($a,$b,$c,20);
echo ("x1 = {$arr_out[0]} y1 = {$arr_out[1]} {$arr_out[2]} {$arr_out[3]} {$arr_out[4]} {$arr_out[5]} <br>");
?>