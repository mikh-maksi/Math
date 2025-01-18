<?php
$t = json_decode($_GET['t']);


print_r($t);


echo("<br>");
echo("_____");
echo("<br>");

for($i=0;$i<count($t);$i+=1){
    echo($t[$i]->type." ");
    if ($t[$i]->type=="circle"){
        echo($t[$i]->params->radius);
    }
    if ($t[$i]->type=="rectangle"){

        echo($t[$i]->params->side_a);
        echo($t[$i]->params->side_b);
    }
    if ($t[$i]->type=="square"){
        echo($t[$i]->params->side);
    }
    if ($t[$i]->type=="triangle"){
        echo($t[$i]->params->side_a);
        echo($t[$i]->params->side_b);
        echo($t[$i]->params->side_c);
        
    }
    echo("<br>");

}


print_r(get_object_vars($t[1]->params));

?>