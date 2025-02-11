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

// Вихідні дані
$triangle = [[0, 0], [5, 3], [3, 6]];
$center = [3, 3];
$angle = 90;

// Обчислення нових координат для трикутника
$newTriangle = rotateTriangle($triangle, $center, $angle);

// Виведення результату
echo "Нові координати трикутника:\n";
foreach ($newTriangle as $vertex) {
    echo "[" . round($vertex[0], 2) . ", " . round($vertex[1], 2) . "]\n";
}
?>
