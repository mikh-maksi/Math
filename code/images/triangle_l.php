<?php
if (isset($_GET['x1'])){ 
    $x1 = $_GET['x1'];
}
else 
    {$x1 = 50;}

if (isset($_GET['y1'])) {
    $y1 = $_GET['y1'];
}
else {
    $y1 = 20;
}

if (isset($_GET['x2'])) {
    $x2 = $_GET['x2'];
}
else{
    $x2 = 320;
}

if (isset($_GET['y2'])) {
    $y2 = $_GET['y2'];
}
else {
    $y2 = 200;
}

if (isset($_GET['x3'])) {
    $x3 = $_GET['x3'];
}
else {
    $x3 = 120;
}

if (isset($_GET['y3'])) {
    $y3 = $_GET['y3'];
}
else {
    $y3 = 350;
}

if (isset($_GET['l1'])){$l1 = $_GET['l1'];}else{$l1=0;}
if (isset($_GET['l2'])){$l2 = $_GET['l2'];}else{$l2=0;}
if (isset($_GET['l3'])){$l3 = $_GET['l3'];}else{$l3=0;}



// ?x1=10&y1=20&x2=100&y2=70&x3=80&y3=80


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

// Transfering degrees to radians.
function deg_rad($deg){
    return $deg*pi()/180;
}

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

function angle_text_out($x1,$y1,$x2,$y2,$x3,$y3,$n,$draw){
    $vect_angle = vectors_angle($x1,$y1,$x2,$y2,$x3,$y3);
    // tan alfa/2
    $tan_alfa_d_2 = round(tan(deg_rad($vect_angle/2)),2);
    $font = 'Inter.ttf';
    $size = 12;
    $draw->setFontSize($size);
    $draw->setFont($font);
    $draw->setStrokeWidth(1);

    $bbox_a = imagettfbbox($size, 0, $font, "{$vect_angle}");
    $text_x = abs($bbox_a[2]);
    $text_y = abs($bbox_a[5]);
    $text_diagonal = round(sqrt($text_x**2+$text_y**2),2);

    $angle_out = side_angle($x1,$y1,$x2,$y2);

    // ---------- bisectrix -------------------
    $bisectrix_ox = $vect_angle/2 + $angle_out[1];
    $bisectrix_oy = $vect_angle/2 + $angle_out[2];


    $ox_b = 90 - $bisectrix_ox;
    $oy_b = $bisectrix_ox;


    // $bisectrix_oy = $vect_angle/2 + $angle_out[1];
    // $bisectrix_ox = 90-$bisectrix_oy;
    
    $tan_bisectrix_ox = round(tan(deg_rad($bisectrix_ox)),2);
    $tan_bisectrix_oy = round(tan(deg_rad($bisectrix_oy)),2);
    // ---------- bisectrix -------------------

    // ----------size of text----------------
    $font = 'Inter.ttf';
    $size = 12;

    // ----------size of text----------------

    // ---------------length----------------
    $l = round($text_diagonal/(2*$tan_alfa_d_2),2);
    // ---------------length----------------
    // $xb = $l;
    $dx = $l*cos(deg_rad($ox_b));
    $dy = $l*sin(deg_rad($ox_b));

    // $dx_text = $text_diagonal/2*cos(deg_rad($ox_b));
    // $dy_text =$text_diagonal/2*sin(deg_rad($ox_b));

    $dx_text = $text_x/2;
    $dy_text = $text_y/2;

    $sign_x = 1;
    $sign_y = 1;

    if ($n == 1){
        $sign_x = 1;
        $sign_y = 1;
    }
    if ($n == 2){
        $sign_x = 1;
        $sign_y = -1;
    }
    if ($n == 3){
        $sign_x = -1;
        $sign_y = -1;
    }

    $x = $x1 + $sign_x *($dx) + $dx_text-1;
    $y = $y1 + $sign_y *($dy) + $dy_text;

    $l_real = sqrt(($x-$x1)**2+($y-$y1)**2);

    // Offset in x and y by bottom vector.
    $x_b = $l_real;
    $y_b=$x_b/$tan_bisectrix_ox;
    // special out


    // Main difinition of text
    $draw->setStrokeWidth(1);
    $draw->setFontSize($size);
    $draw->setFont($font);
    $coord_x = $x1+$x_b+$text_x/2;
    $coord_y = $y1+$y_b+$text_y/2;
    $draw->setTextAlignment(3);
    // $draw->annotation($coord_x, $coord_y, "{$vect_angle}");
    // $draw->annotation($x, $y, "{$vect_angle}");

    $tan_coord_x_y = $x_b/$y_b;
    $tan_x_y = $dx / $dy; 
    $draw->setTextAlignment(1);

   
    // $draw->annotation(20,280+40*$n-20,"Sign: sx = {$sign_x} sy = {$sign_y} a = {$vect_angle}");
    // $draw->annotation(20,280+40*$n,"Sign: x1 = {$x1} y1 = {$y1} x2 = {$x2} y2 = {$y2} x3 = {$x3} y3 = {$y3}");

    // $draw->annotation(20,300,"Angles: alfa = {$vect_angle} tan_alfa/2 = {$tan_alfa_d_2}");
    // $draw->annotation(20,320,"Text size: x = {$text_x }, y = {$text_y} diagonal = {$text_diagonal}");
    // $draw->annotation(20,340,"Bisectrixes: ox_bx = {$bisectrix_ox}, oy_bx = {$bisectrix_oy} ox_b = {$ox_b} oy_b = {$oy_b}");
    // $draw->annotation(20,360,"l: l = {$l}, tan_bisectrix_ox = {$tan_bisectrix_ox} ");
    // $draw->annotation(20,380,"l: l_real = {$l_real}, tan_bisectrix_ox = {$tan_bisectrix_ox} ");
    // $draw->annotation(20,400,"Coord: x = {$coord_x}, y = {$coord_y} xn = {$dx}, yn = {$dy}"); 
    // $draw->annotation(20,420,"Coord: x = {$x}, y = {$y} xn = {$dx}, yn = {$dy}");  
    // $draw->annotation(20,440,"Tan: tan_coord = {$tan_coord_x_y}, tan_xy = {$tan_x_y} ");  
}

$q = new lines($x1,$y1,$x2,$y2,$x3,$y3,$l1,$l2,$l3);

class lines{
    public $coord;
    public $draw;
    public $length;

    function __construct($x1,$y1,$x2,$y2,$x3,$y3,$l1,$l2,$l3){
        $this->coord = [$x1,$y1,$x2,$y2,$x3,$y3];
        $image = new Imagick();
        $image->newImage(200, 300, new ImagickPixel('white'));
        $image->setImageFormat('png');
        

        $this->draw = new ImagickDraw ();
        $this->draw->setStrokeColor(new ImagickPixel('rgba(0, 0, 0, 1)'));
        // $this->draw->setStrokeWidth(2);

        $c = $this->coord;
        angle_text_out($x1,$y1,$x2,$y2,$x3,$y3,1,$this->draw);
        angle_text_out($x2,$y2,$x1,$y1,$x3,$y3,2,$this->draw);
        angle_text_out($x3,$y3,$x1,$y1,$x2,$y2,3,$this->draw);
        /*---------lines---------*/ 
        // drawing of bottom line
        $this->draw->setStrokeColor('#000000');
        $this->draw->line($c[0],$c[1], $c[2],$c[3]);
        // drawing of top line
        $this->draw->setStrokeColor('#000000');
        $this->draw->line($c[0],$c[1], $c[4],$c[5]);
        $this->draw->setStrokeColor('#000000');
        $this->draw->line( $c[2],$c[3], $c[4],$c[5]);
        $this->draw->setStrokeColor('#000000');

        /*---------lines---------*/ 

        // main angle (alfa)
        if ($l1==0)
            $length_array[0] = $this->calc_side_length()[0];
        else
            $length_array[0]=$l1;

            if ($l2==0)
            $length_array[1] = $this->calc_side_length()[1];
        else
            $length_array[1]=$l2;

            if ($l3==0)
            $length_array[2] = $this->calc_side_length()[2];
        else
            $length_array[2]=$l3;

            

        // $this->length = $this->calc_side_length();
        $this->length =  $length_array;
        $c = $this->coord;
        $l = $this->length;


        $font = 'Inter.ttf';
        $size = 12;
        $bbox_a = imagettfbbox($size, 0, $font, "$l[0]");
        $text_x = abs($bbox_a[2]);
        $text_y = abs($bbox_a[5]);

        $this->draw->annotation(($c[2]+$c[0])/2-$text_x,($c[3]+$c[1])/2, $l[0]);
        $this->draw->annotation(($c[4]+$c[2])/2-$text_x/2,($c[5]+$c[3])/2+$text_y, $l[1]);
        $this->draw->annotation(($c[0]+$c[4])/2,($c[1]+$c[5])/2, $l[2]);
        // $this->draw->annotation(20,280,$text_x);


        $image->drawImage($this->draw);
        header('Content-type: image/png');
        echo $image;

    }

    function calc_side_length(){
        $c = $this->coord;
        $l1 = round(sqrt(($c[0]-$c[2])**2+($c[1]-$c[3])**2));
        $l2 = round(sqrt(($c[2]-$c[4])**2+($c[3]-$c[5])**2));
        $l3 = round(sqrt(($c[4]-$c[0])**2+($c[5]-$c[1])**2));
        $side_length = [$l1,$l2,$l3];
        return $side_length; 

    }

}