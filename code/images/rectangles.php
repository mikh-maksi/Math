<?php
if (isset($_GET['x1'])){$x1 = $_GET['x1'];}else {$x1 = 20;}
if (isset($_GET['y1'])){$y1 = $_GET['y1'];}else {$y1 = 20;}
if (isset($_GET['x2'])){$x2 = $_GET['x2'];}else {$x2 = 270;}
if (isset($_GET['y2'])){$y2 = $_GET['y2'];}else {$y2 = 270;}

if (isset($_GET['x1_2'])){$x1_2 = $_GET['x1_2'];}else {$x1_2 = 20;}
if (isset($_GET['y1_2'])){$y1_2 = $_GET['y1_2'];}else {$y1_2 = 20;}
if (isset($_GET['x2_2'])){$x2_2 = $_GET['x2_2'];}else {$x2_2 = 270;}
if (isset($_GET['y2_2'])){$y2_2 = $_GET['y2_2'];}else {$y2_2 = 520;}


if (isset($_GET['cx1'])){$cx1 = $_GET['cx1'];}else {$cx1 = -1;}
if (isset($_GET['cy1'])){$cy1 = $_GET['cy1'];}else {$cy1 = -1;}
if (isset($_GET['cx2'])){$cx2 = $_GET['cx2'];}else {$cx2 = -1;}
if (isset($_GET['cy2'])){$cy2 = $_GET['cy2'];}else {$cy2 = -1;}
if (isset($_GET['cx3'])){$cx3 = $_GET['cx3'];}else {$cx3 = -1;}
if (isset($_GET['cy3'])){$cy3 = $_GET['cy3'];}else {$cy3 = -1;}
if (isset($_GET['cx4'])){$cx4 = $_GET['cx4'];}else {$cx4 = -1;}
if (isset($_GET['cy4'])){$cy4 = $_GET['cy4'];}else {$cy4 = -1;}

if (isset($_GET['sc'])){$sc = $_GET['sc'];}else {$sc = -1;}
// if (isset($_GET['y2'])){$y2 = $_GET['y2'];}else {$y2 = 270;}


if (isset($_GET['d'])){$d = $_GET['d'];}else {$d = -1;}


$n=1;
if ((isset($_GET['x1_2']))&&(isset($_GET['y1_2']))&&(isset($_GET['x2_2']))&&(isset($_GET['y2_2']))){
    $n=2;
}

// if (isset($_GET['l'])){$l = $_GET['l'];}else{$l=-1;}


if (isset($_GET['a'])){$b = $_GET['a'];}else{$a=-1;}
if (isset($_GET['b'])){$a = $_GET['b'];}else{$b=-1;}
// if (isset($_GET['l2'])){$l2 = $_GET['l2'];}else{$l2=-1;}
// if (isset($_GET['l3'])){$l3 = $_GET['l3'];}else{$l3=-1;}



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
// $draw->rectangle(200, 200, 300, 300);



// $x1 = 100;
// $y1 = 100;

// $x2 = 200;
// $y2 = 200;

$coords = [$x1,$y1,$x2,$y2];
$c = [$cx1,$cy1,$cx2,$cy2,$cx3,$cy3,$cx4,$cy4];
$l = [$a,$b];

$r = new Reactangle($draw,$coords,1,$l,$d,$c,$sc);
$draw = $r->out_print();

if ($n==2){
    $coords = [$x1_2,$y1_2,$x2_2,$y2_2];
    $r = new Reactangle($draw,$coords,2,$l,$d,$c,$sc);
    $draw = $r->out_print();
}

$image->drawImage($draw);
header('Content-type: image/png');
echo $image;

class Reactangle{
    public $draw;
    function __construct($draw,$coords,$n,$l,$d,$c,$sc){
        $this->draw = $draw;
        if ($n == 2){
            $coords [0]+=320;
            $coords [2]+=320;
        }
        $x1 = $coords[0];
        $y1 = $coords[1];
        $x2 = $coords[2];
        $y2 = $coords[3];


        $cx1 = $c[0];
        $cy1 = $c[1];
        $cx2 = $c[2];
        $cy2 = $c[3];
        $cx3 = $c[4];
        $cy3 = $c[5];
        $cx4 = $c[6];
        $cy4 = $c[7];


        $a = $l[0];
        $b = $l[1];

        // $this->draw->annotation(50,50,"{$x1} {$y1} {$x2} {$y2} {$coords[0]}");
        $this->draw->line($x1,$y1,$x2,$y1);
        $this->draw->line($x2,$y1,$x2,$y2);
        $this->draw->line($x2,$y2,$x1,$y2);
        $this->draw->line($x1,$y2,$x1,$y1);
        // $this->draw->line(50,100,200,200);
        $draw->setStrokeColor('#ff00ff');
        if ($sc!=-1){
            $this->draw->line($x2,$y1,$x1+($x2-$x1)*$sc,$y1);
            $this->draw->line($x1+($x2-$x1)*$sc,$y1,$x1+($x2-$x1)*$sc,$y1+($y2-$y1)*$sc);
            $this->draw->line($x1+($x2-$x1)*$sc,$y1+($y2-$y1)*$sc,$x1,$y1+($y2-$y1)*$sc);
            $this->draw->line($x1,$y1+($y2-$y1)*$sc,$x1,$y2);


            // $this->draw->line($x2,$y1,$x1+($x2-$x1)*$sc,$y1);
            // $this->draw->line($x2,$y1,$x1+($x2-$x1)*$sc,$y1);
    

        }
        $draw->setStrokeColor('#000000');

        if ($d == 1){
            $this->draw->line(($x1+$x2)/2,$y1,($x1+$x2)/2,$y2);
            $this->draw->line($x1,($y2+$y1)/2,$x2,($y2+$y1)/2);
        }
        if ($d == 2){
            $this->draw->line($x1,$y1,$x2,$y2);
            // $this->draw->line($x1,($y2+$y1)/2,$x2,($y2+$y1)/2);
        }


        $font = 'Inter.ttf';
        $size = 12;
        $this->draw->setFontSize($size);
        $this->draw->setFont($font);
        $this->draw->setStrokeWidth(1);


        if (($cx1!=-1)&&($cy1!=-1)){
            $str = "({$cx1},{$cy1})";
            $bbox_a = imagettfbbox($size, 0, $font, "{$str}");
            $text_x = abs($bbox_a[2]);
            $text_y = abs($bbox_a[5]);
            $this->draw->annotation($x1-$text_x,$y1,$str);
        }
        if (($cx2!=-1)&&($cy2!=-1)){
            $str = "({$cx2},{$cy2})";
            $bbox_a = imagettfbbox($size, 0, $font, "{$str}");
            $text_x = abs($bbox_a[2]);
            $text_y = abs($bbox_a[5]);
            $this->draw->annotation($x2+$text_x/3,$y1,$str);
        }
        if (($cx3!=-1)&&($cy3!=-1)){
            $str = "({$cx3},{$cy3})";
            $bbox_a = imagettfbbox($size, 0, $font, "{$str}");
            $text_x = abs($bbox_a[2]);
            $text_y = abs($bbox_a[5]);
            $this->draw->annotation($x2+$text_x/3,$y2,$str);
        }
        if (($cx4!=-1)&&($cy4!=-1)){
            $str = "({$cx4},{$cy4})";
            $bbox_a = imagettfbbox($size, 0, $font, "{$str}");
            $text_x = abs($bbox_a[2]);
            $text_y = abs($bbox_a[5]);
            $this->draw->annotation($x1-$text_x,$y2,$str);
        }

        if ($a != -1){
            $bbox_a = imagettfbbox($size, 0, $font, "{$a}");
            $text_x = abs($bbox_a[2]);
            $text_y = abs($bbox_a[5]);

            $this->draw->annotation($x2+1,$y1+($y2-$y1)/2+$text_y/2-1,$a);
            $this->draw->annotation($x1-$text_x+1,$y1+($y2-$y1)/2+$text_y/2-1,$a);
        }
        if ($b != -1){
            $bbox_a = imagettfbbox($size, 0, $font, "{$b}");
            $text_x = abs($bbox_a[2]);
            $text_y = abs($bbox_a[5]);

            $this->draw->annotation($x1+($x2-$x1)/2-$text_x/2+1,$y1-2,$b);
            $this->draw->annotation($x1+($x2-$x1)/2-$text_x/2+1,$y2+$text_y,$b);
        }
    }

    function out_print(){
        return $this->draw;
    }
}


?>