<?php
function deg_rad($deg){
    return $deg*pi()/180;
}

function t_cos($a,$b,$c){
    $cos_a = ($b**2+$c**2-$a**2)/(2*$b*$c);
    $alfa = rad2deg((acos(($cos_a))));
    return $alfa;
}

function sides2coords_base($a,$b,$c,$scale){

    $alfa = t_cos($a,$b,$c);
    $beta = t_cos($b,$c,$a);
    $gamma = t_cos($c,$a,$b);
    
    $A = $a * $scale;
    $B = $b * $scale;
    $C = $c * $scale;

    $x1 = 160-$A/2;
    $y1 = 150;

    $dx = $B * cos(deg2rad($gamma));
    $dy = $B * sin(deg2rad($gamma));
    
    $x2 = $x1 + $dx;
    $y2 = $y1 - $dy;
    
    $x3 = $x1 + $A;
    $y3 = $y1;
    
    return [$x1,$y1,$x2,$y2,$x3,$y3];
}

// $c = sides2coords($side_a,$side_b,$side_c,47);

$t = json_decode($_GET['t']);

// print_r($t);
// echo(count($t));

$image = new Imagick();
$image->newImage(640, 640, new ImagickPixel('white'));
$image->setImageFormat('png');

$draw = new ImagickDraw ();


// $draw->setStrokeColor('#aaaaaa');
// $draw->line(320, 0, 320,640);
// $draw->line(0, 320, 640, 320);
// $draw->circle(160, 160, 160+1, 160);
// $draw->circle(480, 160, 480+1, 160);
// $draw->circle(480, 480, 480+1, 480);
// $draw->circle(160, 480, 160+1, 480);
$draw->setStrokeColor('#000000');

$coord = [100,100];


if (count($t) == 1){
    $coord = [320,320];
    $scale = 40;
    $i = 0;
    if ($t[$i]->type=="circle"){    $shape = new Circle($draw,$coord,$scale,$t[$i]->params->radius);}
    if ($t[$i]->type=="rectangle"){ $shape = new Rectangle($draw,$coord,$scale,$t[$i]->params->side_a,$t[$i]->params->side_b);}
    if ($t[$i]->type=="square"){    $shape = new Square($draw,$coord,$scale,$t[$i]->params->side);    }
    if ($t[$i]->type=="triangle"){  $shape = new Triangle($draw,$coord,$scale,$t[$i]->params->side_a,$t[$i]->params->side_b,$t[$i]->params->side_c);   }
    $draw = $shape->out_print();
}

if ((count($t)>1)and(count($t)<=4)){
    $scale = 10;
for($i=0;$i<count($t);$i+=1){
    $j = intdiv($i,2);        $k = $i%2;        $coord = [160+320*$k,160+320*$j];
    if ($t[$i]->type=="circle"){    $shape = new Circle($draw,$coord,$scale,$t[$i]->params->radius);}
    if ($t[$i]->type=="rectangle"){ $shape = new Rectangle($draw,$coord,$scale,$t[$i]->params->side_a,$t[$i]->params->side_b);}
    if ($t[$i]->type=="square"){    $shape = new Square($draw,$coord,$scale,$t[$i]->params->side);    }
    if ($t[$i]->type=="triangle"){  $shape = new Triangle($draw,$coord,$scale,$t[$i]->params->side_a,$t[$i]->params->side_b,$t[$i]->params->side_c);   }
    
    $draw = $shape->out_print();
}
}


if ((count($t)>4)and(count($t)<=6)){
    $scale = 7;
for($i=0;$i<count($t);$i+=1){
    $j = intdiv($i,2);        $k = $i%2;        $coord = [160+320*$k,105+210*$j];
    if ($t[$i]->type=="circle"){    $shape = new Circle($draw,$coord,$scale,$t[$i]->params->radius);}
    if ($t[$i]->type=="rectangle"){ $shape = new Rectangle($draw,$coord,$scale,$t[$i]->params->side_a,$t[$i]->params->side_b);}
    if ($t[$i]->type=="square"){    $shape = new Square($draw,$coord,$scale,$t[$i]->params->side);    }
    if ($t[$i]->type=="triangle"){  $shape = new Triangle($draw,$coord,$scale,$t[$i]->params->side_a,$t[$i]->params->side_b,$t[$i]->params->side_c);   }
    
    $draw = $shape->out_print();
}
}



$image->drawImage($draw);
header('Content-type: image/png');
echo $image;

class Circle{
    public $draw;
    function __construct($draw,$start_coord,$scale,$radius){
        $draw->setFillColor('#FFFFFF');
        $draw->setStrokeColor('#000000');
        $this->draw = $draw;        
        $start_x = $start_coord[0];        $start_y = $start_coord[1];

        $font = 'Inter.ttf';        $size = 12;        $this->draw->setFontSize($size);        $this->draw->setFont($font);        $this->draw->setStrokeWidth(1);
        $r = $radius * $scale;
        $this->draw->circle($start_x,$start_y,$start_x+$r,$start_y);

    }
        function out_print(){            return $this->draw;  }
}


class Square{
    public $draw;
    function __construct($draw,$start_coord,$scale,$side){
        $this->draw = $draw;        $start_x = $start_coord[0];        $start_y = $start_coord[1];
        $font = 'Inter.ttf';        $size = 12;        $this->draw->setFontSize($size);        $this->draw->setFont($font);        $this->draw->setStrokeWidth(1);
        
        $x1 = $start_x-$side*$scale/2;
        $y1 = $start_y-$side*$scale/2;
        $x2 = $start_x+$side*$scale-$side*$scale/2;
        $y2 = $start_y+$side*$scale-$side*$scale/2;

        $this->draw->line($x1,$y1,   $x2,$y1);
        $this->draw->line($x2,$y1,   $x2,$y2);
        $this->draw->line($x2,$y2,   $x1,$y2);
        $this->draw->line($x1,$y2,   $x1,$y1);

    }
        function out_print(){            return $this->draw;  }
}
class Rectangle{
    public $draw;
    function __construct($draw,$start_coord,$scale,$side_a,$side_b){
        $this->draw = $draw;        $start_x = $start_coord[0];        $start_y = $start_coord[1];
        $font = 'Inter.ttf';        $size = 12*$scale;        $this->draw->setFontSize($size);        $this->draw->setFont($font);        $this->draw->setStrokeWidth(1);

        $x1 = $start_x-$side_a*$scale/2;
        $y1 = $start_y-$side_b*$scale/2;
        $x2 = $start_x+$side_a*$scale/2;
        $y2 = $start_y+$side_b*$scale/2;

        $this->draw->line($x1,$y1,   $x2,$y1);
        $this->draw->line($x2,$y1,   $x2,$y2);
        $this->draw->line($x2,$y2,   $x1,$y2);
        $this->draw->line($x1,$y2,   $x1,$y1);

    }
        function out_print(){            return $this->draw;  }
}
class Triangle{
    public $draw;
    function __construct($draw,$start_coord,$scale,$side_a,$side_b,$side_c){
        $this->draw = $draw;        $start_x = $start_coord[0];        $start_y = $start_coord[1];
        $font = 'Inter.ttf';        $size = 12;        $this->draw->setFontSize($size);        $this->draw->setFont($font);        $this->draw->setStrokeWidth(1);


        $c = sides2coords_base($side_a,$side_b,$side_c,3*$scale);
        $x1 = $start_x+$c[0];
        $y1 = $start_y+$c[1];
        $x2 = $start_x+$c[2];
        $y2 = $start_y+$c[3];
        $x3 = $start_x+$c[4];
        $y3 = $start_y+$c[5];
        
        // arrounded circle
        $d = 2*($x1*($y2-$y3)+$x2*($y3-$y1)+$x3*($y1-$y2));
        $center_x = (($x1*$x1+$y1*$y1)*($y2-$y3)+($x2*$x2+$y2*$y2)*($y3-$y1)+($x3*$x3+$y3*$y3)*($y1-$y2))/$d;
        $center_y = (($x1*$x1+$y1*$y1)*($x3-$x2)+($x2*$x2+$y2*$y2)*($x1-$x3)+($x3*$x3+$y3*$y3)*($x2-$x1))/$d;

        $xa2 = $x2-$x1;
        $ya2 = $y2-$y1;
        $xa3 = $x3-$x1;
        $ya3 = $y3-$y1;


        $da = 2*($xa2*$ya3-$xa3*$ya2);
        $center_xa =  ($ya3*($xa2*$xa2+$ya2*$ya2) - $ya2*($xa3*$xa3+$ya3*$ya3))/$da;
        $center_ya =  ($xa2*($xa3*$xa3+$ya3*$ya3) - $xa3*($xa2*$xa2+$ya2*$ya2))/$da;

        $center_xm = ($x1+$x2+$x3)/3;
        $center_ym = ($y1+$y2+$y3)/3;
        
        // $this->draw->circle($center_xm,$center_ym,$center_xm+3,$center_ym);

        $dx = -$center_xm+$start_coord[0];
        $dy = -$center_ym+$start_coord[1];
        
        $this->draw->line($x1+$dx,$y1+$dy,$x2+$dx,$y2+$dy);
        $this->draw->line($x1+$dx,$y1+$dy,$x3+$dx,$y3+$dy);
        $this->draw->line($x2+$dx,$y2+$dy,$x3+$dx,$y3+$dy);

    }
        function out_print(){            return $this->draw;  }
}






?>