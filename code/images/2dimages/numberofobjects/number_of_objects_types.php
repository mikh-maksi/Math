<?php

header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);

// $back = imagecreatefrompng ("images/canvas.png");
$back = imagecreatefromjpeg ("../../images/canvas.jpg");

require("../lib/objects.php");

$black = imagecolorallocate($back, 0, 0, 0);
imageline($back,300,0,300,600,$black );
imageline($back,0,300,600,300,$black );
$font_file = '../../Inter.ttf';

// imagefttext($back, 24, 0, 150, 297, $black, $font_file, 'A');
// imagefttext($back, 24, 0, 450, 297, $black, $font_file, 'B');
// imagefttext($back, 24, 0, 150, 597, $black, $font_file, 'C');
// imagefttext($back, 24, 0, 450, 597, $black, $font_file, 'D');


// imageflip($im, IMG_FLIP_VERTICAL);
// imagecopymerge($back , $im, 100, 10, 0, 0, 100, 160, 160);
// imagecopyresampled($back , $im, 600, 290, 0, 0, 50, 50, 160, 160);
// imagecopyresampled($back , $im, 550, 300, 0, 0, 25, 25, 160, 160);
// intdiv()

$x_start = [20,320,20,320];
$y_start = [20,20,320,320];
// $objects = [$apple,$banana,$orange,$tomato];

$numbers = $t[0];
$types = $t[1];

$values = [6,12,0,3];
$col = 5;

for($l=0;$l<4;$l+=1){
    $value = $numbers[$l];
    $n_object = $types[$l];
    for ($k=0;$k<$value;$k+=1){
        $j = $k%$col;
        $i = intdiv($k,$col);
        imagecopyresampled($back , $objects[$n_object],$x_start[$l]+50*$j, $y_start[$l]+50*$i, 0, 0, 50, 50, 64, 64);
}
}




imagepng($back);
imagedestroy($back);

?>