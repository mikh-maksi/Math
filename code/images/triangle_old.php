<?php
// Довільний трикутник за існуючими координатами вершин.
// x1,y1,x2,y2,x3,y3,x4,y4
// Блок обрахунків - довжини та кути
// Блок виводу: довжина сторін.
// Блок виводу: кути
// Блок виводу: корегування розміщення чифр за умови розміру кутів.
if (isset($_GET['x1'])){ 
    $x1 = $_GET['x1'];
}
else 
    {$x1 = 50;}

if (isset($_GET['y1'])) {
    $y1 = $_GET['y1'];
}
else {
    $y1 = 20;
}

if (isset($_GET['x2'])) {
    $x2 = $_GET['x2'];
}
else{
    $x2 = 320;
}

if (isset($_GET['y2'])) {
    $y2 = $_GET['y2'];
}
else {
    $y2 = 200;
}

if (isset($_GET['x3'])) {
    $x3 = $_GET['x3'];
}
else {
    $x3 = 120;
}

if (isset($_GET['y3'])) {
    $y3 = $_GET['y3'];
}
else {
    $y3 = 350;
}

if (isset($_GET['ratio'])){
    $ratio = $_GET['ratio'];
} else {
    $ratio = 0;
}


// $y1 = $_GET['y1'];

// $x2 = $_GET['x2'];
// $y2 = $_GET['y2'];

// $x3 = $_GET['x3'];
// $y3 = $_GET['y3'];


// $q = new triangle(50,20,300,20,380,350);
$q = new triangle($x1,$y1,$x2,$y2,$x3,$y3,$ratio);

function angl($x_a,$y_a,$x_b,$y_b,$x_c,$y_c){
    // Вектор ab
    $x_ab = $x_b - $x_a;
    $y_ab = $y_b - $y_a;

    // Вектор ac
    $x_ac = $x_c - $x_a;
    $y_ac = $y_c - $y_a;

    // Скалярний добуток
    $ab_ac = $x_ab * $x_ac + $y_ab * $y_ac;

    // Модулі векторів
    $ab = sqrt($x_ab^2+$y_ab^2);
    $ac = sqrt($x_ac^2+$y_ac^2);

    $cos_a = $ab_ac / ($ab * $ac);
    return acos($cos_a);
}

class triangle{
    private $draw;
    private $coord;
    private $length;
    private $angles;
    
    function __construct($x1,$y1,$x2,$y2,$x3,$y3,$ratio){
        $this->coord = [$x1,$y1,$x2,$y2,$x3,$y3];
        $this->draw = new ImagickDraw ();
        
        $this->draw_triangle();
        $this->length = $this->calc_side_length();
        $this->angles = $this->calc_side_angle();
        $this->text_triangle();

        $c = $this->coord;
        $a = $this->angles;
        $l = $this->length;

        // text options
        $this->draw->setStrokeWidth(1);
        $font = 'Inter.ttf';
        $size = 12;
        $this->draw->setFontSize($size);
        $this->draw->setFont($font);

        $bbox_a = imagettfbbox($size, 0, $font, $a[0]);
        $y = abs($bbox_a[5]);
        $x = abs($bbox_a[2]);

        // $q = new triangle(50,20,300,50,380,350);
        $an_x = round($this->angle($x1,$y1,$x2,$y1,$x2,$y2),2); // кут із віссю OX
        $an_y = round($this->angle($x1,$y1,$x2,$y2,$x1,$y2),2); // кут із віссю OX

        $tan_a = round(tan($an_x/180*pi()),2);

        $dy1 = $x*$tan_a;

        $an_x3 = round($this->angle($x1,$y1,$x2,$y1,$x3,$y3),2); // кут із віссю OX
        $an_y3 = round($this->angle($x1,$y1,$x3,$y3,$x1,$y3),2); // кут із віссю OX

        $tan_oy3 = round(tan($an_y3/180*pi()),2);
        $tan_ox3 = round(tan($an_x3/180*pi()),2);
        
        $dx3 = $y*$tan_oy3;

        $an_x2 = round($this->angle($x2,$y2,$x3,$y2,$x3,$y3),2); // кут із віссю OX
        $an_y2 = round($this->angle($x2,$y2,$x3,$y3,$x2,$y3),2); // кут із віссю OX

        $tan_oy2 = round(tan($an_y2/180*pi()),2);
        $tan_oy1 = round(tan($an_y/180*pi()),2);

        $tan_ox2 = round(tan($an_x2/180*pi()),2);
        $tan_ox1 = round(tan($an_x/180*pi()),2);

        $dx2 = round(($y)*$tan_ox1,2);
        $dy2 = round(($x)*$tan_oy2,2);


        $dx3 = $x/2;
        $dy3 =  $x* $tan_oy3;
        // $dx1 = 20*$tan_a;

        // кут із віссю OY
        //Зміщуємо по x - Tan кута що отримуємо із горизонтальною віссю координат, по y - tan (?) кута із вертикальною віссю координат.
        $this->draw->annotation(360,20, "ox1 =  {$an_x}, oy1 = {$an_y} a = {$a[0]}");
        $this->draw->annotation(360,40, "tan_ox1 = {$tan_a} dy1 =  {$dy1}");
        $this->draw->annotation(360,60, "y = {$y} x = {$x}");

        $this->draw->annotation(360,100, "ox3 =  {$an_x3} oy3 = {$an_y3}");
        $this->draw->annotation(360,120, "tan_oy3 = {$tan_oy3}  dx3 = {$dx3}");
        $this->draw->annotation(360,140, "");

        $this->draw->annotation(360,180, "ox2 =  {$an_x2} oy2 = {$an_y2}");
        $this->draw->annotation(360,220, "tan_oy2 = {$tan_oy2} tan_ox1 ={$tan_ox1 } dx2 = {$dx2} dy2 = {$dy2}");
        $this->draw->annotation(360,240, "tan_oy1 = {$tan_oy1}");



        $this->draw->annotation($c[0]+$dx3-4,$c[1]+abs($bbox_a[5])+$dy1, "{$a[0]}");
        $this->draw->setTextAlignment(3);
        $this->draw->annotation($c[2]-$dx2,$c[3]+$y/2, "{$a[1]}");
        $this->draw->annotation($c[4]+$dx3+4,$c[5]-$dy3-6, "{$a[2]}");

        $this->draw->annotation(($c[2]+$c[0])/2+10,($c[3]+$c[1])/2-10, $l[0]);
        $this->draw->annotation(($c[4]+$c[2])/2+22,($c[5]+$c[3])/2+10, $l[1]);
        $this->draw->annotation(($c[0]+$c[4])/2,($c[1]+$c[5])/2+12, $l[2]);



        header("Content-Type: image/png");
        $imagick = new Imagick(new ImagickPixel('rgba(0, 0, 0, 1)'));
        if ($ratio == '1'){
            $imagick->newImage(700,400, new ImagickPixel('white')); //max (x)+10, max(y)+10
        }else{
            $imagick->newImage(350,400, new ImagickPixel('white')); //max (x)+10, max(y)+10
        }
        $imagick->setImageFormat("png");
        $imagick->drawImage($this->draw);


        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }

    function draw_triangle(){
        $d = $this->draw;
        $c = $this->coord;
        
        $d->setStrokeColor(new ImagickPixel('rgba(0, 0, 0, 1)'));
        $d->setStrokeWidth(2);

        $d->line($c[0],$c[1], $c[2],$c[3]);
        $d->line($c[2],$c[3], $c[4],$c[5]);
        $d->line($c[4],$c[5], $c[0],$c[1]);
    }


    function calc_side_length(){
        $c = $this->coord;
        $l1 = round(sqrt(($c[0]-$c[2])**2+($c[1]-$c[3])**2));
        $l2 = round(sqrt(($c[2]-$c[4])**2+($c[3]-$c[5])**2));
        $l3 = round(sqrt(($c[4]-$c[0])**2+($c[5]-$c[1])**2));
        $side_length = [$l1,$l2,$l3];
        return $side_length; 

    }
    function text_triangle(){
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

        $bbox_a = imagettfbbox($size, 0, $font, $a[0]);
        $d->setFontSize($size);
        // $d->annotation(70,200, "x1={$c[0]} y1={$c[1]} x2={$c[2]} y2={$c[3]} ");
        // $d->annotation(70,250, "x3={$c[4]} y3={$c[5]} x4={$c[6]} y4={$c[7]} ");
        // $d->annotation(10,300, "{$bbox_a[0]} {$bbox_a[1]} {$bbox_a[2]} {$bbox_a[3]}  {$bbox_a[4]} {$bbox_a[5]} {$bbox_a[6]} {$bbox_a[7]}");
        // $d->annotation(70,350, "{$a[0]} {$a[1]} {$a[2]} {$a[3]}  {$a[4]} {$a[5]} {$a[6]} {$a[7]}");

        // $d->setTextAlignment(3);
        // $d->annotation($c[2]-2,$c[3]+12, "{$a[1]}");
        // $d->annotation($c[4]-8,$c[5]-2, "b:{$a[2]}");

        $d->setTextAlignment(1);
        $tan_a=tan($a[0]/180*pi());
        
        $d_a = ((abs($bbox_a[5])+4)/$tan_a);



        $d->setFillColor('#ff0000');
        $d->setFillColor('#999999');
        $d->setStrokeColor('#999999');



        // $d->annotation($c[0]+$d_a,$c[1]+12, "{$a[0]} :c");
        $o1 = round($tan_a,2);
        $o2 = round($d_a,2);
        // $d->annotation(10,480, "{$a[0]} {$o1} {da = $o2} {$bbox_a[5]} {$a[3]}  {$a[4]} {$a[5]}");

        $d->setFillColor('#000000');
        $d->setStrokeColor('#000000');

        $d->setFontSize($size);
        $d->setTextAlignment(1);
        // $d->annotation(($c[2]+$c[0])/2,($c[3]+$c[1])/2-3, $l[0]);
        // $d->annotation(($c[4]+$c[2])/2+2,($c[5]+$c[3])/2, $l[1]);
        // $d->annotation(($c[0]+$c[4])/2,($c[1]+$c[5])/2+12, $l[2]);
        // $d->setTextAlignment(3);
        // $d->annotation(($c[0]+$c[6])/2-3,($c[1]+$c[7])/2, $l[3]);
        // $d->annotation(($c[2]-$c[0])/2,($c[3]-$c[1])/2, $l[0]);
        // $d->annotation(($c[2]-$c[0])/2,($c[3]-$c[1])/2, $l[0]);
    }
    function calc_side_angle(){
        $c = $this->coord;

        $dx3 = ($c[0]-$c[4]);
        $dy3 = ($c[1]-$c[5]);

        $dx1 = ($c[2]-$c[0]);
        $dy1 = ($c[3]-$c[1]);

        $dx2 = ($c[4]-$c[2]);
        $dy2 = ($c[5]-$c[3]);

        $a1 = round(acos((-$dx3*$dx1+-$dy3*$dy1)/(sqrt(($dx3)**2+$dy3**2)*sqrt($dx1**2+$dy1**2)))*180/pi(),0);
        $a2 = round(acos((-$dx1*$dx2+-$dy1*$dy2)/(sqrt($dx1**2+$dy1**2)*sqrt($dx2**2+$dy2**2)))*180/pi(),0);
        $a3 = round(acos((-$dx2*$dx3+-$dy2*$dy3)/(sqrt($dx2**2+$dy2**2)*sqrt($dx3**2+$dy3**2)))*180/pi(),0);
        $side_angle = [$a1,$a2,$a3];
        return $side_angle; 
    }

    function angle($x_a,$y_a,$x_b,$y_b,$x_c,$y_c){
        $d = $this->draw;

        // Вектор ab
        $x_ab = $x_b - $x_a;
        $y_ab = $y_b - $y_a;
    
        // Вектор ac
        $x_ac = $x_c - $x_a;
        $y_ac = $y_c - $y_a;
    
        // Скалярний добуток
        $ab_ac = $x_ab * $x_ac + $y_ab * $y_ac;
    
        // Модулі векторів
        $ab = sqrt($x_ab**2+$y_ab**2);
        $ac = sqrt($x_ac**2+$y_ac**2);

        // $d->annotation(70,340, "{$x_a},{$y_a},{$x_b},{$y_b},{$x_c},{$y_c}");
        // $d->annotation(70,360, "{$x_ab},{$y_ab},{$x_ac},{$y_ac},{$ab_ac}");
        // $d->annotation(70,380, "{$ab},{$ac}");

        if ($ab * $ac==0)  $cos_a =1;
        else $cos_a = $ab_ac / ($ab * $ac);
        $angl = acos($cos_a)/pi()*180;
        $angl1 = acos(0.992876838486922);
        // $d->annotation(70,320, "cos_a = {$cos_a}; a = {$angl}; a1= {$angl1}");
        // $d->annotation(70,340, " a1= {$angl1}");
        return $angl;
    }

}

?>