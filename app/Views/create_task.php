<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Let’s Create Page</title>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Short+Stack&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', Arial, sans-serif;
      background-color: #fdeef4;
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
     .dropbtn {
   font-weight: bold;
  font-size: 1.35rem;
  color: black;
  background: none;
  border: none;
  cursor: pointer;
     margin: 0 15px;
  
}
 .dropbtn :hover {
   color: #ff00aa;
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
    /* Tab bar and other styles omitted for brevity */
     .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 40px;
    }
    .create-box{
      /* Override to NOT use Poppins */
      font-family: 'Short Stack', cursive;
      width: 400px;
      height: 200px;
      background-color: #fdf6fa;
      border: 2px dashed #ccc;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 32px;
      color: #9a7fa0;
      font-weight: 600;
      margin-bottom: 20px;
      text-align: center;
    }

    .instruction {
      font-size: 16px;
      margin-bottom: 20px;
    }

    .buttons {
      display: flex;
      gap: 20px;
    }

    .buttons button {
      padding: 12px 20px;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      font-family: 'Poppins', Arial, sans-serif; /* Ensure Poppins font */
    }

    .buttons .quiz {
      background-color:#f1ccdd;
      color:white;
      opacity:0.7;
      cursor:not-allowed;
      width:180px;
      font-size:1.05rem;
      font-weight:bold;
    }

    .buttons .task {
    background-color:#e636a4;
    color:white;
    width:180px;
    font-size:1.05rem;
    font-weight:bold;
        box-shadow:0 2px 8px #f7c6e6;
    }

.history {
      background-color:#e636a4;
      color:white;
      font-weight:bold;
      padding:10px 32px;
      border-radius:8px;
      border:none;
      font-size:1.05rem;
      width:180px;
      margin-bottom:10px;
      box-shadow:0 2px 8px #f7c6e6;
    }

    /* Modal Styles */
    #addContentModal {
      display: none;
      position: fixed;
      top: 0; left: 0; width: 100vw; height: 100vh;
      background: rgba(0,0,0,0.18);
      z-index: 2000;
      justify-content: center;
      align-items: center;
    }
    #addContentModal.active {
      display: flex;
    }
    .add-content-modal-box {
      background: #fff;
      border-radius: 16px;
      max-width: 480px;
      width: 95vw;
      padding: 32px 28px 28px 28px;
      box-shadow: 0 6px 32px rgba(0,0,0,0.13);
      position: relative;
    }
    .add-content-modal-close {
      position: absolute;
      top: 18px;
      right: 24px;
      font-size: 1.5rem;
      background: none;
      border: none;
      cursor: pointer;
    }
    .add-content-modal-title {
      font-size: 1.35rem;
      font-weight: 700;
      margin-bottom: 18px;
    }
    .add-content-modal-label {
      font-weight: 500;
    }
    .add-content-modal-input {
      width: 70%;
      margin-left: 12px;
      padding: 6px 10px;
      border-radius: 6px;
      border: 1.2px solid #ccc;
      font-size: 1rem;
    }
    .add-content-modal-clear {
      float: right;
      font-size: 0.97rem;
      color: #888;
      cursor: pointer;
    }
    .add-content-modal-note {
      font-size: 0.98rem;
      color: #888;
      margin-bottom: 18px;
    }
    .add-content-modal-import {
      display: flex;
      align-items: center;
      gap: 18px;
      background: #f7f7fb;
      border: 2px dashed #b983ff;
      padding: 18px 18px 18px 0;
      border-radius: 12px;
      margin-bottom: 24px;
    }
    .add-content-modal-import-img {
      width: 110px;
      height: 90px;
      object-fit: contain;
      margin-left: 18px;
    }
    .add-content-modal-import-title {
      font-weight: 600;
      font-size: 1.08rem;
      margin-bottom: 6px;
    }
    .add-content-modal-import-desc {
      font-size: 0.98rem;
      color: #444;
      margin-bottom: 10px;
    }
    .add-content-modal-import-btn {
      background: #f23eb3;
      color: #fff;
      font-weight: 600;
      border: none;
      border-radius: 8px;
      padding: 8px 22px;
      font-size: 1rem;
      cursor: pointer;
    }
    .add-content-modal-footer {
      display: flex;
      justify-content: center;
    }
    .modal-nxt-btn {
      background: linear-gradient(90deg,#e636a4 0%,#b983ff 100%);
      color: #fff;
      border: none;
      border-radius: 24px;
      padding: 12px 48px;
      font-size: 1.08rem;
      font-weight: 700;
      letter-spacing: 1.2px;
      box-shadow: 0 2px 8px #f7c6e6;
      cursor: pointer;
    }

    /* Due Date Modal Styles */
    #dueDateModal {
      display: none;
      position: fixed;
      top: 0; left: 0; width: 100vw; height: 100vh;
      background: rgba(0,0,0,0.08);
      z-index: 2100;
      justify-content: center;
      align-items: center;
    }
    #dueDateModal.active {
      display: flex;
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
      <button onclick="window.location.href='<?= base_url('upload') . (isset($_GET['course_id']) ? '?course_id=' . urlencode($_GET['course_id']) : '') ?>'">+ Add Content</button>
      <img src="<?= base_url('public/img/notifications.png') ?>" alt="Notifications" class="icon" />    
      <img src="<?= base_url('public/img/profile.png') ?>" alt="profile" class="profile"/>
    </div>
  </div>

  <!-- Tab Bar -->
  <div class="tabbar">
     <a href="<?= base_url('topics') . (isset($_GET['course_id']) ? '?course_id=' . urlencode($_GET['course_id']) : '') ?>"><span>Topic</span></a>
     <a href="<?= base_url('task_list') . (isset($_GET['course_id']) ? '?course_id=' . urlencode($_GET['course_id']) : '') ?>"><span>Task</span></a>
     <a href="<?= base_url('create_quiz') . (isset($_GET['course_id']) ? '?course_id=' . urlencode($_GET['course_id']) : '') ?>"><span>Quiz</span></a>
     <a href="<?= base_url('studentprog') ?>"><span>Student</span></a>
  </div>
  <!-- Content -->
  <div class="container">
    <div class="create-box">
      Let’s<br>Create!
    </div>
    <div class="instruction">Create your first task</div>
    <div style="display: flex; flex-direction: column; align-items: center; gap: 16px; width: 100%;">
      <button class="history">View History</button>
      <div class="buttons" style="gap: 20px; width: 100%; justify-content: center;">
        <button class="quiz"  disabled>Create a quiz</button>
        <button class="task" id="openAddContentModal">Create a Task</button>
      </div>
    </div>
  </div>

  <!-- Add Content Modal -->
  <div id="addContentModal">
    <div class="add-content-modal-box">
      <button id="closeAddContentModal" class="add-content-modal-close">&times;</button>
      <div class="add-content-modal-title">Add Content</div>
      <div style="margin-bottom:12px;">
        <label for="taskName" class="add-content-modal-label">Task Name:</label>
        <input id="taskName" type="text" class="add-content-modal-input">
        <span class="add-content-modal-clear" id="clearTaskModal">Clear all</span>
      </div>
      <!-- Required topic moved to Due Date modal (will be populated there) -->
      <div class="add-content-modal-note">
        Accepted formats: PDF, PNG, PPT, SLIDE, JPG, ZIP (Max size: 50MB)
      </div>
      <div class="add-content-modal-import">
        <img src="public/img/image 10.png" alt="Import" class="add-content-modal-import-img">
        <div>
          <div class="add-content-modal-import-title">Import your own content</div>
          <div class="add-content-modal-import-desc">Import content and get AI generated questions</div>
          <button class="add-content-modal-import-btn" id="importContentBtn">Import content</button>
        </div>
      </div>
      <div class="add-content-modal-footer">
        <button class="modal-nxt-btn" id="openDueDateModal">NEXT</button>
      </div>
    </div>
  </div>

  <!-- Due Date Modal -->
  <div id="dueDateModal" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.08); z-index:2100; justify-content:center; align-items:center;">
    <div style="background:#fff; border-radius:14px; max-width:600px; width:95vw; padding:38px 36px 32px 36px; box-shadow:0 6px 32px rgba(0,0,0,0.13); position:relative;">
      <button id="closeDueDateModal" style="position:absolute; top:18px; right:24px; font-size:1.5rem; background:none; border:none; cursor:pointer;">&times;</button>
      <div style="font-size:1.5rem; font-weight:700; margin-bottom:10px;">Due date</div>
      <div style="color:#a58cf5; font-size:1rem; margin-bottom:18px;">Recommended next steps</div>
      <div style="display:flex; gap:24px; margin-bottom:10px;">
        <div style="flex:1;">
          <div style="font-weight:500; margin-bottom:6px;">Start date</div>
          <div style="display:flex; align-items:center;">
            <input type="date" id="modalStartDate" style="width:100%; font-size:1rem; padding:8px 10px; border-radius:6px; border:1.2px solid #ccc; margin-bottom:8px;">
          </div>
          <div style="font-weight:500; margin-bottom:6px;">Start time</div>
          <input type="time" id="modalStartTime" style="width:100%; font-size:1rem; padding:8px 10px; border-radius:6px; border:1.2px solid #ccc; margin-bottom:8px;">
        </div>
        <div style="flex:1;">
          <div style="font-weight:500; margin-bottom:6px;">End date</div>
          <div style="display:flex; align-items:center;">
            <input type="date" id="modalEndDate" style="width:100%; font-size:1rem; padding:8px 10px; border-radius:6px; border:1.2px solid #ccc; margin-bottom:8px;">
          </div>
          <div style="font-weight:500; margin-bottom:6px;">End time</div>
          <input type="time" id="modalEndTime" style="width:100%; font-size:1rem; padding:8px 10px; border-radius:6px; border:1.2px solid #ccc; margin-bottom:8px;">
        </div>
      </div>
      <!-- removed duplicate attempts block; required task will appear under Options -->
      <div style="margin-bottom:18px;">
        <label style="display:flex; align-items:center; font-size:1rem; color:#7d4ff7; font-weight:500;">
          <input type="checkbox" checked style="margin-right:8px;">
          Allow late submission for the following week
        </label>
      </div>
      <hr style="margin:28px 0 18px 0; border:0; border-top:1.5px solid #eee;">
      <div style="display:flex; align-items:center; gap:12px; margin-bottom:10px;">
        <span style="display:inline-block; width:14px; height:14px; background:#e0e0e0; border-radius:50%; margin-right:8px;"></span>
        <span style="font-size:1.25rem; font-weight:700;">Options</span>
      </div>
      <div style="display:flex; gap:24px; margin-bottom:18px; align-items:flex-start;">
        <div style="flex:1;">
          <div style="margin-bottom:8px; font-weight:500;">Number of attempts</div>
          <input id="modalAttempts" type="number" min="0" value="0" style="width:120px; font-size:1rem; padding:8px 10px; border-radius:6px; border:1.2px solid #ccc; margin-bottom:4px;">
          <div style="font-size:0.95rem; color:#a58cf5; margin-top:6px;">Based on best attempt</div>
        </div>
        <div style="flex:1; display:flex; flex-direction:column;">
          <div style="margin-bottom:8px; font-weight:500;">Required task (optional)</div>
          <select id="dueRequiredTaskSelect" style="width:100%; padding:8px 10px; border-radius:6px; border:1.2px solid #ccc; margin-top:6px;">
            <option value="">None</option>
          </select>
          <div style="font-size:0.95rem; color:#888; margin-top:6px;">Select a task that must be completed first</div>

          <!-- Moved here: Required topic (optional) -->
          <div style="margin-top:12px; font-weight:500;">Required topic (optional)</div>
          <select id="taskRequiredTopicSelect" style="width:100%; padding:8px 10px; border-radius:6px; border:1.2px solid #ccc; margin-top:6px;">
            <option value="">None</option>
          </select>
          <div id="taskRequiredTopicTitle" style="font-size:0.95rem; color:#666; margin-top:6px;">&nbsp;</div>
        </div>
      </div>
      <div style="display:flex; justify-content:flex-end;">
        <button id="doneDueDateModal" style="background:#4be04b; color:#fff; border:none; border-radius:8px; padding:10px 32px; font-size:1.1rem; font-weight:600; cursor:pointer;">Done</button>
      </div>
    </div>
  </div>

  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-storage.js"></script>
  <script src="<?= base_url('public/js/firebase-config.js') ?>"></script>
  <script>
    let selectedTaskFile = null;

    // Modal open/close logic
    document.getElementById('openAddContentModal').addEventListener('click', function() {
      document.getElementById('addContentModal').classList.add('active');
    });
    document.getElementById('closeAddContentModal').addEventListener('click', function() {
      document.getElementById('addContentModal').classList.remove('active');
    });
    document.getElementById('clearTaskModal').addEventListener('click', function() {
      document.getElementById('taskName').value = '';
    });
    document.getElementById('addContentModal').addEventListener('click', function(e) {
      if (e.target === this) this.classList.remove('active');
    });

    // Utility: get course_id from URL
    function getCourseId() {
      return (new URLSearchParams(window.location.search)).get('course_id') || null;
    }

    // Load tasks and topics for the same course and populate the Required Task and Required Topic selects
    async function loadRequiredTaskOptions() {
      const courseId = getCourseId();
      if (!courseId) return;
      try {
        const select = document.getElementById('dueRequiredTaskSelect');
        if (select) select.innerHTML = '<option value="">None</option>';

        // determine current task id (if editing) and currentRequired value
        const task_id = new URLSearchParams(window.location.search).get('task_id') || '';
        let currentRequired = '';
        try {
          if (task_id) {
            // try to read task from course subcollection first
            let curSnap = null;
            try {
              curSnap = await firebase.firestore().collection('courses').doc(courseId).collection('tasks').doc(task_id).get();
            } catch (e) { curSnap = null; }
            if (!curSnap || !curSnap.exists) {
              try { curSnap = await firebase.firestore().collection('tasks').doc(task_id).get(); } catch (e) { curSnap = null; }
            }
            if (curSnap && curSnap.exists) {
              const tdata = curSnap.data() || {};
              currentRequired = tdata.requiredTask || '';
              // also preselect topic if present
              if (tdata.requiredTopic && document.getElementById('taskRequiredTopicSelect')) {
                // will set after loading topics
              }
            }
          }
        } catch (e) { console.warn('Could not fetch current task:', e); }

        // Load tasks for requiredTask select: try course subcollection first
        let qs = null;
        try { qs = await firebase.firestore().collection('courses').doc(courseId).collection('tasks').get(); } catch (e) { qs = null; }
        if (qs && !qs.empty && select) {
          qs.forEach(doc => {
            if (doc.id === task_id) return; // don't include itself
            const data = doc.data() || {};
            const title = data.title || data.task_name || '(Untitled)';
            const opt = document.createElement('option');
            opt.value = doc.id;
            opt.textContent = title + (doc.id === currentRequired ? ' (current)' : '');
            if (doc.id === currentRequired) opt.selected = true;
            select.appendChild(opt);
          });
        } else if (select) {
          try {
            const qs2 = await firebase.firestore().collection('tasks').where('course_id', '==', courseId).get();
            qs2.forEach(doc => {
              if (doc.id === task_id) return;
              const data = doc.data() || {};
              const title = data.title || data.task_name || '(Untitled)';
              const opt = document.createElement('option');
              opt.value = doc.id;
              opt.textContent = title + (doc.id === currentRequired ? ' (current)' : '');
              if (doc.id === currentRequired) opt.selected = true;
              select.appendChild(opt);
            });
          } catch (err) { console.error('Failed to load required task list fallback:', err); }
        }

        // Populate topic select in Add Content modal
        try {
          const topicSelect = document.getElementById('taskRequiredTopicSelect');
          const topicTitleEl = document.getElementById('taskRequiredTopicTitle');
          if (topicSelect) {
            topicSelect.innerHTML = '<option value="">None</option>';
            // Try course subcollection first
            let tqs = null;
            try { tqs = await firebase.firestore().collection('courses').doc(courseId).collection('topics').get(); } catch (e) { tqs = null; }
            if (tqs && !tqs.empty) {
              tqs.forEach(doc => {
                const d = doc.data() || {};
                const opt = document.createElement('option');
                opt.value = doc.id;
                opt.textContent = d.title || d.name || '(Untitled topic)';
                topicSelect.appendChild(opt);
              });
            } else {
              try {
                const tqs2 = await firebase.firestore().collection('topics').where('course_id', '==', courseId).get();
                tqs2.forEach(doc => {
                  const d = doc.data() || {};
                  const opt = document.createElement('option');
                  opt.value = doc.id;
                  opt.textContent = d.title || d.name || '(Untitled topic)';
                  topicSelect.appendChild(opt);
                });
              } catch (err) { console.warn('Failed to load topics fallback:', err); }
            }
            // If taskData passed from server includes requiredTopic, set it
            try {
              const preTopic = "<?= isset($taskData['requiredTopic']) ? esc($taskData['requiredTopic']) : '' ?>";
              if (preTopic) topicSelect.value = preTopic;
            } catch (e) {}
            // update title display
            if (topicTitleEl) topicTitleEl.textContent = topicSelect.options[topicSelect.selectedIndex]?.text || '';
            // update on change
            topicSelect.onchange = function() {
              if (topicTitleEl) topicTitleEl.textContent = this.options[this.selectedIndex]?.text || '';
            };
          }
        } catch (e) { console.warn('Failed to populate topic select', e); }
      } catch (err) {
        console.warn('Failed to load required tasks/topics:', err);
      }
    }

    // Show Due Date Modal on NEXT
    document.getElementById('openDueDateModal').addEventListener('click', async function() {
      // Validate task name before proceeding
      const taskName = document.getElementById('taskName').value.trim();
      if (!taskName) {
        alert('Task name is required.');
        return;
      }
      document.getElementById('addContentModal').classList.remove('active');
      // populate required-task options right before showing modal
      try { await loadRequiredTaskOptions(); } catch (e) { /* ignore */ }
      // reset or initialize modal fields if desired
      const modal = document.getElementById('dueDateModal');
      if (modal) modal.style.display = 'flex';
    });

    document.getElementById('closeDueDateModal').addEventListener('click', function() {
      document.getElementById('dueDateModal').style.display = 'none';
    });

    // --- FIREBASE TASK CREATION LOGIC ---
    document.getElementById('doneDueDateModal').addEventListener('click', async function() {
      // Collect all task info
      const taskName = document.getElementById('taskName').value.trim();
      const dueModal = document.getElementById('dueDateModal');
      const startDate = document.getElementById('modalStartDate') ? document.getElementById('modalStartDate').value : '';
      const startTime = document.getElementById('modalStartTime') ? document.getElementById('modalStartTime').value : '';
      const endDate = document.getElementById('modalEndDate') ? document.getElementById('modalEndDate').value : '';
      const endTime = document.getElementById('modalEndTime') ? document.getElementById('modalEndTime').value : '';
  const attempts = parseInt(document.getElementById('modalAttempts')?.value || 0, 10) || 0;
  const requiredTask = document.getElementById('dueRequiredTaskSelect') ? document.getElementById('dueRequiredTaskSelect').value : '';
  const requiredTopic = document.getElementById('taskRequiredTopicSelect') ? document.getElementById('taskRequiredTopicSelect').value : '';
      const allowLate = dueModal.querySelector('input[type="checkbox"]')?.checked || false;

      if (!taskName) {
        alert('Task name is required.');
        return;
      }
      const courseId = (new URLSearchParams(window.location.search)).get('course_id') || null;
      const db = firebase.firestore();
      let fileData = {};

      // Upload file if selected
      if (selectedTaskFile) {
        try {
          const storageRef = firebase.storage().ref();
          const timestamp = Date.now();
          const fileRef = storageRef.child(`educator_uploads/${courseId || 'general'}/${timestamp}_${selectedTaskFile.name}`);
          const uploadTaskSnapshot = await fileRef.put(selectedTaskFile);
          const downloadURL = await uploadTaskSnapshot.ref.getDownloadURL();
          fileData = {
            file_name: selectedTaskFile.name,
            file_type: selectedTaskFile.type,
            file_size: selectedTaskFile.size,
            file_url: downloadURL
          };
        } catch (error) {
          alert('❌ Failed to upload file: ' + error.message);
          return;
        }
      }

      // Create Firestore entry with file info (if any)
      const taskData = {
        title: taskName,
        description: '', // Add description field if you want
        created_at: new Date().toISOString(),
        course_id: courseId,
        start_date: startDate || null,
        start_time: startTime || null,
        start_datetime: (startDate && startTime) ? new Date(startDate + 'T' + startTime + ':00').toISOString() : null,
        end_date: endDate || null,
        end_time: endTime || null,
        end_datetime: (endDate && endTime) ? new Date(endDate + 'T' + endTime + ':00').toISOString() : null,
        attempts: attempts,
        allow_late: allowLate,
        requiredTask: requiredTask || '',
        requiredTopic: requiredTopic || '',
        ...fileData
      };
      try {
        let ref;
        if (courseId) {
          ref = await db.collection('courses').doc(courseId).collection('tasks').add(taskData);
        } else {
          ref = await db.collection('tasks').add(taskData);
        }
        document.getElementById('dueDateModal').style.display = 'none';
        alert('Task created successfully!');
        selectedTaskFile = null; // reset after creation
        // Optionally redirect to task list or clear modal
        // window.location.href = "<?= base_url('create_task') ?>";
      } catch (e) {
        alert('Failed to create task: ' + e.message);
      }
    });

    // Import content button (now uploads file to Storage and saves Firestore entry with downloadURL)
    document.getElementById('importContentBtn').onclick = function(e) {
      e.preventDefault();
      let fileInput = document.getElementById('importContentFileInput');
      if (!fileInput) {
        fileInput = document.createElement('input');
        fileInput.type = 'file';
        fileInput.accept = '.pdf,.png,.jpg,.jpeg,.ppt,.pptx,.zip';
        fileInput.style.display = 'none';
        fileInput.id = 'importContentFileInput';
        document.body.appendChild(fileInput);
      }
      fileInput.value = '';
      fileInput.onchange = function() {
        if (!fileInput.files.length) {
          selectedTaskFile = null;
          return;
        }
        selectedTaskFile = fileInput.files[0];
        alert('File selected: ' + selectedTaskFile.name);
      };
      fileInput.click();
    };
  </script>
</body>
</html>