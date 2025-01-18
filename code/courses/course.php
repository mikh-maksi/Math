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
}

// Перевірка підключення
if ($mysqli->connect_error) {
   die("Помилка підключення: " . $mysqli->connect_error);
}

// SQL-запит для вибірки всіх записів з таблиці students
$sql = "SELECT * FROM courses WHERE id=".$id;
$result = $mysqli->query($sql);

// Перевірка наявності результатів
if ($result->num_rows > 0) {
   // Виведення даних кожного рядка
   while($row = $result->fetch_assoc()) {
       echo "<h2>" . $row["name"]. "</h2><br>";
   }
} else {
   echo "0 результатів";
}




// Задачі

// SQL-запит для вибірки всіх записів з таблиці students
$sql = "SELECT * FROM `tasks_courses` INNER JOIN tasks on tasks_courses.task_id=tasks.id WHERE tasks_courses.course_id = ".$id;
$result = $mysqli->query($sql);

// Перевірка наявності результатів
if ($result->num_rows > 0) {
   // Виведення даних кожного рядка
   while($row = $result->fetch_assoc()) {
       echo "<a href = '../tasks/task.php?id=". $row["id"]."' target =_blank>" . $row["name"]. "</a><br>";
   }
} else {
   echo "0 результатів";
}


// Закриття з'єднання
$mysqli->close();
?>