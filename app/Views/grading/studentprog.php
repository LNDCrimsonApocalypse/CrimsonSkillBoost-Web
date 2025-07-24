<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap" rel="stylesheet">

  <style>
    body {
      margin: 0;
      font-family: 'Montserrat', sans-serif;
      background: #ffeefb;
    }
    header {
      background: #fff;
      display: flex;
      align-items: center;
      justify-content: center; /* Center content horizontally */
      padding: 20px 40px;
      border-bottom: 1px solid #ccc;
      position: relative; /* For absolute positioning of right section */
    }
    .logo {
      display: flex;
      align-items: center;
      /* Remove flex-grow to avoid stretching */
    }
    .logo img {
      height: 40px;
      margin-right: 15px;
    }
    .navbar-center {
      display: flex;
      gap: 36px;
      align-items: center;
      justify-content: center; /* Center links horizontally */
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
      .tabbar {
  display: flex;
  flex-direction: row;
  gap: 36px;
  font-size: 1.1rem;
  font-weight: 500;
  background: #fff;
  border-bottom: 1.5px solid #f8e6f6;
  min-height: 38px;
  align-items: center;
  padding: 0 0 0 24px;
  margin: 0;
  position: static;
  width: 100%;
}
.tabbar a {
  text-decoration: none;
  color: #3a2352;
  font-weight: 600;
  font-size: 1.15rem;
  padding: 0 8px;
  transition: color 0.18s;
  border-bottom: 3px solid transparent;
  background: none;
}
.tabbar a:hover,
.tabbar a.active {
  color: #e636a4;
  border-bottom: 3px solid #e636a4;
}
.tabbar span {
  font-weight: 500;
  cursor: pointer;
}
.tabbar .active {
  color: #e636a4;
  font-weight: bold;
  border-bottom: 3px solid #e636a4;
  padding-bottom: 5px;
}
    .filters {
      display: flex;
      gap: 15px;
      margin: 20px;
      justify-content: center;
    }
    .filters select {
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    .cards {
      display: flex;
      gap: 20px;
      justify-content: center;
      margin: 20px;
    }
    .card {
      background: #e7eefe;
      padding: 20px;
      border-radius: 10px;
      text-align: center;
      width: 150px;
      border: 1px solid #b4b4f5;
    }
    .progress {
      margin: 30px;
    }
    .progress h2 {
      margin-left: 20px;
    }
    .progress-table {
      background: white;
      border-radius: 10px;
      margin: 0 20px;
      padding: 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    .table-container {
      margin: 20px 40px;
      background-color: #EED2EE;
      border-radius: 6px;
      overflow-x: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      min-width: 900px;
    }

    thead {
      background-color: #EED2EE;
      font-weight: bold;
    }

    th, td {
      padding: 15px 20px;
      text-align: left;
    }

    td {
      background-color: white;
      vertical-align: middle;
    }

    .student-info {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .student-info img {
      width: 45px;
      height: 45px;
      border-radius: 50%;
    }

    .student-name {
      display: flex;
      flex-direction: column;
    }

    .student-name small {
      font-size: 12px;
      color: gray;
    }

    .task-name {
      font-weight: bold;
    }

    .action-img {
      width: 35px;
      height: 35px;
      border-radius: 50%;
      border: 4px solid white;
      box-shadow: 0 0 0 2px #2196f3;
      object-fit: cover;
      margin-left: 10px;
    }
    .student-info {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .student-info img {
      border-radius: 50%;
      width: 50px;
    }
    .status {
      color: green;
      font-size: 0.9rem;
    }
    .remarks {
      display: flex;
      gap: 20px;
      align-items: center;
    }
    .remarks .circle {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      border: 5px solid green;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
    }
    .remarks .btn {
      background: #8d5bf4;
      color: white;
      border: none;
      padding: 8px 12px;
      border-radius: 5px;
      cursor: pointer;
      font-size: 0.9rem;
    }
    .remarks .trash {
      cursor: pointer;
      font-size: 20px;
      color: #aaa;
    }
     .navbar-profile {
      width: 48px;
      height: 48px;
      border-radius: 50%;
      object-fit: cover;
      border: none;
      background: #fff;
    }
     
    .navbar-right {
      display: flex;
      align-items: center;
      gap: 14px;
      position: absolute;
      right: 40px;
      top: 50%;
      transform: translateY(-50%);
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
    .progress-table {
  background: white;
  border-radius: 10px;
  margin: 0 20px;
  padding: 24px 32px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.student-info-large {
  display: flex;
  align-items: center;
  gap: 18px;
}

.student-avatar {
  width: 64px;
  height: 64px;
  border-radius: 50%;
  background: #e6e6e6;
}

.student-name {
  font-size: 1.13rem;
}

.email {
  color: #888;
  font-size: 0.97rem;
}

.student-status {
  color: #22b573;
  font-size: 0.97rem;
  font-weight: 500;
  margin-left: 10px;
}

.last-updated {
  color: #aaa;
  font-size: 1rem;
}

.progress-actions {
  display: flex;
  align-items: center;
  gap: 36px;
}

.progress-col {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.progress-circle {
  position: relative;
  width: 60px;
  height: 60px;
}

.progress-label {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-weight: bold;
  font-size: 1.1rem;
}

.progress-label.quiz {
  color: #0a8800;
}
.progress-label.task {
  color: #22b573;
}


.btn.grade-quiz,
.btn.grade-task {
      background: linear-gradient(90deg, #e636a4 0%, #b983ff 100%);
      color: #fff;
      border: none;
      border-radius: 20px;
      padding: 10px 20px;
      cursor: pointer;
      letter-spacing: 1.5px;
      transition: background 0.2s, box-shadow 0.2s;
      box-shadow: 0 2px 8px rgba(230,54,164,0.08);
    }
   

.progress-desc {
  font-size: 0.85rem;
  color: #888;
  margin-top: 2px;
}

.progress-divider {
  width: 2px;
  height: 48px;
  background: #eee;
  margin: 0 12px;
}

.progress-trash {
  margin-left: 32px;
  display: flex;
  align-items: center;
}

.trash {
  font-size: 2rem;
  color: #bbb;
  cursor: pointer;
}
  </style>
</head>
<body>
  <header>
    <div class="logo" style="position: absolute; left: 40px;">
      <img src="<?= base_url('public/img/Logo.png') ?>"  alt="Logo">
    </div>
    <div class="navbar-center" style="margin: 0 auto;">
      <a href="<?= base_url('homepage') ?>" >HOME</a> 
      <a href="<?= base_url('dashboard') ?>">DASHBOARD</a>
      <a href="<?= base_url('aboutus') ?>">ABOUT</a>
      <a href="<?= base_url('allcourses') ?>">COURSES</a>
    </div>
    <div class="navbar-right">
      <input class="search-box" type="text" placeholder="Search.." />
      <a href="<?= base_url('editprofile') ?>">
        <img src="" id="navbar-profile-pic" alt="profile" class="profile" style="cursor:pointer;" />
      </a>
    </div>
  </header>

  <div class="tabbar">
    <a href="<?= base_url('topics') . '?course_id=' . urlencode($course_id ?? '') ?>"><span>Topic</span></a>
    <a href="<?= base_url('task_list') . '?course_id=' . urlencode($course_id ?? '') ?>"> <span>Task</span></a>
    <a href="<?= base_url('quiz_list') . '?course_id=' . urlencode($course_id ?? '') ?>"><span>Quiz</span></a>
    <a href="<?= base_url('studentprog') . '?course_id=' . urlencode($course_id ?? '') ?>"><span>Student</span></a>
    <a href="<?= base_url('gradesettings') ?>"><span>Grade Settings</span></a>
  </div>

  <div class="filters">
    <select><option>All Courses</option></select>
    <select><option>Section</option></select>
    <select><option>Filtered by Date</option></select>
  </div>

  <div class="cards">
    <div class="card">
      <p>Accuracy</p>
      <p>0%</p>
      <small>QUIZ / TASK</small>
    </div>
    <div class="card">
      <p>Completion Rate</p>
      <p>0%</p>
      <small>QUIZ / TASK</small>
    </div>
    <div class="card">
      <p>Total Students</p>
      <h2>1,015</h2>
    </div>
  </div>

  <div class="progress">
    <h2>STUDENT PROGRESS</h2>
    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>Student</th>
            <th>Email</th>
            <th>Status</th>
            <th>Quiz Completion</th>
            <th>Task Completion</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody id="studentProgressBody">
          <!-- Student progress rows will be loaded by JS -->
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
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

document.addEventListener("DOMContentLoaded", function() {
  // Use course_id from PHP, fallback to query string if empty
  let courseId = "<?= isset($course_id) ? esc($course_id) : '' ?>";
  if (!courseId) {
    const params = new URLSearchParams(window.location.search);
    courseId = params.get('course_id') || '';
  }
  const tbody = document.getElementById('studentProgressBody');
  if (!tbody) return;

  async function loadStudentProgress() {
    const db = firebase.firestore();
    // Get all students enrolled in this course
    let students = [];
    try {
      // Use courseId in Firestore queries
      const enrollSnap = await db.collection('enrollment_requests')
        .where('course_id', '==', courseId)
        .where('status', '==', 'approved')
        .get();
      const studentIds = [];
      enrollSnap.forEach(doc => {
        const data = doc.data();
        if (data.student_id) studentIds.push(data.student_id);
      });
      // Fetch user info
      let userMap = {};
      if (studentIds.length) {
        for (let i = 0; i < studentIds.length; i += 10) {
          const batch = studentIds.slice(i, i + 10);
          const usersSnap = await db.collection('users')
            .where(firebase.firestore.FieldPath.documentId(), 'in', batch)
            .get();
          usersSnap.forEach(doc => {
            userMap[doc.id] = doc.data();
          });
        }
      }
      // For each student, get quiz/task completion
      let rows = '';
      // Get all quizzes for this course
      const quizzesSnap = await db.collection('quizzes').where('course_id', '==', courseId).get();
      const quizIds = quizzesSnap.docs.map(doc => doc.id);
      const quizTotal = quizIds.length;
      // Get all tasks for this course
      const tasksSnap = await db.collection('courses').doc(courseId).collection('tasks').get();
      const taskIds = tasksSnap.docs.map(doc => doc.id);
      const taskTotal = taskIds.length;

      for (const studentId of studentIds) {
        const user = userMap[studentId] || {};
        const name = user.fullName || user.name || 'Student';
        const email = user.email || '';
        // Quiz completion count
        let quizComplete = 0;
        for (const quizId of quizIds) {
          const subSnap = await db.collection('quizzes').doc(quizId).collection('submissions').where('userId', '==', studentId).get();
          if (!subSnap.empty) quizComplete++;
        }
        // Task completion count
        let taskComplete = 0;
        for (const taskId of taskIds) {
          const subSnap = await db.collection('courses').doc(courseId).collection('tasks').doc(taskId).collection('submissions').where('userId', '==', studentId).get();
          if (!subSnap.empty) taskComplete++;
        }
        rows += `
          <tr>
            <td>
              <div class="student-info">
                <img src="${user.profilePic || '<?= base_url('public/img/profile_student.png') ?>'}" alt="Student">
                <div class="student-name">${name}</div>
              </div>
            </td>
            <td>${email}</td>
            <td><span class="status">Active</span></td>
            <td>${quizComplete}/${quizTotal}</td>
            <td>${taskComplete}/${taskTotal}</td>
            <td>
              <button class="btn grade-quiz" onclick="window.location.href='<?= base_url('grading/preview_quiz') ?>'">Grade Quiz</button>
              <button class="btn grade-task" onclick="window.location.href='<?= base_url('grading/previewgrade') ?>'">Grade Task</button>
            </td>
          </tr>
        `;
      }
      tbody.innerHTML = rows || `<tr><td colspan="6" style="text-align:center;color:#888;">No students found.</td></tr>`;
    } catch (e) {
      tbody.innerHTML = `<tr><td colspan="6" style="text-align:center;color:#c00;">Error loading student progress.</td></tr>`;
    }
  }

  if (courseId) {
    loadStudentProgress();
  } else {
    tbody.innerHTML = `<tr><td colspan="6" style="text-align:center;color:#888;">No course selected.</td></tr>`;
  }
});
</script>