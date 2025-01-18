<?php
function deg_rad($deg){
    return $deg*pi()/180;
}



if (isset($_GET['base'])){$base = $_GET['base'];}else {$base = -1;}
if (isset($_GET['h'])){$h = $_GET['h'];}else {$h = -1;}



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




$p = new Parallelogram($draw,$h,$base);
$draw = $p->out_print();



$image->drawImage($draw);
header('Content-type: image/png');
echo $image;

class Parallelogram{
    public $draw;
    function __construct($draw,$h,$base){
        $this->draw = $draw;
       

        $scale = 30;
        $alfa = 30;
        $base_y = 580;
        $center_x = 320;
        
        $scaled_base = $base*$scale;
        $scaled_h = $h*$scale;


        $x1 = $center_x-$scaled_base/2;
        $y1 = $base_y;

        $x2 = $x1+$scaled_h*tan((deg2rad($alfa)));
        $y2 = $y1-$scaled_h;

        $x3 = $x2 + $scaled_base;
        $y3 = $y2;

        $x4 = $center_x+$scaled_base/2;
        $y4 = $base_y;




        // $this->draw->annotation(50,50,"{$x1} {$y1} {$x2} {$y2} {$coords[0]}");
        $this->draw->line($x1,$y1,$x2,$y2);
        $this->draw->line($x2,$y2,$x3,$y3);
        $this->draw->line($x3,$y3,$x4,$y4);
        $this->draw->line($x4,$y4,$x1,$y1);
        // $this->draw->line(50,100,200,200);
        $draw->setStrokeColor('#ff00ff');
        $this->draw->line($x2,$y1,$x2,$y2);
        $draw->setStrokeColor('#000000');


        $font = 'Inter.ttf';
        $size = 12;
        $this->draw->setFontSize($size);
        $this->draw->setFont($font);
        $this->draw->setStrokeWidth(1);

            
        $str = "{$base}";
        $bbox_a = imagettfbbox($size, 0, $font, "{$str}");
        $text_x = abs($bbox_a[2]);
        $text_y = abs($bbox_a[5]);

        $this->draw->annotation($center_x,$y1+$text_y,$str);

        $draw->setStrokeColor('#ff00ff');
        $str = "{$h}";
        $bbox_a = imagettfbbox($size, 0, $font, "{$str}");
        $text_x = abs($bbox_a[2]);
        $text_y = abs($bbox_a[5]);

        $this->draw->annotation($x2+$text_x/2,($y2+$y1)/2,$str);
        $draw->setStrokeColor('#000000');
        // if (($cx1!=-1)&&($cy1!=-1)){
        //     $str = "({$cx1},{$cy1})";
        //     $bbox_a = imagettfbbox($size, 0, $font, "{$str}");
        //     $text_x = abs($bbox_a[2]);
        //     $text_y = abs($bbox_a[5]);
        //     $this->draw->annotation($x1-$text_x,$y1,$str);
        // }
        // if (($cx2!=-1)&&($cy2!=-1)){
        //     $str = "({$cx2},{$cy2})";
        //     $bbox_a = imagettfbbox($size, 0, $font, "{$str}");
        //     $text_x = abs($bbox_a[2]);
        //     $text_y = abs($bbox_a[5]);
        //     $this->draw->annotation($x2+$text_x/3,$y1,$str);
        // }
        // if (($cx3!=-1)&&($cy3!=-1)){
        //     $str = "({$cx3},{$cy3})";
        //     $bbox_a = imagettfbbox($size, 0, $font, "{$str}");
        //     $text_x = abs($bbox_a[2]);
        //     $text_y = abs($bbox_a[5]);
        //     $this->draw->annotation($x2+$text_x/3,$y2,$str);
        // }
        // if (($cx4!=-1)&&($cy4!=-1)){
        //     $str = "({$cx4},{$cy4})";
        //     $bbox_a = imagettfbbox($size, 0, $font, "{$str}");
        //     $text_x = abs($bbox_a[2]);
        //     $text_y = abs($bbox_a[5]);
        //     $this->draw->annotation($x1-$text_x,$y2,$str);
        // }

        // if ($a != -1){
        //     $bbox_a = imagettfbbox($size, 0, $font, "{$a}");
        //     $text_x = abs($bbox_a[2]);
        //     $text_y = abs($bbox_a[5]);

        //     $this->draw->annotation($x2+1,$y1+($y2-$y1)/2+$text_y/2-1,$a);
        //     $this->draw->annotation($x1-$text_x+1,$y1+($y2-$y1)/2+$text_y/2-1,$a);
        // }
        // if ($b != -1){
        //     $bbox_a = imagettfbbox($size, 0, $font, "{$b}");
        //     $text_x = abs($bbox_a[2]);
        //     $text_y = abs($bbox_a[5]);

        //     $this->draw->annotation($x1+($x2-$x1)/2-$text_x/2+1,$y1-2,$b);
        //     $this->draw->annotation($x1+($x2-$x1)/2-$text_x/2+1,$y2+$text_y,$b);
        // }
    }

    function out_print(){
        return $this->draw;
    }
}


?>