<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
  <title>Computer Programming 1</title>

  <style>
    body {
      margin: 0;
           font-family: 'Poppins', 'Segoe UI', sans-serif;
      background-color: #ffeef8;
    }
    
.score {
  font-size: 0.9em;
  color: #333;
}

    .add-button {
      background-color: #f53ea2;
      color: white;
      border: none;
      border-radius: 8px;
      padding: 8px 15px;
      font-weight: bold;
      cursor: pointer;
    }

    .title-bar {
      padding: 10px 0;
      background-color: #f3d3f5;
      font-size: 18px;
      font-weight: 600;
      text-align: center;
    }

    h2 {
      text-align: center;
      background-color: #f0c9ef;
      padding: 15px;
      margin-top: 0;
      font-size: 24px;
    }

    .content {
      display: flex;
      justify-content: space-between;
      gap: 20px;
    }

    .task-card {
      background: white;
      border-radius: 10px;
      box-shadow: 0 1px 4px rgba(0,0,0,0.1);
      width: 65%;
      padding: 20px;
    }

    .task-header {
      background-color: #c3b7f9;
      padding: 10px;
      border-radius: 8px 8px 0 0;
      font-weight: bold;
      color: #1c1c5a;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .task-body {
      padding: 15px;
    }

    .task-body p {
      margin: 10px 0;
    }

    .pdf-link {
      display: flex;
      align-items: center;
      gap: 5px;
      font-size: 14px;
    }

    .pdf-link img {
      width: 16px;
      height: 16px;
    }

    .due {
      color: #ff9900;
      font-size: 12px;
      margin-top: 10px;
    }

    .submission-list {
      width: 35%;
      background: white;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 1px 4px rgba(0,0,0,0.1);
    }

    .submission-list h3 {
      margin-top: 0;
    }

    .student-entry {
      background-color: #f7f7f7;
      margin: 10px 0;
      padding: 10px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .student-entry .info {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 14px;
    }

    .status-bar {
      background-color: #ccc;
      border-radius: 10px;
      height: 6px;
      width: 60px;
      margin-left: 10px;
      position: relative;
    }

    .status-fill {
      background-color: #41d36b;
      height: 100%;
      border-radius: 10px;
      width: 100%;
    }

    .status-incomplete .status-fill {
      width: 0%;
      background-color: #ccc;
    }

    .completed {
      font-size: 10px;
      color: white;
      background-color: #41d36b;
      padding: 2px 6px;
      border-radius: 12px;
    }

    .avatar {
      width: 35px;
      height: 35px;
      border-radius: 50%;
      margin-left: 20px;
    }

    .bell {
      font-size: 20px;
      margin-left: 20px;
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
      color: gray;
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
  </style>
</head>
<body>

  <div class="navbar">
    <div class="navbar-logo">
      <img src="imgs/Logo.png" alt="logo" class="logo"/>
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
    </div>
    <div class="navbar-right">
      <input type="text" placeholder="Search.." />
         <img src="imgs/notifications.png" alt="Notifications" class="icon" />
      <img src="imgs/profile.png" alt="profile" class="profile"/>
    </div>
  </div>

  <!-- Tab Bar -->
  <div class="tabbar">
    <span>Topic</span>
    <span>Task</span>
    <span>Quiz</span>
    <span>Student</span>
  </div>

  <div class="title-bar">
    Computer Programming 1
  </div>
    <div class="content">
      <div class="task-card">
        <div class="task-header">
          ACTIVITY 13.2. Use Ping and Traceroute to Test Network Connectivity
          <span>✎</span>
        </div>
        <div class="task-body">
          <p>Instruction: Use Ping and Traceroute to Test Network Connectivity. Access File Below for Guidelines</p>
          <div class="pdf-link">
            📄 <a href="#">Assignment3_Instructions.pdf</a>
          </div>
          <div class="due">🕒 Due today at 5:00 PM</div>
        </div>
      </div>

      <div class="submission-list">
        <h3>Recent Submission</h3>
        <div class="student-entry">
          <div class="info">◼️ Juan Dela Cruz</div>
          <span class="completed">Completed</span>
          <span class="score">1/1</span>
        </div>

        <div class="student-entry">
          <div class="info">◼️ STUDENT NAME</div>
       
             <span class="completed">Completed</span>
          <span class="score">1/1</span>
        </div>

        <div class="student-entry">
          <div class="info">◼️ STUDENT NAME</div>
             <span class="completed">Completed</span>
          <span class="score">1/1</span>
        </div>

        <div class="student-entry">
          <div class="info">◼️ STUDENT NAME</div>
          <div class="status-bar status-incomplete"></div>
          <span class="score">0/1</span>
        </div>

        <div class="student-entry">
          <div class="info">◼️ STUDENT NAME</div>
          <div class="status-bar status-incomplete"><div class="status-fill"></div></div>
          <span class="score">0/1</span>
        </div>

        <div class="student-entry">
          <div class="info">◼️ STUDENT NAME</div>
          <div class="status-bar status-incomplete"><div class="status-fill"></div></div>
          <span class="score">0/1</span>
        </div>

        <div class="student-entry">
          <div class="info">◼️ STUDENT NAME</div>
          <div class="status-bar status-incomplete"><div class="status-fill"></div></div>
          <span class="score">0/1</span>
        </div>
      </div>
    </div>
  </div>
</body>
</html>