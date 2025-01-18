<?php

function radio(){
    $test = [];
    $right = [];
    $arr = [];
    $items = 0;
    $n_item = rand(1,25);
    $type = rand(0,3);
    array_push($right,$n_item);
    array_push($right,$type);
   
    $json_out =  json_encode($right);
   
    array_push($arr,$n_item);
    do{
        $n = rand(1,25);
        $flag = 1;
        for ($i=0;$i<count($arr);$i+=1){
            if ($arr[$i]==$n){$flag = 0;}
        }
        if ($flag){
            array_push($arr,$n); 
            $items+=1;
        }
    } while ($items<3);
    shuffle($arr);

    $right_n = -1;
    for ($i = 0;$i<count($arr);$i+=1){
        if ($arr[$i]==$n_item){$right_n = $i;}
    }


    $items = 0;
    $wrong = [];

    for ($i = 0;$i<count($arr);$i+=1){
        if ($i == $right_n){$status = true;} else {$status = false;}
        $obj = (object) array('value' => $arr[$i],'status' => $status);
        array_push( $test,$obj);
    }


    $out = (object) array('json_out' => $json_out,'radio' =>  $test);
    return $out;
}

function checkbox(){
    $test = [];
    $right = [];
    $arr = [];
    $items = 0;
    $n_item = rand(1,25);
    $type = rand(0,3);
    array_push($right,$n_item);
    array_push($right,$type);
   
    $json_out =  json_encode($right);
   
    array_push($arr,$n_item);
    do{
        $n = rand(1,25);
        $flag = 1;
        for ($i=0;$i<count($arr);$i+=1){
            if ($arr[$i]==$n){$flag = 0;}
        }
        if ($flag){
            array_push($arr,$n); 
            $items+=1;
        }
    } while ($items<3);
    shuffle($arr);

    $right_n = -1;
    for ($i = 0;$i<count($arr);$i+=1){
        if ($arr[$i]==$n_item){$right_n = $i;}
    }


    $items = 0;
    $wrong = [];

    for ($i = 0;$i<count($arr);$i+=1){
        if ($i != $right_n){$status = true;} else {$status = false;}
        $obj = (object) array('value' => $arr[$i],'status' => $status);
        array_push($test,$obj);
    }


    $out = (object) array('json_out' => $json_out,'chekbox' => $test);
    return $out;
}


echo("<br>---Radio----<br>");
$out = radio();

print_r($out);


echo("<br>---Checkbox----<br>");
$out = checkbox();

print_r($out);
?>