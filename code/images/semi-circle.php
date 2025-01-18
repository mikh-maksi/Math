<?php
function deg_rad($deg){
    return $deg*pi()/180;
}



if (isset($_GET['d'])){$d = $_GET['d'];}else {$d = -1;}



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


$p = new SemiCircle($draw,$d);
$draw = $p->out_print();



$image->drawImage($draw);
header('Content-type: image/png');
echo $image;

class SemiCircle{
    public $draw;
    function __construct($draw,$d){
        $this->draw = $draw;
    
        $scale = 30;
        $center_y = 320;
        $center_x = 320;
        $scaled_d = $d*$scale;

        $font = 'Inter.ttf';
        $size = 12;
        $this->draw->setFontSize($size);
        $this->draw->setFont($font);
        $this->draw->setStrokeWidth(1);

        $scaled_d = $d*$scale;
        // $this->draw->arc($center_x,  $center_y,  $center_x, $center_y+$scaled_d, 0, 180,"#000000");
        
        
        $this->draw->arc($center_x-$scaled_d/2,  $center_y-$scaled_d/2, $center_x+$scaled_d/2,  $center_y+$scaled_d/2, 270, 90);
        

            
        $str = "{$d}";
        $bbox_a = imagettfbbox($size, 0, $font, "{$str}");
        $text_x = abs($bbox_a[2]);
        $text_y = abs($bbox_a[5]);



        $draw->setStrokeColor('#0000ff');
        $this->draw->line($center_x,$center_y-$scaled_d/2,$center_x,$center_y+$scaled_d/2);
        $this->draw->annotation($center_x-$text_x,$center_y,$str);
        // $this->draw->arc(100,  100, 200, 200, 270, 90);
        // $this->draw->circle(100,  100, 102, 100);
        // $this->draw->circle(200,  200, 202, 200);
      
    }

    function out_print(){
        return $this->draw;
    }
}


?>