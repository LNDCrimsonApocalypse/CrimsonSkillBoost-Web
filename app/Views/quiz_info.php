<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Quiz</title>
  <!-- Add Google Fonts link for Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', Arial, sans-serif;
      background-color: #f5ecf2;
    }

    .modal {
      width: 700px;
      margin: 100px auto;
      background-color: white;
      border-radius: 10px;
      padding: 40px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      position: relative;
    }

    .modal .top-actions {
      position: absolute;
      top: 20px;
      right: 30px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .modal .top-actions span {
      cursor: pointer;
      font-size: 18px;
    }

    .section {
      margin-bottom: 30px;
    }

    .section-title {
      font-weight: 700;
      font-size: 20px;
      margin-bottom: 5px;
    }

    .section-subtitle {
      font-size: 12px;
      color: #a085e2;
      margin-bottom: 15px;
    }

    .form-row {
      display: flex;
      gap: 30px;           /* Increased gap between columns */
      margin-bottom: 20px; /* More space below the row */
    }

    .form-group {
      flex: 1;
      margin-right: 15px;  /* Space between groups */
    }

    .form-group:last-child {
      margin-right: 0;     /* Remove margin on last group */
    }

    label {
      display: block;
      font-size: 14px;
      margin-bottom: 10px; /* More space below label */
    }

    input[type="text"] {
      width: 65%;
      padding: 12px;       /* More padding inside input */
      font-size: 14px;
      border: 1px solid #999;
      border-radius: 3px;
      margin-bottom: 12px; /* More space below each input */
    }

    .checkbox-group {
      display: flex;
      align-items: center;
      font-size: 13px;
      margin-top: 10px;
      color: #333;
    }

    .checkbox-group input {
      margin-right: 8px;
      accent-color: #6a0dad;
    }

    .divider {
      border-top: 1px solid #ddd;
      margin: 25px 0;
    }

    .circle-title {
      display: flex;
      align-items: center;
      font-weight: 700;
      font-size: 18px;
    }

    .circle-title::before {
      content: "●";
      color: #999;
      font-size: 16px;
      margin-right: 10px;
    }

    .footer-info {
      font-size: 11px;
      color: #999;
      margin-top: 5px;
    }

    .button-group {
      display: flex;
      gap: 10px;
      position: absolute;
      top: 20px;
      right: 70px;
    }

    .btn {
      padding: 6px 16px;
      border-radius: 6px;
      font-size: 13px;
      color: #fff;
      background-color: #333;
      border: none;
      cursor: pointer;
    }

    .btn:hover {
      background-color: #000;
    }

    .collapse-caret {
      font-size: 14px;
      color: #333;
      cursor: pointer;
      transform: rotate(180deg);
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
    </li>

    </div>
    <div class="navbar-right">
      <input type="text" placeholder="Search.." />
        <img src="imgs/notifications.png" alt="Notifications" class="icon" />
      <img src="imgs/profile.png" alt="profile" class="profile"/>
    </div>
  </div>

  <!-- Tab Bar -->
  <div class="tabbar">
    <span>Course</span>
    <span>Task</span>
    <span>Quiz</span>
    <span>Student</span>
  </div>

  <div class="modal">
    <div class="top-actions">
      <div class="button-group">
        <button class="btn">Cancel</button>
        <button class="btn">Done</button>
      </div>
      <span class="collapse-caret">︿</span>
      <span class="close-btn">✕</span>
    </div>

    <!-- Due Date Section -->
    <div class="section">
      <div class="section-title">Due date</div>
      <div class="section-subtitle">Recommended next steps</div>

      <div class="form-row">
        <div class="form-group">
          <label>Start date</label>
          <input type="text" />
          <input type="text" />
        </div>
        <div class="form-group">
          <label>End date</label>
          <input type="text" />
          <input type="text" />
        </div>
      </div>

      <div class="checkbox-group">
        <input type="checkbox" checked />
        <label>Allow late submission for the following week</label>
      </div>
    </div>

    <div class="divider"></div>

    <!-- Options Section -->
    <div class="section">
      <div class="circle-title">Options</div>
      <div class="form-group" style="margin-top: 15px;">
        <label>Number of attempts</label>
        <input type="text" value="0" />
        <div class="footer-info">Based on best attempt</div>
      </div>
    </div>
  </div>

</body>
</html>