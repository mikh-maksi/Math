<?php

include ("../config.php");
include ("../connect.php");

// Перевірка наявності параметру в GET-запиті
if (isset($_GET['id'])) {
    // Отримання значення параметру 'id'
    $id = $_GET['id'];
    // Очищення параметру від можливих шкідливих символів
    $id = htmlspecialchars(strip_tags($id));
    // Приклад перевірки типу (цілочисельне значення)
    $id = intval($id);
   //  echo "Отриманий ID: " . $id;
 } else {
   //  echo "Параметр ID не передано";
 }
 

// Перевірка підключення
if ($mysqli->connect_error) {
   die("Помилка підключення: " . $mysqli->connect_error);
}

// SQL-запит для вибірки всіх записів з таблиці students
$sql = "SELECT * FROM students WHERE id=".$id;
$result = $mysqli->query($sql);

// Перевірка наявності результатів
if ($result->num_rows > 0) {
   // Виведення даних кожного рядка
   while($row = $result->fetch_assoc()) {
       echo "<a href = 'index.php?id=". $row["id"]."'>" . $row["name"]. "</a><br>";
   }
} else {
   echo "0 результатів";
}

$sql = "SELECT * FROM `students_groups` INNER JOIN groups_course ON groups_course.group_id=students_groups.group_id INNER JOIN courses ON courses.id = groups_course.course_id WHERE students_groups.student_id=".$id;

$result_groups = $mysqli->query($sql);
while($row_groups = $result_groups->fetch_assoc()) {
   $name = $row_groups["name"];
   $course_id = $row_groups["course_id"];
   echo "<p><b>{$name}</b></p>";
   $sql_mark = "SELECT * FROM student_tasks INNER JOIN tasks_courses ON tasks_courses.task_id=student_tasks.task_id INNER JOIN tasks ON tasks.id=student_tasks.task_id WHERE tasks_courses.course_id ={$course_id} AND student_id = {$id}";
   $result_mark = $mysqli->query($sql_mark);
   $mark_sum = 0;
   $mark_n = 0;
   while($row_marks = $result_mark->fetch_assoc()) {
      $mark = $row_marks["mark"];
      $task_id = $row_marks["task_id"];
      $name = $row_marks["name"];
      echo ("{$name} - {$mark} <br>");
      $mark_sum+=$mark;
      $mark_n+=1;
   }
   $avg = $mark_sum / $mark_n;
   echo"<br>Середня оцінка: {$avg}<br><br>";
}


// SELECT * FROM `students_groups` INNER JOIN groups_course ON groups_course.group_id=students_groups.group_id WHERE students_groups.student_id=1 
// SELECT * FROM student_tasks INNER JOIN tasks_courses ON tasks_courses.task_id=student_tasks.task_id WHERE tasks_courses.course_id =1 AND student_id = 1


// Закриття з'єднання
$mysqli->close();
?>