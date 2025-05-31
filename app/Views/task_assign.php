<!-- app/Views/task_assign.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add a New Task</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            margin: 0;
            background-color: #f2eaf2;
        }

        /* Navbar styles */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-logo .logo {
            height: 40px;
        }

        .navbar-center {
            display: flex;
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
            gap: 10px;
        }

        .navbar-right input {
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .navbar-right .profile {
            height: 40px;
            border-radius: 50%;
        }

        /* Tab bar styles */
        .tabbar {
            display: flex;
            justify-content: center;
            background-color: #fff;
            padding: 10px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .tabbar span {
            margin: 0 15px;
            cursor: pointer;
            font-weight: 500;
            color: #333;
        }

        .tabbar .active {
            color: #e636a4;
            border-bottom: 2px solid #e636a4;
        }

        /* Modal styles */
        .modal {
            max-width: 800px;
            margin: 40px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .modal-header {
            background: #e636a4;
            color: white;
            padding: 15px;
            font-size: 18px;
            position: relative;
        }

        .modal-header .close-btn {
            position: absolute;
            right: 10px;
            top: 10px;
            cursor: pointer;
            font-size: 18px;
        }

        .error {
            background-color: #ffe6e6;
            color: #d8000c;
            border: 1px solid #d8000c;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
        }

        .section-title {
            font-weight: 700;
            font-size: 16px;
            margin: 20px;
        }

        .content-wrapper {
            display: flex;
            justify-content: space-between;
            padding: 0 20px 20px;
        }

        .column {
            flex: 1;
            margin: 0 10px;
        }

        .subheader {
            font-weight: 600;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .select-all {
            cursor: pointer;
            font-size: 14px;
            color: #e636a4;
        }

        .option-group {
            background: #f9f9f9;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .option-group label {
            display: block;
            margin: 5px 0;
            cursor: pointer;
        }

        .scroll {
            max-height: 150px;
            overflow-y: auto;
        }

        button {
            background: #e636a4;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #d62894;
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
            <img src="https://i.imgur.com/uIgDDDd.png" alt="profile" class="profile"/>
        </div>
    </div>

    <!-- Tab Bar -->
    <div class="tabbar">
        <span>Course</span>
        <span class="active">Task</span>
        <span>Quiz</span>
        <span>Student</span>
    </div>

    <div class="modal">
        <div class="modal-header">
            ADD A NEW TASK
            <span class="close-btn">×</span>
        </div>

        <?php if (isset($error)): ?>
            <div class="error"><?= esc($error) ?></div>
        <?php endif; ?>

        <form method="post" action="<?= base_url('task/assign') ?>">
            <?= csrf_field() ?>
            
            <div class="section-title">● Select Classes and Courses</div>
            <div class="content-wrapper">
                <!-- Classes Column -->
                <div class="column">
                    <div class="subheader">
                        <span>Year and Section</span>
                        <span class="select-all">Select All</span>
                    </div>
                    <div class="option-group">
                        <label><input type="radio" name="year" value="1" <?= old('year') == 1 ? 'checked' : '' ?>> 1st Year</label>
                        <label><input type="radio" name="year" value="2" <?= old('year') == 2 ? 'checked' : '' ?>> 2nd Year</label>
                        <label><input type="radio" name="year" value="3" <?= old('year') == 3 ? 'checked' : '' ?>> 3rd Year</label>
                        <label><input type="radio" name="year" value="4" <?= old('year') == 4 ? 'checked' : '' ?>> 4th Year</label>
                    </div>
                    <div class="option-group">
                        <label><input type="radio" name="section" value="ACSAD" <?= old('section') == 'ACSAD' ? 'checked' : '' ?>> ACSAD</label>
                        <label><input type="radio" name="section" value="BCSAD" <?= old('section') == 'BCSAD' ? 'checked' : '' ?>> BCSAD</label>
                        <label><input type="radio" name="section" value="CCSAD" <?= old('section') == 'CCSAD' ? 'checked' : '' ?>> CCSAD</label>
                    </div>
                </div>

                <!-- Courses Column -->
                <div class="column">
                    <div class="subheader">
                        <span>Courses</span>
                        <span class="select-all">Select All</span>
                    </div>
                    <div class="option-group scroll">
                        <label><input type="radio" name="semester" value="1" <?= old('semester') == 1 ? 'checked' : '' ?>> First Semester</label>
                        <label><input type="radio" name="semester" value="2" <?= old('semester') == 2 ? 'checked' : '' ?>> Second Semester</label>
                        <br>
                        <?php foreach ($courses as $course): ?>
                            <label>
                                <input type="checkbox" name="courses[]" value="<?= $course['id'] ?>"
                                    <?= (is_array(old('courses')) && in_array($course['id'], old('courses'))) ? 'checked' : '' ?>>
                                <?= esc($course['course_name']) ?>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div style="text-align: right; padding: 20px;">
                <button type="submit">Next</button>
            </div>
        </form
