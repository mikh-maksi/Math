<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button id = 'btn'>Click</button>
    <p id="ans"></p>

<script>
let ans = document.getElementById("ans");
let btn = document.getElementById("btn");
btn.addEventListener("click",answers);
function answers(){
let k = 1;
  query = 'https://math.kh.ua/test_answer.php?student=1&chapter=1&n_task=1&result=1&answer=1';
  console.log(query);
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