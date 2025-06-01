<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz Details - <?= esc($quiz['title']) ?></title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', 'Segoe UI', sans-serif;
            background-color: #ffeef8;
        }

        .container { max-width: 800px; margin: 40px auto; padding: 20px; }
        .question { 
            background: #fff;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .content {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 20px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .quiz-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.1);
            width: 45%;
            padding: 20px;
        }

        .quiz-header {
            background-color: #c3b7f9;
            padding: 10px;
            border-radius: 8px 8px 0 0;
            font-weight: bold;
            color: #1c1c5a;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .question-list {
            padding: 15px;
        }

        .question-item {
            background: #f8f0f7;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
        }

        .question-item p {
            margin: 0 0 10px 0;
            font-weight: 500;
        }

        .options-list {
            list-style: none;
            padding-left: 20px;
        }

        .options-list li {
            margin: 5px 0;
            color: #514a6d;
        }

        .quizzes-list {
            width: 25%;  /* Adjusted width */
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.1);
        }

        .quiz-entry {
            background-color: #f7f7f7;
            margin: 10px 0;
            padding: 15px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .quiz-info strong {
            display: block;
            margin-bottom: 5px;
        }

        .quiz-date {
            font-size: 12px;
            color: #666;
            margin: 0;
        }

        .quiz-actions {
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

        .quiz-meta {
            display: flex;
            gap: 20px;
            margin: 15px 0;
            padding: 10px;
            background: #f8f0f7;
            border-radius: 8px;
        }

        .quiz-meta p {
            margin: 5px 0;
        }

        .submission-list {
            width: 30%;  /* Adjusted width */
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.1);
        }

        .more-questions {
            font-weight: bold;
            color: #f94fa4;
            margin-top: 10px;
        }

        .quizzes-scroll {
            max-height: 400px;
            overflow-y: auto;
            padding-right: 10px;
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
      text-decoration: none;
      font-weight: bold;
      font-size: 1.5rem;
      color: black;
      background: none;
      border: none;
      cursor: pointer;
      padding: 8px;
    }

/* Dropdown container */
    .dropdown {
      position: relative;
    }

/* Dropdown menu */
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: white;
      min-width: 160px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.1);

      z-index: 1;
    }

/* Dropdown items */
    .dropdown-content a {
      padding: 12px 16px;
      display: block;
      color: black;
      text-decoration: none;
    }

    .dropdown-content a:hover {
      background-color: #eee;
    }

    /* Show dropdown on hover */
    .dropdown:hover .dropdown-content {
      display: block;
    }
    .arrow {
        font-size: 1.2rem;
        margin-left: 4px;
        vertical-align: middle;
        /* Ensures the arrow is centered with the text */
    }
    .dropdown .arrow {
      font-size: 1rem;
      margin-left: 4px;
    }
    li{
      font-weight: bold;
      list-style-type: none;
      padding: 0;
      margin: 0;

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
    <span>Task</span>
    <span class="active">Quiz</span>
    <span>Student</span>
  </div>

  <div class="title-bar"><?= esc($quiz['title']) ?></div>

    <div class="content">
        <!-- Quizzes List with Details - Left Side -->
        <div class="quizzes-list">
            <div class="quiz-header">
                All Quizzes
                <span>✎</span>
            </div>

            <div class="quiz-details">
                <div class="quiz-meta">
                    <div>
                        <p><strong>Current Quiz:</strong> <?= esc($quiz['title']) ?></p>
                        <p><strong>Start Date:</strong> <?= esc($quiz['start_date'] ?? 'Not set') ?></p>
                        <p><strong>End Date:</strong> <?= esc($quiz['end_date'] ?? 'Not set') ?></p>
                    </div>
                </div>

                <div class="question-preview">
                    <?php if (!empty($questions)): ?>
                        <h4>Questions Preview</h4>
                        <?php foreach (array_slice($questions, 0, 3) as $index => $question): ?>
                            <div class="question-item">Q<?= $index + 1 ?>: <?= esc($question['question_text']) ?></div>
                        <?php endforeach; ?>
                        <?php if (count($questions) > 3): ?>
                            <div class="more-questions">+ <?= count($questions) - 3 ?> more questions</div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="quizzes-scroll">
                <?php foreach ($allQuizzes as $q): ?>
                    <div class="quiz-entry">
                        <div class="quiz-info">
                            <strong><?= esc($q['title']) ?></strong>
                            <p class="quiz-date">Created: <?= date('M d, Y', strtotime($q['created_at'])) ?></p>
                        </div>
                        <div class="quiz-actions">
                            <a href="<?= base_url('quiz/edit/' . $q['id']) ?>" class="edit-btn">Edit</a>
                            <form action="<?= base_url('quiz/delete/' . $q['id']) ?>" method="post" style="display:inline;">
                                <?= csrf_field() ?>
                                <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this quiz?')">Delete</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Student Submissions - Right Side -->
        <div class="submission-list">
            <h3>Recent Submissions</h3>
            <div id="submissions-container">
                <!-- Submissions will be loaded here -->
            </div>
        </div>
    </div>
</body>
</html>
