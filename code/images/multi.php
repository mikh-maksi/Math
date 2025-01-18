<?php
function multi_angle(){
    $coords = [];
    $arr = [[1,1],[1,-1],[-1,-1],[-1,1]];
    $n = 0;
    $x = 10;
    $y = 50;
    $dx = 50;
    $dy = 50;
    $line = 160;
    for ($i=0;$i<4;$i+=1){
        for ($j=0;$j<4;$j+=1){
            $x1 = $x + $line *2* $i;
            $y1 = $x + $line * $j;
            
            $x2 = $x1 + $dx*2*$arr[$i][0];
            $y2 = $y1 + $dy*$arr[$j][0];
    
            $x3 = $x1 + $dx*3*$arr[$i][1];
            $y3 = $y1 + $dy*$arr[$j][1];
    
            $n+=1;
            array_push($coords,[$x1,$y1,$x2,$y2,$x3,$y3]); 
        }
    }
    return $coords;    
}


print_r(multi_angle());  
$arr = multi_angle();
print(count(multi_angle()));

for ($i=0;$i<count(multi_angle());$i+=1){
    
    echo("{$arr[$i][0]}<br>");
}
?>