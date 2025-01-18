<?php
require("strings.php");
// Get parameters
$n = intval($_GET['n']);
$text = $_GET['text'];
// Class using 

// $canvas = imagecreatetruecolor(652, 652);
// $cv = new Start_Canvas($canvas);
// $bble = new Bubble($canvas,$n);
$bble_im = new Bubble_im($n,$text);

// header('Content-type: image/png');
// imagepng($canvas);
// imagedestroy($canvas);


class Start_Canvas{
  function __construct($canvas) {
    $this->background($canvas);
    // $this->grid($canvas);
  }

  function background($canvas){
    $white = imagecolorallocate($canvas, 255, 255, 255);
    imagefill($canvas, 0, 0, $white);
  }

  function grid($canvas) {
    $grey = imagecolorallocate($canvas, 200, 200, 200);
    for ($i=0;$i<=40;$i+=1){
        imageline($canvas, $i*10, 0, $i*10, 400, $grey);
        imageline($canvas, 0, $i*10, 400, $i*10, $grey);
    }
  }
}


class Bubble_im{
  private $draw;
  private $n;
  function __construct($n,$text){
    $this->draw = new ImagickDraw ();
    $this->n = $n;
    // Border
 
    
    // circle
    // $this->draw_circle(326,98,326-70,98-70);


    // line
    // $this->draw_line(200,200,140,140);

    // calculations
    $el = $this->el_calculations();
    $bubbles = $this->bubble_calculations();
    $rect = $this->rect_calculations();

    $this->draw_border(8,$rect[$n][0],$rect[$n][1]);

    // draw
    $this->draw_circle(326, 326-$rect[$n][2], 326-264/(2*sqrt(2)), 326-(264)/(2*sqrt(2))-$rect[$n][2]);

    foreach ($el[$n] as &$i) {
      $this->draw_circle($bubbles[$i]["circle_center_x"], $bubbles[$i]["circle_center_y"]-$rect[$n][2],$bubbles[$i]["circle_center_x"]-$bubbles[$i]["circle_width_x"]/(2*sqrt(2)), $bubbles[$i]["circle_center_y"]-$bubbles[$i]["circle_width_y"]/(2*sqrt(2))-$rect[$n][2]);
      $this->draw_line($bubbles[$i]["line_x1"],$bubbles[$i]["line_y1"]-$rect[$n][2],$bubbles[$i]["line_x2"],$bubbles[$i]["line_y2"]-$rect[$n][2]);
    }

    $imagick = new Imagick(new ImagickPixel('rgba(243, 247, 249, 1)'));
    $imagick->newImage($rect[$n][0]+30, $rect[$n][1]+30, new ImagickPixel('white'));
    $imagick->setImageFormat("png");
    $imagick->drawImage($this->draw);
    
    // text
    $font = 'Inter-Bold.ttf';
    $this->draw->setFont($font);
    $this->draw->setStrokeColor(new ImagickPixel('transparent'));
    $this->draw->setFillColor('black');
    $this->draw->setFontSize(20);
    $this->draw->setTextAlignment(imagick::ALIGN_CENTER);

    $str = $text;
    $ln = 20;
    
    $res = string_separation($str,$ln);

    $imagick->annotateImage($this->draw, 326, 290-$rect[$n][2], 0, $res[0]);
    $imagick->annotateImage($this->draw, 326, 326-$rect[$n][2], 0, $res[1]);
    $imagick->annotateImage($this->draw, 326, 362-$rect[$n][2], 0, $res[2]);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
 
  }
  function draw_border($weight,$x,$y){
    $dr = $this->draw;
    $dr->setStrokeColor(new ImagickPixel('rgba(216, 227, 232, 1)'));
    $dr->setFillColor(new ImagickPixel('white'));
    $dr->setStrokeWidth($weight);
    $dr->roundRectangle(10, 10, $x+20,$y+20, 15, 15);
  }
  function draw_circle($x1,$y1,$length_x,$length_y){
    $dr = $this->draw;
    $dr->setStrokeColor(new ImagickPixel('rgba(216, 227, 232, 1)'));
    $dr->setStrokeWidth(1);
    $dr->setFillColor(new ImagickPixel('rgba(243, 247, 249, 1)'));
    $dr->circle($x1,$y1,$length_x,$length_y);
  }
  function draw_line($x1,$y1,$x2,$y2){
    $dr = $this->draw;
    $dr->setStrokeColor(new ImagickPixel('rgba(216, 227, 232, 1)'));
    $dr->setStrokeWidth(1);
    $dr->line($x1,$y1,$x2,$y2);
}
  function bubble_calculations(){
    $bubbles = [];
    $data = [];

    $size = 16;
    $angle = 0;
    $x1_sign = 326;
    $y1_sign = 326;
    $circle_diameter = 140;

    $names = array("circle_center_x","circle_center_y","circle_width_x","circle_width_y","color","line_x1","line_y1","line_x2","line_y2");

    $data[0] = array($x1_sign, $y1_sign-228, $circle_diameter,$circle_diameter,$col_ellipse,$x1_sign,$y1_sign-132,$x1_sign,$y1_sign-157);
    $data[1] = array($x1_sign+134, $y1_sign-228+43, $circle_diameter, $circle_diameter,$col_ellipse,$x1_sign+77,$y1_sign-132+24,$x1_sign+77+15,$y1_sign-132+24-22);
    $data[2] = array($x1_sign+217, $y1_sign-72, $circle_diameter, $circle_diameter,$col_ellipse,$x1_sign+126,$y1_sign-41,$x1_sign+126+24,$y1_sign-41-8);
    $data[3] = array($x1_sign+217, $y1_sign+72, $circle_diameter, $circle_diameter,$col_ellipse,$x1_sign+126,$y1_sign+41,$x1_sign+126+24,$y1_sign+41+8);
    $data[4] = array($x1_sign+134, $y1_sign+228-43, $circle_diameter, $circle_diameter,$col_ellipse,$x1_sign+77,$y1_sign+132-24,$x1_sign+77+15,$y1_sign+132-24+22);
    $data[5] = array($x1_sign, $y1_sign+228, $circle_diameter, $circle_diameter,$col_ellipse,$x1_sign,458,$x1_sign,484);
    $data[6] = array($x1_sign-134, $y1_sign+228-43, $circle_diameter, $circle_diameter,$col_ellipse,$x1_sign-77,$y1_sign+132-24,$x1_sign-77-15,$y1_sign+132-24+22);
    $data[7] = array($x1_sign-217, $y1_sign+72, $circle_diameter, $circle_diameter,$col_ellipse,$x1_sign-126,$y1_sign+41,$x1_sign-126-24,$y1_sign+41+8);
    $data[8] = array($x1_sign-217, $y1_sign-72, $circle_diameter, $circle_diameter,$col_ellipse,$x1_sign-126,$y1_sign-41,$x1_sign-126-24,$y1_sign-41-8);
    $data[9] = array($x1_sign-134, $y1_sign-228+43, $circle_diameter, $circle_diameter,$col_ellipse,$x1_sign-77,$y1_sign-132+24,$x1_sign-77-15,$y1_sign-132+24-22);

    for($i=0;$i<count($data);$i+=1){
      $data_array = array_combine($names, $data[$i]);
      array_push($bubbles,$data_array);
    }
    return $bubbles;
  }

  function el_calculations(){
    $el[10]= array(0,1,2,3,4,5,6,7,8,9);
    $el[9] = array(0,1,2,3,4,6,7,8,9);
    $el[8] = array(1,2,3,4,6,7,8,9);
    $el[7] = array(0,1,2,3,7,8,9);
    $el[6] = array(1,2,3,7,8,9);
    $el[5] = array(0,2,4,6,8);
    $el[4] = array(1,4,6,9);
    $el[3] = array(0,3,7);
    return $el;
  }
  function rect_calculations(){
    $el[10]= array(640,644,0);
    $el[9] = array(640,601,0);
    $el[8] = array(640,558,40);
    $el[7] = array(640,483,0);
    $el[6] = array(640,444,40);
    $el[5] = array(640,601,0);
    $el[4] = array(640,558,40);
    $el[3] = array(640,487,0);
    return $el;
  }


}



class Bubble{
  function __construct($canvas,$n){
    $col_ellipse = imagecolorallocate($canvas, 216, 227, 232);
    $col_ellipse_back = imagecolorallocate($canvas, 243, 247, 249);

    

    $black = imagecolorallocate($canvas, 0, 0, 0);

    $font = 'Inter-Bold.ttf';
    $black = imagecolorallocate($canvas, 0, 0, 0);
    $size = 16;
    $angle = 0;
    $x1_sign = 326;
    $y1_sign = 326;
    $circle_diameter = 140;
    $text1 = 'Represent the prime';
    $text2 = 'factors of the number';
    $text3 = '“36”';
    

    $black = imagecolorallocate($canvas, 0, 0, 0);
    $bbox = imageftbbox($size, $angle, $font, $text1);
    
    imagettftext($canvas, $size, $angle, $x1_sign-$bbox[2]/2, $y1_sign-$bbox[7]/2-32, $black, $font, $text1);

    $bbox = imageftbbox($size, $angle, $font, $text2);
    imagettftext($canvas, $size, $angle, $x1_sign-$bbox[2]/2, $y1_sign-$bbox[7]/2, $black, $font, $text2);

    $bbox = imageftbbox($size, $angle, $font, $text3);
    imagettftext($canvas, $size, $angle, $x1_sign-$bbox[2]/2, $y1_sign-$bbox[7]/2+32, $black, $font, $text3);
// Represent the prime factors of the number “36”

$bubbles = [];
$data = [];
$names = array("circle_center_x","circle_center_y","circle_width_x","circle_width_y","color","line_x1","line_y1","line_x2","line_y2");

$data[0] = array($x1_sign, $y1_sign-228, $circle_diameter,$circle_diameter,$col_ellipse,$x1_sign,$y1_sign-132,$x1_sign,$y1_sign-157);
$data[1] = array($x1_sign+134, $y1_sign-228+43, $circle_diameter, $circle_diameter,$col_ellipse,$x1_sign+77,$y1_sign-132+24,$x1_sign+77+15,$y1_sign-132+24-22);
$data[2] = array($x1_sign+217, $y1_sign-72, $circle_diameter, $circle_diameter,$col_ellipse,$x1_sign+126,$y1_sign-41,$x1_sign+126+24,$y1_sign-41-8);
$data[3] = array($x1_sign+217, $y1_sign+72, $circle_diameter, $circle_diameter,$col_ellipse,$x1_sign+126,$y1_sign+41,$x1_sign+126+24,$y1_sign+41+8);
$data[4] = array($x1_sign+134, $y1_sign+228-43, $circle_diameter, $circle_diameter,$col_ellipse,$x1_sign+77,$y1_sign+132-24,$x1_sign+77+15,$y1_sign+132-24+22);
$data[5] = array($x1_sign, $y1_sign+228, $circle_diameter, $circle_diameter,$col_ellipse,$x1_sign,458,$x1_sign,484);
$data[6] = array($x1_sign-134, $y1_sign+228-43, $circle_diameter, $circle_diameter,$col_ellipse,$x1_sign-77,$y1_sign+132-24,$x1_sign-77-15,$y1_sign+132-24+22);
$data[7] = array($x1_sign-217, $y1_sign+72, $circle_diameter, $circle_diameter,$col_ellipse,$x1_sign-126,$y1_sign+41,$x1_sign-126-24,$y1_sign+41+8);
$data[8] = array($x1_sign-217, $y1_sign-72, $circle_diameter, $circle_diameter,$col_ellipse,$x1_sign-126,$y1_sign-41,$x1_sign-126-24,$y1_sign-41-8);
$data[9] = array($x1_sign-134, $y1_sign-228+43, $circle_diameter, $circle_diameter,$col_ellipse,$x1_sign-77,$y1_sign-132+24,$x1_sign-77-15,$y1_sign-132+24-22);

for($i=0;$i<count($data);$i+=1){
  $data_array = array_combine($names, $data[$i]);
  array_push($bubbles,$data_array);
}

$el[10]= array(0,1,2,3,4,5,6,7,8,9);
$el[9] = array(0,1,2,3,4,6,7,8,9);
$el[8] = array(1,2,3,4,6,7,8,9);
$el[7] = array(0,1,2,3,7,8,9);
$el[6] = array(1,2,3,7,8,9);
$el[5] = array(0,2,4,6,8);
$el[4] = array(1,4,6,9);
$el[3] = array(0,3,7);

foreach ($el[$n] as &$i) {
  imageellipse($canvas, $bubbles[$i]["circle_center_x"], $bubbles[$i]["circle_center_y"],$bubbles[$i]["circle_width_x"],$bubbles[$i]["circle_width_y"],$bubbles[$i]["color"]);
  imagefill($canvas, $bubbles[$i]["circle_center_x"], $bubbles[$i]["circle_center_y"], $col_ellipse_back);
  imageline($canvas,$bubbles[$i]["line_x1"],$bubbles[$i]["line_y1"],$bubbles[$i]["line_x2"],$bubbles[$i]["line_y2"],$bubbles[$i]["color"]);
}


    // main
    imageellipse($canvas, 326, 326, 264, 264, $col_ellipse);


  }
}

?>