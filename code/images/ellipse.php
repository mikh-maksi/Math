<?php
$in = $_GET['in'];
$all = $_GET['all'];

$all_n = (int)($all);

$canavas_length = $all_n*64;
// Create a blank image.
$image = imagecreatetruecolor($canavas_length , 64);

// Select the background color.
$bg = imagecolorallocate($image, 235, 235, 255);

// Fill the background with the color selected above.
imagefill($image, 0, 0, $bg);

// Choose a color for the ellipse.
$col_ellipse = imagecolorallocate($image, 70, 20, 255);
$col_ellipse_outer = imagecolorallocate($image, 230, 230, 255);
$col_ellipse_outer_alfa   = imagecolorallocatealpha($image, 20, 20, 255, 90);
// Draw the ellipse.

$n = intval($all);
$color_n = intval($in);
// $col_ellipse = imagecolorallocate($image, 230, 230, 255);


for ($i = 0; $i < $n; $i++) {
    if ($i<$color_n)
        imagefilledellipse($image, $i*64+32, 32, 50, 50, $col_ellipse);

    imageellipse($image, $i*64+32, 32, 50, 50, $col_ellipse);
}


// imageellipse($image, 120, 50, 20, 20, $col_ellipse);
// imageellipse($image, 160, 50, 20, 20, $col_ellipse);

// imagefilledellipse($image, 200, 50, 30, 30, $col_ellipse_outer);
// imagefilledellipse($image, 200, 50, 20, 20, $col_ellipse);
// imagefilledellipse($image, 200, 50, 21, 21, $col_ellipse_outer_alfa);


imagefilter($image, IMG_FILTER_SMOOTH,8);
// Output the image.
header("Content-type: image/png");
imagepng($image);

?>