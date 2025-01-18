<?php
$k = $_GET;


// print_r($k);
// echo($k[0]["All"]);
// $k = json_decode($t);

// print_r($k);

// echo(count($k));
// echo("<br>");
// echo($k[0]->All);
$max = $k[0]["All"];

// echo (count($k));
$n = count($k);
for ($i=1;$i<=$n;$i+=1){
    if ($max<$k[$i]["All"]){
        $max=$k[$i]["All"];
    }
}
// echo("<br>");
// echo $max;

// define("WIDTH", $max*64);
// define("HEIGHT", $n );

define("WIDTH", $max*64+64);
define("HEIGHT", $n * 64 );

$dest_image = imagecreatetruecolor(WIDTH, HEIGHT);

$b = imagecreatefrompng('images/circle_violet.png');
$c = imagecreatefrompng('images/circle_violet_plus.png');

$trans_background = imagecolorallocate($dest_image, 255, 255, 255);

imagefill($dest_image, 0, 0, $trans_background);

// The text to draw

// Replace path by your own font path
$font = 'Inter.ttf';

// Add some shadow to the text


//fill the image with a transparent background
imagefill($dest_image, 0, 0, $trans_background);

imagecopy($dest_image, $c, 64, 0, 0, 0, WIDTH, HEIGHT);
$line = $k[0]["N"];
for ($i = 0; $i < $n; $i++) {
    $text = ($i+1).')';
    imagettftext($dest_image, 48, 0, 0, $i*64-10+64, $grey, $font, $text);
    for ($j = 1; $j <= $k[$i]["All"]; $j++) {

        if ($j<$k[$i]["N"]){
            imagecopy($dest_image, $c, $j*64, $i*64, 0, 0, WIDTH, HEIGHT);
            imagefill($dest_image,  $j*64, $i*64, $trans_background);
            imagefill($dest_image,  $j*64+64, $i*64, $trans_background);
        }
        else
            imagecopy($dest_image, $b, $j*64, $i*64, 0, 0, WIDTH, HEIGHT);
            imagefill($dest_image,  $j*64, $i*64, $trans_background);
            imagefill($dest_image,  $j*64+64, $i*64, $trans_background);
    }
}

$trans_background = imagecolorallocate($dest_image, 255, 255, 255);

//fill the image with a transparent background
imagefill($dest_image, 0, 0, $trans_background);

header('Content-Type: image/png');
imagepng($dest_image);
?>