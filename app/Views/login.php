<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CrimsonSkillBoost - Log In</title>

  <!-- Firebase Scripts -->
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
  <script src="<?= base_url('public/js/firebase-config.js') ?>"></script>

  <style>
    body {
      margin: 0;
      font-family: 'Inter', Arial, sans-serif;
      min-height: 100vh;
      background: linear-gradient(180deg, #fce6f5 0%, #e9f0fa 100%);
      position: relative;
      overflow-x: hidden;
    }
    /* Wave background */
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
      padding: 20px 36px 0 36px;
      background: transparent;
      z-index: 2;
      position: relative;
    }
    .navbar-logo {
      width: 52px;
      height: 52px;
      object-fit: contain;
      margin-right: 14px;
    }
    .navbar-brand {
      font-family: 'Montserrat', Arial, sans-serif;
      font-weight: 700;
      font-size: 1.5rem;
      color: #222;
      letter-spacing: 1px;
    }
    /* MAIN LAYOUT */
    .main-content {
      display: flex;
      align-items: flex-start;
      justify-content: center;
      gap: 70px;
      max-width: 1200px;
      margin: 0 auto;
      padding: 36px 24px 0 24px;
      position: relative;
      z-index: 1;
    }
    /* PHONE MOCKUPS */
.phones-wrapper {
  position: relative;
  width: 600px;
  height: 600px;
}

.phone {
  position: absolute;
  width: 250px;
  height: auto;
  border-radius: 40px;
  box-shadow: 0 0 30px rgba(192, 104, 255, 0.4);
  transition: transform 0.3s;
}

/* Left phone - behind */
.phone-behind {
  left: 0;
  top: 40px;
  z-index: 1;
}

/* Right phone - front */
.phone-front {
  left: 120px;
  top: 0;
  z-index: 2;
}
    /* LOGIN CARD */
    .login-card-bg {
      background: #f3d6f8;
      border-radius: 18px;
      padding: 36px 38px 30px 38px;
      min-width: 340px;
      max-width: 350px;
      display: flex;
      flex-direction: column;
      align-items: center;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
      margin-top: 30px;
    }
    .login-logo {
      width: 72px;
      margin-bottom: 24px;
    }
    .login-form {
      width: 100%;
      display: flex;
      flex-direction: column;
      gap: 16px;
    }
    .login-input {
      padding: 12px 14px;
      border-radius: 6px;
      border: none;
      font-size: 1rem;
      background: #fff;
      margin-bottom: 8px;
      font-family: 'Inter', Arial, sans-serif;
      outline: none;
      box-shadow: 0 1px 4px rgba(230,54,164,0.04);
    }
    .login-btn {
      background: #d68ae6;
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 1.08rem;
      font-weight: 700;
      padding: 10px 0;
      cursor: pointer;
      font-family: 'Montserrat', Arial, sans-serif;
      margin-top: 6px;
      transition: background 0.18s;
    }
    .login-btn:hover {
      background: #e636a4;
    }
    .login-links {
      width: 100%;
      text-align: center;
      margin-top: 10px;
      font-size: 0.99rem;
    }
    .login-links a {
      color: #a84d9b;
      text-decoration: underline;
      transition: color 0.18s;
    }
    .login-links a:hover {
      color: #e636a4;
    }
    /* SIGNUP CARD */
    .signup-card-bg {
       margin-top: 20px;
  padding: 12px 20px;
     background: #f3d6f8;
  border-radius: 12px;
  text-align: center;
  font-family: 'Inter', Arial, sans-serif;
  font-size: 0.95rem;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
  max-width: 360px;
  margin-left: auto;
  margin-right: auto;
    }
    .signup-card-bg a {
        color: #c94dbb;
  font-weight: 600;
  text-decoration: none;
  text-decoration: underline;
    }
    .signup-card-bg a:hover {
      color: #e636a4;
      
    }
    @media (max-width: 1000px) {
      .main-content {
        flex-direction: column;
        align-items: center;
        gap: 30px;
        padding: 28px 6vw 0 6vw;
      }
      .phones {
        justify-content: center;
        margin-bottom: 20px;
      }
    }
    @media (max-width: 700px) {
      .navbar {
        flex-direction: column;
        gap: 10px;
        padding: 12px 8px 0 8px;
      }
      .main-content {
        flex-direction: column;
        gap: 22px;
        padding: 16px 2vw 0 2vw;
      }
      .phones {
        min-width: 0;
      }
      .login-card-bg, .signup-card-bg {
        min-width: 0;
        max-width: 98vw;
        padding: 24px 4vw;
      }
    }
  </style>
</head>
<body>
   <!-- NAVBAR -->
  <nav class="navbar">
    <img class="navbar-logo"src="public/img/Logo.png" alt="Logo" />
    <span class="navbar-brand">CRIMSONSkillBoost</span>
  </nav>
  <!-- MAIN CONTENT -->
  <div class="main-content">
    <!-- Phone mockups (images) -->
   <div class="phones-wrapper">
    <!-- Course List Phone (Behind) -->
    <img src="public/img/4.png" alt="Courses Screen" class="phone phone-behind" />
    
    <!-- Splash Screen Phone (Front and Right) -->
    <img src="public/img/3.png"alt="Splash Screen" class="phone phone-front" />
  </div>
    <!-- Login Card -->
    <div>
      <div class="login-card-bg">
        <img class="login-logo" src="public/img/Logo.png" alt="Logo" />
        <form class="login-form">
          <input class="login-input" id="email" type="text" placeholder="Username or Email" required />
          <input class="login-input" id="password" type="password" placeholder="Password" required />
          <button class="login-btn" id="loginButton" type="submit">Log In</button>
        </form>
        <div class="login-links" style="margin-top:14px;">
          <a href="<?= base_url('password_reset') ?>" target="_blank">Forgot your password?</a>
        </div>
      </div>
      <div class="signup-card-bg">
        Don't have an account?
        <a href="<?= base_url('terms') ?>">Sign Up</a>
      </div>
    </div>
  </div>
  <!-- SVG Wave Background (bottom) -->
  <svg 
  class="wave-bg" 
  viewBox="0 0 1440 320" 
  xmlns="http://www.w3.org/2000/svg" 
  preserveAspectRatio="none" 
  style="position:absolute; bottom:0; left:0; width:100vw; height:320px; z-index:0; pointer-events:none; user-select:none;">
  <path fill="#7F00FF" fill-opacity="1" d="M0,128L80,138.7C160,149,320,171,480,181.3C640,192,800,192,960,181.3C1120,171,1280,149,1360,138.7L1440,128L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
</svg>
  <script>
    // Add loading state management
    let isLoggingIn = false;
    const loginButton = document.getElementById('loginButton');
    const loadingSpinner = '<span class="spinner"></span> Signing in...';
    const originalButtonText = loginButton.innerHTML;

    function showLoading() {
        loginButton.disabled = true;
        loginButton.innerHTML = loadingSpinner;
    }

    function hideLoading() {
        loginButton.disabled = false;
        loginButton.innerHTML = originalButtonText;
    }

    loginButton.addEventListener('click', async function(e) {
        e.preventDefault();
        if (isLoggingIn) return;
        
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        if (!email || !password) {
            alert('Please fill in all fields');
            return;
        }

        try {
            isLoggingIn = true;
            showLoading();

            // Set a timeout for the login attempt
            const loginPromise = firebase.auth().signInWithEmailAndPassword(email, password);
            const timeoutPromise = new Promise((_, reject) => 
                setTimeout(() => reject(new Error('Login timeout')), 10000)
            );

            await Promise.race([loginPromise, timeoutPromise]);
            
            // Redirect manually after successful login
            window.location.href = '<?= base_url('dashboard') ?>';
        } catch (error) {
            console.error('Login error:', error);
            hideLoading();
            isLoggingIn = false;
            
            let errorMessage = 'Failed to login. Please try again.';
            if (error.code === 'auth/user-not-found') {
                errorMessage = 'No account found with this email.';
            } else if (error.code === 'auth/wrong-password') {
                errorMessage = 'Invalid password.';
            } else if (error.message === 'Login timeout') {
                errorMessage = 'Login is taking too long. Please check your connection and try again.';
            }
            
            alert(errorMessage);
        }
    });
  </script>
</body>
</html>
