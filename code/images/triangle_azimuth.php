<?php
require("lib_azimuth.php");
require("lib_triangle.php");


$out_style = 0;
// Type 1. Coords
if (isset($_GET['x1'])){$x1 = $_GET['x1'];}else {$x1 = 50;}
if (isset($_GET['y1'])){$y1 = $_GET['y1'];}else {$y1 = 20;}
if (isset($_GET['x2'])){$x2 = $_GET['x2'];}else {$x2 = 320;}
if (isset($_GET['y2'])){$y2 = $_GET['y2'];}else {$y2 = 200;}
if (isset($_GET['x3'])){$x3 = $_GET['x3'];}else {$x3 = 120;}
if (isset($_GET['y3'])){$y3 = $_GET['y3'];}else {$y3 = 350;}

// $x2 = rand(10, 600);
// $y2 = rand(10, 600);
// $x3 = rand(10, 600);
// $y3 = rand(10, 600);

// Type 2. Sides
if (isset($_GET['l1'])){$l1 = $_GET['l1'];}else{$l1=-1;}
if (isset($_GET['l2'])){$l2 = $_GET['l2'];}else{$l2=-1;}
if (isset($_GET['l3'])){$l3 = $_GET['l3'];}else{$l3=-1;}


// Type 3. h&base
if (isset($_GET['h'])){$h = $_GET['h'];}else{$h=-1;}
if (isset($_GET['base'])){$base = $_GET['base'];}else{$base=-1;}

// Angles output
if (isset($_GET['angl'])){$angl = $_GET['angl'];}else{$angl=0;}
// Fixed angles - take values of angles from GET-requests
if (isset($_GET['fa'])){$fa = $_GET['fa'];}else{$fa=0;}
// Notext for sides
if (isset($_GET['nt'])){$nt = $_GET['nt'];}else{$nt=0;}


if (isset($_GET['rand'])){$rand = $_GET['rand'];}else{$rand=0;}


// Type 4. Angles
if (isset($_GET['alfa'])){$alfa = $_GET['alfa'];}else{$alfa=-1;}
if (isset($_GET['alfa'])){$beta = $_GET['beta'];}else{$beta=-1;}
if (isset($_GET['gamma'])){$gamma = $_GET['gamma'];}
else{ if ((isset($_GET['beta']))&&(isset($_GET['alfa']))){ $gamma=180-$alfa-$beta; }else{ $gamma=-1;  }}

if (isset($_GET['alfa']) && (!(isset($_GET['beta']))) && (!(isset($_GET['gamma'])))){
    $beta = rand(10, 180-$alfa-10);
    $gamma = 180 - $alfa - $beta;
}


if ($rand == 1){
$alfa = rand(10, 80);
$beta = rand(10, 80);
$gamma = 180 - $alfa - $beta;
}

// angle question
if (isset($_GET['aq'])){$aq = $_GET['aq'];}else{$aq=-1;}
if (isset($_GET['bq'])){$bq = $_GET['bq'];}else{$bq=-1;}
if (isset($_GET['cq'])){$cq = $_GET['cq'];}else{$cq=-1;}

// side question
if (isset($_GET['sqa'])){$sqa = $_GET['sqa'];}else{$sqa=-1;}
if (isset($_GET['sqb'])){$sqb = $_GET['sqb'];}else{$sqb=-1;}
if (isset($_GET['sqc'])){$sqc = $_GET['sqc'];}else{$sqc=-1;}


// Sides
if (isset($_GET['a'])){$side_a = $_GET['a'];}else{$side_a=-1;}
if (isset($_GET['b'])){$side_b = $_GET['b'];}else{$side_b=-1;}
if (isset($_GET['c'])){$side_c = $_GET['c'];}else{$side_c=-1;}

if (isset($_GET['g'])){$g = $_GET['g'];}else{$g=1;}

// Computing coords by angles
if (($alfa!=-1)&&($beta!=-1)&&($gamma!=-1)){
    $c = coords_by_angles($alfa,$beta,$gamma);
    $x1 = $c[0];    $y1 = $c[1];    $x2 = $c[2];  $y2 = $c[3];    $x3 = $c[4];    $y3 = $c[5];
}

// Computing coords by h&base
if (($h!=-1)&&($base!=-1)){
    $c = coords_by_h_base($h,$base);
    $x1 = $c[0];    $y1 = $c[1];    $x2 = $c[2];    $y2 = $c[3];    $x3 = $c[4];    $y3 = $c[5];
    $l3=$base;
}

if (($side_a!=-1)&&($side_b!=-1)&&($side_c!=-1)){
    $c = sides2coords($side_a,$side_b,$side_c,47);
    $x1 = $c[0];    $y1 = $c[1];    $x2 = $c[2];    $y2 = $c[3];    $x3 = $c[4];    $y3 = $c[5];
    $l1 = $side_c;    $l2 = $side_b;    $l3 = $side_a;
}


$image = new Imagick();
$image->newImage(640, 640, new ImagickPixel('white'));
$image->setImageFormat('png');

$draw = new ImagickDraw ();

$draw->setStrokeColor('#aaaaaa');
for ($i=0;$i<=64;$i+=1){
    $draw->line($i*10, 0, $i*10,640);
    $draw->line(0, $i*10, 640, $i*10);
}
$draw->setStrokeColor('#000000');


$coords = [$x1,$y1,$x2,$y2,$x3,$y3];
$ls = [$l1,$l2,$l3];
$angles = [$alfa,$beta,$gamma];
$sides = [$side_a,$side_b,$side_c];
$sq = [$sqa,$sqb,$sqc];
$params = [$angl,$out_style,$nt,$fa,$aq,$bq,$cq];
$t = new triangle($draw,$coords,$ls,$h,$params,$angles,$sq,$sides);

$draw = $t->out_print();

$image->drawImage($draw);
header('Content-type: image/png');
echo $image;


class triangle{
    public $coord;
    public $draw;
    public $length;

    function __construct($draw,$co,$ls,$h,$params,$angles,$sq,$sides){
        $this->coord = $co;
        $x1 = $co[0];    $y1 = $co[1];    $x2 = $co[2];    $y2 = $co[3];    $x3 = $co[4];    $y3 = $co[5];
        $l1 = $ls[0];   $l2 = $ls[1];   $l3 = $ls[2];   
        $alfa =$angles[0]; $beta = $angles[1]; $gamma = $angles[2];
        $side_a = $sides[0]; $side_b = $sides[1]; $side_c = $sides[2];
        $sqa = $sq[0]; $sqb = $sq[1]; $sqc = $sq[2];
        $angl = $params[0]; $out_style = $params[1]; $nt = $params[2]; $fa = $params[3]; $aq = $params[4];$bq = $params[5];$cq = $params[6];
        $this->draw = $draw; 
        $this->draw->setStrokeColor(new ImagickPixel('rgba(0, 0, 0, 1)'));

        // ------------ angles out --------------
        $coo = $this->coord;
        if ($angl==1){
            $font = 'Inter.ttf';
            $size = 12;
            $this->draw->setFontSize($size);
            $this->draw->setFont($font);
            $this->draw->setStrokeWidth(1);

            $coord = angle_azimuth_coord($coo[0],$coo[1], $coo[2],$coo[3],$coo[4],$coo[5]);    
            $x_a = $coord[0];  $y_a = $coord[1];  $vect_angle = vectors_angle($x1,$y1,$x2,$y2,$x3,$y3);
            if ($aq == 1) {$out_angle='?';} else {$out_angle = $vect_angle;}
            $this->draw->annotation($x_a, $y_a, "{$out_angle}");
    
            $coord = angle_azimuth_coord($coo[4],$coo[5], $coo[0],$coo[1], $coo[2],$coo[3]);    
            $x_a = $coord[0];   $y_a = $coord[1];   $vect_angle = vectors_angle($x3,$y3,$x1,$y1,$x2,$y2);
            if ($bq == 1) {$out_angle='?';} else {$out_angle = $vect_angle;}
            $this->draw->annotation($x_a, $y_a, "{$out_angle}");
    
            $coord = angle_azimuth_coord($coo[2],$coo[3],$coo[4],$coo[5], $coo[0],$coo[1], );    
            $x_a = $coord[0];  $y_a = $coord[1];  $vect_angle = vectors_angle($x2,$y2,$x3,$y3,$x1,$y1);
            if ($cq == 1) {$out_angle='?';} else {$out_angle = $vect_angle;}
            $this->draw->annotation($x_a, $y_a, "{$out_angle}");
        }
        // ------------ angles out --------------

        /*---------lines---------*/ 
        // drawing of bottom line
        $this->draw->setStrokeColor('#000000');
        $this->draw->line($coo[0],$coo[1], $coo[2],$coo[3]);
        // drawing of top line
        $this->draw->line($coo[0],$coo[1], $coo[4],$coo[5]);
        $this->draw->line( $coo[2],$coo[3], $coo[4],$coo[5]);
        /*---------lines---------*/ 

        $font = 'Inter.ttf';
        $size = 12;
        $this->draw->setFontSize($size);
        $this->draw->setFont($font);
        $this->draw->setStrokeWidth(1);

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
        $coo = $this->coord;
        $l = $this->length;

        $bbox_a = imagettfbbox($size, 0, $font, "{$l[0]}");
        $text_x = abs($bbox_a[2]);
        $text_y = abs($bbox_a[5]);

        if ($sqa == 1) {$l[0]='?';}
        if ($sqb == 1) {$l[1]='?';}
        if ($sqc == 1) {$l[2]='?';}

        if ($sqa == 2) {$l[0]=$side_a;}
        if ($sqb == 2) {$l[1]=$side_b;}
        if ($sqc == 2) {$l[2]=$side_c;}

        if (!(($sqa == 1) || ($sqa == 2))) {$l[0]=$sqa;}
        if (!(($sqa == 1) || ($sqa == 2))) {$l[1]=$sqb;}
        if (!(($sqa == 1) || ($sqa == 2))) {$l[2]=$sqc;}


        if ($nt == 1){
            $l[0]='';
            $l[1]='';
            $l[2]='';
        }
        if ($out_style == 1){
        if ($l[0]!=-1){$this->draw->annotation(($coo[2]+$coo[0])/2-$text_x,($coo[3]+$coo[1])/2, $l[0]);}
        if ($l[1]!=-1){$this->draw->annotation(($coo[4]+$coo[2])/2+$text_x/2,($coo[5]+$coo[3])/2, $l[1]);}
        if ($l[2]!=-1){$this->draw->annotation(($coo[0]+$coo[4])/2,($coo[1]+$coo[5])/2+$text_y, $l[2]);}
        } else{
        if ($l[0]!=-1){$this->draw->annotation(($coo[2]+$coo[0])/2-$text_x,($coo[3]+$coo[1])/2, $l[0]);}
        if ($l[1]!=-1){$this->draw->annotation(($coo[4]+$coo[2])/2-$text_x/2,($coo[5]+$coo[3])/2+$text_y, $l[1]);}
        if ($l[2]!=-1){$this->draw->annotation(($coo[0]+$coo[4])/2,($coo[1]+$coo[5])/2, $l[2]);}
        }

        if (($h!=-1)&&($base!=-1)){
            $bbox_a = imagettfbbox($size, 0, $font, "{$h}");
            $text_x = abs($bbox_a[2]);
            $text_y = abs($bbox_a[5]);
            $this->draw->setStrokeColor('#aa00aa');
            $this->draw->line($coo[2],$coo[3], ($coo[0]+$coo[4])/2,$coo[1]);
            $this->draw->setStrokeColor('#000000');
            $this->draw->annotation($coo[2]+2,($coo[3]+$coo[1])/2, $h);
        }
    }

    function calc_side_length(){
        $c = $this->coord;
        $l1 = round(sqrt(($coo[0]-$coo[2])**2+($coo[1]-$coo[3])**2));
        $l2 = round(sqrt(($coo[2]-$coo[4])**2+($coo[3]-$coo[5])**2));
        $l3 = round(sqrt(($coo[4]-$coo[0])**2+($coo[5]-$coo[1])**2));
        $side_length = [$l1,$l2,$l3];
        return $side_length; 

    }
    function out_print(){
        return $this->draw;
    }
}