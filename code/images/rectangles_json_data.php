<?php
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);


print_r($t);

echo($t->a);

$obj = (object) array('a' => 3,'b' => 6);

print_r($obj);

$str =json_encode($obj);
echo ("<br>");
echo ($str);

?>