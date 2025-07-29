<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Grade Settings Table</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=DM+Serif+Display&family=Inter:wght@400;500&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      background: #fce6f5;
      font-family: 'Inter', Arial, sans-serif;
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

    /* TABS */
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

  

    /* TABLE */
    .table-container {
      margin: 32px auto 0 auto;
      max-width: 1100px;
      background: #fce6f5;
      border-radius: 12px;
      padding: 20px 0 40px 0;
      overflow-x: auto;
    }
    table {
      width: 98%;
      margin: 0 auto;
      border-collapse: collapse;
      background: #fff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    }
    thead th {
      background: #e5b4d8;
      color: #222;
      font-family: 'Montserrat', Arial, sans-serif;
      font-weight: 700;
      font-size: 1.1rem;
      padding: 16px 12px;
      text-align: left;
      border: none;
    }
    tbody td {
      background: #fff;
      padding: 14px 12px;
      font-size: 1.07rem;
      color: #222;
      border-bottom: 1.5px solid #f3d9e9;
      vertical-align: middle;
    }
    tbody tr:last-child td {
      border-bottom: none;
    }
    /* BUTTONS */
    .action-btn {
      border: none;
      border-radius: 8px;
      padding: 6px 18px 6px 36px;
      font-size: 1rem;
      font-family: 'Montserrat', Arial, sans-serif;
      font-weight: 700;
      color: #fff;
      background: linear-gradient(90deg, #e636a4 0%, #b983ff 100%);
      cursor: pointer;
      margin-right: 8px;
      position: relative;
      transition: background 0.18s, box-shadow 0.18s;
      box-shadow: 0 1px 4px rgba(230,54,164,0.08);
    }
    .action-btn:last-child {
      margin-right: 0;
    }
    .action-btn.edit::before {
      content: '';
      display: inline-block;
      background: url('https://cdn-icons-png.flaticon.com/512/1159/1159633.png') no-repeat center/18px 18px;
      width: 18px;
      height: 18px;
      position: absolute;
      left: 12px;
      top: 50%;
      transform: translateY(-50%);
    }
    .action-btn.delete::before {
      content: '';
      display: inline-block;
      background: url('https://cdn-icons-png.flaticon.com/512/1214/1214428.png') no-repeat center/18px 18px;
      width: 18px;
      height: 18px;
      position: absolute;
      left: 12px;
      top: 50%;
      transform: translateY(-50%);
    }
    .action-btn:hover {
      background: linear-gradient(90deg, #b983ff 0%, #e636a4 100%);
      box-shadow: 0 3px 12px rgba(230,54,164,0.13);
    }
    @media (max-width: 900px) {
      .navbar, .subnav-container {
        flex-direction: column;
        gap: 10px;
        padding: 14px 8px 0 8px;
      }
      .table-container {
        padding: 10px 0 24px 0;
      }
      table {
        font-size: 0.97rem;
      }
      .search-box-container {
        justify-content: center;
      }
    }
    @media (max-width: 600px) {
      .table-container {
        padding: 0;
      }
      table {
        font-size: 0.93rem;
      }
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
 <!-- NAVBAR -->
  <div class="navbar">
    <div class="navbar-logo">
      <img src="imgs/Logo.png" alt="logo" class="logo"/>
    </div>
    <div class="navbar-center">
       <a href="<?= base_url('homepage') ?>" >HOME</a> 
      <a href="<?= base_url('dashboard') ?>">DASHBOARD</a>
      <a href="<?= base_url('aboutus') ?>">ABOUT</a>
      <a href="<?= base_url('allcourses') ?>">COURSES</a>

    </div>
    <div class="navbar-right">
      <input type="text" placeholder="Search.." />
        <img src="imgs/notifications.png" alt="Notifications" class="icon" />
      <a href="<?= base_url('editprofile') ?>">
        <img src="<?= base_url('public/img/profile.png') ?>" alt="profile" class="profile" style="cursor:pointer;" />
      </a>
    </div>
  </div>
<!-- TABS -->
<div class="tabbar">
    <a href="<?= base_url('topics') ?>"><span>Topic</span></a>
    <a href="<?= base_url('create_task') ?>"> <span>Task</span></a>
    <a href="<?= base_url('create_quiz') ?>"><span>Quiz</span></a>
   <a href="<?= base_url('studentprog') ?>"><span>Student</span></a>
    <a href="<?= base_url('gradesettings') ?>">Grade Settings</a>
</div>
  <!-- TABLE -->
  <div class="table-container">
    <table>
      <thead>
        <tr>
          <th>Grade Name</th>
          <th>Grade Point</th>
          <th>Grade Range %</th>
          <th></th>
        </tr>
      </thead>
      <tbody id="gradeSettingsBody">
        <!-- Grade settings will be loaded here -->
      </tbody>
    </table>
  </div>

  <!-- Edit Grade Modal -->
  <div id="editGradeModal" class="modal-overlay" style="display:none;">
    <div class="modal-content">
      <div class="modal-header">
        <span class="modal-title">Edit Grade Setting</span>
        <span class="modal-close" onclick="closeEditGradeModal()">&times;</span>
      </div>
      <form id="editGradeForm" style="margin:0;">
        <div class="modal-body">
          <div class="modal-row">
            <div class="modal-group">
              <label for="editGradeName">Grade Name</label>
              <input type="text" id="editGradeName" required />
            </div>
            <div class="modal-group">
              <label for="editGradePoint">Grade Point</label>
              <input type="number" step="0.01" id="editGradePoint" required />
            </div>
          </div>
          <div class="modal-row">
            <div class="modal-group">
              <label for="editGradeRange">Grade Range % (e.g. 97-100)</label>
              <input type="text" id="editGradeRange" required />
            </div>
          </div>
        </div>
        <div class="modal-actions">
          <button type="submit" class="save-btn">Save</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Add Grade Modal -->
  <div id="addGradeModal" class="modal-overlay" style="display:none;">
    <div class="modal-content">
      <div class="modal-header">
        <span class="modal-title">Add Grade Setting</span>
        <span class="modal-close" onclick="closeAddGradeModal()">&times;</span>
      </div>
      <form id="addGradeForm" style="margin:0;">
        <div class="modal-body">
          <div class="modal-row">
            <div class="modal-group">
              <label for="addGradeName">Grade Name</label>
              <input type="text" id="addGradeName" required />
            </div>
            <div class="modal-group">
              <label for="addGradePoint">Grade Point</label>
              <input type="number" step="0.01" id="addGradePoint" required />
            </div>
          </div>
          <div class="modal-row">
            <div class="modal-group">
              <label for="addGradeRange">Grade Range % (e.g. 97-100)</label>
              <input type="text" id="addGradeRange" required />
            </div>
          </div>
        </div>
        <div class="modal-actions">
          <button type="submit" class="save-btn">Add</button>
        </div>
      </form>
    </div>
  </div>

  <button id="addGradeBtn" class="action-btn" style="margin: 24px 0 0 24px;">+ Add Grade</button>

  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
  <script src="<?= base_url('public/js/firebase-config.js') ?>"></script>
  <script>
    const db = firebase.firestore();
    let editingGradeId = null;

    function loadGradeSettings() {
      const tbody = document.getElementById('gradeSettingsBody');
      tbody.innerHTML = '<tr><td colspan="4">Loading...</td></tr>';
      db.collection('settings').doc('grade_settings').collection('grades').orderBy('grade_point').get()
        .then(snapshot => {
          if (snapshot.empty) {
            tbody.innerHTML = '<tr><td colspan="4" style="color:#888;">No grade settings found.</td></tr>';
            return;
          }
          let html = '';
          snapshot.forEach(doc => {
            const g = doc.data();
            html += `
              <tr>
                <td>${g.grade_name || ''}</td>
                <td>${g.grade_point || ''}</td>
                <td>${g.grade_range || ''}</td>
                <td>
                  <button class="action-btn edit" onclick="openEditGradeModal('${doc.id}', '${g.grade_name || ''}', '${g.grade_point || ''}', '${g.grade_range || ''}')">EDIT</button>
                  <button class="action-btn delete" onclick="deleteGradeSetting('${doc.id}')">DELETE</button>
                </td>
              </tr>
            `;
          });
          tbody.innerHTML = html;
        })
        .catch(err => {
          tbody.innerHTML = `<tr><td colspan="4" style="color:#c00;">Error: ${err.message}</td></tr>`;
        });
    }

    function openEditGradeModal(id, name, point, range) {
      editingGradeId = id;
      document.getElementById('editGradeName').value = name;
      document.getElementById('editGradePoint').value = point;
      document.getElementById('editGradeRange').value = range;
      document.getElementById('editGradeModal').style.display = 'flex';
    }
    function closeEditGradeModal() {
      document.getElementById('editGradeModal').style.display = 'none';
      editingGradeId = null;
    }
    document.getElementById('editGradeForm').onsubmit = async function(e) {
      e.preventDefault();
      if (!editingGradeId) return;
      const name = document.getElementById('editGradeName').value.trim();
      const point = parseFloat(document.getElementById('editGradePoint').value);
      const range = document.getElementById('editGradeRange').value.trim();
      await db.collection('settings').doc('grade_settings').collection('grades').doc(editingGradeId).update({
        grade_name: name,
        grade_point: point,
        grade_range: range
      });
      closeEditGradeModal();
      loadGradeSettings();
    };

    function deleteGradeSetting(id) {
      if (!confirm('Delete this grade setting?')) return;
      db.collection('settings').doc('grade_settings').collection('grades').doc(id).delete().then(loadGradeSettings);
    }

    // Add Grade Modal logic
    function openAddGradeModal() {
      document.getElementById('addGradeName').value = '';
      document.getElementById('addGradePoint').value = '';
      document.getElementById('addGradeRange').value = '';
      document.getElementById('addGradeModal').style.display = 'flex';
    }
    function closeAddGradeModal() {
      document.getElementById('addGradeModal').style.display = 'none';
    }
    document.getElementById('addGradeBtn').onclick = openAddGradeModal;
    document.getElementById('addGradeForm').onsubmit = async function(e) {
      e.preventDefault();
      const name = document.getElementById('addGradeName').value.trim();
      const point = parseFloat(document.getElementById('addGradePoint').value);
      const range = document.getElementById('addGradeRange').value.trim();
      await db.collection('settings').doc('grade_settings').collection('grades').add({
        grade_name: name,
        grade_point: point,
        grade_range: range
      });
      closeAddGradeModal();
      loadGradeSettings();
    };

    // Modal close logic
    document.getElementById('editGradeModal').onclick = function(e) {
      if (e.target === this) closeEditGradeModal();
    };
    document.getElementById('addGradeModal').onclick = function(e) {
      if (e.target === this) closeAddGradeModal();
    };

    document.addEventListener('DOMContentLoaded', loadGradeSettings);
  </script>
</body>
</html>