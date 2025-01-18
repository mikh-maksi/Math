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
}else{
   $id = 0;
}

// Перевірка підключення
if ($mysqli->connect_error) {
   die("Помилка підключення: " . $mysqli->connect_error);
}

// SQL-запит для вибірки всіх записів з таблиці students
if ($id == 0){
   $sql = "SELECT * FROM tasks";
}else{
   $sql = "SELECT * FROM tasks WHERE id=".$id;
}
$result = $mysqli->query($sql);

// Перевірка наявності результатів
if ($result->num_rows > 0) {
   // Виведення даних кожного рядка
   while($row = $result->fetch_assoc()) {
       echo "<h2>". $row["id"].":" . $row["name"]. "</h2><br>";
       echo "<a href = '".$row["task_link"]."'>Перейти до завдання</a><br>";
   }
} else {
   echo "0 результатів";
}





// Закриття з'єднання
$mysqli->close();
?>