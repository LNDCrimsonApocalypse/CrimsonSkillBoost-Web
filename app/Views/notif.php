<?php
// Remove the first line: cssnotif.html
// Make sure this file is loaded by a CodeIgniter controller, not accessed directly as notif.php
?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Notifications</title>
  <style>
     body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', Arial, sans-serif;
      background-color: #f5ecf2;
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
   .search-box {
      padding: 7px 14px;
      border-radius: 6px;
      border: 1.5px solid #ccc;
      font-size: 1rem;
      outline: none;
      margin-right: 0;
      width: 170px;
      box-sizing: border-box;
    }
   .toolbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 20px;
      border-bottom: 3px solid #e8c8d8;
    }

    .toolbar-left {
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .toolbar-left .checkbox-group {
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .toolbar-left input[type="checkbox"] {
      width: 16px;
      height: 16px;
    }

    .icon {
      font-size: 18px;
      cursor: pointer;
    }

    .toolbar-right {
      display: flex;
      gap: 20px;
      font-size: 18px;
      cursor: pointer;
    }

    .submission-list {
      padding: 0;
      margin: 0;
    }

    .submission-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 15px 20px;
      border-bottom: 1px solid #eee;
    }

    .submission-item:nth-child(odd) {
      background-color: #f3d1e1;
    }

    .submission-item:nth-child(even) {
      background-color: #eaf3f3;
    }

    .submission-left {
      display: flex;
      align-items: center;
      gap: 12px;
      flex: 1;
    }

    .star {
      font-size: 18px;
      cursor: pointer;
    }

    .sender {
      font-weight: bold;
    }

    .label {
      background-color: #d3d3d3;
      color: #333;
      padding: 2px 5px;
      font-size: 12px;
      border-radius: 5px;
    }

    .message {
      font-weight: 500;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      max-width: 300px;
    }

    .time {
      font-size: 13px;
      color: #333;
    }

    .attachment {
      background-color: white;
      border-radius: 20px;
      padding: 6px 12px;
      font-size: 12px;
      color: #333;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      margin-top: 4px;
    }

    .attachment-icon {
      font-size: 14px;
    }

  </style>
</head>
<body>

<header>
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
      <img src="<?= base_url('public/img/notifications.png') ?>" alt="Notifications" class="icon" />    
      <img src="" id="navbar-profile-pic" alt="profile" class="profile"/>
    </div>
  </div>

  <!-- Tab Bar -->
  <div class="tabbar">
    <a href="<?= base_url('topics') ?>"><span>Topic</span></a>
    <a href="<?= base_url('create_task') ?>"> <span>Task</span></a>
    <a href="<?= base_url('create_quiz') ?>"><span>Quiz</span></a>
   <a href="<?= base_url('studentprog') ?>"> <span>Student</span></a>
  </div>

<!-- Toolbar -->
<div class="toolbar">
  <div class="toolbar-left">
    <div class="checkbox-group">
      <input type="checkbox">
      <span class="icon">▾</span>
    </div>
    <span class="icon">⟳</span>
    <span class="icon">⋮</span>
  </div>
  <div class="toolbar-right">
    <span class="icon">◀</span>
    <span class="icon">▶</span>
  </div>
</div>

<!-- Submission List -->
<div class="submission-list" id="submissionList">
  <!-- Ungraded submissions will be loaded here -->
</div>

<!-- List of ungraded submissions -->
<div id="ungraded-list"></div>

<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
<script src="<?= base_url('public/js/firebase-config.js') ?>"></script>
<script>
const db = firebase.firestore();
const currentUserId = window.currentUserId || "<?= isset($userId) ? $userId : '' ?>";

async function loadUngradedSubmissions() {
  const listDiv = document.getElementById('submissionList');
  listDiv.innerHTML = "<div style='color:#888;padding:16px;'>Loading...</div>";
  let items = [];
  let userCache = {};
  try {
    const coursesSnap = await db.collection('courses').get();
    for (const courseDoc of coursesSnap.docs) {
      const courseId = courseDoc.id;
      const tasksSnap = await db.collection('courses').doc(courseId).collection('tasks').get();
      for (const taskDoc of tasksSnap.docs) {
        const taskId = taskDoc.id;
        const taskName = taskDoc.data().title || taskDoc.data().name || taskId;
        const subsSnap = await db.collection('courses').doc(courseId).collection('tasks').doc(taskId)
          .collection('submissions')
          .get();
        for (const subDoc of subsSnap.docs) {
          const sub = subDoc.data();
          if (!sub.gradeName && !sub.gradePoint) {
            let userId = sub.userId || sub.student_id;
            let fullName = 'Unknown';
            if (userId) {
              if (userCache[userId]) {
                fullName = userCache[userId];
              } else {
                // Fetch user fullName from Firestore
                try {
                  const userDoc = await db.collection('users').doc(userId).get();
                  fullName = userDoc.exists ? (userDoc.data().fullName || userId) : userId;
                  userCache[userId] = fullName;
                } catch (err) {
                  fullName = userId;
                }
              }
            }
            items.push({
              studentName: fullName,
              label: 'Inbox',
              message: `${taskName} submitted`,
              time: sub.timestamp ? new Date(sub.timestamp).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'}) : '',
              fileName: sub.file_name || sub.fileName || '',
              fileUrl: sub.file_url || sub.fileUrl || ''
            });
          }
        }
      }
    }
    if (items.length === 0) {
      listDiv.innerHTML = "<div style='color:#888;padding:16px;'>No ungraded submissions 🎉</div>";
    } else {
      let html = '';
      items.forEach(item => {
        html += `
        <div class="submission-item">
          <div class="submission-left">
            <input type="checkbox">
            <span class="star">☆</span>
            <span class="sender">${item.studentName}</span>
            <span class="label">${item.label}</span>
            <span class="message">${item.message}</span>
          </div>
          <div class="time">
            ${item.time}
            ${item.fileName ? `<div class="attachment"><span class="attachment-icon">📎</span><a href="${item.fileUrl}" target="_blank">${item.fileName}</a></div>` : ''}
          </div>
        </div>
        `;
      });
      listDiv.innerHTML = html;
    }
  } catch (e) {
    listDiv.innerHTML = "<div style='color:#c00;padding:16px;'>Error loading submissions.</div>";
  }
}

// Fix profile picture loading
firebase.auth().onAuthStateChanged(async function(user) {
  if (user) {
    try {
      const doc = await firebase.firestore().collection("users").doc(user.uid).get();
      if (doc.exists) {
        const data = doc.data();
        const profileImg = document.getElementById("navbar-profile-pic");
        if (profileImg) {
          profileImg.src = data.photoURL || "<?= base_url('public/img/profile.png') ?>";
        }
      }
    } catch (err) {
      // fallback to default
      const profileImg = document.getElementById("navbar-profile-pic");
      if (profileImg) {
        profileImg.src = "<?= base_url('public/img/profile.png') ?>";
      }
    }
  } else {
    // fallback to default
    const profileImg = document.getElementById("navbar-profile-pic");
    if (profileImg) {
      profileImg.src = "<?= base_url('public/img/profile.png') ?>";
    }
  }
});

document.addEventListener('DOMContentLoaded', loadUngradedSubmissions);
</script>

</body>
</html>