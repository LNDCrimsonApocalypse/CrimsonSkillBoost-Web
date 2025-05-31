<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CrimsonSkillBoost - Dashboard</title>
  <style>
    body {
      margin: 0;
      font-family: 'Inter', Arial, sans-serif;
      background: linear-gradient(to right, #f8eaff, #f3d9ff);
      color: #222;
    }

    .navbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 18px 40px;
      background: #fff;
      box-shadow: 0 1px 4px rgba(0,0,0,0.03);
    }

    .logo img {
      width: 52px;
    }

    .nav-links {
      display: flex;
      gap: 36px;
      list-style: none;
      font-size: 2rem;
      margin: 0;
      padding: 0;
    }

    .nav-links li {
      cursor: pointer;
      font-size: 1.5rem;
    }

    .active-section {
      color: black;
    }

    .dropdown .arrow {
      font-size: 1rem;
      margin-left: 4px;
    }

    .nav-icons {
      display: flex;
      align-items: center;
      gap: 24px;
    }

    .dropbtn {
      text-decoration: none;
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

    .dropdown-content a {
      padding: 12px 16px;
      display: block;
      color: black;
      text-decoration: none;
    }

    .dropdown-content a:hover {
      background-color: #eee;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .arrow {
      font-size: 1.2rem;
      margin-left: 4px;
      vertical-align: middle;
    }

    .user-img, .notif-img {
      width: 48px;
      height: 48px;
      object-fit: cover;
      border-radius: 50%;
      border: 2px solid #eee;
    }

    .user-img {
      background: #e636a4;
    }

    .card {
      max-width: 1200px;
      margin: 40px auto;
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
      padding: 32px 48px;
    }

    .container {
      display: flex;
      gap: 32px;
    }

    .left-panel {
      flex: 2;
    }

    .left-panel h2 {
      font-size: 1.2rem;
      margin-bottom: 18px;
    }

    .course-card, .empty-card {
      display: flex;
      align-items: flex-start;
      background: #fff;
      border-radius: 10px;
      padding: 18px;
      margin-bottom: 18px;
      box-shadow: 0 1px 6px rgba(0,0,0,0.04);
      min-height: 90px;
    }

    .course-img {
      width: 64px;
      height: 64px;
      background: #eee;
      border-radius: 8px;
      margin-right: 18px;
    }

    .course-info h3 {
      margin: 0 0 6px 0;
      font-size: 1.1rem;
      font-weight: bold;
    }

    .course-info p {
      margin: 0 0 10px 0;
      font-size: 0.97rem;
      color: #444;
    }

    .course-info a.btn, .course-info form button {
      padding: 6px 18px;
      border: none;
      background: #e6e6e6;
      border-radius: 6px;
      cursor: pointer;
      font-size: 1rem;
      margin-right: 10px;
    }

    .right-panel {
      flex: 1.2;
      display: flex;
      flex-direction: column;
      gap: 24px;
    }

    .right-panel h2 {
      font-size: 1.5rem;
      font-weight: bold;
      margin-bottom: 12px;
    }

    .enrollment-requests, .recent-submissions {
      background: #f2f7fc;
      border-radius: 10px;
      padding: 18px 16px;
    }

    .request-card {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      background: #fff;
      border-radius: 8px;
      padding: 12px;
      margin-bottom: 12px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.03);
    }

    .request-info strong {
      font-size: 1.1rem;
    }

    .request-info p {
      font-size: 0.97rem;
      margin: 4px 0 0 0;
      color: #444;
    }

    .submission-card {
      display: flex;
      align-items: center;
      background: #fff;
      border-radius: 8px;
      padding: 10px 12px;
      margin-bottom: 10px;
      box-shadow: 0 1px 2px rgba(0,0,0,0.03);
    }

    .submission-icon {
      width: 36px;
      height: 36px;
      background: #e8e1fc;
      color: #7e51e2;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      font-size: 1.1rem;
      margin-right: 14px;
    }

    .grade-btn {
      display: inline-block;
      background: #e636a4;
      color: white;
      padding: 4px 12px;
      border-radius: 4px;
      text-decoration: none;
      font-size: 0.8em;
      margin-left: 10px;
    }

    .grade-btn:hover {
      background: #d62894;
    }
  </style>
</head>
<body>
  <nav class="navbar">
    <div class="logo">
      <img src="<?= base_url('public/img/logo.png') ?>" alt="Logo">
    </div>
    <ul class="nav-links">
      <li><a href="<?= base_url('homepage') ?>">HOME</a></li>
      <li><span class="active-section">DASHBOARD</span></li>
      <li><a href="<?= base_url('aboutus') ?>">ABOUT</a></li>
      <li><a href="<?= base_url('grading') ?>">GRADING</a></li>
      <li class="dropdown">
        <span>COURSES <span class="arrow">&#9660;</span></span>
        <div class="dropdown-content">
          <a href="<?= base_url('courses') ?>">ALL COURSES</a>
          <a href="#">MY COURSES</a>
        </div>
      </li>
    </ul>
    <div class="nav-icons">
      <img src="<?= base_url('public/img/bell.png') ?>" alt="Notifications" class="notif-img">
      <img src="<?= base_url('public/img/profile.jpg') ?>" alt="Profile" class="user-img">
      <button id="signOutButton" class="dropbtn">Sign Out</button>
    </div>
  </nav>

  <div class="card">
    <main class="container">
      <section class="left-panel">
        <h2>Active Courses</h2>
        <?php if (!empty($courses)): ?>
          <?php foreach ($courses as $course): ?>
            <div class="course-card">
              <div class="course-img"></div>
              <div class="course-info">
                <h3><?= esc($course['course_name']) ?></h3>
                <p>Created on <?= date('F j, Y', strtotime($course['created_at'])) ?></p>
                <a href="<?= base_url('course/view/' . $course['id']) ?>" class="btn">View</a>
                <a href="<?= base_url('course/edit/' . $course['id']) ?>" class="btn">Edit</a>
                <form action="<?= base_url('course/delete/' . $course['id']) ?>" method="post" style="display:inline;">
                  <?= csrf_field() ?>
                  <button type="submit">Delete</button>
                </form>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="empty-card">No courses found.</div>
        <?php endif; ?>
      </section>
      <aside class="right-panel">
        <div class="enrollment-requests">
          <h2>Enrollment Requests</h2>
          <div class="request-card">
            <div class="request-info">
              <strong>California Magpantay</strong>
              <p>Requesting for enrollment in Computer programming language 1 and no.256 student in section III-Jacinto.</p>
            </div>
            <button>View</button>
          </div>
        </div>

        <div class="recent-submissions">
          <h2>Recent Submissions</h2>
          <?php if (!empty($submissions)): ?>
            <?php foreach ($submissions as $submission): ?>
              <div class="submission-card">
                <div class="submission-icon">
                  <?= substr($submission['student_name'], 0, 1) ?>
                </div>
                <div class="submission-details">
                  <strong><?= esc($submission['student_name']) ?></strong>
                  <p><?= esc($submission['task_title']) ?></p>
                  <small><?= date('M d, Y h:i A', strtotime($submission['submitted_at'])) ?></small>
                  <a href="<?= base_url('grading/student/' . $submission['student_id']) ?>" class="grade-btn">Grade</a>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="submission-card">
              <p>No recent submissions</p>
            </div>
          <?php endif; ?>
        </div>
      </aside>
    </main>
  </div>

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