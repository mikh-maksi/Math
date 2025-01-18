<?php
    header("Content-type: image/png");
    if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
    $t = json_decode($_GET['t']);

    $back = imagecreatefromjpeg ("../../images/canvas.jpg");
    $black = imagecolorallocate($back, 0, 0, 0);


    imageline($back,225,0,225,600,$black );
    imageline($back,0,180,225,180,$black );
    imageline($back,0,420,225,420,$black );
    $font_file = '../../Inter.ttf';

    imageline($back,275,0,275,600,$black );

    imageline($back,275,150,600,150,$black );
    imageline($back,275,300,600,300,$black );
    imageline($back,275,450,600,450,$black );



    imagepng($back);
    imagedestroy($back);
?>