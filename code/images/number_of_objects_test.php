<?php

function radio(){
    $radio = [];
    $right = [];
    $items = 0;
    do{
        $n = rand(1,20);
        $flag = 1;
        for ($i=0;$i<count($right);$i+=1){
            if ($right[$i]==$n){$flag = 0;}
        }
        if ($flag){
            array_push($right,$n); 
            $items+=1;
        }
    } while ($items<3);
    array_push($right,0); 
    shuffle($right);
    $json_out =  json_encode($right);
    $right_n = -1;
    for ($i = 0;$i<count($right);$i+=1){
        if ($right[$i]==0){$right_n = $i;}
    }
    // echo ($right_n);

    $letters = ["A","B","C","D"];
    $items = 0;
    $wrong = [];

    for ($i = 0;$i<count($letters);$i+=1){
        if ($i == $right_n){$status = true;} else {$status = false;}

        $obj = (object) array('value' => $letters[$i],'status' => $status);
        array_push($radio,$obj);
    }


    $out = (object) array('json_out' => $json_out,'radio' => $radio);
    return $out;
}



function checkbox(){
    $test = [];
    $right = [];
    $items = 0;
    do{
        $n = rand(1,20);
        $flag = 1;
        for ($i=0;$i<count($right);$i+=1){
            if ($right[$i]==$n){$flag = 0;}
        }
        if ($flag){
            array_push($right,$n); 
            $items+=1;
        }
    } while ($items<3);
    array_push($right,0); 
    shuffle($right);
    $json_out =  json_encode($right);
    $right_n = -1;
    for ($i = 0;$i<count($right);$i+=1){
        if ($right[$i]==0){$right_n = $i;}
    }
    // echo ($right_n);

    $letters = ["A","B","C","D"];
    $items = 0;
    $wrong = [];

    for ($i = 0;$i<count($letters);$i+=1){
        if ($i == $right_n){$status = false;} else {$status = true;}

        $obj = (object) array('value' => $letters[$i],'status' => $status);
        array_push($test,$obj);
    }


    $out = (object) array('json_out' => $json_out,'checkbox' => $test);
    return $out;
}

echo("<br>---Radio----<br>");
$out = radio();

print_r($out);


echo("<br>---Checkbox----<br>");
$out = checkbox();

print_r($out);
?>