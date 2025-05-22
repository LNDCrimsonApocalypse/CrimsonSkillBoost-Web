<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Lesson - <?= esc($lesson['title']) ?></title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f9f9f9;
      margin: 0;
      padding: 40px;
    }

    .container {
      max-width: 800px;
      margin: auto;
      background: #fff;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    }

    h1 {
      margin-bottom: 20px;
      color: #333;
    }

    .lesson-content {
      font-size: 16px;
      line-height: 1.6;
      color: #444;
    }

    .back-btn {
      margin-top: 30px;
      display: inline-block;
      text-decoration: none;
      background-color: #e0e0e0;
      color: #333;
      padding: 10px 20px;
      border-radius: 6px;
      font-weight: 500;
    }

    .back-btn:hover {
      background-color: #d5d5d5;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1><?= esc($lesson['title']) ?></h1>

    <div class="lesson-content">
      <?= esc($lesson['content']) ?>
    </div>

    <a href="<?= base_url('dashboard') ?>" class="back-btn">← Back to Dashboard</a>
  </div>

</body>
</html>
