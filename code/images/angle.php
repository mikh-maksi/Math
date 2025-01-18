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

function draw_text_n($y1,$n,$k,$r,$text,$draw){
    $draw->setStrokeWidth(1);
    $font = 'Inter.ttf';
    $size = 12;
    $draw->setFontSize($size);
    $draw->setFont($font);
    $r_out = round($k,$r);
    $draw->annotation(10+50*$n,$y1,"{$text} {$r_out}");
}

$q = new lines($x1,$y1,$x2,$y2,$x3,$y3);
$q1 = new lines($x1,$y1+200,$x2,$y2+200,$x3,$y3+200);


class lines{
    public $coord;
    public $draw;
    function __construct($x1,$y1,$x2,$y2,$x3,$y3){
        $this->coord = [$x1,$y1,$x2,$y2,$x3,$y3];
        $image = new Imagick();
        $image->newImage(400, 400, new ImagickPixel('white'));
        $image->setImageFormat('png');
        

        $this->draw = new ImagickDraw ();
        $this->draw->setStrokeColor(new ImagickPixel('rgba(0, 0, 0, 1)'));
        $this->draw->setStrokeWidth(2);

        $c = $this->coord;

        /*---------lines---------*/ 
        // drawing of bottom line
        $this->draw->setStrokeColor('#0000ff');
        $this->draw->line($c[0],$c[1], $c[2],$c[3]);
        // drawing of top line
        $this->draw->setStrokeColor('#00ff00');
        $this->draw->line($c[0],$c[1], $c[4],$c[5]);
        $this->draw->setStrokeColor('#000000');
        /*---------lines---------*/ 

        

        // main angle (alfa)
        $vect_angle = vectors_angle($x1,$y1,$x2,$y2,$x3,$y3);
        // tan alfa/2
        $tan_alfa_d_2 = round(tan(deg_rad($vect_angle/2)),2);


        // angles of triangle
        // angle of sides with ox and oy axises
        $angle_out = side_angle($x1,$y1,$x2,$y2);
        $angle_out_1 = side_angle($x1,$y1,$x3,$y3); 
        
        // tangens of angle of oy axis and bottom side.
        $tan_oy2 = round(tan(deg_rad($angle_out[1])),2);
        $tan_oy1 = round(tan(deg_rad($angle_out_1[1])),2);
        try {
            $ctan_oy1 = round(1/tan(deg_rad($angle_out_1[1])),2);
        } catch (DivisionByZeroError $e) {
            $ctan_oy1 = 1000;
        }



        // draw_text_n(300,0,50,2,'u=',$this->draw);

        $this->draw->setStrokeWidth(1);
        $font = 'Inter.ttf';
        $size = 12;
        $this->draw->setFontSize($size);
        $this->draw->setFont($font);
        $this->draw->annotation(10,140,"{$x1} {$y1} {$x2} {$y2}");
        $this->draw->annotation(10,200,"alfa = {$vect_angle} tan_alfa/2 {$tan_alfa_d_2}");
        $this->draw->annotation(10,220," ox2={$angle_out[0]} oy2={$angle_out[1]} tan_oy2 = {$tan_oy2} ");
        $this->draw->annotation(10,240," ox1={$angle_out_1[0]} oy1={$angle_out_1[1]} tan_oy1 = {$tan_oy1} ctan = {$ctan_oy1}");

        // ---------- bisectrix -------------------
        $bisectrix_ox = $vect_angle/2 + $angle_out[1];
        $bisectrix_oy = $vect_angle/2 + $angle_out[2];
        
        $tan_bisectrix_ox = round(tan(deg_rad($bisectrix_ox)),2);
        $tan_bisectrix_oy = round(tan(deg_rad($bisectrix_oy)),2);

        $this->draw->annotation(10,260," ox+bisectrix = {$bisectrix_ox} tan bisectrix_ox =  {$tan_bisectrix_ox} ");
        // ---------- bisectrix -------------------

        // ----------size of text----------------
        $bbox_a = imagettfbbox($size, 0, $font, "{$vect_angle}");
        $text_x = abs($bbox_a[2]);
        $text_y = abs($bbox_a[5]);
        $text_diagonal = round(sqrt($text_x**2+$text_y**2),2);
        // ----------size of text----------------

        // ---------------length----------------
        $l = round($text_diagonal/(2*$tan_alfa_d_2),2);
        // ---------------length----------------


        // Offset in x and y by bottom vector.
        $x_b = $l;
        $y_b=$x_b/$tan_bisectrix_ox;
        $this->draw->annotation(10,280," l={$l} tan_bisectrix_ox{$tan_bisectrix_ox}");

        // $this->draw->circle($x1+$x_b, $y1+$y_b, $x1+$x_b+1, $y1+$y_b+1);
        $this->draw->setStrokeColor('#000000');

        // special out
        $font = 'Inter.ttf';
        $size = 12;
        $this->draw->setFontSize($size);
        $this->draw->setFont($font);

        $this->draw->annotation(10,160, "x = {$text_x} y = {$text_y} diagonal = { $text_diagonal} l = {$l}");
        $this->draw->annotation(10,180, "dx = {$x_b} dy = {$y_b}");


        // Main difinition of text
        $this->draw->setTextAlignment(3);
        $coord_x = $x1+$x_b+$text_x/2;
        $coord_y = $y1+$y_b+$text_y/2;
        
        $this->draw->annotation($x1+$x_b+$text_x/2, $y1+$y_b+$text_y/2, "{$vect_angle}");
        $this->draw->setTextAlignment(1);
        $this->draw->annotation(10,300," x={$coord_x} y = {$coord_y}");



//      Кут між сторонами +
//      Бісектриса +
//      Проектція бісектриси на OX
//      Проектція бісектриси на OY
//      Спрямування сторін
//      Додавання зміщення, що задане верхньою стороною ()


        $image->drawImage($this->draw);
        header('Content-type: image/png');
        echo $image;
    }

}