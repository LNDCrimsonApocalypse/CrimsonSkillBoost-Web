<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Grade Settings Table</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=DM+Serif+Display&family=Inter:wght@400;500&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      background: #fce6f5;
      font-family: 'Inter', Arial, sans-serif;
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

    /* TABS */
    .tabbar {
      display: flex;
      gap: 30px;
      padding: 10px 50px;
      background-color: white;
      border-bottom: 1px solid #ddd;
    }

    .tabbar span {
      color: rgb(0, 0, 0);
      font-weight: 500;
      cursor: pointer;
    }

    .tabbar .active {
      color: black;
      font-weight: bold;
      border-bottom: 3px solid black;
      padding-bottom: 5px;
    }

  

    /* TABLE */
    .table-container {
      margin: 32px auto 0 auto;
      max-width: 1100px;
      background: #fce6f5;
      border-radius: 12px;
      padding: 20px 0 40px 0;
      overflow-x: auto;
    }
    table {
      width: 98%;
      margin: 0 auto;
      border-collapse: collapse;
      background: #fff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    }
    thead th {
      background: #e5b4d8;
      color: #222;
      font-family: 'Montserrat', Arial, sans-serif;
      font-weight: 700;
      font-size: 1.1rem;
      padding: 16px 12px;
      text-align: left;
      border: none;
    }
    tbody td {
      background: #fff;
      padding: 14px 12px;
      font-size: 1.07rem;
      color: #222;
      border-bottom: 1.5px solid #f3d9e9;
      vertical-align: middle;
    }
    tbody tr:last-child td {
      border-bottom: none;
    }
    /* BUTTONS */
    .action-btn {
      border: none;
      border-radius: 8px;
      padding: 6px 18px 6px 36px;
      font-size: 1rem;
      font-family: 'Montserrat', Arial, sans-serif;
      font-weight: 700;
      color: #fff;
      background: linear-gradient(90deg, #e636a4 0%, #b983ff 100%);
      cursor: pointer;
      margin-right: 8px;
      position: relative;
      transition: background 0.18s, box-shadow 0.18s;
      box-shadow: 0 1px 4px rgba(230,54,164,0.08);
    }
    .action-btn:last-child {
      margin-right: 0;
    }
    .action-btn.edit::before {
      content: '';
      display: inline-block;
      background: url('https://cdn-icons-png.flaticon.com/512/1159/1159633.png') no-repeat center/18px 18px;
      width: 18px;
      height: 18px;
      position: absolute;
      left: 12px;
      top: 50%;
      transform: translateY(-50%);
    }
    .action-btn.delete::before {
      content: '';
      display: inline-block;
      background: url('https://cdn-icons-png.flaticon.com/512/1214/1214428.png') no-repeat center/18px 18px;
      width: 18px;
      height: 18px;
      position: absolute;
      left: 12px;
      top: 50%;
      transform: translateY(-50%);
    }
    .action-btn:hover {
      background: linear-gradient(90deg, #b983ff 0%, #e636a4 100%);
      box-shadow: 0 3px 12px rgba(230,54,164,0.13);
    }
    @media (max-width: 900px) {
      .navbar, .subnav-container {
        flex-direction: column;
        gap: 10px;
        padding: 14px 8px 0 8px;
      }
      .table-container {
        padding: 10px 0 24px 0;
      }
      table {
        font-size: 0.97rem;
      }
      .search-box-container {
        justify-content: center;
      }
    }
    @media (max-width: 600px) {
      .table-container {
        padding: 0;
      }
      table {
        font-size: 0.93rem;
      }
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
 <!-- NAVBAR -->
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
<!-- TABS -->
<div class="tabbar">
  <span>Topic</span>
  <span>Task</span>
  <span>Quiz</span>
  <span>Student</span>
  <span>Grade Settings</span>
</div>
  <!-- TABLE -->
  <div class="table-container">
    <table>
      <thead>
        <tr>
          <th>Grade Name</th>
          <th>Grade Point</th>
          <th>Grade Range %</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>EXCELLENT</td>
          <td>1.0</td>
          <td>97 - 100</td>
          <td>
            <button class="action-btn edit">EDIT</button>
            <button class="action-btn delete">DELETE</button>
          </td>
        </tr>
        <tr>
          <td>SUPERIOR</td>
          <td>1.25</td>
          <td>94-96</td>
          <td>
            <button class="action-btn edit">EDIT</button>
            <button class="action-btn delete">DELETE</button>
          </td>
        </tr>
        <tr>
          <td>SUPERIOR</td>
          <td>1.50</td>
          <td>91-93</td>
          <td>
            <button class="action-btn edit">EDIT</button>
            <button class="action-btn delete">DELETE</button>
          </td>
        </tr>
        <tr>
          <td>VERY GOOD</td>
          <td>1.75</td>
          <td>88-90</td>
          <td>
            <button class="action-btn edit">EDIT</button>
            <button class="action-btn delete">DELETE</button>
          </td>
        </tr>
        <tr>
          <td>VERY GOOD</td>
          <td>2.00</td>
          <td>85-87</td>
          <td>
            <button class="action-btn edit">EDIT</button>
            <button class="action-btn delete">DELETE</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>