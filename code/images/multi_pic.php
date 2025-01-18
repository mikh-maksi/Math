<?php
function multi_angle(){
    $coords = [];
    $arr = [[1,1],[1,-1],[-1,-1],[-1,1]];
    $n = 0;
    $x = 10;
    $y = 50;
    $dx = 50;
    $dy = 50;
    $line = 160;
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

class Angle{
    public $draw_pic;
    function __construct($draw,$x1,$y1,$x2,$y2,$x3,$y3){
        $this->draw_pic = $draw;
        $this->draw_pic->line($x1,$y1,$x2,$y2);
        $this->draw_pic->line($x1,$y1,$x3,$y3);
    }
    function out_print(){
        return $this->draw_pic;
    }
}

$image = new Imagick();
$image->newImage(1200, 600, new ImagickPixel('white'));
$image->setImageFormat('png');

$draw = new ImagickDraw ();

$angle_arr = [];
array_push($angle_arr,new Angle($draw,10,50,100,100,100,10));
array_push($angle_arr,new Angle($draw,210,50,210,100,100,10));
// $d = new Angle($draw,10,50,100,100,100,10);

// $draw = $d->out_print();

$draw = $angle_arr[0]->out_print();
$draw = $angle_arr[1]->out_print();

// Angle($draw,10,10,100,100)->out_print();
// Angle($draw,100,100,10,10)->out_print();



$arr = multi_angle();

for ($i=0;$i<count(multi_angle());$i+=1){
    $x1 = $arr[$i][0];
    $y1 = $arr[$i][1];
    $x2 = $arr[$i][2];
    $y2 = $arr[$i][3];
    $x3 = $arr[$i][4];
    $y3 = $arr[$i][5];
    // $draw->circle($x1,$y1,$x1+1,$y1+1);
    // $draw->line($x1,$y1, $x2,$y2);
    // $draw->line($x1,$y1, $x3,$y3);
}


$image->drawImage($draw);

header('Content-type: image/png');
echo $image;

?>