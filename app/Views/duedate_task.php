<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Due Date</title>
  <!-- Add Google Fonts link for Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', Arial, sans-serif;
      background-color: #f5ecf2;
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
  flex-direction: row;
  gap: 36px;
  font-size: 1.1rem;
  font-weight: 500;
  background: #fff;
  border-bottom: 1.5px solid #f8e6f6;
  min-height: 38px;
  align-items: center;
  padding: 0 0 0 24px;
  margin: 0;
  position: static;
  width: 100%;
}
.tabbar a {
  text-decoration: none;
  color: #3a2352;
  font-weight: 600;
  font-size: 1.15rem;
  padding: 0 8px;
  transition: color 0.18s;
  border-bottom: 3px solid transparent;
  background: none;
}
.tabbar a:hover,
.tabbar a.active {
  color: #e636a4;
  border-bottom: 3px solid #e636a4;
}
.tabbar span {
  font-weight: 500;
  cursor: pointer;
}
.tabbar .active {
  color: #e636a4;
  font-weight: bold;
  border-bottom: 3px solid #e636a4;
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
        /* Modal Overlay */
    .modal-overlay {
      position: fixed;
      inset: 0;
      background: rgba(80, 41, 79, 0.06);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 1000;
    }
    /* Modal */
    .modal {
      background: #fff;
      border-radius: 14px;
      box-shadow: 0 8px 32px rgba(80,41,79,0.07);
      padding: 32px 36px 28px 36px;
      width: 480px;
      max-width: 96vw;
      position: relative;
      margin-top: 20px;
    }
    .modal-close {
      position: absolute;
      top: 20px;
      right: 24px;
      background: none;
      border: none;
      font-size: 1.25rem;
      color: #aaa;
      cursor: pointer;
      transition: color 0.2s;
    }
    .modal-close:hover {
      color: #d13e6f;
    }
    .modal-section-title {
      font-weight: 600;
      font-size: 1.14rem;
      color: #32203c;
      margin-bottom: 4px;
    }
    .modal-section-subtitle {
      color: #b8aebd;
      font-size: 0.98rem;
      margin-bottom: 18px;
    }
    .modal-row {
      display: flex;
      gap: 18px;
      margin-bottom: 18px;
    }
    .modal-row label {
      font-size: 0.98rem;
      color: #32203c;
      margin-bottom: 4px;
      display: block;
    }
    .modal-row input[type="date"] {
      padding: 8px 10px;
      border: 1.5px solid #e3d3e6;
      border-radius: 7px;
      font-size: 1rem;
      font-family: inherit;
      background: #faf8fb;
      width: 170px;
      margin-top: 4px;
    }
    .modal-checkbox-row {
      display: flex;
      align-items: center;
      margin-bottom: 18px;
      margin-top: 6px;
    }
    .modal-checkbox-row input[type="checkbox"] {
      accent-color: #6d4fd2;
      margin-right: 7px;
      width: 16px;
      height: 16px;
    }
    .modal-checkbox-row label {
      color: #6d4fd2;
      font-size: 0.97rem;
      cursor: pointer;
    }
    .modal-divider {
      border: none;
      border-top: 1px solid #e6e1ea;
      margin: 24px 0 18px 0;
    }
    .modal-options-title {
      font-weight: 600;
      font-size: 1.08rem;
      color: #32203c;
      margin-bottom: 12px;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .modal-options-title::before {
      content: '';
      display: inline-block;
      width: 10px;
      height: 10px;
      background: #d3c5e6;
      border-radius: 50%;
    }
    .modal-options-row {
      margin-bottom: 10px;
    }
    .modal-options-row label {
      font-size: 0.97rem;
      color: #32203c;
      margin-bottom: 2px;
      display: block;
    }
    .modal-options-row input[type="number"] {
      padding: 8px 10px;
      border: 1.5px solid #e3d3e6;
      border-radius: 7px;
      font-size: 1rem;
      font-family: inherit;
      background: #faf8fb;
      width: 120px;
      margin-top: 4px;
    }
    .modal-options-note {
      color: #b8aebd;
      font-size: 0.92rem;
      margin-bottom: 0;
      margin-top: 3px;
    }
    .modal-footer {
      display: flex;
      justify-content: flex-end;
      margin-top: 22px;
    }
    .modal-done-btn {
      background: #4fd269;
      color: #fff;
      border: none;
      border-radius: 7px;
      padding: 10px 28px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.2s;
    }
    .modal-done-btn:hover {
      background: #34bb4d;
    }
  </style>
</head>
<body>
<div class="navbar">
    <div class="navbar-logo">
      <a href="<?= base_url('homepage') ?>">
        <img src="<?= base_url('public/img/Logo.png') ?>" alt="logo" class="logo"/>
      </a>
    </div>
    <div class="navbar-center">
       <a href="<?= base_url('homepage') ?>">HOME</a>
      <a href="<?= base_url('dashboard') ?>">DASHBOARD</a>
      <a href="<?= base_url('aboutus') ?>">ABOUT</a>
       <a href="<?= base_url('allcourses') ?>">COURSES</a>
      </div>
    </div>
    <div class="navbar-right">
      <input type="text" placeholder="Search.." />
      <img src="<?= base_url('public/img/notifications.png') ?>" alt="Notifications" class="icon" />    
      <img src="<?= base_url('public/img/profile.png') ?>" alt="profile" class="profile"/>
    </div>
  </div>


  <!-- Tab Bar -->
  <div class="tabbar">
     <a href="<?= base_url('topics') ?>"><span>Topic</span></a>
    <a href="<?= base_url('create_task') ?>"> <span>Task</span></a>
    <a href="<?= base_url('create_quiz') ?>"><span>Quiz</span></a>
    <a href="<?= base_url('studentprog') ?>"> <span>Student</span></a>
  </div>

    <!-- Modal Overlay -->
  <div class="modal-overlay">
    <div class="modal">
      <button class="modal-close" title="Close">&times;</button>
      <div class="modal-section-title">Due date</div>
      <div class="modal-section-subtitle">Recommended next steps</div>
      <div class="modal-row">
        <div>
          <label for="start-date">Start date</label>
          <input type="date" id="start-date" />
        </div>
        <div>
          <label for="end-date">End date</label>
          <input type="date" id="end-date" />
        </div>
      </div>
      <div class="modal-checkbox-row">
        <input type="checkbox" id="late-submission" />
        <label for="late-submission">Allow late submission for the following week</label>
      </div>
      <hr class="modal-divider" />
      <div class="modal-options-title">Options</div>
      <div class="modal-options-row">
        <label for="attempts">Number of attempts</label>
        <input type="number" id="attempts" min="0" value="0" />
        <div class="modal-options-note">Based on best attempt</div>
      </div>
      <div class="modal-footer">
        <button class="modal-done-btn">Done</button>
      </div>
    </div>
  </div>


  <script>
    // Dropdown select redirect
    document.getElementById('course-select').addEventListener('change', function() {
      if (this.value) window.location.href = this.value;
    });
  </script>
</body>
</html>