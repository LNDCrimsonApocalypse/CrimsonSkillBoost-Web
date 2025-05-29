<!DOCTYPE html>
<html>
<head>
    <title>Add Question</title>
</head>
<body>
    <h2>Add Question</h2>
    <form method="post" action="<?= site_url('quiz/addQuestion/' . $quiz_id) ?>">
        <label>Question:</label>
        <input type="text" name="question_text" required><br>
        <label>Options:</label><br>
        <input type="text" name="options[]" required> <input type="radio" name="correct_option" value="0" required> Correct<br>
        <input type="text" name="options[]" required> <input type="radio" name="correct_option" value="1"> Correct<br>
        <input type="text" name="options[]" required> <input type="radio" name="correct_option" value="2"> Correct<br>
        <input type="text" name="options[]" required> <input type="radio" name="correct_option" value="3"> Correct<br>
        <button type="submit">Add Question</button>
    </form>
</body>
</html>
