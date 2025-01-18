<?php
$el[10] = array(0,1,2,3,4,5,6,7,8,9);
$el[9] = array(0,1,2,3,4,6,7,8,9);
$el[8] = array(1,2,3,4,6,7,8,9);
$el[7] = array(0,1,2,3,7,8,9);
$el[6] = array(1,2,3,7,8,9);
$el[5] = array(0,2,4,6,8);
$el[4] = array(2,4,6,9);
$el[3] = array(0,3,7);

foreach ($el[5] as &$value) {
    // echo($value."<br>");

    echo("<br>");
}

// print_r($el);
?>