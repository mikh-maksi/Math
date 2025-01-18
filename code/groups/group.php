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

} else {
   $id = 0;
}


// print_r($mysqli);

// Перевірка підключення
if ($mysqli->connect_error) {
   die("Помилка підключення: " . $mysqli->connect_error);
}

// SQL-запит для вибірки всіх записів з таблиці students
if ($id==0){
   $sql = "SELECT * FROM `students_groups` INNER JOIN students on students_groups.student_id=students.id";
}else{
   $sql = "SELECT * FROM `students_groups` INNER JOIN students on students_groups.student_id=students.id WHERE students_groups.group_id = ".$id;
}
$result = $mysqli->query($sql);

// Перевірка наявності результатів
if ($result->num_rows > 0) {
   // Виведення даних кожного рядка
   while($row = $result->fetch_assoc()) {
       echo "ID: " . $row["id"]. 
            " <a href = '../student/index.php?id=". $row["id"]."'>" . $row["name"]. "</a><br>";
   }
} else {
   echo "0 результатів";
}

// Закриття з'єднання
$mysqli->close();
?>