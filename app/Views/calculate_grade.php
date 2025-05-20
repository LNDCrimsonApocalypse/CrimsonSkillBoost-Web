<!DOCTYPE html>
<html>
<head>
    <title>Calculate Grade</title>
</head>
<body>
    <h2>Calculate Student Grade</h2>

    <form id="gradeForm">
        <label>ID Token:</label><br>
        <input type="text" id="idToken" required><br><br>

        <label>Student ID:</label><br>
        <input type="text" id="studentId" required><br><br>

        <label>Grades (comma separated):</label><br>
        <input type="text" id="grades" placeholder="e.g., 85,90,78" required><br><br>

        <button type="submit">Calculate Grade</button>
    </form>

    <p id="result"></p>

    <script>
        document.getElementById('gradeForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            const idToken = document.getElementById('idToken').value;
            const student_id = document.getElementById('studentId').value;
            const grades = document.getElementById('grades').value.split(',').map(Number);

            const response = await fetch('/grades/calculate', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ idToken, student_id, grades })
            });

            const result = await response.json();
            document.getElementById('result').innerText = JSON.stringify(result, null, 2);
        });
    </script>
</body>
</html>
