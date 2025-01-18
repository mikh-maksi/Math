<?php

header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);

$ob = $t[0];
$types = $t[1];
$numbers = $t[2];
$connections = $t[3];

$y_line = [140,290,440,590];

// $back = imagecreatefrompng ("images/canvas.png");
$back = imagecreatefromjpeg ("images/canvas.jpg");

$apple     = imagecreatefrompng("images/apple.png");
$banana     = imagecreatefrompng("images/banana.png");
$orange     = imagecreatefrompng("images/orange.png");
$tomato     = imagecreatefrompng("images/tomato.png");

$black = imagecolorallocate($back, 0, 0, 0);
imageline($back,225,0,225,600,$black );
imageline($back,0,150,225,150,$black );
imageline($back,0,300,225,300,$black );
imageline($back,0,450,225,450,$black );
$font_file = 'Inter.ttf';


imageline($back,375,0,375,600,$black );
imageline($back,0,150,225,150,$black );
imageline($back,0,300,225,300,$black );
imageline($back,0,450,225,450,$black );


imageline($back,375,150,600,150,$black );
imageline($back,375,300,600,300,$black );
imageline($back,375,450,600,450,$black );


// imageflip($im, IMG_FLIP_VERTICAL);
// imagecopymerge($back , $im, 100, 10, 0, 0, 100, 160, 160);
// imagecopyresampled($back , $im, 600, 290, 0, 0, 50, 50, 160, 160);
// imagecopyresampled($back , $im, 550, 300, 0, 0, 25, 25, 160, 160);
// intdiv()

$x_start = [20,20,20,20];
$y_start = [0,150,300,450];
$type_objects = [$apple,$banana,$orange,$tomato];

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

imagefttext($back, 24, 0, 200, 150,  $black, $font_file, 'A');
imagefttext($back, 24, 0, 200, 300, $black, $font_file, 'B');
imagefttext($back, 24, 0, 200, 450, $black, $font_file, 'C');
imagefttext($back, 24, 0, 200, 600, $black, $font_file, 'D');


imagefttext($back, 24, 0, 375, 150,  $black, $font_file, $numbers[0]);
imagefttext($back, 24, 0, 375, 300, $black, $font_file, $numbers[1]);
imagefttext($back, 24, 0, 375, 450, $black, $font_file, $numbers[2]);
imagefttext($back, 24, 0, 375, 600, $black, $font_file, $numbers[3]);


for ($i=0;$i<4;$i+=1){
    $n = $connections[$i];
    imageline($back,225,$y_line[$i],375,$y_line[$n],$black );
}



// for ($i=0;$i<3;$i+=1){
//     for ($j=0;$j<4;$j+=1){
//         imagecopyresampled($back , $apple, 100+64*$j, 100+64*$i, 0, 0, 64, 64, 64, 64);
//     }
// }

// for ($i=0;$i<3;$i+=1){
//     for ($j=0;$j<4;$j+=1){
//         imagecopyresampled($back , $banana, 800+30*$j, 100+30*$i, 0, 0, 25, 25, 64, 64);
//     }
// }
// imagecopyresampled($back , $apple, 100, 100, 0, 0, 50, 50, 64, 64);
// imagecopyresampled($back , $apple, 100, 100, 0, 0, 50, 50, 64, 64);

// $orange = imagecolorallocate($im, 220, 210, 60);
// $px     = (imagesx($im) - 7.5 * strlen($string)) / 2;
// imagestring($im, 3, $px, 9, $string, $orange);
imagepng($back);
imagedestroy($back);

?>