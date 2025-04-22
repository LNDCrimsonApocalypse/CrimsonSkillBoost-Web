<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Log In - CrimsonSkillBoost</title>
  
  <!-- Firebase Scripts -->
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
  <script src="<?= base_url('public/js/firebase-config.js') ?>"></script>

  <!-- Inline CSS -->
  <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            margin: 0;
            background: linear-gradient(to bottom right, #ffeaf7, #eaf6ff);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-page {
            display: flex;
            width: 90%;
            max-width: 1200px;
            align-items: center;
            justify-content: space-between;
        }

        .branding {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .login-logo {
            height: 40px;
            margin-bottom: 30px;
        }

        .illustration-placeholder {
            width: 350px;
            height: 350px;
            background-color: #d4d4d4;
            border-radius: 8px;
        }

        .login-card {
            flex: 1;
            background: #f3ccf8;
            padding: 40px;
            border-radius: 12px;
            max-width: 500px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .login-card h2 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 1.8rem;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 1rem;
        }

        button {
            background-color: #d172e6;
            color: white;
            padding: 12px;
            font-size: 1rem;
            border: none;
            border-radius: 999px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #bb61cf;
        }

        .login-card p {
            font-size: 0.9rem;
            text-align: center;
        }

        .login-card a {
            color: #540094;
            text-decoration: underline;
        }

        .loading {
            color: #007BFF;
            font-weight: bold;
            text-align: center;
        }

        .error {
            color: red;
            font-weight: bold;
            text-align: center;
        }

        .success {
            color: green;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>
  <div class="login-page">
    <div class="branding">
      <img src="public/img/logo.jpg" alt="CrimsonSkillBoost Logo" class="login-logo">
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
      <p>Don't have an account? <a href="<?= base_url('register') ?>">Sign Up</a></p>
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

    // ✅ CHECK IF USER IS ALREADY LOGGED IN
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
            fetch("Controllers/auth/verify", {
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
