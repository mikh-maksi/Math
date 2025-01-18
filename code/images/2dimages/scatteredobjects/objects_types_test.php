<?php
// header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($t);


$n_elems = $t;

// imagefttext($back, 48, 0, 50, 100, $black, $font_file, 'A');
function scattered_objects($n_elems){
    $n = 0;
    $arr = [];
    
    for($j=0;$j<count($n_elems);$j++){
        $n_elem=$n_elems[$j];

        if ($n_elem>0){
            $x = rand(20,550);
            $y = rand(20,550);
            $flag = 0;
            $obj = (object) array('x' => $x,'y' => $y,'type' => $j);
            array_push($arr,$obj);
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

    print_r($arr);


?>