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
      justify-content: space-between;
      align-items: center;
    }
    .enroll-actions .btn-info {
      margin-left: auto;
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
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 30px;
      background-color: white;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  
    }

    .navbar-logo .logo {
      width: 40px;
    }

    .navbar-center {
      display: flex;
      gap: 30px;
      align-items: center;
    }

    .navbar-center a {
      text-decoration: none;
      color: black;
      font-weight: bold;
    }
 .icon {
       width: 48px;
            height: 48px;
            object-fit: cover;
        
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
  </style>
</head>
<body>
  <!-- NAVBAR -->
<div class="navbar">
    <div class="navbar-logo">
      <img src="public/img/Logo.png" alt="logo" class="logo"/>
    </div>
    <div class="navbar-center">
      <a href="#">HOME</a>
      <a href="#">DASHBOARD</a>
      <a href="#">ABOUT</a>
      <div class="dropdown">
        <span  style="font-weight:bold;" >COURSES <span class="arrow">&#9660;</span></span>
        <div class="dropdown-content">
          <select id="course-select">
            <option value="web">ALL COURSES</option>
            <option value="data">MY COURSES</option>
          </select>
        </div>
      </div>
    </div>
    <div class="navbar-right">
        <img src="public/img/notifications.png" alt="Notifications" class="icon" style="cursor:pointer;z-index:1101;" />
       
      <img src="public/img/profile.png" alt="Profile" class="navbar-profile" />
    </div>
  </div>
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
            <div>
              <button class="btn btn-approve">Approve</button>
              <button class="btn btn-reject">Reject</button>
            </div>
            <button class="btn btn-info">View Info</button>
          </div>
        </div>
        <!-- Card 2 -->
        <div class="enroll-card">
          <div class="student-name">Student Name</div>
          <div class="desc">Body text for whatever you'd like to say. Add main takeaway points, quotes, anecdotes, or even a very very short story.</div>
          <div class="enroll-actions">
            <div>
              <button class="btn btn-approve gray">Approve</button>
              <button class="btn btn-reject gray">Reject</button>
            </div>
            <button class="btn btn-info gray">View Info</button>
          </div>
        </div>
        <!-- Card 3 -->
        <div class="enroll-card">
          <div class="student-name">Student Name</div>
          <div class="desc">Body text for whatever you'd like to say. Add main takeaway points, quotes, anecdotes, or even a very very short story.</div>
          <div class="enroll-actions">
            <div>
              <button class="btn btn-approve gray">Approve</button>
              <button class="btn btn-reject gray">Reject</button>
            </div>
            <button class="btn btn-info gray">View Info</button>
          </div>
        </div>
        <!-- Card 4 -->
        <div class="enroll-card">
          <div class="student-name">Student Name</div>
          <div class="desc">Body text for whatever you'd like to say. Add main takeaway points, quotes, anecdotes, or even a very very short story.</div>
          <div class="enroll-actions">
            <div>
              <button class="btn btn-approve gray">Approve</button>
              <button class="btn btn-reject gray">Reject</button>
            </div>
            <button class="btn btn-info gray">View Info</button>
          </div>
        </div>
        <!-- Card 5 -->
        <div class="enroll-card">
          <div class="student-name">Student Name</div>
          <div class="desc">Body text for whatever you'd like to say. Add main takeaway points, quotes, anecdotes, or even a very very short story.</div>
          <div class="enroll-actions">
            <div>
              <button class="btn btn-approve gray">Approve</button>
              <button class="btn btn-reject gray">Reject</button>
            </div>
            <button class="btn btn-info gray">View Info</button>
          </div>
        </div>
        <!-- Card 6 -->
        <div class="enroll-card">
          <div class="student-name">Student Name</div>
          <div class="desc">Body text for whatever you'd like to say. Add main takeaway points, quotes, anecdotes, or even a very very short story.</div>
          <div class="enroll-actions">
            <div>
              <button class="btn btn-approve gray">Approve</button>
              <button class="btn btn-reject gray">Reject</button>
            </div>
            <button class="btn btn-info gray">View Info</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <table class="enrollment-table">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Course</th>
                        <th>Section</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($requests as $request): ?>
                    <tr>
                        <td><?= esc($request['student_name']) ?></td>
                        <td><?= esc($request['course_name']) ?></td>
                        <td><?= esc($request['section']) ?></td>
                        <td><?= esc($request['status']) ?></td>
                        <td>
                            <button onclick="updateRequest(<?= $request['id'] ?>, 'approved')" class="btn btn-approve">Approve</button>
                            <button onclick="updateRequest(<?= $request['id'] ?>, 'rejected')" class="btn btn-reject">Reject</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

          
</body>
</html>