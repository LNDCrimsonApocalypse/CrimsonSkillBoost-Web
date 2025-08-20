<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Courses Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
 <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      background: #ffeaf6;
        font-family: 'Poppins', 'Segoe UI', sans-serif;
    }
   /* NAVBAR */
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
      color: black;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: color 0.2s;
    }
    .navbar-center a.active {
      color: #000;
      font-weight: 900;
    }
    .navbar-center .dropdown {
      position: relative;
    }
    .navbar-center .dropdown::after {
      font-size: 0.85em;
      vertical-align: middle;
      font-weight: bold;
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
    
    /* MAIN AREA */
    .main-bg {
      background: #ffeaf6;
      min-height: 100vh;
      padding: 32px 0;
    }
    .card-container {
      max-width: 1400px;
      margin: 0 auto;
      padding: 0 18px;
    }
    .courses-card {
      background: #fff;
      border-radius: 4px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.09);
      padding: 26px 28px 30px 28px;
      min-width: 340px;
      margin-top: 18px;
    }
    .courses-title {
      font-family: 'Montserrat', Arial, sans-serif;
      font-size: 1.35rem;
      font-weight: 700;
      margin-bottom: 18px;
      color: #222;
      letter-spacing: 1px;
    }
    .courses-toolbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 8px;
      flex-wrap: wrap;
      gap: 16px;
    }
    .dropdown-select {
      padding: 7px 18px 7px 12px;
      border-radius: 5px;
      border: 1.5px solid #ccc;
      font-size: 1rem;
      background: #fff;
      cursor: pointer;
      font-family: 'Inter', Arial, sans-serif;
      font-weight: 500;
      min-width: 130px;
    }
    .search-add-group {
      display: flex;
      align-items: center;
      gap: 12px;
      float: right;
      margin-left: auto;
    }
    .search-box {
      padding: 7px 14px;
      border-radius: 6px;
      border: 1.5px solid #ccc;
      font-size: 1rem;
      outline: none;
      width: 180px;
      box-sizing: border-box;
      font-family: 'Inter', Arial, sans-serif;
     
    }
    .add-btn {
      background: #e636a4;
      color: #fff;
      border: none;
      border-radius: 6px;
      font-size: 1rem;
      font-weight: 700;
      padding: 7px 20px;
      cursor: pointer;
      transition: background 0.2s;
      
    }
    .add-btn:hover {
      background: #c92c8e;
    }
    @media (max-width: 900px) {
      .navbar {
        flex-direction: column;
        gap: 12px;
        padding: 18px 10px 0 10px;
      }
      .card-container {
        padding: 0 4vw;
      }
      .courses-card {
        padding: 18px 8px 20px 8px;
      }
      .courses-toolbar {
        flex-direction: column;
        gap: 12px;
        align-items: stretch;
      }
      .search-add-group {
        flex-direction: column;
        gap: 10px;
        align-items: stretch;
      }
    }
     
/*COURSE CARDS */
.card {
  width: 350px;
  border-radius: 12px;
  overflow: hidden;
  background: #f8d1d8;
  box-shadow: 0 2px 12px rgba(0,0,0,0.13);
  font-family: 'Segoe UI', Arial, sans-serif;
  margin: 20px 0; /* Only vertical margin */
  
}
.cards-container {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  justify-content: flex-start;
  margin-top: 50px;
  margin-left: 80px;
  padding: 0 20px;
}
.card-image img {
  width: 100%;
  height: 120px;
  object-fit: cover;
  display: block;
}

.card-content {
  padding: 18px 20px 14px 20px;
  background: #f8d1d8;
}

.card-label {
  font-size: 0.85rem;
  color: #7c7c7c;
  letter-spacing: 1px;
  margin-bottom: 8px;
  font-weight: 600;
}

.card-title {
  font-size: 1.25rem;
  font-weight: 600;
  margin-bottom: 4px;
  color: #222;
}

.card-subtitle {
  font-size: 1rem;
  color: #a2a2a2;
  margin-bottom: 18px;
}

.card-footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.card-students {
  font-size: 0.95rem;
  color: #222;
  display: flex;
  align-items: center;
}

.card-students i {
  margin-right: 6px;
  font-size: 1.1em;
}

.card-btn {
  background: #e754a2;
  color: #fff;
  border: none;
  border-radius: 16px;
  padding: 6px 18px;
  font-size: 0.95rem;
  cursor: pointer;
  transition: background 0.2s;
}

.card-btn:hover {
  background: #c63d8e;
}

          /* MODAL OVERLAY */
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
    /* MODAL CONTENT */
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
      gap: 8px;
    }
    #courseRadioGroups {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 18px 48px; /* vertical and horizontal gap */
  margin-top: 12px;
}
.radio-group {
  display: contents; /* flatten children into grid */
}
.radio-group label {
  display: flex;
  align-items: center;
  font-size: 1rem;
  color: #222;
  cursor: pointer;
  gap: 8px;
  margin-bottom: 0;
  /* Remove width so it fits grid cell */
}
    @media (max-width: 600px) {
      #courseRadioGroups {
        flex-direction: column;
        gap: 8px 0;
      }
      .radio-group {
        width: 100%;
      }
    }
    .modal-footer {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 32px;
      padding: 0 10px;
    }
    .btn {
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
    .btn:hover {
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

    #modalOverlay2 .modal-content {
  animation: fadeIn 0.25s;
}
#modalOverlay2 .modal-col-content textarea {
  resize: vertical;
  background: #fff0f8;
}

.course-details-grid {
  display: flex;
  gap: 24px;
  margin-bottom: 24px;
  padding: 10px
}
.detail-col {
  flex: 1;
  min-width: 180px;
  border: 1px solid #333;
  border-radius: 2px;
  background: #fff;
  margin-bottom: 0;
  display: flex;
  flex-direction: column;
}
.detail-label {
  background: #e6c4e6;
  font-weight: bold;
  padding: 12px 16px;
  border-bottom: 1px solid #333;
  font-size: 1.1rem;
}
.detail-value {
  padding: 14px 16px;
  font-size: 1rem;
  min-height: 32px;
}
.desc-group {
  margin-bottom: 22px;
  padding: 10px;
}
.desc-label {
  background: #e6c4e6;
  font-weight: bold;
  padding: 12px 16px;
  border: 1px solid #333;
  border-bottom: none;
  border-radius: 2px 2px 0 0;
  font-size: 1.1rem;
}
.desc-group textarea {
  width: 100%;
  border: 1px solid #333;
  border-top: none;
  border-radius: 0 0 2px 2px;
  padding: 14px 16px;
  font-size: 1rem;
  min-height: 80px;
  resize: vertical;
  box-sizing: border-box;
}
.add-btn-gradient {
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
.add-btn-gradient:hover {
  background: linear-gradient(90deg, #c92c8e 0%, #7f53ac 100%);
  box-shadow: 0 4px 20px rgba(230,54,164,0.14);
}
@media (max-width: 900px) {
  .course-details-grid {
    flex-direction: column;
    gap: 12px;
  }
}
  </style>
</head>
<body>
  <!-- NAVBAR -->
  <nav class="navbar">
    <div class="navbar-left">
      <img src="public/img/logo.png" alt="Logo" />
    </div>
    <div class="navbar-center">
     <a href="<?= base_url('/') ?>">HOME</a>
      <a href="<?= base_url('dashboard') ?>">DASHBOARD</a>
      <a href="<?= base_url('aboutus') ?>">ABOUT</a>
      <a href="<?= base_url('aboutus') ?>">COURSES</a>
    </div>
    <div class="navbar-right">
      <img src="public/img/notifications.png" alt="Notifications" class="icon" onclick="window.location.href='<?= base_url('notif') ?>'" style="cursor:pointer;" />
      <img src="imgs/profile.png" alt="Profile" class="navbar-profile" style="cursor:pointer;" onclick="window.location.href='<?= base_url('editprofile') ?>'" />
    </div>
  </nav>
  <!-- MAIN AREA -->
  <div class="main-bg">
    <div class="card-container">
      <div class="courses-card">
        <div class="courses-title">COURSES</div>
        <div class="courses-toolbar">
          <select id="courseFilter" class="dropdown-select" onchange="filterCourses()">
  <option value="all">All Categories</option>
  <option value="active">Active</option>
  <option value="inactive">Inactive</option>
</select>
          </div>
          <div class="search-add-group">
            <input class="search-box" type="text" placeholder="Search.." />
        <button id="openAddCourseModal" class="add-btn">Add Course</button>
          </div>
  
    <div class="cards-container">
  <div class="card" data-status="active">
    <div class="card-image">
      <img src="cp1.jpg" alt="Computer Programming 1">
    </div>
    <div class="card-content">
      <div class="card-label">COMPROG1</div>
      <div class="card-title">Computer Programming 1</div>
      <div class="card-subtitle">III - BCSAD</div>
      <div class="card-footer">
        <span class="card-students">
          <i class="fa fa-users"></i> 1050 students
        </span>
       <a href="<?= base_url('course/info/oop') ?>" class="card-btn">View Info</a>

      </div>
    </div>
  </div>
  <!-- Repeat for each card, do NOT nest .card inside another .card -->
  <!-- ... other cards ... -->
<div class="card">
  <div class="card-image">
    <img src="cp2.jpg" alt="Computer Programming 2">
  </div>
  <div class="card-content">
    <div class="card-label">COMPROG2</div>
    <div class="card-title">Computer Programming 2</div>
    <div class="card-subtitle">III - BCSAD</div>
    <div class="card-footer">
      <span class="card-students">
        <i class="fa fa-users"></i> 980 students
      </span>
      <button class="card-btn">View Info</button>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-image">
    <img src="im.jpg" alt="Information Management">
  </div>
  <div class="card-content">
    <div class="card-label">INFOMAN</div>
    <div class="card-title">Information Management</div>
    <div class="card-subtitle">III - BCSAD</div>
    <div class="card-footer">
      <span class="card-students">
        <i class="fa fa-users"></i> 870 students
      </span>
      <button class="card-btn">View Info</button>
    </div>
  </div>
</div>


<div class="card">
  <div class="card-image">
    <img src="itc.jpg" alt="Introduction to Computing">
  </div>
  <div class="card-content">
    <div class="card-label">ITC</div>
    <div class="card-title">Introduction to Computing</div>
    <div class="card-subtitle">III - BCSAD</div>
    <div class="card-footer">
      <span class="card-students">
        <i class="fa fa-users"></i> 1120 students
      </span>
      <button class="card-btn">View Info</button>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-image">
    <img src="wdt.jpg" alt="Web Development Tools">
  </div>
  <div class="card-content">
    <div class="card-label">WDT</div>
    <div class="card-title">Web Development Tools</div>
    <div class="card-subtitle">III - BCSAD</div>
    <div class="card-footer">
      <span class="card-students">
        <i class="fa fa-users"></i> 760 students
      </span>
      <button class="card-btn">View Info</button>
    </div>
  </div>
</div>


<div class="card">
  <div class="card-image">
    <img src="wad.jpg" alt="Web Applications Development">
  </div>
  <div class="card-content">
    <div class="card-label">WAD</div>
    <div class="card-title">Web Applications Development</div>
    <div class="card-subtitle">III - BCSAD</div>
    <div class="card-footer">
      <span class="card-students">
        <i class="fa fa-users"></i> 810 students
      </span>
      <button class="card-btn">View Info</button>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-image">
    <img src="oop.jpg" alt="Object Oriented Programming">
  </div>
  <div class="card-content">
    <div class="card-label">OOP</div>
    <div class="card-title">Object Oriented Programming</div>
    <div class="card-subtitle">III - BCSAD</div>
    <div class="card-footer">
      <span class="card-students">
        <i class="fa fa-users"></i> 950 students
      </span>
      <a href="<?= base_url('course/info/oop') ?>" class="card-btn">View Info</a>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-image">
    <img src="mad.jpg" alt="Mobile Applications Development">
  </div>
  <div class="card-content">
    <div class="card-label">MAD</div>
    <div class="card-title">Mobile Applications Development</div>
    <div class="card-subtitle">III - BCSAD</div>
    <div class="card-footer">
      <span class="card-students">
        <i class="fa fa-users"></i> 690 students
      </span>
      <button class="card-btn">View Info</button>
    </div>
  </div>
</div>
  
<!-- ... end  ... --></div>

    </div>
  </div>
   <!-- MODAL 1: Step 1 -->
<div class="modal-overlay" id="courseModalStep1">
  <div class="modal-content">
    <span class="modal-close" onclick="closeModal('courseModalStep1')">&times;</span>
    <div class="modal-header">Add a Course</div>
    <div class="modal-body" style="display: flex; gap: 32px; justify-content: center;">
      <!-- Left: Year and Section -->
      <div style="flex:1; min-width:320px; border:1px solid #888; border-radius:6px; background:#fff; overflow:hidden;">
        <div style="background:#eec8e6; font-weight:bold; font-size:1.15rem; padding:12px 18px; border-bottom:1px solid #888;">
          Year and Section
        </div>
        <div style="display:flex; justify-content:space-between; padding:32px 28px;">
          <div style="display:flex; flex-direction:column; gap:24px;">
            <label><input type="radio" name="year" value="1st Year" class="year-radio"> 1st Year</label>
            <label><input type="radio" name="year" value="2nd Year" class="year-radio"> 2nd Year</label>
            <label><input type="radio" name="year" value="3rd Year" class="year-radio"> 3rd Year</label>
            <label><input type="radio" name="year" value="4th Year" class="year-radio"> 4th Year</label>
          </div>
          <div style="display:flex; flex-direction:column; gap:24px;">
            <label><input type="radio" name="section" value="ACSAD"> ACSAD</label>
            <label><input type="radio" name="section" value="BCSAD"> BCSAD</label>
            <label><input type="radio" name="section" value="CCSAD"> CCSAD</label>
            <label><input type="radio" name="section" value="DCSAD"> DCSAD</label>
          </div>
        </div>
      </div>
      <!-- Right: Courses (dynamic) -->
      <div class="modal-col">
    <div class="modal-col-header">Courses</div>
    <div class="modal-col-content" id="coursesContainer">
      <!-- Semester radios -->
      <div class="radio-group">
        <label><input type="radio" name="sem" value="First Semester" class="sem-radio"> First Semester</label>
        <label><input type="radio" name="sem" value="Second Semester" class="sem-radio" checked> Second Semester</label>
      </div>
      <!-- Courses will be injected here -->
      <div id="courseRadioGroups"></div>
    </div>
  </div>
    </div>
    <div class="modal-footer">
      <button class="btn" onclick="goToStep2()">Next</button>
    </div>
  </div>
</div>

<!-- MODAL 2: Step 2 -->
<div class="modal-overlay" id="courseModalStep2">
  <div class="modal-content">
    <span class="modal-close" onclick="closeModal('courseModalStep2')">&times;</span>
    <div class="modal-header">Add Course Details</div>
    <div class="step active" id="step2">
      <div class="course-details-grid">
        <div class="detail-col">
          <div class="detail-label">Course</div>
          <div class="detail-value" id="detailCourse"></div>
        </div>
        <div class="detail-col">
          <div class="detail-label">Section</div>
          <div class="detail-value" id="detailSection"></div>
        </div>
        <div class="detail-col">
          <div class="detail-label">Semester</div>
          <div class="detail-value" id="detailSemester"></div>
        </div>
      </div>
      <div class="desc-group">
        <div class="desc-label">Description</div>
        <textarea id="courseDescription" rows="4" placeholder="Course Description..."></textarea>
      </div>
      <div class="desc-group">
        <div class="desc-label">Requirments</div>
        <textarea id="courseRequirements" rows="4" placeholder="Requirements (optional)..."></textarea>
      </div>
      <div class="modal-footer" style="justify-content: flex-end;">
        <button class="add-btn-gradient" onclick="submitCourse()">Add</button>
      </div>
    </div>
  </div>
</div>
<!-- Add Firebase SDKs for JS Firestore access -->
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
<script src="<?= base_url('public/js/firebase-config.js') ?>"></script>
<script>
  const openBtn = document.getElementById("openAddCourseModal");
const modalStep1 = document.getElementById("courseModalStep1");
const modalStep2 = document.getElementById("courseModalStep2");

openBtn.addEventListener("click", function () {
  modalStep1.classList.add("active");
});

function closeModal(modalId) {
  document.getElementById(modalId).classList.remove("active");
}

// Clicking outside closes the modal
window.onclick = function (event) {
  if (event.target === modalStep1) {
    closeModal('courseModalStep1');
  }
  if (event.target === modalStep2) {
    closeModal('courseModalStep2');
  }
};

// Fix: Always re-attach modal-close click handler after modal is shown
function attachModalCloseHandlers() {
  document.querySelectorAll('.modal-close').forEach(btn => {
    btn.onclick = function(event) {
      event.stopPropagation();
      const modal = this.closest('.modal-overlay');
      if (modal) modal.classList.remove('active');
    };
  });
}

// Call this after showing any modal
openBtn.addEventListener("click", function () {
  modalStep1.classList.add("active");
  setTimeout(() => {
    attachCourseListeners();
    updateCourses();
    attachModalCloseHandlers();
  }, 0);
});

function goToStep2() {
  const year = document.querySelector('input[name="year"]:checked');
  const section = document.querySelector('input[name="section"]:checked');
  const sem = document.querySelector('input[name="sem"]:checked');
  const course = document.querySelector('input[name="course"]:checked');
  if (!year || !section || !sem || !course) {
    alert('Please select year, section, semester, and course.');
    return;
  }
  document.getElementById('detailCourse').innerText = course.value;
  document.getElementById('detailSection').innerText = section.value;
  document.getElementById('detailSemester').innerText = sem.value;
  closeModal('courseModalStep1');
  modalStep2.classList.add("active");
  attachModalCloseHandlers();
}

function submitCourse() {
  // Get details from modal
  const course = document.getElementById('detailCourse').innerText.trim();
  const section = document.getElementById('detailSection').innerText.trim();
  const semester = document.getElementById('detailSemester').innerText.trim();
  const desc = document.getElementById('courseDescription').value.trim();
  const reqs = document.getElementById('courseRequirements').value.trim();

  if (!course || !section || !semester) {
    alert('Please fill in course, section, and semester.');
    return;
  }

  // Add to Firestore
  addCourseToFirestore({
    course_name: course,
    year: getYearValueForDb(),
    section: section,
    semester: getSemesterValueForDb(semester),
    overview: desc,
    requirements: reqs
  });

  // Optionally, clear modal fields
  document.getElementById('courseDescription').value = '';
  document.getElementById('courseRequirements').value = '';

  // Close modal
  closeModal('courseModalStep2');

  // Show card if filter is "all" or "active"
  filterCourses();
}

// Add Firebase SDKs for JS Firestore access
// ...existing code...

async function addCourseToFirestore({course_name, year, section, semester, overview, requirements}) {
  // Get instructor info from Firebase Auth
  let user;
  try {
    user = firebase.auth().currentUser;
  } catch (e) {
    user = null;
  }
  if (!user) {
    alert("You must be logged in to add a course.");
    return;
  }

  // Optionally, get instructor_name from Firestore profile
  let instructor_name = user.email;
  try {
    const doc = await firebase.firestore().collection("users").doc(user.uid).get();
    if (doc.exists) {
      const d = doc.data();
      instructor_name = [d.fname, d.mname, d.lname, d.extname].filter(Boolean).join(" ") || user.email;
    }
  } catch (e) {}

  // Add to Firestore
  try {
    // --- Course code mapping ---
    const courseCodeMap = {
      "INTRODUCTION TO COMPUTING": "INTCOM",
      "COMPUTER PROGRAMMING 1": "COMPROG1",
      "WEB DEVELOPMENT TOOLS": "WEBTOOLS",
      "PROBABILITY AND STATISTICS": "PROBSTAT",
      "COMPUTER PROGRAMMING 2": "COMPROG2",
      "INFORMATION MANAGEMENT": "INFOMAN",
      "WEB APPLICATIONS DEVELOPMENT": "WEBAPPS",
      "ORGANIZATIONAL COMMUNICATION": "ORGCOM",
      "DATA STRUCTURES AND ALGORITHMS": "DATASTRU",
      "OPERATING SYSTEMS": "OPERASYS",
      "OBJECT ORIENTED PROGRAMMING": "OOP",
      "MODERN PHYSICS": "MODPHY",
      "APPLICATIONS DEVELOPMENT AND EMERGING TECHNOLOGIES": "APPDEV",
      "DISCRETE STRUCTURES 1": "DISCSTRU1",
      "DIFFERENTIAL AND INTEGRAL CALCULUS": "CALCULUS",
      "ALGORITHMS AND COMPLEXITY": "ALGOCOM",
      "DISCRETE STRUCTURES 2": "DISCSTRU2",
      "INFORMATION ASSURANCE AND SECURITY": "INFOMAN",
      "SOFTWARE ENGINEERING 1": "SOFTENG1",
      "HUMAN COMPUTER INTERACTION": "HCI",
      "MODELING AND SIMULATION": "MODSIMU",
      "ELECTIVE 1": "ELEC1",
      "METHODS OF RESEARCH": "METHODSR",
      "SOFTWARE ENGINEERING 2": "SOFTENG2",
      "PROGRAMMING LANGUAGES": "PROLANG",
      "NETWORKS AND COMMUNICATIONS": "NETCOM",
      "ARCHITECTURE AND ORGANIZATION": "ARCHORG",
      "AUTOMATA THEORY AND FORMAL LANGUAGES": "AUTOMATA",
      "PROJECT MANAGEMENT": "PROMNGT",
      "ELECTIVE 2": "ELEC2",
      "ADVANCED ENGLISH PRE-EMPLOYMENT TRAINING": "ADEPT",
      "SOCIAL ISSUES AND PROFESSIONAL PRACTICE": "SOCIPP",
      "CS THESIS WRITING 1": "THESIS1",
      "ELECTIVE 3": "ELEC3",
      "ELECTIVE 4": "ELEC4",
      "ELECTIVE 5": "ELEC5",
      "PRACTICUM": "PRACTI",
      "CS THESIS WRITING 2": "THESIS2"
    };
    // Assign course_code (from mapping or empty string)
    const course_code = courseCodeMap[(course_name || '').trim().toUpperCase()] || "";

    // Add to Firestore
    try {
      await firebase.firestore().collection("courses").add({
        course_name: course_name,
        created_at: new Date().toISOString(),
        instructor_name: instructor_name,
        user_id: user.uid,
        overview: overview || "",
        requirements: requirements || "",
        year: year,
        section: section,
        semester: semester,
        course_code: course_code // <-- Add course_code to Firestore
      });
      alert("Course added successfully!");
      closeModal('courseModalStep2');
      // location.reload(); // Uncomment if you want to reload
    } catch (err) {
      alert("Failed to add course: " + err.message);
    }
  } catch (e) {
    alert("Failed to add course: " + e.message);
  }
}

// --- FIREBASE: DISPLAY ALL COURSES FROM FIRESTORE ---
async function displayAllCoursesFromFirestore() {
  const cardsContainer = document.querySelector('.cards-container');
  if (!cardsContainer) return;

  // Show loading
  cardsContainer.innerHTML = '<div class="empty-card" style="margin:40px auto;">Loading courses...</div>';

  try {
    const snapshot = await firebase.firestore().collection("courses").get();
    let courses = [];
    snapshot.forEach(doc => {
      let data = doc.data();
      data.id = doc.id;
      courses.push(data);
    });

    if (courses.length === 0) {
      cardsContainer.innerHTML = '<div class="empty-card" style="margin:40px auto;">No courses found.</div>';
      return;
    }

    // --- Course code mapping ---
    const courseCodeMap = {
      "INTRODUCTION TO COMPUTING": "INTCOM",
      "COMPUTER PROGRAMMING 1": "COMPROG1",
      "WEB DEVELOPMENT TOOLS": "WEBTOOLS",
      "PROBABILITY AND STATISTICS": "PROBSTAT",
      "COMPUTER PROGRAMMING 2": "COMPROG2",
      "INFORMATION MANAGEMENT": "INFOMAN",
      "WEB APPLICATIONS DEVELOPMENT": "WEBAPPS",
      "ORGANIZATIONAL COMMUNICATION": "ORGCOM",
      "DATA STRUCTURES AND ALGORITHMS": "DATASTRU",
      "OPERATING SYSTEMS": "OPERASYS",
      "OBJECT ORIENTED PROGRAMMING": "OOP",
      "MODERN PHYSICS": "MODPHY",
      "APPLICATIONS DEVELOPMENT AND EMERGING TECHNOLOGIES": "APPDEV",
      "DISCRETE STRUCTURES 1": "DISCSTRU1",
      "DIFFERENTIAL AND INTEGRAL CALCULUS": "CALCULUS",
      "ALGORITHMS AND COMPLEXITY": "ALGOCOM",
      "DISCRETE STRUCTURES 2": "DISCSTRU2",
      "INFORMATION ASSURANCE AND SECURITY": "INFOMAN",
      "SOFTWARE ENGINEERING 1": "SOFTENG1",
      "HUMAN COMPUTER INTERACTION": "HCI",
      "MODELING AND SIMULATION": "MODSIMU",
      "ELECTIVE 1": "ELEC1",
      "METHODS OF RESEARCH": "METHODSR",
      "SOFTWARE ENGINEERING 2": "SOFTENG2",
      "PROGRAMMING LANGUAGES": "PROLANG",
      "NETWORKS AND COMMUNICATIONS": "NETCOM",
      "ARCHITECTURE AND ORGANIZATION": "ARCHORG",
      "AUTOMATA THEORY AND FORMAL LANGUAGES": "AUTOMATA",
      "PROJECT MANAGEMENT": "PROMNGT",
      "ELECTIVE 2": "ELEC2",
      "ADVANCED ENGLISH PRE-EMPLOYMENT TRAINING": "ADEPT",
      "SOCIAL ISSUES AND PROFESSIONAL PRACTICE": "SOCIPP",
      "CS THESIS WRITING 1": "THESIS1",
      "ELECTIVE 3": "ELEC3",
      "ELECTIVE 4": "ELEC4",
      "ELECTIVE 5": "ELEC5",
      "PRACTICUM": "PRACTI",
      "CS THESIS WRITING 2": "THESIS2"
    };

    // Render each course as a card
    cardsContainer.innerHTML = courses.map(course => {
      const sectionSem = (course.section ? course.section : '') +
        (course.semester ? ' - ' + (course.semester === "1" ? "First Semester" : course.semester === "2" ? "Second Semester" : course.semester) : '');
      return `
        <div class="card" data-status="active">
          <div class="card-image">
            <img src="default-course.jpg" alt="${course.course_name || ''}">
          </div>
          <div class="card-content">
            <div class="card-label">${(course.course_name || '').substring(0,8).toUpperCase()}</div>
            <div class="card-title">${course.course_name || ''}</div>
            <div class="card-subtitle">${sectionSem}</div>
            <div class="card-footer">
              <span class="card-students">
                <i class="fa fa-users"></i> 0 students
              </span>
              <button class="card-btn" data-course-id="${course.id}">View Info</button>
            </div>
          </div>
        </div>
      `;
    }).join('');

    // Add click handler for all "View Info" buttons
    cardsContainer.querySelectorAll('.card-btn[data-course-id]').forEach(btn => {
      btn.onclick = function() {
        const courseId = this.getAttribute('data-course-id');
        if (courseId) {
          window.location.href = '<?= base_url('course/info') ?>/' + courseId;
        }
      };
    });

  } catch (e) {
    cardsContainer.innerHTML = '<div class="empty-card" style="margin:40px auto;">Failed to load courses.</div>';
  }
}

// --- FIREBASE: DISPLAY ONLY LOGGED-IN USER'S COURSES FROM FIRESTORE ---
async function displayUserCoursesFromFirestore() {
  const cardsContainer = document.querySelector('.cards-container');
  if (!cardsContainer) return;

  // Show loading
  cardsContainer.innerHTML = '<div class="empty-card" style="margin:40px auto;">Loading courses...</div>';

  try {
    // Wait for Firebase Auth
    await new Promise(resolve => {
      if (firebase.auth().currentUser) return resolve();
      const unsub = firebase.auth().onAuthStateChanged(user => {
        if (user) {
          unsub();
          resolve();
        }
      });
    });

    const user = firebase.auth().currentUser;
    if (!user) {
      cardsContainer.innerHTML = '<div class="empty-card" style="margin:40px auto;">Please log in to see your courses.</div>';
      return;
    }

    const snapshot = await firebase.firestore().collection("courses").where("user_id", "==", user.uid).get();
    let courses = [];
    snapshot.forEach(doc => {
      let data = doc.data();
      data.id = doc.id;
      courses.push(data);
    });

    if (courses.length === 0) {
      cardsContainer.innerHTML = '<div class="empty-card" style="margin:40px auto;">No courses found.</div>';
      return;
    }

    // --- Course code mapping ---
    const courseCodeMap = {
      "INTRODUCTION TO COMPUTING": "INTCOM",
      "COMPUTER PROGRAMMING 1": "COMPROG1",
      "WEB DEVELOPMENT TOOLS": "WEBTOOLS",
      "PROBABILITY AND STATISTICS": "PROBSTAT",
      "COMPUTER PROGRAMMING 2": "COMPROG2",
      "INFORMATION MANAGEMENT": "INFOMAN",
      "WEB APPLICATIONS DEVELOPMENT": "WEBAPPS",
      "ORGANIZATIONAL COMMUNICATION": "ORGCOM",
      "DATA STRUCTURES AND ALGORITHMS": "DATASTRU",
      "OPERATING SYSTEMS": "OPERASYS",
      "OBJECT ORIENTED PROGRAMMING": "OOP",
      "MODERN PHYSICS": "MODPHY",
      "APPLICATIONS DEVELOPMENT AND EMERGING TECHNOLOGIES": "APPDEV",
      "DISCRETE STRUCTURES 1": "DISCSTRU1",
      "DIFFERENTIAL AND INTEGRAL CALCULUS": "CALCULUS",
      "ALGORITHMS AND COMPLEXITY": "ALGOCOM",
      "DISCRETE STRUCTURES 2": "DISCSTRU2",
      "INFORMATION ASSURANCE AND SECURITY": "INFOMAN",
      "SOFTWARE ENGINEERING 1": "SOFTENG1",
      "HUMAN COMPUTER INTERACTION": "HCI",
      "MODELING AND SIMULATION": "MODSIMU",
      "ELECTIVE 1": "ELEC1",
      "METHODS OF RESEARCH": "METHODSR",
      "SOFTWARE ENGINEERING 2": "SOFTENG2",
      "PROGRAMMING LANGUAGES": "PROLANG",
      "NETWORKS AND COMMUNICATIONS": "NETCOM",
      "ARCHITECTURE AND ORGANIZATION": "ARCHORG",
      "AUTOMATA THEORY AND FORMAL LANGUAGES": "AUTOMATA",
      "PROJECT MANAGEMENT": "PROMNGT",
      "ELECTIVE 2": "ELEC2",
      "ADVANCED ENGLISH PRE-EMPLOYMENT TRAINING": "ADEPT",
      "SOCIAL ISSUES AND PROFESSIONAL PRACTICE": "SOCIPP",
      "CS THESIS WRITING 1": "THESIS1",
      "ELECTIVE 3": "ELEC3",
      "ELECTIVE 4": "ELEC4",
      "ELECTIVE 5": "ELEC5",
      "PRACTICUM": "PRACTI",
      "CS THESIS WRITING 2": "THESIS2"
    };

    // Render each course as a card
    cardsContainer.innerHTML = courses.map(course => {
      const sectionSem = (course.section ? course.section : '') +
        (course.semester ? ' - ' + (course.semester === "1" ? "First Semester" : course.semester === "2" ? "Second Semester" : course.semester) : '');
      // Use course_code from DB, or fallback to mapping, or empty string
      const code = course.course_code || courseCodeMap[(course.course_name || '').trim().toUpperCase()] || "";
      const status = course.status === "inactive" ? "inactive" : "active";
      return `
        <div class="card" data-status="${status}" data-course-id="${course.id}">
          <div class="card-image">
            <img src="default-course.jpg" alt="${course.course_name || ''}">
          </div>
          <div class="card-content">
            <div class="card-label" style="font-weight:700; color:#888; letter-spacing:2px; text-transform:uppercase;">
              ${code}
            </div>
            <div class="card-title">${course.course_name || ''}</div>
            <div class="card-subtitle">${sectionSem}</div>
            <div class="card-footer">
              <span class="card-students">
                <i class="fa fa-users"></i> 0 students
              </span>
              <button class="card-btn" data-course-id="${course.id}">View Info</button>
              ${status === "active" ? `<button class="card-btn done-btn" data-course-id="${course.id}" style="background:#bbb;color:#fff;margin-left:8px;">Done</button>` : ""}
            </div>
          </div>
        </div>
      `;
    }).join('');

    // Add click handler for all "View Info" buttons
    cardsContainer.querySelectorAll('.card-btn[data-course-id]:not(.done-btn)').forEach(btn => {
      btn.onclick = function() {
        const courseId = this.getAttribute('data-course-id');
        if (courseId) {
          window.location.href = '<?= base_url('course/info') ?>/' + courseId;
        }
      };
    });

    // Add click handler for "Done" buttons
    cardsContainer.querySelectorAll('.done-btn').forEach(btn => {
      btn.onclick = async function(e) {
        e.stopPropagation();
        const courseId = this.getAttribute('data-course-id');
        if (!courseId) return;
        // Update Firestore
        try {
          await firebase.firestore().collection("courses").doc(courseId).set({ status: "inactive" }, { merge: true });
          // Update UI
          const card = this.closest('.card');
          if (card) {
            card.setAttribute('data-status', 'inactive');
            this.remove(); // Remove the Done button
          }
          filterCourses();
        } catch (err) {
          alert("Failed to mark as done: " + err.message);
        }
      };
    });

  } catch (e) {
    cardsContainer.innerHTML = '<div class="empty-card" style="margin:40px auto;">Failed to load courses.</div>';
  }
}

// Call this on page load
document.addEventListener("DOMContentLoaded", function () {
  // ...existing code...
  displayUserCoursesFromFirestore();
});

// Helper to convert year/semester display to DB value
function getYearValueForDb() {
  const yearRadio = document.querySelector('input[name="year"]:checked');
  if (!yearRadio) return '';
  // Store as "1", "2", "3", "4"
  if (yearRadio.value.startsWith('1')) return "First Year";
  if (yearRadio.value.startsWith('2')) return "Second Year";
  if (yearRadio.value.startsWith('3')) return "Third Year";
  if (yearRadio.value.startsWith('4')) return "Fourth Year";
  return yearRadio.value;
}
function getSemesterValueForDb(sem) {
  // Store as "1" or "2"
  if (/first/i.test(sem)) return "1";
  if (/second/i.test(sem)) return "2";
  return sem;
}

// Course mapping by year and semester
const courseMap = {
  "1st Year-First Semester": [
    ["INTRODUCTION TO COMPUTING", "COMPUTER PROGRAMMING 1"],
    ["WEB DEVELOPMENT TOOLS", "INTRODUCTION TO COMPUTING"],
  ],
  "1st Year-Second Semester": [
    ["PROBABILITY AND STATISTICS", "COMPUTER PROGRAMMING 2"],
    ["INFORMATION MANAGEMENT", "WEB APPLICATIONS DEVELOPMENT"]
  ],
  "2nd Year-First Semester": [
    ["ORGANIZATIONAL COMMUNICATION", "DATA STRUCTURES AND ALGORITHMS"],
    ["OPERATING SYSTEMS", "OBJECT ORIENTED PROGRAMMING"]
  ],
  "2nd Year-Second Semester": [
    ["MODERN PHYSICS", "APPLICATIONS DEVELOPMENT AND EMERGING TECHNOLOGIES"],
    ["DISCRETE STRUCTURES 1"]
  ],
  "3rd Year-First Semester": [
    ["DIFFERENTIAL AND INTEGRAL CALCULUS", "ALGORITHMS AND COMPLEXITY"],
    ["DISCRETE STRUCTURES 2", "INFORMATION ASSURANCE AND SECURITY"], 
    ["SOFTWARE ENGINEERING 1", "HUMAN COMPUTER INTERACTION"],
    ["MODELING AND SIMULATION", "ELECTIVE 1"]
  ],
  "3rd Year-Second Semester": [
    ["METHODS OF RESEARCH", "SOFTWARE ENGINEERING 2"],
    ["PROGRAMMING LANGUAGES", "NETWORKS AND COMMUNICATIONS"],
    ["ARCHITECTURE AND ORGANIZATION", "AUTOMATA THEORY AND FORMAL LANGUAGES"],
    ["PROJECT MANAGEMENT", "ELECTIVE 2"]
  ],
  "4th Year-First Semester": [
    ["ADVANCED ENGLISH PRE-EMPLOYMENT TRAINING", "SOCIAL ISSUES AND PROFESSIONAL PRACTICE"],
    ["CS THESIS WRITING 1", "ELECTIVE 3" ],
    ["ELECTIVE 4", "ELECTIVE 5"]
  ],
  "4th Year-Second Semester": [
    ["PRACTICUM (486 HOURS)", "CS THESIS WRITING 2"]
  ]
};

// Default courses if no match
const defaultCourses = [
  ["Methods II Research", "Software Engineering 2"],
  ["Programming Languages", "Computer Programming 1"],
  ["Architecture and Organization", "Automata Theory and Formal Languages"],
  ["Project Management", "Elective 2"]
];

// Helper to render course radio groups
function renderCourses(year, sem) {
  const key = year && sem ? `${year}-${sem}` : null;
  const courses = (key && courseMap[key]) ? courseMap[key].flat() : defaultCourses.flat();
  const container = document.getElementById('courseRadioGroups');
  container.innerHTML = '';

  // Render each course as a label directly in the grid (2 columns)
  courses.forEach((course, idx) => {
    const label = document.createElement('label');
    const input = document.createElement('input');
    input.type = 'radio';
    input.name = 'course';
    input.value = course;
    if (idx === 0) input.checked = true;
    label.appendChild(input);
    label.appendChild(document.createTextNode(' ' + course));
    label.className = '';
    container.appendChild(label);
  });
}

// Attach listeners to year and semester radios
function attachCourseListeners() {
  document.querySelectorAll('.year-radio').forEach(radio => {
    radio.addEventListener('change', updateCourses);
  });
  document.querySelectorAll('.sem-radio').forEach(radio => {
    radio.addEventListener('change', updateCourses);
  });
}

function updateCourses() {
  const year = document.querySelector('input[name="year"]:checked')?.value;
  const sem = document.querySelector('input[name="sem"]:checked')?.value;
  renderCourses(year, sem);
}

// Initialize on modal open
openBtn.addEventListener("click", function () {
  modalStep1.classList.add("active");
  setTimeout(() => {
    attachCourseListeners();
    updateCourses();
  }, 0);
});

function filterCourses() {
  const filter = document.getElementById('courseFilter').value;
  document.querySelectorAll('.cards-container .card').forEach(card => {
    const status = card.getAttribute('data-status') || 'active';
    if (filter === 'all' || filter === status) {
      card.style.display = '';
    } else {
      card.style.display = 'none';
    }
  });
}
  </script>

  </div>  
  </html>
  </html>

