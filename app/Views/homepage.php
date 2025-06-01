<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CrimsonSkillBoost - Home</title>
  <style>
    /* Reset & Base */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      background-color: #1e1e1e;
      color: #000;
    }

    /* NAVBAR */
    .navbar {
      background-color: #fff;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 15px 30px;
      border-bottom: 2px solid #ddd;
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .nav-left,
    .nav-center,
    .nav-right {
      display: flex;
      align-items: center;
    }

    .nav-left img.logo {
      height: 40px;
      margin-right: 20px;
    }

    .nav-center a {
      margin: 0 15px;
      font-weight: 700;
      color: #000;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .nav-center a:hover,
    .nav-center a.active {
      color: #ff00aa;
    }

    .nav-right img.profile,
    .nav-right img.notification {
      height: 35px;
      width: 35px;
      object-fit: cover;
      border-radius: 50%;
      margin-left: 20px;
      cursor: pointer;
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

    /* MAIN CONTENT */
    .main-content {
      background-color: #dcdcdc;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 60px;
      height: calc(100vh - 80px);
    }

    .welcome-text {
      font-size: 3rem;
      font-weight: 800;
      color: #000;
    }

    .image-box {
      width: 300px;
      height: 300px;
      background: linear-gradient(to bottom right, #7baeff, #7a1b8e);
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 12px;
      color: #fff;
      font-size: 1.8rem;
      font-weight: bold;
      text-align: center;
      line-height: 1.5;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .main-content {
        flex-direction: column;
        text-align: center;
        padding: 40px 20px;
      }

      .welcome-text {
        margin-bottom: 30px;
      }

      .nav-center {
        display: none;
      }
    }
  </style>
</head>
<body>

  <div class="navbar">
    <div class="nav-left">
      <img src="<?= base_url('public/img/logo.png') ?>" class="logo" alt="Logo">
    </div>
    <div class="nav-center">
      <a href="<?= base_url('homepage') ?>" class="active">HOME</a>
      <a href="<?= base_url('dashboard') ?>">DASHBOARD</a>
      <a href="<?= base_url('aboutus') ?>">ABOUT</a>
      <a href="<?= base_url('courses') ?>">COURSES</a>
    </div>
    <div class="nav-right">
      <img src="<?= base_url('public/img/notification.png') ?>" class="notification" alt="Notifications">
      <img src="<?= base_url('public/img/profile.jpg') ?>" class="profile" alt="User">
      <button id="signOutButton">Sign Out</button>
    </div>
  </div>

  <div class="main-content">
    <div class="welcome-text">WELCOME</div>
    <div class="image-box">IMAGE<br>SAMPLE</div>
  </div>

  <!-- Firebase Scripts -->
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
  <script src="<?= base_url('public/js/firebase-config.js') ?>"></script>

  <script>
    document.getElementById("signOutButton").addEventListener("click", function () {
      firebase.auth().signOut().then(() => {
        // Sign-out successful
        window.location.href = "<?= base_url('login') ?>";
      }).catch((error) => {
        alert("Error signing out: " + error.message);
      });
    });
  </script>
</body>
</html>
