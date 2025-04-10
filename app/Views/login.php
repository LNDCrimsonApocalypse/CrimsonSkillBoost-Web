<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Log In - CrimsonSkillBoost</title>
  
  <!-- Firebase Scripts -->
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
  <script src="<?= base_url('js/firebase-config.js') ?>"></script>

  <!-- External CSS -->
  <link rel="stylesheet" href="<?= base_url('css/login.css') ?>">
</head>
<body>
  <div class="login-page">
    <div class="branding">
      <img src="logo.svg" alt="CrimsonSkillBoost Logo" class="login-logo">
      <div class="illustration-placeholder"></div>
    </div>

    <div class="login-card">
      <h2>Log In</h2>
      <form id="loginForm">
        <input type="email" id="email" placeholder="Email" required>
        <input type="password" id="password" placeholder="Password" required>
        <button type="submit" id="loginButton">Log In</button>
      </form>
      <p><a href="#">Forgot your password?</a></p>
      <p>Don't have an account? <a href="/register">Sign Up</a></p>
      <p id="loadingMessage" class="loading" style="display: none;">Logging in...</p>
      <p id="message"></p>
      <p id="debugMessage"></p>
    </div>
  </div>

  <script>
    const loginForm = document.getElementById("loginForm");
    const msg = document.getElementById("message");
    const debugMsg = document.getElementById("debugMessage");
    const loadingMessage = document.getElementById("loadingMessage");
    const loginButton = document.getElementById("loginButton");

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
          debugMsg.textContent = `Logged in as: ${user.email}, UID: ${user.uid}`;

          user.getIdToken().then(token => {
            fetch("/auth/verify", {
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
          msg.textContent = `Error: ${error.message}`;
          msg.className = "error";
          debugMsg.textContent = `Error code: ${error.code}`;
        });
    });
  </script>
</body>
</html>
