<?php
$course_id = isset($course['id']) && $course['id'] ? $course['id'] : (isset($_GET['course_id']) ? $_GET['course_id'] : '');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Task Dashboard</title>
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
    .task-card {
      background: #fff;
      border-radius: 18px;
      box-shadow: 0 2px 12px rgba(0,0,0,0.08);
      margin-bottom: 32px;
      overflow: hidden;
      min-width: 340px;
      max-width: 420px;
    }
    .task-card img {
      width: 100%;
      height: 120px;
      object-fit: cover;
      border-radius: 18px 18px 0 0;
      display: block;
    }
    .task-card-content {
      padding: 18px 24px 0 24px;
    }
    .task-card h3 {
      margin: 0 0 6px 0;
      font-size: 1.25rem;
      font-weight: 700;
      color: #222;
    }
    .task-card .due {
      color: #8a8a8a;
      font-size: 0.98rem;
      margin-bottom: 12px;
      font-weight: 500;
      letter-spacing: 0.5px;
    }
    .task-card .tags {
      display: flex;
      gap: 10px;
      margin: 10px 0 0 0;
    }
    .task-card .tag {
      padding: 6px 18px;
      border-radius: 12px;
      font-size: 0.98rem;
      font-weight: 600;
      letter-spacing: 0.5px;
      border: none;
      background: #eee;
      color: #555;
    }
    .task-card .tag.required {
      background: #ffd6df;
      color: #d12c5c;
    }
    .task-card .tag.task {
      background: #e9e9e9;
      color: #888;
    }
    .task-card-footer {
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-top: 1.5px solid #f2f2f2;
      padding: 18px 24px 12px 24px;
      margin-top: 18px;
    }
    .recent-submission h3 {
      margin-bottom: 20px;
      font-size: 20px;
    }
    #submissionList {
      max-height: 480px;
      overflow-y: auto;
    }
    .recent-sub-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 1px solid #eee;
      padding: 10px 0;
      gap: 10px;
    }
    .recent-sub-row:last-child {
      border-bottom: none;
    }
    .recent-sub-info {
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 2px;
    }
    .recent-sub-actions {
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .grade-input {
      width: 60px;
      padding: 4px 6px;
      border-radius: 5px;
      border: 1px solid #ccc;
      font-size: 1rem;
      text-align: center;
    }
    .grade-btn {
      background: #e636a4;
      color: #fff;
      border: none;
      border-radius: 6px;
      padding: 6px 14px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.18s;
    }
    .grade-btn:disabled {
      background: #bbb;
      cursor: not-allowed;
    }
    .grade-status {
      font-size: 0.95rem;
      color: #22b573;
      margin-left: 6px;
    }

    /* Edit Task Modal Styles */
    #editTaskModal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background: rgba(0, 0, 0, 0.18);
      z-index: 2200;
      justify-content: center;
      align-items: center;
    }

    #editTaskModal > div {
      background: #fff;
      border-radius: 14px;
      max-width: 480px;
      width: 95vw;
      padding: 38px 36px 32px 36px;
      box-shadow: 0 6px 32px rgba(0, 0, 0, 0.13);
      position: relative;
    }

    #closeEditTaskModal {
      position: absolute;
      top: 18px;
      right: 24px;
      font-size: 1.5rem;
      background: none;
      border: none;
      cursor: pointer;
    }

    #editTaskModal label {
      font-weight: 500;
    }

    #editTaskModal input,
    #editTaskModal textarea {
      width: 90%;
      margin-left: 12px;
      padding: 6px 10px;
      border-radius: 6px;
      border: 1.2px solid #ccc;
      font-size: 1rem;
    }

    #editTaskModal textarea {
      min-height: 80px;
    }

    #saveEditTaskBtn {
      background: #4be04b;
      color: #fff;
      border: none;
      border-radius: 8px;
      padding: 10px 32px;
      font-size: 1.1rem;
      font-weight: 600;
      cursor: pointer;
    }

    /* View Submissions Modal Styles */
    #viewSubmissionsModal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background: rgba(0, 0, 0, 0.18);
      z-index: 2300;
      justify-content: center;
      align-items: center;
    }

    #viewSubmissionsModal > div {
      background: #fff;
      border-radius: 14px;
      max-width: 600px;
      width: 95vw;
      padding: 38px 36px 32px 36px;
      box-shadow: 0 6px 32px rgba(0, 0, 0, 0.13);
      position: relative;
    }

    #closeViewSubmissionsModal {
      position: absolute;
      top: 18px;
      right: 24px;
      font-size: 1.5rem;
      background: none;
      border: none;
      cursor: pointer;
    }

    #viewSubmissionsModal label {
      font-weight: 500;
    }

    #viewSubmissionsModal input,
    #viewSubmissionsModal textarea {
      width: 90%;
      margin-left: 12px;
      padding: 6px 10px;
      border-radius: 6px;
      border: 1.2px solid #ccc;
      font-size: 1rem;
    }

    #viewSubmissionsModal textarea {
      min-height: 80px;
    }

    #saveViewSubmissionsBtn {
      background: #4be04b;
      color: #fff;
      border: none;
      border-radius: 8px;
      padding: 10px 32px;
      font-size: 1.1rem;
      font-weight: 600;
      cursor: pointer;
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
      <button onclick="window.location.href='<?= base_url('create_task') . '?course_id=' . urlencode($course_id) ?>'">+ Add Content</button>
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
      <div id="taskCards"></div>
    </div>

    <div class="right-column recent-submission">
      <h3>Recent Submission</h3>
      <div id="submissionList">
        <!-- Firebase submissions will be loaded here -->
      </div>
    </div>
  </div>

  <!-- Edit Task Modal -->
  <div id="editTaskModal" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.18); z-index:2200; justify-content:center; align-items:center;">
    <div style="background:#fff; border-radius:14px; max-width:480px; width:95vw; padding:38px 36px 32px 36px; box-shadow:0 6px 32px rgba(0,0,0,0.13); position:relative;">
      <button id="closeEditTaskModal" style="position:absolute; top:18px; right:24px; font-size:1.5rem; background:none; border:none; cursor:pointer;">&times;</button>
      <div style="font-size:1.3rem; font-weight:700; margin-bottom:18px;">Edit Task</div>
      <div style="margin-bottom:12px;">
        <label for="editTaskName" style="font-weight:500;">Task Name:</label>
        <input id="editTaskName" type="text" style="width:90%;margin-left:12px;padding:6px 10px;border-radius:6px;border:1.2px solid #ccc;font-size:1rem;">
      </div>
      <div style="margin-bottom:18px;">
        <label for="editTaskDesc" style="font-weight:500;">Description:</label>
        <textarea id="editTaskDesc" style="width:90%;margin-left:12px;padding:6px 10px;border-radius:6px;border:1.2px solid #ccc;font-size:1rem;min-height:80px;"></textarea>
      </div>
      <div style="margin-bottom:18px;">
        <label style="font-weight:500;">Current File:</label>
        <span id="editTaskCurrentFile"></span>
      </div>
      <div style="margin-bottom:18px;">
        <label for="editTaskFile" style="font-weight:500;">Replace File:</label>
        <input id="editTaskFile" type="file" accept=".pdf,.png,.jpg,.jpeg,.ppt,.pptx,.zip" style="margin-left:12px;">
      </div>
      <div style="display:flex;justify-content:flex-end;">
        <button id="saveEditTaskBtn" style="background:#4be04b;color:#fff;border:none;border-radius:8px;padding:10px 32px;font-size:1.1rem;font-weight:600;cursor:pointer;">Save</button>
      </div>
    </div>
  </div>

  <!-- View Submissions Modal -->
  <div id="viewSubmissionsModal" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.18); z-index:2300; justify-content:center; align-items:center;">
    <div style="background:#fff; border-radius:14px; max-width:600px; width:95vw; padding:38px 36px 32px 36px; box-shadow:0 6px 32px rgba(0, 0, 0, 0.13); position:relative;">
      <button id="closeViewSubmissionsModal" style="position:absolute; top:18px; right:24px; font-size:1.5rem; background:none; border:none; cursor:pointer;">&times;</button>
      <div style="font-size:1.3rem; font-weight:700; margin-bottom:18px;" id="viewSubmissionsTitle">Submissions</div>
      <div id="viewSubmissionsList" style="max-height:400px;overflow-y:auto;"></div>
    </div>
  </div>

  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-storage.js"></script>
  <script src="<?= base_url('public/js/firebase-config.js') ?>"></script>
  <script>
    function truncateText(text, maxLength = 80) {
      if (!text) return '';
      return text.length > maxLength ? text.substring(0, maxLength) + '…' : text;
    }

    // Store current editing task info
    let currentEditTaskId = null;
    let currentEditTaskRef = null;

    // Add Edit button to each task card
    function renderTaskCards(tasks) {
      const taskCards = document.getElementById('taskCards');
      if (!taskCards) return;
      if (!tasks.length) {
        taskCards.innerHTML = "<div style='padding:20px;color:#888;'>No tasks found for this course.</div>";
        return;
      }
      taskCards.innerHTML = '';
      tasks.forEach(t => {
        const fileLink = t.file_url ? `<a href="${t.file_url}" target="_blank">${t.file_name || 'Download'}</a>` : '';
        taskCards.innerHTML += `
          <div class="task-card" data-task-id="${t.id}">
            <img src="<?= base_url('public/img/11.png')?>" alt="Task Image">
            <div class="task-card-content">
              <h3>${t.title || t.id}</h3>
              <div class="due">${t.created_at ? 'Created: ' + t.created_at.substring(0, 10) : ''}</div>
              <div class="tags">
                <span class="tag task">Task</span>
                <span class="tag required">Required</span>
              </div>
              <div style="margin-top:10px;font-size:0.98rem;">
                ${truncateText(t.description)}
              </div>
              <div style="margin-top:10px;">
                ${fileLink}
              </div>
            </div>
            <div class="task-card-footer">
              <span>${t.file_size ? (Math.round(t.file_size/1024/1024*100)/100) + ' MB' : ''}</span>
              <span>
                <button style="background:#4b4bf0;color:#fff;border:none;border-radius:6px;padding:6px 14px;font-weight:600;cursor:pointer;margin-right:8px;" onclick="openTaskSubmissions('${t.id}')">View Submissions</button>
                <button class="edit-task-btn" data-task-id="${t.id}" style="background:#e636a4;color:#fff;border:none;border-radius:6px;padding:6px 14px;font-weight:600;cursor:pointer;margin-right:8px;">Edit</button>
                <span class="menu">⋯</span>
              </span>
            </div>
          </div>
        `;
      });

      // Attach edit button handlers
      document.querySelectorAll('.edit-task-btn').forEach(btn => {
        btn.onclick = function(e) {
          e.preventDefault();
          const taskId = btn.getAttribute('data-task-id');
          const task = tasks.find(t => t.id === taskId);
          if (!task) return;
          currentEditTaskId = taskId;
          currentEditTaskRef = task;
          document.getElementById('editTaskName').value = task.title || '';
          document.getElementById('editTaskDesc').value = task.description || '';
          // Show current file
          const fileSpan = document.getElementById('editTaskCurrentFile');
          if (task.file_url) {
            fileSpan.innerHTML = `<a href="${task.file_url}" target="_blank">${task.file_name || 'Download'}</a>`;
          } else {
            fileSpan.textContent = 'No file uploaded';
          }
          document.getElementById('editTaskFile').value = '';
          document.getElementById('editTaskModal').style.display = 'flex';
        };
      });
    }

    function loadTasks() {
      const courseId = "<?= esc($course_id) ?>";
      if (!courseId) {
        const taskCards = document.getElementById('taskCards');
        if (taskCards) taskCards.innerHTML = "<div style='padding:20px;color:#c00;'>No course selected. Please select a course.</div>";
        return;
      }
      const db = firebase.firestore();
      db.collection('courses').doc(courseId).collection('tasks').get()
        .then(function(snapshot) {
          const tasks = [];
          snapshot.forEach(function(doc) {
            const data = doc.data();
            tasks.push({
              id: doc.id,
              title: data.title || '',
              created_at: data.created_at || '',
              description: data.description || '',
              file_url: data.file_url || '',
              file_name: data.file_name || '',
              file_size: data.file_size || '',
              file_type: data.file_type || ''
            });
          });
          renderTaskCards(tasks);
        })
        .catch(function(error) {
          const taskCards = document.getElementById('taskCards');
          if (taskCards) taskCards.innerHTML = "<div style='padding:20px;color:#c00;'>Error loading tasks: " + error.message + "</div>";
        });
    }

    document.addEventListener("DOMContentLoaded", loadTasks);

    // --- RECENT SUBMISSIONS PANEL LOGIC ---
    async function loadRecentSubmissions() {
      const courseId = "<?= esc($course_id) ?>";
      const submissionList = document.getElementById('submissionList');
      if (!courseId || !submissionList) return;
      submissionList.innerHTML = '<div style="padding:16px;">Loading...</div>';
      try {
        const db = firebase.firestore();
        // Get all tasks for this course
        const tasksSnap = await db.collection('courses').doc(courseId).collection('tasks').get();
        let submissions = [];
        for (const taskDoc of tasksSnap.docs) {
          const taskId = taskDoc.id;
          const taskTitle = taskDoc.data().title || taskId;
          const subsSnap = await db.collection('courses').doc(courseId).collection('tasks').doc(taskId).collection('submissions').orderBy('timestamp', 'desc').limit(5).get();
          subsSnap.forEach(subDoc => {
            const sub = subDoc.data();
            submissions.push({
              ...sub,
              subId: subDoc.id,
              taskId,
              taskTitle
            });
          });
        }
        // Sort all submissions by timestamp descending
        submissions.sort((a, b) => (b.timestamp || 0) - (a.timestamp || 0));
        // Show only the 10 most recent
        submissions = submissions.slice(0, 10);
        if (!submissions.length) {
          submissionList.innerHTML = '<div style="padding:16px;color:#888;">No recent submissions.</div>';
          return;
        }

        // --- Fetch user names for all unique userIds ---
        const userIds = [...new Set(submissions.map(sub => sub.userId || sub.student_id).filter(Boolean))];
        let userMap = {};
        if (userIds.length) {
          // Firestore 'in' queries limited to 10, so batch if needed
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
          const uid = sub.userId || sub.student_id;
          const studentName = userMap[uid] || 'Student';
          html += `
            <div class="recent-sub-row" data-task-id="${sub.taskId}" data-sub-id="${sub.subId}">
              <div class="recent-sub-info">
                <div><strong>${studentName}</strong> <span style="color:#888;">${sub.fileName || ''}</span></div>
                <div style="font-size:0.97rem;color:#888;">${sub.taskTitle ? 'Task: ' + sub.taskTitle + ' | ' : ''}${sub.timestamp ? new Date(sub.timestamp).toLocaleString() : ''}</div>
                <div>
                  <a href="${sub.fileUrl || '#'}" target="_blank" style="color:#4b4bf0;text-decoration:underline;">View File</a>
                </div>
              </div>
              <div class="recent-sub-actions">
                <input type="number" class="grade-input" min="0" max="${sub.totalPossiblePoints || 100}" value="${typeof sub.score === 'number' ? sub.score : ''}" placeholder="Score" />
                <button class="grade-btn" onclick="gradeRecentSubmission('${courseId}','${sub.taskId}','${sub.subId}', this)">Save</button>
                <span class="grade-status"></span>
              </div>
            </div>
          `;
        });
        submissionList.innerHTML = html;
      } catch (e) {
        submissionList.innerHTML = `<div style="padding:16px;color:#c00;">Error loading submissions: ${e.message}</div>`;
      }
    }

    // Grade a submission from the right panel
    window.gradeRecentSubmission = async function(courseId, taskId, subId, btn) {
      const row = btn.closest('.recent-sub-row');
      const input = row.querySelector('.grade-input');
      const status = row.querySelector('.grade-status');
      const score = parseFloat(input.value);
      if (isNaN(score)) {
        status.textContent = 'Enter a score';
        status.style.color = '#e63636';
        return;
      }
      btn.disabled = true;
      status.textContent = 'Saving...';
      status.style.color = '#888';
      try {
        const db = firebase.firestore();
        await db.collection('courses').doc(courseId).collection('tasks').doc(taskId).collection('submissions').doc(subId)
          .set({
            score: score
          }, { merge: true });
        status.textContent = 'Saved!';
        status.style.color = '#22b573';
        setTimeout(() => {
          status.textContent = '';
          loadRecentSubmissions();
        }, 1000);
      } catch (e) {
        status.textContent = 'Failed';
        status.style.color = '#e63636';
      }
      btn.disabled = false;
    };

    document.addEventListener("DOMContentLoaded", function() {
      loadTasks();
      loadRecentSubmissions();
    });

    // Modal close logic
    document.getElementById('closeEditTaskModal').onclick = function() {
      document.getElementById('editTaskModal').style.display = 'none';
      currentEditTaskId = null;
      currentEditTaskRef = null;
    };
    document.getElementById('editTaskModal').onclick = function(e) {
      if (e.target === this) this.style.display = 'none';
    };

    // Save edit logic
    document.getElementById('saveEditTaskBtn').onclick = async function() {
      const newTitle = document.getElementById('editTaskName').value.trim();
      const newDesc = document.getElementById('editTaskDesc').value.trim();
      const fileInput = document.getElementById('editTaskFile');
      if (!currentEditTaskId) return;
      const courseId = "<?= esc($course_id) ?>";
      const db = firebase.firestore();
      const taskRef = db.collection('courses').doc(courseId).collection('tasks').doc(currentEditTaskId);

      let updateData = {
        title: newTitle,
        description: newDesc
      };

      // If a new file is selected, upload it and update file fields
      if (fileInput.files && fileInput.files.length > 0) {
        const file = fileInput.files[0];
        const storageRef = firebase.storage().ref();
        const timestamp = Date.now();
        const fileRef = storageRef.child(`educator_uploads/${courseId}/${timestamp}_${file.name}`);
        try {
          const uploadTaskSnapshot = await fileRef.put(file);
          const downloadURL = await uploadTaskSnapshot.ref.getDownloadURL();
          updateData.file_url = downloadURL;
          updateData.file_name = file.name;
          updateData.file_type = file.type;
          updateData.file_size = file.size;
        } catch (e) {
          alert('Failed to upload file: ' + e.message);
          return;
        }
      }

      try {
        await taskRef.update(updateData);
        document.getElementById('editTaskModal').style.display = 'none';
        loadTasks();
      } catch (e) {
        alert('Failed to update task: ' + e.message);
      }
    };

    // Show submissions modal for a task
    window.openTaskSubmissions = function(taskId) {
      const courseId = "<?= esc($course_id) ?>";
      // Redirect to preview_task with only course_id and task_id
      window.location.href = "<?= base_url('grading/preview_task') ?>" +
        "?course_id=" + encodeURIComponent(courseId) +
        "&task_id=" + encodeURIComponent(taskId);
    };

    // Modal close logic for submissions modal
    document.getElementById('closeViewSubmissionsModal').onclick = function() {
      document.getElementById('viewSubmissionsModal').style.display = 'none';
    };
    document.getElementById('viewSubmissionsModal').onclick = function(e) {
      if (e.target === this) this.style.display = 'none';
    };
  </script>
</body>
</html>