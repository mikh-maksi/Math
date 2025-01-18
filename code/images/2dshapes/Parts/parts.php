<?php
    header("Content-type: image/png");
    if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
    $t = json_decode($_GET['t']);

    $back = imagecreatefromjpeg ("../../images/canvas.jpg");
    $font_file = '../../Inter.ttf';
    $black = imagecolorallocate($back, 0, 0, 0);

    $w = $t[1]*15;
    $h = $t[1]*15;

    $x = 0;
    $y_start = 200;

    f($back,$w,$h);

    // $array_w_h = [5,3,7,8];
    $array_w_h = $t[0];
    f4($back, $array_w_h);


    // imageline($back,300,0,300,300,$black );


    imageline($back,225,0,225,600,$black );
    // imageline($back,0,180,225,180,$black );
    // imageline($back,0,420,225,420,$black );

    $x_line = 350;
    $d_font = 25;
    imageline($back,$x_line+$d_font,0,$x_line+$d_font,600,$black );

    imageline($back,$x_line+$d_font,150,600,150,$black );
    imageline($back,$x_line+$d_font,300,600,300,$black );
    imageline($back,$x_line+$d_font,450,600,450,$black );

    imagefttext($back, 24, 0, $x_line, 150, $black, $font_file, 'A');
    imagefttext($back, 24, 0, $x_line, 300, $black, $font_file, 'B');
    imagefttext($back, 24, 0, $x_line, 450, $black, $font_file, 'C');
    imagefttext($back, 24, 0, $x_line, 600, $black, $font_file, 'D');




function f($back,$w,$h){
        $black = imagecolorallocate($back, 0, 0, 0);
        // imageline($back,10,10,100,200+$w,$black );
        $x = 10;
        $y_start = 200;
        $black = imagecolorallocate($back, 0, 0, 0);
        imageline($back,$x+10,$y_start+10,$x+$w,$y_start+10,$black );
        imageline($back,$x+$w,$y_start+10,$x+$w,$y_start+10+$h,$black );
        imageline($back,$x+$w,$y_start+10+$h,$x+10,$y_start+10+$h,$black );
        imageline($back,$x+10,$y_start+10+$h,$x+10,$y_start+10,$black );
}

function f4($back,$array_w_h){
    // $w = $w4/2;
    // $h = $h4/2;

    $black = imagecolorallocate($back, 0, 0, 0);

    $y_array = [0,150,300,450];
    $col =2;

    for ($m=0;$m<4;$m+=1){
    $x = 400;
    $y_start =  $y_array[$m]+5;

    $w = $array_w_h[$m]/2*15;
    $h = $array_w_h[$m]/2*15;


     for($k=0;$k<4;$k+=1){
        $j = $k%$col;
        $i = intdiv($k,$col);
        $delta= 5;
        imageline($back, $x+$j*($w+$delta),    $y_start+$i*($h+$delta),    $x+$w+$j*($w+$delta),  $y_start+$i*($h+$delta),$black );
        imageline($back, $x+$w+$j*($w+$delta), $y_start+$i*($h+$delta),    $x+$w+$j*($w+$delta),  $y_start+$h+$i*($h+$delta),$black );
        imageline($back, $x+$w+$j*($w+$delta), $y_start+$h+$i*($h+$delta), $x+$j*($w+$delta),  $y_start+$h+$i*($h+$delta),$black );
        imageline($back, $x+$j*($w+$delta),    $y_start+$h+$i*($h+$delta), $x+$j*($w+$delta),  $y_start+$i*($h+$delta),$black );
    }
}
}


    $font_file = '../../Inter.ttf';

    // imageline($back,275,0,275,600,$black );

    // imageline($back,275,150,600,150,$black );
    // imageline($back,275,300,600,300,$black );
    // imageline($back,275,450,600,450,$black );



    imagepng($back);
    imagedestroy($back);
?>