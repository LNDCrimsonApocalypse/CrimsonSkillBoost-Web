<!DOCTYPE html>
<html>
<head>
    <title>Create Quiz Questions</title>
    <style>
        .questions-container { max-width: 800px; margin: 40px auto; padding: 20px; }
        .question-block { border: 1px solid #ddd; padding: 20px; margin-bottom: 20px; border-radius: 8px; }
        .option-group { margin: 10px 0; }
        .add-question-btn, .submit-btn {
            background: #e636a4;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
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
        .navbar-right .icon, .navbar-right .profile {
            width: 30px;
            height: 30px;
            margin: 10px;
            vertical-align: middle;
        }
        .logout-btn {
            background: #e636a4;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
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

    <div class="questions-container">
        <h2>Create Quiz Questions</h2>
        
        <form action="<?= base_url('quiz/save_questions') ?>" method="post" id="quizForm">
            <?= csrf_field() ?>
            
            <div id="questions">
                <!-- Question blocks will be added here -->
            </div>

            <button type="button" onclick="addQuestion()" class="add-question-btn">Add Question</button>
            <button type="submit" class="submit-btn">Next</button>
        </form>
    </div>

    <script>
        let questionCount = 0;
        
        function addQuestion() {
            questionCount++;
            const questionHtml = `
                <div class="question-block">
                    <input type="text" name="questions[${questionCount}][text]" 
                           placeholder="Question text" required>
                    
                    <div class="option-group">
                        <input type="text" name="questions[${questionCount}][options][]" 
                               placeholder="Option 1" required>
                        <input type="radio" name="questions[${questionCount}][correct]" value="0" required>
                    </div>
                    <div class="option-group">
                        <input type="text" name="questions[${questionCount}][options][]" 
                               placeholder="Option 2" required>
                        <input type="radio" name="questions[${questionCount}][correct]" value="1">
                    </div>
                    <div class="option-group">
                        <input type="text" name="questions[${questionCount}][options][]" 
                               placeholder="Option 3" required>
                        <input type="radio" name="questions[${questionCount}][correct]" value="2">
                    </div>
                    <div class="option-group">
                        <input type="text" name="questions[${questionCount}][options][]" 
                               placeholder="Option 4" required>
                        <input type="radio" name="questions[${questionCount}][correct]" value="3">
                    </div>
                </div>
            `;
            document.getElementById('questions').insertAdjacentHTML('beforeend', questionHtml);
        }

        // Add first question automatically
        window.onload = addQuestion;
    </script>
</body>
</html>
