<!-- app/Views/courses/edit.php -->
<h2>Edit Course</h2>
<form action="<?= base_url('course/update/' . $course['id']) ?>" method="post">
  <?= csrf_field() ?>
  <label>Course Name:</label>
  <input type="text" name="course_name" value="<?= esc($course['course_name']) ?>" required>
  <button type="submit">Update</button>
</form>
