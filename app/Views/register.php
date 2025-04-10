<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CRIMSONSkillBoost | Sign Up</title>

  <!-- Firebase -->
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
  <script src="<?= base_url('js/firebase-config.js') ?>"></script>

  <!-- CSS -->
  <link rel="stylesheet" href="<?= base_url('css/register.css') ?>">
</head>
<body>
  <div class="container">
    <div class="left-panel">
      <img src="<?= base_url('images/logo-icon.png') ?>" alt="Logo" class="logo">
      <div class="graphic-box"></div>
    </div>
    <div class="right-panel">
      <div class="register-box">
        <img src="<?= base_url('images/logo-icon.png') ?>" alt="Icon" class="register-logo">
        <form id="registerForm">
          <input type="email" id="email" placeholder="Username or Email" required>
          <input type="password" id="password" placeholder="Password" required>
          <button type="submit">Sign Up</button>
          <p>Already have an account? <a href="/login">Log In</a></p>
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
      const email = document.getElementById("email").value;
      const password = document.getElementById("password").value;

      msg.textContent = "";

      firebase.auth().createUserWithEmailAndPassword(email, password)
        .then((userCredential) => {
          const user = userCredential.user;
          msg.textContent = "Registration successful. You can now log in.";
          msg.classList.add("success");
        })
        .catch((error) => {
          msg.textContent = "Error: " + error.message;
          msg.classList.add("error");
        });
    });
  </script>
</body>
</html>
