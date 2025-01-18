<?php

header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);

// $back = imagecreatefrompng ("images/canvas.png");
$back = imagecreatefromjpeg ("../../images/canvas.jpg");

// $apple     = imagecreatefrompng("../../images/apple.png");
// $banana     = imagecreatefrompng("../../images/banana.png");
// $orange     = imagecreatefrompng("../../images/orange.png");
// $tomato     = imagecreatefrompng("../../images/tomato.png");
// $objects = [$apple,$banana,$orange,$tomato];

require("../lib/objects.php");


$black = imagecolorallocate($back, 0, 0, 0);
imageline($back,225,0,225,600,$black );
imageline($back,0,225,225,225,$black );
imageline($back,0,375,225,375,$black );
$font_file = '../../Inter.ttf';


imageline($back,375,0,375,600,$black );



imageline($back,375,150,600,150,$black );
imageline($back,375,300,600,300,$black );
imageline($back,375,450,600,450,$black );


// imageflip($im, IMG_FLIP_VERTICAL);
// imagecopymerge($back , $im, 100, 10, 0, 0, 100, 160, 160);
// imagecopyresampled($back , $im, 600, 290, 0, 0, 50, 50, 160, 160);
// imagecopyresampled($back , $im, 550, 300, 0, 0, 25, 25, 160, 160);
// intdiv()

$x_start = 0;
$y_start = 225;

$values = [6,10,0,3];
$col = 4;
$value = $t[0];
$l = $t[1];
$right = $t[2];
    for ($k=0;$k<$value;$k+=1){
        $j = $k%$col;
        $i = intdiv($k,$col);
        imagecopyresampled($back , $objects[$l],$x_start+50*$j, $y_start+50*$i, 0, 0, 50, 50, 64, 64);
}

imagefttext($back, 24, 0, 350, 150,  $black, $font_file, 'A');
imagefttext($back, 24, 0, 350, 300, $black, $font_file, 'B');
imagefttext($back, 24, 0, 350, 450, $black, $font_file, 'C');
imagefttext($back, 24, 0, 350, 600, $black, $font_file, 'D');

$aloud_count =['one','two','three','four','five','six','seven','eight','nine','ten','eleven','twelve','thirteen','fourteen','fiveteen'];

imagefttext($back, 24, 0, 350, 600, $black, $font_file, 'D');
$str = '';


$n = 0;
$value = $t[0];

$y_line=[150,300,450,600];

for($i=0;$i<4;$i+=1){
$strs = [];
$str = '';
if ($right == $i){
    $skip = -1;
}else{
    $skip = rand(0,$value);
}
for ($j=0;$j<$value;$j+=1){
        if ($j == $skip) {continue;}
        $n = iconv_strlen($str);
        $n1 = iconv_strlen($aloud_count[$j]);
        if ($j<$value-1){$add_comma = ", ";}
        else {$add_comma = "";}
        if ($n + $n1 <30){
            $str .=$aloud_count[$j].$add_comma;
        } else{
            array_push($strs,$str);
            $str = $aloud_count[$j].$add_comma;
        }
}
array_push($strs,$str);
$n = count($strs)-1;
for ($k=0;$k<=count($strs);$k+=1){
    imagefttext($back, 12, 0, 377, $y_line[$i]-25*$n+$k*25-3, $black, $font_file, $strs[$k]);
} 
}
// imagefttext($back, 12, 0, 100, 100, $black, $font_file,count($strs));


for($i=0;$i<4;$i+=1){
    for ($j=0;$j<=count($strs);$j+=1){
        if ($j!=$skip){
        }
    }
}
// imagefttext($back, 12, 0, 377, 595, $black, $font_file, $str);s

// imagefttext($back, 12, 0, 377, 300, $black, $font_file, $n);



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