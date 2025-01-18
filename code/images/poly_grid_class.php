<?php
$canvas = imagecreatetruecolor(640, 640);

$x_c1 = intval($_GET['x1']);
$y_c1 = intval($_GET['y1']);
$x_c2 = intval($_GET['x2']);
$y_c2 = intval($_GET['y2']);

$x_c1_2 = intval($_GET['x1_2']);
$y_c1_2 = intval($_GET['y1_2']);
$x_c2_2 = intval($_GET['x2_2']);
$y_c2_2 = intval($_GET['y2_2']);

$cv = new Start_Canvas($canvas);
$r1 = new Rectangle($canvas,$x_c1,$y_c1,$x_c2,$y_c2,20,10);
$r2 = new Rectangle($canvas,$x_c1_2,$y_c1_2,$x_c2_2,$y_c2_2,320,10);
// $r3 = new Rectangle($canvas,$x_c1,$y_c1,$x_c2,$y_c2,20,220);
// $r4 = new Rectangle($canvas,$x_c1,$y_c1,$x_c2,$y_c2,220,220);


header('Content-type: image/png');
imagepng($canvas);
imagedestroy($canvas);


class Start_Canvas{
  function __construct($canvas) {
  
    $this->background($canvas);
    $this->grid($canvas);
  
  }
  function background($canvas){
    $white = imagecolorallocate($canvas, 255, 255, 255);
    imagefill($canvas, 0, 0, $white);
  }

  function grid($canvas) {
    $grey = imagecolorallocate($canvas, 200, 200, 200);
    for ($i=0;$i<=64;$i+=1){
        imageline($canvas, $i*10, 0, $i*10, 640, $grey);
        imageline($canvas, 0, $i*10, 640, $i*10, $grey);
    }
  }



}


class Rectangle{
    // public $x_correction=20;
    // public $y_correction=10;

    function __construct($canvas,$x1,$y1,$x2,$y2,$start_x,$start_y) {
        // $this->$x_correction=$start_x;
        // $this->$y_correction=$start_y;
        
        $arr_length = $this->length_calculation($x1,$y1,$x2,$y2);

        $this->sign($canvas,$arr_length,$x1,$y1,$x2,$y2,$start_x,$start_y);
        $this->rect($canvas,$x1,$y1,$x2,$y2,$start_x,$start_y);
      }


      
      function length_calculation($x1,$y1,$x2,$y2){
            $array_out = array(
                "top" => $x2-$x1,
                "left" => $y2-$y1,
                "right" => $y2-$y1,
                "bottom" => $x2-$x1,
            );
            return $array_out;
        }
      function rect($canvas,$x1, $y1, $x2, $y2,$start_x,$start_y){
        $black = imagecolorallocate($canvas, 0, 0, 0);
        $x_p1 = $start_x+$x1*10;
        $y_p1 = $start_y+$y1*10;
        $x_p2 = $start_x+$x2*10;
        $y_p2 = $start_y+$y2*10;

        imagerectangle($canvas, $x_p1, $y_p1, $x_p2, $y_p2, $black);
      }

        function sign($canvas,$arr_length,$x1,$y1,$x2,$y2,$start_x,$start_y){
          $font = 'Inter.ttf';
          $black = imagecolorallocate($canvas, 0, 0, 0);
          $size = 8;
          $angle = 0;

          $x1_p = $start_x+$x1*10;
          $y1_p = $start_y+$y1*10;
          $x2_p = $start_x+$x2*10;
          $y2_p = $start_y+$y2*10;

          $bbox = imageftbbox($size, $angle, $font,  $arr_length["top"]);
          $x1_sign = $start_x+($x2-$x1)/2*10-$bbox[2]/2+1;
          $y1_sign = $start_y+$y1*10-1;
  
          imagettftext($canvas, $size, $angle, $x1_sign, $y1_sign, $black, $font, $arr_length["top"]);
          
          $bbox = imageftbbox($size, $angle, $font,  $arr_length["left"]);
          $x1_sign = $start_x+$x1*10-$bbox[2]-1;
          $y1_sign = $start_y+($y2-$y1)/2*10-$bbox[7]/2+1;
  
          imagettftext($canvas, $size, $angle, $x1_sign, $y1_sign, $black, $font, $arr_length["left"]);
          
          $bbox = imageftbbox($size, $angle, $font,  $arr_length["right"]);
          $x1_sign = $start_x+$x2*10+1;
          $y1_sign = $start_y+($y2-$y1)/2*10-$bbox[7]/2+1;
  
          imagettftext($canvas, $size, $angle, $x1_sign, $y1_sign, $black, $font, $arr_length["right"]);
          
          $bbox = imageftbbox($size, $angle, $font,  $arr_length["bottom"]);
          $x1_sign = $start_x+($x2-$x1)/2*10-$bbox[2]/2+1;
          $y1_sign = $start_y+$y2*10-$bbox[7]+3;

          imagettftext($canvas, $size, $angle, $x1_sign, $y1_sign, $black, $font, $arr_length["bottom"]);
        }
}

?>