<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Student Task Review</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
  <style>
    * { box-sizing: border-box; }
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: #ffebf3;
      color: #333;
    }
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
    .navbar-logo { flex: 1; display: flex; align-items: center; }
    .navbar-logo .logo { width: 40px; }
    .navbar-center { flex: 2; display: flex; justify-content: center; align-items: center; gap: 30px; }
    .navbar-center a { text-decoration: none; color: black; font-weight: bold; margin: 0 10px; }
    .navbar-right { flex: 1; display: flex; align-items: center; justify-content: flex-end; gap: 15px; }
    .navbar-right input[type="text"] { padding: 6px 12px; border: 1px solid #ccc; border-radius: 6px; margin: 0; width: 140px; }
    .navbar-right img.profile { width: 35px; height: 35px; border-radius: 50%; object-fit: cover; cursor: pointer; }
    .navbar-right img.icon { width: 25px; height: 25px; cursor: pointer; vertical-align: middle; }
    .tabbar {
      display: flex; gap: 36px; font-size: 1.1rem; font-weight: 500; margin-left: 40px;
    }
    .tabbar span { font-weight: 500; cursor: pointer; }
    .filters {
      display: flex; padding: 20px 40px; gap: 20px;
    }
    .filters select { padding: 6px 14px; border-radius: 5px; border: 1px solid #ccc; }
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
    thead { background-color: #EED2EE; font-weight: bold; }
    th, td { padding: 15px 20px; text-align: left; }
    td { background-color: white; vertical-align: middle; }
    .student-info { display: flex; align-items: center; gap: 15px; }
    .student-info img { width: 45px; height: 45px; border-radius: 50%; }
    .student-name { display: flex; flex-direction: column; }
    .student-name small { font-size: 12px; color: gray; }
    .task-name { font-weight: bold; }
    .action-img { width: 35px; height: 35px; border-radius: 50%; border: 4px solid white; box-shadow: 0 0 0 2px #2196f3; object-fit: cover; margin-left: 10px; }
    .bottom-section {
      display: flex;
      padding: 30px 40px;
      gap: 40px;
    }
    .preview-box, .comment-box {
      background-color: white;
      border: 2px dashed #ccc;
      border-radius: 6px;
      padding: 15px;
      flex: 1;
      min-height: 300px;
    }
    .comment-box { max-width: 400px; }
    .section-title { font-weight: bold; font-size: 18px; margin-bottom: 10px; }
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
    .save-btn:hover { background: linear-gradient(90deg, #e85cb7 0%, #b983ff 100%); }
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
    .grade-point-input {
      width: 60px;
      padding: 6px 8px;
      border: 2px solid #3a8dde;
      border-radius: 6px;
      color: #2563eb;
      font-weight: bold;
      background: #eaf3ff;
      text-align: center;
      font-size: 1rem;
      outline: none;
      transition: border 0.2s;
    }
    .grade-point-input:focus {
      border: 2px solid #2563eb;
      background: #dbeafe;
    }
    .table-row-selected {
      background: #e0e7ff !important;
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
    /* Modal styles */
    .modal-overlay {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0, 0, 0, 0.7);
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 1000;
    }
    .modal-content {
      background: white;
      border-radius: 8px;
      padding: 20px;
      width: 90%;
      max-width: 500px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      position: relative;
    }
    .modal-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 15px;
    }
    .modal-title {
      font-size: 1.5rem;
      font-weight: 600;
      color: #333;
    }
    .modal-close {
      cursor: pointer;
      font-size: 1.2rem;
      color: #aaa;
    }
    .modal-close:hover {
      color: #333;
    }
    .modal-body {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }
    .modal-row {
      display: flex;
      gap: 10px;
      width: 100%;
    }
    .modal-group {
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 5px;
    }
    .modal-group label {
      font-size: 0.9rem;
      color: #555;
    }
    .modal-group input {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 1rem;
      outline: none;
      transition: border 0.2s;
    }
    .modal-group input:focus {
      border: 1px solid #3a8dde;
    }
    .modal-actions {
      display: flex;
      justify-content: flex-end;
      margin-top: 10px;
    }
    /* End of modal styles */
    @media (max-width: 900px) {
      .bottom-section { flex-direction: column; gap: 20px; padding: 20px 10px; }
      .table-container { margin: 10px 0; }
    }
  </style>
</head>
<body>
<!-- NAVBAR -->
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
<div class="tabbar">
    <a id="tab-topic" href="#"><span>Topic</span></a>
    <a id="tab-task" href="#"><span>Task</span></a>
    <a id="tab-quiz" href="#"><span>Quiz</span></a>
    <a id="tab-student" href="#"><span>Student</span></a>
    <a href="<?= base_url('gradesettings') ?>">Grade Settings</a>
</div>
<div class="filters">
  <select><option>Course</option></select>
  <select><option>Section</option></select>
  <select><option>Category</option></select>
</div>
<div class="table-container">
  <table>
    <thead>
      <tr style="background:#f5d6ee;">
        <th>Student Name</th>
        <th>Task Name</th>
        <th>Grade Name</th>
        <th>Date</th>
        <th>Grade Point</th>
        <th>Total Marks</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <!-- Firebase task submission will be loaded here -->
    </tbody>
  </table>
</div>
<div class="bottom-section">
  <div class="preview-box" id="taskPreviewBox">
    <div class="section-title">Preview</div>
    <!-- Task file preview and details will be loaded here -->
  </div>
  <div class="comments">
    <label for="comment">Comment/ Suggestion:</label>
    <textarea id="comment" class="textarea"></textarea>
    <button class="save-btn" id="saveGradeBtn">Save Grade</button>
    <div id="saveStatus" style="margin-top:10px;font-weight:bold;color:#22b573;display:none;">Grade saved!</div>
  </div>
</div>
<!-- Add/Edit Grade Modal -->
<div id="gradeModal" class="modal-overlay" style="display:none;">
  <div class="modal-content">
    <div class="modal-header">
      <span class="modal-title" id="gradeModalTitle">EDIT GRADE</span>
      <span class="modal-close" onclick="closeGradeModal()">&times;</span>
    </div>
    <form id="gradeForm">
      <div class="modal-body">
        <div class="modal-row">
          <div class="modal-group">
            <label for="modal-grade-name">Grade Name</label>
            <input type="text" id="modal-grade-name" placeholder="Grade Name" required />
          </div>
          <div class="modal-group">
            <label for="modal-date">Date</label>
            <input type="date" id="modal-date" required />
          </div>
        </div>
        <div class="modal-row">
          <div class="modal-group">
            <label for="modal-grade-point">Grade Point</label>
            <input type="number" step="0.01" id="modal-grade-point" placeholder="Grade Point" required />
          </div>
          <div class="modal-group">
            <label for="modal-total-marks">Total Marks</label>
            <input type="text" id="modal-total-marks" placeholder="e.g. 98/100" required />
          </div>
        </div>
      </div>
      <div class="modal-actions">
        <button type="submit" class="save-btn" id="modalSaveBtn">
          <img src="https://cdn-icons-png.flaticon.com/512/1828/1828817.png" alt="icon" style="width:18px;height:18px;vertical-align:middle;margin-right:6px;">
          <span id="modalSaveBtnText">Update Grade</span>
        </button>
      </div>
    </form>
  </div>
</div>
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
<script src="<?= base_url('public/js/firebase-config.js') ?>"></script>
<script>
const db = firebase.firestore();
const userId = window.currentUserId || "<?= isset($userId) ? $userId : '' ?>"; // Set this in your layout or controller

// Fix: define courseId and taskId from URL query params
function getQueryParam(name) {
  const url = new URL(window.location.href);
  return url.searchParams.get(name);
}
const courseId = getQueryParam('course_id');
const taskId = getQueryParam('task_id');

let gradeSettings = [];
let submissions = [];
let userMap = {};
let selectedIdx = 0;

async function fetchGradeSettings() {
  if (!userId) return [];
  const gradesSnap = await db.collection('settings').doc(`grade_settings_${userId}`).collection('grades').orderBy('grade_point').get();
  let grades = [];
  gradesSnap.forEach(doc => {
    const g = doc.data();
    // Expecting: grade_name, grade_point, grade_range (e.g. "97-100")
    if (g.grade_range && typeof g.grade_point !== 'undefined' && g.grade_name) {
      // Parse range
      const [min, max] = g.grade_range.split('-').map(x => parseFloat(x));
      grades.push({
        ...g,
        min: min,
        max: max
      });
    }
  });
  // Sort descending by min
  grades.sort((a, b) => b.min - a.min);
  return grades;
}

function getGradeInfo(percent) {
  for (const g of gradeSettings) {
    if (percent >= g.min && percent <= g.max) {
      return { gradePoint: g.grade_point, gradeName: g.grade_name };
    }
  }
  return { gradePoint: '', gradeName: '' };
}

function renderTableAndPreview() {
  const tableBody = document.querySelector('tbody');
  let html = '';
  submissions.forEach((sub, idx) => {
    const studentName = userMap[sub.userId || sub.student_id] || sub.userName || sub.userId || '-';
    const taskName = sub.taskTitle || sub.title || 'Task';
    const gradeName = sub.gradeName || '';
    const date = sub.date || (sub.timestamp ? new Date(sub.timestamp).toLocaleDateString() : '-');
    const gradePoint = sub.gradePoint || '';
    let totalMarks = sub.totalMarks || '';
    if (!totalMarks && typeof sub.score === 'number' && typeof sub.totalPossiblePoints === 'number') {
      totalMarks = `${sub.score}/${sub.totalPossiblePoints}`;
    }
    let filePreview = '';
    if (sub.fileUrl) {
      const ext = (sub.fileName || '').split('.').pop().toLowerCase();
      if (['png','jpg','jpeg','gif'].includes(ext)) {
        filePreview = `<a href="${sub.fileUrl}" target="_blank"><img src="${sub.fileUrl}" alt="File" style="max-width:60px;max-height:60px;border-radius:6px;"></a>`;
      } else if (ext === 'pdf') {
        filePreview = `<a href="${sub.fileUrl}" target="_blank">PDF</a>`;
      } else {
        filePreview = `<a href="${sub.fileUrl}" target="_blank">Download</a>`;
      }
    } else {
      filePreview = '';
    }
    html += `
      <tr data-idx="${idx}">
        <td>
          <div style="display:flex;align-items:center;gap:12px;">
            <img src="${sub.profileUrl || 'https://ui-avatars.com/api/?name=' + encodeURIComponent(studentName)}" alt="profile" style="width:40px;height:40px;border-radius:50%;object-fit:cover;">
            <div>
              <div style="font-weight:600;">${studentName}</div>
              <div style="font-size:0.95em;color:#888;">${sub.email || ''}</div>
            </div>
          </div>
        </td>
        <td>
          <div style="font-weight:600;">${taskName}</div>
        </td>
        <td style="font-weight:600;">${gradeName}</td>
        <td>${date}</td>
        <td>${gradePoint}</td>
        <td style="font-weight:600;">${totalMarks}</td>
        <td>
          <button class="edit-btn" style="background:none;border:none;cursor:pointer;" onclick="openGradeModal(${idx})" title="Edit Grade">
            <img src="https://cdn-icons-png.flaticon.com/512/1159/1159633.png" alt="edit" style="width:18px;height:18px;">
          </button>
        </td>
      </tr>
    `;
  });
  tableBody.innerHTML = html;

  // Row selection
  tableBody.querySelectorAll('tr').forEach(row => {
    row.addEventListener('click', function(e) {
      if (e.target.classList.contains('edit-btn') || e.target.closest('.edit-btn')) return;
      selectedIdx = parseInt(this.getAttribute('data-idx'));
      renderTableAndPreview();
      loadCommentForSelected();
    });
  });

  renderPreviewBox();
}

function renderPreviewBox() {
  const previewBox = document.getElementById('taskPreviewBox');
  const sub = submissions[selectedIdx];
  let preview = '';
  if (sub && sub.fileUrl) {
    const ext = (sub.fileName || '').split('.').pop().toLowerCase();
    if (['png','jpg','jpeg','gif'].includes(ext)) {
      preview = `<img src="${sub.fileUrl}" alt="Task File" style="max-width:100%;max-height:320px;border-radius:8px;margin-top:12px;">`;
    } else if (ext === 'pdf') {
      preview = `<iframe src="${sub.fileUrl}" style="width:100%;height:320px;border:none;margin-top:12px;"></iframe>`;
    } else {
      preview = `<a href="${sub.fileUrl}" target="_blank" style="color:#e636a4;font-weight:600;">Download File</a>`;
    }
  } else {
    preview = '<div style="color:#888;">No file uploaded.</div>';
  }
  previewBox.innerHTML = `<div class="section-title">Preview</div>${preview}`;
}

function saveGradeScore(sub) {
  if (!sub._id) return;
  db.collection('courses').doc(courseId).collection('tasks').doc(taskId)
    .collection('submissions').doc(sub._id)
    .set({
      score: sub.score
    }, { merge: true });
}

function loadTaskSubmissions() {
  const tableBody = document.querySelector('tbody');
  tableBody.innerHTML = '<tr><td colspan="7">Loading...</td></tr>';
  if (!courseId || !taskId) {
    tableBody.innerHTML = '<tr><td colspan="7">Invalid course or task ID</td></tr>';
    return;
  }
  db.collection('courses').doc(courseId).collection('tasks').doc(taskId).collection('submissions').orderBy('timestamp', 'desc').get()
    .then(async snapshot => {
      if (snapshot.empty) {
        tableBody.innerHTML = '<tr><td colspan="7">No submissions found</td></tr>';
        document.getElementById('taskPreviewBox').innerHTML = '<div class="section-title">Preview</div><div style="color:#888;">No file uploaded.</div>';
        return;
      }
      submissions = [];
      let userIds = [];
      snapshot.forEach(doc => {
        const sub = doc.data();
        sub._id = doc.id;
        submissions.push(sub);
        if (sub.userId || sub.student_id) userIds.push(sub.userId || sub.student_id);
      });
      userIds = [...new Set(userIds)];
      userMap = {};
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
      selectedIdx = 0;
      renderTableAndPreview();
      loadCommentForSelected();
    })
    .catch(err => {
      tableBody.innerHTML = `<tr><td colspan="7">Error loading submissions: ${err.message}</td></tr>`;
      document.getElementById('taskPreviewBox').innerHTML = '<div class="section-title">Preview</div><div style="color:#c00;">Error loading preview.</div>';
    });
}

function loadCommentForSelected() {
  const commentBox = document.getElementById('comment');
  commentBox.value = '';
  const sub = submissions[selectedIdx];
  if (!sub || !sub._id) return;
  db.collection('courses').doc(courseId).collection('tasks').doc(taskId)
    .collection('submissions').doc(sub._id)
    .collection('comments').orderBy('createdAt', 'desc').limit(1).get()
    .then(snapshot => {
      if (!snapshot.empty) {
        commentBox.value = snapshot.docs[0].data().comment || '';
      }
    });
}

async function loadAll() {
  gradeSettings = await fetchGradeSettings();
  loadTaskSubmissions();
}

document.addEventListener('DOMContentLoaded', loadAll);

const saveBtn = document.getElementById('saveGradeBtn');
const commentBox = document.getElementById('comment');
const saveStatus = document.getElementById('saveStatus');

if (saveBtn && commentBox) {
  saveBtn.addEventListener('click', function(e) {
    e.preventDefault();
    const comment = commentBox.value.trim();
    if (!comment) {
      saveStatus.style.display = 'none';
      return;
    }
    saveBtn.disabled = true;
    saveBtn.textContent = 'Saving...';
    // Save to Firestore under submissions/{subId}/comments/{autoId}
    const sub = submissions[selectedIdx];
    if (!sub || !sub._id) return;
    db.collection('courses').doc(courseId).collection('tasks').doc(taskId)
      .collection('submissions').doc(sub._id)
      .collection('comments').add({
        comment: comment,
        createdAt: new Date()
      }).then(() => {
        saveBtn.disabled = false;
        saveBtn.textContent = 'Save Grade';
        saveStatus.style.display = 'block';
        saveStatus.textContent = 'Grade saved!';
        setTimeout(() => { saveStatus.style.display = 'none'; }, 2000);
        // commentBox.value = ''; // keep comment for editing
      }).catch(() => {
        saveBtn.disabled = false;
        saveBtn.textContent = 'Save Grade';
        saveStatus.style.display = 'block';
        saveStatus.style.color = '#e63636';
        saveStatus.textContent = 'Failed to save. Try again.';
        setTimeout(() => { saveStatus.style.display = 'none'; saveStatus.style.color = '#22b573'; }, 2000);
      });
  });
}

// Modal logic
let editingIdx = null;
function openGradeModal(idx = null) {
  editingIdx = idx;
  const modal = document.getElementById('gradeModal');
  const title = document.getElementById('gradeModalTitle');
  const saveBtnText = document.getElementById('modalSaveBtnText');
  if (idx !== null) {
    // Edit
    const sub = submissions[idx];
    title.textContent = 'EDIT GRADE';
    saveBtnText.textContent = 'Update Grade';
    document.getElementById('modal-grade-name').value = sub.gradeName || '';
    document.getElementById('modal-date').value = sub.date || '';
    document.getElementById('modal-grade-point').value = sub.gradePoint || '';
    document.getElementById('modal-total-marks').value = sub.totalMarks || (typeof sub.score === 'number' && typeof sub.totalPossiblePoints === 'number' ? `${sub.score}/${sub.totalPossiblePoints}` : '');
  } else {
    // Add
    title.textContent = 'ADD GRADE';
    saveBtnText.textContent = 'Save Grade';
    document.getElementById('modal-grade-name').value = '';
    document.getElementById('modal-date').value = '';
    document.getElementById('modal-grade-point').value = '';
    document.getElementById('modal-total-marks').value = '';
  }
  modal.style.display = 'flex';
}
function closeGradeModal() {
  document.getElementById('gradeModal').style.display = 'none';
  editingIdx = null;
}

document.getElementById('gradeForm').onsubmit = async function(e) {
  e.preventDefault();
  const gradeName = document.getElementById('modal-grade-name').value.trim();
  const date = document.getElementById('modal-date').value;
  const gradePoint = document.getElementById('modal-grade-point').value.trim();
  const totalMarks = document.getElementById('modal-total-marks').value.trim();

  // Parse score from totalMarks (e.g. "98/100" => score: 98, totalPossiblePoints: 100)
  let score = 0, totalPossiblePoints = 0;
  if (totalMarks.includes('/')) {
    const [scoreStr, totalStr] = totalMarks.split('/');
    score = parseFloat(scoreStr);
    totalPossiblePoints = parseFloat(totalStr);
  } else if (!isNaN(parseFloat(totalMarks))) {
    score = parseFloat(totalMarks);
    totalPossiblePoints = 100; // fallback if only one value is given
  }

  if (editingIdx !== null) {
    const sub = submissions[editingIdx];
    if (!sub || !sub._id) return;
    await db.collection('courses').doc(courseId).collection('tasks').doc(taskId)
      .collection('submissions').doc(sub._id)
      .set({
        gradeName: gradeName,
        date: date,
        gradePoint: gradePoint,
        totalMarks: totalMarks,
        score: score,
        totalPossiblePoints: totalPossiblePoints
      }, { merge: true });
  }
  closeGradeModal();
  loadTaskSubmissions();
};

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
</script>
</body>
</html>