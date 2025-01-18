<?php
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);

$image = new Imagick();
$image->newImage(600, 600, new ImagickPixel('white'));
$image->setImageFormat('png');

$draw = new ImagickDraw ();
// $n = 10;
$symbols_arr = ['*','/','-','#','@','&','(',')','+','!','$','%','^','='];
$ratio = 10;


// Take position

$font = 'Inter.ttf';
$size = 48;

$draw->setFontSize($size);
$draw->setFont($font);
$bbox_a = imagettfbbox($size, 0, $font, "{$n}");
$text_x = abs($bbox_a[2]);
$text_y = abs($bbox_a[5]);

$draw->setTextAlignment(\Imagick::ALIGN_CENTER);
// $draw->annotation(100,100,$digit_arr[0]);
$symbols_n = count($symbols_arr);







// do{
//     $x = rand(40,550);
//     $y = rand(40,550);
//     $flag = 1;
//     for ($i=0;$i<count($coords);$i+=1){   
//         if ((($x<$coords[$i]->x+50)and($x>$coords[$i]->x-50)and($y<$coords[$i]->y+50)and($y>$coords[$i]->y-50))){
//             $flag = 0;
//         } 
//     }
// }while ($flag =0);


$coords = [];
$items = 0;
$x = rand(40,550);
$y = rand(40,550);
$obj = (object) array('x' => $x,'y' => $y);
array_push($coords,$obj);
for ($i=0;$i<count($t);$i+=1){

    $str =$t[$i];
    do{
        $x = rand(40,550);
        $y = rand(40,550);
        $flag = 1;
        for ($k=0;$k<count($coords);$k+=1){   
            if ((($x<$coords[$k]->x+40)and($x>$coords[$k]->x-40)and($y>$coords[$k]->y-40)and($y<$coords[$k]->y+80))){
                $flag = 0;
            } 
        }
    }while ($flag ==0);

    $draw->annotation($x,$y,"{$str}");
    // $draw->circle($x,$y,$x+1,$y);
    $obj = (object) array('x' => $x,'y' => $y);
    array_push($coords,$obj);


    for ($j=0;$j<$ratio;$j+=1){
        do{
            $x = rand(40,550);
            $y = rand(40,550);
            $flag = 1;
            for ($k=0;$k<count($coords);$k+=1){   
                if ((($x<$coords[$k]->x+40)and($x>$coords[$k]->x-40)and($y>$coords[$k]->y-40)and($y<$coords[$k]->y+80))){
                    $flag = 0;
                }
            }
        }while ($flag==0);

        $n = rand(0,$symbols_n);
        $str = $symbols_arr[$n];
        $draw->annotation($x,$y,"{$str}");
        // $draw->line($x-20,$y+10,$x+20,$y+10);$draw->line($x+20,$y+10,$x+20,$y-40);$draw->line($x+20,$y-40,$x-20,$y-40);$draw->line($x-20,$y-40,$x-20,$y+10);
        // $draw->circle($x,$y,$x+1,$y);
        $obj = (object) array('x' => $x,'y' => $y);
array_push($coords,$obj);
    }
    // $draw->annotation(100+$i*50,100,$i);
}



$image->drawImage($draw);
header('Content-type: image/png');

// $n = imagejpeg($image, NULL, 75);
// imagepng($image);

echo $image;



?>