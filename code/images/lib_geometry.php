<?php
function coord_text_angle($x1,$y1,$x2,$y2,$x3,$y3){
    return "Hello";
}

// computing angle, that define by coordinates of three points.
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

// computing angels between 3 sides of triangle, that define by coordinates.
function vectors_angles($x1,$y1,$x2,$y2,$x3,$y3){
    $c = [$x1,$y1,$x2,$y2,$x3,$y3];

    $dx3 = ($c[0]-$c[4]);
    $dy3 = ($c[1]-$c[5]);

    $dx1 = ($c[2]-$c[0]);
    $dy1 = ($c[3]-$c[1]);

    $dx2 = ($c[4]-$c[2]);
    $dy2 = ($c[5]-$c[3]);

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

    // $cd_x = $x2-$x1;
    $cd_x = $x2-$x1;
    $cd_y = $y1-$y1;

    $numerator = (($ab_x*$cd_x)+($ab_y*$cd_y));
    $denominator = ((sqrt($ab_x**2+$ab_y**2)*sqrt($cd_x**2+$cd_y**2)));
    $cos_a = $numerator / $denominator;
    $ox = round(acos($cos_a)/pi()*180);

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


function side_angle_top($x1,$y1,$x2,$y2){
    $ab_x = $x2-$x1;
    $ab_y = $y2-$y1;

    // $cd_x = $x2-$x1;
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


// Transfering degrees to radians.
function deg_rad($deg){
    return $deg*pi()/180;
}

function draw_text_n($y1,$n,$k,$r,$text,$draw){
    $draw->setStrokeWidth(1);
    $font = 'Inter.ttf';
    $size = 12;
    $draw->setFontSize($size);
    $draw->setFont($font);
    $r_out = round($k,$r);
    // $draw->annotation(10+50*$n,$y1,"{$text} {$r_out}");
}


function multi_angle(){
    $coords = [];
    $arr = [[1,1],[1,-1],[-1,-1],[-1,1]];
    $n = 0;
    $x = 10;
    $y = 50;
    $dx = 60;
    $dy = 50;
    $line = 130;
    for ($i=0;$i<4;$i+=1){
        for ($j=0;$j<4;$j+=1){
            $x1 = $x + $line *2* $i;
            $y1 = $x + $line * $j;
            
            $x2 = $x1 + $dx*2*$arr[$i][0];
            $y2 = $y1 + $dy*$arr[$j][0];
    
            $x3 = $x1 + $dx*3*$arr[$i][1];
            $y3 = $y1 + $dy*$arr[$j][1];
    
            $n+=1;
            array_push($coords,[$x1,$y1,$x2,$y2,$x3,$y3]); 
        }
    }
    return $coords;    
}


function angle($x1,$y1,$x2,$y2,$x3,$y3){
    $vect_angle = vectors_angle($x1,$y1,$x2,$y2,$x3,$y3);
    $tan_alfa_d_2 = round(tan(deg_rad($vect_angle/2)),2);

    // angles of triangle
    // angle of sides with ox and oy axises
    $angle_out = side_angle($x1,$y1,$x2,$y2);
    $angle_out_1 = side_angle($x1,$y1,$x3,$y3); 

    $angle_out_2 = side_angle_top($x1,$y1,$x2,$y2);
    $angle_out_3 = side_angle_top($x1,$y1,$x3,$y3); 

    $tan_oy2 = round(tan(deg_rad($angle_out[1])),2);
    $tan_oy1 = round(tan(deg_rad($angle_out_1[1])),2);

    try {
        $ctan_oy1 = round(1/tan(deg_rad($angle_out_1[1])),2);
    } catch (DivisionByZeroError $e) {
        $ctan_oy1 = 1000;
    }
    $bisectrix = $vect_angle/2 + $angle_out[1];


    $d_x2 = gmp_sign($x2-$x1);
    $d_x3 = gmp_sign($x3-$x1);
    $d_y2 = gmp_sign($y2-$y1);
    $d_y3 = gmp_sign($y3-$y1);

    if ((($d_x2 ==1) && ($d_x3 ==1))){
        $bisectrix = $vect_angle/2 + $angle_out[1];
        $bis = 100;
        }
    if (($d_x2 ==-1) && ($d_x3 ==-1)){
            $bisectrix = $vect_angle/2 + $angle_out[1];
            $bis = 100;
        }
    if (($d_x2 ==1) && ($d_x3 ==-1) && ($d_y2 ==1) && ($d_y3 ==1) ){
            $bisectrix = $vect_angle/2 + $angle_out[1];
            $bis = ($angle_out_2[0]- $angle_out_3[0])/2;
            $bisectrix =  ($angle_out_2[0]- $angle_out_3[0])/2+$angle_out_3[0];

    }
    if (($d_x2 ==1) && ($d_x3 ==-1) && ($d_y2 ==1) && ($d_y3 ==1) ){
        $bisectrix = $vect_angle/2 + $angle_out[1];
        $bis = ($angle_out_2[0]+ $angle_out_3[0])/2;
        $bisectrix = ($angle_out_2[0]+ $angle_out_3[0])/2-$angle_out_3[0];
    }
    if (($d_x2 ==1) && ($d_x3 ==-1) && ($d_y2 ==1) && ($d_y3 ==-1) ){
        $bisectrix = $vect_angle/2 + $angle_out[1];
        $bis = ($angle_out_2[0]+ $angle_out_3[0])/2;
        $bisectrix = ($angle_out_2[0]+ $angle_out_3[0])/2-$angle_out_3[0];
    }

    if (($d_x2 ==1) && ($d_x3 ==-1) && ($d_y2 ==-1) && ($d_y3 ==-1) ){
        $bisectrix = $vect_angle/2 + $angle_out[1];
        $bis = ($angle_out_2[0]+ $angle_out_3[0])/2;
        $bisectrix = ($angle_out_2[0]+ $angle_out_3[0])/2+$angle_out_3[0];
    }
    if (($d_x2 ==1) && ($d_x3 ==-1) && ($d_y2 ==-1) && ($d_y3 ==1) ){
        $bisectrix = $vect_angle/2 + $angle_out[1];
        $bis = ($angle_out_2[0]+ $angle_out_3[0])/2;
        $bisectrix = ($angle_out_2[0]+ $angle_out_3[0])/2-$angle_out_3[0];
    }
// ----------------------
    if (($d_x2 ==-1) && ($d_x3 ==1) && ($d_y2 ==1) && ($d_y3 ==1) ){
        $bisectrix = $vect_angle/2 + $angle_out[1];
        $bis = ($angle_out_3[0]- $angle_out_2[0])/2;
        $bisectrix = ($angle_out_3[0]- $angle_out_2[0])/2+$angle_out_2[0];
    }
    if (($d_x2 ==-1) && ($d_x3 ==1) && ($d_y2 ==1) && ($d_y3 ==-1) ){
        $bisectrix = $vect_angle/2 + $angle_out[1];
        $bis = 180-($angle_out_2[0]+ $angle_out_3[0])/2;
        $bisectrix = 180-($angle_out_2[0]+ $angle_out_3[0])/2+$angle_out_2[0];
    }

    if (($d_x2 ==-1) && ($d_x3 ==1) && ($d_y2 ==-1) && ($d_y3 ==-1) ){
        $bisectrix = $vect_angle/2 + $angle_out[1];
        $bis = ($angle_out_3[0] - $angle_out_2[0])/2;
        $bisectrix = ($angle_out_3[0] - $angle_out_2[0])/2+$angle_out_2[0];
    }
    if (($d_x2 ==-1) && ($d_x3 ==1) && ($d_y2 ==-1) && ($d_y3 ==1) ){
        $bisectrix = $vect_angle/2 + $angle_out[1];
        $bis = ($angle_out_2[0]+ $angle_out_3[0])/2;
        $bisectrix = ($angle_out_2[0]+ $angle_out_3[0])/2+$angle_out_2[0];
    }

    $bisectrix_ox = $bisectrix;

    $bisectrix_oy = $vect_angle/2 + $angle_out[2];
    $bisectrix_ox = $vect_angle/2 + $angle_out[1];

    $tan_bisectrix_ox = round(tan(deg_rad($bisectrix_ox)),2);
    $tan_bisectrix_oy = round(tan(deg_rad($bisectrix_oy)),2);

    $tan_bisectrix = round(tan(deg_rad($bisectrix)),2);

    $font = 'Inter.ttf';
    $size = 12;
        // ----------size of text----------------
        $bbox_a = imagettfbbox($size, 0, $font, "{$vect_angle}");
        $text_x = abs($bbox_a[2]);
        $text_y = abs($bbox_a[5]);
        $text_diagonal = round(sqrt($text_x**2+$text_y**2),2);
        // ----------size of text----------------

        // ---------------length----------------
        $l = round($text_diagonal/(2*$tan_alfa_d_2),2);
        // ---------------length----------------

        $x_b = $l;
        $y_b=$x_b/$tan_bisectrix_ox;

        $sign_tox = gmp_sign($tan_bisectrix_ox*100);

        $dd_y = $sign_tox*($d_y2*$d_y3);

        // Main difinition of text
        $dx_b= $d_x2*$x_b;
        $dx_t= $sign_tox*$text_x/2;

        $dy_b = $sign_tox*($d_y2*$y_b);
        $dy_t = $sign_tox*($text_y/2);
        
        if ($d_x2==$d_x3){        
        $coord_x = $x1+$dx_b+$dx_t;
        $coord_y = $y1+$dy_b+$dy_t;
        // $this->draw->line($x1,$y1,$x1+$x_b,$y1+$y_b);
    } else {
        $x_b = $l;
        $y_b=$x_b/$tan_bisectrix;
        $dx_b= $d_x2*$x_b;
        $dx_t= $sign_tox*$text_x/2;
        $dy_b = $sign_tox*($d_y2*$y_b);

        $x_b =  20*cos(deg_rad($bisectrix));
        $y_b =  20*sin(deg_rad($bisectrix));

        $x_b_l =  $l*cos(deg_rad($bisectrix));
        $y_b_l =  $l*sin(deg_rad($bisectrix));


        $coord_x_b = $x1+$x_b;
        $coord_y_b = $y1+$y_b;


        if (($d_x2 ==1) && ($d_x3 ==-1) && ($d_y2 ==1) && ($d_y3 ==1) ){
            $coord_x_b = $x1-$x_b;
            $coord_y_b = $y1+$y_b;
            $coord_x_b_l = $x1-$x_b_l+$text_x/2;
            $coord_y_b_l = $y1+$y_b_l+$text_y;
        }
        if (($d_x2 ==1) && ($d_x3 ==-1) && ($d_y2 ==1) && ($d_y3 ==-1) ){
            $coord_x_b = $x1-$x_b;
            $coord_y_b = $y1+$y_b;
            $coord_x_b_l = $x1-$x_b_l;
            $coord_y_b_l = $y1+$y_b_l+$text_y;
        }

        if (($d_x2 ==1) && ($d_x3 ==-1) && ($d_y2 ==-1) && ($d_y3 ==-1) ){
            $coord_x_b = $x1+$x_b;
            $coord_y_b = $y1-$y_b;
            $coord_x_b_l = $x1+$x_b_l+$text_x/2;
            $coord_y_b_l = $y1-$y_b_l;
        }
        if (($d_x2 ==1) && ($d_x3 ==-1) && ($d_y2 ==-1) && ($d_y3 ==1) ){
            $coord_x_b = $x1-$x_b;
            $coord_y_b = $y1-$y_b;
            $coord_x_b_l = $x1-$x_b_l;
            $coord_y_b_l = $y1-$y_b_l;
        }
// ----------------------
        if (($d_x2 ==-1) && ($d_x3 ==1) && ($d_y2 ==1) && ($d_y3 ==1) ){
            $coord_x_b = $x1+$x_b;
            $coord_y_b = $y1+$y_b;
            $coord_x_b_l = $x1+$x_b_l+$text_x/2;
            $coord_y_b_l = $y1+$y_b_l+$text_y;
        }
        if (($d_x2 ==-1) && ($d_x3 ==1) && ($d_y2 ==1) && ($d_y3 ==-1) ){
            $coord_x_b = $x1-$x_b;
            $coord_y_b = $y1+$y_b;
            $coord_x_b_l = $x1-$x_b_l+$text_x/2;
            $coord_y_b_l = $y1+$y_b_l+$text_y;
        }

        if (($d_x2 ==-1) && ($d_x3 ==1) && ($d_y2 ==-1) && ($d_y3 ==-1) ){
            $coord_x_b = $x1+$x_b;
            $coord_y_b = $y1-$y_b;
            $coord_x_b_l = $x1+$x_b_l+$text_x/2;
            $coord_y_b_l = $y1-$y_b_l;
        }
        if (($d_x2 ==-1) && ($d_x3 ==1) && ($d_y2 ==-1) && ($d_y3 ==1) ){
            $coord_x_b = $x1-$x_b;
            $coord_y_b = $y1-$y_b;
            $coord_x_b_l = $x1-$x_b_l+$text_x/2;
            $coord_y_b_l = $y1-$y_b_l;
        }


        // $this->draw->line($x1,$y1, $coord_x_b, $coord_y_b);
        // $coord_x = $x1+$dx_b+$dx_t;
        // $coord_y = $y1+$dy_b+$dy_t;

        $coord_x = $coord_x_b_l;
        $coord_y = $coord_y_b_l;

    }


$out_arr = [$coord_x, $coord_y, $vect_angle,$coord_x_b,$coord_y_b];
// 

return $out_arr;
}

$x1 = 10;
$y1 = 150;
$x2 = 100;
$y2 = 15;
$x3 = 300;
$y3 = 150;

$image = new Imagick();
$image->newImage(300, 300, new ImagickPixel('white'));
$image->setImageFormat('png');

$draw = new ImagickDraw ();

$draw->line($x1,$y1, $x2,$y2);
$draw->line($x1,$y1, $x3,$y3);
$draw->line($x2,$y2, $x3,$y3);


$coo = angle($x1,$y1,$x3,$y3,$x2,$y2);
$draw->annotation($coo[0],$coo[1],$coo[2]);
$draw->line($x1,$y1,$coo[3],$coo[4]);

$coo = angle($x3,$y3,$x2,$y2,$x1,$y1);
$draw->annotation($coo[0],$coo[1],$coo[2]);
$draw->line($x3,$y3,$coo[3],$coo[4]);


$coo = angle($x2,$y2,$x3,$y3,$x1,$y1);
$draw->annotation($coo[0],$coo[1],$coo[2]);
$draw->line($x2,$y2,$coo[3],$coo[4]);





// $draw->annotation($coo[0],$coo[1], $coo[2]);

$image->drawImage($draw);
header('Content-type: image/png');
echo $image;

?>