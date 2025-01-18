<?php

header("Content-type: image/png");
$string = $_GET['text'];
$im     = imagecreatefrompng("images/button1.png");
$back = imagecreatefromjpeg ("images/free-nature-images.jpg");
$apple     = imagecreatefrompng("images/apple.png");
$banana     = imagecreatefrompng("images/banana.png");
$orange     = imagecreatefrompng("images/orange.png");
// imageflip($im, IMG_FLIP_VERTICAL);
// imagecopymerge($back , $im, 100, 10, 0, 0, 100, 160, 160);
// imagecopyresampled($back , $im, 600, 290, 0, 0, 50, 50, 160, 160);
// imagecopyresampled($back , $im, 550, 300, 0, 0, 25, 25, 160, 160);
// intdiv()

// $arr = [{"apple":3},{"banana":4},{"orange":5}];
$arr = (object) array('apple' => 13,'banana' => 16,'orange' => 17);



// echo("<br>");
$n = 0;
foreach ($arr as $key => $value){
    echo($key." ".$value."<br>");
    if ($key == 'apple'){
        for ($k=0;$k<$value;$k+=1){
            $j = $k%$col;
            $i = intdiv($k,$col);
            // imagecopyresampled($back , $apple, 50+200*$n+64*$j, 100+64*$i, 0, 0, 50, 50, 64, 64);
        }
    }
    if ($key == 'banana'){
        for ($k=0;$k<$value;$k+=1){
            $j = $k%$col;
            $i = intdiv($k,$col);
            // imagecopyresampled($back , $orange, 50+200*$n+64*$j, 100+64*$i, 0, 0, 50, 50, 64, 64);
        }
    }
    if ($key == 'orange'){
        for ($k=0;$k<$value;$k+=1){
            $j = $k%$col;
            $i = intdiv($k,$col);
            // imagecopyresampled($back , $orange, 50+200*$n+64*$j, 100+64*$i, 0, 0, 50, 50, 64, 64);
        }
    }

    $n +=1;

}

$n = 13;
$col = 3;
for ($k=0;$k<$n;$k+=1){
    $j = $k%$col;
    $i = intdiv($k,$col);
    // imagecopyresampled($back , $apple, 100+64*$j, 100+64*$i, 0, 0, 50, 50, 64, 64);
}


// for ($i=0;$i<3;$i+=1){
//     for ($j=0;$j<4;$j+=1){
//         imagecopyresampled($back , $apple, 100+64*$j, 100+64*$i, 0, 0, 50, 50, 64, 64);
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