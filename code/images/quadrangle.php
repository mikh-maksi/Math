<?php
// Довільний чотирикутник за існуючими координатами вершин.
// x1,y1,x2,y2,x3,y3,x4,y4
// Блок обрахунків - довжини та кути
// Блок виводу: довжина сторін.
// Блок виводу: кути
// Блок виводу: корегування розміщення чифр за умови розміру кутів.


// $q = new quadrangle(50,20,300,20,380,350,50,380);


if (isset($_GET['x1'])){$x1 = $_GET['x1'];}else {$x1 = 50;}
if (isset($_GET['y1'])){$y1 = $_GET['y1'];}else {$y1 = 20;}
if (isset($_GET['x2'])){$x2 = $_GET['x2'];}else {$x2 = 300;}
if (isset($_GET['y2'])){$y2 = $_GET['y2'];}else {$y2 = 150;}
if (isset($_GET['x3'])){$x3 = $_GET['x3'];}else {$x3 = 380;}
if (isset($_GET['y3'])){$y3 = $_GET['y3'];}else {$y3 = 350;}
if (isset($_GET['x4'])){$x4 = $_GET['x4'];}else {$x4 = 50;}
if (isset($_GET['y4'])){$y4 = $_GET['y4'];}else {$y4 = 380;}


$q = new quadrangle($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4);

class quadrangle{
    private $draw;
    private $coord;
    private $length;
    private $angles;
    
    function __construct($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4){
        $this->coord = [$x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4];
        $this->draw = new ImagickDraw ();
        
        $this->draw->setStrokeColor('#aaaaaa');
        for ($i=0;$i<=64;$i+=1){
            $this->draw->line($i*10, 0, $i*10,640);
            $this->draw->line(0, $i*10, 640, $i*10);
        }
        $this->draw->setStrokeColor('#000000');

        $this->draw_quadrangle();
        $this->length = $this->calc_side_length();
        $this->angles = $this->calc_side_angle();
        $this->text_quadrangle();


        
        header("Content-Type: image/png");
        $imagick = new Imagick(new ImagickPixel('rgba(0, 0, 0, 1)'));
        $imagick->newImage(640,640, new ImagickPixel('white')); //max (x)+10, max(y)+10
        $imagick->setImageFormat("png");
        // $this->grid($this->draw);



        $imagick->drawImage($this->draw);


        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }
    function grid($canvas) {
        $grey = imagecolorallocate($canvas, 200, 200, 200);
        for ($i=0;$i<=64;$i+=1){
            imageline($canvas, $i*10, 0, $i*10, 640, $grey);
            imageline($canvas, 0, $i*10, 640, $i*10, $grey);
        }
      }


    function draw_quadrangle(){
        $d = $this->draw;
        $c = $this->coord;
        
        $d->setStrokeColor(new ImagickPixel('rgba(0, 0, 0, 1)'));
        $d->setStrokeWidth(2);

        $d->line($c[0],$c[1], $c[2],$c[3]);
        $d->line($c[2],$c[3], $c[4],$c[5]);
        $d->line($c[4],$c[5], $c[6],$c[7]);
        $d->line($c[6],$c[7], $c[0],$c[1]);
    }


    function calc_side_length(){
        $c = $this->coord;
        $l1 = round(sqrt(($c[0]-$c[2])**2+($c[1]-$c[3])**2));
        $l2 = round(sqrt(($c[2]-$c[4])**2+($c[3]-$c[5])**2));
        $l3 = round(sqrt(($c[4]-$c[6])**2+($c[5]-$c[7])**2));
        $l4 = round(sqrt(($c[6]-$c[0])**2+($c[7]-$c[1])**2));
        $side_length = [$l1,$l2,$l3,$l4];
        return $side_length; 

    }
    function text_quadrangle(){
        $d = $this->draw;
        $c = $this->coord;
        $l = $this->length;
        $a = $this->angles;
        

        $d->setStrokeWidth(1);
        $font = 'Inter.ttf';
        $size = 16;
        $d->setFontSize($size);
        
        $d->setFont($font);

        // $d->setFontStyle(\Imagick::STYLE_ITALIC);
        $bbox = imagettfbbox($size, 0, $font, $l[3]);
        $bbox_a = imagettfbbox($size, 0, $font, $a[1]);
        
        $size = 12;

        $bbox_a = imagettfbbox($size, 0, $font, $a[1]);
        $d->setFontSize($size);
        // $d->annotation(70,200, "x1={$c[0]} y1={$c[1]} x2={$c[2]} y2={$c[3]} ");
        // $d->annotation(70,250, "x3={$c[4]} y3={$c[5]} x4={$c[6]} y4={$c[7]} ");
        // $d->annotation(70,300, "{$bbox[0]} {$bbox[1]} {$bbox[2]} {$bbox[3]}  {$bbox[4]} {$bbox[5]} {$bbox[6]} {$bbox[7]}");
        // $d->annotation(70,350, "{$a[0]} {$a[1]} {$a[2]} {$a[3]}  {$a[4]} {$a[5]} {$a[6]} {$a[7]}");

        $d->setTextAlignment(3);
        $d->annotation($c[2]-2,$c[3]+12, "{$a[1]}");
        $d->annotation($c[4]-8,$c[5]-2, "{$a[2]}");

        $d->setTextAlignment(1);
        $d->annotation($c[6]+2,$c[7]-5, "{$a[3]}");
        $d->annotation($c[0]+2,$c[1]+22, "{$a[0]}");

        $d->setFontSize($size);
        $d->setTextAlignment(1);
        $d->annotation(($c[2]+$c[0])/2,($c[3]+$c[1])/2-3, $l[0]);
        $d->annotation(($c[4]+$c[2])/2+2,($c[5]+$c[3])/2, $l[1]);
        $d->annotation(($c[6]+$c[4])/2,($c[7]+$c[5])/2+12, $l[2]);
        $d->setTextAlignment(3);
        $d->annotation(($c[0]+$c[6])/2-3,($c[1]+$c[7])/2, $l[3]);
        // $d->annotation(($c[2]-$c[0])/2,($c[3]-$c[1])/2, $l[0]);
        // $d->annotation(($c[2]-$c[0])/2,($c[3]-$c[1])/2, $l[0]);
    }
    function calc_side_angle(){
        $c = $this->coord;

        $dx4 = ($c[0]-$c[6]);
        $dy4 = ($c[1]-$c[7]);

        $dx1 = ($c[2]-$c[0]);
        $dy1 = ($c[3]-$c[1]);

        $dx2 = ($c[4]-$c[2]);
        $dy2 = ($c[5]-$c[3]);

        $dx3 = ($c[6]-$c[4]);
        $dy3 = ($c[7]-$c[5]);

        $a1 = round(acos((-$dx4*$dx1+-$dy4*$dy1)/(sqrt(($dx4)**2+$dy4**2)*sqrt($dx1**2+$dy1**2)))*180/pi(),0);
        $a2 = round(acos((-$dx1*$dx2+-$dy1*$dy2)/(sqrt($dx1**2+$dy1**2)*sqrt($dx2**2+$dy2**2)))*180/pi(),0);
        $a3 = round(acos((-$dx2*$dx3+-$dy2*$dy3)/(sqrt($dx2**2+$dy2**2)*sqrt($dx3**2+$dy3**2)))*180/pi(),0);
        $a4 = round(acos((-$dx3*$dx4+-$dy3*$dy4)/(sqrt($dx3**2+$dy3**2)*sqrt($dx4**2+$dy4**2)))*180/pi(),0);
        $side_angle = [$a1,$a2,$a3,$a4];
        return $side_angle; 
    }

}

?>