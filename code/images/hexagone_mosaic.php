<?php
require("lib_azimuth.php");



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



$h = new Hexagone($draw,-65,10);
$draw = $h->out_print();

$h = new Hexagone($draw,110,10);
$draw = $h->out_print();

$h = new Hexagone($draw,285,10);
$draw = $h->out_print();


$h = new Hexagone($draw,22,160);
$draw = $h->out_print();

$h = new Hexagone($draw,197,160);
$draw = $h->out_print();


$h = new Hexagone($draw,-65,310);
$draw = $h->out_print();

$h = new Hexagone($draw,110,310);
$draw = $h->out_print();

$h = new Hexagone($draw,285,310);
$draw = $h->out_print();

$image->drawImage($draw);
header('Content-type: image/png');
echo $image;


class Hexagone{
    public $draw;
    function __construct($draw,$x_start,$y_start){
        $this->draw = $draw;
        $dx = cos(deg_rad(30))*100;
        $dy = sin(deg_rad(30))*100;
        $n = 1;
        
        $coords = [
            array("x"=>$x_start+$n*210, "y"=>$y_start,"name"=>'',"angle"=>''),
            array("x"=>$x_start-$dx+$n*210, "y"=>$y_start+$dy,"name"=>'',"angle"=>''),
            array("x"=>$x_start-$dx+$n*210, "y"=>$y_start+$dy+100,"name"=>'',"angle"=>''),
            array("x"=>$x_start+$n*210, "y"=>$y_start+$dy*2+100,"name"=>'',"angle"=>''),
            array("x"=>$x_start+$dx+$n*210, "y"=>$y_start+$dy+100,"name"=>'',"angle"=>''),
            array("x"=>$x_start+$dx+$n*210, "y"=>$y_start+$dy,"name"=>'',"angle"=>''),
    ];
    $x1 = $coords[1]["x"];
    $y1 = $coords[1]["y"];
    $x2 = $coords[0]["x"];
    $y2 = $coords[0]["y"];
    $x3 = $coords[2]["x"];
    $y3 = $coords[2]["y"];

    $vect_angle = vectors_angle($x1,$y1,$x2,$y2,$x3,$y3);
    $coord = angle_azimuth_coord($x1,$y1,$x2,$y2,$x3,$y3);

    // $this->draw->annotation($coord[0],$coord[1],"a");


    $x1 = $coords[2]["x"];
    $y1 = $coords[2]["y"];
    $x2 = $coords[3]["x"];
    $y2 = $coords[3]["y"];
    $x3 = $coords[4]["x"];
    $y3 = $coords[4]["y"];

    $vect_angle = vectors_angle($x1,$y1,$x2,$y2,$x3,$y3);
    $coord = angle_azimuth_coord($x1,$y1,$x2,$y2,$x3,$y3);


    // $this->draw->annotation(100,100,$vect_angle);
    // $this->draw->annotation(100,120,$coord[0]);
    // $this->draw->annotation(100,140,$coord[1]);
    // $this->draw->annotation($coord[0],$coord[1],"b");

    $coords_n = count($coords);
    $max_x = $coords[0]["x"];
    $max_y = $coords[0]["y"];
    $min_x = $coords[0]["x"];
    $min_y = $coords[0]["y"];
    for ($i=1;$i<$coords_n;$i+=1){
        if ($max_x<$coords[$i]["x"]){$max_x=$coords[$i]["x"];}
        if ($max_y<$coords[$i]["y"]){$max_y=$coords[$i]["y"];}
        if ($min_x>$coords[$i]["x"]){$min_x=$coords[$i]["x"];}
        if ($min_y>$coords[$i]["y"]){$min_y=$coords[$i]["y"];}
    }
    $center_x = ($max_x+$min_x)/2;
    $center_y = ($max_y+$min_y)/2;
    // $this->draw->circle($center_x,$center_y,$center_x+1,$center_y+1);
    $coords_n = count($coords);
    for ($i=0;$i<$coords_n;$i+=1){
        if ($i<$coords_n-1){$j = $i+1;} else {$j = 0;}
        if ($i>0){$k=$i-1;} else {$k = $coords_n-1;}
        
        $x1 = $coords[$i]["x"]; $y1 = $coords[$i]["y"]; $x2 = $coords[$j]["x"]; $y2 = $coords[$j]["y"];

        $this->draw->line($x1,$y1,$x2,$y2);
        

        $font = 'Inter.ttf';
        $size = 12;
        $this->draw->setFontSize($size);
        $this->draw->setFont($font);
        $this->draw->setTextAlignment(2);
        $this->draw->setStrokeWidth(1);

        $middle_x = $x1+ ($x2-$x1)/2;
        $middle_y = $y1+ ($y2-$y1)/2;

        if ($center_x>$middle_x){$sign_x = -1;} elseif ($center_x<$middle_x) {$sign_x = 1;} else {$sign_x = 0;}
        if ($center_y>$middle_y){$sign_y = 0;} elseif ($center_y<$middle_y) {$sign_y = 1;} else {$sign_y = 0;}

        $text_out = $coords[$i]["name"];
        $bbox_a = imagettfbbox($size, 0, $font, $text_out);
        $text_x = abs($bbox_a[2]);
        $text_y = abs($bbox_a[5]);

        // $this->draw->annotation(120,100,$text_x);
        // $this->draw->annotation(120,120,$text_y);

        $coord_text_x = $middle_x+$sign_x*$text_x/2;
        $coord_text_y = $middle_y+$sign_y*$text_y;


        $this->draw->annotation($coord_text_x,$coord_text_y,$text_out);

        $x1 = $coords[$i]["x"];
        $y1 = $coords[$i]["y"];
        $x2 = $coords[$k]["x"];
        $y2 = $coords[$k]["y"];
        $x3 = $coords[$j]["x"];
        $y3 = $coords[$j]["y"];
    
        $this->draw->setTextAlignment(1);

        $angle = $coords[$i]["angle"];

        $vect_angle = vectors_angle($x1,$y1,$x2,$y2,$x3,$y3);
        $coord = angle_text_coord($x1,$y1,$x2,$y2,$x3,$y3,$angle);
        
        $this->draw->annotation($coord[0],$coord[1],  $angle);


    }
    // $this->draw->annotation(100,100,$coords[0]["x"]);
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