<!-- app/Views/result_task.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task Details - <?= esc($task['title']) ?></title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('public/css/auth.css') ?>">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', 'Segoe UI', sans-serif;
            background-color: #ffeef8;
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
      justify-content: start;
      gap: 30px;
      padding: 10px 50px;
      background-color: white;
      border-bottom: 1px solid #ddd;
    }

    .tabbar span {
      font-weight: 500;

      cursor: pointer;
    }

    .tabbar .active {
      color: black;
      font-weight: bold;
      border-bottom: 3px solid black;
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

        .title-bar {
            padding: 10px 0;
            background-color: #f3d3f5;
            font-size: 18px;
            font-weight: 600;
            text-align: center;
        }

        .content {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .tasks-list {
            width: 65%;  /* Increased width */
            background: white;
            border-radius: 10px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.1);
        }

        .task-header {
            background-color: #c3b7f9;
            padding: 10px;
            border-radius: 8px 8px 0 0;
            font-weight: bold;
            color: #1c1c5a;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .task-details {
            padding: 20px;
            background: #f8f0f7;
            margin: 15px;
            border-radius: 8px;
        }

        .tasks-scroll {
            max-height: 400px;
            overflow-y: auto;
            padding: 15px;
        }

        .current-task-entry {
            background-color: #f0e6ff;
            margin: 0 0 20px 0;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #c3b7f9;
        }

        .submission-entry {
            background-color: #f7f7f7;
            margin: 10px 0;
            padding: 15px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .submission-info {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .submission-date {
            font-size: 12px;
            color: #666;
        }

        .submission-score {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .grading-controls {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .score-input {
            width: 60px;
            padding: 6px;
            border: 1px solid #ddd;
            border-radius: 4px;
            text-align: center;
        }

        .grade-btn {
            padding: 6px 12px;
            background: #e636a4;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
        }

        .edit-grade-btn {
            background: #6d4fd2;
            padding: 4px 8px;
            border-radius: 4px;
            color: white;
            font-size: 11px;
            cursor: pointer;
            border: none;
            margin-left: 8px;
        }

        .score-info {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .completed {
            font-size: 10px;
            color: white;
            background-color: #41d36b;
            padding: 2px 6px;
            border-radius: 12px;
        }

        .score {
            font-size: 0.9em;
            color: #333;
        }

        .status-bar {
            background-color: #ccc;
            border-radius: 10px;
            height: 6px;
            width: 60px;
            position: relative;
        }

        .status-fill {
            background-color: #41d36b;
            height: 100%;
            border-radius: 10px;
            width: 100%;
        }

        .status-incomplete .status-fill {
            width: 0%;
        }

        .due {
            font-size: 14px;
            color: #e74c3c;
            margin: 10px 0;
        }

        .task-entry {
            background-color: #f7f7f7;
            margin: 10px 0;
            padding: 15px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .task-info strong {
            display: block;
            margin-bottom: 5px;
        }

        .task-date {
            font-size: 12px;
            color: #666;
            margin: 0;
        }

        .task-actions {
            display: flex;
            gap: 10px;
        }

        .edit-btn, .delete-btn {
            padding: 5px 10px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            font-size: 12px;
            font-weight: 500;
        }

        .edit-btn {
            background: #f94fa4;
            color: white;
            text-decoration: none;
        }

        .delete-btn {
            background: #ff4444;
            color: white;
        }

        .current-task-entry {
            background-color: #f0e6ff;
            margin: 0 0 20px 0;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #c3b7f9;
        }

        .task-meta {
            font-size: 0.9em;
            color: #666;
            margin: 8px 0;
        }

        .task-description {
            margin: 10px 0;
            font-size: 0.95em;
            line-height: 1.4;
        }

        .view-btn {
            background: #6d4fd2;
            color: white;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 500;
        }

        .submission-header {
            border-bottom: 2px solid #f0e6ff;
            margin-bottom: 15px;
            padding-bottom: 10px;
        }

        .current-task {
            font-size: 0.9em;
            color: #666;
            margin: 5px 0;
        }

        .loading {
            text-align: center;
            padding: 20px;
            font-size: 1.1em;
            color: #999;
        }

        .error {
            color: #e74c3c;
            text-align: center;
            padding: 20px;
        }

        .no-submissions {
            text-align: center;
            padding: 20px;
            color: #666;
        }

        .logout-btn {
            background: #ff4081;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 500;
            cursor: pointer;
            font-size: 14px;
            margin-left: 15px;
        }

        .logout-btn:hover {
            background: #e63975;
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
             <img src="<?= base_url('public/img/profile.png') ?>"alt="profile" class="profile"/>
            <button id="signOutButton" class="logout-btn">Sign Out</button>
        </div>
    </div>

    <div class="tabbar">
        <a href="<?= base_url('topics') ?>"><span>Topic</span></a>
    <a href="<?= base_url('create_task') ?>"> <span>Task</span></a>
    <a href="<?= base_url('create_quiz') ?>"><span>Quiz</span></a>
        <span>Student</span>
    </div>

    <div class="title-bar"><?= esc($task['title']) ?></div>

    <div class="content">
        <div class="tasks-list">
            <div class="task-header">
                All Tasks
                <span>✎</span>
            </div>
            <div class="tasks-scroll">
                <!-- Current Task -->
                <div class="current-task-entry">
                    <div class="task-info">
                        <strong><?= esc($task['title']) ?></strong>
                        <p class="task-description"><?= esc($task['description']) ?: 'No description provided' ?></p>
                        <div class="task-meta">
                            <span>Start: <?= $task['start_date'] ? date('M d, Y', strtotime($task['start_date'])) : 'Not set' ?></span>
                            <span>Due: <?= $task['end_date'] ? date('M d, Y', strtotime($task['end_date'])) : 'Not set' ?></span>
                        </div>
                        <?php if (!empty($task['file_path'])): ?>
                            <div class="pdf-link">
                                📄 <a href="<?= base_url('task/download/' . $task['id']) ?>">Download Task File</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Other Tasks List -->
                <?php foreach ($allTasks as $t): ?>
                    <?php if ($t['id'] != $task['id']): ?>
                        <div class="task-entry">
                            <div class="task-info">
                                <strong><?= esc($t['title']) ?></strong>
                                <p class="task-date">Created: <?= date('M d, Y', strtotime($t['created_at'])) ?></p>
                            </div>
                            <div class="task-actions">
                                <a href="<?= base_url('task/result/' . $t['id']) ?>" class="view-btn">View</a>
                                <a href="<?= base_url('task/edit/' . $t['id']) ?>" class="edit-btn">Edit</a>
                                <form action="<?= base_url('task/delete/' . $t['id']) ?>" method="post" style="display:inline;">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="delete-btn" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Submissions List -->
        <div class="submission-list">
            <div class="submission-header">
                <h3>Student Submissions</h3>
                <p class="current-task">For: <?= esc($task['title']) ?></p>
            </div>
            <div id="submissions-container">
                <!-- Loading indicator -->
                <div class="loading">Loading submissions...</div>
            </div>
        </div>

        <script>
            function loadSubmissions() {
                const container = document.getElementById('submissions-container');
                container.innerHTML = '<div class="loading">Loading...</div>';

                fetch('<?= base_url('task/submissions/' . $task['id']) ?>')
                    .then(response => response.json())
                    .then(data => {
                        if (!data.success) throw new Error(data.message);
                        
                        if (data.submissions.length === 0) {
                            container.innerHTML = '<p class="no-submissions">No submissions yet</p>';
                            return;
                        }

                        container.innerHTML = data.submissions.map(sub => `
                            <div class="submission-entry">
                                <div class="submission-info">
                                    <strong>${sub.student_name}</strong>
                                    <span class="submission-date">Submitted: ${sub.submitted_at}</span>
                                    ${sub.file_path ? `<a href="${sub.file_path}" class="submission-file" target="_blank">📎 View Submission</a>` : ''}
                                </div>
                                <div class="submission-score">
                                    ${sub.status === 'completed' 
                                        ? `<div class="score-info">
                                            <span class="completed">Completed</span>
                                            <span class="score">${sub.score}/100</span>
                                            <button onclick="editGrade(${sub.id}, ${sub.score})" class="edit-grade-btn">Edit</button>
                                           </div>`
                                        : `<div class="grading-controls" id="grade-controls-${sub.id}">
                                            <input type="number" min="0" max="100" class="score-input" placeholder="Score">
                                            <button onclick="gradeSubmission(${sub.id})" class="grade-btn">Grade</button>
                                           </div>`
                                    }
                                </div>
                            </div>
                        `).join('');
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        container.innerHTML = `<p class="error">Error loading submissions: ${error.message}</p>`;
                    });
            }

            // Add editGrade function
            function editGrade(submissionId, currentScore) {
                const submissionEl = event.target.closest('.submission-entry');
                const scoreInfo = submissionEl.querySelector('.score-info');
                
                scoreInfo.innerHTML = `
                    <div class="grading-controls" id="grade-controls-${submissionId}">
                        <input type="number" min="0" max="100" class="score-input" value="${currentScore}">
                        <button onclick="gradeSubmission(${submissionId})" class="grade-btn">Update</button>
                    </div>
                `;
            }

            function gradeSubmission(submissionId) {
                const controls = document.getElementById(`grade-controls-${submissionId}`);
                const scoreInput = controls.querySelector('.score-input');
                const score = parseFloat(scoreInput.value);

                if (isNaN(score) || score < 0 || score > 100) {
                    alert('Please enter a valid score between 0 and 100');
                    return;
                }

                fetch('<?= base_url('task/grade/') ?>/' + submissionId, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ score: score })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        loadSubmissions(); // Reload the submissions list
                    } else {
                        throw new Error(data.message || 'Failed to update grade');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert(error.message || 'Failed to update grade');
                });
            }

            // Load submissions when page loads
            document.addEventListener('DOMContentLoaded', loadSubmissions);
        </script>
    </div>

    <!-- Firebase Integration -->
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
    <script src="<?= base_url('public/js/firebase-config.js') ?>"></script>
    <script>
        document.getElementById('signOutButton').addEventListener('click', function() {
            firebase.auth().signOut().then(() => {
                window.location.href = '<?= base_url('login') ?>';
            }).catch((error) => {
                console.error('Sign out error:', error);
                alert('Error signing out');
            });
        });
    </script>
</body>
</html>
