<?php
// if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
// $t = json_decode($_GET['t']);

// Generate quenue
$radio = [];
$checkbox = [];

$arr = [];
$items = 0;
do{
    $n = rand(0,20);
    $flag = 1;
    for ($i=0;$i<count($arr);$i+=1){
        if ($arr[$i]==$n){$flag = 0;}
    }
    if ($flag){
        array_push($arr,$n); 
        $items+=1;

    }
} while ($items<3);
$txt =  json_encode($arr);

// Generate wrong
$items = 0;
do{
    $n = rand(0,20);
    $flag = 1;
    for ($i=0;$i<count($arr);$i+=1){
        if ($arr[$i]==$n){$flag = 0;}
    }
    if ($flag){$items+=1;}
} while ($items<1);
$wrong = $n;

for ($i = 0;$i<count($arr);$i+=1){
    $obj = (object) array('value' => $arr[$i],'status' => true);
    array_push($checkbox,$obj);
}
$obj = (object) array('value' => $wrong,'status' => false);
array_push($checkbox,$obj);

shuffle($checkbox);

$out_checkbox = json_encode($checkbox);


$t = json_decode($txt);

$image = new Imagick();
$image->newImage(600, 200, new ImagickPixel('white'));
$image->setImageFormat('png');

$draw = new ImagickDraw ();
// $n = 10;


$font = 'Inter.ttf';
$size = 20;

$draw->setFontSize($size);
$draw->setFont($font);




// $draw->annotation(300,$text_y ,"{$n}");


$draw->line(575,90,595,100);
$draw->line(575,110,595,100);


// Text of input 
$str = "Input: ";
$str .= $txt ;
$str .= " Right: ".$txt ;
$str .= " Wrong: ".$wrong ;



$draw->setTextAlignment(\Imagick::ALIGN_LEFT);
$draw->annotation(20,180,$str);
$draw->setFontSize(10);

$draw->annotation(20,195,$out_checkbox);
$draw->setFontSize($size);
$draw->setTextAlignment(\Imagick::ALIGN_CENTER);


$step = 27;
$start = 20;

$draw->line($start ,100,595,100);

for($i=0;$i<=20;$i+=1){
    $bbox_a = imagettfbbox($size, 0, $font, "{$i}");
    $text_x = abs($bbox_a[2]);
    $text_y = abs($bbox_a[5]);
    $draw->line($start+$i*$step,95,$start+$i*$step,105);
    if (!in_array((string)$i,$t))
        $draw->annotation($start+$i*$step,105+$text_y,"{$i}");
}



$image->drawImage($draw);
header('Content-type: image/png');
echo $image;



?>