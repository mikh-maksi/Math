<?php

header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);

$ob1 = $t[0];
$ob2 = $t[1];
$types = [0,0,0,0];
$number = $t[2];

$names =['A','B','C','D'];
// $numbers = $t[2];
// $connections = $t[3];

// $y_line = [140,290,440,590];
$y_line = [75,225,375,525];

// $back = imagecreatefrompng ("images/canvas.png");
$back = imagecreatefromjpeg ("../../images/canvas.jpg");


require("../lib/objects.php");

// $apple     = imagecreatefrompng("../../images/apple.png");
// $banana     = imagecreatefrompng("../../images/banana.png");
// $orange     = imagecreatefrompng("../../images/orange.png");
// $tomato     = imagecreatefrompng("../../images/tomato.png");

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
// imageline($back,0,150,225,150,$black );
// imageline($back,0,300,225,300,$black );
// imageline($back,0,450,225,450,$black );
$font_file = '../../Inter.ttf';


imageline($back,375,0,375,600,$black );
imageline($back,488,0,488,600,$black );


imageline($back,0,220,225,220,$black );
// imageline($back,0,300,225,300,$black );
imageline($back,0,380,225,380,$black );


imageline($back,375,150,600,150,$black );
imageline($back,375,300,600,300,$black );
imageline($back,375,450,600,450,$black );

$x_start = [375,375,375,375];
$y_start = [0,150,300,450];
$x_start_base = 0;
$y_start_base = 225;
$type_objects = $objects;

$objects = [$type_objects[$types[0]],$type_objects[$types[1]],$type_objects[$types[2]],$type_objects[$types[3]]];

$values = [6,10,0,3];
$col = 4;
$value = $number;

for ($k=0;$k<$value;$k+=1){
    $j = $k%$col;
    $i = intdiv($k,$col);
    imagecopyresampled($back , $type_objects[0],$x_start_base+50*$j, $y_start_base+50*$i, 0, 0, 50, 50, 64, 64);
}


// Elements
$col = 2;
for($l=0;$l<4;$l+=1){
    $value = $ob1[$l];
    for ($k=0;$k<$value;$k+=1){
        $j = $k%$col;
        $i = intdiv($k,$col);
        imagecopyresampled($back, $objects[$l],$x_start[$l]+50*$j, $y_start[$l]+50*$i, 0, 0, 50, 50, 64, 64);
}

$value = $ob2[$l];
for ($k=0;$k<$value;$k+=1){
    $j = $k%$col;
    $i = intdiv($k,$col);
    imagecopyresampled($back, $objects[$l],$x_start[$l]+50*$j+120, $y_start[$l]+50*$i, 0, 0, 50, 50, 64, 64);
}

}

// imagefttext($back, 60, 0, 100, 330,  $black, $font_file,$number);
for ($i=0;$i<4;$i+=1){
imagefttext($back, 60, 0, 320, $y_line[$i]+30,  $black, $font_file, $names[$i]);
}


imagesetthickness($back,3);

imagepng($back);
imagedestroy($back);
?>