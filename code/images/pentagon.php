<?php
require("lib_azimuth.php");

if (isset($_GET['s'])){$s = $_GET['s'];}else{$s=-1;}

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



$h = new Pentagon($draw,$s);
$draw = $h->out_print();


$image->drawImage($draw);
header('Content-type: image/png');
echo $image;


class Pentagon{
    public $draw;
    function __construct($draw,$s){
        $this->draw = $draw;

        $scale = 30;

        $x_start = 320;
        $y_start = 580;

        $scaled_s = $s * $scale;
        
        $dy1 = cos(deg_rad(18))*$scaled_s;
        $dx1 = sin(deg_rad(18))*$scaled_s;

        $dy2 = sin(deg_rad(34))*$scaled_s;
        $dx2 = cos(deg_rad(34))*$scaled_s;

        $coords = [
            array("x"=>$x_start+$scaled_s/2+$dx1, "y"=>$y_start-$dy1),
            array("x"=>$x_start+$scaled_s/2, "y"=>$y_start),
            array("x"=>$x_start-$scaled_s/2, "y"=>$y_start),
            array("x"=>$x_start-$scaled_s/2-$dx1, "y"=>$y_start-$dy1),
            array("x"=>$x_start-$scaled_s/2-$dx1+$dx2, "y"=>$y_start-$dy1-$dy2)
    ];

    $this->draw->line($coords[0]['x'],$coords[0]['y'],$coords[1]['x'],$coords[1]['y']);
    $this->draw->line($coords[1]['x'],$coords[1]['y'],$coords[2]['x'],$coords[2]['y']);
    $this->draw->line($coords[2]['x'],$coords[2]['y'],$coords[3]['x'],$coords[3]['y']);
    $this->draw->line($coords[3]['x'],$coords[3]['y'],$coords[4]['x'],$coords[4]['y']);
    $this->draw->line($coords[4]['x'],$coords[4]['y'],$coords[0]['x'],$coords[0]['y']);

    $font = 'Inter.ttf';
    $size = 12;
    $this->draw->setFontSize($size);
    $this->draw->setFont($font);
    $this->draw->setTextAlignment(2);
    $this->draw->setStrokeWidth(1);

    $text_out = $s;
    $bbox_a = imagettfbbox($size, 0, $font, $text_out);
    $text_x = abs($bbox_a[2]);
    $text_y = abs($bbox_a[5]);


    $this->draw->annotation(($coords[1]['x']+$coords[2]['x'])/2,($coords[1]['y']+$coords[2]['y'])/2+$text_y,$s);
    $this->draw->annotation(($coords[2]['x']+$coords[3]['x'])/2-$text_x/2,($coords[2]['y']+$coords[3]['y'])/2+$text_y,$s);
    $this->draw->annotation(($coords[3]['x']+$coords[4]['x'])/2,($coords[3]['y']+$coords[4]['y'])/2-$text_y/2,$s);
    $this->draw->annotation(($coords[4]['x']+$coords[0]['x'])/2,($coords[4]['y']+$coords[0]['y'])/2-$text_y/2,$s);
    $this->draw->annotation(($coords[0]['x']+$coords[1]['x'])/2+$text_x/2,($coords[0]['y']+$coords[1]['y'])/2+$text_y,$s);
    // $this->draw->annotation(100,100,$coords[0]["y"]);
    // $this->draw->annotation(100,100,$coords[0]["x"]);
    // $this->draw->annotation(100,100,$coords[0]["x"]);
    // $this->draw->line($coords[$coords_n-1]["x"],$coords[$coords_n-1]["y"],$coords[0]["x"],$coords[0]["y"]);



    }
    function out_print(){
        return $this->draw;
    }
}


?>