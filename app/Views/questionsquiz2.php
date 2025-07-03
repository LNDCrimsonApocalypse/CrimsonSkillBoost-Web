<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz Review Page</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: #ffeef8;
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
  flex-direction: row;
  gap: 36px;
  font-size: 1.1rem;
  font-weight: 500;
  background: #fff;
  border-bottom: 1.5px solid #f8e6f6;
  min-height: 38px;
  align-items: center;
  padding: 0 0 0 24px;
  margin: 0;
  position: static;
  width: 100%;
}
.tabbar a {
  text-decoration: none;
  color: #3a2352;
  font-weight: 600;
  font-size: 1.15rem;
  padding: 0 8px;
  transition: color 0.18s;
  border-bottom: 3px solid transparent;
  background: none;
}
.tabbar a:hover,
.tabbar a.active {
  color: #e636a4;
  border-bottom: 3px solid #e636a4;
}
.tabbar span {
  font-weight: 500;
  cursor: pointer;
}
.tabbar .active {
  color: #e636a4;
  font-weight: bold;
  border-bottom: 3px solid #e636a4;
  padding-bottom: 5px;
}

    .search-box {
      padding: 6px 12px;
      font-size: 1rem;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    .publish-button {
      background: #ff3bbd;
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: bold;
      padding: 8px 22px;
      cursor: pointer;
      transition: background 0.2s;
      margin-right: 8px;
    }

    .publish-button:hover {
       background: #d12c5c;
    }

    .profile-icon {
      width: 35px;
      height: 35px;
      border-radius: 50%;
      object-fit: cover;
    }

    .subnav {
      background: #f7f7f7;
      padding: 10px 40px;
      display: flex;
      gap: 30px;
      font-weight: 500;
      border-bottom: 1px solid #ddd;
      color: #555;
    }

    .main {
      display: flex;
      padding: 40px;
      gap: 30px;
    }

    /* Left Menu */
    .left-menu {
      background: white;
      border-radius: 10px;
      padding: 20px;
      min-width: 200px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .left-menu h4 {
      margin-bottom: 12px;
      font-weight: 600;
    }

    .left-menu div {
      margin-bottom: 14px;
      cursor: pointer;
    }

    .left-menu div::after {
      content: '>';
      float: right;
      font-weight: bold;
    }

    /* Right Panel */
    .question-panel {
      flex: 1;
    }

    .question-summary {
      background: white;
      border-radius: 12px;
      padding: 24px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    .question-summary h4 {
      margin: 0 0 8px;
      font-size: 1.1rem;
    }

    .question-type {
      font-size: 0.8rem;
      font-weight: 600;
      background: #eee;
      padding: 4px 8px;
      border-radius: 6px;
      display: inline-block;
      margin-bottom: 10px;
    }

    .question-actions {
      float: right;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .question-actions select,
    .question-actions button {
      padding: 4px 8px;
      font-size: 0.9rem;
      border-radius: 4px;
      border: 1px solid #aaa;
      background: white;
      cursor: pointer;
    }

    .answer-list {
      margin-top: 10px;
    }

    .answer {
      margin-bottom: 6px;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .answer.correct::before {
      content: "✔";
      color: green;
    }

    .answer.wrong::before {
      content: "✘";
      color: red;
    }

    .add-question-btn {
      margin-top: 24px;
      padding: 10px 20px;
      background: #e8cfff;
      color: #8a00cf;
      border: none;
      border-radius: 6px;
      font-weight: 600;
      cursor: pointer;
    }

    .add-question-btn:hover {
      background: #d7b6fa;
    }

    .upload-modal-bg {
      display: none;
      position: fixed;
      z-index: 3000;
      left: 0; top: 0;
      width: 100vw; height: 100vh;
      background: rgba(0,0,0,0.10);
      justify-content: center;
      align-items: center;
    }
    .upload-modal-bg.active {
      display: flex;
    }
    .upload-modal {
      background: #fff;
      border-radius: 12px;
      max-width: 600px;
      width: 98vw;
      padding: 36px 32px 32px 32px;
      box-shadow: 0 6px 32px rgba(0,0,0,0.13);
      position: relative;
      font-family: 'Poppins', Arial, sans-serif;
    }
    .upload-modal-close {
      position: absolute;
      top: 18px;
      right: 24px;
      font-size: 1.5rem;
      background: none;
      border: none;
      cursor: pointer;
      color: #333;
    }
    .upload-modal-title {
      font-size: 1.6rem;
      font-weight: 700;
      margin-bottom: 8px;
      color: #111;
    }
    .upload-modal-label {
      font-weight: 500;
      font-size: 1rem;
      margin-bottom: 4px;
      display: block;
    }
    .upload-modal-input {
      width: 100%;
      margin-bottom: 12px;
      padding: 7px 10px;
      border-radius: 6px;
      border: 1.2px solid #ccc;
      font-size: 1rem;
      font-family: 'Poppins', Arial, sans-serif;
    }
    .upload-modal-clear {
      float: right;
      font-size: 0.97rem;
      color: #888;
      cursor: pointer;
      margin-top: -28px;
      margin-right: 2px;
    }
    .upload-modal-note {
      font-size: 0.98rem;
      color: #888;
      margin-bottom: 18px;
      margin-top: 8px;
    }
    .upload-modal-import {
      display: flex;
      align-items: center;
      gap: 28px;
      background: #f6f7fb;
      border: 2px dashed #b983ff;
      padding: 18px 18px 18px 0;
      border-radius: 12px;
      margin-bottom: 24px;
      margin-top: 18px;
    }
    .upload-modal-import-img {
      width: 180px;
      height: 140px;
      object-fit: contain;
      margin-left: 18px;
      background: #fff;
      border-radius: 8px;
    }
    .upload-modal-import-title {
      font-weight: 700;
      font-size: 1.18rem;
      margin-bottom: 6px;
      color: #222;
    }
    .upload-modal-import-desc {
      font-size: 1rem;
      color: #444;
      margin-bottom: 18px;
    }
    .upload-modal-import-btn {
      background: #f23eb3;
      color: #fff;
      font-weight: 600;
      border: none;
      border-radius: 8px;
      padding: 10px 28px;
      font-size: 1rem;
      cursor: pointer;
      margin-top: 8px;
      margin-bottom: 8px;
      transition: background 0.18s;
    }
    .upload-modal-import-btn:hover {
      background: #d12c5c;
    }
    .upload-modal-footer {
      display: flex;
      justify-content: center;
      margin-top: 18px;
    }
    .upload-modal-next-btn {
      background: linear-gradient(90deg,#e636a4 0%,#b983ff 100%);
      color: #fff;
      border: none;
      border-radius: 24px;
      padding: 14px 56px;
      font-size: 1.08rem;
      font-weight: 700;
      letter-spacing: 1.2px;
      box-shadow: 0 2px 8px #f7c6e6;
      cursor: pointer;
      margin-top: 8px;
      transition: background 0.18s;
    }
    .upload-modal-next-btn:disabled {
      opacity: 0.7;
      cursor: not-allowed;
    }

    .due-modal-bg {
      display: none;
      position: fixed;
      z-index: 4000;
      left: 0; top: 0;
      width: 100vw; height: 100vh;
      background: rgba(0,0,0,0.10);
      justify-content: center;
      align-items: center;
    }
    .due-modal-bg.active {
      display: flex;
    }
    .due-modal {
      background: #fff;
      border-radius: 12px;
      max-width: 900px;
      width: 98vw;
      padding: 38px 48px 38px 48px;
      box-shadow: 0 6px 32px rgba(0,0,0,0.13);
      position: relative;
      font-family: 'Poppins', Arial, sans-serif;
    }
    .due-modal-close {
      position: absolute;
      top: 18px;
      right: 24px;
      font-size: 1.5rem;
      background: none;
      border: none;
      cursor: pointer;
      color: #333;
    }
    .due-modal-title {
      font-size: 2.1rem;
      font-weight: 700;
      margin-bottom: 0;
      color: #111;
      margin-top: 0;
    }
    .due-modal-sub {
      color: #a58cf5;
      font-size: 1.1rem;
      margin-bottom: 32px;
      margin-top: 8px;
      font-weight: 500;
    }
    .due-modal-row {
      display: flex;
      gap: 32px;
      margin-bottom: 18px;
    }
    .due-modal-col {
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 8px;
    }
    .due-modal-label {
      font-size: 1.1rem;
      font-weight: 600;
      margin-bottom: 4px;
      color: #222;
    }
    .due-modal-input {
      font-size: 1.1rem;
      padding: 12px 10px;
      border-radius: 6px;
      border: 1.2px solid #888;
      font-family: 'Poppins', Arial, sans-serif;
      margin-bottom: 0;
      background: #fff;
      outline: none;
      transition: border 0.13s;
    }
    .due-modal-input:focus {
      border: 1.5px solid #f75bbd;
    }
    .due-modal-checkbox-row {
      margin: 18px 0 0 0;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .due-modal-checkbox-row label {
      color: #7d4ff7;
      font-size: 1.08rem;
      font-weight: 500;
      cursor: pointer;
    }
    .due-modal-divider {
      margin: 38px 0 28px 0;
      border: 0;
      border-top: 1.5px solid #eee;
    }
    .due-modal-options-row {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 10px;
    }
    .due-modal-dot {
      display: inline-block;
      width: 18px;
      height: 18px;
      background: #e0e0e0;
      border-radius: 50%;
      margin-right: 8px;
    }
    .due-modal-options-title {
      font-size: 1.5rem;
      font-weight: 700;
      margin: 0;
      color: #111;
    }
    .due-modal-attempt-label {
      font-size: 1.1rem;
      font-weight: 500;
      margin-bottom: 8px;
      color: #222;
      margin-top: 18px;
    }
    .due-modal-attempt-input {
      width: 320px;
      font-size: 1.1rem;
      padding: 12px 10px;
      border-radius: 6px;
      border: 1.2px solid #888;
      font-family: 'Poppins', Arial, sans-serif;
      margin-bottom: 0;
      background: #fff;
      outline: none;
      transition: border 0.13s;
      display: block;
    }
    .due-modal-attempt-note {
      font-size: 1rem;
      color: #a58cf5;
      margin-top: 6px;
      margin-bottom: 0;
    }
    .due-modal-done-btn {
      background: #4be04b;
      color: #fff;
      border: none;
      border-radius: 8px;
      padding: 12px 38px;
      font-size: 1.15rem;
      font-weight: 700;
      cursor: pointer;
      float: right;
      margin-top: 18px;
      transition: background 0.18s;
      position: absolute;
      right: 48px;
      bottom: 38px;
    }
    .due-modal-done-btn:hover {
      background: #2fc32f;
    }
  </style>
</head>
<body>

  <!-- NAVBAR -->
  <div class="navbar">
    <div class="navbar-logo">
      <a href="<?= base_url('homepage_initial') ?>">
        <img src="<?= base_url('public/img/Logo.png') ?>" alt="logo" class="logo"/>
      </a>
    </div>
    <div class="navbar-center">
    <a href="<?= base_url('/') ?>">HOME</a>
          <a href="<?= base_url('dashboard') ?>">DASHBOARD</a>
       <a href="<?= base_url('aboutus') ?>">ABOUT</a>
        <a href="<?= base_url('allcourses') ?>">COURSES</a>
    </div>
    <div class="navbar-right">
      <input type="text" placeholder="Search.." />
        <button class="publish-button">📄 Publish</button>
      <img src="<?= base_url('public/img/notifications.png') ?>" alt="Notifications" class="icon" />    
      <img src="<?= base_url('public/img/profile.png') ?>" alt="profile" class="profile"/>
    </div>
  </div>
   

  <!-- SUB NAV -->
  <div class="tabbar">
      <a href="<?= base_url('topics') ?>"><span>Topic</span></a>
    <a href="<?= base_url('create_task') ?>"> <span>Task</span></a>
    <a href="<?= base_url('create_quiz') ?>"><span>Quiz</span></a>
   <a href="<?= base_url('studentprog') ?>"> <span>Student</span></a>
  </div>


  <!-- MAIN CONTENT -->
  <div class="main">
    <!-- Left Menu -->
    <div class="left-menu">
      <h4>Quiz Option</h4>
      <div id="showUploadQuizModal" style="cursor:pointer;">Upload Quiz</div>
      <div>Generate AI</div>
    </div>

    <!-- Right Panel -->
    <div class="question-panel">
      <p><strong>1 question</strong> (1 point)</p>

      <div class="question-summary">
        <div class="question-type">1. Multiple Choice</div>
        <div class="question-actions">
          <select>
            <option>1 pt</option>
            <option>2 pt</option>
            <option>3 pt</option>
          </select>
          <button>Edit</button>
          <button>🗑</button>
        </div>
        <h4>Example Question</h4>

        <div class="answer-list">
          <div class="answer wrong">dsfjfhdsjhf</div>
          <div class="answer correct">dfsjfhdsjhf</div>
          <div class="answer wrong">fdsfesfa</div>
          <div class="answer wrong">fdsfesfa</div>
        </div>
      </div>

      <button class="add-question-btn" onclick="window.location.href='<?= base_url('questionsquiz') ?>'">+ Add Question</button>
    </div>
  </div>

  <!-- Upload Quiz Modal -->
  <div class="upload-modal-bg" id="uploadQuizModal">
    <div class="upload-modal">
      <button class="upload-modal-close" id="closeUploadQuizModal">&times;</button>
      <div class="upload-modal-title">Add Content</div>
      <div>
        <label for="quizName" class="upload-modal-label">Quiz Name:</label>
        <input id="quizName" type="text" class="upload-modal-input">
        <span class="upload-modal-clear" onclick="document.getElementById('quizName').value=''">Clear all</span>
      </div>
      <div class="upload-modal-note">
        Accepted formats: PDF, PNG, PPT, SLIDE, JPG, ZIP (Max size: 50MB)
      </div>
      <div class="upload-modal-import">
        <img src="<?= base_url('public/img/image 10.png') ?>" alt="Import" class="upload-modal-import-img">
        <div>
          <div class="upload-modal-import-title">Import your own content</div>
          <div class="upload-modal-import-desc">Import content and get AI generated questions</div>
          <button class="upload-modal-import-btn">Import content</button>
        </div>
      </div>
      <div class="upload-modal-footer">
        <button class="upload-modal-next-btn" id="showDueModal">NEXT</button>
      </div>
    </div>
  </div>

  <!-- Due Date Modal -->
  <div class="due-modal-bg" id="dueModal">
    <div class="due-modal">
      <button class="due-modal-close" id="closeDueModal">&times;</button>
      <div class="due-modal-title">Due date</div>
      <div class="due-modal-sub">Recommended next steps</div>
      <div class="due-modal-row">
        <div class="due-modal-col">
          <label class="due-modal-label">Start date</label>
          <input type="date" class="due-modal-input" />
          <input type="text" class="due-modal-input" />
        </div>
        <div class="due-modal-col">
          <label class="due-modal-label">End date</label>
          <input type="date" class="due-modal-input" />
          <input type="text" class="due-modal-input" />
        </div>
      </div>
      <div class="due-modal-checkbox-row">
        <input type="checkbox" id="allowLate" checked style="accent-color:#7d4ff7; width:18px; height:18px;"/>
        <label for="allowLate">Allow late submission for the following week</label>
      </div>
      <hr class="due-modal-divider" />
      <div class="due-modal-options-row">
        <span class="due-modal-dot"></span>
        <span class="due-modal-options-title">Options</span>
      </div>
      <div class="due-modal-attempt-label">Number of attempts</div>
      <input type="number" min="0" value="0" class="due-modal-attempt-input" />
      <div class="due-modal-attempt-note">Based on best attempt</div>
      <button class="due-modal-done-btn" id="closeDueModalBtn">Done</button>
    </div>
  </div>
  <script>
    // Show modal
    document.getElementById('showUploadQuizModal').onclick = function() {
      document.getElementById('uploadQuizModal').classList.add('active');
    };
    // Hide modal
    document.getElementById('closeUploadQuizModal').onclick = function() {
      document.getElementById('uploadQuizModal').classList.remove('active');
    };
    // Hide modal on outside click
    document.getElementById('uploadQuizModal').onclick = function(e) {
      if (e.target === this) this.classList.remove('active');
    };
    // Optional: ESC key to close
    window.addEventListener('keydown', function(e) {
      if (e.key === "Escape") {
        document.getElementById('uploadQuizModal').classList.remove('active');
        document.getElementById('dueModal').classList.remove('active');
      }
    });

    // Show Due Date Modal
    document.getElementById('showDueModal').onclick = function() {
      document.getElementById('uploadQuizModal').classList.remove('active');
      document.getElementById('dueModal').classList.add('active');
    };
    // Hide Due Date Modal
    document.getElementById('closeDueModal').onclick = function() {
      document.getElementById('dueModal').classList.remove('active');
    };
    document.getElementById('closeDueModalBtn').onclick = function() {
      document.getElementById('dueModal').classList.remove('active');
    };
    // Hide due modal on outside click
    document.getElementById('dueModal').onclick = function(e) {
      if (e.target === this) this.classList.remove('active');
    };
  </script>
</body>
</html>
