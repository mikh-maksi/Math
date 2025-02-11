<?php
include ("lib.php");
$angle_arr = [90,180];
$i = random_int(0,1);
// $angle = $angle_arr[$i];

$angle = 90;
$x_turn = random_int(0,0);
$y_turn = random_int(0,0);

$x1 = random_int(-1,1);
$y1 = random_int(-1,1);

$x_turn = $x1;
$y_turn = $y1;

do{
    $dx = random_int(-2,4);
    $dy = random_int(-2,4);
    $x2 = $x1+$dx;
    $y2 = $y1+$dy;

    $dx = random_int(-2,4);
    $dy = random_int(-2,4);
    $x3 = $x2+$dx;
    $y3 = $y2+$dy;

    $determinant = $x1 * ($y2 - $y3) +
    $x2 * ($y3 - $y1) +
    $x3 * ($y1 - $y2);
}while ((abs($determinant)<=3)or(max($x1,$x2,$x3,$y1,$y2,$y3)>5)or(min($x1,$x2,$x3,$y1,$y2,$y3)<-5));

$x3 = $x2+$dx;
$y3 = $y2+$dy;


?>

<img src = "https://math.kh.ua/images/2dshapes/Triangles/tr_rotate.php?t=[[[<?php echo $x1; ?>,<?php echo $y1; ?>],[<?php echo $x2; ?>,<?php echo $y2; ?>],[<?php echo $x3; ?>,<?php echo $y3; ?>]],[<?php echo $x_turn?>,<?php echo $y_turn?>],<?php echo $angle;?>]" width = 600>
<br>
<?php
    $determinant = $x1 * ($y2 - $y3) +
    $x2 * ($y3 - $y1) +
    $x3 * ($y1 - $y2);
    $dx = max ($x1,$x2,$x3) - min($x1,$x2,$x3);
    $dy = max ($y1,$y2,$y3) - min($y1,$y2,$y3);
    $elongation = max($dx,$dy)/min($dx,$dy);
    $avg_x = ($x1+$x2+$x3)/3;
    $avg_y = ($y1+$y2+$y3)/3;

    

echo "({$x1};{$y1}),({$x2};{$y2}),({$x3};{$y3}); {$determinant} ;  elongation = {$elongation}; dx = {$dx}, dy = {$dy}";
?>