<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= esc($course['title']) ?> - Course Info</title>
  <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>"> <!-- optional -->
</head>
<body>
  <div class="course-detail">
    <h1><?= esc($course['title']) ?></h1>
    <h3><?= esc($course['subtitle']) ?></h3>
    <img src="<?= base_url('imgs/' . $course['image']) ?>" alt="<?= esc($course['title']) ?>" style="width:300px;">
    <p><?= esc($course['description']) ?></p>
    <p><strong>Students:</strong> <?= esc($course['students']) ?></p>
  </div>
</body>
</html>
