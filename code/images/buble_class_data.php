<?php
$canvas = imagecreatetruecolor(652, 652);


    $x1_sign = 326;
    $y1_sign = 326;
    $circle_diameter = 140;
    $col_ellipse = imagecolorallocate($canvas, 216, 227, 232);

    $bubbles = [];





    $data = [];
    $names = array("circle_center_x","circle_center_y","circle_width_x","circle_width_y","color","line_x1","line_y1","line_x2","line_y2");
    // 1
    imageellipse($canvas, $x1_sign+134, $y1_sign-228+43, $circle_diameter, $circle_diameter,  $black);
    imageline($canvas,$x1_sign+77,$y1_sign-132+24,$x1_sign+77+15,$y1_sign-132+24-22, $black);
    // 2
    imageellipse($canvas, $x1_sign+217, $y1_sign-72, $circle_diameter, $circle_diameter, $black);
    imageline($canvas,$x1_sign+126,$y1_sign-41,$x1_sign+126+24,$y1_sign-41-8,$black);
    // 3
    imageellipse($canvas, $x1_sign+217, $y1_sign+72, $circle_diameter, $circle_diameter, $black);
    imageline($canvas,$x1_sign+126,$y1_sign+41,$x1_sign+126+24,$y1_sign+41+8,$black);
    // 4
    imageellipse($canvas, $x1_sign+134, $y1_sign+228-43, $circle_diameter, $circle_diameter, $black);
    imageline($canvas,$x1_sign+77,$y1_sign+132-24,$x1_sign+77+15,$y1_sign+132-24+22,$black);
    // 5
    imageellipse($canvas, $x1_sign, $y1_sign+228, $circle_diameter, $circle_diameter, $black);
    imageline($canvas,$x1_sign,458,$x1_sign,484,$black);
    // 6
    imageellipse($canvas, $x1_sign-134, $y1_sign+228-43, $circle_diameter, $circle_diameter, $black);
    imageline($canvas,$x1_sign-77,$y1_sign+132-24,$x1_sign-77-15,$y1_sign+132-24+22,$black);
    // 7
    imageellipse($canvas, $x1_sign-217, $y1_sign+72, $circle_diameter, $circle_diameter, $black);
    imageline($canvas,$x1_sign-126,$y1_sign+41,$x1_sign-126-24,$y1_sign+41+8,$black);
    // 8
    imageellipse($canvas, $x1_sign-217, $y1_sign-72, $circle_diameter, $circle_diameter, $black);
    imageline($canvas,$x1_sign-126,$y1_sign-41,$x1_sign-126-24,$y1_sign-41-8,$black);
    // 9
    imageellipse($canvas, $x1_sign-134, $y1_sign-228+43, $circle_diameter, $circle_diameter, $black);
    imageline($canvas,$x1_sign-77,$y1_sign-132+24,$x1_sign-77-15,$y1_sign-132+24-22,$black);




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

print_r($bubbles);

echo($bubbles[0]["circle_center_x"]);
?>