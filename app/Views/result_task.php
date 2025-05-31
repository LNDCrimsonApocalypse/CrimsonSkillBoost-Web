<!-- app/Views/result_task.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Task Summary</title>
</head>
<body>

<h2>Task Summary: <?= esc($task['title']) ?></h2>

<p><strong>Description:</strong> <?= esc($task['description']) ?: 'N/A' ?></p>
<p><strong>Year:</strong> <?= esc($task['year']) ?></p>
<p><strong>Section:</strong> <?= esc($task['section']) ?></p>
<p><strong>Semester:</strong> <?= esc($task['semester']) ?></p>

<?php if (!empty($courses)) : ?>
    <p><strong>Courses:</strong></p>
    <ul>
        <?php foreach ($courses as $course) : ?>
            <li><?= esc($course['course_name']) ?></li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p><strong>Courses:</strong> None</p>
<?php endif; ?>

<?php if (!empty($task['file_path'])) : ?>
    <p><strong>File:</strong> 
        <a href="<?= base_url('task/download/' . $task['id']) ?>">
            Download Task File
        </a>
    </p>
<?php endif; ?>

<p><strong>Start Date:</strong> <?= esc($task['start_date']) ?: 'Not Set' ?></p>
<p><strong>End Date:</strong> <?= esc($task['end_date']) ?: 'Not Set' ?></p>
<p><strong>Allow Late:</strong> <?= $task['allow_late'] ? 'Yes' : 'No' ?></p>
<p><strong>Attempts Allowed:</strong> <?= $task['attempts'] ?? 'Unlimited' ?></p>

<p><a href="<?= site_url('task/assign') ?>">Create New Task</a></p>

</body>
</html>
