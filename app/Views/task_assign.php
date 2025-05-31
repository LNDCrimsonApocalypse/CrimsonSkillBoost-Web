<!-- app/Views/task_assign.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Assign Task</title>
</head>
<body>

<h2>Assign Task</h2>

<?php if (isset($error)) : ?>
    <p style="color:red;"><?= esc($error) ?></p>
<?php endif; ?>

<form method="post" action="<?= base_url('task/assign') ?>">
    <?= csrf_field() ?>

    <label for="year">Year:</label>
    <input type="number" name="year" id="year" value="<?= old('year') ?>" required><br><br>

    <label for="section">Section:</label>
    <input type="text" name="section" id="section" value="<?= old('section') ?>" required><br><br>

    <label for="semester">Semester:</label>
    <select name="semester" id="semester" required>
        <option value="">-- Select Semester --</option>
        <option value="1" <?= old('semester') == 1 ? 'selected' : '' ?>>1</option>
        <option value="2" <?= old('semester') == 2 ? 'selected' : '' ?>>2</option>
        <option value="3" <?= old('semester') == 3 ? 'selected' : '' ?>>3</option>
    </select><br><br>

    <label>Select Courses:</label><br>
    <?php foreach ($courses as $course) : ?>
        <input type="checkbox" name="courses[]" id="course_<?= $course['id'] ?>" value="<?= $course['id'] ?>" 
            <?= (is_array(old('courses')) && in_array($course['id'], old('courses'))) ? 'checked' : '' ?>>
        <label for="course_<?= $course['id'] ?>"><?= esc($course['course_name']) ?></label><br>
    <?php endforeach; ?>

    <br>
    <button type="submit">Next</button>
</form>

</body>
</html>
