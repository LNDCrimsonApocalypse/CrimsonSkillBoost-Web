<!-- app/Views/upload_task.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Upload Task</title>
</head>
<body>

<h2>Upload Task</h2>

<p><strong>Year:</strong> <?= esc($taskData['year']) ?> | 
   <strong>Section:</strong> <?= esc($taskData['section']) ?> | 
   <strong>Semester:</strong> <?= esc($taskData['semester']) ?></p>

<form action="<?= base_url('task/upload') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <label for="task_name">Task Title:</label><br>
    <input type="text" id="task_name" name="task_name" value="<?= old('task_name') ?>" required><br><br>

    <label for="description">Description (optional):</label><br>
    <textarea id="description" name="description"><?= old('description') ?></textarea><br><br>

    <label for="import_content">Upload File:</label><br>
    <input type="file" id="import_content" name="import_content" accept=".pdf,.doc,.docx,.xlsx,.txt"><br><br>

    <button type="submit">Next</button>
</form>

</body>
</html>
