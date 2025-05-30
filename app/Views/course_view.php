<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?= esc($course['course_name']) ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', Arial, sans-serif;
      background-color: #fdeef4;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 30px;
      background-color: white;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .navbar-logo .logo {
      width: 40px;
    }

    .navbar-center {
      display: flex;
      gap: 30px;
      align-items: center;
    }

    .navbar-center a {
      text-decoration: none;
      color: black;
      font-weight: bold;
    }

    .dropdown {
      position: relative;
    }

    .dropdown span {
      font-weight: bold;
      cursor: pointer;
    }

    .arrow {
      font-size: 1.2rem;
      margin-left: 4px;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: white;
      min-width: 160px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.1);
      z-index: 1;
      padding: 10px;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .navbar-right {
      display: flex;
      align-items: center;
      gap: 14px;
    }

    .search-box {
      padding: 6px 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 1rem;
      width: 160px;
    }

    .navbar-right button {
      background: #d12c5c;
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: bold;
      padding: 8px 22px;
      cursor: pointer;
    }

    .navbar-right img.profile {
      width: 35px;
      height: 35px;
      border-radius: 50%;
      object-fit: cover;
    }

    .tabbar {
      display: flex;
      gap: 36px;
      font-size: 1.1rem;
      font-weight: 500;
      margin: 20px 40px;
    }

    .tabbar .active {
      color: black;
      font-weight: bold;
      border-bottom: 3px solid black;
      padding-bottom: 5px;
    }

    .section-title {
      background-color: #e8c6eb;
      text-align: center;
      font-size: 20px;
      font-weight: bold;
      padding: 14px 0;
      margin-bottom: 30px;
    }

    .cards {
      display: flex;
      flex-direction: column;
      align-items: flex-start; /* changed from center */
      gap: 20px;
      padding-bottom: 40px;
      margin-left: 40px; /* optional: add margin to match section title/tabbar */
    }

    .card {
      background-color: white;
      width: 600px;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      overflow: hidden;
      border-top: 6px solid transparent;
      border-image: linear-gradient(to right, #f8228a, #ad9bdc);
      border-image-slice: 1;
    }

    .card-content {
      padding: 20px;
    }

    .card-title {
      font-size: 18px;
      font-weight: bold;
    }

    .card-desc {
      color: #555;
      font-size: 14px;
      margin-top: 5px;
    }

    .card-footer {
      display: flex;
      justify-content: flex-end;
      padding: 0 20px 15px;
    }

    .view-btn {
      background-color: #f23eb3;
      color: white;
      border: none;
      padding: 6px 12px;
      border-radius: 6px;
      font-size: 12px;
      cursor: pointer;
      font-weight: bold;
    }

    @media (max-width: 700px) {
      .card {
        width: 90%;
      }
      .tabbar {
        flex-direction: column;
        gap: 10px;
        margin: 10px 20px;
      }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <div class="navbar">
    <div class="navbar-logo">
      <img src="/imgs/Logo.png" alt="logo" class="logo"/>
    </div>
    <div class="navbar-center">
      <a href="#">HOME</a>
      <a href="#">DASHBOARD</a>
      <a href="#">ABOUT</a>
      <div class="dropdown">
        <span>COURSES <span class="arrow">&#9660;</span></span>
        <div class="dropdown-content">
          <select id="course-select">
            <option value="web">ALL COURSES</option>
            <option value="data">MY COURSES</option>
          </select>
        </div>
      </div>
    </div>
    <div class="navbar-right">
      <input class="search-box" type="text" placeholder="Search.." />
        <a href="<?= base_url('upload') ?>">
            <button>+ Add Content</button>
        </a>
      <img src="/imgs/profile.png" alt="profile" class="profile"/>
    </div>
  </div>

  <!-- Tabs -->
  <div class="tabbar">
    <span>Topic</span>
    <span>Task</span>
    <span class="active">Lessons</span>
    <span>Students</span>
  </div>

  <!-- Section Title -->
  <div class="section-title">
    <?= esc($course['course_name']) ?> – <?= esc($course['overview']) ?>
  </div>

  <!-- Lesson Cards -->
  <div class="cards">
    <?php foreach ($lessons as $lesson): ?>
      <div class="card">
        <div class="card-content">
          <div class="card-title"><?= esc($lesson['title']) ?></div>
          <div class="card-desc"><?= esc($lesson['description']) ?></div>
        </div>
        <div class="card-footer">
          <a href="<?= site_url('lesson/' . $lesson['id']) ?>" class="view-btn">View Info</a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

</body>
</html>
