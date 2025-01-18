<?php
require('lib.php');




if (isset($_GET['id'])){$id = $_GET['id'];}else{$id='0';}
if (isset($_GET['student'])){$student = $_GET['student'];}else{$student='0';}
if (isset($_GET['special'])){$special = $_GET['special'];}else{$special='0';}
// if (isset($_GET['n_task'])){$n_task = $_GET['n_task'];}else{$n_task='0';}


// print_r($special_tasks_lib);
// echo ($special);
// echo(count($special_tasks_lib[$special]));
// $number_of_tasks
// print_r($special_tasks_lib[$special]);


if ($id<count($special_tasks_lib[$special])-1){
    $id_next = $id+1;
    $link_next = "https://math.kh.ua/student.php?special=".$special."&id=".$id_next."&student=".$student;
}else{
    $link_next = "https://math.kh.ua/finish.php?student=".$student."&special=".$special;
}

$chapter = $special_tasks_lib[$special][$id][0];
$n_task = $special_tasks_lib[$special][$id][1];;


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
// if ($n_task<count($tasks[$chapter])-1){
//     $n_task_next = $n_task+1;
//     $chapter_next = $chapter;
// } else{
//     $n_task_next = 0;
//     $chapter_next = $chapter+1;
// }


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
            echo ("<input type = radio name = answer id = answer_".$i." value = ".$answ."> <label for=answer".$i.">".$answer[$i]."</label>");
        }
        echo "</div>";
        echo "<div id = 'result'></div>";
        echo "<div class = 'buttons'><button id = 'btn'>Перевірити</button><a href = '".$link_next."'>Наступна задача</a></div>"

    ?>
    <p id="ans"></p>
    <script>
        let btn = document.getElementById("btn");
        let result = document.getElementById("result");
        btn.addEventListener("click",check);
        function check(){
            console.log("ok");
            // console.log(document.querySelector("input[name=answer]:checked").value);
            console.log(document.querySelector("input[name=answer]:checked"));
            let answer;
            if (document.querySelector("input[name=answer]:checked") !== null){
            console.log();

            let n_id = document.querySelector("input[name=answer]:checked").id;
            n_answer = n_id.split("_");
            answer = n_answer[1];
            console.log(answer);
            }else{
                answer = -1;
            }

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

  query = 'https://math.kh.ua/test_answer.php?student=<?php echo $student;?>&chapter=<?php echo $chapter;?>&n_task=<?php echo $n_task;?>&result='+answ+'&answer='+answer+'&special=<?php echo $special;?>&id_in_special=<?php echo $id;?>';
  console.log(query);
  let ans = document.getElementById("ans");
  fetch(query).then(response => response.json())
  .then(function (quiz) {
    ans.innerHTML = quiz[0];
    // question.innerHTML=quiz.question_arr[0];
    // title.innerHTML = quiz.title_arr[0];
    // a1.innerHTML = quiz.a1_arr[0];
    // a2.innerHTML = quiz.a2_arr[0];
    // a3.innerHTML = quiz.a3_arr[0];
    // a4.innerHTML = quiz.a4_arr[0];
    // answer.innerHTML = quiz.answer_arr[0];
    
    // n_right_answer = quiz.n_right_answer_arr[0];
    // n_question.value = quiz.total_n;
    console.log(quiz);
      
  });
        }
    </script>
</body>
</html>