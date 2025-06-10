<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>
    <?php if (isset($course) && is_array($course) && isset($course['course_name'])): ?>
      <?= esc($course['course_name']) ?>
    <?php else: ?>
      Course
    <?php endif; ?>
  </title>
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
        .navbar-right img {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      object-fit: cover;
      cursor: pointer;
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
    .navbar-right button:hover {
      background: #b11f4c;
    }

    .navbar-right img.profile {
      width: 35px;
      height: 35px;
      border-radius: 50%;
      object-fit: cover;
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
    
    }

     /* DASHBOARD LAYOUT */
    .dashboard-bg {
      background: #fdeef4;
      min-height: 100vh;
      padding: 32px 0;
    }
    .dashboard-container {
      max-width: 1400px;
      margin: 0 auto;
      display: flex;
      gap: 32px;
      align-items: flex-start;
      justify-content: center;
    }
    /* LEFT: MY COURSES */
    .courses-card {
      background: #fff;
      border-radius: 4px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.06);
      flex: 2;
      padding: 32px 32px 32px 32px;
      min-width: 420px;
    }
    .courses-title {
      font-family: 'DM Serif Display', serif;
      font-size: 1.6rem;
      font-weight: 400;
      margin-bottom: 24px;
      color: #222;
      letter-spacing: 1px;
    }
    .course-list {
      display: flex;
      flex-direction: column;
      gap: 24px;
    }
    .course-item {
      display: flex;
      background: #fff;
      border: 1px solid #eee;
      border-radius: 8px;
      padding: 18px 20px;
      align-items: flex-start;
      gap: 18px;
      min-height: 100px;
    }
    .course-thumb {
      width: 80px;
      height: 80px;
      border-radius: 4px;
      object-fit: cover;
      background: #f4f4f4;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2.2rem;
      color: #ccc;
    }
    .course-info {
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 8px;
    }
    .course-title {
      font-family: 'Montserrat', Arial, sans-serif;
      font-weight: 700;
      font-size: 1.07rem;
      margin: 0;
      color: #222;
    }
    .course-desc {
      font-size: 0.97rem;
      color: #444;
      margin-bottom: 5px;
      font-family: Arial, sans-serif;
      font-weight: 400;
    }
    .course-actions {
      display: flex;
      gap: 8px;
    }
    .btn-edit {
      background:#e636a4;
      color: #ffffff;
      border: none;
      border-radius: 4px;
      padding: 5px 16px;
      font-size: 0.97rem;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.2s;
    }
    .btn-edit:hover {
  background-color: #c92c8e;
  color:#e636a4;
}

    .btn-delete {
      background: #e636a4;
      color: #fff;
      border: none;
      border-radius: 4px;
      padding: 5px 16px;
      font-size: 0.97rem;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.2s;
    }
    /* Placeholder for empty course image */
    .course-thumb.placeholder {
      background: #f4f4f4;
      color: #ccc;
      font-size: 2rem;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    /* RIGHT: ENROLLMENT REQUESTS */
    .enroll-card {
      background: #fff;
      border-radius: 4px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.06);
      flex: 1;
      padding: 32px 32px 32px 32px;
      min-width: 340px;
    }
    .enroll-title {
      font-family: 'DM Serif Display', serif;
      font-size: 1.6rem;
      font-weight: 400;
      margin-bottom: 24px;
      color: #222;
      letter-spacing: 1px;
    }
    .enroll-list {
      display: flex;
      flex-direction: column;
      gap: 18px;
    }
    .enroll-item {
      background: #fff;
      border: 1px solid #eee;
      border-radius: 8px;
      padding: 16px 18px;
      display: flex;
      flex-direction: column;
      gap: 6px;
    }
    .enroll-header {
      display: flex;
      align-items: center;
      gap: 8px;
      font-weight: bold;
      font-size: 1.07rem;
      color: #222;
      margin-bottom: 2px;
    }
    .enroll-header .enroll-icon {
      font-size: 1.17rem;
      color: #111;
    }
    .enroll-desc {
      font-size: 0.97rem;
      color: #444;
      margin-bottom: 6px;
      font-family: Arial, sans-serif;
      font-weight: 400;
    }
    .btn-view {
      background: #e636a4;
      color: #fff;
      border: none;
      border-radius: 4px;
      padding: 5px 18px;
      font-size: 1.01rem;
      font-weight: 600;
      cursor: pointer;
      width: 80px;
      transition: background 0.2s;
    }
    .btn-view.gray {
      background: #e636a4;
      color: #ffffff;
    }
       .btn-view:hover {
  background-color: #c92c8e;
  color:#e636a4;
}
    /* Responsive */
    @media (max-width: 1100px) {
      .dashboard-container {
        flex-direction: column;
        gap: 36px;
        align-items: stretch;
      }
      .courses-card,
      .enroll-card {
        min-width: 0;
        width: 100%;
      }
    }
    @media (max-width: 700px) {
      .navbar {
        flex-direction: column;
        gap: 14px;
        padding: 18px 10px 0 10px;
      }
      .dashboard-container {
        flex-direction: column;
        gap: 24px;
        padding: 0 4vw;
      }
      .courses-card,
      .enroll-card {
        padding: 18px 10px;
      }
    }

    /* --- Modal Styles from cssaddcourse.html --- */
    .modal-overlay {
      display: none;
      position: fixed;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(0,0,0,0.18);
      z-index: 1000;
      justify-content: center;
      align-items: center;
    }
    .modal-overlay.active {
      display: flex;
    }
    .modal-content {
      background: #fff;
      border-radius: 8px;
      max-width: 900px;
      width: 90vw;
      padding: 0 0 32px 0;
      box-shadow: 0 6px 32px rgba(0,0,0,0.11);
      position: relative;
      animation: fadeIn 0.25s;
    }
    @keyframes fadeIn {
      from { transform: translateY(-30px); opacity: 0; }
      to   { transform: translateY(0); opacity: 1; }
    }
    .modal-header {
      border-bottom: 2px solid #eee;
      padding: 22px 0 12px 0;
      text-align: center;
      font-family: 'Montserrat', Arial, sans-serif;
      font-size: 1.7rem;
      font-weight: 700;
      letter-spacing: 1px;
      color: #444;
      position: relative;
    }
    .modal-close {
      position: absolute;
      right: 30px;
      top: 18px;
      font-size: 2rem;
      color: #888;
      cursor: pointer;
      background: none;
      border: none;
      transition: color 0.2s;
    }
    .modal-close:hover {
      color: #e636a4;
    }
    .modal-body {
      display: flex;
      gap: 34px;
      padding: 30px 38px 0 38px;
      justify-content: center;
      align-items: flex-start;
    }
    .modal-col {
      flex: 1;
      min-width: 260px;
      border: 1.5px solid #bbb;
      border-radius: 0 0 8px 8px;
      padding: 0 0 16px 0;
      background: #fff;
      min-height: 260px;
      overflow: hidden;
    }
    .modal-col-header {
      background: #eec8e6;
      color: #222;
      font-family: 'Montserrat', Arial, sans-serif;
      font-weight: 700;
      font-size: 1.05rem;
      padding: 8px 0 8px 16px;
      border-bottom: 1.5px solid #bbb;
      letter-spacing: 1px;
    }
    .modal-col-content {
      padding: 18px 28px 0 28px;
      display: flex;
      flex-direction: column;
      gap: 16px;
    }
    .radio-group {
      display: flex;
      gap: 18px;
      align-items: flex-start;
      flex-direction: column;
      margin-bottom: 8px;
    }
    .radio-group label {
      font-size: 1rem;
      color: #222;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 6px;
    }
    .modal-footer {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 32px;
    }
    .modal-add-btn {
      background: linear-gradient(90deg, #e636a4 0%, #b983ff 100%);
      color: #fff;
      border: none;
      border-radius: 20px;
      font-size: 1.1rem;
      font-weight: 700;
      padding: 10px 48px;
      cursor: pointer;
      letter-spacing: 1.5px;
      transition: background 0.2s, box-shadow 0.2s;
      box-shadow: 0 2px 8px rgba(230,54,164,0.08);
    }
    .modal-add-btn:hover {
      background: linear-gradient(90deg, #c92c8e 0%, #7f53ac 100%);
      box-shadow: 0 4px 20px rgba(230,54,164,0.14);
    }
    @media (max-width: 900px) {
      .modal-content {
        max-width: 98vw;
      }
      .modal-body {
        flex-direction: column;
        gap: 18px;
        padding: 20px 8vw 0 8vw;
      }
      .modal-col {
        min-width: 0;
      }
    }
    @media (max-width: 600px) {
      .modal-body {
        padding: 12px 2vw 0 2vw;
      }
      .modal-header {
        font-size: 1.2rem;
      }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <div class="navbar">
    <div class="navbar-logo">
      <img src="public/img/Logo.png" alt="logo" class="logo"/>
    </div>
    <div class="navbar-center">
    <a href="<?= base_url('homepage_initial') ?>">HOME</a>
          <a href="<?= base_url('dashboard') ?>">DASHBOARD</a>
       <a href="<?= base_url('aboutus') ?>">ABOUT</a>
      <div class="dropdown">
        <span>COURSES <span class="arrow">&#9660;</span></span>
        <div class="dropdown-content">
        <select id="course-select">
            <option value="">Select Course</option>
            <option value="<?= base_url('allcourses') ?>">ALL COURSES</option>
            <option value="<?= base_url('courses') ?>">MY COURSES</option>
          </select>
        </div>
      </div>
    </div>
    <div class="navbar-right">
      <input class="search-box" type="text" placeholder="Search.." />
      <button id="openModalBtn">+ Add Content</button>
      <img src="public/img/profile.png" alt="profile" class="profile"/>
    </div>
  </div>

 

  <!-- Section Title -->
  <div class="section-title">
    <?php if (isset($course) && is_array($course)): ?>
      <?= esc($course['course_name']) ?>
    <?php else: ?>
      Course Information Not Available
    <?php endif; ?>
  </div>

  <!-- DASHBOARD -->
  <div class="dashboard-bg">
    <div class="dashboard-container">
      <!-- LEFT: MY COURSES -->
      <div class="courses-card">
        <div class="courses-title">MY LESSONS</div>
        <div class="course-list">
          <!-- Display lessons for this course -->
          <?php if (isset($lessons) && is_array($lessons) && count($lessons) > 0): ?>
            <?php foreach ($lessons as $lesson): ?>
              <div class="course-item">
                <div class="course-thumb placeholder">
                  <span>&#128218;</span>
                </div>
                <div class="course-info">
                  <div class="course-title"><?= esc($lesson['title']) ?></div>
                  <div class="course-desc"><?= esc($lesson['description'] ?? 'No description.') ?></div>
                  <div class="course-actions">
                    <a href="<?= base_url('lesson/show/' . $lesson['id']) ?>" class="btn-edit">VIEW</a>
                    <!-- <a href="<?= base_url('lesson/edit/' . $lesson['id']) ?>" class="btn-edit">EDIT</a> -->
                    <form action="<?= base_url('lesson/delete/' . $lesson['id']) ?>" method="post" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this lesson?');">
                      <?= csrf_field() ?>
                      <button type="submit" class="btn-delete">DELETE</button>
                    </form>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="course-item">
              <div class="course-thumb placeholder">
                <span>&#128218;</span>
              </div>
              <div class="course-info">
                <div class="course-title">No lessons found for this course.</div>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <!-- RIGHT: ENROLLMENT REQUESTS -->
      <div class="enroll-card">
        <div class="enroll-title">Enrollment Requests</div>
        <div class="enroll-list">
          <!-- Request 1 -->
          <div class="enroll-item">
            <div class="enroll-header">
              <span class="enroll-icon">&#8505;</span>
              California Magpantay
            </div>
            <div class="enroll-desc">Body text for whatever you'd like to say. Add main takeaway points, quotes, anecdotes, or even a very very short story.</div>
            <button class="btn-view">VIEW</button>
          </div>
          <!-- Request 2 -->
          <div class="enroll-item">
            <div class="enroll-header">
              <span class="enroll-icon">&#8505;</span>
              Precious Gargale
            </div>
            <div class="enroll-desc">Body text for whatever you'd like to say. Add main takeaway points, quotes, anecdotes, or even a very very short story.</div>
            <button class="btn-view btn-view gray">VIEW</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- MODAL: Add Course -->
  <div class="modal-overlay" id="modalOverlay">
    <div class="modal-content">
      <div class="modal-header">
        ADD NEW COURSE
        <button class="modal-close" id="closeModalBtn" title="Close">&times;</button>
      </div>
      <div class="modal-body">
        <!-- Year and Section -->
        <div class="modal-col">
          <div class="modal-col-header">Year and Section</div>
          <div class="modal-col-content">
            <div class="radio-group">
              <label><input type="radio" name="year" value="1st Year" checked/> 1st Year</label>
              <label><input type="radio" name="year" value="2nd Year" /> 2nd Year</label>
              <label><input type="radio" name="year" value="3rd Year"  /> 3rd Year</label>
              <label><input type="radio" name="year" value="4th Year" /> 4th Year</label>
            </div>
            <div class="radio-group">
              <label><input type="radio" name="section" value="ACSAD" checked /> ACSAD</label>
              <label><input type="radio" name="section" value="BCSAD" /> BCSAD</label>
              <label><input type="radio" name="section" value="CCSAD" /> CCSAD</label>
            </div>
          </div>
        </div>
        <!-- Courses -->
        <div class="modal-col">
          <div class="modal-col-header">Courses</div>
          <div class="modal-col-content">
            <div class="radio-group">
              <label><input type="radio" name="sem" value="First Semester" checked /> First Semester</label>
              <label><input type="radio" name="sem" value="Second Semester"/> Second Semester</label>
            </div>
            <div class="radio-group" id="coursesContainer">
              <!-- Dynamic course radio buttons will be inserted here -->
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="modal-add-btn">ADD</button>
      </div>
    </div>
  </div>

  <!-- MODAL: Edit Course -->
<div class="modal-overlay" id="editModalOverlay">
  <div class="modal-content" style="max-width: 900px;">
    <div class="modal-header">
      Computer Programming 1
      <button class="modal-close" id="closeEditModalBtn" title="Close">&times;</button>
    </div>
    <div style="display: flex; gap: 32px; padding: 32px 32px 0 32px;">
      <!-- Left: Course Info -->
      <div style="flex:2;">
        <div style="font-family:'DM Serif Display',serif;font-size:2.1rem;font-weight:400;margin-bottom:8px;color:#222;">
          Computer Programming 1
        </div>
        <div style="color:#888;font-size:1.05rem;margin-bottom:8px;">
          <span style="vertical-align:middle;">&#128100;</span> 1,050 students
        </div>
        <div style="color:#444;font-size:1.01rem;margin-bottom:18px;">
          Computer Programming 1 is an introductory course designed to teach the fundamentals of programming using a specific programming language (such as Python, Java, or C++). It covers basic concepts like variables, data types, control structures (if-else, loops), functions, and basic input/output operations. Students also learn problem-solving techniques and how to write, test, and debug simple programs.
        </div>
        <div style="background:#e8c6eb;padding:18px 22px;border-radius:8px;margin-bottom:18px;">
          <div style="font-weight:bold;font-size:1.1rem;margin-bottom:6px;">Course Overview</div>
          <div>Explore the basics of game design and development, and start creating your own games from scratch. Gain hands-on experience with game engines, storytelling, and interactive mechanics to bring your ideas to life.</div>
        </div>
        <div style="background:#e8c6eb;padding:18px 22px;border-radius:8px;">
          <div style="font-weight:bold;font-size:1.1rem;margin-bottom:6px;">Topic Overview</div>
          <ul style="margin:0;padding-left:18px;">
            <li>Introduction to Computer Programming</li>
            <li><b>Definition of computer programming</b></li>
            <li>Importance and real-world applications</li>
          </ul>
        </div>
        <!-- EDIT BUTTON INSIDE MODAL -->
        <div style="margin-top:28px; text-align:right;">
          <button class="btn-edit" style="padding:8px 28px; font-size:1.08rem;">EDIT</button>
        </div>
      </div>
      <!-- Right: Instructor Info -->
      <div style="flex:1;display:flex;flex-direction:column;align-items:center;gap:18px;">
        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Instructor" style="width:120px;height:120px;border-radius:50%;object-fit:cover;background:#f4f4f4;">
        <div style="font-weight:bold;font-size:1.1rem;text-align:center;">Professor Nicholas Aguinaldo</div>
        <button style="background:#f23eb3;color:#fff;font-weight:700;border:none;border-radius:24px;padding:12px 28px;font-size:1.05rem;cursor:pointer;margin-bottom:8px;">GET YOUR STUDENT STARTED</button>
        <div style="background:#fff;padding:18px 18px 12px 18px;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,0.06);width:100%;">
          <div style="font-weight:bold;margin-bottom:8px;">This course includes:</div>
          <ul style="font-size:0.98rem;line-height:1.7;margin:0;padding-left:18px;">
            <li>🟦 Step-by-step lessons</li>
            <li>🟦 Hands-on coding exercises</li>
            <li>🟦 Problem-solving activities</li>
            <li>🟩 Quizzes and assessments</li>
            <li>🟩 Introduction to real coding tools</li>
            <li>🟩 Instructor support and guidance</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

  <script>
    // Modal logic and dynamic courses
    const subjectsByYearSemester = {
      "1ST YEAR": {
        "FIRST SEMESTER": [
          "INTRODUCTION TO COMPUTING",
          "COMPUTER PROGRAMMING 1",
          "WEB DEVELOPMENT TOOLS"
        ],
        "SECOND SEMESTER": [
          "PROBABILITY AND STATISTICS",
          "COMPUTER PROGRAMMING 2",
          "INFORMATION MANAGEMENT",
          "WEB APPLICATIONS DEVELOPMENT"
        ]
      },
      "2ND YEAR": {
        "FIRST SEMESTER": [
          "ORGANIZATIONAL COMMUNICATION",
          "DATA STRUCTURES AND ALGORITHMS",
          "OPERATING SYSTEMS",
          "OBJECT ORIENTED PROGRAMMING"
        ],
        "SECOND SEMESTER": [
          "MODERN PHYSICS",
          "APPLICATIONS DEVELOPMENT AND EMERGING TECHNOLOGIES",
          "DISCRETE STRUCTURES 1"
        ]
      },
      "3RD YEAR": {
        "FIRST SEMESTER": [
          "DIFFERENTIAL AND INTEGRAL CALCULUS",
          "ALGORITHMS AND COMPLEXITY",
          "DISCRETE STRUCTURES 2",
          "INFORMATION ASSURANCE AND SECURITY",
          "SOFTWARE ENGINEERING 1",
          "HUMAN COMPUTER INTERACTION",
          "MODELING AND SIMULATION",
          "ELECTIVE 1"
        ],
        "SECOND SEMESTER": [
          "METHODS OF RESEARCH",
          "SOFTWARE ENGINEERING 2",
          "PROGRAMMING LANGUAGES",
          "NETWORKS AND COMMUNICATIONS",
          "ARCHITECTURE AND ORGANIZATION",
          "AUTOMATA THEORY AND FORMAL LANGUAGES",
          "PROJECT MANAGEMENT",
          "ELECTIVE 2"
        ]
      },
      "4TH YEAR": {
        "FIRST SEMESTER": [
          "ADVANCED ENGLISH PRE-EMPLOYMENT TRAINING",
          "SOCIAL ISSUES AND PROFESSIONAL PRACTICE",
          "CS THESIS WRITING 1",
          "ELECTIVE 3",
          "ELECTIVE 4",
          "ELECTIVE 5"
        ],
        "SECOND SEMESTER": [
          "PRACTICUM (486 HOURS)",
          "CS THESIS WRITING 2"
        ]
      }
    };

    function getSelectedValue(radioNodeList) {
      const checked = Array.from(radioNodeList).find(radio => radio.checked);
      return checked ? checked.value : null;
    }

    function renderCourses(year, semester, section) {
      const courses = subjectsByYearSemester[year]?.[semester] || [];
      const coursesContainer = document.getElementById('coursesContainer');
      if (courses.length === 0) {
        coursesContainer.innerHTML = '<p>No courses available for this selection.</p>';
        return;
      }
      coursesContainer.innerHTML = courses.map((course, idx) => `
        <label>
          <input type="radio" name="course" value="${course}" />
          ${course} 
        </label>
      `).join('');
    }

    function updateCourses() {
      const selectedYear = (getSelectedValue(document.querySelectorAll('input[name="year"]')) || '').toUpperCase();
      const selectedSem = (getSelectedValue(document.querySelectorAll('input[name="sem"]')) || '').toUpperCase();
      const selectedSection = getSelectedValue(document.querySelectorAll('input[name="section"]')) || '';
      renderCourses(selectedYear, selectedSem, selectedSection);
    }

    ['year', 'sem', 'section'].forEach(name => {
      document.querySelectorAll(`input[name="${name}"]`).forEach(radio => {
        radio.addEventListener('change', updateCourses);
      });
    });

    updateCourses();

    const modalOverlay = document.getElementById('modalOverlay');
    const openBtn = document.getElementById('openModalBtn');
    const closeBtn = document.getElementById('closeModalBtn');

    openBtn.addEventListener('click', () => {
      modalOverlay.classList.add('active');
    });

    closeBtn.addEventListener('click', () => {
      modalOverlay.classList.remove('active');
    });

    // Edit modal logic
const editModalOverlay = document.getElementById('editModalOverlay');
const closeEditModalBtn = document.getElementById('closeEditModalBtn');
document.querySelectorAll('.btn-edit').forEach(btn => {
  btn.addEventListener('click', function() {
    editModalOverlay.classList.add('active');
  });
});
closeEditModalBtn.addEventListener('click', function() {
  editModalOverlay.classList.remove('active');
});
window.addEventListener('click', function(e) {
  if (e.target === editModalOverlay) editModalOverlay.classList.remove('active');
});

document.getElementById('course-select').addEventListener('change', function() {
    if (this.value) {
      window.location.href = this.value;
    }
  });
  </script>
</body>
</html>
