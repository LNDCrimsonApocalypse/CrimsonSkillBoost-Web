
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
      gap: 36px;
      font-size: 1.1rem;
      font-weight: 500;
      margin-left: 40px;
    }
    .tabbar-row{
         display: flex;
      align-items: center;
      justify-content: space-between;
      padding:  40px;
      margin-top: 18px;
      border-bottom: 2px solid #fde8f0;
      background: #fff;
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
      <a href="<?= base_url('/') ?>">HOME</a>
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
    <span>Student</span>
  </div>

  <!-- Page Title -->
  <div class="title-bar">
    Computer Programming 1 – Core Topics
  </div>

  <!-- Main Content -->
  <div class="content">
    <div class="left">
      <div class="section-title">📘 Introduction to Programming</div>
      <ul>
        <li>Definition of computer programming</li>
        <li>Importance and real-world applications</li>
        <li>Types of programming languages (compiled vs. interpreted)</li>
        <li>Overview of common programming paradigms (procedural, OOP, functional)</li>
        <li>Brief history of programming languages</li>
        <li>Flow of program execution</li>
      </ul>
    </div>
    <div class="right">
      <p>
        Programming is the foundation of modern computing. It is the process of designing, writing, testing, and maintaining a set of instructions—called a program—that a computer can follow to perform specific tasks or solve problems. Through programming, we can create applications, automate tasks, analyze data, build websites, control hardware, and more.
      </p>
      <p>
        This topic introduces the key concepts every beginner needs to understand before diving into writing actual code. It covers what programming is, why it's important, the types of programming languages available, different ways to structure code (known as paradigms), a brief look at the history of programming languages, and how programs are executed by computers.
      </p>
    </div>
  </div>
</body>
</html>