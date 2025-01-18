<?php

header('Content-type: image/jpeg');

$image = new Imagick('images/button1.png');

// Если в качестве ширины или высоты передан 0,
// то сохраняется соотношение сторон
$image->thumbnailImage(100, 0);

echo $image;

?>