<?php
header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);

$back = imagecreatefromjpeg ("images/canvas.jpg");
$ball     = imagecreatefrompng("images/ball.png");
$black = imagecolorallocate($back, 0, 0, 0);

$n_elem = $t[0];
$font_file = 'Inter.ttf';


function scattered_objects($n_elem){
    $n = 0;
    $arr = [];
    $x = rand(20,550);
    $y = rand(20,550);
    $flag = 0;
    $obj = (object) array('x' => $x,'y' => $y);
    array_push($arr,$obj);
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
                $obj = (object) array('x' => $x,'y' => $y);
                array_push($arr,$obj);
                $n +=1;
            }
    }while ($n<$n_elem-1);
    return $arr;
    }
    
    $arr = scattered_objects($n_elem);


for ($i = 0;$i<count($arr);$i+=1){
    imagecopyresampled($back,$ball,$arr[$i]->x, $arr[$i]->y, 0, 0, 50, 50, 64, 64);
}


imagepng($back);
imagedestroy($back);
?>