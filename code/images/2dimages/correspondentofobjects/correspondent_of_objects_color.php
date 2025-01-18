<?php

header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);

$ob = $t[0];
$types = $t[1];
$numbers = $t[2];
$connections = $t[3];

// $y_line = [140,290,440,590];
$y_line = [75,225,375,525];

// $back = imagecreatefrompng ("images/canvas.png");
$back = imagecreatefromjpeg ("../../images/canvas.jpg");

require("../lib/objects.php");


$type_objects = $objects;
// $apple     = imagecreatefrompng("../../images/apple.png");
// $banana     = imagecreatefrompng("../../images/banana.png");
// $orange     = imagecreatefrompng("../../images/orange.png");
// $tomato     = imagecreatefrompng("../../images/tomato.png");


// $type_objects = [$apple,$banana,$orange,$tomato];

$black = imagecolorallocate($back, 0, 0, 0);

$red = imagecolorallocate($back, 255, 0, 0);
$blue = imagecolorallocate($back, 0, 0, 255);
$green = imagecolorallocate($back, 0, 255, 0);
$violet = imagecolorallocate($back, 255, 0, 255);

$colors = [];
array_push($colors,$red);
array_push($colors,$blue);
array_push($colors,$green);
array_push($colors,$violet);



imageline($back,225,0,225,600,$black );
imageline($back,0,150,225,150,$black );
imageline($back,0,300,225,300,$black );
imageline($back,0,450,225,450,$black );
$font_file = '../../Inter.ttf';


imageline($back,375,0,375,600,$black );
imageline($back,0,150,225,150,$black );
imageline($back,0,300,225,300,$black );
imageline($back,0,450,225,450,$black );


imageline($back,375,150,600,150,$black );
imageline($back,375,300,600,300,$black );
imageline($back,375,450,600,450,$black );

$x_start = [20,20,20,20];
$y_start = [0,150,300,450];


$objects = [$type_objects[$types[0]],$type_objects[$types[1]],$type_objects[$types[2]],$type_objects[$types[3]]];

$values = [6,10,0,3];
$col = 4;
for($l=0;$l<4;$l+=1){
    $value = $ob[$l];
    for ($k=0;$k<$value;$k+=1){
        $j = $k%$col;
        $i = intdiv($k,$col);
        imagecopyresampled($back , $objects[$l],$x_start[$l]+50*$j, $y_start[$l]+50*$i, 0, 0, 50, 50, 64, 64);
}
}


for ($i=0;$i<4;$i+=1){
imagefttext($back, 60, 0, 375, $y_line[$i]+30,  $black, $font_file, $numbers[$i]);
}


imagesetthickness($back,3);

for ($i=0;$i<4;$i+=1){
    $n = $connections[$i];
    imageline($back,225,$y_line[$i],375,$y_line[$n],$colors[$i] );
}




imagepng($back);
imagedestroy($back);

?>