<?php
    header("Content-type: image/png");
    if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
    $t = json_decode($_GET['t']);

    $back = imagecreatefromjpeg ("../../images/canvas300_600.jpg");
    $black = imagecolorallocate($back, 0, 0, 0);

    imageline($back,300,0,300,300,$black );


    
    $h = 100;
    imageline($back,10,10,225,10,$black );
    imageline($back,225,10,225,10+$h,$black );
    imageline($back,225,10+$h,10,10+$h,$black );
    imageline($back,10,10+$h,10,10,$black );

    $x = 300;
    imageline($back,$x+10,10,$x+225,10,$black );
    imageline($back,$x+225,10,$x+225,10+$h,$black );
    imageline($back,$x+225,10+$h,$x+10,10+$h,$black );
    imageline($back,$x+10,10+$h,$x+10,10,$black );


    $x = 0;
    $y_start = 200;
    $w = 60;
    $h = 40;
    imageline($back,$x+10,$y_start+10,$x+$w,$y_start+10,$black );
    imageline($back,$x+$w,$y_start+10,$x+$w,$y_start+10+$h,$black );
    imageline($back,$x+$w,$y_start+10+$h,$x+10,$y_start+10+$h,$black );
    imageline($back,$x+10,$y_start+10+$h,$x+10,$y_start+10,$black );
    // imageline($back,$x+10,180,$x+225,180,$black );
    // imageline($back,$x+225,180,$x+225,420,$black );
    // imageline($back,$x+225,420,$x+10,420,$black );
    // imageline($back,$x+10,420,$x+10,180,$black );


    $font_file = '../../Inter.ttf';

    // imageline($back,275,0,275,600,$black );

    // imageline($back,275,150,600,150,$black );
    // imageline($back,275,300,600,300,$black );
    // imageline($back,275,450,600,450,$black );



    imagepng($back);
    imagedestroy($back);
?>