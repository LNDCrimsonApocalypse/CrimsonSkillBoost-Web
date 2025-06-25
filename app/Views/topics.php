<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Computer Programming Topics</title>
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
      bottom: 38px;
      right: 38px;
      width: 56px;
      height: 56px;
      border-radius: 50%;
      background: #f23eb3;
      color: #fff;
      font-size: 2.2rem;
      border: none;
      box-shadow: 0 4px 16px rgba(0,0,0,0.13);
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 100;
      transition: background 0.18s;
    }
    .plus-btn:hover {
      background: #d12c5c;
    }
    @media (max-width: 900px) {
      .tabbar, .tabbar-row {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
        padding: 10px 8px;
      }
      .tabbar {
        margin-top: 10px;
      }
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <div class="navbar">
    <div class="navbar-logo">
      <img src="public/img/Logo.png" alt="logo" class="logo"/>
    </div>
    <div class="navbar-center">
      <a href="<?= base_url('/') ?>">HOME</a>
          <a href="<?= base_url('dashboard') ?>">DASHBOARD</a>
       <a href="<?= base_url('aboutus') ?>">ABOUT</a>
        <a href="<?= base_url('allcourses') ?>">COURSES</a>
    </div>
    <div class="navbar-right">
      <input class="search-box" type="text" placeholder="Search.." />
       <button>+ Add Content</button> 
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
  <!-- Section Title -->
  <div class="section-title">
    Computer Programming 1 – Core Topics
  </div>
  <!-- Cards -->
  <div class="cards">
    <div class="card">
      <div class="card-content">
        <div class="card-title">
          Introduction to Programming <i>✎</i>
        </div>
        <div class="card-desc">
          Learn what programming is, why it matters, and how it powers the digital world.
        </div>
      </div>
      <div class="card-footer">
        <button class="view-btn">View Info</button>
        <span class="dots">⋮</span>
      </div>
    </div>
    <div class="card">
      <div class="card-content">
        <div class="card-title">
          Programming Environment Setup <i>✎</i>
        </div>
        <div class="card-desc">
          Set up your tools and write your first lines of code using a beginner-friendly editor.
        </div>
      </div>
      <div class="card-footer">
        <button class="view-btn">View Info</button>
        <span class="dots">⋮</span>
      </div>
    </div>
  </div>
  <!-- Plus Button -->
  <button class="plus-btn" title="Add Topic">+</button>
</body>
</html>
