<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Computer Programming Topics</title>
  <!-- Add Google Fonts link for Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', Arial, sans-serif;
      background-color: #fdeef4;
    }
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 30px;
      background-color: white;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
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
      margin: 0 15px;
      text-decoration: none;
      color: black;
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
    .dropdown .arrow {
      font-size: 1rem;
      margin-left: 4px;
    }
    li{
      font-weight: bold;
      list-style-type: none;
      padding: 0;
      margin: 0;
    }
    .navbar-right {
      display: flex;
      align-items: center;
      gap: 14px;
    }
    .navbar-right input[type="text"] {
      padding: 6px 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      margin-right: 15px;
    }
    .navbar-right button {
      background: #ff3bbd;
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: bold;
      padding: 8px 22px;
      cursor: pointer;
      transition: background 0.2s;
      margin-right: 8px;
    }
    .navbar-right button {
      background: #d12c5c;
    }
    .navbar-right img.profile {
      width: 35px;
      height: 35px;
      border-radius: 50%;
      object-fit: cover;
    }
    .tabbar {
      display: flex;
      gap: 36px;
      font-size: 1.1rem;
      font-weight: 500;
      margin-left: 40px;
    }
    .tabbar-row{
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding:  40px;
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
    .section-title {
      background-color: #e8c6eb;
      text-align: center;
      font-size: 18px;
      font-weight: bold;
      padding: 10px 0;
      margin-bottom: 30px;
    }
    .cards {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      gap: 20px;
      padding: 0 20px 40px;
    }
    .card {
      background-color: white;
      width: 600px;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      overflow: hidden;
      border-top: 6px solid transparent;
      border-image: linear-gradient(to right, #f8228a, #ad9bdc);
      border-image-slice: 1;
    }
    .card-content {
      padding: 20px;
    }
    .card-title {
      font-size: 18px;
      font-weight: bold;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .card-title i {
      font-style: normal;
      font-weight: normal;
      font-size: 14px;
      margin-left: 10px;
      cursor: pointer;
    }
    .card-desc {
      color: #555;
      font-size: 14px;
      margin-top: 5px;
    }
    .card-footer {
      display: flex;
      justify-content: flex-end;
      align-items: center;
      padding: 0 20px 15px;
    }
    .view-btn {
      background-color: #f23eb3;
      color: white;
      border: none;
      padding: 6px 12px;
      border-radius: 6px;
      font-size: 12px;
      cursor: pointer;
      font-weight: bold;
      margin-right: 10px;
    }
    .dots {
      font-size: 20px;
      cursor: pointer;
    }
    @media (max-width: 900px) {
      .tabbar, .tabbar-row {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
        padding: 10px 8px;
      }
      .tabbar {
        margin-top: 10px;
      }
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <div class="navbar">
    <div class="navbar-logo">
      <img src="<?= base_url('public/img/logo.jpg') ?>" alt="logo" class="logo"/>
    </div>
    <div class="navbar-center">
      <a href="#">HOME</a>
      <a href="#">DASHBOARD</a>
      <a href="#">ABOUT</a>
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
      <input class="search-box" type="text" placeholder="Search.." />
      <button>+ Add Content</button>
      <img src="<?= base_url('public/img/profile.png') ?>" alt="profile" class="profile"/>
    </div>
  </div>
  <!-- Tabs -->
  <div class="tabbar">
    <span>Topic</span>
    <span>Task</span>
    <span class="active">Quiz</span>
    <span>Student</span>
  </div>
  <!-- Section Title -->
  <div class="section-title">
    Computer Programming 1 – Core Topics
  </div>
  <!-- Cards -->
  <div class="cards">
    <div class="card">
      <div class="card-content">
        <div class="card-title">
          Introduction to Programming <i>✎</i>
        </div>
        <div class="card-desc">
          Learn what programming is, why it matters, and how it powers the digital world.
        </div>
      </div>
      <div class="card-footer">
        <button class="view-btn">View Info</button>
        <span class="dots">⋮</span>
      </div>
    </div>
    <div class="card">
      <div class="card-content">
        <div class="card-title">
          Programming Environment Setup <i>✎</i>
        </div>
        <div class="card-desc">
          Set up your tools and write your first lines of code using a beginner-friendly editor.
        </div>
      </div>
      <div class="card-footer">
        <button class="view-btn">View Info</button>
        <span class="dots">⋮</span>
      </div>
    </div>
  </div>
</body>
</html>
