<?php

header("Content-type: image/png");
$string = $_GET['text'];
$im     = imagecreatefrompng("images/button1.png");
$back = imagecreatefrompng ("images/canvas.png");
$apple     = imagecreatefrompng("images/apple.png");
$banana     = imagecreatefrompng("images/banana.png");
// imageflip($im, IMG_FLIP_VERTICAL);
// imagecopymerge($back , $im, 100, 10, 0, 0, 100, 160, 160);
// imagecopyresampled($back , $im, 600, 290, 0, 0, 50, 50, 160, 160);
// imagecopyresampled($back , $im, 550, 300, 0, 0, 25, 25, 160, 160);
// intdiv()
for ($i=0;$i<3;$i+=1){
    for ($j=0;$j<4;$j+=1){
        imagecopyresampled($back , $apple, 100+64*$j, 100+64*$i, 0, 0, 50, 50, 64, 64);
    }
}

for ($i=0;$i<3;$i+=1){
    for ($j=0;$j<4;$j+=1){
        imagecopyresampled($back , $banana, 800+30*$j, 100+30*$i, 0, 0, 25, 25, 64, 64);
    }
}
// imagecopyresampled($back , $apple, 100, 100, 0, 0, 50, 50, 64, 64);
// imagecopyresampled($back , $apple, 100, 100, 0, 0, 50, 50, 64, 64);

// $orange = imagecolorallocate($im, 220, 210, 60);
// $px     = (imagesx($im) - 7.5 * strlen($string)) / 2;
// imagestring($im, 3, $px, 9, $string, $orange);
imagepng($back);
imagedestroy($back);

?>