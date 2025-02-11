<?php
function rotatePoint($x, $y, $cx, $cy, $angleDegrees) {
    // Перетворення градусів у радіани
    $angleRadians = deg2rad($angleDegrees);

    // Переміщення точки так, щоб центр обертання був у початку координат
    $xShifted = $x - $cx;
    $yShifted = $y - $cy;

    // Обчислення нових координат після обертання
    $xRotated = $xShifted * cos($angleRadians) - $yShifted * sin($angleRadians);
    $yRotated = $xShifted * sin($angleRadians) + $yShifted * cos($angleRadians);

    // Повернення точки назад
    $xNew = $xRotated + $cx;
    $yNew = $yRotated + $cy;

    return [$xNew, $yNew];
}

function rotateTriangle($triangle, $center, $angleDegrees) {
    $rotatedTriangle = [];
    foreach ($triangle as $vertex) {
        $rotatedTriangle[] = rotatePoint($vertex[0], $vertex[1], $center[0], $center[1], $angleDegrees);
    }
    return $rotatedTriangle;
}

?>