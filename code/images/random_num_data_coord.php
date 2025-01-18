<?php
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);


$coords = [];
$items = 0;
$x = rand(40,550);
$y = rand(40,550);
$obj = (object) array('x' => $x,'y' => $y);
array_push($coords,$obj);

for ($i=0;$i<10;$i+=1){
do{
    $x = rand(40,550);
    $y = rand(40,550);
    $flag = 1;
    for ($k=0;$k<count($coords);$k+=1){   
        if ((($x<$coords[$k]->x+100)and($x>$coords[$k]->x-100)and($y<$coords[$k]->y)and($y>$coords[$k]->y-120))){
            $flag = 0;
            
            echo ($coords[$k]->x." ".$coords[$k]->y." ".$x." ".$y."<br>");
        } 
    }
}while ($flag =0);

// $draw->annotation($x,$y,"{$str}");
// $draw->circle($x,$y,$x+1,$y);
$obj = (object) array('x' => $x,'y' => $y);
array_push($coords,$obj);
}

print_r($coords);

?>