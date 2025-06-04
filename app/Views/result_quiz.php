
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Quiz Dashboard</title>
  <!-- Add Google Fonts link for Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background-color: #fff0f5;
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
     margin: 0 15px;
  
}
 .dropbtn :hover {
   color: #ff00aa;
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
    .add-content-btn {
      background-color: #f542a4;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
    }

    .main {
      display: flex;
      padding: 40px;
      gap: 40px;
    }

    .left-column {
      flex: 1;
    }

    .right-column {
      width: 300px;
      background-color: white;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .filters {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 20px;
    }

    .filter-button {
      padding: 8px 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      background-color: white;
      cursor: pointer;
    }

    .quiz-card {
      background: white;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      position: relative;
    }

    .quiz-card img {
      width: 100%;
      border-radius: 10px;
    }

    .quiz-card h3 {
      margin: 15px 0 5px;
    }

    .quiz-card p {
      font-size: 14px;
      color: gray;
    }

    .tags {
      display: flex;
      gap: 10px;
      margin-top: 10px;
    }

    .tag {
      padding: 5px 10px;
      border-radius: 5px;
      font-size: 12px;
    }

    .tag.logical {
      background-color: #eee;
    }

    .tag.required {
      background-color: #fdd;
    }

    .status {
      display: flex;
      justify-content: space-between;
      margin-top: 10px;
      align-items: center;
    }

    .status .assigned {
      color: green;
      font-weight: bold;
    }

    .status .running {
      color: red;
      font-weight: bold;
    }

    .recent-submission h3 {
      margin-bottom: 20px;
      font-size: 20px;
    }

    .submission {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 12px;
      padding: 8px;
      border-radius: 8px;
      background: #f9f9f9;
    }

    .submission .name {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .submission img {
      width: 30px;
      height: 30px;
      border-radius: 50%;
    }

    .progress {
      flex: 1;
      height: 10px;
      background-color: #ddd;
      border-radius: 5px;
      margin-left: 10px;
      position: relative;
    }

    .progress-bar {
      height: 100%;
      background-color: #4caf50;
      border-radius: 5px;
      width: 100%;
    }

    .score {
      margin-left: 10px;
      font-size: 12px;
      font-weight: bold;
    }

       .logout-btn {
            background: #ff4081;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 500;
            cursor: pointer;
            font-size: 14px;
            margin-left: 15px;
        }

        .logout-btn:hover {
            background: #e63975;
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
        <span style="font-weight: bold;">COURSES <span class="arrow">&#9660;</span></span>
        <div class="dropdown-content">
           <select id="course-select">
            <option value="">Select Course</option>
            <option value="<?= base_url('allcourses') ?>">ALL COURSES</option>
            <option value="<?= base_url('courses') ?>">MY COURSES</option>
          </select>
        </div>
      </li>
    </div>
        <div class="navbar-right">
            <input type="text" placeholder="Search.." />
          <img src="<?= base_url('public/img/notifications.png') ?>" alt="Notifications" class="icon" />  
             <img src="<?= base_url('public/img/profile.png') ?>"alt="profile" class="profile"/>
            <button id="signOutButton" class="logout-btn">Sign Out</button>
        </div>
    </div>

  <!-- Tab Bar -->
  <div class="tabbar">
     <a href="<?= base_url('allcourses') ?>"><span>Course</span></a>
    <a href="<?= base_url('create_task') ?>"> <span>Task</span></a>
    <a href="<?= base_url('create_quiz') ?>"><span>Quiz</span></a>
    <span>Student</span>
  </div>

  <div class="main">
    <div class="left-column">
      <div class="filters">
        <div class="filter-button">III - BCSAD</div>
        <div class="filter-button">Filtered by Date</div>
      </div>

      <div class="quiz-card">
        <img src="<?= base_url('public/img/11.png')?>" alt="Quiz Image">
        <h3>Introduction in Computer Programming 1</h3>
        <p>DUE 13TH APRIL 11:59 PM</p>
        <div class="tags">
          <div class="tag logical">Logical</div>
          <div class="tag required">Required</div>
        </div>
        <p>10 Questions</p>
        <div class="status">
          <span class="assigned">Assigned</span>
          <span class="running">Running</span>
        </div>
      </div>
    </div>

    <div class="right-column recent-submission">
      <h3>Recent Submission</h3>

      <div class="submission">
        <div class="name">
          <img src="imgs/img3.png">
          Marites Dela Cruz
        </div>
        <div class="score">1/1</div>
        <div class="progress"><div class="progress-bar" style="width: 100%"></div></div>
      </div>

      <!-- Dummy data for students -->
      <div class="submission">
        <div class="name">STUDENT NAME</div>
        <div class="score">1/1</div>
        <div class="progress"><div class="progress-bar" style="width: 100%"></div></div>
      </div>
      <div class="submission">
        <div class="name">STUDENT NAME</div>
        <div class="score">0/1</div>
        <div class="progress"><div class="progress-bar" style="width: 0%"></div></div>
      </div>
      <div class="submission">
        <div class="name">STUDENT NAME</div>
        <div class="score">1/1</div>
        <div class="progress"><div class="progress-bar" style="width: 100%"></div></div>
      </div>
      <div class="submission">
        <div class="name">STUDENT NAME</div>
        <div class="score">1/1</div>
        <div class="progress"><div class="progress-bar" style="width: 100%"></div></div>
      </div>
      <div class="submission">
        <div class="name">STUDENT NAME</div>
        <div class="score">1/1</div>
        <div class="progress"><div class="progress-bar" style="width: 100%"></div></div>
      </div>
      <div class="submission">
        <div class="name">STUDENT NAME</div>
        <div class="score">0/1</div>
        <div class="progress"><div class="progress-bar" style="width: 0%"></div></div>
      </div>
      <div class="submission">
        <div class="name">STUDENT NAME</div>
        <div class="score">1/1</div>
        <div class="progress"><div class="progress-bar" style="width: 100%"></div></div>
      </div>
    </div>
  </div>
</body>
</html>