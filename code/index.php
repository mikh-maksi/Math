<?php
require('lib.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1>Математичні теми</h1>
    <?php
        for($i=0;$i<count($themes_arr);$i+=1){
            $n = $i+1;
            echo "<p><a href = 'theme.php?id=".$i."'>".$n.". ".$themes_arr[$i]."</a></p>";
        }
    ?>
</body>
</html>

