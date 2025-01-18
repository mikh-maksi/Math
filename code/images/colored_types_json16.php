<?php
function deg_rad($deg){
    return $deg*pi()/180;
}
 

if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}


$t = json_decode($t);
// print_r($t);

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
$draw->line(0,170,240,170);
$draw->line(0,410,240,410);

$draw->line(360,0,360,600);

$draw->line(360,150,600,150);
$draw->line(360,300,600,300);
$draw->line(360,450,600,450);


$font = 'Inter.ttf';
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




$col = 4;
for ($k=0;$k<16;$k+=1){
    $i=intdiv($k,$col);
    $j = $k%$col;
    
    $draw->setFillColor(get_color($type_color[$k]['c']));
    $draw = get_types($draw,$type_color[$k]['t'],30+60*$j,200+60*$i);
}

$k = 0;
for ($l=0;$l<16;$l+=1){
    $i=intdiv($k,$col);
    $j = $k%$col;
    if ($type_color[$l]['c'] == 0){
        $draw->setFillColor(get_color($type_color[$l]['c']));
        $draw = get_types($draw,$type_color[$l]['t'],390+60*$j,180+60*$i);
        $k +=1;
    }
}
$k = 0;
for ($l=0;$l<16;$l+=1){
    $i=intdiv($k,$col);
    $j = $k%$col;
    if ($type_color[$l]['c'] == 1){
        $draw->setFillColor(get_color($type_color[$l]['c']));
        $draw = get_types($draw,$type_color[$l]['t'],390+60*$j,330+60*$i);
        $k +=1;
    }
}
$k = 0;
for ($l=0;$l<16;$l+=1){
    $i=intdiv($k,$col);
    $j = $k%$col;
    if ($type_color[$l]['c'] == 2){
        $draw->setFillColor(get_color($type_color[$l]['c']));
        $draw = get_types($draw,$type_color[$l]['t'],390+60*$j,480+60*$i);
        $k +=1;
    }
}
$k = 0;
for ($l=0;$l<16;$l+=1){
    $i=intdiv($k,$col);
    $j = $k%$col;
    if ($type_color[$l]['c'] == 3){
        $draw->setFillColor(get_color($type_color[$l]['c']));
        $draw = get_types($draw,$type_color[$l]['t'],390+60*$j,30+60*$i);
        $k +=1;
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