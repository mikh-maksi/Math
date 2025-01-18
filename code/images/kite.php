<?php
function deg_rad($deg){
    return $deg*pi()/180;
}



if (isset($_GET['d1'])){$d1 = $_GET['d1'];}else {$d1 = -1;}
if (isset($_GET['d2'])){$d2 = $_GET['d2'];}else {$d2 = -1;}

if (isset($_GET['s'])){$s = $_GET['s'];}else {$s = -1;}

if (isset($_GET['nt'])){$nt = $_GET['nt'];}else {$nt = -1;}


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


$p = new Kite($draw,$d1,$d2,$s,$nt);
$draw = $p->out_print();



$image->drawImage($draw);
header('Content-type: image/png');
echo $image;

class Kite{
    public $draw;
    function __construct($draw,$d1,$d2,$s,$nt){
        $this->draw = $draw;
    
        $scale = 30;
        $base_y = 580;
        $center_x = 320;
        $alfa = 60;


        $font = 'Inter.ttf';
        $size = 12;
        $this->draw->setFontSize($size);
        $this->draw->setFont($font);
        $this->draw->setStrokeWidth(1);

        if (($d1!=-1) and ($d2!=-1)){
            $scaled_d1 = $d1*$scale;
            $scaled_d2 = $d2*$scale;

            $x1 = $center_x;
            $y1 = $base_y;

            $x2 = $x1-$scaled_d2/2;
            $y2 = $y1-$scaled_d1*3/4;

            $x3 = $x1;
            $y3 = $y1-$scaled_d1;

            $x4 = $x1+$scaled_d2/2;
            $y4 = $y2;


            // $this->draw->annotation(50,50,"{$x1} {$y1} {$x2} {$y2} {$coords[0]}");
            $this->draw->line($x1,$y1,$x2,$y2);
            $this->draw->line($x2,$y2,$x3,$y3);
            $this->draw->line($x3,$y3,$x4,$y4);
            $this->draw->line($x4,$y4,$x1,$y1);
            // $this->draw->line(50,100,200,200);
            $draw->setStrokeColor('#3333ff');
            $this->draw->line($x1,$y1,$x3,$y3);
            $this->draw->line($x2,$y2,$x4,$y4);
            $draw->setStrokeColor('#000000');



            $draw->setStrokeColor('#3333ff');
            $str = "{$d1}";
            $bbox_a = imagettfbbox($size, 0, $font, "{$str}");
            $text_x = abs($bbox_a[2]);
            $text_y = abs($bbox_a[5]);

            if ($nt!=1){
                $this->draw->annotation($center_x,$y3+$scaled_d1/2,$str);
            }

            $str = "{$d2}";
            $bbox_a = imagettfbbox($size, 0, $font, "{$str}");
            $text_x = abs($bbox_a[2]);
            $text_y = abs($bbox_a[5]);

            if ($nt!=1){
            $this->draw->annotation($center_x-$scaled_d2/4,$y2+$text_y,$str);
            }
            
            $draw->setStrokeColor('#000000');
        }
    }

    function out_print(){
        return $this->draw;
    }
}


?>