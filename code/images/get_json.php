<?php
$t = $_GET['t'];

$k = json_decode($t);

print_r($k);

echo(count($k));
$n = count($k);
echo("<br>");
echo($k[0]->All);
$max = $k[0]->All;
for ($i=1;$i<=$n;$i+=1){
    if ($max<$k[$i]->All){
        $max=$k[$i]->All;
    }
}
echo ($max);
?>