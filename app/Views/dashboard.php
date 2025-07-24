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

      /* NAVBAR */
     .navbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
        background: #fff;
     padding: 10px 40px;
    }
    .navbar-left {
      display: flex;
      align-items: center;
      gap: 18px;
    }
    .navbar-logo {
      width: 52px;
      height: 52px;
      object-fit: contain;
    }
    .navbar-center {
      display: flex;
      gap: 36px;
      align-items: center;
    }
    
    .navbar-center a {
  
      font-weight: 500;
      font-size: 1.35rem;
      text-decoration: none;
      color: black;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: color 0.2s;
    }
 .navbar-center a:hover {
      color: #ff00aa;
    }
    .navbar-right {
      display: flex;
      align-items: center;
      gap: 22px;
    }
    
    .navbar-left img {
      width: 48px;
      height: 48px;
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
      width: 38px;
      height: 38px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid #eee;
      background: #fff;

    }
        .dropbtn {
  
   font-weight: bold;
  font-size: 1.35rem;
  color: black;
  background: none;
  border: none;
  cursor: pointer;
  
}

.dropdown {
  position: relative;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #EED2EE;
  min-width: 160px;
  padding: 8px;
  box-shadow: 0 8px 16px rgba(0,0,0,0.1);
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.custom-select {
  width: 100%;
  padding:  12px 16px;
  font-size: 1rem;
  font-weight: bold;
  border: 1px solid #ccc;
  border-radius: 6px;
  background-color: white;
  color: black;
  appearance: none; /* Hide default arrow */
  -webkit-appearance: none;
  -moz-appearance: none;
  background-image: url("data:image/svg+xml;utf8,<svg fill='black' height='16' viewBox='0 0 24 24' width='16' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/></svg>");
  background-repeat: no-repeat;
  background-position: right 10px center;
  background-size: 16px;
  cursor: pointer;
}

.custom-select:focus {
  outline: none;
  border-color: #a84d9b;

}

.arrow {
  font-size: 1rem;
  margin-left: 4px;
  vertical-align: middle;
}

li {
  list-style: none;
  margin: 0;
  padding: 0;
}
        .user-img {
            width: 48px;
            height: 48px;
            object-fit: cover;
              border: 2px solid #eee;
      background: #e636a4;
       border-radius: 50%;
        }
        .notif-img {
            width: 48px;
            height: 48px;
            object-fit: cover;
           
        }

    .dashboard {
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

    /* Add these styles to your existing CSS */
    .btn-approve, .btn-reject {
        padding: 6px 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 500;
        font-size: 0.9em;
    }
    
    .btn-approve {
        background: #4CAF50;
        color: white;
    }
    
    .btn-reject {
        background: #f44336;
        color: white;
        margin-left: 8px;
    }

    .request-actions {
        display: flex;
        gap: 8px;
    }

    /* Modal styles */
    .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgb(0,0,0);
      background-color: rgba(0,0,0,0.4);
      padding-top: 60px;
    }

    .modal-content {
      background-color: #fefefe;
      margin: 5% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      max-width: 600px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }

    @media (max-width: 768px) {
      .nav-links {
        flex-direction: column;
        gap: 16px;
      }

      .nav-links li {
        font-size: 1.2rem;
      }

      .card {
        padding: 24px;
      }

      .container {
        flex-direction: column;
        gap: 24px;
      }

      .left-panel, .right-panel {
        flex: 1;
      }

      .course-card, .empty-card {
        flex-direction: column;
        align-items: stretch;
      }

      .course-img {
        width: 100%;
        height: auto;
        margin-bottom: 16px;
      }

      .submission-icon {
        width: 28px;
        height: 28px;
        font-size: 0.9rem;
      }

      .grade-btn {
        padding: 3px 10px;
        font-size: 0.7em;
      }

      .btn-approve, .btn-reject {
        font-size: 0.8em;
      }
    }
 /*COURSE CARDS */
.card {
  width: 100%;
  max-width: 700px;
  border-radius: 12px;
  overflow: hidden;
  background: #f8d1d8;
  box-shadow: 0 2px 12px rgba(0,0,0,0.13);
  font-family: 'Segoe UI', Arial, sans-serif;
  margin: 20px 0;
  display: flex;
  flex-direction: row; /* <-- CHANGED from column to row */
}

.cards-container {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  justify-content: flex-start;
  margin-top: 20px;
  margin-left: 80px;
  padding: 0 20px;
}
#noCoursesMsg {
  display: none; /* Always hidden by default */
  width: 100%;
  justify-content: center;
  align-items: center;
}
.card-image img {
  width: 100%;
  height: auto; /* Let it scale proportionally */
  object-fit: cover;
  display: block;
  border-top-left-radius: 12px;
  border-top-right-radius: 12px;
}
.card-image {
  width: 120px;
  height: 120px;
  flex-shrink: 0;
  background-color: #eee;
}


.card-content {
  padding: 20px;
  background: #f8d1d8;
  flex: 1; /* Allow content to stretch */
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
  </style>
</head>
<body>
    <!-- NAVBAR -->
  <nav class="navbar">
    <div class="navbar-left">
      <img src="public/img/Logo.png" alt="Logo" />
    </div>
    <div class="navbar-center">
        <a href="<?= base_url('homepage') ?>">HOME</a>
          <a href="<?= base_url('dashboard') ?>">DASHBOARD</a>
       <a href="<?= base_url('aboutus') ?>">ABOUT</a>
        <a href="<?= base_url('allcourses') ?>">COURSES</a>
    </div>
    <div class="navbar-right">
      <img src="public/img/notifications.png" alt="Notifications" class="icon" onclick="window.location.href='<?= base_url('notif') ?>'" style="cursor:pointer;" />
      <img src="" id="navbar-profile-pic" alt="Profile" class="navbar-profile" style="cursor:pointer;" onclick="window.location.href='<?= base_url('editprofile') ?>'" />
    </div>
  </nav>


  <div class="dashboard">
    <main class="container">
      <section class="left-panel">
        <h2> Available Courses</h2>
         <div class="main-bg">
    <div class="card-container">
    
        <div class="courses-toolbar">
          <select id="courseFilter" class="dropdown-select" onchange="filterCourses()">
  <option value="all">All Category</option>
  <option value="active">Active</option>
  <option value="inactive">Inactive</option>
</select>
          </div>
          
  
    <div class="cards-container" id="cardsContainer">
      <!-- Firebase courses will be rendered here -->
      <div class="empty-card" id="noCoursesMsg">No courses found.</div>
    </div>
    <!-- Remove all PHP/SQL course rendering below -->
    <!--
    <?= csrf_field() ?> 
    <?php
      // Ensure $courses is always an array
      $courses = isset($courses) && is_array($courses) ? $courses : [];
    ?>
    <?php if (!empty($courses)): ?>
      <?php foreach ($courses as $course): ?>
        <div class="course-card" id="course-<?= $course['id'] ?>">
          <div class="course-img"></div>
          <div class="course-info">
            <h3 class="course-title"><?= esc($course['course_name']) ?></h3>
            <p>Created on <?= isset($row['created_at']) ? $row['created_at'] : 'N/A'; ?></p>
            <a href="<?= base_url('course/view/' . $course['id']) ?>" class="btn">View</a>
            <a href="javascript:void(0)" class="btn" onclick="openEditCourseModal(<?= $course['id'] ?>, '<?= esc(addslashes($course['course_name'])) ?>')">Edit</a>
            <a href="javascript:void(0)" class="btn" onclick="deleteCourse(<?= $course['id'] ?>, this)">Delete</a>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="empty-card">No courses found.</div>
    <?php endif; ?>
    -->
    </div>
    <?= csrf_field() ?> <!-- Add this line -->
    
        <?php
          // Ensure $courses is always an array
          $courses = isset($courses) && is_array($courses) ? $courses : [];
        ?>
        <?php if (!empty($courses)): ?>
          <?php foreach ($courses as $course): ?>
            <div class="course-card" id="course-<?= $course['id'] ?>">
              <div class="course-img"></div>
              <div class="course-info">
                <h3 class="course-title"><?= esc($course['course_name']) ?></h3>
                <p>Created on <?= isset($row['created_at']) ? $row['created_at'] : 'N/A'; ?></p>
                <a href="<?= base_url('course/view/' . $course['id']) ?>" class="btn">View</a>
                <a href="javascript:void(0)" class="btn" onclick="openEditCourseModal(<?= $course['id'] ?>, '<?= esc(addslashes($course['course_name'])) ?>')">Edit</a>
                <a href="javascript:void(0)" class="btn" onclick="deleteCourse(<?= $course['id'] ?>, this)">Delete</a>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <!-- <div class="empty-card">No courses found.</div> -->
        <?php endif; ?>
      </section>
      <aside class="right-panel">
        <div class="enrollment-requests">
  <h2>Enrollment Requests</h2>
  <div id="enrollment-list">
    <!-- Enrollment requests will be rendered here by Firebase -->
  </div>
</div>


        <div class="recent-submissions">
          <h2>Recent Submissions</h2>
          <div id="submissionList">
            <!-- Firebase submissions will be loaded here -->
          </div>
        </div>
      </aside>
    </main>
  </div>

  <!-- Edit Course Modal -->
  <div id="editCourseModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeEditCourseModal()">&times;</span>
      <h3>Edit Course Name</h3>
      <form id="editCourseForm">
        <input type="hidden" id="editCourseId">
        <input type="text" id="editCourseName" style="width:100%;padding:8px;margin-bottom:16px;" required>
        <div style="text-align:right;">
          <button type="button" onclick="closeEditCourseModal()" style="margin-right:10px;">Cancel</button>
          <button type="submit" class="btn">Save</button>
        </div>
      </form>
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
        const profileImg = document.getElementById("navbar-profile-pic");
        if (profileImg) {
          profileImg.src = data.photoURL || "public/img/profile.png";
        }
      }
    } catch (err) {}
  }
});
</script>
<script>
/**
 * This script loads enrollment requests from Firestore.
 * It will show all requests for courses where you are the instructor (owner).
 * It works even if the "enrollment_requests" collection does NOT have instructor_id,
 * by joining with your courses.
 * 
 * If the requests are in the DOM but not visible, it's likely a CSS/layout issue.
 * We'll force the container to always be visible and ensure the HTML is correct.
 */

 /**
 * Step-by-step logic for showing user's courses from Firebase:
 * 1. Wait for DOMContentLoaded.
 * 2. Wait for Firebase to be initialized.
 * 3. Wait for user to be authenticated.
 * 4. Query Firestore "courses" collection where user_id == current user's uid.
 * 5. Render each course as a .card (matching your CSS/HTML).
 * 6. Filter by dropdown (all/active/inactive).
 * 7. Show "No courses found" if none.
 */

function waitForFirebaseInit() {
  return new Promise(resolve => {
    if (window.firebase && firebase.apps && firebase.apps.length) {
      resolve();
    } else {
      const interval = setInterval(() => {
        if (window.firebase && firebase.apps && firebase.apps.length) {
          clearInterval(interval);
          resolve();
        }
      }, 50);
    }
  });
}

document.addEventListener("DOMContentLoaded", function () {
  waitForFirebaseInit().then(() => {
    firebase.auth().onAuthStateChanged(function(user) {
      if (!user) {
        // Not logged in, redirect or show message
        document.getElementById('cardsContainer').innerHTML = '';
        document.getElementById('noCoursesMsg').style.display = '';
        return;
      }

      const uid = user.uid;
      const cardsContainer = document.getElementById('cardsContainer');
      const filterSelect = document.getElementById('courseFilter');
      const noCoursesMsg = document.getElementById('noCoursesMsg');

      // Render a single course card (HTML string)
      function renderCourseCard(course) {
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
        const status = course.status || 'active';
        const sectionSem = (course.section ? course.section : '') +
          (course.semester ? ' - ' + (course.semester === "1" ? "First Semester" : course.semester === "2" ? "Second Semester" : course.semester) : '');
        // Use course_code from DB, or fallback to mapping, or empty string
        const code = course.course_code || courseCodeMap[(course.course_name || '').trim().toUpperCase()] || "";
        return `
          <div class="card" data-status="${status}">
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
              </div>
            </div>
          </div>
        `;
      }

      // Query and render courses
      async function loadCourses() {
        if (!cardsContainer) return;
        // Remove all cards except noCoursesMsg
        Array.from(cardsContainer.children).forEach(child => {
          if (child.id !== 'noCoursesMsg') child.remove();
        });
        // Always hide the message before adding cards
        if (noCoursesMsg) noCoursesMsg.style.display = 'none';

        try {
          // Query Firestore for courses belonging to this user
          const snapshot = await firebase.firestore().collection("courses").where("user_id", "==", uid).get();
          let courses = [];
          snapshot.forEach(doc => {
            let data = doc.data();
            data.id = doc.id;
            courses.push(data);
          });

          // Filter by dropdown
          const filter = filterSelect ? filterSelect.value : "all";
          let filtered = courses;
          if (filter !== "all") {
            filtered = courses.filter(c => (c.status || 'active') === filter);
          }

          if (filtered.length === 0) {
            // Show the message if no courses
            if (noCoursesMsg) {
              noCoursesMsg.textContent = 'No courses found.';
              noCoursesMsg.style.display = 'flex';
            }
          } else {
            // Add cards, keep noCoursesMsg hidden
            filtered.forEach(course => {
              const temp = document.createElement('div');
              temp.innerHTML = renderCourseCard(course);
              cardsContainer.insertBefore(temp.firstElementChild, noCoursesMsg);
            });
            if (noCoursesMsg) noCoursesMsg.style.display = 'none';

            // Add click handler for all "View Info" buttons
            cardsContainer.querySelectorAll('.card-btn[data-course-id]').forEach(btn => {
              btn.onclick = function() {
                const courseId = this.getAttribute('data-course-id');
                if (courseId) {
                  window.location.href = '<?= base_url('course/info') ?>/' + courseId;
                }
              };
            });
          }
        } catch (e) {
          // Show error message
          if (noCoursesMsg) {
            noCoursesMsg.textContent = 'Failed to load courses.';
            noCoursesMsg.style.display = 'flex';
          }
        }
      }

      // Initial load
      loadCourses();

      // Reload on filter change
      if (filterSelect) {
        filterSelect.addEventListener('change', loadCourses);
      }
    });
  });
});

// --- FIREBASE ENROLLMENT REQUESTS LOGIC (JOIN WITH COURSES) ---
function renderEnrollmentRequestCard(req, courseName, section) {
  return `
    <div class="request-card" id="enroll-${req.id}">
      <div class="request-info">
        <strong>${req.student_name || "Unknown Student"}</strong>
        <p>Requesting enrollment in ${courseName || req.course_id || "Unknown Course"}${section ? " - Section " + section : ""}</p>
      </div>
      <div class="request-actions">
        <button class="btn-approve" onclick="updateEnrollmentRequest('${req.id}', 'approved')">Approve</button>
        <button class="btn-reject" onclick="updateEnrollmentRequest('${req.id}', 'rejected')">Reject</button>
      </div>
    </div>
  `;
}

async function loadEnrollmentRequestsForInstructor(uid) {
  const container = document.getElementById('enrollment-list');
  if (!container) return;
  container.innerHTML = '<div class="empty-card">Loading...</div>';

  try {
    // 1. Get all courses where user_id == uid
    const coursesSnap = await firebase.firestore().collection("courses").where("user_id", "==", uid).get();
    const courses = {};
    coursesSnap.forEach(doc => {
      const data = doc.data();
      courses[doc.id] = {
        name: data.course_name || "Unknown Course",
        section: data.section || ""
      };
    });
    const courseIds = Object.keys(courses);

    // 2. Get all enrollment_requests where status == "pending"
    // (We can't filter by course_id if it's not a document ID)
    const reqSnap = await firebase.firestore()
      .collection("enrollment_requests")
      .where("status", "==", "pending")
      .get();

    let requests = [];
    reqSnap.forEach(doc => {
      let data = doc.data();
      data.id = doc.id;
      requests.push(data);
    });

    // Only show requests for courses you own (by name match or by ID match)
    const filtered = requests.filter(req => {
      // If course_id matches a course document ID, or matches a course name you own
      return courses[req.course_id] || Object.values(courses).some(c => c.name === req.course_id);
    });

    if (filtered.length === 0) {
      container.innerHTML = '<div class="empty-card">No pending enrollment requests</div>';
    } else {
      container.innerHTML = filtered.map(req => {
        // If course_id matches a course document ID, use that course's name
        if (courses[req.course_id]) {
          return renderEnrollmentRequestCard(req, courses[req.course_id].name, courses[req.course_id].section);
        }
        // If course_id is actually the course name, use it directly
        return renderEnrollmentRequestCard(req, req.course_id, req.section || "");
      }).join('');
    }
  } catch (e) {
    container.innerHTML = '<div class="empty-card">Failed to load enrollment requests.</div>';
    console.error("Error loading enrollment requests:", e);
  }
}

window.updateEnrollmentRequest = async function(requestId, newStatus) {
  if (!confirm(`Are you sure you want to ${newStatus} this enrollment request?`)) return;
  try {
    await firebase.firestore().collection("enrollment_requests").doc(requestId).update({
      status: newStatus
    });
    const card = document.getElementById('enroll-' + requestId);
    if (card) card.remove();
    if (!document.querySelector('#enrollment-list .request-card')) {
      document.getElementById('enrollment-list').innerHTML = '<div class="empty-card">No pending enrollment requests</div>';
    }
    alert(`Enrollment request ${newStatus} successfully`);
  } catch (e) {
    alert('Failed to update status: ' + e.message);
  }
};

document.addEventListener("DOMContentLoaded", function () {
  firebase.auth().onAuthStateChanged(function(user) {
    if (!user) return;
    loadEnrollmentRequestsForInstructor(user.uid);
  });
});

// --- RECENT SUBMISSIONS PANEL LOGIC (Task + Quiz) ---
// 🔹 Full Code: Load Enrollment Requests with User Full Names
async function loadEnrollmentRequestsForInstructor(uid) {
  const db = firebase.firestore();
  const container = document.getElementById('enrollment-list');
  container.innerHTML = '<div class="empty-card">Loading...</div>';

  try {
    const coursesSnap = await db.collection("courses")
      .where("user_id", "==", uid).get();

    const courses = {};
    coursesSnap.forEach(doc => {
      const d = doc.data();
      courses[doc.id] = { name: d.course_name || "Unknown", section: d.section || "" };
    });

    const reqSnap = await db.collection("enrollment_requests")
      .where("status", "==", "pending").get();

    let requests = reqSnap.docs.map(d => ({ id: d.id, ...(d.data()) }));
    requests = requests.filter(req =>
      courses[req.course_id] || Object.values(courses).some(c => c.name === req.course_id)
    );

    if (requests.length === 0) {
      container.innerHTML = '<div class="empty-card">No pending enrollment requests</div>';
      return;
    }

    const studentIds = [...new Set(requests.map(r => r.student_id))];
    const usersSnap = await db.collection('users')
      .where(firebase.firestore.FieldPath.documentId(), 'in', studentIds)
      .get();

    const userMap = {};
    usersSnap.forEach(doc => {
      userMap[doc.id] = doc.data().fullName || doc.data().name || doc.id;
    });

    container.innerHTML = requests
      .map(req => {
        const studentName = userMap[req.student_id] || req.student_name || "Unknown Student";
        const courseInfo = courses[req.course_id] || { name: req.course_id, section: req.section || "" };
        return `
          <div class="request-card" id="enroll-${req.id}">
            <div class="request-info">
              <strong>${studentName}</strong>
              <p>Requesting enrollment in ${courseInfo.name}${courseInfo.section ? ' – Section ' + courseInfo.section : ''}</p>
            </div>
            <div class="request-actions">
              <button class="btn-approve" onclick="updateEnrollmentRequest('${req.id}', 'approved')">Approve</button>
              <button class="btn-reject"  onclick="updateEnrollmentRequest('${req.id}', 'rejected')">Reject</button>
            </div>
          </div>
        `;
      })
      .join('');

  } catch (e) {
    container.innerHTML = '<div class="empty-card">Failed to load enrollment requests</div>';
    console.error(e);
  }
}


// 🔹 Full Code: Load Recent Submissions with Student Names
async function loadRecentSubmissionsDashboard() {
  const db = firebase.firestore();
  const submissionList = document.getElementById('submissionList');
  submissionList.innerHTML = '<div style="padding:16px;">Loading...</div>';

  try {
    const submissionsSnap = await db.collectionGroup('submissions')
      .orderBy('timestamp', 'desc')
      .limit(10).get();

    const submissions = submissionsSnap.docs.map(doc => {
      const d = doc.data();
      let title = d.title || '';
      let type = d.type || '';
      let courseId = '';
      let taskOrQuizId = '';
      // Parse Firestore path: .../courses/{courseId}/tasks/{taskId}/submissions/{subId} or .../courses/{courseId}/quizzes/{quizId}/submissions/{subId}
      const path = doc.ref.path.split('/');
      if (path.length >= 6) {
        courseId = path[1];
        taskOrQuizId = path[3];
        type = path[2] === 'tasks' ? 'Task' : (path[2] === 'quizzes' ? 'Quiz' : '');
      }
      return {
        subId: doc.id,
        ...d,
        userId: d.userId || d.student_id || '',
        timestamp: d.timestamp?.toDate?.() || null,
        courseId,
        taskOrQuizId,
        type,
        title
      };
    });

    // --- Fetch user names for all unique userIds ---
    const studentIds = [...new Set(submissions.map(s => s.userId).filter(Boolean))];
    let userMap = {};
    if (studentIds.length) {
      for (let i = 0; i < studentIds.length; i += 10) {
        const batch = studentIds.slice(i, i + 10);
        const usersSnap = await db.collection('users')
          .where(firebase.firestore.FieldPath.documentId(), 'in', batch)
          .get();
        usersSnap.forEach(doc => {
          userMap[doc.id] = doc.data().fullName || doc.data().name || doc.id;
        });
      }
    }

    // --- Fetch missing task/quiz titles in batch ---
    const missingTitles = submissions.filter(s => !s.title && s.courseId && s.taskOrQuizId);
    let titleMap = {};
    for (const s of missingTitles) {
      const parentCol = s.type === 'Task' ? 'tasks' : (s.type === 'Quiz' ? 'quizzes' : null);
      if (!parentCol) continue;
      const docRef = db.collection('courses').doc(s.courseId).collection(parentCol).doc(s.taskOrQuizId);
      try {
        const docSnap = await docRef.get();
        if (docSnap.exists) {
          titleMap[s.taskOrQuizId] = docSnap.data().title || docSnap.data().name || s.taskOrQuizId;
        }
      } catch (e) {}
    }

    submissionList.innerHTML = submissions.map(sub => {
      const name = userMap[sub.userId] || sub.studentName || 'Student';
      const percent = sub.score && sub.totalPossiblePoints
        ? Math.round((sub.score / sub.totalPossiblePoints) * 100) : 0;
      const scoreText = (sub.score != null && sub.totalPossiblePoints != null)
        ? `${sub.score}/${sub.totalPossiblePoints}` : '-';
      // Use fetched title if missing, and show (Quiz) or (Task)
      const activityTitle = sub.title || titleMap[sub.taskOrQuizId] || sub.taskOrQuizId || '';
      const activityType = sub.type ? `(${sub.type})` : '';
      return `
        <div class="submission-card">
          <div class="submission-icon">${name[0]}</div>
          <div class="submission-details">
            <strong>${name}</strong>
            <p>${activityTitle ? activityTitle : ''} <span style="color:#888;font-size:0.95em;">${activityType}</span></p>
            <small>${sub.timestamp ? new Date(sub.timestamp).toLocaleString() : ''}</small>
            <div>
              <span class="score">${scoreText}</span>
              <div class="progress" style="display:inline-block;width:60px;height:8px;vertical-align:middle;margin-left:8px;">
                <div class="progress-bar" style="width:${percent}%;height:100%;background:#4caf50;border-radius:5px;"></div>
              </div>
              <a href="#" class="grade-btn" onclick="event.preventDefault(); openSubmissionPreview('${sub.type}','${sub.courseId}','${sub.taskOrQuizId}','${sub.subId}')">Grade</a>
            </div>
          </div>
        </div>
      `;
    }).join('');

  } catch (e) {
    submissionList.innerHTML = `<div style="padding:16px;color:#c00;">Error: ${e.message}</div>`;
    console.error(e);
  }
}

// Dummy preview handler (replace with your own logic)
window.openSubmissionPreview = function(type, courseId, id, subId) {
  if (type === 'Task') {
    // Redirect to grading/previewgrade or similar
    window.location.href = "<?= base_url('grading/previewgrade') ?>";
  } else if (type === 'Quiz') {
    window.location.href = "<?= base_url('grading/preview_quiz') ?>";
  }
};

document.addEventListener("DOMContentLoaded", function () {
  // ...existing code...
  firebase.auth().onAuthStateChanged(function(user) {
    if (user) loadRecentSubmissionsDashboard();
  });
});
</script>
</body>
</html>