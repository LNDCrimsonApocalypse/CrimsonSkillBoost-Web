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
            <a href="#">HOME</a>
            <a href="#">DASHBOARD</a>
            <a href="#">ABOUT</a>
            <a href="#" class="dropdown">COURSES</a>
            <div class="icon">🔔</div>
        </div>
        <div class="navbar-right">
            <input type="text" placeholder="Search.." />
            <img src="imgs/notifications.png" alt="Notifications" class="icon" />
            <img src="imgs/profile.png" alt="Profile" class="profile" />
            <button id="signOutButton" class="logout-btn">Sign Out</button>
        </div>
    </div>

    <!-- Tab Bar -->
    <div class="tabbar">
        <span>Course</span>
        <span class="active">Task</span>
        <span>Quiz</span>
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
        </div>
    </form>

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
