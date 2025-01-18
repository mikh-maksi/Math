<?php
// if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
// $t = json_decode($_GET['t']);

function checkbox(){
    $checkbox = [];
    $arr = [];
    $items = 0;
    do{
        $n = rand(0,20);
        $flag = 1;
        for ($i=0;$i<count($arr);$i+=1){
            if ($arr[$i]==$n){$flag = 0;}
        }
        if ($flag){
            array_push($arr,$n); 
            $items+=1;
    
        }
    } while ($items<3);
    $json_out =  json_encode($arr);

    $items = 0;
    do{
        $n = rand(0,20);
        $flag = 1;
        for ($i=0;$i<count($arr);$i+=1){
            if ($arr[$i]==$n){$flag = 0;}
        }
        if ($flag){$items+=1;}
    } while ($items<1);
    $wrong = $n;
    

    for ($i = 0;$i<count($arr);$i+=1){
        $obj = (object) array('value' => $arr[$i],'status' => true);
        array_push($checkbox,$obj);
    }
    $obj = (object) array('value' => $wrong,'status' => false);
    array_push($checkbox,$obj);
    
    shuffle($checkbox);

    $out = (object) array('json_out' => $json_out,'checkbox' => $checkbox);
    return $out;
}

function radio(){
    $radio = [];
    $right = [];
    $items = 0;
    do{
        $n = rand(0,20);
        $flag = 1;
        for ($i=0;$i<count($right);$i+=1){
            if ($right[$i]==$n){$flag = 0;}
        }
        if ($flag){
            array_push($right,$n); 
            $items+=1;
        }
    } while ($items<1);
    $json_out =  json_encode($right);


    $items = 0;
    $wrong = [];

    do{
        $n = rand(0,20);
        $flag = 1;
        for ($i=0;$i<count($right);$i+=1){
            if ($right[$i]==$n){$flag = 0;}
        }
        for ($i=0;$i<count($wrong);$i+=1){
            if ($wrong[$i]==$n){$flag = 0;}
        }
        if ($flag){$items+=1;    array_push($wrong,$n);}
    } while ($items<3);
 
    
   
    

    for ($i = 0;$i<count($right);$i+=1){
        $obj = (object) array('value' => $right[$i],'status' => true);
        array_push($radio,$obj);
    }
    for ($i = 0;$i<count($wrong);$i+=1){
        $obj = (object) array('value' => $wrong[$i],'status' => false);
        array_push($radio,$obj);
    }
    
    shuffle($radio);

    $out = (object) array('json_out' => $json_out,'radio' => $radio);
    return $out;
}




$out = checkbox();


print_r($out);

echo($out->json_out);

print_r($out->checkbox);

echo("<br>-------<br>");
$out = radio();


print_r($out);

echo($out->json_out);

// print_r($out->radio);

?>