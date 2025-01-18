<?php
require('lib.php');



include ("config.php");
include ("connect.php");

if (isset($_GET['student'])){$student = $_GET['student'];}else{$student = -1;}
if (isset($_GET['special'])){$special = $_GET['special'];}else{$special = -1;}


$total_n = count($special_tasks_lib[$special]);



$sql = 'SELECT * FROM student_answers WHERE student_id = '.$student.' AND special_task_id = '.$special;


echo ("<br>");
$result_sum = 0;
$n = 0;
if ($result = $mysqli->query($sql)) { 
    while($row = $result->fetch_assoc() ){
        // echo($row['result']);
        $result_sum+=$row['result'];
        $n+=1;
        // echo("<br>");
    }
    }
$percent_right = $result_sum/$n*100;
$percent_try = $n / $total_n;

echo ("Всього питань: ".$total_n);
echo "<br>";

echo ("Відсоток вірних відпвідей: ".$percent_right."%");
if ($percent_try!=1){
    echo "<br>";
    echo "Є спроби вирішити одне питання більше одного разу";
    echo "<br>";
    $addition_try = $n-$total_n;
    echo ("Додаткових спроб: ".$addition_try);
}

?>