<?php
if (isset($_GET['a'])){$a = $_GET['a'];}else {$a = 3;}
if (isset($_GET['b'])){$b = $_GET['b'];}else {$b = 8;}


if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='{"a":5,"b":6}';}
$t = json_decode($_GET['t']);

$a = $t->a;
$b = $t->b;

$image = new Imagick();
$image->newImage(640, 640, new ImagickPixel('white'));
$image->setImageFormat('png');

$draw = new ImagickDraw ();


$draw->setStrokeColor('#aaaaaa');
for ($i=0;$i<=64;$i+=1){
    $draw->line($i*10, 0, $i*10,640);
    $draw->line(0, $i*10, 640, $i*10);
}
$draw->setFillColor('#000000');
$draw->setStrokeColor('#000000');


$r = new Reactangle($draw,$a,$b);
$draw = $r->out_print();

$image->drawImage($draw);
header('Content-type: image/png');
echo $image;

class Reactangle{
    public $draw;
    function __construct($draw,$a,$b){
        $this->draw = $draw;
        $scale = 80;

        // central point 300 300
        $x_start = 300;
        $y_start = 300;


        $x1 = $x_start-$a/2*$scale;
        $y1 = $y_start-$b/2*$scale;
        $x2 = $x_start+$a/2*$scale;
        $y2 = $y_start+$b/2*$scale;

        $this->draw->setStrokeWidth(2);
        // $this->draw->annotation(50,50,"{$x1} {$y1} {$x2} {$y2} {$coords[0]}");
        $this->draw->line($x1,$y1,$x2,$y1);
        $this->draw->line($x2,$y1,$x2,$y2);
        $this->draw->line($x2,$y2,$x1,$y2);
        $this->draw->line($x1,$y2,$x1,$y1);
        // $this->draw->line(50,100,200,200);

        $draw->setStrokeColor('#000000');


        $font = 'Inter.ttf';
        $size = 24;
        $this->draw->setFontSize($size);
        $this->draw->setFont($font);
        // $this->draw->setStrokeWidth(2);

        if ($b != -1){
            $bbox_a = imagettfbbox($size, 0, $font, "{$b}");
            $text_x = abs($bbox_a[2]);
            $text_y = abs($bbox_a[5]);

            $this->draw->annotation($x2+1,$y1+($y2-$y1)/2+$text_y/2-1,$b);
            $this->draw->annotation($x1-$text_x+1,$y1+($y2-$y1)/2+$text_y/2-1,$b);
        }

        if ($a != -1){
            $bbox_a = imagettfbbox($size, 0, $font, "{$a}");
            $text_x = abs($bbox_a[2]);
            $text_y = abs($bbox_a[5]);

            $this->draw->annotation($x1+($x2-$x1)/2-$text_x/2+1,$y1-4,$a);
            $this->draw->annotation($x1+($x2-$x1)/2-$text_x/2+1,$y2+$text_y,$a);
        }
    }

    function out_print(){
        return $this->draw;
    }
}


?>