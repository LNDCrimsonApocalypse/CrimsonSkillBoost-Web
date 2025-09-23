<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CrimsonSkillBoost - Home</title>
  <style>
   body {
      margin: 0;
      font-family: 'Inter', Arial, sans-serif;
      background: linear-gradient(120deg, #fce6f5 0%, #c9d6ff 100%);
      min-height: 100vh;
    }
      .wave-bg {
      position: absolute;
      left: 0;
      bottom: 0;
      width: 100vw;
      z-index: 0;
      pointer-events: none;
      user-select: none;
      
    }
    /* NAVBAR */
    .navbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 36px 60px 0 60px;
    
      background: transparent;
    }
    .navbar-left {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .navbar-logo {
      width: 44px;
      height: 44px;
      object-fit: contain;
    }
    .navbar-brand {
      font-family: 'Montserrat', Arial, sans-serif;
      font-weight: 700;
      font-size: 1.4rem;
      color: #222;
      letter-spacing: 1px;
    }
    .navbar-center {
      display: flex;
      gap: 25px;
      align-items: center;
    }
    .navbar-center .dropdown {
      position: relative;
    }
    .navbar-center a {
      font-family: 'Montserrat', Arial, sans-serif;
      font-weight: 700;
      font-size: 1.18rem;
      color: #222;
      text-decoration: none;
      letter-spacing: 1px;
      transition: color 0.2s;
      padding: 4px 0;
      position: relative;
    }
   
    .navbar-center a:not(.dropdown)::after {
      content: "";
      margin-left: 0;
    }
    /* HERO SECTION */
    .hero-section {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 0;
      max-width: 1300px;
      margin: 0 auto;
      padding: 24px 60px 0 60px;
      min-height: 75vh;
      position: relative;
    }
    .hero-content {
      flex: 1.2 1 0;
      display: flex;
      flex-direction: column;
      justify-content: center;
      min-width: 320px;
      z-index: 1;
    }
    .hero-title {
      font-family: 'Montserrat', Arial, sans-serif;
      font-weight: 700;
      font-size: 2.3rem;
      color: #222;
      margin-bottom: 18px;
      line-height: 1.16;
    }
    .hero-desc {
      font-size: 1.13rem;
      color: #8c4a7e;
      margin-bottom: 30px;
      font-family: 'Inter', Arial, sans-serif;
      font-style: italic;
      font-weight: 500;
    }
    .hero-buttons {
      display: flex;
      gap: 18px;
      margin-top: 10px;
    }
    .hero-btn {
      font-family: 'Montserrat', Arial, sans-serif;
      font-weight: 700;
      font-size: 1.05rem;
      padding: 12px 32px;
      border-radius: 28px;
      border: none;
      cursor: pointer;
      transition: background 0.18s, color 0.18s, box-shadow 0.18s;
      box-shadow: 0 2px 8px rgba(230,54,164,0.07);
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .hero-btn.login {
      background: #fff;
      color: #a84d9b;
      border: 2px solid #a84d9b;
    }
    .hero-btn.login:hover {
      background: #f5e1f4;
      color: #e636a4;
      border-color: #e636a4;
    }
    .hero-btn.signup {
      background: linear-gradient(90deg, #e636a4 0%, #b983ff 100%);
      color: #fff;
    border: 2px solid #a84d9b;
    }
    .hero-btn.signup:hover {
      background: linear-gradient(90deg, #b983ff 0%, #e636a4 100%);
      color: #fff;
    }
    /* PHONE IMAGES */
    .hero-phones {
      flex: 1 1 0;
      display: flex;
      align-items: flex-end;
      justify-content: flex-end;
      gap: 0;
      min-width: 320px;
      position: relative;
      z-index: 2;
    }
    .phone-back {
      width: 260px;
      height: auto;
      opacity: 0.95;
      position: relative;
      z-index: 1;
      filter: drop-shadow(0 8px 16px rgba(185,131,255,0.3));
      transform: translate(30px, 20px);
    }
    .phone-front {
      width: 245px;
      height: auto;
      border-radius: 38px;
      box-shadow: 0 8px 32px rgba(160,60,180,0.14);
      border: 2px solid #e0c3fc;
      position: relative;
      z-index: 2;
      filter: drop-shadow(0 8px 24px rgba(230,54,164,0.3));
      margin-left: -80px;
      background: transparent;
    }
    /* Responsive */
    @media (max-width: 1100px) {
      .hero-section {
        flex-direction: column;
        align-items: flex-start;
        padding: 24px 24px 0 24px;
      }
      .hero-phones {
        justify-content: center;
        margin-top: 36px;
      }
      .phone-back, .phone-front {
        margin-left: 0;
        transform: none;
        filter: none;
        opacity: 1;
        width: 200px;
      }
    }
    @media (max-width: 700px) {
      .navbar {
        flex-direction: column;
        gap: 12px;
        padding: 18px 10px 0 10px;
      }
      .hero-section {
        flex-direction: column;
        padding: 24px 8px 0 8px;
      }
      .hero-content {
        min-width: 0;
      }
      .hero-phones {
        flex-direction: column;
        align-items: center;
        margin-top: 24px;
      }
      .phone-back, .phone-front {
        width: 180px;
        margin-left: 0;
        transform: none;
        filter: none;
        opacity: 1;
      }
    }
    
  </style>
</head>
<body>
    <!-- NAVBAR -->
  <nav class="navbar">
    <div class="navbar-left">
      <img class="navbar-logo" src="public/img/Logo.png" alt="Logo" />
      <span class="navbar-brand">CRIMSONSkillBoost</span>
    </div>
    <div class="navbar-center">
       <a href="<?= base_url('/') ?>">HOME</a>
     <a href="<?= base_url('aboutus') ?>">ABOUT</a>
      <a href="<?= base_url('allcourses2') ?>">COURSES</a>
    </div>
  </nav>
  <!-- HERO SECTION -->
  <section class="hero-section">
    <div class="hero-content">
      <div class="hero-title">
        Mastery begins with teaching and learning—empower students, enhance skills,<br>
        and shape the future with <span style="color:#e636a4;">.</span>
      </div>
      <div class="hero-desc">
        Crimson Skill Boost – Empowering Educators, Elevating Learners.
      </div>
      <div class="hero-buttons">
      <a href="<?= base_url('login') ?>" class="hero-btn login">Login &#8594;</a>
       <a href="<?= base_url('register') ?>" > <button class="hero-btn signup">Sign Up &#8594;</button> </a>
      </div>
    </div>
    <div class="hero-phones">
      <!-- Back phone image -->
      <img class="phone-back" src="public/img/2.png" alt="Phone Back" />
      <!-- Front phone image -->
      <img class="phone-front" src="public/img/1.png" alt="Phone Front" />
    </div>
  </section>
   <!-- SVG Wave Background (bottom) -->
  <svg 
  class="wave-bg" 
  viewBox="0 0 1440 320" 
  xmlns="http://www.w3.org/2000/svg" 
  preserveAspectRatio="none" 
  style="position:absolute; bottom:0; left:0; width:100vw; height:320px; z-index:0; pointer-events:none; user-select:none;">
  <path fill="#7F00FF" fill-opacity="1" d="M0,128L80,138.7C160,149,320,171,480,181.3C640,192,800,192,960,181.3C1120,171,1280,149,1360,138.7L1440,128L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
</svg>


</body>
</html>
