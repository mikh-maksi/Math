<?php
    $alfa = 90;
    $beta = 45;
    $gamma = 45;

    $scale = 47;

    echo (sin(deg2rad($alfa)));
    echo("<br>");
    echo (sin(deg2rad($beta)));
    echo("<br>");
    echo (sin(deg2rad($gamma)));
    echo("<br>");

    $a = 10;
    $b = $a*(sin(deg2rad($beta))/sin(deg2rad($alfa)));
    $c = $a*(sin(deg2rad($gamma))/sin(deg2rad($alfa)));

    echo ("{$a}  {$b}  {$c}");

    $dx = $b * cos(deg2rad($gamma));
    $dy = $b * sin(deg2rad($gamma));
    echo("<br>");

    echo ("dx = {$dx}  dy = {$dy}");





?>