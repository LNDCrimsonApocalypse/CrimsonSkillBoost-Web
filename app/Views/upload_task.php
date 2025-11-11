<!-- app/Views/upload_task.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Content</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f2e6ee;
        }

        /* Navbar Styles */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            padding: 10px 50px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .navbar-logo .logo {
            height: 40px;
        }

        .navbar-center {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .navbar-center a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }

        .navbar-center .dropdown {
            position: relative;
        }

        .navbar-center .dropdown:hover .dropdown-content {
            display: block;
        }

        .navbar-center .dropdown-content {
            display: none;
            position: absolute;
            background-color: #fff;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .navbar-center .dropdown-content a {
            padding: 12px 16px;
            text-decoration: none;
            color: #333;
            display: block;
        }

        .navbar-center .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-right input[type="text"] {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        .navbar-right .profile {
            height: 40px;
            border-radius: 50%;
        }

        /* Tab Bar styles here... */

        /* Modal */
        .modal {
            background-color: white;
            width: 700px;
            margin: 50px auto;
            padding: 30px;
            border: 1px solid #e1c9df;
            border-radius: 5px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            position: relative;
        }

        .modal h2 {
            margin-top: 0;
            font-size: 20px;
            font-weight: 700;
        }

        .modal .close {
            position: absolute;
            right: 30px;
            top: 30px;
            font-weight: bold;
            cursor: pointer;
        }

        .modal .clear {
            position: absolute;
            right: 80px;
            top: 30px;
            font-size: 14px;
            cursor: pointer;
            color: #555;
        }

        .task-info {
            background: #f8f0f7;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
            font-size: 14px;
        }

        .modal label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .modal input[type="text"],
        .modal textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .import-section {
            border: 2px dashed #d2d2ff;
            padding: 30px;
            background-color: #eef4fb;
            text-align: center;
            border-radius: 10px;
            position: relative;
            margin: 20px 0;
        }

        .import-section img {
            width: 150px;
            margin-bottom: 10px;
        }

        .import-section p {
            margin: 5px 0;
            font-weight: 500;
        }

        .import-section input[type="file"] {
            display: none;
        }

        .import-section label {
            display: inline-block;
            background-color: #eb4bb3;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-top: 10px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
        }

        .add-btn {
            width: 100%;
            background: linear-gradient(to right, #f94fa4, #a48bd7);
            color: white;
            padding: 12px;
            border: none;
            border-radius: 20px;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        }

        /* Additional styles for the new button section */
        .button-section {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .button-section .btn {
            flex: 1;
            margin: 0 10px;
            padding: 12px;
            border: none;
            border-radius: 20px;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .button-section .btn span {
            position: absolute;
            display: block;
            width: 300%;
            height: 100%;
            top: 0;
            left: 0;
            background: linear-gradient(to right, #f94fa4, #a48bd7);
            transition: all 0.4s;
            z-index: 1;
        }

        .button-section .btn:hover span {
            width: 100%;
            right: 0;
            left: auto;
        }

        .button-section .btn-inner {
            position: relative;
            color: white;
            z-index: 2;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-logo">
            <img src="https://i.imgur.com/1W7sOom.png" alt="logo" class="logo"/>
        </div>
        <div class="navbar-center">
            <a href="<?= base_url('homepage') ?>">HOME</a>
          <a href="<?= base_url('dashboard') ?>">DASHBOARD</a>
       <a href="<?= base_url('aboutus') ?>">ABOUT</a>
        <a href="<?= base_url('allcourses') ?>">COURSES</a>
        
        </div>
        <div class="navbar-right">
            <input type="text" placeholder="Search.." />
            <img src="public/img/notifications.png" alt="Notifications" class="icon" />
            <img src="imgs/profile.png" alt="Profile" class="profile" />
            <button id="signOutButton" class="logout-btn">Sign Out</button>
        </div>
    </div>

    <!-- Tab Bar -->
    <div class="tabbar">
       <a href="<?= base_url('allcourses') ?>">  <span>Course</span></a>
    <a href="<?= base_url('create_task') ?>"> <span>Task</span></a>
    <a href="<?= base_url('create_quiz') ?>"><span>Quiz</span></a>
        <span>Student</span>
    </div>

    <form class="modal" action="<?= base_url('task/upload') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        
        <span class="close">✕</span>
        <span class="clear">Clear all</span>
        <h2>Add Content</h2>

        <div class="task-info">
            <strong>Year:</strong> <?= esc($taskData['year']) ?> | 
            <strong>Section:</strong> <?= esc($taskData['section']) ?> | 
            <strong>Semester:</strong> <?= esc($taskData['semester']) ?>
        </div>

        <label>Task Title:</label>
        <input type="text" name="task_name" value="<?= old('task_name') ?>" required placeholder="Enter task name">

        <label>Description (optional):</label>
        <textarea name="description" rows="4" placeholder="Enter task description"><?= old('description') ?></textarea>

        <div style="display:flex; gap:16px; margin-bottom:16px;">
            <div style="flex:1;">
                <label>Start date:</label>
                <input type="date" id="uploadStartDate" name="start_date" value="<?= esc($taskData['start_date'] ?? '') ?>">
            </div>
            <div style="flex:1;">
                <label>Start time:</label>
                <input type="time" id="uploadStartTime" name="start_time" value="<?= esc($taskData['start_time'] ?? '') ?>">
            </div>
        </div>
        <div style="display:flex; gap:16px; margin-bottom:16px;">
            <div style="flex:1;">
                <label>End date:</label>
                <input type="date" id="uploadEndDate" name="end_date" value="<?= esc($taskData['end_date'] ?? '') ?>">
            </div>
            <div style="flex:1;">
                <label>End time:</label>
                <input type="time" id="uploadEndTime" name="end_time" value="<?= esc($taskData['end_time'] ?? '') ?>">
            </div>
        </div>

        <label>Required Task (optional):</label>
        <select name="requiredTask" id="requiredTaskSelect">
            <option value="">None</option>
        </select>

        <div class="import-section">
            <img src="https://via.placeholder.com/150x100.png?text=Upload+Preview" alt="Upload Preview">
            <p><strong>Import your own content</strong></p>
            <p>Import content and get AI generated questions</p>
            <input type="file" id="import_content" name="import_content" accept=".pdf,.doc,.docx,.xlsx,.txt">
            <label for="import_content">Import content</label>
        </div>

        <div class="button-section">
            <button type="submit" class="btn">
                <span></span>
                <span class="btn-inner">ADD</span>
            </button>
            <button type="button" id="openDueModalBtn" class="btn" style="margin-left:8px;background:#e8cfff;color:#8a00cf;border-radius:20px;padding:12px;">
                <span></span>
                <span class="btn-inner">Set Due Date</span>
            </button>
        </div>
        <!-- Hidden ISO datetime fields (populated on submit) -->
        <input type="hidden" id="startDateTimeIso" name="start_datetime" value="<?= esc($taskData['start_datetime'] ?? '') ?>">
        <input type="hidden" id="endDateTimeIso" name="end_datetime" value="<?= esc($taskData['end_datetime'] ?? '') ?>">
    </form>

                <!-- Publish-style Due Date Modal (copied/adapted from questionsquiz2.php) -->
                <div id="publishTaskDueDateModal" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.08); z-index:5100; justify-content:center; align-items:center;">
                    <div style="background:#fff; border-radius:14px; max-width:600px; width:95vw; padding:28px 28px 32px 28px; box-shadow:0 6px 32px rgba(0,0,0,0.13); position:relative;">
                        <button id="closePublishTaskDueDateModal" style="position:absolute; top:18px; right:24px; font-size:1.5rem; background:none; border:none; cursor:pointer;">&times;</button>
                        <div style="font-size:1.5rem; font-weight:700; margin-bottom:10px;">Due date</div>
                        <div style="color:#a58cf5; font-size:1rem; margin-bottom:18px; font-weight:500;">Set task deadlines before adding</div>
                        <div style="display:flex; gap:24px; margin-bottom:10px;">
                            <div style="flex:1;">
                                <div style="font-weight:500; margin-bottom:6px;">Start date</div>
                                <input type="date" id="taskStartDate" style="width:100%; font-size:1rem; padding:8px 10px; border-radius:6px; border:1.2px solid #ccc; margin-bottom:8px;">
                                <div style="font-weight:500; margin-bottom:6px;">Start time</div>
                                <input type="time" id="taskStartTime" style="width:100%; font-size:1rem; padding:8px 10px; border-radius:6px; border:1.2px solid #ccc; margin-bottom:8px;">
                            </div>
                            <div style="flex:1;">
                                <div style="font-weight:500; margin-bottom:6px;">End date</div>
                                <input type="date" id="taskEndDate" style="width:100%; font-size:1rem; padding:8px 10px; border-radius:6px; border:1.2px solid #ccc; margin-bottom:8px;">
                                <div style="font-weight:500; margin-bottom:6px;">End time</div>
                                <input type="time" id="taskEndTime" style="width:100%; font-size:1rem; padding:8px 10px; border-radius:6px; border:1.2px solid #ccc; margin-bottom:8px;">
                            </div>
                        </div>
                        <div style="display:flex; gap:24px; margin-bottom:10px; align-items:center;">
                            <div style="flex:1;">
                                <div style="font-weight:500; margin-bottom:6px;">Number of attempts</div>
                                <input type="number" id="taskAttempts" min="0" value="0" style="width:120px; font-size:1rem; padding:8px 10px; border-radius:6px; border:1.2px solid #ccc;">
                                <div style="font-size:0.95rem; color:#a58cf5; margin-top:6px;">Based on best attempt</div>
                            </div>
                            <div style="flex:1;">
                                <label style="font-weight:500; margin-bottom:6px; display:block;">Required task</label>
                                <select id="publishRequiredTaskSelect" style="width:100%; padding:8px 10px; border-radius:6px; border:1.2px solid #ccc;">
                                    <option value="">None</option>
                                </select>
                                <div style="font-size:0.95rem; color:#888; margin-top:6px;">Select a task that must be completed first</div>
                            </div>
                        </div>
                        <div style="display:flex; justify-content:flex-end;">
                            <button id="donePublishTaskDueDateModal" style="background:#4be04b; color:#fff; border:none; border-radius:8px; padding:10px 32px; font-size:1.1rem; font-weight:600; cursor:pointer;">Done</button>
                        </div>
                    </div>
                </div>

    <!-- Firebase scripts (used to populate Required Task dropdown) -->
    <script src="https://www.gstatic.com/firebasejs/9.23.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.23.0/firebase-firestore-compat.js"></script>
    <script src="<?= base_url('public/js/firebase-config.js') ?>"></script>
    <script>
        // Helper to read URL params
        function getParam(name) {
            const params = new URLSearchParams(window.location.search);
            return params.get(name) || '';
        }
        const course_id = getParam('course_id') || "<?= isset($course_id) ? $course_id : '' ?>";

        // Initialize Firestore (if not already)
        if (!window.firebase) {
            console.warn('Firebase not loaded');
        }
        if (window.firebase && !firebase.apps.length) {
            try { firebase.initializeApp(firebaseConfig); } catch (e) { /* already initialized elsewhere */ }
        }
        const dbFS = (window.firebase && firebase.firestore()) || null;

        // Load tasks for the same course and populate the Required Task dropdown (mirrors questionsquiz2 behavior)
        async function loadRequiredTaskOptions() {
            if (!course_id) return;
            const select = document.getElementById('requiredTaskSelect');
            const modalSelect = document.getElementById('publishRequiredTaskSelect');
            if (!select || !dbFS) return;
            select.innerHTML = '<option value="">None</option>';
            if (modalSelect) modalSelect.innerHTML = '<option value="">None</option>';

            // determine current task id (if editing)
            const task_id = new URLSearchParams(window.location.search).get('task_id') || "<?= isset($task_id) ? $task_id : '' ?>";
            let currentRequired = '';
            try {
                if (task_id) {
                    const curSnap = await dbFS.collection('tasks').doc(task_id).get();
                    if (curSnap.exists) {
                        const tdata = curSnap.data() || {};
                        currentRequired = tdata.requiredTask || '';
                        // populate date/time inputs if present
                        try { populateDateTimeInputs(tdata); } catch (e) { console.warn('populateDateTimeInputs error', e); }
                    }
                }
            } catch (err) {
                console.warn('Could not fetch current task:', err);
            }

            try {
                const qs = await dbFS.collection('tasks').where('course_id', '==', course_id).get();
                qs.forEach(doc => {
                    if (doc.id === task_id) return; // don't include itself
                    const title = doc.data().title || doc.data().task_name || '(Untitled)';
                    const opt = document.createElement('option');
                    opt.value = doc.id;
                    opt.textContent = title + (doc.id === currentRequired ? ' (current)' : '');
                    if (doc.id === currentRequired) opt.selected = true;
                    select.appendChild(opt);
                    if (modalSelect) {
                        const opt2 = opt.cloneNode(true);
                        modalSelect.appendChild(opt2);
                    }
                });
                // if server passed requiredTask, ensure it's selected
                try {
                    const pre = "<?= isset($taskData['requiredTask']) ? esc($taskData['requiredTask']) : '' ?>";
                    if (pre) { select.value = pre; if (modalSelect) modalSelect.value = pre; }
                } catch (e) {}
            } catch (err) {
                console.error('Failed to load required task list:', err);
            }
        }

        // Helper: parse ISO or separate fields and populate inputs (copied from questionsquiz2)
        function parseISOToLocalParts(iso) {
            try {
                if (!iso) return { date: '', time: '' };
                if (/^\d{4}-\d{2}-\d{2}$/.test(iso)) return { date: iso, time: '' };
                const d = new Date(iso);
                if (isNaN(d)) return { date: '', time: '' };
                const pad = n => String(n).padStart(2, '0');
                const date = `${d.getFullYear()}-${pad(d.getMonth()+1)}-${pad(d.getDate())}`;
                const time = `${pad(d.getHours())}:${pad(d.getMinutes())}`;
                return { date, time };
            } catch (e) { return { date: '', time: '' }; }
        }

        function populateDateTimeInputs(tdata) {
            const sDateEl = document.getElementById('uploadStartDate');
            const sTimeEl = document.getElementById('uploadStartTime');
            const eDateEl = document.getElementById('uploadEndDate');
            const eTimeEl = document.getElementById('uploadEndTime');
            const modalSDate = document.getElementById('taskStartDate');
            const modalSTime = document.getElementById('taskStartTime');
            const modalEDate = document.getElementById('taskEndDate');
            const modalETime = document.getElementById('taskEndTime');

            let startDate = tdata.start_date || '';
            let startTime = tdata.start_time || '';
            if (!startDate && tdata.start_datetime) {
                const parts = parseISOToLocalParts(tdata.start_datetime);
                startDate = parts.date; startTime = startTime || parts.time;
            } else if (startDate && startDate.includes('T')) {
                const parts = parseISOToLocalParts(startDate);
                startDate = parts.date; startTime = startTime || parts.time;
            }

            let endDate = tdata.end_date || '';
            let endTime = tdata.end_time || '';
            if (!endDate && tdata.end_datetime) {
                const parts = parseISOToLocalParts(tdata.end_datetime);
                endDate = parts.date; endTime = endTime || parts.time;
            } else if (endDate && endDate.includes('T')) {
                const parts = parseISOToLocalParts(endDate);
                endDate = parts.date; endTime = endTime || parts.time;
            }

            if (sDateEl && startDate) sDateEl.value = startDate;
            if (sTimeEl && startTime) sTimeEl.value = startTime;
            if (eDateEl && endDate) eDateEl.value = endDate;
            if (eTimeEl && endTime) eTimeEl.value = endTime;

            if (modalSDate && startDate) modalSDate.value = startDate;
            if (modalSTime && startTime) modalSTime.value = startTime;
            if (modalEDate && endDate) modalEDate.value = endDate;
            if (modalETime && endTime) modalETime.value = endTime;
        }

        document.addEventListener('DOMContentLoaded', function() {
            loadRequiredTaskOptions();
        });
    </script>
    <script>
        // Publish-style modal logic: open, populate, save to form and optionally to Firestore
        (function(){
            const openBtn = document.getElementById('openDueModalBtn');
            const modal = document.getElementById('publishTaskDueDateModal');
            const closeBtn = document.getElementById('closePublishTaskDueDateModal');
            const doneBtn = document.getElementById('donePublishTaskDueDateModal');
            const publishRequiredSelect = document.getElementById('publishRequiredTaskSelect');

            const task_id = (function(){
                const p = new URLSearchParams(window.location.search).get('task_id');
                return p || "<?= isset($task_id) ? $task_id : '' ?>";
            })();

            function showModal() {
                // copy values from inline inputs into modal
                const sDate = document.getElementById('uploadStartDate')?.value || '';
                const sTime = document.getElementById('uploadStartTime')?.value || '';
                const eDate = document.getElementById('uploadEndDate')?.value || '';
                const eTime = document.getElementById('uploadEndTime')?.value || '';
                const attempts = document.getElementById('taskAttempts')?.value || document.getElementById('taskAttempts')?.value || 0;
                if (document.getElementById('taskStartDate')) document.getElementById('taskStartDate').value = sDate;
                if (document.getElementById('taskStartTime')) document.getElementById('taskStartTime').value = sTime;
                if (document.getElementById('taskEndDate')) document.getElementById('taskEndDate').value = eDate;
                if (document.getElementById('taskEndTime')) document.getElementById('taskEndTime').value = eTime;
                if (document.getElementById('taskAttempts')) document.getElementById('taskAttempts').value = attempts;

                // populate required-task select (copy options from form-level select if present)
                try {
                    const master = document.getElementById('requiredTaskSelect');
                    if (master && publishRequiredSelect) {
                        publishRequiredSelect.innerHTML = master.innerHTML;
                        // if server preselected value, keep it
                        try { const pre = "<?= isset($taskData['requiredTask']) ? esc($taskData['requiredTask']) : '' ?>"; if (pre) publishRequiredSelect.value = pre; } catch (e) {}
                    }
                } catch (e) { /* ignore */ }

                if (modal) modal.style.display = 'flex';
            }
            function hideModal() { if (modal) modal.style.display = 'none'; }

            if (openBtn) openBtn.addEventListener('click', showModal);
            if (closeBtn) closeBtn.addEventListener('click', hideModal);
            if (modal) modal.addEventListener('click', function(e){ if (e.target === modal) hideModal(); });

            if (doneBtn) doneBtn.addEventListener('click', async function(){
                const sDate = document.getElementById('taskStartDate')?.value || '';
                const sTime = document.getElementById('taskStartTime')?.value || '';
                const eDate = document.getElementById('taskEndDate')?.value || '';
                const eTime = document.getElementById('taskEndTime')?.value || '';
                const attempts = parseInt(document.getElementById('taskAttempts')?.value || 0, 10) || 0;
                const requiredTask = (publishRequiredSelect && publishRequiredSelect.value) || '';

                // Copy back to form fields
                if (document.getElementById('uploadStartDate')) document.getElementById('uploadStartDate').value = sDate;
                if (document.getElementById('uploadStartTime')) document.getElementById('uploadStartTime').value = sTime;
                if (document.getElementById('uploadEndDate')) document.getElementById('uploadEndDate').value = eDate;
                if (document.getElementById('uploadEndTime')) document.getElementById('uploadEndTime').value = eTime;
                if (document.getElementById('requiredTaskSelect')) document.getElementById('requiredTaskSelect').value = requiredTask;
                // set hidden ISO fields
                try {
                    const startIsoEl = document.getElementById('startDateTimeIso');
                    const endIsoEl = document.getElementById('endDateTimeIso');
                    if (sDate && sTime && startIsoEl) startIsoEl.value = new Date(sDate + 'T' + sTime + ':00').toISOString();
                    if (eDate && eTime && endIsoEl) endIsoEl.value = new Date(eDate + 'T' + eTime + ':00').toISOString();
                } catch (err) { console.warn('Failed to set ISO datetimes from modal', err); }

                // If an existing task_id is present, update Firestore doc for tasks collection as well
                if (task_id && dbFS) {
                    try {
                        await dbFS.collection('tasks').doc(task_id).update({
                            start_date: sDate || null,
                            start_time: sTime || null,
                            start_datetime: (sDate && sTime) ? new Date(sDate + 'T' + sTime + ':00').toISOString() : null,
                            end_date: eDate || null,
                            end_time: eTime || null,
                            end_datetime: (eDate && eTime) ? new Date(eDate + 'T' + eTime + ':00').toISOString() : null,
                            attempts: attempts,
                            requiredTask: requiredTask || ''
                        });
                    } catch (err) {
                        console.error('Failed to update task document in Firestore:', err);
                    }
                }

                hideModal();
            });
        })();
    </script>
    <script>
        // Before form submit, combine date + time into ISO datetimes and set hidden inputs
        (function() {
            const form = document.querySelector('form.modal');
            if (!form) return;
            form.addEventListener('submit', function(e) {
                try {
                    const sDate = document.getElementById('uploadStartDate')?.value || '';
                    const sTime = document.getElementById('uploadStartTime')?.value || '';
                    const eDate = document.getElementById('uploadEndDate')?.value || '';
                    const eTime = document.getElementById('uploadEndTime')?.value || '';
                    const startIsoEl = document.getElementById('startDateTimeIso');
                    const endIsoEl = document.getElementById('endDateTimeIso');

                    if (sDate && sTime && startIsoEl) {
                        startIsoEl.value = new Date(sDate + 'T' + sTime + ':00').toISOString();
                    }
                    if (eDate && eTime && endIsoEl) {
                        endIsoEl.value = new Date(eDate + 'T' + eTime + ':00').toISOString();
                    }
                } catch (err) {
                    console.warn('Failed to prepare datetime fields', err);
                }
                // allow form to submit
            });
        })();
    </script>
    <script>
        // Add file name display functionality
        document.getElementById('import_content').addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name;
            if (fileName) {
                document.querySelector('.import-section p:first-of-type').textContent = fileName;
            }
        });

        // Clear all functionality
        document.querySelector('.clear').addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector('form').reset();
            document.querySelector('.import-section p:first-of-type').textContent = 'Import your own content';
        });

        // Close button functionality
        document.querySelector('.close').addEventListener('click', function() {
            window.location.href = '<?= base_url('dashboard') ?>';
        });
    </script>
</body>
</html>
