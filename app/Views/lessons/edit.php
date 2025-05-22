<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Lesson</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 40px;
      background-color: #f9f9f9;
    }

    .form-container {
      background-color: #fff;
      padding: 30px;
      max-width: 600px;
      margin: auto;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 20px;
    }

    label {
      font-weight: bold;
      display: block;
      margin-top: 15px;
      color: #444;
    }

    input[type="text"],
    textarea {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    button {
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #ff4081;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 16px;
    }

    button:hover {
      background-color: #e73370;
    }

    a.back-link {
      display: block;
      text-align: center;
      margin-top: 20px;
      color: #555;
      text-decoration: none;
    }

    a.back-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h2>Edit Lesson</h2>

    <form action="<?= base_url('lessons/update/' . $lesson['id']) ?>" method="post">
      <?= csrf_field() ?>

      <label for="title">Title:</label>
      <input type="text" name="title" id="title" value="<?= esc($lesson['title']) ?>" required>

      <label for="content">Content:</label>
      <textarea name="content" id="content" rows="10" required><?= esc($lesson['content']) ?></textarea>

      <button type="submit">Update Lesson</button>
    </form>

    <a class="back-link" href="<?= base_url('dashboard') ?>">← Back to Dashboard</a>
  </div>

</body>
</html>
