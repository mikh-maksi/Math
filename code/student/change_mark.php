<?php
// Налаштування підключення до бази даних
include ("../config.php");
include ("../connect.php");

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
    if (!isset($_GET['student_id'], $_GET['task_id'], $_GET['mark'])) {
        http_response_code(400);
        echo json_encode(["error" => "Missing required fields: student_id, task_id, mark"]);
        exit;
    }

    $student_id = $_GET['student_id'];
    $task_id = $_GET['task_id'];
    $mark = $_GET['mark'];

    // Підготовка SQL-запиту
    $stmt = $mysqli->prepare();
    $sql = "UPDATE student_tasks SET mark = {$mark} WHERE student_id = {$student_id} AND task_id = {$task_id}";
    // echo $sql;
    $result_update = $mysqli->query($sql);       
    if ($result_update){
        echo json_encode(["result" => "ok"]);
        
    }
}
$mysqli->close();

?>
