<?php
// Set up the image
$width = 800;
$height = 600;
$image = imagecreatetruecolor($width, $height);

// Define colors
$white = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);
$lightGray = imagecolorallocate($image, 240, 240, 240);

// Fill the background
imagefill($image, 0, 0, $white);

// Set up the font (make sure you have this font file or change to an available font)
$font = './Inter.ttf';

// Generate a random word problem
$items = ['apples', 'books', 'pencils', 'stickers', 'cookies'];
$item = $items[array_rand($items)];
$groupCount = rand(2, 5);
$itemsPerGroup = rand(3, 8);
$totalItems = $groupCount * $itemsPerGroup;

$problem = "Sarah has {$groupCount} baskets of {$item}. Each basket has {$itemsPerGroup} {$item}. How many {$item} does Sarah have in total?";

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
$instructions = "Solve this problem using multiplication or division.";
imagettftext($image, 14, 0, 20, $instructionY, $black, $font, $instructions);

// Create space for drawing
$drawingY = $instructionY + 50;
imagerectangle($image, 20, $drawingY, $width - 20, $drawingY + 200, $black);
imagettftext($image, 14, 0, 20, $drawingY - 20, $black, $font, "Draw your solution here:");

// Create space for equation
$equationY = $drawingY + 250;
imagerectangle($image, 20, $equationY, $width - 20, $equationY + 50, $black);
imagettftext($image, 14, 0, 20, $equationY - 20, $black, $font, "Write your equation here:");

// Output the image
header('Content-Type: image/png');
imagepng($image);
imagedestroy($image);
?>
