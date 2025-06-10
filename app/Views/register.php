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
  margin-top: auto; /* Pushes this div (and the button inside) to the bottom */
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
      <form>
        <input type="text" placeholder="Full name" required />
        <input type="email" placeholder="Email Address" required />
        <div class="row">
          <input type="date" placeholder="Birthday" required />
          <select required>
            <option value="" disabled selected>Gender</option>
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
          </select>
        </div>
        <div class="row">
          <input type="password" placeholder="Password" required />
          <input type="password" placeholder="Confirm Password" required />
        </div>
        <label class="checkbox">
         <input type="checkbox" required />
            <span>
              By clicking here, I state that I have read and understood the
               <a href="<?= base_url('terms') ?>" target="_blank" style="color:#e636a4;text-decoration:underline;">Terms and Conditions</a>.
            </span>
            </label>
        <div class="form-footer">
    <button type="submit">Sign Up</button>
  </div>
      </form>
    </div>
  </div>

  <script>
    function generateCode() {
    return Math.floor(100000 + Math.random() * 900000);
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
      const code = generateCode();

      // Store code in Firestore
      await firebase.firestore().collection("verifications").doc(user.uid).set({
        code: code,
        email: email,
        createdAt: firebase.firestore.FieldValue.serverTimestamp()
      });

      const response = await fetch("<?= base_url('send-verification-code') ?>", {
  method: "POST",
  headers: { "Content-Type": "application/json" },
  body: JSON.stringify({ email: email, code: code })
});

if (!response.ok) {
  throw new Error("Failed to send verification code. Server error.");
}


      msg.textContent = "Verification code sent! Redirecting...";
      setTimeout(() => {
        window.location.href = "<?= base_url('verify_code') ?>";
      }, 2000);
      
    } catch (error) {
      msg.textContent = "Error: " + error.message;
    } 
  });

      
  </script>
</body>
</html>
