<?php
function coord($draw_mesh,$x_milestones){
    $font = 'Inter.ttf';
    $size = 12;

    $draw_mesh->setFontSize($size);
    $draw_mesh->setFont($font);
    $draw_mesh->setStrokeWidth(1);

    $draw_mesh->setStrokeColor('rgba(0, 0, 0, 1)');
    $draw_mesh->setFillColor('rgba(255, 255, 255, 1)');
    $draw_mesh->setStrokeWidth(1);

    $step = 28;
    $n = $x_milestones[$i]+10;

    for($i=0;$i<count($x_milestones);$i+=1){
        $n = $x_milestones[$i]+10;
        $out = floatval($x_milestones[$i]);

        $bbox_a = imagettfbbox($size, 0, $font, "{$out}");
        $text_x = abs($bbox_a[2]); $text_y = abs($bbox_a[5]);

        $draw_mesh->annotation(40-$text_x/2+1+$step*$n,605 + $text_y , "{$out}");
        $draw_mesh->annotation(35-$text_x+1,600-$step*$n + $text_y/2 , "{$out}");
    }
    $draw_mesh->setStrokeColor('rgba(0, 0, 0, 0.2)');
    $draw_mesh->setFillColor('rgba(255, 255, 255, 0.7)');
    $draw_mesh->setStrokeColor('rgba(0, 0, 0, 0.2');
    $draw_mesh->setStrokeDashArray([4, 2]);
    for($i=0;$i<count($x_milestones);$i+=1){
        $n = $x_milestones[$i]+10;
        $out = floatval($x_milestones[$i]);
            if ($out == 0){
                $draw_mesh->setStrokeColor('rgba(0, 0, 0, 0.4)');
            }   else{
                $draw_mesh->setStrokeColor('rgba(0, 0, 0, 0.2');
            }
            $draw_mesh->line(40+$step*$n,600,40+$step*$n,40);
            $draw_mesh->line(40,600-$step*$n,600,600-$step*$n);
        }
    $draw_mesh->setStrokeDashArray([4, 1]);
    $draw_mesh->setStrokeColor('#000000');
    $draw_mesh->line(40,600,600,600);
    $draw_mesh->line(40,600,40,40);

    return $draw_mesh;
}

function coord1($draw_mesh,$x_milestones){
    $font = 'Inter.ttf';
    $size = 12;

    $draw_mesh->setFontSize($size);
    $draw_mesh->setFont($font);
    $draw_mesh->setStrokeWidth(1);

    $draw_mesh->setStrokeColor('rgba(0, 0, 0, 1)');
    $draw_mesh->setFillColor('rgba(255, 255, 255, 1)');
    $draw_mesh->setStrokeWidth(1);

    $step = 56;
    $n = $x_milestones[$i]+10;

    for($i=0;$i<count($x_milestones);$i+=1){
        $n = $x_milestones[$i]-$x_milestones[0];
        $out = floatval($x_milestones[$i]);

        $bbox_a = imagettfbbox($size, 0, $font, "{$out}");
        $text_x = abs($bbox_a[2]); $text_y = abs($bbox_a[5]);

        $draw_mesh->annotation(40-$text_x/2+1+$step*$n,605 + $text_y , "{$out}");
        $draw_mesh->annotation(35-$text_x+1,600-$step*$n + $text_y/2 , "{$out}");
    }
    $draw_mesh->setStrokeColor('rgba(0, 0, 0, 0.2)');
    $draw_mesh->setFillColor('rgba(255, 255, 255, 0.7)');
    $draw_mesh->setStrokeColor('rgba(0, 0, 0, 0.2');
    $draw_mesh->setStrokeDashArray([4, 2]);
    for($i=0;$i<count($x_milestones);$i+=1){
        $n = $x_milestones[$i]-$x_milestones[0];
        $out = floatval($x_milestones[$i]);
            if ($out == 0){
                $draw_mesh->setStrokeColor('rgba(0, 0, 0, 0.4)');
            }   else{
                $draw_mesh->setStrokeColor('rgba(0, 0, 0, 0.2');
            }
            $draw_mesh->line(40+$step*$n,600,40+$step*$n,40);
            $draw_mesh->line(40,600-$step*$n,600,600-$step*$n);
        }
    $draw_mesh->setStrokeDashArray([4, 1]);
    $draw_mesh->setStrokeColor('#000000');
    $draw_mesh->line(40,600,600,600);
    $draw_mesh->line(40,600,40,40);

    return $draw_mesh;
}

function arePointsNonCollinear($x1,$y1,$x2,$y2,$x3,$y3) {
    // Розрахунок детермінанта для перевірки колінеарності
    $determinant = $x1 * ($y2 - $y3) +
                   $x2 * ($y3 - $y1) +
                   $x3 * ($y1 - $y2);
    
    // Якщо детермінант дорівнює нулю, точки колінеарні
    return $determinant != 0;
}
function getTriangleCentroid($triangle) {
    $xSum = 0;
    $ySum = 0;

    foreach ($triangle as $vertex) {
        $xSum += $vertex[0];
        $ySum += $vertex[1];
    }

    $centroidX = $xSum / 3;
    $centroidY = $ySum / 3;

    return [$centroidX, $centroidY];
}

?>
