<?php
require('lib.php');
$chapter = 1;
$n_task = 0;

if (isset($_GET['chapter'])){$chapter = $_GET['chapter'];}else{$chapter='1';}
if (isset($_GET['n_task'])){$n_task = $_GET['n_task'];}else{$n_task='0';}

$task["Name"] =  $tasks[$chapter][$n_task]["Name"];
$task["Description"] = $tasks[$chapter][$n_task]["Description"];
$task["answers"] =  $tasks[$chapter][$n_task]["answers"];
$task["right_answer"] = $tasks[$chapter][$n_task]["right_answer"];
$task["image"] = $tasks[$chapter][$n_task]["image"];

if (isset($tasks[$chapter][$n_task]["image_width"])){
    $task["image_width"] = $tasks[$chapter][$n_task]["image_width"];
}else{
    $task["image_width"] = 300;
}
if ($n_task<count($tasks[$chapter])-1){
    $n_task_next = $n_task+1;
    $chapter_next = $chapter;
} else{
    $n_task_next = 0;
    $chapter_next = $chapter+1;
}

$link_next = "https://math.kh.ua/task.php?chapter=".$chapter_next."&n_task=".$n_task_next;
// &cap;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .green{
            background: rgba(0,255,0,0.7);
        }
        .yellow{
            background: rgba(255,255,0,0.7);
        }
        .red{
            background: rgba(255,0,0,0.7);
        }
    </style>
</head>
<body>
    <h2><?php  echo $task["Name"];?></h2>
    <p><?php  echo $task["Description"];?></p>
    <img src ='<?php echo $task["image"];?>' width = <?php echo  $task["image_width"];?>>
    <?php  $answer = explode("|",$task["answers"]);?>
    <?php  echo "<div class = 'answers'>";
        for($i=0;$i<count($answer);$i+=1){
            if ($i == $task["right_answer"]){
                $answ = 1;
            }else{
                $answ = 0;
            }
            echo ("<input type = radio name = answer id = answer".$i." value = ".$answ."> <label for=answer".$i.">".$answer[$i]."</label>");
        }
        echo "</div>";
        echo "<div id = 'result'></div>";
        echo "<div class = 'buttons'><button id = 'btn'>Перевірити</button><a href = '".$link_next."'>Наступна задача</a></div>"
    ?>
    <script>
        let btn = document.getElementById("btn");
        let result = document.getElementById("result");
        btn.addEventListener("click",check);
        function check(){
            console.log("ok");
            let answ;
            if (document.querySelector("input[name=answer]:checked") == null){
                answ = -1;
            }else{
                answ = document.querySelector("input[name=answer]:checked").value;
            }
            let text_answer;
            if (answ == 1){text_answer = 'Правильна відповідь'; result.classList.add("green"); result.classList.remove("red"); result.classList.remove("yellow");}
            if (answ == 0){text_answer = 'Неправильна відповідь'; result.classList.add("red"); result.classList.remove("green"); result.classList.remove("yellow");}
            if (answ == -1){text_answer = 'Надайте відповідь'; result.classList.add("yellow"); result.classList.remove("green"); result.classList.remove("red");}

            result.innerHTML = text_answer;
            
            console.log(answ);
        }
    </script>
</body>
</html>