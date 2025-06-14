<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Montserrat', sans-serif;
      background: #ffeefb;
    }
    header {
      background: #fff;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 20px 40px;
      border-bottom: 1px solid #ccc;
    }
    .logo {
      display: flex;
      align-items: center;
    }
    .logo img {
      height: 40px;
      margin-right: 15px;
    }
    nav a {
      margin: 0 15px;
      font-weight: bold;
      text-decoration: none;
      color: black;
    }
    nav a.active {
      color: #8d5bf4;
    }
    .submenu {
      display: flex;
      justify-content: center;
      background: white;
      border-bottom: 1px solid #ccc;
    }
    .submenu a {
      padding: 15px 20px;
      text-decoration: none;
      color: gray;
      font-weight: 500;
    }
    .submenu a.active {
      color: black;
      border-bottom: 2px solid black;
    }
    .filters {
      display: flex;
      gap: 15px;
      margin: 20px;
      justify-content: center;
    }
    .filters select {
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    .cards {
      display: flex;
      gap: 20px;
      justify-content: center;
      margin: 20px;
    }
    .card {
      background: #e7eefe;
      padding: 20px;
      border-radius: 10px;
      text-align: center;
      width: 150px;
      border: 1px solid #b4b4f5;
    }
    .progress {
      margin: 30px;
    }
    .progress h2 {
      margin-left: 20px;
    }
    .progress-table {
      background: white;
      border-radius: 10px;
      margin: 0 20px;
      padding: 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    .student-info {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .student-info img {
      border-radius: 50%;
      width: 50px;
    }
    .status {
      color: green;
      font-size: 0.9rem;
    }
    .remarks {
      display: flex;
      gap: 20px;
      align-items: center;
    }
    .remarks .circle {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      border: 5px solid green;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
    }
    .remarks .btn {
      background: #8d5bf4;
      color: white;
      border: none;
      padding: 8px 12px;
      border-radius: 5px;
      cursor: pointer;
      font-size: 0.9rem;
    }
    .remarks .trash {
      cursor: pointer;
      font-size: 20px;
      color: #aaa;
    }
  </style>
</head>
<body>
  <header>
    <div class="logo">
      <img src="logo.png" alt="Logo">
      <nav>
        <a href="#">HOME</a>
        <a href="#" class="active">DASHBOARD</a>
        <a href="#">ABOUT</a>
        <a href="#">COURSES</a>
      </nav>
    </div>
    <div>
      <input type="text" placeholder="Search.." style="padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
    </div>
  </header>

  <div class="submenu">
    <a href="#">Topic</a>
    <a href="#">Task</a>
    <a href="#">Quiz</a>
    <a href="#" class="active">Student</a>
    <a href="#">Grade Settings</a>
  </div>

  <div class="filters">
    <select><option>All Courses</option></select>
    <select><option>Section</option></select>
    <select><option>Filtered by Date</option></select>
  </div>

  <div class="cards">
    <div class="card">
      <p>Accuracy</p>
      <p>0%</p>
      <small>QUIZ / TASK</small>
    </div>
    <div class="card">
      <p>Completion Rate</p>
      <p>0%</p>
      <small>QUIZ / TASK</small>
    </div>
    <div class="card">
      <p>Total Students</p>
      <h2>1,015</h2>
    </div>
  </div>

  <div class="progress">
    <h2>STUDENT PROGRESS</h2>
    <div class="progress-table">
      <div class="student-info">
        <img src="https://via.placeholder.com/50" alt="Student">
        <div>
          <strong>Juan Dela Cruz</strong><br>
          <span class="email">juandelacruz@umak.edu.ph</span><br>
          <span class="status">Active</span>
        </div>
      </div>
      <div>Last updated: 1hr ago</div>
      <div class="remarks">
        <div>
          <div class="circle">100%</div>
          <button class="btn">View Grade</button>
        </div>
        <div>
          <div class="circle" style="border-color: #f2b90c">60%</div>
          <button class="btn">View Grade</button>
        </div>
        <div class="trash">🗑️</div>
      </div>
    </div>
  </div>
</body>
</html>
