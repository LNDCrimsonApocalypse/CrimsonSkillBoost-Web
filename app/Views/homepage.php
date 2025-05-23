<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CrimsonSkillBoost - Home</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
      background: radial-gradient(50% 50% at 50% 50%, #FFE8EC 25%, #F7D5EF 50%, #F4E3F9 100%);
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 40px;
      background: linear-gradient(to right, #f8eaff, #f3d9ff);
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .logo-section {
      display: flex;
      align-items: center;
    }

    .logo-section img.logo {
      height: 40px;
      margin-right: 10px;
    }

    .name {
      font-size: 1.2rem;
      font-weight: bold;
      color: #000;
    }

    .nav-links {
      list-style: none;
      display: flex;
      gap: 30px;
    }

    .nav-links li a, .dropbtn {
      text-decoration: none;
      color: #000;
      font-size: 1.1rem;
      position: relative;
      background: none;
      border: none;
      cursor: pointer;
    }

    .nav-links li a:hover,
    .dropbtn:hover {
      color: #aa00ff;
    }

    .dropdown {
      position: relative;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #fff;
      min-width: 200px;
      padding: 10px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
      z-index: 1;
      border-radius: 6px;
    }

    .dropdown-content select {
      width: 100%;
      padding: 6px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .hero {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 60px 80px;
      min-height: 80vh;
      background: linear-gradient(to bottom right, #f8eaff, #e8ceff);
    }

    .hero-text {
      flex: 1;
      max-width: 50%;
    }

    .hero-text h1 {
      font-size: 1.8rem;
      color: #222;
      line-height: 1.6;
    }

    .hero-text .highlight {
      color: #aa00ff;
      font-weight: bold;
    }

    .subtitle {
      margin-top: 10px;
      font-size: 0.95rem;
      color: #555;
      font-style: italic;
    }

    .hero-buttons {
      margin-top: 25px;
      display: flex;
      gap: 15px;
    }

    .btn {
      padding: 10px 20px;
      border-radius: 20px;
      text-decoration: none;
      font-size: 0.95rem;
      font-weight: 500;
      display: inline-flex;
      align-items: center;
      gap: 5px;
      transition: all 0.3s ease;
    }

    .btn.login {
      background: white;
      color: #7d00b2;
      border: 1px solid #c077f2;
    }

    .btn.signup {
      background: #aa00ff;
      color: white;
      border: none;
    }

    .btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(170, 0, 255, 0.2);
    }

    .hero-image {
      flex: 1;
      display: flex;
      justify-content: center;
    }

    .image-placeholder {
      width: 300px;
      height: 200px;
      background-color: #ccc;
      border-radius: 8px;
    }

    #signOutButton {
      margin-left: 20px;
      padding: 8px 16px;
      border: none;
      border-radius: 20px;
      background-color: #ff4081;
      color: white;
      font-weight: bold;
      cursor: pointer;
    }
  </style>
</head>
<body>

  <nav class="navbar">
    <div class="logo-section">
      <img src="<?= base_url('public/img/logo.png') ?>" class="logo" alt="Logo" />
      <span class="name">CRIMSONSkillBoost</span>
    </div>
    <ul class="nav-links">
      <li><a href="<?= base_url('homepage') ?>">Home</a></li>
      <li class="dropdown">
        <button class="dropbtn">Courses</button>
        <div class="dropdown-content">
          <select id="course-select">
            <option value="web">Computer Programming 1</option>
            <option value="data">Computer Programming 2</option>
            <option value="ai">Information Management</option>
            <option value="ic">Introduction to Computing</option>
            <option value="wbt">Web Development Tools</option>
            <option value="wbd">Web Applications Development</option>
            <option value="oop">Object Oriented Programming</option>
            <option value="mad">Mobile Applications Development</option>
          </select>
        </div>
      </li>
      <li><a href="<?= base_url('about') ?>">About</a></li>
      <li><button id="signOutButton">Sign Out</button></li>
    </ul>
  </nav>

  <section class="hero">
    <div class="hero-text">
      <h1>
        Mastery begins with teaching<br />
        and learning <strong>empower students</strong>, <strong>enhance skills</strong>,<br />
        and shape the future with <span class="highlight">CRIMSONSkillBoost</span>.
      </h1>
      <p class="subtitle">Crimson Skill Boost <em>Empowering Educators, Elevating Learners.</em></p>
      <div class="hero-buttons">
        <a href="<?= base_url('login') ?>" class="btn login">Login</a>
        <a href="<?= base_url('register') ?>" class="btn signup">Sign Up</a>
      </div>
    </div>
    <div class="hero-image">
      <div class="image-placeholder"></div>
    </div>
  </section>

  <!-- Firebase Scripts -->
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
  <script src="<?= base_url('public/js/firebase-config.js') ?>"></script>

  <script>
    document.getElementById("signOutButton").addEventListener("click", function () {
      firebase.auth().signOut().then(() => {
        window.location.href = "<?= base_url('login') ?>";
      }).catch((error) => {
        alert("Error signing out: " + error.message);
      });
    });
  </script>

</body>
</html>
