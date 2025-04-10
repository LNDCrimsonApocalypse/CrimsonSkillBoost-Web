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
 <!-- Inline CSS -->
 <style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Segoe UI', sans-serif;
}

body {
  background: linear-gradient(to bottom right, #ffeaf7, #eaf6ff);
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

.signup-page {
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

.signup-logo {
  height: 40px;
  margin-bottom: 30px;
}

.illustration-placeholder {
  width: 350px;
  height: 350px;
  background-color: #d4d4d4;
  border-radius: 8px;
}

.signup-card {
  flex: 1;
  background: #f3ccf8;
  padding: 40px;
  border-radius: 12px;
  max-width: 500px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.signup-card h2 {
  text-align: center;
  margin-bottom: 30px;
  font-size: 1.8rem;
}

form {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

input, select {
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 1rem;
  width: 100%;
}

.input-row {
  display: flex;
  gap: 10px;
}

.terms {
  display: flex;
  align-items: center;
  font-size: 0.9rem;
}

.terms input[type="checkbox"] {
  margin-right: 10px;
}

.terms a {
  color: #540094;
  text-decoration: underline;
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
    </style>
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
