<?php

if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[0,16]';}

$t = json_decode($t);
// print_r($t);

$number = $t[1];
$right_n = $t[0];


// $positions = [];
$type_color = [];
for ($i=0;$i<$number;$i++){
    $color = rand(0,5);
    $type = rand(0,3);
    array_push($type_color,array("t"=>$type,"c"=>$color));
}


$data = [0,0,0,0];
for ($i=0;$i<count($type_color);$i+=1){
    $type = $type_color[$i]["t"];
    $data[$type]+=1;
}

$data_wrong = [0,0,0,0];
$datas = [];
for ($k=0;$k<4;$k+=1){
    $data_wrong = [0,0,0,0];
    for ($i=0;$i<4;$i+=1){
        $data_wrong[$i]=rand(0,4);
    }
    array_push($datas,$data_wrong);
}
$datas[$right_n]=$data;

$datas[$right_n]=$data;

print_r($datas);

?>