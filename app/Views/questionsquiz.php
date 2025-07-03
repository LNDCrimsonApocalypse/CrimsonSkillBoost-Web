<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Quiz Builder</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: #ffeeff;
    }

    /* NAVBAR */
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

    /* MAIN */
    .main {
      padding: 40px;
    }

    textarea.question-box {
      width: 100%;
      height: 120px;
      font-size: 1.5rem;
      font-weight: 500;
      border: 1px solid #ccc;
      border-radius: 8px;
      padding: 16px;
      resize: none;
      background: #fff;
      color: #555;
      box-sizing: border-box;
    }

    .options-container {
      display: flex;
      gap: 20px;
      margin-top: 30px;
      flex-wrap: wrap;
    }

    .option-card {
      flex: 1 1 160px;
      min-width: 160px;
      background: #ccc;
      border-radius: 10px;
      color: #fff;
      padding: 20px;
      position: relative;
      font-weight: 500;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100px;
    }

    .option-card .icons {
      position: absolute;
      top: 8px;
      right: 10px;
      font-size: 0.8rem;
    }

    .option-card .radio {
      position: absolute;
      bottom: 8px;
      right: 10px;
    }

    .option-purple { background: #7d259b; }
    .option-blue { background: #a5b8ff; }
    .option-pink { background: #fa6bb2; }
    .option-red { background: #f44336; }

    .add-option {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 36px;
      height: 36px;
      background: #eee;
      border-radius: 6px;
      cursor: pointer;
      font-weight: bold;
    }

    .save-button {
      margin-top: 30px;
      background: #e636a4;
      color: white;
      padding: 12px 28px;
      border: none;
      border-radius: 6px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      float: right;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .save-button:hover {
      background: #cc298f;
    }

    .save-button i {
      font-style: normal;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <!-- NAVBAR -->
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

  <!-- SUBNAV -->
  <div class="tabbar">
      <a href="<?= base_url('topics') ?>"><span>Topic</span></a>
    <a href="<?= base_url('create_task') ?>"> <span>Task</span></a>
    <a href="<?= base_url('create_quiz') ?>"><span>Quiz</span></a>
   <a href="<?= base_url('studentprog') ?>"> <span>Student</span></a>
  </div>

  <!-- MAIN CONTENT -->
  <div class="main">
    <textarea class="question-box" placeholder="Type question here"></textarea>

    <div class="options-container">
      <div class="option-card option-purple">
        Type answer option here
        <div class="icons">✎ 🗑</div>
        <div class="radio">◯</div>
      </div>
      <div class="option-card option-blue">
        Type answer option here
        <div class="icons">✎ 🗑</div>
        <div class="radio">◯</div>
      </div>
      <div class="option-card option-pink">
        Type answer option here
        <div class="icons">✎ 🗑</div>
        <div class="radio">◯</div>
      </div>
      <div class="option-card option-red">
        Type answer option here
        <div class="icons">✎ 🗑</div>
        <div class="radio">◯</div>
      </div>
      <div class="add-option">+</div>
    </div>

    <button class="save-button"onclick="window.location.href='<?= base_url('questionsquiz2') ?>'"><i>💾</i> Save Question</button>
  </div>

</body>
</html>
