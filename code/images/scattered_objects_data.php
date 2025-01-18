<?php
$obj = (object) array('x' => 100,'y' => 100);

$arr = [];
array_push($arr,$obj);
array_push($arr,$obj);


print_r($arr);
$txt = json_encode($arr);
echo($txt);

for($i=0;$i<count($arr);$i+=1){
    echo $arr[$i]->x."<br>".$arr[$i]->x."<br>";

}


// foreach ($arr as $key => $value) {
//     echo "{$key} => {$value} ";
//     print_r($arr);
// }
$n = 0;
do{
    $n+=1;
    echo($n."<br>");
} while ($n<4);





// array_push($arr,$obj);
function scattered_objects(){
$n = 0;
$arr = [];
$x = rand(20,580);
$y = rand(20,580);
$flag = 0;
$obj = (object) array('x' => $x,'y' => $y);
array_push($arr,$obj);

do{
    $x = rand(20,580);
    $y = rand(20,580);
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
}while ($n<4);

return $arr;

}



$ar = scattered_objects();

print_r($ar);

echo($n."<br>");





// do{
//     $x = rand(20,580);
//     $y = rand(20,580);
//     $flag = 0;
//     $obj = (object) array('x' => $x,'y' => $y);
//     array_push($arr,$obj);

//     for ($i=0;$i<count($arr);$i+=1){   
//         echo ($arr[$i]->x." ".$arr[$i]->y."<br>");
//         // if (!(($x<$arr[$i]->x+50)and($x>$arr[$i]->x-50)and($y<$arr[$i]->y+50)and($y>$arr[$i]->y-50))){
//         //     $obj = (object) array('x' => $x,'y' => $y);
//         //     array_push($arr,$obj);
//         //     $n+=1;
//         // }
//     }

//     echo($n."<br>");
// } while ($n<4);


// print_r($arr);
?>