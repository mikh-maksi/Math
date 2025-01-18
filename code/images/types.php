<?php
function deg_rad($deg){
    return $deg*pi()/180;
}
// Довільний чотирикутник за існуючими координатами вершин.
// x1,y1,x2,y2,x3,y3,x4,y4
// Блок обрахунків - довжини та кути
// Блок виводу: довжина сторін.
// Блок виводу: кути
// Блок виводу: корегування розміщення чифр за умови розміру кутів.


// $q = new quadrangle(50,20,300,20,380,350,50,380);
// $q = new quadrangle(10,10,110,10,110,110,10,110);

if (isset($_GET['s'])){$s = $_GET['s'];} else  {$s = -1;} //square
if (isset($_GET['c'])){$c = $_GET['c'];} else  {$c = -1;} //circle
if (isset($_GET['t'])){$t = $_GET['t'];} else  {$t = -1;} //triangle
if (isset($_GET['r'])){$r = $_GET['r'];} else  {$r = -1;} //rectangle
if (isset($_GET['p'])){$p = $_GET['p'];} else  {$p = -1;} //parallelogram
if (isset($_GET['h'])){$h = $_GET['h'];} else  {$h = -1;} //hexagon
if (isset($_GET['rh'])){$rh = $_GET['rh'];} else  {$rh = -1;} //rhombus

$figures = [$s,$c,$t,$r,$p,$h,$rh];

$t = new types($figures);


class types {
    public $draw;
    public $positive_numbers;
    function __construct($figures){
        $s = $figures[0];
        $c = $figures[1];
        $t = $figures[2];
        $r = $figures[3];
        $p = $figures[4];
        $h = $figures[5];
        $rh = $figures[6];


        $this->draw = new ImagickDraw ();
        header("Content-Type: image/png");
        $imagick = new Imagick(new ImagickPixel('rgba(0, 0, 0, 1)'));
        $imagick->newImage(640,640, new ImagickPixel('white')); //max (x)+10, max(y)+10
        $imagick->setImageFormat("png");

        // $this->draw;
        // $this->coord;
        
        $this->draw->setStrokeColor(new ImagickPixel('rgba(0, 0, 0, 1)'));
        $this->draw->setStrokeWidth(2);



        $this->draw->setStrokeWidth(4);
        $this->draw->setTextAlignment(1);
        $font = 'Inter.ttf';
        $size = 32;
        $this->draw->setFontSize($size);
        $this->draw->setFont($font);

        $this->letters = ['A','B','C','D'];

        $positive_numbers= 0;
        for($i=0;$i<count($figures);$i+=1){
            if ($figures[$i]>-1){
                $positive_numbers+=1;
            }
        }
        $this->positive_numbers=$positive_numbers;
        $letters = ['A','B','C','D'];

        if ($positive_numbers <=3){
            $annotations_x = [100,310,520];
            for ($i=0;$i<$positive_numbers;$i+=1){
                $this->draw->annotation($annotations_x[$i],240, $letters[$i]);
            }
        }else{
            $annotations_x = [100,520,100,520];
            $annotations_y = [240,240,480,480];

            for ($i=0;$i<$positive_numbers;$i+=1){
                $this->draw->annotation($annotations_x[$i],$annotations_y[$i], $letters[$i]);
            }

            $this->draw->setStrokeWidth(2);

        // $this->square($s);

        }
        if ($s!=-1){$this->square($s);}
        if ($r!=-1){$this->rectangle($r);}
        if ($c!=-1){$this->circle($c);}
        if ($t!=-1){$this->triangle($t);}
        if ($p!=-1){$this->paralelogram($p);}
        if ($h!=-1){$this->hexagon($h);}
        if ($rh!=-1){$this->rhombus($rh);}

        // $this->draw->annotation(10,340, "s = {$s} c = {$c} t = {$t}");
        $imagick->drawImage($this->draw);
        echo $imagick->getImageBlob();

    }

    function square($n){
        $d = $this->draw;


        if ($this->positive_numbers<=3){
        $d->line(10+$n*210,10,   210+$n*210,10);
        $d->line(210+$n*210,10,  210+$n*210,210);
        $d->line(210+$n*210,210, 10+$n*210,210);
        $d->line(10+$n*210,210,  10+$n*210,10);

        } else{
        $k = floor($n/2);
        $d->line(10+($n%2)*2*210,10+200*($k),   210+($n%2)*2*210,10+200*($k));
        $d->line(210+($n%2)*2*210,10+200*($k),  210+($n%2)*2*210,210+200*($k));
        $d->line(210+($n%2)*2*210,210+200*($k), 10+($n%2)*2*210,210+200*($k));
        $d->line(10+($n%2)*2*210,210+200*($k),  10+($n%2)*2*210,10+200*($k));
        }
    }

    function circle($n){
        $d = $this->draw;
        $d->setFillColor("#ffffff");
        if ($this->positive_numbers<=3){
            $d->circle(110+$n*210, 110, 210+$n*210, 110);
        } else{
            $k = floor($n/2);
            $d->circle(110+($n%2)*2*210, 110+240*($k), 210+($n%2)*2*210, 110+240*($k));
        }

    }
    function triangle($n){
        $d = $this->draw;

        if ($this->positive_numbers<=3){
            $d->line(10+$n*210,210, 210+$n*210,210);
            $d->line(210+$n*210,210, 110+$n*210,10);
            $d->line(110+$n*210,10,10+$n*210,210);
        }else{
            $k = floor($n/2);
            $d->line(10+($n%2)*2*210,210+240*($k), 210+($n%2)*2*210,210+240*($k));
            $d->line(210+($n%2)*2*210,210+240*($k), 110+($n%2)*2*210,10+240*($k));
            $d->line(110+($n%2)*2*210,10+240*($k),10+($n%2)*2*210,210+240*($k));
        }

    }
    function rectangle($n){
        $d = $this->draw;
        if ($this->positive_numbers<=3){
            $d->line(10+$n*210,40,   210+$n*210,40);
            $d->line(210+$n*210,40,  210+$n*210,180);
            $d->line(210+$n*210,180, 10+$n*210,180);
            $d->line(10+$n*210,180,  10+$n*210,40);
        }else{
            $k = floor($n/2);
            $d->line(10+($n%2)*2*210,40+240*($k),   210+($n%2)*2*210,40+240*($k));
            $d->line(210+($n%2)*2*210,40+240*($k),  210+($n%2)*2*210,180+240*($k));
            $d->line(210+($n%2)*2*210,180+240*($k), 10+($n%2)*2*210,180+240*($k));
            $d->line(10+($n%2)*2*210,180+240*($k),  10+($n%2)*2*210,40+240*($k));
        }

    }

    function paralelogram($n){
        $d = $this->draw;
        if ($this->positive_numbers<=3){
            $d->line(60+$n*210,40,   210+$n*210,40);
            $d->line(210+$n*210,40,  160+$n*210,180);
            $d->line(160+$n*210,180, 10+$n*210,180);
            $d->line(10+$n*210,180,  60+$n*210,40);
        }else{
            $k = floor($n/2);
            $d->line(60+($n%2)*2*210,40+240*($k),   210+($n%2)*2*210,40+240*($k));
            $d->line(210+($n%2)*2*210,40+240*($k),  160+($n%2)*2*210,180+240*($k));
            $d->line(160+($n%2)*2*210,180+240*($k), 10+($n%2)*2*210,180+240*($k));
            $d->line(10+($n%2)*2*210,180+240*($k),  60+($n%2)*2*210,40+240*($k));
        }
    }
    function hexagon($n){
        $d = $this->draw;
        $dx = cos(deg_rad(30))*100;
        $dy = sin(deg_rad(30))*100;
        $k = floor($n/2);
        if ($this->positive_numbers<=3){
            $d->line(110+$n*210,10,110-$dx+$n*210,10+$dy);
            $d->line(110-$dx+$n*210,10+$dy,110-$dx+$n*210,10+$dy+100);
            $d->line(110-$dx+$n*210,10+$dy+100,110+$n*210,10+$dy*2+100);
            $d->line(110+$n*210,10+$dy*2+100,110+$dx+$n*210,10+$dy+100);            
            $d->line(110+$dx+$n*210,10+$dy+100,110+$dx+$n*210,10+$dy);              
            $d->line(110+$dx+$n*210,10+$dy,110+$n*210,10);                          
        }else{
            $d->line(110+($n%2)*2*210,10+240*($k),110-$dx+($n%2)*2*210,10+$dy+240*($k));
            $d->line(110-$dx+($n%2)*2*210,10+$dy+240*($k),110-$dx+($n%2)*2*210,10+$dy+100+240*($k));
            $d->line(110-$dx+($n%2)*2*210,10+$dy+100+240*($k),110+($n%2)*2*210,10+$dy*2+100+240*($k));
            $d->line(110+($n%2)*2*210,10+$dy*2+100+240*($k),110+$dx+($n%2)*2*210,10+$dy+100+240*($k));            
            $d->line(110+$dx+($n%2)*2*210,10+$dy+100+240*($k),110+$dx+($n%2)*2*210,10+$dy+240*($k));              
            $d->line(110+$dx+($n%2)*2*210,10+$dy+240*($k),110+($n%2)*2*210,10+240*($k));                          
            
            // $d->line(110+($n%2)*2*210,10+240*($k),   180+($n%2)*2*210,110+240*($k));
            // $d->line(110+($n%2)*2*210,10+240*($k),   180+($n%2)*2*210,110+240*($k));
            // $d->line(180+($n%2)*2*210,110+240*($k),  110+($n%2)*2*210,210+240*($k));
            // $d->line( 110+($n%2)*2*210,210+240*($k), 30+($n%2)*2*210,110+240*($k));
            // $d->line(30+($n%2)*2*210,110+240*($k),  110+($n%2)*2*210,10+240*($k));
        }
    }
    function rhombus($n){
        $d = $this->draw;
        if ($this->positive_numbers<=3){
            $d->line(110+$n*210,10,   180+$n*210,110);
            $d->line(180+$n*210,110,  110+$n*210,210);
            $d->line( 110+$n*210,210, 30+$n*210,110);
            $d->line(30+$n*210,110,  110+$n*210,10);
        }else{
            $k = floor($n/2);
            $d->line(110+($n%2)*2*210,10+240*($k),   180+($n%2)*2*210,110+240*($k));
            $d->line(180+($n%2)*2*210,110+240*($k),  110+($n%2)*2*210,210+240*($k));
            $d->line( 110+($n%2)*2*210,210+240*($k), 30+($n%2)*2*210,110+240*($k));
            $d->line(30+($n%2)*2*210,110+240*($k),  110+($n%2)*2*210,10+240*($k));
        }
    }

}




?>