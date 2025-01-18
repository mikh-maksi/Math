<?php
// $x1 = intval($_GET['x1']);
// $y1 = intval($_GET['y1']);
// $x2 = intval($_GET['x2']);
// $y2 = intval($_GET['y2']);

$x_c1 = 0;
$y_c1 = 0;
$x_c2 = 5;
$y_c2 = 5;

$x1 = 50+$x_c1*10;
$y1 = 50+$y_c1*10;
$x2 = 50+$x_c2*10;
$y2 = 50+$x_c2*10;



// Створення зображення 200 x 200
$canvas = imagecreatetruecolor(200, 200);

// Створення кольорів
$white = imagecolorallocate($canvas, 255, 255, 255);

// $x1 = 50;
// $y1 = 50;
// $x2 = 160;
// $y2 = 150;

// Прямокутники
imagerectangle($canvas, $x1, $y1, $x2, $y2, $white);
$text_correction = 5;// half of length of text
$line_margin = 2;

$length_top = $x_c2-$x_c1;
$length_left = $y_c2-$y_c1;
$length_right = $y_c2-$y_c1;
$length_bottom = $x_c2-$x_c1;

$angle_top = 90;
$angle_left = 90;
$angle_right = 90;
$angle_bottom = 90;

$angle_correction_x = 3;
$angle_correction_y = 0;
$angle_side_x = 16;
$angle_side_y = 13;



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


$x_top = ($x1+$x2)/2-$text_correction;
$y_top = $y1 - 13;

$x_left = $x1-2*$text_correction;
$y_left = ($y2 + $y1)/2-$text_correction/2;


$x_right =  $x2+$line_margin;
$y_right = ($y2 + $y1)/2-$text_correction/2;


$x_bottom = ($x1+$x2)/2-$text_correction/2;
$y_bottom =$y2 ;


// length
imagestring($canvas, 2, $x_top, $y_top, $length_top, $white);
imagestring($canvas, 2, $x_left, $y_left, $length_left , $white);
imagestring($canvas, 2, $x_right, $y_right, $length_right, $white);
imagestring($canvas, 2, $x_bottom, $y_bottom, $length_bottom, $white);

// angles
imagestring($canvas, 2, $x_angle_top_left, $y_angle_top_left, $angle_top, $white);
imagestring($canvas, 2, $x_angle_top_right, $y_angle_top_right, $angle_top, $white);
imagestring($canvas, 2, $x_angle_bottom_left, $y_angle_bottom_left, $angle_top, $white);
imagestring($canvas, 2, $x_angle_bottom_right, $y_angle_bottom_right, $angle_top, $white);


// Довжина лінії над серединою сторони
// Розмір курта в середині

// Вывод и освобождение памяти
header('Content-Type: image/jpeg');

imagejpeg($canvas);
imagedestroy($canvas);
?>