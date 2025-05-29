<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>CrimsonSkillBoost - Register</title>

  <!-- Firebase SDKs -->
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
  <script src="<?= base_url('public/js/firebase-config.js') ?>"></script>

  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to bottom right, #ffeef5, #e6f4ff);
    }

    .container {
      display: flex;
      height: 100vh;
    }

    .left-section {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 2rem;
    }

    .logo {
      width: 50px;
      margin-bottom: 20px;
    }

    .image-placeholder {
      width: 100%;
      max-width: 400px;
      height: 400px;
      background: #ccc;
    }

    .right-section {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .form-box {
      background: linear-gradient(to bottom right, #fce4ff, #e5e9ff);
      padding: 40px;
      border-radius: 16px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-box h2 {
      margin-bottom: 20px;
      text-align: center;
    }

    form input,
    form select {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ddd;
      border-radius: 8px;
    }

    .row {
      display: flex;
      gap: 10px;
    }

    .checkbox-container {
      display: flex;
      align-items: flex-start;
      font-size: 0.85rem;
      margin-bottom: 20px;
    }

    .checkbox-container input {
      margin-right: 10px;
      margin-top: 4px;
      width: 18px;
      height: 18px;
    }

    .checkbox-container a {
      color: #888;
      text-decoration: none;
    }

    button {
      width: 100%;
      padding: 12px;
      background: #dd5cd2;
      color: white;
      border: none;
      border-radius: 9999px;
      font-size: 1rem;
      cursor: pointer;
    }

    button:hover {
      background: #c94ac1;
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
    <div class="left-section">
      <img src="<?= base_url('public/img/logo.jpg') ?>" alt="Logo" class="logo" />
      <div class="image-placeholder"></div>
    </div>

    <div class="right-section">
      <div class="form-box">
        <h2>Create An Account</h2>
        <form id="registerForm">
          <input type="text" id="fullname" placeholder="Full name" required />
          <input type="email" id="email" placeholder="Email Address" required />
          <div class="row">
            <input type="date" id="birthday" placeholder="Birthday" required />
            <select id="gender" required>
              <option value="">Gender</option>
              <option>Male</option>
              <option>Female</option>
              <option>Other</option>
            </select>
          </div>
          <div class="row">
            <input type="password" id="password" placeholder="Password" required />
            <input type="password" id="confirmPassword" placeholder="Confirm Password" required />
          </div>
          <label class="checkbox-container">
            <input type="checkbox" id="terms" required />
            <span>
              By clicking here, I state that I have read and understood the 
              <a href="<?= base_url('terms') ?>" target="_blank">Terms and Conditions</a>.
            </span>
          </label>
          <button type="submit">Sign Up</button>
          <p id="message"></p>
          <p style="text-align:center">Already have an account? <a href="<?= base_url('login') ?>">Log In</a></p>
        </form>
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
      const confirmPassword = document.getElementById("confirmPassword").value.trim();
      const fullname = document.getElementById("fullname").value.trim();
      const birthday = document.getElementById("birthday").value;
      const gender = document.getElementById("gender").value;
      const termsAccepted = document.getElementById("terms").checked;

      msg.textContent = "";
      msg.className = "";

      if (!email || !password || !confirmPassword || !fullname || !birthday || !gender) {
        msg.textContent = "⚠ Please fill in all fields.";
        msg.classList.add("error");
        return;
      }

      if (password !== confirmPassword) {
        msg.textContent = "❌ Passwords do not match.";
        msg.classList.add("error");
        return;
      }

      if (!termsAccepted) {
        msg.textContent = "❌ You must accept the terms and conditions.";
        msg.classList.add("error");
        return;
      }

      firebase.auth().createUserWithEmailAndPassword(email, password)
        .then((userCredential) => {
          const user = userCredential.user;

          user.sendEmailVerification()
            .then(() => {
              // Save data to sessionStorage for later use in verify_code.php
              sessionStorage.setItem("tempUser", JSON.stringify({
                uid: user.uid,
                fullName: fullname,
                email: email,
                birthday: birthday,
                gender: gender
              }));

              msg.textContent = "✅ Verification email sent. Redirecting...";
              msg.classList.add("success");
              setTimeout(() => {
                window.location.href = "<?= base_url('verify_code') ?>";
              }, 1500);
            })
            .catch((error) => {
              msg.textContent = "❌ Failed to send verification email: " + error.message;
              msg.classList.add("error");
            });
        })
        .catch((error) => {
          msg.textContent = "❌ " + error.message;
          msg.classList.add("error");
        });
    });
  </script>
</body>
</html>
