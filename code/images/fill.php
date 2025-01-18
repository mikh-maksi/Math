<?php

$im = imagecreatetruecolor(100, 100);

// установка красного фона
$red = imagecolorallocate($im, 255, 255, 255);
imagefill($im, 0, 0, $red);

header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
?>