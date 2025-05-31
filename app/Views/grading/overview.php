<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grading Overview</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            margin: 0;
            background-color: #ffeef8;
        }
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
        }
        .grading-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .grading-tabs {
            margin-bottom: 20px;
        }
        .tab {
            background: #f1f1f1;
            border: none;
            padding: 10px 20px;
            margin-right: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
        }
        .tab.active {
            background: #e636a4;
            color: white;
        }
        .grade-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .grade-table th, .grade-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        .grade-table th {
            background: #f9f0f7;
            font-weight: 600;
        }
        .grade-input {
            width: 80px;
            padding: 6px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .save-btn {
            background: #e636a4;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        .status {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 12px;
        }
        .status.pending {
            background: #fff3cd;
            color: #856404;
        }
        .status.graded {
            background: #d4edda;
            color: #155724;
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


    .search-box {
      display: flex;
      align-items: center;
      border: 1px solid #ccc;
      border-radius: 6px;
      padding: 5px 10px;
    }

    .search-box input {
      border: none;
      outline: none;
      padding: 5px;
      font-family: 'Poppins', 'Segoe UI', sans-serif;
    }
    </style>
</head>
<body>
    <!-- NAVBAR -->
  <div class="navbar">
    <div class="navbar-logo">
      <img src="imgs/Logo.png" alt="logo" class="logo"/>
    </div>
    <div class="navbar-center">
      <a href="#">HOME</a>
      <a href="#">DASHBOARD</a>
      <a href="#">ABOUT</a>
      <li class="dropdown">
      <span>COURSES <span class="arrow">&#9660;</span></span>
      <div class="dropdown-content">
        <select id="course-select">
          <option value="web">ALL COURSES </option>
          <option value="data">MY COURSES </option>
         
        </select>
      </div>
    </li>

    </div>
    <div class="navbar-right">
      <input type="text" placeholder="Search.." />
        <img src="imgs/notifications.png" alt="Notifications" class="icon" />
      <img src="imgs/profile.png" alt="profile" class="profile"/>
    </div>
  </div>
    <div class="container">
        <div class="grading-card">
            <h2>Grading Overview</h2>
            <div class="grading-tabs">
                <button class="tab active">Tasks</button>
                <button class="tab">Quizzes</button>
            </div>
            
            <table class="grade-table">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Submission</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Score</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($submissions ?? [] as $submission): ?>
                    <tr>
                        <td><?= esc($submission['student_name']) ?></td>
                        <td><?= esc($submission['task_title']) ?></td>
                        <td><?= date('M d, Y', strtotime($submission['submitted_at'])) ?></td>
                        <td>
                            <span class="status <?= $submission['status'] === 'graded' ? 'graded' : 'pending' ?>">
                                <?= ucfirst($submission['status']) ?>
                            </span>
                        </td>
                        <td>
                            <input type="number" class="grade-input" 
                                   value="<?= $submission['score'] ?? '' ?>" 
                                   min="0" max="100"
                                   data-submission-id="<?= $submission['id'] ?>">
                        </td>
                        <td>
                            <button class="save-btn" onclick="saveGrade(<?= $submission['id'] ?>)">Save</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function saveGrade(submissionId) {
            const input = document.querySelector(`input[data-submission-id="${submissionId}"]`);
            const score = input.value;

            fetch(`/grading/save/${submissionId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ score })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const row = input.closest('tr');
                    const statusCell = row.querySelector('.status');
                    statusCell.className = 'status graded';
                    statusCell.textContent = 'Graded';
                    alert('Grade saved successfully!');
                } else {
                    alert('Error saving grade: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to save grade');
            });
        }
    </script>
</body>
</html>
