<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Student Task Review</title>
  <!-- Add Poppins font from Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', 'Segoe UI', sans-serif;
      background-color: #fbeef6;
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
    .search-box {
      display: flex;
      align-items: center;
      border: 1px solid #ccc;
      border-radius: 6px;
      padding: 5px 10px;
    }

    .search-box input {
      border: none;
      outline: none;
      padding: 5px;
      font-family: 'Poppins', 'Segoe UI', sans-serif;
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

    /* PREVIEW / COMMENT SECTION */
    .bottom-section {
      display: flex;
      padding: 20px 40px;
      gap: 20px;
    }

    .preview-box, .comment-box {
      background-color: white;
      border: 2px dashed #ccc;
      border-radius: 6px;
      padding: 15px;
      flex: 1;
      min-height: 300px;
    }

    .comment-box {
      max-width: 400px;
    }

    .section-title {
      font-weight: bold;
      font-size: 18px;
      margin-bottom: 10px;
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
        .action-buttons {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 10px;
}

.edit-btn, .add-btn {
  width: 38px;
  height: 38px;
  border: none;
  border-radius: 8px;
  background: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 1px 4px rgba(0,0,0,0.06);
  cursor: pointer;
  transition: box-shadow 0.18s, transform 0.18s;
  padding: 0;
}

.edit-btn:hover, .add-btn:hover {
  box-shadow: 0 2px 8px rgba(230,54,164,0.18);
  transform: translateY(-2px) scale(1.05);
}

.add-btn svg rect {
  /* Ensure the gradient background for the add button */
  stroke: #fff;
  stroke-width: 0;
}
 .submenu {
      display: flex;
      justify-content: center;
      background: white;
      border-bottom: 1px solid #ccc;
    }
    .submenu a {
      padding: 15px 20px;
      text-decoration: none;
      color: black;
      font-weight: 500;
    }
    .submenu a.active {
      color: black;
      border-bottom: 2px solid black;
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
      <img src="<?= base_url('public/img/notifications.png') ?>" alt="Notifications" class="icon" />    
      <img src="<?= base_url('public/img/profile.png') ?>" alt="profile" class="profile"/>
    </div>
  </div>

<div class="submenu">
    <a href="<?= base_url('topics') ?>"><span>Topic</span></a>
    <a href="<?= base_url('create_task') ?>"> <span>Task</span></a>
    <a href="<?= base_url('create_quiz') ?>"><span>Quiz</span></a>
   <a href="<?= base_url('studentprog') ?>"><span>Student</span></a>
    <a href="<?= base_url('gradesettings') ?>">Grade Settings</a>
  </div>

<!-- FILTERS -->
<div class="filters">
  <select>
    <option>Course</option>
  </select>
  <select>
    <option>Section</option>
  </select>
  <select>
    <option>Category</option>
  </select>
</div>

<!-- TABLE -->
<div class="table-container">
  <table>
    <thead>
      <tr>
        <th>Student Name</th>
        <th>Task Name <span style="font-size: 16px;">⏷</span></th>
        <th>Grade Name</th>
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
              <small>Juandelacruz@umak.edu.ph</small>
            </div>
          </div>
        </td>
        <td>
          <div class="task-name">Task 1: Intro to Programming 
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

<!-- PREVIEW AND COMMENT -->
<div class="bottom-section">
  <div class="preview-box">
    <div class="section-title">Preview</div>
  </div>
  <div class="comment-box">
    <div class="section-title">Comment/ Suggestion:</div>
    <form id="commentForm">
      <textarea name="comment" rows="6" style="width:100%;resize:vertical;border-radius:6px;border:1px solid #ccc;padding:10px;font-family:'Poppins','Segoe UI',sans-serif;" placeholder="Write your comment or suggestion here..."></textarea>
      <button type="submit" style="margin-top:10px;background:#e636a4;color:#fff;border:none;border-radius:6px;padding:8px 18px;font-weight:600;cursor:pointer;">Submit</button>
    </form>
  </div>
</div>

</body>
</html>