<?php

$canvas = imagecreatetruecolor(200, 200);

$white = imagecolorallocate($canvas, 255, 255, 255);
$grey = imagecolorallocate($canvas, 200, 200, 200);
$black = imagecolorallocate($canvas, 0, 0, 0);

$font = 'Inter.ttf';
imagefill($canvas, 0, 0, $white);


for ($i=0;$i<20;$i+=1){
    imageline($canvas, $i*10, 0, $i*10, 200, $grey);
    imageline($canvas, 0, $i*10, 200, $i*10, $grey);
}

// $x_c1 = 0;
// $y_c1 = 0;
// $x_c2 = 7;
// $y_c2 = 5;


$x_c1 = intval($_GET['x1']);;
$y_c1 = intval($_GET['y1']);;
$x_c2 = intval($_GET['x2']);;
$y_c2 = intval($_GET['y2']);;



$x1 = 50+$x_c1*10;
$y1 = 50+$y_c1*10;
$x2 = 50+$x_c2*10;
$y2 = 50+$y_c2*10;



// Створення кольорів
$white = imagecolorallocate($canvas, 255, 255, 255);

// $x1 = 50;
// $y1 = 50;
// $x2 = 160;
// $y2 = 150;

// Прямокутники
imagerectangle($canvas, $x1, $y1, $x2, $y2, $black);
$text_correction_x = 3;// half of length of text
$text_correction_y = 4;// half of height of text
$line_margin = 2;

$length_top = $x_c2-$x_c1;
$length_left = $y_c2-$y_c1;
$length_right = $y_c2-$y_c1;
$length_bottom = $x_c2-$x_c1;

$angle_top = 90;
$angle_left = 90;
$angle_right = 90;
$angle_bottom = 90;

$angle_correction_x = 2;
$angle_correction_y = 12;
$angle_side_x = 16;
$angle_side_y = 14;



$x_angle_top_left = $x1+$angle_correction_x; 
$y_angle_top_left = $y1+$angle_correction_y; 

$x_angle_top_right = $x2+$angle_correction_x-$angle_side_x; 
$y_angle_top_right = $y1+$angle_correction_y; 

$x_angle_bottom_left = $x1+$angle_correction_x; 
$y_angle_bottom_left = $y2+$angle_correction_y-$angle_side_y; 

$x_angle_bottom_right = $x2+$angle_correction_x-$angle_side_x; 
$y_angle_bottom_right = $y2+$angle_correction_y-$angle_side_y; 

$x_angle_top = $x1+$angle_correction_x; 
$y_angle_top = $y1+$angle_correction_y; 


$x_top = ($x1+$x2)/2-$text_correction_x;
$y_top = $y1 - $text_correction_y/2;

$x_left = $x1-2*$text_correction_x-2;
$y_left = ($y2 + $y1)/2 + $text_correction_y;


$x_right =  $x2+$text_correction_x;
$y_right = ($y2 + $y1)/2+$text_correction_y;


$x_bottom = ($x1+$x2)/2-$text_correction_y/2;
$y_bottom =$y2+ $text_correction_y*2+2 ;


// length
$size = 8;
$angle = 0;
$text_x = 10;
$text_y = 10;

$bbox = imageftbbox($size, $angle, $font, $length_top);
$text = $bbox[0].' '.$bbox[1].' '.$bbox[2].' '.$bbox[3].' '.$bbox[4].' '.$bbox[5].' '.$bbox[6].' '.$bbox[7];
imagettftext($canvas, $size, $angle, 11, 21, $black, $font, $text);


imagettftext($canvas, $size, $angle, $x_top, $y_top, $black, $font,$length_top);
imagettftext($canvas, $size, $angle, $x_left, $y_left, $black, $font,$length_left);
imagettftext($canvas, $size, $angle, $x_right, $y_right, $black, $font,$length_right);
imagettftext($canvas, $size, $angle, $x_bottom, $y_bottom, $black, $font,$length_bottom);

// angles
imagettftext($canvas, $size, $angle, $x_angle_top_left, $y_angle_top_left, $black, $font,$angle_top);
imagettftext($canvas, $size, $angle, $x_angle_top_right, $y_angle_top_right, $black, $font,$angle_top);
imagettftext($canvas, $size, $angle, $x_angle_bottom_left, $y_angle_bottom_left, $black, $font,$angle_top);
imagettftext($canvas, $size, $angle, $x_angle_bottom_right, $y_angle_bottom_right, $black, $font,$angle_top);

// imagestring($canvas, 2, $x_angle_top_left, $y_angle_top_left, $angle_top, $black);
// imagestring($canvas, 2, $x_angle_top_right, $y_angle_top_right, $angle_top, $black);
// imagestring($canvas, 2, $x_angle_bottom_left, $y_angle_bottom_left, $angle_top, $black);
// imagestring($canvas, 2, $x_angle_bottom_right, $y_angle_bottom_right, $angle_top, $black);

$text = 'Text';









header('Content-type: image/png');
imagepng($canvas);
imagedestroy($canvas);

?>