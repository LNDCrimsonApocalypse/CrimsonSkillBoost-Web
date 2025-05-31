<!-- app/Views/result_task.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task Details - <?= esc($task['title']) ?></title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
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

        .navbar-logo .logo {
            height: 40px;
        }

        .navbar-center {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .navbar-center a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .navbar-right input {
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }

        .icon {
            height: 24px;
            cursor: pointer;
        }

        .profile {
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
        }

        .tabbar {
            display: flex;
            justify-content: center;
            background-color: #fff;
            padding: 10px 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .tabbar span {
            margin: 0 15px;
            cursor: pointer;
            font-weight: 500;
            color: #333;
        }

        .tabbar .active {
            color: #f53ea2;
            font-weight: 600;
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

        .task-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.1);
            width: 65%;
            padding: 20px;
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

        .task-body {
            padding: 15px;
        }

        .pdf-link {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 14px;
            margin: 10px 0;
        }

        .pdf-link a {
            color: #f53ea2;
            text-decoration: none;
        }

        .submission-list {
            width: 35%;
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.1);
        }

        .submission-list h3 {
            margin-top: 0;
            color: #333;
        }

        .student-entry {
            background-color: #f7f7f7;
            margin: 10px 0;
            padding: 10px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .student-status {
            display: flex;
            align-items: center;
            gap: 10px;
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
    </style>
</head>
<body>
    <div class="navbar">
        <div class="navbar-logo">
            <img src="https://i.imgur.com/1W7sOom.png" alt="logo" class="logo"/>
        </div>
        <div class="navbar-center">
            <a href="#">HOME</a>
            <a href="#">DASHBOARD</a>
            <a href="#">ABOUT</a>
            <li class="dropdown">
                <span>COURSES <span class="arrow">&#9660;</span></span>
                <div class="dropdown-content">
                    <select id="course-select">
                        <option value="web">ALL COURSES</option>
                        <option value="data">MY COURSES</option>
                    </select>
                </div>
            </li>
        </div>
        <div class="navbar-right">
            <input type="text" placeholder="Search.." />
            <img src="imgs/notifications.png" alt="Notifications" class="icon" />
            <img src="https://i.imgur.com/uIgDDDd.png" alt="profile" class="profile"/>
        </div>
    </div>

    <div class="tabbar">
        <span>Topic</span>
        <span class="active">Task</span>
        <span>Quiz</span>
        <span>Student</span>
    </div>

    <div class="title-bar"><?= esc($task['title']) ?></div>

    <div class="content">
        <div class="task-card">
            <div class="task-header">
                Task Details
                <span>✎</span>
            </div>
            <div class="task-body">
                <p><strong>Description:</strong> <?= esc($task['description']) ?: 'No description provided' ?></p>
                <p><strong>Year:</strong> <?= esc($task['year']) ?> | <strong>Section:</strong> <?= esc($task['section']) ?></p>
                <p><strong>Start Date:</strong> <?= esc($task['start_date']) ?: 'Not Set' ?></p>
                <p><strong>End Date:</strong> <?= esc($task['end_date']) ?: 'Not Set' ?></p>
                <div class="due">🕒 Due <?= $task['end_date'] ? 'on ' . date('F j, Y', strtotime($task['end_date'])) : 'date not set' ?></div>
                
                <?php if (!empty($task['file_path'])): ?>
                    <div class="pdf-link">
                        📄 <a href="<?= base_url('task/download/' . $task['id']) ?>">Download Task File</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="submission-list">
            <h3>Recent Submissions</h3>
            <!-- Example submissions - Replace with actual data -->
            <div class="student-entry">
                <div class="info">◼️ Juan Dela Cruz</div>
                <div class="student-status">
                    <span class="completed">Completed</span>
                    <span class="score">1/1</span>
                </div>
            </div>
            <!-- Add more student entries -->
            <div class="student-entry">
                <div class="info">◼️ Maria Santos</div>
                <div class="status-bar status-incomplete">
                    <div class="status-fill"></div>
                </div>
                <span class="score">0/1</span>
            </div>
        </div>
    </div>
</body>
</html>
