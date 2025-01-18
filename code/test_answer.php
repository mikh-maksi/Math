<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json; charset=utf-8');



include ("config.php");
include ("connect.php");


if (isset($_GET['student'])){$student = $_GET['student'];}else{$student = -1;}
if (isset($_GET['chapter'])){$chapter = $_GET['chapter'];}else{$chapter = -1;}
if (isset($_GET['n_task'])){$n_task = $_GET['n_task'];}else{$n_task = -1;}
if (isset($_GET['result'])){$result = $_GET['result'];}else{$result = -1;}
if (isset($_GET['answer'])){$answer = $_GET['answer'];}else{$answer = -1;}
if (isset($_GET['special'])){$special = $_GET['special'];}else{$special = -1;}
if (isset($_GET['id_in_special'])){$id_in_special = $_GET['id_in_special'];}else{$id_in_special = -1;}


// if (!isset($_GET['author_id'])){
//     $author_id = 0;
// }
// else{
//     $author_id = $_GET['author_id'];
// }




// $title_arr = [];
// class quiz
// {
//     public $question_arr = [];
//     public $title_arr = [];
//     public $a1_arr = [];
//     public $a2_arr = [];
//     public $a3_arr = [];
//     public $a4_arr = [];
//     public $answer_arr = [];
//     public $n_right_answer_arr = [];
//     public $total_n;
// }
// $quiz1 = new quiz();
// if ($question_n==-1){
// $sql = 'SELECT * FROM questions WHERE author_id = '.$author_id;
// }else{
// $sql = 'SELECT * FROM questions WHERE author_id = '.$author_id.' AND n='.$question_n ;
// }

// if ($result = $mysqli->query($sql)) { 
//     while($row = $result->fetch_assoc() ){
//         array_push($quiz1->question_arr, $row['question']);
//         array_push($quiz1->title_arr, $row['title']);
//         array_push($quiz1->a1_arr, $row['a1']);
//         array_push($quiz1->a2_arr, $row['a2']);
//         array_push($quiz1->a3_arr, $row['a3']);
//         array_push($quiz1->a4_arr, $row['a4']);
//         array_push($quiz1->answer_arr, $row['answer']);
//         array_push($quiz1->n_right_answer_arr, $row['right_answer']);
//     }
//     }
// $sql = 'SELECT COUNT(*) FROM questions WHERE author_id = '.$author_id;
// if ($result = $mysqli->query($sql)) { 
//     while($row = $result->fetch_row() ){
//         $quiz1->total_n = $row[0];
//     }
// }

$quiz1 = ['Hello!'];

$sql = "INSERT INTO `student_answers` (`id`, `student_id`, `chapter`, `n_task`, `result`, `answer`, `special_task_id`, `id_in_special_task`, `timestamp`) VALUES (NULL, '".$student."', '".$chapter."', '".$n_task."', '".$result."', '".$answer."', '".$special."', '".$id_in_special."', CURRENT_TIMESTAMP)";
$result = $mysqli->query($sql);


echo(json_encode($quiz1));
?>