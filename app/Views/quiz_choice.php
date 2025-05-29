<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Quiz </title>
  <!-- Add Google Fonts link for Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #fff1f6;
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

    .search-box {
      padding: 8px;
      border-radius: 5px;
      border: 1px solid #ccc;
      margin-right: 10px;
      font-family: 'Poppins', sans-serif;
    }

    .add-content-btn {
      background-color: #e548af;
      border: none;
      color: white;
      padding: 10px 15px;
      border-radius: 5px;
      font-weight: bold;
      cursor: pointer;
      font-family: 'Poppins', sans-serif;
    }

    
    .main-container {
      padding: 40px;
      font-family: 'Poppins', sans-serif;
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
      font-family: 'Poppins', sans-serif;
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
    .options-container {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
      justify-content: center;
      font-family: 'Poppins', sans-serif;
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
      font-family: 'Poppins', sans-serif;
    }

    .option .tools {
      position: absolute;
      top: 8px;
      right: 8px;
      font-size: 12px;
      font-family: 'Poppins', sans-serif;
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
      font-family: 'Poppins', sans-serif;
    }
               /* Dropdown container */
.dropdown {
  position: relative;
}
    .dropbtn {
  text-decoration: none;
  font-weight: bold;
  font-size: 1.3rem;
  color: black;
  background: none;
  border: none;
  cursor: pointer;
  padding: 8px;
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

   <!-- Navbar -->
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
  <div class="main-container">
    <div class="question-box">
      Type question here
    </div>

    <div class="options-container">
      <div class="option purple">
        <div class="tools">🗑 ✏️</div>
        Type answer option here
        <input type="radio" name="answer" />
      </div>
      <div class="option blue">
        <div class="tools">🗑 ✏️</div>
        Type answer option here
        <input type="radio" name="answer" />
      </div>
      <div class="option pink">
        <div class="tools">🗑 ✏️</div>
        Type answer option here
        <input type="radio" name="answer" />
      </div>
      <div class="option red">
        <div class="tools">🗑 ✏️</div>
        Type answer option here
        <input type="radio" name="answer" />
      </div>
    </div>

    <div class="save-btn">
      <button>💾 Save Question</button>
    </div>
  </div>

</body>
</html>