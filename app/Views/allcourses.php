<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Courses Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
 <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      background: #ffeaf6;
        font-family: 'Poppins', 'Segoe UI', sans-serif;
    }
   /* NAVBAR */
    .navbar {
      
      display: flex;
      align-items: center;
      justify-content: space-between;
     padding: 10px 40px;
      background: #fff;
    }
    .navbar-left img {
      width: 56px;
      height: 56px;
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
      font-size: 1.3rem;
      text-decoration: none;
      color: black;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: color 0.2s;
    }
    .navbar-center a.active {
      color: #000;
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
      width: 48px;
      height: 48px;
      border-radius: 50%;
      object-fit: cover;
      border: none;
      background: #fff;
    }
    
    /* MAIN AREA */
    .main-bg {
      background: #ffeaf6;
      min-height: 100vh;
      padding: 32px 0;
    }
    .card-container {
      max-width: 1400px;
      margin: 0 auto;
      padding: 0 18px;
    }
    .courses-card {
      background: #fff;
      border-radius: 4px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.09);
      padding: 26px 28px 30px 28px;
      min-width: 340px;
      margin-top: 18px;
    }
    .courses-title {
      font-family: 'Montserrat', Arial, sans-serif;
      font-size: 1.35rem;
      font-weight: 700;
      margin-bottom: 18px;
      color: #222;
      letter-spacing: 1px;
    }
    .courses-toolbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 8px;
      flex-wrap: wrap;
      gap: 16px;
    }
    .dropdown-select {
      padding: 7px 18px 7px 12px;
      border-radius: 5px;
      border: 1.5px solid #ccc;
      font-size: 1rem;
      background: #fff;
      cursor: pointer;
      font-family: 'Inter', Arial, sans-serif;
      font-weight: 500;
      min-width: 130px;
    }
    .search-add-group {
      display: flex;
      align-items: center;
      gap: 12px;
      float: right;
      margin-left: auto;
    }
    .search-box {
      padding: 7px 14px;
      border-radius: 6px;
      border: 1.5px solid #ccc;
      font-size: 1rem;
      outline: none;
      width: 180px;
      box-sizing: border-box;
      font-family: 'Inter', Arial, sans-serif;
     
    }
    .add-btn {
      background: #e636a4;
      color: #fff;
      border: none;
      border-radius: 6px;
      font-size: 1rem;
      font-weight: 700;
      padding: 7px 20px;
      cursor: pointer;
      transition: background 0.2s;
      
    }
    .add-btn:hover {
      background: #c92c8e;
    }
    @media (max-width: 900px) {
      .navbar {
        flex-direction: column;
        gap: 12px;
        padding: 18px 10px 0 10px;
      }
      .card-container {
        padding: 0 4vw;
      }
      .courses-card {
        padding: 18px 8px 20px 8px;
      }
      .courses-toolbar {
        flex-direction: column;
        gap: 12px;
        align-items: stretch;
      }
      .search-add-group {
        flex-direction: column;
        gap: 10px;
        align-items: stretch;
      }
    }
     
/*COURSE CARDS */
.card {
  width: 350px;
  border-radius: 12px;
  overflow: hidden;
  background: #f8d1d8;
  box-shadow: 0 2px 12px rgba(0,0,0,0.13);
  font-family: 'Segoe UI', Arial, sans-serif;
  margin: 20px 0; /* Only vertical margin */
  
}
.cards-container {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  justify-content: flex-start;
  margin-top: 50px;
  margin-left: 80px;
  padding: 0 20px;
}
.card-image img {
  width: 100%;
  height: 120px;
  object-fit: cover;
  display: block;
}

.card-content {
  padding: 18px 20px 14px 20px;
  background: #f8d1d8;
}

.card-label {
  font-size: 0.85rem;
  color: #7c7c7c;
  letter-spacing: 1px;
  margin-bottom: 8px;
  font-weight: 600;
}

.card-title {
  font-size: 1.25rem;
  font-weight: 600;
  margin-bottom: 4px;
  color: #222;
}

.card-subtitle {
  font-size: 1rem;
  color: #a2a2a2;
  margin-bottom: 18px;
}

.card-footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.card-students {
  font-size: 0.95rem;
  color: #222;
  display: flex;
  align-items: center;
}

.card-students i {
  margin-right: 6px;
  font-size: 1.1em;
}

.card-btn {
  background: #e754a2;
  color: #fff;
  border: none;
  border-radius: 16px;
  padding: 6px 18px;
  font-size: 0.95rem;
  cursor: pointer;
  transition: background 0.2s;
}

.card-btn:hover {
  background: #c63d8e;
}

          /* MODAL OVERLAY */
    .modal-overlay {
      display: none;
      position: fixed;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(0,0,0,0.18);
      z-index: 1000;
      justify-content: center;
      align-items: center;
    }
    .modal-overlay.active {
      display: flex;
    }
    /* MODAL CONTENT */
    .modal-content {
      background: #fff;
      border-radius: 8px;
      max-width: 900px;
      width: 90vw;
      padding: 0 0 32px 0;
      box-shadow: 0 6px 32px rgba(0,0,0,0.11);
      position: relative;
      animation: fadeIn 0.25s;
    }
    @keyframes fadeIn {
      from { transform: translateY(-30px); opacity: 0; }
      to   { transform: translateY(0); opacity: 1; }
    }
    .modal-header {
      border-bottom: 2px solid #eee;
      padding: 22px 0 12px 0;
      text-align: center;
      font-family: 'Montserrat', Arial, sans-serif;
      font-size: 1.7rem;
      font-weight: 700;
      letter-spacing: 1px;
      color: #444;
      position: relative;
    }
    .modal-close {
      position: absolute;
      right: 30px;
      top: 18px;
      font-size: 2rem;
      color: #888;
      cursor: pointer;
      background: none;
      border: none;
      transition: color 0.2s;
    }
    .modal-close:hover {
      color: #e636a4;
    }
    .modal-body {
      display: flex;
      gap: 34px;
      padding: 30px 38px 0 38px;
      justify-content: center;
      align-items: flex-start;
    }
    .modal-col {
      flex: 1;
      min-width: 260px;
      border: 1.5px solid #bbb;
      border-radius: 0 0 8px 8px;
      padding: 0 0 16px 0;
      background: #fff;
      min-height: 260px;
      overflow: hidden;
    }
    .modal-col-header {
      background: #eec8e6;
      color: #222;
      font-family: 'Montserrat', Arial, sans-serif;
      font-weight: 700;
      font-size: 1.05rem;
      padding: 8px 0 8px 16px;
      border-bottom: 1.5px solid #bbb;
      letter-spacing: 1px;
    }
    .modal-col-content {
      padding: 18px 28px 0 28px;
      display: flex;
      flex-direction: column;
      gap: 16px;
    }
    /* Radio groups */
    .radio-group {
      display: flex;
      gap: 18px;
      align-items: flex-start;
      margin-bottom: 8px;
    }
    .radio-group label {
      font-size: 1rem;
      color: #222;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 6px;
    }
    .modal-footer {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 32px;
    }
    .modal-add-btn {
      background: linear-gradient(90deg, #e636a4 0%, #b983ff 100%);
      color: #fff;
      border: none;
      border-radius: 20px;
      font-size: 1.1rem;
      font-weight: 700;
      padding: 10px 48px;
      cursor: pointer;
      letter-spacing: 1.5px;
      transition: background 0.2s, box-shadow 0.2s;
      box-shadow: 0 2px 8px rgba(230,54,164,0.08);
    }
    .modal-add-btn:hover {
      background: linear-gradient(90deg, #c92c8e 0%, #7f53ac 100%);
      box-shadow: 0 4px 20px rgba(230,54,164,0.14);
    }
    @media (max-width: 900px) {
      .modal-content {
        max-width: 98vw;
      }
      .modal-body {
        flex-direction: column;
        gap: 18px;
        padding: 20px 8vw 0 8vw;
      }
      .modal-col {
        min-width: 0;
      }
    }
    @media (max-width: 600px) {
      .modal-body {
        padding: 12px 2vw 0 2vw;
      }
      .modal-header {
        font-size: 1.2rem;
      }
    }
  </style>
</head>
<body>
  <!-- NAVBAR -->
  <nav class="navbar">
    <div class="navbar-left">
      <img src="public/img/logo.png" alt="Logo" />
    </div>
    <div class="navbar-center">
     <a href="<?= base_url('/') ?>">HOME</a>
      <a href="<?= base_url('dashboard') ?>">DASHBOARD</a>
      <a href="<?= base_url('aboutus') ?>">ABOUT</a>
      <a href="<?= base_url('aboutus') ?>">COURSES</a>
    </div>
    <div class="navbar-right">
    <img src="public/img/notifications.png" alt="Notifications" class="icon" />
      <img src="imgs/profile.png" alt="Profile" class="navbar-profile" />
    </div>
  </nav>
  <!-- MAIN AREA -->
  <div class="main-bg">
    <div class="card-container">
      <div class="courses-card">
        <div class="courses-title">COURSES</div>
        <div class="courses-toolbar">
          <select id="courseFilter" class="dropdown-select" onchange="filterCourses()">
  <option value="all">All Category</option>
  <option value="active">Active</option>
  <option value="inactive">Inactive</option>
</select>
          </div>
          <div class="search-add-group">
            <input class="search-box" type="text" placeholder="Search.." />
            <button class="add-btn" id="openModalBtn">+ Add Courses</button>
          </div>
  
    <div class="cards-container">
  <div class="card" data-status="active">
    <div class="card-image">
      <img src="cp1.jpg" alt="Computer Programming 1">
    </div>
    <div class="card-content">
      <div class="card-label">COMPROG1</div>
      <div class="card-title">Computer Programming 1</div>
      <div class="card-subtitle">III - BCSAD</div>
      <div class="card-footer">
        <span class="card-students">
          <i class="fa fa-users"></i> 1050 students
        </span>
        <button class="card-btn">View Info</button>
      </div>
    </div>
  </div>
  <!-- Repeat for each card, do NOT nest .card inside another .card -->
  <!-- ... other cards ... -->
<div class="card">
  <div class="card-image">
    <img src="cp2.jpg" alt="Computer Programming 2">
  </div>
  <div class="card-content">
    <div class="card-label">COMPROG2</div>
    <div class="card-title">Computer Programming 2</div>
    <div class="card-subtitle">III - BCSAD</div>
    <div class="card-footer">
      <span class="card-students">
        <i class="fa fa-users"></i> 980 students
      </span>
      <button class="card-btn">View Info</button>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-image">
    <img src="im.jpg" alt="Information Management">
  </div>
  <div class="card-content">
    <div class="card-label">INFOMAN</div>
    <div class="card-title">Information Management</div>
    <div class="card-subtitle">III - BCSAD</div>
    <div class="card-footer">
      <span class="card-students">
        <i class="fa fa-users"></i> 870 students
      </span>
      <button class="card-btn">View Info</button>
    </div>
  </div>
</div>


<div class="card">
  <div class="card-image">
    <img src="itc.jpg" alt="Introduction to Computing">
  </div>
  <div class="card-content">
    <div class="card-label">ITC</div>
    <div class="card-title">Introduction to Computing</div>
    <div class="card-subtitle">III - BCSAD</div>
    <div class="card-footer">
      <span class="card-students">
        <i class="fa fa-users"></i> 1120 students
      </span>
      <button class="card-btn">View Info</button>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-image">
    <img src="wdt.jpg" alt="Web Development Tools">
  </div>
  <div class="card-content">
    <div class="card-label">WDT</div>
    <div class="card-title">Web Development Tools</div>
    <div class="card-subtitle">III - BCSAD</div>
    <div class="card-footer">
      <span class="card-students">
        <i class="fa fa-users"></i> 760 students
      </span>
      <button class="card-btn">View Info</button>
    </div>
  </div>
</div>


<div class="card">
  <div class="card-image">
    <img src="wad.jpg" alt="Web Applications Development">
  </div>
  <div class="card-content">
    <div class="card-label">WAD</div>
    <div class="card-title">Web Applications Development</div>
    <div class="card-subtitle">III - BCSAD</div>
    <div class="card-footer">
      <span class="card-students">
        <i class="fa fa-users"></i> 810 students
      </span>
      <button class="card-btn">View Info</button>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-image">
    <img src="oop.jpg" alt="Object Oriented Programming">
  </div>
  <div class="card-content">
    <div class="card-label">OOP</div>
    <div class="card-title">Object Oriented Programming</div>
    <div class="card-subtitle">III - BCSAD</div>
    <div class="card-footer">
      <span class="card-students">
        <i class="fa fa-users"></i> 950 students
      </span>
      <button class="card-btn">View Info</button>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-image">
    <img src="mad.jpg" alt="Mobile Applications Development">
  </div>
  <div class="card-content">
    <div class="card-label">MAD</div>
    <div class="card-title">Mobile Applications Development</div>
    <div class="card-subtitle">III - BCSAD</div>
    <div class="card-footer">
      <span class="card-students">
        <i class="fa fa-users"></i> 690 students
      </span>
      <button class="card-btn">View Info</button>
    </div>
  </div>
</div>
  
<!-- ... end  ... --></div>

    </div>
  </div>
   <!-- MODAL -->
  <div class="modal-overlay" id="modalOverlay">
    <div class="modal-content">
      <div class="modal-header">
        ADD NEW COURSE
        <button class="modal-close" id="closeModalBtn" title="Close">&times;</button>
      </div>
      <div class="modal-body">
        <!-- Year and Section -->
        <div class="modal-col">
          <div class="modal-col-header">Year and Section</div>
          <div class="modal-col-content">
            <div class="radio-group">
              <label><input type="radio" name="year" value="1" id="year1" /> 1st Year</label>
              <label><input type="radio" name="section" /> ACSAD</label>
            </div>
            <div class="radio-group">
              <label><input type="radio" name="year" value="2" id="year2" /> 2nd Year</label>
              <label><input type="radio" name="section" checked /> BCSAD</label>
            </div>
            <div class="radio-group">
              <label><input type="radio" name="year" value="3" id="year3" checked /> 3rd Year</label>
              <label><input type="radio" name="section" /> CCSAD</label>
            </div>
            <div class="radio-group">
              <label><input type="radio" name="year" value="4" id="year4" /> 4th Year</label>
              <label><input type="radio" name="section" /> DCSAD</label>
            </div>
          </div>
        </div>
        <!-- Courses -->
        <div class="modal-col">
          <div class="modal-col-header">Courses</div>
          <div class="modal-col-content">
            <div class="radio-group">
              <label><input type="radio" name="sem" value="1" id="sem1" /> First Semester</label>
              <label><input type="radio" name="sem" value="2" id="sem2" checked /> Second Semester</label>
            </div>
            <!-- Subject radio buttons will be dynamically filled here -->
            <div id="subjectRadioGroup" class="radio-group" style="flex-direction:column;gap:6px;margin-top:12px;">
              <!-- JS will inject subject radios here -->
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="modal-add-btn">ADD</button>
      </div>
    </div>
    </div>
    <script>
function filterCourses() {
  const selected = document.getElementById('courseFilter').value;
  const courses = document.querySelectorAll('.card');

  courses.forEach(course => {
    const status = course.getAttribute('data-status') || 'inactive';
    if (selected === 'all' || status === selected) {
      course.style.display = 'block';
    } else {
      course.style.display = 'none';
    }
  });
}

// Modal toggle
const openModalBtn = document.getElementById('openModalBtn');
const closeModalBtn = document.getElementById('closeModalBtn');
const modalOverlay = document.getElementById('modalOverlay');

// Subject radio group logic
const subjectMap = {
  "1-1": [
    "INTRODUCTION TO COMPUTING",
    "COMPUTER PROGRAMMING 1",
    "WEB DEVELOPMENT TOOLS"
  ],
  "1-2": [
    "PROBABILITY AND STATISTICS",
    "COMPUTER PROGRAMMING 2",
    "INFORMATION MANAGEMENT",
    "WEB APPLICATIONS DEVELOPMENT"
  ],
  "2-1": [
    "ORGANIZATIONAL COMMUNICATION",
    "DATA STRUCTURES AND ALGORITHMS",
    "OPERATING SYSTEMS",
    "OBJECT ORIENTED PROGRAMMING"
  ],
  "2-2": [
    "MODERN PHYSICS",
    "APPLICATIONS DEVELOPMENT AND EMERGING TECHNOLOGIES",
    "DISCRETE STRUCTURES 1"
  ],
  "3-1": [
    "DIFFERENTIAL AND INTEGRAL CALCULUS",
    "ALGORITHMS AND COMPLEXITY",
    "DISCRETE STRUCTURES 2",
    "INFORMATION ASSURANCE AND SECURITY",
    "SOFTWARE ENGINEERING 1",
    "HUMAN COMPUTER INTERACTION",
    "MODELING AND SIMULATION",
    "ELECTIVE 1"
  ],
  "3-2": [
    "METHODS OF RESEARCH",
    "SOFTWARE ENGINEERING 2",
    "PROGRAMMING LANGUAGES",
    "NETWORKS AND COMMUNICATIONS",
    "ARCHITECTURE AND ORGANIZATION",
    "AUTOMATA THEORY AND FORMAL LANGUAGES",
    "PROJECT MANAGEMENT",
    "ELECTIVE 2"
  ],
  "4-1": [
    "ADVANCED ENGLISH PRE-EMPLOYMENT TRAINING",
    "SOCIAL ISSUES AND PROFESSIONAL PRACTICE",
    "CS THESIS WRITING 1",
    "ELECTIVE 3",
    "ELECTIVE 4",
    "ELECTIVE 5"
  ],
  "4-2": [
    "PRACTICUM (486 HOURS)",
    "CS THESIS WRITING 2"
  ]
};

function updateSubjects() {
  const year = document.querySelector('input[name="year"]:checked')?.value;
  const sem = document.querySelector('input[name="sem"]:checked')?.value;
  const group = document.getElementById('subjectRadioGroup');
  group.innerHTML = '';
  if (year && sem) {
    const key = `${year}-${sem}`;
    if (subjectMap[key]) {
      subjectMap[key].forEach((subj, idx) => {
        const id = `subject_${year}_${sem}_${idx}`;
        // Create label and radio separately for correct structure
        const label = document.createElement('label');
        label.style.marginRight = "8px";
        label.setAttribute('for', id);
        // Radio
        const radio = document.createElement('input');
        radio.type = 'radio';
        radio.name = 'subject';
        radio.value = subj;
        radio.id = id;
        if (idx === 0) radio.checked = true;
        // Label text
        label.appendChild(radio);
        label.appendChild(document.createTextNode(' ' + subj));
        group.appendChild(label);
      });
    }
  }
}

// Attach listeners to year and sem radios
document.querySelectorAll('input[name="year"]').forEach(radio => {
  radio.addEventListener('change', updateSubjects);
});
document.querySelectorAll('input[name="sem"]').forEach(radio => {
  radio.addEventListener('change', updateSubjects);
});

// Initialize on modal open
openModalBtn.onclick = () => {
  modalOverlay.classList.add('active');
  setTimeout(updateSubjects, 0); // Ensure radios are rendered before updating
};
closeModalBtn.onclick = () => modalOverlay.classList.remove('active');
window.onclick = (e) => {
  if (e.target === modalOverlay) modalOverlay.classList.remove('active');
};

// Dropdown page redirection
document.getElementById('coursesDropdown').addEventListener('change', function() {
  if (this.value === "mycourses") {
    window.location.href = "<?= base_url('courses_view') ?>";
  } else if (this.value === "allcourses") {
    window.location.href = "<?= base_url('allcourses') ?>";
  }
});
  </script>
</body>
</html>