<!DOCTYPE html>
<html>
<head>
    <title>Upload Lesson</title>
</head>
<body>
    <h2>Upload Lesson</h2>

    <form id="lessonForm">
        <label>ID Token:</label><br>
        <input type="text" id="idToken" required><br><br>

        <label>Title:</label><br>
        <input type="text" id="title" required><br><br>

        <label>Description:</label><br>
        <textarea id="description"></textarea><br><br>

        <label>Content:</label><br>
        <textarea id="content" required></textarea><br><br>

        <button type="submit">Upload Lesson</button>
    </form>

    <p id="result"></p>

    <script>
        document.getElementById('lessonForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            const idToken = document.getElementById('idToken').value;
            const title = document.getElementById('title').value;
            const description = document.getElementById('description').value;
            const content = document.getElementById('content').value;

            const response = await fetch('/auth/upload-lesson', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ idToken, title, description, content })
            });

            const result = await response.json();
            document.getElementById('result').innerText = JSON.stringify(result, null, 2);
        });
    </script>
</body>
</html>
