<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?= esc($lesson['title']) ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', Arial, sans-serif;
      margin: 0;
      background: #fdfbff;
    }
    .navbar {
      display: flex;
      align-items: center;
      padding: 15px 40px;
      background-color: white;
      border-bottom: 1px solid #ddd;
      position: relative;
      justify-content: center;
    }
    .navbar .logo {
      display: flex;
      align-items: center;
      gap: 15px;
      position: absolute;
      left: 40px;
      top: 50%;
      transform: translateY(-50%);
    }
    .navbar .nav-center {
      display: flex;
      align-items: center;
      gap: 30px;
      margin: 0 auto;
      position: relative;
      left: -60px;
    }
    .navbar .nav-center a {
      text-decoration: none;
      color: black;
      font-weight: 600;
      margin: 0 15px;
      font-size: 16px;
    }
    .navbar .menu {
      display: flex;
      align-items: center;
      position: absolute;
      right: 40px;
      top: 50%;
      transform: translateY(-50%);
    }
    .navbar img.user-icon {
      width: 35px;
      height: 35px;
      border-radius: 50%;
    }
    .navbar button {
      background-color: #f738d4;
      border: none;
      color: white;
      padding: 7px 14px;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
    }
    .dropbtn {
      text-decoration: none;
      font-weight: bold;
      font-size: 1.5rem;
      color: black;
      background: none;
      border: none;
      cursor: pointer;
      padding: 8px;
    }
    .dropdown {
      position: relative;
    }
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: white;
      min-width: 160px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.1);
      z-index: 1;
    }
    .dropdown-content a {
      padding: 12px 16px;
      display: block;
      color: black;
      text-decoration: none;
    }
    .dropdown-content a:hover {
      background-color: #eee;
    }
    .dropdown:hover .dropdown-content {
      display: block;
    }
    .arrow {
      font-size: 1.2rem;
      margin-left: 4px;
      vertical-align: middle;
    }
    li {
      font-weight: bold;
      list-style-type: none;
      padding: 0;
      margin: 0;
    }
    .tabbar {
      display: flex;
      gap: 36px;
      font-size: 1.1rem;
      font-weight: 500;
      margin-left: 40px;
    }
    .tabbar-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 40px;
      margin-top: 18px;
      border-bottom: 2px solid #fde8f0;
      background: #fff;
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
    .search-box {
      padding: 7px 14px;
      border-radius: 6px;
      border: 1.5px solid #ccc;
      font-size: 1rem;
      outline: none;
      margin-right: 0;
      width: 170px;
      box-sizing: border-box;
    }
    .title-bar {
      padding: 10px 0;
      background-color: #f3d3f5;
      font-size: 18px;
      font-weight: 600;
      text-align: center;
    }
    .content {
      display: flex;
      gap: 30px;
      padding: 30px 40px;
    }
    .left {
      width: 40%;
    }
    .section-title {
      font-size: 18px;
      font-weight: bold;
      background-color: #fff;
      padding: 12px;
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .left ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    .left li {
      background-color: #eef3fb;
      margin-bottom: 10px;
      padding: 12px 15px;
      border-radius: 8px;
      cursor: pointer;
      font-size: 14px;
    }
    .right {
      width: 60%;
      background-color: white;
      border-radius: 10px;
      padding: 25px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      font-size: 14px;
      line-height: 1.6;
    }
    .search-bar {
      display: flex;
      align-items: center;
      margin-left: auto;
      margin-right: 20px;
    }
    .search-bar input {
      padding: 7px 12px;
      border-radius: 8px;
      border: 1px solid #ccc;
      margin-right: 10px;
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
      <a href="<?= base_url('homepage') ?>">HOME</a>
      <a href="<?= base_url('dashboard') ?>">DASHBOARD</a>
      <a href="<?= base_url('aboutus') ?>">ABOUT</a>
     <li class="dropdown">
      <span>COURSES <span class="arrow">&#9660;</span></span>
      <div class="dropdown-content">
        <select id="course-select">
          <option value="web">ALL COURSES </option>
          <option value="data">MY COURSES </option>
         
        </select>
      </div>
    </li>
    </div>

    <div class="navbar-right">
      <input type="text" placeholder="Search.." />
      <img src="imgs/notifications.png" alt="Notifications" class="icon" />
      <img src="imgs/profile.png" alt="profile" class="profile" />
      <button id="signOutButton" class="logout-btn">Sign Out</button>
    </div>
  </div>

  <!-- Tabs -->
  <div class="tabbar">
    <span>Topic</span>
    <span>Task</span>
    <span class="active">Lesson</span>
    <span>Student</span>
  </div>

  <!-- Page Title -->
  <div class="title-bar">
    <?= esc($lesson['title']) ?>
  </div>

  <!-- Main Content -->
  <div class="content">
    <div class="left">
      <div class="section-title">📘 Lesson Info</div>
      <ul>
        <li><strong>Course ID:</strong> <?= esc($lesson['course_id']) ?></li>
        <?php if (!empty($lesson['created_at'])): ?>
          <li><strong>Created At:</strong> <?= esc($lesson['created_at']) ?></li>
        <?php endif; ?>
        <?php if (!empty($lesson['description'])): ?>
          <li><strong>Description:</strong> <?= esc($lesson['description']) ?></li>
        <?php endif; ?>
      </ul>
    </div>
    <div class="right">
      <?= nl2br(esc($lesson['content'])) ?>
    </div>
  </div>

</body>
</html>
