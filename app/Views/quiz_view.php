<!DOCTYPE html>
<html>
<head>
    <title>Quiz</title>
</head>
<body>
    <h1>Quiz Question</h1>
    <p><?= nl2br(esc($question)) ?></p>

    <form method="get">
        <input type="text" name="topic" placeholder="Enter topic" />
        <button type="submit">Get New Question</button>
    </form>
</body>
</html>
