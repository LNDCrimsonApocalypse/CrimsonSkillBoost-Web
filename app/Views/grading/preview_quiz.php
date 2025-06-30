<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Grading Interface</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
    }
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: #ffebf3;
      color: #333;
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
   
    .search-input {
      padding: 6px 12px;
      border-radius: 6px;
      border: 1px solid #ccc;
      outline: none;
    }
    /* Tabs */
    .tabs {
      display: flex;
      background: #ffeaf6;
      padding: 12px 40px;
      gap: 30px;
      border-bottom: 2px solid #e0cbd6;
    }
    .tabs span {
      font-weight: 600;
      cursor: pointer;
    }
    /* Filters */
    .filters {
      display: flex;
      padding: 20px 40px;
      gap: 20px;
    }
    .filters select {
      padding: 6px 14px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    /* Student Table */
   /* TABLE */
    .table-container {
      margin: 20px 40px;
      background-color: #EED2EE;
      border-radius: 6px;
      overflow-x: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      min-width: 900px;
    }

    thead {
      background-color: #EED2EE;
      font-weight: bold;
    }

    th, td {
      padding: 15px 20px;
      text-align: left;
    }

    td {
      background-color: white;
      vertical-align: middle;
    }

    .student-info {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .student-info img {
      width: 45px;
      height: 45px;
      border-radius: 50%;
    }

    .student-name {
      display: flex;
      flex-direction: column;
    }

    .student-name small {
      font-size: 12px;
      color: gray;
    }

    .task-name {
      font-weight: bold;
    }

    .action-img {
      width: 35px;
      height: 35px;
      border-radius: 50%;
      border: 4px solid white;
      box-shadow: 0 0 0 2px #2196f3;
      object-fit: cover;
      margin-left: 10px;
    }
    /* Questions */
    .question-section {
      display: flex;
      padding: 30px 40px;
      gap: 40px;
    }
    .questions, .comments {
      flex: 1;
    }
    .question-list {
      display: flex;
      flex-direction: column;
      gap: 28px;
    }
    .question-grid {
      display: grid;
      grid-template-columns: 36px 1fr;
      background: #fff;
      border-radius: 8px;
      padding: 18px 18px 18px 0;
      align-items: flex-start;
      box-shadow: 0 2px 8px rgba(0,0,0,0.03);
    }
    .question-radio {
      margin-top: 8px;
      margin-left: 18px;
    }
    .question-content {
      width: 100%;
      display: grid;
      grid-template-rows: 1fr 1fr 1fr;
      grid-template-columns: 1fr 1fr;
      gap: 14px;
      background: none;
    }
    .question-title {
      grid-column: 1 / span 2;
      background: #e9eef6;
      border-radius: 6px;
      padding: 12px 0;
      text-align: center;
      font-weight: 600;
      font-size: 1.15rem;
      color: #555;
    }
    .student-answer {
      background: #e9eef6;
      border-radius: 6px;
      padding: 14px 0;
      text-align: center;
      font-weight: 700;
      font-size: 1.1rem;
      color: #666;
      box-shadow: 0 3px 6px rgba(0,0,0,0.10);
      grid-row: 2;
      grid-column: 1 / span 1;
    }
    .empty-cell {
      background: #e9eef6;
      border-radius: 6px;
      padding: 14px 0;
      grid-row: 2;
      grid-column: 2 / span 1;
    }
    .empty-cell2 {
      background: #e9eef6;
      border-radius: 6px;
      padding: 14px 0;
      grid-row: 3;
      grid-column: 1 / span 2;
    }
     /* FILTERS */
    .filters {
      display: flex;
      gap: 20px;
      padding: 20px 40px;
      background-color: white;
    }

    .filters select {
      padding: 10px 15px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }
    /* Buttons */
    .save-btn {
      background: linear-gradient(90deg, #f23eb3 0%, #cfaaff 100%);
      border: none;
      padding: 12px 32px 12px 44px;
      color: #fff;
      font-weight: 700;
      border-radius: 10px;
      cursor: pointer;
      font-size: 1.1rem;
      box-shadow: 0 2px 8px rgba(242,62,179,0.09);
      position: relative;
      float: none;
      margin-top: 0;
      align-self: flex-end;
      display: flex;
      align-items: center;
      gap: 10px;
      transition: background 0.18s;
    }
    .save-btn::before {
      content: '';
      display: inline-block;
      width: 22px;
      height: 22px;
      background: url('data:image/svg+xml;utf8,<svg fill="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V7zm0 2l3.004 3H17zm-5 12a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm-6-2V5h2v4h8V5h2v10z"/></svg>') no-repeat center center;
      background-size: 22px 22px;
      margin-right: 6px;
    }
    .save-btn:hover {
      background: linear-gradient(90deg, #e85cb7 0%, #b983ff 100%);
    }
    .comments {
      background: #fff3fa;
      border-radius: 12px;
      padding: 28px 24px 36px 24px;
      margin-left: 24px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.03);
      display: flex;
      flex-direction: column;
      align-items: flex-start;
    }
    .comments label {
      font-size: 1.25rem;
      font-weight: 700;
      color: #111;
      margin-bottom: 12px;
      margin-left: 4px;
    }
    .textarea {
      width: 100%;
      min-width: 340px;
      max-width: 100%;
      min-height: 180px;
      max-height: 320px;
      background: #fff;
      border-radius: 8px;
      border: none;
      box-shadow: 0 2px 8px rgba(0,0,0,0.04);
      margin-bottom: 24px;
      font-size: 1.1rem;
      padding: 14px 16px;
      resize: vertical;
      color: #222;
      font-family: 'Poppins', Arial, sans-serif;
    }
    /* Modal Styles */
.modal-overlay {
  position: fixed;
  top: 0; left: 0; right: 0; bottom: 0;
  background: rgba(0,0,0,0.18);
  z-index: 9999;
  display: flex;
  align-items: center;
  justify-content: center;
}
.modal-content {
  background: #fff;
  border-radius: 10px;
  width: 600px;
  max-width: 95vw;
  box-shadow: 0 8px 20px rgba(0,0,0,0.15);
  padding: 0 0 24px 0;
  position: relative;
  animation: fadeIn 0.2s;
}
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(-30px);}
  to { opacity: 1; transform: translateY(0);}
}
.modal-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-bottom: 1px solid #eee;
  padding: 22px 32px 12px 32px;
}
.modal-title {
  font-size: 1.3rem;
  font-weight: 600;
  color: #888;
  letter-spacing: 1px;
}
.modal-close {
  font-size: 1.7rem;
  font-weight: bold;
  color: #888;
  cursor: pointer;
  transition: color 0.18s;
}
.modal-close:hover {
  color: #e636a4;
}
.modal-body {
  padding: 24px 32px 0 32px;
}
.modal-row {
  display: flex;
  gap: 32px;
  margin-bottom: 18px;
}
.modal-group {
  flex: 1;
  display: flex;
  flex-direction: column;
  gap: 7px;
}
.modal-group label {
  font-size: 1rem;
  font-weight: 600;
  color: #222;
}
.modal-group input[type="text"],
.modal-group input[type="date"] {
  padding: 10px 12px;
  font-size: 1rem;
  border: 1px solid #ccc;
  border-radius: 6px;
  background: #fafafa;
}
.modal-actions {
  display: flex;
  justify-content: flex-end;
  padding: 18px 32px 0 32px;
}
.save-btn {
  background: #e636a4;
  color: #fff;
  border: none;
  border-radius: 6px;
  padding: 10px 22px;
  font-size: 1rem;
  font-weight: 600;
  cursor: pointer;
  display: flex;
  align-items: center;
  gap: 8px;
  transition: background 0.18s;
}
.save-btn:hover {
  background: #b983ff;
}
@media (max-width: 700px) {
  .modal-content { width: 98vw; }
  .modal-row { flex-direction: column; gap: 12px; }
  .modal-header, .modal-body, .modal-actions { padding-left: 12px; padding-right: 12px; }
}
  </style>
</head>
<body>
  <!-- Navbar -->
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
      <img src="<?= base_url('public/img/notifications.png') ?>" alt="Notifications" class="icon" />    
      <img src="<?= base_url('public/img/profile.png') ?>" alt="profile" class="profile"/>
    </div>
  </div>

  <!-- Tabs -->
  <div class="tabs">
   <a href="<?= base_url('topics') ?>"><span>Topic</span></a>
    <a href="<?= base_url('create_task') ?>"> <span>Task</span></a>
    <a href="<?= base_url('create_quiz') ?>"><span>Quiz</span></a>
   <a href="<?= base_url('studentprog') ?>"><span>Student</span></a>
    <a href="<?= base_url('gradesettings') ?>">Grade Settings</a>
    <input class="search-input" type="text" placeholder="Search..">
  </div>

  <!-- Filters -->
  <div class="filters">
    <select>
      <option>All Courses</option>
    </select>
    <select>
      <option>Section</option>
    </select>
  </div>

  <div class="table-container">
  <table>
    <thead>
      <tr>
        <th>Student Name</th>
        <th>Quiz Name <span style="font-size: 16px;">⏷</span></th>
        <th>Grade</th>
        <th>Date</th>
        <th>Grade Point</th>
        <th>Total Marks</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <div class="student-info">
            <img src="imgs/img3.png" alt="avatar">
            <div class="student-name">
              Marites Dela Cruz
              <small>Maritesdelacruz@umak.edu.ph</small>
            </div>
          </div>
        </td>
        <td>
          <div class="quiz-name">Quiz 1: Intro to Programming 
            <img src="https://i.imgur.com/VLJgIQD.png" class="action-img" alt="view">
          </div>
        </td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td >_ / _ </td>
        <td class="actions-cell">
 <!-- Place this inside your <td> or relevant cell -->
<div class="action-buttons">
  <button class="edit-btn" title="Edit">
    <!-- Pencil SVG icon -->
    <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
      <rect width="24" height="24" rx="6" fill="#fff"/>
      <path d="M15.232 6.232a2 2 0 0 1 2.828 2.828l-7.5 7.5-3.328.5.5-3.328 7.5-7.5z" stroke="#333" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
  </button>
  <button class="add-btn" title="Add">
    <!-- Plus SVG icon -->
    <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
      <rect width="24" height="24" rx="6" fill="url(#pink-gradient)"/>
      <path d="M12 8v8M8 12h8" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
      <defs>
        <linearGradient id="pink-gradient" x1="0" y1="0" x2="24" y2="24" gradientUnits="userSpaceOnUse">
          <stop stop-color="#e636a4"/>
          <stop offset="1" stop-color="#b983ff"/>
        </linearGradient>
      </defs>
    </svg>
  </button>
</div>

</td>
      </tr>
    </tbody>
  </table>
</div>

<!-- EDIT GRADE MODAL -->
<div id="editGradeModal" class="modal-overlay" style="display:none;">
  <div class="modal-content">
    <div class="modal-header">
      <span class="modal-title">EDIT GRADE</span>
      <span class="modal-close" onclick="closeEditModal()">&times;</span>
    </div>
    <form>
      <div class="modal-body">
        <div class="modal-row">
          <div class="modal-group">
            <label for="grade-name">Grade Name</label>
            <input type="text" id="grade-name" placeholder="Grade Name" />
          </div>
          <div class="modal-group">
            <label for="total-marks">Total Marks</label>
            <input type="text" id="total-marks" placeholder="Total Marks" />
          </div>
        </div>
        <div class="modal-row">
          <div class="modal-group">
            <label for="date">Date</label>
            <input type="date" id="date" placeholder="Filtered Date" />
          </div>
          <div class="modal-group">
            <label for="grade-point">Grade Point</label>
            <input type="text" id="grade-point" placeholder="Grade Point" />
          </div>
        </div>
      </div>
      <div class="modal-actions">
        <button type="button" class="save-btn">
          <img src="https://cdn-icons-png.flaticon.com/512/1828/1828817.png" alt="icon" style="width:18px;height:18px;vertical-align:middle;margin-right:6px;">
          Save Grade
        </button>
      </div>
    </form>
  </div>
</div>


<script>
function openEditModal(title) {
  document.querySelector('#editGradeModal .modal-title').textContent = title;
  document.getElementById('editGradeModal').style.display = 'flex';
}
function closeEditModal() {
  document.getElementById('editGradeModal').style.display = 'none';
}
document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.edit-btn').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      openEditModal('EDIT GRADE');
    });
  });
  document.querySelectorAll('.add-btn').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      openEditModal('ADD GRADE');
    });
  });
});
</script>
  <!-- Question & Comment Section -->
  <div class="question-section">
    <div class="questions">
      <div class="question-list">
        <div class="question-grid">
          <input type="radio" class="question-radio" />
          <div class="question-content">
            <div class="question-title">Question Here</div>
            <div class="student-answer">Student Answer</div>
            <div class="empty-cell"></div>
            <div class="empty-cell2"></div>
          </div>
        </div>
        <div class="question-grid">
          <input type="radio" class="question-radio" />
          <div class="question-content">
            <div class="question-title">Question Here</div>
            <div class="empty-cell"></div>
            <div class="student-answer">Student Answer</div>
            <div class="empty-cell2"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="comments">
      <label for="comment">Comment/ Suggestion:</label>
      <textarea id="comment" class="textarea"></textarea>
      <button class="save-btn">Save Grade</button>
    </div>
  </div>
</body>
</html>
