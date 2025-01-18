<?php

function radio(){
    $test = [];
    $right = [];
    $arr = [];


    $letters = ["A","B","C","D"];
    $n_items = rand(1,10);
    $types = rand(0,3);
    $right_n  = rand(0,3);

    
    array_push($right,$n_items);
    array_push($right,$types);
    array_push($right,$right_n);
  

    $json_out =  json_encode($right);
   

    $items = 0;
    $wrong = [];

    for ($i = 0;$i<count($letters);$i+=1){
        if ($i == $right_n){$status = true;} else {$status = false;}
        $obj = array('value' => $letters[$i],'status' => $status);
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
    $types = rand(0,3);
    $right_n  = rand(0,3);

    
    array_push($right,$n_items);
    array_push($right,$types);
    array_push($right,$right_n);
  

    $json_out =  json_encode($right);
   

    $items = 0;
    $wrong = [];

    for ($i = 0;$i<count($letters);$i+=1){
        if ($i == $right_n){$status = false;} else {$status = true;}
        $obj = array('value' => $letters[$i],'status' => $status);
        array_push( $test,$obj);
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