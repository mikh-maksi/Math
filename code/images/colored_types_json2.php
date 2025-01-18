<?php
function deg_rad($deg){
    return $deg*pi()/180;
}
 

if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='0';}


$t = json_decode($t);
// print_r($t);

$n_types = 3;
$n_elements = 5;
$col = 5;
$col_options = 4;
$wrong_n = $t;
// $positions = [];
$type_color = [];
for ($i=0;$i<$n_elements;$i++){
    $color = rand(3,4);
    $type = rand(0,$n_types-1);
    array_push($type_color,array("t"=>$type,"c"=>$color));
}

// array_push($positions,array("x"=>100,"y"=>100,"type"=>0));


// color, place

$image = new Imagick();
$image->newImage(600, 600, new ImagickPixel('white'));
$image->setImageFormat('png');

$draw = new ImagickDraw ();

$draw->line(300,0,300,600);
$draw->line(0,270,300,270);
$draw->line(0,330,300,330);

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





for ($k=0;$k<$n_elements;$k+=1){
    $i=intdiv($k,$col);
    $j = $k%$col;
    
    $draw->setFillColor(get_color($type_color[$k]['c']));
    $draw = get_types($draw,$type_color[$k]['t'],30+60*$j,300+60*$i);
}


$groups = [];



function get_real_groups2 ($type_color){

    $types = [];
    $colors = [];
    // type and color.
    $existing_variants = [];
    for ($i=0;$i<count($type_color);$i+=1){
        array_push($types,$type_color[$i]['t']);
        array_push($colors,$type_color[$i]['c']);
        $flag = 0;
        for($j=0;$j<count($existing_variants);$j+=1){
            if (($existing_variants[$j]['t']==$type_color[$i]['t'])and($existing_variants[$j]['c']==$type_color[$i]['c'])){
                $existing_variants[$j]['n']+=1;
                $flag = 1;
            }
        }
        if ($flag == 0){
            $arr['t'] = $type_color[$i]['t'];
            $arr['c'] = $type_color[$i]['c'];
            $arr['n'] = 1;
            array_push($existing_variants,$arr);
        }
        
    }
    

    $types_count = array_count_values($types);
    $colors_count = array_count_values($colors);
    
    $positions = [];
    foreach ($types_count as $key => $value){
        $elem = array('t' =>$key,'c' =>-1,'n'=>$value);
        if ($value>0){
            array_push($positions,$elem);
        }
    }
    foreach ($colors_count as $key => $value){
        $elem = array('c' =>$key,'t' =>-1,'n'=>$value);
        if ($value>0){
            array_push($positions,$elem);
        }
    }

    $combinations = $existing_variants;
    for ($i=0;$i<count($positions);$i+=1){
        $flag = 0;
        for($j=0;$j<count($existing_variants);$j+=1){
            if ((($positions[$i]['t']==$existing_variants[$j]['t'])or($positions[$i]['c']==$existing_variants[$j]['c']))and($positions[$i]['n']==$existing_variants[$j]['n'])){
                $flag = 1;
            }
        }
        if ($flag){
            continue;
        }
        array_push($combinations,$positions[$i]);
    }
    
    usort($combinations, 'cmp');
    
    return $combinations;
    }

function cmp($a, $b) {
    if ($a["n"] == $b["n"]) {
        return 0;
    }
    return ($a["n"] < $b["n"]) ? 1 : -1;
}

$m = 0;

$positions = get_real_groups2 ($type_color);

$combinations = [];

for ($m=0;$m<4;$m+=1){
$k = 0;
if ($m==$wrong_n){continue;}
for ($l=0;$l<$n_elements;$l+=1){
    $i=intdiv($k,$col_options);
    $j = $k%$col_options;
    $value = $positions[$m];
    // $type = $value["group"];
    if ($value['c']==-1){
        if ($type_color[$l]['t'] == $value['t']){
            $draw->setFillColor(get_color($type_color[$l]['c']));
            $draw = get_types($draw,$type_color[$l]['t'],390+60*$j,30+150*$m+55*$i);
            $k +=1;
        }
    }
    if ($value['t']==-1){
        if ($type_color[$l]['c'] == $value['c']){
            $draw->setFillColor(get_color($type_color[$l]['c']));
            $draw = get_types($draw,$type_color[$l]['t'],390+60*$j,30+150*$m+55*$i);
            $k +=1;
        }
    }
    if (($value['t']!=-1)and($value['c']!=-1)){
        if (($type_color[$l]['c'] == $value['c'])and($type_color[$l]['t'] == $value['t'])){
            $draw->setFillColor(get_color($type_color[$l]['c']));
            $draw = get_types($draw,$type_color[$l]['t'],390+60*$j,30+150*$m+55*$i);
            $k +=1;
        }
    }
    
}
}

$n = rand(4,4);
$wrong_combination = [];
for($i=0;$i<$n;$i+=1){
    $t = rand(0,1);
    $c = rand(3,4);
    $arr = array("t"=>$t,"c"=>$c);
    array_push($wrong_combination,$arr);
}
$m = $wrong_n;


$k = 0;
for ($l=0;$l<count($wrong_combination);$l+=1){
    $i=intdiv($l,$col_options);
    $j = $l%$col_options;
    $value = $positions[$m];
    $draw->setFillColor(get_color($wrong_combination[$l]['c']));
    $draw = get_types($draw,$wrong_combination[$l]['t'],390+60*$j,30+150*$m+55*$i);
    $k +=1;
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