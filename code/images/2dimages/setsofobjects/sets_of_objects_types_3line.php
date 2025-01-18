<?php
header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);

$back = imagecreatefromjpeg ("../../images/canvas.jpg");

require("../lib/objects.php");

$black = imagecolorallocate($back, 0, 0, 0);

$n_elem1 = $t[0][0]-1;
$n_elem2 = $t[0][1]-1;

$n_elem3 = $t[0][2]-1;
$n_elem4 = $t[0][3]-1;

$n_elem5 = $t[0][4]-1;
$n_elem6 = $t[0][5]-1;

$type1 = $t[1][0];
$type2 = $t[1][1];

$type3 = $t[1][2];
$type4 = $t[1][3];

$type5 = $t[1][4];
$type6 = $t[1][5];



$font_file = '../../Inter.ttf';

// imagefttext($back, 48, 0, 150-24, 300-1, $black, $font_file, 'A');
// imagefttext($back, 48, 0, 450-24, 300-1, $black, $font_file, 'B');

imageline($back,300,0,300,600, $black);
imageline($back,0,200,600,200, $black);
imageline($back,0,400,600,400, $black);


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
    
// 0,1
$arr = scattered_objects($n_elem1,20,250,20,150);
for ($i = 0;$i<count($arr);$i+=1){
    imagecopyresampled($back,$objects[$type1],$arr[$i]->x, $arr[$i]->y, 0, 0, 50, 50, 64, 64);
}

$arr = scattered_objects($n_elem2,320,550,0,150);
for ($i = 0;$i<count($arr);$i+=1){
    imagecopyresampled($back,$objects[$type2],$arr[$i]->x, $arr[$i]->y, 0, 0, 50, 50, 64, 64);
}

// 2,3
$arr = scattered_objects($n_elem3,20,250,200,350);
for ($i = 0;$i<count($arr);$i+=1){
    imagecopyresampled($back,$objects[$type3],$arr[$i]->x, $arr[$i]->y, 0, 0, 50, 50, 64, 64);
}

$arr = scattered_objects($n_elem4,320,550,200,350);
for ($i = 0;$i<count($arr);$i+=1){
    imagecopyresampled($back,$objects[$type4],$arr[$i]->x, $arr[$i]->y, 0, 0, 50, 50, 64, 64);
}
// 4,5
$arr = scattered_objects($n_elem5,20,250,400,550);
for ($i = 0;$i<count($arr);$i+=1){
    imagecopyresampled($back,$objects[$type5],$arr[$i]->x, $arr[$i]->y, 0, 0, 50, 50, 64, 64);
}

$arr = scattered_objects($n_elem6,320,550,400,550);
for ($i = 0;$i<count($arr);$i+=1){
    imagecopyresampled($back,$objects[$type6],$arr[$i]->x, $arr[$i]->y, 0, 0, 50, 50, 64, 64);
}




imagepng($back);
imagedestroy($back);
?>