<?php
// Set the image dimensions
$width = 400;
$height = 400;

// Create a blank image
$image = imagecreatetruecolor($width, $height);

// Define colors
$white = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);

// Fill the background with white
imagefill($image, 0, 0, $white);

// Set the center point and radius
$centerX = $width / 2;
$centerY = $height / 2;
$radius = 150;

// Draw two lines to form an angle (45 degrees in this example)
imageline($image, $centerX, $centerY, $centerX + $radius, $centerY, $black);
imageline($image, $centerX, $centerY, $centerX + $radius * cos(deg2rad(45)), $centerY - $radius * sin(deg2rad(45)), $black);

// Add an arc to show the angle
imagearc($image, $centerX, $centerY, 100, 100, 0, 45, $black);

// Output the image
header('Content-Type: image/png');
imagepng($image);

// Free up memory
imagedestroy($image);
?>
