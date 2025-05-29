<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Quiz</title>
  <!-- Add Google Fonts link for Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #f2e6ee;
    }

    /* Modal */
    .modal {
      background-color: white;
      width: 700px;
      margin: 50px auto;
      padding: 30px;
      border: 1px solid #e1c9df;
      border-radius: 5px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }

    .modal h2 {
      margin-top: 0;
      font-size: 20px;
      font-weight: 700;
    }

    .modal .close {
      float: right;
      font-weight: bold;
      cursor: pointer;
    }

    .modal .clear {
      float: right;
      margin-right: 25px;
      font-size: 14px;
      cursor: pointer;
      color: #555;
    }

    .modal input[type="text"] {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .import-section {
      border: 2px dashed #d2d2ff;
      padding: 30px;
      background-color: #eef4fb;
      text-align: center;
      border-radius: 10px;
      position: relative;
    }

    .import-section img {
      width: 150px;
      margin-bottom: 10px;
    }

    .import-section p {
      margin: 5px 0;
      font-weight: 500;
    }

    .import-section button {
      background-color: #eb4bb3;
      color: white;
      border: none;
      padding: 10px 20px;
      margin-top: 10px;
      font-weight: 600;
      border-radius: 6px;
      cursor: pointer;
    }

    .add-btn {
      margin-top: 30px;
      width: 100%;
      background: linear-gradient(to right, #f94fa4, #a48bd7);
      color: white;
      padding: 12px;
      border: none;
      border-radius: 20px;
      font-weight: 700;
      font-size: 16px;
      cursor: pointer;
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
    <span class="active">Task</span>
    <span>Quiz</span>
    <span>Student</span>
  </div>

  <!-- Paayos nlang ung design para matchy sa figma -->
  <div class="modal">
    <span class="close">✕</span>
    <span class="clear">Clear all</span>
    <h2>Add Content</h2>
    <label>File Name:</label>
    <input type="text" placeholder="Enter file name">

    <div class="import-section">
      <img src="https://via.placeholder.com/150x100.png?text=Upload+Preview" alt="Upload Preview">
      <p><strong>Import your own content</strong></p>
      <p>Import content and get AI generated questions</p>
      <button>Import content</button>
    </div>

    <button class="add-btn">ADD</button>
  </div> 

</body>
</html>