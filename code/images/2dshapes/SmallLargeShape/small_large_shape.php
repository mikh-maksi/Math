<?php
        $draw = new ImagickDraw ();
        header("Content-Type: image/png");
        $imagick = new Imagick(new ImagickPixel('rgba(0, 0, 0, 1)'));
        $imagick->newImage(600,600, new ImagickPixel('white')); //max (x)+10, max(y)+10
        $imagick->setImageFormat("png");

        $font = '../../Inter.ttf';
        $size = 32;
        $draw->setFontSize($size);
        $draw->setFont($font);

        if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}

        $k = json_decode($t);
        $a = $k[0][0];
        $b = $k[0][1];

        // $k = $t[0];

        // $draw->annotation(100,100,$a);

        // $a = 2;
        // $b = 5;


        $letters = ['A','B','C','D'];
        $annotations_x = [328,328,328,328];
        $annotations_y = [150,300,450,600];

        for ($i=0;$i<4;$i+=1){
            $draw->annotation($annotations_x[$i],$annotations_y[$i], $letters[$i]);
        }


        $draw->line(350,0,350,600);
        $draw->line(350,150,600,150);
        $draw->line(350,300,600,300);
        $draw->line(350,450,600,450);


        $draw->line(0,200,275,200);
        $draw->line(0,400,275,400);
        $draw->line(275,0,275,600);

        // $draw->line(0,250,275,250);
        // rectangle

        // $a = rand(0,10);
        // $b = rand(0,9);

        rect($draw,$a,$b);


        for ($i=1;$i<5;$i+=1){
            $j = $i-1;
            tiangles($draw,$k[$j][0],$k[$j][1],$j);
        }



        function rect ($draw,$l,$h){
            $draw->line(10,250,110+$l*10,250);
            $draw->line(110+$l*10,250,110+$l*10,290+$h*10);
            $draw->line(110+$l*10,290+$h*10,10,290+$h*10);
            $draw->line(10,290+$h*10,10,250);
        }


        function tiangles ($draw,$l,$h,$n){
            $base_h = 10+150*$n;
            $base_x = 370;

            $draw->line($base_x+10-10,$base_h,$base_x+110+$l*10-10,$base_h);
            $draw->line($base_x+10-10,$base_h+40+$h*10,$base_x+10-10,$base_h);
            $draw->line($base_x+110+$l*10-10,$base_h,$base_x+10-10,$base_h+40+$h*10);


            $draw->line($base_x+110+$l*10+10,$base_h,$base_x+110+$l*10+10,$base_h+40+$h*10);
            $draw->line($base_x+110+$l*10+10,$base_h+40+$h*10,$base_x+10+10,$base_h+40+$h*10);
            $draw->line($base_x+110+$l*10+10,$base_h,$base_x+10+10,$base_h+40+$h*10);

        }
        
        $imagick->drawImage($draw);
        echo ($imagick->getImageBlob());
?>