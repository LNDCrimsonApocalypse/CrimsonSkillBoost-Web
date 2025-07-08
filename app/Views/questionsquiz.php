<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Quiz Builder</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: #ffeeff;
    }

    /* NAVBAR */
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
 .navbar-right button {
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
      .navbar-right button {
      background: #d12c5c;
    }

    /* MAIN */
    .main {
      padding: 40px;
    }

    textarea.question-box {
      width: 100%;
      height: 120px;
      font-size: 1.5rem;
      font-weight: 500;
      border: 1px solid #ccc;
      border-radius: 8px;
      padding: 16px;
      resize: none;
      background: #fff;
      color: #555;
      box-sizing: border-box;
    }

    .options-container {
      display: flex;
      gap: 20px;
      margin-top: 30px;
      flex-wrap: wrap;
    }

    .option-card {
      flex: 1 1 160px;
      min-width: 160px;
      background: #ccc;
      border-radius: 10px;
      color: #fff;
      padding: 20px;
      position: relative;
      font-weight: 500;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100px;
    }

    .option-card .icons {
      position: absolute;
      top: 8px;
      right: 10px;
      font-size: 0.8rem;
    }

    .option-card .radio {
      position: absolute;
      bottom: 8px;
      right: 10px;
    }

    .option-purple { background: #7d259b; }
    .option-blue { background: #a5b8ff; }
    .option-pink { background: #fa6bb2; }
    .option-red { background: #f44336; }

    .add-option {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 36px;
      height: 36px;
      background: #eee;
      border-radius: 6px;
      cursor: pointer;
      font-weight: bold;
    }

    .save-button {
      margin-top: 30px;
      background: #e636a4;
      color: white;
      padding: 12px 28px;
      border: none;
      border-radius: 6px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      float: right;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .save-button:hover {
      background: #cc298f;
    }

    .save-button i {
      font-style: normal;
      font-weight: bold;
    }
  </style>
  <!-- Firebase App (the core Firebase SDK) -->
  <script src="https://www.gstatic.com/firebasejs/9.23.0/firebase-app-compat.js"></script>
  <script src="https://www.gstatic.com/firebasejs/9.23.0/firebase-database-compat.js"></script>
  <script src="https://www.gstatic.com/firebasejs/9.23.0/firebase-firestore-compat.js"></script>
  <script src="<?= base_url('public/js/firebase-config.js') ?>"></script>
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
      <button onclick="window.location.href='<?= base_url('upload') . '?course_id=' . urlencode($course_id ?? '') ?>'">+ Add Content</button>
      <img src="<?= base_url('public/img/notifications.png') ?>" alt="Notifications" class="icon" />    
      <img src="<?= base_url('public/img/profile.png') ?>" alt="profile" class="profile"/>
    </div>
  </div>

  <!-- SUBNAV -->
  <div class="tabbar">
      <a href="<?= base_url('topics') . '?course_id=' . urlencode($course_id ?? '') ?>"><span>Topic</span></a>
      <a href="<?= base_url('create_task') ?>"><span>Task</span></a>
      <a href="<?= base_url('quiz_list') . '?course_id=' . urlencode($course_id ?? '') ?>"><span>Quiz</span></a>
      <a href="<?= base_url('studentprog') ?>"><span>Student</span></a>
  </div>

  <!-- MAIN CONTENT -->
  <div class="main">
    <form id="quizForm">
      <textarea class="question-box" name="question" placeholder="Type question here" required></textarea>
      <div class="options-container" id="optionsContainer">
        <!-- Option templates will be inserted here by JS -->
      </div>
      <input type="hidden" name="correct_option" id="correctOptionInput" value="0">
      <button type="submit" class="save-button"><i>💾</i> Save Question</button>
    </form>
  </div>
  <script>
    // Use the global `firebase` object from firebase-config.js
    const db = firebase.database();

    // --- Option Card Template ---
    function createOptionCard(idx, value = '', isChecked = false) {
      const colors = ['option-purple', 'option-blue', 'option-pink', 'option-red', 'option-purple', 'option-blue'];
      return `
        <div class="option-card ${colors[idx % colors.length]}" data-idx="${idx}">
          <input type="text" name="options[]" value="${value.replace(/"/g, '&quot;')}" placeholder="Type answer option here" required style="background:transparent;border:none;color:#fff;width:80%;font-size:1rem;font-weight:500;outline:none;font-family:'Poppins',sans-serif;">
          <div class="icons">
            <span class="edit" title="Edit" style="cursor:pointer;display:none;">✎</span>
            <span class="delete" title="Delete" style="cursor:pointer;">🗑</span>
          </div>
          <div class="radio">
            <input type="radio" name="correct" value="${idx}" ${isChecked ? 'checked' : ''} style="transform:scale(1.3);"> 
          </div>
        </div>
      `;
    }

    // --- Dynamic Option Logic ---
    const optionsContainer = document.getElementById('optionsContainer');
    let optionCount = 0;
    const minOptions = 2, maxOptions = 4;

    function renderOptions(options = ['', ''], correctIdx = 0) {
      optionsContainer.innerHTML = '';
      options.forEach((val, idx) => {
        optionsContainer.innerHTML += createOptionCard(idx, val, idx === correctIdx);
      });
      if (optionCount < maxOptions) {
        const addBtn = document.createElement('div');
        addBtn.className = 'add-option';
        addBtn.textContent = '+';
        addBtn.onclick = addOption;
        optionsContainer.appendChild(addBtn);
      }
      attachOptionEvents();
    }

    function addOption() {
      if (optionCount < maxOptions) {
        const options = getOptions();
        options.push('');
        renderOptions(options, getCorrectIdx());
      }
    }

    function removeOption(idx) {
      if (optionCount > minOptions) {
        let options = getOptions();
        let correctIdx = getCorrectIdx();
        options.splice(idx, 1);
        if (correctIdx === idx) correctIdx = 0;
        else if (correctIdx > idx) correctIdx--;
        renderOptions(options, correctIdx);
      }
    }

    function getOptions() {
      return Array.from(optionsContainer.querySelectorAll('input[type="text"][name="options[]"]')).map(i => i.value);
    }

    function getCorrectIdx() {
      const radios = optionsContainer.querySelectorAll('input[type="radio"][name="correct"]');
      for (let i = 0; i < radios.length; i++) if (radios[i].checked) return i;
      return 0;
    }

    function attachOptionEvents() {
      optionCount = optionsContainer.querySelectorAll('.option-card').length;
      optionsContainer.querySelectorAll('.option-card').forEach((card, idx) => {
        card.querySelector('.delete').onclick = () => removeOption(idx);
        card.querySelector('input[type="radio"]').onchange = () => {
          document.getElementById('correctOptionInput').value = idx;
        };
      });
      // Set correctOptionInput on load
      document.getElementById('correctOptionInput').value = getCorrectIdx();
    }

    // --- Load question for editing if question_id is present ---
    async function loadQuestionForEdit() {
      const params = new URLSearchParams(window.location.search);
      const course_id = params.get('course_id') || "<?= isset($course_id) ? $course_id : '' ?>";
      const quiz_id = params.get('quiz_id') || "<?= isset($quiz_id) ? $quiz_id : '' ?>";
      const question_id = params.get('question_id');
      if (!quiz_id || !question_id) return;

      const dbFS = firebase.firestore();
      try {
        const doc = await dbFS.collection('quizzes').doc(quiz_id).collection('questions').doc(question_id).get();
        if (doc.exists) {
          const q = doc.data();
          document.querySelector('textarea[name="question"]').value = q.question || '';
          renderOptions(q.options || ['', ''], q.correct_option || 0);
          // Store editing state
          document.getElementById('quizForm').setAttribute('data-editing', '1');
          document.getElementById('quizForm').setAttribute('data-question-id', question_id);
        }
      } catch (e) {
        alert('Failed to load question for editing: ' + e.message);
      }
    }

    // --- Initial Render ---
    renderOptions();
    loadQuestionForEdit();

    // --- On Form Submit, save to Firestore (add or update) ---
    document.getElementById('quizForm').onsubmit = async function(e) {
      e.preventDefault();
      const question = document.querySelector('textarea[name="question"]').value.trim();
      const options = getOptions();
      const correctIdx = getCorrectIdx();
      const correct_option = correctIdx;
      const params = new URLSearchParams(window.location.search);
      const course_id = params.get('course_id') || "<?= isset($course_id) ? $course_id : '' ?>";
      const quiz_id = params.get('quiz_id') || "<?= isset($quiz_id) ? $quiz_id : '' ?>";
      const question_id = params.get('question_id');
      if (!question || options.length < 2 || !course_id || !quiz_id) {
        alert('Please fill all fields and ensure at least 2 options.');
        return false;
      }
      const questionData = {
        question,
        options,
        correct_option
      };
      try {
        const dbFS = firebase.firestore();
        if (question_id) {
          // Update existing question
          await dbFS.collection('quizzes').doc(quiz_id).collection('questions').doc(question_id).update(questionData);
        } else {
          // Add new question
          await dbFS.collection('quizzes').doc(quiz_id).collection('questions').add(questionData);
        }
        // Redirect to questionsquiz2 with course_id and quiz_id
        window.location.href = "<?= base_url('questionsquiz2') ?>?course_id=" + course_id + "&quiz_id=" + quiz_id;
      } catch (err) {
        alert('Failed to save question: ' + err.message);
      }
      return false;
    };
  </script>
</body>
</html>
