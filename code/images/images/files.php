<?php


// phpinfo();

$dir    = "/home/levelhst/innovations.kh.ua/www/images/images/img256/";
$files1 = scandir($dir);
// print_r($files1);
$str = "https://innovations.kh.ua/images/images/img256/";
$sum_str = '';
for($i=2;$i<count($files1);$i+=1){
    echo $files1[$i]."<br>";
    echo "<img src = '".$str."/".$files1[$i]."'><br>";
    $st = explode(".", $files1[$i]);
    $sum_str .="'".$st[0]."',";
}
echo $sum_str;
?>