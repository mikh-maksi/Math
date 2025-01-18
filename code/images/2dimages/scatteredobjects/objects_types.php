<?php
header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($t);

$back = imagecreatefromjpeg ("../../images/canvas.jpg");

require("../lib/objects.php");


$black = imagecolorallocate($back, 0, 0, 0);

$n_elems = $t;
$font_file = '../../Inter.ttf';

// imagefttext($back, 48, 0, 50, 100, $black, $font_file, 'A');
function scattered_objects($n_elems){
    $n = 0;
    $arr = [];
    $obj = (object) array('x' => -100,'y' => -100,'type' => 0);
    array_push($arr,$obj);
    $all = 0;
    for($i=0;$i<count($n_elems);$i+=1){
        $all+=$n_elems[$i];
    }


    for($j=0;$j<count($n_elems);$j+=1){
        $n = 0;
        $n_elem=$n_elems[$j];

        if ($n_elem>0){
            $x = rand(20,550);
            $y = rand(20,550);
            $obj = (object) array('x' => $x,'y' => $y,'type' => $j);
            array_push($arr,$obj);
            $start = 1;
        }

        if ($n_elem>1){
        do{
            $x = rand(20,550);
            $y = rand(20,550);
            $flag = 1;
            for ($i=0;$i<count($arr);$i+=1){   
                if ((($x<$arr[$i]->x+50)and($x>$arr[$i]->x-50)and($y<$arr[$i]->y+50)and($y>$arr[$i]->y-50))){
                    $flag = 0;
                } 
            }
            if ($flag){
                    $obj = (object) array('x' => $x,'y' => $y,'type' =>$j);
                    array_push($arr,$obj);
                    $n +=1;
                }
        }while ($n<$n_elem-1);
        }
    }



    return $arr;
    }
    
    $arr = scattered_objects($n_elems);


for ($i = 0;$i<count($arr);$i+=1){
    $type = $arr[$i]->type;
    imagecopyresampled($back,$objects[$type],$arr[$i]->x, $arr[$i]->y, 0, 0, 50, 50, 64, 64);
    // imagecopyresampled($back,$ball,$arr[$i]->x, $arr[$i]->y, 0, 0, 50, 50, 64, 64);

}


imagepng($back);
imagedestroy($back);
?>