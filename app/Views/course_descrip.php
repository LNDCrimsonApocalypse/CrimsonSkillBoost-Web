<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= esc($course['title']) ?> - Course Dashboard</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      background: #fcf6fd;
      font-family: 'Poppins', 'Segoe UI', sans-serif;
      color: #222;
    }
    .navbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 40px;
      background: #fff;
    }
    .navbar-left img {
      width: 56px;
      height: 56px;
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
      font-size: 1.3rem;
      text-decoration: none;
      color: #222;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: color 0.2s;
    }
    .navbar-center a.active {
      color: #000;
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
      border-radius: 50%;
      object-fit: cover;
      border: none;
      background: #fff;
    }
    .container {
      display: flex;
      gap: 32px;
      padding: 36px 60px;
      max-width: 1300px;
      margin: 0 auto;
    }
    .main-content {
      flex: 2.3;
      display: flex;
      flex-direction: column;
      gap: 28px;
    }
    .main-card {
      background: #fff;
      border-radius: 18px;
      box-shadow: 0 2px 12px rgba(160, 108, 213, 0.07);
      padding: 30px 32px;
      margin-bottom: 0;
    }
    .course-title {
      font-size: 2.6rem;
      font-weight: 700;
      margin-bottom: 8px;
      letter-spacing: 0.5px;
    }
    .students-count {
      font-size: 1rem;
      color: #a06cd5;
      margin-bottom: 10px;
      display: flex;
      align-items: center;
      gap: 6px;
    }
    .course-desc {
      color: #5f5f5f;
      font-size: 1.05rem;
      margin-bottom: 0;
      line-height: 1.6;
    }
    .section-block {
      margin-top: 18px;
      background: #ede3fa;
      border-radius: 12px;
      box-shadow: 0 1px 4px rgba(160, 108, 213, 0.04);
      padding-bottom: 0;
    }
    .section-title {
      font-size: 1.12rem;
      font-weight: 700;
      background: #a892e6;
      color: #3d2067;
      padding: 10px 22px;
      border-radius: 12px 12px 0 0;
      margin: 0;
      letter-spacing: 0.2px;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .section-content {
      background: #fff;
      border-radius: 0 0 12px 12px;
      padding: 18px 22px;
      font-size: 1.05rem;
      color: #3d2067;
    }
    .topic-list {
      background: #fff;
      border-radius: 0 0 12px 12px;
      padding: 0;
      margin: 0;
      list-style: none;
    }
    .topic-item {
      padding: 14px 22px;
      font-size: 1rem;
      color: #3d2067;
      border-bottom: 1px solid #e0d3f7;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .topic-item:last-child {
      border-bottom: none;
    }
    .sidebar {
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 24px;
      max-width: 320px;
    }
    .profile-card {
      background: #fff;
      border-radius: 18px;
      box-shadow: 0 2px 12px rgba(160, 108, 213, 0.07);
      padding: 30px 32px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .profile-pic {
      width: 110px;
      height: 110px;
      border-radius: 50%;
      background: #e0e0e0;
      object-fit: cover;
      margin-bottom: 18px;
      border: 3px solid #fff;
      box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }
    .prof-name {
      font-weight: 700;
      font-size: 1.18rem;
      color: #3d2067;
      margin-bottom: 10px;
      text-align: center;
    }
    .start-btn {
      background: #e64ecb;
      color: #fff;
      font-weight: 700;
      font-size: 1.05rem;
      border: none;
      border-radius: 30px;
      padding: 13px 32px;
      margin-bottom: 20px;
      cursor: pointer;
      transition: background 0.18s;
      display: block;
      text-align: center;
      text-decoration: none;
    }
    .start-btn:hover {
      background: #a06cd5;
    }
    .includes-list {
      width: 100%;
      font-size: 1rem;
      color: #3d2067;
      padding-left: 0;
      margin: 0;
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 11px;
    }
    .includes-list li {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .step { color: #4e8be6; }
    .hands { color: #45c27d; }
    .problem { color: #f7b500; }
    .quiz { color: #a06cd5; }
    .tools { color: #e64ecb; }
    .support { color: #a06cd5; }
    @media (max-width: 1050px) {
      .container {
        flex-direction: column;
        padding: 18px 8vw;
      }
      .sidebar {
        max-width: 100%;
      }
    }
    @media (max-width: 700px) {
      .container {
        padding: 12px 2vw;
      }
      .main-content, .sidebar {
        padding: 0;
      }
    }
  </style>
</head>
<body>
  <!-- NAVBAR -->
  <nav class="navbar">
    <div class="navbar-left">
      <img src="<?= base_url('public/img/Logo.png') ?>" alt="Logo" />
    </div>
    <div class="navbar-center">
      <a href="<?= base_url('/') ?>">HOME</a>
      <a href="<?= base_url('dashboard') ?>">DASHBOARD</a>
      <a href="<?= base_url('aboutus') ?>">ABOUT</a>
      <a href="<?= base_url('allcourses') ?>">COURSES</a>
    </div>
    <div class="navbar-right">
      <img src="<?= base_url('public/img/notifications.png') ?>" alt="Notifications" class="icon" />
      <img src="" id="navbar-profile-pic" alt="Profile" class="navbar-profile" style="cursor:pointer;" onclick="window.location.href='<?= base_url('editprofile') ?>'" />
    </div>
  </nav>
  <div class="container">
    <div class="main-content">
      <div class="main-card">
        <div class="course-title"><?= esc($course['title']) ?></div>
        <div class="students-count">
          <i>&#128101;</i> <?= esc($course['students']) ?> students
        </div>
        <div class="course-desc"><?= esc($course['description']) ?></div>
      </div>
      <div class="section-block">
        <div class="section-title">Course Overview</div>
        <div class="section-content"><?= esc($course['overview']) ?></div>
      </div>
      <div class="section-block">
        <div class="section-title">Topic Overview</div>
        <ul class="topic-list" id="topicList">
          <!-- Topics will be loaded by JS -->
        </ul>
      </div>
      <?php if (!empty($course['requirements'])): ?>
      <div class="section-block">
        <div class="section-title">Requirements</div>
        <ul class="topic-list">
          <?php foreach ($course['requirements'] as $req): ?>
            <li class="topic-item"><?= esc($req) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <?php endif; ?>
    </div>
    <div class="sidebar">
      <div class="profile-card">
        <img src="<?= base_url('public/img/profile.png') ?>" id="sidebar-profile-pic" alt="Professor Nicholas Aguinaldo" class="profile-pic">
        <div class="prof-name"><?= isset($course['instructor']) ? esc($course['instructor']) : 'Professor Nicholas Aguinaldo' ?></div>
        <a href="<?= base_url('topics/' . (isset($course['id']) ? $course['id'] : '')) ?>" class="start-btn" style="display:block;text-align:center;text-decoration:none;">GET YOUR STUDENT STARTED</a>
        <ul class="includes-list">
          <li><span class="step">&#128214;</span> Step-by-step lessons</li>
          <li><span class="hands">&#128187;</span> Hands-on coding exercises</li>
          <li><span class="problem">&#129504;</span> Problem-solving activities</li>
          <li><span class="quiz">&#9997;&#65039;</span> Quizzes and assessments</li>
          <li><span class="tools">&#128295;</span> Introduce to real coding tools</li>
          <li><span class="support">&#128172;</span> Instructor support and guidance</li>
        </ul>
      </div>
    </div>
  </div>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
  <script src="<?= base_url('public/js/firebase-config.js') ?>"></script>
  <script>
  firebase.auth().onAuthStateChanged(async function(user) {
    if (user) {
      try {
        const doc = await firebase.firestore().collection("users").doc(user.uid).get();
        if (doc.exists) {
          const data = doc.data();
          // Sidebar profile image
          const sidebarImg = document.getElementById("sidebar-profile-pic");
          if (sidebarImg) {
            sidebarImg.src = data.photoURL || "public/img/profile.png";
          }
          // Top right navbar profile image
          const navbarImg = document.getElementById("navbar-profile-pic");
          if (navbarImg) {
            navbarImg.src = data.photoURL || "public/img/profile.png";
          }
        }
      } catch (err) {}
    }
  });
  </script>
</body>
</html>