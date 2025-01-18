<?php
// ?products=0001&statuses=1,2&numbers=002,003&authors=7438,74364
$products = $_GET['products'];
$statuses = $_GET['statuses'];
$numbers = $_GET['numbers'];
$authors = $_GET['authors'];


print_r($products);
echo("<br>");
print_r($statuses);
echo("<br>");
print_r($numbers);
echo("<br>");
print_r($authors);
echo("<br>");
echo($statuses[1]);
?>