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
      /* Remove flex layout to avoid empty left panel issues */
      display: block;
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
      /* Remove flex: 1; */
      width: 100%;
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

    /* Gemini AI Generated Questions Modal */
    .gemini-modal-bg {
      display: none;
      position: fixed;
      z-index: 5000;
      left: 0; top: 0;
      width: 100vw; height: 100vh;
      background: rgba(0,0,0,0.10);
      justify-content: center;
      align-items: center;
    }
    .gemini-modal-bg.active {
      display: flex;
    }
    .gemini-modal {
      background: #fff;
      border-radius: 12px;
      max-width: 700px;
      width: 98vw;
      padding: 36px 32px 32px 32px;
      box-shadow: 0 6px 32px rgba(0,0,0,0.13);
      position: relative;
      font-family: 'Poppins', Arial, sans-serif;
    }
    .gemini-modal-close {
      position: absolute;
      top: 18px;
      right: 24px;
      font-size: 1.5rem;
      background: none;
      border: none;
      cursor: pointer;
      color: #333;
    }
    .gemini-modal-title {
      font-size: 1.6rem;
      font-weight: 700;
      margin-bottom: 8px;
      color: #111;
    }
    .gemini-modal-footer {
      display: flex;
      justify-content: center;
      margin-top: 18px;
    }
    .gemini-modal-save-btn {
      background: linear-gradient(90deg,#4caf50 0%,#8bc34a 100%);
      color: #fff;
      border: none;
      border-radius: 24px;
      padding: 14px 56px;
      font-size: 1.08rem;
      font-weight: 700;
      letter-spacing: 1.2px;
      box-shadow: 0 2px 8px rgba(76,175,80,0.3);
      cursor: pointer;
      margin-top: 8px;
      transition: background 0.18s;
    }
    .gemini-modal-save-btn:disabled {
      opacity: 0.7;
      cursor: not-allowed;
    }

    /* Due Date Modal (copied/adapted from create_task.php) */
    #publishDueDateModal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background: rgba(0,0,0,0.08);
      z-index: 4100;
      justify-content: center;
      align-items: center;
    }
    #publishDueDateModal > div {
      background: #fff;
      border-radius: 14px;
      max-width: 600px;
      width: 95vw;
      padding: 38px 36px 32px 36px;
      box-shadow: 0 6px 32px rgba(0,0,0,0.13);
      position: relative;
    }
    #closePublishDueDateModal {
      position: absolute;
      top: 18px;
      right: 24px;
      font-size: 1.5rem;
      background: none;
      border: none;
      cursor: pointer;
    }
    #publishDueDateModal .due-modal-title {
      font-size: 1.5rem;
      font-weight: 700;
      margin-bottom: 10px;
      color: #111;
    }
    #publishDueDateModal .due-modal-sub {
      color: #a58cf5;
      font-size: 1rem;
      margin-bottom: 18px;
      font-weight: 500;
    }
    #publishDueDateModal .due-modal-row {
      display: flex;
      gap: 24px;
      margin-bottom: 10px;
    }
    #publishDueDateModal .due-modal-col {
      flex: 1;
    }
    #publishDueDateModal .due-modal-label {
      font-size: 1rem;
      font-weight: 500;
      margin-bottom: 6px;
      color: #222;
    }
    #publishDueDateModal .due-modal-input {
      width: 100%;
      font-size: 1rem;
      padding: 8px 10px;
      border-radius: 6px;
      border: 1.2px solid #ccc;
      margin-bottom: 8px;
    }
    #publishDueDateModal #quizAttempts {
      width: 120px;
    }
    #publishDueDateModal .due-modal-checkbox-row {
      margin: 18px 0 0 0;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    #publishDueDateModal .due-modal-checkbox-row label {
      color: #7d4ff7;
      font-size: 1rem;
      font-weight: 500;
      cursor: pointer;
    }
    #publishDueDateModal hr {
      margin: 28px 0 18px 0;
      border: 0;
      border-top: 1.5px solid #eee;
    }
    #publishDueDateModal .due-modal-footer {
      display: flex;
      justify-content: flex-end;
      margin-top: 18px;
    }
    #donePublishDueDateModal {
      background: #4be04b;
      color: #fff;
      border: none;
      border-radius: 8px;
      padding: 10px 32px;
      font-size: 1.1rem;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.18s;
    }
    #donePublishDueDateModal:hover {
      background: #2fc32f;
    }

  </style>
  <script src="https://www.gstatic.com/firebasejs/9.23.0/firebase-app-compat.js"></script>
  <script src="https://www.gstatic.com/firebasejs/9.23.0/firebase-firestore-compat.js"></script>
  <script src="<?= base_url('public/js/firebase-config.js') ?>"></script>
</head>
<body>

  <!-- NAVBAR -->
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
        <button class="publish-button" id="publishQuizBtn">📄 Publish</button>
      <img src="<?= base_url('public/img/notifications.png') ?>" alt="Notifications" class="icon" />    
      <img src="<?= base_url('public/img/profile.png') ?>" alt="profile" class="profile"/>
    </div>
  </div>
   

  <!-- SUB NAV -->
  <div class="tabbar">
      <a href="<?= base_url('topics') . '?course_id=' . urlencode($course_id ?? '') ?>"><span>Topic</span></a>
      <a href="<?= base_url('create_task') ?>"><span>Task</span></a>
      <a href="<?= base_url('quiz_list') . '?course_id=' . urlencode($course_id ?? '') ?>"><span>Quiz</span></a>
      <a href="<?= base_url('studentprog') ?>"><span>Student</span></a>
  </div>


  <!-- MAIN CONTENT -->
  <div class="main">
    <!-- Right Panel -->
    <div class="question-panel">
      <p id="questionCount"><strong>0 question</strong> (0 point)</p>
      <div id="questionList"></div>
      <button class="add-question-btn" id="addQuestionBtn">+ Add Question</button>
      <!-- Add this button to trigger upload modal if needed -->
      <button style="display:none;" id="showUploadQuizModal"></button>
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
          <input type="file" id="importFileInput" accept=".pdf,.txt,.docx,.ppt,.pptx,.jpg,.jpeg,.png,.zip" style="display:none"/>
          <button class="upload-modal-import-btn" id="importContentBtn">Import content</button>
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

  <!-- Gemini AI Generated Questions Modal -->
  <div class="gemini-modal-bg" id="geminiQuestionsModal" style="z-index:5000;">
    <div class="gemini-modal" style="max-width:700px;">
      <button class="gemini-modal-close" id="closeGeminiQuestionsModal">&times;</button>
      <div class="gemini-modal-title">AI Generated Questions</div>
      <div id="geminiQuestionsList" style="max-height:400px;overflow-y:auto;margin-bottom:18px;"></div>
      <div class="gemini-modal-footer">
        <button class="gemini-modal-save-btn" id="saveGeminiQuestionsBtn">Save All to Quiz</button>
      </div>
    </div>
  </div>

  <!-- Due Date Modal (copied/adapted from create_task.php) -->
  <div id="publishDueDateModal" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.08); z-index:4100; justify-content:center; align-items:center;">
    <div style="background:#fff; border-radius:14px; max-width:600px; width:95vw; padding:38px 36px 32px 36px; box-shadow:0 6px 32px rgba(0,0,0,0.13); position:relative;">
      <button id="closePublishDueDateModal" style="position:absolute; top:18px; right:24px; font-size:1.5rem; background:none; border:none; cursor:pointer;">&times;</button>
      <div style="font-size:1.5rem; font-weight:700; margin-bottom:10px;">Due date</div>
      <div style="color:#a58cf5; font-size:1rem; margin-bottom:18px;">Set quiz deadlines before publishing</div>
      <div style="display:flex; gap:24px; margin-bottom:10px;">
        <div style="flex:1;">
          <div style="font-weight:500; margin-bottom:6px;">Start date</div>
          <div style="display:flex; align-items:center;">
            <input type="date" id="quizStartDate" style="width:100%; font-size:1rem; padding:8px 10px; border-radius:6px; border:1.2px solid #ccc; margin-bottom:8px;">
          </div>
        </div>
        <div style="flex:1;">
          <div style="font-weight:500; margin-bottom:6px;">End date</div>
          <div style="display:flex; align-items:center;">
            <input type="date" id="quizEndDate" style="width:100%; font-size:1rem; padding:8px 10px; border-radius:6px; border:1.2px solid #ccc; margin-bottom:8px;">
          </div>
        </div>
      </div>
      <div style="display:flex; gap:24px; margin-bottom:10px;">
        <input type="text" style="flex:1; font-size:1rem; padding:8px 10px; border-radius:6px; border:1.2px solid #ccc;" placeholder="">
        <input type="text" style="flex:1; font-size:1rem; padding:8px 10px; border-radius:6px; border:1.2px solid #ccc;" placeholder="">
      </div>
      <div style="margin-bottom:18px;">
        <label style="display:flex; align-items:center; font-size:1rem; color:#7d4ff7; font-weight:500;">
          <input type="checkbox" id="quizAllowLate" checked style="margin-right:8px;">
          Allow late submission for the following week
        </label>
      </div>
      <hr style="margin:28px 0 18px 0; border:0; border-top:1.5px solid #eee;">
      <div style="display:flex; align-items:center; gap:12px; margin-bottom:10px;">
        <span style="display:inline-block; width:14px; height:14px; background:#e0e0e0; border-radius:50%; margin-right:8px;"></span>
        <span style="font-size:1.25rem; font-weight:700;">Options</span>
      </div>
      <div style="margin-bottom:8px; font-weight:500;">Number of attempts</div>
      <input type="number" min="0" value="0" id="quizAttempts" style="width:120px; font-size:1rem; padding:8px 10px; border-radius:6px; border:1.2px solid #ccc; margin-bottom:4px;">
      <div style="font-size:0.95rem; color:#a58cf5; margin-bottom:18px;">Based on best attempt</div>
      <div style="display:flex; justify-content:flex-end;">
        <button id="donePublishDueDateModal" style="background:#4be04b; color:#fff; border:none; border-radius:8px; padding:10px 32px; font-size:1.1rem; font-weight:600; cursor:pointer;">Done</button>
      </div>
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

    // --- Firestore dynamic question list ---
    // Ensure Firestore is initialized
    if (!firebase.apps.length) {
      firebase.initializeApp(firebaseConfig);
    }
    const dbFS = firebase.firestore();

    function getParam(name) {
      const params = new URLSearchParams(window.location.search);
      return params.get(name) || '';
    }
    const course_id = getParam('course_id') || "<?= isset($course_id) ? $course_id : '' ?>";
    const quiz_id = getParam('quiz_id') || "<?= isset($quiz_id) ? $quiz_id : '' ?>";

    async function renderQuestions() {
      const list = document.getElementById('questionList');
      const count = document.getElementById('questionCount');
      list.innerHTML = '';
      let total = 0, totalPoints = 0;
      if (!quiz_id) {
        count.innerHTML = "<strong>0 question</strong> (0 point)";
        list.innerHTML = "<div style='color:#888;padding:20px;'>No quiz selected.</div>";
        console.warn("Quiz ID is missing.");
        return;
      }
      try {
        const snap = await dbFS.collection('quizzes').doc(quiz_id).collection('questions').get();
        if (snap.empty) {
          count.innerHTML = "<strong>0 question</strong> (0 point)";
          list.innerHTML = "<div style='color:#888;padding:20px;'>No questions found for this quiz.</div>";
          return;
        }
        snap.forEach((doc, idx) => {
          const q = doc.data();
          total++;
          const points = q.points ? parseInt(q.points) : 1;
          totalPoints += points;
          let html = `<div class="question-summary" data-key="${doc.id}">
            <div class="question-type">${idx+1}. Multiple Choice</div>
            <div class="question-actions">
              <select class="point-select">
                <option value="1"${points===1?' selected':''}>1 pt</option>
                <option value="2"${points===2?' selected':''}>2 pt</option>
                <option value="3"${points===3?' selected':''}>3 pt</option>
              </select>
              <button class="edit-btn" data-qid="${doc.id}">Edit</button>
              <button class="delete-btn">🗑</button>
            </div>
            <h4 class="question-text">${q.question}</h4>
            <div class="answer-list">`;
          if (q.options && Array.isArray(q.options)) {
            q.options.forEach((opt, i) => {
              html += `<div class="answer ${i == q.correct_option ? 'correct' : 'wrong'}">${opt}</div>`;
            });
          }
          html += `</div></div>`;
          list.innerHTML += html;
        });
        count.innerHTML = `<strong>${total} question${total !== 1 ? 's' : ''}</strong> (${totalPoints} point${totalPoints !== 1 ? 's' : ''})`;

        // Attach event listeners for edit, delete, and point change
        document.querySelectorAll('.delete-btn').forEach(btn => {
          btn.onclick = async function() {
            const key = this.closest('.question-summary').getAttribute('data-key');
            if (confirm('Delete this question?')) {
              await dbFS.collection('quizzes').doc(quiz_id).collection('questions').doc(key).delete();
              renderQuestions();
            }
          };
        });
        document.querySelectorAll('.edit-btn').forEach(btn => {
          btn.onclick = function() {
            const question_id = this.getAttribute('data-qid');
            // Redirect to questionsquiz with course_id, quiz_id, and question_id
            window.location.href = "<?= base_url('questionsquiz') ?>?course_id=" + course_id + "&quiz_id=" + quiz_id + "&question_id=" + question_id;
          };
        });
        document.querySelectorAll('.point-select').forEach(sel => {
          sel.onchange = async function() {
            const key = this.closest('.question-summary').getAttribute('data-key');
            await dbFS.collection('quizzes').doc(quiz_id).collection('questions').doc(key).update({ points: parseInt(this.value) });
            renderQuestions();
          };
        });
      } catch (err) {
        count.innerHTML = "<strong>0 question</strong> (0 point)";
        list.innerHTML = "<div style='color:#c00;padding:20px;'>Error loading questions: " + err.message + "</div>";
        console.error("Firestore error:", err);
      }
    }

    function loadQuestions() {
      renderQuestions();
    }

    document.getElementById('addQuestionBtn').onclick = function() {
      window.location.href = "<?= base_url('questionsquiz') ?>?course_id=" + course_id + "&quiz_id=" + quiz_id;
    };

    document.addEventListener('DOMContentLoaded', function() {
      loadQuestions();
    });

    // --- Publish Quiz Button ---
    document.getElementById('publishQuizBtn').onclick = async function() {
      if (!course_id || !quiz_id) {
        alert('Missing course or quiz ID.');
        return;
      }
      try {
        await dbFS.collection('quizzes').doc(quiz_id).update({
          published: true,
          published_at: new Date().toISOString()
        });
        alert('Quiz published successfully!');
      } catch (e) {
        alert('Failed to publish quiz: ' + e.message);
      }
    };

    // --- Gemini API Integration for AI-generated questions ---
    let geminiQuestions = [];
    let geminiQuizId = null;

    document.getElementById('importContentBtn').onclick = function() {
      document.getElementById('importFileInput').click();
    };

    document.getElementById('importFileInput').onchange = async function(e) {
      const file = e.target.files[0];
      if (!file) return;
      const btn = document.getElementById('importContentBtn');
      btn.disabled = true;
      btn.textContent = "Uploading...";

      const formData = new FormData();
      formData.append('content_file', file);

      try {
        const resp = await fetch("<?= base_url('quiz/ai_generate') ?>", {
          method: 'POST',
          body: formData
        });
        let data;
        try {
          data = await resp.json();
        } catch (err) {
          btn.disabled = false;
          btn.textContent = "Import content";
          alert("Invalid response from server.");
          return;
        }
        btn.disabled = false;
        btn.textContent = "Import content";
        if (data.success && Array.isArray(data.questions) && data.questions.length > 0) {
          // Show modal with questions
          geminiQuestions = data.questions;
          geminiQuizId = "<?= isset($quiz_id) ? $quiz_id : '' ?>";
          showGeminiQuestionsModal();
        } else if (data.success && data.questions && typeof data.questions === 'string') {
          // Sometimes backend returns a string, try to parse
          try {
            geminiQuestions = JSON.parse(data.questions);
            geminiQuizId = "<?= isset($quiz_id) ? $quiz_id : '' ?>";
            showGeminiQuestionsModal();
          } catch (err) {
            alert("Failed to parse questions from Gemini API.");
          }
        } else {
          alert(data.error || "Failed to generate questions.");
        }
      } catch (err) {
        btn.disabled = false;
        btn.textContent = "Import content";
        alert("Error uploading file: " + err.message);
      }
    };

    // Show Gemini Questions Modal
    function showGeminiQuestionsModal() {
      const modal = document.getElementById('geminiQuestionsModal');
      const list = document.getElementById('geminiQuestionsList');
      if (!geminiQuestions || !geminiQuestions.length) {
        list.innerHTML = "<div style='color:#c00;'>No questions generated.</div>";
        modal.classList.add('active');
        return;
      }
      // Render questions
      list.innerHTML = geminiQuestions.map((q, idx) => `
        <div style="margin-bottom:18px;padding:12px 10px;background:#f8f6ff;border-radius:8px;">
          <div style="font-weight:600;">Q${idx+1}: ${q.question || ''}</div>
          <ul style="margin:8px 0 0 18px;">
            ${(q.options||[]).map((opt,i) => `<li${i==q.correct_option?' style="font-weight:bold;color:#4caf50;"':''}>${opt}</li>`).join('')}
          </ul>
        </div>
      `).join('');
      modal.classList.add('active');
    }

    // Close Gemini Questions Modal
    document.getElementById('closeGeminiQuestionsModal').onclick = function() {
      document.getElementById('geminiQuestionsModal').classList.remove('active');
    };

    // Save all Gemini questions to Firestore
    document.getElementById('saveGeminiQuestionsBtn').onclick = async function() {
      if (!geminiQuizId || !geminiQuestions.length) return;
      const dbFS = firebase.firestore();
      const quizRef = dbFS.collection('quizzes').doc(geminiQuizId).collection('questions');
      let successCount = 0, failCount = 0;
      for (const q of geminiQuestions) {
        // Defensive: ensure required fields
        if (!q.question || !Array.isArray(q.options) || typeof q.correct_option !== 'number') continue;
        try {
          await quizRef.add({
            question: q.question,
            options: q.options,
            correct_option: q.correct_option,
            points: 1
          });
          successCount++;
        } catch (e) {
          failCount++;
        }
      }
      alert(`Saved ${successCount} questions${failCount ? `, ${failCount} failed.` : '.'}`);
      document.getElementById('geminiQuestionsModal').classList.remove('active');
      renderQuestions();
    };

    // --- Publish Quiz Button: show deadline modal first ---
    document.getElementById('publishQuizBtn').onclick = function() {
      // Show the publish due date modal
      document.getElementById('publishDueDateModal').style.display = 'flex';
    };

    // Close modal logic
    document.getElementById('closePublishDueDateModal').onclick = function() {
      document.getElementById('publishDueDateModal').style.display = 'none';
    };
    document.getElementById('publishDueDateModal').onclick = function(e) {
      if (e.target === this) this.style.display = 'none';
    };

    // When "Done" is clicked in the modal, publish the quiz and save deadlines
    document.getElementById('donePublishDueDateModal').onclick = async function() {
      const startDate = document.getElementById('quizStartDate').value;
      const endDate = document.getElementById('quizEndDate').value;
      const attempts = parseInt(document.getElementById('quizAttempts').value, 10) || 0;
      const allowLate = document.getElementById('quizAllowLate').checked;

      if (!startDate || !endDate) {
        alert('Please set both start and end dates.');
        return;
      }
      if (!course_id || !quiz_id) {
        alert('Missing course or quiz ID.');
        return;
      }
      try {
        await dbFS.collection('quizzes').doc(quiz_id).update({
          published: true,
          published_at: new Date().toISOString(),
          start_date: startDate,
          end_date: endDate,
          attempts: attempts,
          allow_late: allowLate
        });
        document.getElementById('publishDueDateModal').style.display = 'none';
        alert('Quiz published successfully!');
        // Redirect to quiz_list with course_id
        window.location.href = "<?= base_url('quiz_list') ?>" + "?course_id=" + encodeURIComponent(course_id);
      } catch (e) {
        alert('Failed to publish quiz: ' + e.message);
      }
    };

  </script>
</body>
</html>
