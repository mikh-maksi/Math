<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student Task</title>
</head>
<body>
    <h1>Update Student Task</h1>
    <form id="updateForm">
        <label for="student_id">Student ID:</label>
        <input type="number" id="student_id" name="student_id" required>
        <br><br>
        
        <label for="task_id">Task ID:</label>
        <input type="number" id="task_id" name="task_id" required>
        <br><br>
        
        <label for="mark">Mark:</label>
        <input type="number" id="mark" name="mark" required>
        <br><br>
        
        <button type="submit">Update</button>
    </form>

    <div id="response" style="margin-top: 20px;"></div>

    <script>
        function ftch(url){
            fetch(url, {
                method: 'GET'
            })
            .then(response => response.json())
            .then(data => {
                const responseDiv = document.getElementById('response');
                if (data.message) {
                    responseDiv.innerHTML = `<p style="color: green;">${data.message}</p>`;
                } else if (data.error) {
                    responseDiv.innerHTML = `<p style="color: red;">${data.error}</p>`;
                }
            })
            .catch(error => {
                document.getElementById('response').innerHTML = `<p style="color: red;">Error: ${error.message}</p>`;
            });

        }

        document.getElementById('updateForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Запобігти перезавантаженню сторінки
            
            const student_id = document.getElementById('student_id').value;
            const task_id = document.getElementById('task_id').value;
            const mark = document.getElementById('mark').value;
            
            const url = `https://math.kh.ua/student/change_mark.php?student_id=${student_id}&task_id=${task_id}&mark=${mark}`;
            ftch(url);
        });
           


    </script>
</body>
</html>
