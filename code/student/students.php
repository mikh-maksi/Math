<?php

include ("../config.php");
include ("../connect.php");


// print_r($mysqli);

// Перевірка підключення
if ($mysqli->connect_error) {
   die("Помилка підключення: " . $mysqli->connect_error);
}

// SQL-запит для вибірки всіх записів з таблиці students
$sql = "SELECT * FROM `students_groups` INNER JOIN students on students_groups.student_id=students.id";
$result = $mysqli->query($sql);

// Перевірка наявності результатів
if ($result->num_rows > 0) {
   // Виведення даних кожного рядка
   while($row = $result->fetch_assoc()) {
       echo "" . $row["id"]. 
            ". <a href = 'index.php?id=". $row["id"]."'>" . $row["name"]. "</a><br>";
   }
} else {
   echo "0 результатів";
}

// Закриття з'єднання
$mysqli->close();
?>