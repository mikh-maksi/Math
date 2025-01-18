<?php
$arr = (object) array('apple' => 3,'banana' => 4,'orange' => 5);

print_r($arr);

echo("<br>");

foreach ($arr as $key => $value){
    echo($key." ".$value."<br>");

}

$k = 15;
$col = 2;
echo(intdiv($k,$col));
?>