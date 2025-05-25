<!-- app/Views/home.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Welcome Educator</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=DM+Serif+Display&family=Inter:wght@400;500&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      background: #fff;
      font-family: 'Inter', Arial, sans-serif;
    }
    .navbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 32px 40px 0 40px;
      background: #fff;
    }
    .navbar-left {
      display: flex;
      align-items: center;
      gap: 18px;
    }
    .navbar-logo {
      width: 52px;
      height: 52px;
      object-fit: contain;
    }
    .navbar-center {
      display: flex;
      gap: 36px;
      align-items: center;
    }
    .navbar-center a {
      font-weight: 500;
      font-size: 1.35rem;
      text-decoration: none;
      color: black;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: color 0.2s;
    }
    .navbar-center a.active {
      color: #222;
      font-weight: 900;
    }
    .navbar-right {
      display: flex;
      align-items: center;
      gap: 22px;
    }
    .icon {
      width: 48px;
      height: 48px;
      object-fit: cover;
    }
    .navbar-profile {
      width: 48px;
      height: 48px;
      object-fit: cover;
      border-radius: 50%;
      border: 2px solid #eee;
      background: #e636a4;
    }
    .main-section {
      display: flex;
      align-items: stretch;
      justify-content: center;
      margin-top: 24px;
      min-height: 78vh;
    }
    .welcome-card {
      flex: 1.1;
      background: #fdeef4;
      padding: 56px 46px 56px 56px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      min-width: 350px;
      max-width: 520px;
    }
    .welcome-title {
      font-family: 'DM Serif Display', serif;
      font-size: 2.6rem;
      font-weight: 400;
      margin: 0 0 18px 0;
      color: #222;
      letter-spacing: 1px;
    }
    .welcome-desc {
      font-family: 'Inter', Arial, sans-serif;
      font-size: 1.13rem;
      color: #444;
      margin-bottom: 28px;
      max-width: 420px;
      line-height: 1.5;
    }
    .welcome-btn {
      background: #e636a4;
      color: black;
      font-weight: 700;
      border: none;
      border-radius: 8px;
      font-size: 1.08rem;
      padding: 10px 22px;
      cursor: pointer;
      box-shadow: 0 2px 8px rgba(230,54,164,0.04);
      display: inline-block;
      animation: btn 4s alternate;
      text-decoration: none;
      text-align: center;
      display: inline-block;
    }
    .welcome-btn:hover {
      background: #c92c8e;
    }
    @keyframes btn {
      from { background-color: #e636a4; }
      to { background-color: #FFC5D3; }
    }
    .main-illustration {
      flex: 1.3;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #fff;
      min-width: 0;
      padding: 40px 0;
    }
    .main-illustration img {
      max-width: 92%;
      height: auto;
      display: block;
    }
    @media (max-width: 1000px) {
      .main-section {
        flex-direction: column;
        align-items: stretch;
      }
      .welcome-card, .main-illustration {
        max-width: 100%;
        padding: 32px 18px;
      }
      .welcome-title {
        font-size: 2rem;
      }
      .main-illustration {
        justify-content: flex-start;
      }
    }
    @media (max-width: 700px) {
      .navbar {
        flex-direction: column;
        gap: 14px;
        padding: 18px 10px 0 10px;
      }
      .main-section {
        flex-direction: column;
        margin-top: 10px;
      }
      .welcome-card {
        padding: 22px 8vw;
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
    .dropdown {
      position: relative;
    }
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: white;
      min-width: 160px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.1);
      z-index: 1;
    }
    .dropdown-content select {
      width: 100%;
      padding: 10px;
      border: none;
      background: transparent;
      font-size: 1rem;
      font-family: 'Inter', sans-serif;
    }
    .dropdown:hover .dropdown-content {
      display: block;
    }
    .arrow {
      font-size: 1.2rem;
      margin-left: 4px;
      vertical-align: middle;
    }
    li {
      font-weight: bold;
      list-style-type: none;
      padding: 0;
      margin: 0;
    }
  </style>
</head>
<body>
  <!-- NAVBAR -->
  <nav class="navbar">
    <div class="navbar-left">
      <img src="<?= base_url('imgs/Logo.png') ?>" alt="Logo" class="navbar-logo" />
    </div>
    <div class="navbar-center">
      <a href="#">HOME</a>
      <a href="<?= base_url('dashboard') ?>" class="active">DASHBOARD</a>
      <a href="<?= base_url('aboutus') ?>">ABOUT</a>
      <li class="dropdown">
        <button class="dropbtn">COURSES ▼</button>
        <div class="dropdown-content">
          <select id="course-select">
            <option value="web">ALL COURSES</option>
            <option value="data">MY COURSES</option>
          </select>
        </div>
      </li>
    </div>
    <div class="navbar-right">
      <img src="<?= base_url('imgs/notifications.png') ?>" alt="Notifications" class="icon" />
      <img src="<?= base_url('imgs/profile.png') ?>" alt="Profile" class="navbar-profile" />
    </div>
  </nav>

  <!-- MAIN SECTION -->
  <div class="main-section">
    <div class="welcome-card">
      <h1 class="welcome-title">Welcome Educator!</h1>
      <div class="welcome-desc">
        Ready to inspire? Manage your classes, share resources, and connect with your students. Let's make learning enjoyable together!
      </div>
      <a href="<?= base_url('dashboard') ?>" class="welcome-btn">Get Started</a>
    </div>
    <div class="main-illustration">
      <img src="<?= base_url('imgs/image 4.png') ?>" alt="Educator Illustration">
    </div>
  </div>
</body>
</html>
