<!-- app/Views/home.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Welcome Educator</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=DM+Serif+Display&family=Inter:wght@400;500&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      background: #fff;
      font-family: 'Inter', Arial, sans-serif;
    }
   
      /* NAVBAR */
     .navbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
        background: #fff;

     padding: 10px 40px;
    }
    .navbar-left {
      display: flex;
      align-items: center;
      gap: 18px;
    }
    .navbar-logo {
      width: 52px;
      height: 52px;
      object-fit: contain;
    }
    .navbar-center {
      display: flex;
      gap: 36px;
      align-items: center;
    }
    .navbar-center a {
  
      font-weight: 500;
      font-size: 1.35rem;
      text-decoration: none;
      color: black;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: color 0.2s;
    }
    .navbar-center a.active {
      color: #222;
      font-weight: 900;
    }
    .navbar-right {
      display: flex;
      align-items: center;
      gap: 22px;
    }
    .navbar-left img {
      width: 48px;
      height: 48px;
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
      font-size: 1.35rem;
      text-decoration: none;
      color: #222;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: color 0.2s;
    }
    .navbar-center a.active {
      color: #222;
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
      width: 38px;
      height: 38px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid #eee;
      background: #fff;

    }
    /* --- MAIN SECTION --- */
    .main-section {
      display: flex;
      align-items: stretch;
      justify-content: center;
      margin-top: 24px;
      min-height: 78vh;
    }
    .welcome-card {
      flex: 1.1;
      background: #fdeef4;
      border-radius: 0 0 0 0;
      padding: 56px 46px 56px 56px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      min-width: 350px;
      max-width: 520px;
    }
    .welcome-title {
      font-family: 'DM Serif Display', serif;
      font-size: 2.6rem;
      font-weight: 400;
      margin: 0 0 18px 0;
      color: #222;
      letter-spacing: 1px;
    }
    .welcome-desc {
      font-family: 'Inter', Arial, sans-serif;
      font-size: 1.13rem;
      color: #444;
      margin-bottom: 28px;
      max-width: 420px;
      line-height: 1.5;
    }
    .welcome-btn {
  
      background: #e636a4;
      color: black;
      font-weight: 700;
      border: none;
      border-radius: 8px;
      font-size: 1.08rem;
      padding: 10px 22px;
      cursor: pointer;
    
      box-shadow: 0 2px 8px rgba(230,54,164,0.04);
      display: inline-block;
      animation: alternate;
      animation-duration: 2s;
      animation-name: btn;
      animation-duration: 4s;
    }
   
    .welcome-btn:hover {
      background: #c92c8e;
      
    }
  @keyframes btn{
        from {background-color:#e636a4;}
        to {background-color: #FFC5D3;}
      }
    .main-illustration {
      flex: 1.3;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #fff;
      min-width: 0;
      padding: 40px 0 40px 0;
    }
    .main-illustration img {
      max-width: 92%;
      height: auto;
      display: block;
    }
    @media (max-width: 1000px) {
      .main-section {
        flex-direction: column;
        align-items: stretch;
      }
      .welcome-card, .main-illustration {
        max-width: 100%;
        padding: 32px 18px;
      }
      .welcome-title {
        font-size: 2rem;
      }
      .main-illustration {
        justify-content: flex-start;
      }
    }
    @media (max-width: 700px) {
      .navbar {
        flex-direction: column;
        gap: 14px;
        padding: 18px 10px 0 10px;
      }
      .main-section {
        flex-direction: column;
        margin-top: 10px;
      }
      .welcome-card {
        padding: 22px 8vw;
      }
    }
           .dropbtn {
  
   font-weight: bold;
  font-size: 1.18rem;
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
  </style>
</head>
<body>
   <nav class="navbar">
    <div class="navbar-left">
      <img src="public/img/Logo.png" alt="Logo" />
    </div>
    <div class="navbar-center">
     <a href="<?= base_url('homepage') ?>">HOME</a>
          <a href="<?= base_url('dashboard') ?>">DASHBOARD</a>
       <a href="<?= base_url('aboutus') ?>">ABOUT</a>
        <a href="<?= base_url('allcourses') ?>">COURSES</a>
    </div>
    <div class="navbar-right">
<img src="public/img/notifications.png" alt="Notifications" class="icon" />
      <img src="public/img/profile.png" alt="Profile" class="navbar-profile" />
    </div>
  </nav>
  <!-- MAIN SECTION -->
  <div class="main-section">
    <div class="welcome-card">
      <h1 class="welcome-title">Welcome Educator!</h1>
      <div class="welcome-desc">
        Ready to inspire? Manage your classes, share resources, and connect with your students. Let's make learning enjoyable together!
      </div>
      <button class="welcome-btn">Get Started</button>
    </div>
    <div class="main-illustration">
      <img src="public/img/image 4.png" alt="Educator Illustration">
    </div>
  </div>
</body>
</html>
