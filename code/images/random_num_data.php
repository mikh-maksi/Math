<?php
// echo(rand(0,11));

// $arr = [];

// for ($i=0;$i<4;$i+=1){
//     array_push($arr,rand(0,20));
// }



// do {
//     $n = rand(0,20);
// } while (in_array($n, $arr));
// echo($n);

function unic_arr($n){
    $arr = [];
    for ($i=0;$i<$n;$i+=1){
        do {
            $k = rand(0,20);
        } while (in_array($k, $arr));
        array_push($arr,$k);
    }
    return $arr;
}
function unic_arr_n($arr){
        do {
            $k = rand(0,20);
        } while (in_array($k, $arr));
     
    return $k;
}


$arr = unic_arr(10);
print_r($arr);
echo(unic_arr_n($arr));

echo (json_encode($arr));
?>