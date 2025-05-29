<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Quiz</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #fff1f6;
    }

    .navbar, .tabbar, .main-container, .question-box, .options-container, .save-btn {
      font-family: 'Poppins', sans-serif;
    }

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

    .navbar-logo .logo { width: 40px; }

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
    }

    .navbar-right {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: flex-end;
      gap: 15px;
    }

    .navbar-right input[type="text"] {
      padding: 6px 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      width: 140px;
    }

    .navbar-right img.profile {
      width: 35px;
      height: 35px;
      border-radius: 50%;
      object-fit: cover;
      cursor: pointer;
    }

    .navbar-right img.icon {
      width: 25px;
      height: 25px;
      cursor: pointer;
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
      cursor: pointer;
    }

    .tabbar .active {
      color: black;
      font-weight: bold;
      border-bottom: 3px solid black;
      padding-bottom: 5px;
    }

    .main-container {
      padding: 40px;
    }

    .question-box {
      background-color: #fff;
      border-radius: 10px;
      padding: 30px;
      font-size: 24px;
      color: #555;
      text-align: center;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
      margin-bottom: 30px;
    }

    .options-container {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
      justify-content: center;
    }

    .option {
      width: 200px;
      height: 150px;
      border-radius: 10px;
      color: white;
      font-size: 18px;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      position: relative;
    }

    .option input[type="radio"] {
      position: absolute;
      bottom: 10px;
      right: 10px;
      transform: scale(1.2);
    }

    .purple { background-color: #6a1b9a; }
    .blue { background-color: #90a4fc; }
    .pink { background-color: #f94da4; }
    .red { background-color: #ef5350; }

    .save-btn {
      display: flex;
      justify-content: center;
      margin-top: 40px;
    }

    .save-btn button {
      background: linear-gradient(to right, #d446a0, #a67efb);
      color: white;
      border: none;
      padding: 12px 25px;
      border-radius: 8px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
    }

    form {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }

    form input[type="text"] {
      padding: 10px;
      width: 250px;
      border: 1px solid #ccc;
      border-radius: 6px;
      margin-right: 10px;
    }

    form button {
      padding: 10px 20px;
      background-color: #e548af;
      color: white;
      border: none;
      border-radius: 6px;
      font-weight: bold;
      cursor: pointer;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <div class="navbar">
    <div class="navbar-logo">
      <img src="imgs/Logo.png" alt="logo" class="logo"/>
    </div>
    <div class="navbar-center">
      <a href="#">HOME</a>
      <a href="#">DASHBOARD</a>
      <a href="#">ABOUT</a>
      <span class="dropdown">
        <span>COURSES <span class="arrow">&#9660;</span></span>
        <div class="dropdown-content">
          <select id="course-select">
            <option value="web">ALL COURSES</option>
            <option value="data">MY COURSES</option>
          </select>
        </div>
      </span>
    </div>
    <div class="navbar-right">
      <input type="text" placeholder="Search.." />
      <img src="imgs/notifications.png" alt="Notifications" class="icon" />
      <img src="imgs/profile.png" alt="profile" class="profile" />
    </div>
  </div>

  <!-- Tab Bar -->
  <div class="tabbar">
    <span>Topic</span>
    <span>Task</span>
    <span class="active">Quiz</span>
    <span>Student</span>
  </div>

  <!-- Main Quiz Content -->
  <div class="main-container">
    <div class="question-box">
      <?= nl2br(esc($question)) ?>
    </div>

    <form method="get">
      <input type="text" name="topic" placeholder="Enter topic" />
      <button type="submit">Get New Question</button>
    </form>
  </div>

</body>
</html>
