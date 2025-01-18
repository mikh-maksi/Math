<?php
$canvas = imagecreatetruecolor(652, 652);

$n = intval($_GET['n']);


$cv = new Start_Canvas($canvas);
$bble = new Bubble($canvas,$n);
// $r1 = new Rectangle($canvas,$x_c1,$y_c1,$x_c2,$y_c2,20,10);
// $r2 = new Rectangle($canvas,$x_c1,$y_c1,$x_c2,$y_c2,220,10);
// $r3 = new Rectangle($canvas,$x_c1,$y_c1,$x_c2,$y_c2,20,220);
// $r4 = new Rectangle($canvas,$x_c1,$y_c1,$x_c2,$y_c2,220,220);


header('Content-type: image/png');
imagepng($canvas);
imagedestroy($canvas);


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