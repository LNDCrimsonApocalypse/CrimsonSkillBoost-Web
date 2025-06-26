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
      justify-content: center; /* Center content horizontally */
      padding: 20px 40px;
      border-bottom: 1px solid #ccc;
      position: relative; /* For absolute positioning of right section */
    }
    .logo {
      display: flex;
      align-items: center;
      /* Remove flex-grow to avoid stretching */
    }
    .logo img {
      height: 40px;
      margin-right: 15px;
    }
    .navbar-center {
      display: flex;
      gap: 36px;
      align-items: center;
      justify-content: center; /* Center links horizontally */
    }
    
    .navbar-center a {
  
      font-weight: 500;
      font-size: 1.35rem;
      text-decoration: none;
      color: black;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: color 0.2s;
    }
 .navbar-center a:hover {
      color: #ff00aa;
    }
    
    .navbar-center {
      display: flex;
      gap: 36px;
      align-items: center;
    }
    .navbar-center a {
      font-family: 'Montserrat', Arial, sans-serif;
      font-weight: 700;
      font-size: 1.35rem;
      text-decoration: none;
      color: #222;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: color 0.2s;
    }
    .navbar-center a.active {
      color: #222;
      font-weight: 900;
    }
    .navbar-center .dropdown {
      position: relative;
    }
    .navbar-center .dropdown::after {

      font-size: 0.85em;
      vertical-align: middle;
      font-weight: bold;
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
      color: black;
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
     .navbar-profile {
      width: 48px;
      height: 48px;
      border-radius: 50%;
      object-fit: cover;
      border: none;
      background: #fff;
    }
     
    .navbar-right {
      display: flex;
      align-items: center;
      gap: 14px;
      position: absolute;
      right: 40px;
      top: 50%;
      transform: translateY(-50%);
    }
        .navbar-right img {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      object-fit: cover;
      cursor: pointer;
    }

    .search-box {
      padding: 6px 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 1rem;
      width: 160px;
    }

    .navbar-right button {
      background: #d12c5c;
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: bold;
      padding: 8px 22px;
      cursor: pointer;
    }
    .navbar-right button:hover {
      background: #b11f4c;
    }

    .navbar-right img.profile {
      width: 35px;
      height: 35px;
      border-radius: 50%;
      object-fit: cover;
    }
    .progress-table {
  background: white;
  border-radius: 10px;
  margin: 0 20px;
  padding: 24px 32px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.student-info-large {
  display: flex;
  align-items: center;
  gap: 18px;
}

.student-avatar {
  width: 64px;
  height: 64px;
  border-radius: 50%;
  background: #e6e6e6;
}

.student-name {
  font-size: 1.13rem;
}

.email {
  color: #888;
  font-size: 0.97rem;
}

.student-status {
  color: #22b573;
  font-size: 0.97rem;
  font-weight: 500;
  margin-left: 10px;
}

.last-updated {
  color: #aaa;
  font-size: 1rem;
}

.progress-actions {
  display: flex;
  align-items: center;
  gap: 36px;
}

.progress-col {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.progress-circle {
  position: relative;
  width: 60px;
  height: 60px;
}

.progress-label {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-weight: bold;
  font-size: 1.1rem;
}

.progress-label.quiz {
  color: #0a8800;
}
.progress-label.task {
  color: #22b573;
}


.btn.grade-quiz,
.btn.grade-task {
      background: linear-gradient(90deg, #e636a4 0%, #b983ff 100%);
      color: #fff;
      border: none;
      border-radius: 20px;
      padding: 10px 20px;
      cursor: pointer;
      letter-spacing: 1.5px;
      transition: background 0.2s, box-shadow 0.2s;
      box-shadow: 0 2px 8px rgba(230,54,164,0.08);
    }
   

.progress-desc {
  font-size: 0.85rem;
  color: #888;
  margin-top: 2px;
}

.progress-divider {
  width: 2px;
  height: 48px;
  background: #eee;
  margin: 0 12px;
}

.progress-trash {
  margin-left: 32px;
  display: flex;
  align-items: center;
}

.trash {
  font-size: 2rem;
  color: #bbb;
  cursor: pointer;
}
  </style>
</head>
<body>
  <header>
    <div class="logo" style="position: absolute; left: 40px;">
      <img src="<?= base_url('public/img/Logo.png') ?>"  alt="Logo">
    </div>
    <div class="navbar-center" style="margin: 0 auto;">
      <a href="<?= base_url('homepage') ?>" >HOME</a> 
      <a href="<?= base_url('dashboard') ?>">DASHBOARD</a>
      <a href="<?= base_url('aboutus') ?>">ABOUT</a>
      <a href="<?= base_url('allcourses') ?>">COURSES</a>
    </div>
    <div class="navbar-right">
      <input class="search-box" type="text" placeholder="Search.." />
      <img src="<?= base_url('img/profile.png') ?>" alt="profile" class="profile"/>
    </div>
  </header>

  <div class="submenu">
    <a href="<?= base_url('topics') ?>"><span>Topic</span></a>
    <a href="<?= base_url('create_task') ?>"> <span>Task</span></a>
    <a href="<?= base_url('create_quiz') ?>"><span>Quiz</span></a>
   <a href="<?= base_url('studentprog') ?>"><span>Student</span></a>
    <a href="<?= base_url('gradesettings') ?>">Grade Settings</a>
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
      <div class="student-info student-info-large">
        <img src="<?= base_url('public/img/profile_student.png') ?>" alt="Student" class="student-avatar">
        <div>
          <strong class="student-name">Juan Dela Cruz</strong><br>
          <span class="email">juandelacruz@umak.edu.ph</span>
          <span class="student-status">• Active</span>
        </div>
      </div>
      <div class="last-updated">Last updated: 1hr ago</div>
      <div class="progress-actions">
        <div class="progress-col">
          <div class="progress-circle quiz">
            <svg width="60" height="60">
              <circle cx="30" cy="30" r="26" stroke="#e0e0e0" stroke-width="6" fill="none"/>
              <circle cx="30" cy="30" r="26" stroke="#0a8800" stroke-width="6" fill="none"
                stroke-dasharray="<?= 2 * pi() * 26 ?>" stroke-dashoffset="<?= 2 * pi() * 26 * (1-1) ?>" />
            </svg>
            <span class="progress-label quiz">100%</span>
          </div>
          <button class="btn grade-quiz">Grade Quiz</button>
          <div class="progress-desc">Quiz Complete: 1/1</div>
        </div>
        <div class="progress-divider"></div>
        <div class="progress-col">
          <div class="progress-circle task">
            <svg width="60" height="60">
              <circle cx="30" cy="30" r="26" stroke="#e0e0e0" stroke-width="6" fill="none"/>
              <circle cx="30" cy="30" r="26" stroke="#22b573" stroke-width="6" fill="none"
                stroke-dasharray="<?= 2 * pi() * 26 ?>" stroke-dashoffset="<?= 2 * pi() * 26 * (1-0.6) ?>" />
            </svg>
            <span class="progress-label task">60%</span>
          </div>
          <button class="btn grade-task">Grade Task</button>
          <div class="progress-desc">Task Complete: Incomplete</div>
        </div>
        <div class="progress-trash">
          <span class="trash">🗑️</span>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
      </div>
    </div>
  </div>
</body>
</html>
