<?php
// Function to validate and parse fraction input
function parseFraction($input) {
    if (strpos($input, '/') !== false) {
        list($numerator, $denominator) = explode('/', $input);
        return [intval($numerator), intval($denominator)];
    } else {
        return [intval($input), 1];
    }
}

// Get fractions and result from GET parameters, with default values
$fraction1 = $_GET['fraction1'] ?? '1/2';
$fraction2 = $_GET['fraction2'] ?? '1/2';
$result = $_GET['result'] ?? '1';

// Parse fractions
list($num1, $den1) = parseFraction($fraction1);
list($num2, $den2) = parseFraction($fraction2);
list($numResult, $denResult) = parseFraction($result);

// Set up the image
$width = 400;
$height = 150;
$image = imagecreatetruecolor($width, $height);

// Define colors
$white = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);

// Fill the background
imagefill($image, 0, 0, $white);

// Set up the font (make sure you have this font file or change to an available font)
$font = './Inter.ttf';
$fontSize = 30;
$smallFontSize = 20;

// Function to draw a fraction
function drawFraction($image, $numerator, $denominator, $x, $y, $fontSize, $smallFontSize, $font, $color) {
    // Draw numerator
    $bbox = imagettfbbox($fontSize, 0, $font, $numerator);
    $numWidth = $bbox[2] - $bbox[0];
    imagettftext($image, $fontSize, 0, $x - $numWidth / 2, $y - 5, $color, $font, $numerator);
    
    // Draw denominator
    $bbox = imagettfbbox($fontSize, 0, $font, $denominator);
    $denWidth = $bbox[2] - $bbox[0];
    imagettftext($image, $fontSize, 0, $x - $denWidth / 2, $y + $fontSize + 5, $color, $font, $denominator);
    
    // Draw fraction line
    $lineWidth = max($numWidth, $denWidth);
    imageline($image, $x - $lineWidth / 2, $y, $x + $lineWidth / 2, $y, $color);
    
    return $lineWidth;
}

// Calculate positions
$centerY = $height / 2;
$spacing = 60;

// Draw first fraction
$x1 = 100;
drawFraction($image, $num1, $den1, $x1, $centerY, $fontSize, $smallFontSize, $font, $black);

// Draw plus sign
imagettftext($image, $fontSize, 0, $x1 + $spacing, $centerY + $fontSize / 2 - 5, $black, $font, '+');

// Draw second fraction
$x2 = $x1 + $spacing * 2;
drawFraction($image, $num2, $den2, $x2, $centerY, $fontSize, $smallFontSize, $font, $black);

// Draw equals sign
imagettftext($image, $fontSize, 0, $x2 + $spacing, $centerY + $fontSize / 2 - 5, $black, $font, '=');

// Draw result
$x3 = $x2 + $spacing * 2;
if ($denResult == 1) {
    imagettftext($image, $fontSize, 0, $x3, $centerY + $fontSize / 2 - 5, $black, $font, $numResult);
} else {
    drawFraction($image, $numResult, $denResult, $x3, $centerY, $fontSize, $smallFontSize, $font, $black);
}

// Output the image
header('Content-Type: image/png');
imagepng($image);
imagedestroy($image);
?>
