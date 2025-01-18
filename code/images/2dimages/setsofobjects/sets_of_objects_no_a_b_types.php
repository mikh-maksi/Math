<?php
header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);

$back = imagecreatefromjpeg ("../../images/canvas300_600.jpg");

require("../lib/objects.php");



$black = imagecolorallocate($back, 0, 0, 0);

$n_elem1 = $t[0][0]-1;
$n_elem2 = $t[0][1]-1;

$type1 = $t[1][0];
$type2 = $t[1][1];


$font_file = '../../Inter.ttf';

// imagefttext($back, 48, 0, 150-24, 300-1, $black, $font_file, 'A');
// imagefttext($back, 48, 0, 450-24, 300-1, $black, $font_file, 'B');

imageline($back,300,0,300,600, $black);
// imageline($back,0,250,600,250, $black);


function scattered_objects($n_elem,$x_from,$x_to,$y_from,$y_to){
    $n = 0;
    $arr = [];
    if ($n_elem >=0){
    $x = rand($x_from,$x_to);
    $y = rand($y_from,$y_to);
    $flag = 0;
    $obj = (object) array('x' => $x,'y' => $y);
    array_push($arr,$obj);
    if ($n_elem >0)
    do{
        $x = rand($x_from,$x_to);
        $y = rand($y_from,$y_to);
        $flag = 1;
        for ($i=0;$i<count($arr);$i+=1){   
            if ((($x<$arr[$i]->x+50)and($x>$arr[$i]->x-50)and($y<$arr[$i]->y+50)and($y>$arr[$i]->y-50))){
                $flag = 0;
            } 
        }
        if ($flag){
                $obj = (object) array('x' => $x,'y' => $y);
                array_push($arr,$obj);
                $n +=1;
            }
    }while ($n<$n_elem);
}
    return $arr;
    }
    
    $arr = scattered_objects($n_elem1,20,250,20,250);


for ($i = 0;$i<count($arr);$i+=1){
    imagecopyresampled($back,$objects[$type1],$arr[$i]->x, $arr[$i]->y, 0, 0, 50, 50, 64, 64);
}

$arr = scattered_objects($n_elem2,320,550,20,250);


for ($i = 0;$i<count($arr);$i+=1){
    imagecopyresampled($back,$objects[$type2],$arr[$i]->x, $arr[$i]->y, 0, 0, 50, 50, 64, 64);
}


imagepng($back);
imagedestroy($back);
?>