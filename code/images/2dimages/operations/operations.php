<?php
header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);

if (count($t)>=3){$back = imagecreatefromjpeg ("../../images/canvas.jpg");}
// 2
if (count($t)==2){$back = imagecreatefromjpeg ("../../images/canvas300_600.jpg");}
// 1
if (count($t)==1){$back = imagecreatefromjpeg ("../../images/canvas300.jpg");}

$blur64 = imagecreatefrompng ("../../images/blur64.png");
require("../lib/objects.php");

$font_file = '../../Inter.ttf';

$black = imagecolorallocate($back, 0, 0, 0);

// imagecopyresampled($back,$objects[0],100, 100, 0, 0, 64, 64, 64, 64);
// imagecopyresampled($back,$blur64,100, 100, 0, 0, 64, 64, 64, 64);

$col = 2;
$obj = 0;
for($k=0;$k<count($t);$k+=1){
    $j = $k%$col;
    $i = intdiv($k,$col);
    // imagecopyresampled($back,$objects[0],$j*300, $i*300, 0, 0, 64, 64, 64, 64);
   
    if ($t[$k][4]==0){
        $str = $t[$k][0].sign($t[$k][2]).$t[$k][1]."=".$t[$k][3];
        imagefttext($back, 60, 0, $j*300, $i*300+150,  $black, $font_file, $str);
    }
    if ($t[$k][4]==2){
        $str = $t[$k][0].sign($t[$k][2]).$t[$k][1];
        // $font_file = '../../Inter.ttf';
        $size = 150;
        $angle = 0;
        $bbox = imageftbbox($size, $angle, $font_file , $str);
        $width = $bbox[2] - $bbox[0];
        $height = $bbox[1] - $bbox[5];
        imagefttext($back, 60, 0, ($width-300)+10+$j*300, $i*300+150,  $black, $font_file, $str);
    }

    if ($t[$k][4]==1){
        if($t[$k][2]==0){
        if ($t[$k][0]<6){$w = 45;} else{$w = 300/($t[$k][0]);}

        $max_n = max($t[$k][0],$t[$k][1]);
        $w = 300/($max_n);

        for($l=0;$l<$t[$k][0];$l+=1){
            if (isset($t[$k][5])) {$obj = $t[$k][5];} else {$obj = 0;}
            $object = $objects[$obj];
            imagecopyresampled($back,$object,$start_x+$w*$l+$j*300, $i*300+25, 0, 0, $w, $w, 64, 64);
        }

        for($l=0;$l<$t[$k][1];$l+=1){
            if (isset($t[$k][5])) {$obj = $t[$k][5];} else {$obj = 0;}
            $object = $objects[$obj];
            imagecopyresampled($back,$object,$start_x+$w*$l+$j*300, $i*300+25+$w, 0, 0, $w, $w, 64, 64);
        }
    }

    if($t[$k][2]==1){
        if ($t[$k][0]<6){$w = 45;} else{$w = 300/($t[$k][0]);}
        $w = 300/($t[$k][0]);

        for($l=0;$l<$t[$k][0];$l+=1){
            if (isset($t[$k][5])) {$obj = $t[$k][5];} else {$obj = 0;}
            $object = $objects[$obj];
            imagecopyresampled($back,$object,$start_x+$w*$l+$j*300, 100+$i*300, 0, 0, $w, $w, 64, 64);
        }

        for($m=$t[$k][0]-1;$m>=($t[$k][0]-$t[$k][1]);$m-=1){
            // $object = $objects[$obj];
            imagecopyresampled($back,$blur64,$start_x+$w*$m+$j*300, 100+$i*300, 0, 0, $w, $w, 64, 64);
        }
    }



    }


}

// $w = 40;





// $str = $t[0][0].sign($t[0][2]).$t[0][1]."=".$t[0][3];
// imagefttext($back, 60, 0, 320, 100+50,  $black, $font_file, $str);


imageline($back,300,0,300,600,$black );
imageline($back,0,300,600,300,$black );

function sign($n){
    if ($n==0) $out = "+";
    if ($n==1) $out = "-";
    if ($n==2) $out = "*";
    if ($n==3) $out = "/";
    return $out;

}


imagepng($back);
imagedestroy($back);

?>