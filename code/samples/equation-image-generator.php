<?php
// Set up the image
$width = 300;
$height = 100;
$image = imagecreatetruecolor($width, $height);

// Define colors
$white = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);
$red = imagecolorallocate($image, 255, 0, 0);

// Fill the background
imagefill($image, 0, 0, $white);

// Set up the font (make sure you have this font file or change to an available font)
$font = './Inter.ttf';
$fontSize = 40;

// The equation
$equation = "2 * 3 = 5";

// Get the bounding box of the text
$bbox = imagettfbbox($fontSize, 0, $font, $equation);

// Calculate the position to center the text
$x = ceil(($width - $bbox[2]) / 2);
$y = ceil(($height - $bbox[5]) / 2);

// Draw the equation
imagettftext($image, $fontSize, 0, $x, $y, $black, $font, $equation);

// Draw a red line through the equation to indicate it's incorrect
$lineY = $y + 5;
imageline($image, 10, $lineY, $width - 10, $lineY, $red);

// Output the image
header('Content-Type: image/png');
imagepng($image);
imagedestroy($image);
?>
