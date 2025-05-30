<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add a New Task</title>
  <!-- Add Google Fonts link for Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', Arial, sans-serif;
      margin: 0;
      background-color: #f2eaf2;
    }

    .modal {
      width: 800px;
      margin: 50px auto;
      background: white;
      border-radius: 8px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      overflow: hidden;
    }

    .modal-header {
      padding: 20px;
      border-bottom: 1px solid #ddd;
      text-align: center;
      font-weight: bold;
      font-size: 18px;
      color: #555;
      position: relative;
    }

    .close-btn {
      position: absolute;
      right: 20px;
      top: 20px;
      font-size: 20px;
      color: #888;
      cursor: pointer;
    }

    .modal-body {
      padding: 0;
    }

    .section-title {
      font-weight: bold;
      padding: 15px 20px;
      font-size: 16px;
    }

    .content-wrapper {
      display: flex;
      border-top: 1px solid #ccc;
    }

    .column {
      width: 50%;
      padding: 20px;
      box-sizing: border-box;
    }

    .column h3 {
      margin-top: 0;
      font-size: 14px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .subheader {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #ecd2ed;
      padding: 10px;
      font-weight: bold;
      font-size: 14px;
    }

    .subheader span {
      color: #555;
    }

    .option-group {
      padding: 10px;
    }

    .option-group label {
      display: flex;
      align-items: center;
      margin-bottom: 8px;
      font-size: 14px;
      color: #333;
    }

    .option-group input[type="radio"] {
      margin-right: 10px;
    }

    .select-all {
      color: #3a6ee8;
      font-size: 12px;
      cursor: pointer;
    }

    .scroll {
      max-height: 280px;
      overflow-y: auto;
    }

    /* Scrollbar styling */
    .scroll::-webkit-scrollbar {
      width: 6px;
    }

    .scroll::-webkit-scrollbar-thumb {
      background: #b79fc9;
      border-radius: 4px;
    }

    .scroll::-webkit-scrollbar-track {
      background: transparent;
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
  
  <div class="modal">
    <form action="<?= base_url('task/uploadTask') ?>" method="post">
      <div class="modal-header">
        ADD A NEW TASK
        <span class="close-btn">×</span>
      </div>
      <div class="section-title">● Select Classes and Courses</div>
      <div class="content-wrapper">
        <!-- Classes Column -->
        <div class="column">
          <div class="subheader">
            <span>Year and Section</span>
          </div>
          <div class="option-group">
            <label><input type="radio" name="year" value="1st Year" /> 1st Year</label>
            <label><input type="radio" name="year" value="2nd Year" /> 2nd Year</label>
            <label><input type="radio" name="year" value="3rd Year" checked /> 3rd Year</label>
            <label><input type="radio" name="year" value="4th Year" /> 4th Year</label>
          </div>
          <div class="option-group">
            <label><input type="radio" name="section" value="ACSAD" /> ACSAD</label>
            <label><input type="radio" name="section" value="BCSAD" checked /> BCSAD</label>
            <label><input type="radio" name="section" value="CCSAD" /> CCSAD</label>
            <label><input type="radio" name="section" value="DCSAD" /> DCSAD</label>
          </div>
        </div>

        <!-- Courses Column -->
        <div class="column">
          <div class="subheader">
            <span>Courses</span>
          </div>
          <div class="option-group scroll">
            <label><input type="radio" name="semester" value="First Semester" /> First Semester</label>
            <label><input type="radio" name="semester" value="Second Semester" checked /> Second Semester</label>
            <br>
            <?php if (!empty($courses)): ?>
              <?php foreach ($courses as $course): ?>
                <label>
                  <input type="checkbox" name="courses[]" value="<?= esc($course['id']) ?>" />
                  <?= esc($course['course_name']) ?>
                </label>
              <?php endforeach; ?>
            <?php else: ?>
              <div>No courses found.</div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div style="padding: 20px; text-align: right;">
        <button type="submit" style="background: #f53ea2; color: #fff; border: none; border-radius: 8px; padding: 10px 24px; font-weight: bold; cursor: pointer;">Next</button>
      </div>
    </form>
  </div>
</body>
</html>