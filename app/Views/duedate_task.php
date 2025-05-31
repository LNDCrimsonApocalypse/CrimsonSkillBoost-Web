<!-- app/Views/duedate_task.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Set Due Date</title>
</head>
<body>

<h2>Set Due Date for: <?= esc($task['title']) ?></h2>

<?php if (isset($error)) : ?>
    <p style="color:red;"><?= esc($error) ?></p>
<?php endif; ?>

<?php if (isset($validation)) : ?>
    <ul style="color:red;">
        <?php foreach ($validation->getErrors() as $error) : ?>
            <li><?= esc($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form class="modal" action="<?= base_url('task/duedate/' . $task['id']) ?>" method="post">
    <?= csrf_field() ?>

    <label for="start_date">Start Date:</label><br>
    <input type="date" id="start_date" name="start_date" value="<?= old('start_date', $task['start_date']) ?>" required><br><br>

    <label for="end_date">End Date:</label><br>
    <input type="date" id="end_date" name="end_date" value="<?= old('end_date', $task['end_date']) ?>" required><br><br>

    <label for="allow_late">
        <input type="checkbox" id="allow_late" name="allow_late" value="1" <?= old('allow_late', $task['allow_late']) ? 'checked' : '' ?>>
        Allow Late Submission
    </label><br><br>

    <label for="attempts">Number of Attempts (optional):</label><br>
    <input type="number" id="attempts" name="attempts" min="1" value="<?= old('attempts', $task['attempts']) ?>"><br><br>

    <button type="submit">Save & Finish</button>
</form>

</body>
</html>
