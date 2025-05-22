<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CrimsonSkillBoost - Dashboard</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      background-color: #f2f2f2;
    }

    .navbar {
      background-color: #fff;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 15px 30px;
      border-bottom: 2px solid #ddd;
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
    }

    .nav-center a.active {
      color: #ff00aa;
    }

    .nav-right {
      display: flex;
      align-items: center;
    }

    .nav-right img {
      height: 35px;
      width: 35px;
      border-radius: 50%;
      margin-left: 20px;
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

    .dashboard-container {
      display: flex;
      justify-content: space-between;
      padding: 40px;
      gap: 30px;
    }

    .left-panel {
      flex: 2;
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    }

    .right-panel {
      flex: 1;
      background: #f0f6ff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    }

    .section-title {
      font-size: 20px;
      font-weight: 700;
      margin-bottom: 20px;
    }

    .course-card, .enroll-card, .submission-card {
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 20px;
      margin-bottom: 20px;
      display: flex;
      align-items: flex-start;
      gap: 15px;
    }

    .course-img, .submission-avatar {
      width: 60px;
      height: 60px;
      background: #ddd;
      border-radius: 8px;
    }

    .submission-avatar {
      border-radius: 50%;
      font-size: 18px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #dab6fc;
      color: #fff;
      font-weight: 600;
    }

    .course-details,
    .submission-details {
      flex: 1;
    }

    .course-title,
    .enroll-title,
    .submission-header {
      font-weight: 700;
      margin-bottom: 5px;
    }

    .course-desc,
    .enroll-desc,
    .submission-subhead {
      font-size: 14px;
      color: #555;
    }

    .btn {
      padding: 6px 12px;
      border: none;
      background-color: #eee;
      border-radius: 6px;
      cursor: pointer;
      font-weight: 500;
      margin-top: 10px;
    }

    .view-btn {
      background: #e0e0e0;
    }

    .submission-card {
      background: #fceeff;
      justify-content: space-between;
      align-items: center;
    }

    .submission-actions {
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .submission-actions div {
      width: 20px;
      height: 20px;
      background: #bbb;
      border-radius: 4px;
    }

    @media (max-width: 768px) {
      .dashboard-container {
        flex-direction: column;
        padding: 20px;
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
      <a href="<?= base_url('homepage') ?>">HOME</a>
      <a href="<?= base_url('dashboard') ?>" class="active">DASHBOARD</a>
      <a href="<?= base_url('about') ?>">ABOUT</a>
      <a href="<?= base_url('courses') ?>">COURSES</a>
    </div>
    <div class="nav-right">
      <img src="<?= base_url('public/img/bell.png') ?>" alt="Notifications">
      <img src="<?= base_url('public/img/profile.jpg') ?>" alt="Profile">
      <button id="signOutButton">Sign Out</button>
    </div>
  </div>

  <div class="dashboard-container">
    <!-- LEFT PANEL -->
    <div class="left-panel">
      <div class="section-title">Active Lessons</div>
      <?php if (!empty($lessons)): ?>
        <?php foreach ($lessons as $lesson): ?>
          <div class="course-card">
            <div class="course-img"></div>
            <div class="course-details">
              <div class="course-title"><?= esc($lesson['title']) ?></div>
              <div class="course-desc"><?= esc(word_limiter(strip_tags($lesson['content']), 20)) ?></div>
              <a class="btn" href="<?= base_url('lesson/' . $lesson['id']) ?>">View</a>
              <a class="btn" href="<?= base_url('lessons/edit/' . $lesson['id']) ?>">Edit</a>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>No lessons found.</p>
      <?php endif; ?>
    </div>

    <!-- RIGHT PANEL -->
    <div class="right-panel">
      <div class="section-title">Enrollment Requests</div>
      <div class="enroll-card">
        <div>
          <div class="enroll-title">Title</div>
          <div class="enroll-desc">This section will show student requests.</div>
          <button class="btn view-btn">View</button>
        </div>
      </div>

      <div class="section-title" style="margin-top: 30px;">Recent Submissions</div>
      <?php for ($i = 0; $i < 3; $i++): ?>
        <div class="submission-card">
          <div style="display: flex; align-items: center; gap: 10px;">
            <div class="submission-avatar">A</div>
            <div class="submission-details">
              <div class="submission-header">Header</div>
              <div class="submission-subhead">Subhead</div>
            </div>
          </div>
          <div class="submission-actions">
            <div></div>
            <div></div>
          </div>
        </div>
      <?php endfor; ?>
    </div>
  </div>

  <!-- Firebase Scripts (optional) -->
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
