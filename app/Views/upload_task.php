<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Content Modal</title>
  <!-- Add Google Fonts link for Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #f2e6ee;
    }

    /* Modal */
    .modal {
      background-color: white;
      width: 700px;
      margin: 50px auto;
      padding: 30px;
      border: 1px solid #e1c9df;
      border-radius: 5px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }

    .modal h2 {
      margin-top: 0;
      font-size: 20px;
      font-weight: 700;
    }

    .modal .close {
      float: right;
      font-weight: bold;
      cursor: pointer;
    }

    .modal .clear {
      float: right;
      margin-right: 25px;
      font-size: 14px;
      cursor: pointer;
      color: #555;
    }

    .modal input[type="text"] {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .import-section {
      border: 2px dashed #d2d2ff;
      padding: 30px;
      background-color: #eef4fb;
      text-align: center;
      border-radius: 10px;
      position: relative;
    }

    .import-section img {
      width: 150px;
      margin-bottom: 10px;
    }

    .import-section p {
      margin: 5px 0;
      font-weight: 500;
    }

    .import-section button {
      background-color: #eb4bb3;
      color: white;
      border: none;
      padding: 10px 20px;
      margin-top: 10px;
      font-weight: 600;
      border-radius: 6px;
      cursor: pointer;
    }

    .add-btn {
      margin-top: 30px;
      width: 100%;
      background: linear-gradient(to right, #f94fa4, #a48bd7);
      color: white;
      padding: 12px;
      border: none;
      border-radius: 20px;
      font-weight: 700;
      font-size: 16px;
      cursor: pointer;
    }

    /* Navbar */
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 30px;
      background-color: white;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      position: sticky;
      top: 0;
      z-index: 10;
    }

    .navbar-logo {
      flex: 1;
      display: flex;
      align-items: center;
    }

    .navbar-logo .logo {
      width: 40px;
    }

    .navbar-center {
      flex: 2;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 30px;
    }

    .navbar-center a {
      text-decoration: none;
      color: black;
      font-weight: bold;
      margin: 0 10px;
    }

    .navbar-center .dropdown {
      position: relative;
    }

    .navbar-center .dropdown::after {
      content: "▾";
      font-size: 10px;
      margin-left: 5px;
    }

    .navbar-right {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: flex-end;
    }

    .navbar-right input[type="text"] {
      padding: 6px 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      margin-right: 15px;
    }

    .navbar-right img.profile {
      width: 35px;
      height: 35px;
      border-radius: 50%;
      object-fit: cover;
    }

    .tabbar {
      display: flex;
      justify-content: start;
      gap: 30px;
      padding: 10px 50px;
      background-color: white;
      border-bottom: 1px solid #ddd;
    }

    .tabbar span {
      font-weight: 500;
      color: gray;
      cursor: pointer;
    }

    .tabbar .active {
      color: black;
      font-weight: bold;
      border-bottom: 3px solid black;
      padding-bottom: 5px;
    }
  </style>
</head>
<body>

  <div class="navbar">
    <div class="navbar-logo">
      <img src="https://i.imgur.com/1W7sOom.png" alt="logo" class="logo"/>
    </div>
    <div class="navbar-center">
      <a href="#">HOME</a>
      <a href="#">DASHBOARD</a>
      <a href="#">ABOUT</a>
      <a href="#" class="dropdown">COURSES</a>
      <div class="icon">🔔</div>
    </div>
    <div class="navbar-right">
      <input type="text" placeholder="Search.." />
      <img src="https://i.imgur.com/uIgDDDd.png" alt="profile" class="profile"/>
    </div>
  </div>

  <!-- Tab Bar -->
  <div class="tabbar">
    <span>Course</span>
    <span class="active">Task</span>
    <span>Quiz</span>
    <span>Student</span>
  </div>

  <!-- Paayos nlang ung design para matchy sa figma -->
  <div class="modal">
    <span class="close">✕</span>
    <span class="clear">Clear all</span>
    <h2>Add Content</h2>
    <form action="<?= base_url('task/upload') ?>" method="post" enctype="multipart/form-data">
      <label>File Name:</label>
      <input type="text" name="task_name" placeholder="Enter file name" required>
      <div class="import-section">
        <img src="https://via.placeholder.com/150x100.png?text=Upload+Preview" alt="Upload Preview" id="upload-preview">
        <p><strong>Import your own content</strong></p>
        <p>Import content and get AI generated questions</p>
        <input type="file" name="import_content" id="import-content" style="display:none;" accept=".pdf,.doc,.docx,.txt">
        <button type="button" id="import-btn">Import content</button>
        <span id="file-name" style="display:block; margin-top:10px; color:#555; font-size:14px;"></span>
      </div>
      <button class="add-btn" type="submit">ADD</button>
    </form>
  </div> 

  <script>
    document.getElementById('import-btn').addEventListener('click', function(e) {
      document.getElementById('import-content').click();
    });

    document.getElementById('import-content').addEventListener('change', function(e) {
      const fileInput = e.target;
      const fileNameSpan = document.getElementById('file-name');
      if (fileInput.files.length > 0) {
        fileNameSpan.textContent = "Selected: " + fileInput.files[0].name;
      } else {
        fileNameSpan.textContent = "";
      }
    });
  </script>
</body>
</html>