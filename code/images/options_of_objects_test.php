<?php
function radio(){
    $test = [];

    $letters = ['A','B','C','D'];
    $n_items = [];


    $types = ['big','small','light','heavy'];
    // $right_n = rand(0,3);

    $json_out =  json_encode($types);
   
    for ($i = 0;$i<count($letters);$i+=1){
        if ($i == $right_n){$status = true;} else {$status = false;}
        $obj = array('value' => $letters[$i],'status' => $status);
        array_push( $test,$obj);
    }


    $out =  array('json_out' => $json_out,'radio' =>  $test);
    return $out;
}

echo(json_encode(radio()));
?>