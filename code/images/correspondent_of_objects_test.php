<?php

function radio(){
    $test = [];
    $right = [];
    $arr = [];
    
    $n_items = [];
    $types = [];
    $numbers = [];
    $connections = [];

    $letters = ["A","B","C","D"];

    $items = 0;
    $n_item = rand(1,10);
    array_push($n_items,$n_item);
    
    for($i=0;$i<3;$i+=1){
        do{
            $n_item = rand(1,10);
            $flag = 1;
            for ($j=0;$j<count($n_items);$j+=1){
                if ($n_items[$j]==$n_item){$flag = 0;}
            }
        } while ($flag==0);
        array_push($n_items,$n_item);
    }

    $type = rand(0,3);
    array_push($types,$type);
    for($i=0;$i<3;$i+=1){
        do{
            $type = rand(0,3);
            $flag = 1;
            for ($j=0;$j<count($types);$j+=1){
                if ($types[$j]==$type){$flag = 0;}
            }
        } while ($flag==0);
        array_push($types,$type);
    }

    $numbers = $n_items;
    shuffle($numbers);


    for ($i=0;$i<4;$i+=1){
        for($j=0;$j<4;$j+=1){
            if ($n_items[$i]==$numbers[$j]){
                array_push($connections,$j);
            }
        }
    }

    
    array_push($right,$n_items);
    array_push($right,$types);
    array_push($right,$numbers);
  
    $right_n = rand(0,3);
    for ($i=0;$i<4;$i+=1){
        if ($i!=$right_n){
                $avliable = [];
                for ($j=0;$j<4;$j+=1){
                    if ($j==$connections[$right_n]) {continue;}
                    if ($j==$connections[$i]) {continue;}
                    $flag = 0;
                    for ($k=0;$k<$i;$k+=1){
                        if ($j==$connections[$k])  {$flag = 1;}
                    }
                    if ($flag) {continue;}
                    array_push($avliable,$j);
                }
                print_r($avliable);
                if (count($avliable)==2){
                $connection =$avliable[rand(0,1)];
                }
                else{
                    $connection =$avliable[0];
                }
            $connections[$i]= $connection;
        }
    }
    array_push($right,$connections);

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
    
    $n_items = [];
    $types = [];
    $numbers = [];
    $connections = [];

    $letters = ["A","B","C","D"];

    $items = 0;
    $n_item = rand(1,10);
    array_push($n_items,$n_item);
    
    for($i=0;$i<3;$i+=1){
        do{
            $n_item = rand(1,10);
            $flag = 1;
            for ($j=0;$j<count($n_items);$j+=1){
                if ($n_items[$j]==$n_item){$flag = 0;}
            }
        } while ($flag==0);
        array_push($n_items,$n_item);
    }

    $type = rand(0,3);
    array_push($types,$type);
    for($i=0;$i<3;$i+=1){
        do{
            $type = rand(0,3);
            $flag = 1;
            for ($j=0;$j<count($types);$j+=1){
                if ($types[$j]==$type){$flag = 0;}
            }
        } while ($flag==0);
        array_push($types,$type);
    }

    $numbers = $n_items;
    shuffle($numbers);


    for ($i=0;$i<4;$i+=1){
        for($j=0;$j<4;$j+=1){
            if ($n_items[$i]==$numbers[$j]){
                array_push($connections,$j);
            }
        }
    }

    
    array_push($right,$n_items);
    array_push($right,$types);
    array_push($right,$numbers);
  
    $wrong_n1 = rand(0,3);
    $wrong_n2 = $connections[$wrong_n1];

    $k = $connections[$wrong_n1];
    $connections[$wrong_n1] =  $connections[$wrong_n2];
    $connections[$wrong_n2] = $k;

    
    array_push($right,$connections);

    $json_out =  json_encode($right);
   

    $items = 0;
    $wrong = [];

    for ($i = 0;$i<count($letters);$i+=1){
        $status = true;
        if ($i ==  $wrong_n1){$status = false;} 
        if ($i ==  $wrong_n2){$status = false;} 
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