<?php
function string_separation($string,$string_length){
    $pieces = explode(' ',$string);
    $symbol = 0;
    $word = 0;    
    $devide_array = [];
    // Get positions of separators
    foreach ($pieces as $value){
        if (($symbol + strlen($value))>$string_length){
            $devide_array[]= $word;
            $symbol = strlen($value);
        }else{
            $symbol += strlen($value);
        }
        $word +=1;
    }
    $devide_array[] = $word;
        
    $previos_devide = 0;
    $result_array = [];
    foreach ($devide_array as $value){
        $string_out = '';
        for ($i=$previos_devide;$i<$value;$i++){
            $string_out .=$pieces[$i].' ';
        }
        $result_array[]= $string_out;
        $previos_devide = $value;
    }

    // print_r($result_array);
    return $result_array;
}


?>