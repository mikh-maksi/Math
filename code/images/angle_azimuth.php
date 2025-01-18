<?php
function deg_rad($deg){
    return $deg*pi()/180;
}

$alfa =rand(0, 360);

function line_azimuth($alfa = 20, $l = 200,$x = 300, $y=300){
$dx = cos(deg_rad($alfa))*$l;
$dy = sin(deg_rad($alfa))*$l;

$x1 = $x - $dx;
$y1 = $y - $dy;

$coord_out = [$x,$y,$x1,$y1];
return $coord_out;
}
$alfa =rand(0, 360);
$c = line_azimuth($alfa);


$image = new Imagick();
$image->newImage(800, 600, new ImagickPixel('white'));
$image->setImageFormat('png');

$draw = new ImagickDraw ();

$font = 'Inter.ttf';
$size = 12;

$draw->setFontSize($size);
$draw->setFont($font);
$r_out = round($k,$r);

for($alfa=0;$alfa<360;$alfa+=40){
    $c1 = line_azimuth($alfa-10);
    $c = line_azimuth($alfa);
    $c2 = line_azimuth($alfa+10);

    $bbox_a = imagettfbbox($size, 0, $font, $alfa);
    $text_x = abs($bbox_a[2]);
    $text_y = abs($bbox_a[5]);
    $text_diagonal = round(sqrt($text_x**2+$text_y**2),2);

    if ($cos_alfa>0){
    $dx = -$text_x*$cos_alfa;
    $dx = 0;
    }else{
        $dx = 0;
    }
    $dy=0;
    // $dy = $text_y/2;
    $dx_l = $dx+$text_x/2-3;
    $dy_l = $dy-$text_y/2+1;

    // $draw->annotation($c[2]+$dx,$c[3]+$dy ,$alfa);
    $draw->circle($c[2]+$dx_l,$c[3]+$dy_l ,$c[2]+$dx_l,$c[3]+$dy_l+1);
    $draw->annotation($c[2]-$dx_l,$c[3]-$dy_l ,$alfa);

    $draw->annotation($c[2],$c[3]+15," cos=".round($cos_alfa,2)." sin=".round($sin_alfa,2)." tg=".round($tg_alfa,2)." ctg=". round($ctg_alfa,2) );
    $draw->annotation($c[2],$c[3]+30,"x=".$text_x." y=".$text_y);


    $draw->line($c1[0],$c1[1],$c1[2],$c1[3]);
    $draw->line($c2[0],$c2[1],$c2[2],$c2[3]);
}



$image->drawImage($draw);
header('Content-type: image/png');
echo $image;




?>