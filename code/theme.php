<?php
require('lib.php');
if (isset($_GET['id'])){$id = $_GET['id'];}else{$id='0';}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Тема:<?php  echo $themes_arr[$id]; ?></h2>
<?php
    $current_tasks = $tasks[$id];

    for ($i = 0;$i<count($tasks[$id]);$i+=1){
        echo "<p><a href = 'task.php?chapter=".$id."&n_task=".$i."'>".$tasks[$id][$i]["description"]."</a></p>";
    }
?>

</body>
</html>
