csseditgrade.html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Edit Grade Modal</title>
  <!-- Add Poppins font from Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', 'Segoe UI', sans-serif;
      background-color: #f7eaf3;
    }

    .modal {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 650px;
      background: white;
      border-radius: 10px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
      padding: 30px;
      z-index: 9999;
    }

    .modal-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px solid #ddd;
      padding-bottom: 10px;
      margin-bottom: 25px;
    }

    .modal-header h2 {
      font-size: 20px;
      font-weight: 600;
      color: #000000;
    }

    .modal-header .close-btn {
      font-size: 22px;
      font-weight: bold;
      cursor: pointer;
      color: #999;
    }

    .modal-body {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .form-group {
      flex: 1 1 45%;
      display: flex;
      flex-direction: column;
    }

    .form-group label {
      margin-bottom: 8px;
      font-size: 14px;
      font-weight: 500;
      color: #000000;
    }

    .form-group input {
      padding: 10px 12px;
      font-size: 14px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    .form-actions {
      margin-top: 25px;
      display: flex;
      justify-content: flex-end;
    }

    .save-btn {
      background: linear-gradient(to right, #f06292, #ba68c8);
      color: white;
      border: none;
      padding: 10px 18px;
      font-size: 14px;
      font-weight: 500;
      border-radius: 6px;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .save-btn img {
      width: 18px;
      height: 18px;
    }

    @media (max-width: 700px) {
      .modal {
        width: 90%;
        padding: 20px;
      }
      .form-group {
        flex: 1 1 100%;
      }
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
    .search-box {
      display: flex;
      align-items: center;
      border: 1px solid #ccc;
      border-radius: 6px;
      padding: 5px 10px;
    }

    .search-box input {
      border: none;
      outline: none;
      padding: 5px;
      font-family: 'Poppins', 'Segoe UI', sans-serif;
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
      <a href="<?= base_url('editprofile') ?>">
        <img src="<?= base_url('public/img/profile.png') ?>" alt="profile" class="profile" style="cursor:pointer;" />
      </a>
    </div>
  </div>

<!-- Add Grade Modal -->
<div class="modal">
  <div class="modal-header">
    <h2>EDIT GRADE</h2>
    <span class="close-btn">&times;</span>
  </div>
  <div class="modal-body">
    <div class="form-group">
      <label for="grade-name">Grade Name</label>
      <input type="text" id="grade-name" placeholder="Grade Name" />
    </div>
    <div class="form-group">
      <label for="total-marks">Total Marks</label>
      <input type="text" id="total-marks" placeholder="Total Marks" />
    </div>
    <div class="form-group">
      <label for="date">Date</label>
      <input type="date" id="date" placeholder="Filtered Date" />
    </div>
    <div class="form-group">
      <label for="grade-point">Grade Point</label>
      <input type="text" id="grade-point" placeholder="Grade Point" />
    </div>
  </div>
  <div class="form-actions">
    <button class="save-btn">
      <img src="https://cdn-icons-png.flaticon.com/512/1828/1828817.png" alt="icon">
      Update Grade
    </button>
  </div>
</div>

</body>
</html>