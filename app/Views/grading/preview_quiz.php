<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Grading Interface</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
    }
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: #ffebf3;
      color: #333;
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
   
    .search-input {
      padding: 6px 12px;
      border-radius: 6px;
      border: 1px solid #ccc;
      outline: none;
    }
    /* Tabs */
     .tabbar {
         display: flex;
      gap: 36px;
      font-size: 1.1rem;
      font-weight: 500;
      margin-left: 40px;

    }
    .tabbar-row{
         display: flex;
      align-items: center;
      justify-content: space-between;
      padding:  40px;
      margin-top: 18px;
      
   
    }
    .tabbar span {
      font-weight: 500;
 
      cursor: pointer;
    }

    
    /* Filters */
    .filters {
      display: flex;
      padding: 20px 40px;
      gap: 20px;

    }
    .filters select {
      padding: 6px 14px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    /* Student Table */
   /* TABLE */
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
    /* Questions */
    .question-section {
      display: flex;
      padding: 30px 40px;
      gap: 40px;
    }
    .questions, .comments {
      flex: 1;
    }
    .question-list {
      display: flex;
      flex-direction: column;
      gap: 28px;
    }
    .question-grid {
      display: grid;
      grid-template-columns: 36px 1fr;
      background: #fff;
      border-radius: 8px;
      padding: 18px 18px 18px 0;
      align-items: flex-start;
      box-shadow: 0 2px 8px rgba(0,0,0,0.03);
    }
    .question-radio {
      margin-top: 8px;
      margin-left: 18px;
    }
    .question-content {
      width: 100%;
      display: grid;
      grid-template-rows: 1fr 1fr 1fr 1fr;
      grid-template-columns: 1fr 1fr;
      gap: 14px;
      background: none;
    }
    .question-title {
      grid-column: 1 / span 2;
      background: #e9eef6;
      border-radius: 6px;
      padding: 12px 0;
      text-align: center;
      font-weight: 600;
      font-size: 1.15rem;
      color: #555;
      margin-bottom: 10px;
    }
    .student-answer {
      background: #e9eef6;
      border-radius: 6px;
      padding: 14px 0;
      text-align: center;
      font-weight: 900;
      font-size: 1.1rem;
      color: #e636a4;
      box-shadow: 0 3px 6px rgba(0,0,0,0.10);
      grid-row: 2;
      grid-column: 1 / span 2;
      margin-bottom: 10px;
      border: 2px solid #e636a4;
    }
    .choice-box {
      background: #f5f5fa;
      border-radius: 8px;
      padding: 14px 0;
      text-align: center;
      font-weight: 600;
      font-size: 1.05rem;
      color: #444;
      margin: 0 6px 10px 6px;
      border: 2px solid transparent;
      transition: border 0.18s, background 0.18s;
    }
    .choice-box.selected {
      background: #ffeefb;
      color: #e636a4;
      border: 2px solid #e636a4;
      font-weight: 900;
    }
    .choice-box.correct {
      background: #e7ffe7;
      color: #22b573;
      border: 2px solid #22b573;
    }
    .empty-cell, .empty-cell2 {
      display: none;
    }
     /* FILTERS */
    .filters {
      display: flex;
      gap: 20px;
      padding: 20px 40px;
      background-color: white;
    }

    .filters select {
      padding: 10px 15px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }
    /* Buttons */
    .save-btn {
      background: linear-gradient(90deg, #f23eb3 0%, #cfaaff 100%);
      border: none;
      padding: 12px 32px 12px 44px;
      color: #fff;
      font-weight: 700;
      border-radius: 10px;
      cursor: pointer;
      font-size: 1.1rem;
      box-shadow: 0 2px 8px rgba(242,62,179,0.09);
      position: relative;
      float: none;
      margin-top: 0;
      align-self: flex-end;
      display: flex;
      align-items: center;
      gap: 10px;
      transition: background 0.18s;
    }
    .save-btn::before {
      content: '';
      display: inline-block;
      width: 22px;
      height: 22px;
      background: url('data:image/svg+xml;utf8,<svg fill="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V7zm0 2l3.004 3H17zm-5 12a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm-6-2V5h2v4h8V5h2v10z"/></svg>') no-repeat center center;
      background-size: 22px 22px;
      margin-right: 6px;
    }
    .save-btn:hover {
      background: linear-gradient(90deg, #e85cb7 0%, #b983ff 100%);
    }
    .comments {
      background: #fff3fa;
      border-radius: 12px;
      padding: 28px 24px 36px 24px;
      margin-left: 24px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.03);
      display: flex;
      flex-direction: column;
      align-items: flex-start;
    }
    .comments label {
      font-size: 1.25rem;
      font-weight: 700;
      color: #111;
      margin-bottom: 12px;
      margin-left: 4px;
    }
    .textarea {
      width: 100%;
      min-width: 340px;
      max-width: 100%;
      min-height: 180px;
      max-height: 320px;
      background: #fff;
      border-radius: 8px;
      border: none;
      box-shadow: 0 2px 8px rgba(0,0,0,0.04);
      margin-bottom: 24px;
      font-size: 1.1rem;
      padding: 14px 16px;
      resize: vertical;
      color: #222;
      font-family: 'Poppins', Arial, sans-serif;
    }
    /* Modal Styles */
.modal-overlay {
  position: fixed;
  top: 0; left: 0; right: 0; bottom: 0;
  background: rgba(0,0,0,0.18);
  z-index: 9999;
  display: flex;
  align-items: center;
  justify-content: center;
}
.modal-content {
  background: #fff;
  border-radius: 10px;
  width: 600px;
  max-width: 95vw;
  box-shadow: 0 8px 20px rgba(0,0,0,0.15);
  padding: 0 0 24px 0;
  position: relative;
  animation: fadeIn 0.2s;
}
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(-30px);}
  to { opacity: 1; transform: translateY(0);}
}
.modal-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-bottom: 1px solid #eee;
  padding: 22px 32px 12px 32px;
}
.modal-title {
  font-size: 1.3rem;
  font-weight: 600;
  color: #888;
  letter-spacing: 1px;
}
.modal-close {
  font-size: 1.7rem;
  font-weight: bold;
  color: #888;
  cursor: pointer;
  transition: color 0.18s;
}
.modal-close:hover {
  color: #e636a4;
}
.modal-body {
  padding: 24px 32px 0 32px;
}
.modal-row {
  display: flex;
  gap: 32px;
  margin-bottom: 18px;
}
.modal-group {
  flex: 1;
  display: flex;
  flex-direction: column;
  gap: 7px;
}
.modal-group label {
  font-size: 1rem;
  font-weight: 600;
  color: #222;
}
.modal-group input[type="text"],
.modal-group input[type="date"] {
  padding: 10px 12px;
  font-size: 1rem;
  border: 1px solid #ccc;
  border-radius: 6px;
  background: #fafafa;
}
.modal-actions {
  display: flex;
  justify-content: flex-end;
  padding: 18px 32px 0 32px;
}
.save-btn {
  background: #e636a4;
  color: #fff;
  border: none;
  border-radius: 6px;
  padding: 10px 22px;
  font-size: 1rem;
  font-weight: 600;
  cursor: pointer;
  display: flex;
  align-items: center;
  gap: 8px;
  transition: background 0.18s;
}
.save-btn:hover {
  background: #b983ff;
}
@media (max-width: 700px) {
  .modal-content { width: 98vw; }
  .modal-row { flex-direction: column; gap: 12px; }
  .modal-header, .modal-body, .modal-actions { padding-left: 12px; padding-right: 12px; }
}
  </style>
</head>
<body>
  <!-- Navbar -->
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
      <img src="<?= base_url('public/img/notifications.png') ?>" alt="Notifications" class="icon" />    
      <a href="<?= base_url('editprofile') ?>">
        <img src="<?= base_url('public/img/profile.png') ?>" alt="profile" class="profile" style="cursor:pointer;" />
      </a>
    </div>
  </div>

  <!-- Tabs -->
  <div class="tabbar">
    <a id="tab-topic" href="#"><span>Topic</span></a>
    <a id="tab-task" href="#"><span>Task</span></a>
    <a id="tab-quiz" href="#"><span>Quiz</span></a>
    <a id="tab-student" href="#"><span>Student</span></a>
    <a href="<?= base_url('gradesettings') ?>">Grade Settings</a>
  </div>

  <!-- Filters -->
  <div class="filters">
    <select>
      <option>All Courses</option>
    </select>
    <select>
      <option>Section</option>
    </select>
  </div>

  <div class="table-container">
  <table>
    <thead>
      <tr>
        <th>Student Name</th>
        <th>Quiz Name <span style="font-size: 16px;">⏷</span></th>
        <th>Grade</th>
        <th>Grade Name</th> <!-- Added column -->
        <th>Date</th>
        <th>Grade Point</th>
        <th>Total Marks</th>
      </tr>
    </thead>
    <tbody>
      <!-- Firebase grades will be loaded here -->
    </tbody>
  </table>
</div>

<!-- EDIT GRADE MODAL -->
<div id="editGradeModal" class="modal-overlay" style="display:none;">
  <div class="modal-content">
    <div class="modal-header">
      <span class="modal-title">EDIT GRADE</span>
      <span class="modal-close" onclick="closeEditModal()">&times;</span>
    </div>
    <form>
      <div class="modal-body">
        <div class="modal-row">
          <div class="modal-group">
            <label for="grade-name">Grade Name</label>
            <input type="text" id="grade-name" placeholder="Grade Name" />
          </div>
          <div class="modal-group">
            <label for="total-marks">Total Marks</label>
            <input type="text" id="total-marks" placeholder="Total Marks" />
          </div>
        </div>
        <div class="modal-row">
          <div class="modal-group">
            <label for="date">Date</label>
            <input type="date" id="date" placeholder="Filtered Date" />
          </div>
          <div class="modal-group">
            <label for="grade-point">Grade Point</label>
            <input type="text" id="grade-point" placeholder="Grade Point" />
          </div>
        </div>
      </div>
      <div class="modal-actions">
        <button type="button" class="save-btn">
          <img src="https://cdn-icons-png.flaticon.com/512/1828/1828817.png" alt="icon" style="width:18px;height:18px;vertical-align:middle;margin-right:6px;">
          Save Grade
        </button>
      </div>
    </form>
  </div>
</div>


<script>
function openEditModal(title) {
  document.querySelector('#editGradeModal .modal-title').textContent = title;
  document.getElementById('editGradeModal').style.display = 'flex';
}
function closeEditModal() {
  document.getElementById('editGradeModal').style.display = 'none';
}
document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.edit-btn').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      openEditModal('EDIT GRADE');
    });
  });
  document.querySelectorAll('.add-btn').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      openEditModal('ADD GRADE');
    });
  });
});
</script>
  <!-- Question & Comment Section -->
  <div class="question-section">
    <div class="questions">
      <div class="question-list" id="questionList">
        <!-- Questions from Firebase will be loaded here -->
      </div>
    </div>
    <div class="comments">
      <label for="comment">Comment/ Suggestion:</label>
      <textarea id="comment" class="textarea"></textarea>
      <button class="save-btn" id="saveGradeBtn">Save Grade</button>
      <div id="saveStatus" style="margin-top:10px;font-weight:bold;color:#22b573;display:none;">Grade saved!</div>
    </div>
  </div>

  <!-- Firebase SDKs -->
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
<script src="<?= base_url('public/js/firebase-config.js') ?>"></script>
<script>
const db = firebase.firestore();

function getQueryParam(name) {
  const url = new URL(window.location.href);
  return url.searchParams.get(name);
}
const courseId = getQueryParam('course_id');
const quizId = getQueryParam('quiz_id');

// Fix: Only use tbody inside the correct table
function getTableBody() {
  return document.querySelector('.table-container tbody');
}

function getPreviewBox() {
  return document.querySelector('.preview-box');
}

let gradeSettings = [];

async function fetchGradeSettings() {
  // Fetch from /settings/grade_settings_/grades
  const gradesSnap = await db.collection('settings').doc('grade_settings_').collection('grades').get();
  let grades = [];
  gradesSnap.forEach(doc => {
    const g = doc.data();
    if (g.grade_range && typeof g.grade_point !== 'undefined' && g.grade_name) {
      const nums = g.grade_range.match(/\d+(\.\d+)?/g);
      if (nums && nums.length >= 2) {
        const min = Number(nums[0]);
        const max = Number(nums[1]);
        if (!isNaN(min) && !isNaN(max)) {
          grades.push({
            ...g,
            min: min,
            max: max
          });
        }
      }
    }
  });
  grades.sort((a, b) => b.max - a.max || b.min - a.min);
  return grades;
}

function getGradeInfo(percent) {
  percent = parseFloat(percent);
  // TEMP DEBUG: log percent and gradeSettings
  console.log('Quiz percent:', percent, 'gradeSettings:', gradeSettings);
  for (const g of gradeSettings) {
    if (percent >= g.min && percent <= g.max) {
      return { gradePoint: g.grade_point, gradeName: g.grade_name };
    }
  }
  // Fallback if no matching grade
  return { gradePoint: '-', gradeName: 'No matching grade' };
}

async function loadQuizSubmissions() {
  gradeSettings = await fetchGradeSettings();
  const tableBody = getTableBody();
  const previewBox = getPreviewBox();
  if (!tableBody) return;
  tableBody.innerHTML = '<tr><td colspan="7">Loading...</td></tr>';
  if (!quizId) {
    tableBody.innerHTML = '<tr><td colspan="7">Invalid quiz ID</td></tr>';
    if (previewBox) previewBox.innerHTML = '<div class="section-title">Preview</div><div style="color:#888;">No submission to preview.</div>';
    return;
  }
  db.collection('quizzes').doc(quizId).collection('submissions').orderBy('timestamp', 'desc').get()
    .then(async snapshot => {
      if (snapshot.empty) {
        tableBody.innerHTML = '<tr><td colspan="7">No submissions found</td></tr>';
        if (previewBox) previewBox.innerHTML = '<div class="section-title">Preview</div><div style="color:#888;">No submission to preview.</div>';
        return;
      }
      let submissions = [];
      let userIds = [];
      snapshot.forEach(doc => {
        const sub = doc.data();
        sub._id = doc.id;
        submissions.push(sub);
        if (sub.userId || sub.student_id) userIds.push(sub.userId || sub.student_id);
      });
      userIds = [...new Set(userIds)];
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
      let firstSubmission = null;
      submissions.forEach((sub, idx) => {
        // Convert raw score to percent for gradeSettings matching
        // Example: score=1, total=2 => percent=50
        const score = typeof sub.score === 'number' ? sub.score : 0;
        const total = typeof sub.totalPossiblePoints === 'number' && sub.totalPossiblePoints > 0 ? sub.totalPossiblePoints : 100;
        const percent = total > 0 ? (score / total) * 100 : 0;
        const gradeInfo = getGradeInfo(percent);
        const studentName = userMap[sub.userId || sub.student_id] || sub.userName || sub.userId || '-';
        html += `
          <tr>
            <td>${studentName}</td>
            <td>${sub.title || 'Quiz'}</td>
            <td>${percent.toFixed(2)}%</td>
            <td>${gradeInfo.gradeName || '-'}</td>
            <td>${sub.timestamp ? new Date(sub.timestamp).toLocaleDateString() : '-'}</td>
            <td>${gradeInfo.gradePoint || '-'}</td>
            <td>${score} / ${total}</td>
          </tr>
        `;
        if (idx === 0) firstSubmission = sub;
      });
      tableBody.innerHTML = html;

      // Show preview of the first submission's answers
      if (previewBox) {
        if (firstSubmission && firstSubmission.questions) {
          loadQuizQuestionsPreview(quizId, firstSubmission, previewBox);
        } else {
          previewBox.innerHTML = '<div class="section-title">Preview</div><div style="color:#888;">No answers to preview.</div>';
        }
      }
    })
    .catch(err => {
      const tableBody = getTableBody();
      const previewBox = getPreviewBox();
      if (tableBody) tableBody.innerHTML = `<tr><td colspan="7">Error loading submissions: ${err.message}</td></tr>`;
      if (previewBox) previewBox.innerHTML = '<div class="section-title">Preview</div><div style="color:#c00;">Error loading preview.</div>';
    });
}

function loadQuizQuestionsPreview(quizId, submission, previewBox) {
  if (!submission.questions) {
    previewBox.innerHTML = '<div class="section-title">Preview</div><div style="color:#888;">No answers to preview.</div>';
    return;
  }
  let html = '<div class="section-title">Preview</div>';
  Object.values(submission.questions).forEach((q, idx) => {
    const questionText = q.question || 'Question';
    const options = Array.isArray(q.options) ? q.options : [];
    const correctOption = typeof q.correct_option === 'number' ? q.correct_option : null;
    const userAnswerIdx = typeof q.userAnswer === 'number' ? q.userAnswer : null;
    let studentAnswerHtml = '<div class="student-answer"><strong>User Answer:</strong><br><em>No answer</em></div>';
    if (userAnswerIdx !== null && options[userAnswerIdx] !== undefined) {
      studentAnswerHtml = `<div class="student-answer"><strong>User Answer:</strong><br>${options[userAnswerIdx]}</div>`;
    }
    let choicesHtml = '';
    for (let i = 0; i < options.length; i++) {
      let classes = 'choice-box';
      if (i === userAnswerIdx) classes += ' selected';
      if (i === correctOption) classes += ' correct';
      choicesHtml += `<div class="${classes}">${String.fromCharCode(65+i)}. ${options[i]}</div>`;
    }
    for (let i = options.length; i < 4; i++) {
      choicesHtml += `<div class="choice-box" style="opacity:0.5;">${String.fromCharCode(65+i)}. -</div>`;
    }
    html += `
      <div class="question-grid" style="margin-bottom:18px;">
        <div style="margin-top:8px;margin-right:8px;font-weight:bold;display:flex;align-items:center;justify-content:center;">${idx+1}.</div>
        <div class="question-content">
          <div class="question-title">${questionText}</div>
          ${studentAnswerHtml}
          ${choicesHtml}
        </div>
      </div>
    `;
  });
  previewBox.innerHTML = html;
}

// Dynamically set tabbar links using course_id from URL
(function() {
  function getQueryParam(name) {
    const url = new URL(window.location.href);
    return url.searchParams.get(name);
  }
  const courseId = getQueryParam('course_id');
  if (courseId) {
    document.getElementById('tab-topic').href = "<?= base_url('topics') ?>" + "?course_id=" + encodeURIComponent(courseId);
    document.getElementById('tab-task').href = "<?= base_url('task_list') ?>" + "?course_id=" + encodeURIComponent(courseId);
    document.getElementById('tab-quiz').href = "<?= base_url('quiz_list') ?>" + "?course_id=" + encodeURIComponent(courseId);
    document.getElementById('tab-student').href = "<?= base_url('studentprog') ?>" + "?course_id=" + encodeURIComponent(courseId);
  }
})();

document.addEventListener('DOMContentLoaded', loadQuizSubmissions);
</script>
</body>
</html>
