<?php
function deg_rad($deg){
    return $deg*pi()/180;
}
 
// add outline for all shapes.
// take outline as graph-block.


if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[0,16]';}

$t = json_decode($t);
// print_r($t);

$number = $t[1];
$right_n = $t[0];


// $positions = [];
$type_color = [];
for ($i=0;$i<$number;$i++){
    $color = rand(0,5);
    $type = rand(0,3);
    array_push($type_color,array("t"=>$type,"c"=>$color));
}
$data = [0,0,0,0];
for ($i=0;$i<count($type_color);$i+=1){
    $type = $type_color[$i]["t"];
    $data[$type]+=1;
}
$data_wrong = [0,0,0,0];
$datas = [];
for ($k=0;$k<4;$k+=1){
    for ($i=0;$i<4;$i+=1){
        $data_wrong[$i]=rand(0,4);
    }
    array_push($datas,$data_wrong);
}

$datas[$right_n]=$data;


// color, place
$image = new Imagick();
$image->newImage(600, 600, new ImagickPixel('white'));
$image->setImageFormat('png');

$draw = new ImagickDraw ();

$draw->line(240,0,240,600);
$draw->line(0,150,240,150);
$draw->line(0,450,240,450);

$draw->line(360,0,360,600);

$draw->line(360,150,600,150);
$draw->line(360,300,600,300);
$draw->line(360,450,600,450);


$font = '../../Inter.ttf';
$size = 48;

$draw->setFontSize($size);
$draw->setFont($font);

$draw->annotation( 320, 150-2,  'A');
$draw->annotation( 320, 300-2,  'B');
$draw->annotation( 320, 450-2,  'C');
$draw->annotation( 320, 600-2,  'D');

$draw->setFillColor(get_color(0));

// $data = [1,3,5,4];

// for ($i = 0; $i<4;$i+=1){
//      //390+60*$j,180+60*$i
// }


// $data = $datas[$right_n];

$array_y_start = [150,300,450,600];


for($level=0;$level<4;$level+=1){
$data = $datas[$level];
for ($i=0;$i<count($data);$i+=1){
    graph($draw,0,$i,$data[$i],$level);
    $draw = get_type_outline($draw,$i,390+60*$i,30+$array_y_start[$level]-150);
}
}
// graph
function graph ($draw, $l,$n,$value,$level){
    global $array_y_start;
    $x_start = 370;
    $y_start = $array_y_start[$level];
    $width = 40;
    $x_position = 60;
    $y_step = 10;
    $points = [
        ['x' => $x_start +  $x_position*$n, 'y' => $y_start],
        ['x' => $x_start + $width+$x_position*$n, 'y' => $y_start ], 
        ['x' => $x_start + $width+$x_position*$n, 'y' => $y_start - $y_step*$value], 
        ['x' => $x_start + $x_position*$n, 'y' => $y_start- $y_step*$value]
    ];

    $draw->polygon($points);
    for($i=0;$i<=$value;$i+=1){
    $draw->setFillColor('rgb(0, 0, 0)');
    $draw->line($x_start +  $x_position*$n,$y_start - $y_step*$i,$x_start + $width+$x_position*$n,$y_start - $y_step*$i);
    }
    $draw->setFillColor('rgb(300, 32, 32)');
}


// base
$col = 4;
for ($k=0;$k<$number;$k+=1){
    $i=intdiv($k,$col);
    $j = $k%$col;
    $draw->setFillColor(get_color($type_color[$k]['c']));
    $draw = get_types($draw,$type_color[$k]['t'],30+60*$j,200+60*$i);
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

function get_type_outline($draw,$type,$x,$y){
    if ($type == 0){
        $fig = new triangle_outline($draw,$x,$y);
    }
    if ($type == 1){
        $fig = new circle_outline($draw,$x,$y);
    }
    if ($type == 2){
        $fig = new square_outline($draw,$x,$y);
    }
    if ($type == 3){
        $fig = new rectangle_outline($draw,$x,$y);
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
        $draw->setFillColor('rgb(0, 0, 0)');
        $draw->line($points[0]['x'],$points[0]['y'],$points[1]['x'],$points[1]['y']);
        $draw->line($points[1]['x'],$points[1]['y'],$points[2]['x'],$points[2]['y']);
        $draw->line($points[2]['x'],$points[2]['y'],$points[3]['x'],$points[3]['y']);
        $draw->line($points[3]['x'],$points[3]['y'],$points[0]['x'],$points[0]['y']);
        $draw->setFillColor('rgb(255, 32, 32)');
}

function out_print(){
    return $this->draw;
}

}


class square_outline{
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

        $draw->setFillColor('rgb(0, 0, 0)');
        $draw->line($points[0]['x'],$points[0]['y'],$points[1]['x'],$points[1]['y']);
        $draw->line($points[1]['x'],$points[1]['y'],$points[2]['x'],$points[2]['y']);
        $draw->line($points[2]['x'],$points[2]['y'],$points[3]['x'],$points[3]['y']);
        $draw->line($points[3]['x'],$points[3]['y'],$points[0]['x'],$points[0]['y']);
        $draw->setFillColor('rgb(255, 32, 32)');
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
        $draw->setFillColor('rgb(0, 0, 0)');
        $draw->line($points[0]['x'],$points[0]['y'],$points[1]['x'],$points[1]['y']);
        $draw->line($points[1]['x'],$points[1]['y'],$points[2]['x'],$points[2]['y']);
        $draw->line($points[2]['x'],$points[2]['y'],$points[3]['x'],$points[3]['y']);
        $draw->line($points[3]['x'],$points[3]['y'],$points[0]['x'],$points[0]['y']);
        $draw->setFillColor('rgb(300, 32, 32)');
}
function out_print(){
    return $this->draw;
}

}



class rectangle_outline{
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
        $draw->setFillColor('rgb(0, 0, 0)');
        $draw->line($points[0]['x'],$points[0]['y'],$points[1]['x'],$points[1]['y']);
        $draw->line($points[1]['x'],$points[1]['y'],$points[2]['x'],$points[2]['y']);
        $draw->line($points[2]['x'],$points[2]['y'],$points[3]['x'],$points[3]['y']);
        $draw->line($points[3]['x'],$points[3]['y'],$points[0]['x'],$points[0]['y']);
        $draw->setFillColor('rgb(300, 32, 32)');

        // $draw->polygon($points);
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
        $color = $this->draw->getFillColor();
        $draw->setFillColor('rgb(0, 0, 0)');
        $this->draw->circle($x,$y,$x+$scale/2,$y);
        $this->draw->setFillColor($color);
        $this->draw->circle($x,$y,$x+$scale/2-1,$y);
}
function out_print(){
    return $this->draw;
}

}


class circle_outline{
    public $draw;
    function __construct($draw,$x,$y){
        $this->draw = $draw;
        $scale = 48;
        $draw->setFillColor('rgb(0, 0, 0)');
        $this->draw->circle($x,$y,$x+$scale/2,$y);
        $draw->setFillColor('rgb(255, 255, 255)');
        $this->draw->circle($x,$y,$x+$scale/2-1,$y);
        $draw->setFillColor('rgb(255, 32, 32)');

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
        $draw->setFillColor('rgb(0, 0, 0)');
        $draw->line($points[0]['x'],$points[0]['y'],$points[1]['x'],$points[1]['y']);
        $draw->line($points[1]['x'],$points[1]['y'],$points[2]['x'],$points[2]['y']);
        $draw->line($points[2]['x'],$points[2]['y'],$points[0]['x'],$points[0]['y']);
        $draw->setFillColor('rgb(255, 32, 32)');
}
function out_print(){
    return $this->draw;
}

}
class triangle_outline{
    public $draw;
    function __construct($draw,$x,$y){
        $this->draw = $draw;
        $scale = 48;
        $points = [
            ['x' =>$x-$scale/2, 'y' =>$y+$scale/2],
            ['x' => $x+$scale/2, 'y' => $y+$scale/2], 
            ['x' => $x, 'y' => $y-$scale/2]
        ];
        
        $draw->setFillColor('rgb(0, 0, 0)');
        $draw->line($points[0]['x'],$points[0]['y'],$points[1]['x'],$points[1]['y']);
        $draw->line($points[1]['x'],$points[1]['y'],$points[2]['x'],$points[2]['y']);
        $draw->line($points[2]['x'],$points[2]['y'],$points[0]['x'],$points[0]['y']);
        $draw->setFillColor('rgb(255, 32, 32)');

        // $draw->polygon($points);
}
function out_print(){
    return $this->draw;
}

}


?>