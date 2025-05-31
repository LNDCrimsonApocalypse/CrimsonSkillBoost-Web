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
      padding: 0;
      font-family: 'Segoe UI', Arial, sans-serif;
      background: linear-gradient(to bottom, #fff0f6 0%, #e6f0fa 100%);
      min-height: 100vh;
    }

    .header {
      display: flex;
      align-items: center;
      padding: 24px 40px 0 40px;
    }

    .header img {
      width: 48px;
      height: 48px;
      margin-right: 14px;
    }

    .header-title {
      font-weight: bold;
      font-size: 1.3rem;
      color: #222;
      letter-spacing: 0.5px;
    }

    .panel-bg {
      position: absolute;
      top: 200px;
      left: 300px;
      width: 340px;
      height: 420px;
      background: #d9d9d9;
      border-radius: 6px;
      z-index: 1;
    }

    .panel-bg.panel-bg-2 {
      left: 350px;
      width: 400px;
      height: 520px;
      z-index: 2;
    }

    .auth-wrapper {
      position: absolute;
      top: 200px;
      right: 220px;
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 370px;
    }

    .login-container {
      background: #f3e6f9;
      border-radius: 16px;
      box-shadow: 0 4px 24px rgba(180, 100, 200, 0.10);
      padding: 36px 32px 18px 32px;
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 100%;
    }

    .login-logo {
      width: 70px;
      height: 70px;
      margin-bottom: 24px;
    }

    .login-input {
      width: 100%;
      padding: 12px 14px;
      margin-bottom: 18px;
      border: none;
      border-radius: 6px;
      background: #fff6fa;
      font-size: 1rem;
      color: #222;
      outline: none;
    }

    .login-button {
      width: 100%;
      padding: 12px 0;
      background: #c36be7;
      color: #fff;
      font-weight: bold;
      border: none;
      border-radius: 8px;
      font-size: 1.1rem;
      cursor: pointer;
      margin-bottom: 16px;
      transition: background 0.2s;
    }

    .login-button:hover {
      background: #a94ecf;
    }

    .login-links {
      width: 100%;
      text-align: center;
      margin-bottom: 8px;
    }

    .login-links a {
      color: #8e44ad;
      text-decoration: underline;
      font-size: 0.97rem;
    }

    .signup-container {
      margin-top: 24px;
      width: 100%;
      background: #f3e6f9;
      border-radius: 12px;
      text-align: center;
      padding: 12px 0;
      color: #b18fcf;
      font-size: 1rem;
      box-shadow: 0 4px 24px rgba(180, 100, 200, 0.10);
    }

    .signup-container a {
      color: #c36be7;
      text-decoration: underline;
      margin-left: 4px;
    }

    .loading, .error, .success {
      font-size: 0.9rem;
      text-align: center;
      margin-top: 8px;
    }

    .loading {
      color: #007BFF;
    }

    .error {
      color: red;
    }

    .success {
      color: green;
    }

    .spinner {
      display: inline-block;
      width: 20px;
      height: 20px;
      border: 3px solid rgba(255,255,255,.3);
      border-radius: 50%;
      border-top-color: #fff;
      animation: spin 1s ease-in-out infinite;
      margin-right: 8px;
    }

    @keyframes spin {
      to { transform: rotate(360deg); }
    }

    button:disabled {
      opacity: 0.7;
      cursor: not-allowed;
    }
  </style>
</head>
<body>
  <div class="header">
    <img src="<?= base_url('public/img/logo.jpg') ?>" alt="Logo">
    <span class="header-title">CRIMSONSkillBoost</span>
  </div>

  <div class="panel-bg"></div>
  <div class="panel-bg panel-bg-2"></div>

  <div class="auth-wrapper">
    <div class="login-container">
      <img src="<?= base_url('public/img/logo.jpg') ?>" class="login-logo" alt="Logo">
      <form id="loginForm" style="width: 100%;">
        <input class="login-input" type="email" id="email" placeholder="Email" required>
        <input class="login-input" type="password" id="password" placeholder="Password" required>
        <button class="login-button" type="submit" id="loginButton">Log In</button>
        <div class="login-links">
          <a href="<?= base_url('password_reset') ?>">Forgot your password?</a>
        </div>
        <p id="loadingMessage" class="loading" style="display: none;">Logging in...</p>
        <p id="message"></p>
        <p id="debugMessage"></p>
      </form>
    </div>

    <div class="signup-container">
      <span>Don't have an account?</span>
      <a href="<?= base_url('register') ?>">Sign Up</a>
    </div>
  </div>

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
            
            // Redirect will happen automatically via the auth state observer
            
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

    // Add auth state observer
    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
            window.location.href = '<?= base_url('dashboard') ?>';
        }
    });
  </script>
</body>
</html>
