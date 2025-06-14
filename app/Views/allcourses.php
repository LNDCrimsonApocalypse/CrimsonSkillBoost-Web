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
      margin-left: 4px;
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
        
     .dropbtn {
  
    font-weight: 700;
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
      <a href="<?= base_url('home') ?>">HOME</a>
      <a href="<?= base_url('dashboard') ?>">DASHBOARD</a>
      <a href="<?= base_url('aboutus') ?>">ABOUT</a>
  <li class="dropdown">
  <label class="dropbtn" for="course-select">
    COURSES <span class="arrow">▼</span>
  </label>
  <div class="dropdown-content">
    <select id="coursesDropdown" class="dropdown-select">
      <option value="allcourses">ALL COURSES</option>
      <option value="mycourses">MY COURSES</option>
    </select>
  </div>
</li>
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
          <select class="dropdown-select">
            <option>All Category</option>
            <option>Programming</option>
            <option>Design</option>
            <option>Business</option>
          </select>
          <div class="search-add-group">
            <input class="search-box" type="text" placeholder="Search.." />
            <button class="add-btn" id="openModalBtn">+ Add Courses</button>
          </div>
        </div>
      </div>
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
              <label><input type="radio" name="year" /> 1st Year</label>
              <label><input type="radio" name="section" /> ACSAD</label>
            </div>
            <div class="radio-group">
              <label><input type="radio" name="year" /> 2nd Year</label>
              <label><input type="radio" name="section" checked /> BCSAD</label>
            </div>
            <div class="radio-group">
              <label><input type="radio" name="year" checked /> 3rd Year</label>
              <label><input type="radio" name="section" /> CCSAD</label>
            </div>
            <div class="radio-group">
              <label><input type="radio" name="year" /> 4th Year</label>
            </div>
          </div>
        </div>
        <!-- Courses -->
        <div class="modal-col">
          <div class="modal-col-header">Courses</div>
          <div class="modal-col-content">
            <div class="radio-group">
              <label><input type="radio" name="sem" /> First Semester</label>
              <label><input type="radio" name="sem" checked /> Second Semester</label>
            </div>
            <div class="radio-group">
              <label><input type="radio" name="course" /> Methods II Research</label>
              <label><input type="radio" name="course" /> Software Engineering 2</label>
            </div>
            <div class="radio-group">
              <label><input type="radio" name="course" /> Programming Languages</label>
              <label><input type="radio" name="course" checked /> Computer Programming 1</label>
            </div>
            <div class="radio-group">
              <label><input type="radio" name="course" /> Architecture and Organization</label>
              <label><input type="radio" name="course" /> Automata Theory and Formal Languages</label>
            </div>
            <div class="radio-group">
              <label><input type="radio" name="course" /> Project Management</label>
              <label><input type="radio" name="course" /> Elective 2</label>
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
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const modalOverlay = document.getElementById('modalOverlay');
    openModalBtn.onclick = () => modalOverlay.classList.add('active');
    closeModalBtn.onclick = () => modalOverlay.classList.remove('active');
    window.onclick = (e) => {
      if (e.target === modalOverlay) modalOverlay.classList.remove('active');
    };
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