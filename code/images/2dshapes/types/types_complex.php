<?php
function deg_rad($deg){
    return $deg*pi()/180;
}
 

if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}


// $figures = [$s,$c,$t,$r,$p,$h,$rh];
$t = json_decode($t);
// print_r($t);
$tt = new types($t);


class types {
    public $draw;
    public $positive_numbers;
    function __construct($t){

        $this->draw = new ImagickDraw ();
        header("Content-Type: image/png");
        $imagick = new Imagick(new ImagickPixel('rgba(0, 0, 0, 1)'));
        $imagick->newImage(600,600, new ImagickPixel('white')); //max (x)+10, max(y)+10
        $imagick->setImageFormat("png");

        $this->draw->line(300,0,300,600);
        $this->draw->line(0,300,600,300);


        $this->draw->setStrokeColor(new ImagickPixel('rgba(0, 0, 0, 1)'));
        $this->draw->setStrokeWidth(2);



        $this->draw->setStrokeWidth(3);
        $this->draw->setTextAlignment(1);
        $font = '../../Inter.ttf';
        $size = 32;
        $this->draw->setFontSize($size);
        $this->draw->setFont($font);


        $this->draw->setTextAlignment(\Imagick::ALIGN_CENTER);


        $positive_numbers= 4;

        $this->positive_numbers=$positive_numbers;

        for($i=0;$i<count($t);$i+=1){
            $tt = $t[$i];
            if (count($tt)==1){
            if ($tt[0] =="s"){$this->square($i);}
            if ($tt[0] =="r"){$this->rectangle_sm($i);}
            if ($tt[0] =="c"){$this->circle($i);}
            if ($tt[0] =="sc"){$this->semicircle_sm($i);}
            if ($tt[0] =="t"){$this->triangle($i);}
            if ($tt[0] =="p"){$this->paralelogram_sm($i);}
            if ($tt[0] =="trp"){$this->trapezoid_sm($i);}
            if ($tt[0] =="h"){$this->hexagon_sm($i);}
            if ($tt[0] =="o"){$this->octagon_sm($i);}
            if ($tt[0] =="rh"){$this->rhombus_sm($i);}
            if ($tt[0] =="pt"){$this->pentagon($i);}
            if ($tt[0] =="quad"){$this->quadrilateral($i);}
            } else{
                for($j=0;$j<count($tt);$j+=1){
                    if ($tt[$j] =="s")   {$this->square_sm($i,$j);}
                    if ($tt[$j] =="r")   {$this->rectangle_sm($i,$j);}
                    if ($tt[$j] =="c")   {$this->circle_sm($i,$j);}
                    if ($tt[$j] =="sc")   {$this->semicircle_sm($i,$j);}
                    if ($tt[$j] =="t")   {$this->triangle_sm($i,$j);}
                    if ($tt[$j] =="p")   {$this->paralelogram_sm($i,$j);}
                    if ($tt[$j] =="trp") {$this->trapezoid_sm($i,$j);}
                    if ($tt[$j] =="h")   {$this->hexagon_sm($i,$j);}
                    if ($tt[$j] =="o")   {$this->octagon_sm($i,$j);}
                    if ($tt[$j] =="rh")  {$this->rhombus_sm($i,$j);}
                    if ($tt[$j] =="pt")  {$this->pentagon_sm($i,$j);}
                    if ($tt[$j] =="quad"){$this->quadrilateral_sm($i,$j);}
                }
            }

        }


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
        $d->line(30+($n%2)*300,30+300*($k),   270+($n%2)*300,30+300*($k));
        $d->line(270+($n%2)*300,30+300*($k),  270+($n%2)*300,270+300*($k));
        $d->line(270+($n%2)*300,270+300*($k), 30+($n%2)*300,270+300*($k));
        $d->line(30+($n%2)*300,270+300*($k),  30+($n%2)*300,30+300*($k));
        }
    }

    function square_sm($n,$m=-1){
        $d = $this->draw;
        $i = floor($n/2);
        $j = $n%2;
        
        if ($m == -1){

            $d->line(30+($j)*300,30+300*($i),   270+($j)*300,30+300*($i));
            $d->line(270+($j)*300,30+300*($i),  270+($j)*300,270+300*($i));
            $d->line(270+($j)*300,270+300*($i), 30+($j)*300,270+300*($i));
            $d->line(30+($j)*300,270+300*($i),  30+($j)*300,30+300*($i));
        } else{
            $ii = floor($m/2);
            $jj = $m%2;
            $start_x_array= [30,170];
            $start_y_array= [30,170];
            $w = 100;
            $h = 100;
            $start_x = $start_x_array[$jj];
            $start_y = $start_y_array[$ii];

            $d->line($start_x+($j)*300,     $start_y+300*($i),    $start_x+$w+($j)*300, $start_y+300*($i));
            $d->line($start_x+$w+($j)*300,  $start_y+300*($i),    $start_x+$w+($j)*300, $start_y+$h+300*($i));
            $d->line($start_x+$w+($j)*300,  $start_y+$h+300*($i), $start_x+($j)*300,    $start_y+$h+300*($i));
            $d->line($start_x+($j)*300,     $start_y+$h+300*($i),  $start_x+($j)*300,   $start_y+300*($i));


        }

    }



    function circle($n){
        $d = $this->draw;
        $d->setFillColor("#ffffff");

        if ($this->positive_numbers<=3){
            $d->circle(110+$n*210, 110, 210+$n*210, 110);
        } else{
            $k = floor($n/2);
            $d->circle(150+($n%2)*300, 150+300*($k), 270+($n%2)*300, 150+300*($k));
        }

    }

    function circle_sm($n,$m){
        $d = $this->draw;
        $d->setFillColor("#ffffff");
        $i = floor($n/2);
        $j = $n%2;

        if ($m == -1){       
            $start_x = 150;
            $start_y = 150;
            $r = 120;
        }else{
            $ii = floor($m/2);
            $jj = $m%2;

            $start_x_array= [80,220];
            $start_y_array= [80,220];
            $start_x = $start_x_array[$jj];
            $start_y = $start_y_array[$ii];
            $r = 60;
        }
        $d->circle($start_x+$j*300, $start_y+300*$i, $start_x+$r+$j*300, $start_y+300*$i);
    }


    function semicircle_sm($n,$m){
        $d = $this->draw;
        $d->setFillColor("#ffffff");
        $i = floor($n/2);
        $j = $n%2;

        if ($m == -1){       
            $start_x = 150;
            $start_y = 150;
            $r = 120;
        }else{
            $ii = floor($m/2);
            $jj = $m%2;

            $start_x_array= [20,220];
            $start_y_array= [20,180];
            $start_x = $start_x_array[$jj];
            $start_y = $start_y_array[$ii];
            $r = 100;
        }
        // $d->circle($start_x, $start_y+300*$i, $start_x, $start_y);
        $d->arc($start_x+$j*300, $start_y+300*$i, $start_x+$r+$j*300, $start_y+$r+300*$i, 90, 270);
        $d->line($start_x+$r/2+$j*300,$start_y+300*$i, $start_x+$r/2+$j*300, $start_y+$r+300*$i);

    }

    function triangle($n){
        $d = $this->draw;

        if ($this->positive_numbers<=3){
            $d->line(10+$n*210,210, 210+$n*210,210);
            $d->line(210+$n*210,210, 110+$n*210,10);
            $d->line(110+$n*210,10,10+$n*210,210);
        }else{
            $k = floor($n/2);
            $d->line(30+($n%2)*300,250+300*($k), 270+($n%2)*300,250+300*($k));
            $d->line(270+($n%2)*300,250+300*($k), 150+($n%2)*300,50+300*($k));
            $d->line(150+($n%2)*300,50+300*($k),30+($n%2)*300,250+300*($k));
        }

    }

    function triangle_sm($n,$m){
        $d = $this->draw;
        $i = floor($n/2);
        $j = $n%2;
        if ($m == -1){
            $start_x = 30;
            $start_y = 50;
            $w = 240;
            $h = 200;
        }else{
            $ii = floor($m/2);
            $jj = $m%2;
            $start_x_array= [10,170];
            $start_y_array= [10,180];
            $start_x = $start_x_array[$jj];
            $start_y = $start_y_array[$ii];
            if ($m == 4){
                $start_x = 90;
                $start_y = 90;
            }
            $w = 120;
            $h = 100;
        }
            $d->line($start_x+$j*300,          $start_y+$h+300*$i, $start_x+$w+$j*300,      $start_y+$h+300*$i);
            $d->line($start_x+$w+$j*300,       $start_y+$h+300*$i, $start_x+$w/2+$j*300,    $start_y+300*$i);
            $d->line($start_x+$w/2+$j*300,     $start_y+300*$i,    $start_x+$j*300,         $start_y+$h+300*$i);
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
            $d->line(30+($n%2)*300,60+300*($k),   270+($n%2)*300,60+300*($k));
            $d->line(270+($n%2)*300,60+300*($k),  270+($n%2)*300,220+300*($k));
            $d->line(270+($n%2)*300,220+300*($k), 30+($n%2)*300,220+300*($k));
            $d->line(30+($n%2)*300,220+300*($k),  30+($n%2)*300,60+300*($k));
        }

    }
    function rectangle_sm($n,$m=-1){
        $d = $this->draw;
        $i = floor($n/2);
        $j = $n%2;

        if ($m == -1){
            $start_x = 30;
            $start_y = 60;
            $w = 240;
            $h = 160;
        }else{
            $ii = floor($m/2);
            $jj = $m%2;
            $start_x_array= [30,170];
            $start_y_array= [40,150];
            $w = 110;
            $h = 70;
            $start_x = $start_x_array[$jj];
            $start_y = $start_y_array[$ii];
        }
        $d->line($start_x+($j)*300,     $start_y+300*($i),    $start_x+$w+($j)*300, $start_y+300*($i));
        $d->line($start_x+$w+($j)*300,  $start_y+300*($i),    $start_x+$w+($j)*300, $start_y+$h+300*($i));
        $d->line($start_x+$w+($j)*300,  $start_y+$h+300*($i), $start_x+($j)*300,    $start_y+$h+300*($i));
        $d->line($start_x+($j)*300,     $start_y+$h+300*($i),  $start_x+($j)*300,   $start_y+300*($i));


    }


    function quadrilateral($n){
        $d = $this->draw;
        if ($this->positive_numbers<=3){
            $d->line(10+$n*210,40,   210+$n*210,40);
            $d->line(210+$n*210,40,  210+$n*210,180);
            $d->line(210+$n*210,180, 10+$n*210,180);
            $d->line(10+$n*210,180,  10+$n*210,40);
        }else{
            $k = floor($n/2);
            $d->line(30+($n%2)*300,80+300*($k),   270+($n%2)*300,30+300*($k));
            $d->line(270+($n%2)*300,30+300*($k),  240+($n%2)*300,250+300*($k));
            $d->line(240+($n%2)*300,250+300*($k), 50+($n%2)*300,220+300*($k));
            $d->line(50+($n%2)*300,220+300*($k),  30+($n%2)*300,80+300*($k));
        }

    }

    function paralelogram($n){
        $d = $this->draw;
        $i = floor($n/2);
        $j = $n%2;

             $k = floor($n/2);
            $d->line(60+($n%2)*2*210,40+240*($k),   210+($n%2)*2*210,40+240*($k));
            $d->line(210+($n%2)*2*210,40+240*($k),  160+($n%2)*2*210,180+240*($k));
            $d->line(160+($n%2)*2*210,180+240*($k), 10+($n%2)*2*210,180+240*($k));
            $d->line(10+($n%2)*2*210,180+240*($k),  60+($n%2)*2*210,40+240*($k));
    }

    function paralelogram_sm($n,$m=-1){
        $d = $this->draw;
        $i = floor($n/2);
        $j = $n%2;
        if ($m == -1){
            $start_x = 20;
            $start_y = 80;
            $dx = 50;
            $w = 150;
            $h = 140;
        } else{
            $ii = floor($m/2);
            $jj = $m%2;
            $start_x_array= [10,150];
            $start_y_array= [40,150];
            $w = 60;
            $h = 70;
            $dx = 40;
            $start_x = $start_x_array[$jj];
            $start_y = $start_y_array[$ii];
        }

        $k = floor($n/2);
        $d->line($start_x+$dx+($j)*300,       $start_y+300*($i),     $start_x+2*$dx+$w+($j)*300,    $start_y+300*($i));
        $d->line($start_x+2*$dx+$w+($j)*300,  $start_y+300*($i),     $start_x+$dx+$w+($j)*300,      $start_y+$h+300*($i));
        $d->line($start_x+$dx+$w+($j)*300,    $start_y+$h+300*($i),  $start_x+($j)*300,           $start_y+$h+300*($i));
        $d->line($start_x+($j)*300,           $start_y+$h+300*($i),  $start_x+$dx+($j)*300,       $start_y+300*($i));
        
    }

    function trapezoid($n){
        $d = $this->draw;

            // $k = floor($n/2);
            $col = 2;
            $j = $n%$col;
            $i = intdiv($n,$col);

            $d->line(20+($j)*300,260+300*($i),  70+($j)*300,100+300*($i));
            $d->line(70+($j)*300,100+300*($i),   220+($j)*300,100+300*($i));
            $d->line(220+($j)*300,100+300*($i),  270+($j)*300,260+300*($i));
            $d->line(270+($j)*300,260+300*($i), 20+($j)*300,260+300*($i));

    }
    function trapezoid_sm($n,$m=-1){
        $d = $this->draw;

            // $k = floor($n/2);
            $col = 2;
            $j = $n%$col;
            $i = intdiv($n,$col);

            if ($m == -1){
                $x_start = 20;
                $y_start = 100;
                $b = 150;
                $a = 250;
                $dx = 50;
                $h = 160;
            }
            else{
                $ii = floor($m/2);
                $jj = $m%2;
                $start_x_array= [20,170];
                $start_y_array= [30,150];
                $x_start = $start_x_array[$jj];
                $y_start  = $start_y_array[$ii];

                // $x_start = 20;
                // $y_start = 100;
                $b = 75;
                $a = 125;
                $dx = 25;
                $h = 80;
            }
            $d->line($x_start+($j)*300,        $y_start+$h+300*($i),   $x_start+$dx+($j)*300,           $y_start+300*($i));

            $d->line($x_start+$dx+($j)*300,    $y_start+300*($i),      $x_start+$b+$dx+($j)*300,           $y_start+300*($i));
            
            $d->line($x_start+$b+$dx+($j)*300, $y_start+300*($i),      $x_start+$b+$dx+$dx+($j)*300,       $y_start+$h+300*($i));
            
            $d->line($x_start+$a+($j)*300,     $y_start+$h+300*($i),   $x_start+($j)*300,               $y_start+$h+300*($i));

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
            $d->line(150+($n%2)*300,30+300*($k),150-$dx+($n%2)*300,30+$dy+300*($k));
            $d->line(150-$dx+($n%2)*300,30+$dy+300*($k),150-$dx+($n%2)*300,30+$dy+100+300*($k));
            $d->line(150-$dx+($n%2)*300,30+$dy+100+300*($k),150+($n%2)*300,30+$dy*2+100+300*($k));
            $d->line(150+($n%2)*300,30+$dy*2+100+300*($k),150+$dx+($n%2)*300,30+$dy+100+300*($k));            
            $d->line(150+$dx+($n%2)*300,30+$dy+100+300*($k),150+$dx+($n%2)*300,30+$dy+300*($k));              
            $d->line(150+$dx+($n%2)*300,30+$dy+300*($k),150+($n%2)*300,30+300*($k));                          
        }
    }

    function hexagon_sm($n,$m=-1){
        $d = $this->draw;
        
        $i = floor($n/2);
        $j = $n%2;

        if ($m == -1){
            $x_start = 150;
            $y_start = 50;
            $w = 100;
            $h = 100;
            $dx = cos(deg_rad(30))*$w;
            $dy = sin(deg_rad(30))*$h;

        } else{
            $ii = floor($m/2);
            $jj = $m%2;
            $start_x_array= [70,220];
            $start_y_array= [30,150];
            $w = 50;
            $h = 50;
            $dx = cos(deg_rad(30))*$w;
            $dy = sin(deg_rad(30))*$h;
            $x_start = $start_x_array[$jj];
            $y_start  = $start_y_array[$ii];

        }

        $d->line($x_start+$j*300,      $y_start+300*$i,            $x_start-$dx+$j*300,  $y_start+$dy+300*$i);
        $d->line($x_start-$dx+$j*300,  $y_start+$dy+300*$i,        $x_start-$dx+$j*300,  $y_start+$dy+$h+300*$i);
        $d->line($x_start-$dx+$j*300,  $y_start+$dy+$h+300*$i,     $x_start+$j*300,      $y_start+$dy*2+$h+300*$i);
        $d->line($x_start+$j*300,      $y_start+$dy*2+$h+300*$i,   $x_start+$dx+$j*300,  $y_start+$dy+$h+300*$i);            
        $d->line($x_start+$dx+$j*300,  $y_start+$dy+$h+300*$i,     $x_start+$dx+$j*300,  $y_start+$dy+300*$i);              
        $d->line($x_start+$dx+$j*300,  $y_start+$dy+300*$i,        $x_start+$j*300,      $y_start+300*$i);                          
    }
    function octagon_sm($n,$m=-1){
        $d = $this->draw;
        
        $i = floor($n/2);
        $j = $n%2;

        if ($m == -1){
            $x_start =150;
            $y_start = 30;
            $w = 100;
            $h = 100;
            $dx = cos(deg_rad(45))*$w;
            $dy = sin(deg_rad(45))*$h;
        } else{
            $ii = floor($m/2);
            $jj = $m%2;
            $start_x_array= [70,220];
            $start_y_array= [20,160];
            $w = 50;
            $h = 50;
            $dx = cos(deg_rad(45))*$w;
            $dy = sin(deg_rad(45))*$h;
            $x_start = $start_x_array[$jj];
            $y_start  = $start_y_array[$ii];

        }

        $d->line($x_start-$w/2+$j*300,      $y_start+300*$i,            $x_start-$w/2-$dx+$j*300,  $y_start+$dy+300*$i);
        $d->line($x_start-$w/2-$dx+$j*300,  $y_start+$dy+300*$i,        $x_start-$w/2-$dx+$j*300,  $y_start+$dy+$h+300*$i);
        $d->line($x_start-$w/2-$dx+$j*300,  $y_start+$dy+$h+300*$i,     $x_start-$w/2+$j*300,      $y_start+$dy*2+$h+300*$i);


        $d->line($x_start-$w/2+$j*300,      $y_start+300*$i,            $x_start+$w/2+$j*300,  $y_start+300*$i);
        $d->line($x_start-$w/2+$j*300,      $y_start+$dy*2+$h+300*$i,            $x_start+$w/2+$j*300,  $y_start+$dy*2+$h+300*$i);
        
        $d->line($x_start+$w/2+$j*300,      $y_start+$dy*2+$h+300*$i,   $x_start+$w/2+$dx+$j*300,  $y_start+$dy+$h+300*$i);            
        $d->line($x_start+$w/2+$dx+$j*300,  $y_start+$dy+$h+300*$i,     $x_start+$w/2+$dx+$j*300,  $y_start+$dy+300*$i);              
        $d->line($x_start+$w/2+$dx+$j*300,  $y_start+$dy+300*$i,        $x_start+$w/2+$j*300,      $y_start+300*$i);                          
    }



    function rhombus($n){
        $d = $this->draw;
        $col = 2;
        $j = $n%$col;
        $i = intdiv($n,$col);


        if ($this->positive_numbers<=3){
            $d->line(110+$n*210,10,   180+$n*210,110);
            $d->line(180+$n*210,110,  110+$n*210,210);
            $d->line( 110+$n*210,210, 30+$n*210,110);
            $d->line(30+$n*210,110,  110+$n*210,10);
        }else{
            $k = floor($n/2);
            $d->line(150+($j)*300, 50+300*($i),   220+($j)*300, 150+300*($i));
            $d->line(220+($j)*300, 150+300*($i),  150+($j)*300, 250+300*($i));
            $d->line(150+($j)*300, 250+300*($i),  80+($j)*300,  150+300*($i));
            $d->line(80+($j)*300,  150+300*($i),  150+($j)*300, 50+300*($i));
        }
    }

    function rhombus_sm($n,$m=-1){
        $d = $this->draw;
        $col = 2;
        $j = $n%$col;
        $i = intdiv($n,$col);

        if ($m == -1){
            $start_x = 80;
            $start_y = 50;
            $dx = 70;
            $dy = 100;
            $w = 150;
            $h = 140;
        } else{
            $ii = floor($m/2);
            $jj = $m%2;
            $start_x_array= [20,170];
            $start_y_array= [10,160];
            $dx = 50;
            $dy = 65;
            $w = 60;
            $h = 70;
            // $dx = 40;
            $start_x = $start_x_array[$jj];
            $start_y = $start_y_array[$ii];
        }

        $d->line($start_x+$dx+($j)*300,    $start_y+300*($i),   $start_x+2*$dx+($j)*300, $start_y+$dy+300*($i));
        $d->line($start_x+2*$dx+($j)*300,  $start_y+$dy+300*($i),  $start_x+$dx+($j)*300,   $start_y+2*$dy+300*($i));
        $d->line($start_x+$dx+($j)*300,   $start_y+2*$dy+300*($i),  $start_x+($j)*300,       $start_y+$dy+300*($i));
        $d->line($start_x+($j)*300,       $start_y+$dy+300*($i),  $start_x+$dx+($j)*300,    $start_y+300*($i));
    }
    function pentagon($n){
        $d = $this->draw;
            $s = 5;
            $scale = 30;
            $x_start = 150;
            $y_start = 250;
            $scaled_s = $s * $scale;


            
            $dy1 = cos(deg_rad(18))*$scaled_s;
            $dx1 = sin(deg_rad(18))*$scaled_s;
    
            $dy2 = sin(deg_rad(34))*$scaled_s;
            $dx2 = cos(deg_rad(34))*$scaled_s;

            $l = $n%2;
            $h = floor($n/2);


            $coords = [
                array("x"=>$x_start+$scaled_s/2+$dx1+($n%2)*300, "y"=>$y_start-$dy1+$h*300),
                array("x"=>$x_start+$scaled_s/2+($n%2)*300, "y"=>$y_start+$h*300),
                array("x"=>$x_start-$scaled_s/2+($n%2)*300, "y"=>$y_start+$h*300),
                array("x"=>$x_start-$scaled_s/2-$dx1+($n%2)*300, "y"=>$y_start-$dy1+$h*300),
                array("x"=>$x_start-$scaled_s/2-$dx1+$dx2+($n%2)*300, "y"=>$y_start-$dy1-$dy2+$h*300)
        ];
    
        for ($i=0;$i<5;$i+=1){
            $j = $i+1;
            if ($j==5) {$j = 0;}
            $d->line($coords[$i]['x'],$coords[$i]['y'],$coords[$j]['x'],$coords[$j]['y']);
        }
    
    

    
    
  
    }






}




?>