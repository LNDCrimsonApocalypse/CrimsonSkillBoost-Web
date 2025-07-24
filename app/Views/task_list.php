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
  </style>
</head>
<body>
  <div class="navbar">
    <div class="navbar-logo">
      <a href="<?= base_url('homepage_initial') ?>">
        <img src="<?= base_url('public/img/Logo.png') ?>" alt="logo" class="logo"/>
      </a>
    </div>
    <div class="navbar-center">
      <a href="<?= base_url('/') ?>">HOME</a>
      <a href="<?= base_url('dashboard') ?>">DASHBOARD</a>
      <a href="<?= base_url('aboutus') ?>">ABOUT</a>
      <a href="<?= base_url('allcourses') ?>">COURSES</a>
    </div>
    <div class="navbar-right">
      <input type="text" placeholder="Search.." />
      <button onclick="window.location.href='<?= base_url('upload') . '?course_id=' ?><?= urlencode($course_id) ?>'">+ Add Content</button>
      <img src="<?= base_url('public/img/notifications.png') ?>" alt="Notifications" class="icon" />    
      <img src="<?= base_url('public/img/profile.png') ?>" alt="profile" class="profile"/>
    </div>
  </div>

  <!-- Tab Bar -->
  <div class="tabbar">
    <a href="<?= base_url('topics') . '?course_id=' . urlencode($course_id) ?>"><span>Topic</span></a>
    <a href="<?= base_url('task_list') . '?course_id=' . urlencode($course_id) ?>"><span>Task</span></a>
    <a href="<?= base_url('quiz_list') . '?course_id=' . urlencode($course_id) ?>"><span>Quiz</span></a>
    <a href="<?= base_url('studentprog') . '?course_id=' . urlencode($course_id) ?>"><span>Student</span></a>
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

  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-storage.js"></script>
  <script src="<?= base_url('public/js/firebase-config.js') ?>"></script>
  <script>
    function truncateText(text, maxLength = 80) {
      if (!text) return '';
      return text.length > maxLength ? text.substring(0, maxLength) + '…' : text;
    }

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
          <div class="task-card">
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
                <button style="background:#4b4bf0;color:#fff;border:none;border-radius:6px;padding:6px 14px;font-weight:600;cursor:pointer;margin-right:8px;" onclick="showSubmissionsModal('<?= esc($course_id) ?>','${t.id}','${t.title || t.id}')">View Submissions</button>
                <span class="menu">⋯</span>
              </span>
            </div>
          </div>
        `;
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
        await db.collection('courses').doc(courseId).collection('tasks').doc(taskId).collection('submissions').doc(subId).update({
          score: score
        });
        status.textContent = 'Saved!';
        status.style.color = '#22b573';
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
  </script>
</body>
</html>