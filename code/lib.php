<?php
$special_tasks_lib = [[[0,0],[0,1],[1,0],[2,0]],[[0,0],[0,1],[1,0],[2,0]]];




$themes_arr = ['Логіка','Множини','Числова пряма','Рахівниця','Одиниці вимірювання','Арифметичні операції','Одночлени','Многочлени','Лінійне рівняння з однією змінною','Цілі вирази','Функції','Системи лінійних рівнянь із двома змінними','Раціональні вирази','Квадратні корені','Квадратні рівняння','Нерівності','Квадратична функція','Числові послідовності','Діаграми','Двомірні форми','Квадрат','Трикутник','Кути'];


$ch = 0;
$nt = 0;

$tasks[$ch][$nt]["description"] = "Патерни";
$tasks[$ch][$nt]["Name"] = "Задача на Патерни";
$tasks[$ch][$nt]["Description"] = "Оберіть продовження патерну";
$tasks[$ch][$nt]["answers"] = "A|B|C|D";
$tasks[$ch][$nt]["right_answer"] = 0;
$tasks[$ch][$nt]["image"] = "https://math.kh.ua/images/2dimages/patternstypesjson/patterns_types_json.php?t=0";

$nt += 1;

$tasks[$ch][$nt]["description"] = "Підмножини";
$tasks[$ch][$nt]["Name"] = "Задача на елементи";
$tasks[$ch][$nt]["Description"] = "Оберіть блок, який не створюється із основної картинки виділенням елементів за типом або кольором.";
$tasks[$ch][$nt]["answers"] = "A|B|C|D";
$tasks[$ch][$nt]["right_answer"] = 0;
$tasks[$ch][$nt]["image"] = "https://math.kh.ua/images/colored_types_json.php";

$nt += 1;

$tasks[$ch][$nt]["description"] = "Траса";
$tasks[$ch][$nt]["Name"] = "Задача на послідовність машин";
$tasks[$ch][$nt]["Description"] = "Яке місце заняла червона машина";
$tasks[$ch][$nt]["answers"] = "1|2|3|4";
$tasks[$ch][$nt]["right_answer"] = 0;
$tasks[$ch][$nt]["image"] = "https://math.kh.ua/images/race.php?t=[0,1,2,3]";

$nt += 1;

$tasks[$ch][$nt]["description"] = "Число - кількість елементів";
$tasks[$ch][$nt]["Name"] = "Задача на визначення правильного зв'язку";
$tasks[$ch][$nt]["Description"] = "Яка зі з'єднувальних ліній з'єднує число та кількість елементів коректно? ";
$tasks[$ch][$nt]["answers"] = "A|B|C|D";
$tasks[$ch][$nt]["right_answer"] = 2;
$tasks[$ch][$nt]["image"] = "https://math.kh.ua/images/2dimages/correspondentofobjects/correspondent_of_objects_color_letter_n.php?t=2";

$nt += 1;

$tasks[$ch][$nt]["description"] = "Порівняння об'єктів";
$tasks[$ch][$nt]["Name"] = "Задача на порівняння об'єктів";
$tasks[$ch][$nt]["Description"] = "Який з об'єктів більший? ";
$tasks[$ch][$nt]["answers"] = "A|B";
$tasks[$ch][$nt]["right_answer"] = 0;
$tasks[$ch][$nt]["image"] = "https://math.kh.ua/images/compare_of_objects.php?t=[2,1]";


https://math.kh.ua/images/compare_of_objects.php?t=[2,1]

$nt = 0;
$ch +=1;



$tasks[$ch][$nt]["description"] = "Задача 1 на множини";
$tasks[$ch][$nt]["Name"] = "Задача на множини";
$tasks[$ch][$nt]["Description"] = "Множина А={1,2,3,5,7,8,9}, множина В={1,2,4,5,6,10}, З яких елементів складається множина C, Якщо C = A &cup; B; ";
$tasks[$ch][$nt]["answers"] = "{1,2,5}|{1,2,6}|{8,9,10}|{}";
$tasks[$ch][$nt]["right_answer"] = 0;
$tasks[$ch][$nt]["image"] = "https://math.kh.ua/images/images/canvas300.jpg";

$nt += 1;

$tasks[$ch][$nt]["description"] = "Рознесені об'єкти";
$tasks[$ch][$nt]["Name"] = "Задача на обрахунок об'єктів";
$tasks[$ch][$nt]["Description"] = "Скільки елементів в множині рознесених об'єктів";
$tasks[$ch][$nt]["answers"] = "8|10|12|14";
$tasks[$ch][$nt]["right_answer"] = 1;
$tasks[$ch][$nt]["image"] = "https://math.kh.ua/images/scattered_objects.php?t=[10]";

$nt += 1;

$tasks[$ch][$nt]["description"] = "Кількість об'єктів";
$tasks[$ch][$nt]["Name"] = "Задача на визначення множини що відповідає цифрі";
$tasks[$ch][$nt]["Description"] = "Під якою буквою кількість об'єктів відповідає цифрі";
$tasks[$ch][$nt]["answers"] = "A|B|C|D";
$tasks[$ch][$nt]["right_answer"] = 2;
$tasks[$ch][$nt]["image"] = "https://math.kh.ua/images/2dimages/correspondentofobjects/correspondent_of_objects_color_number.php?t=[[5,2,8,1],[3,0,2,1],8]";

$nt += 1;

$tasks[$ch][$nt]["description"] = "Порівняння кількості об'єктів";
$tasks[$ch][$nt]["Name"] = "Задача на порівняння кількості елементів двох множин";
$tasks[$ch][$nt]["Description"] = "В якій множині більше елементів";
$tasks[$ch][$nt]["answers"] = "A|B";
$tasks[$ch][$nt]["right_answer"] = 1;
$tasks[$ch][$nt]["image"] = "https://math.kh.ua/images/2dimages/setsofobjects/sets_of_objects.php?t=[5,10]";


$nt = 0;
$ch +=1;

$tasks[$ch][$nt]["description"] = "Чисова пряма. Пропуски";
$tasks[$ch][$nt]["Name"] = "Пропуски чисел на числовій прямій";
$tasks[$ch][$nt]["Description"] = "Яка з чисел пропущена на числовій прямій";
$tasks[$ch][$nt]["answers"] = "3|5|7|9";
$tasks[$ch][$nt]["right_answer"] = 1;
$tasks[$ch][$nt]["image"] = "https://math.kh.ua/images/number_line_01.php?t=[2,5,8]";
$tasks[$ch][$nt]["image_width"] = 600;

$nt += 1;


$tasks[$ch][$nt]["description"] = "Числова пряма. Плюс один";
$tasks[$ch][$nt]["Name"] = "Додавання одиниці на числовій прямій.";
$tasks[$ch][$nt]["Description"] = "Яке число отримаємо при додавані одиниці до числа 3";
$tasks[$ch][$nt]["answers"] = "3|4|5|6";
$tasks[$ch][$nt]["right_answer"] = 1;
$tasks[$ch][$nt]["image"] = "https://math.kh.ua/images/2dimages/numberline/number_line_b_n_arrow_one_more.php?t=3";
$tasks[$ch][$nt]["image_width"] = 600;


$nt = 0;
$ch +=1;

$tasks[$ch][$nt]["description"] = "Рахівниця. Пропуск";
$tasks[$ch][$nt]["Name"] = "Пропуски чисел серед переліку назв чисел";
$tasks[$ch][$nt]["Description"] = "В якому з блоків не пропущено назви чисел ";
$tasks[$ch][$nt]["answers"] = "A|B|C|D";
$tasks[$ch][$nt]["right_answer"] = 1;
$tasks[$ch][$nt]["image"] = "https://math.kh.ua/images/2dimages/countofobjects/count_of_objects.php?t=[12,3,1]";
$tasks[$ch][$nt]["image_width"] = 600;


$nt = 0;
$ch +=1;

$tasks[$ch][$nt]["description"] = "Одиниці вимірювання. Центи";
$tasks[$ch][$nt]["Name"] = "Одиниці вимірювання. Центи";
$tasks[$ch][$nt]["Description"] = "Який опис підходить до зображення монети? ";
$tasks[$ch][$nt]["answers"] = "A|B|C|D";
$tasks[$ch][$nt]["right_answer"] = 3;
$tasks[$ch][$nt]["image"] = "https://math.kh.ua/images/2dimages/coins/coins.php?t=[[1,2,3,0],0]";
$tasks[$ch][$nt]["image_width"] = 600;


$nt = 0;
$ch +=1;

$tasks[$ch][$nt]["description"] = "Складання чисел";
$tasks[$ch][$nt]["Name"] = "Різні складові числа";
$tasks[$ch][$nt]["Description"] = "З яких чисел складається число 9? ";
$tasks[$ch][$nt]["answers"] = "1 та 7| 4 та 5| 3 та 8 | 2 та 6";
$tasks[$ch][$nt]["right_answer"] = 1;
$tasks[$ch][$nt]["image"] = "https://math.kh.ua/images/addition_objects.php?t=[4,5]";
$tasks[$ch][$nt]["image_width"] = 600;

$nt +=1;

$tasks[$ch][$nt]["description"] = "Перевірка рівняння";
$tasks[$ch][$nt]["Name"] = "Перевірка рівняння";
$tasks[$ch][$nt]["Description"] = "Чи правильним є рівняння? ";
$tasks[$ch][$nt]["answers"] = "так| ні";
$tasks[$ch][$nt]["right_answer"] = 1;
$tasks[$ch][$nt]["image"] = "https://math.kh.ua/images/equations.php?t=[73,1,4,34]";
$tasks[$ch][$nt]["image_width"] = 600;

$nt = 0;
$ch +=1;

$tasks[$ch][$nt]["description"] = "Перевірка рівняння";
$tasks[$ch][$nt]["Name"] = "Перевірка рівняння";
$tasks[$ch][$nt]["Description"] = "Чи правильним є рівняння? ";
$tasks[$ch][$nt]["answers"] = "так| ні";
$tasks[$ch][$nt]["right_answer"] = 1;
$tasks[$ch][$nt]["image"] = "https://math.kh.ua/images/equations.php?t=[73,1,4,34]";
$tasks[$ch][$nt]["image_width"] = 600;




$nt = 0;
$ch =18;


$tasks[$ch][$nt]["description"] = "Діаграма за формою";
$tasks[$ch][$nt]["Name"] = "Діаграма за формою елементів";
$tasks[$ch][$nt]["Description"] = "Яка з діаграм є правильню ? ";
$tasks[$ch][$nt]["answers"] = "A|B|C|D";
$tasks[$ch][$nt]["right_answer"] = 1;
$tasks[$ch][$nt]["image"] = "https://math.kh.ua/images/2dshapes/TypesGraph/types_graph_json.php?t=[1,16]";
$tasks[$ch][$nt]["image_width"] = 600;

$nt = 0;
$ch +=1;
$tasks[$ch][$nt]["description"] = "Двомірні форми. Квадрат";
$tasks[$ch][$nt]["Name"] = "Двомірі форми квадрат";
$tasks[$ch][$nt]["Description"] = "Яка з форм є квадратом ? ";
$tasks[$ch][$nt]["answers"] = "A|B|C|D";
$tasks[$ch][$nt]["right_answer"] = 0;
$tasks[$ch][$nt]["image"] = "https://math.kh.ua/images/types_json.php?t=[%22s%22,%22c%22,%22t%22,%22r%22]";
$tasks[$ch][$nt]["image_width"] = 600;

$nt = 0;
$ch +=1;
$tasks[$ch][$nt]["description"] = "Площа квадрата";
$tasks[$ch][$nt]["Name"] = "Площа квадрата";
$tasks[$ch][$nt]["Description"] = "Якою є площа квадарта";
$tasks[$ch][$nt]["answers"] = "10|8|24|64";
$tasks[$ch][$nt]["right_answer"] = 2;
$tasks[$ch][$nt]["image"] = "https://math.kh.ua/images/rectangles_json.php?t=%7B%22a%22:4,%22b%22:6%7D";
$tasks[$ch][$nt]["image_width"] = 600;


$nt = 0;
$ch +=1;


$tasks[$ch][$nt]["description"] = "Площа рівнобедерного трикутника. ";
$tasks[$ch][$nt]["Name"] = "Площа рівнобедерного трикутника";
$tasks[$ch][$nt]["Description"] = "Якою є площа даного трикутника?";
$tasks[$ch][$nt]["answers"] = "11|30|15|22";
$tasks[$ch][$nt]["right_answer"] = 2;
$tasks[$ch][$nt]["image"] = "https://innovations.kh.ua/images/2dshapes/Triangles/triangle_sm.php?t=[5,6]";
$tasks[$ch][$nt]["image_width"] = 600;


$nt = 0;
$ch +=1;


$tasks[$ch][$nt]["description"] = "Градусна міра ктуа. ";
$tasks[$ch][$nt]["Name"] = "Оцінка граусної міри кута";
$tasks[$ch][$nt]["Description"] = "Як ви оцінюєте градусну міру даного кута?";
$tasks[$ch][$nt]["answers"] = "90|>45|45|<45";
$tasks[$ch][$nt]["right_answer"] = 1;
$tasks[$ch][$nt]["image"] = "https://math.kh.ua/images/2dshapes/Angle/sharp_angle.php?t=70";
$tasks[$ch][$nt]["image_width"] = 300;

$nt += 1;
$tasks[$ch][$nt]["description"] = "Тип кута. ";
$tasks[$ch][$nt]["Name"] = "Оцініть тип кута!";
$tasks[$ch][$nt]["Description"] = "Який кут ви бачите перед собою?";
$tasks[$ch][$nt]["answers"] = "Розгорнутий|прямий|гострий|тупий";
$tasks[$ch][$nt]["right_answer"] = 3;
$tasks[$ch][$nt]["image"] = "https://math.kh.ua/images/2dshapes/Angle/obtuse_angle.php?t=120";
$tasks[$ch][$nt]["image_width"] = 600;


$nt += 1;
$tasks[$ch][$nt]["description"] = "Бісектриса. ";
$tasks[$ch][$nt]["Name"] = "Бісектриса";
$tasks[$ch][$nt]["Description"] = "Якщо кут AOB дорівнює 70 градусів, а OC є бісектрисою кута ABC. Чому дорівнює кут BOC?";
$tasks[$ch][$nt]["answers"] = "90|70|45|35";
$tasks[$ch][$nt]["right_answer"] = 3;
$tasks[$ch][$nt]["image"] = "https://math.kh.ua/images/2dshapes/Angle/bisectrix_azimuth.php?t=70";
$tasks[$ch][$nt]["image_width"] = 300;

$nt = 0;
$ch +=1;



?>