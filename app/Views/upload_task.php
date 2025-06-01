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
