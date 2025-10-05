<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Quiz Dashboard</title>
  <!-- Add Google Fonts link for Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background-color: #fff0f5;
    }
 /* Navbar */
     .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 30px;
      background-color: white;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      position: sticky;
      top: 0;
      z-index: 10;
    }

    .navbar-logo {
      flex: 1;
      display: flex;
      align-items: center;
    }

    .navbar-logo .logo {
      width: 40px;
    }

    .navbar-center {
      flex: 2;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 30px;
    }

    .navbar-center a {
      text-decoration: none;
      color: black;
      font-weight: bold;
      margin: 0 10px;
    }

    .navbar-center .dropdown {
      position: relative;
    }

   
  
    .navbar-right {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: flex-end;
      gap: 15px; /* space between search, bell, and profile */
    }

    .navbar-right input[type="text"] {
      padding: 6px 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      /* Remove margin-right to avoid extra space */
      margin: 0;
      width: 140px;
    }

    .navbar-right img.profile {
      width: 35px;
      height: 35px;
      border-radius: 50%;
      object-fit: cover;
      cursor: pointer;
    }

    .navbar-right img.icon {
      width: 25px;
      height: 25px;
      cursor: pointer;
      /* Align vertically with profile */
      vertical-align: middle;
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
    
  
  .navbar-right button {
        background: #ff3bbd;
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: bold;
      padding: 8px 22px;
      cursor: pointer;
      transition: background 0.2s;
      margin-right: 8px;
    }
      .navbar-right button {
      background: #d12c5c;
    }
    .search {
      padding: 8px 12px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .add-content-btn {
      background-color: #f542a4;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
    }

    .main {
      display: flex;
      padding: 40px;
      gap: 40px;
    }

    .left-column {
      flex: 1;
    }

    .right-column {
      width: 300px;
      background-color: white;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .filters {
      display: flex;
      align-items: center;
      gap: 18px;
      margin-bottom: 20px;
      margin-left: 8px;
    }
    .filters-label {
      font-weight: 600;
      font-size: 1.08rem;
      margin-right: 6px;
      color: #111;
    }
    .filter-select {
      background: #d6d6d6;
      border: none;
      border-radius: 3px;
      font-weight: bold;
      font-size: 1rem;
      color: #222;
      padding: 8px 38px 8px 16px;
      appearance: none;
      -webkit-appearance: none;
      -moz-appearance: none;
      position: relative;
      min-width: 140px;
      cursor: pointer;
      background-image: url('data:image/svg+xml;utf8,<svg fill="black" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/></svg>');
      background-repeat: no-repeat;
      background-position: right 12px center;
      background-size: 18px 18px;
    }
    .filter-select.date {
      background: #d6d6d6 url('data:image/svg+xml;utf8,<svg fill="black" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/></svg>') no-repeat right 12px center;
      padding-left: 38px;
      background-size: 18px 18px;
    }
    .filter-select:after {
      content: '';
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      pointer-events: none;
    }
    .quiz-card {
      background: #fff;
      border-radius: 18px;
      box-shadow: 0 2px 12px rgba(0,0,0,0.08);
      padding: 0 0 0 0;
      position: relative;
      margin-bottom: 32px;
      overflow: hidden;
      min-width: 340px;
      max-width: 420px;
    }
    .quiz-card .enrolled-badge {
      position: absolute;
      top: 14px;
      left: 14px;
      background: #222;
      color: #fff;
      font-size: 0.93rem;
      font-weight: 600;
      padding: 4px 12px;
      border-radius: 8px;
      z-index: 2;
      opacity: 0.92;
      letter-spacing: 0.5px;
    }
    .quiz-card img {
      width: 100%;
      height: 120px;
      object-fit: cover;
      border-radius: 18px 18px 0 0;
      display: block;
    }
    .quiz-card-content {
      padding: 18px 24px 0 24px;
    }
    .quiz-card h3 {
      margin: 0 0 6px 0;
      font-size: 1.25rem;
      font-weight: 700;
      color: #222;
    }
    .quiz-card .due {
      color: #8a8a8a;
      font-size: 0.98rem;
      margin-bottom: 12px;
      font-weight: 500;
      letter-spacing: 0.5px;
    }
    .quiz-card .tags {
      display: flex;
      gap: 10px;
      margin: 10px 0 0 0;
    }
    .quiz-card .tag {
      padding: 6px 18px;
      border-radius: 12px;
      font-size: 0.98rem;
      font-weight: 600;
      letter-spacing: 0.5px;
      border: none;
      background: #eee;
      color: #555;
    }
    .quiz-card .tag.required {
      background: #ffd6df;
      color: #d12c5c;
    }
    .quiz-card .tag.logical {
      background: #e9e9e9;
      color: #888;
    }
    .quiz-card .meta-row {
      display: flex;
      align-items: center;
      gap: 18px;
      margin: 12px 0 0 0;
      font-size: 0.98rem;
      color: #888;
    }
    .quiz-card .meta-row .dot {
      width: 6px;
      height: 6px;
      background: #bbb;
      border-radius: 50%;
      display: inline-block;
      margin: 0 8px;
    }
    .quiz-card .meta-row .questions {
      font-weight: 700;
      color: #222;
      display: flex;
      align-items: center;
      gap: 6px;
    }
    .quiz-card-footer {
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-top: 1.5px solid #f2f2f2;
      padding: 18px 24px 12px 24px;
      margin-top: 18px;
    }
    .quiz-card-footer .assigned {
      color: #22b573;
      font-size: 1.18rem;
      font-weight: 700;
      letter-spacing: 1px;
    }
    .quiz-card-footer .running {
      color: #e63636;
      font-size: 1.18rem;
      font-weight: 700;
      letter-spacing: 1px;
    }
    .quiz-card-footer .menu {
      font-size: 2rem;
      color: #bbb;
      cursor: pointer;
      margin-left: 10px;
      margin-right: -8px;
      user-select: none;
    }
    .status {
      display: flex;
      justify-content: space-between;
      margin-top: 10px;
      align-items: center;
    }

    .status .assigned {
      color: green;
      font-weight: bold;
    }

    .status .running {
      color: red;
      font-weight: bold;
    }

    .recent-submission h3 {
      margin-bottom: 20px;
      font-size: 20px;
    }

    .submission {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 12px;
      padding: 8px;
      border-radius: 8px;
      background: #f9f9f9;
    }

    .submission .name {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .submission img {
      width: 30px;
      height: 30px;
      border-radius: 50%;
    }

    .progress {
      flex: 1;
      height: 10px;
      background-color: #ddd;
      border-radius: 5px;
      margin-left: 10px;
      position: relative;
    }

    .progress-bar {
      height: 100%;
      background-color: #4caf50;
      border-radius: 5px;
      width: 100%;
    }

    .score {
      margin-left: 10px;
      font-size: 12px;
      font-weight: bold;
    }

     .dropbtn {
  text-decoration: none;
  font-weight: bold;
  font-size: 1.5rem;
  color: black;
  background: none;
  border: none;
  cursor: pointer;
  padding: 8px;
}

/* Dropdown container */
.dropdown {
  position: relative;
}

/* Dropdown menu */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: white;
  min-width: 160px;
  box-shadow: 0 8px 16px rgba(0,0,0,0.1);

  z-index: 1;
}

/* Dropdown items */
.dropdown-content a {
  padding: 12px 16px;
  display: block;
  color: black;
  text-decoration: none;
}

.dropdown-content a:hover {
  background-color: #eee;
}

/* Show dropdown on hover */
.dropdown:hover .dropdown-content {
  display: block;
}
.arrow {
    font-size: 1.2rem;
    margin-left: 4px;
    vertical-align: middle;
    /* Ensures the arrow is centered with the text */
}
 .dropdown .arrow {
            font-size: 1rem;
            margin-left: 4px;
        }
        li{
          font-weight: bold;
  list-style-type: none;
  padding: 0;
  margin: 0;

        }
  </style>
</head>
<body>
  <div class="navbar">
    <div class="navbar-logo">
      <a href="<?= base_url('homepage') ?>">
        <img src="<?= base_url('public/img/Logo.png') ?>" alt="logo" class="logo"/>
      </a>
    </div>
    <div class="navbar-center">
    <a href="<?= base_url('homepage') ?>">HOME</a>
          <a href="<?= base_url('dashboard') ?>">DASHBOARD</a>
       <a href="<?= base_url('aboutus') ?>">ABOUT</a>
        <a href="<?= base_url('allcourses') ?>">COURSES</a>
    </div>
    <div class="navbar-right">
      <input type="text" placeholder="Search.." />
      <button onclick="window.location.href='<?= base_url('quiz') . '?course_id=' . urlencode($course_id) ?>'">+ Add Content</button>
      <img src="<?= base_url('public/img/notifications.png') ?>" alt="Notifications" class="icon" />    
      <img src="<?= base_url('public/img/profile.png') ?>" alt="profile" class="profile"/>
    </div>
  </div>


  <!-- Tab Bar -->
   <div class="tabbar">
     <a href="<?= base_url('topics') ?>/<?= urlencode($course_id) ?>"><span>Topic</span></a>
    <a href="<?= base_url('task_list') ?>?course_id=<?= urlencode($course_id) ?>"><span>Task</span></a>
    <a href="<?= base_url('quiz_list') ?>?course_id=<?= urlencode($course_id) ?>"><span>Quiz</span></a>
   <a href="<?= base_url('studentprog') ?>?course_id=<?= urlencode($course_id) ?>"><span>Student</span></a>
  </div>

  <div class="main">
    <div class="left-column">
      <div class="filters">
        <span class="filters-label">Filtered by:</span>
        <select class="filter-select">
          <option>III - BCSAD</option>
        </select>
        <select class="filter-select date">
          <option>Filtered by Date</option>
        </select>
      </div>
      <div id="quizCards"></div>
    </div>

    <div class="right-column recent-submission">
      <h3>Recent Submission</h3>
      <div id="submissionList">
        <!-- Firebase submissions will be loaded here -->
      </div>
    </div>
  </div>

  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
  <script src="<?= base_url('public/js/firebase-config.js') ?>"></script>
  <script>
    // Render quizzes for this course
    function truncateText(text, maxLength = 80) {
      if (!text) return '';
      return text.length > maxLength ? text.substring(0, maxLength) + '…' : text;
    }

    let quizzesGlobal = [];
let selectedQuizId = null;

function renderQuizCards(quizzes) {
  quizzesGlobal = quizzes;
  const quizCards = document.getElementById('quizCards');
  if (!quizCards) return;
  if (!quizzes.length) {
    quizCards.innerHTML = "<div style='padding:20px;color:#888;'>No quizzes found for this course.</div>";
    document.getElementById('submissionList').innerHTML = "<div style='padding:10px;color:#888;'>No submissions.</div>";
    return;
  }
  quizCards.innerHTML = '';
  quizzes.forEach(q => {
    const quizUrl = "<?= base_url('questionsquiz2') ?>" + "?course_id=" + encodeURIComponent("<?= $course['id'] ?>") + "&quiz_id=" + encodeURIComponent(q.id);
    quizCards.innerHTML += `
      <div class="quiz-card" data-quiz-id="${q.id}" style="cursor:pointer;">
        <span class="enrolled-badge">${q.enrolled || ''}</span>
        <img src="<?= base_url('public/img/11.png')?>" alt="Quiz Image">
        <div class="quiz-card-content">
          <h3><a href="${quizUrl}" style="color:inherit;text-decoration:none;">${q.title || q.id}</a></h3>
          <div class="due">${q.due ? 'DUE ' + q.due : ''}</div>
          <div class="tags">
            <span class="tag logical">Logical</span>
            <span class="tag required">Required</span>
          </div>
          <div class="meta-row">
            ${q.edited || ''} <span class="dot"></span>
            <span class="questions">❓ <span id="qcount-${q.id}">...</span> Questions</span>
          </div>
        </div>
        <div class="quiz-card-footer">
          <span class="assigned">${q.status === 'assigned' ? 'Assigned' : ''}</span>
          <span class="running">${q.status === 'running' ? 'Running' : ''}</span>
          <button style="background:#4b4bf0;color:#fff;border:none;border-radius:6px;padding:6px 14px;font-weight:600;cursor:pointer;margin-left:8px;" onclick="openQuizSubmissions('${q.id}')">View Submissions</button>
          <span class="menu">⋯</span>
        </div>
      </div>
    `;
  });

  // Fetch number of questions for each quiz (live from Firestore subcollection)
  quizzes.forEach(q => {
    firebase.firestore().collection('quizzes').doc(q.id).collection('questions').get()
      .then(snap => {
        document.getElementById('qcount-' + q.id).textContent = snap.size;
      })
      .catch(() => {
        document.getElementById('qcount-' + q.id).textContent = '0';
      });
  });

  // Add click handler to quiz cards for filtering submissions
  Array.from(quizCards.getElementsByClassName('quiz-card')).forEach(card => {
    card.onclick = function(e) {
      // Prevent click if View Submissions button is clicked
      if (e.target.tagName === 'BUTTON') return;
      const quizId = card.getAttribute('data-quiz-id');
      selectedQuizId = quizId;
      Array.from(quizCards.getElementsByClassName('quiz-card')).forEach(c => c.style.boxShadow = '');
      card.style.boxShadow = '0 0 0 3px #e636a4';
      loadSubmissionsForQuiz(quizId);
    };
  });

  // By default, select the first quiz
  selectedQuizId = quizzes[0].id;
  quizCards.getElementsByClassName('quiz-card')[0].style.boxShadow = '0 0 0 3px #e636a4';
  loadSubmissionsForQuiz(selectedQuizId);
}

// Add this function to handle the View Submissions button
window.openQuizSubmissions = function(quizId) {
  const courseId = "<?= esc($course_id) ?>";
  window.location.href = "<?= base_url('grading/preview_quiz') ?>" +
    "?course_id=" + encodeURIComponent(courseId) +
    "&quiz_id=" + encodeURIComponent(quizId);
};

function loadSubmissionsForQuiz(quizId) {
  const db = firebase.firestore();
  const submissionList = document.getElementById('submissionList');
  submissionList.innerHTML = '<div style="padding:10px;">Loading...</div>';
  db.collection('quizzes').doc(quizId).collection('submissions').get()
    .then(async snapshot => {
      if (snapshot.empty) {
        submissionList.innerHTML = "<div style='padding:10px;color:#888;'>No submissions found.</div>";
        return;
      }
      let submissions = [];
      snapshot.forEach(doc => {
        const sub = doc.data();
        sub._quizId = quizId;
        sub._subId = doc.id;
        submissions.push(sub);
      });

      // Sort by timestamp descending if available
      submissions.sort((a, b) => (b.timestamp || 0) - (a.timestamp || 0));

      // Fetch user names for all unique userIds
      const userIds = [...new Set(submissions.map(sub => sub.userId || sub.student_id).filter(Boolean))];
      let userMap = {};
      if (userIds.length) {
        for (let i = 0; i < userIds.length; i += 10) {
          const batch = userIds.slice(i, i + 10);
          const usersSnap = await db.collection('users')
            .where(firebase.firestore.FieldPath.documentId(), 'in', batch)
            .get();
          usersSnap.forEach(doc => {
            userMap[doc.id] = doc.data().fullName || doc.data().name || doc.id;
          });
        }
      }

      let html = '';
      submissions.forEach(sub => {
        const score = (sub.score !== undefined && sub.totalPossiblePoints !== undefined)
          ? `${sub.score}/${sub.totalPossiblePoints}`
          : '-';
        const percent = sub.score && sub.totalPossiblePoints
          ? Math.round((sub.score / sub.totalPossiblePoints) * 100)
          : 0;
        const uid = sub.userId || sub.student_id;
        const studentName = userMap[uid] || sub.studentName || sub.username || 'Student';
        html += `
          <div class="submission"
               style="cursor:pointer;"
               data-quiz-id="${sub._quizId}"
               data-submission-id="${sub._subId}">
            <div class="name">
              ${sub.profilePic ? `<img src="${sub.profilePic}" />` : ''}
              ${studentName}
            </div>
            <div class="score">${score}</div>
            <div class="progress"><div class="progress-bar" style="width: ${percent}%"></div></div>
          </div>
        `;
      });
      submissionList.innerHTML = html;

      // Add a single click handler for all submissions
      submissionList.onclick = function(e) {
        let el = e.target;
        while (el && !el.classList.contains('submission')) el = el.parentElement;
        if (el && el.dataset.quizId && el.dataset.submissionId) {
          const previewUrl = "<?= base_url('grading/preview_quiz') ?>" +
            "?quiz_id=" + encodeURIComponent(el.dataset.quizId) +
            "&submission_id=" + encodeURIComponent(el.dataset.submissionId);
          window.location.href = previewUrl;
        }
      };
    })
    .catch(err => {
      submissionList.innerHTML = `<div style='padding:10px;color:#c00;'>Error loading submissions: ${err.message}</div>`;
    });
}

function loadQuizzes() {
      // Get courseId from PHP (URL param)
      const courseId = "<?= esc($course_id) ?>";
      const db = firebase.firestore();
      // Filter quizzes by course_id
      db.collection('quizzes').where('course_id', '==', courseId).get()
        .then(function(snapshot) {
          const quizzes = [];
          snapshot.forEach(function(doc) {
            const data = doc.data();
            quizzes.push({
              id: doc.id,
              title: data.title || '',
              due: data.due_date || '',
              enrolled: data.enrolled || '',
              edited: data.edited || '',
              status: data.status || '',
              description: data.description || ''
            });
          });
          renderQuizCards(quizzes);
        })
        .catch(function(error) {
          const quizCards = document.getElementById('quizCards');
          if (quizCards) quizCards.innerHTML = "<div style='padding:20px;color:#c00;'>Error loading quizzes: " + error.message + "</div>";
        });
    }

    document.addEventListener("DOMContentLoaded", loadQuizzes);
  </script>
</body>
</html>