<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>About Us - CrimsonSkillBoost</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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

    .about-section {
      background: linear-gradient(120deg, #fdeef4 60%, #fff 100%);
      min-height: 100vh;
      padding: 0 0 60px 0;
    }

    .about-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 48px 24px 0 24px;
      display: flex;
      flex-wrap: wrap;
      gap: 32px;
      align-items: flex-start;
    }

    .about-left {
      flex: 1 1 380px;
      min-width: 330px;
    }

    .about-title {
      font-family: 'DM Serif Display', serif;
      font-size: 3rem;
      letter-spacing: 4px;
      margin: 0 0 16px 0;
      color: #222;
      font-weight: 400;
      border-bottom: 2px solid #222;
      display: inline-block;
      padding-bottom: 8px;
    }

    .about-card {
      background: #eec8e6;
      border-radius: 18px;
      padding: 22px 24px;
      margin-top: 32px;
      font-size: 1.05rem;
      color: #444;
      box-shadow: 0 2px 12px rgba(200,44,142,0.04);
      line-height: 1.6;
      font-family: 'Inter', Arial, sans-serif;
    }

    .about-right {
      flex: 1 1 340px;
      min-width: 300px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      margin-top: 10%;
    }

    .about-illustration {
      width: 95%;
      max-width: 350px;
      margin-bottom: 18px;
      margin-top: 18px;
      display: block;
    }

    .about-brand {
      font-family: 'DM Serif Display', serif;
      font-size: 2.1rem;
      color: #222;
      font-weight: 600;
      text-align: center;
      letter-spacing: 1px;
      margin-top: 0;
    }

    .about-wave {
      width: 100%;
      margin-top: 30px;
      display: block;
    }

    @media (max-width: 900px) {
      .about-container {
        flex-direction: column;
        gap: 12px;
        align-items: stretch;
      }

      .about-left, .about-right {
        min-width: 0;
        width: 100%;
      }

      .about-title {
        font-size: 2.1rem;
      }

      .about-brand {
        font-size: 1.3rem;
      }

      .about-illustration {
        max-width: 220px;
      }
    }

     .dropbtn {
  
   font-weight: bold;
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
  </style>
</head>
<body>
  <!-- NAVBAR -->
  <nav class="navbar">
    <div class="navbar-left">
     <img src="public/img/logo.png" alt="Logo"  class="navbar-logo" />
    </div>
    <div class="navbar-center">
     <a href="<?= base_url('homepage') ?>" >HOME</a> 
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
    </div>
  </nav>

  <!-- ABOUT SECTION -->
  <section class="about-section">
    <div class="about-container">
      <div class="about-left">
        <div class="about-title">ABOUT US</div>
        <div class="about-card">
          “CMO” (pronounced as Si-Mo), short for Crimson Metaverse Operators, represents a futuristic and innovative group blending elements of technology and mysticism. The imagery of circuits and molecular-like designs on the periphery signifies their expertise in cutting-edge technologies, including mobile and web apps, games and interactive virtual experience. The central focus on a crimson blood moon adorned with flowers suggests a harmonious balance between creativity and precision. The crescents and celestial elements symbolize growth, phases of innovation, and a connection to a broader cosmic perspective. One of CMO’s remarkable projects is called “CrimsonSkillBoost: The Development of Computer Science Learning Hub”.
        </div>
      </div>
      <div class="about-right">
        <img class="about-illustration" src="public/img/grp.png" alt="Team Illustration">
        <div class="about-brand">CRIMSONSKILLBOOST</div>
      </div>
    </div>

    <!-- Decorative wave -->
    <svg class="about-wave" viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path fill="#e636a4" fill-opacity="0.9" d="M0,80 C360,160 1080,0 1440,80 L1440,120 L0,120 Z"></path>
      <path fill="#c92c8e" fill-opacity="0.7" d="M0,100 C360,180 1080,20 1440,100 L1440,120 L0,120 Z"></path>
      <path fill="#fdeef4" fill-opacity="1" d="M0,120 C360,200 1080,40 1440,120 L1440,120 L0,120 Z"></path>
    </svg>
  </section>
  <script>
document.getElementById('coursesDropdown').addEventListener('change', function() {
    if (this.value === "mycourses") {
        window.location.href = "<?= base_url('my_courses_view') ?>";
    } else if (this.value === "allcourses") {
        window.location.href = "<?= base_url('allcourses') ?>";
    }
});
</script>
</body>
</html>
