<!-- app/Views/duedate_task.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Due Date</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        /* Navbar styles */
        .navbar {
            background-color: #fff;
            padding: 10px 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Tab bar styles */
        .tabbar {
            display: flex;
            justify-content: space-around;
            background-color: #fff;
            padding: 10px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .tabbar span {
            cursor: pointer;
            padding: 10px 20px;
        }

        .tabbar .active {
            font-weight: 700;
            color: #514a6d;
        }

        /* Modal Overlay */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(80, 41, 79, 0.06);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        /* Modal */
        .modal {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 8px 32px rgba(80,41,79,0.07);
            padding: 32px 36px 28px 36px;
            width: 480px;
            max-width: 96vw;
            position: relative;
            margin-top: 20px;
        }

        .modal-section-title {
            font-size: 18px;
            font-weight: 700;
            color: #514a6d;
            margin-bottom: 8px;
        }

        .modal-section-subtitle {
            font-size: 14px;
            color: #777;
            margin-bottom: 24px;
        }

        .modal-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .modal-row div {
            flex: 1;
            margin-right: 8px;
        }

        .modal-row div:last-child {
            margin-right: 0;
        }

        .modal-checkbox-row {
            display: flex;
            align-items: center;
            margin-bottom: 24px;
        }

        .modal-checkbox-row input {
            margin-right: 8px;
        }

        .modal-divider {
            border: 0;
            height: 1px;
            background: #eaeaea;
            margin: 16px 0;
        }

        .modal-options-title {
            font-size: 16px;
            font-weight: 700;
            color: #514a6d;
            margin-bottom: 8px;
        }

        .modal-options-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .modal-options-note {
            font-size: 12px;
            color: #999;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
        }

        .modal-done-btn {
            background-color: #514a6d;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }

        .modal-done-btn:hover {
            background-color: #403354;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-logo">
        <img src="imgs/Logo.png" alt="logo" class="logo"/>
        </div>
        <div class="navbar-center">
        <a href="<?= base_url('homepage') ?>">HOME</a>
        <a href="<?= base_url('dashboard') ?>">DASHBOARD</a>
        <a href="<?= base_url('aboutus') ?>">ABOUT</a>
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
        <img src="imgs/profile.png" alt="profile" class="profile" />
        <button id="signOutButton" class="logout-btn">Sign Out</button>
        </div>
    </div>

    <!-- Tab Bar -->
    <div class="tabbar">
        <span>Topic</span>
        <span class="active">Task</span>
        <span>Quiz</span>
        <span>Student</span>
    </div>

    <!-- Modal Overlay -->
    <div class="modal-overlay">
        <form class="modal" action="<?= base_url('task/duedate/' . $task['id']) ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="modal-section-title">Due date</div>
            <div class="modal-section-subtitle">Set due dates for: <?= esc($task['title']) ?></div>
            
            <div class="modal-row">
                <div>
                    <label for="start_date">Start date</label>
                    <input type="date" id="start_date" name="start_date" 
                        value="<?= old('start_date', $task['start_date']) ?>" required />
                </div>
                <div>
                    <label for="end_date">End date</label>
                    <input type="date" id="end_date" name="end_date" 
                        value="<?= old('end_date', $task['end_date']) ?>" required />
                </div>
            </div>

            <div class="modal-checkbox-row">
                <input type="checkbox" id="allow_late" name="allow_late" value="1" 
                    <?= old('allow_late', $task['allow_late']) ? 'checked' : '' ?> />
                <label for="allow_late">Allow late submission for the following week</label>
            </div>

            <hr class="modal-divider" />

            <div class="modal-options-title">Options</div>
            <div class="modal-options-row">
                <label for="attempts">Number of attempts</label>
                <input type="number" id="attempts" name="attempts" min="0" 
                    value="<?= old('attempts', $task['attempts']) ?>" />
                <div class="modal-options-note">Based on best attempt</div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="modal-done-btn">Done</button>
            </div>
        </form>
    </div>

    <script>
        // Handle close button click
        document.querySelector('.modal-close')?.addEventListener('click', function() {
            window.location.href = '<?= base_url('dashboard') ?>';
        });
    </script>
</body>
</html>
