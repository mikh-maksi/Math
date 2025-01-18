<?php

header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);

// $back = imagecreatefrompng ("images/canvas.png");
$back = imagecreatefromjpeg ("../../images/canvas.jpg");

$apple     = imagecreatefrompng("../../images/apple.png");
$banana     = imagecreatefrompng("../../images/banana.png");
$orange     = imagecreatefrompng("../../images/orange.png");
$tomato     = imagecreatefrompng("../../images/tomato.png");

$black = imagecolorallocate($back, 0, 0, 0);
imageline($back,225,0,225,600,$black );
imageline($back,0,180,225,180,$black );
imageline($back,0,420,225,420,$black );
$font_file = '../../Inter.ttf';


imageline($back,275,0,275,600,$black );



imageline($back,275,150,600,150,$black );
imageline($back,275,300,600,300,$black );
imageline($back,275,450,600,450,$black );


$cents_array = $t[0];
$cents = $t[1];

$array_centes = ["cent_1.png","cent_5.png","cent_10.png","cent_25.png","cent_50.png"];
$path = '../../images/'.$array_centes[$cents];

$coin = imagecreatefrompng ($path);






// imageflip($im, IMG_FLIP_VERTICAL);
// imagecopymerge($back , $im, 100, 10, 0, 0, 100, 160, 160);
// imagecopyresampled($back , $im, 600, 290, 0, 0, 50, 50, 160, 160);
// imagecopyresampled($back , $im, 550, 300, 0, 0, 25, 25, 160, 160);
// intdiv()

$x_start = 0;
$y_start = 190;
$objects = [$apple,$banana,$orange,$tomato];
$values = [6,10,0,3];
$col = 4;

// $cents_array = [2,1,0,3];
$value = 0;
$l = 0;
$right =0;


imagecopyresampled($back,$coin,$x_start, $y_start, 0, 0, 220, 220, 220, 220);

imagefttext($back, 24, 0, 250, 150,  $black, $font_file, 'A');
imagefttext($back, 24, 0, 250, 300, $black, $font_file, 'B');
imagefttext($back, 24, 0, 250, 450, $black, $font_file, 'C');
imagefttext($back, 24, 0, 250, 600, $black, $font_file, 'D');

$aloud_count =['one','two','three','four','five','six','seven','eight','nine','ten','eleven','twelve','thirteen','fourteen','fiveteen'];
$centes_names = ['1 cent. Penny.', '5 cents. Nickel.','10 cents. Dime.','25 cents. Quater.','50 cents. Half dollar.'];




$str = '';


$n = 0;
// $value = $t[0];

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


$cent_n = $cents_array[$i];
imagefttext($back, 24, 0, 277, $y_line[$i]-3, $black, $font_file, $centes_names[$cent_n]);

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