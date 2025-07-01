<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Computer Programming 1 - Core Topics</title>
  <!-- Add Google Fonts link for Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', Arial, sans-serif;
      margin: 0;
      background: #FFF4F9;
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
      display: flex;
      align-items: center;
      gap: 14px;
    }
        .navbar-right img {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      object-fit: cover;
      cursor: pointer;
    }

    .search-box {
      padding: 6px 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 1rem;
      width: 160px;
    }

    .navbar-right button {
      background: #d12c5c;
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: bold;
      padding: 8px 22px;
      cursor: pointer;
    }
    .navbar-right button:hover {
      background: #b11f4c;
    }

    .navbar-right img.profile {
      width: 35px;
      height: 35px;
      border-radius: 50%;
      object-fit: cover;
    }

       .dropbtn {
   font-weight: bold;
  font-size: 1.35rem;
  color: black;
  background: none;
  border: none;
  cursor: pointer;
     margin: 0 15px;
  
}
 .dropbtn :hover {
   color: #ff00aa;
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
    /* Tabs */
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
      padding: 7px 14px;
      border-radius: 6px;
      border: 1.5px solid #ccc;
      font-size: 1rem;
      outline: none;
      margin-right: 0;
      width: 170px;
      box-sizing: border-box;
    }

    /* Page Title */
    .title-bar {
      padding: 10px 0;
      background-color: #f3d3f5;
      font-size: 18px;
      font-weight: 600;
      text-align: center;
    }

    /* Main Content */
    .content {
      display: flex;
      gap: 30px;
      padding: 30px 40px;
    }

    .left {
      width: 40%;
    }

    .section-title {
      font-size: 18px;
      font-weight: bold;
      background-color: #fff;
      padding: 12px;
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .left ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .left li {
      background-color: #eef3fb;
      margin-bottom: 10px;
      padding: 12px 15px;
      border-radius: 8px;
      cursor: pointer;
      font-size: 14px;
    }

    .right {
      width: 60%;
      background-color: white;
      border-radius: 10px;
      padding: 25px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      font-size: 14px;
      line-height: 1.6;
    }

    .search-bar {
      display: flex;
      align-items: center;
      margin-left: auto;
      margin-right: 20px;
    }

    .search-bar input {
      padding: 7px 12px;
      border-radius: 8px;
      border: 1px solid #ccc;
      margin-right: 10px;
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
      <a href="<?= base_url('homepage') ?>">HOME</a>
          <a href="<?= base_url('dashboard') ?>">DASHBOARD</a>
       <a href="<?= base_url('aboutus') ?>">ABOUT</a>
        <a href="<?= base_url('allcourses') ?>">COURSES</a>
     
    </div>
   <div class="navbar-right">
      <input class="search-box" type="text" placeholder="Search.." />
      <button id="openModalBtn">+ Add Content</button>
      <img src="<?= base_url('public/img/profile.png') ?>" alt="profile" class="profile"/>
    </div>
  </div>

  <!-- Tabs -->
  <div class="tabbar">
     <a href="<?= base_url('topics') ?>"><span>Topic</span></a>
    <a href="<?= base_url('create_task') ?>"> <span>Task</span></a>
    <a href="<?= base_url('create_quiz') ?>"><span>Quiz</span></a>
     <a href="<?= base_url('studentprog') ?>"><span>Student</span></a>
  </div>

  <!-- Page Title -->
  <div class="title-bar" id="courseTitleBar">
    <!-- Will be set by JS -->
  </div>

  <!-- Main Content -->
  <div class="content">
    <div class="left">
      <div class="section-title" id="topicTitle">
        <!-- Will be set by JS -->
      </div>
      <ul id="subtopicsList">
        <!-- Subtopics will be rendered by JS if detected -->
      </ul>
    </div>
    <div class="right" id="topicDescription">
      <!-- Will be set by JS -->
    </div>
  </div>

  <!-- Firebase SDKs -->
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
  <script src="<?= base_url('public/js/firebase-config.js') ?>"></script>
  <script>
    // Get topicId from URL (last segment)
    function getTopicIdFromUrl() {
      const parts = window.location.pathname.split('/');
      return parts[parts.length - 1];
    }

    // Parse description into subtopics if format matches
    function parseSubtopics(description) {
      if (!description) return null;
      // Split by double newlines or \n\n, or by a blank line
      const blocks = description.split(/\r?\n\r?\n/);
      let subtopics = [];
      for (let i = 0; i < blocks.length; i++) {
        // Each block may contain a title and info
        const lines = blocks[i].split(/\r?\n/).filter(Boolean);
        if (lines.length >= 2) {
          // First line is title, rest is info
          subtopics.push({
            title: lines[0],
            info: lines.slice(1).join(' ')
          });
        }
      }
      // Only return if at least one subtopic found
      return subtopics.length > 0 ? subtopics : null;
    }

    document.addEventListener("DOMContentLoaded", function() {
      const topicId = getTopicIdFromUrl();
      const db = firebase.firestore();

      db.collection('courses').get().then(courseSnap => {
        let found = false;
        courseSnap.forEach(courseDoc => {
          if (found) return;
          db.collection('courses').doc(courseDoc.id).collection('topics').doc(topicId).get().then(topicDoc => {
            if (topicDoc.exists && !found) {
              found = true;
              const topic = topicDoc.data();
              document.getElementById('topicTitle').textContent = topic.title || topicId;
              const courseName = courseDoc.data().course_name || 'Course';
              document.getElementById('courseTitleBar').textContent = courseName + " – Core Topics";

              // --- Subtopic parsing logic ---
              const desc = topic.description || '';
              const subtopics = parseSubtopics(desc);

              if (subtopics) {
                // Render subtopics in the left panel
                const ul = document.getElementById('subtopicsList');
                ul.innerHTML = '';
                subtopics.forEach((st, idx) => {
                  const li = document.createElement('li');
                  li.innerHTML = `<b>${st.title}</b>`;
                  li.style.cursor = "pointer";
                  li.onclick = function() {
                    // Show only this subtopic's info in the right panel
                    document.getElementById('topicDescription').innerHTML =
                      `<div style="margin-bottom:24px;"><b>${st.title}</b><br>${st.info}</div>`;
                    // Highlight selected
                    Array.from(ul.children).forEach(child => child.style.background = "#eef3fb");
                    li.style.background = "#fff";
                  };
                  // First subtopic is selected by default
                  if (idx === 0) {
                    setTimeout(() => li.onclick(), 0);
                  }
                  ul.appendChild(li);
                });
              } else {
                // No subtopics, show the whole description in the right panel
                document.getElementById('subtopicsList').innerHTML = '';
                document.getElementById('topicDescription').textContent = desc;
              }
            }
          });
        });
      });
    });
  </script>
</body>
</html>