<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CrimsonSkillBoost - Dashboard</title>
  <style>
  body {
            margin: 0;
            font-family: 'Inter', Arial, sans-serif;
        background: linear-gradient(to right, #f8eaff, #f3d9ff);
            color: #222;
        }

      /* NAVBAR */
     .navbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
        background: #fff;
     padding: 10px 40px;
    }
    .navbar-left {
      display: flex;
      align-items: center;
      gap: 18px;
    }
    .navbar-logo {
      width: 52px;
      height: 52px;
      object-fit: contain;
    }
    .navbar-center {
      display: flex;
      gap: 36px;
      align-items: center;
    }
    
    .navbar-center a {
  
      font-weight: 500;
      font-size: 1.35rem;
      text-decoration: none;
      color: black;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: color 0.2s;
    }
 .navbar-center a:hover {
      color: #ff00aa;
    }
    .navbar-right {
      display: flex;
      align-items: center;
      gap: 22px;
    }
    
    .navbar-left img {
      width: 48px;
      height: 48px;
      object-fit: contain;
    }
    .navbar-center {
      display: flex;
      gap: 36px;
      align-items: center;
    }
    .navbar-center a {
      font-family: 'Montserrat', Arial, sans-serif;
      font-weight: 700;
      font-size: 1.35rem;
      text-decoration: none;
      color: #222;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: color 0.2s;
    }
    .navbar-center a.active {
      color: #222;
      font-weight: 900;
    }
    .navbar-center .dropdown {
      position: relative;
    }
    .navbar-center .dropdown::after {

      font-size: 0.85em;
      vertical-align: middle;
      font-weight: bold;
    }
    .navbar-right {
      display: flex;
      align-items: center;
      gap: 22px;
    }
 .icon {
       width: 48px;
            height: 48px;
            object-fit: cover;
        
    }

    .navbar-profile {
      width: 38px;
      height: 38px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid #eee;
      background: #fff;

    }
        .dropbtn {
  
   font-weight: bold;
  font-size: 1.35rem;
  color: black;
  background: none;
  border: none;
  cursor: pointer;
  
}

.dropdown {
  position: relative;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #EED2EE;
  min-width: 160px;
  padding: 8px;
  box-shadow: 0 8px 16px rgba(0,0,0,0.1);
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.custom-select {
  width: 100%;
  padding:  12px 16px;
  font-size: 1rem;
  font-weight: bold;
  border: 1px solid #ccc;
  border-radius: 6px;
  background-color: white;
  color: black;
  appearance: none; /* Hide default arrow */
  -webkit-appearance: none;
  -moz-appearance: none;
  background-image: url("data:image/svg+xml;utf8,<svg fill='black' height='16' viewBox='0 0 24 24' width='16' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/></svg>");
  background-repeat: no-repeat;
  background-position: right 10px center;
  background-size: 16px;
  cursor: pointer;
}

.custom-select:focus {
  outline: none;
  border-color: #a84d9b;

}

.arrow {
  font-size: 1rem;
  margin-left: 4px;
  vertical-align: middle;
}

li {
  list-style: none;
  margin: 0;
  padding: 0;
}
        .user-img {
            width: 48px;
            height: 48px;
            object-fit: cover;
              border: 2px solid #eee;
      background: #e636a4;
       border-radius: 50%;
        }
        .notif-img {
            width: 48px;
            height: 48px;
            object-fit: cover;
           
        }

    .card {
      max-width: 1200px;
      margin: 40px auto;
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
      padding: 32px 48px;
    }

    .container {
      display: flex;
      gap: 32px;
    }

    .left-panel {
      flex: 2;
    }

    .left-panel h2 {
      font-size: 1.2rem;
      margin-bottom: 18px;
    }

    .course-card, .empty-card {
      display: flex;
      align-items: flex-start;
      background: #fff;
      border-radius: 10px;
      padding: 18px;
      margin-bottom: 18px;
      box-shadow: 0 1px 6px rgba(0,0,0,0.04);
      min-height: 90px;
    }

    .course-img {
      width: 64px;
      height: 64px;
      background: #eee;
      border-radius: 8px;
      margin-right: 18px;
    }

    .course-info h3 {
      margin: 0 0 6px 0;
      font-size: 1.1rem;
      font-weight: bold;
    }

    .course-info p {
      margin: 0 0 10px 0;
      font-size: 0.97rem;
      color: #444;
    }

    .course-info a.btn, .course-info form button {
      padding: 6px 18px;
      border: none;
      background: #e6e6e6;
      border-radius: 6px;
      cursor: pointer;
      font-size: 1rem;
      margin-right: 10px;
    }

    .right-panel {
      flex: 1.2;
      display: flex;
      flex-direction: column;
      gap: 24px;
    }

    .right-panel h2 {
      font-size: 1.5rem;
      font-weight: bold;
      margin-bottom: 12px;
    }

    .enrollment-requests, .recent-submissions {
      background: #f2f7fc;
      border-radius: 10px;
      padding: 18px 16px;
    }

    .request-card {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      background: #fff;
      border-radius: 8px;
      padding: 12px;
      margin-bottom: 12px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.03);
    }

    .request-info strong {
      font-size: 1.1rem;
    }

    .request-info p {
      font-size: 0.97rem;
      margin: 4px 0 0 0;
      color: #444;
    }

    .submission-card {
      display: flex;
      align-items: center;
      background: #fff;
      border-radius: 8px;
      padding: 10px 12px;
      margin-bottom: 10px;
      box-shadow: 0 1px 2px rgba(0,0,0,0.03);
    }

    .submission-icon {
      width: 36px;
      height: 36px;
      background: #e8e1fc;
      color: #7e51e2;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      font-size: 1.1rem;
      margin-right: 14px;
    }

    .grade-btn {
      display: inline-block;
      background: #e636a4;
      color: white;
      padding: 4px 12px;
      border-radius: 4px;
      text-decoration: none;
      font-size: 0.8em;
      margin-left: 10px;
    }

    .grade-btn:hover {
      background: #d62894;
    }

    /* Add these styles to your existing CSS */
    .btn-approve, .btn-reject {
        padding: 6px 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 500;
        font-size: 0.9em;
    }
    
    .btn-approve {
        background: #4CAF50;
        color: white;
    }
    
    .btn-reject {
        background: #f44336;
        color: white;
        margin-left: 8px;
    }

    .request-actions {
        display: flex;
        gap: 8px;
    }

    /* Modal styles */
    .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgb(0,0,0);
      background-color: rgba(0,0,0,0.4);
      padding-top: 60px;
    }

    .modal-content {
      background-color: #fefefe;
      margin: 5% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      max-width: 600px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }

    @media (max-width: 768px) {
      .nav-links {
        flex-direction: column;
        gap: 16px;
      }

      .nav-links li {
        font-size: 1.2rem;
      }

      .card {
        padding: 24px;
      }

      .container {
        flex-direction: column;
        gap: 24px;
      }

      .left-panel, .right-panel {
        flex: 1;
      }

      .course-card, .empty-card {
        flex-direction: column;
        align-items: stretch;
      }

      .course-img {
        width: 100%;
        height: auto;
        margin-bottom: 16px;
      }

      .submission-icon {
        width: 28px;
        height: 28px;
        font-size: 0.9rem;
      }

      .grade-btn {
        padding: 3px 10px;
        font-size: 0.7em;
      }

      .btn-approve, .btn-reject {
        font-size: 0.8em;
      }
    }
  </style>
</head>
<body>
    <!-- NAVBAR -->
  <nav class="navbar">
    <div class="navbar-left">
      <img src="public/img/Logo.png" alt="Logo" />
    </div>
    <div class="navbar-center">
       <a href="<?= base_url('homepage_initial') ?>">HOME</a>
          <a href="<?= base_url('dashboard') ?>">DASHBOARD</a>
       <a href="<?= base_url('aboutus') ?>">ABOUT</a>
         <li class="dropdown">
  <label class="dropbtn" for="course-select">
    COURSES <span class="arrow">▼</span>
  </label>
  <div class="dropdown-content">
    <select id="course-select" class="custom-select">
      <option value="<?= base_url('allcourses') ?>">ALL COURSES</option>
      <option value="<?= base_url('courses') ?>">MY COURSES</option>
    </select>
  </div>
</li>
    </div>
    <div class="navbar-right">
      <img src="public/img/notifications.png" alt="Notifications" class="icon" />
      <a href="<?= base_url('editprofile') ?>">
        <img src="" alt="Profile" class="navbar-profile" />
      </a>
    </div>
  </nav>


  <div class="card">
    <?= csrf_field() ?> <!-- Add this line -->
    <main class="container">
      <section class="left-panel">
        <h2> Available Courses</h2>
        <?php
          // Ensure $courses is always an array
          $courses = isset($courses) && is_array($courses) ? $courses : [];
        ?>
        <?php if (!empty($courses)): ?>
          <?php foreach ($courses as $course): ?>
            <div class="course-card" id="course-<?= $course['id'] ?>">
              <div class="course-img"></div>
              <div class="course-info">
                <h3 class="course-title"><?= esc($course['course_name']) ?></h3>
                <p>Created on <?= isset($row['created_at']) ? $row['created_at'] : 'N/A'; ?></p>
                <a href="<?= base_url('course/view/' . $course['id']) ?>" class="btn">View</a>
                <a href="javascript:void(0)" class="btn" onclick="openEditCourseModal(<?= $course['id'] ?>, '<?= esc(addslashes($course['course_name'])) ?>')">Edit</a>
                <a href="javascript:void(0)" class="btn" onclick="deleteCourse(<?= $course['id'] ?>, this)">Delete</a>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="empty-card">No courses found.</div>
        <?php endif; ?>
      </section>
      <aside class="right-panel">
        <div class="enrollment-requests">
          <h2>Enrollment Requests</h2>
          <div id="enrollment-list">
            <?php
              // Ensure $enrollmentRequests is always an array
              $enrollmentRequests = isset($enrollmentRequests) && is_array($enrollmentRequests) ? $enrollmentRequests : [];
            ?>
            <?php if (!empty($enrollmentRequests)): ?>
              <?php foreach ($enrollmentRequests as $request): ?>
                <div class="request-card" id="request-<?= $request['id'] ?>">
                  <div class="request-info">
                    <strong><?= esc($request['student_name']) ?></strong>
                    <p>Requesting enrollment in <?= esc($request['course_name']) ?> - Section <?= esc($request['section']) ?></p>
                  </div>
                  <div class="request-actions">
                    <button onclick="updateEnrollment(<?= $request['id'] ?>, 'approved')" class="btn-approve">Approve</button>
                    <button onclick="updateEnrollment(<?= $request['id'] ?>, 'rejected')" class="btn-reject">Reject</button>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <p>No pending enrollment requests</p>
            <?php endif; ?>
          </div>
        </div>

        <div class="recent-submissions">
          <h2>Recent Submissions</h2>
          <?php
            // Ensure $submissions is always an array
            $submissions = isset($submissions) && is_array($submissions) ? $submissions : [];
          ?>
          <?php if (!empty($submissions)): ?>
            <?php foreach ($submissions as $submission): ?>
              <div class="submission-card">
                <div class="submission-icon">
                  <?= substr($submission['student_name'], 0, 1) ?>
                </div>
                <div class="submission-details">
                  <strong><?= esc($submission['student_name']) ?></strong>
                  <p><?= esc($submission['task_title']) ?></p>
                  <small><?= date('M d, Y h:i A', strtotime($submission['submitted_at'])) ?></small>
                  <a href="<?= base_url('grading/student/' . $submission['student_id']) ?>" class="grade-btn">Grade</a>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="submission-card">
              <p>No recent submissions</p>
            </div>
          <?php endif; ?>
        </div>
      </aside>
    </main>
  </div>

  <!-- Edit Course Modal -->
  <div id="editCourseModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeEditCourseModal()">&times;</span>
      <h3>Edit Course Name</h3>
      <form id="editCourseForm">
        <input type="hidden" id="editCourseId">
        <input type="text" id="editCourseName" style="width:100%;padding:8px;margin-bottom:16px;" required>
        <div style="text-align:right;">
          <button type="button" onclick="closeEditCourseModal()" style="margin-right:10px;">Cancel</button>
          <button type="submit" class="btn">Save</button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
  <script src="<?= base_url('public/js/firebase-config.js') ?>"></script>
  <script>
    document.getElementById("signOutButton").addEventListener("click", function () {
      firebase.auth().signOut().then(() => {
        window.location.href = "<?= base_url('login') ?>";
      }).catch((error) => {
        alert("Error signing out: " + error.message);
      });
    });

    function updateEnrollment(id, status) {
        if (!confirm(`Are you sure you want to ${status} this enrollment request?`)) {
            return;
        }

        fetch(`<?= site_url('enrollment/update') ?>/${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({
                status: status
            })
        })
        .then(response => response.json())
        .then data => {
            if (data.success) {
                const card = document.getElementById(`request-${id}`);
                if (card) card.remove();
                if (document.querySelectorAll('.request-card').length === 0) {
                    document.getElementById('enrollment-list').innerHTML = '<p>No pending enrollment requests</p>';
                }
                alert(`Enrollment request ${status} successfully`);
            } else {
                throw new Error(data.message || 'Failed to update status');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Failed to update status: ' + error.message);
        });
    }

    // Edit Course Modal Logic
    function openEditCourseModal(id, name) {
      document.getElementById('editCourseId').value = id;
      document.getElementById('editCourseName').value = name;
      document.getElementById('editCourseModal').style.display = 'flex';
    }
    function closeEditCourseModal() {
      document.getElementById('editCourseModal').style.display = 'none';
    }
    document.getElementById('editCourseForm').addEventListener('submit', function(e) {
      e.preventDefault();
      const id = document.getElementById('editCourseId').value;
      const name = document.getElementById('editCourseName').value.trim();
      if (!name) return alert('Course name required');
      fetch('<?= site_url('course/update/') ?>' + id, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
        body: JSON.stringify({ course_name: name })
      })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          // Update title in the list
          const card = document.getElementById('course-' + id);
          if (card) card.querySelector('.course-title').textContent = name;
          closeEditCourseModal();
          alert('Course updated!');
        } else {
          alert(data.message || 'Failed to update course');
        }
      })
      .catch(() => alert('Failed to update course'));
    });

    // Delete Course Logic
    function deleteCourse(id, btn) {
      if (!confirm('Are you sure you want to delete this course?')) return;
      fetch('<?= site_url('course/delete/') ?>' + id, {
        method: 'POST',
        headers: { 'X-Requested-With', 'XMLHttpRequest' }
      })
      .then(res => res.json())
      .then data => {
        if (data.success) {
          // Remove the course card from the DOM
          const card = document.getElementById('course-' + id);
          if (card) card.remove();
          alert('Course deleted!');
        } else {
          alert(data.message || 'Failed to delete course');
        }
      })
      .catch(() => alert('Failed to delete course'));
    }
  </script>
</body>
</html>