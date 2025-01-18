<?php
// Довільний чотирикутник за існуючими координатами вершин.
// x1,y1,x2,y2,x3,y3,x4,y4
// Блок обрахунків - довжини та кути
// Блок виводу

$q = new quadrangle(50,20,300,30,380,350,50,380);

class quadrangle{
    private $draw;
    function __construct($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4){
        // $this->draw = new ImagickDraw ();
        // $this->draw_quadrangle($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4);
        

        $sides = $this->calc_side_length($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4);
        print_r($sides);
        echo("<br>");

        $angles = $this->calc_side_angle($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4);
        print_r($angles);

        // header("Content-Type: image/png");
        // $imagick = new Imagick(new ImagickPixel('rgba(0, 0, 0, 1)'));
        // $imagick->newImage(400,400, new ImagickPixel('white')); //max (x)+10, max(y)+10
        // $imagick->setImageFormat("png");
        // $imagick->drawImage($this->draw);


        // header("Content-Type: image/png");
        // echo $imagick->getImageBlob();
    }

    function draw_quadrangle($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4){
        $d = $this->draw;
        
        $d->setStrokeColor(new ImagickPixel('rgba(0, 0, 0, 1)'));
        $d->setStrokeWidth(2);

        $d->line($x1,$y1, $x2,$y2);
        $d->line($x2,$y2, $x3,$y3);
        $d->line($x3,$y3, $x4,$y4);
        $d->line($x4,$y4, $x1,$y1);
    }
    function calc_side_length($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4){
        $l1 = round(sqrt(($x1-$x2)**2+($y1-$y2)**2),1);
        $l2 = round(sqrt(($x2-$x3)**2+($y2-$y3)**2),1);
        $l3 = round(sqrt(($x3-$x4)**2+($y3-$y4)**2),1);
        $l4 = round(sqrt(($x4-$x1)**2+($y4-$y1)**2),1);
        $side_length = [$l1,$l2,$l3,$l4];
        return $side_length; 
    }
    function calc_side_angle($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4){
        // (50,20,300,150,380,350,50,380)
        $dx4 = ($x1-$x4);
        $dy4 = ($y1-$y4);

        $dx1 = ($x2-$x1);
        $dy1 = ($y2-$y1);

        $dx2 = ($x3-$x2);
        $dy2 = ($y3-$y2);

        $dx3 = ($x4-$x3);
        $dy3 = ($y4-$y3);

        $a1 = round(acos((-$dx4*$dx1+-$dy4*$dy1)/(sqrt(($dx4)**2+$dy4**2)*sqrt($dx1**2+$dy1**2)))*180/pi(),0);
        $a2 = round(acos((-$dx1*$dx2+-$dy1*$dy2)/(sqrt($dx1**2+$dy1**2)*sqrt($dx2**2+$dy2**2)))*180/pi(),0);
        $a3 = round(acos((-$dx2*$dx3+-$dy2*$dy3)/(sqrt($dx2**2+$dy2**2)*sqrt($dx3**2+$dy3**2)))*180/pi(),0);
        $a4 = round(acos((-$dx3*$dx4+-$dy3*$dy4)/(sqrt($dx3**2+$dy3**2)*sqrt($dx4**2+$dy4**2)))*180/pi(),0);
        $side_angle = [$a1,$a2,$a3,$a4];
        return $side_angle; 
    }


    // function calc_side_angle($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4){
    //     $dx4 = ($x1-$x4);
    //     $dy4 = ($y1-$y4);

    //     $dx1 = ($x2-$x1);
    //     $dy1 = ($y2-$y1);

    //     $dx2 = ($x3-$x2);
    //     $dy2 = ($y3-$y2);

    //     $dx3 = ($x4-$x3);
    //     $dy3 = ($y4-$y3);

    //     $a1 = round(acos(($dx4*$dx1+$dy4*$dy1)/(sqrt($dx4**2+$dy4**2)*sqrt($dx1**2+$dy1**2)))*180/pi(),0);
    //     $a2 = round(acos(($dx1*$dx2+$dy1*$dy2)/(sqrt($dx1**2+$dy1**2)*sqrt($dx2**2+$dy2**2)))*180/pi(),0);
    //     $a3 = round(acos(($dx2*$dx3+$dy2*$dy3)/(sqrt($dx2**2+$dy2**2)*sqrt($dx3**2+$dy3**2)))*180/pi(),0);
    //     $a4 = round(acos(($dx3*$dx4+$dy3*$dy4)/(sqrt($dx3**2+$dy3**2)*sqrt($dx4**2+$dy4**2)))*180/pi(),0);
    //     $side_angle = [$a1,$a2,$a3,$a4];
    //     return $side_angle; 
    // }

}

?>