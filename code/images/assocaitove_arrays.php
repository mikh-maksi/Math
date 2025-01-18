<?php
function deg_rad($deg){
    return $deg*pi()/180;
}
//         $coords = [
//             [array("x"=>"35", "y"=>"37")],
//             [array("x"=>"35", "y"=>"37")],
//             [array("x"=>"35", "y"=>"37")],
//             [array("x"=>"35", "y"=>"37")],
//             [array("x"=>"35", "y"=>"37")],
//             [array("x"=>"35", "y"=>"37")],
//     ];

// print_r($coords);
// echo($coords[0]["x"]);


$dx = cos(deg_rad(30))*100;
$dy = sin(deg_rad(30))*100;
$n = 1;
$x_start = 110;
$coords = [
    array("x"=>$x_start+$n*210, "y"=>10),
    array("x"=>110-$dx+$n*210, "y"=>10+$dy),
    array("x"=>$x_start-$dx+$n*210, "y"=>10+$dy+100),
    array("x"=>$x_start+$n*210, "y"=>10+$dy*2+100),
    array("x"=>$x_start+$dx+$n*210, "y"=>10+$dy+100),
    array("x"=>$x_start+$dx+$n*210, "y"=>10+$dy),
];
echo(count($coords));
print_r($coords);

for ($i=0;$i<count($coords)-1;$i+=1){
echo($i." ");
echo($coords[0]["x"]);
echo($coords[$i]["x"]." ".$coords[$i]["y"]." ".$coords[$i+1]["x"]." ".$coords[$i+1]["y"]);
echo("|"."<br>");
}


?>