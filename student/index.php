<?php require('../lib.php'); ?>
<?php 
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[0]';}
$t = json_decode($t);
$chapter = $t[0];
$n_task = $t[1];

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
    <?php 
        print_r($tasks);
        echo("<br>");
        print_r($t);
        echo("<br>");
        echo($tasks[$chapter][$n_task]["description"]);
        echo($t[0]);
        echo($t[1]);
        echo("<br>");
        echo(count($tasks[0]));
        echo("<br>");
        echo(count($tasks[1]));
        echo("<br>");
        echo(count($tasks[2]));
    ?>
</body>
</html>