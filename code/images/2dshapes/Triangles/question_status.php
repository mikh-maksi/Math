<?php
// Налаштування підключення до бази даних
include ("config.php");
include ("connect.php");

// header('Content-Type: application/json');

// Підключення до бази даних

if ($mysqli->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Database connection failed: " . $mysqli->connect_error]);
    exit;
}

// Перевірка HTTP-методу
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Отримання даних з запиту
    // if (!isset($_GET['student_id'], $_GET['task_id'], $_GET['mark'])) {
    //     http_response_code(400);
    //     echo json_encode(["error" => "Missing required fields: student_id, task_id, mark"]);
    //     exit;
    // }

    $user_id = $_GET['id'];
    $sc = $_GET['sc'];
    $level = $_GET['level'];
    $res = $_GET['res'];

    // Підготовка SQL-запиту
    $sql = "SELECT * FROM `results` WHERE user_id = {$user_id} AND  succes_criteria = {$sc}";
    // echo $sql;
    $result = $mysqli->query($sql);   
    if ($result->num_rows > 0) {
    $level_arr = [0,0,0];   
    while($row = $result->fetch_assoc()) {
        $lvl = $row['level'];
        $level_arr[$lvl]+=$row['result'];
    }
    }
    header('Content-Type: application/json');
    echo (json_encode($level_arr));
}
$mysqli->close();

?>
