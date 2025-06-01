
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

    .navbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: #eec8e6;
      padding: 10px 40px;
    }

 .navbar-left {
      display: flex;
      align-items: center;
      gap: 18px;
    }
    .navbar-logo {
      width: 40px;
      height: 40px;
      object-fit: contain;
    }

    .navbar-center {
      display: flex;
      gap: 36px;
      align-items: center;
    }

    .navbar-center a {
      font-family: 'Montserrat', Arial, sans-serif;
      font-weight: 700;
      font-size: 1.35rem;
      text-decoration: none;
      color: #222;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: color 0.2s;
    }

    .navbar-center a.active {
      color: #222;
      font-weight: 900;
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
      width: 38px;
      height: 38px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid #eee;
      background: #fff;
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
  <nav class="navbar">
    <div class="navbar-left">
     <img src="<?= base_url('img/Logo.png') ?>" alt="Logo" />
    </div>
    <div class="navbar-center">
      <a href="#">HOME</a>
      <a href="#" class="active">DASHBOARD</a>
      <a href="#">ABOUT</a>
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
