<?php
header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);

$back = imagecreatefromjpeg ("../../images/canvas300_600.jpg");
$ball     = imagecreatefrompng("../../images/ball.png");
$orange     = imagecreatefrompng("../../images/orange.png");
$toy01     = imagecreatefrompng("../../images/toy01.png");
$toy02     = imagecreatefrompng("../../images/toy02.png");
$toy03     = imagecreatefrompng("../../images/toy03.png");
$toy04     = imagecreatefrompng("../../images/toy04.png");



$black = imagecolorallocate($back, 0, 0, 0);

$n_elem1 = $t[0]-1;
$n_elem2 = $t[0]-1;

$objects = [$toy01,$toy02,$toy03,$toy04,$ball];
// $objects = [$ball,$ball,$ball,$ball,$ball];
$num = count($objects);

$object_array = [];
for ($i=0;$i<=$n_elem1;$i+=1){
    $n = rand(0,$num-1);
    array_push($object_array,$n);
}



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

    function lined_objects($n_elem,$start_x,$start_y){
        $n = 0;
        $arr = [];
        // $start_x = 20;
        // $start_y = 50;
        for($i=0;$i<=$n_elem;$i+=1){
            $obj = (object) array('x' => $start_x+$i*32,'y' => $start_y);
            array_push($arr,$obj);
        }
        return $arr;
        }



    $arr = scattered_objects($n_elem1,10,250,10,250);


for ($i = 0;$i<count($arr);$i+=1){
    $n = $object_array[$i];
    imagecopyresampled($back,$objects[$n],$arr[$i]->x, $arr[$i]->y, 0, 0, 32, 32, 64, 64);
}

$arr = lined_objects($n_elem2,302,135);

for ($i = 0;$i<count($arr);$i+=1){
    $n = $object_array[$i];
    imagecopyresampled($back,$objects[$n],$arr[$i]->x, $arr[$i]->y, 0, 0, 32, 32, 64, 64);
}


imagepng($back);
imagedestroy($back);
?>