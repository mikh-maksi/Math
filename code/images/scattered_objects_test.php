<?php

function radio(){
    $test = [];
    $right = [];
    $arr = [];

    $letters = ["A","B","C","D"];
    $n_items = rand(1,10);

    array_push($right,$n_items);

    $json_out =  json_encode($right);
   
    $numbers =[$n_items];
    do{
        $n_item = rand(1,10);
        $flag = 1;
        for ($i=0;$i<count($numbers);$i+=1){
            if($numbers[$i] == $n_item){$flag = 0;}
        }
        if ($flag) {
            array_push($numbers,$n_item);
        }

    }while(count($numbers)<4);

    shuffle($numbers);
    for ($i=0;$i<count($numbers);$i+=1){
        if ($numbers[$i] == $n_items) {
            $right_n = $i;
        }
    }

    $items = 0;
    $wrong = [];

    for ($i = 0;$i<count($numbers);$i+=1){
        if ($i == $right_n){$status = true;} else {$status = false;}
        $obj = array('value' => $numbers[$i],'status' => $status);
        array_push( $test,$obj);
    }


    $out =  array('json_out' => $json_out,'radio' =>  $test);
    return $out;
}

function checkbox(){
    $test = [];
    $right = [];
    $arr = [];

    $letters = ["A","B","C","D"];
    $n_items = rand(1,10);

    array_push($right,$n_items);

    $json_out =  json_encode($right);
   
    $numbers =[$n_items];
    do{
        $n_item = rand(1,10);
        $flag = 1;
        for ($i=0;$i<count($numbers);$i+=1){
            if($numbers[$i] == $n_item){$flag = 0;}
        }
        if ($flag) {
            array_push($numbers,$n_item);
        }

    }while(count($numbers)<4);

    shuffle($numbers);
    for ($i=0;$i<count($numbers);$i+=1){
        if ($numbers[$i] == $n_items) {
            $right_n = $i;
        }
    }

    $items = 0;
    $wrong = [];

    for ($i = 0;$i<count($numbers);$i+=1){
        if ($i == $right_n){$status = false;} else {$status = true;}
        $obj = array('value' => $numbers[$i],'status' => $status);
        array_push( $test,$obj);
    }


    $out =  array('json_out' => $json_out,'radio' =>  $test);
    return $out;
}


echo("<br>---Radio----<br>");
$out = radio();

print_r($out);


echo("<br>---Checkbox----<br>");
$out = checkbox();

print_r($out);
?>