<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CrimsonSkillBoost: The Computer Science Learning Hub - Register</title>

  <!-- Firebase -->
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
  <script src="<?= base_url('public/js/firebase-config.js') ?>"></script>

  <!-- CSS -->
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      height: 100vh;
      background: linear-gradient(to bottom right, #ffeaf7, #eaf6ff);
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .container {
      display: flex;
      width: 90%;
      max-width: 1200px;
      background-color: #fff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    .left-panel {
      flex: 1;
      padding: 40px;
      display: flex;
      flex-direction: column;
      align-items: flex-start;
    }

    .logo {
      height: 40px;
      margin-bottom: 30px;
    }

    .graphic-box {
      width: 350px;
      height: 350px;
      background-color: #d4d4d4;
      border-radius: 8px;
    }

    .right-panel {
      flex: 1;
      background-color: #f3ccf8;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px;
    }

    .register-box {
      width: 100%;
      max-width: 400px;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    input {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 1rem;
      width: 100%;
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

    #message {
      text-align: center;
      margin-top: 10px;
    }

    .success {
      color: green;
    }

    .error {
      color: red;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="left-panel">
      <img src="<?= base_url('public/img/logo.jpg') ?>" alt="Logo" class="logo">
      <div class="graphic-box"></div>
    </div>
    <div class="right-panel">
      <div class="register-box">
        <form id="registerForm">
          <input type="email" id="email" placeholder="Username or Email" required>
          <input type="password" id="password" placeholder="Password" required>
          <button type="submit">Sign Up</button>
          <p id="message"></p>
          <p>Already have an account? <a href="<?= base_url('login') ?>">Log In</a></p>
        </form>
        <p id="message"></p>
      </div>
    </div>
  </div>

  <script>
  const registerForm = document.getElementById("registerForm");
  const msg = document.getElementById("message");

  registerForm.addEventListener("submit", function (e) {
    e.preventDefault();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();

    msg.textContent = "";
    msg.className = "";

    if (email === "" || password === "") {
      msg.textContent = "⚠ Please fill in all fields.";
      msg.classList.add("error");
      setTimeout(() => {
        msg.textContent = "";
        msg.className = "";
      }, 3000);
      return;
    }

    firebase.auth().createUserWithEmailAndPassword(email, password)
      .then((userCredential) => {
        msg.textContent = "✅ Registration successful! Redirecting...";
        msg.classList.add("success");
        setTimeout(() => {
          window.location.href = "<?= base_url('setup_profile') ?>";
        }, 1500);
      })
      .catch((error) => {
        msg.textContent = "❌ " + error.message;
        msg.classList.add("error");
        setTimeout(() => {
          msg.textContent = "";
          msg.className = "";
        }, 5000);
      });
  });
</script>

</body>
</html>
