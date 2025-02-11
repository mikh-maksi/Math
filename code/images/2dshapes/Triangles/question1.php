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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .wrapper{
            display:flex;
        }
        .red{
            color:rgb(200, 32, 32);
        }
        .right{
            background: rgb(10,200,10);
        }
        .wrong{
            background: rgb(200, 10, 10);
        }
    </style>
</head>
<body>
    <?
    $determinant = $x1 * ($y2 - $y3) +
    $x2 * ($y3 - $y1) +
    $x3 * ($y1 - $y2);
    $dx = max ($x1,$x2,$x3) - min($x1,$x2,$x3);
    $dy = max ($y1,$y2,$y3) - min($y1,$y2,$y3);
    $elongation = max($dx,$dy)/min($dx,$dy);
    $avg_x = ($x1+$x2+$x3)/3;
    $avg_y = ($y1+$y2+$y3)/3;
    $ab = round(sqrt(($x1-$x2)**2+($y1-$y2)**2),2);
    $bc = round(sqrt(($x2-$x3)**2+($y2-$y3)**2),2);
    $ac = round(sqrt(($x3-$x1)**2+($y3-$y1)**2),2);
    $c0 = round(sqrt(($x3)**2+($y3)**2),2);

    
    $answer[0] = $ab;    $answer[1] = $bc;    $answer[2] = $ac;    $answer[3] = $c0; 
    
    // print_r($answer);
    $answer_text[0] = "AB";    $answer_text[1] = "BC";    $answer_text[2] = "AC";    $answer_text[3] = "C0";
    $var = random_int(0, 2);
    $variants = range(0, 3);

    $side_name = $answer_text[$var];
    $side_size = $answer[$var];
    for($i=0;$i<4;$i+=1){
        if ($i == $var) {continue;}
        for ($j=0;$j<$i;$j+=1){
            if ($answer[$i]==$answer[$j]) {$answer[$i]/=2;}
        }
    }

    shuffle($variants);


?>

    <div class="wrapper">
        <div class = "picture"><img src = "https://math.kh.ua/images/2dshapes/Triangles/tr_rotate.php?t=[[[<?php echo $x1; ?>,<?php echo $y1; ?>],[<?php echo $x2; ?>,<?php echo $y2; ?>],[<?php echo $x3; ?>,<?php echo $y3; ?>]],[<?php echo $x_turn?>,<?php echo $y_turn?>],<?php echo $angle;?>]" width = 500>
        </div>
        <div class = "text">
        <?php
            echo "<p>The <span class = 'red'><b>triangle 2</b></span> is obtained from <b>triangle 1</b> by rotating it around the point <b>({$x1}, {$y1})</b> by <b>{$angle}</b> degrees.</p>";
            echo "<p>Side {$side_name} of <b>triangle 1</b> is equal {$side_size}.</p>";
            echo "<p>How long Side AB of <span class = 'red'><b>triangle 2</b></span>?</p>";
            echo "<input type = radio value = {$variants[0]} name = answers> {$answer[$variants[0]]}";
            echo "<input type = radio value = {$variants[1]} name = answers> {$answer[$variants[1]]}";
            echo "<input type = radio value = {$variants[2]} name = answers> {$answer[$variants[2]]}";
            echo "<input type = radio value = {$variants[3]} name = answers> {$answer[$variants[3]]}";
        ?>
        <div id="result"></div>

        </div>
    </div>
    <div style = "display:none;">
        <?php echo "({$x1};{$y1}),({$x2};{$y2}),({$x3};{$y3}); {$determinant} ;  elongation = {$elongation}; dx = {$dx}, dy = {$dy}";
            echo "<br>";
            echo "ab = {$ab}; bc = {$bc}; ac = {$ac}";
        ?>
</div>
<script>

        function handleRadioChange(event) {
            var res = document.getElementById("result");
            if (event.target.value == <?php echo $var;?>){
                res.classList.add("right");
                res.classList.remove("wrong");
                res.innerHTML = "<b>Right Answer</b>";
            } else{
                res.classList.add("wrong");
                res.classList.remove("right");
                res.innerHTML = "<b>Wrong Answer</b>";
            }
            
        }
     const radios = document.getElementsByName("answers");
            for (const radio of radios) {
                radio.addEventListener("change", handleRadioChange);
            }
    </script>

</body>
</html>





<br>
<?php

    

?>
