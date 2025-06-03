<?php
// Remove the first line: cssnotif.html
// Make sure this file is loaded by a CodeIgniter controller, not accessed directly as notif.php
?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Submission</title>
  <style>
     body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', Arial, sans-serif;
      background-color: #f5ecf2;
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

   
  
    .navbar-right {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: flex-end;
      gap: 15px; /* space between search, bell, and profile */
    }

    .navbar-right input[type="text"] {
      padding: 6px 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      /* Remove margin-right to avoid extra space */
      margin: 0;
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
      /* Align vertically with profile */
      vertical-align: middle;
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
       
   .dropbtn {
  
   font-weight: bold;
  font-size: 1.35rem;
  color: black;
  background: none;
  border: none;
  cursor: pointer;
  
}

.dropdown {
  position: relative;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #EED2EE;
  min-width: 160px;
  padding: 8px;
  box-shadow: 0 8px 16px rgba(0,0,0,0.1);
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.custom-select {
  width: 100%;
  padding:  12px 16px;
  font-size: 1rem;
  font-weight: bold;
  border: 1px solid #ccc;
  border-radius: 6px;
  background-color: white;
  color: black;
  appearance: none; /* Hide default arrow */
  -webkit-appearance: none;
  -moz-appearance: none;
  background-image: url("data:image/svg+xml;utf8,<svg fill='black' height='16' viewBox='0 0 24 24' width='16' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/></svg>");
  background-repeat: no-repeat;
  background-position: right 10px center;
  background-size: 16px;
  cursor: pointer;
}

.custom-select:focus {
  outline: none;
  border-color: #a84d9b;

}

.arrow {
  font-size: 1rem;
  margin-left: 4px;
  vertical-align: middle;
}

li {
  list-style: none;
  margin: 0;
  padding: 0;
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
   .toolbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 20px;
      border-bottom: 3px solid #e8c8d8;
    }

    .toolbar-left {
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .toolbar-left .checkbox-group {
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .toolbar-left input[type="checkbox"] {
      width: 16px;
      height: 16px;
    }

    .icon {
      font-size: 18px;
      cursor: pointer;
    }

    .toolbar-right {
      display: flex;
      gap: 20px;
      font-size: 18px;
      cursor: pointer;
    }

    .submission-list {
      padding: 0;
      margin: 0;
    }

    .submission-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 15px 20px;
      border-bottom: 1px solid #eee;
    }

    .submission-item:nth-child(odd) {
      background-color: #f3d1e1;
    }

    .submission-item:nth-child(even) {
      background-color: #eaf3f3;
    }

    .submission-left {
      display: flex;
      align-items: center;
      gap: 12px;
      flex: 1;
    }

    .star {
      font-size: 18px;
      cursor: pointer;
    }

    .sender {
      font-weight: bold;
    }

    .label {
      background-color: #d3d3d3;
      color: #333;
      padding: 2px 5px;
      font-size: 12px;
      border-radius: 5px;
    }

    .message {
      font-weight: 500;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      max-width: 300px;
    }

    .time {
      font-size: 13px;
      color: #333;
    }

    .attachment {
      background-color: white;
      border-radius: 20px;
      padding: 6px 12px;
      font-size: 12px;
      color: #333;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      margin-top: 4px;
    }

    .attachment-icon {
      font-size: 14px;
    }

  </style>
</head>
<body>

<header>
  <div class="navbar">
    <div class="navbar-logo">
      <a href="<?= base_url('homepage_initial') ?>">
        <img src="<?= base_url('public/img/Logo.png') ?>" alt="logo" class="logo"/>
      </a>
    </div>
    <div class="navbar-center">
      <a href="<?= base_url('homepage_initial') ?>">HOME</a>
      <a href="<?= base_url('dashboard') ?>">DASHBOARD</a>
      <a href="<?= base_url('aboutus') ?>">ABOUT</a>
      <li class="dropdown">
        <span style="font-weight: bold;">COURSES <span class="arrow">&#9660;</span></span>
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
      <img src="<?= base_url('public/img/notifications.png') ?>" alt="Notifications" class="icon" />    
      <img src="<?= base_url('public/img/profile.png') ?>" alt="profile" class="profile"/>
    </div>
  </div>

  <!-- Tab Bar -->
  <div class="tabbar">
    <span>Topic</span>
    <span >Task</span>
    <span>Quiz</span>
    <span>Student</span>
  </div>

<!-- Toolbar -->
<div class="toolbar">
  <div class="toolbar-left">
    <div class="checkbox-group">
      <input type="checkbox">
      <span class="icon">▾</span>
    </div>
    <span class="icon">⟳</span>
    <span class="icon">⋮</span>
  </div>
  <div class="toolbar-right">
    <span class="icon">◀</span>
    <span class="icon">▶</span>
  </div>
</div>

<!-- Submission List -->
<div class="submission-list">
  <!-- Item 1 -->
  <div class="submission-item">
    <div class="submission-left">
      <input type="checkbox">
      <span class="star">★</span>
      <span class="sender">JUAN DELA CRUZ</span>
      <span class="label">Inbox</span>
      <span class="message">JUAN DELA CRUZ submitted Introduction to Prog...</span>
    </div>
    <div class="time">9:11 PM</div>
  </div>

  <!-- Item 2 -->
  <div class="submission-item">
    <div class="submission-left">
      <input type="checkbox">
      <span class="star">☆</span>
      <span class="sender">JUAN DELA CRUZ</span>
      <span class="label">Inbox</span>
      <span class="message">JUAN DELA CRUZ have 2 comments in Introduct...</span>
    </div>
    <div class="time">7:20 PM</div>
  </div>

  <!-- Item 3 -->
  <div class="submission-item">
    <div class="submission-left">
      <input type="checkbox">
      <span class="star">☆</span>
      <span class="sender">JUAN DELA CRUZ</span>
      <span class="label">Inbox</span>
      <span class="message">JUAN DELA CRUZ submitted Introduction to Prog...</span>
    </div>
    <div class="time">
      8:30 AM
      <div class="attachment">
        <span class="attachment-icon">📎</span>
        diaz_jerine-Assignmnet#3pdf
      </div>
    </div>
  </div>
</div>

</body>
</html>