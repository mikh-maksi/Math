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
        <h2>Triangles +</h2>
        <select name="task" id="type">
            <option value="0">Chose option</option>
            <option value="1">Kindergarten. Figures</option>
            <option value="2">Grade 1. Shape type</option>
            <option value="3">Grade 2. Difference of triangles</option>
            <option value="4">Grade 3a. Triangle type</option>
            <option value="5">Grade 3b. Perimeter</option>
            <option value="6">Grade 4a. Area</option>
            <option value="7">Grade 4b. Sides</option>
            <option value="8">Grade 5a. Third angle</option>
            <option value="9">Grade 5b. Right triangle</option>
            <option value="10">Grade 6a. Coordinates</option>
            <option value="11">Grade 6b. Area</option>
            <option value="12">Grade 6c. Third angle</option>
            <option value="13">Grade 7a. Scale factor</option>
            <option value="14">Grade 7b. Sides ratio</option>
            <option value="15">Grade 8a. Right triangle. Leg</option>
            <option value="16">Grade 8b. Congruent triangle.</option>
            <option value="18">Addition. Circles.</option>
            <option value="19">Addition. Marges</option>
            <option value="20">Addition. Bubbles</option>
            <option value="21">Addition. Rectangle</option>
            <option value="22">Addition. Rectangles</option>
            <option value="17">Addition. Qaudrangle.</option>
        </select>
        <div id="text"></div>
        <div id="forms"></div>
        <div id="button"><button id ="btn" class = "hdn">Generate</button></div>
        <div id="picture"></div>
        </div>
    <script>
        var text_array = [];
        text_array.push(" Start text");

        text_array.push(" Which shape has three sides? Choose from this group: circle, square, triangle.");
        text_array.push(" Is this triangle an equilateral, isosceles, or scalene triangle? (Triangle shown with sides 3 cm, 3 cm, and 3 cm)");
        text_array.push("  Look at these two triangles. How are they different? (One triangle shown with all sides equal, another with two sides equal).");
        text_array.push("  How many sides does a triangle have? What do you call a triangle with one angle bigger than 90 degrees?");
        text_array.push(" A triangle has sides of lengths 5 meters, 6 meters, and 7 meters. What is its perimeter?");
        text_array.push(" A triangle has a base of 8 cm and a height of 3 cm. What is its area?");
        text_array.push(" Here is a triangle with angles of 45 degrees, 45 degrees, and 90 degrees. What type of triangle is it based on its angles? What about its sides?");
        text_array.push("  If one angle in a triangle is 70 degrees and the second angle is 30 degrees, what is the third angle?");
        text_array.push(" A triangle has sides of 5 cm, 12 cm, and 13 cm. Is it a right triangle? Why?");
        text_array.push(" On a coordinate grid, plot a triangle with vertices at (1,1), (4,1), and (1,3). What kind of triangle is it?");
        text_array.push("  Find the area of a triangle with a base of 10 units and a height of 5 units.");
        text_array.push("  A triangle has three angles that add up to 180 degrees. If two of the angles are 50 degrees and 60 degrees, what is the third angle?");
        text_array.push(" A triangle has sides measuring 5 cm, and a similar triangle has corresponding sides measuring 10 cm. What is the scale factor between them?");
        text_array.push("  A triangle has sides in the ratio 3:4:5. If the shortest side is 6 cm, find the lengths of the other two sides.");
        text_array.push(" In a right triangle, if one leg measures 8 units and the hypotenuse measures 10 units, what is the length of the other leg?");
        text_array.push(" Are these two triangles congruent? Triangle 1 has sides 3 cm, 4 cm, 5 cm and Triangle 2 has sides 6 cm, 8 cm, 10 cm.");
        text_array.push(" Custom quadrangle");
        text_array.push(" Filling Circles");
        text_array.push(" Circles and pluses");
        text_array.push(" Bubbles");
        text_array.push(" Rectangle. Simple example.");
        text_array.push(" Rectangles. Simple example.");

        var forms_array = [];
        forms_array.push(" <input id = 'circle'>");
        forms_array.push("Circle order: <input id = 'circle' class = 'l20' value = '0'>  Square order: <input id = 'square' class = 'l20' value = '1'> Triangle order: <input id = 'triangle' class = 'l20' value = '2'>");
        forms_array.push("Triangle. Side a: <input id = 'side_a' class = 'l20' value = '3'>  Side b: <input id = 'side_b' class = 'l20' value = '3'> Side c: <input id = 'side_c' class = 'l20' value = '3'>");
        forms_array.push("");
        forms_array.push("Triangle. Angle alfa: <input id = 'alfa' class = 'l50' value = '110'>");
        forms_array.push("Triangle. Side a: <input id = 'side_a' class = 'l20' value = '5'>  Side b: <input id = 'side_b' class = 'l20' value = '6'> Side c: <input id = 'side_c' class = 'l20' value = '7'>");
        forms_array.push("Triangle. Base: <input id = 'base' class = 'l30' value = '10'>  Height: <input id = 'height' class = 'l30' value = '5'>");
        forms_array.push("Triangle. Angle alfa: <input id = 'alfa' class = 'l50' value = '90'> Angle beta: <input id = 'beta' class = 'l50' value = '45'> Angle gama: <input id = 'gamma' class = 'l50' value = '45'>");
        forms_array.push("Triangle. First angle:  <input id = 'beta' class = 'l50' value = '70'> Second angle: <input id = 'gamma' class = 'l50' value = '30'>");
        forms_array.push("Triangle. Side a: <input id = 'side_a' class = 'l30' value = '5'>  Side b: <input id = 'side_b' class = 'l30' value = '12'> Side c: <input id = 'side_c' class = 'l30' value = '13'>");
        forms_array.push("Triangle. Point A: (<input id = 'x1' class = 'l20' value = '1'>;<input id = 'y1' class = 'l20' value = '1'>)  Point B: (<input id = 'x2' class = 'l20' value = '4'>;<input id = 'y2' class = 'l20' value = '1'>) Point C: (<input id = 'x3' class = 'l20' value = '1'>;<input id = 'y3' class = 'l20' value = '3'>)");
        forms_array.push("Triangle. Base: <input id = 'base' class = 'l30' value = '10'>  Height: <input id = 'height' class = 'l30' value = '5'>");
        forms_array.push("Triangle. First angle: <input id = 'gamma' class = 'l50' value = '50'> Second angle: <input id = 'beta' class = 'l50' value = '60'>");
        forms_array.push("<b></b>");
        forms_array.push("Triangle. Sides ratio <input id = 'r1' class = 'l20' value = '3'>:<input id = 'r2' class = 'l20' value = '4'>:<input id = 'r3' class = 'l20' value = '5'>. Shortest side is <input id = 'side_a' class = 'l20' value = '6'>)");
        forms_array.push("Right triangle. Leg 1: <input id = 'leg1' class = 'l30' value = '8'>, hypotenuse: <input id = 'hyp' class = 'l30' value = '10'>");
        forms_array.push("");
        forms_array.push("");
        forms_array.push("N: <input id = 'n' class = 'l30' value = '4'>, All: <input id = 'all' class = 'l30' value = '10'>");
        forms_array.push("N: <input id = 'n' class = 'l30' value = '4'>, All: <input id = 'all' class = 'l30' value = '10'>");
        forms_array.push(`N: <input id = 'n' class = 'l30' value = '8'>, Text: <input id = 'text_out' class = 'l500' value = 'Represent the prime factors of the number "C36"'>`);
        forms_array.push(`Length: <input id = 'a' class = 'l30' value = '30'>, Height: <input id = 'b' class = 'l30' value = '40'>`);
        forms_array.push(`<b>Rectangle 1.</b> Length: <input id = 'a' class = 'l30' value = '24'>, Height: <input id = 'b' class = 'l30' value = '20'> <b>Rectangle 2.</b> Length: <input id = 'a_2' class = 'l30' value = '20'>, Height: <input id = 'b_2' class = 'l30' value = '40'>`);


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

                src_string = `https://innovations.kh.ua/images/triangle.php?a=${side_a.value}&b=${side_b.value}&c=${side_c.value}`;
            }

            if (v == 3){
               
                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/triangles_azimuth.php?alfa=60&beta=60&gamma=60&angl=1&nt=1&alfa_2=80&beta_2=50&gamma_2=50&angl_2=1&nt_2=1`;
            }
            if (v == 4){
                var alfa = parseInt(document.getElementById("alfa").value);


                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/triangle_azimuth.php?alfa=${alfa}&angl=1&nt=1`;
   
            }
            if (v == 5){
                var side_a = document.getElementById("side_a");
                var side_b = document.getElementById("side_b");
                var side_c = document.getElementById("side_c");

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/triangle.php?a=${side_a.value}&b=${side_b.value}&c=${side_c.value}&sqa=2&sqb=2`;
            }
            if (v == 6){
                var base = document.getElementById("base");
                var height = document.getElementById("height");


                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/triangle.php?base=${base.value}&h=${height.value}`;
            }
            if (v == 7){
                var alfa = parseInt(document.getElementById("alfa").value);
                var beta = parseInt(document.getElementById("beta").value);
                var gamma = parseInt(document.getElementById("gamma").value);


                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/triangle_azimuth.php?alfa=${alfa}&beta=${beta}&gamma=${gamma}&angl=1&nt=1`;
            }
   

        if (v == 8){

                var beta = parseInt(document.getElementById("beta").value);
                var gamma = parseInt(document.getElementById("gamma").value);
                var alfa = 180-beta-gamma;


                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/triangle_azimuth.php?alfa=${alfa}&beta=${beta}&gamma=${gamma}&angl=1&nt=1&fa=1&cq=1`;
            }
            if (v == 9){
                var side_a = document.getElementById("side_a");
                var side_b = document.getElementById("side_b");
                var side_c = document.getElementById("side_c");

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/triangle.php?a=${side_a.value}&b=${side_b.value}&c=${side_c.value}`;
            }
            if (v == 10){
                var x1 = parseInt(document.getElementById("x1").value);
                var x2 = parseInt(document.getElementById("x2").value);
                var x3 = parseInt(document.getElementById("x3").value);
                var y1 = parseInt(document.getElementById("y1").value);
                var y2 = parseInt(document.getElementById("y2").value);
                var y3 = parseInt(document.getElementById("y3").value);


                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/triangle.php?x1=${x1*100}&y1=${y1*100}&x2=${x2*100}&y2=${y1*100}&x3=${x3*100}&y3=${y3*100}`;
            }
            if (v == 11){
                var base = document.getElementById("base");
                var height = document.getElementById("height");


                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/triangle.php?base=${base.value}&h=${height.value}`;
            }
            if (v == 12){

                var beta = parseInt(document.getElementById("beta").value);
                var gamma = parseInt(document.getElementById("gamma").value);
                var alfa = 180-beta-gamma;


                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/triangle_azimuth.php?alfa=${alfa}&beta=${beta}&gamma=${gamma}&angl=1&nt=1&fa=1&cq=1`;
                }
            if (v == 13){
                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/triangles_azimuth.php?a=6&b=5&c=5&&a_2=12&b_2=10&c_2=10`;
            }
            if (v == 14){
                var a = parseInt(document.getElementById("side_a").value);
                var r1 = parseInt(document.getElementById("r1").value);
                var r2 = parseInt(document.getElementById("r2").value);
                var r3 = parseInt(document.getElementById("r3").value);

                var b = (a/r1)*r2;
                var c = (a/r1)*r3;



                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/triangle.php?a=${a}&b=${b}&c=${c}`;
            }
            if (v == 15){
                var leg1 = parseInt(document.getElementById("leg1").value);
                var hyp = parseInt(document.getElementById("hyp").value);
                var leg2 = Math.sqrt(hyp**2-leg1**2);

                var b = (a/r1)*r2;
                var c = (a/r1)*r3;



                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/triangle.php?a=${leg2}&b=${leg1}&c=${hyp}&sqb=2&sqa=2&sqc=1`;
            }

            if (v == 16){
                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/triangles_azimuth.php?a=3&b=4&c=5&&a_2=6&b_2=8&c_2=10`;
            }
            if (v == 17){
                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/quadrangle.php?x1=60&y1=20&x2=300&y2=150&x3=380&y3=350&x4=50&y4=380`;
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
                var n = parseInt(document.getElementById("n").value);
                var all = document.getElementById("all").value;

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/merge.php?in=${n}&all=${all}`;
            }
            if (v == 20){
                var n = parseInt(document.getElementById("n").value);
                var text_out = document.getElementById("text_out").value;


                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/buble_class_im.php?n=${n}&text=${text_out}`;
            }
            if (v == 21){
                var a = parseInt(document.getElementById("a").value);
                var b = document.getElementById("b").value;


                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/poly_grid.php?x1=0&y1=0&x2=${a}&y2=${b}`;
            }
            if (v == 22){
                var a = parseInt(document.getElementById("a").value);
                var b = document.getElementById("b").value;
                var a_2 = parseInt(document.getElementById("a_2").value);
                var b_2 = document.getElementById("b_2").value;

                mainPicture.innerHTML = '';
                var pic = document.createElement("img");
                pic.id = "mainImg";

                src_string = `https://innovations.kh.ua/images/poly_grid_class.php?x1=0&y1=0&x2=${a}&y2=${b}&x1_2=0&y1_2=0&x2_2=${a_2}&y2_2=${b_2}`;
            }
            pic.src =  src_string;
            mainPicture.appendChild(pic);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>