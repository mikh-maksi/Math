<?php
/* Установка ширины и высоты в пропорции логотипа PHP */
$width = 400;
$height = 210;

/* Создание объекта Imagick с поддержкой прозрачности */
$img = new Imagick();
$img->newImage($width, $height, new ImagickPixel('transparent'));

/* Новый объект ImagickDraw  для отрисовки эллипса */
$draw = new ImagickDraw();
/* Установка пурпурного цвета заливки для эллипса */
$draw->setFillColor('#777bb4');
/* Задание размеров эллипса */
$draw->ellipse($width / 2, $height / 2, $width / 2, $height / 2, 0, 360);
/* Отрисовка эллипса */
$img->drawImage($draw);

/* Сброс цвета заливки с пурпурного на чёрный для текста (заметьте, что мы используем объект ImagickDraw повторно) */
$draw->setFillColor('black');
/* Задание обводки границы белым цветом */
$draw->setStrokeColor('white');
/* Задание толщины обводки */
$draw->setStrokeWidth(2);
/* Задание кернинга (отрицательные значения означают, что буквы будут ближе друг к другу) */
$draw->setTextKerning(-8);
/* Задание шрифта и его размера, которые используются в логотипе PHP */
$draw->setFont('Handel Gothic Regular.ttf');
$draw->setFontSize(150);
/* Центрирование текста вертикально и горизонтально */
$draw->setGravity(Imagick::GRAVITY_CENTER);

/* Добавление текста "php" со смещением по Y на -10 на холст (внутри эллипса) */
$img->annotateImage($draw, 0, -10, 0, 'php');
$img->setImageFormat('png');

/* Установка соответвующего заголовка для PNG и вывод изображения */
header('Content-Type: image/png');
echo $img;
?>