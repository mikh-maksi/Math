<?php
header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);

$position = $t[0];
$type = $t[1];


$back = imagecreatefromjpeg ("../../images/canvas.jpg");

$sphere     = imagecreatefrompng("../../images/sphere.png");
$cube     = imagecreatefrompng("../../images/cube.png");
$cylinder     = imagecreatefrompng("../../images/cylinder.png");
$pyramid     = imagecreatefrompng("../../images/pyramid.png");


require("../../2dimages/lib/objects.php");


imagecopyresampled($back,$cube ,150, 150,   0, 0, 300, 300, 512, 512);


if ($position == 0){imagecopyresampled($back,$objects[$type] ,280, 150,   0, 0, 64, 64, 64, 64);}
if ($position == 1){imagecopyresampled($back,$objects[$type] ,220, 450,   0, 0, 64, 64, 64, 64);}
if ($position == 2){imagecopyresampled($back,$objects[$type] ,430, 360,   0, 0, 64, 64, 64, 64);}
if ($position == 3){imagecopyresampled($back,$objects[$type] ,260, 360,   0, 0, 64, 64, 64, 64);}
if ($position == 4){
    imagecopyresampled($back,$objects[$type] ,280, 100,   0, 0, 64, 64, 64, 64);
    imagecopyresampled($back,$objects[$type] ,220, 450,   0, 0, 64, 64, 64, 64);
    imagecopyresampled($back,$objects[$type] ,450, 280,   0, 0, 64, 64, 64, 64);
    imagecopyresampled($back,$objects[$type] ,100, 280,   0, 0, 64, 64, 64, 64);
}



// imageline($back,300,0,300,600, $black);
// imageline($back,0,300,600,300, $black);

imagepng($back);
imagedestroy($back);



    // $draw = new ImagickDraw ();
    // header("Content-Type: image/png");
    // $imagick = new Imagick(new ImagickPixel('rgba(0, 0, 0, 1)'));
    // $imagick->newImage(600,600, new ImagickPixel('white')); //max (x)+10, max(y)+10
    // $imagick->setImageFormat("png");
    // $draw->line(300,0,300,600);
    // // $clone = new Imagick("../../images/pencil.png");
    // // $draw->addImage($clone);
    // $imagick->drawImage($draw);
    // echo $imagick->getImageBlob();


    /* Create the objects */
    // $image = new Imagick('../../images/canvas.jpg');
    // $clone = new Imagick("../../images/pencil.png");
    // $image->addImage($clone);
    // $replace = new Imagick('replace.jpg');
    
    /* source.jpg is replaced with replace.jpg */
    // $image->setImage($replace);
    
    /* output the image */
    // header('Content-type: image/jpeg');
    // echo $image;
    
    
?>