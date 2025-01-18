<?php
function deg_rad($deg){
    return $deg*pi()/180;
}
 

if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}


$t = json_decode($t);
$right_number = $t[0];

$elements = [];
$n1 = rand(0,5);
do{
    $n2 = rand(0,5);
}while ($n1==$n2);
array_push($elements,$n1);
array_push($elements,$n2);

// $positions = [];
$type_color = [];
for ($i=0;$i<16;$i++){
    $color = rand(0,5);
    $type = rand(0,3);
    array_push($type_color,array("t"=>$type,"c"=>$color));
}

// array_push($positions,array("x"=>100,"y"=>100,"type"=>0));


// color, place

$image = new Imagick();
$image->newImage(600, 600, new ImagickPixel('white'));
$image->setImageFormat('png');

$draw = new ImagickDraw ();

$draw->line(240,0,240,600);
$draw->line(0,250,240,250);
$draw->line(0,350,240,350);

$draw->line(360,0,360,600);

$draw->line(360,150,600,150);
$draw->line(360,300,600,300);
$draw->line(360,450,600,450);


$font = '../../Inter.ttf';
$size = 48;

$draw->setFontSize($size);
$draw->setFont($font);

$draw->annotation( 360, 150-2,  'A');
$draw->annotation( 360, 300-2,  'B');
$draw->annotation( 360, 450-2,  'C');
$draw->annotation( 360, 600-2,  'D');
// imagefttext($back, 24, 0, 200, 300, $black, $font_file, 'B');
// imagefttext($back, 24, 0, 200, 450, $black, $font_file, 'C');
// imagefttext($back, 24, 0, 200, 600, $black, $font_file, 'D');

for ($i=0;$i<count($elements)*2;$i+=1){
$draw->setFillColor(get_color($elements[$i%2]));
$fig = new square($draw,30+50*$i,300);
$draw = $fig->out_print();
}
// $draw->setFillColor(get_color($t[1]));
// $fig = new square($draw,80,300);
// $draw = $fig->out_print();
// $draw->setFillColor(get_color($t[0]));
// $fig = new square($draw,130,300);
// $draw = $fig->out_print();
// $draw->setFillColor(get_color($t[1]));
// $fig = new square($draw,180,300);
// $draw = $fig->out_print();
$draw->setFillColor('rgb(0, 0, 0)');
$draw->annotation( 203, 325,  '...');

// $draw->annotation(100, 100,  (int)$t);

for ($j=0;$j<4;$j+=1){

    do{
        $wrong_elements = [];
        $n1 = rand(0,5);
        do{
            $n2 = rand(0,5);
        }while ($n1==$n2);
        array_push($wrong_elements,$n1);
        array_push($wrong_elements,$n2);
    }while (($wrong_elements[0]== $elements[0])and($wrong_elements[1]== $elements[1]));

for ($i=0;$i<count($elements);$i+=1){
    if ($j ==  $right_number){
        $draw->setFillColor(get_color($elements[$i%2]));
        $fig = new square($draw,420+50*$i,125+$j*150);
        $draw = $fig->out_print();
    }else{
        $draw->setFillColor(get_color($wrong_elements[$i%2]));
        $fig = new square($draw,420+50*$i,125+$j*150);
        $draw = $fig->out_print();
    }
}
}



function get_color($color){
    $out = '';
    if ($color == 0){
        $out = 'rgb(300, 32, 32)';
    }
    if ($color == 1){
        $out = 'rgb(300, 300, 32)';
    }
    if ($color == 2){
        $out = 'rgb(32, 300, 32)';
    }
    if ($color == 3){
        $out = 'rgb(32, 300, 300)';
    }
    if ($color == 4){
        $out = 'rgb(32, 32, 300)';
    }
    if ($color == 5){
        $out = 'rgb(300, 32, 300)';
    }
    return $out;
}


function get_types($draw,$type,$x,$y){
    if ($type == 0){
        $fig = new triangle($draw,$x,$y);
    }
    if ($type == 1){
        $fig = new circle($draw,$x,$y);
    }
    if ($type == 2){
        $fig = new square($draw,$x,$y);
    }
    if ($type == 3){
        $fig = new rectangle($draw,$x,$y);
    }

    $draw = $fig->out_print();
    return $draw;
}



$image->drawImage($draw);
header('Content-type: image/png');
echo $image;


class square{
    public $draw;
    function __construct($draw,$x,$y){
        $this->draw = $draw;
        $scale = 48;
        // $k = floor($n/2);
        // $this->draw->line(100,100,200,200);
        $points = [
            ['x' =>$x-$scale/2+2, 'y' => $y-$scale/2+2],
            ['x' => $x+$scale/2-2, 'y' => $y-$scale/2+2], 
            ['x' => $x+$scale/2-2, 'y' => $y+$scale/2-2], 
            ['x' => $x-$scale/2+2, 'y' => $y+$scale/2-2],
        ];
        $draw->polygon($points);
}
function out_print(){
    return $this->draw;
}

}

class rectangle{
    public $draw;
    function __construct($draw,$x,$y){
        $this->draw = $draw;
        $scale = 48;
        // $k = floor($n/2);
        // $this->draw->line(100,100,200,200);
        $points = [
            ['x' =>$x-$scale/2+2, 'y' => $y-$scale/3+2],
            ['x' => $x+$scale/2-2, 'y' => $y-$scale/3+2], 
            ['x' => $x+$scale/2-2, 'y' => $y+$scale/3-2], 
            ['x' => $x-$scale/2+2, 'y' => $y+$scale/3-2],
        ];
        $draw->polygon($points);
}
function out_print(){
    return $this->draw;
}

}


class circle{
    public $draw;
    function __construct($draw,$x,$y){
        $this->draw = $draw;
        $scale = 48;
        $this->draw->circle($x,$y,$x+$scale/2,$y);
}
function out_print(){
    return $this->draw;
}

}


class triangle{
    public $draw;
    function __construct($draw,$x,$y){
        $this->draw = $draw;
        $scale = 48;
        $points = [
            ['x' =>$x-$scale/2, 'y' =>$y+$scale/2],
            ['x' => $x+$scale/2, 'y' => $y+$scale/2], 
            ['x' => $x, 'y' => $y-$scale/2]
        ];
        $draw->polygon($points);
}
function out_print(){
    return $this->draw;
}

}



?>