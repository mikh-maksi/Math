<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Група</h2>
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

    $sql = "SELECT * FROM `groups` WHERE id = ".$id;
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        // Виведення даних кожного рядка
        while($row = $result->fetch_assoc()) {
            echo "<a href = '../student/index.php?id=". $row["id"]."'>" . $row["name"]. "</a><br>";
        }
     } else {
        echo "0 результатів";
     }
// Студенти
$sql = "SELECT * FROM `students_groups` INNER JOIN students on students_groups.student_id=students.id WHERE students_groups.group_id = ".$id;
$result_students = $mysqli->query($sql);
if ($result_students->num_rows > 0) {
   while($row_students = $result_students->fetch_assoc()) {
       echo $row_students["name"]. " | ";
       $student_id = $row_students["id"];



       
        // -----------------------------------------
        $sql = "SELECT * FROM `groups_course` INNER JOIN courses on groups_course.course_id=courses.id WHERE groups_course.group_id = ".$id;
        $result_course = $mysqli->query($sql);
        if ($result_course->num_rows > 0) {
            while($row_course = $result_course->fetch_assoc()) {
                $course_id = $row_course["id"];
                $sql = "SELECT * FROM `tasks_courses` INNER JOIN tasks on tasks_courses.task_id=tasks.id WHERE tasks_courses.course_id = ".$course_id;
                // echo($sql);
                // echo("<br>");
                $result_rows = $mysqli->query($sql);
                if ($result_rows->num_rows > 0) {
                    while($row_tasks = $result_rows->fetch_assoc()) {
                        $task_id = $row_tasks["id"];
                        $status = 1;
                        $sql_check = "SELECT * FROM `student_tasks` WHERE student_id = '{$student_id}' AND task_id = '{$task_id}'";
                        $result_check = $mysqli->query($sql_check);
                        if ($result_check->num_rows == 0){
                            $sql_insert = "INSERT INTO `student_tasks` (`id`, `student_id`, `task_id`, `status`, `mark`, `link`) VALUES (NULL, '{$student_id}', '{$task_id}', '{$status}', '', '')";
                            $result_insert = $mysqli->query($sql_insert);       
                        }
                        echo $result_insert;
                    }
                } else {
                    echo "0 результатів";
                }

   }
} else {
   echo "0 результатів";
}

// -------------------------------------------------
   }
} else {
   echo "0 результатів";
}
    echo "<br><br>";

     $sql = "SELECT * FROM `groups_course` INNER JOIN courses on groups_course.course_id=courses.id WHERE groups_course.group_id = ".$id;
     $result = $mysqli->query($sql);
     if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<b>".$row["id"]." ".$row["name"]. "</b><br>";
            $course_id = $row["id"];
            
            $sql = "SELECT * FROM `tasks_courses` INNER JOIN tasks on tasks_courses.task_id=tasks.id WHERE tasks_courses.course_id = ".$course_id;
            $result_rows = $mysqli->query($sql);
            if ($result_rows->num_rows > 0) {
               while($row_tasks = $result_rows->fetch_assoc()) {
                   echo $row_tasks["id"]." ".$row_tasks["name"]. "<br>";
               }
            } else {
               echo "0 результатів";
            }

        }
     } else {
        echo "0 результатів";
     }

?>
</body>
</html>