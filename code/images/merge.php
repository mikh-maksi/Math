<?php
//define the width and height of our images


            $in = $_GET['in'];
            $all = $_GET['all'];
            
            define("WIDTH", $all*64);
            define("HEIGHT", 64);

            $im = imagecreate(300, 64);
            $im = imagecreatetruecolor(300, 64);

            // установка красного фона
            $red = imagecolorallocate($im, 255, 255, 255);
            
            // делаем фон красным
            $background = imagecolorallocate($im, 255, 0, 0);

            $dest_image = imagecreatetruecolor(WIDTH, HEIGHT);

            //make sure the transparency information is saved
            imagesavealpha($dest_image, true);
            // imagefill($dest_image, 0, 0, $red);
            // imagefill($dest_image, 300, 5, $red);
            
            $image = imagecreatetruecolor(300, 64);
            $bg = imagecolorallocate($image, 235, 235, 255);

            // Fill the background with the color selected above.
            // imagefill($image, 0, 0, $bg);
            
            // $bg = imagecolorallocate($image, 235, 235, 255);

            // Fill the background with the color selected above.
            // imagefill($image, 0, 0, $bg);
            

            //create a fully transparent background (127 means fully transparent)
            // $trans_background = imagecolorallocatealpha($dest_image, 255, 255, 255, 100);
            $trans_background = imagecolorallocate($dest_image, 255, 255, 255);

            //fill the image with a transparent background
            // imagefill($dest_image, 0, 0, $trans_background);

            //take create image resources out of the 3 pngs we want to merge into destination image
            $a = imagecreatefrompng('images/white.png');
            $b = imagecreatefrompng('images/circle_violet.png');
            $b1 = imagecreatefrompng('images/circle_violet.png');
            $c = imagecreatefrompng('images/circle_violet_plus.png');

            //copy each png file on top of the destination (result) png
            // imagecopy($dest_image, $a, 0, 0, 0, 0, 600, 64);
            // imagecopy($dest_image, $b, 100, 0, 0, 0, 1, 1);


            $n = intval($all);
            $color_n = intval($in);
            // $col_ellipse = imagecolorallocate($image, 230, 230, 255);
            
            
            for ($i = 0; $i < $n; $i++) {
                if ($i<$color_n)
                    imagecopy($dest_image, $c, $i*64, 0, 0, 0, WIDTH, HEIGHT);
                else
                    imagecopy($dest_image, $b, $i*64, 0, 0, 0, WIDTH, HEIGHT);
            }
            



            //send the appropriate headers and output the image in the browser
            header('Content-Type: image/png');
            imagepng($dest_image);

            //destroy all the image resources to free up memory
            imagedestroy($a);
            imagedestroy($b);
            imagedestroy($c);
            imagedestroy($dest_image);