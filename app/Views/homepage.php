<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CrimsonSkillBoost - Home</title>
  <style>
    /* Reset & Base */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      background-color: #1e1e1e;
      color: #000;
    }
    

    /* NAVBAR */

    .navbar {
      
      background-color: #fff;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 15px 30px;
      border-bottom: 2px solid #ddd;
      position: sticky;
      top: 0;
      z-index: 1000;
      border-color: #FFC5D3;
    }

    .nav-left,
    .nav-center,
    .nav-right {
      display: flex;
      align-items: center;
    }

    .nav-left img.logo {
      height: 50px;
      margin-right: 20px;
    }

    .nav-center a {
      margin: 0 15px;
      font-weight: bold;
      color: #000;
      text-decoration: none;
      transition: color 0.3s ease;
      font-size: 1.35rem;
      letter-spacing: 1px;
    
    }

    .nav-center a:hover {
      color: #ff00aa;
    }

    .nav-right img.profile,
    .nav-right img.notification {
      height: 35px;
      width: 35px;
      object-fit: cover;
      border-radius: 50%;
      margin-left: 20px;
      cursor: pointer;
    }

    #signOutButton {
      margin-left: 20px;
      padding: 8px 16px;
      border: none;
      border-radius: 20px;
      background-color: #ff4081;
      color: white;
      font-weight: bold;
      cursor: pointer;
    }

   /* --- MAIN SECTION --- */
    .main-section {
      display: flex;
      align-items: stretch;
      justify-content: center;
      min-height: 78vh;
      margin-top: 0;
  padding-top: 0;
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
  font-size: 1.35rem;
  color: black;
  background: none;
  border: none;
  cursor: pointer;
     margin: 0 15px;
  
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

  <div class="navbar">
    <div class="nav-left">
      <img src="<?= base_url('public/img/Logo.png') ?>" class="logo" alt="Logo">
    </div>
    <div class="nav-center">
      <a href="<?= base_url('/') ?>">HOME</a>
      <a href="<?= base_url('dashboard') ?>">DASHBOARD</a>
      <a href="<?= base_url('aboutus') ?>">ABOUT</a>
      <a href="<?= base_url('allcourses') ?>">COURSES</a>
    </div>
    <div class="nav-right">
      <img src="public/img/notifications.png" class="notification" alt="Notifications">
      <a href="<?= base_url('editprofile') ?>"> <img src="" id="navbar-profile-pic" class="profile" alt="User"> </a>
      <a href="<?= base_url('homepage_initial') ?>"><button id="signOutButton">Sign Out</button> </a>
    </div>
  </div>

   <!-- MAIN SECTION -->
  <div class="main-section">
    <div class="welcome-card">
      <h1 class="welcome-title">Welcome Educator!</h1>
      <div class="welcome-desc">
        Ready to inspire? Manage your classes, share resources, and connect with your students. Let's make learning enjoyable together!
      </div>
       <a href="<?= base_url('dashboard') ?>"> <button class="welcome-btn">Get Started</button> </a>
    </div>
    <div class="main-illustration">
      <img src="public/img/image 4.png" alt="Educator Illustration">
    </div>
  </div>

  <!-- Firebase Scripts -->
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
  <script src="<?= base_url('public/js/firebase-config.js') ?>"></script>
  <script>
firebase.auth().onAuthStateChanged(async function(user) {
  if (user) {
    try {
      const doc = await firebase.firestore().collection("users").doc(user.uid).get();
      if (doc.exists) {
        const data = doc.data();
        const profileImg = document.getElementById("navbar-profile-pic");
        if (profileImg) {
          profileImg.src = data.photoURL || "public/img/profile.png";
        }
      }
    } catch (err) {}
  }
});
  </script>
</body>
</html>
            profileImg.src = data.photoURL;
          }

          // Profile Picture in navbar
          const profileImg = document.getElementById("navbar-profile-pic");
          if (profileImg) {
            profileImg.src = data.photoURL || "public/img/profile.png";
          }

          // Optional: change main image if user uploaded one
          if (data.photoURL) {
            document.getElementById("educatorImage").src = data.photoURL;
          }

        } else {
          alert("User profile not found. Redirecting to setup...");
          window.location.href = "<?= base_url('setup-profile') ?>";
        }
      } catch (err) {
        alert("Error loading profile: " + err.message);
      }
    } else {
      window.location.href = "<?= base_url('login') ?>";
    }
  });
  </script>
</body>
</html>
