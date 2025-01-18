<?php
header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);


$back = imagecreatefromjpeg ("../../images/canvas300_600.jpg");


$sphere     = imagecreatefrompng("../../images/sphere.png");
$cube     = imagecreatefrompng("../../images/cube.png");
$cylinder     = imagecreatefrompng("../../images/cylinder.png");
$pyramid     = imagecreatefrompng("../../images/pyramid.png");
$circle_ball = imagecreatefrompng("../../images/circle_ball.png");
$triangle = imagecreatefrompng("../../images/triangle.png");
$square = imagecreatefrompng("../../images/square.png");
$rectangle = imagecreatefrompng("../../images/rectangle.png");
$cone = imagecreatefrompng("../../images/cone.png");
$polygon = imagecreatefrompng("../../images/polygon.png");
$ellipse = imagecreatefrompng("../../images/ellipse.png");
$line = imagecreatefrompng("../../images/line.png");
$cuboid = imagecreatefrompng("../../images/cuboid.png");
$hexagon = imagecreatefrompng("../../images/hexagon.png");
$pentagon = imagecreatefrompng("../../images/pentagon.png");
$tetrahedron = imagecreatefrompng("../../images/tetrahedron.png");


$col = 2;
$k = 0;
$i = 0;
for($k=0;$k<2;$k+=1){
    $j = $k;
    if ($t[$k] =="sph"){imagecopyresampled($back,$sphere  , 300*$j, 300*$i ,0  , 0, 300, 300, 512, 512); }
    if ($t[$k] =="cb"){imagecopyresampled($back,$cube        , 300*$j, 300*$i  ,0, 0, 300, 300, 512, 512);}
    if ($t[$k] =="cyl"){imagecopyresampled($back,$cylinder   , 300*$j, 300*$i ,0  , 0, 300, 300, 512, 512);}
    if ($t[$k] =="pyr"){imagecopyresampled($back,$pyramid    , 300*$j, 300*$i,0, 0, 300, 300, 512, 512);}
    if ($t[$k] =="c"){imagecopyresampled($back,$circle_ball    , 300*$j, 300*$i,0, 0, 300, 300, 512, 512);}
    if ($t[$k] =="t"){imagecopyresampled($back,$triangle    , 300*$j, 300*$i,0, 0, 300, 300, 512, 512);}
    if ($t[$k] =="s"){imagecopyresampled($back,$square    , 300*$j, 300*$i,0, 0, 300, 300, 512, 512);}
    if ($t[$k] =="r"){imagecopyresampled($back,$rectangle    , 300*$j, 300*$i,0, 0, 300, 300, 512, 512);}
    if ($t[$k] =="cone"){imagecopyresampled($back,$cone    , 300*$j, 300*$i,0, 0, 300, 300, 512, 512);}
    if ($t[$k] =="poly"){imagecopyresampled($back,$polygon    , 300*$j, 300*$i,0, 0, 300, 300, 512, 512);}
    if ($t[$k] =="elli"){imagecopyresampled($back,$ellipse    , 5+300*$j, 300*$i,0, 0, 290, 290, 512, 512);}
    if ($t[$k] =="line"){imagecopyresampled($back,$line    , 5+300*$j, 300*$i,0, 0, 290, 290, 512, 512);}
    if ($t[$k] =="cuboid"){imagecopyresampled($back,$cuboid    , 5+300*$j, 300*$i,0, 0, 290, 290, 512, 512);}
    if ($t[$k] =="hexagon"){imagecopyresampled($back,$hexagon    , 5+300*$j, 300*$i+5,0, 0, 290, 290, 512, 512);}
    if ($t[$k] =="pentagon"){imagecopyresampled($back,$pentagon    , 5+300*$j, 300*$i+5,0, 0, 290, 290, 512, 512);}
    if ($t[$k] =="tetr"){imagecopyresampled($back,$tetrahedron    , 5+300*$j, 300*$i+5,0, 0, 290, 290, 512, 512);}
}



// imagecopyresampled($back,$circle_ball  ,0  , 0,   0, 0, 300, 300, 512, 512);
// imagecopyresampled($back,$cube         ,300, 0,   0, 0, 300, 300, 512, 512);
// imagecopyresampled($back,$cylinder     ,0  , 300, 0, 0, 300, 300, 512, 512);
// imagecopyresampled($back,$pyramid      ,300, 300, 0, 0, 300, 300, 512, 512);

imageline($back,300,0,300,600, $black);
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