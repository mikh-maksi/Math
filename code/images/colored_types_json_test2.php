<?php

$n_elements = 5;
function get_json(){
        $n_elements = 5;
        $n_types = 3;
        $type_color = [];
        for ($i=0;$i<$n_elements;$i++){
        $color = rand(3,4);
        $type = rand(0,$n_types-1);
        array_push($type_color,array('t'=>$type,'c'=>$color));
    }
    return $type_color;
}
$out = get_json();
// print_r($out);
// echo ('<br>');
echo (json_encode($out));


$groups = get_real_groups2($out);
print_r($groups);
echo('<br>');
echo(json_encode($groups));

// function sort_type_color($type_color){
//     $styles = [];

// }



function get_real_groups2 ($type_color){

    $types = [];
    $colors = [];
    // type and color.
    $existing_variants = [];
    for ($i=0;$i<count($type_color);$i+=1){
        array_push($types,$type_color[$i]['t']);
        array_push($colors,$type_color[$i]['c']);
        $flag = 0;
        for($j=0;$j<count($existing_variants);$j+=1){
            if (($existing_variants[$j]['t']==$type_color[$i]['t'])and($existing_variants[$j]['c']==$type_color[$i]['c'])){
                $existing_variants[$j]['n']+=1;
                $flag = 1;
            }
        }
        if ($flag == 0){
            $arr['t'] = $type_color[$i]['t'];
            $arr['c'] = $type_color[$i]['c'];
            $arr['n'] = 1;
            array_push($existing_variants,$arr);
        }
        
    }
    

    echo ('<br>---');
    echo(json_encode($existing_variants));
    // print_r($existing_variants);
    echo ('---<br>');

    $types_count = array_count_values($types);
    $colors_count = array_count_values($colors);
    
    $positions = [];
    foreach ($types_count as $key => $value){
        $elem = array('t' =>$key,'c' =>-1,'n'=>$value);
        if ($value>0){
            array_push($positions,$elem);
        }
    }
    foreach ($colors_count as $key => $value){
        $elem = array('c' =>$key,'t' =>-1,'n'=>$value);
        if ($value>0){
            array_push($positions,$elem);
        }
    }

    $combinations = $existing_variants;
    for ($i=0;$i<count($positions);$i+=1){
        $flag = 0;
        for($j=0;$j<count($existing_variants);$j+=1){
            if ((($positions[$i]['t']==$existing_variants[$j]['t'])or($positions[$i]['c']==$existing_variants[$j]['c']))and($positions[$i]['n']==$existing_variants[$j]['n'])){
                $flag = 1;
            }
        }
        if ($flag){
            continue;
        }
        array_push($combinations,$positions[$i]);
    }

    echo('combinations: <br>');
    echo(json_encode($combinations));
    echo('<br>');

    
    usort($combinations, 'cmp');
    
    return $combinations;
    }
    



// Sort for 3 types: Type, Color, Color+Type.

function cmp($a, $b) {
    if ($a['n'] == $b['n']) {
        return 0;
    }
    return ($a['n'] < $b['n']) ? 1 : -1;
}

// $positions = get_real_groups($type_color);
// // print_r($result);
// echo('<br>');
// $position_out = [];
// foreach ($result as  $value){
//     echo ($value['group'].' '.$value['item'].'='.$value['number'].'<br>');
// }


// $combinations = [];
// $col_options = 4;
// for ($m=0;$m<5;$m+=1){
//     $k = 0;        
//     $combination = [];
//     for ($l=0;$l<$n_elements;$l+=1){

//         $i=intdiv($k,$col_options);
//         $j = $k%$col_options;
//         $value = $positions[$m];
//         $type = $value['group'];

//         if ($type_color[$l][$type] == $value['item']){
//             $element = array('type'=>$type_color[$l]['t'],'color'=>$type_color[$l]['c']);
//             // echo($type_color[$l][$type].' '.$type.' '.$value['group'].'->.<br>' );
//             array_push($combination,$element);
//             $k +=1;
//         }
//         // print_r($combination);

//     }
//     // print_r($combination);
//     echo('<br>');
//     array_push($combinations,$combination);
//     }
//     // echo('Combinations <br>');
//     // print_r($combinations);
//     // echo(json_encode($combinations));
//     // echo('<br> Count Combinations <br>');
//     // echo(count($combinations));
//     // echo('<br>');
//     $n = rand(1,4);
//     $wrong_combination = [];
//     for($i=0;$i<$n;$i+=1){
//         $t = rand(0,1);
//         $c = rand(3,4);
//         $arr = array('type'=>$t,'color'=>$c);
//         array_push($wrong_combination,$ar);
//     }

// $test_combinations = json_decode(' [[{'type':1,'color':4},{'type':2,'color':4},{'type':0,'color':4},{'type':1,'color':4}],[{'type':1,'color':4},{'type':1,'color':3},{'type':1,'color':4}],[{'type':2,'color':4}],[{'type':0,'color':4}],[{'type':1,'color':3}]]');
// $test_wrong_combination = json_decode('[{'type':1,'color':3},{'type':2,'color':4},{'type':0,'color':4},{'type':1,'color':4}]');
// $test_wrong_combination = json_decode(json_encode($wrong_combination));
// // echo('<br>test Combinations<br>');
// // print_r($test_combinations);
// // echo('<br>Test wrong Combinations <br>');
// // print_r($test_wrong_combination);

// echo('<br>Check Combinations<br>');
// echo(check_combination_obj($test_wrong_combination,$test_combinations));

// echo('<br>');
//     function check_combination_obj($wrong_combination,$combinations){
//         $flag = 1;
//         echo('<br>Function wrong Combinations<br>');
//         print_r($wrong_combination);
//         echo('<br>Function Combinations <br>');
//         print_r($combinations);

//         for ($i=0;$i<count($combinations);$i+=1){
//             if (count($combinations[$i])==count($wrong_combination)){
//                 $n = count($combinations[$i]);
//                 $k = 0;
//                 echo ('<br>-->'.$i.'<br>');
//             for($j=0;$j<$n;$j+=1){
//                 echo ('<br>-->Comb[i]'.$combinations[$i][$j]->type.' wrong comb'.$wrong_combination[$j]->type.'Comb[i] '.$combinations[$i][$j]->color.' wrong comb'.$wrong_combination[$j]->color .'<br>');
//                 if (($combinations[$i][$j]->type == $wrong_combination[$j]->type) and ($combinations[$i][$j]->color == $wrong_combination[$j]->color)){
//                     $k+=1;
//                     echo ('<br>-->'.$k.'<br>');
//                 }
//             }
//             if ($k == $n) {
//                 $flag = 0;
//             }
//         }
//         }
//         return $flag;
//     } 

//     function check_combination($wrong_combination,$combinations){
//         $flag = 1;
//        for ($i=0;$i<count($combinations);$i+=1){
//             if (count($combinations[$i])==count($wrong_combination)){
//                 $n = count($combinations[$i]);
//                 $k = 0;
//             for($j=0;$j<$n;$j+=1){
//                 if (($combinations[$i][$j]['type'] == $wrong_combination[$j]['type']) and ($combinations[$i][$j]['color'] == $wrong_combination[$j]['color'])){
//                     $k+=1;
//                 }
//             }
//             if ($k == $n) {
//                 $flag = 0;
//             }
//         }
//         }
//         return $flag;
//     } 





//     for ($i=0;$i<count($combinations);$i+=1){
//         print_r($combinations[$i]);
//             echo('<br>');
//         for($j=0;$j<count($combinations[$i]);$j+=1){
//             echo($combinations[$i][$j]['type'].' '.$combinations[$i][$j]['color'].'');
//             echo'<br>';
//         }
//     }
// // for ($m=0;$m<4;$m+=1){
// //     $k = 0;
// //     for ($l=0;$l<$n_elements;$l+=1){
// //         $i=intdiv($k,$col);
// //         $j = $k%$col;
// //         if ($type_color[$l]['c'] == $m){
// //             $draw->setFillColor(get_color($type_color[$l]['c']));
// //             $draw = get_types($draw,$type_color[$l]['t'],390+60*$j,180+150*$m+60*$i);
// //             $k +=1;
// //         }
// //     }
// //     }

// function radio(){
//     $test = [];

//     $compare = ['A same B','A more B','A fewer B'];
//     $n_items = [];

//     $items = 0;
//     $a= rand(0,5);
//     array_push($n_items,$a);
//     $b = rand(0,5);
//     array_push($n_items,$b);

//     $json_out =  json_encode($n_items);
   
//     if ($a == $b){$status = true;} else {$status = false;}
//     $obj = array('value' => $compare[0],'status' => $status);
//     array_push( $test,$obj);

//     if ($a > $b){$status = true;} else {$status = false;}
//     $obj = array('value' => $compare[1],'status' => $status);
//     array_push( $test,$obj);

//     if ($a < $b){$status = true;} else {$status = false;}
//     $obj = array('value' => $compare[2],'status' => $status);
//     array_push( $test,$obj);

//     $out =  array('json_out' => $json_out,'radio' =>  $test);
//     return $out;
// }

// function checkbox(){
//     $test = [];

//     $compare = ['A same B','A more B','A fewer B', 'B more A', 'B fewer A'];

//     $n_items = [];
    
//     $items = 0;
//     $a= rand(0,5);
//     array_push($n_items,$a);
//     $b = rand(0,5);
//     array_push($n_items,$b);

//     $json_out =  json_encode($n_items);
//     $n = rand(0,1);

//     if ($a == $b){$status = true;} else {$status = false;}
//     $obj = array('value' => $compare[0],'status' => $status);
//     array_push( $test,$obj);

//     if ($a > $b){$status = true;} else {$status = false;}
//     $obj = array('value' => $compare[1],'status' => $status);
//     array_push( $test,$obj);

//     if ($a < $b){$status = true;} else {$status = false;}
//     $obj = array('value' => $compare[2],'status' => $status);
//     array_push( $test,$obj);


//     if ($n){
//         if ($a > $b){
//         $obj = array('value' => $compare[4],'status' => true);
//         array_push( $test,$obj);
//         } else{
//             $obj = array('value' => $compare[4],'status' => false);
//             array_push( $test,$obj);
//         }
//     } else{
//         if ($a < $b){
//             $obj = array('value' => $compare[3],'status' => true);
//             array_push( $test,$obj);
//             } else{
//                 $obj = array('value' => $compare[3],'status' => false);
//                 array_push( $test,$obj);
//             }
//     }


//     $out =  array('json_out' => $json_out,'checkbox' =>  $test);
//     return $out;
// }


// echo('<br>---Radio----<br>');
// $out = radio();

// print_r($out);


// echo('<br>---Checkbox----<br>');
// $out = checkbox();

// print_r($out);
?>