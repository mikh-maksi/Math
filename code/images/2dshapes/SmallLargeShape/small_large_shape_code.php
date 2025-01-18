<?php
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}


print_r($t);

$k = json_decode($t);


print_r($k);

// [[5,5],[2,5],[5,6],[7,8],[4,7]]

$a = $k[0][0];
$b = $k[0][1];

echo("<br>");
echo($a);
echo($b);


?>