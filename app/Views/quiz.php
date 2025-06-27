<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>QUIZ</title>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Short+Stack&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', Arial, sans-serif;
      background-color: #fdeef4;
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
  .navbar-right button {
        background: #ff3bbd;
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: bold;
      padding: 8px 22px;
      cursor: pointer;
      transition: background 0.2s;
      margin-right: 8px;
    }
      .navbar-right button {
      background: #d12c5c;
    }
    /* Tab bar and other styles omitted for brevity */
     .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 40px;
    }
    .create-box{
      /* Override to NOT use Poppins */
      font-family: 'Short Stack', cursive;
      width: 400px;
      height: 200px;
      background-color: #fdf6fa;
      border: 2px dashed #ccc;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 32px;
      color: #9a7fa0;
      font-weight: 600;
      margin-bottom: 20px;
      text-align: center;
    }

    .instruction {
      font-size: 16px;
      margin-bottom: 20px;
    }
 .buttons {
      display: flex;
      gap: 20px;
    }

    .buttons button {
      padding: 12px 20px;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      font-family: 'Poppins', Arial, sans-serif; /* Ensure Poppins font */
    }

    .buttons .quiz {
  background-color:#e636a4;
      color:white;
box-shadow:0 2px 8px #f7c6e6;
    
      width:180px;
      font-size:1.05rem;
      font-weight:bold;
    }

    .buttons .task {
   
       background-color:#f1ccdd;
    color:white;
      opacity:0.7;
    width:180px;
    font-size:1.05rem;
      cursor:not-allowed;
    font-weight:bold;
        box-shadow:0 2px 8px #f7c6e6;
    }
.history {
      background-color:#e636a4;
      color:white;
      font-weight:bold;
      padding:10px 32px;
      border-radius:8px;
      border:none;
      font-size:1.05rem;
      width:180px;
      margin-bottom:10px;
      box-shadow:0 2px 8px #f7c6e6;
    }
    
    /* Modal Styles */
    #addContentModal {
      display: none;
      position: fixed;
      top: 0; left: 0; width: 100vw; height: 100vh;
      background: rgba(0,0,0,0.18);
      z-index: 2000;
      justify-content: center;
      align-items: center;
    }
    #addContentModal.active {
      display: flex;
    }
    .add-content-modal-box {
      background: #fff;
      border-radius: 16px;
      max-width: 480px;
      width: 95vw;
      padding: 32px 28px 28px 28px;
      box-shadow: 0 6px 32px rgba(0,0,0,0.13);
      position: relative;
    }
    .add-content-modal-close {
      position: absolute;
      top: 18px;
      right: 24px;
      font-size: 1.5rem;
      background: none;
      border: none;
      cursor: pointer;
    }
    .add-content-modal-title {
      font-size: 1.35rem;
      font-weight: 700;
      margin-bottom: 18px;
    }
    .add-content-modal-label {
      font-weight: 500;
    }
    .add-content-modal-input {
      width: 70%;
      margin-left: 12px;
      padding: 6px 10px;
      border-radius: 6px;
      border: 1.2px solid #ccc;
      font-size: 1rem;
    }
    .add-content-modal-clear {
      float: right;
      font-size: 0.97rem;
      color: #888;
      cursor: pointer;
    }
    .add-content-modal-note {
      font-size: 0.98rem;
      color: #888;
      margin-bottom: 18px;
    }
    .add-content-modal-import {
      display: flex;
      align-items: center;
      gap: 18px;
      background: #f7f7fb;
      border: 2px dashed #b983ff;
      padding: 18px 18px 18px 0;
      border-radius: 12px;
      margin-bottom: 24px;
    }
    .add-content-modal-import-img {
      width: 110px;
      height: 90px;
      object-fit: contain;
      margin-left: 18px;
    }
    .add-content-modal-import-title {
      font-weight: 600;
      font-size: 1.08rem;
      margin-bottom: 6px;
    }
    .add-content-modal-import-desc {
      font-size: 0.98rem;
      color: #444;
      margin-bottom: 10px;
    }
    .add-content-modal-import-btn {
      background: #f23eb3;
      color: #fff;
      font-weight: 600;
      border: none;
      border-radius: 8px;
      padding: 8px 22px;
      font-size: 1rem;
      cursor: pointer;
    }
    .add-content-modal-footer {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 12px;
      justify-content: center;
    }
    .add-content-modal-add-btn {
      background: linear-gradient(90deg,#e636a4 0%,#b983ff 100%);
      color: #fff;
      border: none;
      border-radius: 24px;
      padding: 12px 48px;
      font-size: 1.08rem;
      font-weight: 700;
      letter-spacing: 1.2px;
      box-shadow: 0 2px 8px #f7c6e6;
      cursor: pointer;
    }
    .create-own-quiz-btn {
      padding: 12px 32px;
      border: none;
      border-radius: 32px;
      font-weight: bold;
      font-size: 1rem;
      color: #fff;
      cursor: pointer;
      background: linear-gradient(90deg,#f23eb3 0%,#b983ff 100%);
      box-shadow: 0 2px 8px #f7c6e6;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
    <!-- Navbar -->
 <div class="navbar">
    <div class="navbar-logo">
      <a href="<?= base_url('homepage_initial') ?>">
        <img src="<?= base_url('public/img/Logo.png') ?>" alt="logo" class="logo"/>
      </a>
    </div>
    <div class="navbar-center">
    <a href="<?= base_url('/') ?>">HOME</a>
          <a href="<?= base_url('dashboard') ?>">DASHBOARD</a>
       <a href="<?= base_url('aboutus') ?>">ABOUT</a>
        <a href="<?= base_url('allcourses') ?>">COURSES</a>
    </div>
    <div class="navbar-right">
      <input type="text" placeholder="Search.." />
      <button>+ Add Content</button>
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

<div class="container">
    <div class="create-box">
      Let’s<br>Create!
    </div>
    <div class="instruction">Create your first quiz</div>
    <div style="display: flex; flex-direction: column; align-items: center; gap: 16px; width: 100%;">
      <button class="history">View History</button>
      <div class="buttons" style="gap: 20px; width: 100%; justify-content: center;">
        <button class="quiz" >Create a quiz</button>
        <button class="task" disabled>Create a Task</button>
      </div>
    </div>
  </div>
<!-- Add Content Modal -->
  <div id="addContentModal">
    <div class="add-content-modal-box">
      <button id="closeAddContentModal" class="add-content-modal-close">&times;</button>
      <div class="add-content-modal-title">Add Content</div>
      <div style="margin-bottom:12px;">
        <label for="taskName" class="add-content-modal-label">Quiz Name:</label>
        <input id="taskName" type="text" class="add-content-modal-input">
        <span class="add-content-modal-clear">Clear all</span>
      </div>
      <div class="add-content-modal-note">
        Accepted formats: PDF, PNG, PPT, SLIDE, JPG, ZIP (Max size: 50MB)
      </div>
      <div class="add-content-modal-import">
        <img src="public/img/image 10.png" alt="Import" class="add-content-modal-import-img">
        <div>
          <div class="add-content-modal-import-title">Import your own content</div>
          <div class="add-content-modal-import-desc">Import content and get AI generated questions</div>
          <button class="add-content-modal-import-btn">Import content</button>
        </div>
      </div>
      <div class="add-content-modal-footer">
        <button class="add-content-modal-add-btn">ADD</button>
        <button class="create-own-quiz-btn">
          CREATE OWN QUIZ
        </button>
      </div>
    </div>
  </div>

  <script>
    // Modal open/close logic
    document.querySelector('.navbar-right button').addEventListener('click', function() {
      document.getElementById('addContentModal').classList.add('active');
    });
    document.getElementById('closeAddContentModal').addEventListener('click', function() {
      document.getElementById('addContentModal').classList.remove('active');
    });
    // Optional: close modal when clicking outside modal content
    document.getElementById('addContentModal').addEventListener('click', function(e) {
      if (e.target === this) this.classList.remove('active');
    });
  </script>
</body>
</html>