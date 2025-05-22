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
          <a href="#">Forgot your password?</a>
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
    const loginForm = document.getElementById("loginForm");
    const msg = document.getElementById("message");
    const debugMsg = document.getElementById("debugMessage");
    const loadingMessage = document.getElementById("loadingMessage");
    const loginButton = document.getElementById("loginButton");

    firebase.auth().onAuthStateChanged(function(user) {
      if (user) {
        window.location.href = "<?= base_url('homepage') ?>";
      }
    });

    loginForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const email = document.getElementById("email").value;
      const password = document.getElementById("password").value;

      msg.textContent = '';
      debugMsg.textContent = '';
      loadingMessage.style.display = 'block';
      loginButton.disabled = true;

      firebase.auth().signInWithEmailAndPassword(email, password)
        .then((userCredential) => {
          const user = userCredential.user;
          debugMsg.textContent = `Logged in as: ${user.email}`;

          user.getIdToken().then(token => {
            fetch("<?= base_url('Controllers/auth/verify') ?>", {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
              },
              body: JSON.stringify({ token })
            })
            .then(res => res.json())
            .then(data => {
              loadingMessage.style.display = 'none';
              loginButton.disabled = false;

              if (data.status === 'success') {
                msg.textContent = "Login successful. Welcome, " + data.email;
                msg.className = "success";
                setTimeout(() => {
                  window.location.href = "<?= base_url('homepage') ?>";
                }, 1000);
              } else {
                msg.textContent = "Login failed on backend validation.";
                msg.className = "error";
              }
            });
          });
        })
        .catch((error) => {
          loadingMessage.style.display = 'none';
          loginButton.disabled = false;

          let errorMsg = '';
          switch (error.code) {
            case 'auth/user-not-found':
              errorMsg = 'No user found with this email.';
              break;
            case 'auth/wrong-password':
              errorMsg = 'Incorrect password.';
              break;
            case 'auth/invalid-email':
              errorMsg = 'Invalid email format.';
              break;
            default:
              errorMsg = error.message;
              break;
          }

          msg.textContent = `Error: ${errorMsg}`;
          msg.className = "error";
          debugMsg.textContent = `Error code: ${error.code}`;
        });
    });
  </script>
</body>
</html>
