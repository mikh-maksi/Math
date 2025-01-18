<?php
function radio(){
    $test = [];

    $letters = ['A','B','C','D'];
    $n_items = [];


    $wrong_n = rand(0,3);


    $json_out =  json_encode($wrong_n);
   
    for ($i = 0;$i<count($letters);$i+=1){
        $status = $i == $wrong_n;
        $obj = array('value' => $letters[$i],'status' => $status);
        array_push( $test,$obj);
    }


    $out =  array('json_out' => $json_out,'radio' =>  $test);
    return $out;
}

echo(json_encode(radio()));


?>