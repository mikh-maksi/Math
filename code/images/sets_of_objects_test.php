<?php

function radio(){
    $test = [];

    $compare = ["A same B","A more B","A fewer B"];
    $n_items = [];

    $items = 0;
    $a= rand(0,5);
    array_push($n_items,$a);
    $b = rand(0,5);
    array_push($n_items,$b);

    $json_out =  json_encode($n_items);
   
    if ($a == $b){$status = true;} else {$status = false;}
    $obj = array('value' => $compare[0],'status' => $status);
    array_push( $test,$obj);

    if ($a > $b){$status = true;} else {$status = false;}
    $obj = array('value' => $compare[1],'status' => $status);
    array_push( $test,$obj);

    if ($a < $b){$status = true;} else {$status = false;}
    $obj = array('value' => $compare[2],'status' => $status);
    array_push( $test,$obj);

    $out =  array('json_out' => $json_out,'radio' =>  $test);
    return $out;
}

function checkbox(){
    $test = [];

    $compare = ["A same B","A more B","A fewer B", "B more A", "B fewer A"];

    $n_items = [];
    
    $items = 0;
    $a= rand(0,5);
    array_push($n_items,$a);
    $b = rand(0,5);
    array_push($n_items,$b);

    $json_out =  json_encode($n_items);
    $n = rand(0,1);

    if ($a == $b){$status = true;} else {$status = false;}
    $obj = array('value' => $compare[0],'status' => $status);
    array_push( $test,$obj);

    if ($a > $b){$status = true;} else {$status = false;}
    $obj = array('value' => $compare[1],'status' => $status);
    array_push( $test,$obj);

    if ($a < $b){$status = true;} else {$status = false;}
    $obj = array('value' => $compare[2],'status' => $status);
    array_push( $test,$obj);


    if ($n){
        if ($a > $b){
        $obj = array('value' => $compare[4],'status' => true);
        array_push( $test,$obj);
        } else{
            $obj = array('value' => $compare[4],'status' => false);
            array_push( $test,$obj);
        }
    } else{
        if ($a < $b){
            $obj = array('value' => $compare[3],'status' => true);
            array_push( $test,$obj);
            } else{
                $obj = array('value' => $compare[3],'status' => false);
                array_push( $test,$obj);
            }
    }


    $out =  array('json_out' => $json_out,'checkbox' =>  $test);
    return $out;
}


echo("<br>---Radio----<br>");
$out = radio();

print_r($out);


echo("<br>---Checkbox----<br>");
$out = checkbox();

print_r($out);
?>