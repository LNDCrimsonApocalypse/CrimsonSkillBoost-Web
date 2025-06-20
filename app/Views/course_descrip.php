<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Computer Programming 1 - Course Dashboard</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
  <style>
  
    body {
      margin: 0;
      background: #fcf6fd;
      font-family: 'Poppins', 'Segoe UI', sans-serif;
      color: #222;
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
    .profile-pic-mini {
      width: 44px;
      height: 44px;
      border-radius: 50%;
      background: #e0e0e0;
      object-fit: cover;
      border: 2px solid #fff;
      box-shadow: 0 1px 4px rgba(0,0,0,0.06);
    }
   
    .container {
      display: flex;
      gap: 32px;
      padding: 36px 60px;
      max-width: 1300px;
      margin: 0 auto;
    }
    .main-content {
      flex: 2.3;
      display: flex;
      flex-direction: column;
      gap: 28px;
    }
    .card {
      background: #fff;
      border-radius: 18px;
      box-shadow: 0 2px 12px rgba(160, 108, 213, 0.07);
      padding: 30px 32px;
    }
    .course-title {
      font-family: 'Cormorant Garamond', serif;
      font-size: 2.6rem;
      font-weight: 700;
      margin-bottom: 8px;
      letter-spacing: 0.5px;
    }
    .students-count {
      font-size: 1rem;
      color: #a06cd5;
      margin-bottom: 10px;
      display: flex;
      align-items: center;
      gap: 6px;
    }
    .students-count i {
      font-size: 1.1rem;
    }
    .course-desc {
      color: #5f5f5f;
      font-size: 1.05rem;
      margin-bottom: 0;
      line-height: 1.6;
    }
    .section-title {
      font-size: 1.15rem;
      font-weight: 700;
      background: #c7b3e6;
      color: #3d2067;
      padding: 8px 18px;
      border-radius: 8px 8px 0 0;
      margin: 0;
      letter-spacing: 0.2px;
    }
    .section-content {
      background: #f6f3fa;
      border-radius: 0 0 12px 12px;
      padding: 18px 22px;
      font-size: 1.05rem;
      color: #3d2067;
    }
    .topic-list {
      background: #f6f3fa;
      border-radius: 0 0 12px 12px;
      padding: 12px 0;
    }
    .topic-item {
      padding: 14px 22px;
      font-size: 1rem;
      color: #3d2067;
      border-bottom: 1px solid #e0d3f7;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .topic-item:last-child {
      border-bottom: none;
    }
    .highlight {
      background: #f7e6fa;
      border-radius: 6px;
      padding: 2px 8px;
      font-size: 0.97rem;
      color: #a06cd5;
      margin-left: 12px;
    }
    .sidebar {
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 24px;
      max-width: 320px;
    }
    .profile-card {
      background: #fff;
      border-radius: 18px;
      box-shadow: 0 2px 12px rgba(160, 108, 213, 0.07);
      padding: 30px 32px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .profile-pic {
      width: 110px;
      height: 110px;
      border-radius: 50%;
      background: #e0e0e0;
      object-fit: cover;
      margin-bottom: 18px;
      border: 3px solid #fff;
      box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }
    .prof-name {
      font-weight: 700;
      font-size: 1.18rem;
      color: #3d2067;
      margin-bottom: 10px;
      text-align: center;
    }
    .start-btn {
      background: #e64ecb;
      color: #fff;
      font-weight: 700;
      font-size: 1.05rem;
      border: none;
      border-radius: 30px;
      padding: 13px 32px;
      margin-bottom: 20px;
      cursor: pointer;
      transition: background 0.18s;
    }
    .start-btn:hover {
      background: #a06cd5;
    }
    .includes-list {
      width: 100%;
      font-size: 1rem;
      color: #3d2067;
      padding-left: 0;
      margin: 0;
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 11px;
    }
    .includes-list li {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .step { color: #4e8be6; }
    .hands { color: #45c27d; }
    .problem { color: #f7b500; }
    .quiz { color: #a06cd5; }
    .tools { color: #e64ecb; }
    .support { color: #a06cd5; }
    @media (max-width: 1050px) {
      .container {
        flex-direction: column;
        padding: 18px 8vw;
      }
      .sidebar {
        max-width: 100%;
      }
    }
    @media (max-width: 700px) {
      .container {
        padding: 12px 2vw;
      }
      header {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
        padding: 14px 10px;
      }
      .main-content, .sidebar {
        padding: 0;
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
      <a href="#">HOME</a>
      <a href="#">DASHBOARD</a>
      <a href="#">ABOUT</a>
      <a href="#">COURSES</a>
    </div>
    <div class="navbar-right">
         <img src="imgs/notifications.png" alt="Notifications" class="icon" />
      <img src="imgs/profile.png" alt="Profile" class="navbar-profile" />
    </div>
  </nav>
  <div class="container">
    <div class="main-content">
      <div class="card">
        <div class="course-title">Computer Programming 1</div>
        <div class="students-count"><i>&#128101;</i> 1,050 students</div>
        <div class="course-desc">
          Computer Programming 1 is an introductory course designed to teach the fundamentals of programming using a specific programming language (such as Python, Java, or C++). It covers basic concepts like variables, data types, control structures (if-else, loops), functions, and basic input/output operations. Students also learn problem-solving techniques and how to write, test, and debug simple programs.
        </div>
      </div>
      <div class="card">
        <div class="section-title">Course Overview</div>
        <div class="section-content">
          Explore the basics of game design and development, and start creating your own games from scratch. Gain hands-on experience with game engines, storytelling, and interactive mechanics to bring your ideas to life.
        </div>
      </div>
      <div class="card">
        <div class="section-title">Topic Overview</div>
        <div class="topic-list">
          <div class="topic-item">Introduction to Computer Programming</div>
          <div class="topic-item">Definition of computer programming</div>
          <div class="topic-item">Importance and real-world applications</div>
        </div>
      </div>
    </div>
    <div class="sidebar">
      <div class="profile-card">
        <img src="imgs/profile.png" alt="Professor Nicholas Aguinaldo" class="profile-pic">
        <div class="prof-name">Professor Nicholas Aguinaldo</div>
        <button class="start-btn">GET YOUR STUDENT STARTED</button>
        <ul class="includes-list">
          <li><span class="step">&#128214;</span> Step-by-step lessons</li>
          <li><span class="hands">&#128187;</span> Hands-on coding exercises</li>
          <li><span class="problem">&#129504;</span> Problem-solving activities</li>
          <li><span class="quiz">&#9997;&#65039;</span> Quizzes and assessments</li>
          <li><span class="tools">&#128295;</span> Introduce to real coding tools</li>
          <li><span class="support">&#128172;</span> Instructor support and guidance</li>
        </ul>
      </div>
    </div>
  </div>
  
</body>
</html>