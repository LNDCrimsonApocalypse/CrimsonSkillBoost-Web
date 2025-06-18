<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link  href="https://www.flaticon.com/free-icon/hide_2767146?term=eye+password&page=1&position=1&origin=tag&related_id=2767146" />
  <title>CrimsonSkillBoost - Register</title>

  <!-- Firebase SDKs -->
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
  <script src="<?= base_url('public/js/firebase-config.js') ?>"></script>

  <style>
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  font-family: 'Inter', sans-serif;
}

body {
  background: linear-gradient(to top right, #fce8fc, #e5f0ff);
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}
.header {
  width: 100%;
  padding: 1rem 2rem;
  position: absolute;
  top: 0;
  left: 0;
}

.logo {
  max-height: 40px;
}

.container {
  display: flex;
  gap: 3rem;
  align-items: center;
  padding: 3rem 2rem;
  max-width: 1100px;
  width: 100%;
  justify-content: center;
  flex-wrap: wrap;
}

.illustration img {
  max-width: 400px;
  width: 100%;
  margin-left: -80px;
}

.form-box {
  background:#d877dd44;
  padding: 2rem;
  border-radius: 20px;
  max-width: 500px;
  width: 100%;
  backdrop-filter: blur(10px);
  margin-right: -90px;
}

.form-box h2 {
  margin-bottom: 1.5rem;
  font-size: 1.8rem;
  font-weight: 600;
  color: #222;
}

form input, form select {
  width: 100%;
  padding: 0.75rem;
  margin-bottom: 1rem;
  border: 1px solid #ccc;
  border-radius: 10px;
  font-size: 1rem;
}

  .row {
      display: flex;
      gap: 1rem;
    }

    .input-container {
      position: relative;
    }

    input[type="password"],
    input[type="text"] {
      padding: 0.75rem;
      border: 1px solid #ccc;
      border-radius: 10px;
      font-size: 1rem;
      width: 200px;
    }

    .toggle-btn {
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      background: none;
      border: none;
      cursor: pointer;
      font-size: 1rem;
    }

.row input, .row select {
  flex: 1;
}

.checkbox {
  font-size: 0.85rem;
  margin-bottom: 1.5rem;
  display: flex;
  align-items: flex-start;
  gap: 0.1rem;
  color: #333;
}

.checkbox input[type="checkbox"] {
  margin-top: 3px;
}

.checkbox input {
  margin-right: 0.5rem;
}

.checkbox a {
  color: #6c63ff;
  text-decoration: none;
}

.form {
  display: flex;
  flex-direction: column;
  height: 100%;
}

.form-footer {
  margin-top: auto;
}

button {
  background-color: #da6de9;
  color: white;
  border: none;
  padding: 0.75rem;
  width: 100%;
  border-radius: 999px;
  font-size: 1rem;
  font-weight: 600;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #c75cd5;
}
.input-container {
  position: relative;
  flex: 1;
}

.input-container input[type="password"],
.input-container input[type="text"] {
  width: 100%;
  padding: 0.75rem 2.5rem 0.75rem 0.75rem; /* space for eye icon */
  border: 1px solid #ccc;
  border-radius: 10px;
  font-size: 1rem;
}

.toggle-password {
  position: absolute;
  right: 10px;
  top: 35%;
  transform: translateY(-50%);
  cursor: pointer;
  font-size: 1rem;
  user-select: none;
  color: #66
}
  </style>
</head>
<body>
  <header class="header">
    <img src="public/img/Logo.png" alt="Crimson Skill Boost Logo" class="logo" />
  </header>

  <div class="container">
    <div class="illustration">
      <img src="public/img/5.png" alt="Illustration" />
    </div>
    <div class="form-box">
      <h2>Create An Account</h2>
      <form id="registerForm">
        <input type="text" id="fname" placeholder="First name" required />
          <input type="text" id="mname" placeholder="Middle name" required />
          <input type="text" id="lname" placeholder="Last name" required />
        <input type="text" id="extname" placeholder="Extension name"  />
        <input type="email" id="email" placeholder="Email Address" required />
        <div class="row">
          <input type="date" id="birthday" placeholder="Birthday" required />
          <select id="gender" required>
            <option value="" disabled selected>Gender</option>
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
          </select>
        </div>
      <div class="row">
  <div class="input-container">
    <input type="password" id="password" placeholder="Password" required />
    <span class="toggle-password" onclick="togglePassword('password', this)">👁️</span>
  </div>

  <div class="input-container">
    <input type="password" id="confirmPassword" placeholder="Confirm Password" required />
    <span class="toggle-password" onclick="togglePassword('confirmPassword', this)">👁️</span>
  </div>
</div>
        <label class="checkbox">
          <input type="checkbox" id="terms" required />
          <span>
            By clicking here, I state that I have read and understood the
            <a href="<?= base_url('terms') ?>"  style="color:#e636a4;text-decoration:underline;">Terms and Conditions</a>.
          </span>
        </label>
        <p id="message" style="color: red; margin-bottom: 1rem;"></p>
        <div class="form-footer">
          <button type="submit">Sign Up</button>
        </div>
      </form>
    </div>
  </div>

  <script>
     function togglePassword(id, btn) {
      const input = document.getElementById(id);
      if (input.type === "password") {
        input.type = "text";
        btn.textContent = "🙈";
      } else {
        input.type = "password";
        btn.textContent = "👁️";
      }
    }
    document.getElementById("registerForm").addEventListener("submit", async function (e) {
      e.preventDefault();

      const email = document.getElementById("email").value.trim();
      const password = document.getElementById("password").value.trim();
      const confirmPassword = document.getElementById("confirmPassword").value.trim();
      const fullname = document.getElementById("fullname").value.trim();
      const birthday = document.getElementById("birthday").value;
      const gender = document.getElementById("gender").value;
      const termsAccepted = document.getElementById("terms").checked;
      const msg = document.getElementById("message");

      msg.textContent = ""; // Clear previous messages

      if (!termsAccepted) {
        msg.textContent = "Accept the terms and conditions.";
        return;
      }
      if (password !== confirmPassword) {
        msg.textContent = "Passwords do not match.";
        return;
      }

      try {
        const userCredential = await firebase.auth().createUserWithEmailAndPassword(email, password);
        const user = userCredential.user;

        // Send Firebase email verification link
      await user.sendEmailVerification({
  url: "<?= base_url('setup_profile') ?>",
  handleCodeInApp: false
});

        // Store temp user data for verify_code.php
        sessionStorage.setItem("tempUser", JSON.stringify({
          fullName: fullname,
          email: email,
          birthday: birthday,
          gender: gender
        }));

        msg.style.color = "green";
        msg.textContent = "Registration successful! Please check your email for a verification link, click it, then enter the code on the next page.";

        setTimeout(() => {
          window.location.href = "";
        }, 5000);

      } catch (error) {
        msg.style.color = "red";
        msg.textContent = "Error: " + error.message;
      }
    });
  </script>
</body>
</html>
