<?php
function deg_rad($deg){
    return $deg*pi()/180;
}


if (isset($_GET['a'])){$a = $_GET['a'];}else {$a = 0;}
if (isset($_GET['b'])){$b = $_GET['b'];}else {$b = 0;}
if (isset($_GET['c'])){$c = $_GET['c'];}else {$c = 0;}




$image = new Imagick();
$image->newImage(640, 640, new ImagickPixel('white'));
$image->setImageFormat('png');

$draw = new ImagickDraw ();

$draw->setStrokeColor('#aaaaaa');
for ($i=0;$i<=64;$i+=1){
    $draw->line($i*10, 0, $i*10,640);
    $draw->line(0, $i*10, 640, $i*10);
}
$draw->setFillColor('#FFFFFF');
$draw->setStrokeColor('#000000');


$eq_el = [$a,$b,$c];

$p = new Parabola($draw,$eq_el);
$draw = $p->out_print();



$image->drawImage($draw);
header('Content-type: image/png');
echo $image;

class Parabola{
    public $draw;
    function __construct($draw,$eq_el){
        $this->draw = $draw;
    
        $a = $eq_el[0];
        $b = $eq_el[1];
        $c = $eq_el[2];


        $scale = 30;
        $base_y = 580;
        $center_x = 320;

        $font = 'Inter.ttf';
        $size = 12;
        $this->draw->setFontSize($size);
        $this->draw->setFont($font);
        $this->draw->setStrokeWidth(1);

        $draw->setStrokeColor('#000000');
        $this->draw->line(0,320,640,320);
        $this->draw->line(320,0,320,640);



        $draw->setFillColor('#ff00ff');
        $draw->setStrokeColor('#ff00ff');



        $previous_x = 320*$scale+320;
        $previous_y = -320*$scale+320;

        for ($x = -320; $x < 320; $x+=0.01) {
            
            $y = sqrt($b*$x**2/$a+$c);
            $out_x = $x*$scale+320;
            $out_y = -$y*$scale+320;
            
            // $draw->point($out_x, $out_y);
            $draw->line($previous_x, $previous_y, $out_x, $out_y);

            $previous_x = $out_x;
            $previous_y = $out_y;
        }


        $previous_x = 320*$scale+320;
        $previous_y = -320*$scale+320;

        for ($x = -320; $x < 320; $x+=0.01) {
            
            $y = -sqrt($b*$x**2/$a+$c);
            $out_x = $x*$scale+320;
            $out_y = -$y*$scale+320;
            
            // $draw->point($out_x, $out_y);
            $draw->line($previous_x, $previous_y, $out_x, $out_y);

            $previous_x = $out_x;
            $previous_y = $out_y;
        }
   
        
    }

    function out_print(){
        return $this->draw;
    }
}


?>