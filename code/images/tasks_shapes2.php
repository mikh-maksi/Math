<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Tasks</h1>
        <h2>Shapes +</h2>
        <select name="task" id="type">
            <option value="0">Chose option</option>
            <option value="1">Square. Kindergarten</option>
            <option value="2">Square. Grade 1. Shape type</option>
            <option value="3">Square. Grade 2. Number of right angles.</option>
            <option value="4">Square. Grade 3. Area. Perimeter.</option>
            <option value="5">Square. Grade 4. Lines of symmetry.</option>
            <option value="6">Square. Grade 5. Diagonal .</option>
            <option value="7">Square. Grade 6. Coordinates and side.</option>
            <option value="8">Square. Grade 7. Perimeter and square.</option>
            <option value="9">Square. Grade 8. Pythagorean Theorem.</option>
            <option value="10">Rectangles. Kindergarten. </option>
            <option value="11">Rectangles. Grade 1. Where is rectangle?</option>
            <option value="12">Rectangles. Grade 2. Right angles</option>
            <option value="13">Rectangles. Grade 3. Area and Perimeter</option>
            <option value="14">Rectangles. Grade 4. What is its length?</option>
            <option value="15">Rectangles. Grade 5. Rhombus</option>
            <option value="16">Rectangles. Grade 6. Coordinates</option>
            <option value="17">Rectangles. Grade 7. Scale factor</option>
            <option value="18">Rectangles. Grade 8. Pythagorean Theorem (-)</option>

            <option value="19">Circles. Kindergarten. Circle. Rhomb. Parallelogram.</option>
            <option value="20">Circles. Grade 1. Shape.</option>
            <option value="21">Circles. Grade 2. Marked center</option>
            <option value="22">Circles. Grade 3. Diameter - Radius</option>
            <option value="23">Circles. Grade 4. Radius - Area</option>
            <option value="24">Circles. Grade 5. Circumference.</option>
            <option value="25">Circles. Grade 6. Circumference and area</option>
            <option value="26">Circles. Grade 7. Doubled Circle</option>
            <option value="27">Circles. Grade 8. Radius. Arc.</option>

            <option value="28">Hexagons. Kindergarten. Shape with six sides </option>
            <option value="29">Hexagons. Grade 1. Hexagon.</option>
            <option value="30">Hexagons. Grade 2. Sides and corners</option>
            <option value="31">Hexagons. Grade 3. Mosaic</option>
            <option value="32">Hexagons. Grade 4. Side</option>
            <option value="33">Hexagons. Grade 5. Regular. Side.</option>
            <option value="34">Hexagons. Grade 6. Perimeter</option>
            <option value="35">Hexagons. Grade 7. Scale factor</option>
            <option value="36">Hexagons. Grade 8. Prism (-)</option>

            <option value="37">Other Polygons. Grade 3a. Equilateral triangle  </option>
            <option value="38">Other Polygons. Grade 3b. Isosceles triangle</option>
            <option value="39">Other Polygons. Grade 3c. Square Length.</option>
            <option value="40">Other Polygons. Grade 3d. Rectangle. Area </option>
            <option value="41">Other Polygons. Grade 4a. Scalene triangle (?)</option>
            <option value="42">Other Polygons. Grade 4b. Area of a parallelogram</option>
            <option value="43">Other Polygons. Grade 4c. Area of a trapezoid </option>
            <option value="44">Other Polygons. Grade 5a. Regular pentagon</option>
            <option value="45">Other Polygons. Grade 5b. Regular hexagon</option>
            <option value="46">Other Polygons. Grade 6. Six equilateral triangles (+/-)</option>
            <option value="47">Other Polygons. Grade 7. Rhombus</option>
            <option value="48">Other Polygons. Grade 8. Octagon (-)</option>

            <option value="49">Other 2D Shapes. Kindergarten. Ellipse (-)</option>
            <option value="50">Other 2D Shapes. Grade 1. Ellipse and Picture (-)</option>
            <option value="51">Other 2D Shapes. Grade 2. Color Semi-circle (-)</option>
            <option value="52">Other 2D Shapes. Grade 3. Semi-circle </option>
            <option value="53">Other 2D Shapes. Grade 4. Right triangle</option>
            <option value="54">Other 2D Shapes. Grade 5. Right triangle</option>
            <option value="55">Other 2D Shapes. Grade 6. Slides of rhombus</option>
            <option value="56">Other 2D Shapes. Grade 7. Kite shape</option>
            <option value="57">Other 2D Shapes. Grade 8a. Kite Area</option>
            <option value="58">Other 2D Shapes. Grade 8b. Perimeter of triangle</option>
            <option value="59">Other 2D Shapes. Grade 8c. Isosceles Trapezoids (-)</option>
            <option value="60">Other 2D Shapes. Grade 8d. Right Trapezoids (-)</option>
            <option value="61">Other 2D Shapes. Grade 8e. Parabolas</option>
            <option value="62">Other 2D Shapes. Grade 8f. Parabolas (-)</option>
            <option value="63">Other 2D Shapes. Grade 8g. Hyperbolas</option>
            <option value="64">Other 2D Shapes. Grade 8e. Hyperbolas (-)</option>
</select>
        <div id="text"></div>
        <div id="forms"></div>
        <div id="button"><button id ="btn" class = "hdn">Generate</button></div>
        <div id="picture"></div>
        </div>
    <script>
        var text_array = [];
        text_array.push(" Start text");

        text_array.push(" Look at these shapes. Point to the square. (Provide images of a circle, square, triangle, and rectangle).");
        text_array.push(" What makes this shape a square and not a rectangle? (Show a square with all sides equal and a rectangle with two longer and two shorter sides).");
        text_array.push(" How many right angles does a square have? Draw a square and count its right angles.");
        text_array.push(" A square garden has a side length of 4 meters. What is its area? What is its perimeter?");
        text_array.push(" Draw a square and divide it into 4 smaller squares. How many lines of symmetry does the original square have?");
        // 6
        text_array.push(" If you cut a square diagonally from one corner to the opposite corner, what shapes do you create? How do these shapes relate to the original square?");
        // 7
        text_array.push(" On a coordinate grid, plot a square with one corner at (1, 1) and a side length of 3 units. What are the coordinates of the other corners?");
        // 8
        text_array.push(" If the perimeter of a square is 24 cm, what is its side length? What is its area?");
        // 9
        text_array.push(" A square has a side length of 5 cm. Use the Pythagorean Theorem to find the length of its diagonal.");
        // 10
        text_array.push(" Which of these shapes has four sides with opposite sides equal? Show a picture of a circle, triangle, and rectangle");
        // 11
        text_array.push(" Which of these shapes is a rectangle? Explain how you know. Show pictures of a square, a rectangle, and a parallelogram.");
        // 12
        text_array.push(" How many right angles does a rectangle have? Draw a rectangle and count the right angles.");
        // 13
        text_array.push(" If a rectangle has a length of 8 meters and a width of 3 meters, what is its area? What is its perimeter?");
        // 14
        text_array.push(" A rectangle has an area of 24 square meters and a width of 4 meters. What is its length?");
        // 15
        text_array.push(" How is a rectangle different from a rhombus? Consider their properties to answer.");
        // 16
        text_array.push(" A rectangle is plotted on a coordinate grid with vertices at (1,1), (1,5), (6,5), and (6,1). What is the area of this rectangle?");
        // 17
        text_array.push(" A rectangular garden measuring 10 meters by 5 meters is enlarged by a scale factor of 2. What are the new dimensions and area of the garden?");
        // 18
        text_array.push(" ");
        // 19
        text_array.push(" Which one of these is a circle? (Show images of different shapes including a circle.)");
        // 20
        text_array.push(" What is the name of this shape that has no corners and looks the same all the way around? (Show an image of a circle.)");
        // 21
        text_array.push(" Draw a line from the center of this circle to the edge. What is this line called? (Provide a circle with a marked center.)");
        // 22
        text_array.push(" If the diameter of a circle is 8 cm, what is the radius?");
        // 23
        text_array.push("  Find the area of a circle with a radius of 3 cm. (Use π ≈ 3.14)");
        // 24
        text_array.push(" If a circle has a circumference of 31.4 cm, find the diameter. (Use π ≈ 3.14)");
        // 25
        text_array.push(" A circular garden has a radius of 5 meters. Calculate its circumference and area. (Use π ≈ 3.14)");
        // 26
        text_array.push(" If the radius of a circle is doubled, by what factor does the circumference increase?");
        // 27
        text_array.push(" A circle has a radius of 10 cm. Calculate the length of an arc that subtends a central angle of 30 degrees. (Use π ≈ 3.14)");
        // 28
        text_array.push(" Which one of these shapes has six sides? (Show images of a circle, square, triangle, and hexagon.)");
        // 29
        text_array.push(" What is the name of this shape with six equal sides? (Show an image of a hexagon.)");
        // 30
        text_array.push(" How many sides does a hexagon have? How many corners? Draw a hexagon and label its sides and corners");
        // 31
        text_array.push(" Can a hexagon tessellate a plane? Draw a picture to show how hexagons fit together without any gaps.");
        // 32
        text_array.push(" If each side of a regular hexagon is 4 cm long, what is its perimeter?");
        // 33
        text_array.push(" Calculate the area of a regular hexagon with a side length of 6 cm. (Hint: Divide the hexagon into six equilateral triangles.)");
        // 34
        text_array.push("  A regular hexagon has a perimeter of 48 meters. Calculate its area. (Hint: First, find the side length, then use the formula for the area of a regular hexagon: \( \frac{3\sqrt{3}}{2} s^2 \), where \( s \) is the side length.)");
        // 35
        text_array.push(" If a regular hexagon undergoes a dilation with a scale factor of 1.5, how does the perimeter change?");
        // 36
        text_array.push(" Calculate the volume of a hexagonal prism with a regular hexagon base side of 5 cm and height of 10 cm. (Use the area formula from Grade 5.)");
        // 37
        text_array.push(" If each side of an equilateral triangle is 4 cm, what is the perimeter?");
        // 38
        text_array.push(" An isosceles triangle has two sides that are each 5 cm and a base of 8 cm. What is the perimeter?");
        // 39
        text_array.push(" What is the area of a square whose side length is 3 cm? - Rectangles");
        // 40
        text_array.push("  Find the area of a rectangle with length 6 cm and width 4 cm.");
        // 41
        text_array.push(" A scalene triangle has sides of lengths 4 cm, 5 cm, and 6 cm. Can you classify the triangle as acute, obtuse, or right?");
        // 42
        text_array.push(" Find the area of a parallelogram with a base of 8 cm and a height of 3 cm.");
        // 43
        text_array.push(" Calculate the area of a trapezoid with bases of 4 cm and 6 cm, and a height of 5 cm.");
        // 44
        text_array.push(" A regular pentagon has a side length of 4 cm. Find the perimeter. - Hexagons");
        // 45
        text_array.push(" If each side of a regular hexagon is 3 cm, calculate its perimeter");
        // 46
        text_array.push(" A hexagon is made by combining six equilateral triangles each with a side length of 2 cm. What is the total area?");
        // 47
        text_array.push(" A rhombus has diagonals of 10 cm and 12 cm. Find its area.");
        // 48
        text_array.push(" Calculate the area of a regular octagon with a side length of 4 cm. (Hint: Divide it into triangles or use the formula \(2(1+\sqrt{2})s^2\)).");
        // 49
        text_array.push(" Circle the shape that looks like an egg. (Show a series of different shapes including an oval.)");
        // 50
        text_array.push(" Draw an oval around the tree in this picture to show its canopy. ");
        // 51
        text_array.push(" Color in the shape that is a half of a circle. (Show various shapes including a semi-circle.)");
        // 52
        text_array.push(" If one semi-circle has a diameter of 4 cm, what is the diameter of the whole circle when two semi-circles are put together?");
        // 53
        text_array.push(" What is the length of the hypotenuse in a right triangle if one leg is 3 cm and the other leg is 4 cm?");
        // 54
        text_array.push(" Calculate the length of the longest side of a right triangle with sides measuring 5 cm and 12 cm");
        // 55
        text_array.push(" If all sides of a rhombus are 6 cm, what is the perimeter?");
        // 56
        text_array.push(" Draw and color a kite shape. Label the congruent sides.");
        // 57
        text_array.push(" If one diagonal of a kite measures 10 cm and the other measures 5 cm, and they intersect at a right angle, what is the area of the kite?");
        // 58
        text_array.push(" Find the perimeter of a scalene triangle with side lengths of 7 cm, 8 cm, and 9 cm.");
        // 59
        text_array.push(" What is the area of an isosceles trapezoid with bases of 4 cm and 6 cm, and a height of 5 cm?");
        // 60
        text_array.push(" Calculate the area of a right trapezoid where the bases are 8 cm and 12 cm, and the height is 5 cm.");
        // 61
        text_array.push(" Determine the coordinates of the vertex and focus of a parabola given by the equation \( y = 2(x - 3)^2 + 4 \).");
        // 62
        text_array.push(" A parabolic arch has a height of 10 meters and a base width of 20 meters at the ground level. Where is the focus located?");
        // 63
        text_array.push(" Find the equations of the asymptotes for the hyperbola given by the equation \( \frac{x^2}{16} - \frac{y^2}{9} = 1 \).");
        // 64
        text_array.push(" For a hyperbola with foci at (±6, 0) and a vertical transverse axis of length 8, determine the equation of the hyperbola.");


        var forms_array = [];
        // 0
        forms_array.push(" <input id = 'circle'>");
        // 1
        forms_array.push("Circle order: <input id = 'circle' class = 'l20' value = '0'>  Square order: <input id = 'square' class = 'l20' value = '1'> Triangle order: <input id = 'triangle' class = 'l20' value = '2'>");
        // 2
        forms_array.push("");
        // 3
        forms_array.push("");
        // 4
        forms_array.push("<input id = 'length' class = 'l20' value = '4'>");
        // 5
        forms_array.push("");
        // 6
        forms_array.push("");
        // 7
        forms_array.push("x:<input id = 'x' class = 'l20' value = '1'> y:<input id = 'y' class = 'l20' value = '1'> side: <input id = 'side' class = 'l20' value = '3'>");
        // 8
        forms_array.push("");
        // 9
        forms_array.push("length:<input id = 'length' class = 'l20' value = '5'>");
        // 10
        forms_array.push("Square order: <input id = 'square' class = 'l20' value = '0'>  Rectangle order: <input id = 'rectangle' class = 'l20' value = '1'> Parallelogram order: <input id = 'parallelogram' class = 'l20' value = '2'>");
        // 11
        forms_array.push("");
        // 12
        forms_array.push("");
        // 13
        forms_array.push("length:<input id = 'length' class = 'l20' value = '8'> width:<input id = 'width' class = 'l20' value = '3'>");
        // 14
        forms_array.push("width:<input id = 'width' class = 'l20' value = '3'>");
        // 15
        forms_array.push("");
        // 16
        forms_array.push("x1: <input id = 'x1' class = 'l20' value = '1'> y1:<input id = 'y1' class = 'l20' value = '1'>x3:<input id = 'x3' class = 'l20' value = '6'> y3:<input id = 'y3' class = 'l20' value = '5'>");
        // 17
        forms_array.push("length:<input id = 'length' class = 'l20' value = '10'> width:<input id = 'width' class = 'l20' value = '5'> scale:<input id = 'scale' class = 'l20' value = '2'> ");
        // 18
        forms_array.push("");
        // 19
        forms_array.push("Circle order: <input id = 'circle' class = 'l20' value = '0'>  Rectangle order: <input id = 'rectangle' class = 'l20' value = '1'> Parallelogram order: <input id = 'parallelogram' class = 'l20' value = '2'> ");
        // 20
        forms_array.push(" ");
        // 21
        forms_array.push(" ");
        // 22
        forms_array.push(" Diameter: <input id = 'diameter' class = 'l20' value = '8'> ");
        // 23
        forms_array.push(" Radius: <input id = 'radius' class = 'l20' value = '3'>");
        // 24
        forms_array.push(" Length: <input id = 'length' class = 'l50' value = '31.4'>");
        // 25
        forms_array.push(" Radius: <input id = 'radius' class = 'l20' value = '5'>");
        // 26
        forms_array.push(" Radius 1: <input id = 'radius1' class = 'l50' value = '10'> Radius 2: <input id = 'radius2' class = 'l50' value = '5'>");
        // 27
        forms_array.push(" Radius: <input id = 'radius' class = 'l50' value = '10'> Arc: <input id = 'arc' class = 'l50' value = '45'>");
        // 28
        forms_array.push(" ");
        // 29
        forms_array.push(" ");
        // 30
        forms_array.push(" ");
        // 31
        forms_array.push(" ");
        // 32
        forms_array.push(" length:<input id = 'length' class = 'l20' value = '4'> ");
        // 33
        forms_array.push(" length:<input id = 'length' class = 'l20' value = '6'>");
        // 34
        forms_array.push(" ");
        // 35
        forms_array.push(" Scale factor:<input id = 'scale' class = 'l50' value = '1.5'>");
        // 36
        forms_array.push(" ");
        // 37
        forms_array.push(" Side:<input id = 'side' class = 'l20' value = '4'>");
        // 38
        forms_array.push(" Sides:<input id = 'side' class = 'l20' value = '5'> Base: <input id = 'base' class = 'l20' value = '8'>");
        // 39
        forms_array.push(" Side:<input id = 'side' class = 'l20' value = '4'>");
        // 40
        forms_array.push(" Side 1:<input id = 'side1' class = 'l20' value = '6'> Side 2:<input id = 'side2' class = 'l20' value = '4'>");
        // 41
        forms_array.push(" Side 1:<input id = 'side1' class = 'l20' value = '4'> Side 2:<input id = 'side2' class = 'l20' value = '5'> Side 3:<input id = 'side3' class = 'l20' value = '6'>");
        // 42
        forms_array.push(" Base:<input id = 'base' class = 'l20' value = '8'> Height:<input id = 'height' class = 'l20' value = '3'>");
        // 43
        forms_array.push(" Base 1:<input id = 'base1' class = 'l20' value = '4'> Base 2:<input id = 'base2' class = 'l20' value = '6'> Height:<input id = 'height' class = 'l20' value = '5'>");
        // 44
        forms_array.push(" Side:<input id = 'side' class = 'l20' value = '4'>");
        // 45
        forms_array.push(" Side:<input id = 'side' class = 'l20' value = '3'>");
        // 46
        forms_array.push(" Side:<input id = 'side' class = 'l20' value = '2'>");
        // 47
        forms_array.push(" Diagonal 1:<input id = 'd1' class = 'l50' value = '10'> Diagonal 2:<input id = 'd2' class = 'l50' value = '12'>");
        // 48
        forms_array.push(" ");
        // 49
        forms_array.push(" ");
        // 50
        forms_array.push(" ");
        // 51
        forms_array.push(" ");
        // 52
        forms_array.push(" Diameter:<input id = 'diameter' class = 'l20' value = '4'>");
        // 53
        forms_array.push("  leg1:<input id = 'side1' class = 'l20' value = '3'>  leg2:<input id = 'side2' class = 'l20' value = '4'>");
        // 54
        forms_array.push(" leg1:<input id = 'side1' class = 'l50' value = '5'>  leg2:<input id = 'side2' class = 'l50' value = '12'>");
        // 55
        forms_array.push(" Side:<input id = 'side' class = 'l20' value = '6'>");
        // 56
        forms_array.push(" ");
        // 57
        forms_array.push(" Diagonal 1:<input id = 'd1' class = 'l50' value = '10'> Diagonal 2:<input id = 'd2' class = 'l50' value = '12'>");
        // 58
        forms_array.push(" Side 1:<input id = 'side1' class = 'l50' value = '4'> Side 2:<input id = 'side2' class = 'l50' value = '5'> Side 3:<input id = 'side3' class = 'l50' value = '6'>");
        // 59
        forms_array.push("  ");
        // 60
        forms_array.push(" ");
        // 61
        forms_array.push(" <input id = 'm' class = 'l20' value = '2'>*(x- <input id = 'a' class = 'l20' value = '3'> )^2 + <input id = 'c' class = 'l20' value = '4'>");
        // 62
        forms_array.push(" ");
        // 63
        forms_array.push(" x^2/<input id = 'a' class = 'l50' value = '16'>  - y^2/<input id = 'b' class = 'l50' value = '9'> = <input id = 'c' class = 'l50' value = '1'>");        
        // 64
        forms_array.push(" ");        

        var mainSelect = document.getElementById("type");
        var mainText = document.getElementById("text");
        var mainForms = document.getElementById("forms");
        var mainPicture = document.getElementById("picture");

        var mainButton = document.getElementById("btn");


        mainSelect.addEventListener("change",selectChange);
        mainButton.addEventListener("click",selectButton);
        function selectChange(){
            var v = mainSelect.value;
            mainText.innerHTML = text_array[v];
            mainForms.innerHTML = forms_array[v];

            mainButton.className='';
            mainPicture.innerHTML = '';
        }
        function selectButton(){
            var v = mainSelect.value;
            console.log(v);
            if (v == 1){
                var square = document.getElementById("square");
                var circle = document.getElementById("circle");
                var triangle = document.getElementById("triangle");

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/types.php?s=${square.value}&c=${circle.value}&t=${triangle.value}`;
            }


            if (v == 2){
                var side_a = document.getElementById("side_a");
                var side_b = document.getElementById("side_b");
                var side_c = document.getElementById("side_c");

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/square.php?x1=20&y1=20&x2=270&y2=270&x1_2=20&y1_2=20&x2_2=270&y2_2=520`;
            }

            if (v == 3){
               
                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/square.php?x1=20&y1=20&x2=570&y2=570`;
            }
            if (v == 4){
                var l = parseInt(document.getElementById("length").value);

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/square.php?x1=50&y1=50&x2=210&y2=210&l=${l}m`;
   
            }
            if (v == 5){

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/square.php?x1=50&y1=50&x2=310&y2=310&d=1`;
            }
            if (v == 6){
                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/square.php?x1=50&y1=50&x2=310&y2=310&d=2`;
            }
            if (v == 7){
                var x = parseInt(document.getElementById("x").value);
                var y = parseInt(document.getElementById("y").value);
                var side = parseInt(document.getElementById("side").value);


                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/square.php?x1=50&y1=50&x2=310&y2=310&cx1=${x}&cy1=${y}&l=${side}`;
            }
   

        if (v == 8){


                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/square.php?x1=50&y1=50&x2=170&y2=170`;
            }
            if (v == 9){
                var l = parseInt(document.getElementById("length").value);

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/square.php?x1=50&y1=50&x2=170&y2=170&d=2&l=${l}cm`;
            }
            if (v == 10){
                var square = document.getElementById("square");
                var rectangle = document.getElementById("rectangle");
                var parallelogram = document.getElementById("parallelogram");

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/types.php?s=${square.value}&r=${rectangle.value}&p=${parallelogram.value}`;
            }
            if (v == 11){


                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/types.php?s=0&p=2&r=1`;
            }
            if (v == 12){

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/rectangles.php?x1=50&y1=50&x2=450&y2=200`;
                }
            if (v == 13){
                var length = document.getElementById("length");
                var width = document.getElementById("width");


                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/rectangles.php?x1=50&y1=50&x2=450&y2=200&a=${length.value}&b=${width.value}`;
            }
            if (v == 14){
                var width = document.getElementById("width");

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/rectangles.php?x1=50&y1=50&x2=530&y2=370&a=?&b=${width.value}`;
            }
            if (v == 15){


                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/types.php?s=0&p=2&rh=1`;
            }

            if (v == 16){
                var x1 = document.getElementById("x1");
                var y1 = document.getElementById("y1");
                var x3 = document.getElementById("x3");
                var y3 = document.getElementById("y3");


                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/rectangles.php?x1=50&y1=50&x2=550&y2=450&cx1=${x1.value}&cy1=${y1.value}&cx2=${x3.value}&cy2=${y1.value}&cx3=${x3.value}&cy3=${y3.value}&cx4=${x1.value}&cy4=${y3.value}`;
            }
            if (v == 17){
                var length = document.getElementById("length");
                var width = document.getElementById("width");
                var scale = document.getElementById("scale");

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/rectangles.php?x1=50&y1=50&x2=250&y2=150&sc=${scale.value}&a=${length.value}&b=${width.value}`;
            }
            if (v == 18){

                var n = parseInt(document.getElementById("n").value);
                var all = document.getElementById("all").value;
            
                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/ellipse.php?in=${n}&all=${all}`;
            }
            if (v == 19){
                var circle = document.getElementById("circle");
                var rectangle = document.getElementById("rectangle");
                var parallelogram = document.getElementById("parallelogram");

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/types.php?c=${circle.value}&r=${rectangle.value}&p=${parallelogram.value}`;
            }
            if (v == 20){

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/types.php?c=0`;
            }
            if (v == 21){

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/crcl.php`;
            }
            if (v == 22){
                var diameter = parseInt(document.getElementById("diameter").value);

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/crcl.php?r=?&d=${diameter}m`;
            }

            if (v == 23){
                var radius = parseInt(document.getElementById("radius").value);
                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/crcl.php?r=${radius}m`;
            }


            if (v == 24){
                var length = (document.getElementById("length").value);

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/crcl.php?len=${length}&d=?`;
            }

            
            if (v == 25){

                var radius = parseInt(document.getElementById("radius").value);
                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/crcl.php?r=${radius}m`;
            }

            
            if (v == 26){

                var radius1 = parseInt(document.getElementById("radius1").value);
                var radius2 = parseInt(document.getElementById("radius2").value);
                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/crcl.php?r=${radius1}m&r2=${radius2}m`;
            }

            
            if (v == 27){

                var radius = parseInt(document.getElementById("radius").value);
                var arc = parseInt(document.getElementById("arc").value);
                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/crcl.php?r=${radius}m&arc=${arc}`;
            }

            
            if (v == 28){

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/types.php?s=0&p=2&rh=1`;
            }

            
            if (v == 29){

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/types.php?h=0`;
            }

            
            if (v == 30){

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/hexagone_base.php`;
            }

            
            if (v == 31){

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/hexagone_mosaic.php`;
            }

            
            if (v == 32){

                var length = (document.getElementById("length").value);

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/hexagone.php?l=${length}`;
            }

            
            if (v == 33){


                var length = (document.getElementById("length").value);

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/hexagone.php?l=${length}`;
            }

            
            if (v == 34){

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/hexagone.php?l=0`;
            }

            
            if (v == 35){

                var scale = (document.getElementById("scale").value);

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/hexagone.php?scale=${scale}`;
            }

            
            if (v == 36){

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/types.php?s=0&p=2&rh=1`;
            }

            
            if (v == 37){
                var side = parseInt(document.getElementById("side").value);


                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/triangle.php?a=${side}&b=${side}&c=${side}`;
            }

            
            if (v == 38){
                var side = parseInt(document.getElementById("side").value);
                var base = parseInt(document.getElementById("base").value);


                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/triangle.php?a=${base}&b=${side}&c=${side}`;
            }

            
            if (v == 39){
                var side = parseInt(document.getElementById("side").value);
                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/square.php?x1=50&y1=50&x2=210&y2=210&l=${side}cm`;
            }

            
            if (v == 40){
                var side1 = parseInt(document.getElementById("side1").value);
                var side2 = parseInt(document.getElementById("side2").value);
                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/rectangles.php?x1=50&y1=50&x2=450&y2=200&a=${side1}&b=${side2}`;
            }

            
            if (v == 41){
                var side1 = parseInt(document.getElementById("side1").value);
                var side2 = parseInt(document.getElementById("side2").value);
                var side3 = parseInt(document.getElementById("side3").value);                
                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/triangle.php?a=${side1}&b=${side2}&c=${side3}`;
            }

            
            if (v == 42){
                var base = parseInt(document.getElementById("base").value);
                var height = parseInt(document.getElementById("height").value);
                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/parallelogram.php?h=${height}&base=${base}`;
            }

            
            if (v == 43){
                var base1 = parseInt(document.getElementById("base1").value);
                var base2 = parseInt(document.getElementById("base2").value);
                var height = parseInt(document.getElementById("height").value);
                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/trapezoid.php?h=${height}&base1=${base2}&base2=${base1}`;
            }

            
            if (v == 44){
                var side = parseInt(document.getElementById("side").value);
                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/pentagon.php?s=${side}`;
                
            }

            
            if (v == 45){
                var side = parseInt(document.getElementById("side").value);


                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";


                src_string = `https://innovations.kh.ua/images/hexagone.php?l=${side}`;
            }

            
            if (v == 46){
                var side = parseInt(document.getElementById("side").value);
                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/hexagone.php?l=${side}`;
            }

            if (v == 47){
                var d1 = parseInt(document.getElementById("d1").value);
                var d2 = parseInt(document.getElementById("d2").value);



                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/rhombus.php?d1=${d1}&d2=${d2}`;
            }

            
            if (v == 48){

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/types.php?s=0&p=2&rh=1`;
            }

            
            if (v == 49){

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/types.php?s=0&p=2&rh=1`;
            }


            
            if (v == 50){

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/types.php?s=0&p=2&rh=1`;
            }

            
            if (v == 51){

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/types.php?s=0&p=2&rh=1`;
            }

            
            if (v == 52){
                var diameter = parseInt(document.getElementById("diameter").value);


                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/semi-circle.php?d=${diameter}`;
            }

            
            if (v == 53){
                var side1 = parseInt(document.getElementById("side1").value);
                var side2 = parseInt(document.getElementById("side2").value);
                var side3 = Math.sqrt(side1**2+side2**2);


                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/triangle.php?a=${side1}&b=${side2}&c=${side3}&sqb=2&sqa=2&sqb=1`;
            }

            
            if (v == 54){

                var side1 = parseInt(document.getElementById("side1").value);
                var side2 = parseInt(document.getElementById("side2").value);
                var side3 = Math.sqrt(side1**2+side2**2)


                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/triangle.php?a=${side1}&b=${side2}&c=${side3}&sqb=2&sqa=2&sqb=1`;
            }

            
            if (v == 55){
                var side = parseInt(document.getElementById("side").value);

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/rhombus.php?s=${side}`;
            }

            
            if (v == 56){



                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/kite.php?d1=10&d2=5&nt=1`;
            }

            if (v == 57){
                var d1 = parseInt(document.getElementById("d1").value);
                var d2 = parseInt(document.getElementById("d2").value);
                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/kite.php?d1=${d1}&d2=${d2}`;
            }

            
            if (v == 58){
                var side1 = parseInt(document.getElementById("side1").value);
                var side2 = parseInt(document.getElementById("side2").value);
                var side3 = parseInt(document.getElementById("side3").value);



                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/triangle_azimuth.php?a=${side1}&b=${side2}&c=${side3}&sqb=2&sqa=2&sqc=2`;
            }

            
            if (v == 59){

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/types.php?s=0&p=2&rh=1`;
            }

            if (v == 60){

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/types.php?s=0&p=2&rh=1`;
            }

            
            if (v == 61){
                var m = parseInt(document.getElementById("m").value);
                var a = parseInt(document.getElementById("a").value);
                var c = parseInt(document.getElementById("c").value);
                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/parabola.php?m=${m}&a=${a}&c=${c}`;
            }

            
            if (v == 62){

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/types.php?s=0&p=2&rh=1`;
            }

            
            if (v == 63){
                var b = parseInt(document.getElementById("b").value);
                var a = parseInt(document.getElementById("a").value);
                var c = parseInt(document.getElementById("c").value);
                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/hyperbola.php?a=${a}&b=${b}&c=${c}`;
            }

            
            if (v == 64){

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/types.php?s=0&p=2&rh=1`;
            }            



            pic.src =  src_string;
            mainPicture.appendChild(pic);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>