<?php
// filepath: c:\xampp\htdocs\CrimsonSkillBoost-Web\app\Views\topics.php
if (!isset($course) || !is_array($course)) {
    echo "<div style='padding:40px;text-align:center;color:#c00;font-size:1.3em;'>No course selected. Please go back to <a href='".base_url('allcourses')."'>All Courses</a>.</div>";
    return;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($course['title']) ?> - Topics</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- Add Google Fonts link for Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', Arial, sans-serif;
            background-color: #fdeef4;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
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
            margin: 0 15px;
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
        .dropbtn {
            font-weight: bold;
            font-size: 1rem;
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
        .navbar-right {
            display: flex;
            align-items: center;
            gap: 14px;
        }
        .navbar-right input[type="text"] {
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-right: 15px;
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
        .navbar-right img.profile {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            object-fit: cover;
        }
        .navbar-right img {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      object-fit: cover;
      cursor: pointer;
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
      padding: 7px 14px;
      border-radius: 6px;
      border: 1.5px solid #ccc;
      font-size: 1rem;
      outline: none;
      margin-right: 0;
      width: 170px;
      box-sizing: border-box;
    }
    .section-title {
      background-color: #e8c6eb;
      text-align: center;
      font-size: 18px;
      font-weight: bold;
      padding: 10px 0;
      margin-bottom: 30px;
    }
    .cards {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      gap: 20px;
      padding: 0 20px 40px;
    }
    .card {
      background-color: white;
      width: 600px;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      overflow: hidden;
      border-top: 6px solid transparent;
      border-image: linear-gradient(to right, #f8228a, #ad9bdc);
      border-image-slice: 1;
    }
    .card-content {
      padding: 20px;
    }
    .card-title {
      font-size: 18px;
      font-weight: bold;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .card-title i {
      font-style: normal;
      font-weight: normal;
      font-size: 14px;
      margin-left: 10px;
      cursor: pointer;
    }
    .card-desc {
      color: #555;
      font-size: 14px;
      margin-top: 5px;
    }
    .card-footer {
      display: flex;
      justify-content: flex-end;
      align-items: center;
      padding: 0 20px 15px;
    }
    .view-btn {
      background-color: #f23eb3;
      color: white;
      border: none;
      padding: 6px 12px;
      border-radius: 6px;
      font-size: 12px;
      cursor: pointer;
      font-weight: bold;
      margin-right: 10px;
    }
    .dots {
      font-size: 20px;
      cursor: pointer;
    }
    .plus-btn {
      position: fixed;
      bottom: 28px;
      right: 28px;
      width: 70px;
      height: 70px;
      border-radius: 50%;
      background: linear-gradient(135deg, #f75bbd 0%, #e8c6eb 100%);
      color: #fff;
      font-size: 2.5rem;
      border: none;
      box-shadow: 0 4px 16px rgba(0,0,0,0.13);
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 101;
      transition: background 0.18s;
    }
    .plus-btn:hover {
      background: linear-gradient(135deg, #e84fa7 0%, #e8c6eb 100%);
    }
    .modal {
      display: none;
      position: fixed;
      z-index: 200;
      left: 0; top: 0;
      width: 100vw; height: 100vh;
      background: rgba(0,0,0,0.0);
      justify-content: flex-start;
      align-items: flex-start;
    }
    .modal.show { display: flex !important; }
    .modal-content {
      position: fixed;
      right: 38px;
      bottom: 110px;
      background: none;
      border: none;
      box-shadow: none;
      padding: 0;
      display: flex;
      flex-direction: column;
      align-items: flex-end;
    }
    .modal-box {
      background: #fbeaf6;
      border-radius: 20px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.18);
      border: 2px solid #bdb0b8;
      overflow: hidden;
      width: 200px;
      display: flex;
      flex-direction: column;
      align-items: stretch;
    }
    .modal-option {
      border: none;
      background: none;
      font-family: 'Poppins', Arial, sans-serif;
      font-size: 1.1rem;
      font-weight: 700;
      padding: 18px 0;
      cursor: pointer;
      width: 100%;
outline-style: solid;
      transition: background 0.13s;
      text-align: center;
      letter-spacing: 0.5px;
      border-radius: 0;
    }
    .modal-option.new-topic {
      background: #f75bbd;
      color: #fff;
      font-weight: 800;
      
      box-shadow: 0 4px 8px rgba(0,0,0,0.10);
      text-shadow: 0 2px 8px rgba(0,0,0,0.13);
      border-bottom: 0;
    }
    .modal-option.upload-topic {
      background: #f75bbd;
     color: #fff;
       
      box-shadow: 0 4px 8px rgba(0,0,0,0.10);
      text-shadow: 0 2px 8px rgba(0,0,0,0.13);
      border-bottom: 0;
    }
    .modal-option:not(:last-child) {
      border-bottom: none;
    }
  
    /* New Topic Modal Styles */
    .new-topic-modal-content {
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 16px rgba(0,0,0,0.10);
      border: none;
      width: 1000px;
      max-width: 1000px;
      margin: 16px auto;
      margin-top: 40px;
      padding: 0 0 32px 0;
      display: flex;
      flex-direction: column;
      position: center;
      min-width: 320px;
      min-height: 320px;
      animation: fadeIn 0.18s;
      z-index: 300;
    }
    .new-topic-modal-header {
      padding: 32px 0 18px 0;
      border-bottom: 2px solid #ececec;
      text-align: center;
    }
    .new-topic-title {
      font-size: 2rem;
      font-weight: 700;
      color: #a7a1a7;
      letter-spacing: 1px;
      font-family: 'Poppins', Arial, sans-serif;
    }
    .new-topic-form {
      display: flex;
      flex-direction: column;
      gap: 18px;
      padding: 32px 36px 0 36px;
    }
    .topic-label {
      font-size: 1.15rem;
      font-weight: 700;
      color: #222;
      margin-bottom: 6px;
      margin-top: 8px;
    }
    .topic-input {
      width: 100%;
      font-size: 1.1rem;
      padding: 12px 10px;
      border: 1px solid #bdbdbd;
      border-radius: 6px;
      font-family: 'Poppins', Arial, sans-serif;
      margin-bottom: 2px;
      background: #fff;
      outline: none;
      transition: border 0.13s;
    }
    .topic-input:focus {
      border: 1.5px solid #f75bbd;
    }
    .topic-hint {
      font-size: 0.95rem;
      color: #b0aeb3;
      margin-bottom: 10px;
      margin-left: 2px;
    }
    .topic-textarea {
      width: 100%;
      font-size: 1.1rem;
      padding: 12px 10px;
      border: 1px solid #bdbdbd;
      border-radius: 6px;
      font-family: 'Poppins', Arial, sans-serif;
      resize: vertical;
      min-height: 120px;
      background: #fff;
      outline: none;
      transition: border 0.13s;
    }
    .topic-textarea:focus {
      border: 1.5px solid #f75bbd;
    }
    .create-topic-btn {
      margin: 24px auto 0 auto;
      background: #f75bbd;
      color: #fff;
      font-size: 1.15rem;
      font-weight: 700;
      border: none;
      border-radius: 7px;
      padding: 12px 38px;
      cursor: pointer;
      transition: background 0.15s;
      box-shadow: 0 2px 8px rgba(247,91,189,0.07);
      font-family: 'Poppins', Arial, sans-serif;
      display: block;
    }
    .create-topic-btn:hover {
      background: #e84fa7;
    }
    /* Upload Topic Modal Styles */
    .upload-topic-modal-content {
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 16px rgba(0,0,0,0.10);
      border: none;
      width: 1000px;
      max-width: 1000px;
      margin: 16px auto;
      margin-top: 40px;
      padding: 0 0 32px 0;
      display: flex;
      flex-direction: column;
      position: center;
      min-width: 320px;
      min-height: 320px;
      animation: fadeIn 0.18s;
      z-index: 300;
    }
    .upload-topic-modal-header {
      padding: 32px 0 18px 0;
      border-bottom: 2px solid #ececec;
      text-align: center;
    }
    .upload-topic-title {
      font-size: 2rem;
      font-weight: 700;
      color: #111;
      letter-spacing: 1px;
      font-family: 'Poppins', Arial, sans-serif;
    }
    .upload-topic-form {
      display: flex;
      flex-direction: column;
      gap: 18px;
      padding: 32px 36px 0 36px;
    }
    .upload-label {
      font-size: 1.15rem;
      font-weight: 700;
      color: #222;
      margin-bottom: 6px;
      margin-top: 8px;
    }
    .upload-input {
      width: 100%;
      font-size: 1.1rem;
      padding: 12px 10px;
      border: 1px solid #bdbdbd;
      border-radius: 6px;
      font-family: 'Poppins', Arial, sans-serif;
      margin-bottom: 2px;
      background: #fff;
      outline: none;
      transition: border 0.13s;
    }
    .upload-hint {
      font-size: 0.95rem;
      color: #b0aeb3;
      margin-bottom: 10px;
      margin-left: 2px;
    }
    .upload-dropzone {
      border: 2px solid #bdbdbd;
      border-radius: 8px;
      background: #fff;
      min-height: 90px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #888;
      font-size: 1.1rem;
      margin-bottom: 8px;
      cursor: pointer;
      transition: border 0.13s, background 0.13s;
      padding: 24px 10px;
      text-align: center;
    }
    .upload-dropzone.dragover {
      border: 2px solid #f75bbd;
      background: #fdeef4;
      color: #d12c5c;
    }
    .upload-create-btn {
      margin: 24px auto 0 auto;
      background: #f75bbd;
      color: #fff;
      font-size: 1.15rem;
      font-weight: 700;
      border: none;
      border-radius: 7px;
      padding: 12px 38px;
      cursor: pointer;
      transition: background 0.15s;
      box-shadow: 0 2px 8px rgba(247,91,189,0.07);
      font-family: 'Poppins', Arial, sans-serif;
      display: block;
    }
    .upload-create-btn:hover {
      background: #e84fa7;
    }
    @media (max-width: 600px) {
      .modal-content { left: 10vw; top: 10vw; }
      .modal-box { width: 90vw; }
    }
    @media (max-width: 700px) {
      .new-topic-modal-content {
        width: 98vw;
        padding: 0 0 12px 0;
        min-width: 0;
      }
      .new-topic-form {
        padding: 12px 4vw 0 4vw;
      }
    }
    @media (max-width: 900px) {
      .new-topic-modal-content {
        max-width: 98vw;
        padding: 0 0 18px 0;
      }
      .new-topic-form {
        padding: 18px 4vw 0 4vw;
      }
      .upload-topic-modal-content {
        max-width: 98vw;
        padding: 0 0 18px 0;
      }
      .upload-topic-form {
        padding: 18px 4vw 0 4vw;
      }
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(40px);}
      to { opacity: 1; transform: none;}
    }
  </style>
</head>
<body>
<!-- Navbar -->
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
        <input class="search-box" type="text" placeholder="Search.." />
        <button onclick="window.location.href='<?= base_url('upload') . '?course_id=' . urlencode($course['id']) ?>'">+ Add Content</button>
        <img src="<?= base_url('public/img/profile.png') ?>" id="navbar-profile-pic" alt="profile" class="profile"/>
    </div>
</div>
<!-- Tabs -->
<div class="tabbar">
    <a href="<?= base_url('topics') . '?course_id=' . urlencode($course['id']) ?>"><span>Topic</span></a>
    <a href="<?= base_url('task_list') . '?course_id=' . urlencode($course['id']) ?>"><span>Task</span></a>
    <a href="<?= base_url('quiz_list') . '?course_id=' . urlencode($course['id']) ?>"><span>Quiz</span></a>
    <a href="<?= base_url('studentprog') . '?course_id=' . urlencode($course['id']) ?>"><span>Student</span></a>
  </div>
  <!-- Section Title -->
  <div class="section-title" id="sectionTitle">
    <?= esc($course['title']) ?> – Core Topics
  </div>
  <!-- Cards -->
  <div class="cards" id="topicsCards">
    <!-- Cards will be rendered by JS -->
</div>
<!-- Plus Button -->
<button class="plus-btn" title="Add Topic" id="openModalBtn">+</button>

<!-- Modal: Add/Upload Options -->
<div id="topicModal" class="modal">
    <div class="modal-content">
      <div class="modal-box">
        <button class="modal-option new-topic" id="showNewTopicModal">New Topic</button>
        <button class="modal-option upload-topic">Upload Topic</button>
      </div>
    </div>
  </div>
  <!-- Modal: New Topic Form -->
  <div id="newTopicModal" class="modal">
    <div class="new-topic-modal-content">
      <div class="new-topic-modal-header">
        <span class="new-topic-title">NEW TOPIC</span>
      </div>
      <form class="new-topic-form">
        <label class="topic-label" for="topicTitle">Topic Title</label>
        <input class="topic-input" id="topicTitle" name="topicTitle" maxlength="32" type="text" autocomplete="off" />
        <div class="topic-hint">The header must contain a maximum of 32 characters</div>
        <label class="topic-label" for="topicDesc">Description</label>
        <textarea class="topic-textarea" id="topicDesc" name="topicDesc" rows="5" placeholder="Enter a description"></textarea>
        <button type="submit" class="create-topic-btn">Create Topic</button>
      </form>
    </div>
  </div>
  <!-- Modal: Upload Topic Form -->
  <div id="uploadTopicModal" class="modal">
    <div class="upload-topic-modal-content">
      <div class="upload-topic-modal-header">
        <span class="upload-topic-title">Upload topic</span>
      </div>
      <form class="upload-topic-form">
        <label class="upload-label" for="uploadTopicTitle">Topic Title</label>
        <input class="upload-input" id="uploadTopicTitle" name="uploadTopicTitle" maxlength="32" type="text" autocomplete="off" />
        <div class="upload-hint">The header must contain a maximum of 32 characters</div>
        <label class="upload-label" for="uploadFiles">Upload Files</label>
        <div class="upload-hint">Accepted format: PDF only (Max size: 20MB)</div>
        <div class="upload-dropzone" id="uploadDropzone">
          Drag PDF files here or click to browse
          <input type="file" id="uploadFiles" name="uploadFiles[]" multiple style="display:none" accept=".pdf" />
        </div>
        <button type="submit" class="upload-create-btn">Create Topic</button>
      </form>
    </div>
  </div>
  <!-- Firebase SDKs -->
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-storage.js"></script>
<script src="<?= base_url('public/js/firebase-config.js') ?>"></script>
<!-- Add PDF.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js"></script>
<script>
firebase.auth().onAuthStateChanged(async function(user) {
  if (user) {
    try {
      const doc = await firebase.firestore().collection("users").doc(user.uid).get();
      if (doc.exists) {
        const data = doc.data();
        const profileImg = document.getElementById("navbar-profile-pic");
        if (profileImg) {
          profileImg.src = data.photoURL || "public/img/profile.png";
        }
      }
    } catch (err) {}
  }
});
    // Modal logic
    const modal = document.getElementById('topicModal');
    const openBtn = document.getElementById('openModalBtn');
    openBtn.onclick = () => { modal.classList.add('show'); };
    const newTopicModal = document.getElementById('newTopicModal');
    const showNewTopicBtn = document.getElementById('showNewTopicModal');
    showNewTopicBtn.onclick = function(e) {
      e.preventDefault();
      modal.classList.remove('show');
      newTopicModal.classList.add('show');
    };
    const uploadTopicModal = document.getElementById('uploadTopicModal');
    const showUploadTopicBtn = document.querySelector('.modal-option.upload-topic');
    showUploadTopicBtn.onclick = function(e) {
      e.preventDefault();
      modal.classList.remove('show');
      uploadTopicModal.classList.add('show');
    };
    // Hide modals on outside click
    window.onclick = function(event) {
      if (event.target === modal) modal.classList.remove('show');
      if (event.target === newTopicModal) newTopicModal.classList.remove('show');
      if (event.target === uploadTopicModal) uploadTopicModal.classList.remove('show');
    };
    // Hide modals on ESC
    window.addEventListener('keydown', function(e) {
      if (e.key === "Escape") {
        modal.classList.remove('show');
        newTopicModal.classList.remove('show');
        uploadTopicModal.classList.remove('show');
      }
    });

    // --- DYNAMIC COURSE NAME AND TOPICS FROM FIREBASE (topics as subcollection) ---
    function truncateText(text, maxLength = 80) {
        if (!text) return '';
        return text.length > maxLength ? text.substring(0, maxLength) + '…' : text;
    }

    function loadTopics() {
        const courseId = "<?= esc($course['id']) ?>";
        const sectionTitle = document.getElementById('sectionTitle');
        const topicsCards = document.getElementById('topicsCards');

        // Fetch course name
        firebase.firestore().collection('courses').doc(courseId).get().then(function(doc) {
            if (doc.exists && doc.data().course_name) {
                sectionTitle.textContent = doc.data().course_name + " – Core Topics";
            }
        });

        // Fetch topics from subcollection
        firebase.firestore().collection('courses').doc(courseId).collection('topics').get()
            .then(function(snapshot) {
                if (snapshot.empty) {
                    topicsCards.innerHTML = "<div style='padding:20px;color:#888;'>No topics found for this course.</div>";
                } else {
                    topicsCards.innerHTML = '';
                    snapshot.forEach(function(doc) {
                        const data = doc.data();
                        const lessonUrl = "<?= base_url('lesson_view') ?>" + "/" + encodeURIComponent(doc.id) + "?course_id=<?= urlencode($course['id']) ?>";
                        // Add data attributes for edit
                        topicsCards.innerHTML += `
                            <div class="card" data-topic-id="${doc.id}" data-title="${encodeURIComponent(data.title || '')}" data-desc="${encodeURIComponent(data.description || '')}">
                                <div class="card-content">
                                    <div class="card-title">
                                      ${data.title || doc.id}
                                      <i class="edit-topic-btn" style="cursor:pointer;" title="Edit" data-topic-id="${doc.id}">✎</i>
                                    </div>
                                    <div class="card-desc">${truncateText(data.description)}</div>
                                </div>
                                <div class="card-footer">
                                    <a href="${lessonUrl}" class="view-btn">View Info</a>
                                    <span class="dots">⋮</span>
                                </div>
                            </div>
                        `;
                    });
                    // Attach edit click handlers after rendering
                    document.querySelectorAll('.edit-topic-btn').forEach(btn => {
                        btn.onclick = function(e) {
                            e.preventDefault();
                            const card = this.closest('.card');
                            const topicId = card.getAttribute('data-topic-id');
                            const title = decodeURIComponent(card.getAttribute('data-title') || '');
                            const desc = decodeURIComponent(card.getAttribute('data-desc') || '');
                            openEditTopicModal(topicId, title, desc);
                        };
                    });
                }
            });
    }

    document.addEventListener("DOMContentLoaded", loadTopics);

    // --- Modal logic for create/edit topic ---
    let editingTopicId = null;

    function openEditTopicModal(topicId, title, desc) {
      editingTopicId = topicId;
      // Open the modal and pre-fill fields
      document.getElementById('topicTitle').value = title || '';
      document.getElementById('topicDesc').value = desc || '';
      document.querySelector('.new-topic-title').textContent = "EDIT TOPIC";
      document.querySelector('.create-topic-btn').textContent = "Save Changes";
      document.getElementById('newTopicModal').classList.add('show');
    }

    // When opening for new topic, reset editing state
    showNewTopicBtn.onclick = function(e) {
      e.preventDefault();
      modal.classList.remove('show');
      editingTopicId = null;
      document.getElementById('topicTitle').value = '';
      document.getElementById('topicDesc').value = '';
      document.querySelector('.new-topic-title').textContent = "NEW TOPIC";
      document.querySelector('.create-topic-btn').textContent = "Create Topic";
      newTopicModal.classList.add('show');
    };

    // --- FIREBASE NEW/EDIT TOPIC LOGIC (add or update subcollection) ---
    document.querySelector('.new-topic-form').onsubmit = function(e) {
      e.preventDefault();
      const topicTitle = document.getElementById('topicTitle').value.trim();
      const topicDesc = document.getElementById('topicDesc').value.trim();
      const courseId = "<?= esc($course['id']) ?>";
      if (!topicTitle) {
        alert("Topic title is required.");
        return;
      }
      const btn = this.querySelector('.create-topic-btn');
      btn.disabled = true;
      btn.textContent = editingTopicId ? "Saving..." : "Saving...";

      firebase.auth().onAuthStateChanged(function(user) {
        if (!user) {
          btn.disabled = false;
          btn.textContent = editingTopicId ? "Save Changes" : "Create Topic";
          alert("You must be logged in to add or edit a topic.");
          return;
        }
        const topicsRef = firebase.firestore().collection('courses').doc(courseId).collection('topics');
        if (editingTopicId) {
          // Edit mode: update existing topic
          topicsRef.doc(editingTopicId).update({
            title: topicTitle,
            description: topicDesc,
            updated_by: user.uid,
            updated_at: firebase.firestore.FieldValue.serverTimestamp()
          })
          .then(function() {
            btn.disabled = false;
            btn.textContent = "Save Changes";
            document.getElementById('newTopicModal').classList.remove('show');
            alert("Topic updated!");
            location.reload();
          })
          .catch(function(error) {
            btn.disabled = false;
            btn.textContent = "Save Changes";
            alert("Failed to update topic: " + error.message);
          });
        } else {
          // Create mode: add new topic
          topicsRef.add({
            title: topicTitle,
            description: topicDesc,
            created_by: user.uid,
            created_at: firebase.firestore.FieldValue.serverTimestamp()
          })
          .then(function() {
            btn.disabled = false;
            btn.textContent = "Create Topic";
            document.getElementById('newTopicModal').classList.remove('show');
            alert("Topic added!");
            location.reload();
          })
          .catch(function(error) {
            btn.disabled = false;
            btn.textContent = "Create Topic";
            if (error.code === "permission-denied") {
              alert("You do not have permission to add topics. Please contact your administrator.");
            } else {
              alert("Failed to add topic: " + error.message);
            }
          });
        }
      });
    };

    // --- UPLOAD TOPIC LOGIC: SIMPLE FILE UPLOAD ---
const uploadForm = document.querySelector('.upload-topic-form');
const uploadTitleInput = document.getElementById('uploadTopicTitle');
const uploadDropzone = document.getElementById('uploadDropzone');
const uploadFileInput = document.getElementById('uploadFiles');

// Remove PDF extraction logic and textarea if present
function clearUploadTextArea() {
  const descArea = document.getElementById('uploadPdfTextArea');
  if (descArea) descArea.remove();
}

// Show selected file names in the dropzone
function showSelectedFileNames() {
  const files = Array.from(uploadFileInput.files);
  if (files.length) {
    // Only show PDF files
    const pdfFiles = files.filter(f => f.type === "application/pdf" || f.name.toLowerCase().endsWith('.pdf'));
    uploadDropzone.textContent = pdfFiles.length
      ? pdfFiles.map(f => f.name).join(', ')
      : "Only PDF files are allowed.";
  } else {
    uploadDropzone.textContent = "Drag PDF files here or click to browse";
  }
}

uploadFileInput.addEventListener('change', function() {
  clearUploadTextArea();
  showSelectedFileNames();
});
uploadDropzone.addEventListener('click', () => uploadFileInput.click());
uploadDropzone.addEventListener('dragover', e => {
  e.preventDefault();
  uploadDropzone.classList.add('dragover');
});
uploadDropzone.addEventListener('dragleave', e => {
  e.preventDefault();
  uploadDropzone.classList.remove('dragover');
});
uploadDropzone.addEventListener('drop', e => {
  e.preventDefault();
  uploadDropzone.classList.remove('dragover');
  uploadFileInput.files = e.dataTransfer.files;
  clearUploadTextArea();
  showSelectedFileNames();
});

// Upload topic form submit: Upload file(s) to Firebase Storage, then save topic
uploadForm.onsubmit = function(e) {
  e.preventDefault();
  const topicTitle = uploadTitleInput.value.trim();
  const files = Array.from(uploadFileInput.files);
  const courseId = "<?= esc($course['id']) ?>";
  if (!topicTitle) {
    alert("Topic title is required.");
    return;
  }
  if (!files.length) {
    alert("Please select at least one PDF file to upload.");
    return;
  }
  // Restrict to PDF only
  for (const file of files) {
    if (file.type !== "application/pdf" && !file.name.toLowerCase().endsWith('.pdf')) {
      alert("Only PDF files are allowed.");
      return;
    }
  }
  const btn = uploadForm.querySelector('.upload-create-btn');
  btn.disabled = true;
  btn.textContent = "Uploading...";

  firebase.auth().onAuthStateChanged(function(user) {
    if (!user) {
      btn.disabled = false;
      btn.textContent = "Create Topic";
      alert("You must be logged in to add a topic.");
      return;
    }
    // Upload all files, collect download URLs
    const storage = firebase.storage();
    const uploadPromises = files.map(file => {
      const storageRef = storage.ref(`courses/${courseId}/topics/${Date.now()}_${file.name}`);
      return storageRef.put(file).then(snapshot => snapshot.ref.getDownloadURL());
    });
    Promise.all(uploadPromises)
      .then(urls => {
        // Build description with links to files
        let desc = urls.map((url, i) => {
          const file = files[i];
          return `<div><a href="${url}" target="_blank">View PDF: ${file.name}</a></div>`;
        }).join('');
        // Save topic to Firestore
        const topicsRef = firebase.firestore().collection('courses').doc(courseId).collection('topics');
        return topicsRef.add({
          title: topicTitle,
          description: desc,
          created_by: user.uid,
          created_at: firebase.firestore.FieldValue.serverTimestamp()
        });
      })
      .then(() => {
        btn.disabled = false;
        btn.textContent = "Create Topic";
        uploadTopicModal.classList.remove('show');
        alert("Topic added!");
        location.reload();
      })
      .catch(error => {
        btn.disabled = false;
        btn.textContent = "Create Topic";
        alert("Failed to upload or add topic: " + error.message);
      });
  });
};
</script>
</body>
</html>