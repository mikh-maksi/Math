<?php
include ("config.php");
include ("connect.php");
if (isset($_GET['id'])){$id = $_GET['id'];}else{$id=1;}
if (isset($_GET['sc'])){$sc = $_GET['sc'];}else{$sc=1;}
$sql = "SELECT * FROM `results` WHERE user_id = {$id} AND succes_criteria = {$sc}";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    $level_arr = [0,0,0];   
    while($row = $result->fetch_assoc()) {
        $lvl = $row['level'];
        $level_arr[$lvl]+=$row['result'];
    }
}
if ($level_arr[0]<3){
    $level = 0;
} else if ($level_arr[1]<3){
    $level = 1;
} else {
    $level=2;
}

// echo $result->num_rows;

$sql = "SELECT * FROM `success_criteria` WHERE id = {$sc}";
$result_info = $mysqli->query($sql);

if ($result_info->num_rows > 0) {
    // Виведення даних кожного рядка
    while($row = $result_info->fetch_assoc()) {
        $standart = $row["standard_id"];
        $succes_criteria_text = $row["description"];
    }
}

?>

<?php
include ("lib.php");
$angle_arr = [90,180,45,235];
$i = random_int(0,1);
$x_turn = random_int(0,0);
$y_turn = random_int(0,0);

$x1 = random_int(-1,1);
$y1 = random_int(-1,1);



// $angle = $angle_arr[$i];
if ($level == 0){
    $angle = 90;
    $x_turn = $x1;
    $y_turn = $y1;

} 
if ($level == 1){
    $n_angles = random_int(0,1);
    $angle = $angle_arr[$n_angles];
    $x_turn = $x1;
    $y_turn = $y1;

} 
if ($level == 2){
    $n_angles = random_int(0,3);
    $angle = $angle_arr[$n_angles];
    $x_turn = random_int(-1,1);
    $y_turn = random_int(-1,1);
} 



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
        
        .wrapper,.indicator,.levels{
            display:flex;
        }
        .dash{
            width:30px;
            height:30px;
            border:1px solid black;
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
    <div id="standart"><b>Standart</b> <?php echo $standart; ?></div>
    <div id="sucess_criteria"><b>Success criteria:</b><?php echo $succes_criteria_text; ?></div>
    <div class="indicator">    
        <div class = "levels">Level 1: <div id="level_1" class = "dash"></div></div>
        <div class = "levels">Level 2: <div id="level_2" class = "dash"></div></div>
        <div class = "levels">Level 3: <div id="level_3" class = "dash"></div></div>
    </div>
    <div>Current level: <?php echo $level;?></div>
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
    url = "https://math.kh.ua/images/2dshapes/Triangles/question_status.php?id=1&sc=1";
    ftch_level(url);

    function ftch_level(url){
            fetch(url, {
                method: 'GET'
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                var level1 = document.getElementById("level_1");
                var level2 = document.getElementById("level_2");
                var level3 = document.getElementById("level_3");
                level1.innerHTML = data[0];
                level2.innerHTML = data[1];
                level3.innerHTML = data[2];

            })
            .catch(error => {
                document.getElementById('response').innerHTML = `<p style="color: red;">Error: ${error.message}</p>`;
            });

        }

    function ftch(url){
            fetch(url, {
                method: 'GET'
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
            })
            .catch(error => {
                document.getElementById('response').innerHTML = `<p style="color: red;">Error: ${error.message}</p>`;
            });

        }

        function handleRadioChange(event) {
            var res = document.getElementById("result");
            if (event.target.value == <?php echo $var;?>){
                res.classList.add("right");
                res.classList.remove("wrong");
                res.innerHTML = "<b>Right Answer</b>";
                var a = document.createElement("a");
                a.setAttribute("href", "https://math.kh.ua/images/2dshapes/Triangles/question2.php?id=<?php echo $id;?>&sc=<?php echo $sc;?>");
                a.innerHTML='Next task';
                res.appendChild(a);
                const url = `https://math.kh.ua/images/2dshapes/Triangles/question_insert.php?id=<?php echo $id;?>&sc=<?php echo $sc;?>&level=<?php echo $level;?>&res=1`;
                ftch(url);


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
