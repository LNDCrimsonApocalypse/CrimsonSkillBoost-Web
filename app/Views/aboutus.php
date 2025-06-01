<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>About Us - CrimsonSkillBoost</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=DM+Serif+Display&family=Inter:wght@400;500&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      background: #fff;
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
      padding: 12px 16px;
      font-size: 1rem;
      border: none;
      background: none;
      appearance: none;
      cursor: pointer;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .icon {
      width: 48px;
      height: 48px;
      object-fit: cover;
    }

    .about-section {
      background: linear-gradient(120deg, #fdeef4 60%, #fff 100%);
      min-height: 100vh;
      padding: 0 0 60px 0;
    }

    .about-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 48px 24px 0 24px;
      display: flex;
      flex-wrap: wrap;
      gap: 32px;
      align-items: flex-start;
    }

    .about-left {
      flex: 1 1 380px;
      min-width: 330px;
    }

    .about-title {
      font-family: 'DM Serif Display', serif;
      font-size: 3rem;
      letter-spacing: 4px;
      margin: 0 0 16px 0;
      color: #222;
      font-weight: 400;
      border-bottom: 2px solid #222;
      display: inline-block;
      padding-bottom: 8px;
    }

    .about-card {
      background: #eec8e6;
      border-radius: 18px;
      padding: 22px 24px;
      margin-top: 32px;
      font-size: 1.05rem;
      color: #444;
      box-shadow: 0 2px 12px rgba(200,44,142,0.04);
      line-height: 1.6;
      font-family: 'Inter', Arial, sans-serif;
    }

    .about-right {
      flex: 1 1 340px;
      min-width: 300px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      margin-top: 10%;
    }

    .about-illustration {
      width: 95%;
      max-width: 350px;
      margin-bottom: 18px;
      margin-top: 18px;
      display: block;
    }

    .about-brand {
      font-family: 'DM Serif Display', serif;
      font-size: 2.1rem;
      color: #222;
      font-weight: 600;
      text-align: center;
      letter-spacing: 1px;
      margin-top: 0;
    }

    .about-wave {
      width: 100%;
      margin-top: 30px;
      display: block;
    }

    @media (max-width: 900px) {
      .about-container {
        flex-direction: column;
        gap: 12px;
        align-items: stretch;
      }

      .about-left, .about-right {
        min-width: 0;
        width: 100%;
      }

      .about-title {
        font-size: 2.1rem;
      }

      .about-brand {
        font-size: 1.3rem;
      }

      .about-illustration {
        max-width: 220px;
      }
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
  <!-- Navbar -->
  <div class="navbar">
    <div class="navbar-logo">
      <img src="imgs/Logo.png" alt="logo" class="logo"/>
    </div>
    <div class="navbar-center">
      <a href="<?= base_url('homepage') ?>">HOME</a>
      <a href="<?= base_url('dashboard') ?>">DASHBOARD</a>
      <a href="<?= base_url('aboutus') ?>">ABOUT</a>
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
      <button id="signOutButton" class="logout-btn">Sign Out</button>
    </div>
  </div>

  <!-- ABOUT SECTION -->
  <section class="about-section">
    <div class="about-container">
      <div class="about-left">
        <div class="about-title">ABOUT US</div>
        <div class="about-card">
          “CMO” (pronounced as Si-Mo), short for Crimson Metaverse Operators, represents a futuristic and innovative group blending elements of technology and mysticism. The imagery of circuits and molecular-like designs on the periphery signifies their expertise in cutting-edge technologies, including mobile and web apps, games and interactive virtual experience. The central focus on a crimson blood moon adorned with flowers suggests a harmonious balance between creativity and precision. The crescents and celestial elements symbolize growth, phases of innovation, and a connection to a broader cosmic perspective. One of CMO’s remarkable projects is called “CrimsonSkillBoost: The Development of Computer Science Learning Hub”.
        </div>
      </div>
      <div class="about-right">
        <img class="about-illustration" src="<?= base_url('imgs/grp.png') ?>" alt="Team Illustration">
        <div class="about-brand">CRIMSONSKILLBOOST</div>
      </div>
    </div>

    <!-- Decorative wave -->
    <svg class="about-wave" viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path fill="#e636a4" fill-opacity="0.9" d="M0,80 C360,160 1080,0 1440,80 L1440,120 L0,120 Z"></path>
      <path fill="#c92c8e" fill-opacity="0.7" d="M0,100 C360,180 1080,20 1440,100 L1440,120 L0,120 Z"></path>
      <path fill="#fdeef4" fill-opacity="1" d="M0,120 C360,200 1080,40 1440,120 L1440,120 L0,120 Z"></path>
    </svg>
  </section>
</body>
</html>
