<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add a New Task</title>
  <!-- Add Google Fonts link for Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', Arial, sans-serif;
      margin: 0;
      background-color: #f2eaf2;
    }

    .modal {
      width: 800px;
      margin: 50px auto;
      background: white;
      border-radius: 8px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      overflow: hidden;
    }

    .modal-header {
      padding: 20px;
      border-bottom: 1px solid #ddd;
      text-align: center;
      font-weight: bold;
      font-size: 18px;
      color: #555;
      position: relative;
    }

    .close-btn {
      position: absolute;
      right: 20px;
      top: 20px;
      font-size: 20px;
      color: #888;
      cursor: pointer;
    }

    .modal-body {
      padding: 0;
    }

    .section-title {
      font-weight: bold;
      padding: 15px 20px;
      font-size: 16px;
    }

    .content-wrapper {
      display: flex;
      border-top: 1px solid #ccc;
    }

    .column {
      width: 50%;
      padding: 20px;
      box-sizing: border-box;
    }

    .column h3 {
      margin-top: 0;
      font-size: 14px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .subheader {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #ecd2ed;
      padding: 10px;
      font-weight: bold;
      font-size: 14px;
    }

    .subheader span {
      color: #555;
    }

    .option-group {
      padding: 10px;
    }

    .option-group label {
      display: flex;
      align-items: center;
      margin-bottom: 8px;
      font-size: 14px;
      color: #333;
    }

    .option-group input[type="radio"] {
      margin-right: 10px;
    }

    .select-all {
      color: #3a6ee8;
      font-size: 12px;
      cursor: pointer;
    }

    .scroll {
      max-height: 280px;
      overflow-y: auto;
    }

    /* Scrollbar styling */
    .scroll::-webkit-scrollbar {
      width: 6px;
    }

    .scroll::-webkit-scrollbar-thumb {
      background: #b79fc9;
      border-radius: 4px;
    }

    .scroll::-webkit-scrollbar-track {
      background: transparent;
    }

    /* Navbar */
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
    <span>Topic</span>
    <span>Task</span>
    <span>Quiz</span>
    <span>Student</span>
  </div>
  
  <div class="modal">
    <div class="modal-header">
      ADD A NEW TASK
      <span class="close-btn">×</span>
    </div>
    <div class="section-title">Select Classes and Courses</div>
    <div class="content-wrapper">
      <!-- Classes Column -->
      <div class="column">
        <div class="subheader">
          <span>Year and Section</span>
          <span class="select-all">Select All</span>
        </div>
        <div class="option-group">
          <label><input type="radio" name="year" /> 1st Year</label>
          <label><input type="radio" name="year" /> 2nd Year</label>
          <label><input type="radio" name="year" checked /> 3rd Year</label>
          <label><input type="radio" name="year" /> 4th Year</label>
        </div>
        <div class="option-group">
          <label><input type="radio" name="section" /> ACSAD</label>
          <label><input type="radio" name="section" checked /> BCSAD</label>
          <label><input type="radio" name="section" /> CCSAD</label>
        </div>
      </div>

      <!-- Courses Column -->
      <div class="column">
        <div class="subheader">
          <span>Courses</span>
          <span class="select-all">Select All</span>
        </div>
        <div class="option-group scroll">
          <label><input type="radio" name="semester" /> First Semester</label>
          <label><input type="radio" name="semester" checked /> Second Semester</label>
          <br>
          <label><input type="radio" name="course" /> Methods of Research</label>
          <label><input type="radio" name="course" /> Software Engineering 2</label>
          <label><input type="radio" name="course" /> Programming Languages</label>
          <label><input type="radio" name="course" checked /> Computer Programming 1</label>
          <label><input type="radio" name="course" /> Architecture and Organization</label>
          <label><input type="radio" name="course" /> Automata Theory and Formal Languages</label>
          <label><input type="radio" name="course" /> Project Management</label>
          <label><input type="radio" name="course" /> Elective 2</label>
        </div>
      </div>
    </div>
  </div>
</body>
</html>