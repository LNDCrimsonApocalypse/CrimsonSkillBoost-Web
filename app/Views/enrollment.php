<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Enrollment Requests</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      background: #fdeef4;
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
      color: #222;
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
    /* MAIN SECTION */
    .main-section {
      background: #fdeef4;
      min-height: 100vh;
      padding: 36px 0 0 0;
    }
    .enroll-container {
      max-width: 1320px;
      margin: 0 auto;
      padding: 0 24px;
    }
    .enroll-title {
      font-family: 'DM Serif Display', serif;
      font-size: 2.3rem;
      font-weight: 400;
      margin-bottom: 6px;
      color: #222;
      letter-spacing: 1px;
    }
    .enroll-subtitle {
      font-weight: bold;
      font-size: 1.1rem;
      margin-bottom: 32px;
      color: #222;
    }
    .enroll-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 32px 36px;
    }
    .enroll-card {
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.06);
      padding: 22px 24px 18px 24px;
      font-family: 'Inter', Arial, sans-serif;
      display: flex;
      flex-direction: column;
      gap: 12px;
      border: 1.5px solid #eee;
    }
    .enroll-card .student-name {
      font-family: 'Montserrat', Arial, sans-serif;
      font-weight: 700;
      font-size: 1.13rem;
      margin-bottom: 2px;
      color: #222;
    }
    .enroll-card .desc {
      font-size: 1.01rem;
      color: #444;
      margin-bottom: 8px;
      font-family: 'Inter', Arial, sans-serif;
      font-weight: 400;
    }
    .enroll-actions {
      display: flex;
      gap: 12px;
    }
    .btn {
      font-family: 'Inter', Arial, sans-serif;
      font-weight: 600;
      font-size: 1rem;
      border: none;
      border-radius: 6px;
      padding: 7px 20px;
      cursor: pointer;
      transition: background 0.18s, color 0.18s, border 0.18s;
      box-shadow: 0 1px 4px rgba(0,0,0,0.03);
         border: 1.2px solid #888;
    }
    .btn-approve {
      background: #f6f6f6;
      color: #000000;
    }

    .btn-reject {
      background: #f6f6f6;
      color: #000000;
    }
   
    .btn-info {
      background: #f6f6f6;
      color: #000000;
    }
    .btn-info:hover,.btn-approve:hover,.btn-reject:hover {
      background: #FFC5D3;
         border: 1.2px solid #888;
    }
    /* Gray variant for other cards */
    .btn-approve.gray,
    .btn-reject.gray,
    .btn-info.gray {
      background: #f6f6f6;
      color: #222;
      border: 1.2px solid #bbb;
    }
    .btn-approve.gray:hover,
    .btn-reject.gray:hover,
    .btn-info.gray:hover {
      background:#FFC5D3;
      color: #000;
      border: 1.2px solid #888;
    }
    @media (max-width: 1000px) {
      .enroll-grid {
        grid-template-columns: 1fr;
        gap: 24px;
      }
    }
    @media (max-width: 700px) {
      .navbar {
        flex-direction: column;
        gap: 14px;
        padding: 18px 10px 0 10px;
      }
      .main-section {
        padding: 18px 0 0 0;
      }
      .enroll-container {
        padding: 0 4vw;
      }
    }
        /* Dropdown container */
.dropdown {
  position: relative;
}
    .dropbtn {
  text-decoration: none;
  font-weight: bold;
  font-size: 1.3rem;
  color: black;
  background: none;
  border: none;
  cursor: pointer;
  padding: 8px;
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
  <nav class="navbar">
    <div class="navbar-left">
      <img src="imgs/Logo.png" alt="Logo" />
    </div>
    <div class="navbar-center">
      <a href="#">HOME</a>
      <a href="#" class="active">DASHBOARD</a>
      <a href="#">ABOUT</a>
    <li class="dropdown">
      <button class="dropbtn">COURSES ▼</button>
      <div class="dropdown-content">
        <select id="course-select">
          <option value="web">ALL COURSES </option>
          <option value="data">MY COURSES</option>
         
        </select>
      </div>
    </li>
    </div>
    <div class="navbar-right">
   <img src="imgs/notifications.png" alt="Notifications" class="icon" />
      <img src="imgs/profile.png" alt="Profile" class="navbar-profile" />
    </div>
  </nav>
  <!-- MAIN SECTION -->
  <div class="main-section">
    <div class="enroll-container">
      <div class="enroll-title">Enrollment Requests</div>
      <div class="enroll-subtitle">Pending Student Enrollments</div>
      <div class="enroll-grid">
        <!-- Card 1 -->
        <div class="enroll-card">
          <div class="student-name">California Magpantay</div>
          <div class="desc">Body text for whatever you'd like to say. Add main takeaway points, quotes, anecdotes, or even a very very short story.</div>
          <div class="enroll-actions">
            <button class="btn btn-approve">Approve</button>
            <button class="btn btn-reject">Reject</button>
            <button class="btn btn-info">View Info</button>
          </div>
        </div>
        <!-- Card 2 -->
        <div class="enroll-card">
          <div class="student-name">Student Name</div>
          <div class="desc">Body text for whatever you'd like to say. Add main takeaway points, quotes, anecdotes, or even a very very short story.</div>
          <div class="enroll-actions">
            <button class="btn btn-approve gray">Approve</button>
            <button class="btn btn-reject gray">Reject</button>
            <button class="btn btn-info gray">View Info</button>
          </div>
        </div>
        <!-- Card 3 -->
        <div class="enroll-card">
          <div class="student-name">Student Name</div>
          <div class="desc">Body text for whatever you'd like to say. Add main takeaway points, quotes, anecdotes, or even a very very short story.</div>
          <div class="enroll-actions">
            <button class="btn btn-approve gray">Approve</button>
            <button class="btn btn-reject gray">Reject</button>
            <button class="btn btn-info gray">View Info</button>
          </div>
        </div>
        <!-- Card 4 -->
        <div class="enroll-card">
          <div class="student-name">Student Name</div>
          <div class="desc">Body text for whatever you'd like to say. Add main takeaway points, quotes, anecdotes, or even a very very short story.</div>
          <div class="enroll-actions">
            <button class="btn btn-approve gray">Approve</button>
            <button class="btn btn-reject gray">Reject</button>
            <button class="btn btn-info gray">View Info</button>
          </div>
        </div>
        <!-- Card 5 -->
        <div class="enroll-card">
          <div class="student-name">Student Name</div>
          <div class="desc">Body text for whatever you'd like to say. Add main takeaway points, quotes, anecdotes, or even a very very short story.</div>
          <div class="enroll-actions">
            <button class="btn btn-approve gray">Approve</button>
            <button class="btn btn-reject gray">Reject</button>
            <button class="btn btn-info gray">View Info</button>
          </div>
        </div>
        <!-- Card 6 -->
        <div class="enroll-card">
          <div class="student-name">Student Name</div>
          <div class="desc">Body text for whatever you'd like to say. Add main takeaway points, quotes, anecdotes, or even a very very short story.</div>
          <div class="enroll-actions">
            <button class="btn btn-approve gray">Approve</button>
            <button class="btn btn-reject gray">Reject</button>
            <button class="btn btn-info gray">View Info</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>