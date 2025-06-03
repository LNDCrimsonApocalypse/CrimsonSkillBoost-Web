<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Student Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <style>
     body {
      margin: 0;
      font-family: 'Poppins', Arial, sans-serif;
      background-color: #fdeef4;
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
      color: rgb(0, 0, 0);
      cursor: pointer;
    }

    .tabbar .active {
      color: black;
      font-weight: bold;
      border-bottom: 3px solid black;
      padding-bottom: 5px;
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

/* Dropdown container */
.dropdown {
  position: relative;
}

/* Dropdown menu */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: white;
  min-width: 160px;
  box-shadow: 0 8px 16px rgba(0,0,0,0.1);

  z-index: 1;
}

/* Dropdown items */
.dropdown-content a {
  padding: 12px 16px;
  display: block;
  color: black;
  text-decoration: none;
}

.dropdown-content a:hover {
  background-color: #eee;
}

/* Show dropdown on hover */
.dropdown:hover .dropdown-content {
  display: block;
}
.arrow {
    font-size: 1.2rem;
    margin-left: 4px;
    vertical-align: middle;
    /* Ensures the arrow is centered with the text */
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
    .icons {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .container {
      display: flex;
      justify-content: space-between;
      padding: 40px;
      gap: 30px;
    }

    .card {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .right-section{
        background-color: #F2F8FF;
    }

    .left-section {
      flex: 2;
    }

    .right-section {
      flex: 1;
    }

    .profile-pic {
      width: 100px;
      height: 100px;
      background: #ccc;
      border-radius: 50%;
      margin-bottom: 20px;
    }

    .student-name {
      font-size: 1.3rem;
      font-weight: 700;
    }

    .student-major {
      color: gray;
      font-size: 0.95rem;
      margin-bottom: 20px;
    }

    .task-title {
      font-weight: 700;
      margin-top: 20px;
    }

    .task-date {
      color: #444;
      font-size: 0.9rem;
      margin: 8px 0;
    }

    .pdf-box {
      background-color: #f1f1f1;
      padding: 10px;
      margin: 10px 0;
      border-radius: 8px;
    }

    .grade-button {
      margin-top: 15px;
      background-color: hotpink;
      border: none;
      padding: 10px 20px;
      color: white;
      border-radius: 25px;
      cursor: pointer;
      font-weight: 600;
      margin-left: 1050px;
    }

    .submission-header {
      font-size: 1.2rem;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .submission-entry {
      background: #f4f4f4;
      padding: 12px 16px;
      margin-bottom: 12px;
      border-radius: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .entry-text {
      font-size: 0.9rem;
    }

    .entry-name {
      font-weight: bold;
    }

    .entry-icons {
      display: flex;
      gap: 8px;
    }
.icon-placeholder {
  width: 40px;
  height: 40px;
  border-radius: 4px;
  overflow: hidden;
}

.icon-placeholder img {
  width: 100%;
  height: 100%;
  object-fit: contain; /* Or cover, depending on your icon aspect ratio */
}
  .profile-pic {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  overflow: hidden;
  margin-bottom: 20px;
}

.profile-pic img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

  </style>
</head>
<body>

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
      <img src="<?= base_url('public/img/notifications.png') ?>" alt="Notifications" class="icon" />
      <img src="<?= base_url('public/img/profile.png') ?>" alt="profile" class="profile"/>
    </div>
  </div>

  <!-- Tab Bar -->
  <div class="tabbar">
    <span>Topic</span>
    <span>Task</span>
    <span>Quiz</span>
    <span>Student</span>
  </div>

  <!-- Content -->
  <div class="container">

    <!-- Left Section (Student Task) -->
    <div class="card left-section">
      <div class="profile-pic">
        <img src="<?= base_url('public/img/5.jpg') ?>" alt="Profile Picture" />
      </div>
      <div class="student-name">JUAN DELA CRUZ</div>
      <div class="student-major">Bachelor of Science in Computer Science<br>Major in Application Development</div>

      <div class="task-title">Programming Task #3</div>
      <div class="task-date">📅 Completed on April 2, 2025 at 2:30 pm</div>
      <p>Instructions are available in the PDF below. Complete the assignment according to the requirements and submit your work before the deadline.</p>

      <div class="pdf-box">📎 Task#3_Instructions.pdf</div>
      <p><strong>Submitted</strong></p>
      <div class="pdf-box">📎 diaz_jerine-Task#3.pdf</div>

      <button class="grade-button">Grade</button>
    </div>

    <!-- Right Section (Student Submissions) -->
    <div class="card right-section">
      <div class="submission-header">Student Submissions</div>

      <div class="submission-entry">
        <div class="entry-text">
          <div class="entry-name">Amihan Santos</div>
          <div>Quiz 1 - Computer Programming</div>
        </div>
        <div class="entry-icons"> 
            <div class="icon-placeholder">
                <img src="<?= base_url('public/img/1.jpg') ?>" alt="Profile Icon" />
          <button class="btn btn-info" style="margin-left:12px;padding:7px 18px;border-radius:6px;background:#e636a4;color:#fff;font-weight:bold;border:none;cursor:pointer;">View</button>
        </div>
      </div>

      <div class="submission-entry">
        <div class="entry-text">
          <div class="entry-name">Denis Batombakal</div>
          <div>Task 2 - Computer Programming</div>
        </div>
        <div class="entry-icons">
          <button class="btn btn-info" style="margin-left:12px;padding:7px 18px;border-radius:6px;background:#e636a4;color:#fff;font-weight:bold;border:none;cursor:pointer;">View</button>
        </div>
      </div>

      <div class="submission-entry">
        <div class="entry-text">
          <div class="entry-name">Precious Malacañang</div>
          <div>Midterm Examination - Computer Programming</div>
        </div>
        <div class="entry-icons">
         
          <button class="btn btn-info" style="margin-left:12px;padding:7px 18px;border-radius:6px;background:#e636a4;color:#fff;font-weight:bold;border:none;cursor:pointer;">View</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>