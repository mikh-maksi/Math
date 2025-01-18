<?php
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);


$cents_array = $t[0];
print_r($t);
echo("<br>");

print_r($cents_array );


?>