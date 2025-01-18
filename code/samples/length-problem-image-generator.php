<?php
// Set up the image
$width = 800;
$height = 600;
$image = imagecreatetruecolor($width, $height);

// Define colors
$white = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);
$blue = imagecolorallocate($image, 0, 0, 255);
$red = imagecolorallocate($image, 255, 0, 0);

// Fill the background
imagefill($image, 0, 0, $white);

// Set up the font (make sure you have this font file or change to an available font)
$font = './Inter.ttf';

// Generate a random word problem
$units = ['meters', 'centimeters', 'feet', 'inches'];
$unit = $units[array_rand($units)];
$length1 = rand(10, 50);
$length2 = rand(5, 20);
$operation = rand(0, 1) ? 'add' : 'subtract';

if ($operation == 'add') {
    $problem = "Tom has a blue ribbon that is {$length1} {$unit} long and a red ribbon that is {$length2} {$unit} long. If he ties them together, how long will the combined ribbon be?";
    $answer = $length1 + $length2;
} else {
    $problem = "Lisa has a piece of string {$length1} {$unit} long. She cuts off {$length2} {$unit}. How long is the remaining piece of string?";
    $answer = $length1 - $length2;
}

// Write the problem statement
$problemY = 50;
$wrappedText = wordwrap($problem, 60, "\n");
$lines = explode("\n", $wrappedText);
foreach ($lines as $line) {
    imagettftext($image, 16, 0, 20, $problemY, $black, $font, $line);
    $problemY += 30;
}

// Add instructions
$instructionY = $problemY + 30;
$instructions = "Solve this problem using addition or subtraction.";
imagettftext($image, 14, 0, 20, $instructionY, $black, $font, $instructions);

// Create space for drawing
$drawingY = $instructionY + 50;
imagerectangle($image, 20, $drawingY, $width - 20, $drawingY + 200, $black);
imagettftext($image, 14, 0, 20, $drawingY - 20, $black, $font, "Draw your solution here:");

// Create space for equation
$equationY = $drawingY + 250;
imagerectangle($image, 20, $equationY, $width - 20, $equationY + 50, $black);
imagettftext($image, 14, 0, 20, $equationY - 20, $black, $font, "Write your equation here:");

// Draw length illustration
$illustrationY = $instructionY + 30;
$scale = 5; // pixels per unit
$maxLength = max($length1, $length2);

if ($operation == 'add') {
    // Draw blue ribbon
    imageline($image, 20, $illustrationY, 20 + $length1 * $scale, $illustrationY, $blue);
    imagettftext($image, 12, 0, 20, $illustrationY - 5, $blue, $font, "{$length1} {$unit}");
    
    // Draw red ribbon
    imageline($image, 20, $illustrationY + 30, 20 + $length2 * $scale, $illustrationY + 30, $red);
    imagettftext($image, 12, 0, 20, $illustrationY + 45, $red, $font, "{$length2} {$unit}");
} else {
    // Draw original string
    imageline($image, 20, $illustrationY, 20 + $length1 * $scale, $illustrationY, $black);
    imagettftext($image, 12, 0, 20, $illustrationY - 5, $black, $font, "{$length1} {$unit}");
    
    // Draw cut portion
    imageline($image, 20 + ($length1 - $length2) * $scale, $illustrationY + 30, 20 + $length1 * $scale, $illustrationY + 30, $red);
    imagettftext($image, 12, 0, 20 + ($length1 - $length2) * $scale, $illustrationY + 45, $red, $font, "{$length2} {$unit}");
}

// Output the image
header('Content-Type: image/png');
imagepng($image);
imagedestroy($image);
?>
