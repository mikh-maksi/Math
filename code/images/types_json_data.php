<?php

if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($t);


$arr = unic_arr_l(4);
print_r($arr);

function unic_arr_l($n){
    $arr = [];
    for ($i=0;$i<$n;$i+=1){
        do {
            $k = rand(1,4);
        if ($k == 1) {$l = "r";}
        if ($k == 2) {$l = "c";}
        if ($k == 3) {$l = "t";}
        if ($k == 4) {$l = "s";}

        } while (in_array($l, $arr));
        array_push($arr,$l);
    }

   
    return $arr;
}


?>